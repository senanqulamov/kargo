@extends('backend.layout.app')

@section('title', 'Cargo Packages')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Packages waiting for delivery</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cargo ID</th>
                                <th>Status</th>
                                <th>Package count</th>
                                <th>Package type</th>
                                <th>Length</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Weight </th>
                                <th>Barcode: </th>
                                <th>Date: </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td>{{ $package->id ? $package->id : '---' }}</td>
                                    <td>{{ $package->cargo_id ? $package->cargo_id : '---' }}</td>
                                    <td>
                                        @if ($package->status == '1')
                                            <b><span style="color: red;">Waiting for Delivery</span></b>
                                        @else
                                            <span style="color: green;">Already delivered</span>
                                        @endif
                                    </td>
                                    <td>{{ $package->package_count ? $package->package_count : '---' }}</td>
                                    <td>{{ $package->package_type ? $package->package_type : '---' }}</td>
                                    <td>{{ $package->package_length ? $package->package_length : '---' }}</td>
                                    <td>{{ $package->package_width ? $package->package_width : '---' }}</td>
                                    <td>{{ $package->package_height ? $package->package_height : '---' }}</td>
                                    <td>{{ $package->package_weight ? $package->package_weight : '---' }}</td>
                                    <td>
                                        @if ($package->barcode)
                                        <p>Package barcode No: {{ $package->id }}</p>
                                        <a href="{{ $package->barcode }}" download="{{ $package->id }}">
                                            <img width="150px" height="70px" src="{{ $package->barcode }}">
                                        </a>
                                        @endif
                                    </td>
                                    <td>{{ $package->created_at ? $package->created_at : '---' }}</td>
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
    <script></script>
@endsection
