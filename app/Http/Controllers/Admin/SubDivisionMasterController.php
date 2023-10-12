<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminLogin;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\SubDivisionMasters;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class SubDivisionMasterController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $divisionname = DivisionMasters::orderBy('id')->get();
        return view('admin.sub_division_master', compact('divisionname','user','role'));
    }

    public function insert(Request $request)
    {

        $rules = [
            'division_master_id' => 'required',
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->subdivision_id != '') {
            $sub_division_master = SubDivisionMasters::find($request->subdivision_id);
            if (!$sub_division_master) {
                return response()->json(['status' => 400, 'msg' => 'Sub division not found!']);
            }
        } else {
            $sub_division_master = new SubDivisionMasters();
        }
        $sub_division_master->division_master_id = $request->input('division_master_id');
        $sub_division_master->name = $request->input('name');
        $sub_division_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_sub_division_list(Request $request)
    {
        $sub_division_master = SubDivisionMasters::orderBy('id', 'desc')->get();

        foreach ($sub_division_master as $key => $record) {
            $id = $record->id;
            $sub_division_master[$key]['division_name_view'] =  $record->division_name->name;
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editsubdivision(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $sub_division_master[$key]['action'] =  $action;
        }
        return Datatables::of($sub_division_master)
            ->addIndexColumn()
            ->rawColumns(['action', 'division_name_view'])
            ->make(true);
    }

    public function sub_division_edit($id)
    {
        $sub_division_master = SubDivisionMasters::where('id', '=', $id)->first();
        if ($sub_division_master) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $sub_division_master]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $sub_division_master = SubDivisionMasters::find($id);
        $sub_division_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
