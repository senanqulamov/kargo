@extends('backend.layout.app')

@section('title', 'Amazon addresses')

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
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-map-marker"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Addresses</span>
                    @php $address_count = DB::table('amazon_addresses')->count(); @endphp
                    <span class="info-box-number">{{ $address_count }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-new">
                        Add New <i class="fas fa-add"></i>
                    </a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>ZipCode</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($amazon_addresses as $amazon_address)
                            <tr>
                                <td>{{$amazon_address->id}}</td>
                                <td>{{$amazon_address->name ?? null}}</td>
                                <td>{{$amazon_address->address ?? null}}</td>
                                <td>{{$amazon_address->zipcode ?? null}}</td>
                                <td>{{$amazon_address->state ?? null}}</td>
                                <td>{{$amazon_address->country ?? null}}</td>
                                <td>
                                    <a href="#" class="btn btn-dark" data-toggle="modal"
                                        data-target="#modal-edit-"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-dark"
                                        data-url="{{ route('admin.companies.amazon_addresses.delete',$amazon_address) }}"
                                        onclick="confirmAction(this)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                                <div class="modal fade" id="modal-edit-">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit comission of
                                                    <b></b>
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.companies.amazon_addresses.update',$amazon_address) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="hidden" name="address_id" value="{{$amazon_address->id}}">
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <label for="name">Name</label>
                                                            <input class="form-control" type="text" name="name" value="{{$amazon_address->name}}"  placeholder="Name" required>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="city">City</label>
                                                            <input class="form-control" type="text" name="city" value="{{$amazon_address->city}}" placeholder="Name" required>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="address">Address</label>
                                                            <input class="form-control" type="text" name="address" value="{{$amazon_address->address}}" placeholder="Address" required>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="zipcode">Zipcode</label>
                                                            <input class="form-control" type="text" name="zipcode" value="{{$amazon_address->zipcode}}" placeholder="Zipcode" required>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="state">State</label>
                                                            <input class="form-control" type="text" name="state" value="{{$amazon_address->state}}" placeholder="State" required>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="country">Country</label>
                                                            <input class="form-control" type="text" name="country" value="{{$amazon_address->country}}" placeholder="Country" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-success">Submit</button>
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-add-new">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.companies.amazon_addresses.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="city">City</label>
                                <input class="form-control" type="text" name="city" placeholder="Name" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="address">Address</label>
                                <input class="form-control" type="text" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="zipcode">Zipcode</label>
                                <input class="form-control" type="text" name="zipcode" placeholder="Zipcode" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="state">State</label>
                                <input class="form-control" type="text" name="state" placeholder="State" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="country">Country</label>
                                <input class="form-control" type="text" name="country" placeholder="Country" required>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
