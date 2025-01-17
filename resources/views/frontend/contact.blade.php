@extends('frontend.layout.app')

@section('title', 'Contact')

@section('css')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/plugin/toastr/toastr.min.css">
@endsection

@section('content')
    <!-- Contact Us Start -->
    <section id="Contact-us">
        <div class="container">
            <div class="row my-5 mx-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <h2>{{ __('homepage.contact.text 1') }}</h2>
                        <span>{{ __('homepage.contact.text 2') }}</span>
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
                                    <h5>{{ __('homepage.contact.text 3') }}</h5>
                                    <span>{{ $headOffice->address }}</span>
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
                                <h5>{{ __('homepage.contact.text 4') }}</h5>
                                <span>
                                    @php
                                        $setting = DB::table('settings')
                                            ->where([['name', '=', 'Email'], ['page', '=', 'Contact']])
                                            ->first();
                                    @endphp
                                    @if ($setting)
                                        {!! json_decode($setting->details) !!}
                                    @endif
                                </span>
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
                                <h5>{{ __('homepage.contact.text 5') }}</h5>
                                <span>
                                    @php
                                        $setting = DB::table('settings')
                                            ->where([['name', '=', 'Phone'], ['page', '=', 'Contact']])
                                            ->first();
                                    @endphp
                                    @if ($setting)
                                        {!! json_decode($setting->details) !!}
                                    @endif
                                </span>
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
                        <h2>{{ __('homepage.contact.text 6') }}</h2>
                        <span>{{ __('homepage.contact.text 7') }}</span>
                    </div>
                </div>
            </div>
            <div class="row my-5 ">
                <div class="col-lg-6">
                    <form action="{{ route('contactPost') }}" method="POST" autocomplete="off" id="formApply">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="{{ __('homepage.contact.text 8') }}" value="{{ old('name') }}">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="surname" placeholder="{{ __('homepage.contact.text 9') }}" value="{{ old('surname') }}">
                                <span class="text-danger error-text surname_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="{{ __('homepage.contact.text 10') }}" value="{{ old('email') }}">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" name="phone" placeholder="{{ __('homepage.contact.text 11') }}" value="{{ old('phone') }}">
                                <span class="text-danger error-text phone_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <select name="service">
                                    <option value="">{{ __('homepage.contact.text 12') }}</option>
                                {{-- @foreach ($services as $service) --}}
                                    {{-- <option value="{{ $service->id }}">{{ $service->title }}</option> --}}
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 13') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 14') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 15') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 16') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 17') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 18') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 19') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 20') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 21') }}</option>
                                        <option value="{{ __('homepage.contact.text 13') }}">{{ __('homepage.contact.text 22') }}</option>
                                {{-- @endforeach --}}
                                </select>
                                <span class="text-danger error-text service_error"></span>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="subject" placeholder="{{ __('homepage.contact.text 23') }}">
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
                                    <button type="submit">{{ __('homepage.contact.text 24') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="map-contact">
                        <div id="default_map" style="border:0; border-radius: 10px; height:490px; width:100%"></div>
                        <!--
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059669857!2d-74.25986773739224!3d40.697149413874705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2z0J3RjNGOLdCZ0L7RgNC6LCDQodCo0JA!5e0!3m2!1sru!2s!4v1649885127182!5m2!1sru!2s"
                                width="90%" height="490" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            -->
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
                        <h2>{{ __('homepage.contact.text 25') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-2 mapLocation">
                <div class="col-lg-12">
                    <div id="map" style="height:500px; width:100%; border:0; border-radius: 10px;"></div>
                </div>
            </div>
            <div class="row showBoxes">
                @foreach ($branches as $branch)
                    <div class="col-lg-12">
                        <div class="row show-map">
                            <div class="col-lg-8">
                                <div class="map-text">
                                    <div class="text-title">
                                        @php
                                            $country = DB::table('countries')->where('code', $branch->country)->first();
                                        @endphp
                                        <h5>{{ $country->code }}</h5>
                                        <span>|</span>
                                        <h5>{{ $country->name }}</h5>
                                    </div>
                                    <div class="text-desc">
                                        <span>{{ $branch->address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="show-map-button">
                                    <button class="confirm" data-id="{{ $branch->id }}">{{ __('homepage.contact.text 26') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Our Location End -->
@endsection

@section('js')
    <!-- Toastr -->
    <script src="{{ asset('/') }}frontend/plugin/toastr/toastr.min.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBByp1zFwtmhqM3ibxX-oVAVxi2eaYXlbk&callback"></script>

    <script>
        $(function() {
            function google_map(id, lat, lng) {
                var map = new google.maps.Map(document.getElementById(id), {
                    center: {
                        lat: lat,
                        lng: lng
                    },
                    zoom: 12,
                    mapTypeId: 'roadmap',
                    scrollwheel: false
                });
                const marker = new google.maps.Marker({
                    position: {
                        lat: lat,
                        lng: lng
                    },
                    map,
                    title: "Click to zoom",
                });
                map.addListener("center_changed", () => {
                    // 3 seconds after the center of the map has changed, pan back to the
                    // marker.
                    window.setTimeout(() => {
                        map.panTo(marker.getPosition());
                    }, 3000);
                });
                marker.addListener("click", () => {
                    map.setZoom(18);
                    map.setCenter(marker.getPosition());
                });
            }
            // head office
            google_map("default_map", {{ $headOffice->latitude }}, {{ $headOffice->longitude }});

            // google map
            google_map("map", {{ $headOffice->latitude }}, {{ $headOffice->longitude }});

            $("button.confirm").click(function() {
                var id_data = $(this).attr("data-id");

                $.ajax({
                    type: "GET",
                    data: {
                        id: id_data
                    },
                    url: "{{ route('location') }}",
                    success: function(response) {
                        var lng = response.data.longitude;
                        var lat = response.data.latitude;

                        google_map("map", parseFloat(lat), parseFloat(lng));
                    }
                });
            });

            // form app
            $("#formApply").on('submit', function(e) {
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
                            toastr.success(data.msg, data.state);
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }
                    }
                });
            });
        });
    </script>
@endsection
