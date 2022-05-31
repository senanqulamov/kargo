@extends('backend.layout.app')

@section('title', 'Shelves')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
@if(count($wardrobes) > 0)
<div class="row">
	<div class="col-12 mb-4">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> New Shelf</button>								
	</div>
	
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Shelves</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Count</th>
                            <th>Status</th>
                            <th>Wardrobe</th>
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($shelves as $shelf)
					<tr>
						<td>{{$shelf->title}}</td>
						<td>{{$shelf->description}}</td>
						<td>{{$shelf->count}}</td>
						<td class="text-center">
							<a href="{{route('admin.wardrobes.shelves.activate', $shelf->id)}}" class="btn btn-{{$shelf->status == 1 ? 'danger' : 'success'}}">{{$shelf->status == 1 ? 'Full' : 'Empty'}}</a>
						</td>
						<td>{{$shelf->getWardrobe->title}}</td>
						<td class="text-center">
							<button type="button" class="btn btn-primary edit_btn" value="{{$shelf->id}}"><i class="fas fa-edit"></i></button>
							<a href="{{route('admin.wardrobes.shelves.delete', $shelf->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
				<h4 class="modal-title">Add Shelf</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.wardrobes.shelves.create')}}" method="post" autocomplete="off" id="insertShelf">
					@csrf
					<!-- select -->
					<div class="form-group">
						<label for="selectCategory">Wardrobe</label>
						<select class="form-control" name="selectCategory" id="selectCategory">
							<option value="">Choose Wardrobe</option>
							@foreach($wardrobes as $wardrobe)
							<option value="{{$wardrobe->id}}" {{ old("selectCategory") == $wardrobe->id ? "selected" : "" }} >{{$wardrobe->title}}</option>
							@endforeach
						</select>
						<span class="text-danger error-text selectCategory_error"></span>
					</div>
					<div class="form-group">
						<label for="inputTitle">Title</label>
						<input type="text" class="form-control" id="inputTitle" placeholder="Enter shelf title" name="inputTitle" value="{{old('inputTitle')}}">
						<span class="text-danger error-text inputTitle_error"></span>
					</div>
					<!-- textarea -->
					<div class="form-group">
						<label for="textareaDescription">Description</label>
						<textarea class="form-control" rows="7" placeholder="Enter description..." name="textareaDescription" id="textareaDescription">{{old('textareaDescription')}}</textarea>
						<span class="text-danger error-text textareaDescription_error"></span>
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
				<h4 class="modal-title">Update FAQS</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.wardrobes.shelves.update')}}" method="post" autocomplete="off" id="updateShelf">
					@csrf
                    @method('PUT')
					<!-- select -->
                    <!-- select -->
					<div class="form-group">
						<label for="selectCategory2">Wardrobe</label>
						<select class="form-control" name="selectCategory2" id="selectCategory2">
							<option value="">Choose Wardrobe</option>
							@foreach($wardrobes as $wardrobe)
							<option value="{{$wardrobe->id}}" {{ old("selectCategory2") == $wardrobe->id ? "selected" : "" }} >{{$wardrobe->title}}</option>
							@endforeach
						</select>
						<span class="text-danger error-text selectCategory2_error"></span>
					</div>
					<div class="form-group">
						<label for="inputTitle2">Title</label>
						<input type="text" class="form-control" id="inputTitle2" placeholder="Enter shelf title" name="inputTitle2" value="{{old('inputTitle2')}}">
						<span class="text-danger error-text inputTitle2_error"></span>
					</div>
					<!-- textarea -->
					<div class="form-group">
						<label for="textareaDescription2">Description</label>
						<textarea class="form-control" rows="7" placeholder="Enter description..." name="textareaDescription2" id="textareaDescription2">{{old('textareaDescription2')}}</textarea>
						<span class="text-danger error-text textareaDescription2_error"></span>
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
@else
	<div class="alert alert-info" role="alert">
		To use this section, first create a wardrobe
	</div>
@endif
@endsection

@section('js')
<script>
	$(function(){
		$("#insertShelf").on('submit', function(e){
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
				url:"{{route('admin.wardrobes.shelves.edit')}}",
                success:function(response){
                    $("#selectCategory2").val(response.data.wardrobeID);
                    $("#inputTitle2").val(response.data.title);
                    $("#textareaDescription2").val(response.data.description);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });

		$("#updateShelf").on('submit', function(e){
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