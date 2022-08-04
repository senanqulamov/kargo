@extends('backend.layout.app')

@section('title', 'Transactions')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Transaction</th>
                                <th>Old Balance</th>
                                <th>New Balance</th>
                                <th>Transfer method</th>
                                <th>Payment ID</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.users.details', $transaction->user_id) }}')">
                                                010{{ $transaction->user_id ? $transaction->user_id : '---' }}20
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($transaction->old_balance > $transaction->new_balance)
                                                <span class="badge rounded-pill bg-danger user_id_badge">
                                                    Money Out: {{ $transaction->new_balance - $transaction->old_balance }} €
                                                </span>
                                            @elseif ($transaction->old_balance < $transaction->new_balance)
                                                <span class="badge rounded-pill bg-success user_id_badge">
                                                    Money in {{ $transaction->new_balance - $transaction->old_balance }} €
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $transaction->old_balance }} €</td>
                                    <td>{{ $transaction->new_balance }} €</td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($transaction->transfer_method == 'Payment Deny' ||
                                                $transaction->transfer_method == 'Cargo payment returned for cancel')
                                                <span class="badge rounded-pill bg-warning user_id_badge">
                                                    {{ $transaction->transfer_method }}
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-info user_id_badge">
                                                    {{ $transaction->transfer_method }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $transaction->payment_id }}</td>
                                    <td>{{ $transaction->created_at }}</td>
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
