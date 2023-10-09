@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.admin.master-page.master_navbar')

    <body>
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <a class="btn-left d-flex align-items-center gap-3" href="{{ route('master_form') }}">
                                            <span class="d-flex back-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M7.83 11L11.41 7.41L10 6L4 12L10 18L11.41 16.59L7.83 13H20V11H7.83Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <h3>Project Master</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                                    <a class="btn btn-white" href="{{ route('project_export') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M2.70117 11.4142L2.70117 14.1936C2.70117 14.6148 2.86711 15.0188 3.16248 15.3167C3.45785 15.6145 3.85846 15.7818 4.27617 15.7818H13.7262C14.1439 15.7818 14.5445 15.6145 14.8399 15.3167C15.1352 15.0188 15.3012 14.6148 15.3012 14.1936V11.4142M9.00205 2.2168V11.2168M9.00205 11.2168L12.602 7.77793M9.00205 11.2168L5.40205 7.77793"
                                                stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Export
                                    </a>
                                    <a class="btn btn-primary ms-2 add-division" href="{{ route('basic_branch') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Add Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Serial No</th>
                                            <th>WMS Work Head.</th>
                                            <th>Name of Department</th>
                                            <th>Name of Scheme</th>
                                            <th>Name of Project</th>
                                            <th>District</th>
                                            <th>Name of Road,length and width as per F1-F2 with Chainage</th>
                                            <th>Category of road (SH/MDR/ODR/VR) (with highway no.)</th>
                                            <th>Initiated by MLA/MP Name,letter no.</th>
                                            <th>Treatment details</th>
                                            <th>Amount (in Lacs.)</th>
                                            <th>Proposal submitted vide letter no.,date,submission office</th>
                                            <th>Project Start Date</th>
                                            <th>Project over All Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contactData">
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade common-modal" id="add_proposal" tabindex="-1" aria-labelledby="add_proposal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal_proposal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_finance">Add Proposal</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="proposal_master_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="proposal_master_id" id="proposal_master_id">
                            <div class="col-lg-4">
                                <label class="form-label">District</label>
                                <select class="form-select" id="district_id" name="district_id">
                                    <option>Select District</option>
                                    @foreach ($districtname as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="district_id_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Taluka</label>
                                <select class="form-select" id="taluka_id" name="taluka_id">
                                    <option>Select Taluka</option>
                                    @foreach ($talukaname as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                    <span class="text-danger" id="taluka_id_error"></span>
                                </select>

                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Work Type</label>
                                <select class="form-select" id="work_type_id" name="work_type_id">
                                    <option>Select Work Type</option>
                                    @foreach ($worktype as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="work_type_id_error"></span>

                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Type Of Work</label>
                                <select class="form-select" id="type_work_id" name="type_work_id">
                                    <option>Select Type Of Work</option>
                                    @foreach ($typework as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="type_work_id_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="type_work" name="type_work">
                                <span class="text-danger" id="type_work_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Budget</label>
                                <select class="form-select" id="budget_id" name="budget_id">
                                    <option>Select Budget</option>
                                    @foreach ($budget as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                    <span class="text-danger" id="budget_id_error"></span>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="budget" name="budget">
                                <span class="text-danger" id="budget_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Budget Work / Item / Page No.</label>
                                <select class="form-select" id="budget_work_id" name="budget_work_id">
                                    <option>Select Budget Work</option>
                                    @foreach ($budgetwork as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                    <span class="text-danger" id="budget_work_id_error"></span>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="budget_work" name="budget_work">
                                <span class="text-danger" id="budget_work_error"></span>
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Amount in Lakh</label>
                                <input type="text" class="form-control" id="amount" name="amount"
                                    placeholder="Enter Amount" value="One Lakh">
                                <span class="text-danger" id="amount_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">MP/MLA Suggested</label>
                                <select class="form-select" id="mp_mla_id" name="mp_mla_id">
                                    <option>Select MP/MLA Suggested</option>
                                    @foreach ($mpmla as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="mp_mla_id_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="mp_mla" name="mp_mla">
                                <span class="text-danger" id="mp_mla_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter No.</label>
                                <input type="text" class="form-control" id="letter_no" name="letter_no"
                                    value="123562123">
                                <span class="text-danger" id="letter_no_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter Date</label>
                                <input type="date" class="form-control" id="letter_date" name="letter_date"
                                    value="2023-09-13">
                                <span class="text-danger" id="letter_date_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Letter Upload</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="upload_img" name="upload_img">
                                    <span class="text-danger" id="upload_img_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Suggestion</label>
                                <input type="text" class="form-control" id="suggest" name="suggest"
                                    placeholder="Enter Suggestion">
                                <span class="text-danger" id="suggest_error"></span>

                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Received Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Received Proposal From</label>
                                            <input class="form-control" type="text" id="recever_from"
                                                name="recever_from" placeholder="From">
                                            <span class="text-danger" id="recever_from_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="rec_letter_no"
                                                name="rec_letter_no" placeholder="Enter Letter No." value="100000">
                                            <span class="text-danger" id="rec_letter_no_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="rec_letter_date"
                                                name="rec_letter_date" value="2023-09-13">
                                            <span class="text-danger" id="rec_letter_date_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="rec_letter_amount"
                                                name="rec_letter_amount" value="100000">
                                            <span class="text-danger" id="rec_letter_amount_error"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Sent Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Sent Proposal To</label>
                                            <input class="form-control" type="text" id="sent_proposal"
                                                name="sent_proposal" placeholder="To">
                                            <span class="text-danger" id="sent_proposal_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="sent_proposal_letter_no"
                                                name="sent_proposal_letter_no" placeholder="Enter Letter No."
                                                value="100000">
                                            <span class="text-danger" id="sent_proposal_letter_no_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="sent_proposal_date"
                                                name="sent_proposal_date" value="2023-09-13">
                                            <span class="text-danger" id="sent_proposal_date_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="sent_proposal_amount"
                                                name="sent_proposal_amount" value="100000">
                                            <span class="text-danger" id="sent_proposal_amount_error"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Sent Box</label>
                                <select class="form-select" id="sent_box_id" name="sent_box_id">
                                    <option>Select Sent Box</option>
                                    @foreach ($sentbox as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="sent_box_id_error"></span>

                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="sent_box" name="sent_box"
                                    value="Google Sheet">
                                <span class="text-danger" id="sent_box_error"></span>


                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="sent_box_date" name="sent_box_date"
                                    value="2023-09-13">
                                <span class="text-danger" id="sent_box_date_error"></span>

                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="sent_box_remark" name="sent_box_remark"
                                    placeholder="Enter Remarks...">
                                <span class="text-danger" id="sent_box_remark_error"></span>

                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save"
                                    name="sub_client">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="modal fade common-modal" id="editmodal" tabindex="-1" aria-labelledby="editmodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal_proposal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_finance">Edit Proposal</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post">
                            <div class="col-lg-4">
                                <label class="form-label">District</label>
                                <select class="form-select" id="district" name="district">
                                    <option selected value="">Select District</option>
                                    <option value="">Rajkot</option>
                                    <option value="">Bharuch</option>
                                    <option value="">Amreli</option>
                                    <option value="">Bhavnagar</option>
                                    <option value="">Surat</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Taluka</label>
                                <select class="form-select" id="taluka" name="taluka">
                                    <option selected value="">Select Taluka</option>
                                    <option value="">Gondal</option>
                                    <option value="">Ankleshwar</option>
                                    <option value="">Dhari</option>
                                    <option value="">chorasi</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Work Type</label>
                                <select class="form-select" id="district" name="district">
                                    <option selected value="">Select Work Type</option>
                                    <option value="">Road</option>
                                    <option value="">Building</option>
                                    <option value="">Bridge</option>
                                    <option value="">Structures</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Type Of Work</label>
                                <select class="form-select" id="work" name="work">
                                    <option selected value="" disabled>Road</option>
                                    <option value="">Surfacing </option>
                                    <option value="">Strengthening </option>
                                    <option value="">Widening (3.75 to 5.5)</option>
                                    <option value="">Widening (3.75 to 7)</option>
                                    <option value="">Widening (3.75 to 10)</option>
                                    <option value="">Widening (5.5 to 7)</option>
                                    <option value="">Widening (5.5 to 10)</option>
                                    <option value="">Widening (7 to 10)</option>
                                    <option value="">Widening (7 to 4 lan)</option>
                                    <option value="">Widening (10 to 4 lan)</option>
                                    <option value="">Widening (10 to 6 lan)</option>
                                    <option value="">Widening (4 lan to 6 lan)</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="type_work" name="type_work">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Budget</label>
                                <select class="form-select" id="work" name="work">
                                    <option selected value="">Select Budget</option>
                                    <option value="">1L</option>
                                    <option value="">2L </option>
                                    <option value="">3L</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="budget" name="budget">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Budget Work / Item / Page No.</label>
                                <select class="form-select" id="work" name="work">
                                    <option selected value="" disabled>Road</option>
                                    <option value="">Surfacing </option>
                                    <option value="">Strengthening </option>
                                    <option value="">Widening (3.75 to 5.5)</option>
                                    <option value="">Widening (3.75 to 7)</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="b_work" name="b_work">
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Amount in Lakh</label>
                                <input type="text" class="form-control" id="p_amount" name="p_amount"
                                    placeholder="Enter Amount" value="One Lakh">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">MP/MLA Suggested</label>
                                <select class="form-select" id="suggestion" name="suggestion">
                                    <option selected value="">MP/MLA</option>
                                    <option value="">MLA </option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="m_suggest" name="m_suggest">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter No.</label>
                                <input type="text" class="form-control" id="L_no" name="L_no"
                                    value="123562123">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter Date</label>
                                <input type="date" class="form-control" id="L_date" name="L_date"
                                    value="2023-09-13">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Letter Upload</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="upload_img" name="upload_img">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Suggestion</label>
                                <input type="text" class="form-control" id="suggest" name="suggest"
                                    placeholder="Enter Suggestion">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Received Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Received Proposal From</label>
                                            <input class="form-control" type="text" id="rec_from" name="rec_from"
                                                placeholder="From">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="Letter_No" name="Letter_No"
                                                placeholder="Enter Letter No." value="100000">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="L_date" name="L_date"
                                                value="2023-09-13">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="r_amount" name="r_amount"
                                                value="100000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Sent Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Sent Proposal To</label>
                                            <input class="form-control" type="text" id="sent_to" name="sent_to"
                                                placeholder="To">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="Letter_No" name="Letter_No"
                                                placeholder="Enter Letter No." value="100000">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="L_date" name="L_date"
                                                value="2023-09-13">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="s_amount" name="s_amount"
                                                value="100000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Sent Box</label>
                                <select class="form-select" id="s_box" name="s_box">
                                    <option selected value="">Google Sheet</option>
                                    <option value="">Google Sheet </option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="sent_box" name="sent_box"
                                    value="Google Sheet">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="L_date" name="L_date"
                                    value="2023-09-13">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remark" name="remark"
                                    placeholder="Enter Remarks...">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save"
                                    name="sub_client">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="modal fade view-modal" id="proposal_view" tabindex="-1" aria-labelledby="proposal_view"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="viewproduct">Proposal Detail</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="view-details">
                                    <tbody>
                                        <tr>
                                            <th>District</th>
                                            <td><span class="view-districts"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Taluka</th>
                                            <td><span class="view-taluka"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Work Type</th>
                                            <td><span class="view-work_type"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Type of Work</th>
                                            <td><span class="view-type_of_work"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Budget</th>
                                            <td><span class="view-budget"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Budget Work / Item / Page No.</th>
                                            <td><span class="view-budget_work"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Amt in Lakh</th>
                                            <td><span class="view-amount"></span></td>

                                        </tr>
                                        <tr>
                                            <th>MP/MLA Suggested</th>
                                            <td><span class="view-mp_mla"></span></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="view-details">
                                    <tbody>
                                        <tr>
                                            <th>Letter No</th>
                                            <td><span class="view-letter_no"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td><span class="view-date"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Letter Upload :</th>
                                            <td>
                                                <a href="{{ asset('assets/img/sample.png') }}"
                                                    class="font-primary text-decoration-underline" target="_blank">
                                                    View Image
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Suggestion :</th>
                                            <td><span class="view-suggestion"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Sent Box :</th>
                                            <td><span class="view-sent_box"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td><span class="view-sent_box_date"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Remark : </th>
                                            <td><span class="view-remark"></span></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="view_proposal card mb-0">
                                    <div class="card-header">
                                        <h5>Received Proposal</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="view-details">
                                            <tbody>
                                                <tr>
                                                    <th>Received Proposal From : </th>
                                                    <td><span class="view-received_proposal"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter No</th>
                                                    <td><span class="view-received_letter_no"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter Date</th>
                                                    <td><span class="view-received_letter_date"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Amount :</th>
                                                    <td><span class="view-recevid_amount"></span></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="view_proposal card mb-0">
                                    <div class="card-header">
                                        <h5>Sent Proposal</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="view-details">
                                            <tbody>
                                                <tr>
                                                    <th>Sent Proposal To : </th>
                                                    <td><span class="view-sent_proposal"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter No</th>
                                                    <td><span class="view-sent_letter_no"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter Date</th>
                                                    <td><span class="view-sent_letter_date"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Amount :</th>
                                                    <td><span class="view-sent_amount"></span></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        </div>

    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";

        var dataTable = $('.product-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            autoWidth: false,
            pageLength: 10,
            language: {
                search: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.5 17.5L13.875 13.875M15.8333 9.16667C15.8333 12.8486 12.8486 15.8333 9.16667 15.8333C5.48477 15.8333 2.5 12.8486 2.5 9.16667C2.5 5.48477 5.48477 2.5 9.16667 2.5C12.8486 2.5 15.8333 5.48477 15.8333 9.16667Z" stroke="#5E5873" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                searchPlaceholder: "Search",
                oPaginate: {
                    sNext: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                    sPrevious: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                },
            },
            ajax: {
                url: "{{ route('get_project_master') }}",
                data: function(d) {
                    d._token = token;
                },
                type: 'POST',
            },
            columns: [{
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'basic_wms_work_head',
                    name: 'basic_wms_work_head'
                },
                {
                    data: 'basic_name_of_department',
                    name: 'basic_name_of_department'
                },
                {
                    data: 'basic_name_scheme',
                    name: 'basic_name_scheme'
                },
                {
                    data: 'basic_name_project',
                    name: 'basic_name_project'
                },
                // {
                //     data: 'district_name_view',
                //     name: 'district_name_view'
                // },
                {
                    data: 'basic_name_of_road',
                    name: 'basic_name_of_road'
                },
                {
                    data: 'basic_category_of_road',
                    name: 'basic_category_of_road'
                },
                {
                    data: 'initiated_name',
                    name: 'initiated_name'
                },
                {
                    data: 'ppd_treatment_detail',
                    name: 'ppd_treatment_detail'
                },
                {
                    data: 'basic_amount',
                    name: 'basic_amount'
                },
                // {
                //     data: 'ppd_proposal_submitted_letter_no',
                //     name: 'ppd_proposal_submitted_letter_no'
                // },
                //  {
                //     data: 'ppd_proposal_submitted_letter_date',
                //     name: 'ppd_proposal_submitted_letter_date'
                // },
                {
                    data: 'ppd_proposal_submission_office',
                    name: 'ppd_proposal_submission_office'
                },



            ],

        });





        function editmaster(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('edit-project-master') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('#master_id').val(data.data.id);
                    $('#basic_name_scheme').val(data.data.basic_name_scheme);
                    $('#basic_name_project').val(data.data.basic_name_project);
                    $('#basic_wms_work_head').val(data.data.basic_wms_work_head);
                    $('#district_id').val(data.data.district_id);

                    window.location = "{{ route('basic_branch') }}";
                },
                error: function(response) {
                    toastr.error(response.msg);
                }
            });
        }





        function daletetabledata(id) {
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this data!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
                backdrop: 'static', // Prevents clicking outside the modal to dismiss
            }).then(function(result) {
                if (result.isConfirmed) { // Check if the "Yes, I am sure!" button was clicked
                    _data = {};
                    _data['id'] = id;
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('project_master_delete') }}",
                        headers: {
                            'X-CSRF-Token': token,
                        },
                        data: _data,
                        dataType: "json",
                        success: (data) => {
                            dataTable.draw();
                        },
                        error: function(response) {}
                    });
                } else {
                    swal.fire("Cancelled", "Your data is safe :)", "error");
                }
            });
        }
    </script>
@endsection
