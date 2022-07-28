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
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-new">Add New <i
                            class="fas fa-add"></i></a>
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
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
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.users.details', $payment->userID) }}')">
                                                010{{ $payment->userID ? $payment->userID : '---' }}20
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $user->name }}
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
                                    @php
                                        $method = DB::table('comissions')
                                            ->where('payment', $payment->method)
                                            ->first();
                                    @endphp
                                    <td>
                                        @if ($method)
                                            {{ $method->show_name }}
                                        @else
                                            ---
                                        @endif
                                    </td>
                                    <td>{{ $payment->money_type }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->comission }}</td>
                                    <td>{{ $payment->kur }}</td>
                                    <td>
                                        <a href="/files/payments/{{ $payment->document }}" target="_blank">
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
                                                class="btn btn-success cardcredit" data-payment-id="{{ $payment->id }}"><i
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
                                                                @php
                                                                    $methods = DB::table('comissions')->get();
                                                                @endphp
                                                                <select name="method" class="form-control">
                                                                    @foreach ($methods as $method)
                                                                        <option value="{{ $method->payment }}"
                                                                            @if ($method->payment == $payment->method) selected @endif>
                                                                            {{ $method->show_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Amount</label>
                                                                <input type="text" class="form-control" name="amount"
                                                                    value="{{ $payment->amount }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Comission</label>
                                                                <input type="text" class="form-control" name="comission"
                                                                    value="{{ $payment->comission }}">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Money type
                                                                </label>
                                                                <select name="money_type" class="form-control">
                                                                    <option value="tl"
                                                                        @if ($payment->money_type == 'tl') selected @endif>Tl
                                                                    </option>
                                                                    <option value="euro"
                                                                        @if ($payment->money_type == 'euro') selected @endif>
                                                                        Euro</option>
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


    <div class="modal fade" id="modal-add-new">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.payments.addpayment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1">User ID</label>
                                @php
                                    $users = DB::table('users')->get();
                                @endphp
                                <select name="user_id" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">010{{ $user->id }}20 |
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Payment method</label>
                                <select name="method" id="calculate_method" class="form-control"
                                    onchange="calculateComission()">
                                    <option value="" selected disabled>Select method</option>
                                    @foreach ($methods as $method)
                                        <option value="{{ $method->payment }}"
                                            data-comission="{{ $method->comission }}">
                                            {{ $method->show_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Money type</label>
                                <select name="money_type" class="form-control" onchange="calculateComission()"
                                    id="calculate_money_type">
                                    <option value="" selected disabled>Select Money type</option>
                                    <option value="tl">Tl</option>
                                    <option value="euro">Euro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Amount</label>
                                <input type="number" class="form-control" name="amount"
                                    onchange="calculateComission()" id="calculate_amount">
                            </div>
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Comission</label>
                                <input type="text" class="form-control" name="comission" id="calculate_comission"
                                    readonly>
                            </div>
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Kur</label>
                                <input type="text" class="form-control" name="kur" value="{{ $kur }}"
                                    id="calculate_kur" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Payment Image</label>
                                <input type="file" class="form-control" name="document">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <textarea name="payment_comment" cols="60" rows="5" placeholder="Payment Commentss"></textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Add New Payment</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script>
        function denyPayment(button) {
            var id = button.getAttribute('data-payment-id');

            Swal.fire({
                title: "Deny Message",
                text: "Write something for deny:",
                input: 'text',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.payments.denyPayment') }}',
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
                            window.location.reload();
                        }
                    });
                }
            });
        }

        function approvePayment(button) {
            var id = button.getAttribute('data-payment-id');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Accept',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.payments.approvePayment') }}',
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
                            window.location.reload();
                        }
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Action cancelled',
                        'error'
                    )
                }
            })
        }
    </script>

    <script>
        function calculateComission() {
            var method_select = document.querySelector('#calculate_method');
            var method = method_select.options[method_select.selectedIndex];
            method = method.dataset.comission;

            var money_type = document.querySelector('#calculate_money_type').value;
            var amount = document.querySelector('#calculate_amount').value;
            var kur = document.querySelector('#calculate_kur').value;

            var comission = 0;

            if (money_type == "tl") {
                amount = parseFloat(amount / kur).toFixed(2);
            }
            comission = amount - (amount * method) / 100;

            document.querySelector('#calculate_comission').value = parseFloat(comission).toFixed(2);
        }
    </script>
@endsection
