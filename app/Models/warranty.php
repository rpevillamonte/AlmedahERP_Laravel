<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warranty extends Model
{
    use HasFactory;
    public $timestamps = False;

    protected $fillable = [
        'warranty_id',
        'delivery_id',
        'warranty_period',
        'warranty_end_date',
        'amc_expiry_date',
    ];
}
