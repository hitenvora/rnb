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
                                        @if (in_array(auth()->user()->role_id, [1, 2]))
                                            <li class="nav-item">
                                                <a class="nav-link  {{ Route::is('edit_project_master') ? 'active' : '' }}"
                                                    href="{{ route('edit_project_master', $project_master->id) }}">Basic</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link  {{ Route::is('edit_proposal_submitted_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_proposal_submitted_detail', $project_master->id) }}">Proposal
                                                    Submitted Detail</a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_principal_approval_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_principal_approval_detail', $project_master->id) }}">Principal
                                                    Approval Detail </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_block_estimate_submit_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_block_estimate_submit_detail', $project_master->id) }}">Block
                                                    Estimate Submitted Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_administrative_approval') ? 'active' : '' }}"
                                                    href="{{ route('edit_administrative_approval', $project_master->id) }}">Administrative
                                                    Approval</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_technical_section_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_technical_section_detail', $project_master->id) }}">Technical
                                                    Section Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_forest_clearence_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_forest_clearence_detail', $project_master->id) }}">Forest
                                                    Clearance Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_utility_shifting_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_utility_shifting_detail', $project_master->id) }}">Utility
                                                    Shifting Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_laq_approval') ? 'active' : '' }}"
                                                    href="{{ route('edit_laq_approval', $project_master->id) }}">LAQ
                                                    Approval</a>
                                            </li>
                                        @endif
                                        {{--     
                                            @if (in_array(auth()->user()->role_id, [1, 3]))
                                            <li class="nav-item">
                                                <a class="nav-link   {{ Route::is('edit_laq_approval') ? 'active' : ''  }}" href="{{route('edit_laq_approval',$project_master->id)}}">Audior</a>
                                            </li>
                                            @endif --}}
                                        @if (in_array(auth()->user()->role_id, [1, 3]))
                                            <li class="nav-item">
                                                <a class="nav-link  {{ Route::is('edit_budgetary_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_budgetary_detail', $project_master->id) }}">Budgetary
                                                    Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_expenditure_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_expenditure_detail', $project_master->id) }}">Expenditure
                                                    Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_excess_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_excess_detail', $project_master->id) }}">Excess
                                                    Detail &
                                                    Extra
                                                    Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_time_extension') ? 'active' : '' }}"
                                                    href="{{ route('edit_time_extension', $project_master->id) }}">Time
                                                    Limit
                                                    Extension</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_work_status') ? 'active' : '' }}"
                                                    href="{{ route('edit_work_status', $project_master->id) }}">Work
                                                    Status</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_fmg') ? 'active' : '' }}"
                                                    href="{{ route('edit_fmg', $project_master->id) }}">FMG</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_fdr') ? 'active' : '' }}"
                                                    href="{{ route('edit_fdr', $project_master->id) }}">FDR</a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_dlp_period') ? 'active' : '' }}"
                                                    href="{{ route('edit_dlp_period', $project_master->id) }}">DLP
                                                    Period</a>
                                            </li>
                                        @endif
                                        @if (in_array(auth()->user()->role_id, [1, 4]))
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_dtp_approval') ? 'active' : '' }}"
                                                    href="{{ route('edit_dtp_approval', $project_master->id) }}">DTP
                                                    Approval Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link  {{ Route::is('edit_nit') ? 'active' : '' }}"
                                                    href="{{ route('edit_nit', $project_master->id) }}">NIT</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_deposit_order') ? 'active' : '' }}"
                                                    href="{{ route('edit_deposit_order', $project_master->id) }}">Deposit
                                                    Order/Bank Guarantee
                                                    Detail</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ Route::is('edit_tpi_detail') ? 'active' : '' }}"
                                                    href="{{ route('edit_tpi_detail', $project_master->id) }}">TPI
                                                    Detail</a>
                                            </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
