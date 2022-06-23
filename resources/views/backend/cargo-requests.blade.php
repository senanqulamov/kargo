@extends('backend.layout.app')

@section('title', 'Cargo Requests')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    <style>
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 3px dashed #0ea197b5;
        }

        .modal_package_cont {
            border-bottom: 1px dotted #0ea197b5;
            margin-bottom: 5px;
            padding: 20px;
        }
    </style>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Cargo requests</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Customer name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Barcode</th>
                                <th>View Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargo_requests as $cargo)
                                <tr>
                                    <td>{{ $cargo->id ? $cargo->id : '---' }}</td>
                                    <td>{{ $cargo->created_at ? $cargo->created_at : '---' }}</td>
                                    <td>{{ $cargo->name ? $cargo->name : '---' }}</td>
                                    <td>{{ $cargo->phone ? $cargo->phone : '---' }}</td>
                                    <td>{{ $cargo->email ? $cargo->email : '---' }}</td>
                                    <td>{{ $cargo->country ? $cargo->country : '---' }} </td>
                                    <td>{{ $cargo->city ? $cargo->city : '---' }}</td>
                                    <td>
                                        @foreach ($packages->where('cargo_id', $cargo->id) as $package)
                                            @if ($package->barcode)
                                                <p>Package barcode No: {{ $package->id }}</p>
                                                <a href="{{ $package->barcode }}" download="{{ $package->id }}">
                                                    <img width="150px" height="70px" src="{{ $package->barcode }}">
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-view-{{ $cargo->id }}"><i
                                                class="fa-solid fa-eye"></i></a>
                                    </td>
                                    <div class="modal fade" id="modal-view-{{ $cargo->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        View details of <b><u
                                                                style="color:#0ea197b5">{{ $cargo->order_info }}</u></b>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <h4 style="text-align: center;color:#0ea197b5">User Information</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label for="country">User Name</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $cargo->name ? $cargo->name : '---' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">Phone</label>
                                                            <input type="number" name="phone" class="form-control"
                                                                value="{{ $cargo->phone ? $cargo->phone : '---' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">Email</label>
                                                            <input type="text" name="email" class="form-control"
                                                                value="{{ $cargo->email ? $cargo->email : '---' }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row d-flex justify-content-center">
                                                        <h4 style="text-align: center;color:#0ea197b5">Address Information
                                                        </h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label for="country">Country</label>
                                                            <input type="text" name="country" class="form-control"
                                                                value="{{ $cargo->country ? $cargo->country : '---' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">State</label>
                                                            <input type="text" name="state" class="form-control"
                                                                value="{{ $cargo->state ? $cargo->state : '---' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">City</label>
                                                            <input type="text" name="city" class="form-control"
                                                                value="{{ $cargo->city ? $cargo->city : '---' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">Address</label>
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{ $cargo->address ? $cargo->address : '---' }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label for="country">Zip/Postal code</label>
                                                            <input type="text" name="zipcode" class="form-control"
                                                                value="{{ $cargo->zipcode ? $cargo->zipcode : '---' }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row d-flex justify-content-center">
                                                        <h4 style="text-align: center;color:#0ea197b5">Cargo Information
                                                        </h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label for="country">currency</label>
                                                            <input type="text" name="currency" class="form-control"
                                                                value="{{ $cargo->currency ? $cargo->currency : '---' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">Cargo Company</label>
                                                            @php
                                                                $cargo_company = DB::table('cargo_companies')
                                                                    ->where('id', $cargo->cargo_company)
                                                                    ->get()
                                                                    ->first();
                                                            @endphp
                                                            <input type="text" name="cargo_company"
                                                                class="form-control"
                                                                value="@if ($cargo_company) {{ $cargo_company->name }} @else --- @endif"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">IOSS number</label>
                                                            <input type="text" name="ioss_number" class="form-control"
                                                                value="{{ $cargo->ioss_number ? $cargo->ioss_number : '---' }}"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="country">VAT number</label>
                                                            <input type="text" name="vat_number" class="form-control"
                                                                value="{{ $cargo->vat_number ? $cargo->vat_number : '---' }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    <div class="row d-flex justify-content-center">
                                                        <h4 style="text-align: center;color:#0ea197b5">Shipment definition
                                                        </h4>
                                                    </div>
                                                    <div class="row d-flex justify-content-center">
                                                        <h5>
                                                            Extra bubble:
                                                            <u><b>{{ $cargo->extra_bubble == 'on' ? 'Yes' : 'No' }}</b></u>
                                                            /
                                                            Insure order:
                                                            <u><b>{{ $cargo->insure_order == 'on' ? 'Yes' : 'No' }}</b></u>
                                                            /
                                                            Other additional:
                                                            <u><b>{{ $cargo->other_additional == 'on' ? 'Yes' : 'No' }}</b></u>
                                                        </h5>
                                                    </div>

                                                    <hr>

                                                    <div class="row d-flex justify-content-center">
                                                        <h4 style="text-align: center;color:#0ea197b5">Product content
                                                        </h4>
                                                    </div>
                                                    <div class="row d-flex justify-content-center">
                                                        <h5>
                                                            Battery:
                                                            <u><b>{{ $cargo->battery == 'yes' ? 'Yes' : 'No' }}</b></u>
                                                            /
                                                            Liquid:
                                                            <u><b>{{ $cargo->liquid == 'yes' ? 'Yes' : 'No' }}</b></u>
                                                            /
                                                            Food:
                                                            <u><b>{{ $cargo->food == 'yes' ? 'Yes' : 'No' }}</b></u> /
                                                            Dangerous items:
                                                            <u><b>{{ $cargo->dangerous == 'yes' ? 'Yes' : 'No' }}</b></u>
                                                        </h5>
                                                    </div>

                                                    <hr>

                                                    <div class="row d-flex justify-content-center">
                                                        <h4 style="text-align: center;color:#0ea197b5">Packages
                                                        </h4>
                                                    </div>
                                                    <div class="modal_package_cont">

                                                    </div>
                                                    @foreach ($packages->where('cargo_id', $cargo->id) as $package)
                                                        <div class="modal_package_cont">
                                                            <div class="row">
                                                                <h6 style="text-align:center;">Package Number:
                                                                    <b style="color:#0ea197b5">{{ $package->id }}</b>
                                                                </h6>
                                                            </div>
                                                            @if ($package->barcode)
                                                                <a href="{{ $package->barcode }}"
                                                                    download="{{ $package->id }}">
                                                                    <img width="150px" height="70px"
                                                                        src="{{ $package->barcode }}">
                                                                </a>
                                                            @endif
                                                            <div class="row">
                                                                <div class="form-group col">
                                                                    <label for="country">Package count</label>
                                                                    <input type="text" name="package_count"
                                                                        class="form-control"
                                                                        value="{{ $package->package_count ? $package->package_count : '---' }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="country">Package Type</label>
                                                                    <input type="text" name="package_type"
                                                                        class="form-control"
                                                                        value="{{ $package->package_type ? $package->package_type : '---' }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="country">Package Length</label>
                                                                    <input type="text" name="package_length"
                                                                        class="form-control"
                                                                        value="{{ $package->package_length ? $package->package_length : '---' }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="country">Package Width</label>
                                                                    <input type="text" name="package_width"
                                                                        class="form-control"
                                                                        value="{{ $package->package_width ? $package->package_width : '---' }}"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col">
                                                                    <label for="country">Package height</label>
                                                                    <input type="text" name="package_height"
                                                                        class="form-control"
                                                                        value="{{ $package->package_height ? $package->package_height : '---' }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="country">Package weight</label>
                                                                    <input type="text" name="package_weight"
                                                                        class="form-control"
                                                                        value="{{ $package->package_weight ? $package->package_weight : '---' }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="country">Package Status</label>
                                                                    <h4 style="text-align: center;">
                                                                        @switch($package->status)
                                                                            @case(1)
                                                                                <b style="color: red;">Not picked up yet</b>
                                                                            @break

                                                                            @case(2)
                                                                                <b style="color: yellow;">Picked up</b>
                                                                            @break

                                                                            @case(3)
                                                                                <b style="color: blue;">At the facility</b>
                                                                            @break

                                                                            @case(4)
                                                                                <b style="color: green;">Deliverd</b>
                                                                            @break

                                                                            @default
                                                                                ---
                                                                        @endswitch
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
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
