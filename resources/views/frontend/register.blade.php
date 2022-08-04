@extends('frontend.layout.app')

@section('title', 'Register')

@section('content')
    @if ($errors->any())
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{ implode('', $errors->all(':message')) }}',
                backdrop: false,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 3000
            })
        </script>
    @endif

    <style>
        .login-forms {
            justify-content: center;
        }

        .gender-div-hm {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 15px 57px;
            background: #EFEFEF;
            width: max-content;
            border-radius: 14px;
        }
        #turkish-cities{
            display: none;
        }
    </style>

    <section id="Login">
        <div class="container">
            <div class="row mt-6 loginForm">
                <div class="col-lg-12">
                    <form method="post" action="{{ route('userpanel.create_user') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-title">
                                    <h1>Register</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="row login-forms">
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input name="name" type="text" placeholder="Name/Surname/Company name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input name="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 forms-input">
                                        <input class="form-control" type="tel" name="phone" id="telephone"
                                            style="padding-block: 25px;">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <select name="country" onchange="selectCountry(this)">
                                                <option value="0" disabled selected>Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="turkish-cities">
                                        <div class="forms-input">
                                            <select name="city">
                                                <option value="0" disabled selected>Select city</option>
                                                <option value="Adana">Adana</option>
                                                <option value="Adıyaman">Adıyaman</option>
                                                <option value="Afyonkarahisar">Afyonkarahisar</option>
                                                <option value="Ağrı">Ağrı</option>
                                                <option value="Amasya">Amasya</option>
                                                <option value="Ankara">Ankara</option>
                                                <option value="Antalya">Antalya</option>
                                                <option value="Artvin">Artvin</option>
                                                <option value="Aydın">Aydın</option>
                                                <option value="Balıkesir">Balıkesir</option>
                                                <option value="Bilecik">Bilecik</option>
                                                <option value="Bingöl">Bingöl</option>
                                                <option value="Bitlis">Bitlis</option>
                                                <option value="Bolu">Bolu</option>
                                                <option value="Burdur">Burdur</option>
                                                <option value="Bursa">Bursa</option>
                                                <option value="Çanakkale">Çanakkale</option>
                                                <option value="Çankırı">Çankırı</option>
                                                <option value="Çorum">Çorum</option>
                                                <option value="Denizli">Denizli</option>
                                                <option value="Diyarbakır">Diyarbakır</option>
                                                <option value="Edirne">Edirne</option>
                                                <option value="Elazığ">Elazığ</option>
                                                <option value="Erzincan">Erzincan</option>
                                                <option value="Erzurum">Erzurum</option>
                                                <option value="Eskişehir">Eskişehir</option>
                                                <option value="Gaziantep">Gaziantep</option>
                                                <option value="Giresun">Giresun</option>
                                                <option value="Gümüşhane">Gümüşhane</option>
                                                <option value="Hakkâri">Hakkâri</option>
                                                <option value="Hatay">Hatay</option>
                                                <option value="Isparta">Isparta</option>
                                                <option value="Mersin">Mersin</option>
                                                <option value="İstanbul">İstanbul</option>
                                                <option value="İzmir">İzmir</option>
                                                <option value="Kars">Kars</option>
                                                <option value="Kastamonu">Kastamonu</option>
                                                <option value="Kayseri">Kayseri</option>
                                                <option value="Kırklareli">Kırklareli</option>
                                                <option value="Kırşehir">Kırşehir</option>
                                                <option value="Kocaeli">Kocaeli</option>
                                                <option value="Konya">Konya</option>
                                                <option value="Kütahya">Kütahya</option>
                                                <option value="Malatya">Malatya</option>
                                                <option value="Manisa">Manisa</option>
                                                <option value="Kahramanmaraş">Kahramanmaraş</option>
                                                <option value="Mardin">Mardin</option>
                                                <option value="Muğla">Muğla</option>
                                                <option value="Muş">Muş</option>
                                                <option value="Nevşehir">Nevşehir</option>
                                                <option value="Niğde">Niğde</option>
                                                <option value="Ordu">Ordu</option>
                                                <option value="Rize">Rize</option>
                                                <option value="Sakarya">Sakarya</option>
                                                <option value="Samsun">Samsun</option>
                                                <option value="Siirt">Siirt</option>
                                                <option value="Sinop">Sinop</option>
                                                <option value="Sivas">Sivas</option>
                                                <option value="Tekirdağ">Tekirdağ</option>
                                                <option value="Tokat">Tokat</option>
                                                <option value="Trabzon">Trabzon</option>
                                                <option value="Tunceli">Tunceli</option>
                                                <option value="Şanlıurfa">Şanlıurfa</option>
                                                <option value="Uşak">Uşak</option>
                                                <option value="Van">Van</option>
                                                <option value="Yozgat">Yozgat</option>
                                                <option value="Zonguldak">Zonguldak</option>
                                                <option value="Aksaray">Aksaray</option>
                                                <option value="Bayburt">Bayburt</option>
                                                <option value="Karaman">Karaman</option>
                                                <option value="Kırıkkale">Kırıkkale</option>
                                                <option value="Batman">Batman</option>
                                                <option value="Şırnak">Şırnak</option>
                                                <option value="Bartın">Bartın</option>
                                                <option value="Ardahan">Ardahan</option>
                                                <option value="Iğdır">Iğdır</option>
                                                <option value="Yalova">Yalova</option>
                                                <option value="Karabük">Karabük</option>
                                                <option value="Kilis">Kilis</option>
                                                <option value="Osmaniye">Osmaniye</option>
                                                <option value="Düzce">Düzce</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="gender-div-hm col-lg-12">
                                        <div class="label-div-gender-hm">
                                            <label aria-pressed="true">
                                                Gender:</label>
                                        </div>
                                        <div class="inputs-div-gender-hm">
                                            <label class="btn btn-default col">
                                                <input type="radio" name="gender" value="man"> &nbsp;Man
                                            </label>
                                            <label class="btn btn-default col">
                                                <input type="radio" name="gender" value="woman"> &nbsp;Woman
                                            </label>
                                            <label class="btn btn-default col">
                                                <input type="radio" name="gender" value="none"> &nbsp;Belirtmek
                                                İstemiyorum
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input type="password" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input name="password" id="passwordcheck" type="password"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-lg-12" style="display:flex;justify-content:center;gap:10px">
                                <div class="forms-input col">
                                    <select name="user_market">
                                        <option value="0" selected disabled>Mağazanız -Seçilmedi</option>
                                        <option value="etsy">Etsy</option>
                                        <option value="amazon">Amazon</option>
                                        <option value="aliexpress">Aliexpress</option>
                                        <option value="ebay">Ebay</option>
                                        <option value="wish">Wish</option>
                                        <option value="shopify">Shopify</option>
                                        <option value="opencart">Opencart</option>
                                        <option value="bonanza">Bonanza</option>
                                        <option value="prestashop">PrestaShop</option>
                                        <option value="walmart">Walmart</option>
                                        <option value="wix">Wix</option>
                                        <option value="woocommerce">Woocommerce</option>
                                        <option value="magento">Magento</option>
                                        <option value="mystore">Kendi Mağazam</option>
                                        <option value="diger">Diğer</option>
                                    </select>
                                </div>
                                <div class="forms-input col">
                                    <select name="from_where">
                                        <option value="0" selected disabled>ShipLounge'ı nerden duydunuz ?</option>
                                        <option value="google">Google</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="youtube">Youtube</option>
                                        <option value="linkedin">LinkedIn</option>
                                        <option value="other">Diğer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input name="promotion_code" id="promotion_code" type="text"
                                        placeholder="Promotion Code">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input name="average_requests" id="average_reqeusts" type="number"
                                        placeholder="Average monthly requests">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <div class="label-check">
                                        <input id="terms_checkbox" type="checkbox">
                                        <label for="terms_checkbox">I agree with all <a href="">Terms and
                                                Conditions</a> and <a href="">Privacy and policy</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="login-button">
                                    <button id="submit_button" type="submit">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="footer-login">
        <div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="footer-title">
                        <h5>Already have account? <a href="{{ route('login') }}">Login</a></h5>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <div class="footer-end">
                        <a href="">Terms of use</a>
                        <a href="">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        #submit_button:disabled {
            background: gray !important;
            cursor: not-allowed;
        }

        #password_text {
            color: red;
        }
    </style>
    <script>
        var check_box = document.querySelector('#terms_checkbox');
        var submit_button = document.querySelector('#submit_button');

        // submit_button.style.display = 'none';

        if (!check_box.checked) {
            submit_button.disabled = true;
        }

        check_box.addEventListener("change", (event) => {
            if (check_box.checked) {
                submit_button.disabled = false;
            } else {
                submit_button.disabled = true;
            }
        });

        var password = document.querySelector('#password');
        var passwordCheck = document.querySelector('#passwordcheck');

        passwordCheck.addEventListener('change', function() {
            if (password.value != passwordCheck.value) {
                if (!document.querySelector('#password_text')) {
                    passwordCheck.insertAdjacentHTML('afterend',
                        '<strong id="password_text">Password is not same</strong>');
                    // submit_button.style.display = 'none';
                }
            } else {
                if (document.querySelector('#password_text')) {
                    document.querySelector('#password_text').remove();
                    // submit_button.style.display = 'block';
                }
            }
        });
        password.addEventListener('change', function() {
            if (password.value != passwordCheck.value && passwordCheck.value != "") {
                if (!document.querySelector('#password_text')) {
                    passwordCheck.insertAdjacentHTML('afterend',
                        '<strong id="password_text">Password is not same</strong>');
                    // submit_button.style.display = 'none';
                }
            } else {
                if (document.querySelector('#password_text')) {
                    document.querySelector('#password_text').remove();
                    // submit_button.style.display = 'block';
                }
            }
        });
    </script>
    <script>
        function selectCountry(select) {
            var options = select.options;
            var country = options[options.selectedIndex].getAttribute('value');
            if (country == "Turkey") {
                console.log(country);
                document.querySelector('#turkish-cities').style.display = "block";
            }
        }
    </script>
@endsection
