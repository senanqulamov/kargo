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
                    <table id="example1" class="table table-bordered table-striped" style="with:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Orders</th>
                                <th>Customer name</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>ZipCode</th>
                                <th>Note</th>
                                <th>Date</th>
                                <th>Deny</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courier_requests as $cr_req)
                                <tr>
                                    <td>{{ $cr_req->id ? $cr_req->id : '---' }}</td>
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
