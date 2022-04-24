@extends('frontend.layout.app')

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
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
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
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row contactSection">
                    <div class="col-lg-3">
                        <div class="contac-div">
                            <i class="fal fa-envelope"></i>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-text">
                            <h5>E-mail:</h5>
                            <span>support@shiplounge.co </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row contactSection">
                    <div class="col-lg-3">
                        <div class="contac-div">
                            <i class="fal fa-phone-alt"></i>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-text">
                            <h5>Phone:</h5>
                            <span>+908508404182</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row contactSection">
                    <div class="col-lg-3">
                        <div class="contac-div">
                            <i class="fal fa-clock"></i>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-text">
                            <h5>Hours:</h5>
                            <span>Monday-Friday: 9:00 - 18:00</span>
                            <span>Saturday: 9:00 - 14:30</span>
                            <span>Sunday: Closed</span>
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
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="" id="" placeholder="Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="" id="" placeholder="Surname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="email" name="" id="" placeholder="Email">
                        </div>
                        <div class="col-lg-6">
                            <input type="number" name="" id="" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <select name="" id="">
                                <option value="">Choose a service</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="" id="" placeholder="Subject heading">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Your message"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <div class="forms-send-button">
                                <button>Send</button>
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

<!-- FAQ Start -->
<section id="Faq">
    <div class="container">
        <div class="row my-5" style="text-align: center;">
            <div class="col-lg-12">
                <div class="faq-title">
                    <h2>Frequently Asked Questions (FAQ)</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just
                                filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-12">
                <div class="more">
                    <a href="">More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ End -->

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