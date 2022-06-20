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
							<th>ID</th>
							<th>Payment</th>
							<th>Comission</th>
							<th width="130"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($comissions as $comission)
						<tr>
							<td>{{$comission->id}}</td>
							<td>{{$comission->payment}}</td>
							<td>{{$comission->comission}} &euro;</td>
							<td>
								<a href="#" class="btn btn-dark" data-toggle="modal" data-target="#modal-refund"><i class="fas fa-sync"></i></a>
								<a href="#" class="btn btn-success cardcredit" data-id=""><i class="fas fa-credit-card"></i></a>
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
