<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function insert(Request $request)
    {

        // $rules = [
        //     'basic_name_scheme' => 'required',
        //     'basic_name_project' => 'required',
        //     'basic_wms_work_head' => 'required',
        //     'district_id' => 'required',
        //     'basic_taluka' => 'required',
        //     'work_type_id' => 'required',
        //     'basic_type_work' => 'required',
        //     'basic_type_work_name' => 'required',
        //     'basic_budget' => 'required',
        //     'basic_budget_name' => 'required',
        //     'basic_budget_work' => 'required',
        //     'basic_budget_work_name' => 'required',
        //     'basic_amount' => 'required',
        //     'basic_mp_mla' => 'required',
        //     'basic_mp_mla_name' => 'required',
        //     'basic_letter_no' => 'required',
        //     'basic_letter_date' => 'required',
        //     'basic_upload_img' => 'required',
        //     'basic_suggest' => 'required',
        //     'basic_recever_from' => 'required',
        //     'basic_rec_letter_no' => 'required',
        //     'basic_rec_letter_date' => 'required',
        //     'basic_rec_letter_amount' => 'required',
        //     'basic_sent_proposal' => 'required',
        //     'basic_sent_proposal_letter_no' => 'required',
        //     'basic_sent_proposal_date' => 'required',
        //     'basic_sent_proposal_amount' => 'required',
        //     'basic_sent_box' => 'required',
        //     'basic_sent_box_name' => 'required',
        //     'basic_sent_box_date' => 'required',
        //     'basic_sent_box_remark' => 'required',
        //     'basic_name_of_department' => 'required',
        //     'basic_division' => 'required',
        //     'basic_sub_division' => 'required',
        //     'basic_name_of_road' => 'required',
        //     'basic_category_of_road' => 'required',
        //     'initiated_name' => 'required',
        //     'ppd_letter_no' => 'required',
        //     'ppd_letter_date' => 'required|date',
        //     'ppd_amount' => 'required',
        //     'ppd_treatment_detail' => 'required',
        //     'ppd_proposal_submitted_letter_no' => 'required',
        //     'ppd_proposal_submitted_letter_date' => 'required|date',
        //     'ppd_proposal_submission_office' => 'required',
        //     'ppd_letter_upload' => 'required',
        //     'pad_letter_no' => 'required',
        //     'pad_letter_date' => 'required',
        //     'pad_amount' => 'required',
        //     'pad_approved_by' => 'required',
        //     'pad_letter_upload' => 'required',


        // ];

        // $this->validate($request, $rules);
        // $image = $request->file('basic_upload_img');
        // $filename = '';

        // if ($image == '') {
        //     return response()->json(['status' => '400', 'msg' => 'please select image']);
        // }

        // if (!empty($image)) {
        //     $filename = str_replace(' ', '', $image->getClientOriginalName());
        //     $image->move(public_path('upload/Letter-reminder/'), $filename);
        // }


        // $psd_uplode = $request->file('ppd_letter_upload');
        // $ppd_letter_upload = '';

        // if ($psd_uplode == '') {
        //     return response()->json(['status' => '400', 'msg' => 'please select file']);
        // }

        // if (!empty($psd_uplode)) {
        //     $ppd_letter_upload = str_replace(' ', '', $psd_uplode->getClientOriginalName());
        //     $psd_uplode->move(public_path('upload/Letter-reminder/'), $ppd_letter_upload);
        // }


        if ($request->master_id != '') {
            $basic_branch = Master::find($request->master_id);
            if (!$basic_branch) {
                return response()->json(['status' => 400, 'msg' => 'Master division not found!']);
            }
        } else {
            $basic_branch = new Master();
        }
        $basic_branch->basic_name_scheme = $request->input('basic_name_scheme');
        $basic_branch->basic_name_project = $request->input('basic_name_project');
        $basic_branch->basic_wms_work_head = $request->input('basic_wms_work_head');
        $basic_branch->district_id = $request->input('district_id');
        $basic_branch->basic_taluka = $request->input('basic_taluka');
        $basic_branch->work_type_id = $request->input('work_type_id');
        $basic_branch->types_of_work_id = $request->input('types_of_work_id');
        $basic_branch->basic_type_work_name = $request->input('basic_type_work_name');
        $basic_branch->budget_id = $request->input('budget_id');
        $basic_branch->basic_budget_name = $request->input('basic_budget_name');
        $basic_branch->budget_work_id = $request->input('budget_work_id');
        $basic_branch->basic_budget_work_name = $request->input('basic_budget_work_name');
        $basic_branch->basic_amount = $request->input('basic_amount');
        $basic_branch->basic_mp_mla = $request->input('basic_mp_mla');
        $basic_branch->basic_mp_mla_name = $request->input('basic_mp_mla_name');
        $basic_branch->basic_letter_no = $request->input('basic_letter_no');
        $basic_branch->basic_letter_date = $request->input('basic_letter_date');
        $basic_branch->basic_upload_img = $request->input('basic_upload_img');
        $basic_branch->basic_suggest = $request->input('basic_suggest');
        $basic_branch->basic_recever_from = $request->input('basic_recever_from');
        $basic_branch->basic_rec_letter_no = $request->input('basic_rec_letter_no');
        $basic_branch->basic_rec_letter_date = $request->input('basic_rec_letter_date');
        $basic_branch->basic_rec_letter_amount = $request->input('basic_rec_letter_amount');
        $basic_branch->basic_sent_proposal = $request->input('basic_sent_proposal');
        $basic_branch->basic_sent_proposal_letter_no = $request->input('basic_sent_proposal_letter_no');
        $basic_branch->basic_sent_proposal_date = $request->input('basic_sent_proposal_date');
        $basic_branch->basic_sent_proposal_amount = $request->input('basic_sent_proposal_amount');
        $basic_branch->sent_box_id = $request->input('sent_box_id');
        $basic_branch->basic_sent_box_name = $request->input('basic_sent_box_name');
        $basic_branch->basic_sent_box_date = $request->input('basic_sent_box_date');
        $basic_branch->basic_sent_box_remark = $request->input('basic_sent_box_remark');
        $basic_branch->basic_name_of_department = $request->input('basic_name_of_department');
        $basic_branch->division_master_id = $request->input('division_master_id');
        $basic_branch->sub_division_master_id = $request->input('sub_division_master_id');
        $basic_branch->basic_name_of_road = $request->input('basic_name_of_road');
        $basic_branch->basic_category_of_road = $request->input('basic_category_of_road');
        $basic_branch->initiated_name = $request->input('initiated_name');
        $basic_branch->ppd_letter_no = $request->input('ppd_letter_no');
        $basic_branch->ppd_letter_date = $request->input('ppd_letter_date');
        $basic_branch->ppd_amount = $request->input('ppd_amount');
        $basic_branch->ppd_treatment_detail = $request->input('ppd_treatment_detail');
        $basic_branch->ppd_proposal_submitted_letter_no = $request->input('ppd_proposal_submitted_letter_no');
        $basic_branch->ppd_proposal_submitted_letter_date = $request->input('ppd_proposal_submitted_letter_date');
        $basic_branch->ppd_proposal_submission_office = $request->input('ppd_proposal_submission_office');
        $basic_branch->ppd_letter_upload =  $request->input('ppd_letter_upload');
        $basic_branch->pad_letter_no = $request->input('pad_letter_no');
        $basic_branch->pad_letter_date = $request->input('pad_letter_date');
        $basic_branch->pad_amount = $request->input('pad_amount');
        $basic_branch->pad_approved_by = $request->input('pad_approved_by');
        $basic_branch->pad_letter_upload = $request->input('pad_letter_upload');
        $basic_branch->bes_letter_no = $request->input('bes_letter_no');
        $basic_branch->bes_letter_date = $request->input('bes_letter_date');
        $basic_branch->bes_amount = $request->input('bes_amount');
        $basic_branch->bes_letter_upload = $request->input('bes_letter_upload');
        $basic_branch->bes_provision_in_estimate = $request->input('bes_provision_in_estimate');
        $basic_branch->bes_submit_letter = $request->input('bes_submit_letter');
        $basic_branch->bes_submit_office_date = $request->input('bes_submit_office_date');
        $basic_branch->bes_office_letter_upload = $request->input('bes_office_letter_upload');
        $basic_branch->division_id = $request->input('division_id');
        $basic_branch->sub_division_id = $request->input('sub_division_id');
        $basic_branch->bes_follow_up_date = $request->input('bes_follow_up_date');
        $basic_branch->bes_status = $request->input('bes_status');
        $basic_branch->bes_remark = $request->input('bes_remark');
        $basic_branch->bes_office_letter_upload = $request->input('bes_office_letter_upload');
        $basic_branch->aa_letter_date = $request->input('aa_letter_date');
        $basic_branch->aa_amount = $request->input('aa_amount');
        $basic_branch->aa_letter_upload = $request->input('aa_letter_upload');
        $basic_branch->aa_approved_by = $request->input('aa_approved_by');
        $basic_branch->aa_detail_regarding_architecture = $request->input('aa_detail_regarding_architecture');

        $basic_branch->tsd_letter_no = $request->input('tsd_letter_no');
        $basic_branch->tsd_letter_date = $request->input('tsd_letter_date');
        $basic_branch->tsd_amount = $request->input('tsd_amount');
        $basic_branch->tsd_letter_upload = $request->input('tsd_letter_upload');
        $basic_branch->tsd_approved_by = $request->input('tsd_approved_by');
        $basic_branch->tsd_provision_in_ts_estimate = $request->input('tsd_provision_in_ts_estimate');

        $basic_branch->forest_chainage = $request->input('forest_chainage');

        $basic_branch->forest_no_trees = $request->input('forest_no_trees');
        $basic_branch->forest_area_hect = $request->input('forest_area_hect');
        $basic_branch->forest_appr_state = $request->input('forest_appr_state');
        $basic_branch->forest_proposal_submit = $request->input('forest_proposal_submit');
        $basic_branch->forest_letter_no = $request->input('forest_letter_no');
        $basic_branch->forest_letter_date = $request->input('forest_letter_date');
        $basic_branch->forest_upload_img = $request->input('forest_upload_img');
        $basic_branch->forest_online_no = $request->input('forest_online_no');
        $basic_branch->forest_online_date = $request->input('forest_online_date');
        $basic_branch->forest_joint_site = $request->input('forest_joint_site');
        $basic_branch->forest_approved_by = $request->input('forest_approved_by');
        $basic_branch->forest_l_no = $request->input('forest_l_no');
        $basic_branch->forest_letter_img = $request->input('forest_letter_img');
        $basic_branch->forest_final_approval = $request->input('forest_final_approval');
        $basic_branch->forest_status = $request->input('forest_status');
        //utility-shifting-detail

        $basic_branch->usd_chainage = $request->input('usd_chainage');
        $basic_branch->usd_work_head = $request->input('usd_work_head');
        $basic_branch->usd_utility_item = $request->input('usd_utility_item');
        $basic_branch->usd_details = $request->input('usd_details');
        $basic_branch->estimated_usd_latter_no = $request->input('estimated_usd_latter_no');
        $basic_branch->usd_date_input = $request->input('usd_date_input');
        $basic_branch->usd_submitted_to = $request->input('usd_submitted_to');
        $basic_branch->usd_joint_visit = $request->input('usd_joint_visit');
        $basic_branch->usd_estimate_submited = $request->input('usd_estimate_submited');
        $basic_branch->usd_latter_no = $request->input('usd_latter_no');
        $basic_branch->usd_date_input_sec = $request->input('usd_date_input_sec');
        $basic_branch->usd_amount = $request->input('usd_amount');
        $basic_branch->usd_payment = $request->input('usd_payment');
        $basic_branch->usd_date_input_th = $request->input('usd_date_input_th');
        $basic_branch->usd_date_input_fr = $request->input('usd_date_input_fr');
        $basic_branch->usd_date_input_fi = $request->input('usd_date_input_fi');


        //laq-approval
        $basic_branch->laq_name_village = $request->input('laq_name_village');
        $basic_branch->laq_office = $request->input('laq_office');
        $basic_branch->laq_letter_no = $request->input('laq_letter_no');
        $basic_branch->laq_letter_date = $request->input('laq_letter_date');
        $basic_branch->laq_letter_uplode = $request->input('laq_letter_uplode');
        $basic_branch->laq_file_sub = $request->input('laq_file_sub');
        $basic_branch->laq_dlr_no = $request->input('laq_dlr_no');
        $basic_branch->laq_pro_date = $request->input('laq_pro_date');
        $basic_branch->laq_challan_amt = $request->input('laq_challan_amt');
        $basic_branch->laq_challan_date = $request->input('laq_challan_date');
        $basic_branch->laq_payment_date = $request->input('laq_payment_date');
        $basic_branch->laq_jms_date = $request->input('laq_jms_date');
        $basic_branch->laq_jms_office = $request->input('laq_jms_office');
        $basic_branch->laq_approved_jms_date = $request->input('laq_approved_jms_date');
        $basic_branch->laq_upload_img = $request->input('laq_upload_img');
        $basic_branch->laq_file_collector = $request->input('laq_file_collector');
        $basic_branch->laq_file_date = $request->input('laq_file_date');
        $basic_branch->laq_gati_date = $request->input('laq_gati_date');
        $basic_branch->laq_sec_10 = $request->input('laq_sec_10');
        $basic_branch->laq_sec_date = $request->input('laq_sec_date');
        $basic_branch->laq_sec_11 = $request->input('laq_sec_11');
        $basic_branch->laq_sec11_date = $request->input('laq_sec11_date');
        $basic_branch->laq_sec_19 = $request->input('laq_sec_19');
        $basic_branch->laq_valuation = $request->input('laq_valuation');
        $basic_branch->laq_amt = $request->input('laq_amt');
        $basic_branch->laq_num = $request->input('laq_num');
        $basic_branch->laq_date = $request->input('laq_date');
        $basic_branch->laq_sec_21 = $request->input('laq_sec_21');
        $basic_branch->laq_s21_file_date = $request->input('laq_s21_file_date');
        $basic_branch->laq_approval = $request->input('laq_approval');
        $basic_branch->laq_sec_23 = $request->input('laq_sec_23');
        $basic_branch->laq_23sec_date = $request->input('laq_23sec_date');
        $basic_branch->laq_23letter_no = $request->input('laq_23letter_no');
        $basic_branch->laq_23_img = $request->input('laq_23_img');
        $basic_branch->laq_poss_detail = $request->input('laq_23sec_date');
        $basic_branch->laq_status = $request->input('laq_status');

        //budgetary-detail
        $basic_branch->bd_item_first = $request->input('bd_item_first');
        $basic_branch->bd_detail_head = $request->input('bd_detail_head');
        $basic_branch->bd_item_no = $request->input('bd_item_no');
        $basic_branch->bd_page_no = $request->input('bd_page_no');
        $basic_branch->bd_continous = $request->input('bd_continous');


        //expenditure-detail
        $basic_branch->ed_origin_work = $request->input('ed_origin_work');
        $basic_branch->ed_tender_cost = $request->input('ed_tender_cost');
        $basic_branch->ed_paid_amount = $request->input('ed_paid_amount');
        $basic_branch->ed_expenditure_amount = $request->input('ed_expenditure_amount');
        $basic_branch->ed_expenditure = $request->input('ed_expenditure');
        $basic_branch->ed_work = $request->input('ed_work');
        $basic_branch->ed_amount_for = $request->input('ed_amount_for');

        //excess-detail
        $basic_branch->ed_division_letter_no = $request->input('ed_division_letter_no');
        $basic_branch->ed_division_letter_date = $request->input('ed_division_letter_date');
        $basic_branch->ed_division_letter_image = $request->input('ed_division_letter_image');
        $basic_branch->ed_circle_letter_no = $request->input('ed_circle_letter_no');
        $basic_branch->ed_circle_letter_date = $request->input('ed_circle_letter_date');
        $basic_branch->ed_circle_letter_image = $request->input('ed_circle_letter_image');
        $basic_branch->ed_government_letter_no = $request->input('ed_government_letter_no');
        $basic_branch->ed_government_letter_date = $request->input('ed_government_letter_date');
        $basic_branch->ed_government_letter_image = $request->input('ed_government_letter_image');
        $basic_branch->ed_approval_letter_no = $request->input('ed_approval_letter_no');
        $basic_branch->ed_approval_letter_date = $request->input('ed_approval_letter_date');
        $basic_branch->ed_approval_letter_amount = $request->input('ed_approval_letter_amount');
        $basic_branch->ed_item_detail = $request->input('ed_item_detail');

        //time-extension
        $basic_branch->tle_proposal_letter_no = $request->input('tle_proposal_letter_no');
        $basic_branch->tle_proposal_letter_date = $request->input('tle_proposal_letter_date');
        $basic_branch->tle_proposal_extension_date = $request->input('tle_proposal_extension_date');
        $basic_branch->tle_proposal_letter_image = $request->input('tle_proposal_letter_image');
        $basic_branch->tle_approval_letter_no = $request->input('tle_approval_letter_no');
        $basic_branch->tle_approval_letter_date = $request->input('tle_approval_letter_date');
        $basic_branch->tle_approval_extension_date = $request->input('tle_approval_extension_date');
        $basic_branch->tle_approval_letter_image = $request->input('tle_approval_letter_image');
        $basic_branch->tle_status = $request->input('tle_status');

        //work-status
        $basic_branch->ws_sd_completion = $request->input('ws_sd_completion');
        $basic_branch->ws_sd_release = $request->input('ws_sd_release');
        $basic_branch->ws_sd_amount = $request->input('ws_sd_amount');

        //FMG
        $basic_branch->fmg_completion_date = $request->input('fmg_completion_date');
        $basic_branch->fmg_time = $request->input('fmg_time');
        $basic_branch->fmg_date = $request->input('fmg_date');
        $basic_branch->add_fmg_date = $request->input('add_fmg_date');

        //FDR
        $basic_branch->fdr_work_date = $request->input('fdr_work_date');
        $basic_branch->fdr_time = $request->input('fdr_time');
        $basic_branch->fdr_date = $request->input('fdr_date');
        $basic_branch->add_fdr_date = $request->input('add_fdr_date');

        //DLP Period
        $basic_branch->dlp_completion_date = $request->input('fdr_work_date');
        $basic_branch->dlp_released_date = $request->input('dlp_released_date');
        $basic_branch->dlp_amount = $request->input('dlp_amount');

        //Tender
        //DTP Approval Detail
        $basic_branch->dtp_sub_to = $request->input('dtp_sub_to');
        $basic_branch->dtp_submit_date = $request->input('dtp_submit_date');
        $basic_branch->dtp_submit_letter_no = $request->input('dtp_submit_letter_no');
        $basic_branch->dtp_authority = $request->input('dtp_authority');
        $basic_branch->dtp_date = $request->input('ed_circle_letter_date');
        $basic_branch->dtp_letter_no = $request->input('dtp_letter_no');
        $basic_branch->dtp_amt = $request->input('dtp_amt');
        $basic_branch->dtp_f_date = $request->input('dtp_f_date');
        $basic_branch->dtp_f_status = $request->input('dtp_f_status');
        $basic_branch->dtp_f_remark = $request->input('dtp_f_remark');

        //NIT
        $basic_branch->nit_no = $request->input('nit_no');
        $basic_branch->nit_start_date = $request->input('nit_start_date');
        $basic_branch->nit_end_date = $request->input('nit_end_date');
        $basic_branch->nit_tender_open_date = $request->input('nit_tender_open_date');
        $basic_branch->nit_last_sub_date = $request->input('nit_last_sub_date');
        $basic_branch->nit_pre_bid_date = $request->input('nit_pre_bid_date');
        $basic_branch->nit_tech_bid_date = $request->input('nit_tech_bid_date');
        $basic_branch->nit_price_bid_date = $request->input('nit_price_bid_date');
        $basic_branch->nit_pq_open = $request->input('nit_pq_open');
        $basic_branch->nit_preliminary_date = $request->input('nit_preliminary_date');
        $basic_branch->nit_pq_sub_date = $request->input('nit_pq_sub_date');
        $basic_branch->nit_pq_approval_date = $request->input('nit_pq_approval_date');
        $basic_branch->nit_re_invited_date = $request->input('nit_re_invited_date');
        $basic_branch->nit_with_reason = $request->input('nit_with_reason');
        $basic_branch->nit_validity_date = $request->input('nit_validity_date');
        $basic_branch->nit_tender_form = $request->input('nit_tender_form');
        $basic_branch->nit_tender_proposal = $request->input('nit_tender_proposal');
        $basic_branch->nit_letter_no = $request->input('nit_letter_no');
        $basic_branch->nit_latter_date = $request->input('nit_latter_date');
        $basic_branch->nit_upload_letter = $request->input('nit_upload_letter');
        $basic_branch->nit_agency_main = $request->input('nit_agency_main');
        $basic_branch->nit_tender_cost = $request->input('nit_tender_cost');
        $basic_branch->nit_latter_no_2 = $request->input('nit_latter_no_2');
        $basic_branch->nit_tender_above = $request->input('nit_tender_above');
        $basic_branch->tender_proposal_date = $request->input('tender_proposal_date');
        $basic_branch->nit_agency_name = $request->input('nit_agency_name');
        $basic_branch->nit_validity_extension_date = $request->input('nit_validity_extension_date');
        $basic_branch->nit_latter_extension_no = $request->input('nit_latter_extension_no');
        $basic_branch->latter_date_extension = $request->input('latter_date_extension');
        $basic_branch->latter_image_extension = $request->input('latter_image_extension');

        //Deposit Order/Bank Guarantee Detail
        $basic_branch->do_tender_date = $request->input('do_tender_date');
        $basic_branch->do_agency_name = $request->input('do_agency_name');
        $basic_branch->do_letter_No = $request->input('do_letter_No');
        $basic_branch->do_tender_amt = $request->input('do_tender_amt');
        $basic_branch->do_letter_upload_img = $request->input('do_letter_upload_img');
        $basic_branch->do_above = $request->input('do_above');
        $basic_branch->do_above_perc = $request->input('do_above_perc');
        $basic_branch->do_deposit_letter_no = $request->input('do_deposit_letter_no');
        $basic_branch->do_deposit_letter_date = $request->input('do_deposit_letter_date');
        $basic_branch->do_deposit_letter_amount = $request->input('do_deposit_letter_amount');
        $basic_branch->do_deposit_letter_upload = $request->input('do_deposit_letter_upload');
        $basic_branch->do_dep_by = $request->input('do_dep_by');
        $basic_branch->do_submit_date = $request->input('do_submit_date');
        $basic_branch->do_submit_amount = $request->input('do_submit_amount');
        $basic_branch->do_bg_exp_date = $request->input('do_bg_exp_date');
        $basic_branch->do_bg_exp_amount = $request->input('do_bg_exp_amount');
        $basic_branch->do_bg_exp_image = $request->input('do_bg_exp_image');
        $basic_branch->do_fdr_date = $request->input('do_fdr_date');
        $basic_branch->do_fdr_amount = $request->input('do_fdr_amount');
        $basic_branch->do_fdr_image = $request->input('do_fdr_image');
        $basic_branch->do_work_order_date = $request->input('do_work_order_date');
        $basic_branch->do_time_line_month = $request->input('do_time_line_month');
        $basic_branch->do_time_limit_any = $request->input('do_time_limit_any');
        $basic_branch->do_completion_date = $request->input('do_completion_date');

        //TPI Detail
        $basic_branch->tpi_dtp_date = $request->input('tpi_dtp_date');
        $basic_branch->tpi_dtp_amt = $request->input('tpi_dtp_amt');
        $basic_branch->tpi_tender_date = $request->input('tpi_tender_date');
        $basic_branch->tpi_tendure_amount = $request->input('tpi_tendure_amount');
        $basic_branch->tpi_nit_no = $request->input('tpi_nit_no');
        $basic_branch->tpi_start_date = $request->input('tpi_start_date');
        $basic_branch->tpi_end_date = $request->input('tpi_end_date');
        $basic_branch->tpi_tender_open_date = $request->input('tpi_tender_open_date');
        $basic_branch->tpi_last_sub_date = $request->input('tpi_last_sub_date');
        $basic_branch->tpi_pre_bid_date = $request->input('tpi_pre_bid_date');
        $basic_branch->tpi_tech_bid_date = $request->input('tpi_tech_bid_date');
        $basic_branch->tpi_price_bid_date = $request->input('tpi_price_bid_date');
        $basic_branch->tpi_pq_open = $request->input('tpi_pq_open');
        $basic_branch->tpi_preliminary_date = $request->input('tpi_preliminary_date');
        $basic_branch->tpi_pq_sub_date = $request->input('tpi_pq_sub_date');
        $basic_branch->tpi_pq_approval_date = $request->input('tpi_pq_approval_date');
        $basic_branch->tpi_re_invited_date = $request->input('tpi_re_invited_date');
        $basic_branch->tpi_tender_proposal_date = $request->input('nit_letter_no');
        $basic_branch->tpi_validity_date = $request->input('tpi_validity_date');
        $basic_branch->tpi_tender_form = $request->input('tpi_tender_form');
        $basic_branch->tpi_tender_proposal = $request->input('tpi_tender_proposal');
        $basic_branch->tpi_tender_letter_no = $request->input('tpi_tender_letter_no');
        $basic_branch->tpi_proposal_latter_date = $request->input('tpi_proposal_latter_date');
        $basic_branch->tpi_proposal_latter_image = $request->input('tpi_proposal_latter_image');
        $basic_branch->tpi_agency_main = $request->input('tpi_agency_main');
        $basic_branch->tpi_tender_cost = $request->input('tpi_tender_cost');
        $basic_branch->tpi_latter_no_2 = $request->input('tpi_latter_no_2');
        $basic_branch->tpi_above_tender_form = $request->input('tpi_above_tender_form');
        $basic_branch->tpi_tender_proposal_date = $request->input('tpi_tender_proposal_date');
        $basic_branch->tpi_agency_name = $request->input('tpi_agency_name');
        $basic_branch->tpi_validity_extension_date = $request->input('tpi_validity_extension_date');
        $basic_branch->tpi_validity_extension_letter_no = $request->input('tpi_validity_extension_letter_no');
        $basic_branch->tpi_validity_extension_letter_date = $request->input('tpi_validity_extension_letter_date');
        $basic_branch->tpi_validity_extension_letter_image = $request->input('tpi_validity_extension_letter_image');
        $basic_branch->tpi_aggr_no = $request->input('tpi_aggr_no');
        $basic_branch->tpi_agency_last = $request->input('tpi_agency_last');
        
        $forest_protected = $request->input('forest_protected');
        
        if (isset($forest_protected) && sizeof($forest_protected)) {

            $basic_branch->forest_protected = implode(",",$forest_protected);
            // foreach ($forest_protected as $option) {
            //     Master::create([
            //         'forest_protected' => $option,
            //     ]);
            // }
        }

        $used_type = $request->input('used_type');
        
        if (isset($used_type) && sizeof($used_type)) {
            
            // foreach ($used_type as $option) {
            //     Master::create([
            //         'used_type' => $option,
            //     ]);
            // }
            $basic_branch->used_type = implode(",",$used_type);
        }
        
        $basic_branch->save();
        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
