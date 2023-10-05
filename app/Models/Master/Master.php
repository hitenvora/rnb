<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = [
        'forest_protected',
        'used_type'
    ];
        
    protected $table='masters';

    public function district_view()
    {
        return $this->hasOne('app\Models\Admin\District', 'id', 'district_id');
    }
}
