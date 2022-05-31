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
        <form action="{{route('pricecalculator.calculation')}}" method="post" id="price_calc">
            @csrf
            <div class="row calculateForm">            
                <div class="row">
                    <div class="col-lg-6">
                        <div class="country">
                            <label for="selectCountry">Country: <div class="red-star">*</div></label>
                            <select name="selectCountry" id="selectCountry">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->code}}" {{ old("selectCountry") == $country->code ? "selected" : "" }}>{{$country->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text selectCountry_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="country">
                            <label for="inputCount">Count: <div class="red-star">*</div></label>
                            <input type="text" name="inputCount" id="inputCount" value="{{old('inputCount')}}">
                            <span class="text-danger error-text inputCount_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="country">
                            <label for="selectType">Type: <div class="red-star">*</div></label>
                            <select name="selectType" id="selectType">
                                <option value="">Choose Type</option>
                                <option value="box" {{ old("selectType") == "box" ? "selected" : "" }}>Box</option>
                                <option value="envelope" {{ old("selectType") == "envelope" ? "selected" : "" }}>Envelope</option>
                            </select>
                            <span class="text-danger error-text selectType_error"></span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="country">
                            <label for="inputLength">Lenght: <div class="red-star">*</div></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="15" id="inputLength" name="inputLength" aria-label="15" aria-describedby="basic-addon2" value="{{old('inputLength')}}">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                                <span class="text-danger error-text inputLength_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="country">
                            <label for="inputWidth">Width: <div class="red-star">*</div></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputWidth" id="inputWidth" placeholder="15" aria-label="15" aria-describedby="basic-addon2" value="{{old('inputWidth')}}">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                                <span class="text-danger error-text inputWidth_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12" id="heightArea">
                        <div class="country">
                            <label for="inputHeight">Height: <div class="red-star">*</div></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputHeight" id="inputHeight" placeholder="15" aria-label="15" aria-describedby="basic-addon2" value="{{old('inputHeight')}}">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                                <span class="text-danger error-text inputHeight_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12">
                        <div class="country">
                            <label for="inputWeight">Weight: <div class="red-star">*</div></label>
                            <div class="input-group mb-3">
                                <input type="text" name="inputWeight" id="inputWeight" class="form-control" placeholder="2" aria-label="2" aria-describedby="basic-addon2" value="{{old('inputWeight')}}">
                                <span class="input-group-text" id="basic-addon2">kq</span>
                                <span class="text-danger error-text inputWeight_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row justify-content-between align-items-center">                
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
                                <span>Total volume:</span>
                                <span>0,003 m</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 ">
                        <div class="forms-img">
                            <div class="imgTitle">
                                <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                            </div>
                            <div class="img-title-content">
                                <span>Total weight:</span>
                                <span>0,003 kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 ">
                        <div class="forms-img">
                            <div class="imgTitle">
                                <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                            </div>
                            <div class="img-title-content">
                                <span>Pricing weight:</span>
                                <span>0,003</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2  col-md-6 col-sm-6 ">
                        <div class="forms-img">
                            <div class="imgTitle">
                                <img src="{{asset('/')}}frontend/img/priceCalculatro.svg" alt="">
                            </div>
                            <div class="img-title-content">
                                <span>Total worth:</span>
                                <span>0,003 &euro;</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="price-total">
                            <div class="price-btn">
                                <button type="submit">Price Calculation</button>
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
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-dark">
                            <th>Cargo Company</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="tableCompany"></tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Calculator end -->
@endsection

@section('js')
<script>
	$(function(){		
        $("#selectType").change(function(){
            var data=$(this).val();

            if (data == "envelope") {
                $("#heightArea").addClass("d-none");
            } else {
                $("#heightArea").removeClass("d-none");
            }
        });

		$("#price_calc").on('submit', function(e){
			e.preventDefault();
		
			$.ajax({
				url:$(this).attr('action'),
				method:$(this).attr('method'),
				data:new FormData(this),
				processData:false,
				dataType:'json',
				contentType:false,
				beforeSend:function(){
					$(document).find('span.error-text').text('');
				},
				success:function(data){
					if(data.status == 0){
						$.each(data.error, function(prefix, val){
							$('span.'+prefix+'_error').text(val[0]);
						});
					} else{
                        if ($("#table_section").hasClass("d-none")) {
                            $("#table_section").removeClass("d-none");
                        }

                        $('#tableCompany').text(' ');
                        var trHTML = '';
                        for (let i = 0; i < data.company.length; i++) {
                            trHTML += '<tr><td>' + data.company[i] + '</td><td>' + data.price[i] + '</td></tr>';                          
                        }
                        $('#tableCompany').append(trHTML);
					}
				}
			});
		});
	})
</script>
@endsection