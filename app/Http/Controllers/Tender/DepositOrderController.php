<?php

namespace App\Http\Controllers\Tender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositOrderController extends Controller
{
    

    public function index()
    {
        return view('tender.deposit_order');
    }
    
}
