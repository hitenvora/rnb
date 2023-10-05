<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForestClearenceDetailController extends Controller
{
    public function index()
    {
        return view('pb_branch.forest_clearence_detail');
    }
}
