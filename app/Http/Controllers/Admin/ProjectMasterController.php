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
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectMasterController extends Controller
{
    public function index()
    {
        return view('admin.project_master.index');
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
        return view('admin.project_master.create', compact('division_name', 'sub_division_name', 'district_name', 'taluka_name', 'work_type', 'type_work', 'budget', 'budget_work', 'mp_mla', 'sent_box'));
    }

    public function get_project_master(Request $request)
    {
        $project_master = Master::orderBy('id', 'desc')->get();

        // dd($project_master);
        foreach ($project_master as $key => $record) {
            $id = $record->id;
            // $project_master[$key]['district_name_view'] =  $record->district_view->name;
            // $project_master[$key]['taluka_name_view'] =  $record->taluka_name->name;
            // $project_master[$key]['work_type_view'] =  $record->work_type->name;
            // // $project_master[$key]['type_work_view'] =  $record->type_work->name;
            // $project_master[$key]['budget_name_view'] =  $record->budget_name->name;
            // $project_master[$key]['budgetwork_name_view'] =  $record->budgetwork_name->name;
            // $project_master[$key]['mla_name_view'] =  $record->mla_name->name;
            // $project_master[$key]['sent_box_name_view'] =  $record->sent_box_name->name;
            // $project_master[$key]['wms_work_head_view'] =  $record->basic_wms_work_head ?? 'N/A';
            $project_master[$key]['eye_icon'] = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewproposal(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#proposal_view" aria-label="View" data-bs-original-title="View';


            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editmaster(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';

            $project_master[$key]['action'] =  $action;
        }
        return DataTables::of($project_master)
            ->addIndexColumn()
            ->rawColumns(['action', 'district_name_view', 'taluka_name_view', 'work_type_view', 'type_work_view', 'budget_name_view', 'budgetwork_name_view', 'mla_name_view', 'sent_box_name_view', 'eye_icon'])
            ->make(true);
    }


    public function master_edit($id)
    {
        $project_master = Master::where('id', '=', $id)->first();
        if ($project_master) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $project_master]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }


    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $project_master = Master::find($id);
        $project_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
