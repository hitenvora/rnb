<?php

namespace App\Exports;

use App\Models\Admin\District;
use App\Models\Master\Master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportMasters implements FromCollection, WithHeadings, WithStyles
{
    protected $customVariable, $customHeadings;

    public function __construct($customVariable, $customHeadings)
    {
        $this->customVariable = $customVariable;
        $this->customHeadings = $customHeadings;
    }

    public function collection()
    {
        // dd($this->customVariable);
        // return Master::select($this->customVariable)->with('district')->get();
        $master =  Master::select($this->customVariable)->with('district', 'budgets', 'name_of_schema', 'name_of_project', 'talukas', 'work_types', 'mp_mla_suggesteds', 'sent_boxes', 'division_masters', 'sub_division_masters', 'add_tender_forms', 'add_tpi_tender_forms')->get();
        // dd($master);
        $phpArray = [];
        foreach ($master as $i => $ms) {
            if (in_array('id', $this->customVariable)) {
                $obj['id'] = $i + 1;
            }
            if (in_array('budget_id', $this->customVariable)) {
                $obj['budget_id'] = $ms->budgets ? $ms->budgets->name : '';
            }
            if (in_array('basic_name_scheme', $this->customVariable)) {
                $obj['basic_name_scheme'] = $ms->name_of_schema ? $ms->name_of_schema->name : '';
            }
            if (in_array('basic_name_project', $this->customVariable)) {
                $obj['basic_name_project'] = $ms->name_of_project ? $ms->name_of_project->name : '';
            }
            if (in_array('basic_wms_work_head', $this->customVariable)) {
                $obj['basic_wms_work_head'] = $ms->basic_wms_work_head;
            }
            if (in_array('district_id', $this->customVariable)) {
                $obj['district_id'] = $ms->district ? $ms->district->name : '';
            }
            if (in_array('taluka_id', $this->customVariable)) {
                $obj['taluka_id'] = $ms->talukas ? $ms->talukas->name : '';
            }
            if (in_array('work_type_id', $this->customVariable)) {
                $obj['work_type_id'] = $ms->work_types ? $ms->work_types->name : '';
            }
            if (in_array('types_of_work', $this->customVariable)) {
                $obj['types_of_work'] = $ms->types_of_work;
            }
            if (in_array('basic_type_work_name', $this->customVariable)) {
                $obj['basic_type_work_name'] = $ms->basic_type_work_name;
            }
            if (in_array('basic_buget_work', $this->customVariable)) {
                $obj['basic_buget_work'] = $ms->basic_buget_work;
            }
            if (in_array('basic_budget_work_name', $this->customVariable)) {
                $obj['basic_budget_work_name'] = $ms->basic_budget_work_name;
            }
            if (in_array('basic_amount', $this->customVariable)) {
                $obj['basic_amount'] = $ms->basic_amount;
            }
            if (in_array('basic_mp_mla', $this->customVariable)) {
                $obj['basic_mp_mla'] = $ms->mp_mla_suggesteds ? $ms->mp_mla_suggesteds->name : '';
            }
            if (in_array('basic_letter_no', $this->customVariable)) {
                $obj['basic_letter_no'] = $ms->basic_letter_no;
            }
            if (in_array('basic_letter_date', $this->customVariable)) {
                $obj['basic_letter_date'] = $ms->basic_letter_date;
            }
            if (in_array('basic_suggest', $this->customVariable)) {
                $obj['basic_suggest'] = $ms->basic_suggest;
            }
            if (in_array('basic_sent_proposal', $this->customVariable)) {
                $obj['basic_sent_proposal'] = $ms->basic_sent_proposal;
            }
            if (in_array('basic_sent_proposal_letter_no', $this->customVariable)) {
                $obj['basic_sent_proposal_letter_no'] = $ms->basic_sent_proposal_letter_no;
            }
            if (in_array('basic_sent_proposal_date', $this->customVariable)) {
                $obj['basic_sent_proposal_date'] = $ms->basic_sent_proposal_date;
            }
            if (in_array('basic_sent_proposal_amount', $this->customVariable)) {
                $obj['basic_sent_proposal_amount'] = $ms->basic_sent_proposal_amount;
            }
            if (in_array('sent_box_id', $this->customVariable)) {
                $obj['sent_box_id'] = $ms->sent_boxes ? $ms->sent_boxes->name : '';
            }
            if (in_array('basic_sent_box_date', $this->customVariable)) {
                $obj['basic_sent_box_date'] = $ms->basic_sent_box_date;
            }
            if (in_array('basic_sent_box_name', $this->customVariable)) {
                $obj['basic_sent_box_name'] = $ms->basic_sent_box_name;
            }
            if (in_array('basic_sent_box_remark', $this->customVariable)) {
                $obj['basic_sent_box_remark'] = $ms->basic_sent_box_remark;
            }
            if (in_array('basic_name_of_department', $this->customVariable)) {
                $obj['basic_name_of_department'] = $ms->basic_name_of_department;
            }
            if (in_array('division_master_id', $this->customVariable)) {
                $obj['division_master_id'] = $ms->division_masters ? $ms->division_masters->name : '';
            }
            if (in_array('sub_division_master_id', $this->customVariable)) {
                $obj['sub_division_master_id'] = $ms->sub_division_masters ? $ms->sub_division_masters->name : '';
            }
            if (in_array('basic_circle_name', $this->customVariable)) {
                $obj['basic_circle_name'] = $ms->basic_circle_name;
            }
            if (in_array('basic_name_of_road', $this->customVariable)) {
                $obj['basic_name_of_road'] = $ms->basic_name_of_road;
            }
            if (in_array('basic_category_of_road', $this->customVariable)) {
                $obj['basic_category_of_road'] = $ms->basic_category_of_road;
            }
            if (in_array('ppd_treatment_detail', $this->customVariable)) {
                $obj['ppd_treatment_detail'] = $ms->ppd_treatment_detail;
            }
            if (in_array('pad_letter_no', $this->customVariable)) {
                $obj['pad_letter_no'] = $ms->pad_letter_no;
            }
            if (in_array('pad_letter_date', $this->customVariable)) {
                $obj['pad_letter_date'] = $ms->pad_letter_date;
            }
            if (in_array('pad_amount', $this->customVariable)) {
                $obj['pad_amount'] = $ms->pad_amount;
            }
            if (in_array('pad_approved_by', $this->customVariable)) {
                $obj['pad_approved_by'] = $ms->pad_approved_by;
            }
            if (in_array('bes_letter_no', $this->customVariable)) {
                $obj['bes_letter_no'] = $ms->bes_letter_no;
            }
            if (in_array('bes_letter_date', $this->customVariable)) {
                $obj['bes_letter_date'] = $ms->bes_letter_date;
            }
            if (in_array('bes_amount', $this->customVariable)) {
                $obj['bes_amount'] = $ms->bes_amount;
            }
            if (in_array('bes_provision_in_estimate', $this->customVariable)) {
                $obj['bes_provision_in_estimate'] = $ms->bes_provision_in_estimate;
            }
            if (in_array('bes_submit_letter', $this->customVariable)) {
                $obj['bes_submit_letter'] = $ms->bes_submit_letter;
            }
            if (in_array('bes_submit_office_date', $this->customVariable)) {
                $obj['bes_submit_office_date'] = $ms->bes_submit_office_date;
            }
            if (in_array('division_id', $this->customVariable)) {
                $obj['division_id'] = $ms->division_id;
            }
            if (in_array('bes_follow_up_date', $this->customVariable)) {
                $obj['bes_follow_up_date'] = $ms->bes_follow_up_date;
            }
            if (in_array('bes_status', $this->customVariable)) {
                $obj['bes_status'] = $ms->bes_status;
            }
            if (in_array('bes_remark', $this->customVariable)) {
                $obj['bes_remark'] = $ms->bes_remark;
            }
            if (in_array('aa_letter_no', $this->customVariable)) {
                $obj['aa_letter_no'] = $ms->aa_letter_no;
            }
            if (in_array('aa_letter_date', $this->customVariable)) {
                $obj['aa_letter_date'] = $ms->aa_letter_date;
            }
            if (in_array('aa_amount', $this->customVariable)) {
                $obj['aa_amount'] = $ms->aa_amount;
            }
            if (in_array('aa_approved_by', $this->customVariable)) {
                $obj['aa_approved_by'] = $ms->aa_approved_by;
            }
            if (in_array('aa_detail_regarding_architecture', $this->customVariable)) {
                $obj['aa_detail_regarding_architecture'] = $ms->aa_detail_regarding_architecture;
            }
            if (in_array('tsd_letter_no', $this->customVariable)) {
                $obj['tsd_letter_no'] = $ms->tsd_letter_no;
            }
            if (in_array('tsd_letter_date', $this->customVariable)) {
                $obj['tsd_letter_date'] = $ms->tsd_letter_date;
            }
            if (in_array('tsd_amount', $this->customVariable)) {
                $obj['tsd_amount'] = $ms->tsd_amount;
            }
            if (in_array('tsd_approved_by', $this->customVariable)) {
                $obj['tsd_approved_by'] = $ms->tsd_approved_by;
            }
            if (in_array('tsd_provision_in_ts_estimate', $this->customVariable)) {
                $obj['tsd_provision_in_ts_estimate'] = $ms->tsd_provision_in_ts_estimate;
            }
            if (in_array('forest_chainage', $this->customVariable)) {
                $obj['forest_chainage'] = $ms->forest_chainage;
            }
            if (in_array('forest_protected', $this->customVariable)) {
                $obj['forest_protected'] = $ms->forest_protected;
            }
            if (in_array('forest_no_trees', $this->customVariable)) {
                $obj['forest_no_trees'] = $ms->forest_no_trees;
            }
            if (in_array('forest_area_hect', $this->customVariable)) {
                $obj['forest_area_hect'] = $ms->forest_area_hect;
            }
            if (in_array('forest_appr_state', $this->customVariable)) {
                $obj['forest_appr_state'] = $ms->forest_appr_state;
            }
            if (in_array('forest_proposal_submit', $this->customVariable)) {
                $obj['forest_proposal_submit'] = $ms->forest_proposal_submit;
            }
            if (in_array('forest_letter_no', $this->customVariable)) {
                $obj['forest_letter_no'] = $ms->forest_letter_no;
            }
            if (in_array('forest_letter_date', $this->customVariable)) {
                $obj['forest_letter_date'] = $ms->forest_letter_date;
            }
            if (in_array('forest_online_no', $this->customVariable)) {
                $obj['forest_online_no'] = $ms->forest_online_no;
            }
            if (in_array('forest_online_date', $this->customVariable)) {
                $obj['forest_online_date'] = $ms->forest_online_date;
            }
            if (in_array('forest_joint_site', $this->customVariable)) {
                $obj['forest_joint_site'] = $ms->forest_joint_site;
            }
            if (in_array('forest_approved_by', $this->customVariable)) {
                $obj['forest_approved_by'] = $ms->forest_approved_by;
            }
            if (in_array('forest_l_no', $this->customVariable)) {
                $obj['forest_l_no'] = $ms->forest_l_no;
            }
            if (in_array('forest_final_approval', $this->customVariable)) {
                $obj['forest_final_approval'] = $ms->forest_final_approval;
            }
            if (in_array('forest_status', $this->customVariable)) {
                $obj['forest_status'] = $ms->forest_status;
            }
            if (in_array('usd_chainage', $this->customVariable)) {
                $obj['usd_chainage'] = $ms->usd_chainage;
            }
            if (in_array('used_type', $this->customVariable)) {
                $obj['used_type'] = $ms->used_type;
            }
            if (in_array('usd_utility_item', $this->customVariable)) {
                $obj['usd_utility_item'] = $ms->usd_utility_item;
            }
            if (in_array('usd_details', $this->customVariable)) {
                $obj['usd_details'] = $ms->usd_details;
            }
            if (in_array('estimated_usd_latter_no', $this->customVariable)) {
                $obj['estimated_usd_latter_no'] = $ms->estimated_usd_latter_no;
            }
            if (in_array('usd_date_input', $this->customVariable)) {
                $obj['usd_date_input'] = $ms->usd_date_input;
            }
            if (in_array('usd_submitted_to', $this->customVariable)) {
                $obj['usd_submitted_to'] = $ms->usd_submitted_to;
            }
            if (in_array('usd_joint_visit', $this->customVariable)) {
                $obj['usd_joint_visit'] = $ms->usd_joint_visit;
            }
            if (in_array('usd_estimate_submited', $this->customVariable)) {
                $obj['usd_estimate_submited'] = $ms->usd_estimate_submited;
            }
            if (in_array('usd_latter_no', $this->customVariable)) {
                $obj['usd_latter_no'] = $ms->usd_latter_no;
            }
            if (in_array('usd_date_input_sec', $this->customVariable)) {
                $obj['usd_date_input_sec'] = $ms->usd_date_input_sec;
            }
            if (in_array('usd_amount', $this->customVariable)) {
                $obj['usd_amount'] = $ms->usd_amount;
            }
            if (in_array('usd_payment', $this->customVariable)) {
                $obj['usd_payment'] = $ms->usd_payment;
            }
            if (in_array('usd_date_input_th', $this->customVariable)) {
                $obj['usd_date_input_th'] = $ms->usd_date_input_th;
            }
            if (in_array('usd_date_input_fr', $this->customVariable)) {
                $obj['usd_date_input_fr'] = $ms->usd_date_input_fr;
            }
            if (in_array('usd_date_input_fi', $this->customVariable)) {
                $obj['usd_date_input_fi'] = $ms->usd_date_input_fi;
            }
            if (in_array('laq_name_village', $this->customVariable)) {
                $obj['laq_name_village'] = $ms->laq_name_village;
            }
            if (in_array('laq_office', $this->customVariable)) {
                $obj['laq_office'] = $ms->laq_office;
            }
            if (in_array('laq_letter_no', $this->customVariable)) {
                $obj['laq_letter_no'] = $ms->laq_letter_no;
            }
            if (in_array('laq_letter_date', $this->customVariable)) {
                $obj['laq_letter_date'] = $ms->laq_letter_date;
            }
            if (in_array('laq_file_sub', $this->customVariable)) {
                $obj['laq_file_sub'] = $ms->laq_file_sub;
            }
            if (in_array('laq_dlr_no', $this->customVariable)) {
                $obj['laq_dlr_no'] = $ms->laq_dlr_no;
            }
            if (in_array('laq_pro_date', $this->customVariable)) {
                $obj['laq_pro_date'] = $ms->laq_pro_date;
            }
            if (in_array('laq_challan_amt', $this->customVariable)) {
                $obj['laq_challan_amt'] = $ms->laq_challan_amt;
            }
            if (in_array('laq_challan_date', $this->customVariable)) {
                $obj['laq_challan_date'] = $ms->laq_challan_date;
            }
            if (in_array('laq_payment_date', $this->customVariable)) {
                $obj['laq_payment_date'] = $ms->laq_payment_date;
            }
            if (in_array('laq_jms_date', $this->customVariable)) {
                $obj['laq_jms_date'] = $ms->laq_jms_date;
            }
            if (in_array('laq_jms_office', $this->customVariable)) {
                $obj['laq_jms_office'] = $ms->laq_jms_office;
            }
            if (in_array('laq_approved_jms_date', $this->customVariable)) {
                $obj['laq_approved_jms_date'] = $ms->laq_approved_jms_date;
            }
            if (in_array('laq_file_collector', $this->customVariable)) {
                $obj['laq_file_collector'] = $ms->laq_file_collector;
            }
            if (in_array('laq_file_date', $this->customVariable)) {
                $obj['laq_file_date'] = $ms->laq_file_date;
            }
            if (in_array('laq_gati_date', $this->customVariable)) {
                $obj['laq_gati_date'] = $ms->laq_gati_date;
            }
            if (in_array('laq_sec_10', $this->customVariable)) {
                $obj['laq_sec_10'] = $ms->laq_sec_10;
            }
            if (in_array('laq_sec_date', $this->customVariable)) {
                $obj['laq_sec_date'] = $ms->laq_sec_date;
            }
            if (in_array('laq_sec_11', $this->customVariable)) {
                $obj['laq_sec_11'] = $ms->laq_sec_11;
            }
            if (in_array('laq_sec11_date', $this->customVariable)) {
                $obj['laq_sec11_date'] = $ms->laq_sec11_date;
            }
            if (in_array('laq_sec_19', $this->customVariable)) {
                $obj['laq_sec_19'] = $ms->laq_sec_19;
            }
            if (in_array('laq_valuation', $this->customVariable)) {
                $obj['laq_valuation'] = $ms->laq_valuation;
            }
            if (in_array('laq_amt', $this->customVariable)) {
                $obj['laq_amt'] = $ms->laq_amt;
            }
            if (in_array('laq_num', $this->customVariable)) {
                $obj['laq_num'] = $ms->laq_num;
            }
            if (in_array('laq_date', $this->customVariable)) {
                $obj['laq_date'] = $ms->laq_date;
            }
            if (in_array('laq_sec_21', $this->customVariable)) {
                $obj['laq_sec_21'] = $ms->laq_sec_21;
            }
            if (in_array('laq_s21_file_date', $this->customVariable)) {
                $obj['laq_s21_file_date'] = $ms->laq_s21_file_date;
            }
            if (in_array('laq_approval', $this->customVariable)) {
                $obj['laq_approval'] = $ms->laq_approval;
            }
            if (in_array('laq_sec_23', $this->customVariable)) {
                $obj['laq_sec_23'] = $ms->laq_sec_23;
            }
            if (in_array('laq_23sec_date', $this->customVariable)) {
                $obj['laq_23sec_date'] = $ms->laq_23sec_date;
            }
            if (in_array('laq_23letter_no', $this->customVariable)) {
                $obj['laq_23letter_no'] = $ms->laq_23letter_no;
            }
            if (in_array('laq_poss_detail', $this->customVariable)) {
                $obj['laq_poss_detail'] = $ms->laq_poss_detail;
            }
            if (in_array('laq_status', $this->customVariable)) {
                $obj['laq_status'] = $ms->laq_status;
            }
            if (in_array('bd_item_first', $this->customVariable)) {
                $obj['bd_item_first'] = $ms->bd_item_first;
            }
            if (in_array('bd_detail_head', $this->customVariable)) {
                $obj['bd_detail_head'] = $ms->bd_detail_head;
            }
            if (in_array('bd_item_no', $this->customVariable)) {
                $obj['bd_item_no'] = $ms->bd_item_no;
            }
            if (in_array('bd_page_no', $this->customVariable)) {
                $obj['bd_page_no'] = $ms->bd_page_no;
            }
            if (in_array('bd_continous', $this->customVariable)) {
                $obj['bd_continous'] = $ms->bd_continous;
            }
            if (in_array('budget_previous_year', $this->customVariable)) {
                $obj['budget_previous_year'] = $ms->budget_previous_year;
            }
            if (in_array('budget_previous_amount', $this->customVariable)) {
                $obj['budget_previous_amount'] = $ms->budget_previous_amount;
            }
            if (in_array('ed_dtp_amount', $this->customVariable)) {
                $obj['ed_dtp_amount'] = $ms->ed_dtp_amount;
            }
            if (in_array('ed_project_cost', $this->customVariable)) {
                $obj['ed_project_cost'] = $ms->ed_project_cost;
            }
            if (in_array('ed_estimated_cost', $this->customVariable)) {
                $obj['ed_estimated_cost'] = $ms->ed_estimated_cost;
            }
            if (in_array('ed_tender_cost', $this->customVariable)) {
                $obj['ed_tender_cost'] = $ms->ed_tender_cost;
            }
            if (in_array('ed_qulity_cost', $this->customVariable)) {
                $obj['ed_qulity_cost'] = $ms->ed_qulity_cost;
            }
            if (in_array('ed_origin_work', $this->customVariable)) {
                $obj['ed_origin_work'] = $ms->ed_origin_work;
            }
            if (in_array('ed_b', $this->customVariable)) {
                $obj['ed_b'] = $ms->ed_b;
            }
            if (in_array('ed_details', $this->customVariable)) {
                $obj['ed_details'] = $ms->ed_details;
            }
            if (in_array('expended_details', $this->customVariable)) {
                $obj['expended_details'] = $ms->expended_details;
            }
            if (in_array('ed_expenditure_amount', $this->customVariable)) {
                $obj['ed_expenditure_amount'] = $ms->ed_expenditure_amount;
            }
            if (in_array('ed_expenditure', $this->customVariable)) {
                $obj['ed_expenditure'] = $ms->ed_expenditure;
            }
            if (in_array('ed_work', $this->customVariable)) {
                $obj['ed_work'] = $ms->ed_work;
            }
            if (in_array('ed_fincial', $this->customVariable)) {
                $obj['ed_fincial'] = $ms->ed_fincial;
            }
            if (in_array('ed_amount_for', $this->customVariable)) {
                $obj['ed_amount_for'] = $ms->ed_amount_for;
            }
            if (in_array('ed_division_letter_no', $this->customVariable)) {
                $obj['ed_division_letter_no'] = $ms->ed_division_letter_no;
            }
            if (in_array('ed_division_letter_date', $this->customVariable)) {
                $obj['ed_division_letter_date'] = $ms->ed_division_letter_date;
            }
            if (in_array('ed_circle_letter_no', $this->customVariable)) {
                $obj['ed_circle_letter_no'] = $ms->ed_circle_letter_no;
            }
            if (in_array('ed_circle_letter_date', $this->customVariable)) {
                $obj['ed_circle_letter_date'] = $ms->ed_circle_letter_date;
            }
            if (in_array('ed_government_letter_no', $this->customVariable)) {
                $obj['ed_government_letter_no'] = $ms->ed_government_letter_no;
            }
            if (in_array('ed_government_letter_date', $this->customVariable)) {
                $obj['ed_government_letter_date'] = $ms->ed_government_letter_date;
            }
            if (in_array('ed_approval_letter_no', $this->customVariable)) {
                $obj['ed_approval_letter_no'] = $ms->ed_approval_letter_no;
            }
            if (in_array('ed_approval_letter_date', $this->customVariable)) {
                $obj['ed_approval_letter_date'] = $ms->ed_approval_letter_date;
            }
            if (in_array('ed_approval_letter_amount', $this->customVariable)) {
                $obj['ed_approval_letter_amount'] = $ms->ed_approval_letter_amount;
            }
            if (in_array('ed_approval_extra_amount', $this->customVariable)) {
                $obj['ed_approval_extra_amount'] = $ms->ed_approval_extra_amount;
            }
            if (in_array('ed_item_detail', $this->customVariable)) {
                $obj['ed_item_detail'] = $ms->ed_item_detail;
            }
            if (in_array('tle_proposal_letter_no', $this->customVariable)) {
                $obj['tle_proposal_letter_no'] = $ms->tle_proposal_letter_no;
            }
            if (in_array('tle_proposal_letter_date', $this->customVariable)) {
                $obj['tle_proposal_letter_date'] = $ms->tle_proposal_letter_date;
            }
            if (in_array('tle_proposal_extension_date', $this->customVariable)) {
                $obj['tle_proposal_extension_date'] = $ms->tle_proposal_extension_date;
            }
            if (in_array('tle_approval_letter_no', $this->customVariable)) {
                $obj['tle_approval_letter_no'] = $ms->tle_approval_letter_no;
            }
            if (in_array('tle_approval_letter_date', $this->customVariable)) {
                $obj['tle_approval_letter_date'] = $ms->tle_approval_letter_date;
            }
            if (in_array('tle_approval_extension_date', $this->customVariable)) {
                $obj['tle_approval_extension_date'] = $ms->tle_approval_extension_date;
            }
            if (in_array('tle_status', $this->customVariable)) {
                $obj['tle_status'] = $ms->tle_status;
            }
            if (in_array('work_yes_no', $this->customVariable)) {
                $obj['work_yes_no'] = $ms->work_yes_no;
            }
            if (in_array('ws_sd_completion', $this->customVariable)) {
                $obj['ws_sd_completion'] = $ms->ws_sd_completion;
            }
            if (in_array('acctual_yes_no', $this->customVariable)) {
                $obj['acctual_yes_no'] = $ms->acctual_yes_no;
            }
            if (in_array('ws_sd_release', $this->customVariable)) {
                $obj['ws_sd_release'] = $ms->ws_sd_release;
            }
            if (in_array('fmg_completion_date', $this->customVariable)) {
                $obj['fmg_completion_date'] = $ms->fmg_completion_date;
            }
            if (in_array('fmg_time', $this->customVariable)) {
                $obj['fmg_time'] = $ms->fmg_time;
            }
            if (in_array('fmg_date', $this->customVariable)) {
                $obj['fmg_date'] = $ms->fmg_date;
            }
            if (in_array('add_fmg_date', $this->customVariable)) {
                $obj['add_fmg_date'] = $ms->add_fmg_date;
            }
            if (in_array('fmg_dropdown', $this->customVariable)) {
                $obj['fmg_dropdown'] = $ms->fmg_dropdown;
            }
            if (in_array('fmg_entry_amount', $this->customVariable)) {
                $obj['fmg_entry_amount'] = $ms->fmg_entry_amount;
            }
            if (in_array('dlp_work_completion_date', $this->customVariable)) {
                $obj['dlp_work_completion_date'] = $ms->dlp_work_completion_date;
            }
            if (in_array('dlp_timeline', $this->customVariable)) {
                $obj['dlp_timeline'] = $ms->dlp_timeline;
            }
            if (in_array('dlp_completion_date', $this->customVariable)) {
                $obj['dlp_completion_date'] = $ms->dlp_completion_date;
            }
            if (in_array('dlp_released_date', $this->customVariable)) {
                $obj['dlp_released_date'] = $ms->dlp_released_date;
            }
            if (in_array('dlp_dropdown', $this->customVariable)) {
                $obj['dlp_dropdown'] = $ms->dlp_dropdown;
            }
            if (in_array('dlp_amount', $this->customVariable)) {
                $obj['dlp_amount'] = $ms->dlp_amount;
            }
            if (in_array('dtp_sub_to', $this->customVariable)) {
                $obj['dtp_sub_to'] = $ms->dtp_sub_to;
            }
            if (in_array('dtp_submit_date', $this->customVariable)) {
                $obj['dtp_submit_date'] = $ms->dtp_submit_date;
            }
            if (in_array('dtp_submit_letter_no', $this->customVariable)) {
                $obj['dtp_submit_letter_no'] = $ms->dtp_submit_letter_no;
            }
            if (in_array('dtp_authority', $this->customVariable)) {
                $obj['dtp_authority'] = $ms->dtp_authority;
            }
            if (in_array('dtp_date', $this->customVariable)) {
                $obj['dtp_date'] = $ms->dtp_date;
            }
            if (in_array('dtp_letter_no', $this->customVariable)) {
                $obj['dtp_letter_no'] = $ms->dtp_letter_no;
            }
            if (in_array('dtp_amt', $this->customVariable)) {
                $obj['dtp_amt'] = $ms->dtp_amt;
            }
            if (in_array('dtp_f_date', $this->customVariable)) {
                $obj['dtp_f_date'] = $ms->dtp_f_date;
            }
            if (in_array('dtp_f_status', $this->customVariable)) {
                $obj['dtp_f_status'] = $ms->dtp_f_status;
            }
            if (in_array('dtp_f_remark', $this->customVariable)) {
                $obj['dtp_f_remark'] = $ms->dtp_f_remark;
            }
            if (in_array('nit_no', $this->customVariable)) {
                $obj['nit_no'] = $ms->nit_no;
            }
            if (in_array('nit_start_date', $this->customVariable)) {
                $obj['nit_start_date'] = $ms->nit_start_date;
            }
            if (in_array('nit_end_date', $this->customVariable)) {
                $obj['nit_end_date'] = $ms->nit_end_date;
            }
            if (in_array('nit_last_sub_date', $this->customVariable)) {
                $obj['nit_last_sub_date'] = $ms->nit_last_sub_date;
            }
            if (in_array('nit_tender_open_date', $this->customVariable)) {
                $obj['nit_tender_open_date'] = $ms->nit_tender_open_date;
            }
            if (in_array('nit_pre_bid_date', $this->customVariable)) {
                $obj['nit_pre_bid_date'] = $ms->nit_pre_bid_date;
            }
            if (in_array('nit_tech_bid_date', $this->customVariable)) {
                $obj['nit_tech_bid_date'] = $ms->nit_tech_bid_date;
            }
            if (in_array('nit_price_bid_date', $this->customVariable)) {
                $obj['nit_price_bid_date'] = $ms->nit_price_bid_date;
            }
            if (in_array('nit_pq_open', $this->customVariable)) {
                $obj['nit_pq_open'] = $ms->nit_pq_open;
            }
            if (in_array('nit_preliminary_date', $this->customVariable)) {
                $obj['nit_preliminary_date'] = $ms->nit_preliminary_date;
            }
            if (in_array('nit_pq_sub_date', $this->customVariable)) {
                $obj['nit_pq_sub_date'] = $ms->nit_pq_sub_date;
            }
            if (in_array('nit_pq_approval_date', $this->customVariable)) {
                $obj['nit_pq_approval_date'] = $ms->nit_pq_approval_date;
            }
            if (in_array('nit_sent_circle_date', $this->customVariable)) {
                $obj['nit_sent_circle_date'] = $ms->nit_sent_circle_date;
            }
            if (in_array('nit_sent_goverment_date', $this->customVariable)) {
                $obj['nit_sent_goverment_date'] = $ms->nit_sent_goverment_date;
            }
            if (in_array('nit_re_invited_date', $this->customVariable)) {
                $obj['nit_re_invited_date'] = $ms->nit_re_invited_date;
            }
            if (in_array('nit_with_reason', $this->customVariable)) {
                $obj['nit_with_reason'] = $ms->nit_with_reason;
            }
            if (in_array('nit_validity_date', $this->customVariable)) {
                $obj['nit_validity_date'] = $ms->nit_validity_date;
            }
            if (in_array('nit_tender_form', $this->customVariable)) {
                $obj['nit_tender_form'] = $ms->add_tender_forms ? $ms->add_tender_forms->name : '';
            }
            if (in_array('nit_tender_proposal', $this->customVariable)) {
                $obj['nit_tender_proposal'] = $ms->nit_tender_proposal;
            }
            if (in_array('nit_letter_no', $this->customVariable)) {
                $obj['nit_letter_no'] = $ms->nit_letter_no;
            }
            if (in_array('nit_latter_date', $this->customVariable)) {
                $obj['nit_latter_date'] = $ms->nit_latter_date;
            }
            if (in_array('nit_agency_main', $this->customVariable)) {
                $obj['nit_agency_main'] = $ms->nit_agency_main;
            }
            if (in_array('nit_tender_cost', $this->customVariable)) {
                $obj['nit_tender_cost'] = $ms->nit_tender_cost;
            }
            if (in_array('nit_latter_no_2', $this->customVariable)) {
                $obj['nit_latter_no_2'] = $ms->nit_latter_no_2;
            }
            if (in_array('nit_tender_above', $this->customVariable)) {
                $obj['nit_tender_above'] = $ms->nit_tender_above;
            }
            if (in_array('tender_proposal_date', $this->customVariable)) {
                $obj['tender_proposal_date'] = $ms->tender_proposal_date;
            }
            if (in_array('nit_agency_name', $this->customVariable)) {
                $obj['nit_agency_name'] = $ms->nit_agency_name;
            }
            if (in_array('nit_validity_extension_date', $this->customVariable)) {
                $obj['nit_validity_extension_date'] = $ms->nit_validity_extension_date;
            }
            if (in_array('nit_latter_extension_no', $this->customVariable)) {
                $obj['nit_latter_extension_no'] = $ms->nit_latter_extension_no;
            }
            if (in_array('latter_date_extension', $this->customVariable)) {
                $obj['latter_date_extension'] = $ms->latter_date_extension;
            }
            if (in_array('do_tender_date', $this->customVariable)) {
                $obj['do_tender_date'] = $ms->do_tender_date;
            }
            if (in_array('do_agency_name', $this->customVariable)) {
                $obj['do_agency_name'] = $ms->do_agency_name;
            }
            if (in_array('tender_approved_by', $this->customVariable)) {
                $obj['tender_approved_by'] = $ms->tender_approved_by;
            }
            if (in_array('do_letter_No', $this->customVariable)) {
                $obj['do_letter_No'] = $ms->do_letter_No;
            }
            if (in_array('do_tender_amt', $this->customVariable)) {
                $obj['do_tender_amt'] = $ms->do_tender_amt;
            }
            if (in_array('do_above', $this->customVariable)) {
                $obj['do_above'] = $ms->do_above;
            }
            if (in_array('do_above_perc', $this->customVariable)) {
                $obj['do_above_perc'] = $ms->do_above_perc;
            }
            if (in_array('do_deposit_letter_no', $this->customVariable)) {
                $obj['do_deposit_letter_no'] = $ms->do_deposit_letter_no;
            }
            if (in_array('do_deposit_letter_date', $this->customVariable)) {
                $obj['do_deposit_letter_date'] = $ms->do_deposit_letter_date;
            }
            if (in_array('do_deposit_letter_amount', $this->customVariable)) {
                $obj['do_deposit_letter_amount'] = $ms->do_deposit_letter_amount;
            }
            if (in_array('do_condition_date', $this->customVariable)) {
                $obj['do_condition_date'] = $ms->do_condition_date;
            }
            if (in_array('do_condition_datails', $this->customVariable)) {
                $obj['do_condition_datails'] = $ms->do_condition_datails;
            }
            if (in_array('do_condition_approval', $this->customVariable)) {
                $obj['do_condition_approval'] = $ms->do_condition_approval;
            }
            if (in_array('do_dep_by', $this->customVariable)) {
                $obj['do_dep_by'] = $ms->do_dep_by;
            }
            if (in_array('do_submit_date', $this->customVariable)) {
                $obj['do_submit_date'] = $ms->do_submit_date;
            }
            if (in_array('do_submit_amount', $this->customVariable)) {
                $obj['do_submit_amount'] = $ms->do_submit_amount;
            }
            if (in_array('do_bg_issue_date', $this->customVariable)) {
                $obj['do_bg_issue_date'] = $ms->do_bg_issue_date;
            }
            if (in_array('do_bg_expire_date', $this->customVariable)) {
                $obj['do_bg_expire_date'] = $ms->do_bg_expire_date;
            }
            if (in_array('do_bg_bank_name', $this->customVariable)) {
                $obj['do_bg_bank_name'] = $ms->do_bg_bank_name;
            }
            if (in_array('do_bg_bank_address', $this->customVariable)) {
                $obj['do_bg_bank_address'] = $ms->do_bg_bank_address;
            }
            if (in_array('do_bg_bank_verified', $this->customVariable)) {
                $obj['do_bg_bank_verified'] = $ms->do_bg_bank_verified;
            }
            if (in_array('do_fdr_date', $this->customVariable)) {
                $obj['do_fdr_date'] = $ms->do_fdr_date;
            }
            if (in_array('do_fdr_amount', $this->customVariable)) {
                $obj['do_fdr_amount'] = $ms->do_fdr_amount;
            }
            if (in_array('do_work_order_date', $this->customVariable)) {
                $obj['do_work_order_date'] = $ms->do_work_order_date;
            }
            if (in_array('do_time_line_month', $this->customVariable)) {
                $obj['do_time_line_month'] = $ms->do_time_line_month;
            }
            if (in_array('do_time_limit_any', $this->customVariable)) {
                $obj['do_time_limit_any'] = $ms->do_time_limit_any;
            }
            if (in_array('do_completion_date', $this->customVariable)) {
                $obj['do_completion_date'] = $ms->do_completion_date;
            }
            if (in_array('tpi_dtp_date', $this->customVariable)) {
                $obj['tpi_dtp_date'] = $ms->tpi_dtp_date;
            }
            if (in_array('tpi_dtp_amt', $this->customVariable)) {
                $obj['tpi_dtp_amt'] = $ms->tpi_dtp_amt;
            }
            if (in_array('tpi_tender_date', $this->customVariable)) {
                $obj['tpi_tender_date'] = $ms->tpi_tender_date;
            }
            if (in_array('tpi_tendure_amount', $this->customVariable)) {
                $obj['tpi_tendure_amount'] = $ms->tpi_tendure_amount;
            }
            if (in_array('tpi_nit_no', $this->customVariable)) {
                $obj['tpi_nit_no'] = $ms->tpi_nit_no;
            }
            if (in_array('tpi_start_date', $this->customVariable)) {
                $obj['tpi_start_date'] = $ms->tpi_start_date;
            }
            if (in_array('tpi_end_date', $this->customVariable)) {
                $obj['tpi_end_date'] = $ms->tpi_end_date;
            }
            if (in_array('tpi_tender_open_date', $this->customVariable)) {
                $obj['tpi_tender_open_date'] = $ms->tpi_tender_open_date;
            }
            if (in_array('tpi_tech_bid_date', $this->customVariable)) {
                $obj['tpi_tech_bid_date'] = $ms->tpi_tech_bid_date;
            }
            if (in_array('tpi_interview_date', $this->customVariable)) {
                $obj['tpi_interview_date'] = $ms->tpi_interview_date;
            }
            if (in_array('tpi_last_sub_date', $this->customVariable)) {
                $obj['tpi_last_sub_date'] = $ms->tpi_last_sub_date;
            }
            if (in_array('tpi_pre_bid_date', $this->customVariable)) {
                $obj['tpi_pre_bid_date'] = $ms->tpi_pre_bid_date;
            }
            if (in_array('tpi_price_bid_date', $this->customVariable)) {
                $obj['tpi_price_bid_date'] = $ms->tpi_price_bid_date;
            }
            if (in_array('tpi_pq_open', $this->customVariable)) {
                $obj['tpi_pq_open'] = $ms->tpi_pq_open;
            }
            if (in_array('tpi_preliminary_date', $this->customVariable)) {
                $obj['tpi_preliminary_date'] = $ms->tpi_preliminary_date;
            }
            if (in_array('tpi_pq_sub_date', $this->customVariable)) {
                $obj['tpi_pq_sub_date'] = $ms->tpi_pq_sub_date;
            }
            if (in_array('tpi_pq_approval_date', $this->customVariable)) {
                $obj['tpi_pq_approval_date'] = $ms->tpi_pq_approval_date;
            }
            if (in_array('tpi_re_invited_date', $this->customVariable)) {
                $obj['tpi_re_invited_date'] = $ms->tpi_re_invited_date;
            }
            if (in_array('tpi_with_reason', $this->customVariable)) {
                $obj['tpi_with_reason'] = $ms->tpi_with_reason;
            }
            if (in_array('tpi_validity_date', $this->customVariable)) {
                $obj['tpi_validity_date'] = $ms->tpi_validity_date;
            }
            if (in_array('tpi_tender_form', $this->customVariable)) {
                $obj['tpi_tender_form'] = $ms->add_tpi_tender_forms ? $ms->add_tpi_tender_forms->name : '';
            }
            if (in_array('tpi_tender_proposal', $this->customVariable)) {
                $obj['tpi_tender_proposal'] = $ms->tpi_tender_proposal;
            }
            if (in_array('tpi_tender_letter_no', $this->customVariable)) {
                $obj['tpi_tender_letter_no'] = $ms->tpi_tender_letter_no;
            }
            if (in_array('tpi_proposal_latter_date', $this->customVariable)) {
                $obj['tpi_proposal_latter_date'] = $ms->tpi_proposal_latter_date;
            }
            if (in_array('tpi_agency_main', $this->customVariable)) {
                $obj['tpi_agency_main'] = $ms->tpi_agency_main;
            }
            if (in_array('tpi_tender_cost', $this->customVariable)) {
                $obj['tpi_tender_cost'] = $ms->tpi_tender_cost;
            }
            if (in_array('tpi_latter_no_2', $this->customVariable)) {
                $obj['tpi_latter_no_2'] = $ms->tpi_latter_no_2;
            }
            if (in_array('tpi_above_tender_form', $this->customVariable)) {
                $obj['tpi_above_tender_form'] = $ms->tpi_above_tender_form;
            }
            if (in_array('tpi_tender_proposal_date', $this->customVariable)) {
                $obj['tpi_tender_proposal_date'] = $ms->tpi_tender_proposal_date;
            }
            if (in_array('tpi_agency_name', $this->customVariable)) {
                $obj['tpi_agency_name'] = $ms->tpi_agency_name;
            }
            if (in_array('tpi_validity_extension_date', $this->customVariable)) {
                $obj['tpi_validity_extension_date'] = $ms->tpi_validity_extension_date;
            }
            if (in_array('tpi_validity_extension_letter_no', $this->customVariable)) {
                $obj['tpi_validity_extension_letter_no'] = $ms->tpi_validity_extension_letter_no;
            }
            if (in_array('tpi_validity_extension_letter_date', $this->customVariable)) {
                $obj['tpi_validity_extension_letter_date'] = $ms->tpi_validity_extension_letter_date;
            }
            if (in_array('tpi_aggr_no', $this->customVariable)) {
                $obj['tpi_aggr_no'] = $ms->tpi_aggr_no;
            }
            if (in_array('tpi_agency_last', $this->customVariable)) {
                $obj['tpi_agency_last'] = $ms->tpi_agency_last;
            }
            $phpArray[] = $obj;
        }

        // Convert the PHP array to a Laravel collection
        $laravelCollection = collect($phpArray);


        return $laravelCollection;
    }

    public function headings(): array
    {
        $headings = [];

        foreach ($this->customVariable as $column) {
            // Convert column names to user-friendly headings
            // $headings[] = ucfirst(str_replace('_', ' ', $column));
            $headings[] =  $this->customHeadings[$column];
        }

        return $headings;
    }

    public function styles($sheet)
    {
        return [
            'A1:Z1' => [
                'font' => [
                    'bold' => true, // Make the headings bold
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, // Add a thin border around the headings
                    ],
                ],
            ],
        ];
    }

    public function map($row): array
    {
        $district = District::where('id', $row->district_id)->select('id', 'name')->first();

        // Map all selected columns
        $data = [];

        foreach ($this->customVariable as $column) {
            // if ($column == 'id') {
            //     $data['Sr.No'] = $incrementingId++;
            //     // $data['id'] = $incrementingId++;
            // }
            // if ($column == 'district_id') {
            //     $data['Basic - Received Proposal - District'] = $district->name;
            //     // $data['district_id'] = $district->name;
            // }
            $data[] = $row->$column;
        }

        return $data;
    }
}
