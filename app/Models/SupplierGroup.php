<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierGroup extends Model
{
    use HasFactory;
    protected $table = 'supplier_group';
    protected $fillable = [
        'supplier_id',
        'item_code'
    ];
    public $timestamps = false;

    public function raw_material(){
        return $this->belongsTo(ManufacturingMaterials::class, 'item_code', 'item_code');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }
}
