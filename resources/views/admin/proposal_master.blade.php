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
                                            <h3>Proposal Master</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">

                                    <a class="btn btn-primary ms-2 add-division" data-bs-toggle="modal"
                                        data-bs-target="#add_proposal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Add Proposal
                                    </a>
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
                                            <th>#</th>
                                            <th>District</th>
                                            <th>Taluka</th>
                                            <th>Work Type</th>
                                            <th>Type Of Work</th>
                                            <th>Budget</th>
                                            <th>Date</th>
                                            <th>Letter No.</th>
                                            <th>Amt. in Lakh</th>
                                            <th>Received From</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Surat</td>
                                            <td>Kamrej</td>
                                            <td>Road</td>
                                            <td>Surfacing</td>
                                            <td>-</td>
                                            <td>1234412</td>
                                            <td>13/09/2023</td>
                                            <td>1,00,000</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex gap-1 icons-wrap">

                                                    <li>
                                                        <a title="edit" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editmodal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M4.05882 5.0791H3.03921C2.49838 5.0791 1.9797 5.29395 1.59727 5.67637C1.21484 6.0588 1 6.57748 1 7.11831V16.2948C1 16.8356 1.21484 17.3543 1.59727 17.7367C1.9797 18.1191 2.49838 18.334 3.03921 18.334H12.2157C12.7565 18.334 13.2752 18.1191 13.6576 17.7367C14.04 17.3543 14.2549 16.8356 14.2549 16.2948V15.2752"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.2361 3.03932L16.2949 6.09814M17.7071 4.6554C18.1087 4.25383 18.3343 3.70919 18.3343 3.14128C18.3343 2.57338 18.1087 2.02874 17.7071 1.62717C17.3055 1.2256 16.7609 1 16.193 1C15.6251 1 15.0804 1.2256 14.6789 1.62717L6.09888 10.1766V13.2354H9.1577L17.7071 4.6554Z"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a title="delete" href="javascript:void(0)" class="delete_doc"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M2.5 4.99996H4.16667M4.16667 4.99996H17.5M4.16667 4.99996V16.6666C4.16667 17.1087 4.34226 17.5326 4.65482 17.8451C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8451C15.6577 17.5326 15.8333 17.1087 15.8333 16.6666V4.99996H4.16667ZM6.66667 4.99996V3.33329C6.66667 2.89127 6.84226 2.46734 7.15482 2.15478C7.46738 1.84222 7.89131 1.66663 8.33333 1.66663H11.6667C12.1087 1.66663 12.5326 1.84222 12.8452 2.15478C13.1577 2.46734 13.3333 2.89127 13.3333 3.33329V4.99996M8.33333 9.16663V14.1666M11.6667 9.16663V14.1666"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a title="View" href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#viewmodal">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="20" viewBox="0 0 24 24"
                                                                fill="none" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                                    stroke-width="1.52941"></path>
                                                                <circle cx="12" cy="12" r="3">
                                                                </circle>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Surat</td>
                                            <td>Kamrej</td>
                                            <td>Road</td>
                                            <td>Surfacing</td>
                                            <td>-</td>
                                            <td>1234412</td>
                                            <td>13/09/2023</td>
                                            <td>1,00,000</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex gap-1 icons-wrap">

                                                    <li>
                                                        <a title="edit" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editmodal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M4.05882 5.0791H3.03921C2.49838 5.0791 1.9797 5.29395 1.59727 5.67637C1.21484 6.0588 1 6.57748 1 7.11831V16.2948C1 16.8356 1.21484 17.3543 1.59727 17.7367C1.9797 18.1191 2.49838 18.334 3.03921 18.334H12.2157C12.7565 18.334 13.2752 18.1191 13.6576 17.7367C14.04 17.3543 14.2549 16.8356 14.2549 16.2948V15.2752"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.2361 3.03932L16.2949 6.09814M17.7071 4.6554C18.1087 4.25383 18.3343 3.70919 18.3343 3.14128C18.3343 2.57338 18.1087 2.02874 17.7071 1.62717C17.3055 1.2256 16.7609 1 16.193 1C15.6251 1 15.0804 1.2256 14.6789 1.62717L6.09888 10.1766V13.2354H9.1577L17.7071 4.6554Z"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a title="delete" href="javascript:void(0)" class="delete_doc"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M2.5 4.99996H4.16667M4.16667 4.99996H17.5M4.16667 4.99996V16.6666C4.16667 17.1087 4.34226 17.5326 4.65482 17.8451C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8451C15.6577 17.5326 15.8333 17.1087 15.8333 16.6666V4.99996H4.16667ZM6.66667 4.99996V3.33329C6.66667 2.89127 6.84226 2.46734 7.15482 2.15478C7.46738 1.84222 7.89131 1.66663 8.33333 1.66663H11.6667C12.1087 1.66663 12.5326 1.84222 12.8452 2.15478C13.1577 2.46734 13.3333 2.89127 13.3333 3.33329V4.99996M8.33333 9.16663V14.1666M11.6667 9.16663V14.1666"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a title="View" href="javascript:void(0)">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="20" viewBox="0 0 24 24"
                                                                fill="none" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                                    stroke-width="1.52941"></path>
                                                                <circle cx="12" cy="12" r="3">
                                                                </circle>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Surat</td>
                                            <td>Kamrej</td>
                                            <td>Road</td>
                                            <td>Surfacing</td>
                                            <td>-</td>
                                            <td>1234412</td>
                                            <td>13/09/2023</td>
                                            <td>1,00,000</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex gap-1 icons-wrap">

                                                    <li>
                                                        <a title="edit" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editmodal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M4.05882 5.0791H3.03921C2.49838 5.0791 1.9797 5.29395 1.59727 5.67637C1.21484 6.0588 1 6.57748 1 7.11831V16.2948C1 16.8356 1.21484 17.3543 1.59727 17.7367C1.9797 18.1191 2.49838 18.334 3.03921 18.334H12.2157C12.7565 18.334 13.2752 18.1191 13.6576 17.7367C14.04 17.3543 14.2549 16.8356 14.2549 16.2948V15.2752"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.2361 3.03932L16.2949 6.09814M17.7071 4.6554C18.1087 4.25383 18.3343 3.70919 18.3343 3.14128C18.3343 2.57338 18.1087 2.02874 17.7071 1.62717C17.3055 1.2256 16.7609 1 16.193 1C15.6251 1 15.0804 1.2256 14.6789 1.62717L6.09888 10.1766V13.2354H9.1577L17.7071 4.6554Z"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a title="delete" href="javascript:void(0)" class="delete_doc"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M2.5 4.99996H4.16667M4.16667 4.99996H17.5M4.16667 4.99996V16.6666C4.16667 17.1087 4.34226 17.5326 4.65482 17.8451C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8451C15.6577 17.5326 15.8333 17.1087 15.8333 16.6666V4.99996H4.16667ZM6.66667 4.99996V3.33329C6.66667 2.89127 6.84226 2.46734 7.15482 2.15478C7.46738 1.84222 7.89131 1.66663 8.33333 1.66663H11.6667C12.1087 1.66663 12.5326 1.84222 12.8452 2.15478C13.1577 2.46734 13.3333 2.89127 13.3333 3.33329V4.99996M8.33333 9.16663V14.1666M11.6667 9.16663V14.1666"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a title="View" href="javascript:void(0)">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="20" viewBox="0 0 24 24"
                                                                fill="none" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                                    stroke-width="1.52941"></path>
                                                                <circle cx="12" cy="12" r="3">
                                                                </circle>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Surat</td>
                                            <td>Kamrej</td>
                                            <td>Road</td>
                                            <td>Surfacing</td>
                                            <td>-</td>
                                            <td>1234412</td>
                                            <td>13/09/2023</td>
                                            <td>1,00,000</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td>
                                                <ul class="d-flex gap-1 icons-wrap">

                                                    <li>
                                                        <a title="edit" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editmodal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M4.05882 5.0791H3.03921C2.49838 5.0791 1.9797 5.29395 1.59727 5.67637C1.21484 6.0588 1 6.57748 1 7.11831V16.2948C1 16.8356 1.21484 17.3543 1.59727 17.7367C1.9797 18.1191 2.49838 18.334 3.03921 18.334H12.2157C12.7565 18.334 13.2752 18.1191 13.6576 17.7367C14.04 17.3543 14.2549 16.8356 14.2549 16.2948V15.2752"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M13.2361 3.03932L16.2949 6.09814M17.7071 4.6554C18.1087 4.25383 18.3343 3.70919 18.3343 3.14128C18.3343 2.57338 18.1087 2.02874 17.7071 1.62717C17.3055 1.2256 16.7609 1 16.193 1C15.6251 1 15.0804 1.2256 14.6789 1.62717L6.09888 10.1766V13.2354H9.1577L17.7071 4.6554Z"
                                                                    stroke-width="1.52941" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a title="delete" href="javascript:void(0)" class="delete_doc"
                                                            title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M2.5 4.99996H4.16667M4.16667 4.99996H17.5M4.16667 4.99996V16.6666C4.16667 17.1087 4.34226 17.5326 4.65482 17.8451C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8451C15.6577 17.5326 15.8333 17.1087 15.8333 16.6666V4.99996H4.16667ZM6.66667 4.99996V3.33329C6.66667 2.89127 6.84226 2.46734 7.15482 2.15478C7.46738 1.84222 7.89131 1.66663 8.33333 1.66663H11.6667C12.1087 1.66663 12.5326 1.84222 12.8452 2.15478C13.1577 2.46734 13.3333 2.89127 13.3333 3.33329V4.99996M8.33333 9.16663V14.1666M11.6667 9.16663V14.1666"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a title="View" href="javascript:void(0)">
                                                            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                                width="20" height="20" viewBox="0 0 24 24"
                                                                fill="none" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                                    stroke-width="1.5"></path>
                                                                <circle cx="12" cy="12" r="3"
                                                                    stroke-width="1.52941"></circle>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody> --}}
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

        <div class="modal fade common-modal" id="add_proposal" tabindex="-1" aria-labelledby="add_proposal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal_proposal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_finance">Add Proposal</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="proposal_master_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="proposal_master_id" id="proposal_master_id">
                            <div class="col-lg-4">
                                <label class="form-label">District</label>
                                <select class="form-select" id="district_id" name="district_id">
                                    <option value="">Select District</option>
                                    @foreach ($districtname as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="district_id_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Taluka</label>
                                <select class="form-select" id="taluka_id" name="taluka_id">
                                    <option value="">Select Taluka</option>
                                    @foreach ($talukaname as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                    <span class="text-danger" id="taluka_id_error"></span>
                                </select>

                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Work Type</label>
                                <select class="form-select" id="work_type_id" name="work_type_id">
                                    <option value="">Select Work Type</option>
                                    @foreach ($worktype as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="work_type_id_error"></span>

                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Type Of Work</label>
                                <select class="form-select" id="type_work_id" name="type_work_id">
                                    <option value="">Select Type Of Work</option>
                                    @foreach ($typework as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="type_work_id_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="type_work" name="type_work">
                                <span class="text-danger" id="type_work_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Budget</label>
                                <select class="form-select" id="budget_id" name="budget_id">
                                    <option value="">Select Budget</option>
                                    @foreach ($budget as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                    <span class="text-danger" id="budget_id_error"></span>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="budget" name="budget">
                                <span class="text-danger" id="budget_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Budget Work / Item / Page No.</label>
                                <select class="form-select" id="budget_work_id" name="budget_work_id">
                                    <option value="">Select Budget Work</option>
                                    @foreach ($budgetwork as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                    <span class="text-danger" id="budget_work_id_error"></span>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="budget_work" name="budget_work">
                                <span class="text-danger" id="budget_work_error"></span>
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Amount in Lakh</label>
                                <input type="text" class="form-control" id="amount" name="amount"
                                    placeholder="Enter Amount">
                                <span class="text-danger" id="amount_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">MP/MLA Suggested</label>
                                <select class="form-select" id="mp_mla_id" name="mp_mla_id">
                                    <option value="">Select MP/MLA Suggested</option>
                                    @foreach ($mpmla as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="mp_mla_id_error"></span>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="mp_mla" name="mp_mla">
                                <span class="text-danger" id="mp_mla_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter No.</label>
                                <input type="text" class="form-control" id="letter_no" name="letter_no">
                                <span class="text-danger" id="letter_no_error"></span>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter Date</label>
                                <input type="date" class="form-control" id="letter_date" name="letter_date">
                                <span class="text-danger" id="letter_date_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Letter Upload</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="upload_img" name="upload_img">
                                    <span class="text-danger" id="upload_img_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Suggestion</label>
                                <input type="text" class="form-control" id="suggest" name="suggest"
                                    placeholder="Enter Suggestion">
                                <span class="text-danger" id="suggest_error"></span>

                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Received Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Received Proposal From</label>
                                            <input class="form-control" type="text" id="recever_from"
                                                name="recever_from" placeholder="From">
                                            <span class="text-danger" id="recever_from_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="rec_letter_no"
                                                name="rec_letter_no" placeholder="Enter Letter No.">
                                            <span class="text-danger" id="rec_letter_no_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="rec_letter_date"
                                                name="rec_letter_date">
                                            <span class="text-danger" id="rec_letter_date_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="rec_letter_amount"
                                                name="rec_letter_amount">
                                            <span class="text-danger" id="rec_letter_amount_error"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Sent Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Sent Proposal To</label>
                                            <input class="form-control" type="text" id="sent_proposal"
                                                name="sent_proposal" placeholder="To">
                                            <span class="text-danger" id="sent_proposal_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="sent_proposal_letter_no"
                                                name="sent_proposal_letter_no" placeholder="Enter Letter No.">
                                            <span class="text-danger" id="sent_proposal_letter_no_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="sent_proposal_date"
                                                name="sent_proposal_date">
                                            <span class="text-danger" id="sent_proposal_date_error"></span>

                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="sent_proposal_amount"
                                                name="sent_proposal_amount">
                                            <span class="text-danger" id="sent_proposal_amount_error"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Sent Box</label>
                                <select class="form-select" id="sent_box_id" name="sent_box_id">
                                    <option value="">Select Sent Box</option>
                                    @foreach ($sentbox as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="sent_box_id_error"></span>

                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="sent_box" name="sent_box">
                                <span class="text-danger" id="sent_box_error"></span>


                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="sent_box_date" name="sent_box_date">
                                <span class="text-danger" id="sent_box_date_error"></span>

                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="sent_box_remark" name="sent_box_remark"
                                    placeholder="Enter Remarks...">
                                <span class="text-danger" id="sent_box_remark_error"></span>

                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save"
                                    name="sub_client">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="modal fade common-modal" id="editmodal" tabindex="-1" aria-labelledby="editmodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal_proposal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_finance">Edit Proposal</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post">
                            <div class="col-lg-4">
                                <label class="form-label">District</label>
                                <select class="form-select" id="district" name="district">
                                    <option selected value="">Select District</option>
                                    <option value="">Rajkot</option>
                                    <option value="">Bharuch</option>
                                    <option value="">Amreli</option>
                                    <option value="">Bhavnagar</option>
                                    <option value="">Surat</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Taluka</label>
                                <select class="form-select" id="taluka" name="taluka">
                                    <option selected value="">Select Taluka</option>
                                    <option value="">Gondal</option>
                                    <option value="">Ankleshwar</option>
                                    <option value="">Dhari</option>
                                    <option value="">chorasi</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Work Type</label>
                                <select class="form-select" id="district" name="district">
                                    <option selected value="">Select Work Type</option>
                                    <option value="">Road</option>
                                    <option value="">Building</option>
                                    <option value="">Bridge</option>
                                    <option value="">Structures</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Type Of Work</label>
                                <select class="form-select" id="work" name="work">
                                    <option selected value="" disabled>Road</option>
                                    <option value="">Surfacing </option>
                                    <option value="">Strengthening </option>
                                    <option value="">Widening (3.75 to 5.5)</option>
                                    <option value="">Widening (3.75 to 7)</option>
                                    <option value="">Widening (3.75 to 10)</option>
                                    <option value="">Widening (5.5 to 7)</option>
                                    <option value="">Widening (5.5 to 10)</option>
                                    <option value="">Widening (7 to 10)</option>
                                    <option value="">Widening (7 to 4 lan)</option>
                                    <option value="">Widening (10 to 4 lan)</option>
                                    <option value="">Widening (10 to 6 lan)</option>
                                    <option value="">Widening (4 lan to 6 lan)</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="type_work" name="type_work">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Budget</label>
                                <select class="form-select" id="work" name="work">
                                    <option selected value="">Select Budget</option>
                                    <option value="">1L</option>
                                    <option value="">2L </option>
                                    <option value="">3L</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="budget" name="budget">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Budget Work / Item / Page No.</label>
                                <select class="form-select" id="work" name="work">
                                    <option selected value="" disabled>Road</option>
                                    <option value="">Surfacing </option>
                                    <option value="">Strengthening </option>
                                    <option value="">Widening (3.75 to 5.5)</option>
                                    <option value="">Widening (3.75 to 7)</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="b_work" name="b_work">
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Amount in Lakh</label>
                                <input type="text" class="form-control" id="p_amount" name="p_amount"
                                    placeholder="Enter Amount" value="One Lakh">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">MP/MLA Suggested</label>
                                <select class="form-select" id="suggestion" name="suggestion">
                                    <option selected value="">MP/MLA</option>
                                    <option value="">MLA </option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="m_suggest" name="m_suggest">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter No.</label>
                                <input type="text" class="form-control" id="L_no" name="L_no"
                                    value="123562123">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Letter Date</label>
                                <input type="date" class="form-control" id="L_date" name="L_date"
                                    value="2023-09-13">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Letter Upload</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="upload_img" name="upload_img">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Suggestion</label>
                                <input type="text" class="form-control" id="suggest" name="suggest"
                                    placeholder="Enter Suggestion">
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Received Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Received Proposal From</label>
                                            <input class="form-control" type="text" id="rec_from" name="rec_from"
                                                placeholder="From">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="Letter_No" name="Letter_No"
                                                placeholder="Enter Letter No." value="100000">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="L_date" name="L_date"
                                                value="2023-09-13">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="r_amount" name="r_amount"
                                                value="100000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="contact_list">
                                    <h6>Sent Proposal</h6>
                                    <div class="row p-0">
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Sent Proposal To</label>
                                            <input class="form-control" type="text" id="sent_to" name="sent_to"
                                                placeholder="To">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="inputtitle1" class="form-label">Letter No.</label>
                                            <input class="form-control" type="text" id="Letter_No" name="Letter_No"
                                                placeholder="Enter Letter No." value="100000">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Letter Date</label>
                                            <input type="date" class="form-control" id="L_date" name="L_date"
                                                value="2023-09-13">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" id="s_amount" name="s_amount"
                                                value="100000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Sent Box</label>
                                <select class="form-select" id="s_box" name="s_box">
                                    <option selected value="">Google Sheet</option>
                                    <option value="">Google Sheet </option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label d-lg-block d-none">&nbsp;</label>
                                <input type="text" class="form-control" id="sent_box" name="sent_box"
                                    value="Google Sheet">
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="L_date" name="L_date"
                                    value="2023-09-13">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remark" name="remark"
                                    placeholder="Enter Remarks...">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn submit-btn" id="btn_save"
                                    name="sub_client">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="modal fade view-modal" id="proposal_view" tabindex="-1" aria-labelledby="proposal_view"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="viewproduct">Proposal Detail</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="view-details">
                                    <tbody>
                                        <tr>
                                            <th>District</th>
                                            <td><span class="view-districts"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Taluka</th>
                                            <td><span class="view-taluka"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Work Type</th>
                                            <td><span class="view-work_type"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Type of Work</th>
                                            <td><span class="view-type_of_work"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Budget</th>
                                            <td><span class="view-budget"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Budget Work / Item / Page No.</th>
                                            <td><span class="view-budget_work"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Amt in Lakh</th>
                                            <td><span class="view-amount"></span></td>

                                        </tr>
                                        <tr>
                                            <th>MP/MLA Suggested</th>
                                            <td><span class="view-mp_mla"></span></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="view-details">
                                    <tbody>
                                        <tr>
                                            <th>Letter No</th>
                                            <td><span class="view-letter_no"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td><span class="view-date"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Letter Upload :</th>
                                            <td>

                                                <a href="" target="_blank"
                                                    class="view-upload_img font-primary text-decoration-underline">
                                                    View Image

                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Suggestion :</th>
                                            <td><span class="view-suggestion"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Sent Box :</th>
                                            <td><span class="view-sent_box"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td><span class="view-sent_box_date"></span></td>

                                        </tr>
                                        <tr>
                                            <th>Remark : </th>
                                            <td><span class="view-remark"></span></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="view_proposal card mb-0">
                                    <div class="card-header">
                                        <h5>Received Proposal</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="view-details">
                                            <tbody>
                                                <tr>
                                                    <th>Received Proposal From : </th>
                                                    <td><span class="view-received_proposal"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter No</th>
                                                    <td><span class="view-received_letter_no"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter Date</th>
                                                    <td><span class="view-received_letter_date"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Amount :</th>
                                                    <td><span class="view-recevid_amount"></span></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="view_proposal card mb-0">
                                    <div class="card-header">
                                        <h5>Sent Proposal</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="view-details">
                                            <tbody>
                                                <tr>
                                                    <th>Sent Proposal To : </th>
                                                    <td><span class="view-sent_proposal"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter No</th>
                                                    <td><span class="view-sent_letter_no"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Letter Date</th>
                                                    <td><span class="view-sent_letter_date"></span></td>

                                                </tr>
                                                <tr>
                                                    <th>Amount :</th>
                                                    <td><span class="view-sent_amount"></span></td>

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
        </div>
        </div>

    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";

        $('.edit-form').hide();
        $(document).on('click', '.add-division', function() {
            $('.modal-title').text('Add Proposal Master');
            $('#proposal_master_id').val('');
            $("#proposal_master_form")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('#add_proposal').modal('show');
        });

        $('#proposal_master_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('proposal_master_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#add_proposal').modal('hide');
                        if ($('#proposal_master_id').val() == '') {
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
                url: "{{ route('get_proposal_master') }}",
                data: function(d) {
                    d._token = token;
                },
                type: 'POST',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'district_name_view',
                    name: 'district_name_view'
                },
                {
                    data: 'taluka_name_view',
                    name: 'taluka_name_view'
                },
                {
                    data: 'work_type_view',
                    name: 'work_type_view'
                },
                // {
                //     data: 'type_work_view',
                //     name: 'type_work_view'
                // },
                {
                    data: 'budget',
                    name: 'budget'
                },
                {
                    data: 'letter_no',
                    name: 'letter_no'
                },
                {
                    data: 'letter_date',
                    name: 'letter_date'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'recever_from',
                    name: 'recever_from'
                },
                {
                    data: 'sent_proposal',
                    name: 'sent_proposal'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });


        function editproposal(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('proposal-master-edit') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Proposl Master Letter');
                    $("#proposal_master_form")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#proposal_master_id').val(data.data.id);
                    $('#district_id').val(data.data.district_id);
                    $('#taluka_id').val(data.data.taluka_id);
                    $('#work_type_id').val(data.data.work_type_id);
                    $('#type_work_id').val(data.data.type_work_id);
                    $('#type_work').val(data.data.type_work);
                    $('#budget_id').val(data.data.budget_id);
                    $('#budget').val(data.data.budget);
                    $('#budget_work_id').val(data.data.budget_work_id);
                    $('#budget_work').val(data.data.budget_work);
                    $('#amount').val(data.data.amount);
                    $('#mp_mla_id').val(data.data.mp_mla_id);
                    $('#mp_mla').val(data.data.mp_mla);
                    $('#letter_no').val(data.data.letter_no);
                    $('#letter_date').val(data.data.letter_date);
                    $('#suggest').val(data.data.suggest);
                    $('#recever_from').val(data.data.recever_from);
                    $('#rec_letter_no').val(data.data.rec_letter_no);
                    $('#rec_letter_date').val(data.data.rec_letter_date);
                    $('#rec_letter_amount').val(data.data.rec_letter_amount);
                    $('#sent_proposal').val(data.data.sent_proposal);
                    $('#sent_proposal_letter_no').val(data.data.sent_proposal_letter_no);
                    $('#sent_proposal_date').val(data.data.sent_proposal_date);
                    $('#sent_proposal_amount').val(data.data.sent_proposal_amount);
                    $('#sent_box_id').val(data.data.sent_box_id);
                    $('#sent_box').val(data.data.sent_box);
                    $('#sent_box_date').val(data.data.sent_box_date);
                    $('#sent_box_remark').val(data.data.sent_box_remark);



                    // Show edit modal
                    $('#add_proposal').modal('show');
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
                        url: "{{ route('proposal_delete') }}",
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


        var base_url = "{{ url('/') }}"

        function viewproposal(id) {
            $('span[id$="_error"]').text('');
            $('.view-districts').text("");
            $('.view-taluka').text("");
            $('.view-work_type').text("");
            $('.view-type_of_work').text("");
            $('.view-budget').text("");
            $('.view-budget_work').text("");
            $('.view-amount').text("");
            $('.view-mp_mla').text("");
            $('.view-letter_no').text("");
            $('.view-date').text("");
            $('.view-suggestion').text("");
            $('.view-sent_box').text("");
            $('.view-sent_box_date').text("");
            $('.view-remark').text("");
            $('.view-received_proposal').text("");
            $('.view-received_letter_no').text("");
            $('.view-received_letter_date').text("");
            $('.view-recevid_amount').text("");
            $('.view-sent_proposal').text("");
            $('.view-sent_letter_no').text("");
            $('.view-sent_letter_date').text("");
            $('.view-sent_amount').text("");



            // $('.view-city').text("");
            // $('.view-address').text("");
            // $('.view-map-location').attr('href', "");
            $.ajax({
                type: 'GET',
                url: "{{ url('show-proposal-master') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {

                    console.log('id', id);
                    $('.view-districts').text(data.data.district_name && data.data.district_name.name ? data
                        .data.district_name.name : 'N/a');
                    $('.view-taluka').text(data.data.taluka_name && data.data.taluka_name.name ? data.data
                        .taluka_name.name : 'N/a');
                    $('.view-work_type').text(data.data.work_type && data.data.work_type.name ? data.data
                        .work_type.name : 'N/a');
                    $('.view-type_of_work').text(data.data.type_work && data.data.type_work.name ? data.data
                        .type_work.name : 'N/a');
                    $('.view-budget').text(data.data.budget ? data.data.budget : 'N/a');
                    $('.view-budget_work').text(data.data.budgetwork_name && data.data.budgetwork_name.name ?
                        data.data.budgetwork_name.name : 'N/a');
                    $('.view-amount').text(data.data.amount ? data.data.amount : 'N/a');
                    $('.view-mp_mla').text(data.data.mla_name && data.data.mla_name.name ? data.data.mla_name
                        .name : 'N/a');
                    $('.view-letter_no').text(data.data.letter_no ? data.data.letter_no : 'N/a');
                    $('.view-date').text(data.data.letter_date ? data.data.letter_date : 'N/a');
                    $('.view-suggestion').text(data.data.suggest ? data.data.suggest : 'N/a');
                    $('.view-sent_box').text(data.data.sent_box_name && data.data.sent_box_name.name ? data.data
                        .sent_box_name.name : 'N/a');
                    $('.view-sent_box_date').text(data.data.sent_box_date ? data.data.sent_box_date : 'N/a');
                    $('.view-remark').text(data.data.sent_box_remark ? data.data.sent_box_remark : 'N/a');
                    $('.view-received_proposal').text(data.data.recever_from ? data.data.recever_from : 'N/a');
                    $('.view-received_letter_no').text(data.data.rec_letter_no ? data.data.rec_letter_no :
                        'N/a');
                    $('.view-received_letter_date').text(data.data.rec_letter_date ? data.data.rec_letter_date :
                        'N/a');
                    $('.view-recevid_amount').text(data.data.rec_letter_amount ? data.data.rec_letter_amount :
                        'N/a');
                    $('.view-sent_proposal').text(data.data.sent_proposal ? data.data.sent_proposal : 'N/a');
                    $('.view-sent_letter_no').text(data.data.sent_proposal_letter_no ? data.data
                        .sent_proposal_letter_no : 'N/a');
                    let img = base_url + '/uplode_images/masters/' + data.data.upload_img;
                    $('.view-upload_img').attr("href", img);
                    $('.view-sent_letter_date').text(data.data.sent_proposal_date ? data.data
                        .sent_proposal_date : 'N/a');
                    $('.view-sent_amount').text(data.data.sent_proposal_amount ? data.data
                        .sent_proposal_amount : 'N/a');


                    $('#contactData');
                    $('.modal-title').text('View Proposal');
                    $('.edit-form').show();
                    // set edit value
                    $('#proposal_view').modal('show');

                },
                error: function(response) {

                    toastr.error(response.msg);
                }
            });

        }
    </script>
@endsection
