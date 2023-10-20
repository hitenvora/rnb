@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.pb_branch.pb_branch_navbar')

    <body>
        <div class="basic-branch-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card mb-0">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center"> Basic</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id_form">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">
                                    <input type="hidden" name="step" value="basic">
                                    <div class="col-xl-4 col-lg-6 branch-scheme-select">
                                        <label class="form-label">Name of Scheme</label>
                                        <div class="d-flex">
                                            {{-- @foreach ($basic_show as $basic_showas1) --}}
                                            <select class="form-select" id="basic_name_scheme" name="basic_name_scheme">
                                                <option value="">Select Basic Name</option>
                                                @foreach ($name_of_scheme as $value)
                                                    <option value="{{ $value['id'] }}">
                                                        {{ $value['name'] }}</option>
                                                @endforeach
                                            </select>
                                            {{-- @endforeach --}}
                                            <div class="pluse-badge" data-bs-toggle="modal"
                                                data-bs-target="#add_name_of_scheme">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path d="M12.5 6L12.5 18M18.5 12L6.5 12" stroke="white"
                                                        stroke-width="1.67" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 branch-scheme-select">
                                        <label class="form-label">Name of Project</label>
                                        <div class="d-flex">
                                            <select class="form-select" id="basic_name_project" name="basic_name_project">
                                                <option value="">Select Project Name</option>
                                                @foreach ($name_of_project as $value)
                                                    <option value="{{ $value['id'] }}">
                                                        {{ $value['name'] }}</option>
                                                @endforeach

                                            </select>

                                            <div class="pluse-badge" data-bs-toggle="modal"
                                                data-bs-target="#add_name_of_project">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path d="M12.5 6L12.5 18M18.5 12L6.5 12" stroke="white"
                                                        stroke-width="1.67" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-12">
                                        <label class="form-label">WMS Work Head</label>
                                        <input type="text" class="form-control" id="basic_wms_work_head"
                                            name="basic_wms_work_head" placeholder="Enter WMS Work Head" value="">
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <div class="contact_list district_list">
                                            <h6>Received Proposal</h6>
                                            <div class="row">

                                                <div class="col-xl-7 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">District</label>

                                                            <select class="form-select" id="district_id" name="district_id">
                                                                <option value="">Select District List</option>
                                                                @foreach ($district_name as $value)
                                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label">Taluka</label>
                                                            <select class="form-select" id="taluka_id" name="taluka_id">
                                                                <option value="">Select Taluka List</option>
                                                                @foreach ($taluka_name as $value)
                                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Work Type</label>
                                                            <select class="form-select" id="work_type_id"
                                                                name="work_type_id">
                                                                <option value="">Select Work List</option>
                                                                @foreach ($work_type as $value)
                                                                    <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @endforeach --}}
                                                <div class="col-xl-5 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Type Of Work</label>
                                                            <select class="form-select" id="types_of_work"
                                                                name="types_of_work">
                                                                <option value="">Select Work List</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label d-xl-block d-none">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_type_work_name" name="basic_type_work_name"
                                                                value="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-7 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Budget</label>
                                                            <select class="form-select" id="budget_id" name="budget_id">
                                                                <option value="">Select budget List</option>
                                                                @foreach ($budget as $value)
                                                                    <option value="{{ $value['id'] }}">
                                                                        {{ $value['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label d-xl-block d-none">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_budget_name" name="basic_budget_name"
                                                                value="">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Budget Work / Item / Page No.</label>
                                                            <select class="form-select" id="budget_work_id"
                                                                name="budget_work_id">
                                                                <option value="">Select budget Work List</option>
                                                                @foreach ($budget_work as $value)
                                                                    <option value="{{ $value['id'] }}">
                                                                        {{ $value['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-5 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label d-xl-block d-none">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_budget_work_name" name="basic_budget_work_name"
                                                                value="">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Amount in Lakh</label>
                                                            <input type="text" class="form-control" id="basic_amount"
                                                                name="basic_amount" value="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-7 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">MP/MLA Suggested</label>
                                                            <select class="form-select" id="basic_mp_mla"
                                                                name="basic_mp_mla">
                                                                <option value="">Select Mp MlaList</option>
                                                                @foreach ($mp_mla as $value)
                                                                    <option value="{{ $value['id'] }}">
                                                                        {{ $value['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label d-xl-block d-none">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_mp_mla_name" name="basic_mp_mla_name"
                                                                value="">
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label">Letter No.</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_letter_no" name="basic_letter_no"
                                                                value="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-5 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Letter Date</label>
                                                            <input type="date" class="form-control"
                                                                id="basic_letter_date" name="basic_letter_date"
                                                                value="">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Letter Upload</label>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control w-100"
                                                                    id="basic_upload_img" name="basic_upload_img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label class="form-label">Suggestion</label>
                                                    <input type="text" class="form-control" id="basic_suggest"
                                                        name="basic_suggest" placeholder="Enter Suggestion"
                                                        value="">
                                                </div>

                                                <div class="col-lg-12 mt-3">
                                                    <div class="contact_list">
                                                        <h6>Received Proposal</h6>
                                                        <div class="row p-0">
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Received
                                                                    Proposal From</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_recever_from" name="basic_recever_from"
                                                                    placeholder="From" value="">
                                                            </div>
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Letter
                                                                    No.</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_rec_letter_no" name="basic_rec_letter_no"
                                                                    placeholder="Enter Letter No." value="">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Letter Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="basic_rec_letter_date"
                                                                    name="basic_rec_letter_date" value="">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Amount</label>
                                                                <input type="text" class="form-control"
                                                                    id="basic_rec_letter_amount"
                                                                    name="basic_rec_letter_amount" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mt-3">
                                                    <div class="contact_list">
                                                        <h6>Sent Proposal</h6>
                                                        <div class="row p-0">
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Sent Proposal
                                                                    To</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_sent_proposal" name="basic_sent_proposal"
                                                                    placeholder="To" value="">
                                                            </div>
                                                            <div class="col-lg-3 mb-3">
                                                                <label for="inputtitle1" class="form-label">Letter
                                                                    No.</label>
                                                                <input class="form-control" type="text"
                                                                    id="basic_sent_proposal_letter_no"
                                                                    name="basic_sent_proposal_letter_no"
                                                                    placeholder="Enter Letter No." value="">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Letter Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="basic_sent_proposal_date"
                                                                    name="basic_sent_proposal_date" value="">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Amount</label>
                                                                <input type="text" class="form-control"
                                                                    id="basic_sent_proposal_amount"
                                                                    name="basic_sent_proposal_amount" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Sent Box</label>
                                                            <select class="form-select" id="sent_box_id"
                                                                name="sent_box_id">
                                                                <option value="">Select Sent Box</option>
                                                                @foreach ($sent_box as $value)
                                                                    <option value="{{ $value['id'] }}">
                                                                        {{ $value['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label d-xl-block d-none">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_sent_box_name" name="basic_sent_box_name"
                                                                value="">
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <label class="form-label">Date</label>
                                                            <input type="date" class="form-control"
                                                                id="basic_sent_box_date" name="basic_sent_box_date"
                                                                value="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="form-label">Remarks</label>
                                                            <input type="text" class="form-control"
                                                                id="basic_sent_box_remark" name="basic_sent_box_remark"
                                                                placeholder="Enter Remarks..." value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Name of Department</label>
                                        <input type="text" class="form-control" id="basic_name_of_department"
                                            name="basic_name_of_department" placeholder="Enter Name of Department"
                                            value="">
                                    </div>

                                    <div class="col-lg-3 branch-scheme-select">
                                        <label class="form-label">District(Division)</label>
                                        <select class="form-select" id="division_master_id" name="division_master_id">
                                            <option value="">Select division name List</option>
                                            @foreach ($division_name as $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-3 branch-scheme-select">
                                        <label class="form-label">Subdivision</label>
                                        <select class="form-select" id="sub_division_master_id"
                                            name="sub_division_master_id">
                                            <option value="">Select Sub division Name List</option>
                                            @foreach ($sub_division_name as $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Name of Road,Length & Width As Per F1-F2 with
                                            Challenge</label>
                                        <input type="text" class="form-control" id="basic_name_of_road"
                                            name="basic_name_of_road"
                                            placeholder="Enter Name of Road,Length & Width As Per F1-F2 with Challenge"
                                            value="">
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Category of Road(SH, MDR, ODR, VR) With Highway
                                            No.</label>
                                        <input type="text" class="form-control" id="basic_category_of_road"
                                            name="basic_category_of_road"
                                            placeholder="Enter Category of Road(SH, MDR, ODR, VR) With Highway No.">
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn submit-btn btn btn-primary" id="btn_save"
                                            name="sub_client">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- add name of scheme  -->
        <div class="modal fade product-modal" id="add_name_of_scheme" tabindex="-1"
            aria-labelledby="add_name_of_scheme" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_name_of_scheme">Add Name of Scheme</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" enctype="multipart/form-data" id="name_of_scheme_id">
                            @csrf
                            <input type="hidden" name="name_of_scheme_id" id="name_of_scheme_id">
                            <div class="col-lg-12">
                                <label class="form-label">Name Of Scheme</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="XYZ">
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


        <!-- add name of project  -->
        <div class="modal fade product-modal" id="add_name_of_project" tabindex="-1"
            aria-labelledby="add_name_of_project" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_name_of_project">Add Name of Project</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" enctype="multipart/form-data" id="add_name_of_project_id">
                            @csrf
                            <input type="hidden" name="add_name_of_project_id" id="add_name_of_project_id">
                            <div class="col-lg-12">
                                <label class="form-label">Name Of Project</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="XYZ">
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
    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";

        $('#master_id_form').submit(function(e) {
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
                        if ($('#master_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }
                        // dataTable.draw();

                        // Redirect to a route after success
                        window.location.href = "{{ route('project_master') }}";
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






        $('#name_of_scheme_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('name_of_schema_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#name_of_scheme_id').modal('hide');
                        if ($('#name_of_scheme_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }
                        window.location.href = "{{ route('basic_branch') }}";
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







        $('#add_name_of_project_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('name_of_project_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#add_name_of_project_id').modal('hide');
                        if ($('#add_name_of_project_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }

                        window.location.href = "{{ route('basic_branch') }}";
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

        document.getElementById('work_type_id').addEventListener('change', function() {
            const workTypeSelect = document.getElementById('work_type_id');
            const typeOfWorkSelect = document.getElementById('types_of_work');

            // Get the selected option's value
            const selectedWorkTypeId = workTypeSelect.value;

            // Clear the "Type Of Work" dropdown options
            typeOfWorkSelect.innerHTML = '<option value="">Select Type Of Work</option>';

            // Populate the "Type Of Work" dropdown based on the selected "Work Type"
            if (selectedWorkTypeId === '1') {
                // If "Work Type" is 1, add the options specific to that type
                typeOfWorkSelect.innerHTML += `
                <option value="Re-Surfacing">Re-Surfacing</option>
                <option value="Strengthening">Strengthening</option>
                <option value="3.75 to 5.5">3.75 to 5.5</option>
                <option value="3.75 to 7">3.75 to 7</option>
                <option value="3.75 to 10">3.75 to 10</option>
                <option value="5.5 to 7">5.5 to 7</option>
                <option value="5.5 to 10">5.5 to 10</option>
                <option value="7 to 10">7 to 10</option>
                <option value="10 to 4 lan">10 to 4 lan</option>
                <option value="10 to 6 lan">10 to 6 lan</option>
                <option value="4 lan to 6 lan">4 lan to 6 lan</option>`;
            } else if (selectedWorkTypeId === '2') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="New Buliding">New Buliding</option>
                <option value="Addition Alternative">Addition Alternative</option>
                <option value="Repairing Work">Repairing Work</option>`;
            } else if (selectedWorkTypeId === '3') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="Rob">Rob</option>
                <option value="WaterBody Bridge">WaterBody Bridge</option>
                <option value="Flyover">Flyover</option>`;
            } else if (selectedWorkTypeId === '4') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="Slab Drain">Slab Drain</option>
                <option value="Box Calvate">Box Calvate</option>
                <option value="Hp Drain">Hp Drain</option>`;
            }
            else if (selectedWorkTypeId === '5') {
                // If "Work Type" is 2, add different options
                typeOfWorkSelect.innerHTML += `
                <option value="Other">Other</option>`;
            }
        });
    </script>
@endsection
