@extends('frontend.layout.app')

@section('title', 'FBA')

@section('css')

<style>
    #First-FBA .left-content a{
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
    .checkbox-alias{
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
        z-index: 1
        position: relative;
        transition: all 250ms ease-out;
        cursor: pointer;
        text-align:center !important;
    }

    .invisible-checkboxes input[type=checkbox]{
      display: none;
    }

    .invisible-checkboxes input[type=checkbox]:checked + .checkbox-alias{
        background-color: #2386FF !important;
        color: #fff !important;
    }
     .invisible-checkboxes input[type=checkbox]:checked + .checkbox-alias span{
        color: #fff !important;
        opacity:1 !important;
    }

  #FbaServices .services-select{
      display:flex;
      align-items:center !important;
      flex-direction:row !important;
  }

  .services-select   input,
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
  padding:0 !important;
  background: #c8c8c8;
  border-radius: 5px;
  background-image:linear-gradient(#2386FF, #2386ff);
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
.services-select input[type=range]::-webkit-slider-runnable-track  {
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
                    <h1><strong>Shiplounge.co</strong> <br> Amazon FBA Service</h1>
                    <p>You Just Focus On Your Sales. Your Packing and Shipping Processes are Entrusted to Us!</p>
                    <a href="{{route('login')}}">Start now</a>
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
            {{-- <div class="col-lg-6">
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
            </div> --}}
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="services-select">
                            <input type="range" value="0"min="0"max="100" oninput="rangevalue.value=value"/>
                            <output id="rangevalue">0</output>
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
                        <div class="invisible-checkboxes">
                            <input type="checkbox" name="rGroup" value="1" id="r1"/>
                            <label class="checkbox-alias" for="r1">
                                <span>FNSKU Etiketleme</span>
                                <p>0.40$/adet</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="invisible-checkboxes">
                            <input type="checkbox" name="rGroup" value="2" id="r2"/>
                            <label class="checkbox-alias" for="r2">
                                <span>Koruyucu Malzeme</span>
                                <p>0.49$/adett</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="invisible-checkboxes">
                            <input type="checkbox" name="rGroup" value="3" id="r3"/>
                            <label class="checkbox-alias" for="r3">
                                <span>Ekstra Koli</span>
                                <p>1.99$/adet</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="invisible-checkboxes">
                            <input type="checkbox" name="rGroup" value="4" id="r4"/>
                            <label class="checkbox-alias" for="r4">
                                <span>Pazarlama ve Promosyon ekleri</span>
                                <p>0.15$/adet</p>
                            </label>
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
