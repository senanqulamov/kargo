@extends('frontend.layout.app')

@section('title', 'Home')

@section('css')
    <style>
        #First .left-content a {
            border: 1px solid #EE591F;
            color: #EE591F;
            padding: 10px 50px;
            background-color: transparent;
            border-radius: 10px;
            transition: .4s ease;
        }

        #First .left-content a:hover {
            background-color: #EE591F;
            color: #fff;
        }

        .map {
            width: 100% !important;
            height: 470px !important;
            border: 0;
            border-radius: 12px !important;
            margin: 0 !important;
        }

        #cargoSLiderMainPage {
            margin-top: 30px !important;
        }

        #cargoSLiderMainPage .carousel .carousel-inner .carousel-item {
            height: 500px !important;
        }

        #cargoSLiderMainPage .carousel .carousel-inner .carousel-item img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        #cargoSLiderMainPage .carousel .carousel-inner .carousel-item .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex !important;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 80%;
        }

        #cargoSLiderMainPage .carousel .carousel-inner .carousel-item .carousel-caption h5 {
            font-size: 2rem;
        }

        #cargoSLiderMainPage .carousel .carousel-inner .carousel-item .carousel-caption p {
            font-size: 1.5rem;
        }


        @media only screen and (max-width:425px) {
            #cargoSLiderMainPage .carousel .carousel-inner .carousel-item {
                height: 325px !important;
            }

            #cargoSLiderMainPage .carousel .carousel-inner .carousel-item .carousel-caption h5 {
                font-size: 1.4rem;
            }

            #cargoSLiderMainPage .carousel .carousel-inner .carousel-item .carousel-caption p {
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- First Section Start -->
    <section id="First">
        <div class="container">
            <div class="row my-5 align-items-center">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h1>Manage your e-commerce shipments with <strong>Shiplounge.co</strong> to save time and money!
                        </h1>
                        <p>ShipLounge üyeliğiniz ile Türkiye ve ABD'deki herhangi bir pazar yerinden istediğiniz ürünü
                            yazılımımız üzerinden satın alabilirsiniz ve ister kendi adresinize, isterseniz Dropshipping
                            siparişlerinizi müşterilerinizin adresine
                            kargolayın.
                        </p>
                        <a href="{{ route('login') }}" style="display: inline-block;">Start now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <img src="{{ asset('/') }}frontend/img/animation.gif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- First Section End -->

    <!-- Calculate section start -->
    {{-- <section id="Calculate">
        <div class="container">
            <form action="{{ route('index.calculate') }}" method="post" id="price_calc">
                @csrf
                <div class="row my-3 calculateBox align-items-center">
                    <div class="calculate-title">
                        <h4>Country</h4>
                    </div>
                    <div class="col-lg-4">
                        <div class="calculate-content">
                            <select name="selectCountry">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->code }}"
                                        {{ old('selectCountry') == $country->code ? 'selected' : '' }}>{{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text selectCountry_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="calculate-content">
                            <input type="text" placeholder="Weight" name="inputWeight" value="{{ old('inputWeight') }}">
                            <span class="text-danger error-text inputWeight_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="calculate-content">
                            <input type="text" placeholder="Length" name="inputLength" value="{{ old('inputLength') }}">
                            <span class="text-danger error-text inputLength_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="calculate-content">
                            <input type="text" placeholder="Height" name="inputHeight" value="{{ old('inputHeight') }}">
                            <span class="text-danger error-text inputHeight_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="calculate-content">
                            <input type="text" placeholder="Width" name="inputWidth" value="{{ old('inputWidth') }}">
                            <span class="text-danger error-text inputWidth_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-2">
                        <div class="calculate-content">
                            <button type="submit">Calculate</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="my-4 d-none" id="table_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th>Cargo Company</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody id="tableCompany"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Calculate section end -->

    <!-- Packings Start -->
    {{-- <section id="Packings">
        <div class="container">
            <div class="row mt-5 my-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="packings-title">
                        <h2>Packing Fees</h2>
                    </div>
                </div>
            </div>
            <div class="row my-5 mx-5  p-c-m">
                @foreach ($packings as $packing)
                    <div class="col-lg-3">
                        <div class="packing">
                            <div class="packing-title">
                                <h4>{{ $packing->value }}</h4>
                            </div>
                            <div class="packing-content">
                                <ul>
                                    @foreach (json_decode($packing->details) as $detail)
                                        <li>
                                            <img src="{{ asset('/') }}frontend/img/tic.svg" alt="">
                                            {{ $detail }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="packing-number">
                                <h3>{{ $packing->price }}$ + KDV</h3>
                            </div>
                            <button onclick="window.open('{{ route('login') }}' , '_self')">Sign up</button>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-3">
                <div class="packing">
                    <div class="packing-title">
                        <h4>1-5 Kg</h4>
                    </div>
                    <div class="packing-content">
                        <ul>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Detaylı hasar incelemesi</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Ücretsiz Fotoğraf bildirimi</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Aynı gün gösterim</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Takip Numarası</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> E-posta - Chat desteği</li>
                        </ul>
                    </div>
                    <div class="packing-number">
                        <h3>1$ + KDV</h3>
                    </div>
                    <button onclick="window.open('{{ route('login') }}' , '_self')">Sign up</button>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="packing">
                    <div class="packing-title">
                        <h4>5-10 Kg</h4>
                    </div>
                    <div class="packing-content">
                        <ul>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Detaylı hasar incelemesi</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Ücretsiz Fotoğraf bildirimi</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Aynı gün gösterim</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Takip Numarası</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> E-posta - Chat desteği</li>
                        </ul>
                    </div>
                    <div class="packing-number">
                        <h3>1$ + KDV</h3>
                    </div>
                    <button onclick="window.open('{{ route('login') }}' , '_self')">Sign up</button>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="packing">
                    <div class="packing-title">
                        <h4>10-20 Kg </h4>
                    </div>
                    <div class="packing-content">
                        <ul>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Detaylı hasar incelemesi</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Ücretsiz Fotoğraf bildirimi</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Aynı gün gösterim</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> Takip Numarası</li>
                            <li> <img src="{{asset('/')}}frontend/img/tic.svg" alt=""> E-posta - Chat desteği</li>
                        </ul>
                    </div>
                    <div class="packing-number">
                        <h3>1$ + KDV</h3>
                    </div>
                    <button onclick="window.open('{{ route('login') }}' , '_self')">Sign up</button>
                </div>
            </div>
            </div>
        </div>
    </section> --}}
    <!-- Packings End -->

    <section id="cargoSLiderMainPage" class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slider as $slider)
                    <div class="carousel-item @if ($slider->main == 'true') active @endif">
                        <img src="{{ asset('/') }}backend/assets/img/slider/{{ $slider->image }}" class="d-block w-100"
                            alt="{{ $slider->title }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->title }}</h5>
                            <p>{{ $slider->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Services Start -->
    <section id="Services">
        <div class="container">
            <div class="row mt-5 mx-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="title-services">
                        <h2>Our Services</h2>
                        <p>With ShipEntegra, reaching 1 billion + customers on global marketplaces, managing your orders on
                            a single screen and finding logistics solutions are ust a click away! We expand our borders
                            together and enable you to manage cross-border
                            trade with a single click. You can click and review our services below in order to get detailed
                            information.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5 align-items-center">
                <div class="col-lg-4">
                    <div class="services-content">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/img/ecommerce.svg" alt="">
                        </div>
                        <div class="services-text">
                            <h4>E-Commerce Logistics</h4>
                            <span>You can manage all your
                                processes from order
                                management to logistics
                                planning faster and easier with
                                FBA Logistcs 's competitive prices.</span>
                        </div>
                        <div class="services-details">
                            <a href="{{ route('e-commerce') }}">Details...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="services-content">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/img/delivery-packaging-box-svgrepo-com 1.svg"
                                alt="">
                        </div>
                        <div class="services-text">
                            <h4>Amazon FBA</h4>
                            <span>You can manage all your
                                processes from order
                                management to logistics
                                planning faster and easier with
                                FBA Logistcs 's competitive prices.</span>
                        </div>
                        <div class="services-details">
                            <a href="{{ route('fba') }}">Details...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="services-content">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/img/delivery-packaging-box-svgrepo-com 1.svg"
                                alt="">
                        </div>
                        <div class="services-text">
                            <h4>Marketplace Integration</h4>
                            <span>You can manage all your
                                processes from order
                                management to logistics
                                planning faster and easier with
                                FBA Logistcs 's competitive prices.</span>
                        </div>
                        <div class="services-details">
                            <a href="{{ route('marketplace') }}">Details...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services End -->

    <!-- Storage Start -->
    <section id="Storage">
        <div class="container">
            <div class="row mt-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="storage-title">
                        <h2>Storage Fee</h2>
                    </div>
                </div>
            </div>
            <div class="row my-5 mx-5 s-t-m">
                <div class="col-lg-4">
                    <div class="storage-card">
                        <div class="storage-img">
                            <img src="{{ asset('/') }}frontend/img/box 1.svg" alt="">
                        </div>
                        <div class="storage-desc">
                            <h4>Kutu</h4>
                            <span>30 60 30cm ölçülerinde</span>
                        </div>
                        <div class="storage-price">
                            <span>
                                @php
                                    $setting = DB::table('settings')
                                        ->where([
                                            ['name' , '=' , 'Storage Fee'],
                                            ['text' , '=' , 'Kutu']
                                         ])
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
                            <h4>Raf</h4>
                            <span>150 60 45cm ölçülerinde</span>
                        </div>
                        <div class="storage-price">
                            <span>
                                @php
                                    $setting = DB::table('settings')
                                        ->where([
                                            ['name' , '=' , 'Storage Fee'],
                                            ['text' , '=' , 'Raf']
                                         ])
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
                            <h4>Palet</h4>
                            <span>100 120 140cm ölçülerinde</span>
                        </div>
                        <div class="storage-price">
                            <span>
                                @php
                                    $setting = DB::table('settings')
                                        ->where([
                                            ['name' , '=' , 'Storage Fee'],
                                            ['text' , '=' , 'Palet']
                                         ])
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
    </section>
    <!-- Storage End -->

    <!-- What Start -->
    <section id="What">
        <div class="container">
            <div class="row mt-5" style="text-align: center;">
                <div class="what-title">
                    <h2>What to do</h2>
                </div>
            </div>
            <div class="row mt-5 align-items-center ">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="what-content">
                        <span>Sign up and login to www.shiplounge.co</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="what-content">
                        <span>Select the country or ShipLounge warehouse you want to ship to.</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="what-content">
                        <span>Complete your order.</span>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-12">
                    <div class="what-line"></div>
                </div>
            </div>
            <div class="row  align-items-center justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="what-content">
                        <span>Sign up and login to www.shiplounge.co</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 ">
                    <div class="what-content">
                        <span>Select the country or ShipLounge warehouse you want to ship to.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What End -->

    <!-- Global Start -->
    <section id="Global">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="left-global">
                        <h3>Global Logistcs</h3>
                        <img src="{{ asset('/') }}frontend/img/global.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-global">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        HAVAYOLU TAŞIMACILIĞI
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <span>ShipLounge Tam zamanında gerçekleşen sevkiyatın siz değerli müşterilerimizin
                                            iş verimliliği ve prestiji açısından önemini biliyor, havayolu taşımacılığında
                                            da uzmanlığımızı konuşturuyoruz. Geniş acente ağımız vasıtasıyla tüm yüklerinizi
                                            dünyadaki önemli ticari noktalara hava yolu ile kolaylıkla taşıyoruz.
                                            Ürün, sektör ve kapasitede herhangi bir sıralama olmaksızın, tüm kargolarınızı
                                            havaalanından havaalanına ya da kapıdan kapıya, en ekonomik ve rekabetçi
                                            fiyatlarla taşıyor, navlunlarımızı sizin ihtiyaçlarınız doğrultusunda
                                            belirliyoruz.
                                            ShipLounge olarak, teknolojik altyapımız, eğitime verdiğimiz önem, müşteri
                                            odaklı yaklaşımımız, çözüm odaklı yapımız ve rekabetçi fiyatlarımızla tüm hava
                                            kargo firmaları arasında sizin için tercih edilebilir bir noktada durmaya özen
                                            gösteriyoruz.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        DENİZYOLU TAŞIMACILIĞI
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <span>Uluslararası denizyolu taşımacılığı alanında deneyimli ve uzman kadromuz ile
                                            en zor, en karmaşık görünen lojistik ihtiyaçlarınızı bile yaratıcı
                                            yaklaşımlarımızla, sorunsuz şekilde çözüme kavuşturuyoruz.
                                            ShipLounge Dünyada denizyolu taşımacılığı konusundaki deneyimleri ile ön plana
                                            çıkan 3500’ün üzerindeki acentemiz ile birlikte, gemi taşımacılığı, depolama,
                                            dağıtım, gümrükleme, proje taşımacılığı konularında size geniş rota seçenekleri
                                            sunuyor ve denizyolu nakliye ihtiyaçlarınızı esnek ve üretim takviminize uygun
                                            çözümlerle karşılıyoruz.
                                            Yükünüzü, dünyanın tüm limanlarına güvenle ulaştırabilmek için denizyolu
                                            taşımacılığında kullanılan tüm belgeleri eksiksiz şekilde hazırlıyor, denizyolu
                                            taşımacılığı yapan firmalar arasındaki en uygun navlun fiyatlarını sunabilmek
                                            adına sektördeki tüm gücümüzü ve bağlantılarımızı sizlerin hizmetine sunuyoruz.
                                            Denizyolu Taşımacılığında Sunduğumuz Lojistik Servisler</span>
                                        <ul>
                                            <li>Komple Konteyner Taşımaları – FCL</li>
                                            <li>Parsiyel Konteyner Taşımaları – LCL</li>
                                            <li>İthalat / İhracat Konsolidasyon Servisi</li>
                                            <li>Limandan limana / kapıdan kapıya / depodan depoya taşımalar</li>
                                            <li>Kombine taşımalar</li>
                                            <li>Üçüncü ülkeler arası taşımalar (cross trade)</li>
                                        </ul>
                                        <span>Amacımız her zaman ihtiyacınızı doğru saptayıp, size en uygun ve en ekonomik
                                            çözüm yolunu üretmek. Bu sebeple ürün özelliklerinize bağlı olarak farklı
                                            konteyner seçeneklerini tercih edebilirsiniz.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        KARAYOLU TAŞIMACILIĞI
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <span>Uzman kadromuzla, etkin çözümlerimizle ve çalışma prensiplerimizle ShipLounge
                                            olarak karayolu taşımacılığında da siz değerli müşterilerimizin yanınızdayız …
                                            Karayolu Taşımacılığında Sunduğumuz Lojistik Servisler</span>
                                        <ul>
                                            <li>Komple ve parsiyel servis</li>
                                            <li>Proje yüklemeleri</li>
                                            <li>Gabari dışı malların taşınması</li>
                                            <li>CIS ülkelerine Avrupa’dan TC aktarmalı taşıma</li>
                                            <li>Türkiye’den direkt servis</li>
                                        </ul>
                                        <span>ShipLounge olarak entegre lojistik çözümlerimizle, karayolu yük taşımacılığına
                                            dair tüm hizmetlerimizi aynı zamanda havayolu ve denizyolu lojistik
                                            hizmetlerimizle de birleştirerek ihtiyaçlarınızı kusursuz şekilde
                                            karşılayabilmek üzerine çalışmaktayız. Lojistik ihtiyaçlarınızı dilerseniz tek
                                            hizmet kapsamında dilerseniz bütünleşik bir yaklaşımla en doğru şekilde
                                            karşılayabileceğiniz uluslararası çözüm ortağınız olarak, ihtiyacınıza en uygun
                                            ve en ekonomik kombinasyonları oluşturmak ve tüm operasyon süreçlerini takip
                                            etmek için her zaman yanınızda.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Global End -->

    <!-- Statistics start -->
    <section id="Statics">
        <div class="container">
            <div class="row my-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="statics-title">
                        <h2>Our Statistics</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/car.svg" alt="">
                            <div class="count">
                                <h3 class="counter">{{ $cargo_request_count }}</h3><span>+</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Products Delivered</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/planet.svg" alt="">
                            <div class="count">
                                <h3 class="counter">{{ $country_count }}</h3><span>+</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Countries Shipped</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/person.svg" alt="">
                            <div class="count">
                                <h3 class="counter">{{ $customer_count }}</h3> <span>+</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Happy Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/location.svg" alt="">
                            <div class="count">
                                <h3 class="counter">10</h3><span>+</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Locations</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/cupa.svg" alt="">
                            <div class="count">
                                <h3 class="counter">99.8</h3> <span>%</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Successfully Delivered</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/hi.svg" alt="">
                            <div class="count">
                                <h3 class="counter">10</h3> <span>+</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Logistics Partners</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/home.svg" alt="">
                            <div class="count">
                                <h3 class="counter">20</h3> <span>+</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Marketplaces</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="statics-card">
                        <div class="statics-img">
                            <img src="{{ asset('/') }}frontend/img/down.svg" alt="">
                            <div class="count">
                                <h3 class="counter">70</h3> <span>%</span>
                            </div>
                        </div>
                        <div class="statics-footer">
                            <span>Shipping Discounts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics end -->


    <!-- Loaction Start -->
    <section id="OurLocation">
        <div class="container">
            <div class="row my-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="loaction-title">
                        <h2> Our Locations</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="map" id="map"></div>
                </div>
            </div>
            <div class="row  my-5 l-m ">
                @foreach ($locations as $location)
                    <div class="col-lg-12">
                        <div class="row show-map">
                            <div class="map-text">
                                <div class="text-title d-flex align-items-start">
                                    <h5>{{ $location->country }}</h5>
                                    <span>|</span>
                                    <h5 class="align-self-end">{{ $location->city }}</h5>
                                </div>
                            </div>
                            <div class="show-map-button d-flex align-items-center justify-content-between flex-wrap">
                                <div class="text-desc mb-3">
                                    <span class="ms-4">{{ $location->address }}</span>
                                </div>
                                <button class="ms-4 mb-3" type="button"
                                    onclick="selectLocation('{{ $location->latitude }}', '{{ $location->longitude }}' ,'{{ $location->title }}')">
                                    Show on map
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>
    </section>
    <!-- Loaction End -->
@endsection

@section('js')


    <script>
        $(function() {
            $("#price_calc").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            if ($("#table_section").hasClass("d-none")) {
                                $("#table_section").removeClass("d-none");
                            }

                            $('#tableCompany').text(' ');
                            var trHTML = '';
                            for (let i = 0; i < data.company.length; i++) {
                                trHTML += '<tr><td>' + data.company[i] + '</td><td>' + data
                                    .price[i] + '</td></tr>';
                            }
                            $('#tableCompany').append(trHTML);
                        }
                    }
                });
            });
        })
    </script>
    <script>
        var map, infoWindow;
        var geocoder;
        var marker;
        var geo_address = '';

        function geocodeLatLng() {

            geocoder
                .geocode({
                    location: marker.getPosition()
                })
                .then((response) => {
                    if (response.results[0]) {
                        // map.setZoom(11);

                        // const marker = new google.maps.Marker({
                        //   position: latlng,
                        //   map: map,
                        // });

                        infoWindow.setContent(response.results[0].formatted_address);
                        infoWindow.open(map, marker);

                        geo_address = response.results[0].formatted_address;
                        // map.setCenter(marker.getPosition());
                    } else {
                        window.alert("No results found");
                    }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
        }



        function initMap() {
            var myLatlng = new google.maps.LatLng(40, 40);

            geocoder = new google.maps.Geocoder();


            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 40,
                    lng: 40
                },
                zoom: 12.5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            infoWindow = new google.maps.InfoWindow();


            // Place a draggable marker on the map
            marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "Drag me!"
            });



            infoWindow.setContent();

            //Go to center
            infoWindow.open(map, marker);

        }


        function selectLocation(lat, lon, name) {

            if (lat == '' && lon == '') {
                return;
            }

            infoWindow.setContent(name);

            marker.setPosition(new google.maps.LatLng(lat, lon));
            infoWindow.open(map, marker);
            map.setCenter(marker.getPosition());



            window.location.href = '#map';

        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBByp1zFwtmhqM3ibxX-oVAVxi2eaYXlbk&callback=initMap">
    </script>
@endsection
