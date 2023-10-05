<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Role;
use App\Models\admin\UserMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserMasterController extends Controller
{
    public function index()
    {
        $rolename = Role::orderBy('id')->get();
        return view('admin.user_master', compact('rolename'));
    }

    public function insert(Request $request)
    {

        $rules = [
            'user_name' => 'required',
            'email' => 'required',
            'Mobile_No' => 'required||numeric|min:10',
            'user_password' => 'required|min:8',
            'Role_id' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->user_id != '') {
            $user_master = UserMaster::find($request->user_id);
            if (!$user_master) {
                return response()->json(['status' => 400, 'msg' => 'User not found!']);
            }
        } else {
            $user_master = new UserMaster();
        }
        $user_master->user_name = $request->input('user_name');
        $user_master->email = $request->input('email');
        $user_master->Mobile_No = $request->input('Mobile_No');
        $user_master->user_password =  Hash::make($request->user_password);
        $user_master->Role_id = $request->input('Role_id');
        $user_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_user_list(Request $request)
    {
        $user_master = UserMaster::orderBy('id', 'desc')->get();

        foreach ($user_master as $key => $record) {
            $id = $record->id;
            $user_master[$key]['role_name_view'] =  $record->role_name->name;
            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="edituser(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            $user_master[$key]['action'] =  $action;
        }
        return Datatables::of($user_master)
            ->addIndexColumn()
            ->rawColumns(['action','role_name_view'])
            ->make(true);
    }

    public function user_edit($id)
    {
        $employee_list = UserMaster::where('id', '=', $id)->first();
        if ($employee_list) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $employee_list]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $employee_list = UserMaster::find($id);
        $employee_list->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }


}
