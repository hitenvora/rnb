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
                                <h5 class="mb-0 font-primary text-center">Budgetary Detail</h5>
                            </div>
                            <div class="card-body auditor_card">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="bugedtry_details">


                                    <div class="col-lg-12">
                                        <label class="form-label">Item First Introduce in Year & Budget Provision</label>
                                        <input type="text" class="form-control" id="bd_item_first" name="bd_item_first"
                                            placeholder="Enter Item First Introduce in Year & Budget Provision"
                                            value="{{ $project_master->bd_item_first }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Detail Budget Head</label>
                                        <input type="text" class="form-control" id="bd_detail_head" name="bd_detail_head"
                                            placeholder="Enter Detail Budget Head"
                                            value="{{ $project_master->bd_detail_head }}">
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
                                        <table class="product_sub_menu table-bordered mt-3" id="contect">
                                            <thead>
                                                <th>Budget Previous Year</th>
                                                <th>Amount</th>
                                            </thead>
                                            <tbody>
                                                @foreach (explode(',', $project_master->budget_previous_year) as $key => $date)
                                                    @php
                                                        $budget_previous_amount = explode(',', $project_master->budget_previous_amount);

                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="budget_previous_year[]" id="budget_previous_year"
                                                                value="{{ $date }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="budget_previous_amount[]"
                                                                id="budget_previous_amount[]"
                                                                value="{{ @$budget_previous_amount[$key] }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="text-end" colspan="2">
                                                        <a class="btn btn-light-warning px-3" id="add-contact">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                                    stroke="#802B81" stroke-width="1.67"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg> Add
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
                            toastr.success("Budegetary Detail added successfully.");
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
                                                        <input type="text" class="form-control" name="budget_previous_year[]" id="budget_previous_year">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="budget_previous_amount[]" id="budget_previous_amount[]">
                                                    </td>

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
