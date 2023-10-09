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
                        <div class="card branch-card auditor_account">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">NIT</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id"  value="{{ $project_master->id }}">
                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">NIT No.</label>
                                        <input class="form-control" type="text" id="nit_no" name="nit_no"
                                            placeholder="Enter NIT No." value="{{ $project_master->nit_no }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Start Date</label>
                                        <input class="form-control" type="date" id="nit_start_date" name="nit_start_date"
                                            placeholder="Enter Submitted Date" value="{{ $project_master->nit_start_date }}">
                                    </div>`

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">End Date</label>
                                        <input class="form-control" type="date" id="nit_end_date" name="nit_end_date"
                                            placeholder="Enter Submitted Date" value="{{ $project_master->nit_end_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Tender Open Date</label>
                                        <input class="form-control" type="date" id="nit_tender_open_date"
                                            name="nit_tender_open_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_tender_open_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Last Submission Date</label>
                                        <input class="form-control" type="date" id="nit_last_sub_date"
                                            name="nit_last_sub_date" placeholder="Enter Submitted Date" value="{{ $project_master->nit_last_sub_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Pre-Bid Meeting Date</label>
                                        <input class="form-control" type="date" id="nit_pre_bid_date"
                                            name="nit_pre_bid_date" placeholder="Enter Submitted Date" value="{{ $project_master->nit_pre_bid_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Technical Bid Date</label>
                                        <input class="form-control" type="date" id="nit_tech_bid_date"
                                            name="nit_tech_bid_date" placeholder="Enter Submitted Date" value="{{ $project_master->nit_tech_bid_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Price Bid Opening Date</label>
                                        <input class="form-control" type="date" id="nit_price_bid_date"
                                            name="nit_price_bid_date" placeholder="Enter Submitted Date" value="{{ $project_master->nit_price_bid_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="form-label">PQ Open</label>
                                        <select class="form-select" id="nit_pq_open" name="nit_pq_open">
                                            <option value="Yes" @selected($project_master->nit_pq_open == 'Yes')>Yes
                                            </option>
                                            <option value="No"@selected($project_master->nit_pq_open == 'No')>No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Preliminary Date</label>
                                        <input class="form-control" type="date" id="nit_preliminary_date"
                                            name="nit_preliminary_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_preliminary_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">PQ Submission Date</label>
                                        <input class="form-control" type="date" id="nit_pq_sub_date"
                                            name="nit_pq_sub_date" placeholder="Enter Submitted Date" value="{{ $project_master->nit_pq_sub_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">PQ Approval Date</label>
                                        <input class="form-control" type="date" id="nit_pq_approval_date"
                                            name="nit_pq_approval_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_pq_approval_date }}">
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
                                                            <input type="date" name="nit_re_invited_date"
                                                                class="form-control" id="nit_re_invited_date"
                                                                value="{{ $project_master->nit_re_invited_date }}">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_with_reason"
                                                                class="form-control" id="nit_with_reason"
                                                                placeholder="Enter Reason" value="{{ $project_master->nit_with_reason }}">
                                                        </td>
                                                    </tr>

                                                    {{-- <tr>
                                                    <td>
                                                        <input type="date" name="date_input" class="form-control" id="date_input" value="14/09/2023">
                                                    </td>
                                                    
                                                    <td>
                                                        <input type="text" name="Submitted_to" class="form-control" id="Submitted_to" placeholder="Enter Reason">
                                                    </td>
                                                 </tr> --}}
                                                    <tr>
                                                        <td class="text-end" colspan="14">
                                                            <a class="btn btn-warning add_btn" id="add_button"
                                                                name="add_button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                    height="18" viewBox="0 0 19 18" fill="none">
                                                                    <path d="M9.5 3.75V14.25M4.25 9H14.75" stroke="white"
                                                                        stroke-width="1.67" stroke-linecap="round"
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
                                        <input class="form-control" type="date" id="nit_validity_date"
                                            name="nit_validity_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_validity_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="form-label">Tender Form</label>
                                        <select class="form-select" id="nit_tender_form" name="nit_tender_form">
                                            <option selected value="EPC">EPC</option>

                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Tender Proposal Date</label>
                                        <input class="form-control" type="date" id="nit_tender_proposal"
                                            name="nit_tender_proposal" value="{{ $project_master->nit_tender_proposal }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Letter No.</label>
                                        <input class="form-control" type="text" id="nit_letter_no"
                                            name="nit_letter_no" placeholder="Enter Letter No." value="{{ $project_master->nit_letter_no }}">
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="inputtitle1" class="form-label">Letter Date</label>
                                        <input class="form-control" type="date" id="nit_latter_date"
                                            name="nit_latter_date" value="{{ $project_master->nit_latter_date }}">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="nit_upload_letter"
                                                name="nit_upload_letter" value="{{ $project_master->nit_upload_letter }}">
                                                <a href="{{ asset('uplode_images/nit/' . $project_master->nit_upload_letter) }}" target="_blank">
                                                    <br>Open Image in New Tab
                                                </a>
                                        </div>
                                    </div>

                                    <div class="panel-group utility-shifting-tabel pt-0">
                                        <div class="table-responsive" id="display_data">
                                            <h5 class="proposal-sent-heading">Agency Entry</h5>
                                            <table class="table no-margin class_tr_put utility-shifting-tabel-data">
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
                                                            <input type="text" name="nit_agency_main"
                                                                class="form-control" id="nit_agency_main" value="{{ $project_master->nit_agency_main }}">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_tender_cost"
                                                                class="form-control" id="nit_tender_cost"
                                                                placeholder="Enter Tender Cost" value="{{ $project_master->nit_tender_cost }}"> 
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_latter_no_2"
                                                                class="form-control" id="nit_latter_no_2" value="{{ $project_master->nit_latter_no_2 }}">
                                                        </td>

                                                        <td>
                                                            <select class="form-select" id="nit_tender_above"
                                                            name="nit_tender_above">
                                                            <option selected value="Above"  @selected($project_master->nit_tender_above == 'Above')>Above</option>
                                                            <option value="Below" @selected($project_master->nit_tender_above == 'Below')>Below</option>
                                                        </select>
                                                               
                                                        </td>
                                                    </tr>

                                                    {{-- <tr>
                                                        <td>
                                                            <input type="text" name="agency_main" class="form-control" id="agency_main" value="XYZ">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="tender_cost" class="form-control" id="tender_cost" placeholder="Enter Tender Cost">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="latter_no_2" class="form-control" id="latter_no_2" value="12045">
                                                        </td>

                                                        <td>
                                                            <select class="form-select" id="tender_form" name="tender_form">
                                                                <option selected value="{{ $project_master->initiated_name }}">Above</option>
                                                                <option value="{{ $project_master->initiated_name }}"></option>
                                                            </select>
                                                        </td>
                                                    </tr> --}}

                                                    <tr>
                                                        <td class="text-end" colspan="14">
                                                            <a class="btn btn-warning add_btn" id="add_button"
                                                                name="add_button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                    height="18" viewBox="0 0 19 18" fill="none">
                                                                    <path d="M9.5 3.75V14.25M4.25 9H14.75" stroke="white"
                                                                        stroke-width="1.67" stroke-linecap="round"
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
                                        <label for="inputtitle1" class="form-label">Tender Proposal Date</label>
                                        <input class="form-control" type="date" id="tender_proposal_date"
                                            name="tender_proposal_date" value="{{ $project_master->tender_proposal_date }}">
                                    </div>

                                    <div class="panel-group utility-shifting-tabel pt-0">
                                        <div class="table-responsive" id="display_data">
                                            <h5 class="proposal-sent-heading">Validity Extension</h5>
                                            <table class="table no-margin class_tr_put utility-shifting-tabel-data">
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
                                                            <input type="text" name="nit_agency_name"
                                                                class="form-control" id="nit_agency_name"
                                                                placeholder="Enter Agency Name" value="{{ $project_master->nit_agency_name }}">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="nit_validity_extension_date"
                                                                class="form-control" id="nit_validity_extension_date"
                                                                value="{{ $project_master->nit_validity_extension_date }}">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_latter_extension_no"
                                                                class="form-control" id="nit_latter_extension_no"
                                                                value="{{ $project_master->nit_latter_extension_no }}">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="latter_date_extension"
                                                                class="form-control" id="latter_date_extension"
                                                                value="{{ $project_master->latter_date_extension }}">
                                                        </td>

                                                        <td>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control w-100"
                                                                    id="latter_image_extension"
                                                                    name="latter_image_extension" value="{{ $project_master->latter_image_extension }}">
                                                                    <a href="{{ asset('uplode_images/nit/' . $project_master->latter_image_extension) }}" target="_blank">
                                                                        <br>Open Image in New Tab
                                                                    </a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    {{-- <tr>
                                                    <td>
                                                        <input type="text" name="agency_name" class="form-control" id="agency_name" placeholder="Enter Agency Name">
                                                    </td>

                                                    <td>
                                                        <input type="date" name="Validity_Date" class="form-control" id="Validity_Date" value="14/09/2023">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="latter_no_2" class="form-control" id="latter_no_2" value="12045">
                                                    </td>

                                                    <td>
                                                        <input type="date" name="latter_date_2" class="form-control" id="latter_date_2" value="14/09/2023">
                                                    </td>

                                                    <td>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control w-100" id="upload_letter" name="upload_letter">
                                                        </div>
                                                    </td>
                                                 </tr> --}}

                                                    <tr>
                                                        <td class="text-end" colspan="14">
                                                            <a class="btn btn-warning add_btn" id="add_button"
                                                                name="add_button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                    height="18" viewBox="0 0 19 18" fill="none">
                                                                    <path d="M9.5 3.75V14.25M4.25 9H14.75" stroke="white"
                                                                        stroke-width="1.67" stroke-linecap="round"
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

                                    <!-- <div class="col-lg-12 mt-2">
                                                <div class="contact_list">
                                                  <h6>DTP Approval</h6>
                                                    <div class="row p-0">
                                                        <div class="col-lg-3">
                                                            <label class="form-label">Authority</label>
                                                            <select class="form-select" name="Authority" id="Authority">
                                                                <option value="exc">Executive Engineer</option>
                                                                <option value="SE">Superintendent Engineer</option>
                                                                <option value="CE">Chief Engineer</option>
                                                              </select>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label class="form-label">Date</label>
                                                            <input type="date" class="form-control" id="dtp_date" name="dtp_date" value="2023-09-13">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                                            <input class="form-control" type="text" id="Letter_No" name="Letter_No" placeholder="Enter Letter No.">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="inputtitle1" class="form-label">Amount</label>
                                                            <input class="form-control" type="text" id="Amount" name="Amount" placeholder="Enter Amount">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

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
