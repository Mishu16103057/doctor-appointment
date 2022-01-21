@extends('layouts.front')
@section('content')
<div class="donors-profile-top-bg overlay text-center wow fadeInUp" style="background-image: url({{asset('assets/images/'.$gs->bgimg)}}); visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{$user->name}}</h2>
                        <p>{{$lang->bg}} {{$user->category->cat_name}}</p>   
                    </div>
                </div>
            </div>
        </div>

<div class="donors-profile-wrap wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="profile-description-box margin-bottom-30">
                            <h2>{{$lang->dopd}}</h2>
                            <hr>
                            <p>{!!$user->description!!}</p>
                        </div>

                        <div class="other-description-box margin-bottom-30">
                            <h2>{{$lang->doo}}</h2>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>{{$lang->dol}}</th>
                                        <td>{{$user->language}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{$lang->doa}}</th>
                                        <td>{{$user->age}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{$lang->doe}}</th>
                                        <td>{{$user->education}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{$lang->dor}}</th>
                                        <td>{{$user->residency}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{$lang->dopr}}</th>
                                        <td>{{$user->profession}}</td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>
                        
                        <div class="other-description-box margin-bottom-30">
                            <h2>{{$lang->md}}</h2>
                            <hr>
                            @if($user->title!=null && $user->details!=null)
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                              @foreach(array_combine($title,$details) as $ttl => $dtl)
                                    <tr>
                                        <th>{{$ttl}}</th>
                                        <td>{{$dtl}}</td>
                                    </tr>
                              @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>

                        @if(!empty($ad728x90))
                        @if($ad728x90->type == "banner")
                        <div class="add-area margin-bottom-30">
                            <a href="{{route('front.ads',$ad728x90->id)}}">
                            <img src="{{  asset('assets/images/'.$ad728x90->photo) }}" alt="{{$ad728x90->alt}}">
                            </a>
                        </div>
                        @else
                            {!! $ad728x90->script !!}
                        @endif
                        @endif

                        <div class="profile-contact-area margin-bottom-30">
                            <h2>{{$lang->doc}}</h2>
                            <hr>
                             @include('includes.form-success') 
                            <form action="{{route('front.user.submit')}}" method="POST">
                                <input type="hidden" name="to" value="{{$user->email}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="name">{{$lang->don}}</label>
                                    <input class="form-control" name="name" placeholder="" required="" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{$lang->doem}}</label>
                                    <input class="form-control" name="email" placeholder="" required="" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">{{$lang->dom}}</label>
                                    <textarea name="message" class="form-control" id="message" rows="5" style="resize: vertical;" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">{{$lang->sm}}</button>
                                </div>
                            </form>
                        </div>  

                    </div>
                    <div class="col-md-4">
                        <div class="profile-right-side">
                            <div class="profile-img">
                                <img width="130px" height="90px" id="adminimg" src="{{ $user->photo ? asset('assets/images/'.$user->photo):'http://fulldubai.com/SiteImages/noimage.png'}}" alt="" id="adminimg">
                            </div>

                            <div class="profile-contact-info">
                                <h2>{{$lang->doci}}</h2>
                                <hr>

                                <p><i class="fa fa-home fa-1x"></i>&nbsp;{{$user->address}}</p>
                                @if($user->fax != null)
                                <p><i class="fa fa-fax fa-1x"></i>&nbsp;{{$user->fax}}</p>
                                @endif
                                <p><i class="fa fa-phone fa-1x"></i>&nbsp;{{$user->phone}}</p>
                                <p><i class="fa fa-envelope fa-1x"></i>&nbsp;{{$user->email}}</p>
                                @if($user->web != null)
                                <p><i class="fa fa-globe fa-1x"></i>&nbsp;{{$user->web}}</p>
                                @endif
                            </div> 

                            <div class="share-profile-info">
                                <h2>{{$lang->dosp}}</h2>
                                <hr>

                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href=""></a>
                                    <a class="a2a_button_facebook" href=""></a>
                                    <a class="a2a_button_twitter" href=""></a>
                                    <a class="a2a_button_google_plus" href=""></a>
                                    <a class="a2a_button_linkedin" href=""></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>

                        @if(!empty($ad300x250))
                        @if($ad300x250->type == "banner")
                        <br>
                        <div class="add-area margin-bottom-30">
                            <a href="{{route('front.ads',$ad300x250->id)}}">
                            <img src="{{  asset('assets/images/'.$ad300x250->photo) }}" alt="{{$ad300x250->alt}}">
                            </a>
                        </div>
                        @else
                            {!! $ad300x250->script !!}
                        @endif
                        @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection