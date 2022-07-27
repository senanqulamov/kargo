@extends('frontend.layout.app')

@section('title', 'Cargo Track')

@section('content')
<!-- Kargo Track Title Section Start -->
<section id="KargoTrackTitle">
    <div class="container">
        <div class="row mt-6" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h2>Global Cargo Tracking</h2>
                    <span>Are you ready to ship from Turkey to the World with affordable logistics solutions with ShipLounge?</span>
                </div>
            </div>
        </div>
        <div class="row mt-6 searchBtn">
            <div class="col-lg-12">
                <form role="search" method="get" class="search-form form" action="">
                    <label>
                        <span class="screen-reader-text">Search for...</span>
                        <input type="search" class="search-field" placeholder="Enter Track ID" value="" name="s" title="" />
                    </label>
                    <input type="submit" class="search-submit button" value="Search &#xf002" />
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Kargo Track Title Section End -->

<!-- Kargo Tarck Start -->
<section id="KargoTrack">
    <div class="container">
        <div class="row Progr">
            <div class="col-lg-12">
                <div class="holder mt-6">
                    <ul class="SteppedProgress Vertical">
                        <li class="complete">
                            <div class="content-prgres">
                                <div class="date">
                                    <p>Sunday 10 September</p>
                                    <p>12:00 AM</p>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                            </div>
                        </li>
                        <li class="complete">
                            <div class="content-prgres">
                                <div class="date">
                                    <p>Sunday 10 September</p>
                                    <p>12:00 AM</p>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                            </div>
                        </li>
                        <li class="">
                            <div class="content-prgres">
                                <div class="date">
                                    <p>Waiting...</p>
                                    <p>--:--</p>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                            </div>
                        </li>
                        <li class="">
                            <div class="content-prgres">
                                <div class="date">
                                    <p>Waiting...</p>
                                    <p>--:--</p>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                            </div>
                        </li>
                        <li class="">
                            <div class="content-prgres">
                                <div class="date">
                                    <p>Waiting...</p>
                                    <p>--:--</p>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-lg-8"></div> -->
        </div>
    </div>
</section>
<!-- Kargo Tarck End -->

<!-- Firma Start -->
<section id="Firma">
    <div class="container">
        <div class="row mt-6 mb-4" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h2>Taşıyıcı Firmayı Seçin</h2>
                </div>
            </div>
        </div>
        <div class="row my-5 justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="firma-card">
                    <img src="{{asset('/')}}frontend/img/FedExFirma1.svg" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="firma-card">
                    <img src="{{asset('/')}}frontend/img/DHLFirma.svg" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="firma-card">
                    <img src="{{asset('/')}}frontend/img/TNTFirma.svg" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="firma-card">
                    <img src="{{asset('/')}}frontend/img/pttFirma.svg" alt="">
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="firma-card">
                    <img src="{{asset('/')}}frontend/img/UpsFirma.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Firma End -->
@endsection