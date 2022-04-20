@extends('backend.layout.app')

@section('title', 'FAQS')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-5">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add FAQS</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.faqs.create')}}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <!-- select -->
                    <div class="form-group">
                        <label for="selectCategory">Category</label>
                        <select class="form-control" name="selectCategory" id="selectCategory">
                            <option value="">Choose Category</option>
                            <option value="1">option 2</option>
                            <option value="2">option 3</option>
                            <option value="3">option 4</option>
                            <option value="4">option 5</option>
                        </select>
                        <span class="text-danger">@error('selectCategory') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="inputQuestion">Question</label>
                        <input type="text" class="form-control" id="inputQuestion" placeholder="Enter your question" name="inputQuestion" value="{{old('inputQuestion')}}">
						<span class="text-danger">@error('inputQuestion') {{ $message }} @enderror</span>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaAnswer">Answer</label>
                        <textarea class="form-control" rows="7" placeholder="Enter your answer..." name="textareaAnswer" id="textareaAnswer">{{old('textareaAnswer')}}</textarea>
						<span class="text-danger">@error('textareaAnswer') {{ $message }} @enderror</span>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
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
                            <td>{{$faq->category}}</td>
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
				<form action="{{route('admin.faqs.update')}}" method="post" autocomplete="off">
					@csrf
                    @method('PUT')
					<!-- select -->
                    <div class="form-group">
                        <label for="selectCategory2">Category</label>
                        <select class="form-control" name="selectCategory" id="selectCategory2">
                            <option value="">Choose Category</option>
                            <option value="1">option 2</option>
                            <option value="2">option 3</option>
                            <option value="3">option 4</option>
                            <option value="4">option 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputQuestion2">Question</label>
                        <input type="text" class="form-control" id="inputQuestion2" placeholder="Enter your question" name="inputQuestion">
						<span class="text-danger">@error('inputQuestion') {{ $message }} @enderror</span>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaAnswer2">Answer</label>
                        <textarea class="form-control" rows="7" placeholder="Enter your answer..." name="textareaAnswer" id="textareaAnswer2"></textarea>
						<span class="text-danger">@error('textareaAnswer') {{ $message }} @enderror</span>
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
		$(".edit_btn").click(function(){
            var id_data=$(this).val();
            $("#editModal").modal('show');

            $.ajax({
                type:"GET",
                url:"/admin/faqs/edit/"+id_data,
                success:function(response){
                    $("#selectCategory2").val(response.data.category);
                    $("#inputQuestion2").val(response.data.question);
                    $("#textareaAnswer2").val(response.data.answer);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });
	})
</script>
@endsection