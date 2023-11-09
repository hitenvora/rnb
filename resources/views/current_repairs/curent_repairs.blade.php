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
                                <form class="row" method="post" enctype="multipart/form-data" id="master_form">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="">
                                    <input type="hidden" name="step" value="cr">
                                    <div class="col-lg-6">
                                        <label class="form-label">Subdivision Name</label>
                                        <select class="form-select" name="cr_division_id" id="cr_division_id">
                                            <option value="">Select Division Name</option>
                                            @foreach ($division_name as $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Name Of Section</label>
                                        <input type="text" class="form-control" id="cr_name_of_section"
                                            name="cr_name_of_section" value="">
                                    </div>

                                    <div class="col-lg-12" id="road_data">
                                        <div class="row">
                                            <div class="col-lg-2" id="contect">
                                                <label class="form-label">Name of Road</label>

                                                <select class="form-select" name="cr_road_name[]"
                                                    onchange="setNameOfRoadData(this)">
                                                    <option value="">Select Road Name</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-2">
                                                <label class="form-label">Category</label>
                                                <input type="text" class="form-control" id="cr_catogry[]"
                                                    name="cr_catogry[]" value="">



                                            </div>

                                            <div class="col-lg-2">
                                                <label class="form-label">Chainage(From)</label>

                                                <input type="text" class="form-control" id="cr_start_date[]"
                                                    name="cr_start_date[]" value="">

                                            </div>
                                            <div class="col-lg-2">
                                                <label class="form-label">Chainage(To)</label>
                                                <input type="text" class="form-control" id="cr_end_date[]"
                                                    name="cr_end_date[]" value="">
                                                </select>

                                            </div>




                                            <div class="col-lg-2">
                                                <label class="form-label">Type OF Work</label>
                                                <select class="form-select" name="cr_type_of_work_id[]"
                                                    id="cr_type_of_work_id[]">
                                                    <option value="">Select Section Name</option>
                                                    @foreach ($type_work as $value)
                                                        <option value="{{ $value['id'] }}">
                                                            {{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <span class="text-end col-lg-1" colspan="2">
                                                <a class="btn btn-light-warning px-3" id="add-contact">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                            stroke="#802B81" stroke-width="1.67" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Add
                                                </a>
                                            </span>
                                        </div>
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
    //                                                                 <input type="text" id="cr_road_name[]"
    //                                                                     name="cr_road_name[][]"
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
    //         <input type="date" class="form-control" id="cr_start_date[]"
    //                                                 name="cr_start_date[][]" value="">

    //     </div>
    //     <div class="col">
    //         <input type="date" class="form-control" id="cr_end_date[][]" name="cr_end_date[]"
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
                            toastr.success("Current Repairing added successfully.");
                        } else {
                            toastr.success("Current Repairing updated successfully.");
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
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });


        // document.getElementById('cr_division_id').addEventListener('change', function() {
        //     var divisionId = this.value;
        //     var roadNameDropdown = document.getElementById('cr_road_name[]');

        //     // Clear existing options
        //     roadNameDropdown.innerHTML = '<option value="">Select Road Name</option>';

        //     if (divisionId) {
        //         // Use AJAX to fetch road names for the selected division
        //         fetch('/get-road-names/' + divisionId)
        //             .then(response => response.json())
        //             .then(data => {
        //                 data.forEach(road => {
        //                     var option = document.createElement('option');
        //                     option.value = road.id;
        //                     option.text = road.name;
        //                     roadNameDropdown.appendChild(option);
        //                 });
        //             });
        //     }
        // });


        // document.getElementById('cr_road_name[]').addEventListener('change', function() {
        //     var roadId = this.value;

        //     if (roadId) {
        //         // Use AJAX to fetch additional road information
        //         fetch('/get-road-info/' + roadId)
        //             .then(response => response.json()) // Convert response to JSON
        //             .then(data => {

        //                 // Assuming 'chainage_from' and 'chainage_to' are properties of the JSON data
        //                 document.getElementById('cr_start_date[]').innerHTML =
        //                     `<option value="${data.chainage_from}">${data.chainage_from}</option>`;
        //                 document.getElementById('cr_end_date[]').innerHTML =
        //                     `<option value="${data.chainage_to}">${data.chainage_to}</option>`;
        //                 document.getElementById('total_lentch[]').innerHTML =
        //                     `<option value="${data.chainage_to}">${data.total_length}</option>`;
        //                 document.getElementById('cr_catogry[]').innerHTML =
        //                     `<option value="${data.chainage_to}">${data.cat}</option>`;
        //             })
        //             .catch(error => {
        //                 console.error('Error:', error);
        //             });
        //     } else {
        //         // Clear all data elements
        //         document.getElementById('cr_start_date[]').textContent = '';
        //         document.getElementById('cr_end_date[]').textContent = '';
        //         document.getElementById('total_lentch[]').textContent = '';
        //         document.getElementById('cr_catogry[]').textContent = '';

        //     }
        // });

        $("#cr_division_id").change(function() {
            let cr_division_id = $(this).val();
            getNameOfRoadData(cr_division_id);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-contact');
            const contactFieldsContainer = document.getElementById('contect');
            // const roadData = document.getElementById('road_data');
            let contactCount = 0; // Keep track of added contacts

            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count
                // Create a new input field (you can customize this as needed)
                // const newContactField = document.createElement('tr');
                html = `<div class="row">
                    <div class="col-lg-2">
                                        <label class="form-label">Name of Road</label>

                                        <select class="form-select" name="cr_road_name[]"  onchange="setNameOfRoadData(this)">
                                            <option value="">Select Road Name</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-2">
                                        <label class="form-label">Category</label>
                                            <input type="text" class="form-control" id="cr_catogry[]"
                                            name="cr_catogry[]" value="">



                                    </div>

                                    <div class="col-lg-2">
                                        <label class="form-label">Chainage(From)</label>

                                            <input type="text" class="form-control" id="cr_start_date[]"
                                            name="cr_start_date[]" value="">

                                    </div>
                                    <div class="col-lg-2">
                                        <label class="form-label">Chainage(To)</label>
                                            <input type="text" class="form-control" id="cr_end_date[]"
                                            name="cr_end_date[]" value="">
                                        </select>

                                    </div>




                                    <div class="col-lg-2">
                                        <label class="form-label">Type OF Work</label>
                                        <select class="form-select" name="cr_type_of_work_id[]" id="cr_type_of_work_id[]">
                                            <option value="">Select Section Name</option>
                                            @foreach ($type_work as $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button><div`;

                $("#road_data").append(html);
                // Add an event listener to the "Remove" button
                getNameOfRoadData($("#cr_division_id").val(), ($('[name="cr_road_name[]"]').length - 1));

            });
        });

        function getNameOfRoadData(id = '', count = '') {
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            if (id != '') {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('get_name_of_road_data') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        sub_division_id: id,
                    },
                    success: (data) => {
                        let roadHtml = '<option value="">Select Road Name</option>';
                        $.each(data, function(index, value) {
                            roadHtml += `<option value='${value.id}'>${value.name}</option>`;
                        });
                        if (count != '') {
                            $.each($('[name="cr_road_name[]"]'), function(index, value) {
                                if (index == count) {
                                    $(value).html(roadHtml);
                                }
                            });
                        } else {
                            $.each($('[name="cr_road_name[]"]'), function(index, value) {
                                $(value).html(roadHtml);
                            });
                        }

                    },
                });
            }
        }

        $(document).on('click', '.remove-contact', function(e) {
            $(this).closest(".row").remove();
        });
        $(document).on('click', '.remove-contact-static', function(e) {
            $(this).closest("tr").remove();
        });

        function setNameOfRoadData(e) {
            let road_id = $(e).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('get_name_of_road') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    road_id: road_id,
                },
                success: (data) => {
                    let row = $(e).closest('.row');
                    $(row).find('[name="cr_catogry[]"]').val(`${data.cat}`);
                    $(row).find('[name="cr_start_date[]"]').val(`${data.chainage_from}`);
                    $(row).find('[name="cr_end_date[]"]').val(`${data.chainage_to}`);
                },
            });
        }
    </script>
@endsection
