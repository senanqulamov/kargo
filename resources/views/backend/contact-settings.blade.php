@extends('backend.layout.app')

@section('title', 'Service Category')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.messages.inbox')}}">Inbox</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-xl-4">
        <div class="row">
            <div class="col-md-6 col-xl-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.messages.settings.create')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="inputCategory">Category Name</label>
                                <input type="text" class="form-control" id="inputCategory" placeholder="Enter category name" name="inputCategory">
                                <span class="text-danger">@error('inputCategory') {{ $message }} @enderror</span>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.messages.settings.update')}}" method="post" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputCategory2">Category Name</label>
                                <input type="text" class="form-control" id="inputCategory2" placeholder="Enter category name" name="inputCategory2">
                                <span class="text-danger">@error('inputCategory2') {{ $message }} @enderror</span>
                            </div>
                            
                            <input type="hidden" name="hiddenID" id="hiddenID">

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
	
    <div class="col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th style="width:150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary edit_btn" value="{{$category->id}}"><i class="fas fa-edit"></i></button>
                                <a href="{{route('admin.messages.settings.delete', $category->id)}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
@endsection

@section('js')
<script>
	$(function(){
		$(".edit_btn").click(function(){
            var id_data=$(this).val();

            $.ajax({
                type:"GET",
                data:{id:id_data},
                url:"{{route('admin.messages.settings.edit')}}",
                success:function(response){
                    $("#inputCategory2").val(response.data.title);
                    $("#hiddenID").val(response.data.id);
                }
            });
        });
	})
</script>
@endsection