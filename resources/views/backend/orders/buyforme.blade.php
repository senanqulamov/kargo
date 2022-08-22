@extends('backend.layout.app')

@section('title', 'Buy for me orders')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('css')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/summernote/summernote-bs4.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Buy for Me requests</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="with:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Address</th>
                                <th>Zip Code</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Product Name</th>
                                <th>Product Count</th>
                                <th>Product Link</th>
                                <th>Note</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $cargo)
                                <tr>
                                    <td>
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.cargo-requests.custom_order_details', $cargo->id) }}' , '_self')">
                                                {{ $cargo->id }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.users.details', $cargo->user_id) }}')">
                                                010{{ $cargo->user_id ? $cargo->user_id : '---' }}20
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($cargo->status == 'pending')
                                                <span class="badge rounded-pill bg-info user_id_badge">Pending</span>
                                            @elseif ($cargo->status == 'cancelled')
                                                <span class="badge rounded-pill bg-danger user_id_badge">Cancelled</span>
                                            @elseif ($cargo->status == 'accepted')
                                                <span class="badge rounded-pill bg-warning user_id_badge">Accepted</span>
                                            @elseif ($cargo->status == 'payment')
                                                <span class="badge rounded-pill bg-success user_id_badge">Done</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $cargo->name ? $cargo->name : '---' }}</td>
                                    <td>{{ $cargo->country ? $cargo->country : '---' }} </td>
                                    <td>{{ $cargo->city ? $cargo->city : '---' }}</td>
                                    <td>{{ $cargo->state ? $cargo->state : '---' }}</td>
                                    <td>{{ $cargo->address ? $cargo->address : '---' }}</td>
                                    <td>{{ $cargo->zipcode ? $cargo->zipcode : '---' }}</td>
                                    <td>{{ $cargo->phone ? $cargo->phone : '---' }}</td>
                                    <td>{{ $cargo->email ? $cargo->email : '---' }}</td>
                                    <td>{{ $cargo->product_name ? $cargo->product_name : '---' }}</td>
                                    <td>{{ $cargo->product_count ? $cargo->product_count : '---' }}</td>
                                    <td>
                                        <a href="{{ $cargo->product_link ? $cargo->product_link : '---' }}"
                                            target="__blank" class="btn btn-info">
                                            <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>{{ $cargo->product_note ? $cargo->product_note : '---' }}</td>
                                    <td>{{ $cargo->created_at ? $cargo->created_at : '---' }}</td>
                                    <td>
                                        @if ($cargo->status != 'cancelled' && $cargo->status != 'payment')
                                            <a href="#" onclick="requestAction(this)" class="btn btn-danger"
                                                data-request-id="{{ $cargo->id }}" data-status="cancelled">
                                                <i class="fas fa-window-close"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add new Notification Modal -->
    <div class="modal fade" id="add-notification" tabindex="-1" role="dialog" aria-labelledby="add-notificationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.messages.addNotification') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input class="form-control" placeholder="Name:" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" placeholder="upload image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="compose-textarea" class="form-control" name="message" style="height: 400px">

                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Summernote -->
    <script src="{{ asset('/') }}backend/assets/plugin/summernote/summernote-bs4.min.js"></script>

    <script>
        $(function() {
            // Summernote
            $('#compose-textarea').summernote();
        })

        function confirmAction(button) {
            var url = button.getAttribute('data-url');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Accept',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open(url, '_self');
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
@endsection
