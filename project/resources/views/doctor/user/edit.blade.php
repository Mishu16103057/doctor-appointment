@extends('layouts.doctor')

@section('content')

<div class="right-side">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- Starting of Dashboard area -->
                        <div class="section-padding add-product-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="add-product-box">
                                        <div class="add-product-header">
                                            <h2>Edit Patient</h2>
                                            <a href="{{route('admin-user-index')}}" class="btn add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>  
                                        </div>
                                        <hr>
                                        <form class="form-horizontal" action="{{route('admin-user-update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                          @include('includes.form-error')
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_full_name">Full Name*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="name" id="edit_full_name" placeholder="Enter Full Name" required="" type="text" value="{{$user->name}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_current_photo">Current Photo*</label>
                                            <div class="col-sm-6">
     
                                              <img width="130px" height="90px" id="adminimg" src="{{ $user->profile_photo ? asset('assets/images/patient-profile/'.$user->profile_photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="adminimg">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_photo">Profile Photo *</label>
                                            <div class="col-sm-6">
                                    <input type="file" id="uploadFile" class="hidden" name="photo" value="">
                                              <button type="button" id="uploadTrigger" onclick="uploadclick()" class="form-control"><i class="fa fa-download"></i> Edit Profile Photo</button>
                                              <p>Prefered Size: (600x600) or Square Sized Image</p>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_profile_description">Patient Health Information*</label>
                                            <div class="col-sm-6"> 
                                              <textarea class="form-control" name="my_info" id="edit_profile_description" rows="5" style="resize: vertical;" placeholder="Enter Profile Description">{{$user->my_info}}</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_age">Age*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="age" id="edit_age" placeholder="Enter Age" required="" type="text" value="{{$user->age}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_address">Address*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="address" id="edit_address" placeholder="Enter Address" required="" type="text" value="{{$user->address}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_phone">Phone*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="phone" id="edit_phone" placeholder="Enter Phone" required="" type="text" value="{{$user->phone}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="fax">Fax*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="fax" id="edit_fax" placeholder="Enter Fax" type="text" value="{{$user->fax}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-4" for="edit_email">Email*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="email" id="edit_email" placeholder="Enter Email" required="" type="email" value="{{$user->email}}">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="email">Password*</label>
                                            <div class="col-sm-6">
                                              <input class="form-control" name="password" id="email" placeholder="Enter Password"  type="password">
                                            </div>                                              </div>

                                            <hr>
                                            <div class="add-product-footer">
                                                <button name="addProduct_btn" type="submit" class="btn add-product_btn">Update Patient</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard area --> 
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

<script type="text/javascript">
  
  function uploadclick(){
    $("#uploadFile").click();
    $("#uploadFile").change(function(event) {
          readURL(this);
        $("#uploadTrigger").html($("#uploadFile").val());
    });

}


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#adminimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

@endsection