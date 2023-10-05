<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDivisionMasters extends Model
{
    use HasFactory;

    public function division_name()
    {
        return $this->hasOne('App\Models\Admin\DivisionMasters', 'id', 'division_master_id');
    }
}
