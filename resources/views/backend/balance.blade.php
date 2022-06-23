@extends('backend.layout.app')

@section('title', 'Balance')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Customer</th>
							<th>Balance</th>
							<th width="130">Deny/Accept</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->name}}</td>
							<td>{{$user->balance}} &euro;</td>
							<td>

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

<div class="modal fade" id="modal-refund">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Refund Payment</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="exampleInputEmail1">Account Number</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter customer transaction code">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">IBAN Number</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter customer transaction code">
					</div>
					<div class="text-right">
						<button type="submit" class="btn btn-primary">Send</button>
					</div>

				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modalCard">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Card Details</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table mb-0">
					<tr>
						<td class="border-top-0 border-bottom"><b>Card Number:</b></td>
						<td class="border-top-0 border-bottom"><span id="number"></span></td>
					</tr>
					<tr>
						<td class="border-top-0 border-bottom"><b>Expired:</b></td>
						<td class="border-top-0 border-bottom"><span id="expired"></span></td>
					</tr>
					<tr>
						<td class="border-top-0 border-bottom"><b>CVV:</b></td>
						<td class="border-top-0 border-bottom"><span id="cvv"></span></td>
					</tr>
					<tr>
						<td class="border-top-0 border-bottom"><b>Card Holder:</b></td>
						<td class="border-top-0 border-bottom"><span id="holder"></span></td>
					</tr>
				</table>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('js')
{{-- <script>
	$(function(){
		$(".cardcredit").click(function(){
            var id_data=$(this).attr("data-id");
            $("#modalCard").modal('show');

            $.ajax({
                type:"GET",
				data:{id:id_data},
				url:"{{route('admin.balance.cards')}}",
                success:function(response){
                    $("#number").text(response.data.cardnumber);
                    $("#expired").text(response.data.expired);
                    $("#cvv").text(response.data.cvv);
                    $("#holder").text(response.data.holder);
                }
            });
        });
	})
</script> --}}
@endsection
