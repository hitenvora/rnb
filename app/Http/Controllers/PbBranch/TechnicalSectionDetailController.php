<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use App\Models\PbBranch\TechnicalSectionDetails;
use Illuminate\Http\Request;

class TechnicalSectionDetailController extends Controller
{
    public function index()
    {
        return view('pb_branch.technical_section_detail');
    }

    // public function insert(Request $request)
    // {
    //     $rules = [
    //         'tsd_letter_no' => 'required',
    //         'tsd_letter_date' => 'required',
    //         'tsd_amount' => 'required',
    //         'tsd_letter_upload' => 'required',
    //         'tsd_approved_by' => 'required',
    //         'tsd_provision_in_ts_estimate' => 'required'
    //     ];

    //     $this->validate($request, $rules);
    //     $image = $request->file('tsd_letter_upload');
    //     $filename = '';

    //     if ($image == '') {
    //         return response()->json(['status' => '400', 'msg' => 'please select image']);
    //     }

    //     if (!empty($image)) {
    //         $filename = str_replace(' ', '', $image->getClientOriginalName());
    //         $image->move(public_path('upload/Letter-reminder/'), $filename);
    //     }


    //     if ($request->technical_sd_id != '') {
    //         $technical_sd = TechnicalSectionDetails::find($request->technical_sd_id);
    //         if (!$technical_sd) {
    //             return response()->json(['status' => 400, 'msg' => 'Administrative Approval not found!']);
    //         }
    //     } else {
    //         $technical_sd = new TechnicalSectionDetails();
    //     }
    //     $technical_sd->tsd_letter_no = $request->input('tsd_letter_no');
    //     $technical_sd->tsd_letter_date = $request->input('tsd_letter_date');
    //     $technical_sd->tsd_amount = $request->input('tsd_amount');
    //     $technical_sd->tsd_approved_by = $request->input('tsd_approved_by');
    //     $technical_sd->tsd_provision_in_ts_estimate = $request->input('tsd_provision_in_ts_estimate');
    //     $technical_sd->tsd_letter_upload = $filename;
    //     $technical_sd->save();

    //     return response()->json(['status' => '200', 'msg' => 'success']);
    // }
}
