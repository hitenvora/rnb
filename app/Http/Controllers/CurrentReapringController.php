<?php

namespace App\Http\Controllers;

use App\Models\admin\AdminLogin;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\TypesOfWork;
use App\Models\current_reapring\AgencyName;
use App\Models\current_reapring\CRSubDivisions;
use App\Models\current_reapring\CurrentReapring;
use App\Models\current_reapring\RoadName;
use App\Models\Master\Master;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CurrentReapringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('current_repairs.current_repairs_master', compact('user', 'role'));
    }
    public function current_reparing()

    {
        // $project_master = Master::where('id', $id)->first();
        $road_name = RoadName::orderBy('id')->get();
        $division_name = CRSubDivisions::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('current_repairs.curent_repairs', compact('user', 'role', 'division_name', 'type_work', 'road_name'));
    }

    public function edit_cr_basic($id)

    {

        $cr_update = CurrentReapring::where('id', $id)->first();
        // $project_master = Master::where('id', $id)->first();
        $division_name = DivisionMasters::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $agency_name = AgencyName::orderBy('id')->get();

        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('current_repairs.edit_curent_repairs_basic', compact('user', 'role', 'division_name', 'type_work', 'cr_update', 'agency_name'));
    }

    public function edit_bill_no($id)

    {

        $cr_update = CurrentReapring::where('id', $id)->first();
        // $project_master = Master::where('id', $id)->first();
        $division_name = DivisionMasters::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $agency_name = AgencyName::orderBy('id')->get();

        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('current_repairs.crrent_reapirs_bill_no', compact('user', 'role', 'division_name', 'type_work', 'cr_update', 'agency_name'));
    }

    public function insert(Request $request)
    {


        if ($request->master_id != '') {
            $cr_master = CurrentReapring::find($request->master_id);
            if (!$cr_master) {
                return response()->json(['status' => 400, 'msg' => 'division not found!']);
            }
        } else {
            $cr_master = new CurrentReapring();
        }
        $step = $request->step;
        if ($step == '') {
            return response()->json(['status' => '400', 'msg' => 'Invalid step']);
        }

        if ($step == 'cr') {

            $cr_master->cr_division_id = $request->input('cr_division_id');
            $cr_master->cr_name_of_section = $request->input('cr_name_of_section');
            $cr_master->cr_road_name = $request->input('cr_road_name');
            $cr_master->cr_start_date = $request->input('cr_start_date');
            $cr_master->cr_end_date = $request->input('cr_end_date');
            $cr_master->cr_catogry = $request->input('cr_catogry');
            $cr_master->total_lentch = $request->input('total_lentch');
            $cr_master->cr_type_of_work_id = $request->input('cr_type_of_work_id');
        }

        //detils of work

        if ($step == 'cr_detils_of_work') {
            $cr_master->cr_name_of_road = $request->input('cr_name_of_road');
            $cr_master->cr_type_work = $request->input('cr_type_work');
            $cr_master->cr_chainge = $request->input('cr_chainge');
            $cr_master->cr_chainge_to = $request->input('cr_chainge_to');
            $cr_master->cr_dow_bill_no = $request->input('cr_dow_bill_no');
            $cr_master->cr_dow_bill_date = $request->input('cr_dow_bill_date');
            $cr_master->cr_dow_bill_amount = $request->input('cr_dow_bill_amount');
        }

        //basic
        if ($step == 'cr_basic') {
            $cr_master->cr_subdivision_to = $request->input('cr_subdivision_to');
            $cr_master->cr_letter_date_name_of_section = $request->input('cr_letter_date_name_of_section');
            $cr_master->cr_section = $request->input('cr_section');
            // $cr_master->ct_tsi = $request->input('ct_tsi');
            // $cr_master->ct_persual = $request->input('ct_persual');

            $cr_master->ct_ts_persual = $request->input('ts_persual');
            $cr_master->ct_work = $request->input('ct_work');
            $cr_master->ct_ts_no = $request->input('ct_ts_no');
            $cr_master->ct_date = $request->input('ct_date');
            $cr_master->ct_letter_no = $request->input('ct_letter_no');
            $cr_master->ct_amount = $request->input('ct_amount');
            $cr_master->ct_leter_no = $request->input('ct_leter_no');
            $cr_master->ct_persual_date = $request->input('ct_persual_date');
            $cr_master->ct_persual_amount = $request->input('ct_persual_amount');
            $cr_master->cr_egncy_name = $request->input('cr_egncy_name');
        }


        $cr_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function cr_edit(Request $request)
    {
        $project_master = CurrentReapring::orderBy('id', 'desc')->get();

        // dd($project_master);
        foreach ($project_master as $key => $record) {
            $id = $record->id;
            // $project_master[$key]['district_name_view'] =  $record->district->name ?? 'N/A';
            // $project_master[$key]['name_of_schema'] =  $record->name_of_deputere->name ?? 'N/A';
            // $project_master[$key]['project_name'] =  $record->name_of_project->name ?? 'N/A';

            $project_master[$key]['eye_icon'] = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewproposal(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#proposal_view" aria-label="View" data-bs-original-title="View';
            $actionUrl = route('edit_current_repairs', $id);

            $sheetUrl = route('cr_master', $id);
            // $action = '<a class="btn btn-success btn-sm me-1" href="' . $sheetUrl . '"><i class="fa fa-file-excel-o"></i></a>';

            $action = '<a class="btn btn-primary btn-sm me-1" href="' . $actionUrl . '"><i class="fa fa-pencil"></i></a>';
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


    public function edit_cr($id)
    {
        $road_name = RoadName::orderBy('id')->get();
        $division_name = CRSubDivisions::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $cr_update = CurrentReapring::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();

        return view('current_repairs.edit_curent_repairs', compact('cr_update', 'user', 'role', 'division_name', 'type_work', 'road_name'));
    }

    public function edit_detils_of_work($id)
    {
        $division_name = DivisionMasters::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $cr_update = CurrentReapring::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();

        return view('current_repairs.edit_detail_of_work', compact('cr_update', 'user', 'role', 'division_name', 'type_work'));
    }


    public function cr_agency_name(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->current_agency_id != '') {
            $add_name_of_project = AgencyName::find($request->current_agency_id);
            if (!$add_name_of_project) {
                return response()->json(['status' => 400, 'msg' => 'Tender not found!']);
            }
        } else {
            $add_name_of_project = new AgencyName();
        }
        $add_name_of_project->name = $request->input('name');
        $add_name_of_project->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function getRoadNames($divisionId)
    {
        // Fetch road names from your database based on $divisionId
        $roadNames = RoadName::where('sub_division_id', $divisionId)->get();

        return response()->json($roadNames);
    }

    public function getRoadInfo($roadId)
    {
        // Fetch road information from your database based on $roadId
        $roadInfo = RoadName::where('id', $roadId)->first();
        return response()->json($roadInfo);
    }
}
