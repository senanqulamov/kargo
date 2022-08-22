@extends('backend.layout.app')

@section('title', 'Amazon orders')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('css')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/summernote/summernote-bs4.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Amazon orders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Download Label</th>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Order Type</th>
                                <th>Tracking Number</th>
                                <th>Packages</th>
                                <th>Currency</th>
                                <th>Total Cargo Price</th>
                                <th>Total Volume</th>
                                <th>Total Weight</th>
                                <th>Total Pricing Weight</th>
                                <th>Total Count</th>
                                <th>Total Worth</th>
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
                            @foreach ($amazon_orders as $cargo)
                                <tr @if ($cargo->status == 5) class="cancelled-row" @endif>
                                    <td class="pdf-download-td-hm"
                                        onclick="window.open('{{ route('userpanel.generatePdfManualOrder', ['id' => $cargo->id]) }}')">
                                        <div style="display: flex;justify-content:center;">
                                            <a href="#">
                                                <i class="fa-solid fa-arrow-down"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.cargo-requests.cargo_details', $cargo->id) }}' , '_self')">
                                                {{ $cargo->id }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge"
                                                onclick="window.open('{{ route('admin.users.details', $cargo->user_id) }}')">
                                                010{{ $cargo->user_id ? $cargo->user_id : '---' }}20
                                            </span>
                                        </div>
                                    </td>
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
                                        {{ $cargo->order_type }}
                                    </td>
                                    <td>{{ $cargo->tracking_number ? $cargo->tracking_number : '---' }}</td>
                                    <td>
                                        <div class="packages packages_td">
                                            @foreach ($packages->where('cargo_id', $cargo->id) as $package)
                                                <span class="package_status_span package_status_{{ $package->status }}">
                                                    {{ $package->id }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $currency = DB::table('currencies')
                                                ->where('currency_code', $cargo->currency)
                                                ->get()
                                                ->first();
                                        @endphp
                                        {{ $currency->currency_name ? $currency->currency_code . ' / ' . $currency->currency_name : '---' }}
                                    </td>
                                    <td>{{ $cargo->total_cargo_price ? $cargo->total_cargo_price : '---' }}</td>
                                    <td>{{ $cargo->total_volume ? $cargo->total_volume : '---' }} m3</td>
                                    <td>{{ $cargo->total_weight ? $cargo->total_weight : '---' }} kg</td>
                                    <td>{{ $cargo->total_deci ? $cargo->total_deci : '---' }} </td>
                                    <td>{{ $cargo->total_count ? $cargo->total_count : '---' }} </td>
                                    <td>{{ $cargo->total_worth ? $cargo->total_worth : '---' }} €</td>
                                    <td>{{ $cargo->ioss_number ? $cargo->ioss_number : '---' }}</td>
                                    <td>{{ $cargo->vat_number ? $cargo->vat_number : '---' }}</td>
                                    <td>{{ $cargo->order_info ? $cargo->order_info : '---' }}</td>
                                    @php
                                        $services = json_decode($cargo->additional_services);
                                        $services = json_decode(json_encode($services), true);
                                    @endphp
                                    @if ($services)
                                        <td>
                                            <div class="additional_service_td">
                                                @foreach ($services as $key => $service)
                                                    <span class="additional_service_style">
                                                        <b>{{ $key }}</b>: {{ $service }}€
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <span
                                                style="background:#f9c0c0;color:#020000;border-radius: 10px;padding: 0 10px;">No
                                                Additional
                                                services</span>
                                        </td>
                                    @endif
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
    </script>
@endsection
