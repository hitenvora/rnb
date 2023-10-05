<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use App\Models\PbBranch\AdministrativeApproval;
use Illuminate\Http\Request;

class AdministrativeApprovalController extends Controller
{
    public function index()
    {
        // $aa_show= AdministrativeApproval::orderBy('id')->get();
        return view('pb_branch.administrative_approval');
    }

    // public function insert(Request $request)
    // {
    //     $rules = [
    //         'aa_letter_no' => 'required',
    //         'aa_letter_date' => 'required',
    //         'aa_amount' => 'required',
    //         'aa_letter_upload' => 'required',
    //         'aa_approved_by' => 'required',
    //         'aa_detail_regarding_architecture' => 'required'
    //     ];

    //     $this->validate($request, $rules);
    //     $image = $request->file('aa_letter_upload');
    //     $filename = '';

    //     if ($image == '') {
    //         return response()->json(['status' => '400', 'msg' => 'please select image']);
    //     }

    //     if (!empty($image)) {
    //         $filename = str_replace(' ', '', $image->getClientOriginalName());
    //         $image->move(public_path('upload/Letter-reminder/'), $filename);
    //     }


    //     if ($request->administrative_approval_id != '') {
    //         $adminstrative_approval = AdministrativeApproval::find($request->administrative_approval_id);
    //         if (!$adminstrative_approval) {
    //             return response()->json(['status' => 400, 'msg' => 'Administrative Approval not found!']);
    //         }
    //     } else {
    //         $adminstrative_approval = new AdministrativeApproval();
    //     }
    //     $adminstrative_approval->aa_letter_no = $request->input('aa_letter_no');
    //     $adminstrative_approval->aa_letter_date = $request->input('aa_letter_date');
    //     $adminstrative_approval->aa_amount = $request->input('aa_amount');
    //     $adminstrative_approval->aa_approved_by = $request->input('aa_approved_by');
    //     $adminstrative_approval->aa_detail_regarding_architecture = $request->input('aa_detail_regarding_architecture');
    //     $adminstrative_approval->aa_letter_upload = $filename;
    //     $adminstrative_approval->save();

    //     return response()->json(['status' => '200', 'msg' => 'success']);
    // }
}
