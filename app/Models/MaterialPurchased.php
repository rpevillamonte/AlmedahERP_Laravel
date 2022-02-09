<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MaterialPurchased extends Model
{
    use HasFactory;
    protected $table = 'materials_purchased';
    public $timestamps = true;
    protected $fillable = [
        'purchase_id',
        'supp_quotation_id',
        'items_list_purchased',
        'purchase_date',
        'mp_status',
        'total_cost'
    ];

    public function itemsPurchased() {
        $material_records = $this->materialRecords;
        $items_purchased_array = array();
        foreach($material_records as $mp) {
            $material = ManufacturingMaterials::where('item_code', $mp->item_code)->first();
            array_push($items_purchased_array,
                array(
                    'item_code' => $mp->item_code,
                    'item' => $material,
                    'uom' => $material->uom,
                    'req_date' => $mp->required_date,
                    'qty' => $mp->qty,
                    'rate' => $mp->rate,
                    'subtotal' => $mp->subtotal
                )
            );
        }
        return $items_purchased_array;
    }

    public function productsAndRates($item_code, $master_item) {
        $materials = $this->itemsPurchased();
        $item = ManufacturingProducts::where('product_code', $master_item)->first();
        if (is_null($item)) {
            $item = Component::where('component_code', $master_item)->first();
        }
        $materials_qty = $item->qtyOfRawMat($item_code);
        foreach ($materials as $material) {
            if(in_array($item_code, $material)) {
                $material['qty'] = $materials_qty;
                $material['subtotal'] = $materials_qty * $material['rate'];
                return $material; 
            }
        }
    }

    /**
     * Function created to accommodate dynamic WHERE clauses for searching
     */
    public function scopeFilter($query, $filters) {
        foreach ($filters as $f) {
            /**
             * f[0] => refers to the column name
             * f[1] => refers to the condition to be checked (eg. 'LIKE', '=', etc)
             * f[2] => refers to the value to check
             */
            $query->where($f[0], $f[1], $f[2]);
        }
        return $query;
    }

    public function delete()
    {

        //delete all records with same purchase_id 
        DB::table('materials_list_purchased')->where('purchase_id', $this->purchase_id)->delete();

        //get purchase receipt and delete pending orders record related to purchase receipt
        $p_receipt = $this->receipt;
        $this->deleteReceipt($p_receipt);

        parent::delete();
    }

    private function deleteReceipt($receipt) {

        if(is_null($receipt)) return;

        if ($receipt->pr_status !== 'Draft' || !$receipt->noReceivedMaterials()) {
            return ['error' => 'Cannot cancel this order. Some of the items listed have already been delivered.'];
        }

        DB::table('materials_ordered')->where('p_receipt_id', $receipt->p_receipt_id)->delete();  

        $p_invoice = $receipt->invoice;
        if (!is_null($p_invoice)) {
            DB::table('purchase_invoice_logs')->where('p_invoice_id', $p_invoice->p_invoice_id)->delete();
            // delete purchase invoice
            $p_invoice->delete();
        }
        
        //delete purchase receipt
        $receipt->delete();
    }

    public function supplier_quotation() {
        return $this->belongsTo(SuppliersQuotation::class, 'supp_quotation_id', 'supp_quotation_id');
    }

    public function materialRecords() {
        return $this->hasMany(MPRecord::class, 'purchase_id', 'purchase_id');
    }

    public function receipt() {
        return $this->hasOne(PurchaseReceipt::class, 'purchase_id', 'purchase_id');
    }
}
