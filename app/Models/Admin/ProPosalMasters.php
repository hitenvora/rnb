<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProPosalMasters extends Model
{

    protected $table = 'pro_posal_masters';
    use HasFactory;

    // protected $fillable = ['upload_img'];


    public function district_name()
    {
        return $this->hasOne('App\Models\Admin\District', 'id', 'district_id');
    }

    public function taluka_name()
    {
        return $this->hasOne('App\Models\Admin\Taluka', 'id', 'taluka_id');
    }

    public function work_type()
    {
        return $this->hasOne('App\Models\Admin\WorkTypes', 'id', 'work_type_id');
    }

    public function type_work()
    {
        return $this->hasOne('App\Models\Admin\TypesOfWork', 'id', 'type_work_id');
    }

    public function budget_name()
    {
        return $this->hasOne('App\Models\Admin\Budget', 'id', 'budget_id');
    }

    public function budgetwork_name()
    {
        return $this->hasOne('App\Models\Admin\BudgetWork', 'id', 'budget_work_id');
    }

    public function mla_name()
    {
        return $this->hasOne('App\Models\Admin\MpMlaSuggested', 'id', 'mp_mla_id');
    }

    public function sent_box_name()
    {
        return $this->hasOne('App\Models\Admin\SentBox', 'id', 'sent_box_id');
    }

}
