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
                                            <img src="{{ Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="profile image">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">    
                                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">{{ Auth::guard('admin')->user()->name}} <span>{{ Auth::guard('admin')->user()->role}}</span></a>
                                        </div>
                                    </div>
                                        <ul class="collapse list-unstyled profile-submenu" id="homeSubmenu">    
                                            <li><a href="{{ route('admin-profile-info') }}"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                                            <li><a href=" {{ route('admin-password-reset') }} "><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                                            <li><a href="{{ route('admin-logout') }}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="list-unstyled components">
                                <li>
                                    <a href="{{ route('front.index')}}" target="_blank"><i class="fa fa-home fa-fw"></i> View Website</a>
                                </li>
                                <li>
                                    <a href="{{route('admin-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{route('admin-department-index')}}"><i class="fa fa-building-o"></i> Departments</a>
                                </li>
                                
                               
                                
                                <li>
                                    <a href="{{route('admin-user-index')}}"><i class="fa fa-fw fa-group"></i> All Patient</a>
                                </li>
                               
                                <li>
                                    <a href="{{route('admin-info')}}"><i class="fa fa-fw fa-info"></i>Home Page Information</a>
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
