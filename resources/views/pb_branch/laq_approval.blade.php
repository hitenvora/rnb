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
                        <div class="card branch-card auditor_account">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">LAQ Approval</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">

                                    <div class="col-lg-6">
                                        <label class="form-label">Name of Village</label>
                                        <input type="text" class="form-control" id="laq_name_village"
                                            name="laq_name_village" placeholder="Enter Village"
                                            value="Rajkot, Virpur, Khodi">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Submission of LAQ Proposal to Land Acquisition
                                            Office</label>
                                        <input type="text" class="form-control" id="laq_office" name="laq_office"
                                            placeholder="Enter Submission of LAQ Proposal to Land Acquisition Office">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Letter No.</label>
                                        <input type="text" class="form-control" id="laq_letter_no" name="laq_letter_no"
                                            placeholder="Enter Letter No.">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Letter Date</label>
                                        <input type="date" class="form-control" id="laq_letter_date"
                                            name="laq_letter_date" value="2023-09-13">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="laq_letter_uplode"
                                                name="laq_letter_uplode">
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 mt-2">
                                        <div class="contact_list">
                                            <h6>Process 1</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-12">
                                                    <label class="form-label">File Preparation by Sub Division</label>
                                                    <select class="form-select" name="laq_file_sub" id="laq_file_sub">
                                                        <option value="Kamrej">Kamrej</option>
                                                        <option value="Adajan">Adajan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-12 mt-2">
                                        <div class="contact_list">
                                            <h6>Process 2</h6>
                                            <div class="row p-0">
                                                <div class="col-xl-7">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label class="form-label">File Submitted to DLR</label>
                                                            <input type="text" class="form-control" id="laq_dlr_no"
                                                                name="laq_dlr_no" placeholder="Enter File Submitted to DLR">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Date</label>
                                                            <input type="date" class="form-control" id="laq_pro_date"
                                                                name="laq_pro_date" value="2023-09-13">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Challan Amount</label>
                                                            <input type="text" class="form-control" id="laq_challan_amt"
                                                                name="laq_challan_amt" placeholder="Enter Challan Amount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Challan Date</label>
                                                            <input type="date" class="form-control" id="laq_challan_date"
                                                                name="laq_challan_date" value="2023-09-13">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Payment Date</label>
                                                            <input type="date" class="form-control"
                                                                id="laq_payment_date" name="laq_payment_date"
                                                                value="2023-09-13">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4">
                                        <label class="form-label">JMS Date</label>
                                        <input type="date" class="form-control" id="laq_jms_date" name="laq_jms_date"
                                            value="2023-09-16">
                                    </div>
                                    <div class="col-xl-2 col-lg-4">
                                        <label class="form-label">JMS Approved By</label>
                                        <input type="text" class="form-control" id="laq_jms_office"
                                            name="laq_jms_office" placeholder="Enter JMS Approved By">
                                    </div>
                                    <div class="col-xl-2 col-lg-4">
                                        <label class="form-label">JMS Date</label>
                                        <input type="date" class="form-control" id="laq_approved_jms_date"
                                            name="laq_approved_jms_date" value="2023-09-16">
                                    </div>
                                    <div class="col-xl-6  col-lg-12">
                                        <label class="form-label">File Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="laq_upload_img"
                                                name="laq_upload_img">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="border p-3 pb-4 b-r-6">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label class="form-label">File Submitted To Collector</label>
                                                    <select class="form-select" name="laq_file_collector"
                                                        id="laq_file_collector">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_file_date"
                                                        name="laq_file_date" value="2023-09-16">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Gati Shakti Implementation Date</label>
                                                    <input type="date" class="form-control" id="laq_gati_date"
                                                        name="laq_gati_date" value="2023-09-16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="border p-3 pb-4 b-r-6">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label class="form-label">Section 10 A, B, C</label>
                                                    <select class="form-select" name="laq_sec_10" id="laq_sec_10">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_sec_date"
                                                        name="laq_sec_date" value="2023-09-16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="border p-3 pb-4 b-r-6 h-100">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label class="form-label">Section 11</label>
                                                    <select class="form-select" name="laq_sec_11" id="laq_sec_11">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_sec11_date"
                                                        name="laq_sec11_date" value="2023-09-16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="border p-3 pb-4 b-r-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="form-label">Section 19</label>
                                                    <select class="form-select" name="laq_sec_19" id="laq_sec_19">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="expen_table laq_table table-responsive">
                                                        <table class="exp_detail table-bordered">
                                                            <thead>
                                                                <th>Valuation</th>
                                                                <th>Amount</th>
                                                                <th>No.</th>
                                                                <th>Date</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" id="laq_valuation"
                                                                            name="laq_valuation" class="form-control"
                                                                            placeholder="Enter Valuation">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="laq_amt"
                                                                            name="laq_amt" class="form-control"
                                                                            placeholder="Enter Amount">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="laq_num"
                                                                            name="laq_num" class="form-control"
                                                                            placeholder="Enter No.">
                                                                    </td>
                                                                    <td>
                                                                        <input type="date" id="laq_date"
                                                                            name="laq_date" class="form-control"
                                                                            value="2023-09-16">
                                                                    </td>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <td>
                                                                        <input type="text" id="valuation"
                                                                            class="form-control"
                                                                            placeholder="Enter Valuation" value="2022">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="amt"
                                                                            class="form-control"
                                                                            placeholder="Enter Amount" value="200000">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="Num"
                                                                            class="form-control" placeholder="Enter No."
                                                                            value="200000">
                                                                    </td>
                                                                    <td>
                                                                        <input type="date" id="val_date"
                                                                            class="form-control" value="2023-09-16">
                                                                    </td>
                                                                </tr> --}}

                                                                <tr>
                                                                    <td class="text-end border" colspan="6">
                                                                        <a class="btn btn-warning add_btn" id="add_button"
                                                                            name="add_button">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="19" height="18"
                                                                                viewBox="0 0 19 18" fill="none">
                                                                                <path d="M9.5 3.75V14.25M4.25 9H14.75"
                                                                                    stroke="white" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg>
                                                                            Add
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="border p-3 pb-4 b-r-6 h-100">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label class="form-label">Section 21</label>
                                                    <select class="form-select" name="laq_sec_21" id="laq_sec_21">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_s21_file_date"
                                                        name="laq_s21_file_date" value="2023-09-16">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Approval For Valuation and Intimation to Land
                                                        Owner</label>
                                                    <input type="text" class="form-control" id="laq_approval"
                                                        name="laq_approval"
                                                        placeholder="Enter Approval For Valuation and Intimation to Land Owner">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="border p-3 pb-4 b-r-6">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label class="form-label">Section 23</label>
                                                    <select class="form-select" name="laq_sec_23" id="laq_sec_23">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_23sec_date"
                                                        name="laq_23sec_date" value="2023-09-16">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Letter No.</label>
                                                    <input type="text" class="form-control" id="laq_23letter_no"
                                                        name="laq_23letter_no" placeholder="Enter Letter No.">
                                                </div>
                                                <div class="col-xl-12 col-lg-12">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100" id="laq_23_img"
                                                            name="laq_23_img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="border p-3 pb-4 b-r-6">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <label class="form-label">Possession Details</label>
                                                    <select class="form-select" name="laq_poss_detail"
                                                        id="laq_poss_detail">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-label">Status</label>
                                                    <input type="text" class="form-control" id="laq_status"
                                                        name="laq_status" placeholder="Enter Status">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <button type="submit" class="btn btn-primary submit-btn" id="btn_save"
                                            name="btn_save">Save</button>
                                    </div>
                                </div>
                            </div>
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
