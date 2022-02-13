<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_roles';
    protected $fillable = [
        'role_id',
        'role_name',
        'description',
        'permissions'
    ];
    public $timestamps = false;

    public function permissions() { return json_decode($this->permissions); }
}
