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
                                <h5 class="mb-0 font-primary text-center">LAQ Approval</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="laqapproval">

                                    <div class="col-lg-6">
                                        <label class="form-label">Name of Village</label>
                                        <input type="text" class="form-control" id="laq_name_village"
                                            name="laq_name_village" placeholder="Enter Village"
                                            value="{{ $project_master->laq_name_village }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Submission of LAQ Proposal to Land Acquisition
                                            Office</label>
                                        <input type="text" class="form-control" id="laq_office" name="laq_office"
                                            placeholder="Enter Submission of LAQ Proposal to Land Acquisition Office"
                                            value="{{ $project_master->laq_office }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Letter No.</label>
                                        <input type="text" class="form-control" id="laq_letter_no" name="laq_letter_no"
                                            placeholder="Enter Letter No." value="{{ $project_master->laq_letter_no }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Letter Date</label>
                                        <input type="date" class="form-control" id="laq_letter_date"
                                            name="laq_letter_date" value="{{ $project_master->laq_letter_date }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="laq_letter_uplode"
                                                name="laq_letter_uplode" value="{{ $project_master->laq_letter_uplode }}">
                                            <a href="{{ asset('uplode_images/laq_approval/' . $project_master->laq_letter_uplode) }}"
                                                target="_blank">
                                                <br>Open Image in New Tab
                                            </a>
                                        </div>

                                    </div>
                                    <div class="col-xl-2 col-lg-6 mt-2">
                                        <div class="contact_list">
                                            <h6>Process 1</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-12">
                                                    <label class="form-label">File Preparation by Sub Division</label>
                                                    <select class="form-select" name="laq_file_sub" id="laq_file_sub">
                                                        <option value="Kamrej"@selected($project_master->laq_file_sub == 'Kamrej')>Kamrej</option>
                                                        <option value="Adajan"@selected($project_master->laq_file_sub == 'Adajan')>Adajan</option>
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
                                                                name="laq_dlr_no" placeholder="Enter File Submitted to DLR"
                                                                value="{{ $project_master->laq_dlr_no }}">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Date</label>
                                                            <input type="date" class="form-control" id="laq_pro_date"
                                                                name="laq_pro_date"
                                                                value="{{ $project_master->laq_pro_date }}">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label class="form-label">Challan Amount</label>
                                                            <input type="text" class="form-control" id="laq_challan_amt"
                                                                name="laq_challan_amt" placeholder="Enter Challan Amount"
                                                                value="{{ $project_master->laq_challan_amt }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-5">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Challan Date</label>
                                                            <input type="date" class="form-control"
                                                                id="laq_challan_date" name="laq_challan_date"
                                                                value="{{ $project_master->laq_challan_date }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="form-label">Payment Date</label>
                                                            <input type="date" class="form-control"
                                                                id="laq_payment_date" name="laq_payment_date"
                                                                value="{{ $project_master->laq_payment_date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4">
                                        <label class="form-label">JMS Date</label>
                                        <input type="date" class="form-control" id="laq_jms_date" name="laq_jms_date"
                                            value="{{ $project_master->laq_jms_date }}">
                                    </div>
                                    <div class="col-xl-2 col-lg-4">
                                        <label class="form-label">JMS Approved By</label>
                                        <input type="text" class="form-control" id="laq_jms_office"
                                            name="laq_jms_office" placeholder="Enter JMS Approved By"
                                            value="{{ $project_master->laq_jms_office }}">
                                    </div>
                                    <div class="col-xl-2 col-lg-4">
                                        <label class="form-label">JMS Date</label>
                                        <input type="date" class="form-control" id="laq_approved_jms_date"
                                            name="laq_approved_jms_date"
                                            value="{{ $project_master->laq_approved_jms_date }}">
                                    </div>
                                    <div class="col-xl-6  col-lg-12">
                                        <label class="form-label">File Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="laq_upload_img"
                                                name="laq_upload_img" value="{{ $project_master->laq_upload_img }}">
                                                <a href="{{ asset('uplode_images/laq_approval/' . $project_master->laq_upload_img) }}"
                                                    target="_blank">
                                                    <br>Open Image in New Tab
                                                </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="border p-3 pb-4 b-r-6">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label class="form-label">File Submitted To Collector</label>
                                                    <select class="form-select" name="laq_file_collector"
                                                        id="laq_file_collector">
                                                        <option value="Yes" @selected($project_master->laq_file_collector == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->laq_file_collector == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_file_date"
                                                        name="laq_file_date"
                                                        value="{{ $project_master->laq_file_date }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Gati Shakti Implementation Date</label>
                                                    <input type="date" class="form-control" id="laq_gati_date"
                                                        name="laq_gati_date"
                                                        value="{{ $project_master->laq_gati_date }}">
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
                                                        <option value="Yes" @selected($project_master->laq_sec_10 == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->laq_sec_10 == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_sec_date"
                                                        name="laq_sec_date" value="{{ $project_master->laq_sec_date }}">
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
                                                        <option value="Yes" @selected($project_master->laq_sec_11 == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->laq_sec_11 == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_sec11_date"
                                                        name="laq_sec11_date"
                                                        value="{{ $project_master->laq_sec11_date }}">
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
                                                        <option value="Yes" @selected($project_master->laq_sec_19 == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->laq_sec_19 == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12" id="add_Valuation">
                                                    <div class="expen_table laq_table table-responsive">
                                                        <table class="exp_detail table-bordered">
                                                            <thead>
                                                                <th>Valuation</th>
                                                                <th>Amount</th>
                                                                <th>No.</th>
                                                                <th>Date</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach (explode(',', $project_master->laq_valuation) as $key => $data)
                                                                    @php
                                                                        $laq_amt = explode(',', $project_master->laq_amt);
                                                                        $laq_num = explode(',', $project_master->laq_num);
                                                                        $laq_date = explode(',', $project_master->laq_date);

                                                                    @endphp
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" id="laq_valuation"
                                                                                name="laq_valuation[]"
                                                                                class="form-control"
                                                                                placeholder="Enter Valuation"
                                                                                value="{{ $data }}">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="laq_amt"
                                                                                name="laq_amt[]" class="form-control"
                                                                                placeholder="Enter Amount"
                                                                                value="{{ @$laq_amt[$key] }}">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="laq_num[]"
                                                                                name="laq_num[]" class="form-control"
                                                                                placeholder="Enter No."
                                                                                value="{{ @$laq_num[$key] }}">
                                                                        </td>
                                                                        <td>
                                                                            <input type="date" id="laq_date"
                                                                                name="laq_date[]" class="form-control"
                                                                                value="{{ @$laq_date[$key] }}">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td class="text-end border" colspan="6">
                                                                        <a class="btn btn-light-warning px-3"
                                                                            id="add-valuation">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                                    stroke="#802B81" stroke-width="1.67"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round" />
                                                                            </svg> Add
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
                                                        <option value="Yes" @selected($project_master->laq_sec_21 == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->laq_sec_21 == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_s21_file_date"
                                                        name="laq_s21_file_date"
                                                        value="{{ $project_master->laq_s21_file_date }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Approval For Valuation and Intimation to Land
                                                        Owner</label>
                                                    <input type="text" class="form-control" id="laq_approval"
                                                        name="laq_approval"
                                                        placeholder="Enter Approval For Valuation and Intimation to Land Owner"
                                                        value="{{ $project_master->laq_approval }}">
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
                                                        <option value="Yes" @selected($project_master->laq_sec_23 == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->laq_sec_23 == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="laq_23sec_date"
                                                        name="laq_23sec_date"
                                                        value="{{ $project_master->laq_23sec_date }}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Letter No.</label>
                                                    <input type="text" class="form-control" id="laq_23letter_no"
                                                        name="laq_23letter_no" placeholder="Enter Letter No."
                                                        value="{{ $project_master->laq_23letter_no }}">
                                                </div>
                                                <div class="col-xl-12 col-lg-12">
                                                    <label class="form-label">Letter Upload</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control w-100" id="laq_23_img"
                                                            name="laq_23_img" value="{{ $project_master->laq_23_img }}">
                                                        <a href="{{ asset('uplode_images/laq_approval/' . $project_master->laq_23_img) }}"
                                                            target="_blank">
                                                            <br>Open Image in New Tab
                                                        </a>
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
                                                        <option value="Yes" @selected($project_master->laq_poss_detail == 'Yes')>Yes
                                                        </option>
                                                        <option value="No"@selected($project_master->laq_poss_detail == 'No')>No
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label class="form-label">Status</label>
                                                    <input type="text" class="form-control" id="laq_status"
                                                        name="laq_status" placeholder="Enter Status"
                                                        value="{{ $project_master->laq_status }}">
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
                        // dataTable.draw();
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

        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-valuation');
            const contactFieldsContainer = document.getElementById('add_Valuation');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
               
                <div class="col-lg-12">
                                                    <div class="expen_table laq_table table-responsive">
                                                        <table class="exp_detail table-bordered">
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" id="laq_valuation"
                                                                            name="laq_valuation[]" class="form-control"
                                                                            placeholder="Enter Valuation"
                                                                            >
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="laq_amt"
                                                                            name="laq_amt[]" class="form-control"
                                                                            placeholder="Enter Amount"
                                                                            >
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="laq_num[]"
                                                                            name="laq_num[]" class="form-control"
                                                                            placeholder="Enter No."
                                                                            >
                                                                    </td>
                                                                    <td>
                                                                        <input type="date" id="laq_date"
                                                                            name="laq_date[]" class="form-control"
                                                                           >
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            
                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

                // Add an event listener to the "Remove" button
                const removeButton = newContactField.querySelector('.remove-contact');
                removeButton.addEventListener('click', function() {
                    contactFieldsContainer.removeChild(
                        newContactField); // Remove the field when "Remove" is clicked
                    contactCount--; // Decrement contact count
                });
                contactFieldsContainer.appendChild(newContactField);
            });
        });
    </script>
@endsection
