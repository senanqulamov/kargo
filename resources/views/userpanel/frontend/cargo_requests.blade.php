@extends('userpanel.layout.layout')

@section('content')
    <div class="row">

        <div class="col-12">
        </div>
    </div>

    <div class="container" id="balance__container">
        <div class="container mb-4" id="balance__tabs">
            <div class="row justify-content-center">
                <div class="col-4">
                    <button class="balance__box btn-back d-flex align-items-center" onclick="changeTab(this)"
                        data-name="requests">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23 46C10.318 46 0 35.682 0 23C0 10.318 10.318 0 23 0C35.682 0 46 10.318 46 23C46 35.682 35.682 46 23 46Z"
                                fill="#00D2FF" />
                            <path
                                d="M29.8864 12.1364H29.3183C29.0041 12.1364 28.7501 12.3909 28.7501 12.7045C28.7501 13.0182 29.0041 13.2727 29.3183 13.2727H29.8864C30.2 13.2727 30.4546 13.5278 30.4546 13.8409V29.75C30.4546 30.0631 30.2 30.3182 29.8864 30.3182H15.1137C14.8 30.3182 14.5455 30.063 14.5455 29.75V13.8409C14.5455 13.5278 14.8 13.2728 15.1137 13.2728H17.3864V13.9989C17.0483 14.196 16.8182 14.5585 16.8182 14.9773C16.8182 15.604 17.3279 16.1137 17.9546 16.1137C18.5813 16.1137 19.091 15.604 19.091 14.9773C19.091 14.5585 18.8608 14.196 18.5228 13.9989V11.5682C18.5228 11.2545 18.2688 11 17.9546 11C17.6404 11 17.3864 11.2545 17.3864 11.5682V12.1363H15.1137C14.1739 12.1363 13.4092 12.9011 13.4092 13.8409V29.75V34.2955C13.4092 35.2353 14.174 36 15.1137 36H29.8864C30.8262 36 31.591 35.2352 31.591 34.2955V29.75V13.8409C31.591 12.9011 30.8262 12.1364 29.8864 12.1364ZM30.4546 34.2955C30.4546 34.6085 30.2 34.8636 29.8864 34.8636H15.1137C14.8 34.8636 14.5455 34.6085 14.5455 34.2955V33.6228C14.7239 33.6864 14.9137 33.7273 15.1137 33.7273H29.8864C30.0864 33.7273 30.2762 33.6864 30.4545 33.6228V34.2955H30.4546ZM30.4546 32.0227C30.4546 32.3358 30.2 32.5909 29.8864 32.5909H15.1137C14.8 32.5909 14.5455 32.3357 14.5455 32.0227V31.35C14.7239 31.4136 14.9137 31.4545 15.1137 31.4545H29.8864C30.0864 31.4545 30.2762 31.4136 30.4545 31.35V32.0227H30.4546Z"
                                fill="white" />
                            <path
                                d="M27.6141 13.9989V11.5682C27.6141 11.2545 27.3602 11 27.0459 11C26.7317 11 26.4778 11.2545 26.4778 11.5682V12.1363H24.7732C24.459 12.1363 24.2051 12.3909 24.2051 12.7045C24.2051 13.0181 24.459 13.2727 24.7732 13.2727H26.4778V13.9988C26.1397 14.1959 25.9096 14.5584 25.9096 14.9772C25.9096 15.6039 26.4193 16.1136 27.046 16.1136C27.6727 16.1136 28.1824 15.6039 28.1824 14.9772C28.1823 14.5585 27.9522 14.196 27.6141 13.9989Z"
                                fill="white" />
                            <path
                                d="M23.0682 13.9989V11.5682C23.0682 11.2545 22.8143 11 22.5 11C22.1858 11 21.9319 11.2545 21.9319 11.5682V12.1363H20.2273C19.9131 12.1363 19.6592 12.3909 19.6592 12.7045C19.6592 13.0181 19.9131 13.2727 20.2273 13.2727H21.9319V13.9988C21.5938 14.1959 21.3637 14.5584 21.3637 14.9772C21.3637 15.6039 21.8734 16.1136 22.5001 16.1136C23.1268 16.1136 23.6365 15.6039 23.6365 14.9772C23.6364 14.5585 23.4063 14.196 23.0682 13.9989Z"
                                fill="white" />
                            <path
                                d="M22.5 18.9541H16.8182C16.504 18.9541 16.25 19.2086 16.25 19.5223C16.25 19.8359 16.504 20.0904 16.8182 20.0904H22.5C22.8142 20.0904 23.0682 19.8359 23.0682 19.5223C23.0682 19.2086 22.8142 18.9541 22.5 18.9541Z"
                                fill="white" />
                            <path
                                d="M26.4777 21.2275H21.3641C21.0499 21.2275 20.7959 21.4821 20.7959 21.7957C20.7959 22.1093 21.0499 22.3639 21.3641 22.3639H26.4777C26.7919 22.3639 27.0458 22.1093 27.0458 21.7957C27.0459 21.4821 26.7919 21.2275 26.4777 21.2275Z"
                                fill="white" />
                            <path
                                d="M24.7727 25.7725H16.8182C16.504 25.7725 16.25 26.027 16.25 26.3406C16.25 26.6542 16.504 26.9088 16.8182 26.9088H24.7727C25.0869 26.9088 25.3409 26.6542 25.3409 26.3406C25.3409 26.027 25.0869 25.7725 24.7727 25.7725Z"
                                fill="white" />
                            <path
                                d="M28.1823 18.9541H24.7732C24.459 18.9541 24.2051 19.2086 24.2051 19.5223C24.2051 19.8359 24.459 20.0904 24.7732 20.0904H28.1823C28.4965 20.0904 28.7505 19.8359 28.7505 19.5223C28.7505 19.2086 28.4965 18.9541 28.1823 18.9541Z"
                                fill="white" />
                            <path
                                d="M21.9318 23.5H16.8182C16.504 23.5 16.25 23.7545 16.25 24.0682C16.25 24.3818 16.504 24.6363 16.8182 24.6363H21.9318C22.246 24.6363 22.5 24.3818 22.5 24.0682C22.5 23.7545 22.246 23.5 21.9318 23.5Z"
                                fill="white" />
                            <path
                                d="M19.0909 21.2275H16.8182C16.504 21.2275 16.25 21.4821 16.25 21.7957C16.25 22.1093 16.504 22.3639 16.8182 22.3639H19.0909C19.4051 22.3639 19.659 22.1093 19.659 21.7957C19.659 21.4821 19.4051 21.2275 19.0909 21.2275Z"
                                fill="white" />
                            <path
                                d="M28.1822 23.5H24.2049C23.8907 23.5 23.6367 23.7545 23.6367 24.0682C23.6367 24.3818 23.8907 24.6363 24.2049 24.6363H28.1822C28.4964 24.6363 28.7503 24.3818 28.7503 24.0682C28.7503 23.7545 28.4964 23.5 28.1822 23.5Z"
                                fill="white" />
                        </svg>
                        <div class="balance__box-text ms-1">
                            <p class="ms-3">{{ __('userpanel.order list.text 1') }}</p>
                        </div>
                    </button>
                </div>
                <div class="col-4">
                    <button class="balance__box d-flex align-items-center" onclick="changeTab(this)" data-name="demand">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23 46C10.318 46 0 35.682 0 23C0 10.318 10.318 0 23 0C35.682 0 46 10.318 46 23C46 35.682 35.682 46 23 46Z"
                                fill="#00D2FF" />
                            <path
                                d="M29.8864 12.1364H29.3183C29.0041 12.1364 28.7501 12.3909 28.7501 12.7045C28.7501 13.0182 29.0041 13.2727 29.3183 13.2727H29.8864C30.2 13.2727 30.4546 13.5278 30.4546 13.8409V29.75C30.4546 30.0631 30.2 30.3182 29.8864 30.3182H15.1137C14.8 30.3182 14.5455 30.063 14.5455 29.75V13.8409C14.5455 13.5278 14.8 13.2728 15.1137 13.2728H17.3864V13.9989C17.0483 14.196 16.8182 14.5585 16.8182 14.9773C16.8182 15.604 17.3279 16.1137 17.9546 16.1137C18.5813 16.1137 19.091 15.604 19.091 14.9773C19.091 14.5585 18.8608 14.196 18.5228 13.9989V11.5682C18.5228 11.2545 18.2688 11 17.9546 11C17.6404 11 17.3864 11.2545 17.3864 11.5682V12.1363H15.1137C14.1739 12.1363 13.4092 12.9011 13.4092 13.8409V29.75V34.2955C13.4092 35.2353 14.174 36 15.1137 36H29.8864C30.8262 36 31.591 35.2352 31.591 34.2955V29.75V13.8409C31.591 12.9011 30.8262 12.1364 29.8864 12.1364ZM30.4546 34.2955C30.4546 34.6085 30.2 34.8636 29.8864 34.8636H15.1137C14.8 34.8636 14.5455 34.6085 14.5455 34.2955V33.6228C14.7239 33.6864 14.9137 33.7273 15.1137 33.7273H29.8864C30.0864 33.7273 30.2762 33.6864 30.4545 33.6228V34.2955H30.4546ZM30.4546 32.0227C30.4546 32.3358 30.2 32.5909 29.8864 32.5909H15.1137C14.8 32.5909 14.5455 32.3357 14.5455 32.0227V31.35C14.7239 31.4136 14.9137 31.4545 15.1137 31.4545H29.8864C30.0864 31.4545 30.2762 31.4136 30.4545 31.35V32.0227H30.4546Z"
                                fill="white" />
                            <path
                                d="M27.6141 13.9989V11.5682C27.6141 11.2545 27.3602 11 27.0459 11C26.7317 11 26.4778 11.2545 26.4778 11.5682V12.1363H24.7732C24.459 12.1363 24.2051 12.3909 24.2051 12.7045C24.2051 13.0181 24.459 13.2727 24.7732 13.2727H26.4778V13.9988C26.1397 14.1959 25.9096 14.5584 25.9096 14.9772C25.9096 15.6039 26.4193 16.1136 27.046 16.1136C27.6727 16.1136 28.1824 15.6039 28.1824 14.9772C28.1823 14.5585 27.9522 14.196 27.6141 13.9989Z"
                                fill="white" />
                            <path
                                d="M23.0682 13.9989V11.5682C23.0682 11.2545 22.8143 11 22.5 11C22.1858 11 21.9319 11.2545 21.9319 11.5682V12.1363H20.2273C19.9131 12.1363 19.6592 12.3909 19.6592 12.7045C19.6592 13.0181 19.9131 13.2727 20.2273 13.2727H21.9319V13.9988C21.5938 14.1959 21.3637 14.5584 21.3637 14.9772C21.3637 15.6039 21.8734 16.1136 22.5001 16.1136C23.1268 16.1136 23.6365 15.6039 23.6365 14.9772C23.6364 14.5585 23.4063 14.196 23.0682 13.9989Z"
                                fill="white" />
                            <path
                                d="M22.5 18.9541H16.8182C16.504 18.9541 16.25 19.2086 16.25 19.5223C16.25 19.8359 16.504 20.0904 16.8182 20.0904H22.5C22.8142 20.0904 23.0682 19.8359 23.0682 19.5223C23.0682 19.2086 22.8142 18.9541 22.5 18.9541Z"
                                fill="white" />
                            <path
                                d="M26.4777 21.2275H21.3641C21.0499 21.2275 20.7959 21.4821 20.7959 21.7957C20.7959 22.1093 21.0499 22.3639 21.3641 22.3639H26.4777C26.7919 22.3639 27.0458 22.1093 27.0458 21.7957C27.0459 21.4821 26.7919 21.2275 26.4777 21.2275Z"
                                fill="white" />
                            <path
                                d="M24.7727 25.7725H16.8182C16.504 25.7725 16.25 26.027 16.25 26.3406C16.25 26.6542 16.504 26.9088 16.8182 26.9088H24.7727C25.0869 26.9088 25.3409 26.6542 25.3409 26.3406C25.3409 26.027 25.0869 25.7725 24.7727 25.7725Z"
                                fill="white" />
                            <path
                                d="M28.1823 18.9541H24.7732C24.459 18.9541 24.2051 19.2086 24.2051 19.5223C24.2051 19.8359 24.459 20.0904 24.7732 20.0904H28.1823C28.4965 20.0904 28.7505 19.8359 28.7505 19.5223C28.7505 19.2086 28.4965 18.9541 28.1823 18.9541Z"
                                fill="white" />
                            <path
                                d="M21.9318 23.5H16.8182C16.504 23.5 16.25 23.7545 16.25 24.0682C16.25 24.3818 16.504 24.6363 16.8182 24.6363H21.9318C22.246 24.6363 22.5 24.3818 22.5 24.0682C22.5 23.7545 22.246 23.5 21.9318 23.5Z"
                                fill="white" />
                            <path
                                d="M19.0909 21.2275H16.8182C16.504 21.2275 16.25 21.4821 16.25 21.7957C16.25 22.1093 16.504 22.3639 16.8182 22.3639H19.0909C19.4051 22.3639 19.659 22.1093 19.659 21.7957C19.659 21.4821 19.4051 21.2275 19.0909 21.2275Z"
                                fill="white" />
                            <path
                                d="M28.1822 23.5H24.2049C23.8907 23.5 23.6367 23.7545 23.6367 24.0682C23.6367 24.3818 23.8907 24.6363 24.2049 24.6363H28.1822C28.4964 24.6363 28.7503 24.3818 28.7503 24.0682C28.7503 23.7545 28.4964 23.5 28.1822 23.5Z"
                                fill="white" />
                        </svg>
                        <div class="balance__box-text ms-1">
                            <p class="ms-3">{{ __('userpanel.order list.text 2') }}</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <div class="tab-sections">
            <section class="courier__page tab-col requests-hm active-tab-hm">
                <div class="card">
                    <div class="card-body">
                        <table id="cargo-requests" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('userpanel.order list.text 3') }}</th>
                                    <th>Download Label</th>
                                    <th>ID</th>
                                    <th>{{ __('userpanel.transactions.text 1') }}</th>
                                    <th>{{ __('userpanel.order list.text 4') }}</th>
                                    <th>{{ __('userpanel.order list.text 5') }}</th>
                                    <th>{{ __('userpanel.order list.text 6') }}</th>
                                    <th>{{ __('userpanel.order list.text 7') }}</th>
                                    <th>{{ __('userpanel.Phone') }}</th>
                                    <th>{{ __('userpanel.Email') }}</th>
                                    <th>{{ __('userpanel.Country') }}</th>
                                    <th>{{ __('userpanel.State') }}</th>
                                    <th>{{ __('userpanel.City') }}</th>
                                    <th>{{ __('userpanel.Address') }}</th>
                                    <th>{{ __('userpanel.ZIP code') }}</th>
                                    <th>{{ __('userpanel.balance system.text 10') }}</th>
                                    <th>{{ __('userpanel.manual order.text 60') }}</th>
                                    <th>{{ __('userpanel.manual order.text 37') }}</th>
                                    <th>{{ __('userpanel.manual order.text 38') }}</th>
                                    <th>{{ __('userpanel.manual order.text 39') }}</th>
                                    <th>{{ __('userpanel.manual order.text 62') }}</th>
                                    <th>{{ __('userpanel.manual order.text 40') }}</th>
                                    <th>{{ __('userpanel.manual order.text 16') }}</th>
                                    <th>{{ __('userpanel.manual order.text 17') }}</th>
                                    <th>{{ __('userpanel.order list.text 14') }}</th>
                                    <th class="additional_services_th">{{ __('userpanel.order list.text 15') }}</th>
                                    <th>{{ __('userpanel.order list.text 16') }}</th>
                                    <th>{{ __('userpanel.order list.text 8') }}</th>
                                    <th>{{ __('userpanel.order list.text 9') }}</th>
                                    <th>{{ __('userpanel.order list.text 10') }}</th>
                                    <th>{{ __('userpanel.order list.text 11') }}</th>
                                    <th>{{ __('userpanel.order list.text 12') }}</th>
                                    <th>{{ __('userpanel.order list.text 13') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargo_requests as $cargo)
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
                                                        class="col form-control btn btn-info">{{ __('userpanel.order list.text 12') }}</a>
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
                                                        {{ __('userpanel.order list.text 13') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <div class="modal fade" id="modal-cancel-order-{{ $cargo->id }}">
                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="details-modal-header-flex">
                                                            <h4 style="color: red">{{ __('userpanel.order list.text 13') }}: {{ $cargo->id }}</h4>
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
            </section>

            <section class="courier__page tab-col demand-hm">
                <div class="card">
                    <div class="card-body">
                        <table id="amazon-orders" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('userpanel.order list.text 3') }}</th>
                                    <th>Download Label</th>
                                    <th>ID</th>
                                    <th>{{ __('userpanel.transactions.text 1') }}</th>
                                    <th>{{ __('userpanel.order list.text 4') }}</th>
                                    <th>{{ __('userpanel.order list.text 5') }}</th>
                                    <th>{{ __('userpanel.order list.text 6') }}</th>
                                    <th>{{ __('userpanel.balance system.text 10') }}</th>
                                    <th>{{ __('userpanel.manual order.text 60') }}</th>
                                    <th>{{ __('userpanel.manual order.text 37') }}</th>
                                    <th>{{ __('userpanel.manual order.text 38') }}</th>
                                    <th>{{ __('userpanel.manual order.text 39') }}</th>
                                    <th>{{ __('userpanel.manual order.text 62') }}</th>
                                    <th>{{ __('userpanel.manual order.text 40') }}</th>
                                    <th>{{ __('userpanel.manual order.text 16') }}</th>
                                    <th>{{ __('userpanel.manual order.text 17') }}</th>
                                    <th>{{ __('userpanel.order list.text 14') }}</th>
                                    <th class="additional_services_th">{{ __('userpanel.order list.text 15') }}</th>
                                    <th>{{ __('userpanel.order list.text 16') }}</th>
                                    <th>{{ __('userpanel.order list.text 8') }}</th>
                                    <th>{{ __('userpanel.order list.text 9') }}</th>
                                    <th>{{ __('userpanel.order list.text 10') }}</th>
                                    <th>{{ __('userpanel.order list.text 11') }}</th>
                                    <th>{{ __('userpanel.order list.text 12') }}</th>
                                    <th>{{ __('userpanel.order list.text 13') }}</th>
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
                                            onclick="window.open('{{ route('userpanel.generatePdfAmazonOrder', ['id' => $cargo->id]) }}')">
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
                                                        class="col form-control btn btn-info">{{ __('userpanel.order list.text 12') }}</a>
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
                                                        {{ __('userpanel.order list.text 13') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <div class="modal fade" id="modal-cancel-order-{{ $cargo->id }}">
                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="details-modal-header-flex">
                                                            <h4 style="color: red">{{ __('userpanel.order list.text 13') }}: {{ $cargo->id }}</h4>
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
            </section>
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
                dom: 'Brftip',
                buttons: [{
                    extend: 'excel',
                    text: 'Save as Excel',
                    filename: 'table_to_excel',
                    extension: '.xlsx'
                }]
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
                dom: 'Brftip',
                buttons: [{
                    extend: 'excel',
                    text: 'Save as Excel',
                    filename: 'table_to_excel',
                    extension: '.xlsx'
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function changeTab(tab_link) {
            var tab_name = tab_link.getAttribute('data-name');
            var tab = document.querySelector('.' + tab_name + '-hm');

            var tabs = document.querySelectorAll('.tab-col');
            tabs.forEach(element => {
                element.classList.remove('active-tab-hm');
            });
            tab.classList.toggle("active-tab-hm");

            document.querySelector('.btn-back').classList.remove('btn-back');
            tab_link.classList.add('btn-back');
        }
    </script>
@endsection
