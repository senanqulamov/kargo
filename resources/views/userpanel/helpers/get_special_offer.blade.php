@extends('userpanel.layout.layout')

@section('content')
    <style>
        select {
            color: rgba(0, 0, 0, 0.767) !important;
        }

        /* Get A Quote Start */

        .getQuoteForm {
            width: 100%;
            margin: auto;
            box-shadow: 0px 4px 15px 0px #00000026;
            padding: 10px;
            background: #fff;
        }

        .getQuoteForm .form-title {
            color: #405982;
            margin-top: 20px;
        }

        .getQuoteForm .form__group {
            display: flex;
            align-self: center;
            margin: 20px 0;
        }

        .getQuoteForm .form__radio-input {
            display: none;
        }

        .getQuoteForm .form__label-radio {
            font-size: 1rem;
            color: #405982;
            cursor: pointer;
            position: relative;
            padding-left: 2rem;
            margin: 0 20px;
        }

        .getQuoteForm .form__radio-button {
            height: 1.5rem;
            width: 1.5rem;
            border: 2px solid #21E7C3;
            border-radius: 50%;
            display: inline-block;
            position: absolute;
            left: 0;
            top: 0rem;
        }

        .getQuoteForm .form__radio-button::after {
            content: "";
            display: block;
            height: 17px;
            width: 17px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #21E7C3;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .getQuoteForm .form__radio-input:checked~.form__label-radio .form__radio-button::after {
            opacity: 1;
        }

        .getQuoteForm .select-box select {
            width: 100%;
            padding: 10px;
            border: 1px solid #0004;
            border-radius: 5px;
            color: #000;
            opacity: .5;
        }

        .getQuoteForm .select-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #0004;
            border-radius: 5px;
            color: #000;
            opacity: .5;
        }

        .getQuoteForm label {
            margin: 5px 0;
            color: #405982;
        }

        .getQuoteForm .minus,
        .plus {
            width: 8%;
            height: 45px;
            background: transparent;
            border-radius: 4px;
            padding: 5px 5px 8px 5px;
            border: 1px solid #ddd;
            display: inline-block;
            color: #405982;
            font-weight: 600;
            font-size: 20px;
            vertical-align: middle;
            text-align: center;
            cursor: pointer;
        }

        .getQuoteForm .pm input {
            height: 45px;
            width: 82%;
            text-align: center;
            font-size: 26px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: inline-block;
            vertical-align: middle;
        }

        .getQuoteForm .addToButton {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-top: 30px;
        }

        .getQuoteForm .addToButton button {
            width: 100px;
            height: 45px;
            border: none;
            background-color: #FF912C;
            color: #fff;
            font-size: 20px;
            border-radius: 7px;
            box-shadow: 0px 4px 15px 0px #0000001A;
        }

        .getQuoteForm .input-group-text {
            display: flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #405982;
            text-align: center;
            white-space: nowrap;
            background-color: transparent !important;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .getQuoteForm .fileInput p {
            color: #000;
            opacity: .4;
        }

        .getQuoteForm #custom-button {
            padding: 10px 20px;
            color: white;
            background-color: #68D7FA;
            box-shadow: 0px 4px 10px 0px #00000026;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .getQuoteForm #custom-button:hover {
            background-color: #00A3FE;
        }

        .getQuoteForm #custom-text {
            margin-left: 10px;
            font-family: sans-serif;
            color: #aaa;
        }

        .select-box {
            font-size: 15px;
        }

        /* Get A Quote End */

        @media only screen and (max-width:992px) {
            .getQuoteForm .pm input {
                height: 45px;
                width: 70% !important;
                text-align: center;
                font-size: 26px;
                border: 1px solid #ddd;
                border-radius: 4px;
                display: inline-block;
                vertical-align: middle;
            }

            .getQuoteForm .form__group {
                display: flex;
                align-self: center;
                flex-direction: column !important;
                margin: 20px 0;
            }

            .getQuoteForm .form__group .form__radio-group {
                margin: 10px 0;
            }
        }
    </style>


    <section id="GetQuote">
        <div class="container">
            <form action="{{ route('userpanel.post_special_offer') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row my-5 getQuoteForm">
                    <!-- Shipment Mode -->
                    <div class="variable-shipmentMode mb-4">
                        <h5 class="getSpecialText">Shipment Mode</h5>
                        <div class="variable-radio-input d-flex align-items-center flex-wrap">
                            <label class="d-flex align-items-center mb-2" for="sea_radio"
                                onclick="menuChange('normal_type')">
                                <input name="shipment_type" id="sea_radio" type="radio" value="sea"
                                    class="form-check-input radioSize me-2" checked="checked" />
                                <img src="{{ asset('/') }}images/special_offer/sea.svg" alt="" class="me-2" />
                                <p class="getSpecialLabel me-4">Sea</p>
                            </label>
                            <label class="d-flex align-items-center mb-2" for="rail_radio"
                                onclick="menuChange('normal_type')">
                                <input id="rail_radio" name="shipment_type" type="radio" value="rail"
                                    class="form-check-input radioSize me-2" />
                                <img src="{{ asset('/') }}images/special_offer/rail.svg" alt="" class="me-2" />
                                <p class="getSpecialLabel me-4">Rail</p>
                            </label>
                            <label class="d-flex align-items-center mb-2" for="air_radio" onclick="menuChange('air_type')">
                                <input id="air_radio" name="shipment_type" type="radio" value="air"
                                    class="form-check-input radioSize me-2" />
                                <img src="{{ asset('/') }}images/special_offer/air.svg" alt="" class="me-2" />
                                <p class="getSpecialLabel me-4">Air</p>
                            </label>
                            <label class="d-flex align-items-center mb-2" for="truck_radio"
                                onclick="menuChange('normal_type')">
                                <input id="truck_radio" name="shipment_type" type="radio" value="truck"
                                    class="form-check-input radioSize me-2" />
                                <img src="{{ asset('/') }}images/special_offer/truck.svg" alt=""
                                    class="me-2" />
                                <p class="getSpecialLabel me-4">Truck</p>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-title">
                            <h5>Origin</h5>
                        </div>
                        <div class="select-box">
                            <select class="selectpicker show-tick form-control" name="origin"
                                title="Choose one of the following..." data-size="6">
                                <option disabled>Country</option>
                                @foreach ($countries as $country)
                                    <option>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-title">
                            <h5>Destination</h5>
                        </div>
                        <div class="select-box">
                            <select class="selectpicker show-tick form-control" name="destination"
                                title="Choose one of the following..." data-size="6">
                                <option disabled>City, Country</option>
                                @foreach ($countries as $country)
                                    <option>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-title">
                            <h5>Shipping type</h5>
                        </div>
                        <div class="shipmentMode">
                            <div class="form__group">
                                <div class="form__radio-group normal_type">
                                    <input type="radio" name="shipping_type" id="fcl" class="form__radio-input"
                                        value="fcl">
                                    <label class="form__label-radio" for="fcl">
                                        <span class="form__radio-button"></span>
                                        <svg width="17" height="9" viewBox="0 0 17 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.5043 0H0.495687C0.233297 0 0 0.242453 0 0.515128V8.48487C0 8.75755 0.233303 9 0.495687 9H16.5043C16.7667 9 17 8.75755 17 8.48487V0.515128C17 0.21222 16.7958 0 16.5043 0ZM2.56602 7.15156C2.56602 7.39401 2.39109 7.57579 2.1578 7.57579C1.92449 7.57579 1.74957 7.39401 1.74957 7.15156V1.8485C1.74957 1.60604 1.9245 1.42426 2.1578 1.42426C2.3911 1.42426 2.56602 1.60605 2.56602 1.8485V7.15156ZM5.10285 7.15156C5.10285 7.39401 4.92793 7.57579 4.69463 7.57579C4.46133 7.57579 4.2864 7.39401 4.2864 7.15156V1.8485C4.2864 1.60604 4.46133 1.42426 4.69463 1.42426C4.92793 1.42426 5.10285 1.60605 5.10285 1.8485V7.15156ZM7.63969 7.15156C7.63969 7.39401 7.46476 7.57579 7.23146 7.57579C6.99816 7.57579 6.82324 7.39401 6.82324 7.15156V1.8485C6.82324 1.60604 6.99817 1.42426 7.23146 1.42426C7.46477 1.42426 7.63969 1.60605 7.63969 1.8485V7.15156ZM10.1767 7.15156C10.1767 7.39401 10.0018 7.57579 9.76851 7.57579C9.5352 7.57579 9.36028 7.39401 9.36028 7.15156V1.8485C9.36028 1.60604 9.53521 1.42426 9.76851 1.42426C10.0018 1.42426 10.1767 1.60605 10.1767 1.8485V7.15156ZM12.7136 7.15156C12.7136 7.39401 12.5386 7.57579 12.3053 7.57579C12.072 7.57579 11.8971 7.39401 11.8971 7.15156V1.8485C11.8971 1.60604 12.072 1.42426 12.3053 1.42426C12.5386 1.42426 12.7136 1.60605 12.7136 1.8485V7.15156ZM15.2504 7.15156C15.2504 7.39401 15.0755 7.57579 14.8422 7.57579C14.6089 7.57579 14.4339 7.39401 14.4339 7.15156V1.8485C14.4339 1.60604 14.6089 1.42426 14.8422 1.42426C15.0755 1.42426 15.2504 1.60605 15.2504 1.8485V7.15156Z"
                                                fill="#405982" />
                                        </svg>
                                        FCL
                                    </label>
                                </div>
                                <div class="form__radio-group normal_type">
                                    <input type="radio" name="shipping_type" id="lcl" class="form__radio-input"
                                        value="lcl">
                                    <label class="form__label-radio" for="lcl">
                                        <span class="form__radio-button"></span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.428 12.8566H12.8566V10.2852H10.2852V17.9994H17.9994V10.2852H15.428V12.8566Z"
                                                fill="#405982" />
                                            <path d="M5.14258 0V7.71429H12.8569V0H10.2854V2.57143H7.71401V0H5.14258Z"
                                                fill="#405982" />
                                            <path
                                                d="M5.14286 12.8576H2.57143V10.2861H0V18.0004H7.71429V10.2861H5.14286V12.8576Z"
                                                fill="#405982" />
                                        </svg>
                                        LCL
                                    </label>
                                </div>
                                <div class="form__radio-group air_type">
                                    <input type="radio" name="shipping_type" id="air_cargo" class="form__radio-input"
                                        value="air cargo">
                                    <label class="form__label-radio" for="air_cargo">
                                        <span class="form__radio-button"></span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.428 12.8566H12.8566V10.2852H10.2852V17.9994H17.9994V10.2852H15.428V12.8566Z"
                                                fill="#405982" />
                                            <path d="M5.14258 0V7.71429H12.8569V0H10.2854V2.57143H7.71401V0H5.14258Z"
                                                fill="#405982" />
                                            <path
                                                d="M5.14286 12.8576H2.57143V10.2861H0V18.0004H7.71429V10.2861H5.14286V12.8576Z"
                                                fill="#405982" />
                                        </svg>
                                        Air Cargo
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 normal_type">
                        <div class="form-title">
                            <h5>Container</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="select-box">
                                    <label for="containeer_type">Type</label>
                                    <select class="selectpicker show-tick form-control" name="containeer_type"
                                        title="Choose one of the following..." data-size="6">
                                        <option disabled>Containeer Type</option>
                                        <option>20'DV</option>
                                        <option>40'DV</option>
                                        <option>40'HC</option>
                                        <option>45'</option>
                                        <option>45'HC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="cargo_weight_containeer">Cargo weight (per containeer)</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control pad-block-10px" placeholder="0"
                                        name="cargo_weight_containeer">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 air_type">
                        <div class="form-title">
                            <h5>Box/Pallet</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Length</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control pad-block-10px" placeholder="Pick type"
                                        name="length">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Width</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control pad-block-10px" placeholder="0"
                                        name="width">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 air_type">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Height</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control pad-block-10px" placeholder="Pick type"
                                        name="height">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Weight</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control pad-block-10px" placeholder="0"
                                        name="weight">
                                    <span class="input-group-text" id="basic-addon2">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row pm ">
                            <div class="col-lg-6">
                                <label for="">Quantity</label>
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="text" value="1" name="quantity" />
                                    <span class="plus">+</span>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                            <div class="addToButton">
                                <button>+ Add</button>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-12 air_type">
                        <div class="row my-3">
                            <div class="col-lg-6">
                                <label for="">Total Volume</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control pad-block-10px" placeholder="Pick type"
                                        name="total_volume">
                                    <span class="input-group-text" id="basic-addon2">m²</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Total Weight</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control pad-block-10px" placeholder="0"
                                        name="total_weight">
                                    <span class="input-group-text" id="basic-addon2">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="cargo">Cargo</label>
                                <div class="select-box">
                                    <input type="text"
                                        placeholder="Description + (HS/HTS Code of the product if available)"
                                        name="cargo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="date">Goods ready date</label>
                                <div class="select-box">
                                    <input type="date" placeholder="Goods ready date" name="date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 normal_type">
                        <div class="select-box">
                            <label for="incoterm">Incoterms</label>
                            <select class="selectpicker show-tick form-control" name="incoterm"
                                title="Choose one of the following..." data-size="6">
                                <option disabled>Incoterm</option>
                                <option>FOB</option>
                                <option>EXW</option>
                                <option>CIF</option>
                                <option>FCA</option>
                                <option>CFR</option>
                                <option>DDP</option>
                                <option>DAP</option>
                                <option>DDU</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-title">
                            <h5>
                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.9983 3.25868C14.0123 3.14376 13.9395 3.03598 13.8277 3.00624C11.6026 2.02621 9.37797 1.03705 7.15418 0.0387222C7.05235 -0.0129074 6.93196 -0.0129074 6.83011 0.0387222C4.61193 1.03017 2.3932 2.01766 0.173672 3.00112C0.0557792 3.04181 -0.0160752 3.16101 0.00307765 3.28426V5.74526V7.71338V7.71326C-0.00620154 9.94287 0.745894 12.1091 2.13489 13.8529C3.27468 15.3591 4.86401 16.4635 6.67323 17.0061C6.88522 17.0736 7.11281 17.0736 7.3248 17.0061C9.28781 16.4161 10.8347 15.2479 12.0456 13.6175V13.6176C12.9941 12.3477 13.6197 10.8663 13.8687 9.30097C13.9456 8.80953 13.9855 8.313 13.9881 7.81561C14.0051 6.29599 13.9881 4.77647 13.9983 3.25871L13.9983 3.25868ZM13.1352 7.90269C13.1306 8.34096 13.093 8.77813 13.0225 9.21068C12.8047 10.5802 12.2582 11.8764 11.4297 12.9883C10.4143 14.4101 8.95637 15.4556 7.28366 15.9608C7.19348 15.9886 7.09998 16.0035 7.00564 16.0051V1.05167C7.04989 1.05346 7.09331 1.06393 7.13352 1.08236C9.08797 1.9533 11.0408 2.82138 12.9918 3.68659C13.0869 3.71502 13.1476 3.80805 13.1351 3.90656V7.90249L13.1352 7.90269Z"
                                        fill="#405982" />
                                </svg>
                                Do you need cargo insurance ?
                            </h5>
                        </div>
                        <div class="shipmentMode">
                            <div class="form__group">
                                <div class="form__radio-group">
                                    <input type="radio" name="insurance" id="insurance_yes" class="form__radio-input"
                                        value="yes">
                                    <label class="form__label-radio" for="insurance_yes">
                                        <span class="form__radio-button"></span>
                                        Yes
                                    </label>
                                </div>
                                <div class="form__radio-group">
                                    <input type="radio" name="insurance" id="insurance_no" class="form__radio-input"
                                        value="no">
                                    <label class="form__label-radio" for="insurance_no">
                                        <span class="form__radio-button"></span>
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="address">Delivery address</label>
                                <div class="select-box">
                                    <input type="text" placeholder="Additional details or requests" name="address">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="additional">Additional information</label>
                                <div class="select-box">
                                    <input type="text" placeholder="Additional details or requests" name="additional">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-title">
                            <h5>MSDS / Other Document / Photo</h5>
                        </div>
                        <div class="row fileInput">
                            <div class="col-lg-6">
                                <p>(PDF, Maks. 5.0. MB)</p>
                                <input type="file" id="real-file" name="document" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-success" style="width: max-content;">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        //   Plus Minus Input start
        $(document).ready(function() {
            $('.minus').click(function() {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function() {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
        //   Plus Minus Input end

        setTimeout(() => {
            var select_buttons = document.querySelectorAll('.dropdown-toggle');
            console.log(select_buttons);
            select_buttons.forEach(element => {
                element.setAttribute('id', 'custom_select_button');
            });
        }, 1000);
    </script>
    <script>
        var air_type = document.querySelectorAll('.air_type');
        var normal_type = document.querySelectorAll('.normal_type');

        air_type.forEach(element => {
            element.style.display = "none";
        });

        function menuChange(type) {
            if (type == 'air_type') {
                air_type.forEach(element => {
                    element.style.display = "block";
                });
                normal_type.forEach(element => {
                    element.style.display = "none";
                });
            } else {
                air_type.forEach(element => {
                    element.style.display = "none";
                });
                normal_type.forEach(element => {
                    element.style.display = "block";
                });
            }
        }
    </script>
@endsection
