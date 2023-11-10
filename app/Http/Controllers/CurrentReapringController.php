<?php

namespace App\Http\Controllers;

use App\Models\Admin\AdminLogin;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\TypesOfWork;
use App\Models\current_reapring\AgencyName;
use App\Models\current_reapring\CRSubDivisions;
use App\Models\current_reapring\CurrentReapring;
use App\Models\current_reapring\DetailOfWorkName;
use App\Models\current_reapring\RoadName;
use App\Models\Master\Master;
use App\Models\ReparingBill;
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
        $reparing_bills = ReparingBill::where('current_reapring_id', $id)->get();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('current_repairs.crrent_reapirs_bill_no', compact('user', 'role', 'division_name', 'type_work', 'cr_update', 'agency_name', 'reparing_bills'));
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

            $cr_road_name = $request->input('cr_road_name');
            if (isset($cr_road_name) && sizeof($cr_road_name)) {
                $cr_master->cr_road_name = implode(",", $cr_road_name);
            }


            $cr_catogry = $request->input('cr_catogry');
            if (isset($cr_catogry) && sizeof($cr_catogry)) {

                $cr_master->cr_catogry = implode(",", $cr_catogry);
            }
            $cr_start_date = $request->input('cr_start_date');
            if (isset($cr_start_date) && sizeof($cr_start_date)) {

                $cr_master->cr_start_date = implode(",", $cr_start_date);
            }
            $cr_end_date = $request->input('cr_end_date');
            if (isset($cr_end_date) && sizeof($cr_end_date)) {

                $cr_master->cr_end_date = implode(",", $cr_end_date);
            }

            $total_lentch = $request->input('total_lentch');
            if (isset($total_lentch) && sizeof($total_lentch)) {

                $cr_master->total_lentch = implode(",", $total_lentch);
            }

            $cr_type_of_work_id = $request->input('cr_type_of_work_id');
            if (isset($cr_type_of_work_id) && sizeof($cr_type_of_work_id)) {

                $cr_master->cr_type_of_work_id = implode(",", $cr_type_of_work_id);
            }
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

        if ($step == 'cr_bill') {
            if (sizeof($request->bill_status) > 0) {
                $bill_status = $request->bill_status;
                $amount = $request->amount;
                $bill_date = $request->bill_date;
                $is_final = $request->is_final;
                for ($i = 0; $i < sizeof($request->bill_status); $i++) {
                    $reparing_bill = ReparingBill::where('current_reapring_id', $request->master_id)->where('bill_status', $bill_status[$i])->first();
                    if (isset($reparing_bill)) {
                        $reparing_bill->bill_status = $request->bill_status[$i];
                        $reparing_bill->amount = $amount[$i];
                        $reparing_bill->bill_date = $bill_date[$i];
                        if (isset($is_final[$i])) {
                            $reparing_bill->is_final = $is_final[$i];
                        } else {
                            $reparing_bill->is_final = null;
                        }
                    } else {
                        $reparing_bill = new ReparingBill();
                        $reparing_bill->bill_status = $request->bill_status[$i];
                        $reparing_bill->amount = $amount[$i];
                        $reparing_bill->bill_date = $bill_date[$i];
                        if (isset($is_final[$i])) {
                            $reparing_bill->is_final = $is_final[$i];
                        } else {
                            $reparing_bill->is_final = null;
                        }
                    }
                    $reparing_bill->current_reapring_id = $request->master_id;
                    $reparing_bill->save();
                }
            }
        }


        $cr_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }












    //detils of work
    public function detils_of_work(Request $request)

    {

        $datils_of_work = DetailOfWorkName::where('current_repairs_id', $request->master_id)->delete();


        // if ($request->master_id != '') {
        //     if (!$datils_of_work) {
        //         return response()->json(['status' => 400, 'msg' => 'division not found!']);
        //     }
        // } else {
        $datils_of_work = new DetailOfWorkName();
        // }


        $dow_name_road = $request->input('dow_name_road');
        if (isset($dow_name_road) && sizeof($dow_name_road)) {

            $datils_of_work->dow_name_road = implode(",", $dow_name_road);
        }
        $dow_catogry = $request->input('dow_catogry');
        if (isset($dow_catogry) && sizeof($dow_catogry)) {

            $datils_of_work->dow_catogry = implode(",", $dow_catogry);
        }
        $dow_chainge_to = $request->input('dow_chainge_to');
        if (isset($dow_chainge_to) && sizeof($dow_chainge_to)) {

            $datils_of_work->dow_chainge_to = implode(",", $dow_chainge_to);
        }
        $dow_chainge_from = $request->input('dow_chainge_from');
        if (isset($dow_chainge_from) && sizeof($dow_chainge_from)) {

            $datils_of_work->dow_chainge_from = implode(",", $dow_chainge_from);
        }
        $dow_type_of_work = $request->input('dow_type_of_work');
        if (isset($dow_type_of_work) && sizeof($dow_type_of_work)) {

            $datils_of_work->dow_type_of_work = implode(",", $dow_type_of_work);
        }
        $dow_bill_amt = $request->input('dow_bill_amt');
        if (isset($dow_bill_amt) && sizeof($dow_bill_amt)) {

            $datils_of_work->dow_bill_amt = implode(",", $dow_bill_amt);
        }

        $datils_of_work->total_amount = $request->input('total_amount');
        $datils_of_work->current_repairs_id = $request->input('master_id');
        $datils_of_work->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }



    public function delete_repairing_bill(Request $request)
    {
        ReparingBill::where('id', $request->bill_id)->delete();
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
            $roadNames = RoadName::whereIn('id',explode(",",$record->cr_road_name))->select(['id', 'name'])->implode("name",',');
            $project_master[$key]['road_name_new'] =  $roadNames;
            $project_master[$key]['action'] =  $action;
        }
        return DataTables::of($project_master)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $project_master = CurrentReapring::find($id);
        $project_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function edit_cr($id)
    {
        $division_id = [1, 2, 3];
        $road_name = RoadName::where('sub_division_id', $division_id)->orderBy('id')->get();
        $division_name = CRSubDivisions::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $cr_update = CurrentReapring::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $roadNames = RoadName::where('sub_division_id', $cr_update->cr_division_id)->select(['id', 'name'])->get();
        return view('current_repairs.edit_curent_repairs', compact('cr_update', 'user', 'role', 'division_name', 'type_work', 'road_name', 'roadNames'));
    }

    public function getNameOfRoadData(Request $request)
    {
        $roadNames = RoadName::where('sub_division_id', $request->sub_division_id)->select(['id', 'name'])->get();
        return response()->json($roadNames);
    }

    public function getNameOfRoad(Request $request)
    {
        $roadName = RoadName::where('id', $request->road_id)->first();
        return response()->json($roadName);
    }

    public function edit_detils_of_work($id)
    {
        $division_name = DivisionMasters::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $cr_update = CurrentReapring::where('id', $id)->first();
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $detail_of_work = DetailOfWorkName::where('current_repairs_id', $id)->first();
        $roadNames = RoadName::select(['id', 'name'])->get();
        return view('current_repairs.edit_detail_of_work', compact('cr_update', 'user', 'role', 'division_name', 'roadNames', 'detail_of_work', 'type_work'));
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

    public function currentReapringDelete(Request $request)
    {
        $id =  $request->input('id');
        $currentRepairing = CurrentReapring::where('id', $id)->first();
        ReparingBill::where('current_reapring_id', $currentRepairing->id)->delete();
        $currentRepairing->delete();
        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
