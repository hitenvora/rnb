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
                                <h5 class="mb-0 font-primary text-center">Excess Detail & Extra Detail</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="excess_details">

                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Submission Details From Subdivision to Division</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-4">
                                                    <label for="inputtitle1" class="form-label">Letter No.</label>
                                                    <input class="form-control" type="text" id="ed_division_letter_no"
                                                        name="ed_division_letter_no" placeholder="Enter Letter No."
                                                        value="{{ $project_master->ed_division_letter_no }}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Date</label>
                                                    <input type="date" class="form-control" id="ed_division_letter_date"
                                                        name="ed_division_letter_date" value="{{ $project_master->ed_division_letter_date }}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="ed_division_letter_image" name="ed_division_letter_image" value="{{ $project_master->ed_division_letter_image }}">
                                                            <a href="{{ asset('uplode_images/excess_detail_extra_detail/' . $project_master->ed_division_letter_image) }}" target="_blank">
                                                                <br>Open Image in New Tab
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Submission Details From Division to Circle</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-4">
                                                    <label for="inputtitle1" class="form-label">Letter No.</label>
                                                    <input class="form-control" type="text" id="ed_circle_letter_no"
                                                        name="ed_circle_letter_no" placeholder="Enter Letter No."
                                                        value="{{ $project_master->ed_circle_letter_no }}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Date</label>
                                                    <input type="date" class="form-control" id="ed_circle_letter_date"
                                                        name="ed_circle_letter_date" value="{{ $project_master->ed_circle_letter_date }}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="ed_circle_letter_image" name="ed_circle_letter_image" value="{{ $project_master->ed_circle_letter_image }}">
                                                            <a href="{{ asset('uplode_images/excess_detail_extra_detail/' . $project_master->ed_circle_letter_image) }}" target="_blank">
                                                                <br>Open Image in New Tab
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Submission Details From Circle to Government</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-4">
                                                    <label for="inputtitle1" class="form-label">Letter No.</label>
                                                    <input class="form-control" type="text" id="ed_government_letter_no"
                                                        name="ed_government_letter_no" placeholder="Enter Letter No."
                                                        value="{{ $project_master->ed_government_letter_no }}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Date</label>
                                                    <input type="date" class="form-control"
                                                        id="ed_government_letter_date" name="ed_government_letter_date"
                                                        value="{{ $project_master->ed_government_letter_date }}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="ed_government_letter_image"
                                                            name="ed_government_letter_image" value="{{ $project_master->ed_government_letter_image }}">
                                                            <a href="{{ asset('uplode_images/excess_detail_extra_detail/' . $project_master->ed_government_letter_image) }}" target="_blank">
                                                                <br>Open Image in New Tab
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="inputtitle1" class="form-label">Approval Letter No.</label>
                                        <input class="form-control" type="text" id="ed_approval_letter_no"
                                            name="ed_approval_letter_no" placeholder="Enter Approval Letter No." value="{{ $project_master->ed_approval_letter_no }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Letter Date</label>
                                        <input type="date" class="form-control" id="ed_approval_letter_date"
                                            name="ed_approval_letter_date" value="{{ $project_master->ed_approval_letter_date }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="inputtitle1" class="form-label">Amount</label>
                                        <input class="form-control" type="text" id="ed_approval_letter_amount"
                                            name="ed_approval_letter_amount" placeholder="Enter amount" value="{{ $project_master->ed_approval_letter_amount }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Item Detail</label>
                                        <textarea rows="6" class="form-control" id="ed_item_detail" name="ed_item_detail"
                                            placeholder="Enter Item Detail">{{ $project_master->ed_item_detail }}</textarea>
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
