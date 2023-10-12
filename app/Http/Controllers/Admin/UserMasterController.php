<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminLogin;
use App\Models\admin\Role;
use App\Models\admin\UserMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserMasterController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $rolename = Role::orderBy('id')->get();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        return view('admin.user_master', compact('rolename','user','role'));
    }

    public function insert(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile_no' => 'required||numeric|min:10',
            // 'user_password' => 'required|min:8',
            'role_id' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->user_id != '') {
            $user_master = AdminLogin::find($request->user_id);
            if (!$user_master) {
                return response()->json(['status' => 400, 'msg' => 'User not found!']);
            }
        } else {
            $user_master = new AdminLogin();
        }
        $user_master->name = $request->input('name');
        $user_master->email = $request->input('email');
        $user_master->mobile_no = $request->input('mobile_no');
        $user_master->password =  Hash::make($request->user_password);
        $user_master->role_id = $request->input('role_id');
        $user_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function get_user_list(Request $request)
    {
        $user_master = AdminLogin::with('role_name')->orderBy('id', 'desc')->get();
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
        $employee_list = AdminLogin::where('id', '=', $id)->first();
        if ($employee_list) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $employee_list]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $employee_list = AdminLogin::find($id);
        $employee_list->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }


}
