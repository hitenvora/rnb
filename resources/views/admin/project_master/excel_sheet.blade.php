@extends('layout.layout')
@section('style')
@endsection

@section('content')
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 logo-main">
                                        <div class="sidebar-header">
                                            <a href="{{ route('master_form') }}"><img class="main-logo img-fluid"
                                                    src="{{ asset('assets/img/logo/main-logo.png') }}" alt="" /></a>
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-5 col-md-3 col-sm-4 col-4">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="breadcome-heading d-flex justify-content-end align-items-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class="btn btn-light-primary" href="master-form.html">Master Forms</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->

                                    <div class="col-lg-5 col-md-4 col-sm-3 col-2 profile-menu">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-bs-toggle="dropdown" role="button"
                                                        aria-expanded="false"
                                                        class="d-flex gap-3 align-items-center nav-link dropdown-toggle">
                                                        <div class="d-flex gap-3 align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img src="{{ asset('assets/img/profile.png') }}"
                                                                    alt="" />
                                                            </div>
                                                            <div class="flex-grow-1 d-flex flex-column">
                                                                <h5 class="admin-name m-0">John Doe</h5>
                                                                <span>admin</span>
                                                            </div>
                                                        </div>

                                                        <!-- <h5 class="admin-name">John Doe</h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span>admin</span> -->
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu">
                                                        <li><a href="{{ route('profile') }}">My Profile</a>
                                                        </li>
                                                        <li><a href="{{ route('admin_login') }}">Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="pagetitle" style="margin-top: 79px !important; ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form action="{{ route('project_export') }}" method="post">
                            @csrf
                            <p>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1"
                                    role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Excel
                                    Head</a>
                                <button class="btn btn-primary" role="button" aria-expanded="false">Data Excel
                                    Export</button>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body">
                                            <ul class="">
                                                <li><input type="checkbox" name="check_boxes[]" value="id"
                                                        checked="">
                                                    Sr.
                                                    No</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="budget_id"
                                                        checked="">
                                                    Basic - Budget</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_name_scheme"
                                                        checked=""> Basic - Name of Scheme</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_name_project"
                                                        checked=""> Basic - Name of Project</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_wms_work_head"
                                                        checked=""> Basic - WMS Work Head.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="district_id"
                                                        checked=""> Basic - Received Proposal -
                                                    District</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="taluka_id"
                                                        checked="">
                                                    Basic - Received Proposal - Taluka
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="work_type_id"
                                                        checked="">
                                                    Basic - Received Proposal - Work
                                                    Type</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="types_of_work"
                                                        checked="">
                                                    Basic - Received Proposal - Type Of
                                                    Work</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_type_work_name"
                                                        checked="">
                                                    Basic - Received Proposal - Name Of
                                                    Work</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_buget_work"
                                                        checked=""> Basic - Received Proposal - Budget
                                                    Work / Item / Page No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_budget_work_name" checked=""> Basic - Received
                                                    Proposal - Jogvay
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_amount"
                                                        checked="">
                                                    Basic - Received Proposal - Amount in
                                                    Lakh</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_mp_mla"
                                                        checked="">
                                                    Basic - Received Proposal - MP/MLA
                                                    Suggested</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_letter_no"
                                                        checked="">
                                                    Basic - Received Proposal - Letter No.
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_letter_date"
                                                        checked="">
                                                    Basic - Received Proposal - Letter Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_suggest"
                                                        checked="">
                                                    Basic - Received Proposal - Suggestion
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_sent_proposal" checked="">
                                                    Basic - Sent Proposal - Sent Proposal
                                                    To</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_sent_proposal_letter_no" checked="">
                                                    Basic - Sent Proposal - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_sent_proposal_date" checked="">
                                                    Basic - Sent Proposal - Letter Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_sent_proposal_amount" checked="">
                                                    Basic - Sent Proposal - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="sent_box_id"
                                                        checked="">
                                                    Basic - Received Proposal - Sent Box
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_sent_box_date" checked="">
                                                    Basic - Received Proposal - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_sent_box_name" checked="">
                                                    Basic - Received Proposal - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_sent_box_remark" checked="">
                                                    Basic - Received Proposal - Letter No
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_name_of_department" checked="">
                                                    Basic - Name of Department</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="division_master_id" checked="">
                                                    Basic - Proposal Division</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="sub_division_master_id" checked="">
                                                    Basic - Proposal Subdivision</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="basic_circle_name"
                                                        checked="">
                                                    Basic - Proposal Circle</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_name_of_road" checked="">
                                                    Basic - Name of Road,Length & Width As
                                                    Per F1-F2 with Challenge</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="basic_category_of_road" checked="">
                                                    Basic - Category of Road(SH, MDR, ODR,
                                                    VR) With Highway No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ppd_treatment_detail" checked="">
                                                    Basic - Treatment details</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="pad_letter_no"
                                                        checked="">
                                                    Principal Approval - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="pad_letter_date"
                                                        checked="">
                                                    Principal Approval - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="pad_amount"
                                                        checked="">
                                                    Principal Approval - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="pad_approved_by"
                                                        checked="">
                                                    Principal Approval - Approved By</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bes_letter_no"
                                                        checked="">
                                                    Block Estimate Submitted - Letter No.
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bes_letter_date"
                                                        checked="">
                                                    Block Estimate Submitted - Letter Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bes_amount"
                                                        checked="">
                                                    Block Estimate Submitted - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="bes_provision_in_estimate" checked="">
                                                    Block Estimate Submitted - Provision in
                                                    Estimate</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bes_submit_letter"
                                                        checked="">
                                                    Block Estimate Submitted - Submitted
                                                    Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="bes_submit_office_date" checked="">
                                                    Block Estimate Submitted - Submission
                                                    Office Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="division_id"
                                                        checked="">
                                                    Block Estimate Submitted - Submitted_To
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="bes_follow_up_date" checked="">
                                                    Block Estimate Submitted - Follow Up
                                                    date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bes_status"
                                                        checked="">
                                                    Block Estimate Submitted - Status</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bes_remark"
                                                        checked="">
                                                    Block Estimate Submitted - Remark</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="aa_letter_no"
                                                        checked="">
                                                    Administrative - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="aa_letter_date"
                                                        checked="">
                                                    Administrative - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="aa_amount"
                                                        checked="">
                                                    Administrative - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="aa_approved_by"
                                                        checked="">
                                                    Administrative - Approved By</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="aa_detail_regarding_architecture" checked="">
                                                    Administrative - Detail Regarding
                                                    Architecture/Structural Drawings, If Any</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tsd_letter_no"
                                                        checked="">
                                                    Technical Section - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tsd_letter_date"
                                                        checked="">
                                                    Technical Section - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tsd_amount"
                                                        checked="">
                                                    Technical Section - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tsd_approved_by"
                                                        checked="">
                                                    Technical Section - Approved By</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tsd_provision_in_ts_estimate" checked="">
                                                    Technical Section - Provision in TS
                                                    Estimate(Treatment Details, Structural Details & Other Provisense)</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_chainage"
                                                        checked="">
                                                    Forest Clearance - Chainage</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_protected"
                                                        checked="">
                                                    Forest Clearance - Protected/Non
                                                    Protected</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_no_trees"
                                                        checked="">
                                                    Forest Clearance - No. Of Trees</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_area_hect"
                                                        checked="">
                                                    Forest Clearance - Area(hect.)</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_appr_state"
                                                        checked="">
                                                    Forest Clearance - Approval to be
                                                    accorded by District/State/Gandhinagar</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="forest_proposal_submit" checked="">
                                                    Forest Clearance - Proposal Submitted
                                                    To</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_letter_no"
                                                        checked="">
                                                    Forest Clearance - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="forest_letter_date" checked="">
                                                    Forest Clearance - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_online_no"
                                                        checked="">
                                                    Forest Clearance - Online Proposal
                                                    Submission No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="forest_online_date" checked="">
                                                    Forest Clearance - Online Proposal
                                                    Submission Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_joint_site"
                                                        checked="">
                                                    Forest Clearance - Joint Site Visit
                                                    with RFO based on Proposal for 'Marking Kharda'</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="forest_approved_by" checked="">
                                                    Forest Clearance - Approved By</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_l_no"
                                                        checked="">
                                                    Forest Clearance - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="forest_final_approval" checked="">
                                                    Forest Clearance - Final Approval
                                                    Received Detail</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="forest_status"
                                                        checked="">
                                                    Forest Clearance - Status</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_chainage"
                                                        checked="">
                                                    Utility Shifting - Chainage</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="used_type"
                                                        checked="">
                                                    Utility Shifting - Type of Utility</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_utility_item"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Utility Item</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_details"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Details</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="estimated_usd_latter_no" checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_date_input"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent - Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_submitted_to"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Submitted To</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_joint_visit"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Joint Visit</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="usd_estimate_submited" checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Estimate Submitted by Concerned Department</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_latter_no"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="usd_date_input_sec" checked="">
                                                    Utility Shifting - Proposal Sent - Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_amount"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_payment"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent -
                                                    Payment Done</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_date_input_th"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent - Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_date_input_fr"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent - Work
                                                    Start Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="usd_date_input_fi"
                                                        checked="">
                                                    Utility Shifting - Proposal Sent - Work
                                                    Complete Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_name_village"
                                                        checked="">
                                                    LAQ Approval - Name of Village</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_office"
                                                        checked="">
                                                    LAQ Approval - Submission of LAQ
                                                    Proposal to Land Acquisition Office</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_letter_no"
                                                        checked="">
                                                    LAQ Approval - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_letter_date"
                                                        checked="">
                                                    LAQ Approval - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_file_sub"
                                                        checked="">
                                                    LAQ Approval - Process 1 - File
                                                    Preparation by Sub Division</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_dlr_no"
                                                        checked="">
                                                    LAQ Approval - Process 2 - File
                                                    Submitted to DLR</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_pro_date"
                                                        checked="">
                                                    LAQ Approval - Process 2 - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_challan_amt"
                                                        checked="">
                                                    LAQ Approval - Process 2 - Challan
                                                    Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_challan_date"
                                                        checked="">
                                                    LAQ Approval - Process 2 - Challan Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_payment_date"
                                                        checked="">
                                                    LAQ Approval - Process 2 - Payment Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_jms_date"
                                                        checked="">
                                                    LAQ Approval - JMS Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_jms_office"
                                                        checked="">
                                                    LAQ Approval - JMS Approved By</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="laq_approved_jms_date" checked="">
                                                    LAQ Approval - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="laq_file_collector" checked="">
                                                    LAQ Approval - File Submitted To
                                                    Collector</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_file_date"
                                                        checked="">
                                                    LAQ Approval - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_gati_date"
                                                        checked="">
                                                    LAQ Approval - Gati Shakti
                                                    Implementation Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_sec_10"
                                                        checked="">
                                                    LAQ Approval - Section 10 A, B, C</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_sec_date"
                                                        checked="">
                                                    LAQ Approval - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_sec_11"
                                                        checked="">
                                                    LAQ Approval - Section 11</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_sec11_date"
                                                        checked="">
                                                    LAQ Approval - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_sec_19"
                                                        checked="">
                                                    LAQ Approval - Section 19</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_valuation"
                                                        checked="">
                                                    LAQ Approval - Valuation</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_amt"
                                                        checked="">
                                                    LAQ Approval - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_num"
                                                        checked="">
                                                    LAQ Approval - No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_date"
                                                        checked="">
                                                    LAQ Approval - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_sec_21"
                                                        checked="">
                                                    LAQ Approval - Section 21</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_s21_file_date"
                                                        checked="">
                                                    LAQ Approval - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_approval"
                                                        checked="">
                                                    LAQ Approval - Approval For Valuation
                                                    and Intimation to Land Owner</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_sec_23"
                                                        checked="">
                                                    LAQ Approval - Section 23</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_23sec_date"
                                                        checked="">
                                                    LAQ Approval - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_23letter_no"
                                                        checked="">
                                                    LAQ Approval - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_poss_detail"
                                                        checked="">
                                                    LAQ Approval - Possession Details</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="laq_status"
                                                        checked="">
                                                    LAQ Approval - Status</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bd_item_first"
                                                        checked="">
                                                    Budgetary - Item First Introduce in
                                                    Year & Budget Provision</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bd_detail_head"
                                                        checked="">
                                                    Budgetary - Detail Budget Head</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bd_item_no"
                                                        checked="">
                                                    Budgetary - Budget Item No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bd_page_no"
                                                        checked="">
                                                    Budgetary - Page No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="bd_continous"
                                                        checked="">
                                                    Budgetary - Continous Or New Item</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="budget_previous_year" checked="">
                                                    Budgetary - Budget Previous Year</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="budget_previous_amount" checked="">
                                                    Budgetary - Amount</li>

                                                <li><input type="checkbox" name="check_boxes[]" value="ed_dtp_amount"
                                                        checked="">
                                                    Expenditure - Dtp Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_project_cost"
                                                        checked="">
                                                    Expenditure - AA Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_estimated_cost"
                                                        checked="">
                                                    Expenditure - Estimated Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_tender_cost"
                                                        checked="">
                                                    Expenditure - Tender Cost</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_qulity_cost"
                                                        checked="">
                                                    Expenditure - Quality Contracts Cost
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_origin_work"
                                                        checked="">
                                                    Expenditure - Received Tender Cost</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_b"
                                                        checked="">
                                                    Expenditure - Bill No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_details"
                                                        checked="">
                                                    Expenditure - Details</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="expended_details"
                                                        checked="">
                                                    Expenditure - Expended Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_expenditure_amount" checked="">
                                                    Expenditure - Expenditure Amount
                                                    Without</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_expenditure"
                                                        checked="">
                                                    Expenditure - Expenditure Amount 9%
                                                    With</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_work"
                                                        checked="">
                                                    Expenditure - Work Physical(%)</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_fincial"
                                                        checked="">
                                                    Expenditure - Work Fincial(%)</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_amount_for"
                                                        checked="">
                                                    Expenditure - Amount For</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_division_letter_no" checked="">
                                                    Excess Detail & Extra Detail -
                                                    Submission Details From Subdivision to Division - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_division_letter_date" checked="">
                                                    Excess Detail & Extra Detail -
                                                    Submission Details From Subdivision to Division - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_circle_letter_no" checked="">
                                                    Excess Detail & Extra Detail -
                                                    Submission Details From Division to Circle - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_circle_letter_date" checked="">
                                                    Excess Detail & Extra Detail -
                                                    Submission Details From Division to Circle - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_government_letter_no" checked="">
                                                    Excess Detail & Extra Detail - Submission Details From Circle to
                                                    Government - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_government_letter_date" checked="">
                                                    Excess Detail & Extra Detail - Submission Details From Circle to
                                                    Government - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_approval_letter_no" checked="">
                                                    Excess Detail & Extra Detail - Approval
                                                    Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_approval_letter_date" checked="">
                                                    Excess Detail & Extra Detail - Letter
                                                    Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_approval_letter_amount" checked="">
                                                    Excess Detail & Extra Detail - Access
                                                    Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="ed_approval_extra_amount" checked="">
                                                    Excess Detail & Extra Detail - Extra
                                                    Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ed_item_detail"
                                                        checked="">
                                                    Excess Detail & Extra Detail - Item
                                                    Detail</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tle_proposal_letter_no" checked="">
                                                    Time Limit Extension - Proposal
                                                    Submission - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tle_proposal_letter_date" checked="">
                                                    Time Limit Extension - Proposal
                                                    Submission - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tle_proposal_extension_date" checked="">
                                                    Time Limit Extension - Proposal
                                                    Submission - Extension Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tle_approval_letter_no" checked="">
                                                    Time Limit Extension - Approval Details
                                                    - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tle_approval_letter_date" checked="">
                                                    Time Limit Extension - Approval Details
                                                    - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tle_approval_extension_date" checked="">
                                                    Time Limit Extension - Approval Details
                                                    - Extension Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tle_status"
                                                        checked="">
                                                    Time Limit Extension - Status</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="work_yes_no"
                                                        checked="">
                                                    Work Status - Actual Complete Date
                                                    Yes/No</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ws_sd_completion"
                                                        checked="">Work Status - Actual Complete Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="acctual_yes_no"
                                                        checked="">
                                                    Work Status - Date OF intiacle Yes/No
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="ws_sd_release"
                                                        checked="">
                                                    Work Status - SD Release Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="fmg_completion_date" checked="">
                                                    FMG - Work Completion Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="fmg_time"
                                                        checked="">
                                                    FMG - FMG Time Limit In Year</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="fmg_date"
                                                        checked="">
                                                    FMG - FMG Complete Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="add_fmg_date"
                                                        checked="">
                                                    FMG - Add FMG Release Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="fmg_dropdown"
                                                        checked="">
                                                    FMG - Entry</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="fmg_entry_amount"
                                                        checked="">
                                                    FMG - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="dlp_work_completion_date" checked="">
                                                    DLP Period - Work Completion Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dlp_timeline"
                                                        checked="">
                                                    DLP Period - DLP Timeline In Month</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="dlp_completion_date" checked="">
                                                    DLP Period - DLP Completion Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dlp_released_date"
                                                        checked="">
                                                    DLP Period - DLP Released Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dlp_dropdown"
                                                        checked="">
                                                    DLP Period - DLP</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dlp_amount"
                                                        checked="">
                                                    DLP Period - DLP Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_sub_to"
                                                        checked="">
                                                    DTP Approval - Submitted To</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_submit_date"
                                                        checked="">
                                                    DTP Approval - Submitted Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="dtp_submit_letter_no" checked="">
                                                    DTP Approval - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_authority"
                                                        checked="">
                                                    DTP Approval - Authority</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_date"
                                                        checked="">
                                                    DTP Approval - Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_letter_no"
                                                        checked="">
                                                    DTP Approval - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_amt"
                                                        checked="">
                                                    DTP Approval - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_f_date"
                                                        checked="">
                                                    DTP Approval - Follow Up date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_f_status"
                                                        checked="">
                                                    DTP Approval - Status</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="dtp_f_remark"
                                                        checked="">
                                                    DTP Approval - Remark</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_no"
                                                        checked="">
                                                    NIT - NIT No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_start_date"
                                                        checked="">
                                                    NIT - Start Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_end_date"
                                                        checked="">
                                                    NIT - End Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_last_sub_date"
                                                        checked="">
                                                    NIT - Last Submission Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_tender_open_date" checked="">
                                                    NIT - Tender Open Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_pre_bid_date"
                                                        checked="">
                                                    NIT - Pre-Bid Meeting Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_tech_bid_date"
                                                        checked="">
                                                    NIT - Technical Bid Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_price_bid_date" checked="">
                                                    NIT - Price Bid Opening Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_pq_open"
                                                        checked="">
                                                    NIT - PQ Open</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_preliminary_date" checked="">
                                                    NIT - Preliminary Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_pq_sub_date"
                                                        checked="">
                                                    NIT - PQ Submission Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_pq_approval_date" checked="">
                                                    NIT - PQ Approval Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_sent_circle_date" checked="">
                                                    NIT - Sent To Circle Submission Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_sent_goverment_date" checked="">
                                                    NIT - Circle To Government Submission
                                                    Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_re_invited_date" checked="">
                                                    NIT - Proposal Sent - Re-Invited Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_with_reason"
                                                        checked="">
                                                    NIT - Proposal Sent - With Reason
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_validity_date"
                                                        checked="">
                                                    NIT - Validity Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_tender_form"
                                                        checked="">
                                                    NIT - Tender Form</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_tender_proposal" checked="">
                                                    NIT - Tender Proposal Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_letter_no"
                                                        checked="">
                                                    NIT - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_latter_date"
                                                        checked="">
                                                    NIT - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_agency_main"
                                                        checked="">
                                                    NIT - Agency</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_tender_cost"
                                                        checked="">
                                                    NIT - Agency Entry - Biding Amount
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_latter_no_2"
                                                        checked="">
                                                    NIT - Agency Entry - Above / Below
                                                    (%)</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_tender_above"
                                                        checked="">
                                                    NIT - Agency Entry - Above/Below</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tender_proposal_date" checked="">
                                                    NIT - Tender Proposal Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="nit_agency_name"
                                                        checked="">
                                                    NIT - Validity Extension - Agency
                                                    Name</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_validity_extension_date" checked="">
                                                    NIT - Validity Extension - Validity
                                                    Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="nit_latter_extension_no" checked="">
                                                    NIT - Validity Extension - Letter No.
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="latter_date_extension" checked="">
                                                    NIT - Validity Extension - Letter
                                                    Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_tender_date"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Tender
                                                    Approval Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_agency_name"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Agency
                                                    Name</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tender_approved_by" checked="">
                                                    Deposit Order/Bank Guarantee - Tender
                                                    Approved By</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_letter_No"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Letter
                                                    No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_tender_amt"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Tender
                                                    Approval Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_above"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Above/Below</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_above_perc"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Above/Below (%)</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_deposit_letter_no" checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Issued - Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_deposit_letter_date" checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Issued - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_deposit_letter_amount" checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Issued - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_condition_date"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Condition Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_condition_datails" checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Condition - Details</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_condition_approval" checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Condition - Approval</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_dep_by"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Submission By</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_submit_date"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Submission - Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_submit_amount"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee -
                                                    Deposit Submission - Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_bg_issue_date"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Bank
                                                    Guarantee - BG Issue Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_bg_expire_date"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Bank
                                                    Guarantee - BG Expire Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_bg_bank_name"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - Bank
                                                    Guarantee - Bank Name</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_bg_bank_address" checked="">
                                                    Deposit Order/Bank Guarantee - Bank
                                                    Guarantee - BG Bank Address</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_bg_bank_verified" checked="">
                                                    Deposit Order/Bank Guarantee - Bank
                                                    Guarantee - BG Bank Verified</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_fdr_date"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - FDR - Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="do_fdr_amount"
                                                        checked="">
                                                    Deposit Order/Bank Guarantee - FDR - Amount
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_work_order_date" checked="">
                                                    Deposit Order/Bank Guarantee - Work
                                                    Order Issue Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_time_line_month" checked="">
                                                    Deposit Order/Bank Guarantee - Time
                                                    Line As Per Work Order In Month</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_time_limit_any" checked="">
                                                    Deposit Order/Bank Guarantee - Time
                                                    Limit Extension If Any</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="do_completion_date" checked=""> Deposit Order/Bank
                                                    Guarantee -
                                                    Completion Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tpi_dtp_date"
                                                        checked=""> TPI - DTP Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tpi_dtp_amt"
                                                        checked=""> TPI - DTP Amount</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tender_date" checked=""> TPI - Tender Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tendure_amount" checked=""> TPI - Tender Amount
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tpi_nit_no"
                                                        checked=""> TPI - NIT - NIT No.</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tpi_start_date"
                                                        checked=""> TPI - NIT - Start Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tpi_end_date"
                                                        checked=""> TPI - NIT - End Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tender_open_date" checked=""> TPI - NIT - Tender
                                                    Open Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tech_bid_date" checked=""> TPI - NIT - Technical
                                                    Bid Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_interview_date" checked=""> TPI - NIT - Interview
                                                    Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_last_sub_date" checked=""> TPI - NIT - Last
                                                    Submission Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_pre_bid_date" checked=""> TPI - NIT - Pre-Bid
                                                    Meeting Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_price_bid_date" checked=""> TPI - NIT - Price Bid
                                                    Opening Date
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tpi_pq_open"
                                                        checked=""> TPI - NIT - PQ Open</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_preliminary_date" checked=""> TPI - NIT -
                                                    Preliminary Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_pq_sub_date" checked=""> TPI - NIT - PQ
                                                    Submission Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_pq_approval_date" checked=""> TPI - NIT - PQ
                                                    Approval Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_re_invited_date" checked=""> TPI - NIT -
                                                    Re-Invited Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_with_reason" checked=""> TPI - NIT - With Reason
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_validity_date" checked=""> TPI - NIT - Validity
                                                    Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tender_form" checked=""> TPI - NIT - Tender Form
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tender_proposal" checked=""> TPI - NIT - Tender
                                                    Proposal Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tender_letter_no" checked=""> TPI - NIT - Letter
                                                    No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_proposal_latter_date" checked=""> TPI - NIT -
                                                    Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_agency_main" checked=""> TPI - NIT - Agency</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tender_cost" checked=""> TPI - NIT - Bid Amount
                                                </li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_latter_no_2" checked=""> TPI - NIT - Above /
                                                    Below (%)</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_above_tender_form" checked=""> TPI - NIT -
                                                    Above/Below</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_tender_proposal_date" checked=""> TPI - NIT -
                                                    Tender Proposal Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_agency_name" checked=""> TPI - NIT - Validity
                                                    Extension -
                                                    Agency Name</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_validity_extension_date" checked=""> TPI - NIT -
                                                    Validity Extension -
                                                    Validity Date</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_validity_extension_letter_no" checked=""> TPI -
                                                    NIT - Validity Extension -
                                                    Letter No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_validity_extension_letter_date" checked=""> TPI -
                                                    NIT - Validity Extension -
                                                    Letter Date</li>
                                                <li><input type="checkbox" name="check_boxes[]" value="tpi_aggr_no"
                                                        checked=""> TPI - Agreement No.</li>
                                                <li><input type="checkbox" name="check_boxes[]"
                                                        value="tpi_agency_last" checked=""> TPI - Agency</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
