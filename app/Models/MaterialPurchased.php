<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function scopeFilter($query, $filters) {
        foreach ($filters as $f) {
            $query->where($f[0], $f[1], $f[2]);
        }
        return $query;
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
