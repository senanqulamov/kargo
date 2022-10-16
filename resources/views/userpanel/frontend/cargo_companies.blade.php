@extends('userpanel.layout.layout')

@section('content')
    <!--Market-Place -->

    <section class="marketPlace" id="marletPlace">
        <div class="bg-white container py-4 rounded shadowBox taxPageOne">
            <div class="d-flex align-items-center mb-5">
                <div class="iconBG me-3">
                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_467_98)">
                            <path
                                d="M18.5 37C8.29927 37 0 28.7007 0 18.5C0 8.29927 8.29927 0 18.5 0C28.7007 0 37 8.29927 37 18.5C37 28.7007 28.7007 37 18.5 37Z"
                                fill="#00D2FF" />
                            <path
                                d="M27.1334 30.833C16.9326 30.833 8.63336 22.5337 8.63336 12.333C8.63336 8.06299 10.1017 4.13731 12.5408 1.00293C5.25863 3.49082 0 10.3856 0 18.4996C0 28.7003 8.29927 36.9996 18.5 36.9996C24.4308 36.9996 29.7047 34.1831 33.0925 29.8296C31.2196 30.4695 29.22 30.833 27.1334 30.833Z"
                                fill="#18BDF6" />
                            <path
                                d="M25.0231 21.9932C24.2263 21.9932 23.5781 22.6416 23.5781 23.4382C23.5781 24.235 24.2263 24.8832 25.0231 24.8832C25.8197 24.8832 26.4681 24.235 26.4681 23.4382C26.4681 22.6416 25.8197 21.9932 25.0231 21.9932ZM25.0231 23.8632C24.7887 23.8632 24.5981 23.6726 24.5981 23.4382C24.5981 23.2038 24.7887 23.0132 25.0231 23.0132C25.2575 23.0132 25.4481 23.2038 25.4481 23.4382C25.4481 23.6726 25.2575 23.8632 25.0231 23.8632Z"
                                fill="white" />
                            <path
                                d="M24.8835 15.9873H22.3869C22.199 15.9873 22.0469 16.1396 22.0469 16.3273V22.9573C22.0469 23.145 22.199 23.2973 22.3869 23.2973H22.7475C22.9158 23.2973 23.0648 23.1761 23.0866 23.0092C23.22 21.9868 24.0355 21.3527 25.022 21.3527C26.0085 21.3527 26.824 21.9868 26.9575 23.0092C26.9792 23.1761 27.1282 23.2973 27.2966 23.2973H27.6568C27.8445 23.2973 27.9968 23.145 27.9968 22.9573V19.6423C27.9968 19.5624 27.9688 19.4852 27.9176 19.4242L25.1442 16.1092C25.0797 16.032 24.9841 15.9873 24.8835 15.9873ZM22.7269 18.7073V17.0073C22.7269 16.8196 22.879 16.6673 23.0669 16.6673H24.5646C24.6654 16.6673 24.7611 16.7122 24.8257 16.7897L26.2423 18.4897C26.4267 18.7112 26.2693 19.0473 25.981 19.0473H23.0669C22.879 19.0473 22.7269 18.8952 22.7269 18.7073Z"
                                fill="white" />
                            <path
                                d="M11.34 23.2972H12.2106C12.3789 23.2972 12.528 23.176 12.5497 23.009C12.6832 21.9867 13.4987 21.3526 14.4852 21.3526C15.4717 21.3526 16.2872 21.9867 16.4206 23.009C16.4424 23.176 16.5913 23.2972 16.7597 23.2972H21.03C21.2177 23.2972 21.37 23.1449 21.37 22.9572V14.4572C21.37 14.2695 21.2177 14.1172 21.03 14.1172H11.34C11.1521 14.1172 11 14.2695 11 14.4572V22.9572C11 23.1449 11.1521 23.2972 11.34 23.2972Z"
                                fill="white" />
                            <path
                                d="M14.4841 21.9932C13.6873 21.9932 13.0391 22.6416 13.0391 23.4382C13.0391 24.235 13.6873 24.8832 14.4841 24.8832C15.2807 24.8832 15.9291 24.235 15.9291 23.4382C15.9291 22.6416 15.2807 21.9932 14.4841 21.9932ZM14.4841 23.8632C14.2496 23.8632 14.0591 23.6726 14.0591 23.4382C14.0591 23.2038 14.2496 23.0132 14.4841 23.0132C14.7185 23.0132 14.9091 23.2038 14.9091 23.4382C14.9091 23.6726 14.7185 23.8632 14.4841 23.8632Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_467_98">
                                <rect width="37" height="37" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <span class="taxText">{{ __('userpanel.Cargo Company Integration') }}</span>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-5">

                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a data-toggle="modal" class="modal__link" data-target="#exampleModal">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/fedex.png" alt="">
                                    </div>
                                </label>
                            </div>

                            <div class="success__box">
                                <i class="fa-solid fa-check market__success"></i>
                            </div>
                        </a>

                        <span class="taxText1 my-3">FedEx</span>

                    </div>


                </div>
                <div class="col-lg-3 col-sm-6 mb-5">

                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a data-toggle="modal" data-target="#exampleModal">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/ups.png" alt="">
                                    </div>
                                </label>
                            </div>
                        </a>


                        <span class="taxText1 my-3">UPS</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-5">

                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a data-toggle="modal" data-target="#exampleModal">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/tnt.png" alt="">
                                    </div>
                                </label>
                            </div>
                        </a>


                        <span class="taxText1 my-3">TNT</span>
                    </div>



                </div>
                <div class="col-lg-3 col-sm-6 mb-5">


                    <div class="d-flex flex-column align-items-center justify-content-center">

                        <a data-toggle="modal" data-target="#exampleModal">
                            <div class="cargoCompaniesCard">
                                <label class="labelTax">
                                    <input type="radio" name="product" class="card-input-element" />
                                    <div
                                        class="cargoCompaniesCardItem card-input mx-auto shadowBox rounded d-flex flex-column align-items-center justify-content-center taxBox">
                                        <img src="{{ asset('/') }}frontend/img/page_images/dhl.png" alt="">
                                    </div>
                                </label>
                            </div>
                        </a>
                        <span class="taxText1 my-3">DHL</span>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title ms-4" id="exampleModalLabel">Cargo Compaines</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="row rounded border shadowBox mb-5 mx-4 mt-5  px-3 py-5">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label amazonLabel1">API
                                                KEY<span class="red">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="374593" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label amazonLabel1">Private
                                                KEY<span class="red">*</span></label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="374593" />
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
    </script>
@endsection
