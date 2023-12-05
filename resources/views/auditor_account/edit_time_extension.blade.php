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
                                <h5 class="mb-0 font-primary text-center">Time Limit Extension</h5>
                            </div>

                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="time_extension">

                                    <div class="col-lg-12 mt-2" id="add_tle_proposal">
                                        <div class="contact_list">
                                            <h6>Proposal Submission</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-12">
                                                    @foreach (explode(',', $project_master->tle_proposal_letter_no) as $key => $data)
                                                        @php
                                                            $tle_proposal_letter_date = explode(',', $project_master->tle_proposal_letter_date);
                                                            $tle_proposal_extension_date = explode(',', $project_master->tle_proposal_extension_date);
                                                            $tle_proposal_letter_image = explode(',', $project_master->tle_proposal_letter_image);
                                                        @endphp
                                                        <div class="row mt-2">
                                                            <div class="col-lg-3">
                                                                <label for="inputtitle1" class="form-label">Letter
                                                                    No.</label>
                                                                <input class="form-control" type="text"
                                                                    id="tle_proposal_letter_no[]"
                                                                    name="tle_proposal_letter_no[]"
                                                                    placeholder="Enter Letter No."
                                                                    value="{{ $data }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Letter Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="tle_proposal_letter_date[]"
                                                                    name="tle_proposal_letter_date[]"
                                                                    value="{{ @$tle_proposal_letter_date[$key] }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Extension Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="tle_proposal_extension_date[]"
                                                                    name="tle_proposal_extension_date[]"
                                                                    value="{{ @$tle_proposal_extension_date[$key] }}">
                                                            </div>
                                                            <div class="col-lg-3 position-relative">
                                                                <label class="form-label">Letter Upload</label>
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control w-100"
                                                                        id="tle_proposal_letter_image[]"
                                                                        name="tle_proposal_letter_image[]"
                                                                        value="{{ @$tle_proposal_letter_image[$key] }}">
                                                                    @isset($tle_proposal_letter_image[$key])
                                                                        <a href="{{ asset('uplode_images/time_limit_extension/' . $tle_proposal_letter_image[$key]) }}"
                                                                            target="_blank">
                                                                            <br>Open Image in New Tab
                                                                        </a>
                                                                    @endisset

                                                                </div>
                                                                <button type="button" class="btn-close remove-proposal"
                                                                    style="position: absolute;right: 0px;top: 10px;"
                                                                    aria-label="Close"></button>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <td class="text-end" colspan="14">
                                                <a class="btn btn-light-warning px-3 border" id="add-Extension">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                            stroke="#802B81" stroke-width="1.67" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Add
                                                </a>
                                            </td>
                                        </div>
                                    </div>



                                    <div class="col-lg-12 mt-2" id="approval_details">
                                        <div class="contact_list">
                                            <h6>Approval Details</h6>
                                            <div class="row p-0">
                                                <div class="col-lg-12">
                                                    @foreach (explode(',', $project_master->tle_approval_letter_no) as $key => $data)
                                                        @php
                                                            $tle_approval_letter_date = explode(',', $project_master->tle_approval_letter_date);
                                                            $tle_approval_extension_date = explode(',', $project_master->tle_approval_extension_date);
                                                            $tle_approval_letter_image = explode(',', $project_master->tle_approval_letter_image);
                                                        @endphp
                                                        <div class="row mt-2">
                                                            <div class="col-lg-3">
                                                                <label for="inputtitle1" class="form-label">Approval
                                                                    Detail</label>
                                                                <input class="form-control" type="text"
                                                                    id="tle_approval_letter_no[]"
                                                                    name="tle_approval_letter_no[]"
                                                                    placeholder="Enter Letter No."
                                                                    value="{{ $data }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Letter Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="tle_approval_letter_date[]"
                                                                    name="tle_approval_letter_date[]"
                                                                    value="{{ @$tle_approval_letter_date[$key] }}">
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <label class="form-label">Extension Date</label>
                                                                <input type="date" class="form-control"
                                                                    id="tle_approval_extension_date[]"
                                                                    name="tle_approval_extension_date[]"
                                                                    value="{{ @$tle_approval_extension_date[$key] }}">
                                                            </div>
                                                            <div class="col-lg-3 position-relative">
                                                                <label class="form-label">Letter Upload</label>
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control w-100"
                                                                        id="tle_approval_letter_image[]"
                                                                        name="tle_approval_letter_image[]"
                                                                        value="{{ @$tle_approval_letter_image[$key] }}">
                                                                    @isset($tle_approval_letter_image[$key])
                                                                        <a href="{{ asset('uplode_images/time_limit_extension/' . $tle_approval_letter_image[$key]) }}"
                                                                            target="_blank">
                                                                            <br>Open Image in New Tab
                                                                        </a>
                                                                    @endisset

                                                                </div>
                                                                <button type="button" class="btn-close remove-proposal"
                                                                    style="position: absolute;right: 0px;top: 10px;"
                                                                    aria-label="Close"></button>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <td class="text-end" colspan="14">
                                                <a class="btn btn-light-warning px-3 border" id="add-approval">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                            stroke="#802B81" stroke-width="1.67" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Add
                                                </a>
                                            </td>
                                        </div>
                                    </div>

                                    <div id="status">
                                        @foreach (explode(',', $project_master->tle_status) as $key => $data)
                                            <div class="row col-lg-12 position-relative">
                                                <label class="form-label">Status</label>
                                                <textarea rows="3" class="form-control" id="tle_status[]" name="tle_status[]" placeholder="Enter Status">{{ $data }}</textarea>
                                                <button type="button" class="btn-close remove-proposal" style="position: absolute;right: 0px;top: 10px;" aria-label="Close"></button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <td class="text-end">
                                        <a class="btn btn-light-warning px-3 border" style="width: 90px;margin-left:10px;"
                                            id="add-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337" stroke="#802B81"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> Add
                                        </a>
                                    </td>
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
                            toastr.success("Time Limit Extension added successfully.");
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
            const addContactButton = document.getElementById('add-Extension');
            const contactFieldsContainer = document.getElementById('add_tle_proposal');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.style.position = 'relative';
                newContactField.innerHTML =
                    `
                
                                                  
                                                        <div class="row mt-2">
                                                            <div class="col-lg-3">
                                                               
                                                                <input class="form-control" type="text"
                                                                    id="tle_proposal_letter_no[]"
                                                                    name="tle_proposal_letter_no[]"
                                                                    placeholder="Enter Letter No."
                                                                   >
                                                            </div>
                                                            <div class="col-lg-3">
                                                              
                                                                <input type="date" class="form-control"
                                                                    id="tle_proposal_letter_date[]"
                                                                    name="tle_proposal_letter_date[]"
                                                                  >
                                                            </div>
                                                            <div class="col-lg-3">
                                                              
                                                                <input type="date" class="form-control"
                                                                    id="tle_proposal_extension_date[]"
                                                                    name="tle_proposal_extension_date[]"
                                                                   >
                                                            </div>
                                                            <div class="col-lg-3">
                                                              
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control w-100"
                                                                        id="tle_proposal_letter_image[]"
                                                                        name="tle_proposal_letter_image[]"
                                                                       >
                                                                   

                                                                </div>
                                                            </div>

                                                  
                        <button type="button" class="btn-close remove-contact" style="position: absolute;right: -25px;top: 6px;"  aria-label="Close"></button>`;

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

        //approval detils
        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-approval');
            const contactFieldsContainer = document.getElementById('approval_details');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.style.marginTop = '5px';

                newContactField.style.position = 'relative';
                newContactField.innerHTML =
                    `
                                            <div class="row p-0">
                                                <div class="col-lg-8">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <input class="form-control" type="text"
                                                                id="tle_approval_letter_no[]"
                                                                name="tle_approval_letter_no[]"
                                                                placeholder="Enter Letter No."
                                                                >
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="date" class="form-control"
                                                                id="tle_approval_letter_date[]"
                                                                name="tle_approval_letter_date[]"
                                                                >
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="date" class="form-control"
                                                                id="tle_approval_extension_date[]"
                                                                name="tle_approval_extension_date[]"
                                                                >

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                        <div class="input-group">
                                                        <input type="file" class="form-control w-100"
                                                            id="tle_approval_letter_image[]"
                                                            name="tle_approval_letter_image[]">
                                                    </div>
                                                </div>
                                            </div>
                                    
 
                        <button type="button" class="btn-close remove-contact" style="position: absolute;right: -23px;top: 7px;" aria-label="Close"></button>`;

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

        //status
        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-status');
            const contactFieldsContainer = document.getElementById('status');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('div');
                newContactField.classList.add('col-lg-12', 'row');
                newContactField.style.marginTop = '20px'
                newContactField.style.position = 'relative';
                newContactField.innerHTML =
                    `<textarea rows="3" class="form-control" id="tle_status[]" name="tle_status[]" placeholder="Enter Status"></textarea>
                                
                        <button type="button" class="btn-close remove-contact" style="position: absolute;right: 0px;top: -20px;" aria-label="Close"></button>`;

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

        $(document).on("click", '.remove-proposal', function() {
            $(this).closest('.row').remove();
        });
    </script>
@endsection
