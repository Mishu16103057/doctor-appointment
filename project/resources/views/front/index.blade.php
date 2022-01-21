@extends('layouts.front')
@section('content')

    
        <!-- Starting of Slider area -->
        <div class="homepage-slides owl-carousel">
            @foreach($sliders as $slider)
            <div class="single-slide-item slide-bg-1 d-flex align-items-center" style="background-image: url({{asset('assets/images/'.$slider->photo)}});">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>{{$slider->title}}</h2>
                            <p>{{$slider->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Ending of Slider area -->

       <!-- Starting of About me area -->
        <div class="section-padding pb_0 home-about-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 wow fadeInLeft">
                        <div class="home-about-left-bg">
                            <img src="{{asset('assets/images/'.$admin->fimg)}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 wow fadeInRight">
                        <div class="home-about-right-area">
                            <h2>{{$admin->fname}}</h2>

                            <h1>{{$admin->title}}</h1>
                            {!! $admin->description !!}

                            <p>
                                <a href="{{$admin->link}}" class="boxed-btn">lmm</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of About me area -->

        <!-- Starting of Book appointment Section Area -->
        <section class="section-padding home-bookAppointment-wrap overlay wow fadeInUp" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="appointment-text-area text-center">
                            <div class="video-header">
                                <h1>schedule_title</h1>
                                <p>schedule_text</p>
                            </div>
                            <div class="appointment-btn-area">
                                <a href="javascript:void(0)"><button class="boxed-btn" data-toggle="modal" data-target="#scheduleModal">_appointment</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ending of Book appointment Section Area -->

        <!-- Starting of Special Services -->
        <div class="section-padding pb_0 special-services-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 wow fadeInLeft">
                        <div class="special-services-left-img">
                            <img src="{{asset('assets/images/'.$admin->simg)}}" alt="Special service image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 wow fadeInRight">
                        <div class="special-services-right-area">
                            <h2>{{$admin->st}}</h2>

                            <div class="special-service-description">
                                @foreach($sps as $sp)
                                <div class="single-special-service">
                                    <div class="special-service-icon">
                                        <img src="{{asset('assets/images/'.$sp->photo)}}" alt="Special Images">  
                                    </div>
                                    <div class="special-service-text">
                                        <h3>{{$sp->title}}</h3>
                                        <p>{!!$sp->description!!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Special Services -->

        <!-- Starting of service #01 -->
        <div class="section-padding service-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>home2</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service-box">
                            <div class="service-icon">
                                <img src="{{asset('assets/images/'.$service->photo)}}" alt="Service Image">
                            </div>
                            <div class="service-text">
                                <h3>{{$service->title}}</h3>
                                <p>
                                    {!! $service->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Ending of service #01 -->

        <!-- Starting of Video Section Area -->
        <section class="section-padding video_section overlay wow fadeInUp" style="background-image: url({{asset('assets/images/'.$admin->vidimg)}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-text-area text-center">
                            <div class="video-header">
                                <h2>See How it Works</h2>
                            </div>
                            <div class="video-play-area">
                                <div class="video-play-btn">
                                    <a class="venobox" data-gall="gall-video" data-autoplay="true" data-vbtype="video" href="{{$admin->vid}}"><img src="{{url('assets/images/video-play.png')}}" alt="video play"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ending of Video Section Area -->

        <!-- Starting of Gallery area -->
        <div class="gallery-area-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>fht</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gallery-list">
                    @foreach($images as $image)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-gallery-item">
                            <img src="{{asset('assets/images/'.$image->photo)}}" alt="Gallery image">
                            <div class="gallery-overlay"></div>
                            <div class="gallery-icons">
                                <a class="image-popup" href="{{asset('assets/images/'.$image->photo)}}">
                                <i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Ending of Gallery area -->
    
        <!-- Starting of Testimonial Area -->
        <div class="section-padding testimonial-wrapper overlay wow fadeInUp" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>hc</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel t_carousel10">
                            @foreach($ads as $ad)
                            <div class="single_testimonial text-center">

                                <div class="border_extra mb_50 pos_relative">
                                    <div class="author_info">
                                        <h4>{{$ad->client}}</h4>
                                        <span>{{$ad->designation}}</span>
                                        <p class="author_comment color_66">{{$ad->review}}</p>
                                    </div>
                                </div>
                                <div class="author_img radius_100p pos_relative"><img src="{{asset('assets/images/'.$ad->photo)}}" class="radius_100p" alt="author"></div>
                            </div>
                            @endforeach                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ending of Testimonial Area -->

        <!-- Starting of Home Blog area -->
        <div class="section-padding home-blog-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>lns</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel blog-list">
                            @foreach($lblogs as $lblog)
                            <a href="{{route('front.blogshow',$lblog->id)}}"  class="single-blog-item">
                                <div class="blog-img">
                                    <img class="blog-img" src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                    <div class="blog-meta"><span>{{date('d',strtotime($lblog->created_at))}}</span> {{date('M',strtotime($lblog->created_at))}}</div>
                                </div>
                                <div class="blog-text">   
                                    <h4>{{$lblog->title}}</h4>
                                    <p>{{substr(strip_tags($lblog->details),0,100)}}</p>

                                    <span href="{{route('front.blogshow',$lblog->id)}}" class="blog-btn">vd</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Home Blog area -->

@endsection