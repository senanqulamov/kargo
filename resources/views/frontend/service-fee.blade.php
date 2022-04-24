@extends('frontend.layout.app')

@section('title', 'Service Fee')

@section('content')

<!-- ServicesFee start -->
<section id="ServicesFeeTitle">
    <div class="container">
        <div class="row mt-6 mb-5" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h2>Service Fees</h2>
                    <span>Are you ready to experience a 360 degree e-commerce experience with affordable prices?</span>
                </div>
            </div>
        </div>
        <div class="row servicesContent justify-content-center my-5">
            <div class="col-lg-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link link-contetn active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" href="#">
                            <img src="{{asset('/')}}frontend/img/fullfilmentServices1.svg" alt="">
                            <span>Fulfillment Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-contetn" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" href="#">
                            <img src="{{asset('/')}}frontend/img/warehousing.svg" alt="">
                            <span>Warehousing Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-contetn" id="album-tab" data-bs-toggle="tab" data-bs-target="#album" href="#">
                            <img src="{{asset('/')}}frontend/img/amazomFba.svg" alt="">
                            <span>Amazon FBA Service</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="tabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-6 mb-5" style="text-align: center;">
                            <div class="col-lg-12">
                                <div class="title-fulment">
                                    <h2>SEFF Fulfillment</h2>
                                    <span>With our technological solutions, you can both facilitate the 
                                        operation of your orders and provide your customers with a 
                                        pleasant delivery experience thanks to our end-to-end logistics 
                                        service.</span>
                                </div>
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
                                        <th class="oneColumn" scope="col">Ücret</th>
                                        <th scope="col">7.79$</th>
                                        <th scope="col">8.79$</th>
                                        <th scope="col">8.79$</th>
                                        <th scope="col">8.79$</th>
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
                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row  mt-6 mb-5" style="text-align: center;">
                            <div class="col-lg-12">
                                <div class="storage-title">
                                    <h2>ShipLounge Warehousing</h2>
                                    <span>You can start the operational process of your orders on the s
                                        ame day, while ensuring that your products are kept safely by 
                                        utilizing warehousing services.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5 ">
                            <div class="col-lg-4">
                                <div class="storage-card">
                                    <div class="storage-img">
                                        <img src="{{asset('/')}}frontend/img/box 1.svg" alt="">
                                    </div>
                                    <div class="storage-desc">
                                        <h4>Kutu</h4>
                                        <span>30 60 30cm ölçülerinde</span>
                                    </div>
                                    <div class="storage-price">
                                        <span>5$/aylık</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="storage-card">
                                    <div class="storage-img">
                                        <img src="{{asset('/')}}frontend/img/store 1.svg" alt="">
                                    </div>
                                    <div class="storage-desc">
                                        <h4>Raf</h4>
                                        <span>150 60 45cm ölçülerinde</span>
                                    </div>
                                    <div class="storage-price">
                                        <span>16$/aylık</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="storage-card">
                                    <div class="storage-img">
                                        <img src="{{asset('/')}}frontend/img/packages 1.svg" alt="">
                                    </div>
                                    <div class="storage-desc">
                                        <h4>Palet</h4>
                                        <span>100 120 140cm ölçülerinde</span>
                                    </div>
                                    <div class="storage-price">
                                        <span>16$/aylık</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="album" role="tabpanel" aria-labelledby="album-tab">
                        <div class="row mt-6 mb-5" style="text-align: center;">
                            <div class="col-lg-12">
                                <div class="title">
                                    <h2>ShipLounge Amazon FBA</h2>
                                    <span>We manage your Amazon FBA operation on your behalf. While 
                                        our experienced team is doing your product packaging and 
                                        labeling, you only have to do your FBA planning.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-6">
                            <div class="col-lg-8">
                                <div class="left-bar">
                                    <div class="bar-title">
                                        <h4>Amazon FBA Service Price Calculator</h4>
                                        <span>FBA cost is determined based on the number of products.</span>
                                    </div>
                                    <div class="bar1">
                                        <h4>1) How many products do you need to prepare?</h4>
                                        <span>Please specify the number of products!</span>
                                    </div>
                                    <div class="progressBar">
                                        <div class="progress">
                                            <div class="progress-bar w-25" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5000">
                                            </div>
                                        </div>
                                        <span>0</span>
                                    </div>
                                    <div class="bar2">
                                        <h4>2) Services You Want To Add</h4>
                                        <span>You can purchase additional services by clicking</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="right-bar">
                                    <div class="bar-card">
                                        <img src="{{asset('/')}}frontend/img/Saving04.png" alt="">
                                        <span>Average Cost</span>
                                        <span>0.00 $</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row mt-5 grid">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <label class="card">
                                    <input class="card__input" type="checkbox" />
                                        <div class="card__body">
                                            <div class="card__body-cover">
                                                <img class="card__body-cover-image" src="{{asset('/')}}frontend/img/barcod.png" />
                                                <span class="card__body-cover-checkbox">
                                                        <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                    </svg>
                                                </span>
                                                <h5 class="card__body-header-title">FNSKU Barcoding</h5>
                                                <p class="card__body-header-subtitle">$0.40/Each</p>
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
                                        <img class="card__body-cover-image" src="{{asset('/')}}frontend/img/material.png" />
                                        <span class="card__body-cover-checkbox"> 
                                            <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg>
                                        </span></div>
                                        <h5 class="card__body-header-title">Protective Material</h5>
                                        <p class="card__body-header-subtitle">$0.49/Each</p>
                                </div>
                            </label>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <label class="card"><input class="card__input" type="checkbox" />
                                    <div class="card__body">
                                        <div class="card__body-cover">
                                            <img class="card__body-cover-image" src="{{asset('/')}}frontend/img/inserts.png" />
                                            <span class="card__body-cover-checkbox"> 
                                                <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                            <h5 class="card__body-header-title">Marketing and Promotional Inserts</h5>
                                            <p class="card__body-header-subtitle">$0.15/Each</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <label class="card"><input class="card__input" type="checkbox" />
                                    <div class="card__body">
                                        <div class="card__body-cover">
                                            <img class="card__body-cover-image" src="{{asset('/')}}frontend/img/box.png" />
                                            <span class="card__body-cover-checkbox"> 
                                                <svg class="card__body-cover-checkbox--svg" viewBox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                            <h5 class="card__body-header-title">Additional Box</h5>
                                            <p class="card__body-header-subtitle">$1.99/Each</p>
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
                    <h2>Want to try for free?</h2>
                    <span>With our technological solutions, you can bot
                        facilitate the operation of your 
                        orders and provide your customers with a 
                        pleasant delivery experience thanks to our 
                        end-to-end logistics service.</span>
                    <button>Start now</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="right-free">
                    <img src="{{asset('/')}}frontend/img/traktor.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Free Section end -->

<!-- Accordion Start -->
<section id="Accordion">
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
</section>
<!-- Accordion End -->
@endsection