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
							<th style="width:300px"></th>
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
							<button type="button" class="btn btn-primary edit_btn" value="{{$career->id}}"><i class="fas fa-pen"></i></button>
							<a href="{{route('admin.human.careers.delete', $career->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							<a href="{{route('admin.human.careers.activate', $career->id)}}" class="btn btn-{{$career->status == 1 ? 'dark' : 'success'}}">{{$career->status == 1 ? 'Deactive' : 'Activate'}}</a>
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

<div class="modal fade" id="editModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Update Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.human.careers.update')}}" method="post" autocomplete="off" id="updateCareer">
					@csrf
                    @method('PUT')
					<div class="form-group">
						<label for="inputTitle2">Title</label>
						<input type="text" class="form-control" id="inputTitle2" placeholder="Enter vacancy title" name="inputTitle2" value="{{old('inputTitle2')}}">
						<span class="text-danger error-text inputTitle2_error"></span>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="selectLocation2">Location</label>
								<select class="form-control" name="selectLocation2" id="selectLocation2">
									<option value="">Choose location</option>
									@foreach($countries as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
									@endforeach
								</select>
								<span class="text-danger error-text selectLocation2_error"></span>
                      		</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="selectWorkTime2">Worktime</label>
								<select class="form-control" name="selectWorkTime2" id="selectWorkTime2">
									<option value="">Choose worktime</option>
									<option value="fulltime">Full Time</option>
									<option value="remote">Remote</option>
									<option value="parttime">Part Time</option>
									<option value="internship">Internship</option>
								</select>
								<span class="text-danger error-text selectWorkTime2_error"></span>
                      		</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputExperience2">Experience</label>
								<input type="text" class="form-control" id="inputExperience2" placeholder="Enter vacancy experience" name="inputExperience2" value="{{old('inputExperience2')}}">
								<span class="text-danger error-text inputExperience2_error"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputFinishTime2">Finish Time</label>
								<input type="datetime-local" class="form-control" id="inputFinishTime2" placeholder="Enter vacancy finish time" name="inputFinishTime2" value="{{old('inputFinishTime2')}}">
								<span class="text-danger error-text inputFinishTime2_error"></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="desc2">Description</label>
						<textarea id="summernote2" row="10" name="desc2"></textarea>
						<span class="text-danger error-text desc2_error"></span>
					</div>

                    <input type="hidden" name="hiddenID" id="hiddenID">

					<button type="submit" class="btn btn-primary">Update</button>
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
		$('#summernote').summernote();
		$('#summernote2').summernote();

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
				url:"{{route('admin.human.careers.edit')}}",
                success:function(response){
                    $("#inputTitle2").val(response.data.title);
                    $("#selectLocation2").val(response.data.location);
                    $("#selectWorkTime2").val(response.data.worktime);
					$("#inputExperience2").val(response.data.experience);
					$("#inputFinishTime2").val(response.data.finish_time);
					$("#summernote2").val(response.data.description);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });

		$("#updateCareer").on('submit', function(e){
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