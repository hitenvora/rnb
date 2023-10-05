<?php

namespace App\Http\Controllers\AuditorAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DlpPeriodController extends Controller
{
    public function index()
    {
        return view('auditor_account.dlp_period');
    }
    
}
