@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.auditor_account.auditor_account_navbar')

    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card auditor_account">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Time Limit Extension</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">

                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Proposal Submission</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                                            <input class="form-control" type="text"
                                                                id="tle_proposal_letter_no" name="tle_proposal_letter_no"
                                                                placeholder="Enter Letter No." value="100000">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Letter Date</label>
                                                            <input type="date" class="form-control"
                                                                id="tle_proposal_letter_date"
                                                                name="tle_proposal_letter_date" value="2023-09-13">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Extension Date</label>
                                                            <input type="date" class="form-control"
                                                                id="tle_proposal_extension_date"
                                                                name="tle_proposal_extension_date" value="2023-09-13">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="tle_proposal_letter_image" name="tle_proposal_letter_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Approval Detail</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                                            <input class="form-control" type="text"
                                                                id="tle_approval_letter_no" name="tle_approval_letter_no"
                                                                placeholder="Enter Letter No." value="100000">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Letter Date</label>
                                                            <input type="date" class="form-control"
                                                                id="tle_approval_letter_date"
                                                                name="tle_approval_letter_date" value="2023-09-13">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Extension Date</label>
                                                            <input type="date" class="form-control"
                                                                id="tle_approval_extension_date"
                                                                name="tle_approval_extension_date" value="2023-09-13">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="tle_approval_letter_image" name="tle_approval_letter_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Status</label>
                                        <textarea rows="6" class="form-control" id="tle_status" name="tle_status" placeholder="Enter Status"></textarea>
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
