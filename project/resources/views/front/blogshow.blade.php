@extends('layouts.front')
@section('content')
<div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h1>BLOG DETAILS</h1>
              </div>
            </div>
          </div>
        </div>
<div class="section-padding blog-post-wrapper wow fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>{{$blog->title}}</h2>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{$blog->created_at->diffForHumans()}}</li>
                                <li>bs : {{$blog->source}}</li>
                                <li><i class="fa fa-eye"></i> {{$blog->views}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p><img src="{{asset('assets/images/'.$blog->photo)}}" alt=""></p>
                        <div class="entry-content">
                          {!!$blog->details!!}
                        </div>

                        <div class="social-sharing a2a_kit a2a_kit_size_32">
                            <a class="facebook a2a_button_facebook" href=""><i class="fa fa-facebook"></i> Share </a>
                            <a class="twitter a2a_button_twitter" href=""><i class="fa fa-twitter"></i> Tweet</a>
                            <a class="pinterest a2a_button_google_plus" href=""><i class="fa fa-pinterest"></i> Pinterest</a>
                        </div>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>

                       

                        </div>

                    <div class="col-md-4">
                       <div class="post-sidebar-area">
                           <h2 class="post-heading">Recent Posts</h2>
                           <ul>
                              @foreach($lblogs as $lblog)
                               <li>
                                   <div class="row post-row">
                                       <div class="col-xs-4">

                                           <img src="{{asset('assets/images/'.$lblog->photo)}}" alt="">
                                       </div>
                                       <div class="col-xs-8">
                                           <p class="post-meta-date">{{date('d M Y',(strtotime($lblog->created_at)))}}</p>
                                           <a href="{{route('front.blogshow',$lblog->id)}}">{{$lblog->title}}</a>
                                       </div>
                                   </div>
                               </li>
                               @endforeach
                           </ul>
                       </div>
                   </div>
                </div>
            </div>
        </div>
@endsection