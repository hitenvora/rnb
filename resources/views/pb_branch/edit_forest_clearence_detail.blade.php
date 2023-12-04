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
                                <h5 class="mb-0 font-primary text-center">Forest Clearance Detail</h5>
                            </div>
                            <div class="card-body">
                                <form class="row" method="post" enctype="multipart/form-data" id="master_id">
                                    @csrf
                                    <input type="hidden" name="master_id" id="master_id" value="{{ $project_master->id }}">
                                    <input type="hidden" name="step" value="forest_cleaner">

                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Chainage</label>
                                        <input type="text" class="form-control" id="forest_chainage"
                                            name="forest_chainage" placeholder="Enter Chainage"
                                            value="{{ $project_master->forest_chainage }}">
                                    </div>


                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Protected/Non Protected</label>
                                        <div class="form-control checkboxes d-flex gap-3">
                                            @php
                                                $forest_protected = [];
                                                if (isset($project_master->forest_protected)) {
                                                    $forest_protected = explode(',', $project_master->forest_protected);
                                                }
                                            @endphp
                                            <label class="mb-0">
                                                <input class="form-check-input" name="forest_protected[]"
                                                    id="forest_protected[]" type="checkbox" @checked(in_array('Protected', $forest_protected))
                                                    value="Protected">Protected
                                            </label>
                                            <label class="mb-0">
                                                <input class="form-check-input" name="forest_protected[]"
                                                    id="forest_protected[]" type="checkbox"@checked(in_array('Non Protected', $forest_protected))
                                                    value="Non Protected">Non
                                                Protected
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">No. Of Trees</label>
                                        <input type="text" class="form-control" id="forest_no_trees"
                                            name="forest_no_trees" value="{{ $project_master->forest_no_trees }}">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Area(hect.)</label>
                                        <input type="text" class="form-control" id="forest_area_hect"
                                            name="forest_area_hect" value="{{ $project_master->forest_area_hect }}">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 mt-1">
                                        <label class="form-label">Approval to be accorded by District/State/Gandhinagar
                                        </label>
                                        <input type="text" class="form-control" id="forest_appr_state"
                                            name="forest_appr_state" placeholder="Enter District/State/Gandhinagar"
                                            value="{{ $project_master->forest_appr_state }}">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 mt-4">
                                        <label class="form-label">Proposal Submitted To</label>
                                        <input type="text" class="form-control" id="forest_proposal_submit"
                                            name="forest_proposal_submit" placeholder="Proposal Submitted To"
                                            value="{{ $project_master->forest_proposal_submit }}">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 mt-4">
                                        <label class="form-label">Letter No.</label>
                                        <input type="text" class="form-control" id="forest_letter_no"
                                            name="forest_letter_no" placeholder="Enter Letter No."
                                            value="{{ $project_master->forest_letter_no }}">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 mt-4">
                                        <label class="form-label">Letter Date</label>
                                        <input type="date" class="form-control" id="forest_letter_date"
                                            name="forest_letter_date" value="{{ $project_master->forest_letter_date }}">
                                    </div>

                                    <div class="col-xl-6  col-lg-12">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="forest_upload_img"
                                                name="forest_upload_img" value="{{ $project_master->forest_upload_img }}">
                                            @isset($project_master->forest_upload_img)
                                                <a href="{{ asset('uplode_images/forest_clearance_detail/' . $project_master->forest_upload_img) }}"
                                                    target="_blank">
                                                    <br>Open Image in New Tab
                                                </a>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Online Proposal Submission No.</label>
                                        <input type="text" class="form-control" id="forest_online_no"
                                            name="forest_online_no" placeholder="Enter Online Proposal Submission No."
                                            value="{{ $project_master->forest_online_no }}">
                                    </div>
                                    <div class="col-xl-3 col-lg-6">
                                        <label class="form-label">Online Proposal Submission Date</label>
                                        <input type="date" class="form-control" id="forest_online_date"
                                            name="online_date" value="{{ $project_master->forest_online_date }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Joint Site Visit with RFO based on Proposal for 'Marking
                                            Kharda'</label>
                                        <textarea rows="9" class="form-control" id="forest_joint_site" name="forest_joint_site"
                                            placeholder="Enter Name of Road,Length & Width As Per F1-F2 with Challenge">{{ $project_master->forest_joint_site }}</textarea>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Approved By</label>
                                        <select class="form-select" id="forest_approved_by" name="forest_approved_by">
                                            <option value="Government"@selected($project_master->forest_approved_by == 'Government')>Government</option>
                                            <option value="Circle"@selected($project_master->forest_approved_by == 'Circle')>Circle</option>
                                            <option value="Divison"@selected($project_master->forest_approved_by == 'Divison')>Divison</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Letter No.</label>
                                        <input type="text" class="form-control" id="forest_l_no" name="forest_l_no"
                                            placeholder="Enter Letter No." value="{{ $project_master->forest_l_no }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Letter Upload</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control w-100" id="forest_letter_img"
                                                name="forest_letter_img"
                                                value="{{ $project_master->forest_letter_img }}">
                                            @isset($project_master->forest_letter_img)
                                                <a href="{{ asset('uplode_images/forest_clearance_detail/' . $project_master->forest_letter_img) }}"
                                                    target="_blank">
                                                    <br>Open Image in New Tab
                                                </a>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Final Approval Received Detail</label>
                                        <textarea rows="9" class="form-control" id="forest_final_approval" name="forest_final_approval"
                                            placeholder="Enter Final Approval Received Detail">{{ $project_master->forest_final_approval }}</textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-label">Status</label>
                                        <textarea rows="9" class="form-control" id="forest_status" name="forest_status"
                                            placeholder="Enter Name of Road,Length & Width As Per F1-F2 with Challenge">{{ $project_master->forest_status }}</textarea>
                                    </div>
                                    <div class="col-12 text-center mt-3">
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


        $(document).on('click', '.add-division', function() {
            $('.modal-title').text('Add Principal Approval Master');
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
                            toastr.success("Forest Clearence added successfully.");
                        } else {
                            toastr.success("Forest Clearence updated successfully.");
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
