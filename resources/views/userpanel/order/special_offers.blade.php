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
                                <th>Container type</th>
                                <th>Incoterm</th>
                                <th>Cargo weight</th>
                                <th>Length</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Total Volume</th>
                                <th>Total Weight</th>
                                <th>Offer Price</th>
                                <th>Comment</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($special_offers as $offer)
                                <tr>
                                    <td>{{ $offer->id ? $offer->id : '---' }}</td>
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
                                    <td>{{ $offer->containeer_type ? $offer->containeer_type : '---' }}</td>
                                    <td>{{ $offer->incoterm ? $offer->incoterm : '---' }}</td>
                                    <td>{{ $offer->cargo_weight_containeer ? $offer->cargo_weight_containeer : '---' }}
                                    </td>
                                    <td>{{ $offer->length ? $offer->length : '---' }}</td>
                                    <td>{{ $offer->width ? $offer->width : '---' }}</td>
                                    <td>{{ $offer->height ? $offer->height : '---' }}</td>
                                    <td>{{ $offer->weight ? $offer->weight : '---' }}</td>
                                    <td>{{ $offer->total_volume ? $offer->total_volume : '---' }}</td>
                                    <td>{{ $offer->total_weight ? $offer->total_weight : '---' }}</td>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
