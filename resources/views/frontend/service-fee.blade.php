@extends('frontend.layout.app')

@section('title', 'Service Fee')

@section('content')
    <style>
        .services-select {
            display: flex;
            align-items: flex-start !important;
            flex-direction: column !important;
        }

        .services-select input,
        output {
            display: inline-block;
            vertical-align: middle;
            font-size: 1em;

        }

        .services-select output {
            background: transparent;
            border-radius: 3px;
            color: #000;
            #000: 15px 0;
            font-size: 30px;
        }

        .services-select input[type="number"] {
            width: 40px;
            padding: 4px 5px;
            border: 1px solid #bbb;
            border-radius: 3px;
        }

        /* input[type="range"]:focus,
                                input[type="number"]:focus {
                                box-shadow: 0 0 3px 1px #4b81dd;
                                outline: none;
                                } */

        .services-select input[type="range"] {
            -webkit-appearance: none;
            margin-right: 15px;
            width: 100%;
            height: 7px;
            padding: 0 !important;
            background: #c8c8c8;
            border-radius: 5px;
            background-image: linear-gradient(#2386FF, #2386ff);
            background-size: 0% 100%;
            background-repeat: no-repeat;
        }

        /* Input Thumb */
        .services-select input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #2386FF;
            cursor: ew-resize;
            box-shadow: 0 0 2px 0 #555;
            transition: background .3s ease-in-out;
        }

        .services-select input[type="range"]::-moz-range-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #2386FF;
            cursor: ew-resize;
            box-shadow: 0 0 2px 0 #555;
            transition: background .3s ease-in-out;
        }

        .services-select input[type="range"]::-ms-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #2386FF;
            cursor: ew-resize;
            box-shadow: 0 0 2px 0 #555;
            transition: background .3s ease-in-out;
        }

        .services-select input[type="range"]::-webkit-slider-thumb:hover {
            background: #2386FF;
        }

        .services-select input[type="range"]::-moz-range-thumb:hover {
            background: #2386FF;
        }

        .services-select input[type="range"]::-ms-thumb:hover {
            background: #2386FF;
        }

        /* Input Track */
        .services-select input[type=range]::-webkit-slider-runnable-track {
            -webkit-appearance: none;
            box-shadow: none;
            border: none;
            background: transparent;
        }

        .services-select input[type=range]::-moz-range-track {
            -webkit-appearance: none;
            box-shadow: none;
            border: none;
            background: transparent;
        }

        .services-select input[type="range"]::-ms-track {
            -webkit-appearance: none;
            box-shadow: none;
            border: none;
            background: transparent;
        }
    </style>
    <!-- ServicesFee start -->
    <section id="ServicesFeeTitle">
        <div class="container">
            <div class="row mt-6 mb-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="title">
                        <h2>{{ __('homepage.service-fee.text 1') }}</h2>
                        <span>{{ __('homepage.service-fee.text 2') }}</span>
                    </div>
                </div>
            </div>
            <div class="row servicesContent justify-content-center my-5">
                <div class="col-lg-12">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link link-contetn active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home" href="#">
                                <img src="{{ asset('/') }}frontend/img/fullfilmentServices1.svg" alt="">
                                <span>{{ __('homepage.service-fee.text 3') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-contetn" id="about-tab" data-bs-toggle="tab" data-bs-target="#about"
                                href="#">
                                <img src="{{ asset('/') }}frontend/img/warehousing.svg" alt="">
                                <span>{{ __('homepage.service-fee.text 4') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-contetn" id="album-tab" data-bs-toggle="tab" data-bs-target="#album"
                                href="#">
                                <img src="{{ asset('/') }}frontend/img/amazomFba.svg" alt="">
                                <span>{{ __('homepage.service-fee.text 5') }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row mt-6 mb-5" style="text-align: center;">
                                <div class="col-lg-12">
                                    <div class="title-fulment">
                                        <h2>{{ __('homepage.service-fee.text 6') }}</h2>
                                        <span>{{ __('homepage.service-fee.text 7') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row t my-5">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="padding-bottom: 30px;" scope="col" class="tableBox">
                                                <span>{{ __('homepage.fullfilment.Fulfillment Fees text') }}</span>
                                            </th>
                                            <th scope="col" class="tableBox">
                                                <div class="table-title">
                                                    <img src="{{ asset('/') }}frontend/img/table1.svg" alt="">
                                                    <span>0 - 100 Gr</span>
                                                </div>
                                            </th>
                                            <th scope="col" class="tableBox">
                                                <div class="table-title">
                                                    <img src="{{ asset('/') }}frontend/img/table2.svg" alt="">
                                                    <span>100 - 200 Gr</span>
                                                </div>
                                            </th>
                                            <th scope="col" class="tableBox">
                                                <div class="table-title">
                                                    <img src="{{ asset('/') }}frontend/img/table3.svg" alt="">
                                                    <span>200 - 300 Gr</span>
                                                </div>
                                            </th>
                                            <th scope="col" class="tableBox">
                                                <div class="table-title">
                                                    <img src="{{ asset('/') }}frontend/img/table4.svg" alt="">
                                                    <span>300 - 450 Gr</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            @php
                                                $settings = DB::table('settings')
                                                    ->where('name', 'Packaging Fees')
                                                    ->orderBy('text')
                                                    ->get();
                                            @endphp
                                            <th class="oneColumn" scope="col">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -1') }}</th>
                                            @foreach ($settings as $setting)
                                                <th scope="col">{!! json_decode($setting->details) !!}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -2') }}</th>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -3') }}</th>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -4') }}</th>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -5') }}</th>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -6') }}</th>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -7') }}</th>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -8') }}</th>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                            <td><img src="{{ asset('/') }}frontend/img/tic.svg" alt=""></td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -9') }}</th>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -10') }}</th>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                            <td>{{ __('homepage.fullfilment.Included in the price') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -11') }}</th>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -12') }}</th>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -13') }}</th>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -14') }}</th>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                        </tr>
                                        <tr>
                                            <th class="oneColumn" scope="row">
                                                {{ __('homepage.fullfilment.Fulfillment Fees text -15') }}</th>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                            <td>0.49$</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <div class="row  mt-6 mb-5" style="text-align: center;">
                                <div class="col-lg-12">
                                    <div class="storage-title">
                                        <h2>{{ __('homepage.service-fee.text 8') }}</h2>
                                        <span>{{ __('homepage.service-fee.text 9') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-5 ">
                                <div class="col-lg-4">
                                    <div class="storage-card">
                                        <div class="storage-img">
                                            <img src="{{ asset('/') }}frontend/img/box 1.svg" alt="">
                                        </div>
                                        <div class="storage-desc">
                                            <h4>{{ __('homepage.service-fee.text 10') }}</h4>
                                            <span>{{ __('homepage.service-fee.text 11') }}</span>
                                        </div>
                                        <div class="storage-price">
                                            <span>
                                                @php
                                                    $setting = DB::table('settings')
                                                        ->where([['name', '=', 'Storage Fee'], ['text', '=', 'Kutu']])
                                                        ->first();
                                                @endphp
                                                @if ($setting)
                                                    {!! json_decode($setting->details) !!}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="storage-card">
                                        <div class="storage-img">
                                            <img src="{{ asset('/') }}frontend/img/store 1.svg" alt="">
                                        </div>
                                        <div class="storage-desc">
                                            <h4>{{ __('homepage.service-fee.text 12') }}</h4>
                                            <span>{{ __('homepage.service-fee.text 13') }}</span>
                                        </div>
                                        <div class="storage-price">
                                            <span>
                                                @php
                                                    $setting = DB::table('settings')
                                                        ->where([['name', '=', 'Storage Fee'], ['text', '=', 'Raf']])
                                                        ->first();
                                                @endphp
                                                @if ($setting)
                                                    {!! json_decode($setting->details) !!}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="storage-card">
                                        <div class="storage-img">
                                            <img src="{{ asset('/') }}frontend/img/packages 1.svg" alt="">
                                        </div>
                                        <div class="storage-desc">
                                            <h4>{{ __('homepage.service-fee.text 14') }}</h4>
                                            <span>{{ __('homepage.service-fee.text 15') }}</span>
                                        </div>
                                        <div class="storage-price">
                                            <span>
                                                @php
                                                    $setting = DB::table('settings')
                                                        ->where([['name', '=', 'Storage Fee'], ['text', '=', 'Palet']])
                                                        ->first();
                                                @endphp
                                                @if ($setting)
                                                    {!! json_decode($setting->details) !!}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="album" role="tabpanel" aria-labelledby="album-tab">
                            <div class="row mt-6 mb-5" style="text-align: center;">
                                <div class="col-lg-12">
                                    <div class="title">
                                        <h2>{{ __('homepage.service-fee.text 16') }}</h2>
                                        <span>{{ __('homepage.service-fee.text 17') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-6">
                                <div class="col-lg-8">
                                    <div class="left-bar">
                                        <div class="bar-title">
                                            <h4>{{ __('homepage.service-fee.text 18') }}</h4>
                                            <span>{{ __('homepage.service-fee.text 19') }}</span>
                                        </div>
                                        <div class="bar1">
                                            <h4>{{ __('homepage.service-fee.text 20') }}</h4>
                                            <span>{{ __('homepage.service-fee.text 21') }}</span>
                                        </div>
                                        <div class="services-select">
                                            <input type="range" value="0"min="0"max="100"
                                                oninput="rangevalue.value=value" />
                                            <output id="rangevalue">0</output>
                                        </div>
                                        <div class="bar2">
                                            <h4>{{ __('homepage.service-fee.text 22') }}</h4>
                                            <span>{{ __('homepage.service-fee.text 23') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="right-bar">
                                        <div class="bar-card">
                                            <img src="{{ asset('/') }}frontend/img/Saving04.png" alt="">
                                            <span>{{ __('homepage.service-fee.text 24') }}</span>
                                            <span>0.00 $</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" row mt-5 grid">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <label class="card" for="card-1" onclick="sumService(this)" data-clicked="false"
                                        data-price="">
                                        <input class="card__input" type="checkbox" id="card-1" />
                                        <div class="card__body">
                                            <div class="card__body-cover">
                                                <img class="card__body-cover-image"
                                                    src="{{ asset('/') }}frontend/img/barcod.png" />
                                                <span class="card__body-cover-checkbox">
                                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                                <h5 class="card__body-header-title">FNSKU Barcoding</h5>
                                                <p class="card__body-header-subtitle">
                                                    @php
                                                        $setting = DB::table('settings')
                                                            ->where([['name', '=', 'Amazon Fba'], ['text', '=', 'Barcoding']])
                                                            ->first();
                                                    @endphp
                                                    @if ($setting)
                                                        {!! json_decode($setting->details) !!}
                                                    @endif
                                                </p>
                                            </div>
                                            <!-- <header class="card__body-header">
                                                                            </header> -->
                                        </div>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <label class="card"><input class="card__input" type="checkbox" />
                                        <div class="card__body">
                                            <div class="card__body-cover">
                                                <img class="card__body-cover-image"
                                                    src="{{ asset('/') }}frontend/img/material.png" />
                                                <span class="card__body-cover-checkbox">
                                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                            </div>
                                            <h5 class="card__body-header-title">Protective Material</h5>
                                            <p class="card__body-header-subtitle">
                                                @php
                                                    $setting = DB::table('settings')
                                                        ->where([['name', '=', 'Amazon Fba'], ['text', '=', 'Material']])
                                                        ->first();
                                                @endphp
                                                @if ($setting)
                                                    {!! json_decode($setting->details) !!}
                                                @endif
                                            </p>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <label class="card"><input class="card__input" type="checkbox" />
                                        <div class="card__body">
                                            <div class="card__body-cover">
                                                <img class="card__body-cover-image"
                                                    src="{{ asset('/') }}frontend/img/inserts.png" />
                                                <span class="card__body-cover-checkbox">
                                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                                <h5 class="card__body-header-title">Marketing and Promotional Inserts</h5>
                                                <p class="card__body-header-subtitle">
                                                    @php
                                                        $setting = DB::table('settings')
                                                            ->where([['name', '=', 'Amazon Fba'], ['text', '=', 'Inserts']])
                                                            ->first();
                                                    @endphp
                                                    @if ($setting)
                                                        {!! json_decode($setting->details) !!}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <label class="card"><input class="card__input" type="checkbox" />
                                        <div class="card__body">
                                            <div class="card__body-cover">
                                                <img class="card__body-cover-image"
                                                    src="{{ asset('/') }}frontend/img/box.png" />
                                                <span class="card__body-cover-checkbox">
                                                    <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                                <h5 class="card__body-header-title">Additional Box</h5>
                                                <p class="card__body-header-subtitle">
                                                    @php
                                                        $setting = DB::table('settings')
                                                            ->where([['name', '=', 'Amazon Fba'], ['text', '=', 'Additional Box']])
                                                            ->first();
                                                    @endphp
                                                    @if ($setting)
                                                        {!! json_decode($setting->details) !!}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ServicesFee end -->

    <!-- Free Section start -->
    <section id="Free">
        <div class="container">
            <div class="row  mFee py-5 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="left-free">
                        <h2>{{ __('homepage.service-fee.text 25') }}</h2>
                        <span>{{ __('homepage.service-fee.text 26') }}</span>
                        <button>{{ __('homepage.service-fee.text 27') }}</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="right-free">
                        <img src="{{ asset('/') }}frontend/img/traktor.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Free Section end -->


    <script>
        const rangeInputs = document.querySelectorAll('input[type="range"]')
        const numberInput = document.querySelector('input[type="number"]')

        function handleInputChange(e) {
            let target = e.target
            if (e.target.type !== 'range') {
                target = document.getElementById('range')
            }
            const min = target.min
            const max = target.max
            const val = target.value

            target.style.backgroundSize = (val - min) * 100 / (max - min) + '% 100%'
        }

        rangeInputs.forEach(input => {
            input.addEventListener('input', handleInputChange)
        })

        numberInput.addEventListener('input', handleInputChange)
    </script>

    @include('frontend.partials.faqs')
    <!-- Accordion Start -->
    {{-- <section id="Accordion">
    <div class="container">
        <div class="row mt-6 mb-5">
            <div class="title" style="text-align: center;">
                <h2>Frequently Asked Questions (FAQ)</h2>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Accordion Item #2
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Accordion Item #2
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!-- Accordion End -->
@endsection
