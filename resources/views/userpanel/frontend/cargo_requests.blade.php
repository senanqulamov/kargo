@extends('userpanel.layout.layout')

@section('content')
    {{-- <style>
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

        #example1 * {
            font-size: 15px;
        }

        .additional_service_td {
            display: flex;
            flex-direction: row;
            gap: 5px;
            text-align: center;
        }

        .status_td {
            display: flex;
            flex-direction: column;
            gap: 5px;
            text-align: center;
        }

        .additional_service_style {
            border-radius: 10px;
            padding: 0 10px;
            font-size: 14px;
            width: 110px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .details-modal-header-flex {
            display: flex;
            flex-direction: row;
            gap: 10px;
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

        .status_color_6 {
            color: #c4d94b;
            border: 1px solid #c4d94b;
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

        .package_status_5 {
            background: #c4d94b;
        }
    </style> --}}
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Cargo requests</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="cargo-requests" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>View/Edit Details</th>
                                <th>Download Label</th>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Order Type</th>
                                <th>Tracking Number</th>
                                <th>Customer name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>ZipCode</th>
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
                                <th>Pause Order</th>
                                <th>Cancel Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargo_requests as $cargo)
                                <tr @if ($cargo->status == 5) class="cancelled-row" @endif>
                                    <td>
                                        <a href="{{ route('userpanel.viewCargoDetails', $cargo->id) }}" class="btn btn-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="pdf-download-td-hm"
                                        onclick="window.open('{{ route('userpanel.generatePdfManualOrder', ['id' => $cargo->id]) }}')">
                                        <div style="display: flex;justify-content:center;">
                                            <a href="#">
                                                <i class="fa-solid fa-arrow-down"></i>
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
                                        {{ $cargo->order_type }}
                                    </td>
                                    <td>{{ $cargo->tracking_number ? $cargo->tracking_number : '---' }}</td>
                                    <td>{{ $cargo->name ? $cargo->name : '---' }}</td>
                                    <td>{{ $cargo->phone ? $cargo->phone : '---' }}</td>
                                    <td>{{ $cargo->email ? $cargo->email : '---' }}</td>
                                    <td>{{ $cargo->country ? $cargo->country : '---' }} </td>
                                    <td>{{ $cargo->state ? $cargo->state : '---' }}</td>
                                    <td>{{ $cargo->city ? $cargo->city : '---' }}</td>
                                    <td>{{ $cargo->address ? $cargo->address : '---' }}</td>
                                    <td>{{ $cargo->zipcode ? $cargo->zipcode : '---' }}</td>
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
                                        @if ($cargo_company)
                                            <img style="width:60px;"
                                                src="{{ asset('/') }}backend/assets/img/companies/cargo/{{ $cargo_company->logo == null ? 'user.png' : $cargo_company->logo }}" />
                                        @endif
                                    </td>
                                    <td>{{ $cargo->battery == 'yes' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $cargo->liquid == 'yes' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $cargo->food == 'yes' ? 'Yes' : 'No' }}</td>
                                    <td>{{ $cargo->dangerous == 'yes' ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <div style="display: flex;">
                                            @if ($cargo->status != 4 && $cargo->status != 6 && $cargo->status != 5)
                                                <a href="{{ route('admin.cargo-requests.post_on_wait', ['id' => $cargo->id]) }}"
                                                    class="col form-control btn btn-info">Pause order</a>
                                            @endif

                                            @if ($cargo->status == 6)
                                                <a href="{{ route('admin.cargo-requests.remove_on_wait', ['id' => $cargo->id]) }}"
                                                    class="col form-control btn btn-success">Continue Process</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex;">
                                            @if ($cargo->status == 0)
                                                <a href="#" class="col form-control btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#modal-cancel-order-{{ $cargo->id }}">
                                                    Cancel Order
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    <div class="modal fade" id="modal-cancel-order-{{ $cargo->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="details-modal-header-flex">
                                                        <h4 style="color: red">Cancel order: {{ $cargo->id }}</h4>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('admin.cargo-requests.cancel_order', ['id' => $cargo->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="row form-group">
                                                            <div class="col d-flex flex-column py-3">
                                                                <label for="cancel_comment" class="labelCustom">Cancel
                                                                    Comment</label>
                                                                <input class="form-control" type="text"
                                                                    name="cancel_comment"
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="empty-space-hm-30"></div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        List of Amazon orders
                    </h3>
                </div>
                <div class="card-body">
                    <table id="amazon-orders" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>View/Edit Details</th>
                                <th>Download Label</th>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Order Type</th>
                                <th>Tracking Number</th>
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
                                <th>Pause Order</th>
                                <th>Cancel Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($amazon_orders as $cargo)
                                <tr @if ($cargo->status == 5) class="cancelled-row" @endif>
                                    <td>
                                        <a href="{{ route('userpanel.viewCargoDetails', $cargo->id) }}"
                                            class="btn btn-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td class="pdf-download-td-hm"
                                        onclick="window.open('{{ route('userpanel.generatePdfManualOrder', ['id' => $cargo->id]) }}')">
                                        <div style="display: flex;justify-content:center;">
                                            <a href="#">
                                                <i class="fa-solid fa-arrow-down"></i>
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
                                        {{ $cargo->order_type }}
                                    </td>
                                    <td>{{ $cargo->tracking_number ? $cargo->tracking_number : '---' }}</td>
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
                                    <td>
                                        <div style="display: flex;">
                                            @if ($cargo->status != 4 && $cargo->status != 6 && $cargo->status != 5)
                                                <a href="{{ route('admin.cargo-requests.post_on_wait', ['id' => $cargo->id]) }}"
                                                    class="col form-control btn btn-info">Pause order</a>
                                            @endif

                                            @if ($cargo->status == 6)
                                                <a href="{{ route('admin.cargo-requests.remove_on_wait', ['id' => $cargo->id]) }}"
                                                    class="col form-control btn btn-success">Continue Process</a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex;">
                                            @if ($cargo->status == 0)
                                                <a href="#" class="col form-control btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#modal-cancel-order-{{ $cargo->id }}">
                                                    Cancel Order
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    <div class="modal fade" id="modal-cancel-order-{{ $cargo->id }}">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="details-modal-header-flex">
                                                        <h4 style="color: red">Cancel order: {{ $cargo->id }}</h4>
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('admin.cargo-requests.cancel_order', ['id' => $cargo->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="row form-group">
                                                            <div class="col d-flex flex-column py-3">
                                                                <label for="cancel_comment" class="labelCustom">Cancel
                                                                    Comment</label>
                                                                <input class="form-control" type="text"
                                                                    name="cancel_comment"
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
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

        $(function() {
            $("#cargo-requests").DataTable({
                order: [
                    [3, 'desc']
                ],
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
                scrollX: true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#amazon-orders").DataTable({
                order: [
                    [3, 'desc']
                ],
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
                scrollX: true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
