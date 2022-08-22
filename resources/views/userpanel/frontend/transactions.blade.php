@extends('userpanel.layout.layout')

@section('content')
    <section>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Money transactions History</h3>
            </div>
            <div class="payments_table_div card-body">
                <table id="transaction_history" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
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
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $("#transaction_history")
                .DataTable({
                    order: [
                        [0, 'desc']
                    ],
                    responsive: false,
                    lengthChange: false,
                    autoWidth: true,
                    scrollY: "50vh",
                    scrollCollapse: true,
                    paging: false,
                    scrollX: true,
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
        })
    </script>
@endsection