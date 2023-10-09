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
                                    <h5 class="mb-0 font-primary text-center">Block Estimate Submitted Detail</h5>
                                </div>
                                <div class="card-body">
                                    <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                        @csrf
                                        <input type="hidden" name="master_id" id="master_id">
                                        {{-- @foreach ($block_estimate_show as $item)
                                        @endforeach --}}
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter No.</label>
                                            <input type="text" class="form-control" id="bes_letter_no"
                                                name="bes_letter_no" placeholder="Enter Letter No." value="">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="bes_letter_date"
                                                name="bes_letter_date" value="">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="bes_amount" name="bes_amount"
                                                value="">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Upload</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control w-100" id="bes_letter_upload"
                                                    name="bes_letter_upload" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Provision in Estimate</label>
                                            <textarea rows="9" class="form-control" id="bes_provision_in_estimate" name="bes_provision_in_estimate"
                                                placeholder="Enter Provision in Estimate"></textarea>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <label class="form-label">Submitted Letter No.</label>
                                            <input type="text" class="form-control" id="bes_submit_letter"
                                                name="bes_submit_letter" placeholder="Enter Submitted Letter No.">
                                        </div>
                                        <div class="col-xl-3  col-lg-6">
                                            <label class="form-label">Submission Office Date</label>
                                            <input type="date" class="form-control" id="bes_submit_office_date"
                                                name="bes_submit_office_date" value="">
                                        </div>
                                        <div class="col-xl-3  col-lg-6">
                                            <label class="form-label">Letter Upload</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control w-100"
                                                    id="bes_office_letter_upload" name="bes_office_letter_upload"
                                                    value="bes_office_letter_upload">
                                            </div>
                                        </div>
                                        <div class="col-xl-3  col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label class="form-label">Division</label>
                                                    <select class="form-select" id="division_id" name="division_id">
                                                        @foreach ($division_name as $value)
                                                            <option selected value="{{ $value['id'] }}">
                                                                {{ $value['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="form-label">Subdivision</label>
                                                    <select class="form-select" id="sub_division_id" name="sub_division_id">
                                                        @foreach ($sub_division_name as $value)
                                                            <option selected value="{{ $value['id'] }}">
                                                                {{ $value['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                                                        <input type="date" id="bes_follow_up_date[]"
                                                                            name="bes_follow_up_date[]" class="form-control"
                                                                            placeholder="Enter Date">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="bes_status[]"
                                                                            name="bes_status[]" class="form-control"
                                                                            placeholder="Enter Status">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="bes_remark[]"
                                                                            name="bes_remark[]" class="form-control"
                                                                            placeholder="Enter Remark">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    {{-- <td>
                                                                        <input type="date" id="f_date"
                                                                            class="form-control" placeholder="Enter Date">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="f_status"
                                                                            class="form-control"
                                                                            placeholder="Enter Status">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="f_remark"
                                                                            class="form-control"
                                                                            placeholder="Enter Remark">
                                                                    </td> --}}
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-end border" colspan="6">
                                                                        <a class="btn btn-light-warning px-3"
                                                                            id="add-contact">
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
                                toastr.success("Block Estimate added successfully.");
                            } else {
                                toastr.success("Block Estimate updated successfully.");
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
                                                                        <input type="date" id="bes_follow_up_date[]"
                                                                            name="bes_follow_up_date[]" class="form-control"
                                                                            
                                                                            placeholder="Enter Date">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="bes_status[]"
                                                                            name="bes_status[]" class="form-control"
                                                                            placeholder="Enter Status">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="bes_remark[]"
                                                                            name="bes_remark[]" class="form-control"
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
