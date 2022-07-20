@extends('backend.layout.app')

@section('title', 'Payments')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                backdrop: false,
                timer: 2000
            })
        </script>
    @endif

    <style>
        .user_link_w_eye {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .approvel-td {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Approval Status</th>
                                <th>Deny message</th>
                                <th>Method</th>
                                <th>Money Type</th>
                                <th>Amount</th>
                                <th>Comission</th>
                                <th>Kur</th>
                                <th>Document</th>
                                <th>Payment Comment</th>
                                <th>Created at</th>
                                <th width="100">Edit</th>
                                <th>Deny/Accept</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    @php
                                        $user = DB::table('users')
                                            ->where('id', $payment->userID)
                                            ->first();
                                    @endphp
                                    <td>
                                        <a class="btn btn-info user_link_w_eye"
                                            href="{{ route('admin.users.details', $user->id) }}">
                                            {{ $user->name }}
                                            <i class="fa-solid fa-up-right-from-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="approvel-td">
                                            @if ($payment->payment_status == '0')
                                                <span class="badge rounded-pill bg-warning">Pending</span>
                                            @elseif ($payment->payment_status == '1')
                                                <span class="badge rounded-pill bg-danger">Denied</span>
                                            @else
                                                <span class="badge rounded-pill bg-success">Approved</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td><b>{{ $payment->deny_message }}</b></td>
                                    <td>{{ $payment->method }}</td>
                                    <td>{{ $payment->money_type }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->comission }}</td>
                                    <td>{{ $payment->kur }}</td>
                                    <td>
                                        <a href="/files/payments/{{ $payment->document }}" target="_blank">
                                            {{-- <img src="/files/payments/{{ $payment->document }}" class="img-fluid"
                                                width="100" height="100" alt=""> --}}
                                            <button class="btn status" type="button"><i
                                                    class="fa-solid fa-eye"></i></button>
                                        </a>
                                    </td>
                                    <td>{{ $payment->payment_comment }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-dark" data-toggle="modal"
                                            data-target="#modal-edit-{{ $payment->id }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        @if ($payment->payment_status != '1')
                                            <a href="#" onclick="denyPayment(this)" class="btn btn-danger"
                                                data-payment-id="{{ $payment->id }}"><i
                                                    class="fa-solid fa-square-xmark"></i></a>
                                        @endif
                                        @if ($payment->payment_status != '2')
                                            <a href="#" onclick="approvePayment(this)"
                                                class="btn btn-success cardcredit"
                                                data-payment-id="{{ $payment->id }}"><i
                                                    class="fa-solid fa-check-to-slot"></i></a>
                                        @endif
                                    </td>

                                    <div class="modal fade" id="modal-edit-{{ $payment->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Edit <b>{{ $user->name }}</b>'s Payment
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.payments.updatePayment') }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="payment_id"
                                                            value="{{ $payment->id }}">
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Payment method</label>
                                                                <input type="text" class="form-control" name="method"
                                                                    value="{{ $payment->method }}">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Amount</label>
                                                                <input type="number" class="form-control" name="amount"
                                                                    value="{{ $payment->amount }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Comission</label>
                                                                <input type="number" class="form-control" name="comission"
                                                                    value="{{ $payment->comission }}">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Money type
                                                                    ({{ $payment->money_type }})
                                                                </label>
                                                                <select name="money_type" class="form-control">
                                                                    <option value="tl">tl</option>
                                                                    <option value="euro">Euro</option>
                                                                    <option value="usd">USD</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
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
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter customer transaction code">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">IBAN Number</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter customer transaction code">
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
    <script>
        function denyPayment(button) {
            var id = button.getAttribute('data-payment-id');

            Swal.fire({
                title: "Deny Message",
                text: "Write something for deny:",
                input: 'text',
                showCancelButton: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '/admin/payments/denyPayment',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id,
                            payment_status: 1,
                            deny_message: result.value
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                backdrop: false,
                                timer: 2000
                            })
                        }
                    });
                }
            });
        }

        function approvePayment(button) {
            var id = button.getAttribute('data-payment-id');

            $.ajax({
                type: 'POST',
                url: '/admin/payments/approvePayment',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    payment_status: 2
                },
                success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        backdrop: false,
                        timer: 2000
                    })
                }
            });
        }
    </script>
@endsection
