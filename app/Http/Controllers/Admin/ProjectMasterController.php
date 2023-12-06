<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Budget;
use App\Models\Admin\BudgetWork;
use App\Models\Admin\District;
use App\Models\Admin\DivisionMasters;
use App\Models\Admin\MpMlaSuggested;
use App\Models\Admin\SentBox;
use App\Models\Admin\SubDivisionMasters;
use App\Models\Admin\Taluka;
use App\Models\Admin\TypesOfWork;
use App\Models\Admin\WorkTypes;
use App\Models\Master\Master;
use App\Models\PbBranch\NameOfSchema;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\ExportMasters;
use App\Models\Admin\AdminLogin;
use App\Models\PbBranch\NameOfProject;
use Maatwebsite\Excel\Facades\Excel;

class ProjectMasterController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();

        return view('admin.project_master.index', compact('user', 'role'));
    }

    public function create()
    {
        $division_name = DivisionMasters::orderBy('id')->get();
        $sub_division_name = SubDivisionMasters::orderBy('id')->get();
        $district_name = District::orderBy('id')->get();
        $taluka_name = Taluka::orderBy('id')->get();
        // $proposal = ProPosalMasters::orderBy('id')->get();
        $work_type = WorkTypes::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $budget = Budget::orderBy('id')->get();
        $budget_work = BudgetWork::orderBy('id')->get();
        $mp_mla = MpMlaSuggested::orderBy('id')->get();
        $sent_box = SentBox::orderBy('id')->get();
        $master_show = Master::orderBy('id')->get();

        return view('admin.project_master.create', compact('division_name', 'sub_division_name', 'district_name', 'taluka_name', 'work_type', 'type_work', 'budget', 'budget_work', 'mp_mla', 'sent_box', 'name_of_scheme'));
    }

    public function get_project_master(Request $request)
    {
        $project_master = Master::orderBy('id', 'desc')->get();

        // dd($project_master);
        foreach ($project_master as $key => $record) {
            $id = $record->id;
            $project_master[$key]['district_name_view'] =  $record->district->name ?? '-';
            // $project_master[$key]['taluka_name_view'] =  $record->taluka_name->name;
            // $project_master[$key]['work_type_view'] =  $record->work_type->name;
            // // $project_master[$key]['type_work_view'] =  $record->type_work->name;
            // $project_master[$key]['budget_name_view'] =  $record->budget_name->name;
            // $project_master[$key]['budgetwork_name_view'] =  $record->budgetwork_name->name;
            // $project_master[$key]['mla_name_view'] =  $record->mla_name->name;
            // $project_master[$key]['sent_box_name_view'] =  $record->sent_box_name->name;
            // $project_master[$key]['wms_work_head_view'] =  $record->basic_wms_work_head ?? '-';
            $project_master[$key]['name_of_schema'] =  $record->name_of_deputere->name ?? '-';
            $project_master[$key]['project_name'] =  $record->name_of_project->name ?? '-';

            $project_master[$key]['eye_icon'] = '<button type="button" class="btn btn-primary btn-sm me-1" onclick="viewproposal(' . $record->id . ')"  title="View"><i class="fa fa-eye"></i></button>
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#proposal_view" aria-label="View" data-bs-original-title="View';
            if (in_array(auth()->user()->role_id, [1, 2])) {
                $actionUrl = route('edit_project_master', $id);
            }
            if (in_array(auth()->user()->role_id, [3])) {
                $actionUrl = route('edit_budgetary_detail', $id);
            }
            if (in_array(auth()->user()->role_id, [4])) {
                $actionUrl = route('edit_dtp_approval', $id);
            }

            // $sheetUrl = route('project_sheet', $id);
            // $action = '<a class="btn btn-success btn-sm me-1" href="' . $sheetUrl . '"><i class="fa fa-file-excel-o"></i></a>';

            $action = '<a class="btn btn-primary btn-sm me-1" href="' . $actionUrl . '"><i class="fa fa-pencil"></i></a>';
            if (in_array(auth()->user()->role_id, [1])) {
                $action .= '<button type="button" class="btn btn-danger btn-sm" onclick="daletetabledata(' . $id . ')" title="Delete"><i class="fa fa-trash"></i></button>';
            }
            $project_master[$key]['action'] =  $action;
            $project_master[$key]['basic_name_scheme_new'] = NameOfSchema::whereIn('id',explode(",",$record->basic_name_scheme))->implode('name', ', ');
        }
        return DataTables::of($project_master)
            ->addIndexColumn()
            ->rawColumns(['action', 'district_name_view', 'taluka_name_view', 'work_type_view', 'type_work_view', 'budget_name_view', 'budgetwork_name_view', 'mla_name_view', 'sent_box_name_view', 'eye_icon', 'name_of_schema', 'project_name'])
            ->make(true);
    }


    public function master_edit($id)
    {
        $user = auth()->user();
        $role = AdminLogin::with('rolename')->where('id', '=', $user->id)->first();
        $project_master = Master::where('id', '=', $id)->first();
        // if ($project_master) {
        //     return response()->json(['status' => '200', 'msg' => 'success', 'data' => $project_master]);
        // }
        // return response()->json(['status' => '200', 'msg' => 'success'], 400);
        $division_name = DivisionMasters::orderBy('id')->get();
        $sub_division_name = SubDivisionMasters::orderBy('id')->get();
        $district_name = District::orderBy('id')->get();
        $taluka_name = Taluka::orderBy('id')->get();
        // $proposal = ProPosalMasters::orderBy('id')->get();
        $work_type = WorkTypes::orderBy('id')->get();
        $type_work = TypesOfWork::orderBy('id')->get();
        $budget = Budget::orderBy('id')->get();
        $budget_work = BudgetWork::orderBy('id')->get();
        $mp_mla = MpMlaSuggested::orderBy('id')->get();
        $sent_box = SentBox::orderBy('id')->get();
        $master_show = Master::orderBy('id')->get();
        $name_of_scheme  = NameOfSchema::where('id',$project_master->basic_name_scheme)->orderBy('id')->get();
        $name_of_project  = NameOfProject::orderBy('id')->get();

        $selectedSchemeId = $project_master->basic_name_scheme;
        return view('pb_branch.edit_basic_branch', compact('division_name', 'sub_division_name', 'project_master', 'district_name', 'taluka_name', 'work_type', 'type_work', 'budget', 'budget_work', 'mp_mla', 'sent_box', 'name_of_scheme', 'name_of_project', 'user', 'role', 'selectedSchemeId'));
    }


    public function delete(Request $request)
    {
        $id =  $request->input('id');
        $project_master = Master::where('id',$id)->first();
        $project_master->delete();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function project_export_page()
    {
        return view('admin.project_master.excel_sheet');
    }

    public function project_export(Request $request)
    {
        $customHeadings = [
            'id' => 'Sr.No',
            'budget_id' => 'Basic - Budget',
            'basic_name_scheme' => 'Basic - Name of Scheme',
            'basic_name_project' => 'Basic - Name of Project',
            'basic_wms_work_head' => 'Basic - WMS Work Head.',
            'district_id' => 'Basic - Received Proposal - District',
            'taluka_id' => 'Basic - Received Proposal - Taluka',
            'work_type_id' => 'Basic - Received Proposal - Work Type',
            'types_of_work' => 'Basic - Received Proposal - Type Of Work',
            'basic_type_work_name' => 'Basic - Received Proposal - Name Of Work',
            'basic_buget_work' => 'Basic - Received Proposal - Budget Work / Item / Page No.',
            'basic_budget_work_name' => 'Basic - Received Proposal - Jogvay',
            'basic_amount' => 'Basic - Received Proposal - Amount in Lakh',
            'basic_mp_mla' => 'Basic - Received Proposal - MP/MLA Suggested',
            'basic_letter_no' => 'Basic - Received Proposal - Letter No.',
            'basic_letter_date' => 'Basic - Received Proposal - Letter Date',
            'basic_suggest' => 'Basic - Received Proposal - Suggestion',
            'basic_sent_proposal' => ' Basic - Sent Proposal - Sent Proposal To',
            'basic_sent_proposal_letter_no' => 'Basic - Sent Proposal - Letter No.',
            'basic_sent_proposal_date' => 'Basic - Sent Proposal - Letter Date',
            'basic_sent_proposal_amount' => 'Basic - Sent Proposal - Amount',
            'sent_box_id' => 'Basic - Received Proposal - Sent Box',
            'basic_sent_box_date' => 'Basic - Received Proposal - Date',
            'basic_sent_box_name' => 'Basic - Received Proposal - Amount',
            'basic_sent_box_remark' => 'Basic - Received Proposal - Letter No',
            'basic_name_of_department' => 'Basic - Name of Department',
            'division_master_id' => 'Basic - Proposal Division',
            'sub_division_master_id' => 'Basic - Proposal Subdivision',
            'basic_circle_name' => 'Basic - Proposal Circle',
            'basic_name_of_road' => 'Basic - Name of Road,Length & Width As Per F1-F2 with Challenge',
            'basic_category_of_road' => 'Basic - Category of Road(SH, MDR, ODR,VR) With Highway No.',
            'ppd_treatment_detail' => 'Basic - Treatment details',
            'pad_letter_no' => 'Principal Approval - Letter No.',
            'pad_letter_date' => 'Principal Approval - Letter Date',
            'pad_amount' => 'Principal Approval - Amount',
            'pad_approved_by' => 'Principal Approval - Approved By',
            'bes_letter_no' => 'Block Estimate Submitted - Letter No.',
            'bes_letter_date' => 'Block Estimate Submitted - Letter Date',
            'bes_amount' => 'Block Estimate Submitted - Amount',
            'bes_provision_in_estimate' => 'Block Estimate Submitted - Provision in Estimate',
            'bes_submit_letter' => 'Block Estimate Submitted - Submitted Letter No.',
            'bes_submit_office_date' => 'Block Estimate Submitted - Submission Office Date',
            'division_id' => 'Block Estimate Submitted - Submitted_To',
            'bes_follow_up_date' => ' Block Estimate Submitted - Follow Up date',
            'bes_status' => 'Block Estimate Submitted - Status',
            'bes_remark' => 'Block Estimate Submitted - Remark',
            'aa_letter_no' => 'Administrative - Letter No.',
            'aa_letter_date' => 'Administrative - Letter Date',
            'aa_amount' => 'Administrative - Amount',
            'aa_approved_by' => 'Administrative - Approved By',
            'aa_detail_regarding_architecture' => 'Administrative - Detail Regarding Architecture/Structural Drawings, If Any',
            'tsd_letter_no' => 'Technical Section - Letter No.',
            'tsd_letter_date' => 'Technical Section - Letter Date',
            'tsd_amount' => 'Technical Section - Amount',
            'tsd_approved_by' => 'Technical Section - Approved By',
            'tsd_provision_in_ts_estimate' => 'Technical Section - Provision in TS Estimate(Treatment Details, Structural Details & Other Provisense)',
            'forest_chainage' => 'Forest Clearance - Chainage',
            'forest_protected' => 'Forest Clearance - Protected/Non Protected',
            'forest_no_trees' => 'Forest Clearance - No. Of Trees',
            'forest_area_hect' => 'Forest Clearance - Area(hect.)',
            'forest_appr_state' => 'Forest Clearance - Approval to be accorded by District/State/Gandhinagar',
            'forest_proposal_submit' => 'Forest Clearance - Proposal Submitted To',
            'forest_letter_no' => 'Forest Clearance - Letter No.',
            'forest_letter_date' => 'Forest Clearance - Letter Date',
            'forest_online_no' => 'Forest Clearance - Online Proposal Submission No.',
            'forest_online_date' => 'Forest Clearance - Online Proposal Submission Date',
            'forest_joint_site' => "Forest Clearance - Joint Site Visit with RFO based on Proposal for 'Marking Kharda'",
            'forest_approved_by' => 'Forest Clearance - Approved By',
            'forest_l_no' => 'Forest Clearance - Letter No.',
            'forest_final_approval' => 'Forest Clearance - Final Approval Received Detail',
            'forest_status' => 'Forest Clearance - Status',
            'usd_chainage' => 'Utility Shifting - Chainage',
            'used_type' => 'Utility Shifting - Type of Utility',
            'usd_utility_item' => 'Utility Shifting - Proposal Sent - Utility Item',
            'usd_details' => 'Utility Shifting - Proposal Sent - Details',
            'estimated_usd_latter_no' => 'Utility Shifting - Proposal Sent - Letter No.',
            'usd_date_input' => 'Utility Shifting - Proposal Sent - Date',
            'usd_submitted_to' => 'Utility Shifting - Proposal Sent - Submitted To',
            'usd_joint_visit' => 'Utility Shifting - Proposal Sent - Joint Visit',
            'usd_estimate_submited' => 'Utility Shifting - Proposal Sent - Estimate Submitted by Concerned Department',
            'usd_latter_no' => 'Utility Shifting - Proposal Sent - Letter No.',
            'usd_date_input_sec' => 'Utility Shifting - Proposal Sent - Date',
            'usd_amount' => 'Utility Shifting - Proposal Sent - Amount',
            'usd_payment' => 'Utility Shifting - Proposal Sent - Payment Done',
            'usd_date_input_th' => 'Utility Shifting - Proposal Sent - Date',
            'usd_date_input_fr' => 'Utility Shifting - Proposal Sent - Work Start Date',
            'usd_date_input_fi' => 'Utility Shifting - Proposal Sent - Work Complete Date',
            'laq_name_village' => 'LAQ Approval - Name of Village',
            'laq_office' => 'LAQ Approval - Submission of LAQ Proposal to Land Acquisition Office',
            'laq_letter_no' => 'LAQ Approval - Letter No.',
            'laq_letter_date' => 'LAQ Approval - Letter Date',
            'laq_file_sub' => 'LAQ Approval - Process 1 - File Preparation by Sub Division',
            'laq_dlr_no' => 'LAQ Approval - Process 2 - File Submitted to DLR',
            'laq_pro_date' => 'LAQ Approval - Process 2 - Date',
            'laq_challan_amt' => 'LAQ Approval - Process 2 - Challan Amount',
            'laq_challan_date' => 'LAQ Approval - Process 2 - Challan Date',
            'laq_payment_date' => 'LAQ Approval - Process 2 - Payment Date',
            'laq_jms_date' => 'LAQ Approval - JMS Date',
            'laq_jms_office' => 'LAQ Approval - JMS Approved By',
            'laq_approved_jms_date' => 'LAQ Approval - Letter Date', 
            'laq_file_collector' => 'LAQ Approval - File Submitted To Collector',
            'laq_file_date' => 'LAQ Approval - Date',
            'laq_gati_date' => 'LAQ Approval - Gati Shakti Implementation Date',
            'laq_sec_10' => 'LAQ Approval - Section 10 A, B, C',
            'laq_sec_date' => 'LAQ Approval - Date',
            'laq_sec_11' => 'LAQ Approval - Section 11',
            'laq_sec11_date' => 'LAQ Approval - Date',
            'laq_sec_19' => 'LAQ Approval - Section 19',
            'laq_valuation' => 'LAQ Approval - Valuation',
            'laq_amt' => 'LAQ Approval - Amount',
            'laq_num' => 'LAQ Approval - No.',
            'laq_date' => 'LAQ Approval - Date',
            'laq_sec_21' => 'LAQ Approval - Section 21',
            'laq_s21_file_date' => 'LAQ Approval - Date',
            'laq_approval' => 'LAQ Approval - Approval For Valuation and Intimation to Land Owner',
            'laq_sec_23' => 'LAQ Approval - Section 23',
            'laq_23sec_date' => ' LAQ Approval - Date',
            'laq_23letter_no' => 'LAQ Approval - Letter No.',
            'laq_poss_detail' => 'LAQ Approval - Possession Details',
            'laq_status' => 'LAQ Approval - Status',
            'bd_item_first' => 'Budgetary - Item First Introduce in Year & Budget Provision',
            'bd_detail_head' => 'Budgetary - Detail Budget Head',
            'bd_item_no' => 'Budgetary - Budget Item No.',
            'bd_page_no' => 'Budgetary - Page No.',
            'bd_continous' => 'Budgetary - Continous Or New Item',
            'budget_previous_year' => 'Budgetary - Budget Previous Year',
            'budget_previous_amount' => 'Budgetary - Amount',
            'ed_dtp_amount' => 'Expenditure - Dtp Amount',
            'ed_project_cost' => 'Expenditure - AA Amount',
            'ed_estimated_cost' => 'Expenditure - Estimated Amount',
            'ed_tender_cost' => 'Expenditure - Tender Cost',
            'ed_qulity_cost' => 'Expenditure - Quality Contracts Cost',
            'ed_origin_work' => 'Expenditure - Received Tender Cost',
            'ed_b' => 'Expenditure - Bill No.',
            'ed_details' => 'Expenditure - Details',
            'expended_details' => 'Expenditure - Expended Date',
            'ed_expenditure_amount' => 'Expenditure - Expenditure Amount Without',
            'ed_expenditure' => 'Expenditure - Expenditure Amount 9% With',
            'ed_work' => 'Expenditure - Work Physical(%)',
            'ed_fincial' => 'Expenditure - Work Fincial(%)',
            'ed_amount_for' => 'Expenditure - Amount For',
            'ed_division_letter_no' => 'Excess Detail & Extra Detail - Submission Details From Subdivision to Division - Letter No.',
            'ed_division_letter_date' => 'Excess Detail & Extra Detail - Submission Details From Subdivision to Division - Letter Date',
            'ed_circle_letter_no' => 'Excess Detail & Extra Detail - Submission Details From Division to Circle - Letter No.',
            'ed_circle_letter_date' => ' Excess Detail & Extra Detail - Submission Details From Division to Circle - Letter Date',
            'ed_government_letter_no' => 'Excess Detail & Extra Detail - Submission Details From Circle to Government - Letter No.',
            'ed_government_letter_date' => 'Excess Detail & Extra Detail - Submission Details From Circle to Government - Letter Date',
            'ed_approval_letter_no' => 'Excess Detail & Extra Detail - Approval Letter No.',
            'ed_approval_letter_date' => 'Excess Detail & Extra Detail - Letter Date',
            'ed_approval_letter_amount' => 'Excess Detail & Extra Detail - Access Amount',
            'ed_approval_extra_amount' => 'Excess Detail & Extra Detail - Extra Amount',
            'ed_item_detail' => 'Excess Detail & Extra Detail - Item Detail',
            'tle_proposal_letter_no' => 'Time Limit Extension - Proposal Submission - Letter No.',
            'tle_proposal_letter_date' => 'Time Limit Extension - Proposal Submission - Letter Date',
            'tle_proposal_extension_date' => 'Time Limit Extension - Proposal Submission - Extension Date',
            'tle_approval_letter_no' => 'Time Limit Extension - Approval Details - Letter No.',
            'tle_approval_letter_date' => 'Time Limit Extension - Approval Details - Letter Date',
            'tle_approval_extension_date' => 'Time Limit Extension - Approval Details - Extension Date',
            'tle_status' => 'Time Limit Extension - Status',
            'work_yes_no' => 'Work Status - Actual Complete Date Yes/No',
            'ws_sd_completion' => 'Work Status - Actual Complete Date',
            'acctual_yes_no' => 'Work Status - Date OF intiacle Yes/No',
            'ws_sd_release' => 'Work Status - SD Release Date',
            'fmg_completion_date' => 'FMG - Work Completion Date',
            'fmg_time' => 'FMG - FMG Time Limit In Year',
            'fmg_date' => 'FMG - FMG Complete Date',
            'add_fmg_date' => 'FMG - Add FMG Release Date',
            'fmg_dropdown' => 'FMG - Entry',
            'fmg_entry_amount' => 'FMG - Amount',
            'dlp_work_completion_date' => 'DLP Period - Work Completion Date',
            'dlp_timeline' => 'DLP Period - DLP Timeline In Month',
            'dlp_completion_date' => 'DLP Period - DLP Completion Date',
            'dlp_released_date' => 'DLP Period - DLP Released Date',
            'dlp_dropdown' => 'DLP Period - DLP',
            'dlp_amount' => 'DLP Period - DLP Amount',
            'dtp_sub_to' => 'DTP Approval - Submitted To',
            'dtp_submit_date' => 'DTP Approval - Submitted Date',
            'dtp_submit_letter_no' => 'DTP Approval - Letter No.',
            'dtp_authority' => 'DTP Approval - Authority',
            'dtp_date' => 'DTP Approval - Date',
            'dtp_letter_no' => 'DTP Approval - Letter No.',
            'dtp_amt' => 'DTP Approval - Amount',
            'dtp_f_date' => 'DTP Approval - Follow Up date',
            'dtp_f_status' => 'DTP Approval - Status',
            'dtp_f_remark' => 'DTP Approval - Remark',
            'nit_no' => 'NIT - NIT No.',
            'nit_start_date' => 'NIT - Start Date',
            'nit_end_date' => 'NIT - End Date',
            'nit_last_sub_date' => 'NIT - Last Submission Date',
            'nit_tender_open_date' => 'NIT - Tender Open Date',
            'nit_pre_bid_date' => 'NIT - Pre-Bid Meeting Date',
            'nit_tech_bid_date' => 'NIT - Technical Bid Date',
            'nit_price_bid_date' => 'NIT - Price Bid Opening Date',
            'nit_pq_open' => 'NIT - PQ Open',
            'nit_preliminary_date' => 'NIT - Preliminary Date',
            'nit_pq_sub_date' => 'NIT - PQ Submission Date',
            'nit_pq_approval_date' => 'NIT - PQ Approval Date',
            'nit_sent_circle_date' => 'NIT - Sent To Circle Submission Date',
            'nit_sent_goverment_date' => 'NIT - Circle To Government Submission Date',
            'nit_re_invited_date' => 'NIT - Proposal Sent - Re-Invited Date',
            'nit_with_reason' => 'NIT - Proposal Sent - With Reason',
            'nit_validity_date' => 'NIT - Validity Date',
            'nit_tender_form' => 'NIT - Tender Form',
            'nit_tender_proposal' => 'NIT - Tender Proposal Date',
            'nit_letter_no' => 'NIT - Letter No.',
            'nit_latter_date' => 'NIT - Letter Date',
            'nit_agency_main' => 'NIT - Agency',
            'nit_tender_cost' => 'NIT - Agency Entry - Biding Amount',
            'nit_latter_no_2' => 'NIT - Agency Entry - Above / Below (%)',
            'nit_tender_above' => 'NIT - Agency Entry - Above/Below',
            'tender_proposal_date' => 'NIT - Tender Proposal Date',
            'nit_agency_name' => 'NIT - Validity Extension - Agency Name',
            'nit_validity_extension_date' => 'NIT - Validity Extension - Validity Date',
            'nit_latter_extension_no' => 'NIT - Validity Extension - Letter No.',
            'latter_date_extension' => 'NIT - Validity Extension - Letter Date',
            'do_tender_date' => 'Deposit Order/Bank Guarantee - Tender Approval Date',
            'do_agency_name' => 'Deposit Order/Bank Guarantee - Agency Name',
            'tender_approved_by' => 'Deposit Order/Bank Guarantee - Tender Approved By',
            'do_letter_No' => 'Deposit Order/Bank Guarantee - Letter No.',
            'do_tender_amt' => 'Deposit Order/Bank Guarantee - Tender Approval Amount',
            'do_above' => 'Deposit Order/Bank Guarantee - Above/Below',
            'do_above_perc' => 'Deposit Order/Bank Guarantee - Above/Below (%)',
            'do_deposit_letter_no' => 'Deposit Order/Bank Guarantee - Deposit Issued - Letter No.',
            'do_deposit_letter_date' => 'Deposit Order/Bank Guarantee - Deposit Issued - Letter Date',
            'do_deposit_letter_amount' => 'Deposit Order/Bank Guarantee - Deposit Issued - Amount',
            'do_condition_date' => 'Deposit Order/Bank Guarantee - Deposit Condition Date',
            'do_condition_datails' => 'Deposit Order/Bank Guarantee - Deposit Condition - Details',
            'do_condition_approval' => 'Deposit Order/Bank Guarantee - Deposit Condition - Approval',
            'do_dep_by' => 'Deposit Order/Bank Guarantee - Deposit Submission By',
            'do_submit_date' => 'Deposit Order/Bank Guarantee - Deposit Submission - Letter Date',
            'do_submit_amount' => 'Deposit Order/Bank Guarantee - Deposit Submission - Amount',
            'do_bg_issue_date' => 'Deposit Order/Bank Guarantee - Bank Guarantee - BG Issue Date',
            'do_bg_expire_date' => 'Deposit Order/Bank Guarantee - Bank Guarantee - BG Expire Date',
            'do_bg_bank_name' => 'Deposit Order/Bank Guarantee - Bank Guarantee - Bank Name',
            'do_bg_bank_address' => 'Deposit Order/Bank Guarantee - Bank Guarantee - BG Bank Address',
            'do_bg_bank_verified' => 'Deposit Order/Bank Guarantee - Bank Guarantee - BG Bank Verified',
            'do_fdr_date' => 'Deposit Order/Bank Guarantee - FDR - Date',
            'do_fdr_amount' => 'Deposit Order/Bank Guarantee - FDR - Amount',
            'do_work_order_date' => ' Deposit Order/Bank Guarantee - Work Order Issue Date',
            'do_time_line_month' => 'Deposit Order/Bank Guarantee - Time Line As Per Work Order In Month',
            'do_time_limit_any' => 'Deposit Order/Bank Guarantee - Time Limit Extension If Any',
            'do_completion_date' => 'Deposit Order/Bank Guarantee - Completion Date',
            'tpi_dtp_date' => 'TPI - DTP Date',
            'tpi_dtp_amt' => 'TPI - DTP Amount',
            'tpi_tender_date' => 'TPI - Tender Date',
            'tpi_tendure_amount' => 'TPI - Tender Amount',
            'tpi_nit_no' => 'TPI - NIT - NIT No.',
            'tpi_start_date' => 'TPI - NIT - Start Date',
            'tpi_end_date' => 'TPI - NIT - End Date',
            'tpi_tender_open_date' => 'TPI - NIT - Tender Open Date',
            'tpi_tech_bid_date' => 'TPI - NIT - Technical Bid Date',
            'tpi_interview_date' => 'TPI - NIT - Interview Date',
            'tpi_last_sub_date' => 'TPI - NIT - Last Submission Date',
            'tpi_pre_bid_date' => 'TPI - NIT - Pre-Bid Meeting Date',
            'tpi_price_bid_date' => 'TPI - NIT - Price Bid Opening Date',
            'tpi_pq_open' => 'TPI - NIT - PQ Open',
            'tpi_preliminary_date' => 'TPI - NIT - Preliminary Date',
            'tpi_pq_sub_date' => 'TPI - NIT - PQ Submission Date',
            'tpi_pq_approval_date' => 'TPI - NIT - PQ Approval Date',
            'tpi_re_invited_date' => 'TPI - NIT - Re-Invited Date',
            'tpi_with_reason' => 'TPI - NIT - With Reason',
            'tpi_validity_date' => 'TPI - NIT - Validity Date',
            'tpi_tender_form' => 'TPI - NIT - Tender Form',
            'tpi_tender_proposal' => 'TPI - NIT - Tender Proposal Date',
            'tpi_tender_letter_no' => 'TPI - NIT - Letter No.',
            'tpi_proposal_latter_date' => 'TPI - NIT - Letter Date',
            'tpi_agency_main' => 'TPI - NIT - Agency',
            'tpi_tender_cost' => 'TPI - NIT - Bid Amount',
            'tpi_latter_no_2' => 'TPI - NIT - Above / Below (%)',
            'tpi_above_tender_form' => 'TPI - NIT - Above/Below',
            'tpi_tender_proposal_date' => 'TPI - NIT - Tender Proposal Date',
            'tpi_agency_name' => 'TPI - NIT - Validity Extension - Agency Name',
            'tpi_validity_extension_date' => 'TPI - NIT - Validity Extension - Validity Date',
            'tpi_validity_extension_letter_no' => 'TPI - NIT - Validity Extension - Letter No.',
            'tpi_validity_extension_letter_date' => 'TPI - NIT - Validity Extension - Letter Date',
            'tpi_aggr_no' => 'TPI - Agreement No.',
            'tpi_agency_last' => 'TPI - Agency',
        ];
        $customVariable = $request->check_boxes ?? [];
        return  Excel::download(new ExportMasters($customVariable,$customHeadings), 'masters.xlsx');
    }

    public function projectSheet()
    {
        return view('admin.project_master.project_sheet');
    }

    public function getBasicNameScheme($selectedBudgetId)
    {
        // Query your database to get data based on $selectedBudgetId
        $data = NameOfSchema::where('budget_id', $selectedBudgetId)->get();

        return response()->json($data);
    }
}
