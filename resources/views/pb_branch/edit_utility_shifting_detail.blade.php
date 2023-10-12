@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.pb_branch.edit_pb_branch_navbar')


    <body>
        <div class="basic-branch-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card utility-shifting-card mb-0">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center"> Utility Shifting Detail </h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="utility_shifting">

                                    <div class="col-lg-4">
                                        <label class="form-label">Chainage</label>
                                        <input type="text" class="form-control" id="usd_chainage" name="usd_chainage"
                                            placeholder="Enter Chainage" value="{{ $project_master->usd_chainage }}">
                                    </div>
                                    @php
                                        $used_type = [];
                                        if (isset($project_master->used_type)) {
                                            $used_type = explode(',', $project_master->used_type);
                                        }
                                    @endphp
                                    <div class="col-lg-4">
                                        <label class="form-label">Type of Utility </label>
                                        <div class="dropdown form-select utility-type-dropdown">
                                            <a class="dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Electric Pole, Water Supply line, Drainage line
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item checkboxes" href="#">
                                                    <input type="checkbox" id="used_type[]" name="used_type[]"
                                                        @checked(in_array('Electric Pole', $used_type)) value="Electric Pole"
                                                        class="form-check-input">
                                                    Electric Pole
                                                </a>
                                                <a class="dropdown-item checkboxes" href="#">
                                                    <input type="checkbox" id="used_type[]" name="used_type[]"
                                                        @checked(in_array('Water Supply line', $used_type)) value="Water Supply line"
                                                        class="form-check-input">
                                                    Water Supply line
                                                </a>
                                                <a class="dropdown-item checkboxes" href="#">
                                                    <input type="checkbox" id="used_type[]" name="used_type[]"
                                                        @checked(in_array('Drainage line', $used_type)) value="Drainage line"
                                                        class="form-check-input">
                                                    Drainage line
                                                </a>
                                                <a class="dropdown-item checkboxes" href="#">
                                                    <input type="checkbox" id="used_type[]" name="used_type[]"
                                                        @checked(in_array('Telephone line', $used_type)) value="Telephone line"
                                                        class="form-check-input">
                                                    Telephone line
                                                </a>
                                                <a class="dropdown-item checkboxes" href="#">
                                                    <input type="checkbox" id="used_type[]" name="used_type[]"
                                                        @checked(in_array('Gas line', $used_type)) value="Gas line"
                                                        class="form-check-input">
                                                    Gas line
                                                </a>
                                                <a class="dropdown-item checkboxes" href="#">
                                                    <input type="checkbox" id="used_type[]" name="used_type[]"
                                                        @checked(in_array('Others', $used_type)) value="Others"
                                                        class="form-check-input">
                                                    Others
                                                </a>
                                            </div>
                                        </div>

                                        <!-- <label  class="form-label">Type of Utility </label>
                                                                                                            <select class="form-select" id="name_project" name="name_project">
                                                                                                                <option selected value="{{ $project_master->initiated_name }}">Electric Pole, Water Supply line, Drainage line, Telephone line, Gas line, Others </option>
                                                                                                                <option value="{{ $project_master->initiated_name }}">Gondal</option>
                                                                                                            </select> -->
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="form-label  d-lg-block d-none">&nbsp;</label>
                                        <input type="text" class="form-control" id="usd_work_head" name="usd_work_head"
                                            value="{{ $project_master->usd_work_head }}">
                                    </div>


                                    <div class="panel-group utility-shifting-tabel" id="contect">
                                        <div class="table-responsive" id="display_data">
                                            <h5 class="proposal-sent-heading">Proposal Sent</h5>
                                            <table
                                                class="table no-margin class_tr_put utility-shifting-tabel-data utility-shifting-date">
                                                <thead>
                                                    <tr>
                                                        <th>Utility Item</th>
                                                        <th>Details</th>
                                                        <th>Letter No.</th>
                                                        <th>Date</th>
                                                        <th>Submitted To</th>
                                                        <th>Joint Visit</th>
                                                        <th>Estimate Submitted by
                                                            Concerned Department</th>
                                                        <th>Letter No.</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Payment Done</th>
                                                        <th>Date</th>
                                                        <th>Work Start Date</th>
                                                        <th>Work Complete Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (explode(',', $project_master->usd_utility_item) as $key => $data)
                                                        @php
                                                            $usd_details = explode(',', $project_master->usd_details);
                                                            $estimated_usd_latter_no = explode(',', $project_master->estimated_usd_latter_no);
                                                            $usd_date_input = explode(',', $project_master->usd_date_input);
                                                            $usd_submitted_to = explode(',', $project_master->usd_submitted_to);
                                                            $usd_joint_visit = explode(',', $project_master->usd_joint_visit);
                                                            $usd_estimate_submited = explode(',', $project_master->usd_estimate_submited);
                                                            $usd_latter_no = explode(',', $project_master->usd_latter_no);
                                                            $usd_date_input_sec = explode(',', $project_master->usd_date_input_sec);
                                                            $usd_amount = explode(',', $project_master->usd_amount);
                                                            $usd_payment = explode(',', $project_master->usd_payment);
                                                            $usd_date_input_th = explode(',', $project_master->usd_date_input_th);
                                                            $usd_date_input_fr = explode(',', $project_master->usd_date_input_fr);
                                                            $usd_date_input_fi = explode(',', $project_master->usd_date_input_fi);

                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                
                                                                <input type="text" class="form-control"
                                                                    name="usd_utility_item[]" id="usd_utility_item[]"
                                                                    value="{{ $data }}">

                                                            </td>
                                                            <td>
                                                                <input type="text" name="usd_details[]"
                                                                    class="form-control class_test" id="usd_details[]"
                                                                    value="{{ @$usd_details[$key] }}">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="estimated_usd_latter_no[]"
                                                                    class="form-control class_code"
                                                                    id="estimated_usd_latter_no[]"
                                                                    value="{{ @$estimated_usd_latter_no[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="date" name="usd_date_input[]"
                                                                    class="form-control" id="usd_date_input[]"
                                                                    value="{{ @$usd_date_input[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="text" name="usd_submitted_to[]"
                                                                    class="form-control" id="usd_submitted_to[]"
                                                                    value="{{ @$usd_submitted_to[$key] }}">
                                                            </td>

                                                            <td>
                                                                <select class="form-select joint-date-visit"
                                                                    id="usd_joint_visit[]" name="usd_joint_visit[]">
                                                                    <option selected
                                                                        value="Yes"@selected(@$usd_joint_visit[$key] == 'Yes')>Yes
                                                                    </option>
                                                                    <option value="No" @selected(@$usd_joint_visit[$key] == 'No')>No
                                                                    </option>
                                                                </select>
                                                            </td>

                                                            <td>
                                                                <input type="text" name="usd_estimate_submited[]"
                                                                    class="form-control" id="usd_estimate_submited[]"
                                                                    value="{{ @$usd_estimate_submited[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="text" name="usd_latter_no[]"
                                                                    class="form-control" id="usd_latter_no[]"
                                                                    value="{{ @$usd_latter_no[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="date" name="usd_date_input_sec[]"
                                                                    class="form-control" id="usd_date_input_sec[]"
                                                                    value="{{ @$usd_date_input_sec[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="text" name="usd_amount[]"
                                                                    class="form-control " id="usd_amount[]"
                                                                    value="{{ @$usd_amount[$key] }}">
                                                            </td>

                                                            <td>
                                                                <select class="form-select" id="usd_payment[]"
                                                                    name="usd_payment[]">
                                                                    {{-- <option selected ></option> --}}
                                                                    <option value="Yes" @selected(@$usd_payment[$key] == 'Yes')>Yes
                                                                    </option>
                                                                    <option value="No"@selected(@$usd_payment[$key] == 'No')>No
                                                                    </option>
                                                                </select>
                                                            </td>

                                                            <td>
                                                                <input type="date" name="usd_date_input_th[]"
                                                                    class="form-control" id="usd_date_input_th[]"
                                                                    value="{{ @$usd_date_input_th[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="date" name="usd_date_input_fr[]"
                                                                    class="form-control" id="usd_date_input_fr[]"
                                                                    value="{{ @$usd_date_input_fr[$key] }}">
                                                            </td>

                                                            <td>
                                                                <input type="date" name="usd_date_input_fi[]"
                                                                    class="form-control" id="usd_date_input_fi[]"
                                                                    value="{{ @$usd_date_input_fi[$key] }}">
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

                                    <div class="col-12 text-center utility-shifting-btn">
                                        <button type="submit" class="btn submit-btn btn btn-primary mt-0" id="btn_save"
                                            name="sub_client">Save</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </form>
    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";


        $(document).on('click', '.add-division', function() {
            $('.modal-title').text('Add Proposal Master');
            $('#master_id').val('');
            $("#master_id")[0].reset();
            $('span[id$="_error"]').text('');

        });

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
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
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
                newContactField.innerHTML = `   <div class="panel-group utility-shifting-tabel">
                                        <div class="table-responsive">
                                            
                                            <table
                                                class="table no-margin class_tr_put utility-shifting-tabel-data utility-shifting-date">
                                                
                                                <tbody>
                                                    <td>
                                                    <input type="text" class="form-control"
                                                                name="usd_utility_item[]" id="usd_utility_item[]"
                                                                value="XYZ">

                                                        </td>
                                                        <td>
                                                            <input type="text" name="usd_details[]"
                                                                class="form-control class_test" id="usd_details[]">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="estimated_usd_latter_no[]"
                                                                class="form-control class_code"
                                                                id="estimated_usd_latter_no[]">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="usd_date_input[]"
                                                                class="form-control" id="usd_date_input[]"
                                                                value="14/09/2023">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="usd_submitted_to[]"
                                                                class="form-control" id="usd_submitted_to[]"
                                                                value="-">
                                                        </td>

                                                        <td>
                                                            <select class="form-select joint-date-visit"
                                                                id="usd_joint_visit[]" name="usd_joint_visit[]">
                                                                <option selected value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <input type="text" name="usd_estimate_submited[]"
                                                                class="form-control" id="usd_estimate_submited[]">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="usd_latter_no[]"
                                                                class="form-control" id="usd_latter_no[]" value="12045">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="usd_date_input_sec[]"
                                                                class="form-control" id="usd_date_input_sec[]"
                                                                value="14/09/2023">
                                                        </td>

                                                        <td>
                                                            <input type="text" name="usd_amount[]"
                                                                class="form-control" id="usd_amount[]" value="1000">
                                                        </td>

                                                        <td>
                                                            <select class="form-select" id="usd_payment[]"
                                                                name="usd_payment[]">
                                                                <option selected value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <input type="date" name="usd_date_input_th[]"
                                                                class="form-control" id="usd_date_input_th[]"
                                                                value="14/09/2023">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="usd_date_input_fr[]"
                                                                class="form-control" id="usd_date_input_fr[]"
                                                                value="14/09/2023">
                                                        </td>

                                                        <td>
                                                            <input type="date" name="usd_date_input_fi[]"
                                                                class="form-control" id="usd_date_input_fi[]"
                                                                value="14/09/2023">
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
