@extends('frontend.layout.app')

@section('title', 'E-export')

@section('content')

<!-- First Section Start -->
<section id="First">
    <div class="container">
        <div class="row first my-5 align-items-center">
            <div class="col-lg-6">
                <div class="left-content">
                    <h1>E-Export Software and Logistics Solutions</h1>
                    <p>You Just Focus On Your Sales. Your Packing and Shipping Processes are Entrusted to Us!</p>
                    <button>Start now</button>
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
                    <h2>What is Fullfilment</h2>
                    <span>Order fulfillment is the complete process from when an order is placed, or a sale takes place all the way to the customer receiving the delivery. These steps include receiving inventory, processing orders, picking, packing and shipping an online order to the customer.</span>
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
                            <h4>Membership & Integration</h4>
                            <span>Integrate your online stores on many platforms such as AliExpress, Amazon, eBay, Etsy, Shopify, WooCommerce and into your Shiplounge account.</span>
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
                            <h4>Order and Shipping</h4>
                            <span>When ordering from your supplier, add the Shiplounge Fulfillment Center address in the recipient address field and complete your order. After that, you will need to enter the order tracking number and the information you want to add in the field on the Shiplounge user panel.</span>
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
                            <h4>Packaging and Shipping</h4>
                            <span>For the products that reach the Seff operation, first of all, damage detection & control is done. Your products are photographed for approval and notified to you. Professionally measured and packaged. After the bill of lading labels, proforma invoice and consignee information are checked, 'same day' delivery is provided with the logistics company we have contracted with or you specify.</span>
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
            <h2>Packaging Fees</h2>
        </div>
    </div>
    <div class="row t my-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="padding-bottom: 30px;" scope="col" class="tableBox">
                        <span>New Jersey - USA aktarma merkezi ve fullfilment hizmetlerimiz</span>
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
                    <th class="oneColumn" scope="col">Ücret</th>
                    @foreach ($settings as $setting)
                        <th scope="col">{!! json_decode($setting->details) !!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="oneColumn" scope="row">Shiplounge Entegrasyonu</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Aktarma merkezi depo stok yonetimi</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Hasar kontrol tespiti</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Aynı gün işlem</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Takip numarası</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">E-posta Chat desteği</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Ambalaj malzemeleri</th>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                    <td><img src="{{asset('/')}}frontend/img/tic.svg" alt=""></td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Nakliye (450 gr-dan az gönderiler için)</th>
                    <td>Fiyat Dahil</td>
                    <td>Fiyat Dahil</td>
                    <td>Fiyat Dahil</td>
                    <td>Fiyat Dahil</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Ambalaj kutuları ve malzemeleri (450 gr dan az gönderiler için)</th>
                    <td>Fiyat Dahil</td>
                    <td>Fiyat Dahil</td>
                    <td>Fiyat Dahil</td>
                    <td>Fiyat Dahil</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Sipariş başına ek ürünler</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Pazarlama ve promosyon ekleri</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Dikkat ve uyarı etiketi </th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Fotoğraf bildirimleri</th>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                    <td>0.49$</td>
                </tr>
                <tr>
                    <th class="oneColumn" scope="row">Büyük boy Sipariş ücretleri</th>
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
