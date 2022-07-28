<!doctype html>
<html lang="en">
@php(
    $data = DB::table('companies')->where('status', 1)->first()
)

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" />

    <title>@yield('title') | {{ $data->title }}</title>
    @php(
    $favico = DB::table('configs')->where('key', 'favicon')->first()
)
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
            background-color: rgba(255, 255, 255, 0.23);
            backdrop-filter: blur(4px);
        }

        section {
            margin-top: 90px;
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
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            @php(
    $logo = DB::table('configs')->where('key', 'logo')->first()
)
            <a class="navbar-brand" href="{{ route('index') }}"><img
                    src="{{ asset('/') }}frontend/img/{{ $logo->value }}" alt="{{ $data->title }}"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="servicesFee.html" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('e-commerce') }}">E-Commerce Logistics</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('fba') }}">Amazon FBA</a></li>
                            <li><a class="dropdown-item" href="{{ route('marketplace') }}">Marketplace
                                    Integration</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('export') }}">Fullfilment</a></li>
                            <li><a class="dropdown-item" href="{{ route('servicesFee') }}">Purchasing Service</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Pricing
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('pricecalculator') }}">Price Calculation</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('getquote') }}">Get a Quote</a></li>
                            <li><a class="dropdown-item" href="{{ route('servcice') }}">Service Fees</a></li>
                            <li><a class="dropdown-item" href="{{ route('membershifee') }}">Membership Plans</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(1) == 'contact') active @endif" aria-current="page"
                            href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(1) == 'blogs') active @endif"
                            href="{{ route('blogs.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(1) == 'faqs') active @endif"
                            href="{{ route('faqs') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('track') }}">Cargo Track</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::segment(1) == 'careers') active @endif"
                            href="{{ route('careers.index') }}">Career</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <select class="selectpicker" data-width="fit">
                        <option data-content='<span class="flag-icon flag-icon-gb"></span>'>
                            EN
                        </option>
                        <option data-content='<span class="flag-icon flag-icon-tr"></span> '>
                            TR
                        </option>
                    </select>
                    @if (!Auth::user())
                        {{-- <button class="header-nav-hm login-nav"> --}}
                        <a class="header-nav-hm login-nav" href="{{ route('login') }}">Login</a>
                        {{-- </button> --}}
                        {{-- <button class="header-nav-hm register-nav"> --}}
                        <a class="header-nav-hm register-nav" href="{{ route('register') }}">Register</a>
                        {{-- </button> --}}
                    @else
                        <a href="{{ route('userpanel.index') }}" class="btn btn-info profile-button-hm">
                            {{ Auth::user()->name }}
                            <i class="fa fa-user"></i>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            About Us
                            <li>{{ $data->description }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            LEGAL
                            <li>Terms of use</li>
                            <li>PDPL</li>
                            <li>Terms of use</li>
                            <li>Terms of use</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-logo">
                        @php(
    $footer_logo = DB::table('configs')->where('key', 'footer_logo')->first()
)
                        <img src="{{ asset('/') }}frontend/img/{{ $footer_logo->value }}" alt="">
                        <div class="footer-social">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            Prices
                            <li>Price Calculation</li>
                            <li>Get A Quote</li>
                            <li>Services Fees</li>
                            <li>Membership Fee</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-content">
                        <ul>
                            Services
                            <li>E-Commerce Logistics</li>
                            <li>Amazon FBA</li>
                            <li>MarketPlace Integration</li>
                            <li>FullFilment </li>
                            <li>Purchasing Service</li>
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
    <!-- End Elave -->
</body>

</html>
