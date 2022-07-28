@extends('backend.layout.app')

@section('title', 'Cargo Details')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.cargo-requests.index') }}">Cargo Requests</a></li>
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
        p {
            margin: 0;
        }

        .status_style {
            border-radius: 10px;
            padding: 3px 10px;
        }

        .status_color_0 {
            color: #63AEE0;
            border: 1px solid #63AEE0;
        }

        .status_color_1 {
            color: #EDBA4F;
            border: 1px solid #EDBA4F;
        }

        .status_color_2 {
            color: #9C62E2;
            border: 1px solid #9C62E2;
        }

        .status_color_3 {
            color: #8feab6;
            border: 1px solid #8feab6;
        }

        .status_color_4 {
            color: #5BBC73;
            border: 1px solid #5BBC73;
        }

        .status_color_5 {
            color: #D94B5D;
            border: 1px solid #D94B5D;
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
            background: #63AEE0;
        }

        .package_status_1 {
            background: #EDBA4F;
        }

        .package_status_2 {
            background: #9C62E2;
        }

        .package_status_3 {
            background: #8feab6;
        }

        .package_status_4 {
            background: #5BBC73;
        }

        .package_status_5 {
            background: #D94B5D;
        }

        .package-id-style span {
            color: #63AEE0;
            font-weight: bold;
            font-style: underline;
        }

        .package-id-style {
            font-weight: bold;
            margin-right: 10px;
        }

        .remove_button_file_upld {
            all: unset;
        }

        .commonIcon {
            border-radius: 50%;
            color: #fff;
            background-color: #18bdf6;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .file_inputs_style {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cargo Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.cargo-requests.cargo_update', ['id' => $cargo_id]) }}" method="POST">
                        @csrf
                        <section class="container p-1">
                            <div class="border p-3">
                                <div class="row" style="gap: 10px;">
                                    <h4 class="package-id-style">
                                        Order number:
                                        <span>{{ $cargo_id }}</span>
                                    </h4>
                                    @if ($cargo->status == 3 && $cargo->submitted == 0)
                                        <a href="{{ route('admin.cargo-requests.submit_order', ['id' => $cargo_id]) }}"
                                            class="btn btn-info">Submit order</a>
                                    @endif
                                    @if ($cargo->status != 5 && $cargo->status != 4)
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal-cancel-order">
                                            Cancel Order
                                        </a>
                                    @endif
                                    @if ($cargo->status == 5)
                                        <a href="{{ route('admin.cargo-requests.revert_order', ['id' => $cargo_id]) }}"
                                            class="btn btn-info">
                                            Revert Order
                                        </a>
                                    @endif
                                </div>
                                <hr>
                                <h4 class="row" style="gap: 10px;">
                                    Order status:
                                    @php
                                        $status = DB::table('package_statuses')
                                            ->where('status', $cargo->status)
                                            ->get()
                                            ->first();
                                    @endphp
                                    <span class="status_style status_color_{{ $status->status }}">
                                        {{ $status->status_name }}
                                    </span>
                                    Order Type: <b><u>{{ $cargo->order_type }}</u></b>
                                    Order By:
                                    <a href="{{ route('admin.users.details', $cargo->user_id) }}"
                                        class="badge rounded-pill bg-info user_id_badge" target="__blank">
                                        010{{ $cargo->user_id ? $cargo->user_id : '---' }}20
                                        <i class="fa-solid fa-up-right-from-square"></i>
                                    </a>
                                    <a href="{{ route('admin.cargo-requests.cargo_logs_with_id', $cargo_id) }}"
                                        class="badge rounded-pill bg-info user_id_badge">
                                        Cargo Logs
                                        <i class="fa-solid fa-up-right-from-square"></i>
                                    </a>
                                </h4>
                                <div class="col-4 d-flex flex-column py-3">
                                    <label for="tracking_number" class="labelCustom">Tracking Number</label>
                                    <input class="form-control" type="text" name="tracking_number"
                                        value="{{ $cargo->tracking_number }}" />
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="name" class="labelCustom">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $cargo->name }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="country" class="labelCustom">Country</label>
                                        @php
                                            $countries = DB::table('cargo_countries')->get();
                                        @endphp
                                        <select name="country" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->country }}"
                                                    @if ($country->country == $cargo->country) selected @endif>
                                                    {{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="state" class="labelCustom">State</label>
                                        <input class="form-control" type="text" name="state"
                                            value="{{ $cargo->state }}" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="city" class="labelCustom">City</label>
                                        <input class="form-control" type="text" name="city"
                                            value="{{ $cargo->city }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="address" class="labelCustom">Address</label>
                                        <input class="form-control" type="text" name="address"
                                            value="{{ $cargo->address }}" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="zipcode" class="labelCustom">Zip Code</label>
                                        <input class="form-control" type="text" name="zipcode"
                                            value="{{ $cargo->zipcode }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="phone" class="labelCustom">Phone</label>
                                        <input class="form-control" type="number" name="phone"
                                            value="{{ $cargo->phone }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="email" class="labelCustom">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $cargo->email }}" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="ioss_number" class="labelCustom">IOSS number</label>
                                        <input class="form-control" type="text" name="ioss_number"
                                            value="{{ $cargo->ioss_number }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="vat_number" class="labelCustom">VAT number</label>
                                        <input class="form-control" type="text" name="vat_number"
                                            value="{{ $cargo->vat_number }}" />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="currency" class="labelCustom">Currency</label>
                                        <select name="currency" class="form-control">
                                            @foreach ($currencies as $currency)
                                                <option value="{{ $currency->currency_code }}"
                                                    @if ($currency->currency_code == $cargo->currency) selected @endif>
                                                    {{ $currency->currency_name }}
                                                </option>
                                            @endforeach
                                            {{-- <option value="{{ $cargo->currency }}">{{ $cargo->currency }}</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="order_info" class="labelCustom">Order Info</label>
                                        <textarea class="form-control" name="order_info" rows="4" cols="50">{{ $cargo->order_info }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="border p-3">
                                <h4>Total values</h4>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_cargo_price" class="labelCustom">Total Cargo Price / €</label>
                                        <input class="form-control" type="number" name="total_cargo_price"
                                            value="{{ $cargo->total_cargo_price }}" readonly />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_volume" class="labelCustom">Total Volume / m3</label>
                                        <input class="form-control" type="number" name="total_volume"
                                            value="{{ $cargo->total_volume }}" readonly />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_weight" class="labelCustom">Total Weight / kg</label>
                                        <input class="form-control" type="number" name="total_weight"
                                            value="{{ $cargo->total_weight }}" readonly />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_deci" class="labelCustom">Total Pricing Weight</label>
                                        <input class="form-control" type="number" name="total_deci"
                                            value="{{ $cargo->total_deci }}" readonly />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_count" class="labelCustom">Total Amount</label>
                                        <input class="form-control" type="number" name="total_count"
                                            value="{{ $cargo->total_count }}" readonly />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_worth" class="labelCustom">Total Worth / €</label>
                                        <input class="form-control" type="number" name="total_worth"
                                            value="{{ $cargo->total_worth }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="border p-3">
                                <h4>Aditional details</h4>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_volume" class="labelCustom">Cargo Company</label>
                                        @php
                                            $cargo_companies = json_decode($cargo->company_value);
                                            $cargo_companies = json_decode(json_encode($cargo_companies), true);
                                            $companies = DB::table('cargo_companies')->get();
                                            // dd($cargo_companies);
                                        @endphp
                                        <div class="row form-group">
                                            @if ($cargo_companies)
                                                @foreach ($companies as $company)
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <ul class="list-group list-group-horizontal">
                                                            <li class="list-group-item w-25 text-center">
                                                                <img style="width:60px;height:60px;"
                                                                    src="{{ asset('/') }}backend/assets/img/companies/cargo/{{ $company->logo == null ? 'user.png' : $company->logo }}" />
                                                            </li>
                                                            <li class="list-group-item w-50 text-left">
                                                                {{ $company->name }}</li>
                                                            <li class="list-group-item d-flex">
                                                                <span class="me-2">
                                                                    @if (isset($cargo_companies[$company->id]))
                                                                        {{ $cargo_companies[$company->id] }}
                                                                    @else
                                                                        0
                                                                    @endif
                                                                    €
                                                                </span>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="cargo_company"
                                                                        id="cargo_company_input_{{ $company->id }}"
                                                                        data-price="0" value="{{ $company->id }}"
                                                                        @if ($company->id == $cargo->cargo_company) checked @endif />
                                                                    <input type="hidden"
                                                                        name="company_value[{{ $company->id }}]"
                                                                        value="@if (isset($cargo_companies[$company->id])) {{ $cargo_companies[$company->id] }}@else 0 @endif">
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <h6><b>Additional Services</b></h6>
                                <div class="row form-group">
                                    @php
                                        $services = json_decode($cargo->additional_services);
                                        $services = json_decode(json_encode($services), true);
                                    @endphp
                                    @if ($services)
                                        @foreach ($services as $key => $value)
                                            <div class="col-12 col-md-4">
                                                <ul class="list-group list-group-horizontal mb-2">
                                                    <li class="list-group-item w-75 d-flex text-left">
                                                        <div class="form-check">
                                                            <input
                                                                class="form-check-input cargo_price_input {{ $key }}_input"
                                                                type="checkbox" data-price="{{ $value }}"
                                                                name="additional_services[{{ $key }}]"
                                                                id="{{ $key }}" value="{{ $value }}"
                                                                checked />
                                                        </div>
                                                        {{ $key }}
                                                    </li>
                                                    <li class="list-group-item d-flex">
                                                        <span class="me-2 {{ $key }}_span">{{ $value }}
                                                            €</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="row form-group">
                                    <p>
                                        <b><u>Battery : </u></b>{{ $cargo->battery == 'yes' ? 'Yes' : 'No' }} |
                                        <b><u>Liquid : </u></b>{{ $cargo->liquid == 'yes' ? 'Yes' : 'No' }} |
                                        <b><u>Food : </u></b>{{ $cargo->food == 'yes' ? 'Yes' : 'No' }} |
                                        <b><u>Dangerous : </u></b>{{ $cargo->dangerous == 'yes' ? 'Yes' : 'No' }}
                                    </p>
                                </div>
                                <div class="row form-group">
                                    <div class="row col-12 col-md-3 mb-2">
                                        <div class="col-12 border-end">
                                            <h5>Does the product contain a battery?</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="battery"
                                                    id="battery_yes" value="yes" />
                                                <label class="form-check-label" for="battery_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="battery"
                                                    id="battery_no" value="no" checked />
                                                <label class="form-check-label" for="battery_no">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12 col-md-3 mb-2">
                                        <div class="col-12 border-end">
                                            <h5>Does the product contain
                                                cosmetics/liquids?</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="liquid"
                                                    id="liquid_yes" value="yes" />
                                                <label class="form-check-label" for="liquid_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="liquid"
                                                    id="liquid_no" value="no" checked />
                                                <label class="form-check-label" for="liquid_no">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12 col-md-3 mb-2">
                                        <div class="col-12 border-end">
                                            <h5>Does the product contain food?</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="food"
                                                    id="food_yes" value="yes" />
                                                <label class="form-check-label" for="food_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="food"
                                                    id="food_no" checked value="no" />
                                                <label class="form-check-label" for="food_no">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12 col-md-3 mb-2">
                                        <div class="col-12 border-end">
                                            <h5>Does the product contain dangerous substances?</h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="dangerous"
                                                    id="dangerous_yes" value="yes" />
                                                <label class="form-check-label" for="dangerous_yes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="dangerous"
                                                    id="dangerous_no" value="no" checked />
                                                <label class="form-check-label" for="dangerous_no">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="document">Documents: </label>
                                    @php
                                        $documents = DB::table('cargo_documents')
                                            ->where('cargo_id', $cargo_id)
                                            ->get();
                                    @endphp
                                    <div class="col">
                                        @foreach ($documents as $key => $document)
                                            <div class="file_inputs_style">
                                                <p>{{ $key + 1 }})</p>
                                                <a href="/files/{{ $document->document }}"
                                                    download="{{ $document->document }}">
                                                    <p style="width:max-content;">{{ $document->document }}</p>
                                                </a>
                                                <input name="document[{{ $document->doc_id }}]"
                                                    value="{{ $document->document }}" hidden>
                                                <p><b><u>({{ $document->type }})</u></b></p>
                                                <button type="button" class="remove_button_file_upld"
                                                    onclick="removeFileLabel(this)">
                                                    <i class="fa-solid fa-remove commonIcon"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="border p-3">
                                <h4>Packages</h4>
                                @foreach ($packages as $package)
                                    <input type="hidden" name="package_id[]" value="{{ $package->id }}">
                                    <hr>
                                    <div class="row align-items-center">
                                        <h5 class="package-id-style">Package : <span>{{ $package->id }}</span> ,</h5>
                                        <h5 class="package-id-style">Date: <span>{{ $package->created_at }}</span> ,
                                        </h5>
                                        <h5>
                                            @php
                                                $package_status = DB::table('package_statuses')
                                                    ->where('status', $package->status)
                                                    ->get()
                                                    ->first();
                                            @endphp
                                            <span
                                                class="package-id-style status_style status_color_{{ $package_status->status }}">
                                                {{ $package_status->status_name }}
                                            </span>
                                        </h5>
                                        <img src="{{ $package->barcode }}" alt="barcode" width="10%"
                                            height="auto">
                                    </div>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_type" class="labelCustom">Package type</label>
                                            <select name="package_type[{{ $package->id }}]" class="form-control">
                                                <option value="box" @if ($package->package_type == 'box') selected @endif>
                                                    Box
                                                </option>
                                                <option value="envelop" @if ($package->package_type == 'envelop') selected @endif>
                                                    Envelop
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_count" class="labelCustom">Package count</label>
                                            <input class="form-control" type="number"
                                                name="package_count[{{ $package->id }}]"
                                                value="{{ $package->package_count }}" />
                                        </div>
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_length" class="labelCustom">Package length</label>
                                            <input class="form-control" type="number"
                                                name="package_length[{{ $package->id }}]"
                                                value="{{ $package->package_length }}" />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_width" class="labelCustom">Package width</label>
                                            <input class="form-control" type="number"
                                                name="package_width[{{ $package->id }}]"
                                                value="{{ $package->package_width }}" />
                                        </div>
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_height" class="labelCustom">Package height</label>
                                            <input class="form-control" type="number"
                                                name="package_height[{{ $package->id }}]"
                                                value="{{ $package->package_height }}" />
                                        </div>
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_weight" class="labelCustom">Package weight</label>
                                            <input class="form-control" type="number"
                                                name="package_weight[{{ $package->id }}]"
                                                value="{{ $package->package_weight }}" />
                                        </div>
                                    </div>
                                    @if ($package->n_package_length)
                                        <h5><b><u>New Values after measurement</u></b></h5>
                                        <div class="row form-group">
                                            <div class="col d-flex flex-column py-3">
                                                <label for="package_length" class="labelCustom">Package length
                                                    *New</label>
                                                <input class="form-control" type="number"
                                                    name="n_package_length[{{ $package->id }}]"
                                                    value="{{ $package->n_package_length }}" />
                                            </div>
                                            <div class="col d-flex flex-column py-3">
                                                <label for="package_width" class="labelCustom">Package width *New</label>
                                                <input class="form-control" type="number"
                                                    name="n_package_width[{{ $package->id }}]"
                                                    value="{{ $package->n_package_width }}" />
                                            </div>
                                            <div class="col d-flex flex-column py-3">
                                                <label for="package_height" class="labelCustom">Package height
                                                    *New</label>
                                                <input class="form-control" type="number"
                                                    name="n_package_height[{{ $package->id }}]"
                                                    value="{{ $package->n_package_height }}" />
                                            </div>
                                            <div class="col d-flex flex-column py-3">
                                                <label for="package_weight" class="labelCustom">Package weight
                                                    *New</label>
                                                <input class="form-control" type="number"
                                                    name="n_package_weight[{{ $package->id }}]"
                                                    value="{{ $package->n_package_weight }}" />
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                        </section>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="modal fade" id="modal-cancel-order">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="details-modal-header-flex">
                        <h4 style="color: red">Cancel order: {{ $cargo->id }}</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.cargo-requests.cancel_order', ['id' => $cargo_id]) }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col d-flex flex-column py-3">
                                <label for="cancel_comment" class="labelCustom">Cancel Comment</label>
                                <input class="form-control" type="text" name="cancel_comment"
                                    placeholder="type your cancel message" required />
                            </div>
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="col btn btn-danger">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script>
        function removeFileLabel(remove_button) {
            remove_button.parentNode.remove();
        }
    </script>
@endsection
