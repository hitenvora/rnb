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
            $table->string('basic_wms_work_head')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->unsignedBigInteger('taluka_id')->nullable();
            $table->foreign('taluka_id')->references('id')->on('talukas');
            $table->unsignedBigInteger('work_type_id')->nullable();
            $table->foreign('work_type_id')->references('id')->on('work_types');
            $table->unsignedBigInteger('types_of_work_id')->nullable();
            $table->foreign('types_of_work_id')->references('id')->on('types_of_works');
            $table->string('basic_type_work_name')->nullable();
            $table->unsignedBigInteger('budget_id')->nullable();
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->string('basic_budget_name')->nullable();
            $table->unsignedBigInteger('budget_work_id')->nullable();
            $table->foreign('budget_work_id')->references('id')->on('budget_works');
            $table->string('basic_budget_work_name')->nullable();
            $table->text('basic_amount')->nullable();
            $table->text('basic_mp_mla')->nullable();
            $table->unsignedBigInteger('mp_mla_suggested_id')->nullable();
            $table->foreign('mp_mla_suggested_id')->references('id')->on('mp_mla_suggesteds');
            $table->string('basic_mp_mla_name')->nullable();
            $table->text('basic_letter_no')->nullable();
            $table->text('basic_letter_date')->nullable();
            $table->string('basic_upload_img')->nullable();
            $table->text('basic_suggest')->nullable();
            $table->string('basic_recever_from')->nullable();
            $table->string('basic_rec_letter_no')->nullable();
            $table->date('basic_rec_letter_date')->nullable();
            $table->string('basic_rec_letter_amount')->nullable();
            $table->string('basic_sent_proposal')->nullable();
            $table->string('basic_sent_proposal_letter_no')->nullable();
            $table->date('basic_sent_proposal_date')->nullable();
            $table->text('basic_sent_proposal_amount')->nullable();
            $table->unsignedBigInteger('sent_box_id')->nullable();
            $table->foreign('sent_box_id')->references('id')->on('sent_boxes');
            $table->string('basic_sent_box_name')->nullable();
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
            $table->string('initiated_name')->nullable();
            $table->string('ppd_letter_no')->nullable();
            $table->date('ppd_letter_date')->nullable();
            $table->double('ppd_amount')->nullable();
            $table->text('ppd_treatment_detail')->nullable();
            $table->string('ppd_proposal_submitted_letter_no')->nullable();
            $table->date('ppd_proposal_submitted_letter_date')->nullable();
            $table->string('ppd_proposal_submission_office')->nullable();
            $table->text('ppd_letter_upload')->nullable();

            //principal-approval-detail
            $table->string('pad_letter_no')->nullable();
            $table->date('pad_letter_date')->nullable();
            $table->double('pad_amount')->nullable();
            $table->text('pad_approved_by')->nullable();
            $table->text('pad_letter_upload')->nullable();

            //block-estimate-submit-detail
            $table->string('bes_letter_no')->nullable();
            $table->date('bes_letter_date')->nullable();
            $table->double('bes_amount')->nullable();
            $table->text('bes_letter_upload')->nullable();
            $table->text('bes_provision_in_estimate')->nullable();
            $table->string('bes_submit_letter')->nullable();
            $table->date('bes_submit_office_date')->nullable();
            $table->text('bes_office_letter_upload')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->foreign('division_id')->references('id')->on('division_masters');
            $table->unsignedBigInteger('sub_division_id')->nullable();
            $table->foreign('sub_division_id')->references('id')->on('sub_division_masters');
            $table->string('bes_follow_up_date')->nullable();
            $table->string('bes_status')->nullable();
            $table->text('bes_remark')->nullable();

            //administrative-approval
            $table->string('aa_letter_no')->nullable();
            $table->date('aa_letter_date')->nullable();
            $table->double('aa_amount')->nullable();
            $table->text('aa_letter_upload')->nullable();
            $table->string('aa_approved_by')->nullable();
            $table->text('aa_detail_regarding_architecture')->nullable();

            //technical-section-detail
            $table->string('tsd_letter_no')->nullable();
            $table->date('tsd_letter_date')->nullable();
            $table->double('tsd_amount')->nullable();
            $table->text('tsd_letter_upload')->nullable();
            $table->string('tsd_approved_by')->nullable();
            $table->text('tsd_provision_in_ts_estimate')->nullable();

            //forest clearance detail
            $table->string('forest_chainage')->nullable();
            $table->string('forest_protected')->nullable();
            $table->bigInteger('forest_no_trees')->nullable();
            $table->bigInteger('forest_area_hect')->nullable();
            $table->string('forest_appr_state')->nullable();
            $table->string('forest_proposal_submit')->nullable();
            $table->string('forest_letter_no')->nullable();
            $table->date('forest_letter_date')->nullable();
            $table->text('forest_upload_img')->nullable();
            $table->bigInteger('forest_online_no')->nullable();
            $table->date('forest_online_date')->nullable();
            $table->text('forest_joint_site')->nullable();
            $table->string('forest_approved_by')->nullable();
            $table->bigInteger('forest_l_no')->nullable();
            $table->text('forest_letter_img')->nullable();
            $table->text('forest_final_approval')->nullable();
            $table->text('forest_status')->nullable();

            //Utility Shifting Detail
            $table->string('usd_chainage')->nullable();
            $table->string('used_type')->nullable();
            $table->string('usd_work_head')->nullable();

            $table->string('usd_utility_item')->nullable();
            $table->string('usd_details')->nullable();
            $table->string('estimated_usd_latter_no')->nullable();
            $table->string('usd_date_input')->nullable();
            $table->string('usd_submitted_to')->nullable();
            $table->string('usd_joint_visit')->nullable();
            $table->string('usd_estimate_submited')->nullable();
            $table->string('usd_latter_no')->nullable();
            $table->string('usd_date_input_sec')->nullable();
            $table->string('usd_amount')->nullable();
            $table->string('usd_payment')->nullable();
            $table->string('usd_date_input_th')->nullable();
            $table->string('usd_date_input_fr')->nullable();
            $table->string('usd_date_input_fi')->nullable();


            //laq approval
            $table->text('laq_name_village')->nullable();
            $table->text('laq_office')->nullable();
            $table->string('laq_letter_no')->nullable();
            $table->date('laq_letter_date')->nullable();
            $table->text('laq_letter_uplode')->nullable();
            $table->string('laq_file_sub')->nullable();
            $table->string('laq_dlr_no')->nullable();
            $table->date('laq_pro_date')->nullable();
            $table->string('laq_challan_amt')->nullable();
            $table->date('laq_challan_date')->nullable();
            $table->date('laq_payment_date')->nullable();
            $table->date('laq_jms_date')->nullable();
            $table->string('laq_jms_office')->nullable();
            $table->date('laq_approved_jms_date')->nullable();
            $table->text('laq_upload_img')->nullable();
            $table->string('laq_file_collector')->nullable();
            $table->date('laq_file_date')->nullable();
            $table->date('laq_gati_date')->nullable();
            $table->text('laq_sec_10')->nullable();
            $table->date('laq_sec_date')->nullable();
            $table->text('laq_sec_11')->nullable();
            $table->date('laq_sec11_date')->nullable();
            $table->text('laq_sec_19')->nullable();
            $table->text('laq_valuation')->nullable();
            $table->bigInteger('laq_amt')->nullable();
            $table->bigInteger('laq_num')->nullable();
            $table->date('laq_date')->nullable();
            $table->text('laq_sec_21')->nullable();
            $table->date('laq_s21_file_date')->nullable();
            $table->text('laq_approval')->nullable();
            $table->text('laq_sec_23')->nullable();
            $table->date('laq_23sec_date')->nullable();
            $table->bigInteger('laq_23letter_no')->nullable();
            $table->text('laq_23_img')->nullable();
            $table->text('laq_poss_detail')->nullable();
            $table->text('laq_status')->nullable();

            //budgetry details
            $table->text('bd_item_first')->nullable();
            $table->text('bd_detail_head')->nullable();
            $table->text('bd_continous')->nullable();
            $table->bigInteger('bd_page_no')->nullable();
            $table->bigInteger('bd_item_no')->nullable();

            //expnditure detail
            $table->date('ed_origin_work')->nullable();
            $table->bigInteger('ed_tender_cost')->nullable();
            $table->bigInteger('ed_paid_amount')->nullable();
            $table->bigInteger('ed_expenditure_amount')->nullable();
            $table->string('ed_expenditure')->nullable();
            $table->string('ed_work')->nullable();
            $table->text('ed_amount_for')->nullable();

            //excess details
            $table->bigInteger('ed_division_letter_no')->nullable();
            $table->date('ed_division_letter_date')->nullable();
            $table->text('ed_division_letter_image')->nullable();
            $table->bigInteger('ed_circle_letter_no')->nullable();
            $table->date('ed_circle_letter_date')->nullable();
            $table->text('ed_circle_letter_image')->nullable();
            $table->bigInteger('ed_government_letter_no')->nullable();
            $table->date('ed_government_letter_date')->nullable();
            $table->text('ed_government_letter_image')->nullable();
            $table->bigInteger('ed_approval_letter_no')->nullable();
            $table->date('ed_approval_letter_date')->nullable();
            $table->text('ed_approval_letter_amount')->nullable();
            $table->text('ed_item_detail')->nullable();

            //time limit extension
            $table->bigInteger('tle_proposal_letter_no')->nullable();
            $table->date('tle_proposal_letter_date')->nullable();
            $table->date('tle_proposal_extension_date')->nullable();
            $table->text('tle_proposal_letter_image')->nullable();
            $table->bigInteger('tle_approval_letter_no')->nullable();
            $table->date('tle_approval_letter_date')->nullable();
            $table->date('tle_approval_extension_date')->nullable();
            $table->text('tle_approval_letter_image')->nullable();
            $table->text('tle_status')->nullable();

            //work status
            $table->date('ws_sd_completion')->nullable();
            $table->date('ws_sd_release')->nullable();
            $table->bigInteger('ws_sd_amount')->nullable();

            //fmg
            $table->date('fmg_completion_date')->nullable();
            $table->bigInteger('fmg_time')->nullable();
            $table->text('fmg_date')->nullable();
            $table->date('add_fmg_date')->nullable();

            //fdr
            $table->date('fdr_work_date')->nullable();
            $table->bigInteger('fdr_time')->nullable();
            $table->text('fdr_date')->nullable();
            $table->date('add_fdr_date')->nullable();

            //dlp
            $table->date('dlp_completion_date')->nullable();
            $table->date('dlp_released_date')->nullable();
            $table->bigInteger('dlp_amount')->nullable();


            //tender branch
            //dtp-approval
            $table->text('dtp_sub_to')->nullable();
            $table->date('dtp_submit_date')->nullable();
            $table->bigInteger('dtp_submit_letter_no')->nullable();
            $table->text('dtp_authority')->nullable();
            $table->date('dtp_date')->nullable();
            $table->bigInteger('dtp_letter_no')->nullable();
            $table->bigInteger('dtp_amt')->nullable();
            $table->date('dtp_f_date')->nullable();
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
            $table->bigInteger('nit_letter_no')->nullable();
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

            $table->bigInteger('do_letter_No')->nullable();
            $table->bigInteger('do_tender_amt')->nullable();
            $table->bigInteger('do_deposit_letter_no')->nullable();
            $table->bigInteger('do_deposit_letter_amount')->nullable();
            $table->bigInteger('do_submit_amount')->nullable();
            $table->bigInteger('do_bg_exp_amount')->nullable();
            $table->bigInteger('do_fdr_amount')->nullable();

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
            $table->text('tpi_validity_extension_letter_image')->nullable();
            $table->text('tpi_aggr_no')->nullable();
            $table->text('tpi_agency_last')->nullable();

            $table->bigInteger('tpi_dtp_amt')->nullable();
            $table->bigInteger('tpi_tendure_amount')->nullable();
            $table->bigInteger('tpi_nit_no')->nullable();
            $table->bigInteger('tpi_tender_letter_no')->nullable();
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
