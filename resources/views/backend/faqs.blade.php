@extends('backend.layout.app')

@section('title', 'FAQS')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-12 mb-4">
		@if(count($categories) > 0)
		<button type="button" class="btn btn-success"  style="float:left" data-toggle="modal" data-target="#faqsModal"><i class="fas fa-plus"></i> New FAQS</button>
		@endif
		<a href="{{route('admin.faqs.categories.index')}}" class="btn btn-primary" style="float:right"><i class="fas fa-plus"></i> New Category</a>									
	</div>
	
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of FAQS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Questions</th>
                            <th>Answers</th>
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach($faqs as $faq)
					<tr>
						@php $faqs_title=DB::table('faqs_categories')->where('id', $faq->categoryID)->first() @endphp
						<td>{{$faqs_title->title}}</td>
						<td>{{$faq->question}}</td>
						<td>{{$faq->answer}}</td>
						<td class="text-center">
							<button type="button" class="btn btn-primary edit_btn" value="{{$faq->id}}"><i class="fas fa-edit"></i></button>
							<a href="{{route('admin.faqs.delete', $faq->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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

@if(count($categories) > 0)
<div class="modal fade" id="faqsModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add FAQS</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.faqs.create')}}" method="post" autocomplete="off" id="insertFaqs">
					@csrf
					<!-- select -->
					<div class="form-group">
						<label for="selectCategory">Category</label>
						<select class="form-control" name="selectCategory" id="selectCategory">
							<option value="">Choose Category</option>
							@foreach($categories as $category)
							<option value="{{$category->id}}" {{ old("selectCategory") == $category->id ? "selected" : "" }} >{{$category->title}}</option>
							@endforeach
						</select>
						<span class="text-danger error-text selectCategory_error"></span>
					</div>
					<div class="form-group">
						<label for="inputQuestion">Question</label>
						<input type="text" class="form-control" id="inputQuestion" placeholder="Enter your question" name="inputQuestion" value="{{old('inputQuestion')}}">
						<span class="text-danger error-text inputQuestion_error"></span>
					</div>
					<!-- select -->
					<div class="form-group">
						<label for="selectLocation">Location</label>
						<select class="form-control" name="selectLocation" id="selectLocation">
							<option value="">Choose Location</option>
							<option value="left" {{ old("selectLocation") == "left" ? "selected" : "" }} >Left</option>
							<option value="right" {{ old("selectLocation") == "right" ? "selected" : "" }} >Right</option>
						</select>
						<span class="text-danger error-text selectLocation_error"></span>
					</div>
					<!-- textarea -->
					<div class="form-group">
						<label for="textareaAnswer">Answer</label>
						<textarea class="form-control" rows="7" placeholder="Enter your answer..." name="textareaAnswer" id="textareaAnswer">{{old('textareaAnswer')}}</textarea>
						<span class="text-danger error-text textareaAnswer_error"></span>
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
@endif

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
							@foreach($categories as $category)
							<option value="{{$category->id}}" >{{$category->title}}</option>
							@endforeach
                        </select>
						<span class="text-danger error-text selectCategory2_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputQuestion2">Question</label>
                        <input type="text" class="form-control" id="inputQuestion2" placeholder="Enter your question" name="inputQuestion2">
						<span class="text-danger error-text inputQuestion2_error"></span>
                    </div>
					<!-- select -->
					<div class="form-group">
						<label for="selectLocation2">Location</label>
						<select class="form-control" name="selectLocation2" id="selectLocation2">
							<option value="">Choose Location</option>
							<option value="left" {{ old("selectLocation2") == "left" ? "selected" : "" }} >Left</option>
							<option value="right" {{ old("selectLocation2") == "right" ? "selected" : "" }} >Right</option>
						</select>
						<span class="text-danger error-text selectLocation2_error"></span>
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
                    $("#selectCategory2").val(response.data.categoryID);
                    $("#inputQuestion2").val(response.data.question);
                    $("#textareaAnswer2").val(response.data.answer);
					$("#selectLocation2").val(response.data.location);
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