@extends('frontend.layout.app')

@section('title', 'Getquote')

@section('content')
<section id="GetQuote">
    <div class="container">
        <div class="row mt-6 mb-5" style="text-align: center;">
            <div class="getquote-title">
                <h2>Get a quote</h2>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</span>
            </div>
        </div>
        <div class="row my-5 getQuoteForm">
            <div class="col-lg-12">
                <div class="form-title">
                    <h5>Shipment Mode</h5>
                </div>
                <div class="shipmentMode">
                    <form action="#">
                        <div class="form__group">
                            <div class="form__radio-group">
                                <input type="radio" name="size" id="small" class="form__radio-input">
                                <label class="form__label-radio" for="small" class="form__radio-label">
                                <span class="form__radio-button"></span> <i class="far fa-ship"></i> Sea
                                </label>
                            </div>
                            <div class="form__radio-group">
                                <input type="radio" name="size" id="large" class="form__radio-input">
                                <label class="form__label-radio" for="large" class="form__radio-label">
                                <span class="form__radio-button"></span> <i class="far fa-subway"></i> Rail
                                </label>
                            </div>
                            <div class="form__radio-group">
                                <input type="radio" name="size" id="largee" class="form__radio-input">
                                <label class="form__label-radio" for="largee" class="form__radio-label">
                                <span class="form__radio-button"></span> <i class="far fa-plane"></i> Air
                                </label>
                            </div>
                            <div class="form__radio-group">
                                <input type="radio" name="size" id="largeee" class="form__radio-input">
                                <label class="form__label-radio" for="largeee" class="form__radio-label">
                                    <span class="form__radio-button"></span> <i class="far fa-truck-moving"></i> Truck
                                    </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-title">
                    <h5>Origin</h5>
                </div>
                <div class="select-box">
                    <select name="" id="">
                        <option value="">City, Country</option>
                        <option value="">Baku,Azerbaijan</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-title">
                    <h5>Destination</h5>
                </div>
                <div class="select-box">
                    <select name="" id="">
                        <option value="">City, Country</option>
                        <option value="">Baku,Azerbaijan</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-title">
                    <h5>Shipping type</h5>
                </div>
                <div class="shipmentMode">
                    <form action="#">
                        <div class="form__group">
                            <div class="form__radio-group">
                                <input type="radio" name="size" id="small1" class="form__radio-input">
                                <label class="form__label-radio" for="small1" class="form__radio-label">
                                <span class="form__radio-button"></span> <i class="far fa-cubes"></i> Air Cargo
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-title">
                    <h5>Box/Pallet</h5>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Length</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Pick type" aria-label="Pick type" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Width</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">Height</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Pick type" aria-label="Pick type" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Weight</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">kq</span>
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
                            <input type="text" value="1" />
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="addToButton">
                            <button>+ Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row my-3">
                    <div class="col-lg-6">
                        <label for="">Total Volume</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Pick type" aria-label="Pick type" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">m²</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Total Weight</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="0" aria-label="0" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">kq</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Cargo</label>
                        <div class="select-box">
                            <input type="text" placeholder="Description + (HS/HTS Code of the product if available)" aria-label="Description + (HS/HTS Code of the product if available)" aria-describedby="basic-addon2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Goods ready date</label>
                        <div class="select-box">
                            <input type="date" placeholder="Goods ready date" aria-label="Goods ready date" aria-describedby="basic-addon2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Delivery address</label>
                        <div class="select-box">
                            <input type="number" placeholder="Additional details or requests" aria-label="Additional details or requests" aria-describedby="basic-addon2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Additional information</label>
                        <div class="select-box">
                            <input type="text" placeholder="Additional details or requests" aria-label="Additional details or requests" aria-describedby="basic-addon2">
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
                        <input type="file" id="real-file" hidden="hidden" />
                        <button type="button" id="custom-button">CHOOSE A FILE</button>
                        <span id="custom-text">No file chosen, yet.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection