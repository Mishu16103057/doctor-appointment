@extends('layouts.front')
@section('content')

    <!-- Starting of Login/registration area -->
    <div class="section-padding login-wrap mb_50 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <div class="login-title text-center" style="margin-top: 80px;">
                        <h3>{{$lang->fpt}}</h3>
                    </div>
                    <div class="login-form" style="margin-bottom: 80px;">
                            <form action="{{route('user-forgot-submit')}}" method="POST">
                              {{csrf_field()}}
                              @include('includes.form-success')
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-envelope"></i>
                                  </div>
                                  <input name="email" class="form-control" placeholder="{{$lang->fpe}}" type="email">
                                </div>
                              </div>
                              <div class="form-group text-center">
                                    <button type="submit" class="btn btn-submit" name="button">{{$lang->fpb}}</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection