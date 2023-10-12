<?php

namespace App\Models\Master;

use App\Models\Admin\District;
use App\Models\PbBranch\NameOfProject;
use App\Models\PbBranch\NameOfSchema;
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

    // public function name_of_deputere()
    // {
    //     return $this->hasOne('app\Models\PbBranch\NameOfSchema', 'id', 'basic_wms_work_head');
    // }

    public function name_of_deputere()
    {
        return $this->belongsTo(NameOfSchema::class, 'id');
    }


    public function name_of_project()
    {
        return $this->belongsTo(NameOfProject::class, 'id');
    }
}
