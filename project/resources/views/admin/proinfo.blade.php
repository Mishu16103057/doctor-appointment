@extends('layouts.admin')

@section('styles')

<link href="{{asset('assets/admin/css/jquery.tagit.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

@endsection

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
                                            <h2>Profile Page Information</h2> 
                                        </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-proinfo-submit')}}" method="POST">
                                        @include('includes.form-success')      
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Profile Name *</label>
                                            <div class="col-sm-6">
                                              <input name="pname" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->pname}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="fax">Profile Designation *</label>
                                            <div class="col-sm-6">
                                              <input name="prole" id="fax" class="form-control" placeholder="Enter Designation" type="text" value="{{$admin->prole}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="street_address">Profile Description *</label>
                                            <div class="col-sm-6">
                                              <textarea name="pdesc" id="street_address" class="form-control" rows="5" placeholder="Enter Description" style="resize: vertical;" required="">{{$admin->pdesc}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Gender*</label>
                                            <div class="col-sm-6">
                                              <input name="pgender" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->pgender}}" required="">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Language*</label>
                                            <div class="col-sm-6">
                                              <input name="planguage" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->planguage}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Residency*</label>
                                            <div class="col-sm-6">
                                              <input name="presidency" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->presidency}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Fax*</label>
                                            <div class="col-sm-6">
                                              <input name="pfax" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->pfax}}">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Address*</label>
                                            <div class="col-sm-6">
                                              <input name="paddress" id="phone" class="form-control" placeholder="Enter Address" type="text" value="{{$admin->paddress}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Phone*</label>
                                            <div class="col-sm-6">
                                              <input name="pfone" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->pfone}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Email*</label>
                                            <div class="col-sm-6">
                                              <input name="pmail" id="phone" class="form-control" placeholder="Enter Name" type="email" value="{{$admin->pmail}}" required="">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">WebSite*</label>
                                            <div class="col-sm-6">
                                              <input name="psite" id="phone" class="form-control" placeholder="Enter Name" type="text" value="{{$admin->psite}}">
                                            </div>
                                          </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-4" for="phone">Practice Areas* <span>Separated By Comma (,)</span></label>
                                            <div class="col-sm-6">
                                              <ul id="myTags">
                                              @if(isset($pareas))
                                              @foreach($pareas as $parea)
                                              <li>{{$parea}}</li>
                                              @endforeach
                                              @endif
                                              </ul>
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
<script src="{{asset('assets/admin/js/jquery152.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jqueryui.min.js')}}"></script>    
<script src="{{asset('assets/admin/js/tag-it.js')}}" type="text/javascript" charset="utf-8"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $("#myTags").tagit({
          fieldName: "pareas[]",
          allowSpaces: true 
        });
    });
</script>
<script type="text/javascript" src="{{asset('assets/admin/js/nicEdit.js')}}"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
@endsection