@extends('backend.layout.app')

@section('title', 'Usage Blogs')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('css')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/summernote/summernote-bs4.min.css">
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
        .blog_pic{
            width: 100px;
        }
    </style>

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Create Usage Blog</h4>
                </div>
                <a href="#" data-toggle="modal" data-target="#add-usage" class="small-box-footer">
                    add new
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <!-- /.col -->
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Usage Blogs</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-striped" style="width: 100%">
                            <thead>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Date</th>
                                <th>Enable/Disable</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($usages as $usage)
                                    <tr>
                                        <td>{{ $usage->id }}</td>
                                        @if ($usage->status == 0)
                                            <td style="background: #d41f1f73">
                                                Disabled
                                            </td>
                                        @elseif ($usage->status == 1)
                                            <td style="background: #3fff4657">
                                                Active
                                            </td>
                                        @endif
                                        <td>{{ $usage->title }}</td>
                                        <td>{!! json_decode($usage->description) !!}</td>
                                        <td>
                                            <img src="{{ asset('/') }}images/static_images/{{ $usage->image }}"
                                                alt="blog_pic" class="blog_pic">
                                        </td>
                                        <td>
                                            <a href="{{ $usage->link }}" class="btn btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{ $usage->created_at }}</td>
                                        <td>
                                            <div class="button-div-hm">
                                                @if ($usage->status == 0)
                                                    <a href="{{ route('admin.messages.activateUsage', ['id' => $usage->id]) }}"
                                                        class="btn btn-success">
                                                        <i class="fa-solid fa-check-to-slot"></i>
                                                    </a>
                                                @elseif ($usage->status == 1)
                                                    <a href="{{ route('admin.messages.disableUsage', ['id' => $usage->id]) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-square-xmark"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="button-div-hm">
                                                <a href="#" class="btn btn-danger" onclick="confirmAction(this)"
                                                    data-url="{{ route('admin.messages.deleteUsage', ['id' => $usage->id]) }}">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Add new Notification Modal -->
    <div class="modal fade" id="add-usage" tabindex="-1" role="dialog" aria-labelledby="add-notificationLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Usage Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.messages.addUsage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input class="form-control" placeholder="Name:" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" placeholder="upload image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="name">Youtube link</label>
                            <input class="form-control" placeholder="Name:" name="link" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Description</label>
                            <textarea id="compose-textarea" class="form-control" name="description" style="height: 500px">

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