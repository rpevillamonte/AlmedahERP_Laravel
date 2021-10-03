<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPRecord extends Model
{
    use HasFactory;
    protected $table = 'materials_list_purchased';
    public $timestamps = true;
    protected $fillable = [
        'purchase_id',
        'item_code',
        'qty',
        'supplier_id',
        'required_date',
        'rate',
        'subtotal'
    ];

    public function material() {
        return $this->hasOne(ManufacturingMaterials::class, 'item_code', 'item_code');
    }
}
