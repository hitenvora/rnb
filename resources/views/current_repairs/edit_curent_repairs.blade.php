@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.current_reapring.edit_current_reapring_navbar')

    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card auditor_account">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Current Reapirs</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_form" v>
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $cr_update->id }}">
                                    <input type="hidden" name="step" value="cr">

                                    <div class="col-lg-6">
                                        <label class="form-label">Name of Road</label>
                                        <div class="expen_table laq_table table-responsive">
                                            <table class="exp_detail table-bordered" id="add_Valuation">
                                                <thead>
                                                    <th>Name</th>
                                                </thead>
                                                <tbody>
                                                    @foreach (explode(',', $cr_update->cr_road_name) as $key => $data)
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="cr_road_name"
                                                                    name="cr_road_name[]" class="form-control"
                                                                    placeholder="Enter Road Name"
                                                                    value="{{ $data }}">
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                 
                                                    <tr>
                                                        <td class="text-end border" colspan="6">
                                                            <a class="btn btn-light-warning px-3" id="add-valuation">
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
                                    <div class="col-lg-6">
                                        <label class="form-label">Subdivision Name</label>

                                        <select class="form-select" name="cr_division_id" id="cr_division_id">
                                            <option value="">Select Division Name</option>
                                            @foreach ($division_name as $value)
                                                <option value="{{ $value['id'] }}"
                                                {{ $cr_update->cr_division_id == $value['id'] ? 'selected' : '' }}>
                                                    {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                        <br><br>
                                        <label class="form-label">Name Of Section</label>
                                        <input type="text" class="form-control" id="cr_name_of_section"
                                            name="cr_name_of_section" value="">

                                    </div>
                                    <div class="col-lg-3" id="add-date">
                                        <label class="form-label">Chainage(From)</label>
                                        <input type="text" class="form-control" id="cr_start_date" name="cr_start_date[]"
                                            placeholder="Chainage(From)">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Chainage(To)</label>
                                        <input type="text" class="form-control" id="cr_end_date" name="cr_end_date[]"
                                            placeholder="Chainage(To)">


                                        <tr>
                                            <td class="text-end border" colspan="10">
                                                <a class="btn btn-light-warning px-3" id="add_date"
                                                    style="margin-left: 85%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                            stroke="#802B81" stroke-width="1.67" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Add
                                                </a>
                                            </td>
                                        </tr>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">Type OF Work</label>
                                        <select class="form-select" name="cr_type_of_work_id" id="cr_type_of_work_id">
                                            <option value="">Select Section Name</option>
                                            @foreach ($type_work as $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <button type="submit" class="btn btn-primary submit-btn" id="btn_save"
                                            name="btn_save">Save</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    </form>
    </body>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-valuation');
            const contactFieldsContainer = document.getElementById('add_Valuation');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
               
                <table class="exp_detail table-bordered">
                                                
                                                <tbody>
                                                    
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="cr_road_name"
                                                                    name="cr_road_name[]"
                                                                    class="form-control"
                                                                    placeholder="Enter Road Name"
                                                                    value="">
                                                            </td>
                                                          
                                                        </tr>
                                                  
                                                </tbody>
                                            </table>
                                            
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

        //date multiple
        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add_date');
            const contactFieldsContainer = document.getElementById('add-date');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count

                // Create a new input field (you can customize this as needed)
                const newContactField = document.createElement('p');
                newContactField.innerHTML = `
                <div class="container">
  <div class="row">
    <div class="col">
        <div class="col-lg-12">
                                        <input type="text" class="form-control" id="cr_start_date" name="cr_start_date[]"
                                      placeholder="Chainage(From)">
                                        </div>
    </div>
    <div class="col">
    
        <div class="col-lg-12">
                                        <input type="text" class="form-control" id="cr_end_date" name="cr_end_date[]"
                                        placeholder="Chainage(To)">
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
    <script>
        var token = "{{ csrf_token() }}";


        $('#master_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('curent_reaparing_insert') }}",
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
                        // window.location.href = "{{ route('curent_reaparing_master') }}";
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

        $('#name_of_scheme_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');
            var selectedID = $("#selectedID").data("id");

            $.ajax({
                type: 'POST',
                url: "{{ route('name_of_schema_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#name_of_scheme_id').modal('hide');
                        if ($('#name_of_scheme_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }
                        window.location.href = "{{ url('edit-basic') }}/" + selectedID;

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







        $('#add_name_of_project_id').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');
            var selectedID = $("#selectedID").data("id");

            $.ajax({
                type: 'POST',
                url: "{{ route('name_of_project_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#add_name_of_project_id').modal('hide');
                        if ($('#add_name_of_project_id').val() == '') {
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
                        }

                        window.location.href = "{{ url('edit-basic') }}/" + selectedID;
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
