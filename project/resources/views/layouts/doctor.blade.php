<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="Mishu">

        <title>{{$gs->title}}</title>

        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}">

        <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/jquery-ui-1.10.0.custom.min.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/jquery.ui.timepicker.css?v=0.3.3')}}" type="text/css" />
        @yield('styles')
        <style type="text/css">
            #sidebar-menu ul li a.active {
            color: #fff;
            background: rgba(207, 55, 58, 0.70);
}
        </style>
    </head>
    <body>
        <div class="dashboard-wrapper">
            <div class="left-side">
            <!-- Starting of Dashboard Sidebar menu area -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-right">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </nav>
                
                <div class="dashboard-sidebar-area">
                    <img src="{{asset('assets/admin/img/images.jpg')}}" alt="">
                    <div class="sidebar-menu-body">
                        <nav id="sidebar-menu">
                            <div class="sidebar-header">
                                <img src="{{asset('assets/images/'.$gs->logo)}}" alt="Sidebar header logo" class="sidebar-header-logo">
                            </div>
                            <ul class="list-unstyled profile">
                                <li class="active">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <img src="{{ Auth::guard('doctor')->user()->photo ? asset('assets/images/'.Auth::guard('doctor')->user()->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="profile image">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">    
                                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">{{ Auth::guard('doctor')->user()->name}} <span>Doctor</span></a>
                                        </div>
                                    </div>
                                        <ul class="collapse list-unstyled profile-submenu" id="homeSubmenu">    
                                            <li><a href="{{ route('doctor-profile-info') }}"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                                            <li><a href=" {{ route('admin-password-reset') }} "><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                                            <li><a href="{{ route('doctor-logout') }}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="list-unstyled components">
                                <li>
                                    <a href="{{ route('front.index')}}" target="_blank"><i class="fa fa-home fa-fw"></i> View Website</a>
                                </li>
                               
                               
                                
                                <li>
                                    <a href="#image" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-list"></i> My Appointments</a>
                                    <ul class="collapse list-unstyled submenu" id="image">
                                        <li><a href="{{route('doctor-appointment-today',Auth::guard('doctor')->user()->id)}}"><i class="fa fa-angle-right"></i> Today's Appointments</a></li>
                                        <li><a href="{{route('doctor-appointment-pending',Auth::guard('doctor')->user()->id)}}"><i class="fa fa-angle-right"></i> Pending Appointments</a></li>
                                        <li><a href="{{route('doctor-appointment-history',Auth::guard('doctor')->user()->id)}}"><i class="fa fa-angle-right"></i> Appointment History</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('doctor-schedule',Auth::guard('doctor')->user()->id)}}"><i class="fa fa-fw fa-table"></i> Update Schedule</a>
                                </li>
                                <li>
                                    <a href="{{route('doctor-user-index')}}"><i class="fa fa-fw fa-group"></i> My Patient</a>
                                </li>
                                
                                <li>
                                    <a href="{{route('admin-proinfo')}}"><i class="fa fa-fw fa-user"></i> Profile Information</a>
                                </li>
                                <li>
                                    <a href="{{route('admin-rs-index')}}"><i class="fa fa-fw fa-bank"></i> Resume Section</a>
                                </li>
                                <li>
                                    <a href="#image" data-toggle="collapse" aria-expanded="false"><i class="fa fa-fw fa-file-image-o"></i> Image Section</a>
                                    <ul class="collapse list-unstyled submenu" id="image">
                                        <li><a href="{{route('admin-profile')}}"><i class="fa fa-angle-right"></i> Doctor Image</a></li>   
                                        <li><a href="{{route('admin-special')}}"><i class="fa fa-angle-right"></i> Specialist Image</a></li>
                                        <li><a href="{{route('admin-proimg')}}"><i class="fa fa-angle-right"></i> Profile Image</a></li>
                                        <li><a href="{{route('admin-back')}}"><i class="fa fa-angle-right"></i> Profile Background</a></li>
                                       
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            <!-- Ending of Dashboard Sidebar menu area --> 
            </div>
            @yield('content')
        </div>

        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.canvasjs.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ URL::asset('assets/admin/js/jquery-ui.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.ui.timepicker.js?v=0.3.3')}}"></script>
        <script src="{{asset('assets/admin/js/admin-main.js')}}"></script>


        
        @yield('scripts')

    </body>
</html>
