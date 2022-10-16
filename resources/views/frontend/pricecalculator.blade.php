@extends('frontend.layout.app')

@section('title', 'Price Calculator')

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

    <!-- Price Calculator TItle start-->
    <section id="PriceTitle">
        <div class="container">
            <div class="row mt-6" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="priceTitle">
                        <div class="Title-Text">
                            <h1>{{ __('homepage.price calc.text 1') }}</h1>
                            <h5>{{ __('homepage.price calc.text 2') }}</h5>
                        </div>
                        <img src="{{ asset('/') }}frontend/img/priceCalculator.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Price Calculator TItle end -->


    <!-- Product Weights start -->
    <section id="ProductWeight">
        <div class="container">
            <div class="row my-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="title">
                        <h2>{{ __('homepage.price calc.text 3') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/t-shirt.svg" alt="">
                        <div class="card-contetn">
                            <span>T-shirt{{ __('homepage.price calc.text 4') }}</span>
                            <span>0.5 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/sweater.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 5') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/pans.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 6') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/jacket.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 7') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/shoes.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 8') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/bag.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 9') }}</span>
                            <span>0.5 - 1.5 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/sunglasses.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 10') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/acssesoaries.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 11') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/book.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 12') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/stationery.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 13') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/headphone.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 14') }}</span>
                            <span>0.5 - 1.5Kg</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="products-card">
                        <img src="{{ asset('/') }}frontend/img/make-up.svg" alt="">
                        <div class="card-contetn">
                            <span>{{ __('homepage.price calc.text 15') }}</span>
                            <span>0.5 - 1 Kg</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Weights end -->


    <!-- Calculator start -->
    <section id="Calculator">
        <div class="container">
            <div class="row my-5 ">
                <div class="title">
                    <div class="imgTitle">
                        <img src="{{ asset('/') }}frontend/img/priceCalculatro.svg" alt="">
                    </div>
                    <h3>{{ __('homepage.price calc.text 16') }}</h3>
                </div>
            </div>
            <form action="{{ route('pricecalculator.calculation') }}" method="post" id="price_calc">
                @csrf
                <div class="row calculateForm">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="country">
                                <label for="selectCountry">{{ __('homepage.price calc.text 17') }}: <div class="red-star">*</div></label>
                                <select name="selectCountry" id="selectCountry">
                                    <option value="">{{ __('homepage.price calc.text 18') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->name }}"
                                            {{ old('selectCountry') == $country->code ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text selectCountry_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <div class="country">
                                <label for="inputCount">{{ __('homepage.price calc.text 19') }}: <div class="red-star">*</div></label>
                                <input type="text" name="inputCount" id="inputCount" value="{{ old('inputCount') }}"
                                    onchange="Calculate('total' , this)">
                                <span class="text-danger error-text inputCount_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <div class="country">
                                <label for="selectType">{{ __('homepage.price calc.text 20') }}: <div class="red-star">*</div></label>
                                <select name="selectType" id="selectType">
                                    <option value="box" {{ old('selectType') == 'box' ? 'selected' : '' }}>{{ __('homepage.price calc.text 21') }}</option>
                                    <option value="envelope" {{ old('selectType') == 'envelope' ? 'selected' : '' }}>
                                        {{ __('homepage.price calc.text 22') }}</option>
                                </select>
                                <span class="text-danger error-text selectType_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <div class="country">
                                <label for="inputLength">{{ __('homepage.price calc.text 23') }}: <div class="red-star">*</div></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="15"
                                        onchange="Calculate('volume' , this)" id="inputLength" name="inputLength"
                                        value="{{ old('inputLength') }}">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                    <span class="text-danger error-text inputLength_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <div class="country">
                                <label for="inputWidth">{{ __('homepage.price calc.text 24') }}: <div class="red-star">*</div></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="inputWidth" id="inputWidth"
                                        onchange="Calculate('volume' , this)" value="{{ old('inputWidth') }}">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                    <span class="text-danger error-text inputWidth_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 col-sm-12" id="heightArea">
                            <div class="country">
                                <label for="inputHeight">{{ __('homepage.price calc.text 25') }}: <div class="red-star">*</div></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="inputHeight" id="inputHeight"
                                        placeholder="15" onchange="Calculate('volume' , this)"
                                        value="{{ old('inputHeight') }}">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                    <span class="text-danger error-text inputHeight_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 col-sm-12">
                            <div class="country">
                                <label for="inputWeight">{{ __('homepage.price calc.text 26') }}: <div class="red-star">*</div></label>
                                <div class="input-group mb-3">
                                    <input type="text" name="inputWeight" id="inputWeight" class="form-control"
                                        placeholder="2" onchange="Calculate('desi' , this)"
                                        value="{{ old('inputWeight') }}">
                                    <span class="input-group-text" id="basic-addon2">kq</span>
                                    <span class="text-danger error-text inputWeight_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-2 col-md-6 col-sm-6  ">
                            <div class="forms-img">
                                <div class="imgTitle">
                                    <img src="{{ asset('/') }}frontend/img/priceCalculatro.svg" alt="">
                                </div>
                                <div class="img-title-content">
                                    <span>{{ __('homepage.price calc.text 27') }}:</span>
                                    <span class="total_volume_div">0 m <sup>3</sup></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 ">
                            <div class="forms-img">
                                <div class="imgTitle">
                                    <img src="{{ asset('/') }}frontend/img/priceCalculatro.svg" alt="">
                                </div>
                                <div class="img-title-content">
                                    <span>{{ __('homepage.price calc.text 28') }}:</span>
                                    <span class="total_desi_div">0 KGS</span>
                                    <input type="text" name="total_desi" id="total_desi_input" hidden />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="price-total">
                                <div class="price-btn">
                                    <button type="submit">{{ __('homepage.price calc.text 29') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        </div>
    </section>
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

    <!-- Calculator end -->
@endsection

@section('js')
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
                                price = parseFloat(prices[companies.indexOf(element)])
                                    .toFixed(2) + " €"
                                document.querySelector('#cargo_company_' + element)
                                    .innerHTML = price;
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
            document.querySelector('.total_desi_div').innerHTML = desi + " KGS";
            document.querySelector('#total_desi_input').value = desi;

        }
    </script>
@endsection
