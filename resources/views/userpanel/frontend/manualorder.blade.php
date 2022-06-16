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
    @if (session()->has('error'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{ session()->get('error') }}',
                showConfirmButton: false,
                backdrop: false,
                timer: 2000
            })
        </script>
    @endif

    <style>
        .custom-file-upload {
            border: 1px solid transparent;
            border-radius: 5px;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            background: #68D7FA;
            color: white;
            box-shadow: 0px 4px 10px 0px #00000026;
        }

        .custom-file-upload-div {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .cont-for-file-input {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .remove_button_file_upld {
            all: unset;
        }

        .total_cargo_price {
            position: fixed;
            bottom: 10%;
            right: 5%;
            width: auto;
            height: 3vw;
            /* display: none; */
            display: grid;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            grid-template-columns: 32% 22% 7%;
            border: 1px solid transparent;
            border-radius: 14px;
            background: #FFA555;
            justify-items: center;
        }

        .total_cargo_price input {
            all: unset;
            border: none;
            background: transparent;
            text-align: center;
            font-weight: bold;
            color: white;
            font-size: 15px;
            width: 100%;
        }

        .total_cargo_price p {
            all: unset;
            color: white;
            font-size: 15px;
        }
    </style>

    <script src="https://unpkg.com/jsbarcode@latest/dist/JsBarcode.all.min.js"></script>
    <script>
        "use strict";

        function initMap() {
            const CONFIGURATION = {
                "ctaTitle": "",
                "mapOptions": {
                    "center": {
                        "lat": 37.4221,
                        "lng": -122.0841
                    },
                    "fullscreenControl": true,
                    "mapTypeControl": false,
                    "streetViewControl": true,
                    "zoom": 11,
                    "zoomControl": true,
                    "maxZoom": 22
                },
                "mapsApiKey": "AIzaSyB4ZZ0J1KtfskZ0lulNJjiYx04zpQx4XyE",
                "capabilities": {
                    "addressAutocompleteControl": true,
                    "mapDisplayControl": false,
                    "ctaControl": true
                }
            };
            const componentForm = [
                'location',
                'locality',
                'administrative_area_level_1',
                'country',
                'postal_code',
            ];

            const getFormInputElement = (component) => document.getElementById(component + '-input');
            const autocompleteInput = getFormInputElement('location');
            const autocomplete = new google.maps.places.Autocomplete(autocompleteInput, {
                fields: ["address_components", "geometry", "name"],
                types: ["address"],
            });
            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert('No details available for input: \'' + place.name + '\'');
                    return;
                }
                fillInAddress(place);
            });

            function fillInAddress(place) { // optional parameter
                const addressNameFormat = {
                    'street_number': 'short_name',
                    'route': 'long_name',
                    'locality': 'long_name',
                    'administrative_area_level_1': 'short_name',
                    'country': 'long_name',
                    'postal_code': 'short_name',
                };
                const getAddressComp = function(type) {
                    for (const component of place.address_components) {
                        if (component.types[0] === type) {
                            return component[addressNameFormat[type]];
                        }
                    }
                    return '';
                };
                getFormInputElement('location').value = getAddressComp('street_number') + ' ' +
                    getAddressComp('route');
                for (const component of componentForm) {
                    // Location field is handled separately above as it has different logic.
                    if (component !== 'location') {
                        getFormInputElement(component).value = getAddressComp(component);
                    }
                }
            }
        }
    </script>

    <div class="drop__box">
        <div class="drop__box-img">
            <img src="img/svg/Group (9).svg" alt="">
        </div>
        <h4 class="ms-2">Manuel order</h4>
    </div>

    <section id="manual-order">
        <div class="variable variableManualOrder container py-4 row mx-auto">
            <form action="{{ route('userpanel.post.manualorder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <!-- Customer -->
                    <ul class="list-group mb-5">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <h4><i class="fa-solid fa-info headerIcon"></i> Customer</h4>
                                <li class="list-group-item pb-4">
                                    <select class="form-select border-primary" onchange="changeUserAddress(this)" required>
                                        <option class="optionText" selected disabled>
                                            Open this select menu
                                        </option>
                                        @foreach ($user_addresses as $address)
                                            <option>
                                                {{ $address->country }}<-->
                                                    {{ $address->city }}<-->
                                                        {{ $address->state }}<-->
                                                            {{ $address->address }}<-->
                                                                {{ $address->zipcode }}<-->
                                                                    {{ $address->name }}<-->
                                                                        {{ $address->phone }}<-->
                                                                            {{ $address->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="list-group-item mt-3">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <h5>Address Information</h5>
                                            <h6>Country<span class="red">*</span></h6>
                                            {{-- <input type="text" placeholder="Country" id="country-input" /> --}}
                                            <select class="form-select mb-3" name="country">
                                                <option value="0" selected disabled>Select</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <h6>City<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="New York"
                                                aria-label="default input example" name="city" id="locality-input" />
                                            <h6>State</h6>
                                            <input class="form-control mb-3" type="text" placeholder="California"
                                                aria-label="default input example" name="state"
                                                id="administrative_area_level_1-input" />
                                            <h6>Adress<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="Bergen street 57"
                                                aria-label="default input example" name="address" id="location-input" />
                                            <h6>ZIP Code<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="745844"
                                                aria-label="default input example" name="zipcode" id="postal_code-input" />
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <h5>Contact Info</h5>
                                            <h6>Full Name<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="Emma John"
                                                aria-label="default input example" name="name" />
                                            <h6>Phone Number<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="+9383830834"
                                                aria-label="default input example" name="phone" />
                                            <h6>Emai<span class="red">*</span>l</h6>
                                            <input class="form-control mb-3" type="email" placeholder="john@examle.com"
                                                aria-label="default input example" name="email" />
                                            <div class="form-check defaultCheckbox">
                                                <input class="form-check-input" type="checkbox" id="save_address"
                                                    name="save_address">
                                                <label class="form-check-label" for="save_address">
                                                    Save to address book
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Common Information -->
                    <ul class="list-group mb-5">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <h4>
                                    <i class="fa-solid fa-book-open-reader commonIcon"></i> Common
                                    Information
                                </h4>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6>IOSS Number<span class="red">*</span></h6>
                                            <input class="form-control" type="text" placeholder="498980948"
                                                aria-label="default input example" name="ioss_number" />
                                        </div>
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6>Vat Number<span class="red">*</span></h6>
                                            <input class="form-control" type="text" placeholder="498980948"
                                                aria-label="default input example" name="vat_number" />
                                        </div>
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6>Currency unit<span class="red">*</span></h6>
                                            <select class="form-select" name="currency_unit" required>
                                                <option class="optionText" selected>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Order Information -->
                    <ul class="list-group mb-5">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <!-- Header -->
                                <h4>
                                    <i class="fa-solid fa-box-archive commonIcon"></i> Order
                                    Information
                                </h4>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <input class="form-control" type="text" aria-label="default input example"
                                                name="order_info" readonly />
                                        </div>
                                    </div>
                                </li>
                                <!-- Package -->
                                <li class="list-group-item paketYaradilanYer">
                                    <button type="button" class="btn btn-warning my-3" onclick="yeniPaketElaveEt()">
                                        + Add package
                                    </button>
                                    <!-- 2ci paket -->
                                </li>
                                <!-- Yekunlar Burada -->
                                <li class="list-group-item mt-3">
                                    <div class="row">
                                        <div class="col-12 row">
                                            <div class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-hand-holding-dollar commonIcon"></i>
                                                <div class="ms-2">
                                                    <h5>Total amount</h5>
                                                    <span class="totalText totalAmount"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-cube commonIcon"></i>
                                                <div class="ms-2">
                                                    <h5>Total volume</h5>
                                                    <span class="totalText totalVolume"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-scale-balanced commonIcon"></i>
                                                <div class="ms-2">
                                                    <h5>Total weight</h5>
                                                    <span class="totalText totalWeight"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-p headerIcon"></i>
                                                <div class="ms-3">
                                                    <h5>Pricing weight:</h5>
                                                    <span class="totalText totalPricing"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-sack-dollar commonIcon"></i>
                                                <div class="ms-3">
                                                    <h5>Total worth:</h5>
                                                    <span class="totalText totalWorth"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-primary" onclick="yekunHesabla()">
                                                <i class="fa-solid fa-tag me-1"></i> Get a quote
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Shipment definition -->
                    <ul class="list-group mb-5">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <h4>
                                    <i class="fa-solid fa-truck-ramp-box commonIcon"></i> Shipment
                                    definition
                                </h4>
                                <li class="list-group-item">
                                    <h5>Select the cargo</h5>
                                    <div class="row">
                                        @foreach ($cargo_companies as $company)
                                            <div class="col-12 col-sm-6 mb-3">
                                                <ul class="list-group list-group-horizontal">
                                                    <li class="list-group-item w-25 text-center">
                                                        <img style="width:100%;height:100%;"
                                                            src="{{ asset('/') }}images/{{ $company->logo == null ? 'user.png' : $company->logo }}" />
                                                    </li>
                                                    <li class="list-group-item w-50 text-left">{{ $company->name }}</li>
                                                    <li class="list-group-item d-flex">
                                                        <span class="me-2"
                                                            id="cargo_company_{{ $company->id }}">unknwon</span>
                                                        <div class="form-check">
                                                            <input class="form-check-input cargo_price_input" type="radio"
                                                                name="cargo_company"
                                                                id="cargo_company_input_{{ $company->id }}"
                                                                data-price="0" value="{{ $company->id }}" />
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                                <!-- Footer -->
                                <li class="list-group-item">
                                    <h5>Additional Services</h5>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <ul class="list-group list-group-horizontal mb-2">
                                                <li class="list-group-item w-75 d-flex text-left">
                                                    <div class="form-check">
                                                        <input class="form-check-input cargo_price_input" type="checkbox"
                                                            data-price="15" name="insure_order" id="insure_my_order" />
                                                    </div>
                                                    İnsure my order
                                                </li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">15$</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <ul class="list-group list-group-horizontal mb-2">
                                                <li class="list-group-item w-75 d-flex text-left">
                                                    <div class="form-check">
                                                        <input class="form-check-input cargo_price_input" type="checkbox"
                                                            data-price="1" name="extra_bubble" id="extra_bubble" />
                                                    </div>
                                                    Extra bubble
                                                </li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">1$</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <ul class="list-group list-group-horizontal">
                                                <li class="list-group-item w-75 d-flex text-left">
                                                    <div class="form-check">
                                                        <input class="form-check-input cargo_price_input" type="checkbox"
                                                            name="other_additional" id="other_additional" />
                                                    </div>
                                                    Other Additional
                                                </li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">1$</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Product Content -->
                    <ul class="list-group mb-5">
                        <li class="list-group-item pt-4">
                            <h4>
                                <i class="fa-solid fa-box-open commonIcon"></i> Product Content
                            </h4>
                            <div class="row">
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5>Does the product contain a battery?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="battery" id="battery_yes"
                                                value="yes" />
                                            <label class="form-check-label" for="battery_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="battery" id="battery_no"
                                                value="no" checked />
                                            <label class="form-check-label" for="battery_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5>Does the product contain
                                            cosmetics/liquids?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="liquid" id="liquid_yes"
                                                value="yes" />
                                            <label class="form-check-label" for="liquid_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="liquid" id="liquid_no"
                                                value="no" checked />
                                            <label class="form-check-label" for="liquid_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5>Does the product contain food?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="food" id="food_yes"
                                                value="yes" />
                                            <label class="form-check-label" for="food_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="food" id="food_no" checked
                                                value="no" />
                                            <label class="form-check-label" for="food_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5>Does the product contain dangerous substances?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dangerous"
                                                id="dangerous_yes" value="yes" />
                                            <label class="form-check-label" for="dangerous_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dangerous" id="dangerous_no"
                                                value="no" checked />
                                            <label class="form-check-label" for="dangerous_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col row productContentFooter m-2 rounded">
                                    <span class="col-12">*If your cargo includes batteries and derivatives,
                                        you
                                        can
                                        send it together with your
                                        <span class="rengliSoz">MSDS</span> document.</span>
                                    <span class="col-12">*When sending your cargo containing
                                        cosmetics/liquid,
                                        you
                                        send it together with your
                                        <span class="rengliSoz">MSDS</span> document.</span>
                                    <span class="col-12">*If you are selling dietary supplements, food,
                                        drugs,
                                        blood
                                        products, biological medical products, radiation-emitting
                                        devices, medical devices, cosmetics and veterinary
                                        equipment, you must obtain
                                        <span class="rengliSoz">FDA</span> certification for
                                        these.</span>
                                    <span class="col-12">
                                        *You must obtain an
                                        <span class="rengliSoz">MSDS</span> certificate for your
                                        products that contain flammable, harmful, irritating
                                        chemicals that may harm nature.</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Attachment of documents -->
                    <ul class="list-group mb-5">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <h4>
                                    <i class="fa-solid fa-file-arrow-up commonIcon"></i>
                                    Attachment of documents
                                </h4>
                                <li class="list-group-item">
                                    <div>
                                        <p class="variable-footer-text">(PDF, Maks. 5.0. MB)</p>
                                        <div class="cont-for-file-input">
                                            <div class="custom-file-upload-div">
                                                <label for="CustomFileUpload"
                                                    class="custom-file-upload label-for-hidden-input">
                                                    <input type="file" name="document[]" id="CustomFileUpload" hidden />
                                                    Custom Upload
                                                </label>
                                                <h6 class="ms-2" id="CustomFileUploadText">No file chosen, yet.
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- Elave olunan fayllar li teqinin icinde olacaq -->
                                <li class="list-group-item added-files-after-upload">
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="total_cargo_price">
                    <p>Total price: </p>
                    <input type="number" name="total_cargo_price" id="total_cargo_price" value="0" readonly>
                    <p>$</p>
                </div>

                <button class="btn btn-primary" type="submit">Submit order</button>
            </form>
        </div>
    </section>


    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4ZZ0J1KtfskZ0lulNJjiYx04zpQx4XyE&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cAC"
        async defer></script>
    <script>
        setTimeout(() => {
            console.clear();
        }, 1000);
        $('#CustomFileUpload').change(function(e) {
            var fileName = e.target.files[0].name;
            $('#CustomFileUploadText').html(fileName);
        });
    </script>
    <script>
        $("#CustomFileUpload").change(function() {

            var input_value = this.value;
            var file_name = this.files[0].name;
            var file_id = Math.random().toString(36).substr(2, 9);

            var $element = $(`
                <div class="custom-file-upload-div" id="file-upload-div-` + file_id + `">
                    <label class="label-for-hidden-input new_input_for_file">
                        ${file_name}
                    </label>
                    <select style="width:25%;" class="form-select" name="file_type[` + file_id + `]">
                        <option value="FDA">FDA</option>
                        <option value="MSDS">MSDS</option>
                        <option value="other">other</option>
                    </select>
                    <button type="button" class="remove_button_file_upld" onclick="removeFileLabel(this)">
                        <i class="fa-solid fa-remove commonIcon"></i>
                    </button>
                </div>
                <br>
            `).append($(this).clone());

            $('.added-files-after-upload').append($element);

            var div = document.querySelector('#file-upload-div-' + file_id + '');
            var new_file_input_hidden = div.querySelector('#CustomFileUpload');
            new_file_input_hidden.setAttribute('name', 'document[' + file_id + ']');
            // console.log(div , new_file_input_hidden);
        });

        function removeFileLabel(remove_button) {
            remove_button.parentNode.remove();
        }
    </script>
    <script>
        function changeUserAddress(select) {
            // console.log($(select).val());
            select = $(select).val();
            address_array = select.split("<-->");
            // console.table(address_array);
            document.querySelector('select[name="country"]').value = address_array[0];
            document.querySelector('input[name="state"]').value = address_array[1];
            document.querySelector('input[name="city"]').value = address_array[2];
            document.querySelector('input[name="address"]').value = address_array[3];
            document.querySelector('input[name="zipcode"]').value = address_array[4];
            document.querySelector('input[name="name"]').value = address_array[5];
            document.querySelector('input[name="phone"]').value = address_array[6];
            document.querySelector('input[name="email"]').value = address_array[7];

            if (document.querySelector('#save_address').checked == true) {
                document.querySelector('#save_address').checked = false;
            }

            // console.log(document.querySelector('#save_address'));
        }

        var cargo_price_inputs = document.querySelectorAll('.cargo_price_input');

        cargo_price_inputs.forEach(element => {
            element.addEventListener('change', function() {
                var cargo_company_price = parseInt(
                    document.querySelector('input[name="cargo_company"]:checked').getAttribute(
                        'data-price'));

                var total_cargo_price = cargo_company_price;

                if (document.querySelector('input[name="insure_order"]:checked')) {
                    var insure_order_price = parseInt(
                        document.querySelector('input[name="insure_order"]').getAttribute('data-price'));
                    total_cargo_price += insure_order_price;
                }
                if (document.querySelector('input[name="extra_bubble"]:checked')) {
                    var extra_bubble_price = parseInt(
                        document.querySelector('input[name="extra_bubble"]').getAttribute('data-price'));
                    total_cargo_price += extra_bubble_price;
                }

                total_cargo_price += parseInt(document.querySelector('.totalWorth').innerHTML);

                console.log(cargo_company_price + ";;;;;" + insure_order_price + ";;;;;" +
                    extra_bubble_price + ";;;;" + total_cargo_price);
                document.querySelector('#total_cargo_price').value = total_cargo_price;
            });
        });
    </script>
    <script src="{{ asset('/') }}frontend/userpanel/js/morder.js"></script>
@endsection
