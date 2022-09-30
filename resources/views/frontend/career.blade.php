@extends('frontend.layout.app')

@section('title', 'Career')

@section('content')

    <style>
        label {
            user-select: none;
            cursor: pointer;
        }
        .search-box-holder{
            display: flex;
        }
        .search-field{
            font-size: 1.6rem !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
        }

        .jobs-card {
            transition: all 0.6s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .filtered-job {
            opacity: 1;
            visibility: visible;
        }

        .not-filtered-job {
            opacity: 0;
            visibility: hidden;
            height: 0px;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <!-- Career Start -->
    <section id="Career">
        <div class="container">
            <div class="row mt-6 mb-5" style="text-align: center;">
                <div class="col-lg-12">
                    <div class="titleCareer">
                        <h1 style="color: #324970;"><strong style="color: #FF8D47;"> Shiplounge.co </strong>Career</h1>
                    </div>
                </div>
            </div>
            <div class="row career">
                <div class="col-lg-3">
                    <div class="row filter">
                        <div class="col-lg-12">
                            <div class="filterText">
                                <span>Filter <i class="fas fa-filter"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseOne">
                                            Type of Employment
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <label for="fulltime">
                                                <input type="checkbox" name="worktime" class="worktime" id="fulltime"
                                                    value="fulltime" onchange="filterJobs(this)">
                                                Full Time Jobs
                                            </label>
                                            <label for="worktime">
                                                <input type="checkbox" name="worktime" class="worktime" id="worktime"
                                                    value="parttime" onchange="filterJobs(this)">
                                                Part Time Jobs
                                            </label>
                                            <label for="remote">
                                                <input type="checkbox" name="worktime" class="worktime" id="remote"
                                                    value="remote" onchange="filterJobs(this)">
                                                Remote Jobs
                                            </label>
                                            <label for="internship">
                                                <input type="checkbox" name="worktime" class="worktime" id="internship"
                                                    value="internship" onchange="filterJobs(this)">
                                                Internship Jobs
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row Jobs m-0 p-0 d-flex justify-content-center">
                        <div class="row search-box-holder">
                            <label class="col-11 m-0 p-0">
                                <span class="screen-reader-text">Search for...</span>
                                <input type="search" class="search-field" placeholder="Search job"/>
                            </label>
                            <!--<input type="button" class="search-submit button col-1" value="&#xf002" />-->
                        </div>
                        <div class="col-lg-12">
                            <div class="tags">
                                <button>Sales Manager</button>
                                <button>Digital Manager</button>
                                <button>Customer Service</button>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            @if (count($careers) > 0)
                                @foreach ($careers as $career)
                                    <div class="jobs-card" data-job-type="{{ $career->worktime }}">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <div class="nameJobs">
                                                    <h3><i class="fas fa-briefcase"></i> {{ $career->title }}</h2>
                                                        @php
                                                            $location = DB::table('countries')
                                                                ->where('id', $career->location)
                                                                ->first();
                                                        @endphp
                                                        <span><i class="fas fa-map-marker-alt"></i>
                                                            {{ $location->name }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="applyBtn">
                                                    <button type="button" data-id="{{ $career->id }}"
                                                        class="edit_btn">Apply Now</button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row my-3">
                                            <div class="col-lg-6">
                                                <div class="tagsJobs">
                                                    <button>{{ $career->getTypeAttribute() }}</button>
                                                    <button>Min, {{ $career->experience }}</button>
                                                    <button>{{ date('d/m/Y', strtotime($career->finish_time)) }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Career End -->


    <!-- Modal Apply  Start -->
    @if (count($careers) > 0)
        <div class="modal fade" id="Apply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titleClass" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="vacancyContent"></div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="urlCareer"><button type="button" data-bs-dismiss="modal">Apply
                                Now</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Apply  End -->
    @endif
@endsection

@section('js')
    <script>
        var jobs = document.querySelectorAll('.jobs-card');
        var checked_options = [];

        function filterJobs(option) {
            if (option.checked) {
                checked_options.push(option);
            } else {
                checked_options.pop(option);
            }

            jobs.forEach(job => {
                job.classList.add('not-filtered-job');
            });

            checked_options.forEach(element => {
                var type = element.getAttribute('value');
                jobs.forEach(job => {
                    if (job.getAttribute('data-job-type') == type) {
                        job.classList.add('filtered-job');
                        job.classList.remove('not-filtered-job');
                    }
                });
            });
            if (checked_options.length == 0) {
                jobs.forEach(job => {
                    job.classList.remove('not-filtered-job');
                });
            }
        }

        var search_input = document.querySelector('.search-field');
        search_input.addEventListener('keyup' , function(){
            jobs.forEach(job => {
                if(job.textContent.includes(this.value)){
                    job.classList.add('filtered-job');
                    job.classList.remove('not-filtered-job');
                }else{
                    job.classList.add('not-filtered-job');
                    job.classList.remove('filtered-job');
                }
            });
        });
    </script>
@endsection
