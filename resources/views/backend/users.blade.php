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
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-add-new">
                        Add New <i class="fas fa-add"></i>
                    </a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>View</th>
                                <th>Ban/Unban</th>
                                <th>User Role</th>
                                <th style="width:40px">Image</th>
                                <th>Username</th>
                                <th>Gender</th>
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
                                <th>User Market</th>
                                <th>From Where</th>
                                <th>Promotion Code</th>
                                <th>Average Requests</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr @if ($user->is_banned == 1) style="background:#ff000063;" @endif>
                                    <td>
                                        010{{ $user->id }}20
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.details', $user->id) }}" class="btn btn-primary"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                    <td>
                                        @if ($user->is_banned == '0')
                                            <a href="{{ route('admin.users.ban_user', $user->id) }}" class="btn btn-danger">
                                                <i class="fas fa-ban"></i></a>
                                        @else
                                            <a href="{{ route('admin.users.unban_user', $user->id) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-check"></i></a>
                                        @endif
                                    </td>
                                    <td class="user_role_{{ $user->user_role }}">
                                        @php
                                            $user_role = DB::table('user_roles')
                                                ->where('role_id', $user->user_role)
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
                                    <td>{{ $user->gender ? $user->gender : '---' }}</td>
                                    <td class="balance_td">
                                        <div class="balance_holder">
                                            <span
                                                style="width: max-content;text-align:center;">{{ $user->balance ? $user->balance : '0' }}
                                                €</span>
                                        </div>
                                    </td>
                                    <td>{{ $user->email ? $user->email : '---' }}</td>
                                    <td>
                                        @php
                                            $date = Carbon\Carbon::parse($user->email_verified_at)->format('d-M-Y H:i');
                                        @endphp
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge">
                                                {{ $date }}
                                            </span>
                                        </div>
                                    </td>
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
                                    <td>{{ $user->user_market ? $user->user_market : '---' }}</td>
                                    <td>{{ $user->from_where ? $user->from_where : '---' }}</td>
                                    <td>{{ $user->promotion_code ? $user->promotion_code : '---' }}</td>
                                    <td>{{ $user->average_requests ? $user->average_requests : '---' }}</td>
                                    <td>
                                        @php
                                            $date = Carbon\Carbon::parse($user->created_at)->format('d-M-Y H:i');
                                        @endphp
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge">
                                                {{ $date }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.users.addnew') }}" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="modal-add-new">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="form-group col">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" required>
                            </div>
                            <div class="form-group col">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="tel" name="phone" required>
                            </div>
                            <div class="form-group col">
                                <label>Gender</label>
                                <div class="row">
                                    <label for="man_gender" class="btn btn-default radio-holder-label col">
                                        Man
                                        <input type="radio" id="man_gender" name="gender" value="man">
                                    </label>
                                    <label for="woman_gender" class="btn btn-default radio-holder-label col">
                                        Woman
                                        <input type="radio" id="woman_gender" name="gender" value="woman">
                                    </label>
                                    <label for="none_gender" class="btn btn-default radio-holder-label col">
                                        None
                                        <input type="radio" id="none_gender" name="gender" value="none" checked>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="country">Country</label>
                                @php
                                    $countries = DB::table('countries')->get();
                                @endphp
                                <select name="country" class="form-control select-custom-hm">
                                    <option selected disabled>Select one of the following</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="state">State</label>
                                <input type="text" name="state" class="form-control" required>
                            </div>
                            <div class="form-group col">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="postcode">Post Code</label>
                                <input type="text" name="postcode" class="form-control" required>
                            </div>
                            <div class="form-group col">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group col">
                                <label for="address_2">Address 2</label>
                                <input type="text" name="address_2" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Gender</label>
                                <div class="row">
                                    <label for="membership1" class="btn btn-default radio-holder-label col">
                                        Personal
                                        <input type="radio" id="membership1" name="membership" value="personal" required>
                                    </label>
                                    <label for="membership2" class="btn btn-default radio-holder-label col">
                                        Company
                                        <input type="radio" id="membership2" name="membership" value="company" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col personal-member-hm" data-display="none">
                                <label for="indetification_number">Indetification Number</label>
                                <input type="text" class="form-control" name="indetification_number">
                            </div>
                            <div class="form-group col personal-member-hm" data-display="none">
                                <label for="tax_adminstration">Tax Adminstration</label>
                                <input type="text" class="form-control" name="tax_adminstration">
                            </div>
                            <div class="form-group col company-member-hm" data-display="none">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                            <div class="form-group col company-member-hm" data-display="none">
                                <label for="tax_number">Tax Number</label>
                                <input type="text" class="form-control" name="tax_number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="Iban">Iban</label>
                                <input type="text" name="Iban" class="form-control">
                            </div>
                            <div class="form-group col">
                                <label for="balance">Balance</label>
                                <input type="number" name="balance" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            @php
                                $user_roles = DB::table('user_roles')->get();
                            @endphp
                            <div class="form-group col">
                                <label for="user_role">User Role</label>
                                <select name="user_role" id="user_role" class="form-control select-custom-hm">
                                    @foreach ($user_roles as $role)
                                        <option value="{{ $role->role_id }}"
                                            @if ($user->user_role == $role->role_id) selected @endif>
                                            {{ $role->role_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="is_admin">Is Admin</label>
                                <select name="is_admin" id="is_admin" class="form-control select-custom-hm">
                                    <option value="0">Not Admin</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>


    <script>
        var personal_member = document.querySelectorAll('.personal-member-hm');
        var company_member = document.querySelectorAll('.company-member-hm');

        personal_member.forEach(element => {
            if (element.getAttribute('data-display').replace(/ /g, '') === 'none') {
                element.style.display = "none";
            } else {
                element.style.display = "block";
            }
        });
        company_member.forEach(element => {
            if (element.getAttribute('data-display').replace(/ /g, '') === 'none') {
                element.style.display = "none";
            } else {
                element.style.display = "block";
            }
        });

        var membership1_button = document.querySelector('#membership1');
        membership1_button.addEventListener('click', function() {
            personal_member.forEach(element => {
                element.style.display = "block";
                company_member.forEach(company => {
                    company.style.display = "none";
                });
            });
        });
        var membership2_button = document.querySelector('#membership2');
        membership2_button.addEventListener('click', function() {
            company_member.forEach(element => {
                element.style.display = "block";
                personal_member.forEach(personal => {
                    personal.style.display = "none";
                });
            });
        })
    </script>
@endsection
