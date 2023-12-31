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
                                <h5 class="mb-0 font-primary text-center">DTP Approval Detail</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id">
                                    

                                    <div class="col-lg-4">
                                        <label for="inputtitle1" class="form-label">Submitted To</label>
                                        <input class="form-control" type="text" id="dtp_sub_to" name="dtp_sub_to"
                                            placeholder="To">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="inputtitle1" class="form-label">Submitted Date</label>
                                        <input class="form-control" type="date" id="dtp_submit_date"
                                            name="dtp_submit_date" placeholder="Enter Submitted Date">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="inputtitle1" class="form-label">Letter No.</label>
                                        <input class="form-control" type="text" id="dtp_submit_letter_no"
                                            name="dtp_submit_letter_no" placeholder="Enter Letter No.">
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="contact_list">
                                            <h6>DTP Approval</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-3">
                                                    <label class="form-label">Authority</label>
                                                    <select class="form-select" name="dtp_authority" id="dtp_authority">
                                                        <option value="Executive Engineer">Executive Engineer</option>
                                                        <option value="Superintendent Engineer">Superintendent Engineer
                                                        </option>
                                                        <option value="Chief Engineer">Chief Engineer</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="dtp_date"
                                                        name="dtp_date" value="2023-09-13">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Letter No.</label>
                                                    <input class="form-control" type="text" id="dtp_letter_no"
                                                        name="dtp_letter_no" placeholder="Enter Letter No.">
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="inputtitle1" class="form-label">Amount</label>
                                                    <input class="form-control" type="text" id="dtp_amt" name="dtp_amt"
                                                        placeholder="Enter Amount">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12" id="contect">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="expen_table dtp_table table-responsive">
                                                    <table class="exp_detail table-bordered">
                                                        <thead>
                                                            <th>Follow Up date</th>
                                                            <th>Status</th>
                                                            <th>Remark</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="date" id="dtp_f_date[]"
                                                                        name="dtp_f_date[]" class="form-control"
                                                                        placeholder="Enter Date">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="dtp_f_status[]"
                                                                        name="dtp_f_status[]" class="form-control"
                                                                        placeholder="Enter Status">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="dtp_f_remark[]"
                                                                        name="dtp_f_remark[]" class="form-control"
                                                                        placeholder="Enter Remark">
                                                                </td>
                                                            </tr>
                                                            {{-- <tr>
                                                                <td>
                                                                    <input type="date" id="f_date"
                                                                        class="form-control" placeholder="Enter Date">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="f_status"
                                                                        class="form-control" placeholder="Enter Status">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="f_remark"
                                                                        class="form-control" placeholder="Enter Remark">
                                                                </td>
                                                            </tr> --}}

                                                            <tr>
                                                                <td class="text-end border" colspan="6">
                                                                    <a class="btn btn-light-warning px-3" id="add-contact">
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

        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-contact');
            const contactFieldsContainer = document.getElementById('contect');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
                    <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="expen_table dtp_table table-responsive">
                                                        <table class="exp_detail table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="date" id="dtp_f_date[]"
                                                                            name="dtp_f_date[]" class="form-control"
                                                                            
                                                                            placeholder="Enter Date">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="dtp_f_status[]"
                                                                            name="dtp_f_status[]" class="form-control"
                                                                            placeholder="Enter Status">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="dtp_f_remark[]"
                                                                            name="dtp_f_remark[]" class="form-control"
                                                                            placeholder="Enter Remark">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
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
