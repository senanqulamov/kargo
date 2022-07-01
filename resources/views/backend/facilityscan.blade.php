@extends('backend.layout.app')

@section('title', 'Facility Scanner')

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
            background: #b16060;
            border: 2px solid red;
        }

        .package_status_1 {
            background: #b1a960;
            border: 2px solid yellow;
        }

        .package_status_2 {
            background: #6074b1;
            border: 2px solid blue;
        }

        .package_status_3 {
            background: #74b160;
            border: 2px solid green;
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
    </style>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div id="qr-reader" style="width: 600px"></div>
    </div>

    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code scanned = ${decodedText}`, decodedResult);
            // window.alert(decodedText);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.scanners.scannedcode') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    package_id:decodedText
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
                            <span><b>Package Count: </b>` + data.package.package_count + `</span>
                            <span><b>Package Type: </b>` + data.package.package_type + ` </span>
                        </div>
                        <div class="modal-package-details">
                            <span><b>Package Length: </b>` + data.package.package_length + ` </span>
                            <span><b>Package Width: </b>` + data.package.package_width + ` </span>
                            <span><b>Package Height: </b>` + data.package.package_height + ` </span>
                            <span><b>Package Weight: </b>` + data.package.package_weight + ` </span>
                        </div>
                        `,
                        showConfirmButton: true,
                        backdrop: true,
                        timer: false
                    })
                },
            });

        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endsection
