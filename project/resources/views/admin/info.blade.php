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
                                            <h2>Home Page Information</h2> 
                                        </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-info-submit')}}" method="POST">
                                        @include('includes.form-success')      
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Name *</label>
                                            <div class="col-sm-6">
                                              <input name="fname" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->fname}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="fax">Designation *</label>
                                            <div class="col-sm-6">
                                              <input name="title" id="fax" class="form-control" placeholder="Enter Designation" type="text" value="{{$admin->title}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="street_address">Description *</label>
                                            <div class="col-sm-6">
                                              <textarea name="description" id="street_address" class="form-control" rows="5" placeholder="Enter Description" style="resize: vertical;" required="">{{$admin->description}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="site">Link *</label>
                                            <div class="col-sm-6">
                                              <input name="link" id="site" class="form-control" placeholder="https://www.google.com/" type="text" value="{{$admin->link}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="site">Specialist Title *</label>
                                            <div class="col-sm-6">
                                              <input name="st" id="site" class="form-control" placeholder="Specialist Title" type="text" value="{{$admin->st}}" required="">
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Information</button> 
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
<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
@endsection