@extends('backend.layout.app')

@section('title', 'Cargo Requests')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('content')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                backdrop: false,
                timer: 2000
            })
        </script>
    @endif
    <style>
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 3px solid #0ea197b5;
        }

        .modal_package_cont {
            border-bottom: 1px dotted #0ea197b5;
            margin-bottom: 5px;
            padding: 20px;
        }

        .additional_service_td {
            display: flex;
            flex-direction: column;
            gap: 5px;
            text-align: center;
        }

        .status_td {
            display: flex;
            flex-direction: column;
            gap: 5px;
            text-align: center;
        }

        .packages_td {
            display: flex;
            flex-direction: row;
            gap: 5px;
            text-align: center;
            justify-content: center;
        }

        .additional_service_style {
            border-radius: 10px;
            padding: 0 10px;
        }

        .details-modal-header-flex {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .status_style {
            border-radius: 10px;
            padding: 3px 10px;
            background: rgb(122 103 103 / 11%);
        }

        .status_color_0 {
            border: 1px solid red;
            color: red;
        }

        .status_color_1 {
            border: 1px solid yellow;
            color: #5b5b20;
        }

        .status_color_2 {
            border: 1px solid blue;
            color: blue;
        }

        .status_color_3 {
            border: 1px solid green;
            color: green;
        }

        .package_status_span {
            color: white;
            border-radius: 20px;
            width: max-content;
            height: max-content;
            font-size: 12px;
            padding: 4px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .package_status_0 {
            background: #b16060;
            border: 2px solid red;
        }

        .package_status_1 {
            background: #b1a960;
            border: 2px solid yellow;
        }

        .package_status_2 {
            background: #6074b1;
            border: 2px solid blue;
        }

        .package_status_3 {
            background: #74b160;
            border: 2px solid green;
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
                                <th>View/Edit Details</th>
                                <th>Download PDF</th>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Packages / Status</th>
                                <th>Customer name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>ZipCode</th>
                                <th>Total Cargo Price</th>
                                <th>IOSS number</th>
                                <th>VAT number</th>
                                <th>Order info</th>
                                <th class="additional_services_th">Additional Services</th>
                                <th>Cargo Company</th>
                                <th>Battery</th>
                                <th>Liquid</th>
                                <th>Food</th>
                                <th>Dangerous items</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargo_requests as $cargo)
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-info"
                                            data-toggle="modal"data-target="#modal-view-{{ $cargo->id }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div style="display: flex;justify-content:center;">
                                            <a
                                                href="{{ route('userpanel.generatePdfManualOrder', ['id' => $cargo->id]) }}">
                                                <i class="fa-solid fa-arrow-down navigation__icon"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $cargo->id ? $cargo->id : '---' }}</td>
                                    <td>{{ $cargo->created_at ? $cargo->created_at : '---' }}</td>
                                    @php
                                        $status = DB::table('package_statuses')
                                            ->where('status', $cargo->status)
                                            ->get()
                                            ->first();
                                    @endphp
                                    <td>
                                        <div class="status_td">
                                            <span class="status_style status_color_{{ $status->status }}">
                                                {{ $status->status_name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="packages packages_td">
                                            @foreach ($packages->where('cargo_id', $cargo->id) as $package)
                                                <span class="package_status_span package_status_{{ $package->status }}">
                                                    {{ $package->id }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{ $cargo->name ? $cargo->name : '---' }}</td>
                                    <td>{{ $cargo->phone ? $cargo->phone : '---' }}</td>
                                    <td>{{ $cargo->email ? $cargo->email : '---' }}</td>
                                    <td>{{ $cargo->country ? $cargo->country : '---' }} </td>
                                    <td>{{ $cargo->state ? $cargo->state : '---' }}</td>
                                    <td>{{ $cargo->city ? $cargo->city : '---' }}</td>
                                    <td>{{ $cargo->address ? $cargo->address : '---' }}</td>
                                    <td>{{ $cargo->zipcode ? $cargo->zipcode : '---' }}</td>
                                    <td>{{ $cargo->total_cargo_price ? $cargo->total_cargo_price : '---' }}</td>
                                    <td>{{ $cargo->ioss_number ? $cargo->ioss_number : '---' }}</td>
                                    <td>{{ $cargo->vat_number ? $cargo->vat_number : '---' }}</td>
                                    <td>{{ $cargo->order_info ? $cargo->order_info : '---' }}</td>
                                    <td class="additional_service_td">
                                        @if ($cargo->additional_services)
                                            @foreach (json_decode($cargo->additional_services) as $service)
                                                <span class="additional_service_style">
                                                    {{ $service }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span
                                                style="background:#f9c0c0;color:#020000;border-radius: 10px;padding: 0 10px;">No
                                                Additional
                                                services</span>
                                        @endif
                                    </td>
                                    @php
                                        $cargo_company = DB::table('cargo_companies')
                                            ->where('id', $cargo->cargo_company)
                                            ->get()
                                            ->first();
                                    @endphp
                                    <td>
                                        <img style="width:60px;"
                                            src="{{ asset('/') }}backend/assets/img/companies/cargo/{{ $cargo_company->logo == null ? 'user.png' : $cargo_company->logo }}" />
                                    </td>
                                    <td>{{ $cargo->battery == 'yes' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $cargo->liquid == 'yes' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $cargo->food == 'yes' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $cargo->dangerous == 'yes' ? 'Yes' : 'No' }}</td>
                                    <div class="modal fade" id="modal-view-{{ $cargo->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="details-modal-header-flex">
                                                        <button class="btn btn-warning" type="button"
                                                            onclick="StartToEdit(this)" data-id="{{ $cargo->id }}">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </button>
                                                        <h4 class="modal-title">
                                                            View details of <b><u
                                                                    style="color:#0ea197b5">{{ $cargo->order_info }}</u></b>
                                                        </h4>
                                                        <h4>Total cargo price: <b><u
                                                                    style="color:#0ea197b5">{{ $cargo->total_cargo_price }}</u></b>
                                                        </h4>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="form-{{ $cargo->id }}">
                                                    <form
                                                        action="{{ route('userpanel.updatecargo', ['id' => $cargo->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="row d-flex justify-content-center">
                                                            <h4 style="text-align: center;color:#0ea197b5">User Information
                                                            </h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="country">User Name</label>
                                                                <input type="text" name="name"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->name ? $cargo->name : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">Phone</label>
                                                                <input type="number" name="phone"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->phone ? $cargo->phone : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">Email</label>
                                                                <input type="text" name="email"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->email ? $cargo->email : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="row d-flex justify-content-center">
                                                            <h4 style="text-align: center;color:#0ea197b5">Address
                                                                Information
                                                            </h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="country">Country</label>
                                                                <input type="text" name="country"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->country ? $cargo->country : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">State</label>
                                                                <input type="text" name="state"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->state ? $cargo->state : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">City</label>
                                                                <input type="text" name="city"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->city ? $cargo->city : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">Address</label>
                                                                <input type="text" name="address"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->address ? $cargo->address : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="country">Zip/Postal code</label>
                                                                <input type="text" name="zipcode"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->zipcode ? $cargo->zipcode : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="row d-flex justify-content-center">
                                                            <h4 style="text-align: center;color:#0ea197b5">Cargo
                                                                Information
                                                            </h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="country">currency</label>
                                                                <input type="text" name="currency"
                                                                    class="form-control"
                                                                    value="{{ $cargo->currency ? $cargo->currency : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">Cargo Company</label>
                                                                @php
                                                                    $cargo_companies = DB::table('cargo_companies')->get();
                                                                @endphp
                                                                <select name="cargo_company"
                                                                    class="form-control readonly-details" readonly="true">
                                                                    @foreach ($cargo_companies as $company)
                                                                        <option value="{{ $company->id }}"
                                                                            @if ($company->id == $cargo->cargo_company) selected @endif>
                                                                            {{ $company->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">IOSS number</label>
                                                                <input type="text" name="ioss_number"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->ioss_number ? $cargo->ioss_number : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                            <div class="form-group col">
                                                                <label for="country">VAT number</label>
                                                                <input type="text" name="vat_number"
                                                                    class="form-control readonly-details"
                                                                    value="{{ $cargo->vat_number ? $cargo->vat_number : '' }}"
                                                                    readonly="true">
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <div class="row d-flex justify-content-center">
                                                            <h4 style="text-align: center;color:#0ea197b5">Shipment
                                                                definition
                                                            </h4>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <h5>Additional services:</h5>
                                                            <div
                                                                style="display: flex;flex-direction:row;gap:5px;margin-left: 5px">
                                                                @if ($cargo->additional_services)
                                                                    @foreach (json_decode($cargo->additional_services) as $service)
                                                                        <span class="additional_service_style">
                                                                            {{ $service }}
                                                                        </span>
                                                                    @endforeach
                                                                @else
                                                                    <span
                                                                        style="background:#f9c0c0;color:#020000;border-radius: 10px;padding: 0 10px;">No
                                                                        Additional
                                                                        services</span>
                                                                @endif
                                                            </div>
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
                                                                <u><b>{{ $cargo->food == 'yes' ? 'Yes' : 'No' }}</b></u>
                                                                /
                                                                Dangerous items:
                                                                <u><b>{{ $cargo->dangerous == 'yes' ? 'Yes' : 'No' }}</b></u>
                                                            </h5>
                                                        </div>

                                                        <hr>

                                                        <div class="row d-flex justify-content-center">
                                                            <h3 style="text-align: center;color:#0ea197b5">Packages
                                                            </h3>
                                                        </div>
                                                        @foreach ($packages->where('cargo_id', $cargo->id) as $package)
                                                            <div class="modal_package_cont">
                                                                <div class="row">
                                                                    <h6 style="text-align:center;">Package Number:
                                                                        <b
                                                                            style="color:#0ea197b5">{{ $package->id }}</b>
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
                                                                            value="{{ $package->package_count ? $package->package_count : '' }}"
                                                                            readonly="true">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="country">Package Type</label>
                                                                        <input type="text" name="package_type"
                                                                            class="form-control"
                                                                            value="{{ $package->package_type ? $package->package_type : '' }}"
                                                                            readonly="true">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="country">Package Length</label>
                                                                        <input type="text" name="package_length"
                                                                            class="form-control"
                                                                            value="{{ $package->package_length ? $package->package_length : '' }}"
                                                                            readonly="true">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="country">Package Width</label>
                                                                        <input type="text" name="package_width"
                                                                            class="form-control"
                                                                            value="{{ $package->package_width ? $package->package_width : '' }}"
                                                                            readonly="true">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col">
                                                                        <label for="country">Package height</label>
                                                                        <input type="text" name="package_height"
                                                                            class="form-control"
                                                                            value="{{ $package->package_height ? $package->package_height : '' }}"
                                                                            readonly="true">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="country">Package weight</label>
                                                                        <input type="text" name="package_weight"
                                                                            class="form-control"
                                                                            value="{{ $package->package_weight ? $package->package_weight : '' }}"
                                                                            readonly="true">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="country">Package Status</label>
                                                                        @php
                                                                            $status = DB::table('package_statuses')
                                                                                ->where('status', $package->status)
                                                                                ->get()
                                                                                ->first();
                                                                        @endphp
                                                                        <div class="status_td">
                                                                            <span
                                                                                class="status_style status_color_{{ $status->status }}">
                                                                                {{ $status->status_name }}
                                                                            </span>
                                                                        </div>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div class="row d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-success"
                                                                style="width: max-content">Update</button>
                                                        </div>
                                                    </form>
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
    <script>
        var colors = ['rgb(112 178 220)', '#ff0000', 'rgb(230 47 235)', 'rgb(9 43 9)',
            'rgb(67 215 67)', '#0000ff'
        ];
        var additional_services = document.querySelectorAll('.additional_service_style');

        additional_services.forEach(element => {
            // const random_color = Math.floor(Math.random() * 16777215).toString(16);
            var random_color = colors[Math.floor(Math.random() * colors.length)];
            element.style.color = random_color;
            element.style.background = "white";
            element.style.border = "0.5px solid " + random_color;
        });

        function StartToEdit(edit_button) {
            var cargo_id = edit_button.getAttribute('data-id');
            var form = document.querySelector('#form-' + cargo_id);
            var inputs = form.querySelectorAll('.readonly-details');

            inputs.forEach(element => {
                if (element.getAttribute('readonly') == "true") {
                    element.removeAttribute('readonly');
                } else {
                    element.setAttribute('readonly', 'true');
                }
            });
        }
    </script>
@endsection
