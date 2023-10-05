<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminLogin extends Authenticatable
{
    use HasFactory ,SoftDeletes;

    
    protected $guard = 'admin';
    protected $table = 'admins';

    protected $fillable = [
        'name','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

