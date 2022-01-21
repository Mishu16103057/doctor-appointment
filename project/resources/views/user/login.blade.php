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
                                    <form action="{{route('user-login-submit')}}" method="POST">
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
                                    <form action="{{route('user-register-submit')}}" method="POST">
                                        {{csrf_field()}}
                                        @include('includes.form-error')
                                        <div class="form-group">
                                            <label for="reg_email">Email Address <span>*</span></label>
                                            <input class="form-control" type="email" name="email" id="reg_email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_name">Name <span>*</span></label>
                                            <input class="form-control" type="text" name="name" id="reg_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_Pnumber">Phone Number <span>*</span></label>
                                            <input class="form-control" type="text" name="phone" id="reg_Pnumber" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_password">Password <span>*</span></label>
                                            <input class="form-control" type="password" name="password" id="reg_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password <span>*</span></label>
                                            <input class="form-control" type="password" name="password_confirmation" id="confirm_password" required>
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