@extends('layouts.front')
@section('content')
<div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h1>About</h1>
              </div>
            </div>
          </div>
 </div>
      <div class="section-padding about-area-wrapper margin-bottom-30 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {!! $about !!}
                       </div>
                   </div>
               </div>
           </div>

@endsection