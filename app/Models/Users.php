<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Users extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'status',
        'role',
    ];
    
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
