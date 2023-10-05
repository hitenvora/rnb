@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.tender.tender_navbar')

    <body>
        
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card auditor_account">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Deposit Order/Bank Guarantee Detail</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Tender Approval Date</label>
                                        <input type="date" class="form-control" id="do_tender_date" name="do_tender_date"
                                            value="2023-09-13">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Agency Name</label>
                                        <input type="text" class="form-control" id="do_agency_name" name="do_agency_name"
                                            placeholder="Enter Agency Name">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label for="inputtitle1" class="form-label">Letter No.</label>
                                        <input class="form-control" type="text" id="do_letter_No" name="do_etter_No"
                                            placeholder="Enter Letter No." value="100000">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label for="inputtitle1" class="form-label">Amount</label>
                                        <input class="form-control" type="text" id="do_tender_amt" name="do_tender_amt"
                                            placeholder="Enter amount" value="100000">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="do_letter_upload_img"
                                                name="do_letter_upload_img">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Above / Below</label>
                                        <select class="form-select" name="do_above" id="do_above">
                                            <option value="Above">Above</option>
                                            <option value="Below">Below</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="inputtitle1" class="form-label">Above / Below (%)</label>
                                        <input class="form-control" type="text" id="do_above_perc" name="do_above_perc"
                                            placeholder="Enter bove / Below (%)" value="10%">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Deposit Issued</h6>
                                            <div class="row p-0">
                                                <div class="col-xl-2 col-lg-6">
                                                    <label for="inputtitle1" class="form-label">Letter No.</label>
                                                    <input class="form-control" type="text" id="do_deposit_letter_no"
                                                        name="do_deposit_letter_no" placeholder="Enter Letter No." value="100000">
                                                </div>
                                                <div class="col-xl-2 col-lg-6">
                                                    <label class="form-label">Letter Date</label>
                                                    <input type="date" class="form-control" id="do_deposit_letter_date" name="do_deposit_letter_date"
                                                        value="2023-09-13">
                                                </div>
                                                <div class="col-xl-2 col-lg-6">
                                                    <label for="inputtitle1" class="form-label">Amount</label>
                                                    <input class="form-control" type="text" id="do_deposit_letter_amount" name="do_deposit_letter_amount"
                                                        placeholder="Enter amount" value="100000">
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100" id="do_deposit_letter_upload"
                                                            name="do_deposit_letter_upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Deposit Submission</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-4">
                                                    <label for="inputtitle1" class="form-label">Deposit Submission
                                                        By</label>
                                                    <input class="form-control" type="text" id="do_dep_by"
                                                        name="do_dep_by" placeholder="Enter Deposit Submission By"
                                                        value="XYZ">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="form-label">Letter Date</label>
                                                    <input type="date" class="form-control" id="do_submit_date"
                                                        name="do_submit_date" value="2023-09-13">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="inputtitle1" class="form-label">Amount</label>
                                                    <input class="form-control" type="text" id="do_submit_amount"
                                                        name="do_submit_amount" placeholder="Enter amount" value="100000">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Bank Guarantee</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-3">
                                                    <label class="form-label">BG Expired Date</label>
                                                    <input type="date" class="form-control" id="do_bg_exp_date"
                                                        name="do_bg_exp_date" value="2023-09-13">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Amount</label>
                                                    <input class="form-control" type="text" id="do_bg_exp_amount"
                                                        name="do_bg_exp_amount" placeholder="Enter amount" value="100000">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100" id="do_bg_exp_image"
                                                            name="do_bg_exp_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>FDR</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-3">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="do_fdr_date"
                                                        name="do_fdr_date" value="2023-09-13">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Amount</label>
                                                    <input class="form-control" type="text" id="do_fdr_amount"
                                                        name="do_fdr_amount" placeholder="Enter amount" value="100000">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100" id="do_fdr_image"
                                                            name="do_fdr_image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Work Order Issue Date</label>
                                        <input type="date" class="form-control" id="do_work_order_date"
                                            name="do_work_order_date" value="2023-09-13">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label for="inputtitle1" class="form-label">Time Line As Per Work Order In
                                            Month</label>
                                        <input class="form-control" type="text" id="do_time_line_month" name="do_time_line_month"
                                            placeholder="Enter Time Line As Per Work Order In Month">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label for="inputtitle1" class="form-label">Time Limit Extension If Any</label>
                                        <input class="form-control" type="text" id="do_time_limit_any" name="do_time_limit_any"
                                            placeholder="Enter Time Limit Extension If Any">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Completion Date</label>
                                        <input type="date" class="form-control" id="do_completion_date"
                                            name="do_completion_date" value="2023-09-13">
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
