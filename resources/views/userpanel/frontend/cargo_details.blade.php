@extends('userpanel.layout.layout')

@section('content')
    <style>
        p {
            margin: 0;
        }

        table {
            text-align: center;
            font-size: 14px;
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

        .row-hm {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
    <script src="https://unpkg.com/jsbarcode@latest/dist/JsBarcode.all.min.js"></script>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cargo Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('userpanel.updatecargo', ['id' => $cargo_id]) }}" method="POST">
                        @csrf
                        <section class="container p-1">
                            <div class="border p-3">
                                <div class="row" style="gap: 10px;">
                                    <h4 class="package-id-style">
                                        Order number:
                                        <span>{{ $cargo_id }}</span>
                                    </h4>
                                </div>
                                <hr>
                                <h4 class="row-hm">
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
                                </h4>
                                @if (substr($cargo_id, 0, 1) != 'A')
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
                                @else
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
                                @endif
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
                                            value="{{ $cargo->total_cargo_price }}" disabled />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_volume" class="labelCustom">Total Volume / m3</label>
                                        <input class="form-control" type="number" name="total_volume"
                                            value="{{ $cargo->total_volume }}" disabled />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_weight" class="labelCustom">Total Weight / kg</label>
                                        <input class="form-control" type="number" name="total_weight"
                                            value="{{ $cargo->total_weight }}" disabled />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_deci" class="labelCustom">Total Pricing Weight</label>
                                        <input class="form-control" type="number" name="total_deci"
                                            value="{{ $cargo->total_deci }}" disabled />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_count" class="labelCustom">Total Amount</label>
                                        <input class="form-control" type="number" name="total_count"
                                            value="{{ $cargo->total_count }}" disabled />
                                    </div>
                                    <div class="col d-flex flex-column py-3">
                                        <label for="total_worth" class="labelCustom">Total Worth / €</label>
                                        <input class="form-control" type="number" name="total_worth"
                                            value="{{ $cargo->total_worth }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="border p-3">
                                <h4>Aditional details</h4>
                                <hr>
                                <h6><b>Cargo Company:</b></h6>
                                <div class="row form-group">
                                    <div class="col d-flex flex-column py-3">
                                        @php
                                            $cargo_companies = json_decode($cargo->company_value);
                                            $cargo_companies = json_decode(json_encode($cargo_companies), true);
                                            $company = DB::table('cargo_companies')
                                                ->where('id', $cargo->cargo_company)
                                                ->get()
                                                ->first();

                                            if ($cargo->personal_cargo == 'true') {
                                                $personal_company = DB::table('personal_cargos')
                                                    ->where([
                                                        ['order_id', $cargo->id],
                                                        ['name' , $cargo->selected_personal]
                                                    ])
                                                    ->first();
                                            }
                                        @endphp
                                        <div class="row form-group">
                                            <section class="my-4" id="table_section">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <table class="table table-hover table-bordered">
                                                                <thead>
                                                                    <tr class="table-dark">
                                                                        <th>Cargo Company</th>
                                                                        <th>Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if ($company && $cargo->personal_cargo != 'true')
                                                                        <tr>
                                                                            <td>{{ $company->name }}</td>
                                                                            <td>
                                                                                @if (isset($cargo_companies[$cargo->cargo_company]))
                                                                                    {{ $cargo_companies[$cargo->cargo_company] }}
                                                                                @else
                                                                                    0
                                                                                @endif
                                                                                €
                                                                            </td>
                                                                        </tr>
                                                                    @elseif ($cargo->personal_cargo == 'true' && $personal_company)
                                                                        <tr style="background:rgb(221 221 105 / 81%);">
                                                                            <td>
                                                                                {{ $personal_company->name }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $personal_company->value }} €
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <h6><b>Additional Services:</b></h6>
                                <div class="row form-group">
                                    @php
                                        $services = json_decode($cargo->additional_services);
                                        $services = json_decode(json_encode($services), true);
                                    @endphp
                                    <section class="my-4" id="table_section">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr class="table-dark">
                                                                <th>Service Name</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($services)
                                                                @foreach ($services as $key => $value)
                                                                    <tr>
                                                                        <td>{{ $key }}</td>
                                                                        <td>{{ $value }} €</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <h6><b>Product Content:</b></h6>
                                <div class="row form-group">
                                    <section class="my-4" id="table_section">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr class="table-dark">
                                                                <th>Battery</th>
                                                                <th>Liquid</th>
                                                                <th>Food</th>
                                                                <th>Dangerous</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $cargo->battery == 'yes' ? 'Yes' : 'No' }}</td>
                                                                <td>{{ $cargo->liquid == 'yes' ? 'Yes' : 'No' }}</td>
                                                                <td>{{ $cargo->food == 'yes' ? 'Yes' : 'No' }}</td>
                                                                <td>{{ $cargo->dangerous == 'yes' ? 'Yes' : 'No' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <h6><b>Documents:</b></h6>
                                <div class="row form-group">
                                    @php
                                        $documents = DB::table('cargo_documents')
                                            ->where('cargo_id', $cargo_id)
                                            ->get();
                                    @endphp
                                    <section class="my-4" id="table_section">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr class="table-dark">
                                                                <th>Document Name</th>
                                                                <th>Document Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($documents)
                                                                @foreach ($documents as $key => $document)
                                                                    <tr>
                                                                        <td>
                                                                            <a href="/files/{{ $document->document }}"
                                                                                download="{{ $document->document }}">
                                                                                <p>{{ $document->document }}</p>
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            {{ $document->type }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <hr>
                            <div class="border p-3">
                                <h4>Packages</h4>
                                @foreach ($packages as $package)
                                    <input type="hidden" name="package_id[]" value="{{ $package->id }}">
                                    <hr>
                                    <div class="row-hm">
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
                                        @if ($package->barcode)
                                            <img src="{{ $package->barcode }}" width="15%" height="auto">
                                            <input class="form-control barcode_input" type="hidden"
                                                name="barcode[{{ $package->id }}]" value="{{ $package->barcode }}" />
                                        @else
                                            <img id="barcode_{{ $package->id }}_hm" width="15%" height="auto"
                                                style="display: none;">
                                            <input class="form-control barcode_input" type="hidden"
                                                name="barcode[{{ $package->id }}]" value="" />
                                            <button class="btn btn-warning" onclick="generateBarcode(this)"
                                                data-id="{{ $package->id }}" type="button">
                                                Generate Barcode
                                            </button>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_type" class="labelCustom">Package type</label>
                                            <select name="package_type[{{ $package->id }}]" class="form-control"
                                                disabled>
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
                                                value="{{ $package->package_count }}" disabled />
                                        </div>
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_length" class="labelCustom">Package length</label>
                                            <input class="form-control" type="number"
                                                name="package_length[{{ $package->id }}]"
                                                value="{{ $package->package_length }}" disabled />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_width" class="labelCustom">Package width</label>
                                            <input class="form-control" type="number"
                                                name="package_width[{{ $package->id }}]"
                                                value="{{ $package->package_width }}" disabled />
                                        </div>
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_height" class="labelCustom">Package height</label>
                                            <input class="form-control" type="number"
                                                name="package_height[{{ $package->id }}]"
                                                value="{{ $package->package_height }}" disabled />
                                        </div>
                                        <div class="col d-flex flex-column py-3">
                                            <label for="package_weight" class="labelCustom">Package weight</label>
                                            <input class="form-control" type="number"
                                                name="package_weight[{{ $package->id }}]"
                                                value="{{ $package->package_weight }}" disabled />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        </section>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-success" style="width: max-content">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <script>
        function generateBarcode(button) {
            uniq_package_id = button.getAttribute('data-id');
            JsBarcode("#barcode_" + uniq_package_id + "_hm", uniq_package_id);
            var image = document.querySelector("#barcode_" + uniq_package_id + "_hm");

            image.style.display = "block";
            button.style.display = "none";

            var image_src = image.getAttribute('src');
            document.querySelector("input[name='barcode[" + uniq_package_id + "]']").value = image_src;

        }
    </script>
@endsection

@section('js')
    <script>
        function removeFileLabel(remove_button) {
            remove_button.parentNode.remove();
        }
    </script>
@endsection
