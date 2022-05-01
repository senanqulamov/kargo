@extends('frontend.layout.app')

@section('title', 'Blogs')

@section('content')
<!-- Blogs Section Start -->
<section id="Blogs">
    <div class="container">
        <div class="row mt-6 mb-5">
            <div class="title" style="text-align: center;">
                <div class="col-lg-12">
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
        <div class="row my-5">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <a href="{{route('blogs.detail', Str::slug($blog->title, '-'))}}">
                    <div class="blog-card">
                        <img src="{{asset('/')}}frontend/img/blog/{{$blog->img}}" alt="">
                        <div class="text-blog">
                            <h4>{{$blog->title}}</h4>
                            <div class="dateTime">
                                <i class="fal fa-calendar-alt"></i>
                                <span>{{ date('d.m.Y H:i', strtotime($blog->created_at)) }}</span>
                            </div>
                            {!! Str::limit($blog->description, 250, ' ...') !!}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Blogs Section End -->
@endsection