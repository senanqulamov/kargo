@extends('userpanel.layout.layout')

@section('content')
    <style>
        .cargo-companies-holder {
            display: grid;
            grid-template-columns: repeat(2, 50%);
            justify-content: space-around;
            gap: 20px 0;
            margin-top: 30px;
        }
    </style>

    <section class="page__map">
        <div class="page__calc">
            <div class="container">
                <form action="{{ route('pricecalculator.calculation') }}" method="post" id="price_calc">
                    @csrf

                    <div class="row">

                        <div class="page__not page__not--1 col-12 mb-4">
                            <div class="page__not-box me-3">
                                <img src="{{ asset('/') }}frontend/img/priceCalculatro.svg" alt="">
                            </div>

                            <h3>Price Calculation</h3>

                        </div>



                        <div class="col-md-4 mt-4 mb-3">
                            <p>Country:</p>
                            <div class="input-group mb-3">
                                <select class="form-select" name="selectCountry" id="selectCountry">
                                    <option value="" selected disabled>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->name }}"
                                            {{ old('selectCountry') == $country->code ? 'selected' : '' }}>
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="text-danger error-text selectCountry_error"></span>
                        </div>


                    </div>


                    <div class="row">


                        <div class="col-lg-2  col-md-4 col-sm-6  mt-2">
                            <!--1ci input-->
                            <p>Count:</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputCount"
                                    onchange="Calculate('desi' , this)">
                                <span class="text-danger error-text inputCount_error"></span>
                            </div>

                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6  mt-2">
                            <!--1ci input-->
                            <p>Type:</p>

                            <div class="input-group mb-3">
                                <select name="selectType" id="selectType" class="form-select">
                                    <option value="box">Box</option>
                                    <option value="envelope">Envelope</option>
                                </select>
                                <span class="text-danger error-text selectType_error"></span>
                            </div>


                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 mt-2">
                            <!--3ci input-->
                            <p>Length:</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputLength"
                                    onchange="Calculate('desi' , this)">
                                <span class="input-group-text" id="basic-addon1">cm</span>
                                <span class="text-danger error-text inputLength_error"></span>
                            </div>

                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 mt-2">
                            <!--4ci input-->
                            <p>Width:</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputWidth"
                                    onchange="Calculate('desi' , this)">
                                <span class="input-group-text" id="basic-addon1">cm</span>
                                <span class="text-danger error-text inputWidth_error"></span>
                            </div>

                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6  mt-2" id="heightArea">
                            <!--5ci input-->
                            <p>Height:</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputHeight"
                                    onchange="Calculate('desi' , this)">
                                <span class="input-group-text" id="basic-addon1">cm</span>
                                <span class="text-danger error-text inputHeight_error"></span>
                            </div>

                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6  mt-2">
                            <!--6ci input-->
                            <p>Weight:</p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputWeight"
                                    onchange="Calculate('desi' , this)">
                                <span class="input-group-text" id="basic-addon1">kq</span>
                                <span class="text-danger error-text inputWeight_error"></span>
                            </div>
                        </div>
                    </div>


                    <div class="conteiner">


                        <div class="color__box  row mt-4">
                            <div class="col-lg-2 col-6  page__calc-box">
                                <div class="page__not page__not--1 col-12 mb-4">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" class="me-3"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="17" cy="17" r="17"
                                            fill="url(#paint0_linear_0_1)" />
                                        <g clip-path="url(#clip0_0_1)">
                                            <path
                                                d="M9.13477 12.3473L9.17812 21.6648C9.17877 21.7846 9.24478 21.8944 9.35 21.9511L16.7919 25.8477C16.8405 25.8736 16.8937 25.8867 16.9468 25.8867C16.9471 25.8867 16.9473 25.8867 16.9475 25.8867C16.9699 25.9122 16.995 25.9361 17.0248 25.954C17.0762 25.9847 17.1342 26.0002 17.1924 26.0002C17.2459 26.0002 17.2991 25.9869 17.3475 25.9608L24.6953 21.9759C24.8007 21.9186 24.8667 21.8082 24.8667 21.6886V11.9944C24.8667 11.9916 24.8657 11.989 24.8657 11.9859C24.8654 11.9835 24.8663 11.9813 24.8663 11.9787C24.8659 11.9694 24.8622 11.9609 24.8615 11.9517C24.8587 11.9338 24.8567 11.916 24.8513 11.8988C24.8474 11.8868 24.8423 11.8761 24.8373 11.8646C24.8306 11.8493 24.8238 11.8343 24.8147 11.8203C24.8079 11.8095 24.7999 11.7996 24.7918 11.7896C24.7816 11.777 24.7709 11.7652 24.7587 11.7541C24.7491 11.7454 24.7389 11.7376 24.728 11.7299C24.721 11.7251 24.7151 11.7184 24.7075 11.714C24.7005 11.7097 24.6925 11.7079 24.6848 11.7042C24.6785 11.701 24.6735 11.6964 24.6672 11.6936L17.0952 8.02567C17.007 7.98842 16.907 7.99191 16.8211 8.03482L9.33628 11.9367C9.22648 11.992 9.15721 12.1044 9.15655 12.2271C9.15655 12.229 9.15743 12.2308 9.15743 12.2325C9.14414 12.2689 9.13455 12.3072 9.13477 12.3473ZM23.7851 12.0303L17.1887 15.7185L10.2033 12.2316L16.98 8.6864L23.7851 12.0303ZM17.5189 25.1249V16.2827L24.2132 12.5416V21.4929L17.5189 25.1249Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_0_1" x1="17" y1="-2.83333"
                                                x2="34" y2="42.5" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#85E2F1" />
                                                <stop offset="1" stop-color="#47C5FF" />
                                            </linearGradient>
                                            <clipPath id="clip0_0_1">
                                                <rect width="18" height="18" fill="white"
                                                    transform="translate(8 8)" />
                                            </clipPath>
                                        </defs>
                                    </svg>


                                    <div class="page__cacl-icon ">
                                        <p class="calc__box-text">Total volume:</p>
                                        <p class="total_volume_div">0 m<sup>3</sup></p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-2 col-6  page__calc-box">
                                <div class="page__not page__not--1 col-12 mb-4">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none"
                                        class="me-3" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="17" cy="17" r="17"
                                            fill="url(#paint0_linear_0_1)" />
                                        <path
                                            d="M17.4453 18.9453H14.5469V17.1172H17.4453C17.8932 17.1172 18.2578 17.0443 18.5391 16.8984C18.8203 16.7474 19.026 16.5391 19.1562 16.2734C19.2865 16.0078 19.3516 15.7083 19.3516 15.375C19.3516 15.0365 19.2865 14.7214 19.1562 14.4297C19.026 14.138 18.8203 13.9036 18.5391 13.7266C18.2578 13.5495 17.8932 13.4609 17.4453 13.4609H15.3594V23H13.0156V11.625H17.4453C18.3359 11.625 19.099 11.7865 19.7344 12.1094C20.375 12.4271 20.8646 12.8672 21.2031 13.4297C21.5417 13.9922 21.7109 14.6354 21.7109 15.3594C21.7109 16.0938 21.5417 16.7292 21.2031 17.2656C20.8646 17.8021 20.375 18.2161 19.7344 18.5078C19.099 18.7995 18.3359 18.9453 17.4453 18.9453Z"
                                            fill="white" />
                                        <defs>
                                            <linearGradient id="paint0_linear_0_1" x1="17" y1="-2.83333"
                                                x2="34" y2="42.5" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#85E2F1" />
                                                <stop offset="1" stop-color="#47C5FF" />
                                            </linearGradient>
                                        </defs>
                                    </svg>


                                    <div class="page__cacl-icon ">
                                        <p class="calc__box-text">Pricing weight:</p>
                                        <p class="total_desi_div">0 desi</p>
                                        <input type="text" name="total_desi" id="total_desi_input" hidden />
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!--2-nd container  end-->


                    <div class="page__price-buttons mt-4">

                        <button type="submit" class="price__calcutaor ms-4">Price Calculation</button>

                    </div>

                </form>
            </div>

            <section class="my-4 d-none" id="table_section">
                <div class="container">
                    <div class="cargo-companies-holder">
                        @foreach ($cargo_companies as $company)
                            <div class="cargo-company-label">
                                <div class="list-group list-group-horizontal">
                                    <div class="list-group-item w-25 text-center d-flex align-items-center">
                                        <img style="height:48px;"
                                            src="{{ asset('/') }}backend/assets/img/companies/cargo/{{ $company->logo == null ? 'user.png' : $company->logo }}" />
                                    </div>
                                    <div class="list-group-item w-50 text-left d-flex align-items-center ">
                                        {{ $company->name }}</div>
                                    <div class="list-group-item d-flex d-flex align-items-center">
                                        <span class="me-2 textShipment" id="cargo_company_{{ $company->id }}">0 €</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </section>

    <script>
        $(function() {
            $("#selectType").change(function() {
                var data = $(this).val();

                if (data == "envelope") {
                    $("#heightArea").addClass("d-none");
                } else {
                    $("#heightArea").removeClass("d-none");
                }
            });

            $("#price_calc").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            if ($("#table_section").hasClass("d-none")) {
                                $("#table_section").removeClass("d-none");
                            }
                            var companies = Object.keys(data);
                            var prices = Object.values(data);
                            companies.forEach(element => {
                                price = parseFloat(prices[companies.indexOf(element)]).toFixed(2) + " €";
                                document.querySelector('#cargo_company_' + element).innerHTML = price;
                            });
                        }
                    }
                });
            });
        })

        function Calculate(type, input) {
            var count = parseFloat(document.querySelector('input[name="inputCount"]').value);
            var height = parseFloat(document.querySelector('input[name="inputHeight"]').value);
            var width = parseFloat(document.querySelector('input[name="inputWidth"]').value);
            var length = parseFloat(document.querySelector('input[name="inputLength"]').value);
            var weight = parseFloat(document.querySelector('input[name="inputWeight"]').value);

            var volume = parseFloat((height * width * length * count) / 1000000);
            if (isNaN(volume)) {
                volume = 0;
            }
            var desi = Math.max(volume / 5000, weight) * count;
            if (isNaN(desi)) {
                desi = 0;
            }

            document.querySelector('.total_volume_div').innerHTML = volume + ` m<sup>3</sup>`;
            document.querySelector('.total_desi_div').innerHTML = desi + " desi";
            document.querySelector('#total_desi_input').value = desi;
        }
    </script>
@endsection
