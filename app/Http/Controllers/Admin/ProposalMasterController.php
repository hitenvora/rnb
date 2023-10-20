<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Master\Master;
use App\Models\Tender\AddTenderForm;
use App\Models\Tender\AddTpiTenderForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class ProposalMasterController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $proposal_show = ProPosalMasters::orderBy('id')->first();
        $districtname = District::orderBy('id')->get();
        $talukaname = Taluka::orderBy('id')->get();
        $worktype = WorkTypes::orderBy('id')->get();
        $typework = TypesOfWork::orderBy('id')->get();
        $budget = Budget::orderBy('id')->get();
        $budgetwork = BudgetWork::orderBy('id')->get();
        $mpmla = MpMlaSuggested::orderBy('id')->get();
        $sentbox = SentBox::orderBy('id')->get();

        return view('admin.proposal_master', compact('districtname', 'talukaname', 'worktype', 'typework', 'budget', 'budgetwork', 'mpmla', 'sentbox', 'user', 'role','proposal_show'));
    }
    public function storeImage($img, $path)
    {
        $path = public_path($path);
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $img->extension();
        $img->move($path, $imageName);
        return $imageName;
    }

    public function insert(Request $request)
    {

        if ($request->proposal_master_id != '') {
            $proposal_master = ProPosalMasters::find($request->proposal_master_id);
            if (!$proposal_master) {
                return response()->json(['status' => 400, 'msg' => 'Sub division not found!']);
            }
        } else {
            $proposal_master = new ProPosalMasters();
        }
        $proposal_master->district_id = $request->input('district_id');
        $proposal_master->taluka_id = $request->input('taluka_id');
        $proposal_master->work_type_id = $request->input('work_type_id');
        $proposal_master->type_work_id = $request->input('type_work_id');

        $proposal_master->budget_id = $request->input('budget_id');
        $proposal_master->budget = $request->input('budget');
        $proposal_master->budget_work_id = $request->input('budget_work_id');
        $proposal_master->budget_work = $request->input('budget_work');
        $proposal_master->amount = $request->input('amount');
        $proposal_master->mp_mla_id = $request->input('mp_mla_id');
        $proposal_master->mp_mla = $request->input('mp_mla');
        $proposal_master->letter_no = $request->input('letter_no');
        $proposal_master->letter_date = $request->input('letter_date');
        if (isset($request->upload_img)) {
            $proposal_master->upload_img = $this->storeImage($request->upload_img, 'uplode_images/masters/');
        }
        $proposal_master->suggest = $request->input('suggest');
        $proposal_master->recever_from = $request->input('recever_from');
        $proposal_master->rec_letter_no = $request->input('rec_letter_no');
        $proposal_master->rec_letter_date = $request->input('rec_letter_date');
        $proposal_master->rec_letter_amount = $request->input('rec_letter_amount');
        $proposal_master->sent_proposal = $request->input('sent_proposal');
        $proposal_master->sent_proposal_letter_no = $request->input('sent_proposal_letter_no');
        $proposal_master->sent_proposal_date = $request->input('sent_proposal_date');
        $proposal_master->sent_proposal_amount = $request->input('sent_proposal_amount');
        $proposal_master->sent_box_id = $request->input('sent_box_id');
        $proposal_master->sent_box = $request->input('sent_box');
        $proposal_master->sent_box_date = $request->input('sent_box_date');
        $proposal_master->sent_box_remark = $request->input('sent_box_remark');


        $proposal_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }


    public function get_proposal_master(Request $request)
    {
        $proposal_master = ProPosalMasters::orderBy('id', 'desc')->get();

        foreach ($proposal_master as $key => $record) {
            $id = $record->id;
            $proposal_master[$key]['district_name_view'] =  $record->district_name->name ?? 'N/A';
            $proposal_master[$key]['taluka_name_view'] =  $record->taluka_name->name ?? 'N/A';
            $proposal_master[$key]['work_type_view'] =  $record->work_type->name ?? 'N/A';
            // $proposal_master[$key]['type_work_view'] =  $record->type_work->name;
            $proposal_master[$key]['budget_name_view'] =  $record->budget_name->name ?? 'N/A';
            $proposal_master[$key]['budgetwork_name_view'] =  $record->budgetwork_name->name ?? 'N/A';
            $proposal_master[$key]['mla_name_view'] =  $record->mla_name->name ?? 'N/A';
            $proposal_master[$key]['sent_box_name_view'] =  $record->sent_box_name->name ?? 'N/A';

            $proposal_master[$key]['eye_icon'] = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewproposal(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#proposal_view" aria-label="View" data-bs-original-title="View';

            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewproposal(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>';

            $action .=  '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editproposal(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';

            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';

            $proposal_master[$key]['action'] =  $action;
        }
        return Datatables::of($proposal_master)
            ->addIndexColumn()
            ->rawColumns(['action', 'district_name_view', 'taluka_name_view', 'work_type_view', 'type_work_view', 'budget_name_view', 'budgetwork_name_view', 'mla_name_view', 'sent_box_name_view', 'eye_icon'])
            ->make(true);
    }


    public function proposal_master_edit($id)
    {
        $proposal_master = ProPosalMasters::where('id', $id)->first();
        if ($proposal_master) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }


    public function proposal_submitted_edit($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();

        // if ($proposal_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        return view('pb_branch.edit_proposal_submitted_detail', compact('project_master', 'user', 'role'));
    }

    public function principal_approval_edit($id)
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $project_master = Master::where('id', $id)->first();

        return view('pb_branch.edit_principal_approval_detail', compact('project_master', 'user', 'role'));
    }

    public function principal_estimate_edit($id)
    {
        $project_master = Master::where('id', $id)->first();
        $division_name = DivisionMasters::orderBy('id')->get();
        $sub_division_name = SubDivisionMasters::orderBy('id')->get();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        // if ($proposal_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        return view('pb_branch.edit_block_estimate_submit_detail', compact('project_master', 'user', 'role', 'division_name', 'sub_division_name'));
    }

    public function edit_administrative_approval($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        // if ($proposal_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        return view('pb_branch.edit_administrative_approval', compact('project_master', 'user', 'role'));
    }

    public function edit_technical_section_detail($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        // if ($proposal_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        return view('pb_branch.edit_technical_section_detail', compact('project_master', 'user', 'role'));
    }

    public function edit_forest_clearence_detail($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        // if ($proposal_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        return view('pb_branch.edit_forest_clearence_detail', compact('project_master', 'user', 'role'));
    }

    public function edit_utility_shifting_detail($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        // if ($proposal_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        return view('pb_branch.edit_utility_shifting_detail', compact('project_master', 'user', 'role'));
    }

    public function  edit_laq_approval($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $division_name = DivisionMasters::orderBy('id')->get();
        return view('pb_branch.edit_laq_approval', compact('project_master', 'user', 'role', 'division_name'));
    }


    public function  edit_budgetary_detail($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();

        return view('auditor_account.edit_budgetary_detail', compact('project_master', 'user', 'role'));
    }
    public function  edit_expenditure_detail($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('auditor_account.edit_expenditure_detail', compact('project_master', 'user', 'role'));
    }
    public function  edit_excess_detail($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();

        return view('auditor_account.edit_excess_detail', compact('project_master', 'user', 'role'));
    }
    public function  edit_time_extension($id)

    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('auditor_account.edit_time_extension', compact('project_master', 'user', 'role'));
    }

    public function  edit_work_status($id)

    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('auditor_account.edit_work_status', compact('project_master', 'user', 'role'));
    }

    public function  edit_fmg($id)

    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('auditor_account.edit_fmg', compact('project_master', 'user', 'role'));
    }


    public function  edit_fdr($id)

    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('auditor_account.edit_fdr', compact('project_master', 'user', 'role'));
    }

    public function  edit_dlp_period($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('auditor_account.edit_dlp_period', compact('project_master', 'user', 'role'));
    }

    public function  edit_dtp_approval($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('tender.edit_dtp_approval', compact('project_master', 'user', 'role'));
    }
    public function  edit_nit($id)
    {
        $tender_name = AddTenderForm::orderBy('id')->get();
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('tender.edit_nit', compact('project_master', 'user', 'role', 'tender_name'));
    }
    public function  edit_deposit_order($id)
    {
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('tender.edit_deposit_order', compact('project_master', 'user', 'role'));
    }
    public function  edit_tpi_detail($id)
    {
        $tpi_tender_name = AddTpiTenderForm::orderBy('id')->get();
        $project_master = Master::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('tender.edit_tpi_detail', compact('project_master', 'user', 'role', 'tpi_tender_name'));
    }



    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $proposal_master = ProPosalMasters::find($id);
        $proposal_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function show_proposal_master($id)
    {
        $proposal_master = ProPosalMasters::with('district_name', 'taluka_name', 'work_type', 'type_work', 'budget_name', 'budgetwork_name', 'mla_name', 'sent_box_name')->where('id', $id)->first();
        if ($proposal_master) {
            return response()->json([
                'status' => '200',
                'msg' => 'success',
                'data' =>  $proposal_master
            ]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }
}
