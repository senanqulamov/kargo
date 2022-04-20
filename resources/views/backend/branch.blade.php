@extends('backend.layout.app')

@section('title', 'Branches')

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
                <h3 class="card-title">Add Branch</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.branches.create')}}" method="post" autocomplete="off">
                @csrf
                <div class="card-body">
                    <!-- select -->
                    <div class="form-group">
                        <label for="selectCountry">Country</label>
                        <select class="form-control" name="selectCountry" id="selectCountry" value="{{old('selectCountry')}}">
                            <option value="">Choose Country</option>
                            <option value="1">option 2</option>
                            <option value="2">option 3</option>
                            <option value="3">option 4</option>
                            <option value="4">option 5</option>
                        </select>
                        <span class="text-danger">@error('selectCountry') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control" id="inputTitle" placeholder="Enter branch title" name="inputTitle" value="{{old('inputTitle')}}">
						<span class="text-danger">@error('inputTitle') {{ $message }} @enderror</span>
                    </div>
					<div class="form-group">
                        <label for="inputLongitude">Longitude</label>
                        <input type="text" class="form-control" id="inputLongitude" placeholder="Enter branch longitude" name="inputLongitude" value="{{old('inputLongitude')}}">
						<span class="text-danger">@error('inputLongitude') {{ $message }} @enderror</span>
                    </div>
					<div class="form-group">
                        <label for="inputLatitude">Latitude</label>
                        <input type="text" class="form-control" id="inputLatitude" placeholder="Enter branch latitude" name="inputLatitude" value="{{old('inputLatitude')}}">
						<span class="text-danger">@error('inputLatitude') {{ $message }} @enderror</span>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaAddress">Address</label>
                        <textarea class="form-control" rows="7" placeholder="Enter branch address..." name="textareaAddress" id="textareaAddress">{{old('textareaAddress')}}</textarea>
						<span class="text-danger">@error('textareaAddress') {{ $message }} @enderror</span>
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
                            <th>Country</th>
                            <th>Title</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Address</th>
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr>
                            <td>{{$branch->country}}</td>
                            <td>{{$branch->title}}</td>
                            <td>{{$branch->longitude}}</td>
                            <td>{{$branch->latitude}}</td>
                            <td>{{$branch->address}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary edit_btn" value="{{$branch->id}}"><i class="fas fa-edit"></i></button>
                                <a href="{{route('admin.branches.delete', $branch->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
				<h4 class="modal-title">Update Branch</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('admin.branches.update')}}" method="post" autocomplete="off">
					@csrf
                    @method('PUT')
					<!-- select -->
                    <div class="form-group">
                        <label for="selectCountry2">Country</label>
                        <select class="form-control" name="selectCountry" id="selectCountry2">
                            <option value="">Choose Country</option>
                            <option value="1">option 2</option>
                            <option value="2">option 3</option>
                            <option value="3">option 4</option>
                            <option value="4">option 5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle2">Title</label>
                        <input type="text" class="form-control" id="inputTitle2" placeholder="Enter branch title" name="inputTitle">
						<span class="text-danger">@error('inputTitle') {{ $message }} @enderror</span>
                    </div>
					<div class="form-group">
                        <label for="inputLongitude2">Longitude</label>
                        <input type="text" class="form-control" id="inputLongitude2" placeholder="Enter branch longitude" name="inputLongitude">
						<span class="text-danger">@error('inputLongitude') {{ $message }} @enderror</span>
                    </div>
					<div class="form-group">
                        <label for="inputLatitude2">Latitude</label>
                        <input type="text" class="form-control" id="inputLatitude2" placeholder="Enter branch latitude" name="inputLatitude">
						<span class="text-danger">@error('inputLatitude') {{ $message }} @enderror</span>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaAddress2">Address</label>
                        <textarea class="form-control" rows="7" placeholder="Enter branch address..." name="textareaAddress" id="textareaAddress2"></textarea>
						<span class="text-danger">@error('textareaAddress') {{ $message }} @enderror</span>
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
                url:"/admin/branches/edit/"+id_data,
                success:function(response){
                    $("#selectCountry2").val(response.data.country);
                    $("#inputTitle2").val(response.data.title);
                    $("#inputLongitude2").val(response.data.longitude);
                    $("#inputLatitude2").val(response.data.latitude);
                    $("#textareaAddress2").val(response.data.address);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });
	})
</script>
@endsection