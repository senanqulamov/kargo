@extends('backend.layout.app')

@section('title', 'Additional Services')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-12 mb-4">
		<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> New Service</button>
	</div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Services</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
							<th>Type</th>
							<th>Price</th>
							<th>Show</th>
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($services as $service)
					<tr>
						<td>{{$service->title}}</td>
						<td>{{$service->getTypeAttribute()}}</td>
						<td>{{$service->price}} EUR</td>
						<td>{{$service->show}}</td>
						<td class="text-center">
							<button type="button" class="btn btn-primary edit_btn" value="{{$service->id}}"><i class="fas fa-edit"></i></button>
							<a href="{{route('admin.services.delete', $service->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
				<h4 class="modal-title">Add Service</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.services.create')}}" method="post" autocomplete="off" id="insertForm">
					@csrf
					<div class="form-group">
						<label for="inputTitle">Title</label>
						<input type="text" class="form-control" id="inputTitle" placeholder="Enter your question" name="inputTitle" value="{{old('inputTitle')}}">
						<span class="text-danger error-text inputTitle_error"></span>
					</div>
					<!-- select -->
					<div class="form-group">
						<label for="selectType">Type</label>
						<select class="form-control" name="selectType" id="selectType">
							<option value="">Choose Type</option>
							<option value="1" {{ old("selectType") == "1" ? "selected" : "" }}>According to the DESI</option>
							<option value="2" {{ old("selectType") == "2" ? "selected" : "" }}>According to the Box</option>
							<option value="3" {{ old("selectType") == "3" ? "selected" : "" }}>According to the Product</option>
							<option value="4" {{ old("selectType") == "4" ? "selected" : "" }}>According to the Weight</option>
							<option value="5" {{ old("selectType") == "5" ? "selected" : "" }}>According to the Volume</option>
							<option value="6" {{ old("selectType") == "6" ? "selected" : "" }}>According to the Price</option>
						</select>
						<span class="text-danger error-text selectType_error"></span>
					</div>
					<div class="form-group">
						<label for="inputPrice">Price</label>
						<input type="text" class="form-control" id="inputPrice" placeholder="Price enter" name="inputPrice" value="{{old('inputPrice')}}">
						<span class="text-danger error-text inputPrice_error"></span>
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
				<h4 class="modal-title">Update Service</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.services.update')}}" method="post" autocomplete="off" id="updateService">
					@csrf
                    @method('PUT')
					<div class="form-group">
						<label for="inputTitle2">Title</label>
						<input type="text" class="form-control" id="inputTitle2" placeholder="Enter your question" name="inputTitle2" value="{{old('inputTitle2')}}">
						<span class="text-danger error-text inputTitle2_error"></span>
					</div>
					<!-- select -->
					<div class="form-group">
						<label for="selectType2">Type</label>
						<select class="form-control" name="selectType2" id="selectType2">
							<option value="">Choose Type</option>
							<option value="1" {{ old("selectType") == "1" ? "selected" : "" }}>According to the DESI</option>
							<option value="2" {{ old("selectType") == "2" ? "selected" : "" }}>According to the Box</option>
							<option value="3" {{ old("selectType") == "3" ? "selected" : "" }}>According to the Product</option>
							<option value="4" {{ old("selectType") == "4" ? "selected" : "" }}>According to the Weight</option>
							<option value="5" {{ old("selectType") == "5" ? "selected" : "" }}>According to the Volume</option>
							<option value="6" {{ old("selectType") == "6" ? "selected" : "" }}>According to the Price</option>
						</select>
						<span class="text-danger error-text selectType_error"></span>
					</div>
					<div class="form-group">
						<label for="inputPrice2">Price</label>
						<input type="text" class="form-control" id="inputPrice2" placeholder="Price enter" name="inputPrice2" value="{{old('inputPrice2')}}">
						<span class="text-danger error-text inputPrice2_error"></span>
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
<script>
	$(function(){
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
				url:"{{route('admin.services.edit')}}",
                success:function(response){
                    $("#inputTitle2").val(response.data.title);
                    $("#selectType2").val(response.data.status);
                    $("#inputPrice2").val(response.data.price);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });

		$("#updateService").on('submit', function(e){
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

