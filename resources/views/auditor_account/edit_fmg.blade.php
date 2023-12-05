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
                                <h5 class="mb-0 font-primary text-center">FMG</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="fmg">

                                    <div class="col-lg-3">
                                        <label class="form-label">Work Completion Date</label>
                                        <input type="date" class="form-control" id="fmg_completion_date"
                                            name="fmg_completion_date" value="{{ $project_master->fmg_completion_date }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">FMG Time Limit In Year</label>
                                        <input type="text" class="form-control" id="fmg_time" name="fmg_time"
                                            placeholder="Enter FMG Time Limit In Year"
                                            value="{{ $project_master->fmg_time }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">FMG Complete Date</label>
                                        <input type="date" class="form-control" id="fmg_date" name="fmg_date"
                                            value="{{ $project_master->fmg_date }}">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Add FMG Release Date</label>
                                        <input type="date" class="form-control" id="add_fmg_date" name="add_fmg_date"
                                            value="{{ $project_master->add_fmg_date }}">
                                    </div>
                                    <div class="panel-group utility-shifting-tabel pt-0" id="Agency_Entry">

                                        <div class="table-responsive" id="display_data">
                                            <h5 class="proposal-sent-heading">Fmg Entry</h5>
                                            <table class="table no-margin class_tr_put utility-shifting-tabel-data">
                                                <thead>
                                                    <tr>
                                                        <th>Dropdown</th>
                                                        <th>Amount</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach (explode(',', $project_master->fmg_entry_amount) as $key => $data)
                                                        @php

                                                            $fmg_dropdown = explode(',', $project_master->fmg_dropdown);

                                                            $bg = isset($fmg_dropdown[$key]) && $fmg_dropdown[$key] == 'BG' ? 'selected' : '';
                                                            $sd = isset($fmg_dropdown[$key]) && $fmg_dropdown[$key] == 'SD' ? 'selected' : '';
                                                            $fdr = isset($fmg_dropdown[$key]) && $fmg_dropdown[$key] == 'FDR' ? 'selected' : '';

                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                <select class="form-select" 
                                                                    name="fmg_dropdown[]">
                                                                    <option value="BG"{{ $bg }}>BG
                                                                    </option>
                                                                    <option value="SD"{{ $sd }}>SD</option>
                                                                    <option value="FDR"{{ $fdr }}>FDR</option>
                                                                </select>
                                                            </td>
                                                            <td class="position-relative">
                                                                <input type="text" name="fmg_entry_amount[]"
                                                                    class="form-control" 
                                                                    value="{{ $data }}">
                                                                    <button type="button" class="btn-close remove-fmg" style="position: absolute;top: -5px;right: -3px;" aria-label="Close"></button>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td class="text-end" colspan="14">
                                                            <a class="btn btn-light-warning px-3" id="add-agency">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 20 20" fill="none">
                                                                    <path
                                                                        d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                        stroke="#802B81" stroke-width="1.67"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg> Add
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                            toastr.success("FMG added successfully.");
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
            const addContactButton = document.getElementById('add-agency');
            const contactFieldsContainer = document.getElementById('Agency_Entry');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.style.position="relative";
                newContactField.innerHTML = `
               
                <div class="panel-group utility-shifting-tabel pt-0" id="Agency_Entry">
                                        <div class="table-responsive" id="display_data">
                                          
                                            <table
                                                class="table no-margin class_tr_put utility-shifting-tabel-data">
                                               
                                                <tbody>
                                                  
                                                        <tr>
                                                            <td>
                                                                <select class="form-select"
                                                                    name="fmg_dropdown[]">
                                                                    <option selected value="BG">BG
                                                                    </option>
                                                                    <option value="SD">SD</option>
                                                                    <option value="FDR">FDR</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="fmg_entry_amount[]"
                                                                    class="form-control">
                                                            </td>
                                                           
                                                        </tr>
                                       
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                        <button type="button" class="btn-close remove-contact" style="position: absolute;top: -5px;right: -5px;" aria-label="Close"></button>`;

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

        $(document).on("click",'.remove-fmg',function(){
            $(this).closest('tr').remove();
        });
    </script>
@endsection
