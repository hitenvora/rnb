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
                                <h5 class="mb-0 font-primary text-center">Work Status</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="work_status">
                                    <div class="col-lg-6">
                                        <label for="inputtitle1" class="form-label">Acctual Complate Date Yes/No</label>
                                        <select class="form-select" id="work_yes_no" name="work_yes_no">
                                            <option value="Yes">Yes</option>
                                            <option selected value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label"> Acctual Complate Date</label>
                                        <input type="date" class="form-control" id="ws_sd_completion"
                                            name="ws_sd_completion" placeholder="Enter SD(Security Deposit) Completion Date"
                                            value="{{ $project_master->ws_sd_completion }}" style="display: none">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="inputtitle1" class="form-label">Date OF intiacle Yes/No</label>
                                        <select class="form-select" id="acctual_yes_no" name="acctual_yes_no">
                                            <option value="Yes">Yes</option>
                                            <option selected value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">SD Release Date</label>
                                        <input type="date" class="form-control" id="ws_sd_release" name="ws_sd_release"
                                            value="{{ $project_master->ws_sd_release }}" style="display: none">
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary submit-btn" id="btn_save"
                                            name="sub_client">Save</button>
                                    </div>
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
                            toastr.success("Project Master added successfully.");
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
            const workYesNoSelect = document.getElementById('work_yes_no');
            const zadCompilationInput = document.getElementById('ws_sd_completion');

            workYesNoSelect.addEventListener('change', function() {
                if (workYesNoSelect.value === 'Yes') {
                    // If 'Yes' is selected, show the z_zad_compilation input
                    zadCompilationInput.style.display = 'block';
                } else {
                    // If 'No' is selected or nothing is selected, hide the z_zad_compilation input
                    zadCompilationInput.style.display = 'none';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const workYesNoSelect = document.getElementById('acctual_yes_no');
            const zadCompilationInput = document.getElementById('ws_sd_release');

            workYesNoSelect.addEventListener('change', function() {
                if (workYesNoSelect.value === 'Yes') {
                    // If 'Yes' is selected, show the z_zad_compilation input
                    zadCompilationInput.style.display = 'block';
                } else {
                    // If 'No' is selected or nothing is selected, hide the z_zad_compilation input
                    zadCompilationInput.style.display = 'none';
                }
            });
        });
    </script>
@endsection
