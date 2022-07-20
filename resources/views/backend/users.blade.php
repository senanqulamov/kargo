@extends('backend.layout.app')

@section('title', 'Users')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    @php $user_count = DB::table('users')->count() @endphp
                    <span class="info-box-number">{{ $user_count }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>View</th>
                                <th>User ID</th>
                                <th>User Role</th>
                                <th style="width:40px">Image</th>
                                <th>Username</th>
                                <th>Balance</th>
                                <th>Email</th>
                                <th>Email Verified At</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>membership</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Post Code</th>
                                <th>Address</th>
                                <th>Address 2</th>
                                <th>Indetification Number</th>
                                <th>Company Name</th>
                                <th>Tax Adminstration</th>
                                <th>Tax Number</th>
                                <th>Iban</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.users.details', $user->id) }}" class="btn btn-primary"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                    <td>
                                        010{{ $user->id }}20
                                    </td>
                                    <td class="user_role_{{ $user->is_admin }}">
                                        @php
                                            $user_role = DB::table('user_roles')
                                                ->where('role_id', $user->is_admin)
                                                ->first();
                                        @endphp
                                        {{ $user_role->role_name }}
                                    </td>
                                    <td>
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('/') }}images/{{ $user->image == null ? 'user.png' : $user->image }}"
                                            alt="user profile picture">
                                    </td>
                                    <td>{{ $user->name ? $user->name : '---' }}</td>
                                    <td class="balance_td">
                                        <div class="balance_holder" style="width: max-content">
                                            {{ $user->balance ? $user->balance : '0' }} €
                                        </div>
                                    </td>
                                    <td>{{ $user->email ? $user->email : '---' }}</td>
                                    <td>{{ $user->email_verified_at ? $user->email_verified_at : '---' }}</td>
                                    <td>{{ $user->phone ? $user->phone : '---' }}</td>
                                    <td style="background: rgba(57, 52, 52, 0.636);color:white;">
                                        {{ $user->status ? 'Complete Profile' : 'Incomplete Profile' }}
                                    </td>
                                    <td>{{ $user->membership ? $user->membership : '---' }}</td>
                                    <td>{{ $user->city ? $user->city : '---' }}</td>
                                    <td>{{ $user->country ? $user->country : '---' }}</td>
                                    <td>{{ $user->postcode ? $user->postcode : '---' }}</td>
                                    <td>{{ $user->address ? $user->address : '---' }}</td>
                                    <td>{{ $user->address_2 ? $user->address_2 : '---' }}</td>
                                    <td>{{ $user->indetification_number ? $user->indetification_number : '---' }}</td>
                                    <td>{{ $user->company_name ? $user->company_name : '---' }}</td>
                                    <td>{{ $user->tax_adminstration ? $user->tax_adminstration : '---' }}</td>
                                    <td>{{ $user->tax_number ? $user->tax_number : '---' }}</td>
                                    <td>{{ $user->Iban ? $user->Iban : '---' }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
