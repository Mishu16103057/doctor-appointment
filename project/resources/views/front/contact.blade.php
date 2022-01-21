@extends('layouts.front')
@section('content')
<div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h1>Contact Me</h1>
              </div>
            </div>
          </div>
 </div>

<div class="section-padding contact-area-wrapper margin-bottom-30 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <h3>{{$ps->contact_title}}</h3>
                        <p>{{$ps->contact_text}}</p>
                        <div class="comments-area">
                            <div class="comments-form">
                                <form action="{{route('front.contact.submit')}}" method="POST">
                                    {{csrf_field()}}
                                <!-- Success message -->
                                        @include('includes.form-success') 
                                <input type="hidden" name="to" value="{{$ps->contact_email}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="name" placeholder="Enter Your Name" required="" type="text">
                                        </div>
                                        <div class="col-md-6">
                                            <input name="phone" placeholder="Enter Your Phone" type="tel">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="email" placeholder="Enter Your Email" required="" type="email">
                                        </div>
                                    </div>
                                    <p><textarea name="text" id="comment" placeholder="Enter Your Replay" cols="30" rows="10" style="resize: vertical;" required=""></textarea></p>
                                    <input name="contact_btn" value="Message" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1 col-sm-5">
                        <div class="contact-info padding-top-100">
                             @if($gs->street != null)   
                          <p class="contact-info">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{$gs->street}}
                            </p>
                            @endif

                            @if($gs->phone != null || $gs->fax != null ) 
                            <p class="contact-info">

                                 <i class="fa fa-phone" aria-hidden="true"></i>
                                @if($gs->phone != null && $gs->fax != null)
                                <a href="tel:{{$gs->phone}}">+{{$gs->phone}}</a>
                                <br>
                                <a href="tel:{{$gs->fax}}">+{{$gs->fax}}</a>
                                @elseif($gs->phone != null)
                            <a href="tel:{{$gs->phone}}">+{{$gs->phone}}</a>

                                @else($gs->fax != null)
                                <a href="tel:{{$gs->fax}}">+{{$gs->fax}}</a>
                                @endif

                            </p>
                            @endif

                            @if($gs->site != null || $gs->email != null )
                            <p class="contact-info">                               
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                @if($gs->site != null && $gs->email != null) 
                                <a href="{{$gs->site}}">{{$gs->site}}</a>
                                <br>
                                <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                @elseif($gs->site != null)
                                <a href="{{$gs->site}}">{{$gs->site}}</a>
                                @else
                                <a href="mailto:{{$gs->email}}">{{$gs->email}}</a>
                                @endif                                                                
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
@section('scripts')
    <!-- Google Map JS -->
    <script type="text/javascript" src="{{asset('assets/front/js/google-map-api.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="{{asset('assets/front/js/google-map-active.js')}}"></script>

@endsection