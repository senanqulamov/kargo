<!-- Blogs Section Start -->
<section id="FAQ">
    <div class="container">
        <div class="row mt-6 mb-5" style="text-align: center;">
            <div class="col-lg-12">
                <div class="title">
                    <h2>Frequently Asked Questions (FAQ)</h2>
                </div>
            </div>
        </div>
        <div class="row my-6">
            <div class="col-lg-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @php ($faqsLeft = DB::table('faqs')->where('location', 'left')->get() )
                    @foreach($faqsLeft as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{$faq->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$faq->id}}" aria-expanded="false" aria-controls="flush-collapse{{$faq->id}}">
                                {{$faq->question}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$faq->id}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{$faq->answer}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @php ($faqsRight = DB::table('faqs')->where('location', 'right')->get() )
                    @foreach($faqsRight as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{$faq->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$faq->id}}" aria-expanded="false" aria-controls="flush-collapse{{$faq->id}}">
                                {{$faq->question}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$faq->id}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">{{$faq->answer}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blogs Section End -->