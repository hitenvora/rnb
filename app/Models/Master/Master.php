<?php

namespace App\Models\Master;

use App\Models\Admin\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = [
        'forest_protected',
        'used_type'
    ];

    protected $table = 'masters';

    public function district_view()
    {
        return $this->hasOne('app\Models\Admin\District', 'id', 'district_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
