@extends('frontend.layout.app')

@section('title', 'Blog')

@section('content')
<!-- Blogs Section Start -->
<section id="Blog">
    <div class="container">
        <div class="row blogCard">
            <div class="col-lg-12">
                <div class="blog-img">
                    <img src="{{asset('/')}}frontend/img/blog/{{$details->img}}" alt="">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="blog-content">
                    <h3>{{$details->title}}</h3>
                    <div class="dateBlog">
                        <i class="fal fa-calendar-alt"></i>
                        <span>{{ date('d.m.Y H:i', strtotime($details->created_at)) }}</span>
                    </div>
                    <div class="paragraph">{!! $details->description !!}</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blogs Section End -->
@endsection