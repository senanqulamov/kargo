@extends('userpanel.layout.layout')

@section('content')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                backdrop: false,
                timer: 2000
            })
        </script>
    @endif

    @php
        $integration = json_decode(Auth::user()->integration);
    @endphp
    <!--Market-Place -->

    <div class="drop__box">
        <div class="drop__box-img">
            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_468_524)">
                    <path
                        d="M16.5 33C7.40205 33 0 25.5979 0 16.5C0 7.40205 7.40205 0 16.5 0C25.5979 0 33 7.40205 33 16.5C33 25.5979 25.5979 33 16.5 33Z"
                        fill="#00D2FF" />
                    <path
                        d="M24.2 27.4997C15.1021 27.4997 7.70002 20.0976 7.70002 10.9997C7.70002 7.19134 9.00958 3.69006 11.1851 0.894531C4.69012 3.11346 0 9.26287 0 16.4997C0 25.5976 7.40205 32.9997 16.5 32.9997C21.7896 32.9997 26.4934 30.4877 29.515 26.6048C27.8445 27.1756 26.0611 27.4997 24.2 27.4997Z"
                        fill="#18BDF6" />
                    <path
                        d="M23.0141 16.0916L21.8418 11.7519C21.8058 11.6193 21.7502 11.4941 21.6834 11.3762C21.7826 11.2342 21.8418 11.0622 21.8418 10.8758C21.8418 10.392 21.4494 10 20.9659 10H10.9329C10.4492 10 10.0573 10.3922 10.0573 10.8758C10.0573 11.1179 10.1552 11.3369 10.3142 11.4956C10.2489 11.6112 10.195 11.7343 10.1598 11.8642L8.98755 16.2039C8.82887 16.7915 9.05939 17.2874 9.51103 17.4055V26H22.5641V17.2646C22.9645 17.1128 23.1633 16.645 23.0141 16.0916ZM19.2539 12.4791L20.2444 16.1457C20.2597 16.2028 20.2824 16.2575 20.3042 16.3124C19.8618 17.0366 19.219 17.3512 18.5187 17.177C17.9039 17.0244 17.4749 16.5526 17.4656 16.218V12.648C17.4656 12.5903 17.4569 12.5346 17.4484 12.4791H19.2539V12.4791ZM11.7573 16.2582L12.7781 12.4791H14.4969C14.4882 12.5346 14.4797 12.5902 14.4797 12.648V16.2851L14.4775 16.284C14.0688 17.057 13.4371 17.402 12.7452 17.2301C12.1717 17.0879 11.7719 16.645 11.7719 16.3369H11.7287C11.7379 16.3104 11.75 16.2852 11.7573 16.2582ZM18.874 25.1079H11.8318V22.2911H13.0956C13.2167 22.0178 13.4894 21.8266 13.8078 21.8266C14.1258 21.8266 14.3988 22.0178 14.5197 22.2911H17.0917C17.1279 21.8943 17.4579 21.5825 17.8642 21.5825C18.2702 21.5825 18.6004 21.8943 18.6363 22.2911H18.8742V25.1079H18.874ZM13.2818 21.2771C13.2818 20.9739 13.5279 20.7279 13.8312 20.7279C14.1345 20.7279 14.3804 20.974 14.3804 21.2771C14.3804 21.5806 14.1345 21.8266 13.8312 21.8266C13.5279 21.8266 13.2818 21.5806 13.2818 21.2771ZM17.3382 21.0329C17.3382 20.7298 17.5841 20.4837 17.8874 20.4837C18.1907 20.4837 18.4366 20.7299 18.4366 21.0329C18.4366 21.3364 18.1907 21.5825 17.8874 21.5825C17.5841 21.5825 17.3382 21.3364 17.3382 21.0329ZM21.8881 25.324H21.0243V19.6247H11.109V25.324H10.1871V17.4424L10.3855 17.4462C10.8552 17.4557 11.345 17.1028 11.6103 16.6124C11.7619 16.979 12.1865 17.3239 12.6913 17.4492C12.7899 17.4736 12.9275 17.4975 13.089 17.4975C13.4868 17.4975 14.0283 17.3512 14.4813 16.7098C14.4899 17.321 14.9894 17.5963 15.6065 17.5963H16.3388C16.871 17.5963 17.314 17.2263 17.4322 16.7303C17.6502 17.0301 18.0309 17.2884 18.4647 17.3958C18.5702 17.4221 18.718 17.4477 18.8907 17.4477C19.3277 17.4477 19.926 17.2822 20.419 16.5504C20.6896 17.0143 21.1624 17.3425 21.616 17.3337L21.8881 17.3284V25.324Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_468_524">
                        <rect width="33" height="33" fill="white" />
                    </clipPath>
                </defs>
            </svg>
        </div>
        <h4 class="ms-2">Market Place</h4>
    </div>

    <section class="marketPlace" id="marletPlace">
        <div class="bg-white container py-4 rounded shadowBox taxPageOne">
            <div class="d-flex align-items-center mb-5">
                <div class="iconBG me-3">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_468_524)">
                            <path
                                d="M16.5 33C7.40205 33 0 25.5979 0 16.5C0 7.40205 7.40205 0 16.5 0C25.5979 0 33 7.40205 33 16.5C33 25.5979 25.5979 33 16.5 33Z"
                                fill="#00D2FF" />
                            <path
                                d="M24.2 27.4997C15.1021 27.4997 7.70002 20.0976 7.70002 10.9997C7.70002 7.19134 9.00958 3.69006 11.1851 0.894531C4.69012 3.11346 0 9.26287 0 16.4997C0 25.5976 7.40205 32.9997 16.5 32.9997C21.7896 32.9997 26.4934 30.4877 29.515 26.6048C27.8445 27.1756 26.0611 27.4997 24.2 27.4997Z"
                                fill="#18BDF6" />
                            <path
                                d="M23.0141 16.0916L21.8418 11.7519C21.8058 11.6193 21.7502 11.4941 21.6834 11.3762C21.7826 11.2342 21.8418 11.0622 21.8418 10.8758C21.8418 10.392 21.4494 10 20.9659 10H10.9329C10.4492 10 10.0573 10.3922 10.0573 10.8758C10.0573 11.1179 10.1552 11.3369 10.3142 11.4956C10.2489 11.6112 10.195 11.7343 10.1598 11.8642L8.98755 16.2039C8.82887 16.7915 9.05939 17.2874 9.51103 17.4055V26H22.5641V17.2646C22.9645 17.1128 23.1633 16.645 23.0141 16.0916ZM19.2539 12.4791L20.2444 16.1457C20.2597 16.2028 20.2824 16.2575 20.3042 16.3124C19.8618 17.0366 19.219 17.3512 18.5187 17.177C17.9039 17.0244 17.4749 16.5526 17.4656 16.218V12.648C17.4656 12.5903 17.4569 12.5346 17.4484 12.4791H19.2539V12.4791ZM11.7573 16.2582L12.7781 12.4791H14.4969C14.4882 12.5346 14.4797 12.5902 14.4797 12.648V16.2851L14.4775 16.284C14.0688 17.057 13.4371 17.402 12.7452 17.2301C12.1717 17.0879 11.7719 16.645 11.7719 16.3369H11.7287C11.7379 16.3104 11.75 16.2852 11.7573 16.2582ZM18.874 25.1079H11.8318V22.2911H13.0956C13.2167 22.0178 13.4894 21.8266 13.8078 21.8266C14.1258 21.8266 14.3988 22.0178 14.5197 22.2911H17.0917C17.1279 21.8943 17.4579 21.5825 17.8642 21.5825C18.2702 21.5825 18.6004 21.8943 18.6363 22.2911H18.8742V25.1079H18.874ZM13.2818 21.2771C13.2818 20.9739 13.5279 20.7279 13.8312 20.7279C14.1345 20.7279 14.3804 20.974 14.3804 21.2771C14.3804 21.5806 14.1345 21.8266 13.8312 21.8266C13.5279 21.8266 13.2818 21.5806 13.2818 21.2771ZM17.3382 21.0329C17.3382 20.7298 17.5841 20.4837 17.8874 20.4837C18.1907 20.4837 18.4366 20.7299 18.4366 21.0329C18.4366 21.3364 18.1907 21.5825 17.8874 21.5825C17.5841 21.5825 17.3382 21.3364 17.3382 21.0329ZM21.8881 25.324H21.0243V19.6247H11.109V25.324H10.1871V17.4424L10.3855 17.4462C10.8552 17.4557 11.345 17.1028 11.6103 16.6124C11.7619 16.979 12.1865 17.3239 12.6913 17.4492C12.7899 17.4736 12.9275 17.4975 13.089 17.4975C13.4868 17.4975 14.0283 17.3512 14.4813 16.7098C14.4899 17.321 14.9894 17.5963 15.6065 17.5963H16.3388C16.871 17.5963 17.314 17.2263 17.4322 16.7303C17.6502 17.0301 18.0309 17.2884 18.4647 17.3958C18.5702 17.4221 18.718 17.4477 18.8907 17.4477C19.3277 17.4477 19.926 17.2822 20.419 16.5504C20.6896 17.0143 21.1624 17.3425 21.616 17.3337L21.8881 17.3284V25.324Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_468_524">
                                <rect width="33" height="33" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <span class="taxText">Marketplace Integration</span>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-5">

                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a data-toggle="modal" class="modal__link" data-target="#exampleModal"
                            onclick="changeMarketName('etsy')">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/etsy.png" alt="">
                                    </div>
                                </label>
                            </div>
                            @if ($integration && $integration->market_name == 'etsy')
                                <div class="success__box">
                                    <i class="fa-solid fa-check market__success"></i>
                                </div>
                            @endif
                        </a>

                        <span class="taxText1 my-3">ETSY</span>

                    </div>


                </div>
                <div class="col-lg-3 col-sm-6 mb-5">

                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a class="modal__link" data-toggle="modal" data-target="#exampleModal"
                            onclick="changeMarketName('amazon')">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/amazon.png" alt="">
                                    </div>
                                </label>
                            </div>
                            @if ($integration && $integration->market_name == 'amazon')
                                <div class="success__box">
                                    <i class="fa-solid fa-check market__success"></i>
                                </div>
                            @endif
                        </a>


                        <span class="taxText1 my-3">AMAZON</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">

                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a class="modal__link" data-toggle="modal" data-target="#exampleModal"
                            onclick="changeMarketName('aliexpress')">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/aliexpress.png"
                                            alt="">
                                    </div>
                                </label>
                            </div>
                            @if ($integration && $integration->market_name == 'aliexpress')
                                <div class="success__box">
                                    <i class="fa-solid fa-check market__success"></i>
                                </div>
                            @endif
                        </a>


                        <span class="taxText1 my-3">ALIEXPRESS</span>
                    </div>



                </div>
                <div class="col-lg-3 col-sm-6 mb-5">


                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a class="modal__link" data-toggle="modal" data-target="#exampleModal"
                            onclick="changeMarketName('ebay')">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/ebay.png" alt="">
                                    </div>
                                </label>
                            </div>
                            @if ($integration && $integration->market_name == 'ebay')
                                <div class="success__box">
                                    <i class="fa-solid fa-check market__success"></i>
                                </div>
                            @endif
                        </a>
                        <span class="taxText1 my-3">EBAY</span>

                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ms-4" id="exampleModalLabel">Marke Place</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('userpanel.updateMarket') }}" method="POST">
                                @csrf
                                <input type="text" name="market_name" hidden>
                                <div class="row rounded border shadowBox mb-5 mx-4 mt-5  px-3 py-5">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label amazonLabel1">API
                                                KEY<span class="red">*</span></label>
                                            <input type="text" class="form-control" name="api_key" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label amazonLabel1">Private
                                                KEY<span class="red">*</span></label>
                                            <input type="text" class="form-control" name="private_key" />
                                        </div>
                                    </div>

                                    <div class="text-end mb-3">
                                        <button class="taxBtn cargoCompanyBtn mt-3" type="submit">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Market place burda bitir-->

    <script>
        function taxCreate() {
            document.querySelector(".taxPageOne").style.display = "none";
            document.querySelector(".taxPageTwo").style.display = "block";
            document.querySelector(".drop__box-etax--header").textContent = "Invocies";
        }

        function changeMarketName(market_name) {
            document.querySelector('input[name="market_name"]').value = market_name;
        }
    </script>

    {{-- @php
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.etsy.com/v3/application/shops/12345678/receipts/090898651/tracking',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'tracking_code=KB6NANRE9noji32oOU34h&carrier_name=fedex',

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'x-api-key: 6z5oa5z70x13jsxkmo41l8ur',
                'Authorization: Bearer 12345678.jKBPLnOiYt7vpWlsny_lDKqINn4Ny_jwH89hA4IZgggyzqmV_bmQHGJ3HOHH2DmZxOJn5V1qQFnVP9bCn9jnrggCRz'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        print_r($response);
    @endphp --}}
@endsection
