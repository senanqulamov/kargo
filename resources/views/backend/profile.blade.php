@extends('admin.include.app')

@section('title', 'Profile')

@php ($user = DB::table('users')->where('id', session()->get('Profile'))->first() )

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('/')}}backend/assets/img/{{ $user->image == NULL ? 'icon/user.png' : 'users/'.$user->image }}" alt="user profile picture">
                    </div>

                    <h3 class="profile-username text-center text-capitalize">{{$user->name}}</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered mb-0">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$user->email}}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">General Data</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Profile Image</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Password Change</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal" method="post" action="{{route('admin.profile.general')}}" id="editGeneralProfile">
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
                        <div class="tab-pane" id="timeline">
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
        $("#editGeneralProfile").submit(function(e){
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
                    if(data.status == false){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    } else {
                        //toastr.success();
                        toastr.success(data.msg, 'Congratulations!')
                    }
                }
            });
        });
    });
</script>
@endsection