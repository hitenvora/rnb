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
                        <div class="card branch-card auditor_account">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">NIT</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="nit">

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">NIT No.</label>
                                        <input class="form-control" type="text" id="nit_no" name="nit_no"
                                            placeholder="Enter NIT No." value="{{ $project_master->nit_no }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Start Date</label>
                                        <input class="form-control" type="date" id="nit_start_date" name="nit_start_date"
                                            placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_start_date }}">
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
                                            name="nit_last_sub_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_last_sub_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Pre-Bid Meeting Date</label>
                                        <input class="form-control" type="date" id="nit_pre_bid_date"
                                            name="nit_pre_bid_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_pre_bid_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Technical Bid Date</label>
                                        <input class="form-control" type="date" id="nit_tech_bid_date"
                                            name="nit_tech_bid_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_tech_bid_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Price Bid Opening Date</label>
                                        <input class="form-control" type="date" id="nit_price_bid_date"
                                            name="nit_price_bid_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_price_bid_date }}">
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
                                            name="nit_pq_sub_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_pq_sub_date }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">PQ Approval Date</label>
                                        <input class="form-control" type="date" id="nit_pq_approval_date"
                                            name="nit_pq_approval_date" placeholder="Enter Submitted Date"
                                            value="{{ $project_master->nit_pq_approval_date }}">
                                    </div>


                                    <div class="panel-group utility-shifting-tabel pt-0" id="contect">
                                        <div class="table-responsive">
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
                                                        @foreach (explode(',', $project_master->nit_re_invited_date) as $key => $date)
                                                            @php
                                                                $nit_with_reason = explode(',', $project_master->nit_with_reason);

                                                            @endphp
                                                            <td>
                                                                <input type="date" name="nit_re_invited_date[]"
                                                                    class="form-control" id="nit_re_invited_date[]"
                                                                    value="{{ $date }}">
                                                            </td>

                                                            <td>
                                                                <input type="text" name="nit_with_reason[]"
                                                                    class="form-control" id="nit_with_reason[]"
                                                                    placeholder="Enter Reason"
                                                                    value="{{ @$nit_with_reason[$key] }}">
                                                            </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="text-end" colspan="14">
                                                            <a class="btn btn-light-warning px-3" id="add-contact">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 20 20" fill="none">
                                                                    <path
                                                                        d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                        stroke="#802B81" stroke-width="1.67"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
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
                                            name="nit_tender_proposal"
                                            value="{{ $project_master->nit_tender_proposal }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Letter No.</label>
                                        <input class="form-control" type="text" id="nit_letter_no"
                                            name="nit_letter_no" placeholder="Enter Letter No."
                                            value="{{ $project_master->nit_letter_no }}">
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
                                                name="nit_upload_letter"
                                                value="{{ $project_master->nit_upload_letter }}">
                                            <a href="{{ asset('uplode_images/nit/' . $project_master->nit_upload_letter) }}"
                                                target="_blank">
                                                <br>Open Image in New Tab
                                            </a>
                                        </div>
                                    </div>

                                    <div class="panel-group utility-shifting-tabel pt-0" id="engncy_entry">
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
                                                        @foreach (explode(',', $project_master->nit_agency_main) as $key => $data)
                                                            @php
                                                                $nit_tender_cost = explode(',', $project_master->nit_tender_cost);
                                                                $nit_latter_no_2 = explode(',', $project_master->nit_latter_no_2);
                                                                $nit_tender_above = explode(',', $project_master->nit_tender_above);

                                                            @endphp
                                                            <td>
                                                                <input type="text" name="nit_agency_main[]"
                                                                    class="form-control" id="nit_agency_main[]"
                                                                    value="{{ $data }}">
                                                            </td>

                                                            <td>
                                                                <input type="text" name="nit_tender_cost[]"
                                                                    class="form-control" id="nit_tender_cost[]"
                                                                    placeholder="Enter Tender Cost"
                                                                    value="{{ @$nit_tender_cost[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="text" name="nit_latter_no_2[]"
                                                                    class="form-control" id="nit_latter_no_2[]"
                                                                    value="{{ @$nit_latter_no_2[$key] }}">
                                                            </td>

                                                            <td>
                                                                <select class="form-select" id="nit_tender_above[]"
                                                                    name="nit_tender_above[]">
                                                                    <option value=""> select option</option>
                                                                    {{-- <option value="Above"
                                                                        @if ($project_master->nit_tender_above[$key] == 'Above') selected @endif>
                                                                        Above</option>
                                                                    <option value="Below"
                                                                        @if ($project_master->nit_tender_above[$key] == 'Below') selected @endif>
                                                                        Below</option> --}}
                                                                </select>
                                                            </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="text-end" colspan="14">
                                                            <a class="btn btn-light-warning px-3" id="add-egncy">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 20 20" fill="none">
                                                                    <path
                                                                        d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                        stroke="#802B81" stroke-width="1.67"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> Add
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
                                            name="tender_proposal_date"
                                            value="{{ $project_master->tender_proposal_date }}">
                                    </div>

                                    <div class="panel-group utility-shifting-tabel pt-0" id="add_extension">
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
                                                        @foreach (explode(',', $project_master->nit_agency_name) as $key => $data)
                                                            @php
                                                                $nit_validity_extension_date = explode(',', $project_master->nit_validity_extension_date);
                                                                $nit_latter_extension_no = explode(',', $project_master->nit_latter_extension_no);
                                                                $latter_date_extension = explode(',', $project_master->latter_date_extension);
                                                                $latter_image_extension = explode(',', $project_master->latter_image_extension);


                                                            @endphp
                                                        <td>

                                                            <input type="text" name="nit_agency_name[]"
                                                                class="form-control" id="nit_agency_name[]"
                                                                placeholder="Enter Agency Name" value="{{$data}}">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="nit_validity_extension_date[]"
                                                                class="form-control" id="nit_validity_extension_date[]" value="{{ @$nit_validity_extension_date[$key] }}">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_latter_extension_no[]"
                                                                class="form-control" id="nit_latter_extension_no[]"
                                                                value="{{ @$nit_latter_extension_no[$key] }}">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="latter_date_extension[]"
                                                                class="form-control" id="latter_date_extension[]" value="{{ @$latter_date_extension[$key] }}">
                                                        </td>

                                                        <td>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control w-100"
                                                                    id="latter_image_extension[]"
                                                                    name="latter_image_extension[]"
                                                                    value="{{ @$latter_image_extension[$key]  }}">
                                                                <a href="{{ asset('uplode_images/nit/' . $project_master->latter_image_extension) }}"
                                                                    target="_blank">
                                                                    <br>Open Image in New Tab
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
@endforeach


                                                    <tr>
                                                        <td class="text-end" colspan="14">
                                                            <a class="btn btn-light-warning px-3" id="add-Extension">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 20 20" fill="none">
                                                                    <path
                                                                        d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                        stroke="#802B81" stroke-width="1.67"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> Add
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

        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-contact');
            const contactFieldsContainer = document.getElementById('contect');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
                    <table
                                                class="table no-margin class_tr_put utility-shifting-tabel-data proposal-sent-tabel-data">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="date" name="nit_re_invited_date[]"
                                                               id="nit_re_invited_date[]"
                                                               class="form-control" 
                                                                >
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_with_reason[]"
                                                                class="form-control" id="nit_with_reason[]"
                                                                placeholder="Enter Reason">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                     
                                                    </tr>
                                                </tbody>
                                            </table>
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
            const addContactButton = document.getElementById('add-egncy');
            const contactFieldsContainer = document.getElementById('engncy_entry');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
                <div class="panel-group utility-shifting-tabel pt-0" id="engncy_entry" >
                                        <div class="table-responsive" id="display_data">
                                            <h5 class="proposal-sent-heading">Agency Entry</h5>
                                            <table class="table no-margin class_tr_put utility-shifting-tabel-data">
                                               
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="nit_agency_main[]"
                                                                class="form-control" id="nit_agency_main[]">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_tender_cost[]"
                                                                class="form-control" id="nit_tender_cost[]"
                                                                placeholder="Enter Tender Cost">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_latter_no_2[]"
                                                                class="form-control" id="nit_latter_no_2[]">
                                                        </td>

                                                        <td>
                                                            <select class="form-select" id="nit_tender_above[]"
                                                                name="nit_tender_above[]">
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
            const addContactButton = document.getElementById('add-Extension');
            const contactFieldsContainer = document.getElementById('add_extension');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
               
                <div class="panel-group utility-shifting-tabel pt-0" id="add_extension">
                                        <div class="table-responsive" id="display_data">
                                           
                                            <table class="table no-margin class_tr_put utility-shifting-tabel-data">
                                                
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="nit_agency_name[]"
                                                                class="form-control" id="nit_agency_name[]"
                                                                placeholder="Enter Agency Name">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="nit_validity_extension_date[]"
                                                                class="form-control" id="nit_validity_extension_date[]"
                                                                >
                                                        </td>

                                                        <td>
                                                            <input type="text" name="nit_latter_extension_no[]"
                                                                class="form-control" id="nit_latter_extension_no[]"
                                                                >
                                                        </td>

                                                        <td>
                                                            <input type="date" name="latter_date_extension[]"
                                                                class="form-control" id="latter_date_extension[]"
                                                                >
                                                        </td>

                                                        <td>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control w-100"
                                                                    id="latter_image_extension[]"
                                                                    name="latter_image_extension[]">
                                                            </div>
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
    </script>
@endsection
