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
                                    <h5 class="mb-0 font-primary text-center">Block Estimate Submitted Detail</h5>
                                </div>
                                <div class="card-body">
                                    <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                        @csrf
                                        <input type="hidden" name="master_id" id="master_id"
                                            value="{{ $project_master->id }}">
                                        <input type="hidden" name="step" value="block">
                                        {{-- @foreach ($block_estimate_show as $item)
                                        @endforeach --}}
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter No.</label>
                                            <input type="text" class="form-control" id="bes_letter_no"
                                                name="bes_letter_no" placeholder="Enter Letter No."
                                                value="{{ $project_master->bes_letter_no }}">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="bes_letter_date"
                                                name="bes_letter_date" value="{{ $project_master->bes_letter_date }}">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="bes_amount" name="bes_amount"
                                                value="{{ $project_master->bes_amount }}">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Upload</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control w-100" id="bes_letter_upload"
                                                    name="bes_letter_upload"
                                                    value="{{ $project_master->bes_letter_upload }}">
                                                <a href="{{ asset('uplode_images/block_estimate_submitted_detail/' . $project_master->bes_letter_upload) }}"
                                                    target="_blank">
                                                    <br>Open Image in New Tab
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="form-label">Provision in Estimate</label>
                                            <textarea rows="9" class="form-control" id="bes_provision_in_estimate" name="bes_provision_in_estimate"
                                                placeholder="Enter Provision in Estimate">{{ $project_master->bes_provision_in_estimate }}</textarea>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <label class="form-label">Submitted Letter No.</label>
                                            <input type="text" class="form-control" id="bes_submit_letter"
                                                name="bes_submit_letter" placeholder="Enter Submitted Letter No."
                                                value="{{ $project_master->bes_submit_letter }}">
                                        </div>
                                        <div class="col-xl-3  col-lg-6">
                                            <label class="form-label">Submission Office Date</label>
                                            <input type="date" class="form-control" id="bes_submit_office_date"
                                                name="bes_submit_office_date"
                                                value="{{ $project_master->bes_submit_office_date }}">
                                        </div>
                                        <div class="col-xl-3  col-lg-6">
                                            <label class="form-label">Letter Upload</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control w-100"
                                                    id="bes_office_letter_upload" name="bes_office_letter_upload"
                                                    value="{{ $project_master->bes_office_letter_upload }}">
                                                <a href="{{ asset('uplode_images/block_estimate_submitted_detail/' . $project_master->bes_office_letter_upload) }}"
                                                    target="_blank">
                                                    <br>Open Image in New Tab
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-3  col-lg-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="form-label">Submitted_To</label>
                                                    <select class="form-select" id="division_id " name="division_id">
                                                        <option value="Government"@selected($project_master->division_id == 'Government')>Government
                                                        </option>
                                                        <option value="Circle"@selected($project_master->division_id == 'Circle')>Circle</option>
                                                        <option value="Divison"@selected($project_master->division_id == 'Divison')>Divison</option>

                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="expen_table dtp_table table-responsive">
                                                        <table class="exp_detail table-bordered">
                                                            <thead>
                                                                <th>Follow Up date</th>
                                                                <th>Status</th>
                                                                <th>Remark</th>
                                                            </thead>
                                                            <tbody id="contect">
                                                                @foreach (explode(',', $project_master->bes_follow_up_date) as $key => $date)
                                                                    @php
                                                                        $bes_status = explode(',', $project_master->bes_status);
                                                                        $bes_remark = explode(',', $project_master->bes_remark);
                                                                    @endphp
                                                                    <tr style="position: relative;">
                                                                        <td>
                                                                            <input type="date"
                                                                                id="bes_follow_up_date[]"
                                                                                name="bes_follow_up_date[]"
                                                                                class="form-control"
                                                                                value="{{ $date }}"
                                                                                placeholder="Enter Date">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="bes_status"
                                                                                name="bes_status[]" class="form-control"
                                                                                placeholder="Enter Remark"
                                                                                value="{{ @$bes_status[$key] }}">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="bes_remark"
                                                                                name="bes_remark[]" class="form-control"
                                                                                placeholder="Enter Remark"
                                                                                value="{{ @$bes_remark[$key] }}">
                                                                            <button type="button"
                                                                                class="btn-close remove-contact-static"
                                                                                style="position: absolute;right: 7px;top: -2px;"
                                                                                aria-label="Close"></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach


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
                const addContactButton = document.getElementById('add-contact');
                const contactFieldsContainer = document.getElementById('contect');
                let contactCount = 0; // Keep track of added contacts

                addContactButton.addEventListener('click', function() {
                    contactCount++; // Increment contact count
                    // Create a new input field (you can customize this as needed)
                    const newContactField = document.createElement('tr');
                    newContactField.innerHTML = `
                    <td>
                                                                            <input type="date"
                                                                                id="bes_follow_up_date[]"
                                                                                name="bes_follow_up_date[]"
                                                                                class="form-control"
                                                                                value=""
                                                                                placeholder="Enter Date">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="bes_status"
                                                                                name="bes_status[]" class="form-control"
                                                                                placeholder="Enter Remark"
                                                                        
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" id="bes_remark"
                                                                                name="bes_remark[]" class="form-control"
                                                                                placeholder="Enter Remark"
                                                                                >
                                                                        </td>
                                                             

                                                         
                                                  
                                               
                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;


                    // Add an event listener to the "Remove" button
                    const removeButton = newContactField.querySelector('.remove-contact');
                    removeButton
                        .addEventListener('click', function() {
                            contactFieldsContainer.removeChild(
                                newContactField); // Remove the field when "Remove" is clicked
                            contactCount--; // Decrement contact count
                        });
                    contactFieldsContainer.appendChild(newContactField);
                });
            });
            $(document).on('click', '.remove-contact-static', function(e) {
                $(this).closest("tr").remove();
            });
        </script>
    @endsection
