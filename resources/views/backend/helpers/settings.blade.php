@extends('backend.layout.app')

@section('title', 'Settings')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/summernote/summernote-bs4.min.css">
    <style>
        .slider-td-image-hm {
            background-position: center !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-new">
                        Add New <i class="fas fa-add"></i>
                    </a>
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Page (Url or name)</th>
                                <th>Text</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ $setting->id ? $setting->id : '---' }}</td>
                                    <td>{{ $setting->name ? $setting->name : '---' }}</td>
                                    <td>{{ $setting->page ? $setting->page : '---' }}</td>
                                    <td>{{ $setting->text ? $setting->text : '---' }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary" data-toggle="modal"
                                            data-target="#modal-view-{{ $setting->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-success" data-toggle="modal"
                                            data-target="#modal-edit-{{ $setting->id }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-danger" onclick="confirmAction(this)"
                                            data-url="{{ route('admin.delete_settings', ['id' => $setting->id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                    <div class="modal fade" id="modal-view-{{ $setting->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        View Details of
                                                        <span
                                                            class="badge badge-pill badge-primary">{{ $setting->name }}</span>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! json_decode($setting->details) !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div class="modal fade" id="modal-edit-{{ $setting->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Edit Details of
                                                        <span
                                                            class="badge badge-pill badge-primary">{{ $setting->name }}</span>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.edit_settings') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $setting->id }}">
                                                        <div class="row">
                                                            <div class="form-group col-6">
                                                                <label for="name">Setting Name</label>
                                                                <input class="form-control" type="text" name="name"
                                                                    value="{{ $setting->name }}" required>
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="page">Page Name</label>
                                                                <input class="form-control" type="text" name="page"
                                                                    value="{{ $setting->page }}" required>
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label for="text">Text</label>
                                                                <input class="form-control" type="text" name="text"
                                                                    value="{{ $setting->text }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="message">Details</label>
                                                            <textarea class="compose-textarea form-control" name="details" style="height: 500px">
                                                                {!! json_decode($setting->details) !!}
                                                            </textarea>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <button type="submit"
                                                                class="btn btn-outline-success">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Slider</h4>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-slider">
                        Add New <i class="fas fa-add"></i>
                    </a>
                    <table class="table table-bordered table-striped example1" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>Image</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $slider->id ? $slider->id : '---' }}</td>
                                    <td>{{ $slider->title ? $slider->title : '---' }}</td>
                                    <td>{{ $slider->text ? $slider->text : '---' }}</td>
                                    <td class="slider-td-image-hm"
                                        style="background: url('{{ asset('/') }}backend/assets/img/slider/{{ $slider->image }}')">
                                        <div style="height: 100px;"></div>
                                    </td>
                                    <td>
                                        <a class="btn
                                            @if ($slider->main == 'true')
                                                btn-primary
                                            @else
                                                btn-outline-primary
                                            @endif"
                                            href="{{ route('admin.activate_slider' , ['id' => $slider->id]) }}">
                                            <i class="fas fa-home"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-success" data-toggle="modal"
                                            data-target="#modal-slider-edit-{{ $slider->id }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-danger" onclick="confirmAction(this)"
                                            data-url="{{ route('admin.delete_slider', ['id' => $slider->id]) }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                    <div class="modal fade" id="modal-slider-edit-{{ $slider->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Edit Details of
                                                        <span class="badge badge-pill badge-primary">
                                                            {{ $slider->title }}
                                                        </span>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.edit_slider') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $slider->id }}">
                                                        <div class="row">
                                                            <div class="col-6 form-group">
                                                                <label for="title">
                                                                    Title
                                                                </label>
                                                                <input type="text" name="title" class="form-control"
                                                                    value="{{ $slider->title }}">
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <label for="text">
                                                                    Text
                                                                </label>
                                                                <input type="text" name="text" class="form-control"
                                                                    value="{{ $slider->text }}">
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <label for="image">
                                                                    Image
                                                                    <input type="file" class="form-control" name="image">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-start">
                                                            <button type="submit" class="btn btn-success">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
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
                    <h4 class="modal-title">Add new Setting</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.add_settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="settings_type" value="page text">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Setting Name</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="page">Page Name</label>
                                <input class="form-control" type="text" name="page" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="text">Text</label>
                                <input class="form-control" type="text" name="text" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message">Details</label>
                            <textarea class="compose-textarea form-control" name="details" style="height: 500px">

                            </textarea>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-outline-success">Create</button>
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
    <div class="modal fade" id="modal-add-slider">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Slider Page</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.add_slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="title">
                                    Title
                                </label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="col-6 form-group">
                                <label for="text">
                                    Text
                                </label>
                                <input type="text" name="text" class="form-control">
                            </div>
                            <div class="col-6 form-group">
                                <label for="image">
                                    Image
                                </label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="row justify-content-start">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus"></i>
                                Add
                            </button>
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

    <!-- Summernote -->
@section('js')
    <script src="{{ asset('/') }}backend/assets/plugin/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('.compose-textarea').summernote();
        });

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

@endsection
