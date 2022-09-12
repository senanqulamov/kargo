@extends('frontend.layout.app')

@section('title', 'Blogs')

@section('content')
    <style>
        .blog-button-row-hm {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .blog-button-col-hm {
            width: max-content;
        }

        .blog-card-hm {
            transition: all 0.6s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .active-blog-card-hm {
            opacity: 1;
            visibility: visible;
        }

        .not-active-blog-card-hm {
            opacity: 0;
            visibility: hidden;
            height: 0;
            width: 0;
            margin: 0;
            padding: 0;
        }

        .btn {
            padding: 5px 20px;
        }

        @media (min-width: 1200px) {
            .blog-cards-holder-hm{
                height: 25vw;
            }
        }
    </style>
    <!-- Blogs Section Start -->
    <section id="Blogs">
        <div class="container">
            <div class="row mt-6 mb-5">
                <div class="title" style="text-align: center;">
                    <div class="col-lg-12">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
            <div class="blog-button-row-hm mt-5">
                <div class="blog-button-col-hm">
                    <button type="button" class="btn btn-primary" data-category="all" onclick="filterCategory(this)">
                        All
                    </button>
                </div>
                @foreach ($blogs->pluck('category') as $blog_button)
                    <div class="blog-button-col-hm">
                        <button type="button" class="btn btn-outline-primary" data-category="{{ $blog_button }}"
                            onclick="filterCategory(this)" data-clicked="false">
                            {{ $blog_button }}
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="row blog-cards-holder-hm">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 blog-card-hm" data-category="{{ $blog->category }}">
                        <a href="{{ route('blogs.detail', Str::slug($blog->title, '-')) }}">
                            <div class="blog-card">
                                <img src="{{ asset('/') }}frontend/img/blog/{{ $blog->img }}" alt="">
                                <div class="text-blog">
                                    <h4>{{ $blog->title }}</h4>
                                    <div class="dateTime">
                                        <i class="fal fa-calendar-alt"></i>
                                        <span>{{ date('d.m.Y H:i', strtotime($blog->created_at)) }}</span>
                                        <span><b>Category:</b> {{ $blog->category }}</span>
                                    </div>
                                    {!! Str::limit($blog->description, 250, ' ...') !!}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function filterCategory(button) {
            var category = button.getAttribute('data-category');
            var buttons = document.querySelectorAll('.blog-button-col-hm');
            var cards = document.querySelectorAll('.blog-card-hm');

            if (button.getAttribute('data-category') == "all") {
                buttons.forEach(element => {
                    element.querySelector('button').setAttribute('class', 'btn btn-outline-primary');
                    element.querySelector('button').setAttribute('data-clicked', 'false');
                });
                button.setAttribute('class', 'btn btn-primary');
                cards.forEach(element => {
                    element.classList.remove('active-blog-card-hm');
                    element.classList.remove('not-active-blog-card-hm');
                });
            } else {
                if (button.getAttribute('data-clicked') == "false") {
                    buttons.forEach(element => {
                        element.querySelector('button').setAttribute('class', 'btn btn-outline-primary');
                        element.querySelector('button').setAttribute('data-clicked', 'false');
                    });
                    button.setAttribute('data-clicked', 'true');
                    button.setAttribute('class', 'btn btn-primary');
                } else {
                    button.setAttribute('data-clicked', 'false');
                    button.setAttribute('class', 'btn btn-outline-primary');
                }

                //-----------------------------------------------------//

                if (button.getAttribute('data-clicked') == "false") {
                    cards.forEach(element => {
                        element.classList.remove('active-blog-card-hm');
                        element.classList.add('not-active-blog-card-hm');
                    });
                } else {
                    cards.forEach(element => {
                        if (element.getAttribute('data-category') == category) {
                            element.classList.add('active-blog-card-hm');
                            element.classList.remove('not-active-blog-card-hm');
                        } else {
                            element.classList.remove('active-blog-card-hm');
                            element.classList.add('not-active-blog-card-hm');
                        }
                    });
                }
            }
        }
    </script>
    <!-- Blogs Section End -->
@endsection
