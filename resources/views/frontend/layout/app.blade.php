<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{asset('/')}}frontend/resources/responsive.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/resources/style.css">

        <title>Homepage | Ship Lounge</title>
        <link rel="icon" type="image/x-icon" href="{{asset('/')}}frontend/img/Shiplounge 1.ico">
    </head>

    <body>
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="{{asset('/')}}frontend/img/logo.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="servicesFee.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="e-commerce.html">E-Commerce Logistics</a></li>
                                <li><a class="dropdown-item" href="FBA.html">Amazon FBA</a></li>
                                <li><a class="dropdown-item" href="marketplace.html">Marketplace Integration</a></li>
                                <li><a class="dropdown-item" href="e-export.html">Fullfilment</a></li>
                                <li><a class="dropdown-item" href="servicesFee.html">Purchasing Service</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pricing
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="pricecalculator.html">Price Calculation</a></li>
                                <li><a class="dropdown-item" href="getquote.html">Get a Quote</a></li>
                                <li><a class="dropdown-item" href="servicesFee.html">Service Fees</a></li>
                                <li><a class="dropdown-item" href="membershiFee.html">Membership Plans</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('contact')}}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blogs.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('faqs')}}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kargoTrack.html">Cargo Track</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="career.html">Career</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <select class="selectpicker" data-width="fit">
                            <option>EN</option>
                            <option>TR</option>
                        </select>
                        <button class="login-nav"><a href="login.html">Login</a></button>
                        <button class="register-nav"><a href="register.html">Register</a></button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="footer-content">
                            <ul>
                                About Us
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad magna aliqua. Ut enim ad</li>
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
                            <img src="{{asset('/')}}frontend/img/footerLogo.svg" alt="">
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js"></script>
        <script src="{{asset('/')}}frontend/resources/app.js"></script>
    </body>
</html>