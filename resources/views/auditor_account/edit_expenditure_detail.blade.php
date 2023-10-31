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
                                <h5 class="mb-0 font-primary text-center">Expenditure Detail</h5>
                            </div>
                            <form class="row" method="post" enctype="multipart/form-data" id="master_id_form">
                                @csrf
                                <div class="card-body">
                                    <div class="table-responsive expen_table">
                                        <table class="exp_detail table-bordered">
                                            <thead>
                                                <th>Dtp Amount</th>
                                                <th>AA Amount</th>
                                                <th>Estimated Amount</th>
                                                <th>Tender Cost</th>
                                                <th>Quality Contracts Cost</th>
                                                <th>Relavted Tender Cost</th>
                                                <th>B</th>
                                                <th>Details</th>
                                                <th>Expended Date</th>
                                                <th> Expenditure Amount Without</th>
                                                <th>Expenditure Amount 9% With</th>
                                                <th>Work Phisical(%)</th>
                                                <th>Work Fincial(%)</th>
                                                <th>Amount For</th>
                                            </thead>
                                            <tbody id="contect">
                                                <tr>

                                                    <input type="hidden" name="master_id" id="master_id"
                                                        value="{{ $project_master->id }}">
                                                    <input type="hidden" name="step" value="expenditure_detail">

                                                    @foreach (explode(',', $project_master->ed_origin_work) as $key => $data)
                                                        @php
                                                            $ed_tender_cost = explode(',', $project_master->ed_tender_cost);
                                                            $ed_estimated_cost = explode(',', $project_master->ed_estimated_cost);
                                                            $ed_project_cost = explode(',', $project_master->ed_project_cost);
                                                            $ed_dtp_amount = explode(',', $project_master->ed_dtp_amount);
                                                            $ed_qulity_cost = explode(',', $project_master->ed_qulity_cost);
                                                            $ed_b = explode(',', $project_master->ed_b);
                                                            $ed_details = explode(',', $project_master->ed_details);
                                                            $expended_details = explode(',', $project_master->expended_details);
                                                            $ed_fincial = explode(',', $project_master->ed_fincial);

                                                            $ed_expenditure_amount = explode(',', $project_master->ed_expenditure_amount);
                                                            $ed_expenditure = explode(',', $project_master->ed_expenditure);
                                                            $ed_amount_for = explode(',', $project_master->ed_amount_for);
                                                            $ed_work = explode(',', $project_master->ed_work);

                                                        @endphp
                                                        <td>
                                                            <input type="text" id="ed_dtp_amount" name="ed_dtp_amount[]"
                                                                class="form-control" placeholder="Enter Amount"
                                                                value="{{ @$ed_dtp_amount[$key] }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_project_cost[]"
                                                                value="{{ @$ed_project_cost[$key] }}" id="ed_project_cost"
                                                                placeholder="Enter Project Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="ed_estimated_cost"
                                                                name="ed_estimated_cost[]"
                                                                value="{{ @$ed_estimated_cost[$key] }}" class="form-control"
                                                                placeholder="Enter Estimated Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control ed_tender_cost"
                                                                name="ed_tender_cost[]" value="{{ @$ed_tender_cost[$key] }}"
                                                                id="ed_tender_cost" placeholder="Enter Tender Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="ed_qulity_cost"
                                                                name="ed_qulity_cost[]" class="form-control"
                                                                value="{{ @$ed_qulity_cost[$key] }}"
                                                                placeholder="Enter Estimated Cost">
                                                        </td>

                                                        <td>
                                                            <input type="text" id="ed_origin_work"
                                                                name="ed_origin_work[]" value="{{ $data }}"
                                                                class="form-control"
                                                                placeholder="Enter Relavent Tender Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="ed_b"
                                                                value="{{ @$ed_b[$key] }}" name="ed_b[]"
                                                                placeholder="Enter B">
                                                        </td>

                                                        <td>
                                                            <input type="text" class="form-control" id="ed_details"
                                                                value="{{ @$ed_details[$key] }}" name="ed_details[]"
                                                                placeholder="Enter Detils">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="expended_details"
                                                                name="expended_details[]" placeholder="Enter Expende Date"
                                                                value="{{ @$expended_details[$key] }}">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                value="{{ @$ed_expenditure_amount[$key] }}"
                                                                name="ed_expenditure_amount[]" id="ed_expenditure_amount"
                                                                placeholder="Enter Expenditure Amount">
                                                        </td>
                                                        <!-- show total + 9 % value -->
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_expenditure[]"
                                                                value="{{ @$ed_expenditure[$key] }}" id="ed_expenditure"
                                                                readonly placeholder="This Value is Automatically">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="ed_work[]"
                                                                value="{{ @$ed_work[$key] }}" id="ed_work"
                                                                placeholder="Enter Physical (%)">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="ed_fincial[]"
                                                                value="{{ @$ed_fincial[$key] }}" id="ed_fincial"
                                                                placeholder="Enter Fincial(%)">
                                                        </td>
                                                        <td>
                                                            <select class="form-select" name="ed_amount_for[]"
                                                                id="ed_amount_for">
                                                                <option value="Utility"
                                                                    {{ $ed_amount_for[$key] == 'Utility' ? 'selected' : '' }}>
                                                                    Utility</option>
                                                                <option value="Testing"
                                                                    {{ $ed_amount_for[$key] == 'Testing' ? 'selected' : '' }}>
                                                                    Testing</option>
                                                                <option value="Bill"
                                                                    {{ $ed_amount_for[$key] == 'Bill' ? 'selected' : '' }}>
                                                                    Bill</option>
                                                                <option value="Other"
                                                                    {{ $ed_amount_for[$key] == 'Other' ? 'selected' : '' }}>
                                                                    Other</option>
                                                                <option value="Financial Progress"
                                                                    {{ $ed_amount_for[$key] == 'Financial Progress' ? 'selected' : '' }}>
                                                                    Financial Progress</option>
                                                                <option value="Physical Progress"
                                                                    {{ $ed_amount_for[$key] == 'Physical Progress' ? 'selected' : '' }}>
                                                                    Physical Progress</option>
                                                                <option value="Tpi"
                                                                    {{ $ed_amount_for[$key] == 'Tpi' ? 'selected' : '' }}>
                                                                    Tpi</option>
                                                            </select>
                                                        </td>
                                                </tr>
                                                @endforeach



                                                <tr>
                                                    <td class="text-end" colspan="14">
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
                                        <button type="submit" class="btn submit-btn btn btn-primary" id="btn_save"
                                            name="sub_client" style="margin-left: 50%">Save</button>
                                    </div>

                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="total">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="total_details">
                            <li>
                                <div class="d-flex">
                                    <h6>TS (1%)</h6>
                                    <span id="reducedGrand" data-category="reducedGrand">0</span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <h6>Tpi+Test</h6>
                                    <span id="" data-category="">0</span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <h6>Percentage %</h6>
                                    <span id="" data-category="">0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="total_detail">
                            <li>
                                <div class="d-flex">
                                    <h6>Utility</h6>

                                    <!-- Your hidden span element -->
                                    <span id="totalUtility">0</span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <h6>Testing</h6>
                                    <span id="totalTesting">0</span>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex">
                                    <h6>Bill</h6>
                                    <span id="totalBill">0</span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <h6>Other</h6>
                                    <span id="totalOther">0</span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <h6>Financial Progress</h6>
                                    <span id="totalFinancialProgress">0</span>
                                </div>
                            </li>
                            <li>
                                <div class ="d-flex">
                                    <h6>Physical Progress</h6>
                                    <span id="totalPhysicalProgress">0</span>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <h6>Tpi</h6>
                                    <span id="totalTpi">0</span>
                                </div>
                            </li>
                            <li class="total_field">
                                <div class="d-flex">
                                    <h6>Total</h6>
                                    <span id="grandTotal">0</span>
                                </div>
                            </li>
                        </ul>
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

        $('#master_id_form').submit(function(e) {
            e.preventDefault();


            // Now proceed with the AJAX submission
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
                            toastr.success("Proposal Master added successfully.");
                        } else {
                            toastr.success("Proposal Master updated successfully.");
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
                newContactField.innerHTML = ` <td>
                                                            <input type="text" id="ed_dtp_amount" name="ed_dtp_amount[]"
                                                               class="form-control"
                                                                placeholder="Enter Amount"
                                             >
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_project_cost[]"
                                                               id="ed_project_cost"
                                                                placeholder="Enter Project Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="ed_estimated_cost"
                                                                name="ed_estimated_cost[]"
                                                                 class="form-control"
                                                                placeholder="Enter Estimated Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control ed_tender_cost"
                                                                name="ed_tender_cost[]"
                                                                id="ed_tender_cost" placeholder="Enter Tender Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="ed_qulity_cost"
                                                                name="ed_qulity_cost[]" class="form-control" 
                                                                 placeholder="Enter Estimated Cost">
                                                        </td>

                                                        <td>
                                                            <input type="text" id="ed_origin_work"
                                                                name="ed_origin_work[]" 
                                                                class="form-control"
                                                                placeholder="Enter Relavent Tender Cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="ed_b"
                                                               name="ed_b[]"
                                                                placeholder="Enter B">
                                                        </td>

                                                        <td>
                                                            <input type="text" class="form-control" id="ed_details"
                                                               name="ed_details[]"
                                                                placeholder="Enter Detils">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="expended_details"
                                                            
                                                                name="expended_details[]" placeholder="Enter Expende Date">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                
                                                                name="ed_expenditure_amount[]" id="ed_expenditure_amount"
                                                                placeholder="Enter Expenditure Amount">
                                                        </td>
                                                        <!-- show total + 9 % value -->
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_expenditure[]"
                                                               id="ed_expenditure"
                                                                readonly placeholder="This Value is Automatically">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="ed_work[]"
                                                                id="ed_work"
                                                                placeholder="Enter Physical (%)">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="ed_fincial[]"
                                                                id="ed_fincial"
                                                                placeholder="Enter Fincial(%)">
                                                        </td>
                                                        <td>
                                                            <select class="form-select" name="ed_amount_for[]"
                                                                id="ed_amount_for">
                                                                <option value="Utility"
                                                                   >
                                                                    Utility</option>
                                                                <option value="Testing"
                                                                   >
                                                                    Testing</option>
                                                                <option value="Bill"
                                                                  >
                                                                    Bill</option>
                                                                <option value="Other"
                                                                   >
                                                                    Other</option>
                                                                <option value="Financial Progress"
                                                                     >
                                                                    Financial Progress</option>
                                                                <option value="Physical Progress"
                                                                    >
                                                                    Physical Progress</option>
                                                                <option value="Tpi"
                                                                     >
                                                                    Tpi</option>
                                                            </select>
                                                        </td>
                        <button type="button" class="btn-close remove-contact" aria-label="Close"></button>`;

                // Add an event listener to the "Remove" button
                const removeButton = newContactField.querySelector('.remove-contact');
                removeButton.addEventListener('click', function() {
                    contactFieldsContainer.removeChild(
                        newContactField); // Remove the field when "Remove" is clicked
                    contactCount--; // Decrement contact count
                });
                newContactField.querySelector('#ed_expenditure_amount').addEventListener('input',
                    function() {
                        calculateExpenditure(newContactField);
                    });

                contactFieldsContainer.appendChild(newContactField);
            });
            document.querySelectorAll('#ed_expenditure_amount').forEach(function(input) {
                input.addEventListener('input', function() {
                    calculateExpenditure(input.closest('tr'));
                });
            });
        });

        function calculateExpenditure(row) {
            const expenditureAmount = parseFloat(row.querySelector('#ed_expenditure_amount').value);
            if (!isNaN(expenditureAmount)) {
                const calculatedExpenditure = expenditureAmount * 100 * 0.09;
                row.querySelector('#ed_expenditure').value = calculatedExpenditure.toFixed(2);
            } else {
                row.querySelector('#ed_expenditure').value = 'Please Enter Valid';
            }
        }


        function updateTotal() {
            const amountInputs = document.querySelectorAll('#ed_tender_cost');
            const categoryDropdowns = document.querySelectorAll('#ed_amount_for');
            const totalElements = document.querySelectorAll('.total_detail span');


            const grandTotalElement = document.getElementById('grandTotal');
            const reducedGrand = document.getElementById('reducedGrand');


            // Add an input event listener to each amount input and dropdown
            amountInputs.forEach(function(input, index) {

                input.addEventListener('input', updateTotal);
                categoryDropdowns[index].addEventListener('change', updateTotal);
            });

            let totalUtility = 0;
            let totalTesting = 0;
            let totalBill = 0;
            let totalOther = 0;
            let totalFinancialProgress = 0;
            let totalPhysicalProgress = 0;
            let totalTpi = 0;

            // Loop through the inputs and calculate the total for each category
            amountInputs.forEach(function(input, index) {
                const amount = parseFloat(input.value) || 0;
                const selectedCategory = categoryDropdowns[index].value;

                // Update total based on category
                if (selectedCategory === 'Utility') {
                    totalUtility += amount;
                } else if (selectedCategory === 'Testing') {
                    totalTesting += amount;
                } else if (selectedCategory === 'Bill') {
                    totalBill += amount;
                } else if (selectedCategory === 'Other') {
                    totalOther += amount;
                } else if (selectedCategory === 'Financial Progress') {
                    totalFinancialProgress += amount;
                } else if (selectedCategory === 'Physical Progress') {
                    totalPhysicalProgress += amount;
                } else if (selectedCategory === 'Tpi') {
                    totalTpi += amount;
                }
            });

            // Calculate the grand total
            const grandTotal = totalUtility + totalTesting + totalBill + totalOther + totalFinancialProgress +
                totalPhysicalProgress + totalTpi;

            const reducedGrandTotal = grandTotal * 0.99;

            // Display the total for each category
            totalElements[0].textContent = totalUtility;
            totalElements[1].textContent = totalTesting;
            totalElements[2].textContent = totalBill;
            totalElements[3].textContent = totalOther;
            totalElements[4].textContent = totalFinancialProgress;
            totalElements[5].textContent = totalPhysicalProgress;
            totalElements[6].textContent = totalTpi;

            // Display the grand total
            grandTotalElement.textContent = grandTotal;
            reducedGrand.textContent = reducedGrandTotal;
        }

        document.querySelectorAll('#ed_tender_cost').forEach(function(input) {
            input.addEventListener('input', updateTotal);
        });


        updateTotal();
    </script>
@endsection
