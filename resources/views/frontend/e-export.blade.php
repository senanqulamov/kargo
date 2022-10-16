@extends('frontend.layout.app')

@section('title', 'E-export')

@section('content')

<!-- First Section Start -->
<section id="First">
    <div class="container">
        <div class="row first my-5 align-items-center">
            <div class="col-lg-6">
                <div class="left-content">
                    <h1>{{__('homepage.fullfilment.E-Export Software and Logistics Solutions')}}</h1>
                    <p>{{ __('homepage.fullfilment.E-Export Software and Logistics Solutions text')}}</p>
                    <button>{{__('homepage.homepage.Start now')}}</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <img src="{{asset('/')}}frontend/img/i 1.png" alt="">
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
                    <img src="{{asset('/')}}frontend/img/reexpendidoras-de-carga-1 1.png" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-second">
                    <h2>{{__('homepage.fullfilment.What is Fullfilment')}}</h2>
                    <span>{{__('homepage.fullfilment.What is Fullfilment text')}}</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Second Section End -->

<!-- Boxes Section Start -->
<section id="Boxes">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="row my-3 align-items-center">
                    <div class="col-lg-3">
                        <div class="left-box">
                            <img src="{{asset('/')}}frontend/img/member.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="right-box">
                            <h4>{{__('homepage.fullfilment.Membership & Integration')}}</h4>
                            <span>{{__('homepage.fullfilment.Membership & Integration text')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row my-3 align-items-center">
                    <div class="col-lg-3">
                        <div class="left-box">
                            <img src="{{asset('/')}}frontend/img/order.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="right-box">
                            <h4>{{__('homepage.fullfilment.Order and Shipping')}}</h4>
                            <span>{{__('homepage.fullfilment.Order and Shipping text')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row my-3 align-items-center">
                    <div class="col-lg-3">
                        <div class="left-box">
                            <img src="{{asset('/')}}frontend/img/packing.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="right-box">
                            <h4>{{__('homepage.fullfilment.Packaging and Shipping')}}</h4>
                            <span>{{__('homepage.fullfilment.Packaging and Shipping text')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Boxes Section End -->

<!-- Table Section Start -->
<div class="container">
    <div class="row mt-5" style="text-align: center;">
        <div class="tables-title-section">
            <h2>{{__('homepage.fullfilment.Fulfillment Fees')}}</h2>
        </div>
    </div>
    <div class="row t my-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="padding-bottom: 30px;" scope="col" class="tableBox">
                        <span>{{__('homepage.fullfilment.Fulfillment Fees text')}}</span>
                    </th>
                    <th scope="col" class="tableBox">
                        <div class="table-title">
                            <img src="{{asset('/')}}frontend/img/table1.svg" alt="">
                            <span>0 - 100 Gr</span>
                        </div>
                    </th>
                    <th scope="col" class="tableBox">
                        <div class="table-title">
                            <img src="{{asset('/')}}frontend/img/table2.svg" alt="">
                            <span>100 - 200 Gr</span>
                        </div>
                    </th>
                    <th scope="col" class="tableBox">
                        <div class="table-title">
                            <img src="{{asset('/')}}frontend/img/table3.svg" alt="">
                            <span>200 - 300 Gr</span>
                        </div>
                    </th>
                    <th scope="col" class="tableBox">
                        <div class="table-title">
                            <img src="{{asset('/')}}frontend/img/table4.svg" alt="">
                            <span>300 - 450 Gr</span>
                        </div>
                    </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    @php
                        $settings = DB::table('settings')->where('name' , 'Packaging Fees')->orderBy('text')->get();
                    @endphp
                    <th class="oneColumn" scope="col">{{__('homepage.fullfilment.Fulfillment Fees text -1')}}</th>
                    @foreach ($settings as $setting)
                        <th scope="col">{!! json_decode($setting->details) !!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -2')}}</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -3')}}</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -4')}}</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -5')}}</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -6')}}</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -7')}}</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -8')}}</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -9')}}</th>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -10')}}</th>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                    <td>{{__('homepage.fullfilment.Included in the price')}}</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -11')}}</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -12')}}</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -13')}}</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -14')}}</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">{{__('homepage.fullfilment.Fulfillment Fees text -15')}}</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Table Section End -->
@endsection
