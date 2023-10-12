<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\AdminLogin;
use Illuminate\Http\Request;

class MasterFormController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        
        return view('admin.master_form', compact('user','role'));
    }
}
