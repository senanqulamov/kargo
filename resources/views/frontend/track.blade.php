@extends('frontend.layout.app')

@section('title', 'Cargo Track')

@section('content')
    <style>
        .not-active-element-hm {
            opacity: 0;
            visibility: hidden;
            width: 0;
            /* height: 0; */
            margin: 0;
            padding: 0;
        }

        .element-w-transition {
            transition: all 0.6s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .active-element-hm {
            opacity: 1;
            visibility: visible;
        }

        .url-input-hm {
            display: grid;
            grid-template-columns: 40% 7% 4%;
            justify-content: center;
            gap: 2px;
        }
    </style>
    <!-- Kargo Track Title Section Start -->
    <section id="KargoTrackTitle">
        <div class="container">
            <div class="row mt-6" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="title">
                        <h2>Global Cargo Tracking</h2>
                        <span>Are you ready to ship from Turkey to the World with affordable logistics solutions with
                            ShipLounge?</span>
                    </div>
                </div>
            </div>
            <div class="row mt-6 searchBtn">
                <div class="col-lg-12">
                    <form role="search" method="get" class="search-form form" action="">
                        <label>
                            <span class="screen-reader-text">Search for...</span>
                            <input type="search" class="search-field" placeholder="Enter Track ID" value=""
                                name="s" title="" />
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
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </li>
                            <li class="complete">
                                <div class="content-prgres">
                                    <div class="date">
                                        <p>Sunday 10 September</p>
                                        <p>12:00 AM</p>
                                    </div>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </li>
                            <li class="">
                                <div class="content-prgres">
                                    <div class="date">
                                        <p>Waiting...</p>
                                        <p>--:--</p>
                                    </div>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </li>
                            <li class="">
                                <div class="content-prgres">
                                    <div class="date">
                                        <p>Waiting...</p>
                                        <p>--:--</p>
                                    </div>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                                </div>
                            </li>
                            <li class="">
                                <div class="content-prgres">
                                    <div class="date">
                                        <p>Waiting...</p>
                                        <p>--:--</p>
                                    </div>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor</span>
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
            <div class="url-input-hm not-active-element-hm element-w-transition">
                <input class="form-control" type="text" name="url_input" placeholder="type value for search">
                <button class="btn btn-primary" onclick="OpenLink()">
                    Search
                </button>
                <button class="btn btn-danger" onclick="removeIframe()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="row my-5 justify-content-center">
                <div class="col-lg-2 col-md-6 col-sm-6 col-6" onclick="openIframe(this)" data-name="Fedex"
                    data-url="https://www.fedex.com/fedextrack/system-error?trknbr=">
                    <div class="firma-card">
                        <img src="{{ asset('/') }}frontend/img/FedExFirma1.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-6" onclick="openIframe(this)" data-name="DHL"
                    data-url="https://www.dhl.com/tr-tr/home/tracking/tracking-ecommerce.html?submit=1&tracking-id=">
                    <div class="firma-card">
                        <img src="{{ asset('/') }}frontend/img/DHLFirma.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-6" onclick="openIframe(this)" data-name="TNT" data-url="asdad">
                    <div class="firma-card">
                        <img src="{{ asset('/') }}frontend/img/TNTFirma.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-6" onclick="openIframe(this)" data-name="Ptt" data-url="asdas">
                    <div class="firma-card">
                        <img src="{{ asset('/') }}frontend/img/pttFirma.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-6" onclick="openIframe(this)" data-name="Ups"
                    data-url="https://www.ups.com/track?loc=tr_TR&tracknum=1Z0793R70498463355&requester=ST/trackdetails">
                    <div class="firma-card">
                        <img src="{{ asset('/') }}frontend/img/UpsFirma.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var input_holder;
        var input;
        var data_url;
        var data_name;
        var link;

        function openIframe(company_div) {
            console.clear();
            input_holder = document.querySelector('.url-input-hm');
            input = input_holder.querySelector('input');
            data_url = company_div.getAttribute('data-url');
            data_name = company_div.getAttribute('data-name');

            if (!input_holder.getAttribute('class').includes(' active-element-hm')) {
                input_holder.classList.remove('not-active-element-hm');
                input_holder.classList.add('active-element-hm');
            }
            input.setAttribute('placeholder', 'type ' + data_name + ' value for search');
        }

        function OpenLink() {

            switch (data_name) {
                case "Fedex":
                    link = data_url + input.value;
                    break;
                case "DHL":
                    link = data_url + input.value;
                    break;
                case "TNT":
                    link = data_url + input.value;
                    break;
                case "Ptt":
                    link = data_url + input.value;
                    break;
                case "Ups":
                    link = "https://www.ups.com/track?loc=tr_TR&tracknum=" + input.value + "&requester=ST/trackdetails";
                    break;
            }

            console.log(link);
            window.open(link);
        }

        function removeIframe() {
            var input_holder = document.querySelector('.url-input-hm');
            input_holder.classList.add('not-active-element-hm');
            input_holder.classList.remove('active-element-hm');
        }
    </script>
    <!-- Firma End -->
@endsection
