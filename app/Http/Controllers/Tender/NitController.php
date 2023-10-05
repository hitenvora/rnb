<?php

namespace App\Http\Controllers\Tender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NitController extends Controller
{
    
    public function index()
    {
        return view('tender.nit');
    }
    
}
