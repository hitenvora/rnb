@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.current_reapring.current_reapring_navbar')

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
                                    <input type="hidden" name="master_id" id="master_id" value="">
                                    <input type="hidden" name="step" value="cr">
                                    <div class="col-lg-3">
                                        <label class="form-label">Subdivision Name</label>
                                        <select class="form-select" name="cr_division_id" id="cr_division_id">
                                            <option value="">Select Division Name</option>
                                            @foreach ($division_name as $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="col-lg-3">
                                        <label class="form-label">Name of Road</label>

                                        <select class="form-select" name="cr_road_name" id="cr_road_name">
                                            <option value="">Select Road Name</option>

                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label class="form-label">Chainage(From)</label>
                                        <select class="form-select" name="cr_start_date" id="cr_start_date">
                                            <option value=""></option>



                                        </select>

                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Chainage(To)</label>
                                        <select class="form-select" name="cr_end_date" id="cr_end_date">

                                            <option value=""></option>

                                        </select>

                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Total Length</label>
                                        <select class="form-select" name="total_lentch" id="total_lentch">

                                            <option value=""></option>

                                        </select>

                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" name="cr_catogry" id="cr_catogry">
                                            <option value=""></option>

                                        </select>

                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Name Of Section</label>
                                        <input type="text" class="form-control" id="cr_name_of_section"
                                            name="cr_name_of_section" value="">
                                    </div>

                                    <div class="col-lg-3">
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
        //         document.addEventListener('DOMContentLoaded', function() {
        //             const addContactButton = document.getElementById('add-valuation');
        //             const contactFieldsContainer = document.getElementById('add_Valuation');
        //             let contactCount = 0; // Keep track of added contacts

        //             addContactButton.addEventListener('click', function() {
        //                 contactCount++; // Increment contact count

        //                 // Create a new input field (you can customize this as needed)
        //                 const newContactField = document.createElement('p');
        //                 newContactField.innerHTML = `

    //                 <table class="exp_detail table-bordered">

    //                                                 <tbody>

    //                                                         <tr>
    //                                                             <td>
    //                                                                 <input type="text" id="cr_road_name"
    //                                                                     name="cr_road_name[]"
    //                                                                     class="form-control"
    //                                                                     placeholder="Enter Road Name"
    //                                                                     value="">
    //                                                             </td>

    //                                                         </tr>

    //                                                 </tbody>
    //                                             </table>

    //                         <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

        //                 // Add an event listener to the "Remove" button
        //                 const removeButton = newContactField.querySelector('.remove-contact');
        //                 removeButton.addEventListener('click', function() {
        //                     contactFieldsContainer.removeChild(
        //                         newContactField); // Remove the field when "Remove" is clicked
        //                     contactCount--; // Decrement contact count
        //                 });
        //                 contactFieldsContainer.appendChild(newContactField);
        //             });
        //         });

        //         //date multiple
        //         document.addEventListener('DOMContentLoaded', function() {
        //             const addContactButton = document.getElementById('add_date');
        //             const contactFieldsContainer = document.getElementById('add-date');
        //             let contactCount = 0; // Keep track of added contacts

        //             addContactButton.addEventListener('click', function() {
        //                 contactCount++; // Increment contact count

        //                 // Create a new input field (you can customize this as needed)
        //                 const newContactField = document.createElement('div');
        //                 newContactField.innerHTML = `
    //                 <div class="container">
    //   <div class="row">
    //     <div class="col">
    //         <input type="date" class="form-control" id="cr_start_date"
    //                                                 name="cr_start_date[]" value="">

    //     </div>
    //     <div class="col">
    //         <input type="date" class="form-control" id="cr_end_date[]" name="cr_end_date"
    //                                                 value="">
    //     </div>
    // </div>

    // </div>



    //                         <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

        //                 // Add an event listener to the "Remove" button
        //                 const removeButton = newContactField.querySelector('.remove-contact');
        //                 removeButton.addEventListener('click', function() {
        //                     contactFieldsContainer.removeChild(
        //                         newContactField); // Remove the field when "Remove" is clicked
        //                     contactCount--; // Decrement contact count
        //                 });
        //                 contactFieldsContainer.appendChild(newContactField);
        //             });
        //         });
        //     

        //         var token = "{{ csrf_token() }}";


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
                        window.location.href = "{{ route('curent_reaparing_master') }}";
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


        document.getElementById('cr_division_id').addEventListener('change', function() {
            var divisionId = this.value;
            var roadNameDropdown = document.getElementById('cr_road_name');

            // Clear existing options
            roadNameDropdown.innerHTML = '<option value="">Select Road Name</option>';

            if (divisionId) {
                // Use AJAX to fetch road names for the selected division
                fetch('/get-road-names/' + divisionId)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(road => {
                            var option = document.createElement('option');
                            option.value = road.id;
                            option.text = road.name;
                            roadNameDropdown.appendChild(option);
                        });
                    });
            }
        });


        document.getElementById('cr_road_name').addEventListener('change', function() {
            var roadId = this.value;

            if (roadId) {
                // Use AJAX to fetch additional road information
                fetch('/get-road-info/' + roadId)
                    .then(response => response.json()) // Convert response to JSON
                    .then(data => {

                        // Assuming 'chainage_from' and 'chainage_to' are properties of the JSON data
                        document.getElementById('cr_start_date').innerHTML =
                            `<option value="${data.chainage_from}">${data.chainage_from}</option>`;
                        document.getElementById('cr_end_date').innerHTML =
                            `<option value="${data.chainage_to}">${data.chainage_to}</option>`;
                        document.getElementById('total_lentch').innerHTML =
                            `<option value="${data.chainage_to}">${data.total_length}</option>`;
                        document.getElementById('cr_catogry').innerHTML =
                            `<option value="${data.chainage_to}">${data.cat}</option>`;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                // Clear all data elements
                document.getElementById('cr_start_date').textContent = '';
                document.getElementById('cr_end_date').textContent = '';
                document.getElementById('total_lentch').textContent = '';
                document.getElementById('cr_catogry').textContent = '';

            }
        });
    </script>
@endsection
