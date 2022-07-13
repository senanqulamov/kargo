@extends('backend.layout.app')

@section('title', 'User Info')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
@endsection

@section('content')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                backdrop: true,
                timer: 4000
            })
        </script>
    @endif
    <style>
        #is_admin,
        #balance {
            border: 1px dashed #08f475;
        }
    </style>
    <div class="row">
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img src="{{ asset('/') }}images/{{ $user->image == null ? 'user.png' : $user->image }}"
                            alt="user profile picture" class="profile-user-img img-fluid img-circle">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>ID</b> <a class="float-right">010{{ $user->id }}20</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="float-right">{{ $user->phone }}</a>
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
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">General
                                Information</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal" method="post"
                                action="{{ route('admin.users.general.update', $user->id) }}" id="editGeneralProfile">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" placeholder="name" name="name"
                                                value="{{ $user->name }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail" placeholder="Email" name="email"
                                                value="{{ $user->email }}" required />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="inputPhone">Phone</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                id="inputPhone" placeholder="Phone | example: 551234567" name="phone"
                                                value="{{ $user->phone }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text"
                                                class="form-control @error('Country') is-invalid @enderror" id="Country"
                                                name="Country" value="{{ $user->country }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                id="city" name="city" value="{{ $user->city }}" />
                                            <span class="text-danger error-text city_error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="postcode">Post Code</label>
                                            <input type="text"
                                                class="form-control @error('postcode') is-invalid @enderror" id="postcode"
                                                name="postcode" value="{{ $user->postcode }}" />
                                            <span class="text-danger error-text postcode_error"></span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" id="address"
                                                name="address" value="{{ $user->address }}" />
                                            <span class="text-danger error-text address_error"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="address_2">Address 2</label>
                                            <input type="text"
                                                class="form-control @error('address_2') is-invalid @enderror"
                                                id="address_2" name="address_2" value="{{ $user->address_2 }}" />
                                            <span class="text-danger error-text address_2_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="indetification_number">Identification Number</label>
                                            <input type="text"
                                                class="form-control @error('indetification_number') is-invalid @enderror"
                                                id="indetification_number" name="indetification_number"
                                                value="{{ $user->indetification_number }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="company_name">Company Name</label>
                                            <input type="text"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                id="company_name" name="company_name"
                                                value="{{ $user->company_name }}" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tax_number">Tax Number</label>
                                            <input type="text"
                                                class="form-control @error('tax_number') is-invalid @enderror"
                                                id="tax_number" name="tax_number" value="{{ $user->tax_number }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="tax_adminstration">Tax adminstration</label>
                                            <input type="text"
                                                class="form-control @error('tax_adminstration') is-invalid @enderror"
                                                id="tax_adminstration" name="tax_adminstration"
                                                value="{{ $user->tax_adminstration }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="Iban">Iban</label>
                                        <input type="text" class="form-control @error('Iban') is-invalid @enderror"
                                            id="Iban" name="Iban" value="{{ $user->Iban }}" />
                                    </div>
                                    <div class="form-group col">
                                        <label for="balance">Balance</label>
                                        <input type="number" class="form-control @error('balance') is-invalid @enderror"
                                            id="balance" name="balance" value="{{ $user->balance }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="is_admin">Is Admin</label>
                                            @php
                                                $user_roles = DB::table('user_roles')->get();
                                            @endphp
                                            <select name="is_admin" id="is_admin" class="form-control">
                                                @foreach ($user_roles as $role)
                                                    <option value="{{ $role->role_id }}"
                                                        @if ($user->is_admin == $role->role_id) selected @endif>
                                                        {{ $role->role_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="post"
                                action="{{ route('admin.users.password.update', $user->id) }}"
                                id="editGeneralPassword">
                                @csrf
                                <div class="form-group">
                                    <label for="password" class="col-form-label">New Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter User New Password" name="password">
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
