<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Budget;
use App\Models\Admin\BudgetWork;
use App\Models\Admin\District;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\MpMlaSuggested;
use App\Models\Admin\SentBox;
use App\Models\Admin\SubDivisionMasters;
use App\Models\Admin\Taluka;
use App\Models\Admin\TypesOfWork;
use App\Models\Admin\WorkTypes;
use App\Models\Master\Master;
use App\Models\PbBranch\NameOfSchema;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\ExportMasters;
use App\Models\admin\AdminLogin;
use App\Models\PbBranch\NameOfProject;
use Maatwebsite\Excel\Facades\Excel;

class ProjectMasterController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();

        return view('admin.project_master.index', compact('user', 'role'));
    }

    public function create()
    {
        $division_name = DivisionMasters::orderBy('id')->get();
        $sub_division_name = SubDivisionMasters::orderBy('id')->get();
        $district_name = District::orderBy('id')->get();
        $taluka_name = Taluka::orderBy('id')->get();
        // $proposal = ProPosalMasters::orderBy('id')->get();
        $work_type = WorkTypes::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $budget = Budget::orderBy('id')->get();
        $budget_work = BudgetWork::orderBy('id')->get();
        $mp_mla = MpMlaSuggested::orderBy('id')->get();
        $sent_box = SentBox::orderBy('id')->get();
        $master_show = Master::orderBy('id')->get();

        return view('admin.project_master.create', compact('division_name', 'sub_division_name', 'district_name', 'taluka_name', 'work_type', 'type_work', 'budget', 'budget_work', 'mp_mla', 'sent_box', 'name_of_scheme'));
    }

    public function get_project_master(Request $request)
    {
        $project_master = Master::orderBy('id', 'desc')->get();

        // dd($project_master);
        foreach ($project_master as $key => $record) {
            $id = $record->id;
            $project_master[$key]['district_name_view'] =  $record->district->name ?? 'N/A';
            // $project_master[$key]['taluka_name_view'] =  $record->taluka_name->name;
            // $project_master[$key]['work_type_view'] =  $record->work_type->name;
            // // $project_master[$key]['type_work_view'] =  $record->type_work->name;
            // $project_master[$key]['budget_name_view'] =  $record->budget_name->name;
            // $project_master[$key]['budgetwork_name_view'] =  $record->budgetwork_name->name;
            // $project_master[$key]['mla_name_view'] =  $record->mla_name->name;
            // $project_master[$key]['sent_box_name_view'] =  $record->sent_box_name->name;
            // $project_master[$key]['wms_work_head_view'] =  $record->basic_wms_work_head ?? 'N/A';
            $project_master[$key]['name_of_schema'] =  $record->name_of_deputere->name ?? 'N/A';
            $project_master[$key]['project_name'] =  $record->name_of_project->name ?? 'N/A';

            $project_master[$key]['eye_icon'] = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewproposal(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#proposal_view" aria-label="View" data-bs-original-title="View';
            if (in_array(auth()->user()->role_id, [1, 2])) {
                $actionUrl = route('edit_project_master', $id);
            }
            if (in_array(auth()->user()->role_id, [3])) {
                $actionUrl = route('edit_budgetary_detail', $id);
            }
            if (in_array(auth()->user()->role_id, [4])) {
                $actionUrl = route('edit_dtp_approval', $id);
            }

            $sheetUrl = route('project_sheet', $id);
            $action = '<a class="btn btn-success btn-sm me-1" href="' . $sheetUrl . '"><i class="fa fa-file-excel-o"></i></a>';

            $action .= '<a class="btn btn-primary btn-sm me-1" href="' . $actionUrl . '"><i class="fa fa-pencil"></i></a>';
            if (in_array(auth()->user()->role_id, [1])) {
                $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            }
            $project_master[$key]['action'] =  $action;
        }
        return DataTables::of($project_master)
            ->addIndexColumn()
            ->rawColumns(['action', 'district_name_view', 'taluka_name_view', 'work_type_view', 'type_work_view', 'budget_name_view', 'budgetwork_name_view', 'mla_name_view', 'sent_box_name_view', 'eye_icon', 'name_of_schema', 'project_name'])
            ->make(true);
    }


    public function master_edit($id)
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $project_master = Master::where('id', '=', $id)->first();
        // if ($project_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $project_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        $division_name = DivisionMasters::orderBy('id')->get();
        $sub_division_name = SubDivisionMasters::orderBy('id')->get();
        $district_name = District::orderBy('id')->get();
        $taluka_name = Taluka::orderBy('id')->get();
        // $proposal = ProPosalMasters::orderBy('id')->get();
        $work_type = WorkTypes::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $budget = Budget::orderBy('id')->get();
        $budget_work = BudgetWork::orderBy('id')->get();
        $mp_mla = MpMlaSuggested::orderBy('id')->get();
        $sent_box = SentBox::orderBy('id')->get();
        $master_show = Master::orderBy('id')->get();
        $name_of_scheme  = NameOfSchema::orderBy('id')->get();
        $name_of_project  = NameOfProject::orderBy('id')->get();
        return view('pb_branch.edit_basic_branch', compact('division_name', 'sub_division_name', 'project_master', 'district_name', 'taluka_name', 'work_type', 'type_work', 'budget', 'budget_work', 'mp_mla', 'sent_box', 'name_of_scheme', 'name_of_project','user','role'));
    }


    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $project_master = Master::find($id);
        $project_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function project_export()
    {
        return  Excel::download(new ExportMasters, 'masters.xlsx');
    }

    public function projectSheet()
    {
        return view('admin.project_master.project_sheet');
    }
}
