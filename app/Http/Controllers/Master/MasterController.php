<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Master;
use App\Models\PbBranch\NameOfProject;
use App\Models\PbBranch\NameOfSchema;
use App\Models\Tender\AddTenderForm;
use App\Models\Tender\AddTpiTenderForm;
use Illuminate\Http\Request;

class MasterController extends Controller
{





    public function storeImage($img, $path)
    {
        $path = public_path($path);
        !is_dir($path) &&
            mkdir($path, 0777, true);

        $imageName = time() . '.' . $img->extension();
        $img->move($path, $imageName);
        return $imageName;
    }


    public function insert(Request $request)
    {

        // $rules = [
        //     'basic_name_scheme' => 'required',
        //     'basic_name_project' => 'required',
        //     'basic_wms_work_head' => 'required',
        //     'district_id' => 'required',
        //     'taluka_id' => 'required',
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



        if ($request->master_id != '') {
            $basic_branch = Master::find($request->master_id);
            if (!$basic_branch) {
                return response()->json(['status' => 400, 'msg' => 'Master division not found!']);
            }
        } else {
            $basic_branch = new Master();
        }
        $step = $request->step;
        if ($step == '') {
            return response()->json(['status' => '400', 'msg' => 'Invalid step']);
        }
        //basic
        if ($step == 'basic') {
            $basic_branch->basic_name_scheme = $request->input('basic_name_scheme');
            $basic_branch->basic_name_project = $request->input('basic_name_project');
            $basic_branch->basic_wms_work_head = $request->input('basic_wms_work_head');
            $basic_branch->district_id = $request->input('district_id');
            $basic_branch->taluka_id = $request->input('taluka_id');
            $basic_branch->work_type_id = $request->input('work_type_id');
            $basic_branch->types_of_work = $request->input('types_of_work');
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

            if (isset($request->basic_upload_img)) {


                $basic_branch->basic_upload_img = $this->storeImage($request->basic_upload_img, 'images/masters/');
            }
            if (isset($request->basic_sent_box_img)) {


                $basic_branch->basic_sent_box_img = $this->storeImage($request->basic_sent_box_img, 'images/masters/');
            }


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
        }
        //proposal approval
        if ($step == 'proposal') {
            $basic_branch->initiated_name = $request->input('initiated_name');
            $basic_branch->ppd_letter_no = $request->input('ppd_letter_no');
            $basic_branch->ppd_letter_date = $request->input('ppd_letter_date');
            $basic_branch->ppd_amount = $request->input('ppd_amount');
            $basic_branch->ppd_treatment_detail = $request->input('ppd_treatment_detail');
            $basic_branch->ppd_proposal_submitted_letter_no = $request->input('ppd_proposal_submitted_letter_no');
            $basic_branch->ppd_proposal_submitted_letter_date = $request->input('ppd_proposal_submitted_letter_date');
            $basic_branch->ppd_proposal_submission_office = $request->input('ppd_proposal_submission_office');

            if (isset($request->ppd_letter_upload)) {
                $basic_branch->ppd_letter_upload = $this->storeImage($request->ppd_letter_upload, 'uplode_images/proposal_submitte_detail/');
            }
        }
        //principal approval
        if ($step == 'principal') {
            $basic_branch->pad_letter_no = $request->input('pad_letter_no');
            $basic_branch->pad_letter_date = $request->input('pad_letter_date');
            $basic_branch->pad_amount = $request->input('pad_amount');
            $basic_branch->pad_approved_by = $request->input('pad_approved_by');

            if (isset($request->pad_letter_upload)) {
                $basic_branch->pad_letter_upload = $this->storeImage($request->pad_letter_upload, 'uplode_images/principal_approval_detail/');
            }
        }
        if ($step == 'block') {

            $basic_branch->bes_letter_no = $request->input('bes_letter_no');
            $basic_branch->bes_letter_date = $request->input('bes_letter_date');
            $basic_branch->bes_amount = $request->input('bes_amount');
            $basic_branch->bes_letter_upload = $request->input('bes_letter_upload');
            $basic_branch->bes_provision_in_estimate = $request->input('bes_provision_in_estimate');
            $basic_branch->bes_submit_letter = $request->input('bes_submit_letter');
            $basic_branch->bes_submit_office_date = $request->input('bes_submit_office_date');

            if (isset($request->bes_office_letter_upload)) {
                $basic_branch->bes_office_letter_upload = $this->storeImage($request->bes_office_letter_upload, 'uplode_images/block_estimate_submitted_detail/');
            }

            $basic_branch->division_id = $request->input('division_id');
            $basic_branch->sub_division_id = $request->input('sub_division_id');

            $bes_follow_up_date = $request->input('bes_follow_up_date');
            if (isset($bes_follow_up_date) && sizeof($bes_follow_up_date)) {

                $basic_branch->bes_follow_up_date = implode(",", $bes_follow_up_date);
            }


            $bes_status = $request->input('bes_status');
            if (isset($bes_status) && sizeof($bes_status)) {

                $basic_branch->bes_status = implode(",", $bes_status);
            }



            $bes_remark = $request->input('bes_remark');
            if (isset($bes_remark) && sizeof($bes_remark)) {

                $basic_branch->bes_remark = implode(",", $bes_remark);
            }
        }

        //adminstring approval

        if ($step == 'administring_approval') {

            $basic_branch->aa_letter_no = $request->input('aa_letter_no');
            $basic_branch->aa_letter_date = $request->input('aa_letter_date');
            $basic_branch->aa_amount = $request->input('aa_amount');

            if (isset($request->aa_letter_upload)) {
                $basic_branch->aa_letter_upload = $this->storeImage($request->aa_letter_upload, 'uplode_images/administrative_approval/');
            }

            $basic_branch->aa_approved_by = $request->input('aa_approved_by');
            $basic_branch->aa_detail_regarding_architecture = $request->input('aa_detail_regarding_architecture');
        }


        //technical section

        if ($step == 'technical_section') {
            $basic_branch->tsd_letter_no = $request->input('tsd_letter_no');
            $basic_branch->tsd_letter_date = $request->input('tsd_letter_date');
            $basic_branch->tsd_amount = $request->input('tsd_amount');
            if (isset($request->tsd_letter_upload)) {
                $basic_branch->tsd_letter_upload = $this->storeImage($request->tsd_letter_upload, 'uplode_images/technical_section_detail/');
            }
            $basic_branch->tsd_approved_by = $request->input('tsd_approved_by');
            $basic_branch->tsd_provision_in_ts_estimate = $request->input('tsd_provision_in_ts_estimate');
        }


        //forest clearnce
        if ($step == 'forest_cleaner') {

            $basic_branch->forest_chainage = $request->input('forest_chainage');

            $basic_branch->forest_no_trees = $request->input('forest_no_trees');
            $basic_branch->forest_area_hect = $request->input('forest_area_hect');
            $basic_branch->forest_appr_state = $request->input('forest_appr_state');
            $basic_branch->forest_proposal_submit = $request->input('forest_proposal_submit');
            $basic_branch->forest_letter_no = $request->input('forest_letter_no');
            $basic_branch->forest_letter_date = $request->input('forest_letter_date');

            if (isset($request->forest_upload_img)) {
                $basic_branch->forest_upload_img = $this->storeImage($request->forest_upload_img, 'uplode_images/forest_clearance_detail/');
            }

            $basic_branch->forest_online_no = $request->input('forest_online_no');
            $basic_branch->forest_online_date = $request->input('forest_online_date');
            $basic_branch->forest_joint_site = $request->input('forest_joint_site');
            $basic_branch->forest_approved_by = $request->input('forest_approved_by');
            $basic_branch->forest_l_no = $request->input('forest_l_no');

            if (isset($request->forest_letter_img)) {
                $basic_branch->forest_letter_img = $this->storeImage($request->forest_letter_img, 'uplode_images/forest_clearance_detail/');
            }

            $basic_branch->forest_final_approval = $request->input('forest_final_approval');
            $basic_branch->forest_status = $request->input('forest_status');


            $forest_protected = $request->input('forest_protected');

            if (isset($forest_protected) && sizeof($forest_protected)) {

                $basic_branch->forest_protected = implode(",", $forest_protected);
            }
        }



        //utility-shifting-detail
        if ($step == 'utility_shifting') {


            $basic_branch->usd_chainage = $request->input('usd_chainage');
            $basic_branch->usd_work_head = $request->input('usd_work_head');

            $usd_utility_item = $request->input('usd_utility_item');
            if (isset($usd_utility_item) && sizeof($usd_utility_item)) {

                $basic_branch->usd_utility_item = implode(",", $usd_utility_item);
            }


            $used_type = $request->input('used_type');

            if (isset($used_type) && sizeof($used_type)) {


                $basic_branch->used_type = implode(",", $used_type);
            }


            $usd_details = $request->input('usd_details');
            if (isset($usd_details) && sizeof($usd_details)) {

                $basic_branch->usd_details = implode(",", $usd_details);
            }

            $estimated_usd_latter_no = $request->input('estimated_usd_latter_no');
            if (isset($estimated_usd_latter_no) && sizeof($estimated_usd_latter_no)) {

                $basic_branch->estimated_usd_latter_no = implode(",", $estimated_usd_latter_no);
            }

            $usd_date_input = $request->input('usd_date_input');
            if (isset($usd_date_input) && sizeof($usd_date_input)) {

                $basic_branch->usd_date_input = implode(",", $usd_date_input);
            }

            $usd_submitted_to = $request->input('usd_submitted_to');
            if (isset($usd_submitted_to) && sizeof($usd_submitted_to)) {

                $basic_branch->usd_submitted_to = implode(",", $usd_submitted_to);
            }

            $usd_joint_visit = $request->input('usd_joint_visit');
            if (isset($usd_joint_visit) && sizeof($usd_joint_visit)) {

                $basic_branch->usd_joint_visit = implode(",", $usd_joint_visit);
            }


            $usd_estimate_submited = $request->input('usd_estimate_submited');
            if (isset($usd_estimate_submited) && sizeof($usd_estimate_submited)) {

                $basic_branch->usd_estimate_submited = implode(",", $usd_estimate_submited);
            }


            $usd_latter_no = $request->input('usd_latter_no');
            if (isset($usd_latter_no) && sizeof($usd_latter_no)) {

                $basic_branch->usd_latter_no = implode(",", $usd_latter_no);
            }


            $usd_date_input_sec = $request->input('usd_date_input_sec');
            if (isset($usd_date_input_sec) && sizeof($usd_date_input_sec)) {

                $basic_branch->usd_date_input_sec = implode(",", $usd_date_input_sec);
            }



            $usd_amount = $request->input('usd_amount');
            if (isset($usd_amount) && sizeof($usd_amount)) {

                $basic_branch->usd_amount = implode(",", $usd_amount);
            }

            $usd_payment = $request->input('usd_payment');
            if (isset($usd_payment) && sizeof($usd_payment)) {

                $basic_branch->usd_payment = implode(",", $usd_payment);
            }



            $usd_date_input_th = $request->input('usd_date_input_th');
            if (isset($usd_date_input_th) && sizeof($usd_date_input_th)) {

                $basic_branch->usd_date_input_th = implode(",", $usd_date_input_th);
            }


            $usd_date_input_fr = $request->input('usd_date_input_fr');
            if (isset($usd_date_input_fr) && sizeof($usd_date_input_fr)) {

                $basic_branch->usd_date_input_fr = implode(",", $usd_date_input_fr);
            }

            $usd_date_input_fi = $request->input('usd_date_input_fi');
            if (isset($usd_date_input_fi) && sizeof($usd_date_input_fi)) {

                $basic_branch->usd_date_input_fi = implode(",", $usd_date_input_fi);
            }
        }

        if ($step == 'laqapproval') {

            //laq-approval
            $basic_branch->laq_name_village = $request->input('laq_name_village');
            $basic_branch->laq_office = $request->input('laq_office');
            $basic_branch->laq_letter_no = $request->input('laq_letter_no');
            $basic_branch->laq_letter_date = $request->input('laq_letter_date');
            if (isset($request->laq_letter_uplode)) {
                $basic_branch->laq_letter_uplode = $this->storeImage($request->laq_letter_uplode, 'uplode_images/laq_approval/');
            }

            $basic_branch->laq_file_sub = $request->input('laq_file_sub');
            $basic_branch->laq_dlr_no = $request->input('laq_dlr_no');
            $basic_branch->laq_pro_date = $request->input('laq_pro_date');
            $basic_branch->laq_challan_amt = $request->input('laq_challan_amt');
            $basic_branch->laq_challan_date = $request->input('laq_challan_date');
            $basic_branch->laq_payment_date = $request->input('laq_payment_date');
            $basic_branch->laq_jms_date = $request->input('laq_jms_date');
            $basic_branch->laq_jms_office = $request->input('laq_jms_office');
            $basic_branch->laq_approved_jms_date = $request->input('laq_approved_jms_date');
            if (isset($request->laq_upload_img)) {
                $basic_branch->laq_upload_img = $this->storeImage($request->laq_upload_img, 'uplode_images/laq_approval/');
            }

            $basic_branch->laq_file_collector = $request->input('laq_file_collector');
            $basic_branch->laq_file_date = $request->input('laq_file_date');
            $basic_branch->laq_gati_date = $request->input('laq_gati_date');
            $basic_branch->laq_sec_10 = $request->input('laq_sec_10');
            $basic_branch->laq_sec_date = $request->input('laq_sec_date');
            $basic_branch->laq_sec_11 = $request->input('laq_sec_11');
            $basic_branch->laq_sec11_date = $request->input('laq_sec11_date');
            $basic_branch->laq_sec_19 = $request->input('laq_sec_19');

            $laq_valuation = $request->input('laq_valuation');
            if (isset($laq_valuation) && sizeof($laq_valuation)) {

                $basic_branch->laq_valuation = implode(",", $laq_valuation);
            }

            $laq_amt = $request->input('laq_amt');
            if (isset($laq_amt) && sizeof($laq_amt)) {

                $basic_branch->laq_amt = implode(",", $laq_amt);
            }

            $laq_num = $request->input('laq_num');
            if (isset($laq_num) && sizeof($laq_num)) {

                $basic_branch->laq_num = implode(",", $laq_num);
            }

            $laq_date = $request->input('laq_date');
            if (isset($laq_date) && sizeof($laq_date)) {

                $basic_branch->laq_date = implode(",", $laq_date);
            }

            $basic_branch->laq_sec_21 = $request->input('laq_sec_21');
            $basic_branch->laq_s21_file_date = $request->input('laq_s21_file_date');
            $basic_branch->laq_approval = $request->input('laq_approval');
            $basic_branch->laq_sec_23 = $request->input('laq_sec_23');
            $basic_branch->laq_23sec_date = $request->input('laq_23sec_date');
            $basic_branch->laq_23letter_no = $request->input('laq_23letter_no');
            if (isset($request->laq_23_img)) {
                $basic_branch->laq_23_img = $this->storeImage($request->laq_23_img, 'uplode_images/laq_approval/');
            }

            $basic_branch->laq_poss_detail = $request->input('laq_poss_detail');
            $basic_branch->laq_status = $request->input('laq_status');
        }

        if ($step == 'bugedtry_details') {
            //budgetary-detail
            $basic_branch->bd_item_first = $request->input('bd_item_first');
            $basic_branch->bd_detail_head = $request->input('bd_detail_head');
            $basic_branch->bd_item_no = $request->input('bd_item_no');
            $basic_branch->bd_page_no = $request->input('bd_page_no');
            $basic_branch->bd_continous = $request->input('bd_continous');


            $budget_previous_year = $request->input('budget_previous_year');
            if (isset($budget_previous_year) && sizeof($budget_previous_year)) {

                $basic_branch->budget_previous_year = implode(",", $budget_previous_year);
            }

            $budget_previous_amount = $request->input('budget_previous_amount');
            if (isset($budget_previous_amount) && sizeof($budget_previous_amount)) {

                $basic_branch->budget_previous_amount = implode(",", $budget_previous_amount);
            }
        }

        //expenditure-detail

        if ($step == 'expenditure_detail') {

            $ed_origin_work = $request->input('ed_origin_work');
            if (isset($ed_origin_work) && sizeof($ed_origin_work)) {

                $basic_branch->ed_origin_work = implode(",", $ed_origin_work);
            }

            $ed_tender_cost = $request->input('ed_tender_cost');
            if (isset($ed_tender_cost) && sizeof($ed_tender_cost)) {

                $basic_branch->ed_tender_cost = implode(",", $ed_tender_cost);
            }


            $ed_paid_amount = $request->input('ed_paid_amount');
            if (isset($ed_paid_amount) && sizeof($ed_paid_amount)) {

                $basic_branch->ed_paid_amount = implode(",", $ed_paid_amount);
            }


            $ed_estimated_cost = $request->input('ed_estimated_cost');
            if (isset($ed_estimated_cost) && sizeof($ed_estimated_cost)) {

                $basic_branch->ed_estimated_cost = implode(",", $ed_estimated_cost);
            }


            $ed_project_cost = $request->input('ed_project_cost');
            if (isset($ed_project_cost) && sizeof($ed_project_cost)) {

                $basic_branch->ed_project_cost = implode(",", $ed_project_cost);
            }

            $ed_expenditure_amount = $request->input('ed_expenditure_amount');
            if (isset($ed_expenditure_amount) && sizeof($ed_expenditure_amount)) {

                $basic_branch->ed_expenditure_amount = implode(",", $ed_expenditure_amount);
            }

            $ed_expenditure = $request->input('ed_expenditure');
            if (isset($ed_expenditure) && sizeof($ed_expenditure)) {

                $basic_branch->ed_expenditure = implode(",", $ed_expenditure);
            }

            $ed_work = $request->input('ed_work');
            if (isset($ed_work) && sizeof($ed_work)) {

                $basic_branch->ed_work = implode(",", $ed_work);
            }

            $ed_amount_for = $request->input('ed_amount_for');
            if (isset($ed_amount_for) && sizeof($ed_amount_for)) {

                $basic_branch->ed_amount_for = implode(",", $ed_amount_for);
            }
        }

        if ($step == 'excess_details') {
            //excess-detail
            $basic_branch->ed_division_letter_no = $request->input('ed_division_letter_no');
            $basic_branch->ed_division_letter_date = $request->input('ed_division_letter_date');
            if (isset($request->ed_division_letter_image)) {
                $basic_branch->ed_division_letter_image = $this->storeImage($request->ed_division_letter_image, 'uplode_images/excess_detail_extra_detail/');
            }
            $basic_branch->ed_circle_letter_no = $request->input('ed_circle_letter_no');
            $basic_branch->ed_circle_letter_date = $request->input('ed_circle_letter_date');
            if (isset($request->ed_circle_letter_image)) {
                $basic_branch->ed_circle_letter_image = $this->storeImage($request->ed_circle_letter_image, 'uplode_images/excess_detail_extra_detail/');
            }

            $basic_branch->ed_government_letter_no = $request->input('ed_government_letter_no');
            $basic_branch->ed_government_letter_date = $request->input('ed_government_letter_date');
            if (isset($request->ed_government_letter_image)) {
                $basic_branch->ed_government_letter_image = $this->storeImage($request->ed_government_letter_image, 'uplode_images/excess_detail_extra_detail/');
            }

            $basic_branch->ed_approval_letter_no = $request->input('ed_approval_letter_no');
            $basic_branch->ed_approval_letter_date = $request->input('ed_approval_letter_date');
            $basic_branch->ed_approval_letter_amount = $request->input('ed_approval_letter_amount');
            $basic_branch->ed_approval_extra_amount = $request->input('ed_approval_extra_amount');
            $basic_branch->ed_item_detail = $request->input('ed_item_detail');
        }

        if ($step == 'time_extension') {
            //time-extension

            $tle_proposal_letter_no = $request->input('tle_proposal_letter_no');
            if (isset($tle_proposal_letter_no) && sizeof($tle_proposal_letter_no)) {

                $basic_branch->tle_proposal_letter_no = implode(",", $tle_proposal_letter_no);
            }
            $tle_proposal_letter_date = $request->input('tle_proposal_letter_date');
            if (isset($tle_proposal_letter_date) && sizeof($tle_proposal_letter_date)) {

                $basic_branch->tle_proposal_letter_date = implode(",", $tle_proposal_letter_date);
            }
            $tle_proposal_extension_date = $request->input('tle_proposal_extension_date');
            if (isset($tle_proposal_extension_date) && sizeof($tle_proposal_extension_date)) {

                $basic_branch->tle_proposal_extension_date = implode(",", $tle_proposal_extension_date);
            }


            $data = [];
            if ($request->hasfile('tle_proposal_letter_image')) {

                foreach ($request->file('tle_proposal_letter_image') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->move('uplode_images/time_limit_extension/', $name);
                    $data[] = $name;
                }
                $basic_branch->tle_proposal_letter_image = implode(",", $data);
            }



            $tle_approval_letter_no = $request->input('tle_approval_letter_no');
            if (isset($tle_approval_letter_no) && sizeof($tle_approval_letter_no)) {

                $basic_branch->tle_approval_letter_no = implode(",", $tle_approval_letter_no);
            }
            $tle_approval_letter_date = $request->input('tle_approval_letter_date');
            if (isset($tle_approval_letter_date) && sizeof($tle_approval_letter_date)) {

                $basic_branch->tle_approval_letter_date = implode(",", $tle_approval_letter_date);
            }
            $tle_approval_extension_date = $request->input('tle_approval_extension_date');
            if (isset($tle_approval_extension_date) && sizeof($tle_approval_extension_date)) {

                $basic_branch->tle_approval_extension_date = implode(",", $tle_approval_extension_date);
            }

            $data = [];
            if ($request->hasfile('tle_approval_letter_image')) {

                foreach ($request->file('tle_approval_letter_image') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->move('uplode_images/time_limit_extension/', $name);
                    $data[] = $name;
                }
                $basic_branch->tle_approval_letter_image = implode(",", $data);
            }

            $tle_status = $request->input('tle_status');
            if (isset($tle_status) && sizeof($tle_status)) {

                $basic_branch->tle_status = implode(",", $tle_status);
            }
        }


        //work-status
        if ($step == 'work_status') {
            $basic_branch->ws_sd_release = $request->input('ws_sd_release');
            $basic_branch->ws_sd_completion = $request->input('ws_sd_completion');
            $basic_branch->work_yes_no = $request->input('work_yes_no');
            $basic_branch->acctual_yes_no = $request->input('acctual_yes_no');
        }
        //FMG
        if ($step == 'fmg') {
            $basic_branch->fmg_completion_date = $request->input('fmg_completion_date');
            $basic_branch->fmg_time = $request->input('fmg_time');
            $basic_branch->fmg_date = $request->input('fmg_date');
            $basic_branch->add_fmg_date = $request->input('add_fmg_date');
            $fmg_dropdown = $request->input('fmg_dropdown');
            if (isset($fmg_dropdown) && sizeof($fmg_dropdown)) {

                $basic_branch->fmg_dropdown = implode(",", $fmg_dropdown);
            }
            $fmg_entry_amount = $request->input('fmg_entry_amount');
            if (isset($fmg_entry_amount) && sizeof($fmg_entry_amount)) {

                $basic_branch->fmg_entry_amount = implode(",", $fmg_entry_amount);
            }
        }
        //FDR
        if ($step == 'fdr') {
            $basic_branch->fdr_work_date = $request->input('fdr_work_date');
            $basic_branch->fdr_time = $request->input('fdr_time');
            $basic_branch->fdr_date = $request->input('fdr_date');
            $basic_branch->add_fdr_date = $request->input('add_fdr_date');
        }

        //DLP Period
        if ($step == 'dlp') {
            $dlp_completion_date = $request->input('dlp_completion_date');
            if (isset($dlp_completion_date) && sizeof($dlp_completion_date)) {

                $basic_branch->dlp_completion_date = implode(",", $dlp_completion_date);
            }

            $dlp_released_date = $request->input('dlp_released_date');
            if (isset($dlp_released_date) && sizeof($dlp_released_date)) {

                $basic_branch->dlp_released_date = implode(",", $dlp_released_date);
            }

            $dlp_amount = $request->input('dlp_amount');
            if (isset($dlp_amount) && sizeof($dlp_amount)) {

                $basic_branch->dlp_amount = implode(",", $dlp_amount);
            }

            $dlp_work_completion_date = $request->input('dlp_work_completion_date');
            if (isset($dlp_work_completion_date) && sizeof($dlp_work_completion_date)) {

                $basic_branch->dlp_work_completion_date = implode(",", $dlp_work_completion_date);
            }

            $dlp_timeline = $request->input('dlp_timeline');
            if (isset($dlp_timeline) && sizeof($dlp_timeline)) {

                $basic_branch->dlp_timeline = implode(",", $dlp_timeline);
            }

            $dlp_dropdown = $request->input('dlp_dropdown');
            if (isset($dlp_dropdown) && sizeof($dlp_dropdown)) {

                $basic_branch->dlp_dropdown = implode(",", $dlp_dropdown);
            }
        }
        //Tender
        //DTP Approval Detail
        if ($step == 'dtp') {

            $basic_branch->dtp_sub_to = $request->input('dtp_sub_to');
            $basic_branch->dtp_submit_date = $request->input('dtp_submit_date');
            $basic_branch->dtp_submit_letter_no = $request->input('dtp_submit_letter_no');
            $basic_branch->dtp_authority = $request->input('dtp_authority');
            $basic_branch->dtp_date = $request->input('ed_circle_letter_date');
            $basic_branch->dtp_letter_no = $request->input('dtp_letter_no');
            $basic_branch->dtp_amt = $request->input('dtp_amt');
            $dtp_f_date = $request->input('dtp_f_date');
            if (isset($dtp_f_date) && sizeof($dtp_f_date)) {

                $basic_branch->dtp_f_date = implode(",", $dtp_f_date);
            }

            $dtp_f_status = $request->input('dtp_f_status');
            if (isset($dtp_f_status) && sizeof($dtp_f_status)) {

                $basic_branch->dtp_f_status = implode(",", $dtp_f_status);
            }



            $dtp_f_remark = $request->input('dtp_f_remark');
            if (isset($dtp_f_remark) && sizeof($dtp_f_remark)) {

                $basic_branch->dtp_f_remark = implode(",", $dtp_f_remark);
            }
        }
        //NIT
        if ($step == 'nit') {
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
            $basic_branch->nit_sent_circle_date = $request->input('nit_sent_circle_date');
            $basic_branch->nit_sent_goverment_date = $request->input('nit_sent_goverment_date');

            $basic_branch->nit_validity_date = $request->input('nit_validity_date');
            $basic_branch->nit_tender_form = $request->input('nit_tender_form');
            $basic_branch->nit_tender_proposal = $request->input('nit_tender_proposal');
            $basic_branch->nit_letter_no = $request->input('nit_letter_no');
            $basic_branch->nit_latter_date = $request->input('nit_latter_date');
            if (isset($request->nit_upload_letter)) {
                $basic_branch->nit_upload_letter = $this->storeImage($request->nit_upload_letter, 'uplode_images/nit/');
            }
            $nit_re_invited_date = $request->input('nit_re_invited_date');
            if (isset($nit_re_invited_date) && sizeof($nit_re_invited_date)) {

                $basic_branch->nit_re_invited_date = implode(",", $nit_re_invited_date);
            }



            $nit_with_reason = $request->input('nit_with_reason');
            if (isset($nit_with_reason) && sizeof($nit_with_reason)) {

                $basic_branch->nit_with_reason = implode(",", $nit_with_reason);
            }



            $nit_agency_main = $request->input('nit_agency_main');
            if (isset($nit_agency_main) && sizeof($nit_agency_main)) {

                $basic_branch->nit_agency_main = implode(",", $nit_agency_main);
            }

            $nit_tender_cost = $request->input('nit_tender_cost');
            if (isset($nit_tender_cost) && sizeof($nit_tender_cost)) {

                $basic_branch->nit_tender_cost = implode(",", $nit_tender_cost);
            }




            $nit_latter_no_2 = $request->input('nit_latter_no_2');
            if (isset($nit_latter_no_2) && sizeof($nit_latter_no_2)) {

                $basic_branch->nit_latter_no_2 = implode(",", $nit_latter_no_2);
            }


            $nit_tender_above = $request->input('nit_tender_above');
            if (isset($nit_tender_above) && sizeof($nit_tender_above)) {

                $basic_branch->nit_tender_above = implode(",", $nit_tender_above);
            }




            $nit_agency_name = $request->input('nit_agency_name');
            if (isset($nit_agency_name) && sizeof($nit_agency_name)) {

                $basic_branch->nit_agency_name = implode(",", $nit_agency_name);
            }

            $nit_validity_extension_date = $request->input('nit_validity_extension_date');
            if (isset($nit_validity_extension_date) && sizeof($nit_validity_extension_date)) {

                $basic_branch->nit_validity_extension_date = implode(",", $nit_validity_extension_date);
            }

            $nit_latter_extension_no = $request->input('nit_latter_extension_no');
            if (isset($nit_latter_extension_no) && sizeof($nit_latter_extension_no)) {

                $basic_branch->nit_latter_extension_no = implode(",", $nit_latter_extension_no);
            }

            $latter_date_extension = $request->input('latter_date_extension');
            if (isset($latter_date_extension) && sizeof($latter_date_extension)) {

                $basic_branch->latter_date_extension = implode(",", $latter_date_extension);
            }

            // $latter_image_extensions = $request->input('latter_image_extension'); // Use a plural variable name

            // if (isset($latter_image_extensions) && is_array($latter_image_extensions)) {
            //     // Store each image and build an array of extensions
            //     $image_extensions = [];
            //     foreach ($latter_image_extensions as $extension) {
            //         $storedExtension = $this->storeImage($extension, 'uplode_images/nit/');
            //         $image_extensions[] = $storedExtension;
            //     }

            //     // Join the extensions into a comma-separated string
            //     $basic_branch->latter_image_extension = implode(",", $image_extensions);
            // }

            $data = [];
            if ($request->hasfile('latter_image_extension')) {

                foreach ($request->file('latter_image_extension') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->move('uplode_images/nit/', $name);
                    $data[] = $name;
                }
                $basic_branch->latter_image_extension = implode(",", $data);
            }
        }

        if ($step == 'deposite') {
            //Deposit Order/Bank Guarantee Detail
            $basic_branch->do_tender_date = $request->input('do_tender_date');
            $basic_branch->do_agency_name = $request->input('do_agency_name');
            $basic_branch->do_letter_No = $request->input('do_letter_No');
            $basic_branch->do_tender_amt = $request->input('do_tender_amt');
            if (isset($request->do_letter_upload_img)) {
                $basic_branch->do_letter_upload_img = $this->storeImage($request->do_letter_upload_img, 'uplode_images/deposit_order_bank_guarantee_detail/');
            }


            $basic_branch->do_above = $request->input('do_above');
            $basic_branch->do_above_perc = $request->input('do_above_perc');
            $basic_branch->do_deposit_letter_no = $request->input('do_deposit_letter_no');
            $basic_branch->do_deposit_letter_date = $request->input('do_deposit_letter_date');
            $basic_branch->do_deposit_letter_amount = $request->input('do_deposit_letter_amount');
            if (isset($request->do_deposit_letter_upload)) {
                $basic_branch->do_deposit_letter_upload = $this->storeImage($request->do_deposit_letter_upload, 'uplode_images/deposit_order_bank_guarantee_detail/');
            }

            $basic_branch->do_dep_by = $request->input('do_dep_by');
            $basic_branch->do_submit_date = $request->input('do_submit_date');
            $basic_branch->do_submit_amount = $request->input('do_submit_amount');
            $basic_branch->do_condition_date = $request->input('do_condition_date');
            $basic_branch->do_condition_datails = $request->input('do_condition_datails');
            $basic_branch->do_condition_approval = $request->input('do_condition_approval');
            $basic_branch->do_bg_bank_verified = $request->input('do_bg_bank_verified');
            $basic_branch->do_bg_bank_address = $request->input('do_bg_bank_address');
            $basic_branch->do_bg_bank_name = $request->input('do_bg_bank_name');
            $basic_branch->do_bg_expire_date = $request->input('do_bg_expire_date');
            $basic_branch->do_bg_issue_date = $request->input('do_bg_issue_date');



            $basic_branch->do_fdr_date = $request->input('do_fdr_date');
            $basic_branch->do_fdr_amount = $request->input('do_fdr_amount');
            if (isset($request->do_fdr_image)) {
                $basic_branch->do_fdr_image = $this->storeImage($request->do_fdr_image, 'uplode_images/deposit_order_bank_guarantee_detail/');
            }


            $basic_branch->do_work_order_date = $request->input('do_work_order_date');
            $basic_branch->do_time_line_month = $request->input('do_time_line_month');
            $basic_branch->do_time_limit_any = $request->input('do_time_limit_any');
            $basic_branch->do_completion_date = $request->input('do_completion_date');
        }

        //TPI Detail
        if ($step == 'tpi') {
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



            $basic_branch->tpi_tender_proposal_date = $request->input('tpi_tender_proposal_date');
            $basic_branch->tpi_validity_date = $request->input('tpi_validity_date');
            $basic_branch->tpi_tender_form = $request->input('tpi_tender_form');
            $basic_branch->tpi_tender_proposal = $request->input('tpi_tender_proposal');
            $basic_branch->tpi_tender_letter_no = $request->input('tpi_tender_letter_no');
            $basic_branch->tpi_proposal_latter_date = $request->input('tpi_proposal_latter_date');
            if (isset($request->tpi_proposal_latter_image)) {
                $basic_branch->tpi_proposal_latter_image = $this->storeImage($request->tpi_proposal_latter_image, '/uplode_images/tpi_detail/');
            }


            $basic_branch->tpi_aggr_no = $request->input('tpi_aggr_no');
            $basic_branch->tpi_agency_last = $request->input('tpi_agency_last');



            $tpi_re_invited_date = $request->input('tpi_re_invited_date');
            if (isset($tpi_re_invited_date) && sizeof($tpi_re_invited_date)) {
                $basic_branch->tpi_re_invited_date = implode(",", $tpi_re_invited_date);
            }


            $tpi_with_reason = $request->input('tpi_with_reason');
            if (isset($tpi_with_reason) && sizeof($tpi_with_reason)) {
                $basic_branch->tpi_with_reason = implode(",", $tpi_with_reason);
            }




            $tpi_agency_main = $request->input('tpi_agency_main');
            if (isset($tpi_agency_main) && sizeof($tpi_agency_main)) {
                $basic_branch->tpi_agency_main = implode(",", $tpi_agency_main);
            }


            $tpi_tender_cost = $request->input('tpi_tender_cost');
            if (isset($tpi_tender_cost) && sizeof($tpi_tender_cost)) {
                $basic_branch->tpi_tender_cost = implode(",", $tpi_tender_cost);
            }




            $tpi_latter_no_2 = $request->input('tpi_latter_no_2');
            if (isset($tpi_latter_no_2) && sizeof($tpi_latter_no_2)) {
                $basic_branch->tpi_latter_no_2 = implode(",", $tpi_latter_no_2);
            }





            $tpi_above_tender_form = $request->input('tpi_above_tender_form');
            if (isset($tpi_above_tender_form) && sizeof($tpi_above_tender_form)) {
                $basic_branch->tpi_above_tender_form = implode(",", $tpi_above_tender_form);
            }



            $tpi_agency_name = $request->input('tpi_agency_name');
            if (isset($tpi_agency_name) && sizeof($tpi_agency_name)) {
                $basic_branch->tpi_agency_name = implode(",", $tpi_agency_name);
            }



            $tpi_validity_extension_date = $request->input('tpi_validity_extension_date');
            if (isset($tpi_validity_extension_date) && sizeof($tpi_validity_extension_date)) {
                $basic_branch->tpi_validity_extension_date = implode(",", $tpi_validity_extension_date);
            }

            $tpi_validity_extension_letter_date = $request->input('tpi_validity_extension_letter_date');
            if (isset($tpi_validity_extension_letter_date) && sizeof($tpi_validity_extension_letter_date)) {
                $basic_branch->tpi_validity_extension_letter_date = implode(",", $tpi_validity_extension_letter_date);
            }



            $tpi_validity_extension_letter_no = $request->input('tpi_validity_extension_letter_no');
            if (isset($tpi_validity_extension_letter_no) && sizeof($tpi_validity_extension_letter_no)) {
                $basic_branch->tpi_validity_extension_letter_no = implode(",", $tpi_validity_extension_letter_no);
            }






            $data = [];
            if ($request->hasfile('tpi_validity_extension_letter_image')) {

                foreach ($request->file('tpi_validity_extension_letter_image') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->move(public_path() . '/uplode_images/tpi_detail/', $name);
                    $data[] = $name;
                }
            }

            $basic_branch->tpi_validity_extension_letter_image = implode(",", $data);
        }





        $basic_branch->save();
        return response()->json(['status' => '200', 'msg' => 'success']);
    }


    public function name_of_schema_insert(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->name_of_scheme_id != '') {
            $division_master = NameOfSchema::find($request->name_of_scheme_id);
            if (!$division_master) {
                return response()->json(['status' => 400, 'msg' => 'Name not found!']);
            }
        } else {
            $division_master = new NameOfSchema();
        }
        $division_master->name = $request->input('name');
        $division_master->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }


    public function name_of_project_insert(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->add_name_of_project_id != '') {
            $add_name_of_project = NameOfProject::find($request->add_name_of_project_id);
            if (!$add_name_of_project) {
                return response()->json(['status' => 400, 'msg' => 'Name not found!']);
            }
        } else {
            $add_name_of_project = new NameOfProject();
        }
        $add_name_of_project->name = $request->input('name');
        $add_name_of_project->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function name_of_tender_insert(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->add_name_of_tender_id != '') {
            $add_name_of_project = AddTenderForm::find($request->add_name_of_tender_id);
            if (!$add_name_of_project) {
                return response()->json(['status' => 400, 'msg' => 'Tender not found!']);
            }
        } else {
            $add_name_of_project = new AddTenderForm();
        }
        $add_name_of_project->name = $request->input('name');
        $add_name_of_project->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }


    public function tpi_name_of_tender_insert(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->add_tpi_name_of_tender_id != '') {
            $add_name_of_project = AddTpiTenderForm::find($request->add_tpi_name_of_tender_id);
            if (!$add_name_of_project) {
                return response()->json(['status' => 400, 'msg' => 'Tender not found!']);
            }
        } else {
            $add_name_of_project = new AddTpiTenderForm();
        }
        $add_name_of_project->name = $request->input('name');
        $add_name_of_project->save();

        return response()->json(['status' => '200', 'msg' => 'success']);
    }
}
