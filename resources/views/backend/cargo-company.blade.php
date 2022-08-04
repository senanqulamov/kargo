@extends('backend.layout.app')

@section('title', 'Cargo Companies')

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
        <div class="col-12 mb-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cargoModal"><i
                    class="fas fa-plus"></i> New Company</button>
            <a href="{{ route('admin.companies.cargo.download.list') }}" class="btn btn-default"><i
                    class="fas fa-file-download"></i> List Country</a>
            <a href="{{ route('admin.companies.cargo.download.zone') }}" class="btn btn-default"><i
                    class="fas fa-file-download"></i> List Zone</a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Companies</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50px">Image</th>
                                <th>Company Name</th>
                                <th>Entegrations</th>
                                <th>PSH</th>
                                <th>Jet Price</th>
                                <th>Emergency</th>
                                <th>Kar Marj</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Upload Excel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargos as $cargo)
                                <tr>
                                    <td>
                                        @if ($cargo->logo != '')
                                            <img src="{{ asset('/') }}backend/assets/img/companies/cargo/{{ $cargo->logo }}"
                                                alt="logo" width="60" class="mx-auto d-block">
                                        @else
                                            <img src="{{ asset('/') }}backend/assets/img/icons/company.png"
                                                alt="logo" width="60" class="mx-auto d-block">
                                        @endif
                                    </td>
                                    <td>{{ $cargo->name }}</td>
                                    <td>
                                        @php $entegre=json_decode($cargo->entegrations) @endphp
                                        <span><b>API:</b> {{ $entegre[0] }}</span></br>
                                        <span><b>PRIVATE KEY:</b> {{ $entegre[1] }}</span>
                                    </td>
                                    <td>{{ $cargo->PSH }}</td>
                                    <td>{{ $cargo->jet_price }}</td>
                                    <td>{{ $cargo->emergency }}</td>
                                    <td>{{ $cargo->kar_marj }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal-edit-{{ $cargo->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <a href="#"
                                            data-url="{{ route('admin.companies.cargo.delete', $cargo->id) }}"
                                            onclick="confirmAction(this)" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-success btnDownload" data-id="{{ $cargo->id }}">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-edit-{{ $cargo->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Company</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('admin.companies.cargo.update') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Enter company name" name="name"
                                                            value="{{ $cargo->name }}">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputApi2">API key</label>
                                                                <input type="text" class="form-control" id="inputApi2"
                                                                    placeholder="Enter company api key" name="inputApi2"
                                                                    value="{{ $entegre[0] }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputPrivate2">PRIVATE key</label>
                                                                <input type="text" class="form-control"
                                                                    id="inputPrivate2"
                                                                    placeholder="Enter company private key"
                                                                    name="inputPrivate2" value="{{ $entegre[1] }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="PSH">PSH</label>
                                                                <input type="number" class="form-control" id="PSH"
                                                                    placeholder="Enter company PSH" name="PSH"
                                                                    value="{{ $cargo->PSH }}">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="jet_price">Jet Price</label>
                                                                <input type="number" class="form-control" id="jet_price"
                                                                    placeholder="Enter company Jet Price" name="jet_price"
                                                                    value="{{ $cargo->jet_price }}">
                                                                <span </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="emergency">Emergency</label>
                                                                <input type="number" class="form-control" id="emergency"
                                                                    placeholder="Enter company emergency" name="emergency"
                                                                    value="{{ $cargo->emergency }}">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="kar_marj">Kar Marj</label>
                                                                <input type="number" class="form-control" id="kar_marj"
                                                                    placeholder="Enter company Kar Marj" name="kar_marj"
                                                                    value="{{ $cargo->kar_marj }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="logo">Logo</label>
                                                        <input type="file" class="form-control" name="file">
                                                    </div>
                                                    <input type="hidden" name="hiddenID" value="{{ $cargo->id }}">

                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="modal fade" id="cargoModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.companies.cargo.create') }}" method="post" autocomplete="off"
                        id="insertCargo" enctype="multipart/from-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Enter company name"
                                name="inputName" value="{{ old('inputName') }}">
                            <span class="text-danger error-text inputName_error"></span>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputApi">API key</label>
                                    <input type="text" class="form-control" id="inputApi"
                                        placeholder="Enter company api key" name="inputApi"
                                        value="{{ old('inputApi') }}">
                                    <span class="text-danger error-text inputApi_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPrivate">PRIVATE key</label>
                                    <input type="text" class="form-control" id="inputPrivate"
                                        placeholder="Enter company private key" name="inputPrivate"
                                        value="{{ old('inputPrivate') }}">
                                    <span class="text-danger error-text inputPrivate_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="PSH">PSH</label>
                                    <input type="number" class="form-control" id="PSH"
                                        placeholder="Enter company PSH" name="PSH">
                                    <span class="text-danger error-text inputApi_error"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jet_price">Jet Price</label>
                                    <input type="number" class="form-control" id="jet_price"
                                        placeholder="Enter company Jet Price" name="jet_price"
                                        value="{{ old('inputPrivate') }}">
                                    <span class="text-danger error-text inputPrivate_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="emergency">Emergency</label>
                                    <input type="number" class="form-control" id="emergency"
                                        placeholder="Enter company emergency" name="emergency"
                                        value="{{ old('inputPrivate') }}">
                                    <span class="text-danger error-text inputPrivate_error"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="kar_marj">Kar Marj</label>
                                    <input type="number" class="form-control" id="kar_marj"
                                        placeholder="Enter company Kar Marj" name="kar_marj"
                                        value="{{ old('inputPrivate') }}">
                                    <span class="text-danger error-text inputPrivate_error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fileLogo">Logo</label>
                            <input type="file" class="form-control" id="fileLogo" name="fileLogo">
                            <span class="text-danger error-text fileLogo_error"></span>
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
    <!-- /.modal -->

    <div class="modal fade" id="modalExcel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Excel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.companies.cargo.upload') }}" method="post"
                        enctype="multipart/form-data" id="uploadExcel">
                        @csrf
                        <div class="form-group">
                            <label for="fileExcel">Excel</label>
                            <input type="file" class="form-control" id="fileExcel" name="fileExcel">
                            <span class="text-danger error-text fileExcel_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="fileZone">Zone</label>
                            <input type="file" class="form-control" id="fileZone" name="fileZone">
                            <span class="text-danger error-text fileZone_error"></span>
                        </div>
                        <input type="hidden" name="inputHiddenExcel" id="inputHiddenExcel">

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('js')
    <script>
        $(function() {
            $("#insertCargo").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            // $('#formOptionalCompany')[0].reset();
                            toastr.success(data.msg, data.state);
                            $("#cargoModal").modal().hide();
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }
                    }
                });
            });

            // $(".edit_btn").click(function() {
            //     var id_data = $(this).val();
            //     $("#editModal").modal('show');

            //     $.ajax({
            //         type: "GET",
            //         data: {
            //             id: id_data
            //         },
            //         url: "{{ route('admin.companies.cargo.edit') }}",
            //         success: function(response) {
            //             var entegrations = JSON.parse(response.data.entegrations);

            //             $("#inputName2").val(response.data.name);
            //             $("#inputApi2").val(entegrations[0]);
            //             $("#inputPrivate2").val(entegrations[1]);
            //             $("#hiddenID").val(response.data.id);
            //         }
            //     });
            // });

            // $("#updateCargo").on('submit', function(e) {
            //     e.preventDefault();

            //     $.ajax({
            //         url: $(this).attr('action'),
            //         method: $(this).attr('method'),
            //         data: new FormData(this),
            //         processData: false,
            //         dataType: 'json',
            //         contentType: false,
            //         beforeSend: function() {
            //             $(document).find('span.error-text').text('');
            //         },
            //         success: function(data) {
            //             if (data.status == 0) {
            //                 $.each(data.error, function(prefix, val) {
            //                     $('span.' + prefix + '_error').text(val[0]);
            //                 });
            //             } else {
            //                 // $('#formOptionalCompany')[0].reset();
            //                 toastr.success(data.msg, data.state);
            //                 $("#editModal").modal().hide();
            //                 setTimeout(function() {
            //                     location.reload();
            //                 }, 3000);
            //             }
            //         }
            //     });
            // });

            $(".btnDownload").click(function() {
                $id = $(this).attr('data-id');
                $("#modalExcel").modal('show');

                $("#inputHiddenExcel").val($id);
            });

            $("#uploadExcel").on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            // $('#formOptionalCompany')[0].reset();
                            toastr.success(data.msg, data.state);
                            $("#modalExcel").modal().hide();
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        }
                    }
                });
            });
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
