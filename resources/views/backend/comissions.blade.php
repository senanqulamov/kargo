@extends('backend.layout.app')

@section('title', 'Balance')

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
        .payment_logo_div {
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
                                <th>ID</th>
                                <th>Payment Method</th>
                                <th>Comission</th>
                                <th>Show Name</th>
                                <th>Payment logo</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comissions as $comission)
                                <tr>
                                    <td>{{ $comission->id }}</td>
                                    <td>{{ $comission->payment }}</td>
                                    <td>{{ $comission->comission }} &#37;</td>
                                    <td>{{ $comission->show_name }}</td>
                                    <td style="background: rgb(199, 150, 150);">
                                        <div class="payment_logo_div">
                                            <img src="{{ asset('/') }}images/{{ $comission->image }}"
                                                style="width:35%;" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-dark" data-toggle="modal"
                                            data-target="#modal-edit-{{ $comission->id }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.payments.deleteComission', ['id' => $comission->id]) }}"
                                            class="btn btn-dark">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                    <div class="modal fade" id="modal-edit-{{ $comission->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit comission of
                                                        <b>{{ $comission->payment }}</b>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.payments.updateComission') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="comission_id"
                                                            value="{{ $comission->id }}">
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Payment method</label>
                                                                <input type="text" class="form-control" name="payment"
                                                                    value="{{ $comission->payment }}">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Comission</label>
                                                                <input type="number" class="form-control" name="comission"
                                                                    value="{{ $comission->comission }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Payment Image</label>
                                                                <input type="file" class="form-control" name="image">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="exampleInputEmail1">Show Name</label>
                                                                <input type="text" class="form-control" name="show_name"
                                                                    value="{{ $comission->show_name }}">
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

    <!-- /.modal -->

    <div class="modal fade" id="modal-add-new">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new comission</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.payments.addnewComission') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="comission_id" value=""> --}}
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Payment method</label>
                                <input type="text" class="form-control" name="payment">
                            </div>
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Comission</label>
                                <input type="number" class="form-control" name="comission">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Payment Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group col">
                                <label for="exampleInputEmail1">Show Name</label>
                                <input type="text" class="form-control" name="show_name">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
