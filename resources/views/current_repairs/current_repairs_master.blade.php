@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.admin.master-page.master_navbar')

    <body>
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        <a class="btn-left d-flex align-items-center gap-3" href="{{ route('master_form') }}">
                                            <span class="d-flex back-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M7.83 11L11.41 7.41L10 6L4 12L10 18L11.41 16.59L7.83 13H20V11H7.83Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <h3>Current Repairing Master</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                                    @if (in_array(auth()->user()->role_id, [1]))
                                        {{-- <a class="btn btn-white" href="{{ route('project_export') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M2.70117 11.4142L2.70117 14.1936C2.70117 14.6148 2.86711 15.0188 3.16248 15.3167C3.45785 15.6145 3.85846 15.7818 4.27617 15.7818H13.7262C14.1439 15.7818 14.5445 15.6145 14.8399 15.3167C15.1352 15.0188 15.3012 14.6148 15.3012 14.1936V11.4142M9.00205 2.2168V11.2168M9.00205 11.2168L12.602 7.77793M9.00205 11.2168L5.40205 7.77793"
                                                    stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Export
                                        </a> --}}
                                        <a class="btn btn-primary ms-2 add-division" href="{{ route('curent_reaparing') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Add Project
                                        </a>
                                    @endif
                                    @if (in_array(auth()->user()->role_id, [2]))
                                        <a class="btn btn-primary ms-2 add-division" href="{{ route('curent_reaparing') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Add Project
                                        </a>
                                    @endif
                                    @if (in_array(auth()->user()->role_id, [3]))
                                        <a class="btn btn-primary ms-2 add-division" href="{{ route('curent_reaparing') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Add Project
                                        </a>
                                    @endif
                                    @if (in_array(auth()->user()->role_id, [4]))
                                        <a class="btn btn-primary ms-2 add-division" href="{{ route('curent_reaparing') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Add Project
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="mg-b-23">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>No</th>

                                            <th>Road Name</th>
                                            <th>Name Of Section</th>


                                        </tr>
                                    </thead>
                                    <tbody id="contactData">
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
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

        var dataTable = $('.product-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            autoWidth: false,
            pageLength: 10,
            language: {
                search: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.5 17.5L13.875 13.875M15.8333 9.16667C15.8333 12.8486 12.8486 15.8333 9.16667 15.8333C5.48477 15.8333 2.5 12.8486 2.5 9.16667C2.5 5.48477 5.48477 2.5 9.16667 2.5C12.8486 2.5 15.8333 5.48477 15.8333 9.16667Z" stroke="#5E5873" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                searchPlaceholder: "Search",
                oPaginate: {
                    sNext: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                    sPrevious: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                },
            },
            ajax: {
                url: "{{ route('cr_master') }}",
                data: function(d) {
                    d._token = token;
                },
                type: 'POST',
            },
            columns: [{
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                // {
                //     data: 'cr_road_name',
                //     name: 'cr_road_name'
                // },
                {
                    data: 'cr_name_of_section',
                    name: 'cr_name_of_section'
                },
                // {
                //     data: 'name_of_schema',
                //     name: 'name_of_schema'
                // },
                // {
                //     data: 'project_name',
                //     name: 'project_name'
                // },
                // {
                //     data: 'district_name_view',
                //     name: 'district_name_view'
                // },

                // {
                //     data: 'basic_name_of_road',
                //     name: 'basic_name_of_road'
                // },
                // {
                //     data: 'basic_category_of_road',
                //     name: 'basic_category_of_road'
                // },
                // {
                //     data: 'initiated_name',
                //     name: 'initiated_name'
                // },
                // {
                //     data: 'ppd_treatment_detail',
                //     name: 'ppd_treatment_detail'
                // },
                // {
                //     data: 'basic_amount',
                //     name: 'basic_amount'
                // },
                // {
                //     data: 'name_of_schema',
                //     name: 'name_of_schema'
                // },
                //  {
                //     data: 'ppd_proposal_submitted_letter_date',
                //     name: 'ppd_proposal_submitted_letter_date'
                // },
                // {
                //     data: 'ppd_proposal_submission_office',
                //     name: 'ppd_proposal_submission_office'
                // },



            ],

        });





        function editmaster(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('edit-project-master') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('#master_id').val(data.data.id);
                    $('#basic_name_scheme').val(data.data.basic_name_scheme);
                    $('#basic_name_project').val(data.data.basic_name_project);
                    $('#basic_wms_work_head').val(data.data.basic_wms_work_head);
                    $('#district_id').val(data.data.district_id);

                    window.location = "{{ route('basic_branch') }}";
                },
                error: function(response) {
                    toastr.error(response.msg);
                }
            });
        }





        function daletetabledata(id) {
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this data!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
                backdrop: 'static', // Prevents clicking outside the modal to dismiss
            }).then(function(result) {
                if (result.isConfirmed) { // Check if the "Yes, I am sure!" button was clicked
                    _data = {};
                    _data['id'] = id;
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('cr_delete') }}",
                        headers: {
                            'X-CSRF-Token': token,
                        },
                        data: _data,
                        dataType: "json",
                        success: (data) => {
                            dataTable.draw();
                        },
                        error: function(response) {}
                    });
                } else {
                    swal.fire("Cancelled", "Your data is safe :)", "error");
                }
            });
        }
    </script>
@endsection
