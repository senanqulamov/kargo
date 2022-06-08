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

    <div class="drop__box">
        <div class="drop__box-img">
            <img src="img/svg/Group (9).svg" alt="">
        </div>
        <h4 class="ms-2">Manuel order</h4>
    </div>

    <section id="manual-order">
        <div class="variable variableManualOrder container py-4 row mx-auto">
            <form action="{{ route('userpanel.post.manualorder') }}" method="POST">
                @csrf
                <div class="col-12">
                    <!-- Customer -->
                    <ul class="list-group mb-5">
                        <li class="list-group-item row pt-4">
                            <ul class="list-group list-group-flush">
                                <h4><i class="fa-solid fa-info headerIcon"></i> Customer</h4>
                                <li class="list-group-item pb-4">
                                    <select class="form-select border-primary" name="customer" required>
                                        <option class="optionText" selected>
                                            Open this select menu
                                        </option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </li>
                                <li class="list-group-item mt-3">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <h5>Address Information</h5>
                                            <h6>Country<span class="red">*</span></h6>
                                            <select class="form-select mb-3" name="country">
                                                <option value="null" selected disabled>Select</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <h6>City<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="New York"
                                                aria-label="default input example" name="city" />
                                            <h6>State</h6>
                                            <input class="form-control mb-3" type="text" placeholder="California"
                                                aria-label="default input example" name="state" />
                                            <h6>Adress<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="Bergen street 57"
                                                aria-label="default input example" name="address" />
                                            <h6>ZIP Code<span class="red">*</span></h6>
                                            <input class="form-control mb-3" type="text" placeholder="745844"
                                                aria-label="default input example" name="zipcode" />
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
                                                    name="save_address" />
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
                                                aria-label="default input example" name="ioss_number"/>
                                        </div>
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6>Vat Number<span class="red">*</span></h6>
                                            <input class="form-control" type="text" placeholder="498980948"
                                                aria-label="default input example" name="vat_number"/>
                                        </div>
                                        <div class="col-12 col-sm-4 mb-3">
                                            <h6>Currency unit<span class="red">*</span></h6>
                                            <select class="form-select" name="currency_unit" required>
                                                <option class="optionText" selected>USD</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
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
                                            <input class="form-control" type="text" placeholder="Clock, Book"
                                                aria-label="default input example" name="order_info"/>
                                        </div>
                                    </div>
                                </li>
                                <!-- Package -->
                                <li class="list-group-item paketYaradilanYer">
                                    <button type="button" class="btn btn-warning my-3" onclick="yeniPaketElaveEt()">
                                        + Add another package
                                    </button>
                                    <!-- JS paket kodu -->
                                    {{-- <ul class="list-group list-group-flush border rounded mb-3 p-2">
                                        <h4><i class="fa-solid fa-box commonIcon"></i> Package</h4>
                                        <li class="list-group-item">
                                            <input
                                                class="form-control default_package"
                                                type="hidden"
                                                name="package_id[]"
                                                id="uniq_package_id"
                                                value=""
                                            />
                                            <div class="row">
                                                <div class="col-6 col-md">
                                                    <h6>Count:<span class="red">*</span></h6>
                                                    <input class="form-control boxCount" type="text" placeholder="1"
                                                        aria-label="default input example" name="package_count[0]"/>
                                                </div>
                                                <div class="col-6 col-md mb-3">
                                                    <h6>Type:<span class="red">*</span></h6>
                                                    <select class="form-select" name="package_type[0]">
                                                        <option selected>box</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md">
                                                    <h6>Length:<span class="red">*</span></h6>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control boxVolume" placeholder="15"
                                                        name="package_length[0]"/>
                                                        <span class="input-group-text" id="basic-addon1">sm</span>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md">
                                                    <h6>Width:<span class="red">*</span></h6>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control boxVolume" placeholder="15"
                                                        name="package_width[0]" />
                                                        <span class="input-group-text" id="basic-addon1">sm</span>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md">
                                                    <h6>Height:<span class="red">*</span></h6>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control boxVolume" placeholder="15"
                                                        name="package_height[0]" />
                                                        <span class="input-group-text" id="basic-addon1">sm</span>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md">
                                                    <h6>Weight:<span class="red">*</span></h6>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control boxWeight" placeholder="2"
                                                            name="package_weight[0]" />
                                                        <span class="input-group-text" id="basic-addon1">kq</span>
                                                    </div>
                                                </div>
                                                <div class="col-1 d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-danger" onclick="silPaket(this)">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- product -->
                                        <li class="list-group-item ms-3 row productYaradilanYer">
                                            <h4>
                                                <i class="fa-solid fa-box commonIcon"></i> Products
                                                <button type="button" class="btn btn-primary my-3 mx-3"
                                                    onclick="yeniProductElaveEt(this)">
                                                    + Add another products
                                                </button>
                                            </h4>
                                            <div class="row">
                                                <input
                                                    class="form-control"
                                                    type="hidden"
                                                    name="product_id[]"
                                                    value="0"
                                                />
                                                <div class="col-6 col-md mb-3">
                                                    <h6>SKU Code</h6>
                                                    <input class="form-control" type="text" placeholder="12345"
                                                        aria-label="default input example" name="sku_code[0]"/>
                                                </div>
                                                <div class="col-6 col-md mb-3">
                                                    <h6>Product<span class="red">*</span></h6>
                                                    <input class="form-control" type="text" placeholder="Clock"
                                                        aria-label="default input example" name="product[0]"/>
                                                </div>
                                                <div class="col-6 col-md mb-3">
                                                    <h6>Count<span class="red">*</span></h6>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text"
                                                            placeholder="1 (Storage 3)"
                                                            aria-label="default input example" name="count[0]"/>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md mb-3">
                                                    <h6>Unit Weight<span class="red">*</span></h6>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="2"
                                                            aria-label="Username" aria-describedby="basic-addon1"
                                                            name="weight[0]"/>
                                                        <span class="input-group-text" id="basic-addon1">kq</span>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md mb-3">
                                                    <h6>Unit Price<span class="red">*</span></h6>
                                                    <input class="form-control" type="text" placeholder="200"
                                                        aria-label="default input example"
                                                        name="price[0]"/>
                                                </div>
                                                <div class="col-6 col-md mb-3">
                                                    <h6>GTIP Code</h6>
                                                    <input class="form-control" type="text" placeholder="12345"
                                                        aria-label="default input example"
                                                        name="gtip_code[0]"/>
                                                </div>
                                                <div class="col d-flex align-items-center">
                                                    <button type="button" class="btn btn-danger" onclick="silProduct(this)">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr> --}}

                                    <!-- 2ci paket -->
                                </li>
                                <!-- Yekunlar Burada -->
                                <li class="list-group-item mt-3">
                                    <div class="row">
                                        <div class="col-12 row">
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-hand-holding-dollar commonIcon"></i>
                                                <div class="ms-2">
                                                    <h5>Total amount</h5>
                                                    <span class="totalText totalAmount"></span>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-cube commonIcon"></i>
                                                <div class="ms-2">
                                                    <h5>Total volume</h5>
                                                    <span class="totalText totalVolume"></span>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-scale-balanced commonIcon"></i>
                                                <div class="ms-2">
                                                    <h5>Total weight</h5>
                                                    <span class="totalText totalWeight"></span>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-p headerIcon"></i>
                                                <div class="ms-3">
                                                    <h5>Pricing weight:</h5>
                                                    <span class="totalText totalPricing">0.003</span>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3 col-6 col-md d-flex justify-content-center align-items-center">
                                                <i class="fa-solid fa-sack-dollar commonIcon"></i>
                                                <div class="ms-3">
                                                    <h5>Total worth:</h5>
                                                    <span class="totalText">0.003 $</span>
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
                                        <div class="col-12 col-sm-6 mb-3">
                                            <ul class="list-group list-group-horizontal">
                                                <li class="list-group-item w-25 text-center">
                                                    <img src="img/FedexLogo.png" alt="" />
                                                </li>
                                                <li class="list-group-item w-50 text-left">Deirvlon</li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">69$ </span>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1" />
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <ul class="list-group list-group-horizontal">
                                                <li class="list-group-item w-25 text-center">
                                                    <i class="fa-brands fa-ups"></i>
                                                </li>
                                                <li class="list-group-item w-50 text-left">Deirvlon</li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">69$ </span>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1" />
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <ul class="list-group list-group-horizontal">
                                                <li class="list-group-item w-25 text-center">
                                                    <img src="img/ExpressLogo.png" alt="" />
                                                </li>
                                                <li class="list-group-item w-50 text-left">Deirvlon</li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">69$ </span>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1" />
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <ul class="list-group list-group-horizontal">
                                                <li class="list-group-item w-25 text-center">
                                                    <img src="img/TntLogo.png" alt="" />
                                                </li>
                                                <li class="list-group-item w-50 text-left">Deirvlon</li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">69$ </span>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1" />
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
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
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault" />
                                                    </div>
                                                    Deirvlon
                                                </li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">69$ </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <ul class="list-group list-group-horizontal mb-2">
                                                <li class="list-group-item w-75 d-flex text-left">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault" />
                                                    </div>
                                                    Deirvlon
                                                </li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">69$ </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <ul class="list-group list-group-horizontal">
                                                <li class="list-group-item w-75 d-flex text-left">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault" />
                                                    </div>
                                                    Deirvlon
                                                </li>
                                                <li class="list-group-item d-flex">
                                                    <span class="me-2">69$ </span>
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
                                            <input class="form-check-input" type="radio" name="battery"
                                                id="battery_yes" checked />
                                            <label class="form-check-label" for="battery_yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="battery"
                                                id="battery_no" />
                                            <label class="form-check-label" for="battery_no">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5>Does the product contain a battery?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5>Does the product contain a battery?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-12 col-md-3 mb-2">
                                    <div class="col-12 border-end">
                                        <h5>Does the product contain a battery?</h5>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" />
                                            <label class="form-check-label" for="flexRadioDefault1">
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
                                    <div class="col-lg-6">
                                        <p class="variable-footer-text">(PDF, Maks. 5.0. MB)</p>
                                        <input type="file" id="real-file" hidden="hidden" />
                                        <div class="d-flex align-items-center">
                                            <button type="button" id="custom-button" class="btn btn-primary">
                                                CHOOSE A FILE
                                            </button>
                                            <h6 class="ms-2">No file chosen, yet.</h6>
                                        </div>
                                    </div>
                                </li>
                                <!-- Elave olunan fayllar li teqinin icinde olacaq -->
                                <li class="list-group-item"></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <button type="submit">asasds</button>
            </form>
        </div>
    </section>

    <script src="{{ asset('/') }}frontend/userpanel/js/morder.js"></script>
@endsection
