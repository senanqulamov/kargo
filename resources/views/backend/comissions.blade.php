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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Payment Method</th>
                                <th>Comission</th>
                                <th>Css Class</th>
                                <th>Show Name</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comissions as $comission)
                                <tr>
                                    <td>{{ $comission->id }}</td>
                                    <td>{{ $comission->payment }}</td>
                                    <td>{{ $comission->comission }} &#37;</td>
                                    <td>.{{ $comission->css_class }}</td>
                                    <td>{{ $comission->show_name }}</td>
                                    <td>
                                        <a href="#" class="btn btn-dark" data-toggle="modal"
                                            data-target="#modal-edit-{{ $comission->id }}"><i class="fas fa-edit"></i></a>
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
                                                        method="POST">
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
                                                                <label for="exampleInputEmail1">Css Class</label>
                                                                <input type="text" class="form-control" name="css_class"
                                                                    value="{{ $comission->css_class }}">
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
