@extends('frontend.layout.app')

@php ($data = DB::table('companies')->where('status', 1)->first() ) 

@section('title', 'Contact')

@section('css')
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('/')}}frontend/plugin/toastr/toastr.min.css"> 
@endsection

@section('content')
<!-- Contact Us Start -->
<section id="Contact-us">
    <div class="container">
        <div class="row my-5 mx-5" style="text-align: center;">
            <div class="col-lg-12">
                <div class="contact-title">
                    <h2>Contact with us </h2>
                    <span>There are more ways to get the support you need. You can contact us about any issue, we will be happy to assist you.</span>
                </div>
            </div>
        </div>
        <div class="row contact-box align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="row contactSection">
                    <div class="col-lg-3">
                        <div class="contac-div">
                            <i class="fal fa-map-marker-alt"></i>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-text">
                            <div class="contact-text">
                                <h5>Our Address:</h5>
                                <span>{{$data->address}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="row contactSection">
                    <div class="col-lg-3">
                        <div class="contac-div">
                            <i class="fal fa-envelope"></i>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-text">
                            <h5>E-mail:</h5>
                            <span>{{$data->email}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="row contactSection">
                    <div class="col-lg-3">
                        <div class="contac-div">
                            <i class="fal fa-phone-alt"></i>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-text">
                            <h5>Phone:</h5>
                            <span>{{$data->phone}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us End -->


<!-- Contact Forms Start -->
<section id="ContactForms">
    <div class="container">
        <div class="row mt-6" style="text-align: center;">
            <div class="col-lg-12">
                <div class="contactFormsTitle">
                    <h2>How can we help</h2>
                    <span>You can send us your requests by filling out the contact form, calling or sending an e-mail.</span>
                </div>
            </div>
        </div>
        <div class="row my-5 ">
            <div class="col-lg-6">
                <form action="{{route('contactPost')}}" method="POST" autocomplete="off" id="formApply">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="surname" placeholder="Surname" value="{{ old('surname') }}">
                            <span class="text-danger error-text surname_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            <span class="text-danger error-text phone_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <select name="service">
                                <option value="">Choose a service</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text service_error"></span>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="subject" placeholder="Subject heading">
                            <span class="text-danger error-text subject_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea name="message" cols="30" rows="10" placeholder="Your message"></textarea>
                            <span class="text-danger error-text message_error"></span>
                        </div>
                        <div class="col-lg-12">
                            <div class="forms-send-button">
                                <button type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="map-contact">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059669857!2d-74.25986773739224!3d40.697149413874705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2z0J3RjNGOLdCZ0L7RgNC6LCDQodCo0JA!5e0!3m2!1sru!2s!4v1649885127182!5m2!1sru!2s"
                        width="90%" height="490" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Forms End -->

@include('frontend.partials.faqs')

<!-- Our Location Start -->
<section id="OurLocation">
    <div class="container">
        <div class="row" style="text-align: center;">
            <div class="col-lg-12">
                <div class="ourlocation-title">
                    <h2>Our location in abroad</h2>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-2 mapLocation">
            <div class="col-lg-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059669857!2d-74.25986773739224!3d40.697149413874705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2z0J3RjNGOLdCZ0L7RgNC6LCDQodCo0JA!5e0!3m2!1sru!2s!4v1649885127182!5m2!1sru!2s"
                    width="100%" height="500" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="row showBoxes">
            <div class="col-lg-12">
                <div class="row show-map">
                    <div class="col-lg-8">
                        <div class="map-text">
                            <div class="text-title">
                                <h5>US</h5>
                                <span>|</span>
                                <h5>New York</h5>
                            </div>
                            <div class="text-desc">
                                <span>2822 Church Av. Brooklyn, NY 11226</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="show-map-button">
                            <button>Show on map</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row show-map">
                    <div class="col-lg-8">
                        <div class="map-text">
                            <div class="text-title">
                                <h5>US</h5>
                                <span>|</span>
                                <h5>New York</h5>
                            </div>
                            <div class="text-desc">
                                <span>2822 Church Av. Brooklyn, NY 11226</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="show-map-button">
                            <button>Show on map</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row show-map">
                    <div class="col-lg-8">
                        <div class="map-text">
                            <div class="text-title">
                                <h5>US</h5>
                                <span>|</span>
                                <h5>New York</h5>
                            </div>
                            <div class="text-desc">
                                <span>2822 Church Av. Brooklyn, NY 11226</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="show-map-button">
                            <button>Show on map</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mb-5 show-map">
                    <div class="col-lg-8">
                        <div class="map-text">
                            <div class="text-title">
                                <h5>US</h5>
                                <span>|</span>
                                <h5>New York</h5>
                            </div>
                            <div class="text-desc">
                                <span>2822 Church Av. Brooklyn, NY 11226</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="show-map-button">
                            <button>Show on map</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Location End -->
@endsection

@section('js')
<!-- Toastr -->
<script src="{{asset('/')}}frontend/plugin/toastr/toastr.min.js"></script>

<script>
	$(function(){		
		$("#formApply").on('submit', function(e){
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
                        toastr.success(data.msg, data.state);
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				}
			});
		});
	});
</script>
@endsection