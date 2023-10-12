@extends('layout.layout')
@section('style')
@endsection

@section('content')
    @include('navbar.admin.master-page.master_navbar')

    <body>
        <!--[if lt IE 8]>
                    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
                <![endif]-->
        <!-- Start Welcome area -->

        <!-- <h5 class="admin-name">John Doe</h5>
                                                                    <span>admin</span> -->
        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
        </a>
        <div class="breadcome-area">
        </div>
        </div>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-23">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner mb-5">
                            <div class="profile-img">
                                <img src="{{ asset('assets/img/profile/1.jpg') }}" alt="" width="200" />
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Name</b><br /> {{$user->name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Department</b><br /> {{$role->name}} </p>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Address</b><br /> E104, catn-2, Chandlodia Ahmedabad Gujarat, UK.</p>
                                        </div>
                                    </div>
                                </div> --}}
                             
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
@endsection
