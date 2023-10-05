@extends('layout.layout')
@section('style')
@endsection

@section('content')
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 logo-main">
                                        <div class="sidebar-header">
                                            <a href="{{ route('master_form') }}"><img class="main-logo img-fluid"
                                                    src="{{ asset('assets/img/logo/main-logo.png') }}" alt="" /></a>
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-5 col-md-3 col-sm-4 col-4">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="breadcome-heading d-flex justify-content-end align-items-center">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class="btn btn-light-primary" href="master-form.html">Master Forms</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->

                                    <div class="col-lg-5 col-md-4 col-sm-3 col-2 profile-menu">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-bs-toggle="dropdown" role="button"
                                                        aria-expanded="false"
                                                        class="d-flex gap-3 align-items-center nav-link dropdown-toggle">
                                                        <div class="d-flex gap-3 align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <img src="{{ asset('assets/img/profile.png') }}"
                                                                    alt="" />
                                                            </div>
                                                            <div class="flex-grow-1 d-flex flex-column">
                                                                <h5 class="admin-name m-0">John Doe</h5>
                                                                <span>admin</span>
                                                            </div>
                                                        </div>

                                                        <!-- <h5 class="admin-name">John Doe</h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span>admin</span> -->
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu">
                                                        <li><a href="{{ route('profile') }}">My Profile</a>
                                                        </li>
                                                        <li><a href="{{ route('admin_login') }}">Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="pagetitle" style="margin-top: 79px !important; ">
            <h1 class="card-header">Add Project</h1>
            <hr>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nav branch_listing" style="justify-content: left !important;">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{ route('basic_branch') }}">PB BRANCH</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('budgetary_detail') }}">AUDITOR /
                                                ACCOUNTANT</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('dtp_approval') }}">TENDER BRANCH</a>
                                        </li>
                                        <nav class="navbar-expand-lg">
                                            <div class="container-fluid">
                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#navbarNavDarkDropdown"
                                                    aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                                                    aria-label="Toggle navigation">
                                                    <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                                    <ul class="navbar-nav">
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle px-2" href="#"
                                                                id="navbarDarkDropdownMenuLink" role="button"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Dropdown
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                                aria-labelledby="navbarDarkDropdownMenuLink">
                                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                                <li><a class="dropdown-item" href="#">Another
                                                                        action</a></li>
                                                                <li><a class="dropdown-item" href="#">Something else
                                                                        here</a></li>
                                                                <li><a class="dropdown-item" href="#">Separated
                                                                        link</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </nav>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
