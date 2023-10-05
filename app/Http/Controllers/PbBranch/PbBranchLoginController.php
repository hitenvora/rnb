<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use App\Models\PbBranch\PbBranchLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PbBranchLoginController extends Controller
{
  public function index()
  {
    return view('pb_branch.pb_branch_login');
  }

  public function login(Request $request)
  {
    $rules = [
      'name' => 'required',
      'password' => 'required',
    ];
    $this->validate($request, $rules);



    $credentials = $request->only('name', 'password');

    $pb_branch_login = PbBranchLogin::where('name', $request->name)->first();

    if ($pb_branch_login) {
      if ($pb_branch_login->is_active == 0) {
        return redirect('/pb/branch/login')->with('error', 'You Are Not Active!');
      }
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('basic_branch');
      }
    }

    return back()->withErrors(['error' => 'Invalid credentials']);
  }

  public function logout()
  {
    auth()->logout();
    return redirect('/pb/branch/login');
  }
}
