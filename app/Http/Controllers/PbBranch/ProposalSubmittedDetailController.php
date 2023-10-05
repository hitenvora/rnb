<?php

namespace App\Http\Controllers\PbBranch;

use App\Http\Controllers\Controller;
use App\Models\PbBranch\ProposalSubmittedDetail;
use Illuminate\Http\Request;

class ProposalSubmittedDetailController extends Controller
{
    public function index()
    {
        // $proposal_show= ProposalSubmittedDetail::orderBy('id')->get();
        return view('pb_branch.proposal_submitted_detail');
    }

    // public function insert(Request $request)
    // {

    //     $rules = [
    //         'initiated_name' => 'required',
    //         'letter_no' => 'required',
    //         'letter_date' => 'required',
    //         'amount' => 'required',
    //         'treatment_detail' => 'required',
    //         'proposal_submitted_letter_no' => 'required',
    //         'proposal_submitted_letter_date' => 'required',
    //         'proposal_submission_office' => 'required',
    //         'letter_upload' => 'required'

    //     ];

    //     $this->validate($request, $rules);
    //     $image = $request->file('letter_upload');
    //     $filename = '';

    //     if ($image == '') {
    //         return response()->json(['status' => '400', 'msg' => 'please select image']);
    //     }

    //     if (!empty($image)) {
    //         $filename = str_replace(' ', '', $image->getClientOriginalName());
    //         $image->move(public_path('upload/Letter-reminder/'), $filename);
    //     }

    //     if ($request->proposal_submitted_id != '') {
    //         $proposal_submit = ProposalSubmittedDetail::find($request->proposal_submitted_id);
    //         if (!$proposal_submit) {
    //             return response()->json(['status' => 400, 'msg' => 'Proposal not found!']);
    //         }
    //     } else {
    //         $proposal_submit = new ProposalSubmittedDetail();
    //     }
    //     $proposal_submit->initiated_name = $request->input('initiated_name');
    //     $proposal_submit->letter_no = $request->input('letter_no');
    //     $proposal_submit->letter_date = $request->input('letter_date');
    //     $proposal_submit->amount = $request->input('amount');
    //     $proposal_submit->treatment_detail = $request->input('treatment_detail');
    //     $proposal_submit->proposal_submitted_letter_no = $request->input('proposal_submitted_letter_no');
    //     $proposal_submit->proposal_submitted_letter_date = $request->input('proposal_submitted_letter_date');
    //     $proposal_submit->proposal_submission_office = $request->input('proposal_submission_office');
    //     $proposal_submit->letter_upload = $filename;
    //     $proposal_submit->save();

    //     return response()->json(['status' => '200', 'msg' => 'success']);
    // }
}
