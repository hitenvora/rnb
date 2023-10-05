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
                                <h5 class="mb-0 font-primary text-center">Principal Approval Detail </h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data"
                                    id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">
                                    {{-- @foreach ($principal_show as $item)
                                        
                                    @endforeach --}}
                                    <div class="col-lg-3">
                                        <label class="form-label">Letter No.</label>
                                        <input type="text" class="form-control" id="pad_letter_no" name="pad_letter_no" value="{{ $project_master->pad_letter_no }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Letter Date</label>
                                        <input type="date" class="form-control" id="pad_letter_date"
                                            name="pad_letter_date" value="{{ $project_master->pad_letter_date }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="pad_amount" name="pad_amount"
                                            value="{{ $project_master->pad_amount }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Approved By</label>
                                        <select class="form-select" id="pad_approved_by" name="pad_approved_by" value="{{ $project_master->pad_approved_by }}">
                                           
                                            <option value="Government">Government</option>
                                            <option value="Circle">Circle</option>
                                            <option value="Divison">Divison</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="pad_letter_upload"
                                                name="pad_letter_upload" value="{{ $project_master->pad_letter_upload }}">
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
                            toastr.success("Principal Approval added successfully.");
                        } else {
                            toastr.success("Principal Approval updated successfully.");
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
