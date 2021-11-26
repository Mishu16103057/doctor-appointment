@extends('layouts.admin')

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
                                          <h2>Patients</h2>
                                          {{--<a href="{{route('admin-user-create')}}" class="btn add-newProduct-btn"><i class="fa fa-plus"></i> Add HandyMan</a>  --}}
                                      </div>
                                      <hr>
                  <div>
                                 @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
    <table id="example" class="table table-striped table-hover">
                                              <thead>
                                                  <tr role="row">
                                                      <th>Patient Photo</th>
                                                      <th>Patient Name</th>
                                                      <th>Mobile</th>
                                                      <th>Email</th>
                                                      <th>Actions</th></tr>
                                              </thead>

                                              <tbody>
                                                @foreach($users as $user)                                                  
                                              <tr role="row" class="odd">

                                                      <td><img src="{{ $user->profile_photo ? asset('assets/images/patient-profile/'.$user->profile_photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Donor's Photo" style="height: auto; width: 75px;"></td>
                                                      <td>{{$user->name}}</td>
                                                      <td>{{$user->mobile}}</td>
                                                      <td>{{$user->email}}</td>
                                                  <td>
                                                      <button class="btn btn-primary product-btn" onclick="GetData({{$user->id}})" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> Details</button>
                                                      <a href="{{route('admin-user-appointments',$user->id)}}" class="btn btn-success product-btn"><i class="fa fa-list"></i> Appointments</a>
                                                      <a href="{{route('admin-user-edit',$user->id)}}" class="btn btn-warning product-btn"><i class="fa fa-edit"></i> Edit</a>
                                                      <a href="{{route('admin-user-delete',$user->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
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
                        <h4 class="modal-title">Patient Details</h4>
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
  $('#example').DataTable();
  function GetData(id){
      $('#AppData').load('{{url('admin/patient/details')}}/'+id);
  }
</script>

@endsection