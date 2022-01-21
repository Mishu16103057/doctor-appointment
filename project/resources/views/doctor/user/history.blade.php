@extends('layouts.doctor')

@section('content')

            <div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard data-table area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="add-product-box">
                                      <div class="add-product-header products">
                                          <h2>{{$user->name}} - Appointments History</h2>
                                         
                                      </div>
                                      <hr>
                                  <div>
                                  @include('includes.form-success')
                                      <div class="row">
                                        <div class="col-sm-12">

                                        <table id="appoints" class="table table-striped table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Patient</th>
                                                    <th>Patients Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr id="filterrow">
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Patient</th>
                                                    <th>Patients Phone</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($appoints as $appointment)
                                                <tr>
                                                    <td>{{date('d/m/Y',strtotime($appointment->appointment_date))}}</td>
                                                    <td>{{$appointment->appointment_time}}</td>
                                                    <td>{{$appointment->patient_name}}</td>
                                                    <td>{{$appointment->patient_phone}}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" onclick="GetData({{$appointment->id}})" data-toggle="modal" data-target="#myModal">Details</button>
                                                        <a href="{{route('doctor-appointment-remove',$appointment->id)}}"  class="btn btn-danger btn-sm">Remove</a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                        <!-- Ending of Dashboard data-table area -->
                    </div>
                </div>
            </div>

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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
@endsection

@section('scripts')

    <script type="text/javascript">

        function GetData(id){
            $('#AppData').load('{{url('doctor/appointment/details')}}/'+id);
        }
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#appoints thead tr#filterrow th').each( function () {
                var title = $('#appoints thead th').eq( $(this).index() ).text();
                if(title != "Action"){
                    $(this).html( '<input type="text" onclick="stopPropagation(event);" placeholder="Search '+title+'" />' );
                }
            });

            // Apply the filter
            $("#appoints thead input").on( 'keyup change', function () {
                table
                    .column( $(this).parent().index()+':visible' )
                    .search( this.value )
                    .draw();
            });

            // DataTable
            var table = $('#appoints').DataTable( {
                orderCellsTop: true,
                "aaSorting": []
            });

            function stopPropagation(evt) {
                if (evt.stopPropagation !== undefined) {
                    evt.stopPropagation();
                } else {
                    evt.cancelBubble = true;
                }
            }

        } );

    </script>

@endsection