@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.auditor_account.edit_auditor_account_navbar')

    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Budgetary Detail</h5>
                            </div>
                            <div class="card-body auditor_card">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">

                                    <div class="col-lg-12">
                                        <label class="form-label">Item First Introduce in Year & Budget Provision</label>
                                        <input type="text" class="form-control" id="bd_item_first" name="bd_item_first"
                                            placeholder="Enter Item First Introduce in Year & Budget Provision" value="{{ $project_master->bd_item_first }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Detail Budget Head</label>
                                        <input type="text" class="form-control" id="bd_detail_head" name="bd_detail_head"
                                            placeholder="Enter Detail Budget Head" value="{{ $project_master->bd_detail_head }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Budget Item No.</label>
                                        <input type="text" class="form-control" id="bd_item_no" name="bd_item_no"
                                            placeholder="Enter Budget Item No." value="{{ $project_master->bd_item_no }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Page No.</label>
                                        <input type="text" class="form-control" id="bd_page_no" name="bd_page_no"
                                            placeholder="Enter Page No." value="{{ $project_master->bd_page_no }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Continous Or New Item</label>
                                        <select class="form-select product_select" id="bd_continous" name="bd_continous">
                                            <option selected value="New Item">New Item</option>
                                            <option value="continue">Continous</option>
                                        </select>
                                        <table class="product_sub_menu table-bordered mt-3">
                                            <thead>
                                                <th>Budget Previous Year</th>
                                                <th>Amount</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" value="2022">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="200000">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" value="2022">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="200000">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" value="2022">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="200000">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end" colspan="2">
                                                        <a class="btn btn-warning add_btn" id="add_button"
                                                            name="add_button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                height="18" viewBox="0 0 19 18" fill="none">
                                                                <path d="M9.5 3.75V14.25M4.25 9H14.75" stroke="white"
                                                                    stroke-width="1.67" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            Add
                                                        </a>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
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
    </script>
@endsection
