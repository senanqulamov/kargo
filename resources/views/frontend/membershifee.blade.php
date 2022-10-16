@extends('frontend.layout.app')

@section('title', 'Member Shifee')

@section('content')

<!-- MembershiFee Start -->
<section id="MembershipFee">
    <div class="container">
        <div class="row my-6" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h2>{{ __('homepage.membership fees.text 1') }}</h2>
                    <span>{{ __('homepage.membership fees.text 2') }}</span>
                </div>
            </div>
        </div>
        <div class="row my-5" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h2>{{ __('homepage.membership fees.text 3') }}</h2>
                    <span>{{ __('homepage.membership fees.text 4') }}</span>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-3">
                <div class="memberShipCard">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row cardTitle">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                    <div class="left-price">
                                        <h3>{{ __('homepage.membership fees.text 5') }}</h3>
                                        <span>0$</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                    <div class="img-member">
                                        <img src="{{asset('/')}}frontend/img/membreship1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="startedButton">
                                <button onclick="window.open('{{ route('login') }}' , '_self')">{{ __('homepage.membership fees.text 6') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row infoCardBox">
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <span>{{ __('homepage.membership fees.text 7') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>0</p>
                                        <span>{{ __('homepage.membership fees.text 13') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>1</p>
                                        <span>{{ __('homepage.membership fees.text 14') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="listCard">
                                <span>{{ __('homepage.membership fees.text 7') }}</span>
                                <ul>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="memberShipCard memberShipCard2">
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row cardTitle">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="left-price">
                                        <h3>{{ __('homepage.membership fees.text 8') }}</h3>
                                        <span>0$</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="img-member">
                                        <img src="{{asset('/')}}frontend/img/membreship1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="startedButton">
                                <button onclick="window.open('{{ route('login') }}' , '_self')">{{ __('homepage.membership fees.text 6') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row infoCardBox">
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>100</p>
                                        <span>{{ __('homepage.membership fees.text 12') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>0</p>
                                        <span>{{ __('homepage.membership fees.text 13') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>1</p>
                                        <span>{{ __('homepage.membership fees.text 14') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="listCard">
                                <span>{{ __('homepage.membership fees.text 7') }}</span>
                                <ul>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="memberShipCard ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row cardTitle">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="left-price">
                                        <h3>{{ __('homepage.membership fees.text 8') }}</h3>
                                        <span>0$</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="img-member">
                                        <img src="{{asset('/')}}frontend/img/membreship1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="startedButton">
                                <button onclick="window.open('{{ route('login') }}' , '_self')">{{ __('homepage.membership fees.text 6') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row infoCardBox">
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>100</p>
                                        <span>{{ __('homepage.membership fees.text 12') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>0</p>
                                        <span>{{ __('homepage.membership fees.text 13') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>1</p>
                                        <span>{{ __('homepage.membership fees.text 14') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="listCard">
                                <span>{{ __('homepage.membership fees.text 7') }}</span>
                                <ul>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="memberShipCard">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row cardTitle">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="left-price">
                                        <h3>{{ __('homepage.membership fees.text 8') }}</h3>
                                        <span>0$</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="img-member">
                                        <img src="{{asset('/')}}frontend/img/membreship1.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="startedButton">
                                <button onclick="window.open('{{ route('login') }}' , '_self')">{{ __('homepage.membership fees.text 6') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row infoCardBox">
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>100</p>
                                        <span>{{ __('homepage.membership fees.text 12') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>0</p>
                                        <span>{{ __('homepage.membership fees.text 13') }}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="infoCard">
                                        <p>1</p>
                                        <span>{{ __('homepage.membership fees.text 14') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="listCard">
                                <span>{{ __('homepage.membership fees.text 7') }}</span>
                                <ul>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/tic.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                    <li><img src="{{asset('/')}}frontend/img/minus.svg" alt="">Auto Order Sync</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- MembershiFee end -->

<!-- {{ __('homepage.membership fees.text 8') }} Section start -->
<section id="{{ __('homepage.membership fees.text 8') }}">
    <div class="container">
        <div class="row  mFee py-5 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="left-{{ __('homepage.membership fees.text 8') }}">
                    <h2>{{ __('homepage.membership fees.text 32') }}</h2>
                    <span>{{ __('homepage.membership fees.text 33') }}</span>
                    <button onclick="window.open('{{ route('login') }}' , '_self')">{{ __('homepage.membership fees.text 31') }}</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="right-{{ __('homepage.membership fees.text 8') }}">
                    <img src="{{asset('/')}}frontend/img/traktor.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- {{ __('homepage.membership fees.text 8') }} Section end -->

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
