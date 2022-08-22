@extends('backend.layout.app')

@section('title', 'Personal Cargo')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>Create Personal Cargo</h4>
                </div>
                <a href="#" data-toggle="modal" data-target="#cargoModal" class="small-box-footer">
                    add new
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Personal Cargo</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Company</th>
                                <th>Desi</th>
                                <th>Zone</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personal_cargo as $personal)
                                <tr>
                                    <td>{{ $personal->id }}</td>
                                    @php
                                        $user = DB::table('users')
                                            ->where('id', $personal->user_id)
                                            ->first();
                                    @endphp
                                    <td>
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.users.details', $personal->user_id) }}', '_self')">
                                                {{ $user->name }}:
                                                010{{ $personal->user_id ? $personal->user_id : '---' }}20
                                            </span>
                                        </div>
                                    </td>
                                    @php
                                        $company = DB::table('cargo_companies')
                                            ->where('id', $personal->companyID)
                                            ->first();
                                    @endphp
                                    <td>
                                        @if ($company)
                                            <img style="width:60px;"
                                                src="{{ asset('/') }}backend/assets/img/companies/cargo/{{ $company->logo == null ? 'user.png' : $company->logo }}" />
                                        @endif
                                    </td>
                                    <td>{{ $personal->desi }}</td>
                                    <td>{{ $personal->zone }}</td>
                                    <td>{{ $personal->created_at }}</td>
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

    <div class="modal fade" id="cargoModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Personal Cargo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.companies.create_personal_cargo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <label for="user">User</label>
                                <select name="user" class="form-control" required>
                                    <option selected disabled>Select User</option>
                                    @php
                                        $users = DB::table('users')->get();
                                    @endphp
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }} / {{ $user->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="company">Company</label>
                                <select name="company" class="form-control" required>
                                    <option selected disabled>Select Company</option>
                                    @php
                                        $companies = DB::table('cargo_companies')->get();
                                    @endphp
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="zone">Excel</label>
                                <input class="form-control" type="file" name="zone">
                            </div>
                            <div class="form-group col">
                                <label for="personal_name">Special Name</label>
                                <input class="form-control" type="text" name="personal_name" required>
                            </div>
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

@endsection
