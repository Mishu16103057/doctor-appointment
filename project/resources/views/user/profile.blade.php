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
                        <h4>Edit Profile}</h4>
                    </div>
                    <hr>
                    <div class="login-form">
                        <form action="{{route('user-profile-update')}}" method="POST" enctype="multipart/form-data">
                            @include('includes.form-success')
                            @include('includes.form-error')
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="reg_email">Email Address <span>*</span></label>
                                <input class="form-control" value="{{$user->email}}" type="email" id="reg_email" disabled>
                            </div>
                            <div class="form-group">
                                <label for="reg_name">Name <span>*</span></label>
                                <input class="form-control" value="{{$user->name}}" type="text" name="name" id="reg_name" required>
                            </div>
                            <div class="form-group">
                                <label for="current_photo">User Current Photo*</label>
                                <img width="130px" height="90px" id="adminimg" src="{{ $user->profile_photo ? asset('assets/images/patient-profile/'.$user->profile_photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="adminimg">

                            </div>
                            <div class="form-group">
                                <label for="profile_photo">Profile Photo*</label>
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                    <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Upload</button>
                                    <p>size</p>

                            </div>
                            <div class="form-group">
                                <label for="city">Age*</label>
                                <input class="form-control" name="age" id="city" placeholder="Enter your age" type="text" value="{{$user->age}}">
                            </div>
                            <div class="form-group">
                                <label for="city2">Gender*</label>
                                <select class="form-control" id="city2" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{$user->gender == "Male"?"selected":""}}>Male</option>
                                    <option value="Female" {{$user->gender == "Female"?"selected":""}}>Female</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="address">Address *</label>
                                 <input class="form-control" name="address" id="address" placeholder="Enter Your Address" type="text" value="{{$user->address}}" required="">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input class="form-control" name="phone" id="phone" placeholder="Phone Number" type="text" value="{{$user->phone}}">

                            </div>
                            <div class="form-group">
                                <label for="fax">Fax *</label>
                                <input class="form-control" name="fax" id="fax" placeholder="Enter Your Fax" type="text" value="{{$user->fax}}">

                            </div>
                            <div class="form-group">
                                <label for="fax1">Information*</label>
                                <textarea class="form-control" name="my_info" id="fax1" placeholder="Enter Your Information">{{$user->my_info}}</textarea>

                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-default btn-submit">Update</button>
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

        function uploadclick(){
            $("#uploadFile").click();
            $("#uploadFile").change(function(event) {
                readURL(this);
                $("#uploadTrigger").html($("#uploadFile").val());
            });

        }


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#adminimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection