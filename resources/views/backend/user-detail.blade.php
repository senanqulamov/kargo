@extends('backend.layout.app')

@section('title', 'User Info')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img src="{{asset('/')}}backend/assets/img/{{ $user->image == NULL ? 'icons/user.png' : 'users/'.$user->image }}" alt="user profile picture" class="profile-user-img img-fluid img-circle">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>ID</b> <a class="float-right">{{$user->id}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{$user->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Phone</b> <a class="float-right">{{$user->phone}}</a>
                    </li>                  
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-8">
        
    </div>
</div>
@endsection