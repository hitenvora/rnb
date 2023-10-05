<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\SubDivisionMasters;
use App\Models\PbBranch\BlockEstimateSubmittedDetails;
use Illuminate\Http\Request;

class BlockEstimateSubmitDetailController extends Controller
{
    public function index()
    {
        // $block_estimate_show = BlockEstimateSubmittedDetails::orderBy('id')->get();
        $division_name = DivisionMasters::orderBy('id')->get();
        $sub_division_name = SubDivisionMasters::orderBy('id')->get();
        return view('pb_branch.block_estimate_submit_detail',compact('division_name','sub_division_name'));
    }

    // public function insert(Request $request)
    // {
    //     $rules = [
    //         'bes_letter_no' => 'required',
    //         'bes_letter_date' => 'required',
    //         'bes_amount' => 'required',
    //         'bes_letter_upload' => 'required',
    //         'bes_provision_in_estimate' => 'required',
    //         'bes_submit_letter' => 'required',
    //         'bes_submit_office_date' => 'required',
    //         'bes_office_letter_upload' => 'required',
    //         'division_id' => 'required',
    //         'sub_division_id' => 'required',
    //         'bes_status' => 'required',
    //         'bes_remark' => 'required',
    //         'bes_follow_up_date' => 'required'


    //     ];

    //     $this->validate($request, $rules);
    //     $image = $request->file('bes_office_letter_upload');
    //     $filename = '';

    //     if ($image == '') {
    //         return response()->json(['status' => '400', 'msg' => 'please select image']);
    //     }

    //     if (!empty($image)) {
    //         $filename = str_replace(' ', '', $image->getClientOriginalName());
    //         $image->move(public_path('upload/Letter-reminder/'), $filename);
    //     }

    //     $bes_letter = $request->file('bes_letter_upload');
    //     $bes_upload = '';

    //     if ($bes_letter == '') {
    //         return response()->json(['status' => '400', 'msg' => 'please select image']);
    //     }

    //     if (!empty($bes_letter)) {
    //         $bes_upload = str_replace(' ', '', $bes_letter->getClientOriginalName());
    //         $bes_letter->move(public_path('upload/Letter-reminder/'), $bes_upload);
    //     }

    //     if ($request->block_esmiate_id != '') {
    //         $block_estimate = BlockEstimateSubmittedDetails::find($request->block_esmiate_id);
    //         if (!$block_estimate) {
    //             return response()->json(['status' => 400, 'msg' => 'Princiapl Approval not found!']);
    //         }
    //     } else {
    //         $block_estimate = new BlockEstimateSubmittedDetails();
    //     }
    //     $block_estimate->bes_letter_no = $request->input('bes_letter_no');
    //     $block_estimate->bes_letter_date = $request->input('bes_letter_date');
    //     $block_estimate->bes_amount = $request->input('bes_amount');
    //     $block_estimate->bes_letter_upload = $bes_upload;
    //     $block_estimate->bes_provision_in_estimate = $request->input('bes_provision_in_estimate');
    //     $block_estimate->bes_submit_letter = $request->input('bes_submit_letter');
    //     $block_estimate->bes_submit_office_date = $request->input('bes_submit_office_date');
    //     $block_estimate->division_id = $request->input('division_id');
    //     $block_estimate->sub_division_id = $request->input('sub_division_id');
    //     $block_estimate->bes_follow_up_date = $request->input('bes_follow_up_date');
    //     $block_estimate->bes_status = $request->input('bes_status');
    //     $block_estimate->bes_remark = $request->input('bes_remark');
    //     $block_estimate->bes_office_letter_upload = $filename;
    //     $block_estimate->save();

    //     return response()->json(['status' => '200', 'msg' => 'success']);
    // }
}
