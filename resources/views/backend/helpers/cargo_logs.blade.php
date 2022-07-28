@extends('backend.layout.app')

@section('title', 'Cargo Logs')

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
                                <th>ID</th>
                                <th>Cargo ID</th>
                                <th>User ID</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            @if ($log->cargo_id)
                                                <span class="badge rounded-pill bg-info user_id_badge"
                                                    onclick="window.open('{{ route('admin.cargo-requests.cargo_details', $log->cargo_id) }}' , '_self')">
                                                    {{ $log->cargo_id }}
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
                                            @if ($log->user_id)
                                                <span class="badge rounded-pill bg-info user_id_badge"
                                                    onclick="window.open('{{ route('admin.users.details', $log->user_id) }}' , '_self')">
                                                    010{{ $log->user_id }}20
                                                </span>
                                            @else
                                                <span class="badge rounded-pill bg-warning user_id_badge">
                                                    Not Settled
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $log->action ? $log->action : '---' }}</td>
                                    <td>{{ $log->time ? $log->time : '---' }}</td>
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
