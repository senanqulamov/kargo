@extends('userpanel.layout.layout')

@section('content')
    <section>
        <div class="bg-white container p-4 rounded shadowBox">
            <!-- Shipment Mode -->

            <div class="variable-shipmentMode mb-4">
                <h5 class="getSpecialText">Shipment Mode</h5>
                <div class="variable-radio-input d-flex align-items-center flex-wrap">
                    <div class="d-flex align-items-center mb-2">
                        <input id="r1" name="shipmentRadio" type="radio" class="form-check-input radioSize me-2"
                            onclick="menuChange()" checked="checked" />
                        <img src="img/svg2/getSpecialOffer/sea.svg" alt="" class="me-2" />
                        <label for="r1" class="getSpecialLabel me-4">Sea</label>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <input id="r2" name="shipmentRadio" type="radio" class="form-check-input radioSize me-2"
                            onclick="menuChange()" />
                        <img src="img/svg2/getSpecialOffer/rail.svg" alt="" class="me-2" />
                        <label for="r2" class="getSpecialLabel me-4">Rail</label>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <input id="r3" name="shipmentRadio" type="radio" class="form-check-input radioSize me-2"
                            onclick="menuChange()" />
                        <img src="img/svg2/getSpecialOffer/air.svg" alt="" class="me-2" />
                        <label for="r3" class="getSpecialLabel me-4">Air</label>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <input id="r4" name="shipmentRadio" type="radio" class="form-check-input radioSize me-2"
                            onclick="menuChange()" />
                        <img src="img/svg2/getSpecialOffer/truck.svg" alt="" class="me-2" />
                        <label for="r4" class="getSpecialLabel me-4">Truck</label>
                    </div>
                </div>
            </div>

            <!-- Change Zone -->

            <!-- Sea Rail Truck -->
            <div class="specialOffer">
                <!-- Origin Destination -->
                <div class="variable-originDestination mb-4">
                    <h5 class="getSpecialText mb-3">Origin</h5>
                    <select class="form-select mb-4 getSpecialSelect" aria-label="Default select example">
                        <option disabled selected>City, Country</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <h5 class="getSpecialText mb-3">Destination</h5>
                    <select class="form-select mb-2 getSpecialSelect" aria-label="Default select example">
                        <option selected disabled>City, Country</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <!-- Shipping Mode -->
                <div class="variable-shipmentMode mb-4">
                    <h5 class="getSpecialText mb-3">Shipping type</h5>
                    <div class="variable-radio-input d-flex align-items-center">
                        <div class="form-check me-3 d-flex align-items-center">
                            <input id="5" name="shipmentRadio" class="form-check-input radioSize me-2"
                                type="radio" name="flexRadioDefault" />
                            <img src="img/svg2/getSpecialOffer/fcl.svg" alt="" class="me-3" />
                            <label class="form-check-label getSpecialLabel" for="5">
                                FCL
                            </label>
                        </div>
                        <div class="form-check me-3 d-flex align-items-center">
                            <input id="5" name="shipmentRadio" class="form-check-input radioSize me-2"
                                type="radio" name="flexRadioDefault" />
                            <img src="img/svg2/getSpecialOffer/airCargo.svg" alt="" class="me-3" />
                            <label class="form-check-label getSpecialLabel me-3" for="5">
                                LCL
                            </label>
                            <img src="img/svg2/getSpecialOffer/sual.svg" alt="" />
                        </div>
                    </div>
                </div>
                <!-- Container -->
                <div class="variable-container mb-4">
                    <h5 class="getSpecialText">Container</h5>
                    <div class="variable-container-inputs row">
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">Type</h6>
                            <select class="form-select mb-2 getSpecialSelect" aria-label="Default select example">
                                <option selected disabled>Pick Type</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">
                                Cargo weight (per container)
                            </h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="0" aria-label="Username"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text getSpecialText3" id="addon-wrapping">kq</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">Quantity</h6>
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary getSpecialBtn getSpecialBtnMinus" type="button"
                                    onclick="minus1()">
                                    -
                                </button>
                                <input type="number" class="form-control  getSpecialQuantity1 text-center"
                                    placeholder="1" aria-label="Example text with two button addons" />

                                <button class="btn btn-outline-secondary getSpecialBtn getSpecialBtnPlus" type="button"
                                    onclick="plus1()">
                                    +
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            <button type="button" class="ms-auto getSpecialBtn1">
                                + Add
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="variable-footer mb-3">
                    <h5 class="getSpecialText mb-3">Cargo</h5>
                    <input type="text" id="inputPassword5" class="form-control mb-4"
                        placeholder="Description + (HS/HTS Code of the product if available)" />
                    <h5 class="getSpecialText mb-3">Goods ready date</h5>

                    <div class="d-flex border rounded mb-3">
                        <div class="wrapper flex-fill d-flex align-items-center">
                            <input class="inputs text-center" type="text" id="datepicker" autocomplete="off"
                                placeholder="Goods ready date" />
                        </div>
                        <div class="d-flex align-items-center p-3 border-start">
                            <img src="img/svg2/getSpecialOffer/kalendar.svg" alt="" />
                        </div>
                    </div>
                    <h5 class="getSpecialText mb-3">Incoterms</h5>
                    <select class="form-select mb-3 getSpecialSelect" aria-label="Default select example">
                        <option selected disabled>Select Incoterms</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <h5 class="getSpecialText mb-2">Insurance</h5>
                    <div class="d-flex align-items-center">
                        <img src="img/svg2/getSpecialOffer/insurange.svg" alt="" class="me-2" />
                        <span class="getSpecialText2">
                            Do you need cargo insurance?</span>
                    </div>
                    <div class="d-flex align-items-center mb-4 mt-3">
                        <input type="radio" id="yes1" class="me-2" name="yesNo" />
                        <label for="yes1" class="getSpecialLabel me-4">Yes</label>
                        <input type="radio" id="no1" class="me-2" name="yesNo" />
                        <label for="no1" class="getSpecialLabel">No</label>
                    </div>
                    <h5 class="getSpecialText">Delivery address</h5>
                    <input type="text" id="inputPassword5" class="form-control mb-4"
                        placeholder="Postal code for delivery" />
                    <h5 class="getSpecialText">Additional information</h5>
                    <input type="text" id="inputPassword5" class="form-control mb-4"
                        placeholder="Additional details or requests" />
                    <h5 class="getSpecialText">MSDS / Other Document / Photo</h5>

                    <div class="courier__input-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="" class="form__file mt-0">
                                    <p class="input__above-text">(PDF, Maks. 5.0. MB)</p>
                                    <input type="file"> </input>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Air -->
            <div class="content specialOfferAir">
                <!-- Origin Destination -->
                <div class="variable-originDestination mb-4">
                    <h5 class="getSpecialText mb-3">Origin</h5>
                    <select class="form-select mb-4 getSpecialSelect" aria-label="Default select example">
                        <option disabled selected>City, Country</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <h5 class="getSpecialText mb-3">Destination</h5>
                    <select class="form-select mb-2 getSpecialSelect" aria-label="Default select example">
                        <option selected disabled>City, Country</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <!-- Shipping Mode -->
                <div class="variable-shipmentMode mb-4">
                    <h5 class="getSpecialText mb-3">Shipping type</h5>
                    <div class="variable-radio-input d-flex align-items-center">
                        <div class="form-check me-3 d-flex align-items-center">
                            <input id="5" name="shipmentRadio" class="form-check-input radioSize me-2"
                                type="radio" name="flexRadioDefault" />
                            <img src="img/svg2/getSpecialOffer/airCargo.svg" alt="" class="me-3" />
                            <label class="form-check-label getSpecialLabel" for="5">
                                Air Cargo
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Box/Pallet -->
                <div class="variable-container mb-4">
                    <h5 class="getSpecialText">Box/Pallet</h5>
                    <div class="variable-container-inputs row">
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">Length</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="Pick Type" aria-label="Username"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text getSpecialText3" id="addon-wrapping">cm</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">Width</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="0" aria-label="Username"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text getSpecialText3" id="addon-wrapping">cm</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">Height</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="Pick Type" aria-label="Username"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text getSpecialText3" id="addon-wrapping">cm</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">Weight</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="0" aria-label="Username"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text getSpecialText3" id="addon-wrapping">kq</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText2">Quantity</h6>
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary getSpecialBtn getSpecialBtnMinus" type="button"
                                    onclick="minus()">
                                    -
                                </button>
                                <input type="number" class="form-control getSpecialQuantity text-center" placeholder="1"
                                    aria-label="Example text with two button addons" />

                                <button class="btn btn-outline-secondary getSpecialBtn getSpecialBtnPlus" type="button"
                                    onclick="plus()">
                                    +
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            <button type="button" class="ms-auto getSpecialBtn1">
                                + Add
                            </button>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText">Total Volume</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="0.0" aria-label="Username"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text getSpecialText3" id="addon-wrapping">m <sup>2</sup>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <h6 class="getSpecialText">Total Weight</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" placeholder="0" aria-label="Username"
                                    aria-describedby="addon-wrapping" />
                                <span class="input-group-text getSpecialText3" id="addon-wrapping">kq</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="variable-footer mb-3">
                    <h5 class="getSpecialText mb-3">Cargo</h5>
                    <input type="text" id="inputPassword5" class="form-control mb-4"
                        placeholder="Description + (HS/HTS Code of the product if available)" />
                    <h5 class="getSpecialText mb-3">Goods ready date</h5>

                    <div class="d-flex border rounded mb-3">
                        <div class="wrapper flex-fill d-flex align-items-center">
                            <input class="inputs text-center" type="text" id="datepicker" autocomplete="off"
                                placeholder="Goods ready date" />
                        </div>
                        <div class="d-flex align-items-center p-3 border-start">
                            <img src="img/svg2/getSpecialOffer/kalendar.svg" alt="" />
                        </div>
                    </div>
                    <h5 class="getSpecialText mb-2">Insurance</h5>
                    <div class="d-flex align-items-center">
                        <img src="img/svg2/getSpecialOffer/insurange.svg" alt="" class="me-2" />
                        <span class="getSpecialText2">
                            Do you need cargo insurance?</span>
                    </div>
                    <div class="d-flex align-items-center mb-4 mt-3">
                        <input type="radio" id="yes1" class="me-2" name="yesNo" />
                        <label for="yes1" class="getSpecialLabel me-4">Yes</label>
                        <input type="radio" id="no1" class="me-2" name="yesNo" />
                        <label for="no1" class="getSpecialLabel">No</label>
                    </div>
                    <h5 class="getSpecialText">Delivery address</h5>
                    <input type="text" id="inputPassword5" class="form-control mb-4"
                        placeholder="Postal code for delivery" />
                    <h5 class="getSpecialText">Additional information</h5>
                    <input type="text" id="inputPassword5" class="form-control mb-4"
                        placeholder="Additional details or requests" />
                    <h5 class="getSpecialText">MSDS / Other Document / Photo</h5>

                    <div class="courier__input-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="" class="form__file mt-0">
                                    <p class="input__above-text">(PDF, Maks. 5.0. MB)</p>
                                    <input type="file"> </input>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Change Zone -->
        </div>
    </section>
@endsection
