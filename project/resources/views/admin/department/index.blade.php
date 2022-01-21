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
                                          <h2>Departments Section</h2>
                                          <a href="{{route('admin-dep-create')}}" class="btn add-newProduct-btn"><i class="fa fa-plus"></i> Add Department</a>  
                                      </div>
                                      <hr>
                  <div >
                                 @include('includes.form-success')
<div class="row">
  <div class="col-sm-12">
    <table id="example" class="table table-striped table-hover">
        <thead>
            <tr role="row">
                <th>Sl</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Actions</th>
                
        </thead>

        <tbody>
          @foreach($deps as $dep)                                                  
        <tr role="row" class="odd">
                <td>{{$no++}}</td>
                <td>{{$dep->name}}</td>
                <td><img src="{{ $dep->photo ? asset('assets/images/'.$dep->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="Ad Photo" style="height: 180px; width: 200px"></td>
                <td>
                    <a href="{{route('admin-sr-edit',$dep->id)}}" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit</a>
                    <a href="{{route('admin-dep-delete',$dep->id)}}" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove</a>
                  </td>
                
        </tr>
            @endforeach
            </tbody>
    </table></div></div>
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

@endsection

@section('scripts')

<script type="text/javascript">
  $('#example2').DataTable();
</script>

@endsection

