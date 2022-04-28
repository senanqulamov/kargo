@extends('frontend.layout.app')

@section('title', 'Page Not Found')

@section('content')
<!-- 404 Start -->
<section id="Error">
    <div class="container">
        <div class="row error">
            <div class="col-lg-12">
                <div class="errorMessage my-6">
                    <img src="{{asset('/')}}frontend/img/animation.gif" alt="404">
                    <div class="message">
                        <h1>404</h1>
                        <h2> Not Found</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 404 End -->
@endsection