@extends('backend.layout.app')

@section('title', 'Branches List')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Branches</h3>
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
                        <th>Status</th>
                        <th style="width:200px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                    <tr>
                        @php $country_title=DB::table('countries')->where('code', $branch->country)->first() @endphp
                        <td>{{$country_title->name}}</td>
                        <td>{{$branch->title}}</td>
                        <td>{{$branch->longitude}}</td>
                        <td>{{$branch->latitude}}</td>
                        <td>{{$branch->address}}</td>
                        <td class="text-center">
                            @if($branch->status != 1)
                            <a title="head office" href="{{route('admin.branches.change', $branch->id)}}" class="btn btn-success"><i class="fas fa-university"></i></a>
                            @endif
                        </td>
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
				<form action="{{route('admin.branches.update')}}" method="post" autocomplete="off" id="updateBranch">
					@csrf
                    @method('PUT')
					<!-- select -->
                    <div class="form-group">
                        <label for="selectCountry2">Country</label>
                        <select class="form-control" name="selectCountry2" id="selectCountry2">
							@foreach($countries as $country)
                            <option value="{{$country->code}}">{{$country->name}}</option>
							@endforeach
                        </select>
						<span class="text-danger error-text selectCountry2_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputTitle2">Title</label>
                        <input type="text" class="form-control" id="inputTitle2" placeholder="Enter branch title" name="inputTitle2">
						<span class="text-danger error-text inputTitle2_error"></span>
                    </div>
					<div class="form-group">
                        <label for="inputLongitude2">Longitude</label>
                        <input type="text" class="form-control" id="inputLongitude2" placeholder="Enter branch longitude" name="inputLongitude2">
						<span class="text-danger error-text inputLongitude2_error"></span>
                    </div>
					<div class="form-group">
                        <label for="inputLatitude2">Latitude</label>
                        <input type="text" class="form-control" id="inputLatitude2" placeholder="Enter branch latitude" name="inputLatitude2">
						<span class="text-danger error-text inputLatitude2_error"></span>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="textareaAddress2">Address</label>
                        <textarea class="form-control" rows="7" placeholder="Enter branch address..." name="textareaAddress2" id="textareaAddress2"></textarea>
						<span class="text-danger error-text textareaAddress2_error"></span>
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
                data:{id:id_data},
                url:"{{route('admin.branches.edit')}}",
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
		
		$("#updateBranch").on('submit', function(e){
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