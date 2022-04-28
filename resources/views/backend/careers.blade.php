@extends('backend.layout.app')

@section('title', 'Careers')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3>@php echo $career_applies = DB::table('careers')->where('status', '1')->count(); @endphp</h3>

				<p>Active Vacancies</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>@php echo $career_applies = DB::table('careers')->where('status', '2')->count(); @endphp</h3>

				<p>Passive Vacancies</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12 mb-4">	
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#vacancyModal"><i class="fas fa-plus"></i> New Vacancy</button>							
	</div>
</div>
<div class="row">							
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">List of Vacancies</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Job Title</th>
							<th>Location</th>
							<th>Finish Time</th>
							<th>Applies</th>
							<th>Status</th>
							<th style="width:200px"></th>
						</tr>
					</thead>
					<tbody>
					@foreach($careers as $career)
					<tr>
						<td>{{$career->title}}</td>
						<td class="text-center">{{$career->getCareerCountry->name}}</td>
						<td class="text-center">{{ date('d/m/Y', strtotime($career->finish_time)) }}</td>
						<td class="text-center"><span>@php echo $career_applies = DB::table('career_applies')->where('careerID', $career->id)->count(); @endphp</span></td>
						<td class="text-center"><span class="text-{{$career->status == 1 ? 'success' : 'danger'}}">{{$career->status == 1 ? 'Active' : 'Deactive'}}</span></td>
						<td class="text-center">
							<a href="{{route('admin.human.careers.show', $career->id)}}" class="btn btn-secondary"><i class="fas fa-eye"></i></a>
							<a href="" class="btn btn-primary"><i class="fas fa-pen"></i></a>
							<a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>

<div class="modal fade" id="vacancyModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.human.careers.create')}}" method="post" autocomplete="off" id="insertCareer">
					@csrf
					<div class="form-group">
						<label for="inputTitle">Title</label>
						<input type="text" class="form-control" id="inputTitle" placeholder="Enter vacancy title" name="inputTitle" value="{{old('inputTitle')}}">
						<span class="text-danger error-text inputTitle_error"></span>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="selectLocation">Location</label>
								<select class="form-control" name="selectLocation" id="selectLocation">
									<option value="">Choose location</option>
									@foreach($countries as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
									@endforeach
								</select>
								<span class="text-danger error-text selectLocation_error"></span>
                      		</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="selectWorkTime">Worktime</label>
								<select class="form-control" name="selectWorkTime" id="selectWorkTime">
									<option value="">Choose worktime</option>
									<option value="fulltime">Full Time</option>
									<option value="remote">Remote</option>
									<option value="parttime">Part Time</option>
									<option value="internship">Internship</option>
								</select>
								<span class="text-danger error-text selectWorkTime_error"></span>
                      		</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputExperience">Experience</label>
								<input type="text" class="form-control" id="inputExperience" placeholder="Enter vacancy experience" name="inputExperience" value="{{old('inputExperience')}}">
								<span class="text-danger error-text inputExperience_error"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputFinishTime">Finish Time</label>
								<input type="datetime-local" class="form-control" id="inputFinishTime" placeholder="Enter vacancy finish time" name="inputFinishTime" value="{{old('inputFinishTime')}}">
								<span class="text-danger error-text inputFinishTime_error"></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="desc">Description</label>
						<textarea id="summernote" row="10" name="desc"></textarea>
						<span class="text-danger error-text desc_error"></span>
					</div>

					<button type="submit" class="btn btn-primary">Create</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('js')
<!-- Summernote -->
<script src="{{asset('/')}}backend/assets/plugin/summernote/summernote-bs4.min.js"></script>

<script>
	$(function(){
		// Summernote
		$('#summernote').summernote()

		$("#insertCareer").on('submit', function(e){
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
						// $('#formOptionalCompany')[0].reset();
						toastr.success(data.msg, data.state);
						$("#vacancyModal").modal().hide();
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				}
			});
		});

		$(".edit_btn").click(function(){
            var id_data=$(this).val();
            $("#editModal").modal('show');

            $.ajax({
                type:"GET",
				data:{id:id_data},
				url:"{{route('admin.faqs.edit')}}",
                success:function(response){
                    $("#selectCategory2").val(response.data.category);
                    $("#inputQuestion2").val(response.data.question);
                    $("#textareaAnswer2").val(response.data.answer);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });

		$("#updateFaqs").on('submit', function(e){
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
						// $('#formOptionalCompany')[0].reset();
						toastr.success(data.msg, data.state);
						$("#editModal").modal().hide();
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				}
			});
		});
	})
</script>
@endsection