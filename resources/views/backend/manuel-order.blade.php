@extends('backend.layout.app')

@section('title', 'Orders Manager')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
 <div class="row">
	<div class="col-md-6 col-lg-4 col-xl-3">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>1500 EUR</h3>

				<p>Payment</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-md-6 col-lg-4 col-xl-3">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>50 EUR</h3>

				<p>Refund</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Customer</th>
							<th>Payment</th>
							<th>Status</th>
							<th>Transaction</th>
							<th>Status</th>
							<th width="130"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Rashad Alakbarov</td>
							<td>250 USD</td>
							<td>Paypal</td>
							<td>55d28d25dedse</td>
							<td><span class="text-success">Approve</span></td>
							<td>
								<a href="#" class="btn btn-dark" data-toggle="modal" data-target="#modal-refund"><i class="fas fa-sync"></i></a>
								<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-card"><i class="fas fa-credit-card"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
@endsection