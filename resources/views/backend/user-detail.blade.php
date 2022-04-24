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
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">General Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" method="post" action="{{route('admin.users.general.update', $user->id)}}" id="editGeneralProfile">
                            @csrf
                            <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="inputUsername" placeholder="Username" name="username" value="{{$user->name}}" />
                                <span class="text-danger error-text username_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email" name="email" value="{{$user->email}}" />
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="Phone | example: 551234567" name="phone" value="{{$user->phone}}" />
                                <span class="text-danger error-text phone_error"></span>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" method="post" action="{{route('admin.users.password.update', $user->id)}}" id="editGeneralPassword">
                            @csrf
                            <div class="form-group">
                                <label for="inputPassword" class="col-form-label">New Password</label>
                                <input type="password" class="form-control" id="inputPassword" placeholder="Enter User New Password" name="inputPassword">
                                <span class="text-danger error-text inputPassword_error"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@section('js')
<script>
    $(function(){
        $("#editGeneralProfile").on('submit', function(e){
			e.preventDefault();
		
			$.ajax({
				url:$(this).attr('action'),
				method:$(this).attr('method'),
				data:new FormData(this),
				processData:false,
				dataType:'json',
				contentType:false,
				beforeSend:function(){
					$(document).find('span.error-text').text('');
				},
				success:function(data){
					if(data.status == 0){
						$.each(data.error, function(prefix, val){
							$('span.'+prefix+'_error').text(val[0]);
						});
					} else{
						toastr.success(data.msg, data.state);
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				}
			});
		});

        $("#editGeneralPassword").on('submit', function(e){
			e.preventDefault();
		
			$.ajax({
				url:$(this).attr('action'),
				method:$(this).attr('method'),
				data:new FormData(this),
				processData:false,
				dataType:'json',
				contentType:false,
				beforeSend:function(){
					$(document).find('span.error-text').text('');
				},
				success:function(data){
					if(data.status == 0){
						$.each(data.error, function(prefix, val){
							$('span.'+prefix+'_error').text(val[0]);
						});
					} else{
						toastr.success(data.msg, data.state);
						setTimeout(function () {
							location.reload();
						}, 3000);
					}
				}
			});
		});
    });
</script>
@endsection