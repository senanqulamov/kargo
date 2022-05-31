@extends('backend.layout.app')

@section('title', 'Warehouses')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#modalBarcode">Scan Barcode</button>
	</div>
</div>						
<div class="row">
	<div class="col-12">
		<div class="card">
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Width, Height, Weight, Lenght</th>
							<th>Barcode</th>
							<th>Status</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						@foreach($packages as $package)
						<tr>
							<td>Width: {{$package->width}}, Length: {{$package->length}}, Weight: {{$package->weight}}, Height: {{$package->height}}</td>
							<td>{{$package->barcode}}</td>
							<td><span class="text-success">Approve</span></td>
							<td>
								<button type="button" class="btn btn-primary mb-4 edit_btn" id="{{$package->id}}"><i class="fas fa-edit"></i></button>
								<button type="button" class="btn btn-default mb-4" data-toggle="modal" data-target="#modalSort"><i class="fas fa-sort"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
	<!-- /.col -->
</div>
<div class="modal fade" id="modalBarcode">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Barcode Scan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{route('admin.warehouses.create')}}" autocomplete="off" id="insertWareHouse">
					@csrf
					<div class="form-group">
						<label for="inputBarcode">Barcode</label>
						<input type="text" class="form-control" id="inputBarcode" placeholder="Enter package barcode" name="inputBarcode">
						<span class="text-danger error-text inputBarcode_error"></span>
					</div>
					<div class="d-none" id="table_section">
						<table class="table mb-0" id="tableCompany"></table>
					</div>					
					<div class="form-group mt-4">
						<button type="submit" class="btn btn-primary">Place</button>
					</div>
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
				<h4 class="modal-title">Order Edit</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.warehouses.update')}}" method="post" id="formUpdate" autocomplete="off">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="inputWeight">Weight</label>
						<input type="text" class="form-control" id="inputWeight" placeholder="Enter package weight" name="inputWeight">
						<span class="text-danger error-text inputWeight_error"></span>
					</div>
					<div class="form-group">
						<label for="inputHeight">Height</label>
						<input type="text" class="form-control" id="inputHeight" placeholder="Enter package height" name="inputHeight">
						<span class="text-danger error-text inputHeight_error"></span>
					</div>
					<div class="form-group">
						<label for="inputWidth">Width</label>
						<input type="text" class="form-control" id="inputWidth" placeholder="Enter package width" name="inputWidth">
						<span class="text-danger error-text inputWidth_error"></span>
					</div>
					<div class="form-group">
						<label for="inputLength">Length</label>
						<input type="text" class="form-control" id="inputLength" placeholder="Enter package length" name="inputLength">
						<span class="text-danger error-text inputLength_error"></span>
					</div>
					<input type="hidden" name="hiddenID" id="hiddenID">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modalSort">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Order Sort</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="inputPassword3">Weight</label>
						<input type="text" class="form-control" id="inputPassword3" placeholder="Password" value="125.5">
					</div>
					<div class="form-group">
						<label for="inputPassword3">Height</label>
						<input type="text" class="form-control" id="inputPassword3" placeholder="Password" value="185.5">
					</div>
					<div class="form-group">
						<label for="inputPassword3">Width</label>
						<input type="text" class="form-control" id="inputPassword3" placeholder="Password" value="25.5">
					</div>
					<div class="form-group">
						<label for="inputPassword3">Length</label>
						<input type="text" class="form-control" id="inputPassword3" placeholder="Password" value="12.5">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Place</button>
					</div>
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
		$("#inputBarcode").change(function(){
			var id_data=$(this).val();

			$.ajax({
                type:"GET",
				data:{id:id_data},
				url:"{{route('admin.warehouses.search')}}",
                success:function(response){
					if(response.data == null){
						$("#table_section").addClass("d-none");
					} else {
						$("#table_section").removeClass("d-none");
						
						$('#tableCompany').text(' ');
						var trHTML = '';
						trHTML += '<tr><td class="border-top-0 border-bottom"><b>Barcode:</b></td><td class="border-top-0 border-bottom">'+response.data.barcode+'</td></tr>';
						trHTML += '<tr><td class="border-top-0 border-bottom"><b>Length:</b></td><td class="border-top-0 border-bottom">'+response.data.length+'</td></tr>';			
						trHTML += '<tr><td class="border-top-0 border-bottom"><b>Weight:</b></td><td class="border-top-0 border-bottom">'+response.data.weight+'</td></tr>';			
						trHTML += '<tr><td class="border-top-0 border-bottom"><b>Width:</b></td><td class="border-top-0 border-bottom">'+response.data.width+'</td></tr>';		
						trHTML += '<tr><td class="border-top-0 border-bottom"><b>Height:</b></td><td class="border-top-0 border-bottom">'+response.data.height+'</td></tr>';
						$('#tableCompany').append(trHTML);
					}
                }
            });
		});
		
		$("#insertWareHouse").on('submit', function(e){
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
					} else {
						toastr.success(data.msg, data.state);
						$("#modalBarcode").modal().hide();
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				}
			});
		});
		
		$(".edit_btn").click(function(){
            var id_data=$(this).attr('id');
            $("#editModal").modal('show');

            $.ajax({
                type:"GET",
				data:{id:id_data},
				url:"{{route('admin.warehouses.edit')}}",
                success:function(response){
                    $("#inputWeight").val(response.data.weight);
                    $("#inputHeight").val(response.data.height);
                    $("#inputWidth").val(response.data.width);
                    $("#inputLength").val(response.data.length);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });
		
		$("#formUpdate").on('submit', function(e){
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
	});
</script>
@endsection

