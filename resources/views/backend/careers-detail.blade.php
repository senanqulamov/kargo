@extends('backend.layout.app')

@section('title', 'Careers Detail')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.human.careers.index')}}">Careers</a></li>
@endsection

@section('content')
<div class="row">							
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">List of CV</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>CV <i class="fas fa-paperclip"></i></th>
						</tr>
					</thead>
					<tbody>
					@foreach($applies as $apply)
					<tr>
						<td>{{$apply->fullname}}</td>
						<td>{{$apply->email}}</td>
						<td>{{$apply->message}}</td>
						<td class="text-center"><a href="{{route('admin.human.careers.download', $apply->cvFile)}}">{{$apply->cvFile}}</a></td>
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