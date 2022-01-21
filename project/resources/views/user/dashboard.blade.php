@extends('layouts.front')
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$as->bimg)}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="patient-profile-area text-center">
                        <div class="patient-profile-img">
                            <img src="{{asset('assets/images/patient-profile/'.$user->profile_photo)}}" alt="patient image">
                        </div>
                        <h1>{{$user->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Section title overlay area -->

    <!-- Starting of patient profile area -->
    <div class="section-padding patient-profile-wrap mb_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4">

                    @include('includes.patient-sidebar')

                    <div class="patient__socialArea mt_30">
                        <ul>
                            <li><a href=""><i class="fa fa-map-marker"></i> <span>{{$user->address}}</span></a></li>
                            <li><a href=""><i class="fa fa-phone"></i> <span>Phone : {{$user->phone}}</span></a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> <span>Email : {{$user->email}}</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8">

                    <div class="patient__descriptionArea">
                        <h3>My Information</h3>
                        <hr>
                        <p>{{$user->my_info != ""?$user->my_info:"No Info Added Yet."}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Ending of patient profile area -->


@endsection

@section('scripts')

<script>

</script>

@endsection