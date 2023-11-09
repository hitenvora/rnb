<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMaster extends Model
{
    use HasFactory;
    
    public function role_name()
    {
        return $this->hasOne('App\Models\Admin\Role', 'id', 'Role_id');
    }
}
