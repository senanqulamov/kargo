@extends('userpanel.layout.layout')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Special Orders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered" style="with:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Details (View)</th>
                                <th>Status</th>
                                <th>Shipment type</th>
                                <th>Ready date</th>
                                <th>Cargo</th>
                                <th>Shipping type</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Address</th>
                                <th>Insurance</th>
                                <th>Additional Information</th>
                                <th>Document (View)</th>
                                <th>Incoterm</th>
                                <th>Offer Price</th>
                                <th>Comment</th>
                                <th>Created at</th>
                                <th>Accept / Deny</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($special_offers as $offer)
                                <tr>
                                    <td>{{ $offer->id ? $offer->id : '---' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info" data-toggle="modal"
                                            data-target="#view-modal-{{ $offer->id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    @php
                                        $status = DB::table('package_statuses')
                                            ->where('status', $offer->status)
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
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge text-white">
                                                @switch($offer->shipment_type)
                                                    @case('sea')
                                                        <img src="{{ asset('/') }}images/special_offer/sea.svg" alt=""
                                                            class="me-2" />
                                                        <span>Sea</span>
                                                    @break

                                                    @case('rail')
                                                        <img src="{{ asset('/') }}images/special_offer/rail.svg" alt=""
                                                            class="me-2" />
                                                        <span>Rail</span>
                                                    @break

                                                    @case('air')
                                                        <img src="{{ asset('/') }}images/special_offer/air.svg" alt=""
                                                            class="me-2" />
                                                        <span>Air</span>
                                                    @break

                                                    @case('truck')
                                                        <img src="{{ asset('/') }}images/special_offer/truck.svg" alt=""
                                                            class="me-2" />
                                                        <span>Truck</span>
                                                    @break
                                                @endswitch
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $date = Carbon\Carbon::parse($offer->date)->format('d-M-Y');
                                        @endphp
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge">
                                                {{ $date }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $offer->cargo ? $offer->cargo : '---' }}</td>
                                    <td>{{ $offer->shipping_type ? $offer->shipping_type : '---' }}</td>
                                    <td>{{ $offer->origin ? $offer->origin : '---' }}</td>
                                    <td>{{ $offer->destination ? $offer->destination : '---' }}</td>
                                    <td>{{ $offer->address ? $offer->address : '---' }}</td>
                                    <td
                                        style="background: @if ($offer->insurance == 'yes') #00800061 @elseif ($offer->insurance == 'no') #ff00004f @endif">
                                        {{ $offer->insurance ? $offer->insurance : '---' }}
                                    </td>
                                    <td>{{ $offer->additional ? $offer->additional : '---' }}</td>
                                    <td>
                                        <div class="orders-holder-hm">
                                            <a href="/files/special_offers/{{ $offer->document }}" target="_blank">
                                                <span class="badge rounded-pill bg-secondary user_id_badge text-white"
                                                    type="button">
                                                    {{ $offer->document }}
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $offer->incoterm ? $offer->incoterm : '---' }}</td>
                                    <td style="background:#ffff004d;color:black;">
                                        {{ $offer->offer_price ? $offer->offer_price : '---' }}
                                    </td>
                                    <td>{{ $offer->comment ? $offer->comment : '---' }}</td>
                                    <td>
                                        @php
                                            $created_at = Carbon\Carbon::parse($offer->created_at)->format('d-M-Y H:i');
                                        @endphp
                                        <div class="orders-holder-hm">
                                            <span class="badge rounded-pill bg-info user_id_badge">
                                                {{ $created_at }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: flex;gap:10px;">
                                            @if ($offer->status == 8)
                                                <a href="{{ route('admin.cargo-requests.post_accept', ['id' => $offer->id]) }}"
                                                    class="col form-control btn btn-success">Accept Offer</a>
                                            @endif
                                            @if ($offer->status != 5)
                                                <a href="{{ route('admin.cargo-requests.post_decline', ['id' => $offer->id]) }}"
                                                    class="col form-control btn btn-warning">Decline offer</a>
                                            @endif
                                        </div>
                                    </td>

                                    <div class="modal fade" id="view-modal-{{ $offer->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        View Details -
                                                        <span class="badge rounded-pill bg-secondary">
                                                            {{ $offer->cargo }}
                                                        </span>
                                                    </h4>
                                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                                        class="btn btn-outline-secondary">
                                                        <i class="fa fa-close" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        @if ($offer->details)
                                                            @foreach (json_decode($offer->details) as $key => $details)
                                                                <li class="list-group-item d-flex justify-content-between">
                                                                    <span class="badge bg-primary rounded-pill">
                                                                        {{ $key + 1 }}
                                                                    </span>
                                                                    <div class="d-flex">
                                                                        @foreach ($details as $detail)
                                                                            <span class="badge rounded-pill bg-primary">
                                                                                {{ $detail }}
                                                                            </span>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
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
        </div>
    </div>
@endsection
