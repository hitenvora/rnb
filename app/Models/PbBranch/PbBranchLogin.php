<?php

namespace App\Models\PbBranch;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PbBranchLogin extends Model
{
    use HasFactory;

    protected $guard = 'pb_login';
    protected $table = 'pb_branch_logins';

    protected $fillable = [
        'name','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
