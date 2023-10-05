<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Budget;
use App\Models\Admin\BudgetWork;
use App\Models\Admin\District;
use App\Models\Admin\MpMlaSuggested;
use App\Models\Admin\ProPosalMasters;
use App\Models\Admin\SentBox;
use App\Models\Admin\Taluka;
use App\Models\Admin\TypesOfWork;
use App\Models\Admin\WorkTypes;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ProposalMasterController extends Controller
{
    public function index()
    {
        $districtname = District::orderBy('id')->get();
        $talukaname = Taluka::orderBy('id')->get();
        $worktype = WorkTypes::orderBy('id')->get();
        $typework = TypesOfWork::orderBy('id')->get();
        $budget = Budget::orderBy('id')->get();
        $budgetwork = BudgetWork::orderBy('id')->get();
        $mpmla = MpMlaSuggested::orderBy('id')->get();
        $sentbox = SentBox::orderBy('id')->get();

        return view('admin.proposal_master', compact('districtname', 'talukaname', 'worktype', 'typework', 'budget', 'budgetwork', 'mpmla', 'sentbox'));
    }

    public function insert(Request $request)
    {

        $rules = [
            'district_id' => 'required',
            'taluka_id' => 'required',
            'work_type_id' => 'required',
            'type_work_id' => 'required',
            'type_work' => 'required',
            'budget_id' => 'required',
            'budget' => 'required',
            'budget_work_id' => 'required',
            'budget_work' => 'required',
            'amount' => 'required',
            'mp_mla_id' => 'required',
            'mp_mla' => 'required',
            'letter_no' => 'required',
            'letter_date' => 'required',
            // 'upload_img' => 'required',
            'suggest' => 'required',
            'recever_from' => 'required',
            'rec_letter_no' => 'required',
            'rec_letter_date' => 'required',
            'rec_letter_amount' => 'required',
            'sent_proposal' => 'required',
            'sent_proposal_letter_no' => 'required',
            'sent_proposal_date' => 'required',
            'sent_proposal_amount' => 'required',
            'sent_box_id' => 'required',
            'sent_box' => 'required',
            'sent_box_date' => 'required',
            'sent_box_remark' => 'required',
        ];

        $this->validate($request, $rules);
        $image = $request->file('upload_img');
        $filename = '';

        if ($image == '') {
            return response()->json(['status' => '400', 'msg' => 'please select image']);
        }

        if (!empty($image)) {
            $filename = str_replace(' ', '', $image->getClientOriginalName());
            $image->move(public_path('upload/Letter-reminder/'), $filename);
        }

        if ($request->proposal_master_id != '') {
            $proposal_master = ProPosalMasters::find($request->proposal_master_id);
            if (!$proposal_master) {
                return response()->json(['status' => 400, 'msg' => 'Sub division not found!']);
            }
        } else {
            $proposal_master = new ProPosalMasters();
        }
        $proposal_master->district_id = $request->input('district_id');
        $proposal_master->taluka_id = $request->input('taluka_id');
        $proposal_master->work_type_id = $request->input('work_type_id');
        $proposal_master->type_work_id = $request->input('type_work_id');
        $proposal_master->type_work = $request->input('type_work');
        $proposal_master->budget_id = $request->input('budget_id');
        $proposal_master->budget = $request->input('budget');
        $proposal_master->budget_work_id = $request->input('budget_work_id');
        $proposal_master->budget_work = $request->input('budget_work');
        $proposal_master->amount = $request->input('amount');
        $proposal_master->mp_mla_id = $request->input('mp_mla_id');
        $proposal_master->mp_mla = $request->input('mp_mla');
        $proposal_master->letter_no = $request->input('letter_no');
        $proposal_master->letter_date = $request->input('letter_date');
        $proposal_master->upload_img = $filename;
        $proposal_master->suggest = $request->input('suggest');
        $proposal_master->recever_from = $request->input('recever_from');
        $proposal_master->rec_letter_no = $request->input('rec_letter_no');
        $proposal_master->rec_letter_date = $request->input('rec_letter_date');
        $proposal_master->rec_letter_amount = $request->input('rec_letter_amount');
        $proposal_master->sent_proposal = $request->input('sent_proposal');
        $proposal_master->sent_proposal_letter_no = $request->input('sent_proposal_letter_no');
        $proposal_master->sent_proposal_date = $request->input('sent_proposal_date');
        $proposal_master->sent_proposal_amount = $request->input('sent_proposal_amount');
        $proposal_master->sent_box_id = $request->input('sent_box_id');
        $proposal_master->sent_box = $request->input('sent_box');
        $proposal_master->sent_box_date = $request->input('sent_box_date');
        $proposal_master->sent_box_remark = $request->input('sent_box_remark');


        $proposal_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }


    public function get_proposal_master(Request $request)
    {
        $proposal_master = ProPosalMasters::orderBy('id', 'desc')->get();

        foreach ($proposal_master as $key => $record) {
            $id = $record->id;
            $proposal_master[$key]['district_name_view'] =  $record->district_name->name;
            $proposal_master[$key]['taluka_name_view'] =  $record->taluka_name->name;
            $proposal_master[$key]['work_type_view'] =  $record->work_type->name;
            // $proposal_master[$key]['type_work_view'] =  $record->type_work->name;
            $proposal_master[$key]['budget_name_view'] =  $record->budget_name->name;
            $proposal_master[$key]['budgetwork_name_view'] =  $record->budgetwork_name->name;
            $proposal_master[$key]['mla_name_view'] =  $record->mla_name->name;
            $proposal_master[$key]['sent_box_name_view'] =  $record->sent_box_name->name;

            $proposal_master[$key]['eye_icon'] = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewproposal(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#proposal_view" aria-label="View" data-bs-original-title="View';


            $action = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="editproposal(' . $id . ')" title="Edit"><i class="fa fa-pencil"></i></button>';
            $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';

            $proposal_master[$key]['action'] =  $action;
        }
        return Datatables::of($proposal_master)
            ->addIndexColumn()
            ->rawColumns(['action', 'district_name_view', 'taluka_name_view', 'work_type_view', 'type_work_view', 'budget_name_view', 'budgetwork_name_view', 'mla_name_view', 'sent_box_name_view', 'eye_icon'])
            ->make(true);
    }

    public function proposal_master_edit($id)
    {
        $proposal_master = ProPosalMasters::where('id', '=', $id)->first();
        if ($proposal_master) {
            return response()->json(['status' => '200', 'msg' => 'success', 'data' => $proposal_master]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }

    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $proposal_master = ProPosalMasters::find($id);
        $proposal_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function show_proposal_master($id)
    {
        $proposal_master = ProPosalMasters::with('district_name', 'taluka_name', 'work_type', 'type_work', 'budget_name', 'budgetwork_name', 'mla_name', 'sent_box_name')->where('id', $id)->first();
        if ($proposal_master) {
            return response()->json([
                'status' => '200',
                'msg' => 'success',
                'data' =>  $proposal_master
            ]);
        }
        return response()->json(['status' => '200', 'msg' => 'success'], 400);
    }
}
