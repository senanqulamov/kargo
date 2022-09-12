<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF download</title>
    <style>
        body,
        html {
            height: 100%;
        }

        /* body {
            width: 40%;
            margin: auto;
        } */

        .pdf-cont {
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 100%;
            justify-content: center;
            cursor: pointer;
            transition: 0.6s;
        }

        /* .pdf-cont:hover {
            transform: scale(1.1);
        } */

        .cont {
            border: 2px solid black;
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
        }

        .number_package {
            background: black;
            color: white;
            width: 100%;
            padding: 10px 0px;
            font-size: 15px;
            text-align: center;
        }

        body * {
            margin: 0;
            padding: 0;
        }

        .row {
            display: grid;
            justify-items: stretch;
            grid-template-columns: repeat(2, max-content);
            justify-content: space-between;
            padding: 2% 3%;
        }

        .col {
            display: flex;
            flex-direction: column;
        }

        .col-left {
            text-align: left;
        }

        .col-right {
            text-align: right;
        }

        .ship-to-col span {
            font-size: 17px;
        }

        .row-with-border {
            display: grid;
            border-top: 6px solid black;
            align-items: center;
            grid-template-columns: repeat(2, 50%);
            justify-items: center;
        }

        .col-with-border {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding-block: 20px;
        }

        .col-with-border:nth-child(1) {
            border-right: 6px solid black;
        }

        .longer-border {
            border-top: 16px solid black;
        }
    </style>
</head>

<body>

    @php
        $packages = DB::table('packages')
            ->where('cargo_id', $cargo_id)
            ->get();
        $user = DB::table('users')
            ->where('id', $user_id)
            ->first();
    @endphp

    @foreach ($packages as $key => $package)
        <div class="pdf-cont" id="package-{{ $key }}" onclick="printPackage(this)">
            <div class="cont">
                <div class="row">
                    <div class="col col-left" style="text-align: left">
                        <span>Name: <b>{{ $user->name }}</b></span>
                        <span>Phone: <b>{{ $user->phone }}</b></span>
                        <span>Address: <b>{{ $user->address }}</b> ,</span>
                        <span><b>{{ $user->city }}</b> , <b>{{ $user->country }}</b></span>
                    </div>
                    <div class="col col-right" style="gap: 10px;">
                        <div style="display: flex;flex-direction:row;gap:10px;">
                            <span>{{ $package->package_weight }} kg</span>
                            <div class="number_package">{{ $key + 1 }} of {{ count($packages) }}</div>
                        </div>
                        <span>{{ $date }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-left">
                        <h4>SHIP <br> TO:</h4>
                    </div>
                    <div class="col ship-to-col col-right">
                        <span><b>{{ $name }}</b></span>
                        <span>PHONE: <b>{{ $phone }}</b></span>
                        <span><b>{{ $address }}</b> ,</span>
                        <span><b>{{ $state }}</b> ,</span>
                        <span><b>{{ $city }}</b> ,</span>
                        <span><b>{{ $country }}</b></span>
                    </div>
                </div>
                <div class="row-with-border">
                    <div class="col-with-border">
                        <h3><b>SHIPLOUNGE</b></h3>
                    </div>
                    <div class="col-with-border">
                        <h3><b>010{{ $user->id }}20</b></h3>
                    </div>
                </div>
                <div class="row-with-border longer-border" style="padding: 10px;">
                    <div class="col">
                        <h3><b>{{ $company }}</b></h3>
                    </div>
                    <div class="col">
                        <h3><b>{{ $key + 1 }}</b></h3>
                    </div>
                </div>
                <div class="row" style="border-top: 2px solid black;">
                    <h4>Tracking number </h4>
                    <h4>#{{ $tracking_number }}</h4>
                </div>
                <div style="display: flex;justify-content:center;">
                    <img height="90px" src="{{ $package->barcode }}">
                </div>
                <div class="row longer-border" style="justify-content: center">
                    <div class="col">
                        <h4>{{ $order_info }}</h4>
                    </div>
                </div>
            </div>
            <br>
        </div>
    @endforeach

    {{-- {{ dd($packages) }} --}}


    <script>
        // var prtContent = document.querySelector('.pdf-cont');
        // var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        // WinPrint.document.write(prtContent.innerHTML);
        // WinPrint.document.close();
        // WinPrint.focus();
        // WinPrint.print();
        // WinPrint.close();

        // function printPackage(div){
        //     var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        //     WinPrint.document.write(div.innerHTML);
        //     WinPrint.document.close();
        //     WinPrint.focus();
        //     WinPrint.print();
        //     WinPrint.close();
        // }
        // window.print();

        function printPackage(divName) {
            var printContents = document.getElementById(divName.getAttribute('id')).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

</body>

</html>
{{-- <div class="cont">
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

    <img height="90px" src="{{ $package->barcode }}">
</div> --}}
