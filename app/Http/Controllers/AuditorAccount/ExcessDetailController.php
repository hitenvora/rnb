<?php

namespace App\Http\Controllers\AuditorAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcessDetailController extends Controller
{
    
    public function index()
    {
        return view('auditor_account.excess_detail');
    }
    
}
