<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminLogin;
use App\Models\Admin\Budget;
use App\Models\Admin\BudgetWork;
use App\Models\Admin\District;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\MpMlaSuggested;
use App\Models\Admin\ProPosalMasters;
use App\Models\Admin\SentBox;
use App\Models\Admin\SubDivisionMasters;
use App\Models\Admin\Taluka;
use App\Models\Admin\TypesOfWork;
use App\Models\Admin\WorkTypes;
use App\Models\PbBranch\Basic;
use App\Models\PbBranch\NameOfProject;
use App\Models\PbBranch\NameOfSchema;
use Illuminate\Http\Request;

class BasicBranchController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        // $basic_show= Basic::orderBy('id')->get();
        $division_name = DivisionMasters::orderBy('id')->get();
        $sub_division_name = SubDivisionMasters::orderBy('id')->get();
        $district_name= District::orderBy('id')->get();
        $taluka_name= Taluka::orderBy('id')->get();
        // $proposal = ProPosalMasters::orderBy('id')->get();
        $work_type = WorkTypes::orderBy('id')->get();
        $type_work= TypesOfWork::orderBy('id')->get();
        $budget= Budget::orderBy('id')->get();
        $budget_work= BudgetWork::orderBy('id')->get();
        $mp_mla= MpMlaSuggested::orderBy('id')->get();
        $sent_box= SentBox::orderBy('id')->get();
        $name_of_scheme  =NameOfSchema ::orderBy('id')->get();
        $name_of_project  =NameOfProject::orderBy('id')->get();

        return view('pb_branch.basic_branch', compact('division_name', 'sub_division_name','district_name','taluka_name','work_type','type_work','budget','budget_work','mp_mla','sent_box','name_of_scheme','name_of_project','user','role'));
    }
    
    // public function insert(Request $request)
    // {

    //     $rules = [
    //         'name_scheme' => 'required',
    //         'name_project' => 'required',
    //         'wms_work_head' => 'required',
    //         'rp_district_id' => 'required',
    //         'rp_taluka_id' => 'required',
    //         'rp_work_type_id' => 'required',
    //         'rp_type_work_id' => 'required',
    //         'rp_type_work_name_id' => 'required',
    //         'rp_budget_id' => 'required',
    //         'rp_budget_name_id' => 'required',
    //         'rp_budget_work_id' => 'required',
    //         'rp_budget_work_name_id' => 'required',
    //         'rp_amount_id' => 'required',
    //         'rp_mp_mla_id' => 'required',
    //         'rp_mp_mla_name_id' => 'required',
    //         'rp_letter_no_id' => 'required',
    //         'rp_letter_date_id' => 'required',
    //         //  'upload_img' => 'required',
    //         'rp_suggest_id' => 'required',
    //         'rp_recever_from_id' => 'required',
    //         'rp_rec_letter_no_id' => 'required',
    //         'rp_rec_letter_date_id' => 'required',
    //         'rp_rec_letter_amount_id' => 'required',
    //         'rp_sent_proposal_id' => 'required',
    //         'rp_sent_proposal_letter_no_id' => 'required',
    //         'rp_sent_proposal_date_id' => 'required',
    //         'rp_sent_proposal_amount_id' => 'required',
    //         'rp_sent_box_id_' => 'required',
    //         'rp_sent_box_name_id' => 'required',
    //         'rp_sent_box_date_id' => 'required',
    //         'rp_sent_box_remark_id' => 'required',
    //         'name_of_department' => 'required',
    //         'division_id' => 'required',
    //         'sub_division_id' => 'required',
    //         'name_of_road' => 'required',
    //         'category_of_road' => 'required',

    //     ];

    //     // $this->validate($request, $rules);
    //     $image = $request->file('rp_upload_img_id');
    //     $filename = '';

    //     if ($image == '') {
    //         return response()->json(['status' => '400', 'msg' => 'please select image']);
    //     }

    //     if (!empty($image)) {
    //         $filename = str_replace(' ', '', $image->getClientOriginalName());
    //         $image->move(public_path('upload/Letter-reminder/'), $filename);
    //     }

    //     if ($request->basic_branch_id != '') {
    //         $basic_branch = Basic::find($request->basic_branch_id);
    //         if (!$basic_branch) {
    //             return response()->json(['status' => 400, 'msg' => 'Sub division not found!']);
    //         }
    //     } else {
    //         $basic_branch = new Basic();
    //     }
    //     $basic_branch->name_scheme = $request->input('name_scheme');
    //     $basic_branch->name_project = $request->input('name_project');
    //     $basic_branch->wms_work_head = $request->input('wms_work_head');
    //     $basic_branch->name_of_department = $request->input('name_of_department');
    //     $basic_branch->division_id = $request->input('division_id');
    //     $basic_branch->sub_division_id = $request->input('sub_division_id');
    //     $basic_branch->name_of_road = $request->input('name_of_road');
    //     $basic_branch->category_of_road = $request->input('category_of_road');

    //     $basic_branch->rp_district_id = $request->input('rp_district_id');
    //     $basic_branch->rp_taluka_id = $request->input('rp_taluka_id');
    //     $basic_branch->rp_work_type_id = $request->input('rp_work_type_id');
    //     $basic_branch->rp_type_work_id = $request->input('rp_type_work_id');
    //     $basic_branch->rp_type_work_name_id = $request->input('rp_type_work_name_id');
    //     $basic_branch->rp_budget_id = $request->input('rp_budget_id');
    //     $basic_branch->rp_budget_name_id = $request->input('rp_budget_name_id');
    //     $basic_branch->rp_budget_work_id = $request->input('rp_budget_work_id');
    //     $basic_branch->rp_budget_work_name_id = $request->input('rp_budget_work_name_id');
    //     $basic_branch->rp_amount_id = $request->input('rp_amount_id');
    //     $basic_branch->rp_mp_mla_id = $request->input('rp_mp_mla_id');
    //     $basic_branch->rp_mp_mla_name_id = $request->input('rp_mp_mla_name_id');
    //     $basic_branch->rp_letter_no_id = $request->input('rp_letter_no_id');
    //     $basic_branch->rp_letter_date_id = $request->input('rp_letter_date_id');
    //     // $basic_branch->rp_upload_img_id = $request->input('rp_upload_img_id');
    //     $basic_branch->rp_upload_img_id = $filename;
    //     $basic_branch->rp_suggest_id = $request->input('rp_suggest_id');
    //     $basic_branch->rp_recever_from_id = $request->input('rp_recever_from_id');
    //     $basic_branch->rp_rec_letter_no_id = $request->input('rp_rec_letter_no_id');
    //     $basic_branch->rp_rec_letter_date_id = $request->input('rp_rec_letter_date_id');
    //     $basic_branch->rp_rec_letter_amount_id = $request->input('rp_rec_letter_amount_id');
    //     $basic_branch->rp_sent_proposal_id = $request->input('rp_sent_proposal_id');
    //     $basic_branch->rp_sent_proposal_letter_no_id = $request->input('rp_sent_proposal_letter_no_id');
    //     $basic_branch->rp_sent_proposal_date_id = $request->input('rp_sent_proposal_date_id');
    //     $basic_branch->rp_sent_proposal_amount_id = $request->input('rp_sent_proposal_amount_id');
    //     $basic_branch->rp_sent_box_id = $request->input('rp_sent_box_id');
    //     $basic_branch->rp_sent_box_name_id = $request->input('rp_sent_box_name_id');
    //     $basic_branch->rp_sent_box_date_id = $request->input('rp_sent_box_date_id');
    //     $basic_branch->rp_sent_box_remark_id = $request->input('rp_sent_box_remark_id');


    //     $basic_branch->save();

    //     return response()->json(['status' => '200', 'msg' => 'success']);
    // }
}
