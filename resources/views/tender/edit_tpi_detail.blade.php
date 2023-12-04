@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.pb_branch.edit_pb_branch_navbar')

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
                                    <input type="hidden" name="step" value="tpi">

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
                                                    <label for="inputtitle1" class="form-label">Technical Bid Date</label>
                                                    <input class="form-control" type="date" id="tpi_tech_bid_date"
                                                        name="tpi_tech_bid_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_tech_bid_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Interview Date</label>
                                                    <input class="form-control" type="date" id="tpi_interview_date"
                                                        name="tpi_interview_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_interview_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Last Submission
                                                        Date</label>
                                                    <input class="form-control" type="date" id="tpi_last_sub_date"
                                                        name="tpi_last_sub_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_last_sub_date }}">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Pre-Bid Meeting
                                                        Date</label>
                                                    <input class="form-control" type="date" id="tpi_pre_bid_date"
                                                        name="tpi_pre_bid_date" placeholder="Enter Submitted Date"
                                                        value="{{ $project_master->tpi_pre_bid_date }}">
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

                                                <div class="panel-group utility-shifting-tabel pt-0"
                                                    id="add_poroposal_sent">
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
                                                                @foreach (explode(',', $project_master->tpi_re_invited_date) as $key => $data)
                                                                    @php
                                                                        $tpi_with_reason = explode(',', $project_master->tpi_with_reason);

                                                                    @endphp

                                                                    <tr>
                                                                        <td>
                                                                            <input type="date"
                                                                                name="tpi_re_invited_date[]"
                                                                                class="form-control"
                                                                                id="tpi_re_invited_date[]"
                                                                                value="{{ $data }}">
                                                                        </td>

                                                                        <td>
                                                                            <input type="text" name="tpi_with_reason[]"
                                                                                class="form-control"
                                                                                id="tpi_with_reason[]"
                                                                                placeholder="Enter Reason"
                                                                                value="{{ @$tpi_with_reason[$key] }}">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td class="text-end" colspan="14">
                                                                        <a class="btn btn-light-warning px-3"
                                                                            id="add_poroposal">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                                    stroke="#802B81" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg> Add
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
                                                <div class="col-lg-3 branch-scheme-select">
                                                    <label class="form-label">Tender Form</label>
                                                    <div class="d-flex">
                                                        <select class="form-select" id="tpi_tender_form"
                                                            name="tpi_tender_form">
                                                            @foreach ($tpi_tender_name as $value)
                                                                <option value="{{ $value['id'] }}"
                                                                    {{ $project_master->tpi_tender_form == $value['id'] ? 'selected' : '' }}>
                                                                    {{ $value['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        <div class="pluse-badge" data-bs-toggle="modal"
                                                            data-bs-target="#add_name_of_project">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="24" viewBox="0 0 25 24" fill="none">
                                                                <path d="M12.5 6L12.5 18M18.5 12L6.5 12" stroke="white"
                                                                    stroke-width="1.67" stroke-linecap="round" />
                                                            </svg>
                                                        </div>
                                                    </div>
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

                                                <div class="panel-group utility-shifting-tabel pt-0" id="Agency_Entry">
                                                    <div class="table-responsive" id="display_data">
                                                        <h5 class="proposal-sent-heading">Agency Entry</h5>
                                                        <table
                                                            class="table no-margin class_tr_put utility-shifting-tabel-data">
                                                            <thead>
                                                                <tr>
                                                                    <th>Agency</th>
                                                                    <th>Bid Amount</th>
                                                                    <th>Above / Below (%)</th>
                                                                    <th>Above/Below</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach (explode(',', $project_master->tpi_agency_main) as $key => $data)
                                                                    @php
                                                                        $tpi_tender_cost = explode(',', $project_master->tpi_tender_cost);
                                                                        $tpi_latter_no_2 = explode(',', $project_master->tpi_latter_no_2);
                                                                        $tpi_above_tender_form = explode(',', $project_master->tpi_above_tender_form);
                                                                        $selectedAbove = isset($tpi_above_tender_form[$key]) && $tpi_above_tender_form[$key] == 'Above' ? 'selected' : '';
                                                                        $selectedBelow = isset($tpi_above_tender_form[$key]) && $tpi_above_tender_form[$key] == 'Below' ? 'selected' : '';
                                                                    @endphp
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" name="tpi_agency_main[]"
                                                                                class="form-control"
                                                                                id="tpi_agency_main[]"
                                                                                value="{{ $data }}">
                                                                        </td>

                                                                        <td>
                                                                            <input type="text" name="tpi_tender_cost[]"
                                                                                class="form-control"
                                                                                id="tpi_tender_cost[]"
                                                                                placeholder="Enter Bid Amount"
                                                                                value="{{ @$tpi_tender_cost[$key] }}">
                                                                        </td>

                                                                        <td>
                                                                            <input type="text" name="tpi_latter_no_2[]"
                                                                                class="form-control"
                                                                                id="tpi_latter_no_2[]"
                                                                                value="{{ @$tpi_latter_no_2[$key] }}">
                                                                        </td>

                                                                        <td>
                                                                            <select class="form-select"
                                                                                id="tpi_above_tender_form[]"
                                                                                name="tpi_above_tender_form[]"
                                                                                style="width: 100%">
                                                                                <option value="">Select Option
                                                                                </option>
                                                                                <option value="Above"
                                                                                    {{ $selectedAbove }}>Above
                                                                                </option>
                                                                                <option value="Below"
                                                                                    {{ $selectedBelow }}>Below
                                                                                </option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td class="text-end" colspan="14">
                                                                        <a class="btn btn-light-warning px-3"
                                                                            id="add-agency">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                                    stroke="#802B81" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg> Add
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


                                                <div class="panel-group utility-shifting-tabel pt-0" id="valid_add">
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
                                                                    @foreach (explode(',', $project_master->tpi_agency_name) as $key => $data)
                                                                        @php
                                                                            $tpi_validity_extension_date = explode(',', $project_master->tpi_validity_extension_date);
                                                                            $tpi_validity_extension_letter_no = explode(',', $project_master->tpi_validity_extension_letter_no);
                                                                            $tpi_validity_extension_letter_date = explode(',', $project_master->tpi_validity_extension_letter_date);
                                                                            $tpi_validity_extension_letter_image = explode(',', $project_master->tpi_validity_extension_letter_image);

                                                                        @endphp
                                                                        <td>
                                                                            <input type="text" name="tpi_agency_name[]"
                                                                                class="form-control"
                                                                                id="tpi_agency_name[]"
                                                                                placeholder="Enter Agency Name"
                                                                                value="{{ $data }}">
                                                                        </td>

                                                                        <td>
                                                                            <input type="date"
                                                                                name="tpi_validity_extension_date[]"
                                                                                class="form-control"
                                                                                id="tpi_validity_extension_date[]"
                                                                                value="{{ @$tpi_validity_extension_date[$key] }}">
                                                                        </td>

                                                                        <td>
                                                                            <input type="text"
                                                                                name="tpi_validity_extension_letter_no[]"
                                                                                class="form-control"
                                                                                id="tpi_validity_extension_letter_no[]"
                                                                                value="{{ @$tpi_validity_extension_letter_no[$key] }}">
                                                                        </td>

                                                                        <td>
                                                                            <input type="date"
                                                                                name="tpi_validity_extension_letter_date[]"
                                                                                class="form-control"
                                                                                id="tpi_validity_extension_letter_date[]"
                                                                                value="{{ @$tpi_validity_extension_letter_date[$key] }}">
                                                                        </td>

                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="file"
                                                                                    class="form-control w-100"
                                                                                    id="tpi_validity_extension_letter_image[]"
                                                                                    name="tpi_validity_extension_letter_image[]"
                                                                                    value="{{ @$tpi_validity_extension_letter_image[$key] }}">
                                                                                <a href="{{ asset('uplode_images/tpi_detail/' . $project_master->tpi_validity_extension_letter_image) }}"
                                                                                    target="_blank">
                                                                                    <br>Open Image in New Tab
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                </tr>
                                                                @endforeach

                                                                <tr>
                                                                    <td class="text-end" colspan="14">
                                                                        <a class="btn btn-light-warning px-3"
                                                                            id="add-validity">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                                    stroke="#802B81" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg> Add
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
                                        <label class="form-label">Agreement No.</label>
                                        <input type="text" class="form-control" id="tpi_aggr_no" name="tpi_aggr_no"
                                            placeholder="Enter Agreement Number"
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

        <!-- add name of project  -->
        <div class="modal fade product-modal" id="add_name_of_project" tabindex="-1"
            aria-labelledby="add_name_of_project" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_name_of_project">Add Name of Tender</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" enctype="multipart/form-data"
                            id="add_tpi_name_of_tender_form">
                            @csrf
                            <input type="hidden" name="add_tpi_name_of_tender_id" id="">

                            <div class="col-lg-12">
                                <label class="form-label">Name Of Tender</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save"
                                    name="btn_save">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="selectedID" data-id="{{ $project_master->id }}"></div>
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
                            toastr.success("Tpi Details added successfully.");
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


        $('#add_tpi_name_of_tender_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            // Obtain the selected ID from the data attribute in the HTML
            var selectedID = $("#selectedID").data("id");

            $.ajax({
                type: 'POST',
                url: "{{ route('tpi_name_of_tender_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#add_tpi_name_of_tender_id').modal('hide');
                        if ($('#add_tpi_name_of_tender_id').val() == '') {
                            toastr.success("Master added successfully.");
                        } else {
                            toastr.success("Master updated successfully.");
                        }

                        // Construct the URL with the selected ID and redirect
                        window.location.href = "{{ url('edit-tpi-detail') }}/" + selectedID;
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


        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add_poroposal');
            const contactFieldsContainer = document.getElementById('add_poroposal_sent');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
               
                <div class="table-responsive" id="display_data">
                                                        
                                                        <table
                                                            class="table no-margin class_tr_put utility-shifting-tabel-data proposal-sent-tabel-data">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="date" name="tpi_re_invited_date[]"
                                                                            class="form-control" id="tpi_re_invited_date[]"
                                                                            value="14/09/2023">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tpi_with_reason[]"
                                                                            class="form-control" id="tpi_with_reason[]"
                                                                            placeholder="Enter Reason">
                                                                    </td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

                // Add an event listener to the "Remove" button
                const removeButton = newContactField.querySelector('.remove-contact');
                removeButton.addEventListener('click', function() {
                    contactFieldsContainer.removeChild(
                        newContactField); // Remove the field when "Remove" is clicked
                    contactCount--; // Decrement contact count
                });
                contactFieldsContainer.appendChild(newContactField);
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-agency');
            const contactFieldsContainer = document.getElementById('Agency_Entry');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
               
                <div class="panel-group utility-shifting-tabel pt-0" id="Agency_Entry">
                                                    <div class="table-responsive" id="display_data">
                                                        
                                                        <table
                                                            class="table no-margin class_tr_put utility-shifting-tabel-data">
                                                           
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" name="tpi_agency_main[]"
                                                                            class="form-control" id="tpi_agency_main[]"
                                                                            value="XYZ">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tpi_tender_cost[]"
                                                                            class="form-control" id="tpi_tender_cost[]"
                                                                            placeholder="Enter Bid Amount">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tpi_latter_no_2[]"
                                                                            class="form-control" id="tpi_latter_no_2[]"
                                                                            value="12045">
                                                                    </td>

                                                                    <td>
                                                                        <select class="form-select"
                                                                            id="tpi_above_tender_form[]"
                                                                            name="tpi_above_tender_form[]">
                                                                            <option selected value="Above">Above</option>
                                                                            <option value="Below">Below</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

                // Add an event listener to the "Remove" button
                const removeButton = newContactField.querySelector('.remove-contact');
                removeButton.addEventListener('click', function() {
                    contactFieldsContainer.removeChild(
                        newContactField); // Remove the field when "Remove" is clicked
                    contactCount--; // Decrement contact count
                });
                contactFieldsContainer.appendChild(newContactField);
            });
        });





        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-validity');
            const contactFieldsContainer = document.getElementById('valid_add');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
               
                <div class="panel-group utility-shifting-tabel pt-0" id="valid_add">
                                                    <div class="table-responsive" id="display_data">
                                                        <table
                                                            class="table no-margin class_tr_put utility-shifting-tabel-data">
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" name="tpi_agency_name[]"
                                                                            class="form-control" id="tpi_agency_name[]"
                                                                            placeholder="Enter Agency Name">
                                                                    </td>

                                                                    <td>
                                                                        <input type="date"
                                                                            name="tpi_validity_extension_date[]"
                                                                            class="form-control"
                                                                            id="tpi_validity_extension_date[]"
                                                                            value="14/09/2023">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text"
                                                                            name="tpi_validity_extension_letter_no[]"
                                                                            class="form-control"
                                                                            id="tpi_validity_extension_letter_no[]"
                                                                            value="12045">
                                                                    </td>

                                                                    <td>
                                                                        <input type="date"
                                                                            name="tpi_validity_extension_letter_date[]"
                                                                            class="form-control"
                                                                            id="tpi_validity_extension_letter_date[]"
                                                                            value="14/09/2023">
                                                                    </td>

                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="file"
                                                                                class="form-control w-100"
                                                                                id="tpi_validity_extension_letter_image[]"
                                                                                name="tpi_validity_extension_letter_image[]">
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                          
                                                             
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

                // Add an event listener to the "Remove" button
                const removeButton = newContactField.querySelector('.remove-contact');
                removeButton.addEventListener('click', function() {
                    contactFieldsContainer.removeChild(
                        newContactField); // Remove the field when "Remove" is clicked
                    contactCount--; // Decrement contact count
                });
                contactFieldsContainer.appendChild(newContactField);
            });
        });
    </script>
@endsection
