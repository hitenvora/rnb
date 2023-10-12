@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.tender.tender_navbar')

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
                                    <input type="hidden" name="master_id" id="master_id">
                                    <div class="col-lg-3">
                                        <label class="form-label">DTP Date</label>
                                        <input type="date" class="form-control" id="tpi_dtp_date" name="tpi_dtp_date"
                                            value="2023-09-14">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">DTP Amount</label>
                                        <input type="text" class="form-control" id="tpi_dtp_amt" name="tpi_dtp_amt"
                                            value="10000">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Tender Date</label>
                                        <input type="date" class="form-control" id="tpi_tender_date"
                                            name="tpi_tender_date" value="2023-09-14">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Tender Amount</label>
                                        <input type="text" class="form-control" id="tpi_tendure_amount"
                                            name="tpi_tendure_amount" value="10000">
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-2">
                                        <div class="contact_list">
                                            <h6>NIT Details</h6>
                                            <div class="row pt-2" method="post">
                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">NIT No.</label>
                                                    <input class="form-control" type="text" id="tpi_nit_no"
                                                        name="tpi_nit_no" placeholder="Enter NIT No.">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Start Date</label>
                                                    <input class="form-control" type="date" id="tpi_start_date"
                                                        name="tpi_start_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-14">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">End Date</label>
                                                    <input class="form-control" type="date" id="tpi_end_date"
                                                        name="tpi_end_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-15">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Tender Open Date</label>
                                                    <input class="form-control" type="date" id="tpi_tender_open_date"
                                                        name="tpi_tender_open_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Last Submission Date</label>
                                                    <input class="form-control" type="date" id="tpi_last_sub_date"
                                                        name="tpi_last_sub_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Pre-Bid Meeting Date</label>
                                                    <input class="form-control" type="date" id="tpi_pre_bid_date"
                                                        name="tpi_pre_bid_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Technical Bid Date</label>
                                                    <input class="form-control" type="date" id="tpi_tech_bid_date"
                                                        name="tpi_tech_bid_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Price Bid Opening
                                                        Date</label>
                                                    <input class="form-control" type="date" id="tpi_price_bid_date"
                                                        name="tpi_price_bid_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label class="form-label">PQ Open</label>
                                                    <select class="form-select" id="tpi_pq_open" name="tpi_pq_open">
                                                        <option selected value="tpi_price_bid_date">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Preliminary Date</label>
                                                    <input class="form-control" type="date" id="tpi_preliminary_date"
                                                        name="tpi_preliminary_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">PQ Submission Date</label>
                                                    <input class="form-control" type="date" id="tpi_pq_sub_date"
                                                        name="tpi_pq_sub_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">PQ Approval Date</label>
                                                    <input class="form-control" type="date" id="tpi_pq_approval_date"
                                                        name="tpi_pq_approval_date" placeholder="Enter Submitted Date"
                                                        value="2023-09-16">
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
                                                                <tr>
                                                                    <td>
                                                                        <input type="date" name="tpi_re_invited_date[]"
                                                                            class="form-control"
                                                                            id="tpi_re_invited_date[]" value="14/09/2023">
                                                                    </td>

                                                                    <td>
                                                                        <input type="text" name="tpi_with_reason[]"
                                                                            class="form-control" id="tpi_with_reason[]"
                                                                            placeholder="Enter Reason">
                                                                    </td>
                                                                </tr>


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
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label class="form-label">Tender Form</label>
                                                    <select class="form-select" id="tpi_tender_form"
                                                        name="tpi_tender_form">
                                                        <option selected value="EPC">EPC</option>
                                                        <option value=""></option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Tender Proposal
                                                        Date</label>
                                                    <input class="form-control" type="date" id="tpi_tender_proposal"
                                                        name="tpi_tender_proposal" value="2023-09-16">
                                                </div>

                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Letter No.</label>
                                                    <input class="form-control" type="text" id="tpi_tender_letter_no"
                                                        name="tpi_tender_letter_no" placeholder="Enter Letter No.">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label for="inputtitle1" class="form-label">Letter Date</label>
                                                    <input class="form-control" type="date"
                                                        id="tpi_proposal_latter_date" name="tpi_proposal_latter_date"
                                                        value="2023-09-16">
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="tpi_proposal_latter_image"
                                                            name="tpi_proposal_latter_image">
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
                                                                    <th>Tender Cost</th>
                                                                    <th>Above / Below (%)</th>
                                                                    <th>Above/Below</th>
                                                                </tr>
                                                            </thead>
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
                                                                            placeholder="Enter Tender Cost">
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
                                                        value="2023-09-16">
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
                                        <label class="form-label">Aggrement No.</label>
                                        <input type="text" class="form-control" id="tpi_aggr_no" name="tpi_aggr_no"
                                            placeholder="Enter Aggrement Number">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Agency</label>
                                        <input type="text" class="form-control" id="tpi_agency_last"
                                            name="tpi_agency_last" placeholder="Enter Agency">
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
                                                                            placeholder="Enter Tender Cost">
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
