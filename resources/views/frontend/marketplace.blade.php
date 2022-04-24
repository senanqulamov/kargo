@extends('frontend.layout.app')

@section('title', 'Marketplace')

@section('content')
<!-- MarketPlace Title Start  -->
<section id="MarketPlaceTitle">
    <div class="container">
        <div class="row my-6" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h1>Integration is just a click away!</h1>
                    <span>With ShipEntegra's 20+ Marketplaces and 104+ logistics integrations, you can easily integrate your stores and carrier companies in related Marketplaces.</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MarketPlace Title End -->

<!-- MarketPlace Chanels Start -->
<section id="Chanels">
    <div class="container">
        <div class="row my-3" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h3>Sales Channels and Marketplaces</h3>
                </div>
            </div>
        </div>
        <div class="row mx-5 my-5">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/amazon.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/ebay.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/etsy.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/shopfy.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/opencart.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/wish.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/who.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/magento.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/prestashop.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/aliexpress.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/wix.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="chanels-card">
                    <img src="{{asset('/')}}frontend/img/walmart.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MarketPlace Chanels End -->


<!-- MarketPlace Logistic Start -->
<section id="Logistic">
    <div class="container">
        <div class="row mt-6" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h3>Logistics Companies</h3>
                </div>
            </div>
        </div>
        <div class="row mx-5 my-5">
            <div class="col-lg-3">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/fedex.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/ups.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/dhl.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/tnt.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/united.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/ptt.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/hermes.svg" alt="">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                <div class="logistic-card">
                    <img src="{{asset('/')}}frontend/img/dpd.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MarketPlace Logistic End -->
@endsection