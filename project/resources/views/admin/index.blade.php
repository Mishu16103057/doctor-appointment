@extends('layouts.admin')

@section('content')
       <div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard header items area -->
                        <div class="panel panel-default admin">
                          <div class="panel-heading admin-title">Admin Dashboard!</div>
                              <div class="panel-body dashboard-body">
                                  <div class="dashboard-header-area">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="" class="title-stats title-skyblue">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($appointsToday)}}</div>
                                                <h4>Appointments Today!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="" class="title-stats title-red">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($appointsPending)}}</div>
                                                <h4>Appointments Pending!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="" class="title-stats title-green">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($appointsComplete)}}</div>
                                                <h4>Appointments Completed!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="" class="title-stats title-blue">
                                                <div class="icon"><i class="fa fa-sliders fa-5x"></i></div>
                                                <div class="number">{{count($patients)}}</div>
                                                <h4>Total Patient!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="" class="title-stats title-green">
                                                <div class="icon"><i class="fa fa-medkit fa-5x"></i></div>
                                                <div class="number">{{count($sps)}}</div>
                                                <h4>Specialist Contents!</h4>
                                                <span class="title-view-btn">View All</span>
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a href="" class="title-stats title-gray">
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



                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript">
        
</script>
@endsection