<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaqApprovalController extends Controller
{
    public function index()
    {
        return view('pb_branch.laq_approval');
    }

    
}
