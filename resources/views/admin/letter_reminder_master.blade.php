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
                                        <a class="btn-left d-flex align-items-center gap-3 letter-reminder"
                                            href="{{ route('master_form') }}">
                                            <span class="d-flex back-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M7.83 11L11.41 7.41L10 6L4 12L10 18L11.41 16.59L7.83 13H20V11H7.83Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <h3>Letter Reminder Master</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                                    <a class="btn btn-white" href="#" id="exportButton" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M2.70117 11.4142L2.70117 14.1936C2.70117 14.6148 2.86711 15.0188 3.16248 15.3167C3.45785 15.6145 3.85846 15.7818 4.27617 15.7818H13.7262C14.1439 15.7818 14.5445 15.6145 14.8399 15.3167C15.1352 15.0188 15.3012 14.6148 15.3012 14.1936V11.4142M9.00205 2.2168V11.2168M9.00205 11.2168L12.602 7.77793M9.00205 11.2168L5.40205 7.77793"
                                                stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Export
                                    </a>
                                    <a class="btn btn-primary ms-2 letter-reminder" data-bs-toggle="modal"
                                        data-bs-target="#add_letter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99935 4.16699V15.8337M4.16602 10.0003H15.8327" stroke="white"
                                                stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Add Letter Reminder
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
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th class="text-center">Letter Upload</th>
                                            <th>Submitted To</th>
                                            <th>Expired Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>15/09/2023</td>
                                            <td>XYZ</td>
                                            <td>-</td>
                                            <td class="text-center">
                                                <a href="#" class="eyes" title="Letter View">
                                                    <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                        width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                            stroke-width="1.52941"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>30/10/2023</td>
                                            <td>
                                                <span class="badge badge-success">Active</span>
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
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>15/09/2023</td>
                                            <td>XYZ</td>
                                            <td>-</td>
                                            <td class="text-center">
                                                <a href="#" class="eyes" title="Letter View">
                                                    <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                        width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                            stroke-width="1.52941"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>30/10/2023</td>
                                            <td>
                                                <span class="badge badge-danger">Inactive</span>
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
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>15/09/2023</td>
                                            <td>XYZ</td>
                                            <td>-</td>
                                            <td class="text-center">
                                                <a href="#" class="eyes" title="Letter View">
                                                    <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                        width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                            stroke-width="1.52941"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>30/10/2023</td>
                                            <td>
                                                <span class="badge badge-success">Active</span>
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
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>15/09/2023</td>
                                            <td>XYZ</td>
                                            <td>-</td>
                                            <td class="text-center">
                                                <a href="#" class="eyes" title="Letter View">
                                                    <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg"
                                                        width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"
                                                            stroke-width="1.52941"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>30/10/2023</td>
                                            <td>
                                                <span class="badge badge-danger">Inactive</span>
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
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade product-modal" id="add_letter" tabindex="-1" aria-labelledby="add_letter"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_finance">Add Letter Reminder</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post" id="letter_reminder_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="letter_reminder_id" id="letter_reminder_id">
                            <div class="col-lg-6">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="2023-09-13">
                                <span class="text-danger" id="date_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter Subject">
                                <span class="text-danger" id="subject_error"></span>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Letter Upload</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="upload_img" name="upload_img">
                                </div>
                                <span class="text-danger" id="upload_img_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Submitted To</label>
                                <input type="text" class="form-control" id="submit_to" name="submit_to"
                                    placeholder="Enter Submitted To">
                                <span class="text-danger" id="submit_to_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Expired Date</label>
                                <input type="date" class="form-control" id="expire_date" name="expire_date"
                                    value="2023-09-13">
                                <div class="col-lg-6 edit-form">
                                    <label for="inputtitle1" class="form-label">Is Active</label>
                                    <select class="form-select" name="is_active" id="is_active">
                                        <option value="1">Is active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger" id="is_active_error"></span>
                                </div>
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
        {{-- <div class="modal fade product-modal" id="editmodal" tabindex="-1" aria-labelledby="editmodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="add_finance">Edit Letter Reminder</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" method="post">
                            <div class="col-lg-6">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="P_date" name="P_date"
                                    value="2023-09-13">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter Subject">
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Letter Upload</label>
                                <div class="input-group">
                                    <input type="file" class="form-control w-100" id="upload_img" name="upload_img">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Submitted To</label>
                                <input type="text" class="form-control" id="submit_to" name="submit_to"
                                    placeholder="Enter Submitted To" value="XYZ">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Expired Date</label>
                                <input type="date" class="form-control" id="Exp_date" name="Exp_date"
                                    value="2023-09-13">
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="letter_status" id="letter_status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
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
        </div>

    </body>
@endsection

@section('script')
    <script>
        var token = "{{ csrf_token() }}";

        $('.edit-form').hide();
        $(document).on('click', '.letter-reminder', function() {
            $('.modal-title').text('Add Letter Reminder Division');
            $('#letter_reminder_id').val('');
            $("#letter_reminder_form")[0].reset();
            $('span[id$="_error"]').text('');
            $('.edit-form').hide();
            $('add_letter').modal('show');
        });

        $('#letter_reminder_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var csrftoken = $('meta[name="csrf-token"]').attr('content');
            $(".text-danger").text('');

            $.ajax({
                type: 'POST',
                url: "{{ route('letter_reminder_insert') }}",
                headers: {
                    'X-CSRF-Token': csrftoken,
                },
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.status == 200) {
                        $('#add_letter').modal('hide');
                        if ($('#letter_reminder_id').val() == '') {
                            toastr.success("Letter Reminder List added successfully.");
                        } else {
                            toastr.success("Letter Reminder List updated successfully.");
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
                url: "{{ route('get_letter_reminder') }}",
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
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'eye_icon',
                    name: 'eye_icon'
                },
                {
                    data: 'submit_to',
                    name: 'submit_to'
                },
                {
                    data: 'expire_date',
                    name: 'expire_date'
                },
                {
                    data: 'active_button',
                    name: 'active_button'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],
            drawCallback: function() {},
            initComplete: function(response) {}
        });

        function editsubdivision(id) {
            $('span[id$="_error"]').text('');
            $.ajax({
                type: 'GET',
                url: "{{ url('letter-reminder-edit') }}/" + id,
                headers: {
                    'X-CSRF-Token': token,
                },
                dataType: "json",
                success: (data) => {
                    $('.modal-title').text('Edit Letter Reminder Letter');
                    $("#letter_reminder_form")[0].reset();
                    $('.edit-form').show();
                    // set edit value
                    $('#letter_reminder_id').val(data.data.id);
                    $('#date').val(data.data.date);
                    $('#subject').val(data.data.subject);
                    $('#submit_to').val(data.data.submit_to);
                    $('#expire_date').val(data.data.expire_date);

                    // Show edit modal
                    $('#add_letter').modal('show');
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
                        url: "{{ route('letter_reminder_delete') }}",
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
