<?php

namespace App\Http\Controllers\AuditorAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FmgController extends Controller
{
    public function index()
    {
        return view('auditor_account.fmg');
    }
}
