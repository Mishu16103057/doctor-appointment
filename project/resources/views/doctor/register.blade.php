@extends('layouts.front')
@section('content')

    <!-- Starting of Login/registration area -->
    <div class="section-padding login-wrap mb_50 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <div class="login-tab">
                        <ul class="nav nav-tabs">
                            <li class="{{Session::has('page')? Session::get('page') == 'login'?'active':'':'active'}}"><a data-toggle="tab" href="#login">Log In</a></li>
                            <li class="{{Session::has('page')? Session::get('page') == 'register'?'active':'':''}}"><a data-toggle="tab" href="#signup">Sign Up</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="login" class="tab-pane {{Session::has('page')? Session::get('page') == 'login'?'active':'':'active'}}">
                                <div class="login-title text-center">
                                    <h3>Login</h3>
                                </div>
                                <div class="login-form">
                                    <form action="{{route('doctor-login-submit')}}" method="POST">
                                        {{csrf_field()}}
                                        @include('includes.form-error')
                                        @include('includes.form-success')
                                        <div class="form-group">
                                            <label for="login_email">Email</label>
                                            <input type="email" value="{{old('email')}}" name="email" class="form-control" id="login_email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="login_pwd">Password</label>
                                            <input type="password" name="password" class="form-control" id="login_pwd" required>
                                        </div>
                                        <button type="submit" class="btn btn-default btn-block btn-submit">LOGIN</button>
                                        <div class="forgot-area text-right">
                                            <a href="{{route('user-forgot')}}">Forgot Password?</a>
                                        </div>
                                        <div class="login-social-btn-area mb-0">
                                            <a href="#" class="social-btn"><i class="fa fa-facebook"></i> <span>Login With Facebook</span></a>
                                            <a href="#" class="social-btn last-child"><i class="fa fa-google"></i> <span>Login With Google</span></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="signup" class="tab-pane {{Session::has('page')? Session::get('page') == 'register'?'active':'':''}}">
                                <div class="login-title text-center">
                                    <h3>Create a new account</h3>
                                </div>
                                <div class="login-form">
                                    <form action="{{route('doctor-register-submit')}}" method="POST">
                                        {{csrf_field()}}
                                        @include('includes.form-error')
                                        <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-user"></i>
                                              </div>
                                              <input name="name" class="form-control" placeholder="Enter FullName" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-user"></i>
                                              </div>
                                              <input name="doctor_name" class="form-control" placeholder="Enter DoctorName" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-fw fa-cog"></i>
                                              </div>
                                              <select name="department" id="blood_grp" class="form-control" required="">
                                                <option value="">{{'Select Department'}}</option>
                                                @foreach($deps as $dep)
                                                  <option value="{{$dep->id}}">{{$dep->name}}</option>
            
                                                @endforeach
                                              </select>
                                            </div>
                                          </div> 
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-user"></i>
                                              </div>
                                              <input name="qualification" class="form-control" placeholder="Enter Qualification" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-envelope"></i>
                                              </div>
                                              <input name="email" class="form-control" placeholder="Enter Your Email" type="email">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-envelope"></i>
                                              </div>
                                              <input name="address" class="form-control" placeholder="Enter Your Address" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-user"></i>
                                              </div>
                                              <input name="phone" class="form-control" placeholder="Enter Phone" type="text">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="current_photo">Doctor Photo*</label>
                                            <img width="130px" height="90px" name="photo" id="adminimg" src="http://fulldubai.com/SiteImages/noimage.png" alt="" id="adminimg">
            
                                        </div>
                                          <div class="form-group">
                                            <label for="profile_photo"></label>
                                                <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                                <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Upload</button>
                                              
            
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <textarea class="form-control" name="about" id="" >Write About Yourself</textarea>
                                          </div>
                                        </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                    <i class="fa fa-unlock-alt"></i>
                                                </div>
                                              <input class="form-control" name="password" placeholder="Enter Your Password" type="password">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                              <div class="input-group-addon">
                                                    <i class="fa fa-unlock-alt"></i>
                                                </div>
                                              <input class="form-control" name="password_confirmation" placeholder="Confirm Password" type="password">
                                            </div>
                                          </div>
                                          
                                        <button type="submit" class="btn btn-default btn-block btn-submit">SIGN UP</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Login/registration area -->

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