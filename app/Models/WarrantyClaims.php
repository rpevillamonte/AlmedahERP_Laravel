<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyClaims extends Model
{
    use HasFactory;
    protected $fillable = [
        'wclaim_id',
        'sales_id',
        'employee_id',
        'issue_date',
        'issue_desc',
        'repair_status',
        'warranty_status',
        'resolution_date',
        'resolution_details',
    ];
}
