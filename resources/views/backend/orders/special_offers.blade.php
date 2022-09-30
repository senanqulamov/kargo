@extends('backend.layout.app')

@section('title', 'Special Offers')

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
                <div class="card-body">
                    <table id="example1" class="table table-bordered" style="with:100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
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
                                <th>Container type</th>
                                <th>Incoterm</th>
                                <th>Cargo weight</th>
                                <th>Length</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Total Volume</th>
                                <th>Total Weight</th>
                                <th>Offer price</th>
                                <th>Comment</th>
                                <th>Offer</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($special_offers as $offer)
                                <tr>
                                    <td>{{ $offer->id ? $offer->id : '---' }}</td>
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
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal-give-offer-{{ $offer->id }}">
                                            <i class="fa-solid fa-message"></i>
                                        </button>
                                    </td>
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

                                    <div class="modal fade" id="modal-give-offer-{{ $offer->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Give offer</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.cargo-requests.give_offer' , ['id' => $offer->id]) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="offer_price">Offer price</label>
                                                                <input class="form-control" type="text" name="offer_price" placeholder="type your price offer">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col">
                                                                <label for="comment">Comment</label>
                                                                <input class="form-control" type="text" name="comment" placeholder="type your comment">
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-success">
                                                                Offer
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
        </div>
    </div>
@endsection
