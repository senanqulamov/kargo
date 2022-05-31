@extends('backend.layout.app')

@section('title', 'Users')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Active Users</span>
                    @php $user_count = DB::table('users')->where('status', 1)->count() @endphp
                    <span class="info-box-number">{{ $user_count }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-hover table-bordered ">
                        <thead>
                            <tr>
                                <th style="width:40px">Image</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Store</th>
                                <th>Status</th>
                                <th>Registration</th>
                                <th></th>
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
                                <td><div class="text-{{$user->status == NULL ? 'danger' : 'success'}} text-center">{{$user->status == NULL ? 'Deactive' : $user->getUserStatusAttribute()}}</div></td>
                                <td class="text-center">{{$user->created_at->format('d M Y')}}</td>
                                <td>
                                    <a href="{{route('admin.users.details', $user->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                </td>
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