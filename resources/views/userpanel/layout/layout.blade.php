<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato&family=Prosto+One&family=Roboto:wght@100&family=Source+Serif+Pro:wght@200&display=swap"
        rel="stylesheet" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}frontend/userpanel/css/style.css" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/userpanel/css/pages.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/userpanel/css/main.css">

    <title>Document</title>
</head>

<body>
    <!-- Test commit -->


    <nav class="fnav">
        <div class="fnav__box">
            <div class="fnav__burger">
                <span class="fnav__line  fnav__top">

                </span>
                <span class="fnav__line  fnav__center">

                </span>
                <span class="fnav__line  fnav__bottom">

                </span>
            </div>

            <div class="header__input">
                <i class="fa-solid fa-magnifying-glass header__input-icon"></i>
                <input class="header__input-search" type="text" placeholder="Axtar..." />
            </div>


            <div class="navigation__logo text-center">
                <img src="img/png/logo.png" class="navigation__logo-img" alt="" />
            </div>

        </div>
    </nav>


    <nav class=" burger__menu navigation__left">

        <div class="navigation container">
            <div class="navigation__data">
                <ul class="navigation__items">
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i class="fa-solid fa-house navigation__icon"></i>
                                <span class="navigation__span">Main Menu</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-network-wired navigation__icon"></i>
                                <span class="navigation__span">Balance System</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-cart-shopping navigation__icon"></i>
                                <span class="navigation__span">Orders</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i class="fa-solid fa-headset navigation__icon"></i>
                                <span class="navigation__span">Courier Request</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-boxes-stacked navigation__icon"></i>
                                <span class="navigation__span">Stock</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-address-card navigation__icon"></i>
                                <span class="navigation__span">Site Usage</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-bag-shopping navigation__icon"></i>
                                <span class="navigation__span">Buy for me</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-square-share-nodes navigation__icon"></i>
                                <span class="navigation__span">Share and Earn</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-cart-flatbed navigation__icon"></i>
                                <span class="navigation__span">Inventory</span></a>
                        </li>
                    </div>
                    <div class="navigation__box">
                        <li class="navigation__item">
                            <a href="#" class="navigation__link"><i
                                    class="fa-solid fa-truck-ramp-box navigation__icon"></i>
                                <span class="navigation__span">Cargo Companies</span></a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>


    </nav>


    <header>
        <div class="container header">
            <div class="col-md-6">
                <div class="header__input">
                    <i class="fa-solid fa-magnifying-glass header__input-icon"></i>
                    <input class="header__input-search" type="text" placeholder="Axtar..." />
                </div>
            </div>

            <div class="col-md-6">
                <div>
                    <ul class="header__item">
                        <li class="header__item-list">
                            <a href="" class="header__item-link">
                                Balance <br />
                                <span class="header__item-balance">35 E</span>
                            </a>
                        </li>
                        <li class="header__item-list">
                            <a href="" class="header__item-link">
                                <i class="fa-solid fa-bell header__item-icon"></i></a>
                        </li>
                        <li class="header__item-list">
                            <a href="" class="header__item-link">
                                <i class="fa-solid fa-bell header__item-icon"></i></a>
                        </li>
                        <li class="header__item-list">
                            <a href="" class="header__item-link">
                                <i class="fa-solid fa-gear header__item-icon"></i></a>
                        </li>
                        <li class="header__item-list">
                            <a href="" class="header__item-link">
                                <i class="fa-solid fa-circle-question header__item-icon"></i></a>
                        </li>
                        <li class="header__item-list">
                            <a href="" class="header__item-link">
                                <i class="fa-solid fa-globe header__item-icon"></i></a>
                        </li>
                        <li class="header__item-list">
                            <a href="" class="header__item-link header__account-guest">
                                {{ Auth::user()->name }}
                                <i class="fa-solid fa-user header__item-icon header__account-icon"></i></a>
                            <a href="{{ route('userpanel.logout_user') }}">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>





    <section id="Sturcture" class="structure">
        <div class="row w-100">
            <div class="col-lg-3   page__1">
                <nav class="navigation__left">

                    <div class="navigation container">
                        <div class="navigation__cancel">

                            <span class="navigation__cancel-span"><i
                                    class="fa-solid fa-xmark navigation__cancel-icon"></i></span>
                        </div>

                        <div class="navigation__logo text-center">
                            <img src="img/png/logo.png" class="navigation__logo-img" alt="" />
                        </div>

                        <div class="navigation__data">
                            <ul class="navigation__items">
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-house navigation__icon"></i>
                                            <span class="navigation__span">Main Menu</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-network-wired navigation__icon"></i>
                                            <span class="navigation__span">Balance System</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-cart-shopping navigation__icon"></i>
                                            <span class="navigation__span">Orders</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-headset navigation__icon"></i>
                                            <span class="navigation__span">Courier Request</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-boxes-stacked navigation__icon"></i>
                                            <span class="navigation__span">Stock</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-address-card navigation__icon"></i>
                                            <span class="navigation__span">Site Usage</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-bag-shopping navigation__icon"></i>
                                            <span class="navigation__span">Buy for me</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-square-share-nodes navigation__icon"></i>
                                            <span class="navigation__span">Share and Earn</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-cart-flatbed navigation__icon"></i>
                                            <span class="navigation__span">Inventory</span></a>
                                    </li>
                                </div>
                                <div class="navigation__box">
                                    <li class="navigation__item">
                                        <a href="#" class="navigation__link"><i
                                                class="fa-solid fa-truck-ramp-box navigation__icon"></i>
                                            <span class="navigation__span">Cargo Companies</span></a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 col-md-11 col-sm-12 col-12 page__2">

                @yield('content')


            </div>
        </div>
        </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--d3js-->
    <!-- Load d3.js -->
    <script src="https://d3js.org/d3.v4.js"></script>
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
    <script src="https://d3js.org/d3-geo-projection.v2.min.js"></script>

    <script src="{{ asset('/') }}frontend/userpanel/js/chart.js"></script>
    <!-- JavaScript-->
    {{-- <script src="{{ asset('/') }}frontend/userpanel/js/index.js"></script>
    <script src="{{ asset('/') }}frontend/userpanel/js/d3.js"></script> --}}
    <script src="{{ asset('/') }}frontend/userpanel/js/nav.js"></script>
</body>

</html>
