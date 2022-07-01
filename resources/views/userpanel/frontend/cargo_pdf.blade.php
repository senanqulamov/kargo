<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF download</title>
    <style>
        .cont {
            padding: 0px 3%;
            border: 2px solid black;
        }

        .number_package {
            background: black;
            color: white;
            width: 100%;
            padding: 10px 0px;
            font-size: 15px;
            text-align: center;
        }

        .city_country {
            border: 1px solid black;
            /* padding: 10px 10px; */
            text-align: center;
        }

        body * {
            text-align: center;
        }
    </style>
</head>

<body>

    @php
        $packages = DB::table('packages')
            ->where('cargo_id', $cargo_id)
            ->get();
    @endphp

    @foreach ($packages as $key => $package)
        <div class="cont">
            <h2>Deirvlon</h2>
            <h3>Package: #{{ $package->id }}</h3>
            <div class="number_package">{{ $key + 1 }}/{{ count($packages) }}</div>
            <p style="font-size: 10px"><b>ship to</b></p>
            <p style="font-size: 16px">{{ $name }} <b>|</b> {{ $company }}</p>
            <p style="font-size: 16px">{{ $address }}</p>
            <div class="city_country">
                <p style="text-align: center;width:100%;">{{ $country }} / {{ $city }}</p>
            </div>
            <p>{{ $order_info }}</p>
            <p id="user">Gonderici: 010{{ Auth::user()->id }}20</p>

            <img width="150px" height="70px" src="{{ $package->barcode }}">
        </div>
        <br>
    @endforeach

    {{-- {{ dd($packages) }} --}}


</body>

</html>
