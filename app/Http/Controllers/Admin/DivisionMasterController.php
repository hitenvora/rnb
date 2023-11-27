<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminLogin;
use App\Models\Admin\DivisionMasters;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
    

class DivisionMasterController extends Controller
{
    public function index()
    { $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('admin.division_master',compact('user','role'));
    }

    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->division_id != '') {
            $division_master = DivisionMasters::find($request->division_id);
            if (!$division_master) {
                return response()->json(['status' => 400, 'msg' => 'division not found!']);
            }
        } else {
            $division_master = new DivisionMasters();
        }
        $division_master->name = $request->input('name');
        $division_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_division_list(Request $request)
    {
        $division_master = DivisionMasters::orderBy('id', 'desc')->get();

        foreach ($division_master as $key => $record) {
            $id = $record->id;
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editdivision(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $division_master[$key]['action'] =  $action;
        }
        return Datatables::of($division_master)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function division_edit($id)
    {
        $division_master = DivisionMasters::where('id', '=', $id)->first();
        if ($division_master) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $division_master]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $division_master = DivisionMasters::find($id);
        $division_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }


}
