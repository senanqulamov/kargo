@extends('frontend.layout.app')

@section('title', 'FBA')

@section('content')
<!-- First Section Start -->
<section id="First-FBA">
    <div class="container">
        <div class="row first my-5 align-items-center">
            <div class="col-lg-6">
                <div class="left-content">
                    <h1><strong>Shiplounge.co</strong> <br> Amazon FBA Service</h1>
                    <p>You Just Focus On Your Sales. Your Packing and Shipping Processes are Entrusted to Us!</p>
                    <button>Start now</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <img src="{{asset('/')}}frontend/img/Fba.png" alt="">
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
                    <h2>What is Amazon FBA?</h2>
                    <span>An FBA seller is an ecommerce business that sells in Amazon's store and outsources inventory management to Amazon through the FBA program. The seller sends products to Amazon warehouses for order fulfillment. Amazon stores the inventory until a customer places an order. Then Amazon picks, packs, and ships the order.</span>
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
                <h4>Amazon FBA Operation Made Easy with Shiplounge</h4>
            </div>
        </div>
        <div class="row align-items-center   my-5 py-5">
            <div class="col-lg-4">
                <div class="fba-content-left">
                    <img src="{{asset('/')}}frontend/img/deliverFba.png" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="fba-content-right">
                    <h2>Delivery and Inspection</h2>
                    <span>After the products you have sent to the Shiplounge fulfillment center are received, they are checked for damage and counted. You will be informed about your pre-checked products.</span>
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
                    <h2>Preparing a Shipping Plan</h2>
                    <span>Create your shipping schedule for the products you want to send to Amazon warehouses via Amazon's seller control panel. Upload this plan and labels you created to your panel with the add file section on the ShipLounge control panel</span>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="fba-content-left">
                    <img src="{{asset('/')}}frontend/img/preaparing.png" alt="">
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
                    <img src="{{asset('/')}}frontend/img/productFba.png" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="fba-content-right">
                    <h2>Product Preparation</h2>
                    <span>The products you send to ShipLounge are labeled and packaged in accordance with the packaging limitations specified by Amazon.</span>
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
                    <h2>Shipping to Amazon</h2>
                    <span>Your packaged products are sent to Amazon warehouses with the most suitable shipping solution through the ShipLounge panel and the tracking number is added to your panel.</span>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="fba-content-left">
                    <img src="{{asset('/')}}frontend/img/shippingFBa.png" alt="">
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
                    <h2>FBA Service Prices</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="services-select">
                            <label for="">Kaç ürünün hazırlanmasına ihtiyacınız var </label>
                            <input type="text" placeholder="Lütfen ürün adetini seçiniz ">
                        </div>
                    </div>
                </div>
                <div class="row mb-2 mt-4">
                    <div class="col-lg-12">
                        <div class="big-title">
                            <h4>Kaç ürünün hazırlanmasına ihtiyacınız var </h4>
                            <span>Ek hizmetleri işareliyerek satın alabilirsiniz</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <div class="big">
                            <input id="chb" type="radio" />
                            <span>FNSKU Etiketleme</span>
                            <p>0.40$/adet</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="big">
                            <input id="chb" type="radio" />
                            <span>Koruyucu Malzeme</span>
                            <p>0.49$/adet</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="big">
                            <input id="chb" type="radio" />
                            <span>Ekstra Koli</span>
                            <p>1.99$/adet</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="big">
                            <input id="chb" type="radio" />
                            <span>Pazarlama ve Promosyon ekleri</span>
                            <p>0.15$/adet</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="total-button">
                            <button>Hesabla</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="Total-Price">
                    <h2>Ortalama Fiyat</h2>
                    <span>0.00$</span>
                    <div class="total-contact">
                        <button>Bize ulaşın</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FBA Services End -->
@endsection