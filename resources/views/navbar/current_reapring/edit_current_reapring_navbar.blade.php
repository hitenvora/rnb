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
                                                            <h5 class="admin-name m-0">{{ $user->name }}</h5>
                                                            <span>{{ $role->name }}</span>
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

        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nav branch_listing">
                                        <li class="nav-item">
                                            <a class="nav-link  {{ Route::is('edit_current_repairs') ? 'active' : '' }}"
                                                href="{{ route('edit_current_repairs', $cr_update->id) }}">Current
                                                Reparing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  {{ Route::is('curent_reaparing_basic') ? 'active' : '' }}"
                                                href="{{ route('curent_reaparing_basic', $cr_update->id) }}">Basic</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  {{ Route::is('edit_detils_of_work') ? 'active' : '' }}"
                                                href="{{ route('edit_detils_of_work', $cr_update->id) }}">Detils Of
                                                Work</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  {{ Route::is('edit_bill_no') ? 'active' : '' }}"
                                                href="{{ route('edit_bill_no', $cr_update->id) }}">Bill No</a>
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
