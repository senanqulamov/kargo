@extends('backend.layout.app')

@section('title', 'Cargo Details')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.cargo-requests.buyforme') }}">All orders</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cargo Details - {{ $cargo->order_type }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.cargo-requests.order_update', ['id' => $cargo->id]) }}" method="POST">
                        @csrf
                        <section class="container p-1">
                            <div class="border p-3">
                                <div class="row" style="gap: 10px;">
                                    <h4 class="package-id-style">
                                        Order number:
                                        <span>{{ $cargo->id }}</span>
                                    </h4>
                                    @if ($cargo->status != 'cancelled' && $cargo->status != 'payment')
                                        <a href="#" class="btn btn-danger" onclick="orderAction(this)"
                                            data-type="cancel" data-id="{{ $cargo->id }}">
                                            Cancel Order
                                        </a>
                                    @endif
                                    @if ($cargo->status != 'accepted' && $cargo->status != 'payment')
                                        <a href="#" class="btn btn-success" onclick="orderAction(this)"
                                            data-type="accept" data-id="{{ $cargo->id }}">
                                            Accept Order
                                        </a>
                                    @endif
                                </div>
                                <hr>
                                <h4 class="row align-items-center" style="gap: 10px;">
                                    Order status:
                                    @if ($cargo->status == 'pending')
                                        <span class="badge rounded-pill bg-info user_id_badge">Pending</span>
                                    @elseif ($cargo->status == 'cancelled')
                                        <span class="badge rounded-pill bg-danger user_id_badge">Cancelled</span>
                                    @elseif ($cargo->status == 'accepted')
                                        <span class="badge rounded-pill bg-warning user_id_badge">Accepted</span>
                                    @elseif ($cargo->status == 'payment')
                                        <span class="badge rounded-pill bg-success user_id_badge">Done</span>
                                    @endif
                                    Order Type: <b><u>{{ $cargo->order_type }}</u></b>
                                    Order By:
                                    <a href="{{ route('admin.users.details', $cargo->user_id) }}"
                                        class="badge rounded-pill bg-info user_id_badge" target="__blank">
                                        010{{ $cargo->user_id ? $cargo->user_id : '---' }}20
                                        <i class="fa-solid fa-up-right-from-square"></i>
                                    </a>
                                    <a href="{{ route('admin.cargo-requests.cargo_logs_with_id', $cargo->id) }}"
                                        class="badge rounded-pill bg-info user_id_badge">
                                        Cargo Logs
                                        <i class="fa-solid fa-up-right-from-square"></i>
                                    </a>
                                </h4>
                                <div class="col-4 d-flex flex-column py-3">
                                    <label for="tracking_number" class="labelCustom">Tracking Number</label>
                                    <input class="form-control" type="text" name="tracking_number"
                                        value="{{ $cargo->tracking_number }}" />
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="name" class="labelCustom">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $cargo->name }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="country" class="labelCustom">Country</label>
                                        @php
                                            $countries = DB::table('cargo_countries')->get();
                                        @endphp
                                        <select name="country" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->country }}"
                                                    @if ($country->country == $cargo->country) selected @endif>
                                                    {{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="state" class="labelCustom">State</label>
                                        <input class="form-control" type="text" name="state"
                                            value="{{ $cargo->state }}" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="city" class="labelCustom">City</label>
                                        <input class="form-control" type="text" name="city"
                                            value="{{ $cargo->city }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="address" class="labelCustom">Address</label>
                                        <input class="form-control" type="text" name="address"
                                            value="{{ $cargo->address }}" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="zipcode" class="labelCustom">Zip Code</label>
                                        <input class="form-control" type="text" name="zipcode"
                                            value="{{ $cargo->zipcode }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="phone" class="labelCustom">Phone</label>
                                        <input class="form-control" type="number" name="phone"
                                            value="{{ $cargo->phone }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="email" class="labelCustom">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $cargo->email }}" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="border p-3">
                                <h4>Product Information</h4>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="product_name" class="labelCustom">Product name</label>
                                        <input class="form-control" type="text" name="product_name"
                                            value="{{ $cargo->product_name }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="product_count" class="labelCustom">Product count</label>
                                        <input class="form-control" type="text" name="product_count"
                                            value="{{ $cargo->product_count }}" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="product_link" class="labelCustom">Product link</label>
                                        <input class="form-control" type="text" name="product_link"
                                            value="{{ $cargo->product_link }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="product_note" class="labelCustom">Product note</label>
                                        <input class="form-control" type="text" name="product_note"
                                            value="{{ $cargo->product_note }}" />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="border p-3">
                                <h4>Calculations</h4>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="product_price" class="labelCustom">Product price</label>
                                        <input class="form-control" type="text" name="product_price"
                                            value="{{ $cargo->product_price }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="cargo_price" class="labelCustom">Cargo price</label>
                                        <input class="form-control" type="text" name="cargo_price"
                                            value="{{ $cargo->cargo_price }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="comission" class="labelCustom">Comission</label>
                                        <input class="form-control" type="text" name="comission"
                                            value="{{ $cargo->comission }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="time" class="labelCustom">Time limit (hours)</label>
                                        <input class="form-control" type="text" name="time"
                                            value="{{ $cargo->time }}" />
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        function orderAction(button) {
            var type = button.getAttribute('data-type');
            var id = button.getAttribute('data-id');

            if (type == 'cancel') {
                Swal.fire({
                    position: 'top',
                    icon: 'warning',
                    title: 'Cancel order ID: ' + id,
                    text: "Write comment for cancel:",
                    backdrop: true,
                    input: 'text',
                    showCancelButton: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.cargo-requests.order_action') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: id,
                                comment: result.value,
                                status: "cancelled"
                            },
                            success: function(data) {
                                Swal.fire({
                                    position: 'top',
                                    icon: 'success',
                                    title: data + " . Reload the page",
                                    showConfirmButton: true,
                                    backdrop: true
                                })
                            }
                        });
                    }
                });
            } else if (type == 'accept') {
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Accept order ID: ' + id,
                    text: "Write comment for acceptance:",
                    backdrop: true,
                    input: 'text',
                    showCancelButton: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.cargo-requests.order_action') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: id,
                                comment: result.value,
                                status: "accepted"
                            },
                            beforeSend: function() {
                                let timerInterval
                                Swal.fire({
                                    position: 'center',
                                    title: 'Sending email.. ',
                                    backdrop: true,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });
                            },
                            complete: function() {
                                Swal.hideLoading();
                            },
                            success: function(data) {
                                Swal.fire({
                                    position: 'top',
                                    icon: 'success',
                                    title: data + " . Reload the page",
                                    showConfirmButton: true,
                                    backdrop: true
                                })
                            }
                        });
                    }
                });
            }
        }
    </script>
@endsection
