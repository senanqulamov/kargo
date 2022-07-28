@extends('frontend.layout.app')

@section('title', 'E-commerce')

@section('content')

<!-- First Section Start -->
<section id="First">
    <div class="container">
        <div class="row first my-5 align-items-center">
            <div class="col-lg-6">
                <div class="left-content">
                    <h1>E-Commerse logistics and Logistics Solutions</h1>
                    <p>ShipLounge We are aware of the importance of just-in-time shipment in terms of business efficiency and prestige of our valued customers, and we make our expertise in air transportation speak. Thanks to our wide agency network,
                        we easily transport all your cargo to important commercial points in the world by air.
                    </p>
                    <button onclick="window.open('{{ route('login') }}' , '_self')">Start now</button>
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
                    <h2>What is E-Commerce logistics</h2>
                    <span>Ürün, sektör ve kapasitede herhangi bir sıralama olmaksızın, tüm kargolarınızı havaalanından havaalanına ya da kapıdan kapıya, en ekonomik ve rekabetçi fiyatlarla taşıyor, navlunlarımızı sizin ihtiyaçlarınız doğrultusunda belirliyoruz</span>
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
                    <h2>Shipping Management</h2>
                    <span>ShipLounge olarak, teknolojik altyapımız, eğitime verdiğimiz önem, müşteri odaklı yaklaşımımız, çözüm odaklı yapımız ve rekabetçi fiyatlarımızla tüm hava kargo firmaları arasında sizin için tercih edilebilir bir noktada durmaya özen gösteriyoruz.</span>
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
