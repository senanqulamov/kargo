@extends('frontend.layout.app')

@section('title', 'Career')

@section('content')
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
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Type of Employment
                            </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                        <label for="">
                                            <input type="checkbox" name="" id="">
                                            Full Time Jobs
                                        </label>
                                        <label for="">
                                            <input type="checkbox" name="" id="">
                                            Part Time Jobs
                                        </label>
                                        <label for="">
                                            <input type="checkbox" name="" id="">
                                            Remote Jobs
                                        </label>
                                        <label for="">
                                            <input type="checkbox" name="" id="">
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
                <div class="row Jobs">
                    <div class="col-lg-12">
                        <form role="search" method="get" class="search-form form" action="">
                            <label>
                                <span class="screen-reader-text">Search for...</span>
                                <input type="search" class="search-field" placeholder="Enter Track ID" value="" name="s" title="" />
                            </label>
                            <input type="submit" class="search-submit button" value="Search &#xf002" />
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="tags">
                            <button>Sales Manager</button>
                            <button>Digital Manager</button>
                            <button>Customer Service</button>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if(count($careers) > 0)
						@foreach($careers as $career)
                        <div class="jobs-card">
                            <div class="row  align-items-center">
                                <div class="col-lg-8">
                                    <div class="nameJobs">
                                        <h3><i class="fas fa-briefcase"></i> {{$career->title}}</h2>
                                        @php ($location = DB::table('countries')->where('id', $career->location)->first() )
                                        <span><i class="fas fa-map-marker-alt"></i> {{$location->name}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="applyBtn">
                                        <button type="button" data-id="{{$career->id}}" class="edit_btn">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row my-3">
                                <div class="col-lg-6">
                                    <div class="tagsJobs">
                                        <button>{{$career->getTypeAttribute()}}</button>
                                        <button>Min, {{$career->experience}}</button>                                        
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
@if(count($careers) > 0)
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
                <a href="#" class="urlCareer"><button type="button" data-bs-dismiss="modal">Apply Now</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Apply  End -->
@endif
@endsection

@section('js')
<script>
	$(function(){
		$(".edit_btn").click(function(){
            var id_data=$(this).attr('data-id');
            $("#Apply").modal('show');

            $.ajax({
                type:"GET",
				data:{id:id_data},
				url:"{{route('careers.fetch')}}",
                success:function(response){
                    $(".vacancyContent").html(response.data.description);
                    $(".titleClass").html(response.data.title);
                    $(".urlCareer").attr("href", "{{route('careers.apply', '')}}"+"/"+response.data.id);
                }
            });
        });
	});
</script>
@endsection