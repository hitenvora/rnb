<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use App\Models\PbBranch\PrincipalApprovalDetails;
use Illuminate\Http\Request;

class PrincipalApprovalDetailController extends Controller
{
    public function index()
    {
        // $principal_show=PrincipalApprovalDetails::orderBy('id')->get();
        return view('pb_branch.principal_approval_detail');
    }

    // public function insert(Request $request)
    // {
    //     $rules = [
    //         'pad_letter_no' => 'required',
    //         'pad_letter_date' => 'required',
    //         'pad_amount' => 'required',
    //         'pad_approved_by' => 'required',
    //         'pad_letter_upload' => 'required'


    //     ];

    //     $this->validate($request, $rules);
    //     $image = $request->file('pad_letter_upload');
    //     $filename = '';

    //     if ($image == '') {
    //         return response()->json(['status' => '400', 'msg' => 'please select image']);
    //     }

    //     if (!empty($image)) {
    //         $filename = str_replace(' ', '', $image->getClientOriginalName());
    //         $image->move(public_path('upload/Letter-reminder/'), $filename);
    //     }

    //     if ($request->principal_approval_id != '') {
    //         $principal_approval = PrincipalApprovalDetails::find($request->principal_approval_id);
    //         if (!$principal_approval) {
    //             return response()->json(['status' => 400, 'msg' => 'Princiapl Approval not found!']);
    //         }
    //     } else {
    //         $principal_approval = new PrincipalApprovalDetails();
    //     }
    //     $principal_approval->pad_letter_no = $request->input('pad_letter_no');
    //     $principal_approval->pad_letter_date = $request->input('pad_letter_date');
    //     $principal_approval->pad_amount = $request->input('pad_amount');
    //     $principal_approval->pad_approved_by = $request->input('pad_approved_by');
    //     $principal_approval->pad_letter_upload = $filename;
    //     $principal_approval->save();

    //     return response()->json(['status' => '200', 'msg' => 'success']);
    // }
}
