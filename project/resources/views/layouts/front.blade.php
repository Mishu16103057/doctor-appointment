<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{$seo->meta_keys}}">
        <meta name="author" content="Mishu">
        <title>{{$gs->title}}</title>

        <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/animate.css') }}" rel="stylesheet">

        <link href="{{ asset('assets/front/css/vanillaCalendar.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/venobox.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/meanmenu.min.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
        <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet">
        
        @yield('styles')
        <style type="text/css">
            #cover {
                background: url({{asset('assets/images/'.$gs->loader_image)}}) no-repeat scroll center center #FFF;
                position: fixed;
                height: 100%;
                width: 100%;
                z-index: 9999;
            }
        </style>
    <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}">        
    </head>
    <body>
    @if($gs->loader_status)
        <div id="cover"></div>
    @endif
        <!-- Starting of Header area -->
<header class="site-haeder">
            <div class="header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="site-logo">
                                <img src="{{asset('assets/images/'.$gs->logo)}}" alt="Logo">
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 text-right">
                            <div class="mainmenu" style="display: block;">
                                <ul>
                                <li><a href="{{route('front.index')}}">Home</a></li>
                                <li><a href="javascript:void(0)">Departments<i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                @foreach($dps as $dp)
                                                <li><a href="{{route('all-doctor',$dp->id)}}">{{ $dp->name }}</a></li>
                                                @endforeach
                                                
                                            </ul>
                                        </li>
                                 
                                @if(!Auth::guard('user')->check())
                                <li><a href="{{route('doctor-register')}}">Become A Doctor</a></li>
                                @endif
                                @if($ps->a_status == 1)
                                <li><a href="{{route('front.about')}}">About</a></li>
                                @endif
                                <li><a href="{{route('front.blog')}}">Blog</a></li>
                               
                                @if($ps->c_status == 1)
                                <li><a href="{{route('front.contact')}}">Contact</a></li>
                                @endif
                                    @if(Auth::guard('user')->check())
                                        <li><a href="javascript:void(0)">{{substr(Auth::guard('user')->user()->name,0,11)}} <i class="fa fa-angle-down"></i></a>
                                            <ul>
                                                <li><a href="{{route('user-dashboard')}}">MY ACCOUNT</a></li>
                                                <li><a href="{{route('user-logout')}}">LOGOUT</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{route('user-login')}}">PATIENT AREA</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mobileMenuActive"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>        

        <!-- Starting of Hero area -->
        @yield('content')

        <!-- starting of subscribe newsletter area -->
        <div class="subscribe-newsletter-wrapper">
            <div class="container"> 
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="subscribe-newsletter-area">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <h4>SUBSCRIBE TO OUR NEWSLETTER</h4>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <form action="{{route('front.subscribe.submit')}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="email" name="email" placeholder="Enter Your Email" required>
                                        <button type="submit" class="btn">Subscribe</button>
                                    </form>
                                    <p>
                                    @if(Session::has('subscribe'))
                                        {{ Session::get('subscribe') }}
                                    @endif
                                    @foreach($errors->all() as $error)
                                        {{$error}}
                                    @endforeach
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of subscribe newsletter area -->
        <!-- starting of footer area -->
        <footer class="wow fadeInUp">
            <div class="section-padding footer-area-wrapper" style="background-image: url({{asset('assets/images/bg-directory_.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">About</div>
                            <div class="footer-content">
                                <p>{{$gs->about}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">FOOTER LINKS</div>
                            <div class="footer-content">
                                <ul class="about-footer">
                                    <li><a href="{{route('front.index')}}"><i class="fa fa-caret-right"></i> &nbsp;>Home</a></li>
                                @if($ps->a_status == 1)
                                    <li><a href="{{route('front.about')}}"><i class="fa fa-caret-right"></i> &nbsp;About</a></li>
                                @endif
                                @if($ps->f_status == 1)
                                    <li><a href="{{route('front.faq')}}"><i class="fa fa-caret-right"></i> &nbsp;Faq</a></li>
                                @endif
                                @if($ps->c_status == 1)
                                    <li><a href="{{route('front.contact')}}"><i class="fa fa-caret-right"></i> &nbsp;Contact</a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">LATEST BLOGS</div>
                            <div class="footer-content">
                                <ul class="latest-tweet">
                                    @foreach($lblogs as $lblog)
                                    <li>
                                        <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                        <span><a href="{{route('front.blogshow',$lblog->id)}}">{{$lblog->title}}</a></span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
                        <div class="single-footer-area">
                            <div class="footer-title">CONTACT ME</div>
                            <div class="footer-content">
                                <div class="contact-info">
                                @if($gs->street != null)                                    
                                  <p class="contact-info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$gs->street}}
                                    </p>
                                @endif
                                @if($gs->phone != null)   
                                    <p class="contact-info">
                                         <i class="fa fa-phone" aria-hidden="true"></i>
                                        <a href="tel:{{$gs->phone}}">{{$gs->phone}}</a>
                                    </p>
                                @endif
                                @if($gs->email != null)   
                                    <p class="contact-info">
                                         <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                    </p>
                                @endif
                                @if($gs->site != null)   
                                    <p class="contact-info">
                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                        <a href="{{$gs->site}}">{{$gs->site}}</a>
                                    </p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="footer-copyright-area">
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                      <p class="copy-right-side">
                        {!!$gs->footer!!}
                      </p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-social-links">
                        <ul>
                            @if($sl->f_status == 1)
                            <li><a class="facebook" href="{{$sl->facebook}}">
                                <i class="fa fa-facebook"></i>
                            </a></li>
                            @endif
                            @if($sl->g_status == 1)
                            <li><a class="google" href="{{$sl->gplus}}">
                                <i class="fa fa-google"></i>
                            </a></li>
                            @endif
                            @if($sl->t_status == 1)
                            <li><a class="twitter" href="{{$sl->twitter}}">
                                <i class="fa fa-twitter"></i>
                            </a></li>
                            @endif
                            @if($sl->l_status == 1)
                            <li><a class="tumblr" href="{{$sl->linkedin}}">
                                <i class="fa fa-linkedin"></i>
                            </a></li>
                            @endif
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </footer>
        <!-- Ending of footer area -->




    <!-- Starting of Scroll to Top Area -->
    <a href="#" class="scrollup">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <!-- Ending of Scroll to Top Area -->



    <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/wow.js') }}"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="{{ asset('assets/front/js/main.js') }}"></script>
        <script src="{{ asset('assets/front/js/venobox.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/vanillaCalendar.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery-isotope-3.0.4-min.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery.meanmenu.min.js') }}"></script>
        <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function(){
                $('#cover').fadeOut(1000);
            },1000)
        });
        $( function() {
            $( "#v-cal" ).datepicker({
                minDate: +1,
                maxDate: +30,
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateText) {
                    $('#dateLoader').show();
                    $('#availableDates').html('');
                    $('#selectDate').html(dateText);
                    var doc=document.getElementById('doc').value;
                    $.ajax({
                        type: "GET",
                        url:"{{url('scheduletimes')}}/"+dateText+"/"+doc,
                        success:function(data){
                            setTimeout(function () {
                                $('#dateLoader').hide();
                                $('#availableDates').html(data);
                            },1000)
                        }
                    })
                }
            });
        } );

        function onDateClick(dateDiv) {
            $('.single-timing-box').removeClass('active');
            $(dateDiv).addClass('active');
            $('#bookLink').attr('href',$(dateDiv).data('url'));
            $('#bookLink').show();
        }
        </script>

        @yield('scripts')

    </body>
</html>
