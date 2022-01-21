@extends('layouts.front')

@section('content')

        <!-- Starting of Section title overlay area -->
        <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h2>{{$doctor->name}}</h2>
                <p>{{ $dep->name }}</p>
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
                            <h2>Profile Description</h2>
                            <hr>
                            <p>{!! $admin->pdesc !!}</p>
                        </div>
                        @if(isset($pareas))
                        <div class="profile-practise-area margin-bottom-30">
                            <h2>Practice Areas</h2>
                            <hr>
                            <ul class="row">
                                @foreach($pareas as $parea)
                                <li class="col-md-6 col-sm-6">{{$parea}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="other-description-box margin-bottom-30">
                            <h2>Others</h2>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Gender</th>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <th>Language</th>
                                        <td>English</td>
                                    </tr>
                                    <tr>
                                        <th>Residency</th>
                                        <td>Residency</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="profile-resume-area margin-bottom-30">
                            <h2>al</h2>
                            <hr>
                            <div class="resume-wrap">
                                @php
                                $i=0;
                                $count = count($resumes);
                                @endphp
                            @foreach($resumes as $resume)
                                <div class="single-resume-area">
                                    <div class="row">
                                        <div class="col-sm-1 col-xs-2">
                                            <div class="resume-icon">
                                                <i class="fa fa-bank"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 col-xs-10">
                                            <div class="work-place-wrap">
                                                <h3>{{$resume->title}}</h3>
                                                <p>{{$resume->subtitle}}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-sm-offset-0 col-xs-10 col-xs-offset-2">
                                            <div class="work-duration">
                                                {{$resume->duration}}
                                            </div>
                                        </div>
                                    </div>

                                    <p>{!! $resume->description !!}</p>
                                </div>
                                @if ($i != $count - 1) 
                                <hr>                                
                                @endif

                                @php
                                $i++;
                                @endphp
                            @endforeach
                            </div>
                        </div>

                        <div class="profile-contact-area margin-bottom-80">
                            <h2>doc</h2>
                            <hr>
                             @include('includes.form-success') 
                            <form action="{{route('front.contact.submit')}}" method="POST">
                                <input type="hidden" name="to" value="{{$ps->contact_email}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">con</label>
                                    <input class="form-control" name="name" placeholder="" required="" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">coe</label>
                                    <input class="form-control" name="email" placeholder="" required="" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">cor</label>
                                    <textarea name="message" class="form-control" id="comments-msg" rows="5" style="resize: vertical;" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn blog-btn comments" type="submit">sm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-right-side">
                            <div class="profile-img">
                                <img src="{{asset('assets/images/'.$doctor->photo)}}" alt="Profile image">
                            </div>

                            <div class="profile-contact-info">
                                <h2>doci</h2>
                                <hr>

                                <p><i class="fa fa-home fa-1x"></i> {{$admin->paddress}}</p>
                                @if($admin->pfax != null )
                                <p><i class="fa fa-fax fa-1x"></i> {{$admin->pfax}}</p>
                                @endif
                                <p><i class="fa fa-phone fa-1x"></i> {{$admin->pfone}}</p>
                                <p><i class="fa fa-envelope fa-1x"></i> {{$admin->pmail}}</p>
                                @if($admin->psite != null )
                                <p><i class="fa fa-globe fa-1x"></i> {{$admin->psite}}</p>
                                @endif
                            </div> 

                            <div class="share-profile-info">
                                <h2>dosp</h2>
                                <hr>

                                <div class="a2a_kit social-icon">
                                    <a class="plus a2a_dd" href=""><i class="fa fa-plus"></i></a>
                                    <a class="fb a2a_button_facebook" href=""><i class="fa fa-facebook"></i></a>
                                    <a class="twit a2a_button_twitter" href=""><i class="fa fa-twitter"></i></a>
                                    <a class="google a2a_button_google_plus" href=""><i class="fa fa-google-plus"></i></a>
                                    <a class="linkedin a2a_button_linkedin" href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>

                        <div class="medical-details-wrap">
                            <div class="visiting-area">
                                <h4><i class="fa fa-clock-o"></i> Opening Hours</h4>
                                <ul>
                                    @for($i=0;$i <= 6;$i++)
                                        @if($i == 0)
                                            <li style="font-weight: 600;">
                                                <p class="day">{{date('l', strtotime('+'.$i.' day', time()))}}</p>
                                                <p class="date">{{\App\Schedule::GetOpeningHours( $doctor->id,strtolower(date('l', strtotime('+'.$i.' day', time()))))}}</p>
                                            </li>
                                        @else
                                            <li>
                                                <p class="day">{{date('l', strtotime('+'.$i.' day', time()))}}</p>
                                                <p class="date">{{\App\Schedule::GetOpeningHours($doctor->id,strtolower(date('l', strtotime('+'.$i.' day', time()))))}}</p>
                                            </li>
                                        @endif
                                    @endfor
                                </ul>

                                <a href="javascript:void(0)"><button class="boxed-btn" data-toggle="modal" data-target="#scheduleModal">Book an appointment</button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ending of Profile area -->

            <!-- Starting of appointment modal area -->
    <div class="modal fade book-now-wrap" id="scheduleModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">chose_date_and_time</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="doc" id="doc" value="{{ $doctor->id }}">
                    <div class="row">
                        <div class="col-md-5 col-sm-6">
                            <div id="v-cal"></div>
                        </div>
                        <div class="col-md-7 col-sm-6">
                            <h4>available_times <span id="selectDate" data-calendar-label="picked">
                                </span></h4>
                            <p>h_format</p>
                            <div class="date-picked">

                            <div class="row modal-date-row" style="margin-top: 15px;">
                                <img id="dateLoader" src="{{asset('assets/images/spinner.gif')}}" style="text-align:center; display: none;height: 100px;">
                                <div id="availableDates">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h3>select_datetime</h3>
                                    </div>
                                </div>


                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <a style="display: none" href="" id="bookLink"><strong>continue_btn</strong> <i class="fa fa-chevron-right"></i></a>
                </div>
            </div>

        </div>
    </div>
    <!-- Ending of appointment modal area -->


@endsection