@extends('userpanel.layout.layout')

@section('content')
    @php
    $integration = json_decode(Auth::user()->integration);
    @endphp

    <style>
        .tab-cont {
            float: left;
            width: 30%;
            background-color: #fff;
            height: 100%;
            border-right: 1px solid #d1d1d1;
        }

        .tab-cont button {
            width: 100%;
            background-color: inherit;
            padding: 18px;
            font-size: 16px;
            border: none;
            text-align: start;
            font-weight: 400;
        }

        .tab-content {
            background: #fff;
            height: 100%;
            float: left;
            padding: 0 10px;
            width: 70%;
            animation: anime 1s
        }

        .tab-content h2 {
            font-size: 24px;
            font-weight: 400;
        }

        .tab-content p {
            color: #666;
        }

        .tab-cont .but.active {
            border-bottom: 3px solid #3b69e4;
        }

        @keyframes anime {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        accordion-single {
            border-bottom: 1px solid #efefef;
            margin-top: 10px;
        }

        .accordion-single-title {
            border-top: 1px solid #efefef;
            padding: 20px;
            cursor: pointer;
            position: relative;
            font-size: 20px;
            margin: 0;
        }

        .accordion-single-title::after {
            content: &#34;
            &#34;
            ;
            position: absolute;
            right: 25px;
            top: 50%;
            transition: all 0.2s ease-in-out;
            display: block;
            width: 8px;
            height: 8px;
            border-top: solid 2px #999;
            border-right: solid 2px #999;
            transform: translateY(-50%) rotate(135deg);
        }

        .accordion-single-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .accordion-single-content p {
            padding: 20px;
        }

        .accordion-single-item.is-open .accordion-single-content {
            max-height: 30vw;
        }

        .accordion-single-item.is-open .accordion-single-title::after {
            transform: translateY(-50%) rotate(315deg);
        }

        @media screen and (max-width: 420px) {
            .tab-cont {
                float: left;
                width: 100% !important;
                background-color: #fff;
                height: 100%;
                border-right: 1px solid #d1d1d1;
            }

            .tab-content {
                background: #fff;
                height: 100%;
                float: left;
                padding: 20px;
                width: 100% !important;
                animation: anime 1s
            }
        }
    </style>

    <section id="tabsContent">
        <div class="container">
            <div class="tab-cont">
                @foreach ($categories as $category)
                    <button class="but" onclick="city(event, '{{ $category->title }}')">{{ $category->title }}</button>
                @endforeach
            </div>
            @foreach ($categories as $category)
                <div class="tab-content " id="{{ $category->title }}" style="display: none;">
                    <main class="contents">
                        <div class="accordion-single js-acc-single">
                            @foreach ($faqs->where('categoryID', '==', $category->id) as $faq)
                                <div class="accordion-single-item js-acc-item">
                                    <h2 class="accordion-single-title js-acc-single-trigger">{{ $faq->question }}</h2>
                                    <div class="accordion-single-content">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </main>
                </div>
            @endforeach
        </div>
    </section>



    <script>
        var button = document.getElementsByClassName('but'),
            tabContent = document.getElementsByClassName('tab-content');
        button[0].classList.add('active');
        tabContent[0].style.display = 'block';


        function city(e, city) {
            var i;
            for (i = 0; i < button.length; i++) {
                tabContent[i].style.display = 'none';
                button[i].classList.remove('active');
            }
            document.getElementById(city).style.display = 'block';
            e.currentTarget.classList.add('active');
        }


        const accSingleTriggers = document.querySelectorAll('.js-acc-single-trigger');

        accSingleTriggers.forEach(trigger => trigger.addEventListener('click', toggleAccordion));

        function toggleAccordion() {
            const items = document.querySelectorAll('.js-acc-item');
            const thisItem = this.parentNode;

            items.forEach(item => {
                if (thisItem == item) {
                    thisItem.classList.toggle('is-open');
                    return;
                }
                item.classList.remove('is-open');
            });
        }
    </script>
@endsection
