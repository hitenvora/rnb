@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.auditor_account.auditor_account_navbar')

    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Expenditure Detail</h5>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive expen_table">
                                    <table class="exp_detail table-bordered">
                                        <thead>
                                            <th>Original Work Expense On Date</th>
                                            <th>Tender Cost</th>
                                            <th>Paid Amount</th>
                                            <th>Expenditure Amount</th>
                                            <th>9% with CC Expenditure</th>
                                            <th>Work(%)</th>
                                            <th>Amount For</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <form class="row" method="post" enctype="multipart/form-data"
                                                        id="master_id">
                                                        @csrf
                                                        <input type="hidden" name="master_id" id="master_id">

                                                        <input type="date" id="ed_origin_work" name="ed_origin_work"
                                                            class="form-control" value="2022-09-16">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="10000"
                                                        name="ed_tender_cost" id="ed_tender_cost">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="1000"
                                                        id="ed_paid_amount" name="ed_paid_amount">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12000"
                                                        name="ed_expenditure_amount" id="ed_expenditure_amount">
                                                </td>
                                                <!-- show total + 9 % value -->
                                                <td>
                                                    <input type="text" class="form-control" value="9%"
                                                        name="ed_expenditure" id="ed_expenditure">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="0.00%" name="ed_work"
                                                        id="ed_work">
                                                </td>
                                                <td>
                                                    <select class="form-select" name="ed_amount_for" id="ed_amount_for">
                                                        <option value="Utility">Utility</option>
                                                        <option value="Testing">Testing </option>
                                                        <option value="Bill">Bill</option>
                                                        <option value="Other">Other </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td>
                                                    <input type="date" id="original_work" class="form-control"
                                                        value="2022-09-16">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="10000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="1000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="9%">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="0.00%">
                                                </td>
                                                <td>
                                                    <select class="form-select" name="amount_for" id="amount_for">
                                                        <option value="Utility">Utility</option>
                                                        <option value="Testing">Testing </option>
                                                        <option value="Bill">Bill</option>
                                                        <option value="Other">Other </option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="date" id="original_work" class="form-control"
                                                        value="2022-09-16">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="10000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="1000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="12000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="9%">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="0.00%">
                                                </td>
                                                <td>
                                                    <select class="form-select" name="amount_for" id="amount_for">
                                                        <option value="Utility">Utility</option>
                                                        <option value="Testing">Testing </option>
                                                        <option value="Bill">Bill</option>
                                                        <option value="Other">Other </option>
                                                    </select>
                                                </td>
                                            </tr> --}}

                                            <tr>
                                                <td class="text-end border" colspan="6">
                                                    <a class="btn btn-warning add_btn" id="add_button" name="add_button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                            height="18" viewBox="0 0 19 18" fill="none">
                                                            <path d="M9.5 3.75V14.25M4.25 9H14.75" stroke="white"
                                                                stroke-width="1.67" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        Add
                                                    </a>
                                                </td>

                                            </tr>
                                        </tbody>

                                    </table>
                                    <button type="submit" class="btn submit-btn btn btn-primary" id="btn_save"
                                        name="sub_client">Save</button>
                                </div>
                                </form>
                                <ul class="total_detail">
                                    <li>
                                        <div class="d-flex">
                                            <h6>Utility</h6>
                                            <span>1000</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <h6>Testing</h6>
                                            <span>1000</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <h6>Other</h6>
                                            <span>1000</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <h6>Bill</h6>
                                            <span>1000</span>
                                        </div>
                                    </li>
                                    <li class="total_field">
                                        <div class="d-flex">
                                            <h6>Total</h6>
                                            <span>4000</span>
                                        </div>
                                    </li>
                                </ul>
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


$(document).on('click', '.add-division', function() {
    $('.modal-title').text('Add Proposal Master');
    $('#master_id').val('');
    $("#master_id")[0].reset();
    $('span[id$="_error"]').text('');

});

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
                    toastr.success("Proposal Master added successfully.");
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
    </script>
@endsection
