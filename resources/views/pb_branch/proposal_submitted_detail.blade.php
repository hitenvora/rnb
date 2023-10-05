@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.pb_branch.pb_branch_navbar')

    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Proposal Submitted Detail</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Initiated By MP/MLA Name</label>
                                        {{-- @foreach ($proposal_show as $proposal_show1) --}}
                                        <input type="text" class="form-control" id="initiated_name" name="initiated_name"
                                            placeholder="Enter Initiated By MP/MLA Name" value="">
                                        {{-- @endforeach --}}
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Letter No.</label>
                                        <input type="text" class="form-control" id="ppd_letter_no" name="ppd_letter_no"
                                            value="">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Letter Date</label>
                                        <input type="date" class="form-control" id="ppd_letter_date"
                                            name="ppd_letter_date" value="">
                                    </div>

                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="ppd_amount" name="ppd_amount"
                                            value="">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Treatment Detail</label>
                                        <textarea rows="9" class="form-control" id="ppd_treatment_detail" name="ppd_treatment_detail"
                                            placeholder="Enter Treatment Detail"></textarea>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Proposal Submitted Letter No.</label>
                                        <input type="text" class="form-control" id="ppd_proposal_submitted_letter_no"
                                            name="ppd_proposal_submitted_letter_no"
                                            placeholder="Enter Proposal Submitted Letter No." value="">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Proposal Submitted Letter Date</label>
                                        <input type="date" class="form-control" id="ppd_proposal_submitted_letter_date"
                                            name="ppd_proposal_submitted_letter_date" value="">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Proposal Submission Office</label>
                                        <input type="text" class="form-control" id="ppd_proposal_submission_office"
                                            name="ppd_proposal_submission_office"
                                            placeholder="Enter Proposal Submission Office" value="">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="ppd_letter_upload"
                                                name="ppd_letter_upload" value="">
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

    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";


        $(document).on('click', '.letter-reminder', function() {
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
                        // $('#add_letter').modal('hide');
                        if ($('#master_id').val() == '') {
                            toastr.success("Proposal Submitted  added successfully.");
                        } else {
                            toastr.success("Proposal Submitted  updated successfully.");
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
