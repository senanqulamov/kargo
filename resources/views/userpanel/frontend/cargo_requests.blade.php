@extends('userpanel.layout.layout')

@section('content')
    <style>
        #example1 * {
            font-size: 15px;
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
                                <th>Customer name</th>
                                <th>Country/State/City/Address/Zipcode</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Packages (IDs)</th>
                                <th>Currency</th>
                                <th>IOSS number: </th>
                                <th>VAt number: </th>
                                <th>Order Info: </th>
                                <th>Shipment definition: </th>
                                <th>Product content: </th>
                                <th>Documents: </th>
                                <th>Barcodes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargo_requests as $cargo)
                                <tr>
                                    <td>{{ $cargo->id ? $cargo->id : '---' }}</td>
                                    <td>{{ $cargo->name ? $cargo->name : '---' }}</td>
                                    <td>
                                        {{ $cargo->country ? $cargo->country : '---' }} /
                                        {{ $cargo->state ? $cargo->state : '---' }} /
                                        {{ $cargo->city ? $cargo->city : '---' }} /
                                        {{ $cargo->address ? $cargo->address : '---' }} /
                                        {{ $cargo->zipcode ? $cargo->zipcode : '---' }}
                                    </td>
                                    <td>{{ $cargo->phone ? $cargo->phone : '---' }}</td>
                                    <td>{{ $cargo->email ? $cargo->email : '---' }}</td>
                                    <td>{{ $cargo->created_at ? $cargo->created_at : '---' }}</td>
                                    <td>
                                        <a href="{{ route('userpanel.editcargorequest' , ['id' => $cargo->id]) }}">
                                            <i class="fa-solid fa-edit navigation__icon"></i>
                                        </a>
                                    </td>
                                    <td>{{ $cargo->packages ? $cargo->packages : '---' }}</td>
                                    <td>{{ $cargo->currency ? $cargo->currency : '---' }}</td>
                                    <td>{{ $cargo->ioss_number ? $cargo->ioss_number : '---' }}</td>
                                    <td>{{ $cargo->vat_number ? $cargo->vat_number : '---' }}</td>
                                    <td>{{ $cargo->order_info ? $cargo->order_info : '---' }}</td>
                                    <td>
                                        Extra bubble: <u><b>{{ $cargo->extra_bubble == 'on' ? 'Yes' : 'No' }}</b></u> /
                                        Insure order: <u><b>{{ $cargo->insure_order == 'on' ? 'Yes' : 'No' }}</b></u> /
                                        Other additional:
                                        <u><b>{{ $cargo->other_additional == 'on' ? 'Yes' : 'No' }}</b></u>
                                    </td>
                                    <td>
                                        Battery: <u><b>{{ $cargo->battery == 'yes' ? 'Yes' : 'No' }}</b></u> /
                                        Liquid: <u><b>{{ $cargo->liquid == 'yes' ? 'Yes' : 'No' }}</b></u> /
                                        Food: <u><b>{{ $cargo->food == 'yes' ? 'Yes' : 'No' }}</b></u> /
                                        Dangerous items: <u><b>{{ $cargo->dangerous == 'yes' ? 'Yes' : 'No' }}</b></u>
                                    </td>
                                    <td>{{ $cargo->document }}</td>
                                    <td>
                                        @foreach ($packages->where('cargo_id' , $cargo->id) as $package)
                                            @if ($package->barcode)
                                                <p>Package barcode No: {{ $package->id }}</p>
                                                <a href="{{ $package->barcode }}" download="{{ $package->id }}">
                                                    <img width="150px" height="70px" src="{{ $package->barcode }}">
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
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
