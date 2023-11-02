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
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Technical Section Detail</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="technical_section">
                                    <div class="col-lg-4">
                                        <label class="form-label">Letter No.</label>
                                        <input type="text" class="form-control" id="tsd_letter_no" name="tsd_letter_no"
                                            placeholder="Enter Letter No." value="{{ $project_master->tsd_letter_no }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Letter Date</label>
                                        <input type="date" class="form-control" id="tsd_letter_date"
                                            name="tsd_letter_date" value="{{ $project_master->tsd_letter_date }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="tsd_amount" name="tsd_amount"
                                            value="{{ $project_master->tsd_amount }}">
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="tsd_letter_upload"
                                                name="tsd_letter_upload" value="{{ $project_master->tsd_letter_upload }}">
                                            <a href="{{ asset('uplode_images/technical_section_detail/' . $project_master->tsd_letter_upload) }}"
                                                target="_blank">
                                                <br>Open Image in New Tab
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Approved By</label>
                                        <select class="form-select" id="tsd_approved_by" name="tsd_approved_by"
                                            value="{{ $project_master->tsd_approved_by }}">
                                            <option value="Government"@selected($project_master->tsd_approved_by == 'Government')>Government</option>
                                            <option value="Circle"@selected($project_master->tsd_approved_by == 'Circle')>Circle</option>
                                            <option value="Divison"@selected($project_master->tsd_approved_by == 'Divison')>Divison</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Provision in TS Estimate(Treatment Details, Structural
                                            Details & Other Provisense)</label>
                                        <textarea rows="9" class="form-control" id="tsd_provision_in_ts_estimate" name="tsd_provision_in_ts_estimate"
                                            placeholder="Enter Name of Road,Length & Width As Per F1-F2 with Challenge">{{ $project_master->tsd_provision_in_ts_estimate }}</textarea>
                                    </div>
                                    <div class="col-12 text-center mt-3">
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


        $(document).on('click', '.add-division', function() {
            $('.modal-title').text('Add Principal Approval Master');
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
                            toastr.success("Technical Section added successfully.");
                        } else {
                            toastr.success("Technical Section updated successfully.");
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
