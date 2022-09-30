@extends('backend.layout.app')

@section('title', 'Packing table')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-new">
                        Add New
                        <i class="fas fa-add"></i>
                    </a>
                    <table id="example1" class="table table-bordered table-striped" style="with:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Value</th>
                                <th>Price</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packings as $packing)
                                <tr>
                                    <td>{{ $packing->id ? $packing->id : '---' }}</td>
                                    <td>{{ $packing->value ? $packing->value : '---' }}</td>
                                    <td>{{ $packing->price ? $packing->price : '---' }}</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary @if (!json_decode($packing->details)) disabled @endif"
                                            data-toggle="modal" data-target="#details-modal-{{ $packing->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            $date = Carbon\Carbon::parse($packing->created_at)->format('d-M-Y');
                                        @endphp
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge">
                                                {{ $date }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit-modal-{{ $packing->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <a href="#"
                                            data-url="{{ route('admin.services.packing_delete', $packing->id) }}"
                                            onclick="confirmAction(this)" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                    <div class="modal fade" id="details-modal-{{ $packing->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Packing Details</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex flex-column">
                                                        @if (json_decode($packing->details))
                                                            @foreach (json_decode($packing->details) as $detail)
                                                                <span>
                                                                    <img src="{{ asset('/') }}frontend/img/tic.svg"
                                                                        alt="">
                                                                    {{ $detail }}
                                                                </span>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="edit-modal-{{ $packing->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Packing</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.services.packing_edit') }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="packing_id"
                                                            value="{{ $packing->id }}">
                                                        <div class="form-group">
                                                            <label for="details">Details</label>
                                                            <select name="details[]"
                                                                class="form-control" multiple>
                                                                <option>Detaylı hasar incelemesi</option>
                                                                <option>Ücretsiz Fotoğraf bildirimi</option>
                                                                <option>Aynı gün gösterim</option>
                                                                <option>Takip Numarası</option>
                                                                <option>E-posta - Chat desteği</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="value">Value</label>
                                                            <input type="text" name="value" class="form-control"
                                                                value="{{ $packing->value }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input type="text" name="price" class="form-control"
                                                                value="{{ $packing->price }}">
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                    <h4 class="modal-title">Add Packing</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.services.packing_add_new') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="details">Details</label>
                            <select name="details[]" class="form-control select-custom-hm" multiple>
                                <option disabled>Select at least one of the following</option>
                                <option>Detaylı hasar incelemesi</option>
                                <option>Ücretsiz Fotoğraf bildirimi</option>
                                <option>Aynı gün gösterim</option>
                                <option>Takip Numarası</option>
                                <option>E-posta - Chat desteği</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" name="value" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script>
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
