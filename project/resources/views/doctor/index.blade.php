@extends('layouts.doctor')

@section('content')
       <div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard header items area -->
                        <div class="panel panel-default admin">
                          <div class="panel-heading admin-title">Doctor Dashboard!</div>
                              <div class="panel-body dashboard-body">
                                  <div class="dashboard-header-area">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('doctor-appointment-today',Auth::guard('doctor')->user()->id)}}" class="title-stats title-skyblue">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($appointsToday)}}</div>
                                                <h4>Appointments Today!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('doctor-appointment-pending',Auth::guard('doctor')->user()->id)}}" class="title-stats title-red">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($appointsPending)}}</div>
                                                <h4>Appointments Pending!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('doctor-appointment-history',Auth::guard('doctor')->user()->id)}}" class="title-stats title-green">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($appointsComplete)}}</div>
                                                <h4>Appointments Completed!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('admin-sl-index')}}" class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($patients)}}</div>
                                                <h4>Total Patient!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('admin-sp-index')}}" class="title-stats title-green">
                                                <div class="icon"><i class="fa fa-medkit fa-5x"></i></div>
                                                <div class="number">{{count($sps)}}</div>
                                                <h4>Specialist Contents!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="{{route('admin-sr-index')}}" class="title-stats title-gray">
                                                <div class="icon"><i class="fa fa-ambulance fa-5x"></i></div>
                                                <div class="number">{{count($services)}}</div>
                                                <h4>Total Service!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ending of Dashboard header items area -->

                    <!-- Starting of Dashboard Top reference + Most Used OS area -->
                    <div class="reference-OS-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-default admin top-reference-area">
                                    <div class="panel-heading">Top Referrals</div>
                                    <div class="panel-body">
                                        <div id="chartContainer-topReference"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="panel panel-default admin top-reference-area">
                                    <div class="panel-heading">Most Used OS</div>
                                    <div class="panel-body">
                                        <div id="chartContainer-os"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Top reference + Most Used OS area -->

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript">
        var chart1 = new CanvasJS.Chart("chartContainer-topReference",
            {
                exportEnabled: true,
                animationEnabled: true,

                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                                @foreach($referrals as $browser)
                                    {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                                @endforeach
                        ]
                    }
                ]
            });
        chart1.render();

        var chart = new CanvasJS.Chart("chartContainer-os",
            {
                exportEnabled: true,
                animationEnabled: true,
                legend: {
                    cursor: "pointer",
                    horizontalAlign: "right",
                    verticalAlign: "center",
                    fontSize: 16,
                    padding: {
                        top: 20,
                        bottom: 2,
                        right: 20,
                    },
                },
                data: [
                    {
                        type: "pie",
                        showInLegend: true,
                        legendText: "",
                        toolTipContent: "{name}: <strong>{#percent%} (#percent%)</strong>",
                        indexLabel: "#percent%",
                        indexLabelFontColor: "white",
                        indexLabelPlacement: "inside",
                        dataPoints: [
                            @foreach($browsers as $browser)
                                {y:{{$browser->total_count}}, name: "{{$browser->referral}}"},
                            @endforeach
                        ]
                    }
                ]
            });
        chart.render();    
</script>
@endsection