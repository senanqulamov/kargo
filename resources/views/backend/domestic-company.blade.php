@extends('backend.layout.app')

@section('title', 'Domestic Companies')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-12 mb-4">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#domesticModal"><i class="fas fa-plus"></i> New Company</button>							
	</div>
	
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Companies</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:100px">Image</th>
                            <th>Company Name</th>
                            <th>Customer Code</th>
                            <th style="width:280px"></th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($domestics as $domestic)
					<tr>
						<td>
							@if($domestic->logo != '')
								<img src="{{asset('/')}}backend/assets/img/companies/domestic/{{$domestic->logo}}" alt="logo" width="60" height="60" class="mx-auto d-block">
							@else
								<img src="{{asset('/')}}backend/assets/img/icons/company.png" alt="logo" width="60" class="mx-auto d-block">
							@endif
						</td>
						<td>{{$domestic->name}}</td>
						<td>{{$domestic->customer_code}}</td>
						<td class="text-center">
							<button type="button" class="btn btn-primary edit_btn" value="{{$domestic->id}}"><i class="fas fa-edit"></i></button>
							<a href="{{route('admin.companies.domestic.delete', $domestic->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

<div class="modal fade" id="domesticModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.companies.domestic.create')}}" method="post" autocomplete="off" id="insertDomestic" enctype="multipart/from-data">
					@csrf
					<div class="form-group">
						<label for="inputName">Name</label>
						<input type="text" class="form-control" id="inputName" placeholder="Enter company name" name="inputName" value="{{old('inputName')}}">
						<span class="text-danger error-text inputName_error"></span>
					</div>
					
					<div class="form-group">
						<label for="inputCustomerCode">Customer Code</label>
						<input type="text" class="form-control" id="inputCustomerCode" placeholder="Enter your customer code" name="inputCustomerCode" value="{{old('inputCustomerCode')}}">
						<span class="text-danger error-text inputCustomerCode_error"></span>
					</div>
					
					<div class="form-group">
						<label for="fileLogo">Logo</label>
						<input type="file" class="form-control" id="fileLogo" name="fileLogo">
						<span class="text-danger error-text fileLogo_error"></span>
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
				<form action="{{route('admin.companies.domestic.update')}}" method="post" autocomplete="off" id="updateDomestic" enctype="multipart/from-data">
					@csrf
                    @method('PUT')
					<div class="form-group">
						<label for="inputName2">Name</label>
						<input type="text" class="form-control" id="inputName2" placeholder="Enter company name" name="inputName2" value="{{old('inputName2')}}">
						<span class="text-danger error-text inputName2_error"></span>
					</div>
					
					<div class="form-group">
						<label for="inputCustomerCode2">Customer Code</label>
						<input type="text" class="form-control" id="inputCustomerCode2" placeholder="Enter your customer code" name="inputCustomerCode2" value="{{old('inputCustomerCode2')}}">
						<span class="text-danger error-text inputCustomerCode2_error"></span>
					</div>
					
					<div class="form-group">
						<label for="fileLogo2">Logo</label>
						<input type="file" class="form-control" id="fileLogo2" name="fileLogo2">
						<span class="text-danger error-text fileLogo2_error"></span>
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
		$("#insertDomestic").on('submit', function(e){
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
						$("#domesticModal").modal().hide();
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
				url:"{{route('admin.companies.domestic.edit')}}",
                success:function(response){
                    $("#inputName2").val(response.data.name);
                    $("#inputCustomerCode2").val(response.data.customer_code);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });

		$("#updateDomestic").on('submit', function(e){
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

		$("#uploadExcel").on('submit', function(e){
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
						$("#modalExcel").modal().hide();
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