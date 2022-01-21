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
                    <div class="text-center">
                        <h4>Reset Password</h4>
                    </div>
                    <hr>
                    <div class="login-form">
                        <form class="form-horizontal" action="{{route('user-reset-submit')}}" method="POST">
                            @include('includes.form-success')
                            @include('includes.form-error')
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="full_name">Current Password *</label>
                                <input class="form-control" id="full_name" name="cpass" placeholder="Name" type="text" value="" required="">

                            </div>
                            <div class="form-group">
                                <label for="full_name">New Password *</label>
                                <input class="form-control" id="full_name" name="newpass" placeholder="New Password" type="text" value="" required="">

                            </div>
                            <div class="form-group">
                                <label for="full_name">Confirm Password *</label>
                                <input class="form-control" id="full_name" name="renewpass" placeholder="Confirm Password" type="text" value="" required="">

                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-default btn-submit">Submit</button>
                            </div>
                        </form>
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


