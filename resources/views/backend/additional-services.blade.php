@extends('backend.layout.app')

@section('title', 'Additional Services')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-12 mb-4">
		<button type="button" class="btn btn-success"  style="float:left" data-toggle="modal" data-target="#faqsModal"><i class="fas fa-plus"></i> New Service</button>					
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
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($services as $service)
					<tr>
						<td>{{$service->title}}</td>
						<td class="text-center">
							<button type="button" class="btn btn-primary edit_btn" value="{{$service->id}}"><i class="fas fa-edit"></i></button>
							<a href="{{route('admin.service.delete', $service->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

<div class="modal fade" id="faqsModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Service</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.faqs.create')}}" method="post" autocomplete="off" id="insertFaqs">
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
							<option value="desi" {{ old("selectType") == "desi" ? "selected" : "" }}>According to the DESI</option>
							<option value="box" {{ old("selectType") == "box" ? "selected" : "" }}>According to the box</option>
							<option value="product" {{ old("selectType") == "product" ? "selected" : "" }}>According to the product</option>
						</select>
						<span class="text-danger error-text selectType_error"></span>
					</div>
					<label for="selectType">Pricing</label>
					<div class="row">					
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="inputTitle" placeholder="Default" name="inputTitle" value="{{old('inputTitle')}}">
								<span class="text-danger error-text selectType_error"></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="inputTitle" placeholder="Standart" name="inputTitle" value="{{old('inputTitle')}}">
								<span class="text-danger error-text selectType_error"></span>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<input type="text" class="form-control" id="inputTitle" placeholder="Static" name="inputTitle" value="{{old('inputTitle')}}">
								<span class="text-danger error-text selectType_error"></span>
							</div>
						</div>
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
				<form action="{{route('admin.faqs.update')}}" method="post" autocomplete="off" id="updateFaqs">
					@csrf
                    @method('PUT')
					<!-- select -->
                    <div class="form-group">
                        <label for="selectCategory2">Category</label>
                        <select class="form-control" name="selectCategory2" id="selectCategory2">
							<option value="" >Ttile</option>
                        </select>
						<span class="text-danger error-text selectCategory2_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputQuestion2">Question</label>
                        <input type="text" class="form-control" id="inputQuestion2" placeholder="Enter your question" name="inputQuestion2">
						<span class="text-danger error-text inputQuestion2_error"></span>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaAnswer2">Answer</label>
                        <textarea class="form-control" rows="7" placeholder="Enter your answer..." name="textareaAnswer2" id="textareaAnswer2"></textarea>
						<span class="text-danger error-text textareaAnswer2_error"></span>
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
		$("#insertFaqs").on('submit', function(e){
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
						$("#faqsModal").modal().hide();
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

