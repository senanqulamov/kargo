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
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="pt-2 px-3"><h3 class="card-title">User Info</h3></li>
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Shipping Address</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Profile</a>
                    </li> 
                    -->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Country</td>
                                    <td>{{$user->getAddress->country}}</td>
                                </tr>
                                <tr>
                                    <td>State</td>
                                    <td>{{$user->getAddress->state}}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{$user->getAddress->city}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$user->getAddress->address}}</td>
                                </tr>
                                <tr>
                                    <td>Zip Code</td>
                                    <td>{{$user->getAddress->zipcode}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--
                    <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                    </div> 
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection