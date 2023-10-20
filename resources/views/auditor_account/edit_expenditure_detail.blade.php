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
                                <div class="card-body" id="contect">
                                    <div class="table-responsive expen_table">
                                        <table class="exp_detail table-bordered">
                                            <thead>
                                                <th>Original Work Expense On Date</th>
                                                <th>Estimated Cost</th>
                                                <th>Tender Cost</th>
                                                <th>Project Cost(AA)</th>
                                                <th>Paid Amount</th>
                                                <th>Expenditure Amount</th>
                                                <th>9% with CC Expenditure</th>
                                                <th>Work(%)</th>
                                                <th>Amount For</th>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <input type="hidden" name="master_id" id="master_id"
                                                        value="{{ $project_master->id }}">
                                                    <input type="hidden" name="step" value="expenditure_detail">

                                                    @foreach (explode(',', $project_master->ed_origin_work) as $key => $data)
                                                        @php
                                                            $ed_tender_cost = explode(',', $project_master->ed_tender_cost);
                                                            $ed_estimated_cost = explode(',', $project_master->ed_estimated_cost);
                                                            $ed_project_cost = explode(',', $project_master->ed_project_cost);

                                                            $ed_paid_amount = explode(',', $project_master->ed_paid_amount);
                                                            $ed_expenditure_amount = explode(',', $project_master->ed_expenditure_amount);
                                                            $ed_expenditure = explode(',', $project_master->ed_expenditure);
                                                            $ed_amount_for = explode(',', $project_master->ed_amount_for);
                                                            $ed_work = explode(',', $project_master->ed_work);

                                                        @endphp
                                                        <td>
                                                            <input type="date" id="ed_origin_work"
                                                                name="ed_origin_work[]" value="{{ $data }}"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" id="ed_estimated_cost"
                                                                name="ed_estimated_cost[]"
                                                                value="{{ @$ed_estimated_cost[$key] }}"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_tender_cost[]" value="{{ @$ed_tender_cost[$key] }}"
                                                                id="ed_tender_cost">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_project_cost[]"
                                                                value="{{ @$ed_project_cost[$key] }}" id="ed_project_cost">
                                                        </td>

                                                        <td>
                                                            <input type="text" class="form-control" id="ed_paid_amount"
                                                                value="{{ @$ed_paid_amount[$key] }}"
                                                                name="ed_paid_amount[]">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control"
                                                                value="{{ @$ed_expenditure_amount[$key] }}"
                                                                name="ed_expenditure_amount[]" id="ed_expenditure_amount">
                                                        </td>
                                                        <!-- show total + 9 % value -->
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_expenditure[]" value="{{ @$ed_expenditure[$key] }}"
                                                                id="ed_expenditure" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="ed_work[]"
                                                                value="{{ @$ed_work[$key] }}" id="ed_work">
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
                                                                <option value="Figical Progress"
                                                                    {{ $ed_amount_for[$key] == 'Figical Progress' ? 'selected' : '' }}>
                                                                    Figical Progress</option>
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
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="total">
            <ul class="total_detail">
                <li>
                    <div class="d-flex">
                        <h6>Utility</h6>
                        <span id="totalUtility" data-category="Utility">0</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <h6>Testing</h6>
                        <span id="totalTesting" data-category="Testing">0</span>
                    </div>
                </li>

                <li>
                    <div class="d-flex">
                        <h6>Bill</h6>
                        <span id="totalBill" data-category="Bill">0</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <h6>Other</h6>
                        <span id="totalOther" data-category="Other">0</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <h6>Financial Progress</h6>
                        <span id="totalFinancial" data-category="Financial Progress">0</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <h6>Figical Progress</h6>
                        <span id="totalFigical" data-category="Figical Progress">0</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <h6>Tpi</h6>
                        <span id="totalTpi" data-category="Tpi">0</span>
                    </div>
                </li>
                <li class="total_field">
                    <div class="d-flex">
                        <h6>Total</h6>
                        <span id="grandTotal" data-category="grandTotal">0</span>
                    </div>
                </li>
            </ul>
        </div>

        </div>
    </body>
@endsection
@section('script')
    <script>
        var token = "{{ csrf_token() }}";






        $('#master_id_form').submit(function(e) {
            e.preventDefault();

            // Remove duplicate rows based on ed_origin_work


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
                const newContactField = document.createElement('p');
                newContactField.innerHTML = ` 
                                <div class="table-responsive expen_table">
                                    <table class="exp_detail table-bordered">
                                        <thead>
                                                <th>Original Work Expense On Date</th>
                                                <th>Estimated Cost</th>
                                                <th>Tender Cost</th>
                                                <th>Project Cost(AA)</th>
                                                <th>Paid Amount</th>
                                                <th>Expenditure Amount</th>
                                                <th>9% with CC Expenditure</th>
                                                <th>Work(%)</th>
                                                <th>Amount For</th>
                                            </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                        <input type="date" id="ed_origin_work[]" name="ed_origin_work[]"
                                                            class="form-control">
                                                </td>
                                                <td>
                                                            <input type="text" id="ed_estimated_cost"
                                                                name="ed_estimated_cost[]" 
                                                                class="form-control">
                                                        </td>
                                                <td>
                                                    <input type="text" class="form-control" 
                                                        name="ed_tender_cost[]" id="ed_tender_cost[]">
                                                </td>
                                                <td>
                                                            <input type="text" class="form-control"
                                                                name="ed_project_cost[]"                                                            id="ed_project_cost">
                                                        </td>
                                                <td>
                                                    <input type="text" class="form-control" 
                                                        id="ed_paid_amount[]" name="ed_paid_amount[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" 
                                                        name="ed_expenditure_amount[]" id="ed_expenditure_amount[]">
                                                </td>
                                              
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="ed_expenditure[]" id="ed_expenditure[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="ed_work[]" id="ed_work[]">
                                                </td>
                                                <td>
                                                    <select class="form-select" name="ed_amount_for[]" id="ed_amount_for[]">
                                                        <option value="Utility">Utility</option>
                                                        <option value="Testing">Testing </option>
                                                        <option value="Bill">Bill</option>
                                                        <option value="Other">Other </option>
                                                        <option value="Financial Progress">Financial Progress </option>
                                                        <option value="Figical Progress">Figical Progress </option>
                                                        <option value="Tpi">Tpi </option>
                                                     

                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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


        document.addEventListener('DOMContentLoaded', function() {
            const amountInput = document.getElementById('ed_expenditure_amount');
            const resultInput = document.getElementById('ed_expenditure');

            // Add an input event listener to the amount field
            amountInput.addEventListener('input', function() {
                // Get the entered amount and convert it to a number
                const enteredAmount = parseFloat(amountInput.value);

                if (!isNaN(enteredAmount)) {
                    // Calculate 100 * 0.09 of the entered amount
                    const calculatedValue = enteredAmount * 100 * 0.09;

                    // Update the result field with the calculated value
                    resultInput.value = calculatedValue.toFixed(2); // Display with 2 decimal places
                } else {
                    // Clear the result field if the entered amount is not a valid number
                    resultInput.value = '';
                }
            });
        });




        document.addEventListener('DOMContentLoaded', function() {
            const amountInputs = document.querySelectorAll('#ed_paid_amount');
            const categoryDropdowns = document.querySelectorAll('#ed_amount_for');
            const totalElements = document.querySelectorAll('.total_detail span');

            // Add an input event listener to each amount input and dropdown
            amountInputs.forEach(function(input, index) {
                input.addEventListener('input', updateTotal);
                categoryDropdowns[index].addEventListener('change', updateTotal);
            });

            function updateTotal() {
                let totalUtility = 0;
                let totalTesting = 0;
                let totalBill = 0;
                let totalOther = 0;
                let totalFinancialProgress = 0;
                let totalFigicalProgress = 0;
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
                    } else if (selectedCategory === 'Figical Progress') {
                        totalFigicalProgress += amount;
                    } else if (selectedCategory === 'Tpi') {
                        totalTpi += amount;
                    }
                });

                // Calculate the grand total
                const grandTotal = totalUtility + totalTesting + totalBill + totalOther + totalFinancialProgress +
                    totalFigicalProgress + totalTpi;

                // Display the total for each category
                totalElements[0].textContent = totalUtility;
                totalElements[1].textContent = totalTesting;
                totalElements[2].textContent = totalBill;
                totalElements[3].textContent = totalOther;
                totalElements[4].textContent = totalFinancialProgress;
                totalElements[5].textContent = totalFigicalProgress;
                totalElements[6].textContent = totalTpi;
                totalElements[7].textContent = grandTotal;
            }
            // Calculate the initial totals
            updateTotal();
        });
    </script>
@endsection
