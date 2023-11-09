@extends('layout.layout')
@section('style')
@endsection

@section('content')
    {{-- @include('navbar.current_reapring.current_reapring_navbar') --}}
    @include('navbar.current_reapring.edit_current_reapring_navbar')


    <body>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card branch-card">
                            <div class="card-header">
                                <h5 class="mb-0 font-primary text-center">Bill</h5>
                            </div>
                            <div class="row">
                                <span class="text-end" style="width: 80%;">
                                    <a class="btn btn-light-warning px-3 border rounded" id="add-bill">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M10.0003 4.16675V15.8334M4.16699 10.0001H15.8337" stroke="#802B81"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg> Add
                                    </a>
                                </span>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_form">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $cr_update->id }}">
                                    <input type="hidden" name="step" value="cr_bill">
                                    <div class="" id="bill-data">
                                        @forelse ($reparing_bills as $key => $bill)
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="form-label">Bill Status</label>
                                                    <select class="form-select" name="bill_status[]">
                                                        <option value="">Secect Bill Status</option>
                                                        <option value="First" @selected($bill->bill_status == 'First')>First</option>
                                                        <option value="Second" @selected($bill->bill_status == 'Second')>Second</option>
                                                        <option value="Third" @selected($bill->bill_status == 'Third')>Third</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Amount</label>
                                                    <input type="text" class="form-control" name="amount[]"
                                                        value="{{ $bill->amount }}">
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Bill Date</label>
                                                    <input type="date" class="form-control" name="bill_date[]"
                                                        value="{{ $bill->bill_date }}">
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-check form-label">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Is Final
                                                        </label>
                                                    </div>
                                                    <input class="form-check-input is_final" type="checkbox"
                                                        name="is_final[$key]" @checked($bill->is_final)>
                                                </div>
                                                <div class="col-lg-1">
                                                    <span class="text-end" colspan="2">
                                                        <a class="btn btn-light-warning px-3  delete-btn"
                                                            data-bill_id="{{ $bill->id }}">
                                                            Remove
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label class="form-label">Bill Status</label>
                                                    <select class="form-select" name="bill_status[]">
                                                        <option value="">Secect Bill Status</option>
                                                        <option value="First">First</option>
                                                        <option value="Second">Second</option>
                                                        <option value="Third">Third</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Amount</label>
                                                    <input type="text" class="form-control" name="amount[]">
                                                </div>
                                                <div class="col-lg-2">
                                                    <label class="form-label">Bill Date</label>
                                                    <input type="date" class="form-control" name="bill_date[]">
                                                </div>
                                                <div class="col-lg-1">
                                                    <div class="form-check form-label">
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Is Final
                                                        </label>
                                                    </div>
                                                    <input class="form-check-input is_final" type="checkbox"
                                                        name="is_final[0]">
                                                </div>
                                            </div>
                                        @endforelse

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
    </body>
@endsection

@section('script')
    <script>
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
                            toastr.success("Bill added successfully");
                        } else {
                            toastr.success("Bill updated successfully");
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
                            $("#" + key + "_error").text(val[0]);
                        });
                    }
                }
            });
        });

        $("#add-bill").click(function() {
            let html = `<div class="row">
                                            <div class="col-lg-2">
                                                <label class="form-label">Bill Status</label>
                                                <select class="form-select"  name="bill_status[]">
                                                    <option value="">Secect Bill Status</option>
                                                    <option value="First">First</option>
                                                    <option value="Second">Second</option>
                                                    <option value="Third">Third</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="form-label">Amount</label>
                                                <input type="text" class="form-control" name="amount[]">
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="form-label">Bill Date</label>
                                                <input type="date" class="form-control" name="bill_date[]">
                                            </div>
                                            <div class="col-lg-1">
                                                <div class="form-check form-label">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Is Final
                                                    </label>
                                                </div>
                                                <input class="form-check-input is_final" type="checkbox" name="is_final[]">
                                            </div>
                                            <div class="col-lg-1">
                                                <span class="text-end" colspan="2">
                                                    <a class="btn btn-light-warning px-3 remove-btn">
                                                        Remove
                                                    </a>
                                                </span>
                                            </div>
                                        </div>`;
            $("#bill-data").append(html);
            $.each($('.is_final'), function(index, value) {
                $(value).attr('name', `is_final[${index}]`);
            });
        });

        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.row').remove();
            $.each($('.is_final'), function(index, value) {
                $(value).attr('name', `is_final[${index}]`);
            });
        });

        $(document).on('click', '.delete-btn', function() {
            let bill_id = $(this).data('bill_id');
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: "{{ route('delete_repairing_bill') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    bill_id: bill_id,
                },
                success: (data) => {
                    // $(this).closest('.row').remove();
                    location.reload();
                    $.each($('.is_final'), function(index, value) {
                        $(value).attr('name', `is_final[${index}]`);
                    });
                },
            });
        });
    </script>
@endsection
