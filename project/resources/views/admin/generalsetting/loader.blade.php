@extends('layouts.admin')

@section('content')
<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard Website Logo -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                        <div class="add-product-header">
                                            <h2>Website Loader</h2>
                                        </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-gs-loaderup')}}" method="POST" enctype="multipart/form-data">
                                            @include('includes.form-error')
                                            @include('includes.form-success')      
                                          {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="disable/enable_about_page">Disable/Enable Website Loader *</label>
                                                <div class="col-sm-3">
                                                    <label class="switch">
                                                        <input type="checkbox" name="loader_status" value="1" {{$data->loader_status==1?"checked":""}}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="current_logo">Current Website Loader</label>
                                            <div class="col-sm-6">
                                                <img width="130px" height="90px" id="adminimg" src="{{ $data->loader_image ? asset('assets/images/'.$data->loader_image): asset('assets/front/img/load.gif')}}" alt="" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="setup_new_logo">Setup New Website Loader *</label>
                                            <div class="col-sm-6">
                                              <input  type="file" name="loader" accept="images/*">
                                            </div>
                                          </div>
                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Setting</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Website Logo -->
                </div>
            </div>
        </div>
    </div>
@endsection