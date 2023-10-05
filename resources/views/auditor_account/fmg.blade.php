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
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">FMG</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">

                                    <div class="col-lg-3">
                                        <label class="form-label">Work Completion Date</label>
                                        <input type="date" class="form-control" id="fmg_completion_date"
                                            name="fmg_completion_date" value="2023-09-15">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">FMG Time Limit In Year</label>
                                        <input type="text" class="form-control" id="fmg_time" name="fmg_time"
                                            placeholder="Enter FMG Time Limit In Year">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">FMG Complete Date</label>
                                        <input type="date" class="form-control" id="fmg_date" name="fmg_date"
                                            value="2023-09-14">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Add FMG Release Date</label>
                                        <input type="date" class="form-control" id="add_fmg_date" name="add_fmg_date"
                                            value="2023-09-14">
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
