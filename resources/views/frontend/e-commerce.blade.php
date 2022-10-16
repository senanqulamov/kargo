@extends('frontend.layout.app')

@section('title', 'E-commerce')

@section('content')

<!-- First Section Start -->
<section id="First">
    <div class="container">
        <div class="row first my-5 align-items-center">
            <div class="col-lg-6">
                <div class="left-content">
                    <h1>{{ __('homepage.e-commerce.1 title') }}</h1>
                    <p>{{ __('homepage.e-commerce.1 text') }}</p>
                    <button onclick="window.open('{{ route('login') }}' , '_self')">{{ __('homepage.homepage.Start now') }}</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <img src="{{asset('/')}}frontend/img/freight-forwarding-agents_1145413 1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- First Section End -->

<!-- Second Section Start -->
<section id="Second">
    <div class="container">
        <div class="row mt-3 mb-5 align-items-center">
            <div class="col-lg-6">
                <div class="left-second">
                    <img src="{{asset('/')}}frontend/img/warehouse 1.png" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-second">
                    <h2>{{ __('homepage.e-commerce.2 title') }}</h2>
                    <span>{{ __('homepage.e-commerce.2 text') }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Second Section End -->

<!-- Thirds Section Start -->
<section id="Thirds">
    <div class="container">
        <div class="row my-5 third align-items-center">
            <div class="col-lg-6">
                <div class="left-thirds">
                    <h2>{{ __('homepage.e-commerce.3 title') }}</h2>
                    <span>{{ __('homepage.e-commerce.3 text') }}</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-thirds">
                    <img src="{{asset('/')}}frontend/img/inventory 1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Thirds Section End -->
@endsection
