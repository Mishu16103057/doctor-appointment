@extends('layouts.front')

@section('content')

    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1><i class="fa fa-check-circle fa-fw"></i> Appointment confirmed!</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding about-area-wrapper wow fadeInUp" style="visibility: visible; margin: 30px 0; color:darkgreen; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>Appointment Confirmation</h2>
                    <h3 style="text-transform: none">
                        Hello {{Auth::guard('user')->user()->name}}, Your Apoinment Submitted Successfully.
                    </h3>
                    <div class="patient__moreBtn text-center mt_30">
                        <a href="{{route('user-appointments')}}" class="patient-round-btn">View Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop