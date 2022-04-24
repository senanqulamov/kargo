@extends('frontend.layout.app')

@section('title', 'Price Calculator')

@section('content')

<!-- Price Calculator TItle start-->
<section id="PriceTitle">
    <div class="container">
        <div class="row mt-6" style="text-align: center;">
            <div class="col-lg-12">
                <div class="priceTitle">
                    <div class="Title-Text">
                        <h1>Price Calculator</h1>
                        <h5>Are you ready to ship Globally with affordable <br> logistics solutions with Shiplounge?</h5>
                    </div>
                    <img src="{{asset('/')}}frontend/img/priceCalculator.png" alt="">
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
                    <h2>Sample Product Weights</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/t-shirt.svg" alt="">
                    <div class="card-contetn">
                        <span>T-shirt</span>
                        <span>0.5 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/sweater.svg" alt="">
                    <div class="card-contetn">
                        <span>Sweater</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/pans.svg" alt="">
                    <div class="card-contetn">
                        <span>Pans</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/jacket.svg" alt="">
                    <div class="card-contetn">
                        <span>Jacket</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/shoes.svg" alt="">
                    <div class="card-contetn">
                        <span>Shoes</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/bag.svg" alt="">
                    <div class="card-contetn">
                        <span>Bag</span>
                        <span>0.5 - 1.5 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/sunglasses.svg" alt="">
                    <div class="card-contetn">
                        <span>Sunglasses</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/acssesoaries.svg" alt="">
                    <div class="card-contetn">
                        <span>Accessory</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/book.svg" alt="">
                    <div class="card-contetn">
                        <span>Book</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/stationery.svg" alt="">
                    <div class="card-contetn">
                        <span>Stationery</span>
                        <span>0.5 - 1 Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/headphone.svg" alt="">
                    <div class="card-contetn">
                        <span>Headphone</span>
                        <span>0.5 - 1.5Kg</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="products-card">
                    <img src="{{asset('/')}}frontend/img/make-up.svg" alt="">
                    <div class="card-contetn">
                        <span>Make-up kit</span>
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
                    <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                </div>
                <h3>Price Calculation</h3>
            </div>
        </div>
        <div class="row calculateForm">
            <div class="row">
                <div class="col-lg-6">
                    <div class="country">
                        <label for="">Country: <div class="red-star">*</div></label>
                        <select name="" id="">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div class="country">
                        <label for="">Country: <div class="red-star">*</div></label>
                        <input type="text" name="" id="">
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div class="country">
                        <label for="">Type: <div class="red-star">*</div></label>
                        <select name="" id="">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div class="country">
                        <label for="">Lenght: <div class="red-star">*</div></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="15" aria-label="15" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div class="country">
                        <label for="">Width: <div class="red-star">*</div></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="15" aria-label="15" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div class="country">
                        <label for="">Height: <div class="red-star">*</div></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="15" aria-label="15" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12">
                    <div class="country">
                        <label for="">Weight: <div class="red-star">*</div></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="2" aria-label="2" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">kq</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  justify-content-between align-items-center">
                <div class="col-lg-2 col-md-6 col-sm-6 ">
                    <div class="forms-img">
                        <div class="imgTitle">
                            <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                        </div>
                        <div class="img-title-content">
                            <span>Total amount:</span>
                            <span>1 box</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6  ">
                    <div class="forms-img">
                        <div class="imgTitle">
                            <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                        </div>
                        <div class="img-title-content">
                            <span>Total amount:</span>
                            <span>1 box</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 ">
                    <div class="forms-img">
                        <div class="imgTitle">
                            <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                        </div>
                        <div class="img-title-content">
                            <span>Total amount:</span>
                            <span>1 box</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 ">
                    <div class="forms-img">
                        <div class="imgTitle">
                            <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                        </div>
                        <div class="img-title-content">
                            <span>Total amount:</span>
                            <span>1 box</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2  col-md-6 col-sm-6 ">
                    <div class="forms-img">
                        <div class="imgTitle">
                            <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                        </div>
                        <div class="img-title-content">
                            <span>Total amount:</span>
                            <span>1 box</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-lg-12">
                <div class="price-total">
                    <div class="price-btn">
                        <span>Price:</span>
                        <button>Price Calculation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calculator end -->
@endsection