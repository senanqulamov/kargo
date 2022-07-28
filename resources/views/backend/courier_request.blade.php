@extends('backend.layout.app')

@section('title', 'Courier Requests')

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
                timer: 3000,
                timerProgressBar: true
            })
        </script>
    @endif

    <style>
        .cancelled-courier-req {
            background: #f8676752 !important;
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
                    <a href="#" class="btn btn-success disabled" data-toggle="modal" data-target="#modal-add-new">
                        Add New
                        <i class="fas fa-add"></i>
                    </a>
                    <table id="example1" class="table table-bordered table-striped" style="with:100%;">
                        <thead>
                            <tr>
                                <th>Edit/View</th>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Orders</th>
                                <th>Courier</th>
                                <th>User</th>
                                <th>Customer name</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>ZipCode</th>
                                <th>Note</th>
                                <th>Date</th>
                                <th>Deny/Accept</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courier_requests as $cr_req)
                                <tr @if ($cr_req->status == 'cancelled') class="cancelled-courier-req" @endif>
                                    <td>
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-edit-{{ $cr_req->id }}">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </td>
                                    <td>{{ $cr_req->id ? $cr_req->id : '---' }}</td>
                                    <td>
                                        <div class="approvel-td">
                                            @if ($cr_req->status == 'pending')
                                                <span class="badge rounded-pill bg-info">Pending</span>
                                            @elseif ($cr_req->status == 'cancelled')
                                                <span class="badge rounded-pill bg-danger">Cancelled</span>
                                            @elseif ($cr_req->status == 'accepted')
                                                <span class="badge rounded-pill bg-warning">Accepted</span>
                                            @elseif ($cr_req->status == 'done')
                                                <span class="badge rounded-pill bg-success">Courier Collected</span>
                                            @endif
                                        </div>
                                    </td>
                                    @php
                                        $courier_orders = json_decode($cr_req->orders);
                                    @endphp
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($courier_orders)
                                                @foreach ($courier_orders as $courier_order)
                                                    <span class="badge rounded-pill bg-info user_id_badge"
                                                        onclick="window.open('{{ route('admin.cargo-requests.cargo_details', $courier_order) }}' , '_self')">
                                                        {{ $courier_order }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span class="badge rounded-pill bg-danger user_id_badge">
                                                    None
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    @php
                                        $courier = DB::table('users')
                                            ->where('id', $cr_req->courier_id)
                                            ->first();
                                    @endphp
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($courier)
                                                <span class="badge rounded-pill bg-info user_id_badge"
                                                    onclick="window.open('{{ route('admin.users.details', $courier->id) }}' , '_self')">
                                                    {{ $courier->name }} : 010{{ $courier->id }}20
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-warning user_id_badge">
                                                    Not Settled
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($cr_req->user_id)
                                                <span class="badge rounded-pill bg-info user_id_badge"
                                                    onclick="window.open('{{ route('admin.users.details', $cr_req->user_id) }}' , '_self')">
                                                    010{{ $cr_req->user_id }}20
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-warning user_id_badge">
                                                    Not Settled
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $cr_req->customer_name ? $cr_req->customer_name : '---' }}</td>
                                    <td>{{ $cr_req->phone ? $cr_req->phone : '---' }}</td>
                                    <td>{{ $cr_req->city ? $cr_req->city : '---' }}</td>
                                    <td>{{ $cr_req->country ? $cr_req->country : '---' }}</td>
                                    <td>{{ $cr_req->address ? $cr_req->address : '---' }}</td>
                                    <td>{{ $cr_req->zipcode ? $cr_req->zipcode : '---' }}</td>
                                    <td>{{ $cr_req->note ? $cr_req->note : '---' }}</td>
                                    <td>{{ $cr_req->date ? $cr_req->date : '---' }}</td>
                                    <td>
                                        @if ($cr_req->status != 'cancelled')
                                            <a href="#" onclick="requestAction(this)" class="btn btn-danger"
                                                data-request-id="{{ $cr_req->id }}" data-status="cancelled">
                                                <i class="fa-solid fa-square-xmark"></i>
                                            </a>
                                        @endif
                                        @if ($cr_req->status != 'accepted' && $courier_orders)
                                            <a href="#" onclick="requestAction(this)" class="btn btn-success"
                                                data-request-id="{{ $cr_req->id }}" data-status="accepted">
                                                <i class="fa-solid fa-check-to-slot"></i>
                                            </a>
                                        @endif
                                    </td>

                                    <div class="modal fade" id="modal-edit-{{ $cr_req->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit/View :
                                                        {{ $cr_req->id ? $cr_req->id : '---' }} </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('admin.cargo-requests.update_courier_request') }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="text" name="id" value="{{ $cr_req->id }}"
                                                            hidden>
                                                        <div class="row">
                                                            <div class="col form-group">
                                                                @php
                                                                    $couriers = DB::table('users')
                                                                        ->where('user_role', 2)
                                                                        ->get();
                                                                @endphp
                                                                <label for="courier">Courier</label>
                                                                <select name="courier_id" class="form-control">
                                                                    <option value="" selected disabled>Select Courier
                                                                    </option>
                                                                    @foreach ($couriers as $courier)
                                                                        <option value="{{ $courier->id }}"
                                                                            @if ($courier->id == $cr_req->courier_id) selected @endif>
                                                                            {{ $courier->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Order IDs</label>
                                                                    <div class="row">
                                                                        @if ($courier_orders)
                                                                            @foreach ($courier_orders as $key => $order)
                                                                                <div class="form-check col">
                                                                                    <input type="checkbox"
                                                                                        name="order_ids[]"
                                                                                        class="form-check-input"
                                                                                        id="checkbox-custom_0{{ $key }}{{ $order }}"
                                                                                        value="{{ $order }}"
                                                                                        checked />
                                                                                    <label
                                                                                        for="checkbox-custom_0{{ $key }}{{ $order }}"
                                                                                        style="user-select: none"
                                                                                        class="form-check-label">
                                                                                        {{ $order }}
                                                                                    </label>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <span
                                                                                class="badge rounded-pill bg-danger user_id_badge">
                                                                                None
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Contact person name<span
                                                                            class="red-1">*</span></label>
                                                                    <input type="text"
                                                                        class="form-control courier__select"
                                                                        value="{{ $cr_req->customer_name }}"
                                                                        name="customer_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Country<span class="red-1">*</span></label>
                                                                    @php
                                                                        $countries = DB::table('cargo_countries')->get();
                                                                    @endphp
                                                                    <select class="form-control" name="country">
                                                                        <option value="" selected disabled>Select
                                                                            Country</option>
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->country }}"
                                                                                @if ($cr_req->country == $country->country) selected @endif>
                                                                                {{ $country->country }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Phone Number<span
                                                                            class="red-1">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="phone" value="{{ $cr_req->phone }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>City<span class="red-1">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="city" value="{{ $cr_req->city }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Date<span class="red-1">*</span></label>
                                                                    <input type="date" class="form-control"
                                                                        name="date" value="{{ $cr_req->date }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Address<span class="red-1">*</span></label>
                                                                    <input type="address" class="form-control"
                                                                        name="address" value="{{ $cr_req->address }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">

                                                                <div class="form-group">
                                                                    <label>Note</label>
                                                                    <input class="form-control" type="text"
                                                                        name="note" value="{{ $cr_req->note }}">
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-6 col-12">

                                                                <div class="form-group">
                                                                    <label>Zip Code<span class="red-1">*</span></label>
                                                                    <input class="form-control" type="text"
                                                                        name="zipcode" value="{{ $cr_req->zipcode }}">
                                                                </div>

                                                            </div>
                                                            <div class="col-12">
                                                                <div class="d-flex justify-content-center mt-4">
                                                                    <button class="btn btn-success" type="submit">
                                                                        <i class="fa-solid fa-check me-2"></i>
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </div>
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

    <!-- /.modal -->

    <script>
        function requestAction(button) {
            var id = button.getAttribute('data-request-id');
            var status = button.getAttribute('data-status');

            Swal.fire({
                title: "Comment: ",
                input: 'text',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.cargo-requests.status_courier_request') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id,
                            status: status,
                            comment: result.value
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'info',
                                title: data,
                                showConfirmButton: false,
                                backdrop: true,
                                timer: 2000,
                                timerProgressBar: true
                            });

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        }
                    });
                }
            });
        }
    </script>
@endsection
