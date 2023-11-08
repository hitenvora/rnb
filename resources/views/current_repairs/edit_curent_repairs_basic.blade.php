@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.current_reapring.edit_current_reapring_navbar')

    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Basic </h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_form">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $cr_update->id }}">
                                    <input type="hidden" name="step" value="cr_basic">
                                    <div class="col-lg-3">
                                        <label class="form-label">Subdivision To</label>
                                        <input type="text" class="form-control" id="cr_subdivision_to"
                                            name="cr_subdivision_to" value="{{ $cr_update->cr_subdivision_to }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Name Of Section</label>
                                        <input type="date" class="form-control" id="cr_letter_date_name_of_section"
                                            name="cr_letter_date_name_of_section"
                                            value="{{ $cr_update->cr_letter_date_name_of_section }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Section</label>
                                        <input type="text" class="form-control" id="cr_section" name="cr_section"
                                            value="{{ $cr_update->cr_section }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Tsi Persoul</label>
                                        <input type="text" class="form-control" id="ct_tsi" name="ct_tsi"
                                            value="{{ $cr_update->ct_tsi }}">
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="form-label">Name Of Work</label>
                                        <input type="text" class="form-control" id="ct_work" name="ct_work"
                                            value="{{ $cr_update->ct_work }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Ts/Persual</label>
                                        <input type="text" class="form-control" id="ct_persual" name="ct_persual"
                                            value="{{ $cr_update->ct_persual }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Ts No</label>
                                        <input type="text" class="form-control" id="ct_ts_no" name="ct_ts_no"
                                            value="{{ $cr_update->ct_ts_no }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Ts Date</label>
                                        <input type="text" class="form-control" id="ct_date" name="ct_date"
                                            value="{{ $cr_update->ct_date }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Ts Letter No</label>
                                        <input type="text" class="form-control" id="ct_letter_no" name="ct_letter_no"
                                            value="{{ $cr_update->ct_letter_no }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Ts Amount</label>
                                        <input type="text" class="form-control" id="ct_amount" name="ct_amount"
                                            value="{{ $cr_update->ct_amount }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Persual Letter No</label>
                                        <input type="text" class="form-control" id="ct_leter_no" name="ct_leter_no"
                                            value="{{ $cr_update->ct_leter_no }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Persual Date</label>
                                        <input type="text" class="form-control" id="ct_persual_date"
                                            name="ct_persual_date" value="{{ $cr_update->ct_persual_date }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Persual Amount</label>
                                        <input type="text" class="form-control" id="ct_persual_amount"
                                            name="ct_persual_amount" value="{{ $cr_update->ct_persual_amount }}">
                                    </div>
                                    <div class="col-xl-4 col-lg-6 branch-scheme-select">
                                        <label class="form-label">Name of Agency</label>
                                        <div class="d-flex">
                                            <select class="form-select" id="cr_egncy_name" name="cr_egncy_name">
                                                <option value="">Select Agency</option>
                                                @foreach ($agency_name as $value)
                                                    <option value="{{ $value['id'] }}"
                                                        {{ $cr_update->cr_egncy_name == $value['id'] ? 'selected' : '' }}>
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
        </div>

        <div class="modal fade product-modal" id="add_name_of_project" tabindex="-1"
            aria-labelledby="add_name_of_project" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_name_of_project">Add Name of Agency</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" enctype="multipart/form-data" id="current_agency_id">
                            @csrf
                            <input type="hidden" name="current_agency_id" id="current_agency_id">
                            <div class="col-lg-12">
                                <label class="form-label">Name Of Agency</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary submit-btn" id="btn_save"
                                    name="btn_save">Save</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div id="selectedID" data-id="{{ $cr_update->id }}"></div>
    </body>
@endsection

@section('script')
    <script>
        $('#master_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('curent_reaparing_insert') }}",
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
                            toastr.success("Current Repairs Basic  added successfully.");
                        } else {
                            toastr.success("Current Repairs Basic  updated successfully.");
                        }
                        // dataTable.draw();
                        // window.location.href = "{{ route('curent_reaparing_master') }}";
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



        $('#current_agency_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');
            var selectedID = $("#selectedID").data("id");

            $.ajax({
                type: 'POST',
                url: "{{ route('cr_agency_name_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#current_agency_id').modal('hide');
                        if ($('#current_agency_id').val() == '') {
                            toastr.success("Agency added successfully.");
                        } else {
                            toastr.success("Agency updated successfully.");
                        }
                        window.location.href = "{{ url('edit-current-repairs-basic') }}/" + selectedID;

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
