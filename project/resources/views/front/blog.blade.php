@extends('layouts.front')
@section('content')


<div class="title-overlay-wrap overlay" style="background-image: url({{asset('assets/images/'.$admin->bimg)}});">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h1>Blogs</h1>
              </div>
            </div>
          </div>
 </div>

<div class="section-padding margin-bottom-30 blogs-area" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
<div class="row">
                    <div class="col-md-12">
                        <div class="section-title pb_50 text-center">
                            <h2>Latest Blogs</h2>

                            <div class="section-borders">
                                <span></span>
                                <span class="black-border"></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                	@foreach($blogs as $blog)
<div class="col-md-4 col-sm-6 col-xs-12">
                       <a href="{{route('front.blogshow',$blog->id)}}" class="single-blog-item">
                            <div class="blog-img">
                                <img class="blog-img" src="{{asset('assets/images/'.$blog->photo)}}" alt="">
                                <div class="blog-meta"><span>{{ date('d',strtotime($blog->created_at))}}</span> {{ date('M',strtotime($blog->created_at))}}</div>
                            </div>
                            <div class="blog-text">   
                                <h4>{{$blog->title}}</h4>
                                <p>{{substr(strip_tags($blog->details),0,150)}}</p>

                                <span href="{{route('front.blogshow',$blog->id)}}" class="blog-btn">View Details</span>
                            </div>
                        </a>
                   </div>
                        @endforeach


                     </div>
                    <div class="text-center">
                    {!! $blogs->links() !!}                 
                    </div>
                </div>
            </div>

@endsection