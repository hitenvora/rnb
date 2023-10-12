@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.admin.master-page.master_navbar')

    <body>

        <div class="main-page master">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Master Forms</h3>
                        <ul class="menu-list d-flex flex-wrap" id="menu-list">
                            @if (in_array(auth()->user()->role_id, [1]))
                                <li class="box-card">
                                    <a href="{{ route('proposal_master') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28"
                                                    viewBox="0 0 29 28" fill="none">
                                                    <path
                                                        d="M17.9403 2.79999V6.99999C17.9403 7.77319 18.5671 8.39999 19.3403 8.39999H23.5403M10.2403 8.39999H13.0403M10.2403 12.6H18.6403M10.2403 16.8H18.6403M21.4403 4.89999C20.8172 4.34249 20.1706 3.68126 19.7624 3.25181C19.4908 2.96604 19.1155 2.79999 18.7213 2.79999H8.13993C6.59354 2.79999 5.33994 4.05358 5.33993 5.59997L5.33982 22.3999C5.33981 23.9463 6.59341 25.1999 8.13981 25.1999L20.7399 25.2C22.2862 25.2 23.5398 23.9464 23.5399 22.4L23.5402 7.55746C23.5403 7.19948 23.4037 6.85536 23.1552 6.59764C22.6958 6.12107 21.9286 5.33692 21.4403 4.89999Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Proposal</h5>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 29 29" fill="none">
                                                <path d="M11.9864 8.90002L17.5864 14.5L11.9864 20.1" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card">
                                    <a href="{{ route('user_master') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28"
                                                    viewBox="0 0 29 28" fill="none">
                                                    <path
                                                        d="M3.04001 23.9311C3.04001 19.5263 6.72001 15.9555 14.24 15.9555C21.76 15.9555 25.44 19.5263 25.44 23.9311C25.44 24.6319 24.9287 25.2 24.298 25.2H4.18197C3.55128 25.2 3.04001 24.6319 3.04001 23.9311Z"
                                                        stroke="white" stroke-width="2" />
                                                    <path
                                                        d="M18.44 6.99999C18.44 9.31958 16.5596 11.2 14.24 11.2C11.9204 11.2 10.04 9.31958 10.04 6.99999C10.04 4.68039 11.9204 2.79999 14.24 2.79999C16.5596 2.79999 18.44 4.68039 18.44 6.99999Z"
                                                        stroke="white" stroke-width="2" />
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">User</h5>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 29 29" fill="none">
                                                <path d="M11.9864 8.90002L17.5864 14.5L11.9864 20.1" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card">
                                    <a href="{{ route('division_master') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28"
                                                    viewBox="0 0 29 28" fill="none">
                                                    <path
                                                        d="M20.44 14H9.23977M20.44 14C23.5327 14 26.04 11.4928 26.04 8.39999C26.04 5.30719 23.5327 2.79999 20.4399 2.79999H9.23977C6.14691 2.79999 3.63967 5.3073 3.63977 8.40017C3.63987 11.4929 6.14705 14 9.23977 14M20.44 14C23.5327 14 26.04 16.5072 26.04 19.6C26.04 22.6928 23.5327 25.2 20.44 25.2H9.23977C6.14705 25.2 3.63987 22.6929 3.63977 19.6002C3.63967 16.5073 6.1469 14 9.23977 14M21.1396 8.39999H14.1396M21.1396 19.6H14.1396M8.53959 19.7053V19.6M8.53959 8.39999V8.29471"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Divison</h5>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 29 29" fill="none">
                                                <path d="M11.9864 8.90002L17.5864 14.5L11.9864 20.1" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card">
                                    <a href="{{ route('sub_division_master') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28"
                                                    viewBox="0 0 29 28" fill="none">
                                                    <path
                                                        d="M14.6399 20.3V13.3M23.5999 20.72C22.3628 20.72 21.3599 21.7229 21.3599 22.96C21.3599 24.1971 22.3628 25.2 23.5999 25.2C24.8371 25.2 25.8399 24.1971 25.8399 22.96C25.8399 21.7229 24.8371 20.72 23.5999 20.72ZM23.5999 20.72L23.5999 14.28C23.5999 13.6614 23.0985 13.16 22.4799 13.16H6.79994C6.18138 13.16 5.67994 13.6614 5.67994 14.28L5.67994 20.72M5.67994 20.72C4.44282 20.72 3.43994 21.7229 3.43994 22.96C3.43994 24.1971 4.44282 25.2 5.67994 25.2C6.91706 25.2 7.91994 24.1971 7.91994 22.96C7.91994 21.7229 6.91706 20.72 5.67994 20.72ZM14.6399 25.2C13.4028 25.2 12.3999 24.1971 12.3999 22.96C12.3999 21.7229 13.4028 20.72 14.6399 20.72C15.8771 20.72 16.8799 21.7229 16.8799 22.96C16.8799 24.1971 15.8771 25.2 14.6399 25.2ZM7.63994 8.39999H21.6399C22.4131 8.39999 23.0399 7.77319 23.0399 6.99999V4.19999C23.0399 3.42679 22.4131 2.79999 21.6399 2.79999H7.63994C6.86674 2.79999 6.23994 3.42679 6.23994 4.19999V6.99999C6.23994 7.77319 6.86674 8.39999 7.63994 8.39999Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Subdivison</h5>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 29 29" fill="none">
                                                <path d="M11.9864 8.90002L17.5864 14.5L11.9864 20.1" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                                <li class="box-card">
                                    <a href="{{ route('letter_reminder_master') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28"
                                                    viewBox="0 0 29 28" fill="none">
                                                    <path
                                                        d="M18.24 9.09999H9.83997H12.1309C12.941 9.09999 13.7179 9.43713 14.2908 10.0372C14.8636 10.6374 15.1854 11.4513 15.1854 12.3C15.1854 13.1487 14.8636 13.9626 14.2908 14.5627C13.7179 15.1628 12.941 15.5 12.1309 15.5H9.83997L14.4218 20.3M9.83997 12.3H18.24M25.24 14C25.24 20.1856 20.2256 25.2 14.04 25.2C7.85438 25.2 2.83997 20.1856 2.83997 14C2.83997 7.8144 7.85438 2.79999 14.04 2.79999C20.2256 2.79999 25.24 7.8144 25.24 14Z"
                                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="m-0">Letter Reminder Master</h5>
                                            </div>


                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 29 29" fill="none">
                                                <path d="M11.9864 8.90002L17.5864 14.5L11.9864 20.1" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>

                            @endif
                            <li class="box-card">
                                <a href="{{ route('project_master') }}">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28"
                                                viewBox="0 0 29 28" fill="none">
                                                <path
                                                    d="M18.24 9.09999H9.83997H12.1309C12.941 9.09999 13.7179 9.43713 14.2908 10.0372C14.8636 10.6374 15.1854 11.4513 15.1854 12.3C15.1854 13.1487 14.8636 13.9626 14.2908 14.5627C13.7179 15.1628 12.941 15.5 12.1309 15.5H9.83997L14.4218 20.3M9.83997 12.3H18.24M25.24 14C25.24 20.1856 20.2256 25.2 14.04 25.2C7.85438 25.2 2.83997 20.1856 2.83997 14C2.83997 7.8144 7.85438 2.79999 14.04 2.79999C20.2256 2.79999 25.24 7.8144 25.24 14Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="m-0">Project Master</h5>
                                        </div>

                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                            viewBox="0 0 29 29" fill="none">
                                            <path d="M11.9864 8.90002L17.5864 14.5L11.9864 20.1" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                 
                    {{-- <div class="col-lg-12">
                        <h3>Alerts</h3>
                        <ul class="message-list d-flex flex-wrap" id="menu-list">
                            <li class="msg-card">
                                <a href="{{ route('basic_branch') }}">
                                    <div class="alert alert-light-primary w-100 alert-dismissible d-flex" role="alert">
                                        <div class="flex-grow-1">
                                            <h6>PB Branch</h6>
                                            <span>Submission date by agency :- 25-09-2023</span>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </a>
                            </li>
                            <li class="msg-card">
                                <a href="{{ route('budgetary_detail') }}">
                                    <div class="alert alert-light-danger w-100 alert-dismissible d-flex" role="alert">
                                        <div class="flex-grow-1">
                                            <h6>Auditor / Accountant</h6>
                                            <span>Submission date by agency :- 25-09-2023</span>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </a>
                            </li>
                            <li class="msg-card">
                                <a href="{{ route('dtp_approval') }}">
                                    <div class="alert alert-light-success w-100 alert-dismissible d-flex" role="alert">
                                        <div class="flex-grow-1">
                                            <h6>Tender Branch</h6>
                                            <span>Submission date by agency :- 25-09-2023</span>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        </div>
        </div>
    </body>
@endsection

@section('script')
@endsection
