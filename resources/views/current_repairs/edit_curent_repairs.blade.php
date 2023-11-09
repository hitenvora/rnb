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
                                <form class="row" method="post" enctype="multipart/form-data" id="master_form">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $cr_update->id }}">
                                    <input type="hidden" name="step" value="cr">
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
                                    </div>


                                    <div class="col-lg-6">
                                        <label class="form-label">Name Of Section</label>
                                        <input type="text" class="form-control" id="cr_name_of_section"
                                            name="cr_name_of_section" value="{{ $cr_update->cr_name_of_section }}">
                                    </div>

                                    @foreach (explode(',', $cr_update->cr_road_name) as $key => $data)
                                        @php
                                            $cr_catogry = explode(',', $cr_update->cr_catogry);
                                            $cr_start_date = explode(',', $cr_update->cr_start_date);
                                            $cr_end_date = explode(',', $cr_update->cr_end_date);
                                            $cr_type_of_work_id = explode(',', $cr_update->cr_type_of_work_id);
                                        @endphp

                                        <div class="col-lg-12" id="road_data">
                                            <div class="row">
                                                <div class="col-lg-2" id="contect">
                                                    <label class="form-label">Name of Road</label>

                                                    <select class="form-select" name="cr_road_name[]">
                                                        <option value="">Select Road Name</option>
                                                        @foreach ($roadNames as $road)
                                                            <option value="{{ $road->id }}"
                                                                @selected($data == $road->id)>{{ $road->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-2">
                                                    <label class="form-label">Category</label>
                                                    <input type="text" class="form-control" id="cr_catogry[]"
                                                        name="cr_catogry[]" value="{{ @$cr_catogry[$key] }}">
                                                </div>

                                                <div class="col-lg-2">
                                                    <label class="form-label">Chainage(From)</label>

                                                    <input type="text" class="form-control" id="cr_start_date[]"
                                                        name="cr_start_date[]" value="{{ @$cr_start_date[$key] }}">

                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Chainage(To)</label>
                                                    <input type="text" class="form-control" id="cr_end_date[]"
                                                        name="cr_end_date[]" value="{{ @$cr_end_date[$key] }}">
                                                    </select>

                                                </div>

                                                <div class="col-lg-2">
                                                    <label class="form-label">Type OF Work</label>
                                                    <select class="form-select" name="cr_type_of_work_id[]"
                                                        id="cr_type_of_work_id">
                                                        <option value="">Select Section Name</option>
                                                        @foreach ($type_work as $work)
                                                            <option value="{{ $work['id'] }}"
                                                                @if (in_array($work['id'], explode(',', $cr_update->cr_type_of_work_id)) || old('cr_type_of_work_id') == $work['id']) selected @endif>
                                                                {{ $work['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="button" class="btn-close remove-contact"
                                                    aria-label="Close"></button>
                                            </div>
                                    @endforeach
                            </div>
                            <div class="row">
                                <span class="text-end" style="width: 90%">
                                    <a class="btn btn-light-warning px-3 border" id="add-contact">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337"
                                                stroke="#802B81" stroke-width="1.67" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg> Add
                                    </a>
                                </span>
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
                            toastr.success("Current Repairing added successfully.");
                        } else {
                            toastr.success("Current Repairing updated successfully.");
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


        $("#cr_division_id").change(function() {
            let cr_division_id = $(this).val();
            getNameOfRoadData(cr_division_id);
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

        function roadname(divisionId, roadNameDropdown) {
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
        }



        document.addEventListener('DOMContentLoaded', function() {
            const addContactButton = document.getElementById('add-contact');
            const contactFieldsContainer = document.getElementById('contect');

            // const roadData = document.getElementById('road_data');
            let contactCount = 0; // Keep track of added contacts
            addContactButton.addEventListener('click', function() {
                contactCount++; // Increment contact count
                // Create a new input field (you can customize this as needed)
                // const newContactField = document.createElement('tr');
                const newContactField = document.createElement('div');
                html = `<div class="row">
                    <div class="col-lg-2">
                                        <label class="form-label">Name of Road</label>
                                        <select class="form-select" name="cr_road_name[]">
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
                newContactField.innerHTML = html;
                const roadData = document.getElementById('road_data');
                roadData.appendChild(newContactField);

                // Add an event listener to the "Division" dropdown for this row
                // const divisionDropdown = newContactField.querySelector(`#cr_division_id`);

                const roadNameDropdown = newContactField.querySelector(`#cr_road_name_${contactCount}`);
                getNameOfRoadData($("#cr_division_id").val(), ($('[name="cr_road_name[]"]').length - 1));
                // divisionDropdown.addEventListener('change', function() {
                //     var divisionId = this.value;
                //     roadname(divisionId, roadNameDropdown);
                // });
            });
        });

        $(document).on('click', '.remove-contact', function(e) {
            $(this).closest(".row").remove();
        });
        $(document).on('click', '.remove-contact-static', function(e) {
            $(this).closest("tr").remove();
        });







        // document.addEventListener("DOMContentLoaded", () => {
        // setdata();
        // setCrEndDate();
        // });
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
        //                 const newContactField = document.createElement('p');
        //                 newContactField.innerHTML = `
    //                 <div class="container">
    //   <div class="row">
    //     <div class="col">
    //         <div class="col-lg-12">
    //                                         <input type="text" class="form-control" id="cr_start_date" name="cr_start_date[]"
    //                                       placeholder="Chainage(From)">
    //                                         </div>
    //     </div>
    //     <div class="col">

    //         <div class="col-lg-12">
    //                                         <input type="text" class="form-control" id="cr_end_date" name="cr_end_date[]"
    //                                         placeholder="Chainage(To)">
    //                                         </div>

    //     </div>
    //   </div>
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






        // $('#add_name_of_project_id').submit(function(e) {
        //     e.preventDefault();
        //     var formData = new FormData(this);
        //     var csrftoken = $('meta[name="csrf-token"]').attr('content');
        //     $(".text-danger").text('');
        //     var selectedID = $("#selectedID").data("id");

        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('name_of_project_insert') }}",
        //         headers: {
        //             'X-CSRF-Token': csrftoken,
        //         },
        //         data: formData,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: (data) => {
        //             if (data.status == 200) {
        //                 $('#add_name_of_project_id').modal('hide');
        //                 if ($('#add_name_of_project_id').val() == '') {
        //                     toastr.success("Proposal Master added successfully.");
        //                 } else {
        //                     toastr.success("Proposal Master updated successfully.");
        //                 }

        //                 window.location.href = "{{ url('edit-basic') }}/" + selectedID;
        //             } else {
        //                 toastr.error(data.msg);
        //             }
        //         },
        //         error: function(response) {
        //             if (response.status === 422) {
        //                 var errors = $.parseJSON(response.responseText);
        //                 $.each(errors['errors'], function(key, val) {
        //                     console.log(key);
        //                     $("#" + key + "_error").text(val[0]);
        //                 });
        //             }
        //         }
        //     });
        // });



        // document.getElementById('cr_road_name').addEventListener('change', function() {
        //     setdata();
        //     setCrEndDate();
        // });

        // function setdata() {

        //     const workTypeSelect = document.getElementById('cr_road_name');
        //     const typeOfWorkSelect = document.getElementById('cr_start_date');

        //     // Get the selected option's value
        //     const selectedWorkTypeId = workTypeSelect.value;

        //     // Clear the "Type Of Work" dropdown options
        //     typeOfWorkSelect.innerHTML = '';

        //     // Populate the "Type Of Work" dropdown based on the selected "Work Type"
        //     if (selectedWorkTypeId === '1' || selectedWorkTypeId === '62') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="8/4">8/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '2' || selectedWorkTypeId === '7' || selectedWorkTypeId === '7' ||
        //         selectedWorkTypeId === '8' || selectedWorkTypeId === '10' || selectedWorkTypeId === '11' ||
        //         selectedWorkTypeId === '12' || selectedWorkTypeId === '13' || selectedWorkTypeId === '14' ||
        //         selectedWorkTypeId === '15' || selectedWorkTypeId === '18' || selectedWorkTypeId === '19' ||
        //         selectedWorkTypeId === '21' || selectedWorkTypeId === '22' || selectedWorkTypeId === '26' ||
        //         selectedWorkTypeId === '27' || selectedWorkTypeId === '28' || selectedWorkTypeId === '29' ||
        //         selectedWorkTypeId === '30' || selectedWorkTypeId === '32' || selectedWorkTypeId === '34' ||
        //         selectedWorkTypeId === '35' || selectedWorkTypeId === '36' || selectedWorkTypeId === '37' ||
        //         selectedWorkTypeId === '39' || selectedWorkTypeId === '42' || selectedWorkTypeId === '44' ||
        //         selectedWorkTypeId === '46' || selectedWorkTypeId === '47' || selectedWorkTypeId === '48' ||
        //         selectedWorkTypeId === '52' || selectedWorkTypeId === '53' || selectedWorkTypeId === '54' ||
        //         selectedWorkTypeId === '55' || selectedWorkTypeId === '56' || selectedWorkTypeId === '57' ||
        //         selectedWorkTypeId === '58' || selectedWorkTypeId === '59' || selectedWorkTypeId === '60' ||
        //         selectedWorkTypeId === '61' || selectedWorkTypeId === '75' || selectedWorkTypeId === '121' ||
        //         selectedWorkTypeId === '118' || selectedWorkTypeId === '9' || selectedWorkTypeId === '24' ||
        //         selectedWorkTypeId === '68' || selectedWorkTypeId === '65' || selectedWorkTypeId === '33' ||
        //         selectedWorkTypeId === '94' || selectedWorkTypeId === '45' || selectedWorkTypeId === '118' ||
        //         selectedWorkTypeId === '20' || selectedWorkTypeId === '66' || selectedWorkTypeId === '31' ||
        //         selectedWorkTypeId === '73' || selectedWorkTypeId === '38' || selectedWorkTypeId === '76' ||
        //         selectedWorkTypeId === '40' || selectedWorkTypeId === '77' || selectedWorkTypeId === '43' ||
        //         selectedWorkTypeId === '117' || selectedWorkTypeId === '49' || selectedWorkTypeId === '80' ||
        //         selectedWorkTypeId === '63' || selectedWorkTypeId === '67' || selectedWorkTypeId === '69' ||
        //         selectedWorkTypeId === '70' || selectedWorkTypeId === '71' || selectedWorkTypeId === '72' ||
        //         selectedWorkTypeId === '79' || selectedWorkTypeId === '85' || selectedWorkTypeId === '86' ||
        //         selectedWorkTypeId === '87' || selectedWorkTypeId === '88' || selectedWorkTypeId === '89' ||
        //         selectedWorkTypeId === '90' || selectedWorkTypeId === '83' || selectedWorkTypeId === '96' ||
        //         selectedWorkTypeId === '97' || selectedWorkTypeId === '101' || selectedWorkTypeId === '102' ||
        //         selectedWorkTypeId === '103' || selectedWorkTypeId === '104' || selectedWorkTypeId === '105' ||
        //         selectedWorkTypeId === '110' || selectedWorkTypeId === '111' || selectedWorkTypeId === '119' ||
        //         selectedWorkTypeId === '120') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="0/0">0/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '3' || selectedWorkTypeId === '6' || selectedWorkTypeId === '64' ||
        //         selectedWorkTypeId === '106') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="8/3">8/3</option>`;
        //     }

        //     if (selectedWorkTypeId === '4' || selectedWorkTypeId === '108') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="29/8">29/8</option>`;
        //     }
        //     if (selectedWorkTypeId === '5' || selectedWorkTypeId === '109') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="31/0">31/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '9' || selectedWorkTypeId === '84') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="12/0">12/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '16' || selectedWorkTypeId === '91') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="9/6">9/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '17' || selectedWorkTypeId === '92') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="18/0">18/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '19' || selectedWorkTypeId === '112') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/0">19/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '25' || selectedWorkTypeId === '115') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/6">19/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '21' || selectedWorkTypeId === '113') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="0/4">0/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '23' || selectedWorkTypeId === '114') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="13/260">13/260</option>`;
        //     }
        //     if (selectedWorkTypeId === '26' || selectedWorkTypeId === '93') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="1/4">1/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '32' || selectedWorkTypeId === '74' || selectedWorkTypeId === '34' ||
        //         selectedWorkTypeId === '95') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="1/0">1/0</option>`;
        //     }

        //     if (selectedWorkTypeId === '39' || selectedWorkTypeId === '98') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="1/6">1/6</option>`;
        //     }

        //     if (selectedWorkTypeId === '41' || selectedWorkTypeId === '78') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="139/0">139/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '42' || selectedWorkTypeId === '116') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="14/5">14/5</option>`;
        //     }
        //     if (selectedWorkTypeId === '44' || selectedWorkTypeId === '99') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="10/0">10/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '46' || selectedWorkTypeId === '100') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="9/0">9/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '50' || selectedWorkTypeId === '81') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="6/0">6/0</option>`;
        //     }

        //     if (selectedWorkTypeId === '51' || selectedWorkTypeId === '82') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="5/0">5/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '61' || selectedWorkTypeId === '122') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="6/5">6/5</option>`;
        //     }
        // }



        // function setCrEndDate() {
        //     const workTypeSelect = document.getElementById('cr_road_name');
        //     const typeOfWorkSelect = document.getElementById('cr_end_date');

        //     // Get the selected option's value
        //     const selectedWorkTypeId = workTypeSelect.value;

        //     // Clear the "Type Of Work" dropdown options
        //     typeOfWorkSelect.innerHTML = '';

        //     // Populate the "Type Of Work" dropdown based on the selected "Work Type"
        //     if (selectedWorkTypeId === '1' || selectedWorkTypeId === '62') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="43/8">43/8</option>`;
        //     }
        //     if (selectedWorkTypeId === '2' || selectedWorkTypeId === '63') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="4/1">4/1</option>`;
        //     }
        //     if (selectedWorkTypeId === '3' || selectedWorkTypeId === '107') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="31/0">31/0</option>`;
        //     }

        //     if (selectedWorkTypeId === '4' || selectedWorkTypeId === '108') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="45/0">45/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '5' || selectedWorkTypeId === '109') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="50/0">50/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '6' || selectedWorkTypeId === '64') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="34/050">34/050</option>`;
        //     }
        //     if (selectedWorkTypeId === '7' || selectedWorkTypeId === '110') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="15/0">15/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '8' || selectedWorkTypeId === '111') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="12/0">12/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '9' || selectedWorkTypeId === '84') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/5">19/5</option>`;
        //     }
        //     if (selectedWorkTypeId === '10' || selectedWorkTypeId === '85') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="17/7 ">17/7 </option>`;
        //     }
        //     if (selectedWorkTypeId === '11' || selectedWorkTypeId === '86') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="18/0">18/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '12' || selectedWorkTypeId === '87') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="38/0 ">38/0 </option>`;
        //     }
        //     if (selectedWorkTypeId === '13' || selectedWorkTypeId === '88') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="7/25">7/25</option>`;
        //     }
        //     if (selectedWorkTypeId === '13' || selectedWorkTypeId === '88') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="9/7">9/7</option>`;
        //     }

        //     if (selectedWorkTypeId === '14' || selectedWorkTypeId === '89') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="24/4">24/4</option>`;
        //     }

        //     if (selectedWorkTypeId === '15' || selectedWorkTypeId === '90') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="32/4">32/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '16' || selectedWorkTypeId === '91') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="35/3">35/3</option>`;
        //     }
        //     if (selectedWorkTypeId === '18' || selectedWorkTypeId === '65') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/60">19/60</option>`;
        //     }
        //     if (selectedWorkTypeId === '19' || selectedWorkTypeId === '99') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="30/8">30/8</option>`;
        //     }
        //     if (selectedWorkTypeId === '20' || selectedWorkTypeId === '66') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="23/2">23/2</option>`;
        //     }

        //     if (selectedWorkTypeId === '21' || selectedWorkTypeId === '101') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="32/0">32/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '22' || selectedWorkTypeId === '102') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="13/260">13/260</option>`;
        //     }
        //     if (selectedWorkTypeId === '23' || selectedWorkTypeId === '103') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="31/6">31/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '24' || selectedWorkTypeId === '104') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="12/8">12/8</option>`;
        //     }
        //     if (selectedWorkTypeId === '25' || selectedWorkTypeId === '105') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="29/4">29/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '26' || selectedWorkTypeId === '106') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="9/6">9/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '27' || selectedWorkTypeId === '107') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="3/0">3/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '28' || selectedWorkTypeId === '108') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="18/6">18/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '29' || selectedWorkTypeId === '109') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="26/6">26/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '30' || selectedWorkTypeId === '110') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="6/0">6/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '31' || selectedWorkTypeId === '111') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="21/8">21/8</option>`;
        //     }
        //     if (selectedWorkTypeId === '32' || selectedWorkTypeId === '112') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="16/4">16/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '33' || selectedWorkTypeId === '113') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="10/2">10/2</option>`;
        //     }
        //     if (selectedWorkTypeId === '34' || selectedWorkTypeId === '114') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="17/0">17/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '35' || selectedWorkTypeId === '115') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="11/6">11/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '36' || selectedWorkTypeId === '116') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="20/7">20/7</option>`;
        //     }
        //     if (selectedWorkTypeId === '37' || selectedWorkTypeId === '117') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="23/2">23/2</option>`;
        //     }
        //     if (selectedWorkTypeId === '38' || selectedWorkTypeId === '118') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="3/06">3/06</option>`;
        //     }
        //     if (selectedWorkTypeId === '39' || selectedWorkTypeId === '119') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="52/4">52/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '40' || selectedWorkTypeId === '120') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="3/64">3/64</option>`;
        //     }
        //     if (selectedWorkTypeId === '41' || selectedWorkTypeId === '121') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="140/2">140/2</option>`;
        //     }
        //     if (selectedWorkTypeId === '42' || selectedWorkTypeId === '116') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="26/0">26/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '43' || selectedWorkTypeId === '117') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="1/35">1/35</option>`;
        //     }
        //     if (selectedWorkTypeId === '44' || selectedWorkTypeId === '118') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="14/7">14/7</option>`;
        //     }
        //     if (selectedWorkTypeId === '45' || selectedWorkTypeId === '119') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="4/4">4/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '46' || selectedWorkTypeId === '120') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/70">19/70</option>`;
        //     }
        //     if (selectedWorkTypeId === '47' || selectedWorkTypeId === '121') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/8">19/8</option>`;
        //     }
        //     if (selectedWorkTypeId === '48' || selectedWorkTypeId === '122') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="16/20">16/20</option>`;
        //     }
        //     if (selectedWorkTypeId === '49' || selectedWorkTypeId === '123') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="10/5">10/5</option>`;
        //     }
        //     if (selectedWorkTypeId === '50' || selectedWorkTypeId === '124') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="30/0">30/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '51' || selectedWorkTypeId === '125') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="9/0">9/0</option>`;
        //     }
        //     if (selectedWorkTypeId === '52' || selectedWorkTypeId === '126') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/2">19/2</option>`;
        //     }
        //     if (selectedWorkTypeId === '53' || selectedWorkTypeId === '127') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="11/60">11/60</option>`;
        //     }
        //     if (selectedWorkTypeId === '54' || selectedWorkTypeId === '128') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="21/40">21/40</option>`;
        //     }
        //     if (selectedWorkTypeId === '55' || selectedWorkTypeId === '129') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="19/4">19/4</option>`;
        //     }
        //     if (selectedWorkTypeId === '56' || selectedWorkTypeId === '130') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="14/50">14/50</option>`;
        //     }
        //     if (selectedWorkTypeId === '57' || selectedWorkTypeId === '131') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="10/20">10/20</option>`;
        //     }
        //     if (selectedWorkTypeId === '58' || selectedWorkTypeId === '132') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="9/200">9/200</option>`;
        //     }
        //     if (selectedWorkTypeId === '59' || selectedWorkTypeId === '133') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="15/00">15/00</option>`;
        //     }
        //     if (selectedWorkTypeId === '61' || selectedWorkTypeId === '122') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="11/3">11/3</option>`;
        //     }
        //     if (selectedWorkTypeId === '61' || selectedWorkTypeId === '122') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="6/6">6/6</option>`;
        //     }
        //     if (selectedWorkTypeId === '61' || selectedWorkTypeId === '122') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="1/30">1/30</option>`;
        //     }
        //     if (selectedWorkTypeId === '61' || selectedWorkTypeId === '122') {
        //         // If "Work Type" is 1, add the options specific to that type
        //         typeOfWorkSelect.innerHTML += `
    //         <option value="11/8">11/8</option>`;
        //     }
        // }
    </script>
@endsection
