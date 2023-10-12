<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('masters', function (Blueprint $table) {

            //pb branch basic
            $table->id();
            $table->text('basic_name_scheme')->nullable();
            $table->text('basic_name_project')->nullable();
            $table->text('basic_wms_work_head')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('taluka_id')->nullable();
            $table->foreign('taluka_id')->references('id')->on('talukas');
            $table->unsignedBigInteger('work_type_id')->nullable();
            $table->foreign('work_type_id')->references('id')->on('work_types');
            $table->unsignedBigInteger('types_of_work_id')->nullable();
            $table->foreign('types_of_work_id')->references('id')->on('types_of_works');
            $table->text('basic_type_work_name')->nullable();
            $table->unsignedBigInteger('budget_id')->nullable();
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->text('basic_budget_name')->nullable();
            $table->unsignedBigInteger('budget_work_id')->nullable();
            $table->foreign('budget_work_id')->references('id')->on('budget_works');
            $table->text('basic_budget_work_name')->nullable();
            $table->text('basic_amount')->nullable();
            $table->text('basic_mp_mla')->nullable();
            $table->unsignedBigInteger('mp_mla_suggested_id')->nullable();
            $table->foreign('mp_mla_suggested_id')->references('id')->on('mp_mla_suggesteds');
            $table->text('basic_mp_mla_name')->nullable();
            $table->text('basic_letter_no')->nullable();
            $table->text('basic_letter_date')->nullable();
            $table->text('basic_upload_img')->nullable();
            $table->text('basic_suggest')->nullable();
            $table->text('basic_recever_from')->nullable();
            $table->text('basic_rec_letter_no')->nullable();
            $table->date('basic_rec_letter_date')->nullable();
            $table->text('basic_rec_letter_amount')->nullable();
            $table->text('basic_sent_proposal')->nullable();
            $table->text('basic_sent_proposal_letter_no')->nullable();
            $table->date('basic_sent_proposal_date')->nullable();
            $table->text('basic_sent_proposal_amount')->nullable();
            $table->unsignedBigInteger('sent_box_id')->nullable();
            $table->foreign('sent_box_id')->references('id')->on('sent_boxes');
            $table->text('basic_sent_box_name')->nullable();
            $table->date('basic_sent_box_date')->nullable();
            $table->text('basic_sent_box_remark')->nullable();
            $table->text('basic_name_of_department')->nullable();
            $table->unsignedBigInteger('division_master_id')->nullable();
            $table->foreign('division_master_id')->references('id')->on('division_masters');
            $table->unsignedBigInteger('sub_division_master_id')->nullable();
            $table->foreign('sub_division_master_id')->references('id')->on('sub_division_masters');
            $table->text('basic_name_of_road')->nullable();
            $table->text('basic_category_of_road')->nullable();

            //proposal submitted details
            $table->text('initiated_name')->nullable();
            $table->text('ppd_letter_no')->nullable();
            $table->date('ppd_letter_date')->nullable();
            $table->text('ppd_amount')->nullable();
            $table->text('ppd_treatment_detail')->nullable();
            $table->text('ppd_proposal_submitted_letter_no')->nullable();
            $table->date('ppd_proposal_submitted_letter_date')->nullable();
            $table->text('ppd_proposal_submission_office')->nullable();
            $table->text('ppd_letter_upload')->nullable();

            //principal-approval-detail
            $table->text('pad_letter_no')->nullable();
            $table->date('pad_letter_date')->nullable();
            $table->text('pad_amount')->nullable();
            $table->text('pad_approved_by')->nullable();
            $table->text('pad_letter_upload')->nullable();

            //block-estimate-submit-detail
            $table->text('bes_letter_no')->nullable();
            $table->date('bes_letter_date')->nullable();
            $table->text('bes_amount')->nullable();
            $table->text('bes_letter_upload')->nullable();
            $table->text('bes_provision_in_estimate')->nullable();
            $table->text('bes_submit_letter')->nullable();
            $table->date('bes_submit_office_date')->nullable();
            $table->text('bes_office_letter_upload')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->foreign('division_id')->references('id')->on('division_masters');
            $table->unsignedBigInteger('sub_division_id')->nullable();
            $table->foreign('sub_division_id')->references('id')->on('sub_division_masters');
            $table->text('bes_follow_up_date')->nullable();
            $table->text('bes_status')->nullable();
            $table->text('bes_remark')->nullable();

            //administrative-approval
            $table->text('aa_letter_no')->nullable();
            $table->date('aa_letter_date')->nullable();
            $table->text('aa_amount')->nullable();
            $table->text('aa_letter_upload')->nullable();
            $table->text('aa_approved_by')->nullable();
            $table->text('aa_detail_regarding_architecture')->nullable();

            //technical-section-detail
            $table->text('tsd_letter_no')->nullable();
            $table->date('tsd_letter_date')->nullable();
            $table->text('tsd_amount')->nullable();
            $table->text('tsd_letter_upload')->nullable();
            $table->text('tsd_approved_by')->nullable();
            $table->text('tsd_provision_in_ts_estimate')->nullable();

            //forest clearance detail
            $table->text('forest_chainage')->nullable();
            $table->text('forest_protected')->nullable();
            $table->text('forest_no_trees')->nullable();
            $table->text('forest_area_hect')->nullable();
            $table->text('forest_appr_state')->nullable();
            $table->text('forest_proposal_submit')->nullable();
            $table->text('forest_letter_no')->nullable();
            $table->date('forest_letter_date')->nullable();
            $table->text('forest_upload_img')->nullable();
            $table->text('forest_online_no')->nullable();
            $table->date('forest_online_date')->nullable();
            $table->text('forest_joint_site')->nullable();
            $table->text('forest_approved_by')->nullable();
            $table->text('forest_l_no')->nullable();
            $table->text('forest_letter_img')->nullable();
            $table->text('forest_final_approval')->nullable();
            $table->text('forest_status')->nullable();

            //Utility Shifting Detail
            $table->text('usd_chainage')->nullable();
            $table->text('used_type')->nullable();
            $table->text('usd_work_head')->nullable();

            $table->text('usd_utility_item')->nullable();
            $table->text('usd_details')->nullable();
            $table->text('estimated_usd_latter_no')->nullable();
            $table->text('usd_date_input')->nullable();
            $table->text('usd_submitted_to')->nullable();
            $table->text('usd_joint_visit')->nullable();
            $table->text('usd_estimate_submited')->nullable();
            $table->text('usd_latter_no')->nullable();
            $table->text('usd_date_input_sec')->nullable();
            $table->text('usd_amount')->nullable();
            $table->text('usd_payment')->nullable();
            $table->text('usd_date_input_th')->nullable();
            $table->text('usd_date_input_fr')->nullable();
            $table->text('usd_date_input_fi')->nullable();


            //laq approval
            $table->text('laq_name_village')->nullable();
            $table->text('laq_office')->nullable();
            $table->text('laq_letter_no')->nullable();
            $table->date('laq_letter_date')->nullable();
            $table->text('laq_letter_uplode')->nullable();
            $table->text('laq_file_sub')->nullable();
            $table->text('laq_dlr_no')->nullable();
            $table->date('laq_pro_date')->nullable();
            $table->text('laq_challan_amt')->nullable();
            $table->date('laq_challan_date')->nullable();
            $table->date('laq_payment_date')->nullable();
            $table->date('laq_jms_date')->nullable();
            $table->text('laq_jms_office')->nullable();
            $table->date('laq_approved_jms_date')->nullable();
            $table->text('laq_upload_img')->nullable();
            $table->text('laq_file_collector')->nullable();
            $table->date('laq_file_date')->nullable();
            $table->date('laq_gati_date')->nullable();
            $table->text('laq_sec_10')->nullable();
            $table->date('laq_sec_date')->nullable();
            $table->text('laq_sec_11')->nullable();
            $table->date('laq_sec11_date')->nullable();
            $table->text('laq_sec_19')->nullable();
            $table->text('laq_valuation')->nullable();
            $table->text('laq_amt')->nullable();
            $table->text('laq_num')->nullable();
            $table->text('laq_date')->nullable();
            $table->text('laq_sec_21')->nullable();
            $table->date('laq_s21_file_date')->nullable();
            $table->text('laq_approval')->nullable();
            $table->text('laq_sec_23')->nullable();
            $table->date('laq_23sec_date')->nullable();
            $table->text('laq_23letter_no')->nullable();
            $table->text('laq_23_img')->nullable();
            $table->text('laq_poss_detail')->nullable();
            $table->text('laq_status')->nullable();

            //budgetry details
            $table->text('bd_item_first')->nullable();
            $table->text('bd_detail_head')->nullable();
            $table->text('bd_continous')->nullable();
            $table->text('bd_page_no')->nullable();
            $table->text('bd_item_no')->nullable();

            //expnditure detail
            $table->text('ed_origin_work')->nullable();
            $table->text('ed_tender_cost')->nullable();
            $table->text('ed_paid_amount')->nullable();
            $table->text('ed_expenditure_amount')->nullable();
            $table->text('ed_expenditure')->nullable();
            $table->text('ed_work')->nullable();
            $table->text('ed_amount_for')->nullable();

            //excess details
            $table->text('ed_division_letter_no')->nullable();
            $table->date('ed_division_letter_date')->nullable();
            $table->text('ed_division_letter_image')->nullable();
            $table->text('ed_circle_letter_no')->nullable();
            $table->date('ed_circle_letter_date')->nullable();
            $table->text('ed_circle_letter_image')->nullable();
            $table->text('ed_government_letter_no')->nullable();
            $table->date('ed_government_letter_date')->nullable();
            $table->text('ed_government_letter_image')->nullable();
            $table->text('ed_approval_letter_no')->nullable();
            $table->date('ed_approval_letter_date')->nullable();
            $table->text('ed_approval_letter_amount')->nullable();
            $table->text('ed_item_detail')->nullable();

            //time limit extension
            $table->text('tle_proposal_letter_no')->nullable();
            $table->date('tle_proposal_letter_date')->nullable();
            $table->date('tle_proposal_extension_date')->nullable();
            $table->text('tle_proposal_letter_image')->nullable();
            $table->text('tle_approval_letter_no')->nullable();
            $table->date('tle_approval_letter_date')->nullable();
            $table->date('tle_approval_extension_date')->nullable();
            $table->text('tle_approval_letter_image')->nullable();
            $table->text('tle_status')->nullable();

            //work status
            $table->date('ws_sd_completion')->nullable();
            $table->date('ws_sd_release')->nullable();
            $table->text('ws_sd_amount')->nullable();

            //fmg
            $table->date('fmg_completion_date')->nullable();
            $table->text('fmg_time')->nullable();
            $table->text('fmg_date')->nullable();
            $table->date('add_fmg_date')->nullable();

            //fdr
            $table->date('fdr_work_date')->nullable();
            $table->text('fdr_time')->nullable();
            $table->text('fdr_date')->nullable();
            $table->date('add_fdr_date')->nullable();

            //dlp
            $table->date('dlp_completion_date')->nullable();
            $table->date('dlp_released_date')->nullable();
            $table->text('dlp_amount')->nullable();


            //tender branch
            //dtp-approval
            $table->text('dtp_sub_to')->nullable();
            $table->date('dtp_submit_date')->nullable();
            $table->text('dtp_submit_letter_no')->nullable();
            $table->text('dtp_authority')->nullable();
            $table->date('dtp_date')->nullable();
            $table->text('dtp_letter_no')->nullable();
            $table->text('dtp_amt')->nullable();
            $table->text('dtp_f_date')->nullable();
            $table->text('dtp_f_status')->nullable();
            $table->text('dtp_f_remark')->nullable();

            //nit
            $table->text('nit_no')->nullable();
            $table->text('nit_pq_open')->nullable();
            $table->text('nit_with_reason')->nullable();
            $table->text('nit_tender_form')->nullable();
            $table->text('nit_upload_letter')->nullable();
            $table->text('nit_agency_main')->nullable();
            $table->text('nit_tender_cost')->nullable();
            $table->text('nit_tender_above')->nullable();
            $table->text('nit_agency_name')->nullable();
            $table->text('latter_image_extension')->nullable();
            $table->text('nit_letter_no')->nullable();
            $table->text('nit_latter_no_2')->nullable();
            $table->text('nit_latter_extension_no')->nullable();
            $table->date('nit_start_date')->nullable();
            $table->date('nit_end_date')->nullable();
            $table->date('nit_tender_open_date')->nullable();
            $table->date('nit_last_sub_date')->nullable();
            $table->date('nit_pre_bid_date')->nullable();
            $table->date('nit_tech_bid_date')->nullable();
            $table->date('nit_price_bid_date')->nullable();
            $table->date('nit_preliminary_date')->nullable();
            $table->date('nit_pq_sub_date')->nullable();
            $table->date('nit_pq_approval_date')->nullable();
            $table->longText('nit_re_invited_date')->nullable();
            $table->date('nit_validity_date')->nullable();
            $table->date('nit_tender_proposal')->nullable();
            $table->date('nit_latter_date')->nullable();
            $table->date('tender_proposal_date')->nullable();
            $table->longText('nit_validity_extension_date')->nullable();
            $table->longText('latter_date_extension')->nullable();


            //deposit-order
            $table->text('do_agency_name')->nullable();
            $table->text('do_letter_upload_img')->nullable();
            $table->text('do_above')->nullable();
            $table->text('do_above_perc')->nullable();
            $table->text('do_deposit_letter_upload')->nullable();
            $table->text('do_dep_by')->nullable();
            $table->text('do_bg_exp_image')->nullable();
            $table->text('do_fdr_image')->nullable();
            $table->text('do_time_line_month')->nullable();
            $table->text('do_time_limit_any')->nullable();

            $table->text('do_letter_No')->nullable();
            $table->text('do_tender_amt')->nullable();
            $table->text('do_deposit_letter_no')->nullable();
            $table->text('do_deposit_letter_amount')->nullable();
            $table->text('do_submit_amount')->nullable();
            $table->text('do_bg_exp_amount')->nullable();
            $table->text('do_fdr_amount')->nullable();

            $table->date('do_tender_date')->nullable();
            $table->date('do_deposit_letter_date')->nullable();
            $table->date('do_submit_date')->nullable();
            $table->date('do_bg_exp_date')->nullable();
            $table->date('do_fdr_date')->nullable();
            $table->date('do_work_order_date')->nullable();
            $table->date('do_completion_date')->nullable();

            //tpi details
            $table->text('tpi_pq_open')->nullable();
            $table->text('tpi_with_reason')->nullable();
            $table->text('tpi_tender_form')->nullable();
            $table->text('tpi_proposal_latter_image')->nullable();
            $table->text('tpi_agency_main')->nullable();
            $table->text('tpi_tender_cost')->nullable();
            $table->text('tpi_above_tender_form')->nullable();
            $table->text('tpi_agency_name')->nullable();
            $table->longText('tpi_validity_extension_letter_image')->nullable();
            $table->text('tpi_aggr_no')->nullable();
            $table->text('tpi_agency_last')->nullable();

            $table->text('tpi_dtp_amt')->nullable();
            $table->text('tpi_tendure_amount')->nullable();
            $table->text('tpi_nit_no')->nullable();
            $table->text('tpi_tender_letter_no')->nullable();
            $table->text('tpi_latter_no_2')->nullable();
            $table->text('tpi_validity_extension_letter_no')->nullable();

            $table->date('tpi_dtp_date')->nullable();
            $table->date('tpi_tender_date')->nullable();
            $table->date('tpi_start_date')->nullable();
            $table->date('tpi_end_date')->nullable();
            $table->date('tpi_tender_open_date')->nullable();
            $table->date('tpi_last_sub_date')->nullable();
            $table->date('tpi_pre_bid_date')->nullable();
            $table->date('tpi_tech_bid_date')->nullable();
            $table->date('tpi_price_bid_date')->nullable();
            $table->date('tpi_preliminary_date')->nullable();
            $table->date('tpi_pq_sub_date')->nullable();
            $table->date('tpi_pq_approval_date')->nullable();
            $table->text('tpi_re_invited_date')->nullable();
            $table->date('tpi_validity_date')->nullable();
            $table->date('tpi_tender_proposal')->nullable();
            $table->text('tpi_validity_extension_date')->nullable();
            $table->date('tpi_tender_proposal_date')->nullable();
            $table->text('tpi_validity_extension_letter_date')->nullable();
            $table->date('tpi_proposal_latter_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};
