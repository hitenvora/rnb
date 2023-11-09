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
                                    @php
                                        $cr_catogry = explode(',', $cr_update->cr_catogry);
                                        $cr_start_date = explode(',', $cr_update->cr_start_date);
                                        $cr_end_date = explode(',', $cr_update->cr_end_date);
                                        $cr_type_of_work_id = explode(',', $cr_update->cr_type_of_work_id);
                                        $amt = [];
                                        if(isset($detail_of_work) && isset($detail_of_work->dow_bill_amt)){
                                            $amt = explode(',',$detail_of_work->dow_bill_amt);
                                        }
                                    @endphp
                                    @foreach (explode(',', $cr_update->cr_road_name) as $key => $data)
                                        <div class="col-lg-2">

                                            <label class="form-label">Name Of Road</label>
                                            <input type="text" class="form-control" id="dow_name_road"
                                                name="dow_name_road[]" value="{{ $data }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Category</label>
                                            <input type="text" class="form-control" id="dow_catogry[]"
                                                name="dow_catogry[]" value="{{ @$cr_catogry[$key] }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Chainge(to)</label>
                                            <input type="text" class="form-control" id="dow_chainge_to"
                                                name="dow_chainge_to[]" value="{{ @$cr_start_date[$key] }}">
                                        </div>

                                        <div class="col-lg-2">
                                            <label class="form-label" &nbsp>Chainge(from)</label>
                                            <input type="text" class="form-control" id="dow_chainge_from"
                                                name="dow_chainge_from[]" value="{{ @$cr_end_date[$key] }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Type Of Work</label>
                                            <input type="text" class="form-control" id="dow_type_of_work"
                                                name="dow_type_of_work[]" value="{{ @$cr_type_of_work_id[$key] }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Bill Amount</label>
                                            <input type="text" class="form-control" id="dow_bill_amt"
                                                name="dow_bill_amt[]" value="{{$amt[$key] ?? ''}}">
                                        </div>
                                    @endforeach
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

        <div class="modal fade product-modal" id="add_name_of_project" tabindex="-1" aria-labelledby="add_name_of_project"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_name_of_project">Add Name of Agency</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" enctype="multipart/form-data" id="add_name_of_project_id">
                            @csrf
                            <input type="hidden" name="add_name_of_project_id" id="add_name_of_project_id">
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
                url: "{{ route('detils_of_work_insert') }}",
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
                            toastr.success("Detils Of Work added successfully");
                        } else {
                            toastr.success("Detils Of Work updated successfully");
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
    </script>
@endsection
