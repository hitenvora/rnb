@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.tender.edit_tender_navbar')


    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">TPI Detail</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <div class="col-lg-3">
                                        <label class="form-label">DTP Date</label>
                                        <input type="date" class="form-control" id="tpi_dtp_date" name="tpi_dtp_date"
                                            value="{{ $project_master->tpi_dtp_date }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">DTP Amount</label>
                                        <input type="text" class="form-control" id="tpi_dtp_amt" name="tpi_dtp_amt"
                                            value="{{ $project_master->tpi_dtp_amt }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Tender Date</label>
                                        <input type="date" class="form-control" id="tpi_tender_date"
                                            name="tpi_tender_date" value="{{ $project_master->tpi_tender_date }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Tender Amount</label>
                                        <input type="text" class="form-control" id="tpi_tendure_amount"
                                            name="tpi_tendure_amount" value="{{ $project_master->tpi_tendure_amount }}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-2">
                                        <div class="contact_list">
                                            <h6>NIT Details</h6>
                                            <div class="row pt-2">
                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">NIT No.</label>
                                                    <input class="form-control" type="text" id="tpi_nit_no"
                                                        name="tpi_nit_no" placeholder="Enter NIT No."
                                                        value="{{ $project_master->tpi_nit_no }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Start Date</label>
                                                    <input class="form-control" type="date" id="tpi_start_date"
                                                        name="tpi_start_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_start_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">End Date</label>
                                                    <input class="form-control" type="date" id="tpi_end_date"
                                                        name="tpi_end_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_end_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Tender Open Date</label>
                                                    <input class="form-control" type="date" id="tpi_tender_open_date"
                                                        name="tpi_tender_open_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_tender_open_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Last Submission Date</label>
                                                    <input class="form-control" type="date" id="tpi_last_sub_date"
                                                        name="tpi_last_sub_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_last_sub_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Pre-Bid Meeting Date</label>
                                                    <input class="form-control" type="date" id="tpi_pre_bid_date"
                                                        name="tpi_pre_bid_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_pre_bid_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Technical Bid Date</label>
                                                    <input class="form-control" type="date" id="tpi_tech_bid_date"
                                                        name="tpi_tech_bid_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_tech_bid_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Price Bid Opening
                                                        Date</label>
                                                    <input class="form-control" type="date" id="tpi_price_bid_date"
                                                        name="tpi_price_bid_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_price_bid_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label class="form-label">PQ Open</label>
                                                    <select class="form-select" id="tpi_pq_open" name="tpi_pq_open">
                                                        <option value="Yes" @selected($project_master->tpi_pq_open == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->tpi_pq_open == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Preliminary Date</label>
                                                    <input class="form-control" type="date" id="tpi_preliminary_date"
                                                        name="tpi_preliminary_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_preliminary_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">PQ Submission Date</label>
                                                    <input class="form-control" type="date" id="tpi_pq_sub_date"
                                                        name="tpi_pq_sub_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_pq_sub_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">PQ Approval Date</label>
                                                    <input class="form-control" type="date" id="tpi_pq_approval_date"
                                                        name="tpi_pq_approval_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_pq_approval_date }}">
                                                </div>

                                                <div class="panel-group utility-shifting-tabel pt-0">
                                                    <div class="table-responsive" id="display_data">
                                                        <h5 class="proposal-sent-heading">Proposal Sent</h5>
                                                        <table
                                                            class="table no-margin class_tr_put utility-shifting-tabel-data proposal-sent-tabel-data">
                                                            <thead>
                                                                <tr>
                                                                    <th>Re-Invited Date</th>
                                                                    <th>With Reason</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="date" name="tpi_re_invited_date"
                                                                            class="form-control" id="tpi_re_invited_date"
                                                                            value="{{ $project_master->tpi_re_invited_date }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tpi_with_reason"
                                                                            class="form-control" id="tpi_with_reason"
                                                                            placeholder="Enter Reason"
                                                                            value="{{ $project_master->tpi_with_reason }}">
                                                                    </td>
                                                                </tr>

                                                                {{-- <tr>
                                                                        <td>
                                                                            <input type="date" name="date_input"
                                                                                class="form-control" id="date_input"
                                                                                value="{{ $project_master->initiated_name }}">
                                                                        </td>

                                                                        <td>
                                                                            <input type="text" name="Submitted_to"
                                                                                class="form-control" id="Submitted_to"
                                                                                placeholder="Enter Reason">
                                                                        </td>
                                                                    </tr> --}}
                                                                <tr>
                                                                    <td class="text-end" colspan="14">
                                                                        <a class="btn btn-warning add_btn" id="add_button"
                                                                            name="add_button">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="19" height="18"
                                                                                viewBox="0 0 19 18" fill="none">
                                                                                <path d="M9.5 3.75V14.25M4.25 9H14.75"
                                                                                    stroke="white" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </svg>
                                                                            Add
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Validity Date</label>
                                                    <input class="form-control" type="date" id="tpi_validity_date"
                                                        name="tpi_validity_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_validity_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label class="form-label">Tender Form</label>
                                                    <select class="form-select" id="tpi_tender_form"
                                                        name="tpi_tender_form">
                                                        <option selected value="EPC">EPC</option>
                                                        <option value="{{ $project_master->tpi_tender_form }}"></option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Tender Proposal
                                                        Date</label>
                                                    <input class="form-control" type="date" id="tpi_tender_proposal"
                                                        name="tpi_tender_proposal"
                                                        value="{{ $project_master->tpi_tender_proposal }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Letter No.</label>
                                                    <input class="form-control" type="text" id="tpi_tender_letter_no"
                                                        name="tpi_tender_letter_no" placeholder="Enter Letter No."
                                                        value="{{ $project_master->tpi_tender_letter_no }}">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="inputtitle1" class="form-label">Letter Date</label>
                                                    <input class="form-control" type="date"
                                                        id="tpi_proposal_latter_date" name="tpi_proposal_latter_date"
                                                        value="{{ $project_master->tpi_proposal_latter_date }}">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="tpi_proposal_latter_image"
                                                            name="tpi_proposal_latter_image"
                                                            value="{{ $project_master->tpi_proposal_latter_image }}">
                                                        <a href="{{ asset('uplode_images/tpi_detail/' . $project_master->tpi_proposal_latter_image) }}"
                                                            target="_blank">
                                                            <br>Open Image in New Tab
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="panel-group utility-shifting-tabel pt-0">
                                                    <div class="table-responsive" id="display_data">
                                                        <h5 class="proposal-sent-heading">Agency Entry</h5>
                                                        <table
                                                            class="table no-margin class_tr_put utility-shifting-tabel-data">
                                                            <thead>
                                                                <tr>
                                                                    <th>Agency</th>
                                                                    <th>Tender Cost</th>
                                                                    <th>Above / Below (%)</th>
                                                                    <th>Above/Below</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" name="tpi_agency_main"
                                                                            class="form-control" id="tpi_agency_main"
                                                                            value="{{ $project_master->tpi_agency_main }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tpi_tender_cost"
                                                                            class="form-control" id="tpi_tender_cost"
                                                                            placeholder="Enter Tender Cost"
                                                                            value="{{ $project_master->tpi_tender_cost }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tpi_latter_no_2"
                                                                            class="form-control" id="tpi_latter_no_2"
                                                                            value="{{ $project_master->tpi_latter_no_2 }}">
                                                                    </td>

                                                                    <td>
                                                                        <select class="form-select"
                                                                            id="tpi_above_tender_form"
                                                                            name="tpi_above_tender_form">
                                                                            <option selected value="Above"
                                                                                @selected($project_master->tpi_above_tender_form == 'Above')>Above</option>
                                                                            <option value="Below"
                                                                                @selected($project_master->tpi_above_tender_form == 'Below')>Below</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                                {{-- <tr>
                                                                    <td>
                                                                        <input type="text" name="agency_main"
                                                                            class="form-control" id="agency_main"
                                                                            value="XYZ">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tender_cost"
                                                                            class="form-control" id="tender_cost"
                                                                            placeholder="Enter Tender Cost">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="latter_no_2"
                                                                            class="form-control" id="latter_no_2"
                                                                            value="{{ $project_master->initiated_name }}">
                                                                    </td>

                                                                    <td>
                                                                        <select class="form-select" id="tender_form"
                                                                            name="tender_form">
                                                                            <option selected value="{{ $project_master->initiated_name }}">Above</option>
                                                                            <option value="{{ $project_master->initiated_name }}"></option>
                                                                        </select>
                                                                    </td>
                                                                </tr> --}}

                                                                <tr>
                                                                    <td class="text-end" colspan="14">
                                                                        <a class="btn btn-warning add_btn" id="add_button"
                                                                            name="add_button">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="19" height="18"
                                                                                viewBox="0 0 19 18" fill="none">
                                                                                <path d="M9.5 3.75V14.25M4.25 9H14.75"
                                                                                    stroke="white" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </svg>
                                                                            Add
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Tender Proposal
                                                        Date</label>
                                                    <input class="form-control" type="date"
                                                        id="tpi_tender_proposal_date" name="tpi_tender_proposal_date"
                                                        value="{{ $project_master->tpi_tender_proposal_date }}">
                                                </div>

                                                <div class="panel-group utility-shifting-tabel pt-0">
                                                    <div class="table-responsive" id="display_data">
                                                        <h5 class="proposal-sent-heading">Validity Extension</h5>
                                                        <table
                                                            class="table no-margin class_tr_put utility-shifting-tabel-data">
                                                            <thead>
                                                                <tr>
                                                                    <th>Agency Name</th>
                                                                    <th>Validity Date</th>
                                                                    <th>Letter No.</th>
                                                                    <th>Letter Date</th>
                                                                    <th>Letter Upload</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" name="tpi_agency_name"
                                                                            class="form-control" id="tpi_agency_name"
                                                                            placeholder="Enter Agency Name"
                                                                            value="{{ $project_master->tpi_agency_name }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="date"
                                                                            name="tpi_validity_extension_date"
                                                                            class="form-control"
                                                                            id="tpi_validity_extension_date"
                                                                            value="{{ $project_master->tpi_validity_extension_date }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text"
                                                                            name="tpi_validity_extension_letter_no"
                                                                            class="form-control"
                                                                            id="tpi_validity_extension_letter_no"
                                                                            value="{{ $project_master->tpi_validity_extension_letter_no }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="date"
                                                                            name="tpi_validity_extension_letter_date"
                                                                            class="form-control"
                                                                            id="tpi_validity_extension_letter_date"
                                                                            value="{{ $project_master->tpi_validity_extension_letter_date }}">
                                                                    </td>

                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="file"
                                                                                class="form-control w-100"
                                                                                id="tpi_validity_extension_letter_image"
                                                                                name="tpi_validity_extension_letter_image"
                                                                                value="{{ $project_master->tpi_validity_extension_letter_image }}">
                                                                            <a href="{{ asset('uplode_images/tpi_detail/' . $project_master->tpi_validity_extension_letter_image) }}"
                                                                                target="_blank">
                                                                                <br>Open Image in New Tab
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                {{-- <tr>
                                                                    <td>
                                                                        <input type="text" name="agency_name"
                                                                            class="form-control" id="agency_name"
                                                                            placeholder="Enter Agency Name">
                                                                    </td>

                                                                    <td>
                                                                        <input type="date" name="Validity_Date"
                                                                            class="form-control" id="Validity_Date"
                                                                            value="{{ $project_master->initiated_name }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="latter_no_2"
                                                                            class="form-control" id="latter_no_2"
                                                                            value="{{ $project_master->initiated_name }}">
                                                                    </td>

                                                                    <td>
                                                                        <input type="date" name="latter_date_2"
                                                                            class="form-control" id="latter_date_2"
                                                                            value="{{ $project_master->initiated_name }}">
                                                                    </td>

                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="file"
                                                                                class="form-control w-100"
                                                                                id="upload_letter" name="upload_letter">
                                                                        </div>
                                                                    </td>
                                                                </tr> --}}

                                                                <tr>
                                                                    <td class="text-end" colspan="14">
                                                                        <a class="btn btn-warning add_btn" id="add_button"
                                                                            name="add_button">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="19" height="18"
                                                                                viewBox="0 0 19 18" fill="none">
                                                                                <path d="M9.5 3.75V14.25M4.25 9H14.75"
                                                                                    stroke="white" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </svg>
                                                                            Add
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Aggrement No.</label>
                                        <input type="text" class="form-control" id="tpi_aggr_no" name="tpi_aggr_no"
                                            placeholder="Enter Aggrement Number"
                                            value="{{ $project_master->tpi_aggr_no }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Agency</label>
                                        <input type="text" class="form-control" id="tpi_agency_last"
                                            name="tpi_agency_last" placeholder="Enter Agency"
                                            value="{{ $project_master->tpi_agency_last }}">
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary submit-btn" id="btn_save"
                                            name="sub_client">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";
        $('#master_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('master_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#master_id').modal('hide');
                        if ($('#master_id').val() == '') {
                            toastr.success("Project Master added successfully.");
                        } else {
                            toastr.success("Project Master updated successfully.");
                        }
                        dataTable.draw();
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors['errors'], function(key, val) {
                            console.log(key);
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });
    </script>
@endsection
