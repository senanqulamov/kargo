@extends('backend.layout.app')

@section('title', 'Users')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px">Image</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Store</th>
                                <th>Registration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{asset('/')}}backend/assets/img/{{ $user->image == NULL ? 'icons/user.png' : 'users/'.$user->image }}" alt="user profile picture" width="60" class="d-block mx-auto">
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->getUserStoreAttribute()}}</td>
                                <td class="text-center">{{$user->created_at->format('d M Y')}}</td>
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

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('/')}}backend/assets/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/jszip/jszip.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection