@extends('backend.layout.app')

@section('title', 'Measurement')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('css')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
        .package_status_span {
            color: white;
            border-radius: 20px;
            width: max-content;
            height: max-content;
            font-size: 12px;
            padding: 4px 10px;
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

        .modal-package-details {
            display: flex;
            grid-template-columns: repeat(2, max-content);
            grid-template-rows: repeat(2, max-content);
            gap: 20px;
            padding: 10px;
            width: 100%;
            height: max-content;
            margin: 10px 0;
            border: 1px dotted black;
        }

        .modal-package-details span {
            height: max-content;
            width: 100%;
        }

        .form-control {
            text-align: center;
        }
        .user-info-row-scan-modal {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
    </style>
@endsection

@section('content')
    @if (session()->has('message') && session()->has('cargo_id'))
        @if (session()->get('is_ready') == 1)
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '{{ session()->get('message') }}',
                    html: `
                        <a class="btn btn-success form-control"
                            href="{{ route('admin.cargo-requests.cargo_details', ['id' => session()->get('cargo_id')]) }}">
                            View This cargo and submit ready
                        </a>
                    `,
                    showConfirmButton: false,
                    backdrop: true,
                    timer: false
                })
            </script>
        @else
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: '{{ session()->get('message') }}',
                    html: `
                        <a class="btn btn-success form-control"
                            href="{{ route('admin.cargo-requests.cargo_details', ['id' => session()->get('cargo_id')]) }}">
                            View This cargo and submit ready
                        </a>
                    `,
                    showConfirmButton: false,
                    backdrop: true,
                    timer: false
                })
            </script>
        @endif
    @endif

    <div class="row justify-content-center">
        <div id="scanner-loader">
            <div>
                <div class="loader">Searching...</div>
            </div>
        </div>
        <div id="qr-reader" style="width: 600px"></div>
        <div class="show-scanner-button-div">
            <button class="btn btn-info" type="button" onclick="ShowScanner(this)">Scan BarCode</button>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code scanned = ${decodedText}`, decodedResult);
            document.querySelector('#qr-reader').style.display = 'none';
            document.querySelector('.show-scanner-button-div').style.display = 'block';

            $.ajax({
                type: "POST",
                url: "{{ route('admin.scanners.searchscannedcode') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    package_id: decodedText
                },
                beforeSend: function() {
                    $('#scanner-loader').show();
                },
                complete: function() {
                    $('#scanner-loader').hide();
                },
                success: function(data) {
                    console.table(data.package);
                    console.table(data.cargo);

                    Swal.fire({
                        position: 'center',
                        icon: false,
                        title: 'Package number: ' + decodedText,
                        html: `
                        <div>
                            <span>Status:
                                <span class="package_status_span package_status_` + data.status.status + `">
                                    ` + data.status.status_name + `
                                </span>
                            </span>
                        </div>
                        <div class="modal-package-details">
                            <span><b>Cargo ID: </b>` + data.package.cargo_id + `</span>
                            <span><b>Count: </b>` + data.package.package_count + `</span>
                            <span><b>Package Type: </b>` + data.package.package_type + ` </span>
                        </div>
                        <div class="modal-package-details">
                            <span><b>Package Length: </b>` + data.package.package_length + ` </span>
                            <span><b>Package Width: </b>` + data.package.package_width + ` </span>
                            <span><b>Package Height: </b>` + data.package.package_height + ` </span>
                            <span><b>Package Weight: </b>` + data.package.package_weight + ` </span>
                        </div>
                        <div class="modal-package-details">
                            <span><b>New Package Length: </b>` + data.package.n_package_length + ` </span>
                            <span><b>New Package Width: </b>` + data.package.n_package_width + ` </span>
                            <span><b>New Package Height: </b>` + data.package.n_package_height + ` </span>
                            <span><b>New Package Weight: </b>` + data.package.n_package_weight + ` </span>
                        </div>
                        <form action="{{ route('admin.scanners.measurementUpdate') }}" method="POST">
                            @csrf
                            <div class="modal-package-details">
                                <input type="hidden" name="id" value="` + decodedText + `">
                                <span>
                                    <b>Package Length: </b>
                                    <input class="form-control" name="package_length"
                                        value="` + data.package.package_length + `">
                                </span>
                                <span>
                                    <b>Package Width: </b>
                                    <input class="form-control" name="package_width"
                                        value="` + data.package.package_width + `">
                                </span>
                                <span>
                                    <b>Package Height: </b>
                                    <input class="form-control" name="package_height"
                                        value="` + data.package.package_height + `">
                                </span>
                                <span>
                                    <b>Package Weight: </b>
                                    <input class="form-control" name="package_weight"
                                        value="` + data.package.package_weight + `">
                                </span>
                            </div>
                            <div style="margin-bottom:10px;">
                                <button class="btn btn-success form-control" type="submit">Submit</button>
                            </div>
                        </form>
                        <div class="user-info-row-scan-modal">
                            <span><b>User name: </b>` + data.user.name + `</span>
                            <span><b>User email: </b>` + data.user.name + `</span>
                            <span><b>User phone: </b>` + data.user.name + `</span>
                        </div>
                        <div class="modal-package-details">
                            <span><b>Name: </b>` + data.cargo.name + ` </span>
                            <span><b>Country: </b>` + data.cargo.country + ` </span>
                            <span><b>State: </b>` + data.cargo.state + ` </span>
                            <span><b>City: </b>` + data.cargo.city + ` </span>
                        </div>
                        <div class="modal-package-details">
                            <span><b>Address: </b>` + data.cargo.address + ` </span>
                            <span><b>Zipcode: </b>` + data.cargo.zipcode + ` </span>
                            <span><b>Phone: </b>` + data.cargo.phone + ` </span>
                            <span><b>Email: </b>` + data.cargo.email + ` </span>
                        </div>
                        <div class="modal-package-details">
                            <span><b>Order Info: </b>` + data.cargo.order_info + ` </span>
                            <span><b>Currency: </b>` + data.cargo.currency + ` </span>
                            <span><b>IOSS number: </b>` + data.cargo.ioss_number + ` </span>
                            <span><b>VAT number: </b>` + data.cargo.vat_number + ` </span>
                        </div>
                        `,
                        showConfirmButton: true,
                        backdrop: true,
                        timer: false
                    })
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `Couldn't find this package`
                    })
                }
            });

        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);

        function ShowScanner(button){
            document.querySelector('#qr-reader').style.display = 'block';
            button.parentElement.style.display = 'none';
        }
    </script>
@endsection
