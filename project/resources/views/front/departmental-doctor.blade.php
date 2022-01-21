@extends('layouts.front')

@section('content')

        <!-- Starting of Section title overlay area -->
        <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h2>{{$department->name}}</h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Ending of Section title overlay area -->

 <!-- Starting of Profile area -->
        <div class="donors-profile-wrap">
            <div class="container">
                <div class="row">
                    @foreach ($doctors as $doctor)
                    <div class="col-md-4">
                        <div class="profile-right-side">
                            <div class="profile-img">
                                <img src="{{asset('assets/images/'.$doctor->photo)}}" alt="Profile image">
                            </div>

                            <div class="profile-contact-info">
                                <p><strong>Name: </strong><a href="{{ route('front.profile',$doctor->id) }}"> {{$doctor->name}}</a></p>
                                
                                <p><strong>Qualification: </strong> {{$doctor->qualification}}</p>
                                <p><strong>Phone: </strong> {{$doctor->phone}}</p>
                                
                            </div> 

                        </div>
                    </div>
                    @endforeach
                                
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <!-- Ending of Profile area -->


@endsection