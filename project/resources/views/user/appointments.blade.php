@extends('layouts.front')
@section('content')

    <!-- Starting of Section title overlay area -->
    <div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$as->bimg)}});">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="patient-profile-area text-center">
                        <div class="patient-profile-img">
                            <img src="{{asset('assets/images/patient-profile/'.Auth::guard('user')->user()->profile_photo)}}" alt="patient image">
                        </div>
                        <h1>{{Auth::guard('user')->user()->name}}</h1>
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
                            <li><a href=""><i class="fa fa-map-marker"></i> <span>{{Auth::guard('user')->user()->address}}</span></a></li>
                            <li><a href=""><i class="fa fa-phone"></i> <span>Phone : {{Auth::guard('user')->user()->phone}}</span></a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> <span>Email : {{Auth::guard('user')->user()->email}}</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8">
                    <ul class="nav nav-tabs appointment-btnsArea mb_30">
                        <li class="active"><a data-toggle="tab" href="#home" class="patient-round-btn mr_10">Appointment</a></li>
                        <li><a data-toggle="tab" href="#menu1" class="patient-round-btn">Pending Appointments</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="patient__descriptionArea">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Patient Name</th>
                                            <th>Email</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($currents as $current)
                                        <tr>
                                            <td>{{$current->appointment_date}}</td>
                                            <td>{{$current->appointment_time}}</td>
                                            <td>{{$current->patient_name}} {{$current->patient_last_name}}</td>
                                            <td>{{$current->patient_email}}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" onclick="GetData({{$current->id}})" data-toggle="modal" data-target="#myModal">Details</button>
                                                <a class="btn btn-default" href="{{route('user-pdf',$current->id)}}">Download</a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Appointments</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="patient__descriptionArea">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Patient Name</th>
                                            <th>Email</th>
                                            <th>Details</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($history as $current)
                                            <tr>
                                                <td>{{$current->appointment_date}}</td>
                                                <td>{{$current->appointment_time}}</td>
                                                <td>{{$current->patient_name}} {{$current->patient_last_name}}</td>

                                                <td>{{$current->patient_email}}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" onclick="GetData({{$current->id}})" data-toggle="modal" data-target="#myModal">Details</button>
                                                    <a class="btn btn-default" href="{{route('user-pdf',$current->id)}}">Download</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Appointments}}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ending of patient profile area -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Appointment Details</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tbody id="AppData">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    

                    
                    
                     <button onclick="window.print()" class="btn btn-default" >Print</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        function GetData(id){
            $('#AppData').load('{{url('user/appointment/details')}}/'+id);
        }
    </script>


@endsection