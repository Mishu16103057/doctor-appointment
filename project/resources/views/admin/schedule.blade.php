@extends('layouts.admin')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Office Address -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                        <div class="add-product-header">
                                            <h2>My Schedule</h2>
                                        </div>
                                        <hr>
                                        @include('includes.form-success')

                                        <form class="form-horizontal" action="{{ route('admin-schedule-update')}}" method="POST">
                                          {{csrf_field()}}
                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Sunday *</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control timepicker" onchange="tpMinMaxSetMinTime($(this).timepicker('getHour'),$(this).timepicker('getMinute'),'sunday');" value="{{$schedule->sunday_start}}" name="sunday_start" placeholder="start time">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="sunday_end"  class="form-control timepicker" onchange="generateTimes('sunday')" value="{{$schedule->sunday_end}}" name="sunday_end" placeholder="end time">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <span class="control-label col-sm-2"> Sunday Appointment Times: *</span>
                                                  <div id="sunday_times">
                                                      <div class="col-md-10 col-sm-12 col-xs-12">
                                                          <div id="times">
                                                              @foreach(explode(',',$schedule->sunday_times) as $sunday)
                                                                  <label class="checkbox-inline">
                                                                      <input type="checkbox" name="sunday_times[]" value="{{$sunday}}" checked>
                                                                      {{$sunday}}
                                                                  </label>
                                                              @endforeach
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Monday *</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control timepicker" onchange="tpMinMaxSetMinTime($(this).timepicker('getHour'),$(this).timepicker('getMinute'),'monday');" value="{{$schedule->monday_start}}" name="monday_start" placeholder="start time">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="monday_end"  class="form-control timepicker" onchange="generateTimes('monday')" value="{{$schedule->monday_end}}" name="monday_end" placeholder="end time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="control-label col-sm-2"> Monday Appointment Times: *</span>
                                                <div id="monday_times">
                                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                                        <div id="times">
                                                            @foreach(explode(',',$schedule->monday_times) as $monday)
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="monday_times[]" value="{{$monday}}" checked>
                                                                    {{$monday}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Tuesday *</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control timepicker" onchange="tpMinMaxSetMinTime($(this).timepicker('getHour'),$(this).timepicker('getMinute'),'tuesday');" value="{{$schedule->tuesday_start}}" name="tuesday_start" placeholder="start time">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="tuesday_end"  class="form-control timepicker" onchange="generateTimes('tuesday')" value="{{$schedule->monday_end}}" name="tuesday_end" placeholder="end time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="control-label col-sm-2"> Tuesday Appointment Times: *</span>
                                                <div id="tuesday_times">
                                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                                        <div id="times">
                                                            @foreach(explode(',',$schedule->tuesday_times) as $tuesday)
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="tuesday_times[]" value="{{$tuesday}}" checked>
                                                                    {{$tuesday}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Wednesday *</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control timepicker" onchange="tpMinMaxSetMinTime($(this).timepicker('getHour'),$(this).timepicker('getMinute'),'wednesday');" value="{{$schedule->wednesday_start}}" name="wednesday_start" placeholder="start time">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="wednesday_end"  class="form-control timepicker" onchange="generateTimes('wednesday')" value="{{$schedule->wednesday_end}}" name="wednesday_end" placeholder="end time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="control-label col-sm-2"> Wednesday Appointment Times: *</span>
                                                <div id="wednesday_times">
                                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                                        <div id="times">
                                                            @foreach(explode(',',$schedule->wednesday_times) as $wednesday)
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="wednesday_times[]" value="{{$wednesday}}" checked>
                                                                    {{$tuesday}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Thursday *</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control timepicker" onchange="tpMinMaxSetMinTime($(this).timepicker('getHour'),$(this).timepicker('getMinute'),'thursday');" value="{{$schedule->thursday_start}}" name="thursday_start" placeholder="start time">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="thursday_end"  class="form-control timepicker" onchange="generateTimes('thursday')" value="{{$schedule->thursday_end}}" name="thursday_end" placeholder="end time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="control-label col-sm-2"> Thursday Appointment Times: *</span>
                                                <div id="thursday_times">
                                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                                        <div id="times">
                                                            @foreach(explode(',',$schedule->thursday_times) as $thursday)
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="thursday_times[]" value="{{$thursday}}" checked>
                                                                    {{$tuesday}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Friday *</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control timepicker" onchange="tpMinMaxSetMinTime($(this).timepicker('getHour'),$(this).timepicker('getMinute'),'friday');" value="{{$schedule->friday_start}}" name="friday_start" placeholder="start time">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="friday_end"  class="form-control timepicker" onchange="generateTimes('friday')" value="{{$schedule->friday_end}}" name="friday_end" placeholder="end time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="control-label col-sm-2"> Friday Appointment Times: *</span>
                                                <div id="friday_times">
                                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                                        <div id="times">
                                                            @foreach(explode(',',$schedule->friday_times) as $friday)
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="friday_times[]" value="{{$friday}}" checked>
                                                                    {{$friday}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Saturday *</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control timepicker" onchange="tpMinMaxSetMinTime($(this).timepicker('getHour'),$(this).timepicker('getMinute'),'saturday');" value="{{$schedule->saturday_start}}" name="saturday_start" placeholder="start time">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" id="saturday_end"  class="form-control timepicker" onchange="generateTimes('saturday')" value="{{$schedule->saturday_end}}" name="saturday_end" placeholder="end time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span class="control-label col-sm-2"> Saturday Appointment Times: *</span>
                                                <div id="sunday_times">
                                                    <div class="col-md-10 col-sm-12 col-xs-12">
                                                        <div id="times">
                                                            @foreach(explode(',',$schedule->saturday_times) as $saturday)
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="saturday_times[]" value="{{$saturday}}" checked>
                                                                    {{$friday}}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="phone">Accepted Insurance: *</label>
                                                <div class="col-md-8 col-sm-12 col-xs-12">
                                                        <input type="text" data-role="tagsinput" name="accepted_insurance" class="form-control" value="{{$schedule->accepted_insurance}}" placeholder="Accepted Insurance">
                                                </div>
                                                <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                                                        Please separate each one with comma (,)
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Schedule</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Office Address -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.timepicker').timepicker();

        function tpMinMaxSetMinTime( hour, minute, day ) {
            generateTimes(day);
            $('#'+day+'_end').timepicker('option', { minTime: { hour: hour+1, minute: 0} });
        }

        function generateTimes(day) {
            var start_day = day+'_start';
            var end_day = day+'_end';

            var start = $("input[name='"+start_day+"']").val();
            var end = $("input[name='"+end_day+"']").val();
            if(start != "" && end != ""){
                $.get("{{url('/admin/schedule/times?start=')}}"+start+"&end="+end+"&day="+day, function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    $("#"+day+"_times").find('#times').html(data);
                });
            }

        }
    </script>
@endsection