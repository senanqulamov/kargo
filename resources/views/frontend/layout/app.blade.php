<!doctype html>
<html lang="en">
@php
$data = DB::table('companies')
    ->where('status', 1)
    ->first();
$favico = DB::table('configs')
    ->where('key', 'favicon')
    ->first();
$logo = DB::table('configs')
    ->where('key', 'logo')
    ->first();
$footer_logo = DB::table('configs')
    ->where('key', 'footer_logo')
    ->first();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/resources/responsive.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/resources/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

    {{-- @if (!request()->is('servicesFee'))
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    @endif --}}

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" />

    {{-- International phone INPUT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/js/intlTelInput.min.js"
        integrity="sha512-hpJ6J4jGqnovQ5g1J39VtNq1/UPsaFjjR6tuCVVkKtFIx8Uy4GeixgIxHPSG72lRUYx1xg/Em+dsqxvKNwyrSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield('title') | {{ $data->title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/') }}frontend/img/{{ $favico->value }}">

    @yield('css')
    <style>
        html {
            overflow-x: hidden;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 98;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(4px);
            border-bottom: 0.5px solid #ED5A23;
        }

        .navbar-nav li {
            transition: all 0.5s cubic-bezier(0.075, 0.82, 0.165, 1);
            height: max-content;
            padding: 4px 7px;
            border-radius: 5px;
            border: 1px solid transparent;
        }

        .navbar-nav li a {
            padding: 6px 3px !important;
        }

        .navbar-collapse {
            margin: 0 !important;
        }

        .navbar-nav li:hover {
            box-shadow: 0 0 4px rgb(0 0 0 / 17%);
            /*border-radius: 15px;*/
            /*transform: scale(1.1);*/
            /*padding: 10px 20px;*/
            cursor: pointer;
            /*border: 1px solid #ED5A23;*/
        }

        .profile-li-element {
            transition: all 0.5s cubic-bezier(0.075, 0.82, 0.165, 1);
            height: max-content;
            padding: 0 10px;
            border: 1px solid #0dcaf0;
            border-radius: 15px;
        }

        .profile-li-element:hover {
            transform: scale(1.01);
            /*padding: 10px 20px;*/
            /*border: 1px solid #ED5A23;*/
            box-shadow: 0 0 5px rgb(0 0 0 / 17%);
        }

        .dropdown-item:focus,
        .dropdown-item:hover {
            background: white;
        }

        .active-navbar-item-hm {
            box-shadow: 0 0 4px rgb(0 0 0 / 17%);
            border-radius: 5px;

        }

        .bootstrap-select.btn-group.fit-width .btn .caret {
            display: none;
        }

        .bootstrap-select.btn-group:not(.input-group-btn),
        .bootstrap-select.btn-group[class*=span],
        .bootstrap-select.btn-group[class*=col-] {
            margin-bottom: 5px;
            margin-top: 5px;
        }

        footer .footer-logo .footer-social a {
            margin: 5px 0;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .faq-item {
            font-size: 28px;
            margin: 10px 0;
            padding-left: 32px;
        }

        .faq-item a {
            color: #fff !important;
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        .header-nav-hm {
            display: flex;
            align-items: center;
            height: max-content;
        }

        .header-nav-hm a {
            padding: 5px 15px;
        }

        .profile-button-hm {
            display: inline-block;
            align-items: center;
            justify-content: center;
            gap: 10px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
            height: max-content;
            padding: 5px 20px;
        }

        .login-li-element {
            border: 0.55px solid #3249701A;
            box-shadow: 0px 4px 10px 0px #0000001a;
            padding: 5px 15px;
            border-radius: 7px;
            color: #324970;
            background-color: #fff;
        }

        .register-li-element {
            border: 0.55px solid #3249701A;
            box-shadow: 0px 4px 10px 0px #0000001a;
            padding: 5px 15px;
            border-radius: 7px;
            background-color: #00A3FE;
        }

        .register-li-element a {
            color: #fff !important;
        }

        @media only screen and (max-width:425px) {
            .navbar-nav li {
                margin-top: 5px;
            }

            .navbar .navbar-nav {
                align-items: left !important;
            }
        }

        .footerLinkDesing {
            display: inline-block;
            text-decoration: none;
            transition: all ease .4s;
            color: white;
        }

        .footerLinkDesing:hover {
            transform: translateX(5px) scale(1.01);
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}"><img
                    src="{{ asset('/') }}frontend/img/{{ $logo->value }}" alt="{{ $data->title }}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav">
                    <li
                        class="nav-item dropdown
                        @if (Request::segment(1) == 'e-commerce' ||
                            Request::segment(1) == 'fba' ||
                            Request::segment(1) == 'marketplace' ||
                            Request::segment(1) == 'export' ||
                            Request::segment(1) == 'servicesFee') active-navbar-item-hm @endif">
                        <a class="nav-link dropdown-toggle" href="servicesFee.html" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('homepage.navbar.Services')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('e-commerce') }}">{{ __('homepage.navbar.E-Commerce Logistics')}}</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('fba') }}">{{ __('homepage.navbar.Amazon FBA')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('marketplace') }}">{{ __('homepage.navbar.Marketplace Integration') }}</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('export') }}">{{ __('homepage.navbar.Fullfilment') }}</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ route('servicesFee') }}">Purchasing Service</a> --}}
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item dropdown
                        @if (Request::segment(1) == 'pricecalculator' ||
                            Request::segment(1) == 'getquote' ||
                            Request::segment(1) == 'service' ||
                            Request::segment(1) == 'membershifee') active-navbar-item-hm @endif">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('homepage.navbar.Pricing')}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('pricecalculator') }}">{{__('homepage.navbar.Price Calculation')}}</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('getquote') }}">{{__('homepage.navbar.Get a Quote')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('servcice') }}">{{__('homepage.navbar.Service Fees')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('membershifee') }}">{{__('homepage.navbar.Membership Plans')}}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item @if (Request::segment(1) == 'contact') active-navbar-item-hm @endif">
                        <a class="nav-link @if (Request::segment(1) == 'contact') active @endif" aria-current="page"
                            href="{{ route('contact') }}">{{__('Contact')}}</a>
                    </li>
                    <li class="nav-item @if (Request::segment(1) == 'blogs') active-navbar-item-hm @endif">
                        <a class="nav-link @if (Request::segment(1) == 'blogs') active @endif"
                            href="{{ route('blogs.index') }}">{{__('homepage.navbar.Blog')}}</a>
                    </li>
                    <li class="nav-item @if (Request::segment(1) == 'faqs') active-navbar-item-hm @endif">
                        <a class="nav-link @if (Request::segment(1) == 'faqs') active @endif"
                            href="{{ route('faqs') }}">{{__('homepage.navbar.FAQ')}}</a>
                    </li>
                    <li class="nav-item @if (Request::segment(1) == 'track') active-navbar-item-hm @endif">
                        <a class="nav-link" href="{{ route('track') }}">{{__('homepage.navbar.Cargo Track')}}</a>
                    </li>
                    <li class="nav-item @if (Request::segment(1) == 'careers') active-navbar-item-hm @endif">
                        <a class="nav-link @if (Request::segment(1) == 'careers') active @endif"
                            href="{{ route('careers.index') }}">{{__('homepage.navbar.Career')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                            {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </a>
                        <div class="dropdown-menu">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('switchLang' , ['lang' => $lang]) }}">
                                        <span class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                                        {{ $language['display'] }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                    {{-- <select class="selectpicker" data-width="fit">
                        <option data-content='<span class="flag-icon flag-icon-gb"></span>'>
                            EN
                        </option>
                        <option data-content='<span class="flag-icon flag-icon-tr"></span> '>
                            TR
                        </option>
                    </select> --}}
                    @if (!Auth::user())
                        <li
                            class="nav-item login-li-element @if (Request::segment(1) == 'login') active-navbar-item-hm @endif">
                            <a class="nav-link" href="{{ route('login') }}">{{__('homepage.navbar.Login')}}</a>
                        </li>
                        <li
                            class="nav-item register-li-element @if (Request::segment(1) == 'register') active-navbar-item-hm @endif">
                            <a class="nav-link" href="{{ route('register') }}">{{__('homepage.navbar.Register')}}</a>
                        </li>
                    @else
                        <div class="nav-item d-flex profile-li-element">
                            <a href="{{ route('userpanel.index') }}" class="profile-button-hm">
                                {{ Auth::user()->name }}
                                <i class="fa fa-user"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="margin-top-hm">
        @yield('content')
    </div>

    <!-- Footer Start -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            {{__('homepage.navbar.About us')}}
                            {{-- <li>{{ $data->description }}</li> --}}
                        </ul>
                    </div>
                    <div>
                        <div class="faq-item @if (Request::segment(1) == 'faqs')  @endif">
                            <a class=" @if (Request::segment(1) == 'faqs')  @endif"
                                href="{{ route('faqs') }}">{{__('homepage.navbar.FAQ')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            {{__('homepage.navbar.Legal')}}
                            <li>{{__('homepage.navbar.Terms of use')}}</li>
                            <li>{{__('homepage.navbar.PDPL')}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-logo">
                        <img src="{{ asset('/') }}frontend/img/{{ $footer_logo->value }}" alt="">
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            {{__('homepage.navbar.Prices')}}
                            <li><a class="footerLinkDesing" href="{{ route('pricecalculator') }}">{{__('homepage.navbar.Price Calculation')}}</a></li>
                            <li><a class="footerLinkDesing" href="{{ route('getquote') }}">{{__('homepage.navbar.Get a Quote')}}</a></li>
                            <li><a class="footerLinkDesing" href="{{ route('servcice') }}">{{__('homepage.navbar.Service Fees')}}</a></li>
                            <li><a class="footerLinkDesing" href="{{ route('membershifee') }}">{{__('homepage.navbar.Membership Fee')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            Services
                            <li><a class="footerLinkDesing" href="{{ route('e-commerce') }}">{{ __('homepage.navbar.E-Commerce Logistics')}}</a>
                            </li>
                            <li><a class="footerLinkDesing" href="{{ route('fba') }}">{{ __('homepage.navbar.Amazon FBA') }}</a></li>
                            <li><a class="footerLinkDesing" href="{{ route('marketplace') }}">{{ __('homepage.navbar.Marketplace Integration') }}</a></li>
                            <li><a class="footerLinkDesing" href="{{ route('export') }}">{{__('homepage.navbar.Fullfilment')}}</a></li>
                            {{-- <li><a class="footerLinkDesing" href="{{ route('servicesFee') }}">Purchasing Service</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- Loading Animation Start -->
    <div class="loading" delay-hide="800"></div>
    <!-- Loading animation End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js"></script>
    <script src="{{ asset('/') }}frontend/resources/app.js"></script>
    @yield('js')

    <!-- Elave -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $(".selectpicker").selectpicker();
        });
    </script>
    <script>
        var input = document.querySelector("#telephone");
        window.intlTelInput(input, ({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            customPlaceholder: null,
            dropdownContainer: null,
            excludeCountries: [],
            formatOnDisplay: true,
            geoIpLookup: null,
            hiddenInput: "",
            initialCountry: "tr",
            localizedCountries: null,
            nationalMode: true,
            onlyCountries: [],
            placeholderNumberType: "MOBILE",
            preferredCountries: ["tr", "us", "az"],
            separateDialCode: true,
            utilsScript: ""
        }));
        $('.iti__flag-container').click(function() {
            var countryCode = document.querySelector('.iti__selected-dial-code');
            console.log(countryCode.innerHTML);
            var countryCode = countryCode.innerHTML;
            $('#telephone').val("");
            $('#telephone').val(countryCode + "" + $('#telephone').val());
        });
    </script>
    <!-- End Elave -->
</body>

</html>
