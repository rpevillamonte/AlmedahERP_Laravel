<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
        'department_name',
        'reports_to'
    ];
    public $timestamps = false;

    public function dept_head() {
        return $this->hasOne(Employee::class, 'employee_id', 'reports_to');
    }
}
