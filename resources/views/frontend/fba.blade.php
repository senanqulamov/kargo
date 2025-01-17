@extends('frontend.layout.app')

@section('title', 'FBA')

@section('css')

    <style>
        #First-FBA .left-content a {
            border: 1px solid #EE591F;
            color: #EE591F;
            padding: 10px 50px;
            background-color: transparent;
            border-radius: 10px;
            transition: .4s ease;
        }

        #First-FBA .left-content a:hover {
            background-color: #EE591F;
            color: #fff;
        }

        .checkbox-alias {
            width: 100%;
            margin: 10px 0;
            height: 100px;
            box-shadow: 0px 4px 8px 0px #0000001a;
            background-color: transparent;
            cursor: pointer;
            padding: 30px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 1 position: relative;
            transition: all 250ms ease-out;
            cursor: pointer;
            text-align: center !important;
        }

        .invisible-checkboxes input[type=checkbox] {
            display: none;
        }

        .invisible-checkboxes input[type=checkbox]:checked+.checkbox-alias {
            background-color: #2386FF !important;
            color: #fff !important;
        }

        .invisible-checkboxes input[type=checkbox]:checked+.checkbox-alias span {
            color: #fff !important;
            opacity: 1 !important;
        }

        #FbaServices .services-select {
            display: flex;
            align-items: center !important;
            flex-direction: row !important;
        }

        .services-select input,
        output {
            display: inline-block;
            vertical-align: middle;
            font-size: 1em;

        }

        .services-select output {
            background: #2386FF;
            padding: 5px 16px;
            border-radius: 3px;
            color: #fff;
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
@endsection

@section('content')

    <!-- First Section Start -->
    <section id="First-FBA">
        <div class="container">
            <div class="row first my-5 align-items-center">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h1><strong>Shiplounge.co</strong> <br> {{__('homepage.amazon-fba.Amazon FBA Service')}}</h1>
                        <p>{{__('homepage.amazon-fba.Amazon FBA Service text')}}</p>
                        <a href="{{ route('login') }}">{{__('homepage.homepage.Start now')}}</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <img src="{{ asset('/') }}frontend/img/Fba.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- First Section End -->

    <!-- What FBA start -->
    <section id="WhatFba">
        <div class="container">
            <div class="row w-m my-5 mx-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="WhatFba">
                        <h2>{{__('homepage.amazon-fba.What is Amazon FBA?')}}</h2>
                        <span>{{__('homepage.amazon-fba.What is Amazon FBA? text')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What FBA end -->

    <!-- FBA1 start -->
    <section id="FBA1">
        <div class="container">
            <div class="row pt-4" style="text-align: center;">
                <div class="FBA1-title">
                    <h4>{{__('homepage.amazon-fba.Amazon FBA Operation Made Easy with ShipLounge')}}</h4>
                </div>
            </div>
            <div class="row align-items-center   my-5 py-5">
                <div class="col-lg-4">
                    <div class="fba-content-left">
                        <img src="{{ asset('/') }}frontend/img/deliverFba.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="fba-content-right">
                        <h2>{{__('homepage.amazon-fba.Delivery and Inspection')}}</h2>
                        <span>
                            {{__('homepage.amazon-fba.Delivery and Inspection text')}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FBA1 end -->

    <!-- FBA2 start -->
    <section id="FBA2">
        <div class="container">
            <div class="row f-m align-items-center   my-5 py-5">
                <div class="col-lg-8">
                    <div class="fba-content-right">
                        <h2>{{__('homepage.amazon-fba.Preparing a Shipment Plan')}}</h2>
                        <span>{{__('homepage.amazon-fba.Preparing a Shipment Plan text')}}</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="fba-content-left">
                        <img src="{{ asset('/') }}frontend/img/preaparing.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FBA2 end -->

    <!-- FBA1 start -->
    <section id="FBA1">
        <div class="container">
            <div class="row align-items-center   my-5 py-5">
                <div class="col-lg-4">
                    <div class="fba-content-left">
                        <img src="{{ asset('/') }}frontend/img/productFba.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="fba-content-right">
                        <h2>{{__('homepage.amazon-fba.Product Preparation')}}</h2>
                        <span>{{__('homepage.amazon-fba.Product Preparation text')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FBA1 end -->

    <!-- FBA2 start -->
    <section id="FBA2">
        <div class="container">
            <div class="row f-m align-items-center   my-5 py-5">
                <div class="col-lg-8">
                    <div class="fba-content-right">
                        <h2>{{__('homepage.amazon-fba.Shipping to Amazon')}}</h2>
                        <span>{{__('homepage.amazon-fba.Shipping to Amazon text')}}</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="fba-content-left">
                        <img src="{{ asset('/') }}frontend/img/shippingFBa.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FBA2 end -->

    <!-- FBA Services Start -->
    <section id="FbaServices">
        <div class="container">
            <div class="row mt-5 mb-4" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="fbaServicesTitle">
                        <h2>{{__('homepage.amazon-fba.Amazon FBA Service Prices')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="services-select">
                                <input type="range" value="0"min="0"max="100"
                                    oninput="rangevalue.value=value" onclick="getRangeValue(this)" />
                                <output id="rangevalue">0</output>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mt-4">
                        <div class="col-lg-12">
                            <div class="big-title">
                                <h4>{{__('homepage.amazon-fba.Amazon FBA Service Prices -1')}}</h4>
                                <span>{{__('homepage.amazon-fba.Amazon FBA Service Prices -2')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @foreach ($services as $service)
                            <div class="col-lg-6">
                                <div class="invisible-checkboxes">
                                    <input type="checkbox" name="service[]" id="service-{{ $service->id }}" />
                                    <label class="checkbox-alias fba-option" for="service-{{ $service->id }}"
                                        onclick="sumService(this)" data-clicked="false" data-price="{{ $service->price }}">
                                        <span>{{ $service->title }}</span>
                                        <p>{{ $service->price }} $/{{__('homepage.amazon-fba.Number')}}</p>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-12">
                            <div class="total-button">
                                <button>Hesabla</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="Total-Price">
                        <h2>{{__('homepage.amazon-fba.Average price')}}</h2>
                        <span class="total-price-services-hm">0.00$</span>
                        <div class="total-contact">
                            <button onclick="window.open('{{ route('contact') }}' , '_self')">{{__('homepage.amazon-fba.Contact Us')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FBA Services End -->


    <script>
        var range_value = parseFloat(document.querySelector('#rangevalue').innerText);
        var total = 0;

        function getRangeValue(range) {
            range_value = parseFloat(range.value);

            sumTotal();
        }

        function sumService(item) {
            if (item.getAttribute('data-clicked') == 'false') {
                item.setAttribute('data-clicked', 'true');
            } else {
                item.setAttribute('data-clicked', 'false');
            }

            sumTotal();
        }

        function sumTotal() {
            var options = document.querySelectorAll('.fba-option');
            total = 0;

            options.forEach(element => {
                if (element.getAttribute('data-clicked') == 'true') {
                    total += parseFloat(element.getAttribute('data-price'));
                }
            });
            total = range_value * total;

            console.log(total);
            document.querySelector('.total-price-services-hm').innerHTML = total + " $";
        }
    </script>
@endsection
