@extends('backend.layout.app')

@section('title', 'Blogs')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('css')
<!-- summernote -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="row">
	<div class="col-12 mb-4">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> New Blog</button>								
	</div>
	
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Blogs</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($blogs as $blog)
					<tr>
						<td><img src="{{asset('/')}}frontend/img/blog/{{$blog->img}}" alt="{{$blog->slug}}" width="50" height="50"></td>
						<td>{{$blog->title}}</td>
						<td>{!! $blog->description !!}</td>
						<td class="text-center">
							<button type="button" class="btn btn-primary edit_btn" value="{{$blog->id}}"><i class="fas fa-edit"></i></button>
							<a href="{{route('admin.blogs.delete', $blog->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

<div class="modal fade" id="addModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Blog</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.blogs.create')}}" method="post" autocomplete="off" id="insertForm">
					@csrf
					<div class="form-group">
						<label for="inputTitle">Title</label>
						<input type="text" class="form-control" id="inputTitle" placeholder="Enter blog title" name="inputTitle" value="{{old('inputTitle')}}">
						<span class="text-danger error-text inputTitle_error"></span>
					</div>
					<!-- textarea -->
					<div class="form-group">
						<label for="textareaDescription">Description</label>
						<textarea class="form-control" rows="7" placeholder="Enter your answer..." name="textareaDescription" id="textareaDescription">{{old('textareaDescription')}}</textarea>
						<span class="text-danger error-text textareaDescription_error"></span>
					</div>
					<div class="form-group">
						<label for="fileImage">Image</label>
						<input type="file" class="form-control" id="fileImage" name="fileImage">
						<span class="text-danger error-text fileImage_error"></span>
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
				<h4 class="modal-title">Update Blog</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.blogs.update')}}" method="post" autocomplete="off" id="updateFaqs">
					@csrf
                    @method('PUT')
                    <div class="form-group">
						<label for="inputTitle2">Title</label>
						<input type="text" class="form-control" id="inputTitle2" placeholder="Enter blog title" name="inputTitle2" value="{{old('inputTitle2')}}">
						<span class="text-danger error-text inputTitle2_error"></span>
					</div>
					<!-- textarea -->
					<div class="form-group">
						<label for="textareaDescription2">Description</label>
						<textarea class="form-control" rows="7" placeholder="Enter your answer..." name="textareaDescription2" id="textareaDescription2">{{old('textareaDescription2')}}</textarea>
						<span class="text-danger error-text textareaDescription2_error"></span>
					</div>
					<div class="form-group">
						<label for="fileImage2">Image</label>
						<input type="file" class="form-control" id="fileImage2" name="fileImage2">
						<span class="text-danger error-text fileImage2_error"></span>
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
		$('#textareaDescription').summernote();
		$('#textareaDescription2').summernote();

		$("#insertForm").on('submit', function(e){
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
						$("#addModal").modal().hide();
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
				url:"{{route('admin.blogs.edit')}}",
                success:function(response){
                    $("#inputTitle2").val(response.data.title);
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