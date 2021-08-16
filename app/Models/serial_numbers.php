<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serial_numbers extends Model
{
    use HasFactory;
    public $timestamps = False;
    protected $fillable = [
        'serial_no',
        'product_code',
        'warranty_id',
        'sales_id'
    ];
}
