<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $table = 'env_employees';
    protected $primaryKey = 'employee_id';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'employee_id',
        'last_name',
        'first_name',
        'position',
        'gender',
        'contact_number',
        'email',
        'date_of_birth',
        'department_id',
        'employment_id',
        'hired_date',
        'salary',
        'salary_term',
        'role_id',
        'is_admin',
        'address',
        'status',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthPassword(){
        return $this->password;
    }
}
