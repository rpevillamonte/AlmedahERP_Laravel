<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCenter extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'work_center';
    public $timestamps = true;
    protected $fillable = [
        'wc_code',
        'wc_label',
        'wc_type',
        'machine_code',
        'employee_id_set',
        'set-up_time',
        'duration'
    ];

    public function machine_manual() {
        return $this->hasOne(MachinesManual::class, 'machine_code', 'machine_code');
    }

    public function employee_set() {
        $employee_data = json_decode($this->employee_id_set);
        $mod_emp_data = array();
        foreach((array)$employee_data as $emp) {
            $employee = Employee::where('employee_id', $emp->employee_id)->first();
            array_push($mod_emp_data,
                array(
                    'employee_id' => $emp->employee_id,
                    'emp_name' => $employee->last_name . ", " . $employee->first_name,
                    'hours' => $emp->e_hours,
                    'mins' => $emp->e_min,
                    'seconds' => $emp->e_sec
                )
            );
        }
        return $mod_emp_data;
    }
}
