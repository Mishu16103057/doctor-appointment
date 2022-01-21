@extends('layouts.front')

@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Reservation</h2>
                    <h4 style="text-transform: none;">you_will <strong>{{ date('l , d M Y',strtotime(Route::input('date'))) }} at {{Route::input('time')}}</strong></h4>

                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Section title overlay area -->

    <!-- Starting of Profile area -->
    <div class="donors-profile-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="profile-description-box margin-bottom-30">
                        <h3>please_fillup</h3>
                        <hr>
                        @include('includes.form-success')
                        <form method="POST" action="{{ action('FrontendController@bookschedule_process') }}">
                            {{csrf_field()}}
                            <input type="hidden" value="{{ $doctor->id }}" name="doctorid">
                            <input type="hidden" value="{{Auth::guard('user')->user()->id}}" name="patient_id">
                            <input type="hidden" value="{{Route::input('date')}}" name="appointment_date">
                            <input type="hidden" value="{{Route::input('time')}}" name="appointment_time">
                            <fieldset>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">consultation_for</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" value="Self" name="visit_for" required>for_me</label>
                                        <label class="radio-inline"><input type="radio" value="Another Person" name="visit_for" required>for_another</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">first_visit</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" value="Yes" name="patient_visit" required>yes</label>
                                        <label class="radio-inline"><input type="radio" value="No" name="patient_visit" required>no</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">withorwithout</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" onclick="healthInsurance(this)" value="Particular" name="patient_insurance">Particular</label>
                                        <label class="radio-inline"><input type="radio" onclick="healthInsurance(this)" value="Health Insurance" name="patient_insurance">Health Insurance</label>
                                    </div>
                                </div>

                                <div class="col-md-8 col-md-offset-4 col-sm-6 col-xs-12" id="healthPlan" style="display: none;">
                                    <div class="form-group">
                                        <select name="insurance_plan" class="form-control">
                                            <option>select_plan</option>
                                            @foreach(explode(',',\App\Schedule::ScheduleData(1)->accepted_insurance) as $plan)
                                                <option value="{{$plan}}">{{$plan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">Patient Name :</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="patient_name" value="{{$user->name}}" placeholder="Patient Name*" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">patient_lastname :</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="patient_last_name" placeholder="Patient Last Name*">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">Patient Email :</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" value="{{$user->email}}" name="patient_email" placeholder="Patient Email*" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">Patient Phone :</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" value="{{$user->phone}}" name="patient_phone" placeholder="Patient Phone*">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="pull-right">Purpose Of Visit :</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comments" placeholder="Purpose of visit/Comments"></textarea>

                                    </div>
                                </div>

                                <div class="col-md-offset-4 col-md-8 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-info booked-btn">Continue</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="profile-right-side margin-bottom-80">
                                <div class="profile-img">
                                    <img src="{{asset('assets/images/'.$doctor->photo)}}" alt="Profile image">
                                </div>

                            <hr>
                            <div class="profile-contact-info">
                                <h3>Appointment Hour</h3>
                                    <i class="fa fa-clock-o"></i> <strong>{{ date('l , d M Y',strtotime(Route::input('date'))) }} at {{Route::input('time')}}</strong>

                            </div>
                            <hr>
                            <div class="profile-contact-info">
                                <h3>Location</h3>
                                    <i class="fa fa-map-marker"></i> <strong>{{$admin->paddress}}</strong>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of Profile area -->

@stop
@section('scripts')
    <script>

        function healthInsurance(health){
            var insurance = $(health).val();
            if (insurance == 'Health Insurance'){
                $("#healthPlan").show();
            }else{
                $("#healthPlan").hide();
            }
        }
    </script>
@endsection