<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }


    public function login(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required',
        ];
        $this->validate($request, $rules);
        
        $credentials = $request->only('name', 'password');

        $admin = AdminLogin::where('name', $request->name)->first();

        if ($admin) {
            if ($admin->is_active == 0) {
                return redirect('admin/login')->with('error', 'Your Admin is Not Active!');
            }
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('master_form');
            }
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('./');
    }
}
