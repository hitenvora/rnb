<?php

namespace App\Models\Master;

use App\Models\Admin\Budget;
use App\Models\Admin\District;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\MpMlaSuggested;
use App\Models\Admin\SentBox;
use App\Models\Admin\SubDivisionMasters;
use App\Models\Admin\Taluka;
use App\Models\Admin\WorkTypes;
use App\Models\PbBranch\NameOfProject;
use App\Models\PbBranch\NameOfSchema;
use App\Models\Tender\AddTenderForm;
use App\Models\Tender\AddTpiTenderForm;
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

    public function name_of_schema()
    {
        return $this->belongsTo(NameOfSchema::class, 'basic_name_scheme');
    }

    public function name_of_project()
    {
        return $this->belongsTo(NameOfProject::class, 'basic_name_project');
    }

    public function budgets()
    {
        return $this->belongsTo(Budget::class, 'budget_id');
    }

    public function talukas()
    {
        return $this->belongsTo(Taluka::class, 'taluka_id');
    }

    public function work_types()
    {
        return $this->belongsTo(WorkTypes::class, 'work_type_id');
    }

    public function mp_mla_suggesteds()
    {
        return $this->belongsTo(MpMlaSuggested::class, 'basic_mp_mla');
    }

    public function sent_boxes()
    {
        return $this->belongsTo(SentBox::class, 'sent_box_id');
    }

    public function division_masters()
    {
        return $this->belongsTo(DivisionMasters::class, 'division_master_id');
    }

    public function sub_division_masters()
    {
        return $this->belongsTo(SubDivisionMasters::class, 'sub_division_master_id');
    }

    public function add_tender_forms()
    {
        return $this->belongsTo(AddTenderForm::class, 'nit_tender_form');
    }

    public function add_tpi_tender_forms()
    {
        return $this->belongsTo(AddTpiTenderForm::class, 'tpi_tender_form');
    }
}
