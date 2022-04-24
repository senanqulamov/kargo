@extends('frontend.layout.app')

@section('title', 'Inquiry')

@section('content')
<!-- Career Start -->
<section id="Anket">
    <div class="container">
        <div class="row my-6 anket">
            <div class="col-lg-12">
                <div class="formsAnket">
                    <form action="">
                        <h4>Apply Now</h4>
                        <label for="">
                                Name
                                <input type="text" placeholder="John">
                            </label>
                        <label for="">
                                Surname
                                <input type="text" placeholder="Enn">
                            </label>
                        <label for="">
                            E-Mail
                            <input type="email" placeholder="Johnenn@mail.ru">
                        </label>
                        <label for="">
                            Message
                            <textarea name="" id="" cols="30" rows="10" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum laborum error suscipit tempore atque excepturi autem! Facilis sed minima illo fuga dolor? Dolor sit dicta in natus, voluptate voluptatem minima?"></textarea>
                        </label>
                        <div class="form-title">
                            <h5>CV</h5>
                        </div>
                        <div class="row fileInput">
                            <div class="col-lg-12">
                                <p>(PDF, Maks. 5.0. MB)</p>
                                <input type="file" id="real-file" hidden="hidden" />
                                <button type="button" id="custom-button">Select the file</button>
                                <span id="custom-text">No file chosen, yet.</span>
                            </div>
                        </div>
                        <div class="submitBtn">
                            <button>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Career End -->
@endsection