<?php

namespace App\Models\Notification;

use App\Models\Admin\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table ='notification';

    protected $fillable = ['message', 'master_id', 'admin_id', 'role_id'];

    public function rolename()
    {
        return $this->belongsTo(Role::class, 'id');
    }
}
