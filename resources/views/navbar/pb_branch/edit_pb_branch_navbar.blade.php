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
                                        <a href="{{route('master_form')}}"><img class="main-logo img-fluid" src="{{asset('assets/img/logo/main-logo.png')}}" alt="" /></a>
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
                                                <a href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false" class="d-flex gap-3 align-items-center nav-link dropdown-toggle">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{asset('assets/img/profile.png')}}" alt="" />
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
                                                    <li><a href="{{route('profile')}}">My Profile</a>
                                                    </li>
                                                    <li><a href="{{route('admin_login')}}">Log Out</a>
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
                                            <a class="nav-link  {{ Route::is('edit_project_master') ? 'active' : ''  }}" href="{{route('edit_project_master',$project_master->id)}}">Basic</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link  {{ Route::is('edit_proposal_submitted_detail') ? 'active' : ''  }}" href="{{route('edit_proposal_submitted_detail',$project_master->id)}}">Proposal Submitted Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link   {{ Route::is('edit_principal_approval_detail') ? 'active' : ''  }}" href="{{route('edit_principal_approval_detail',$project_master->id)}}">Principal Approval Detail </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link   {{ Route::is('edit_block_estimate_submit_detail') ? 'active' : ''  }}" href="{{route('edit_block_estimate_submit_detail',$project_master->id)}}">Block Estimate Submitted Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link   {{ Route::is('edit_administrative_approval') ? 'active' : ''  }}" href="{{route('edit_administrative_approval',$project_master->id)}}">Administrative Approval</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link   {{ Route::is('edit_technical_section_detail') ? 'active' : ''  }}" href="{{route('edit_technical_section_detail',$project_master->id)}}">Technical Section Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link   {{ Route::is('edit_forest_clearence_detail') ? 'active' : ''  }}" href="{{route('edit_forest_clearence_detail',$project_master->id)}}">Forest Clearance Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link   {{ Route::is('edit_utility_shifting_detail') ? 'active' : ''  }}" href="{{route('edit_utility_shifting_detail',$project_master->id)}}">Utility Shifting Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link   {{ Route::is('laq_approval') ? 'active' : ''  }}" href="{{route('laq_approval')}}">LAQ Approval</a>
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