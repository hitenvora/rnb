<?php

namespace App\Http\Controllers\Tender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DtpApprovalController extends Controller
{
    public function index()
    {
        return view('tender.dtp_approval');
    }
    
}
