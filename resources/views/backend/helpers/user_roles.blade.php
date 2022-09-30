@extends('backend.layout.app')

@section('title', 'User Roles')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    <style>
        .color-box-for-user-role {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .color-box-for-user-role span {
            border: 1px solid rgba(0, 0, 0, 0.495);
            border-radius: 20px;
            padding: 3px 25px;
        }

        .badge-holder-hm {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 5px 10px;
        }
        .badge-hm{
            border: 1px solid rgba(0, 0, 0, 0.47);
            border-radius: 20px;
            padding: 5px 25px;
            background: #86899b75;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Permission Roles</h3>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-new-role">
                        Add New Role
                        <i class="fas fa-add"></i>
                    </a>
                    <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>View permissions</th>
                                <th>Action permissions</th>
                                <th>Background Color / Text Color</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        {{ $role->id }}
                                    </td>
                                    <td>{{ $role->role_name }}</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary @if (!json_decode($role->view_permissions)) disabled @endif"
                                            data-toggle="modal" data-target="#details-view_perm-modal-{{ $role->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-primary @if (!json_decode($role->edit_permissions)) disabled @endif"
                                            data-toggle="modal" data-target="#details-edit_perm-modal-{{ $role->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="color-box-for-user-role">
                                            <span style="background: {{ $role->background }};color:{{ $role->color }};">
                                                Background
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit-modal-{{ $role->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-url="{{ route('admin.delete_role', $role->id) }}"
                                            onclick="confirmAction(this)" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                    <div class="modal fade" id="edit-modal-{{ $role->id }}">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Edit User Role -
                                                        <span
                                                            class="badge-pill badge-secondary">{{ $role->role_name }}</span>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.edit_role') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                                                        <div class="form-group">
                                                            <label for="name">
                                                                Role Name
                                                            </label>
                                                            <input type="text" name="role_name" class="form-control"
                                                                placeholder="role name" value="{{ $role->role_name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="view_permissions">
                                                                View Permissions
                                                            </label>
                                                            <select name="view_permissions[]" multiple style="width: 100%"
                                                                class="js-example-basic-multiple form-control">
                                                                <option disabled>Select at least one</option>
                                                                @foreach ($permission_pages as $page)
                                                                    <option value="{{ $page->title }}"
                                                                        @if (str_contains($role->view_permissions, $page->title)) selected @endif>
                                                                        {{ $page->title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="edit_permissions">
                                                                Edit Permissions / Action permissions
                                                            </label>
                                                            <select name="edit_permissions[]" multiple style="width: 100%"
                                                                class="js-example-basic-multiple form-control">
                                                                <option disabled>Select at least one</option>
                                                                @foreach ($permission_pages as $page)
                                                                    <option value="{{ $page->title }}"
                                                                        @if (str_contains($role->edit_permissions, $page->title)) selected @endif>
                                                                        {{ $page->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="background">Background color</label>
                                                            <input type="color" name="background" class="form-control"
                                                                value="{{ $role->background }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="color">Text color</label>
                                                            <input type="color" name="color" class="form-control"
                                                                value="{{ $role->color }}">
                                                        </div>

                                                        <button type="submit" class="btn btn-success">Update</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div class="modal fade" id="details-edit_perm-modal-{{ $role->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Action Permissions on Pages</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="badge-holder-hm">
                                                        @if (json_decode($role->edit_permissions))
                                                            @foreach (json_decode($role->edit_permissions) as $perm)
                                                                <span class="badge-hm">
                                                                    {{ $perm }}
                                                                </span>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div class="modal fade" id="details-view_perm-modal-{{ $role->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">View Permissions on Pages</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="badge-holder-hm">
                                                        @if (json_decode($role->view_permissions))
                                                            @foreach (json_decode($role->view_permissions) as $perm)
                                                                <span class="badge-hm">
                                                                    {{ $perm }}
                                                                </span>
                                                            @endforeach
                                                        @endif
                                                    </div>
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
                    <h3>Permission Pages</h3>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-new-page">
                        Add New Page
                        <i class="fas fa-add"></i>
                    </a>
                    <table class="example1 table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permission_pages as $page)
                                <tr>
                                    <td>
                                        {{ $page->id }}
                                    </td>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit-page-modal-{{ $page->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-url="{{ route('admin.delete_page', $page->id) }}"
                                            onclick="confirmAction(this)" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                    <div class="modal fade" id="edit-page-modal-{{ $page->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit User Role</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.edit_page') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="page_id"
                                                            value="{{ $page->id }}">
                                                        <div class="form-group">
                                                            <label for="name">
                                                                Page Name
                                                            </label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $page->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">
                                                                Page Title
                                                            </label>
                                                            <input type="text" name="title" class="form-control"
                                                                value="{{ $page->title }}">
                                                        </div>

                                                        <button type="submit" class="btn btn-success">Update</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
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


    <div class="modal fade" id="modal-add-new-role">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.create_new_role') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="role_name">
                                Role Name
                            </label>
                            <input type="text" name="role_name" class="form-control" placeholder="role name">
                        </div>
                        <div class="form-group">
                            <label for="view_permissions">
                                View Permissions
                            </label>
                            <select name="view_permissions[]" multiple style="width: 100%"
                                class="js-example-basic-multiple form-control">
                                <option disabled>Select at least one</option>
                                @foreach ($permission_pages as $page)
                                    <option value="{{ $page->title }}" @if ($page->name == 'Dashboard' || $page->name == 'Profile') selected @endif>
                                        {{ $page->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_permissions">
                                Edit Permissions / Action permissions
                            </label>
                            <select name="edit_permissions[]" multiple style="width: 100%"
                                class="js-example-basic-multiple form-control">
                                <option disabled>Select at least one</option>
                                @foreach ($permission_pages as $page)
                                    <option value="{{ $page->title }}" @if ($page->name == 'Profile') selected @endif>
                                        {{ $page->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="background">Background color</label>
                            <input type="color" name="background" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="color">Text color</label>
                            <input type="color" name="color" class="form-control">
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

    <div class="modal fade" id="modal-add-new-page">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Page</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.create_new_page') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">
                                Page name
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="page name">
                        </div>
                        <div class="form-group">
                            <label for="title">
                                Page Title
                            </label>
                            <input type="text" name="title" class="form-control" placeholder="page title">
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
