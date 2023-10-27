@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.pb_branch.edit_pb_branch_navbar')


    <body>

        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card branch-card">
                        <div class="card-header">
                            <h5 class="mb-0 font-primary text-center">DLP Period</h5>
                        </div>

                        <div class="card-body">

                            <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                @csrf
                                <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                <input type="hidden" name="step" value="dlp">

                                <div id="contect">
                                    <div class="row">
                                        <div>
                                            @foreach (explode(',', $project_master->dlp_work_completion_date) as $key => $data)
                                                @php
                                                    $dlp_timeline = explode(',', $project_master->dlp_timeline);
                                                    $dlp_completion_date = explode(',', $project_master->dlp_completion_date);
                                                    $dlp_released_date = explode(',', $project_master->dlp_released_date);
                                                    $dlp_dropdown = explode(',', $project_master->dlp_dropdown);
                                                    $dlp_amount = explode(',', $project_master->dlp_amount);
                                                    $bg = isset($dlp_dropdown[$key]) && $dlp_dropdown[$key] == 'BG' ? 'selected' : '';
                                                    $sd = isset($dlp_dropdown[$key]) && $dlp_dropdown[$key] == 'SD' ? 'selected' : '';
                                                    $fdr = isset($dlp_dropdown[$key]) && $dlp_dropdown[$key] == 'FDR' ? 'selected' : '';
                                                @endphp
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">Work Completion Date</label>
                                            <input type="date" class="form-control" id="dlp_work_completion_date"
                                                name="dlp_work_completion_date[]" value="{{ $data }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">DLP Timeline In Month</label>
                                            <input type="text" class="form-control" id="dlp_timeline"
                                                name="dlp_timeline[]" value="{{ @$dlp_timeline[$key] }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">DLP Completion Date</label>
                                            <input type="date" class="form-control" id="dlp_completion_date"
                                                name="dlp_completion_date[]" value="{{ @$dlp_completion_date[$key] }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">DLP Released Date</label>
                                            <input type="date" class="form-control" id="dlp_released_date"
                                                name="dlp_released_date[]" value="{{ @$dlp_released_date[$key] }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <label class="form-label">DLP</label>
                                            <select class="form-select" id="dlp_dropdown" name="dlp_dropdown[]"
                                                value="{{ $project_master->dlp_dropdown }}">
                                                <option value="BG"{{ $bg }}>BG</option>
                                                <option value="SD"{{ $sd }}>SD</option>
                                                <option value="FDR"{{ $fdr }}>FDR</option>
                                            </select>
                                        </div>


                                        <div class="col-lg-2">
                                            <label class="form-label">DLP Amount </label>
                                            <input type="text" class="form-control" id="dlp_amount" name="dlp_amount[]"
                                                value="{{ @$dlp_amount[$key] }}">
                                            @endforeach
                                            <td class="text-end" colspan="14">
                                                <a class="btn btn-light-warning px-3" id="add-dlp">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                            stroke="#802B81" stroke-width="1.67" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Add
                                                </a>
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary submit-btn" id="btn_save"
                                                name="sub_client">Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
                        // dataTable.draw();
                    } else {
                        toastr.error(data.msg);
                    }
                },
                error: function(response) {
                    if (response.status === 222) {
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
            const addContactButton = document.getElementById('add-dlp');
            const contactFieldsContainer = document.getElementById('contect');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
            
            
                        <div class="row mt-5">
                        <div class="col-lg-2">
                                        <input type="date" class="form-control" id="dlp_work_completion_date"
                                            name="dlp_work_completion_date[]"
                                         >
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" id="dlp_timeline" name="dlp_timeline[]"
                                           >
                                    </div>
                                    <div class="col-lg-2">
                                    
                                        <input type="date" class="form-control" id="dlp_completion_date"
                                            name="dlp_completion_date[]">
                                    </div>
                                    <div class="col-lg-2">                                    
                                        <input type="date" class="form-control" id="dlp_released_date"
                                            name="dlp_released_date[]">
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="form-select" id="dlp_dropdown" name="dlp_dropdown[]">
                                            <option value="BG"@selected($project_master->dlp_dropdown == 'BG')>BG</option>
                                            <option value="SD"@selected($project_master->dlp_dropdown == 'SD')>SD</option>
                                            <option value="FDR"@selected($project_master->dlp_dropdown == 'FDR')>FDR</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" id="dlp_amount" name="dlp_amount[]">
                                        
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
