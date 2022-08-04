@extends('backend.layout.app')

@section('title', 'Scan and Search Package')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
@endsection

@section('css')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/plugin/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection

@section('content')
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
        var currentUrl = window.location.href;
        var url = currentUrl.split('scanners')[0] + 'cargo-requests/cargo_details/';
        var scanner_return = 0;

        function onScanSuccess(decodedText, decodedResult) {
            console.clear();
            if(scanner_return == 1){
                return;
            }
            scanner_return = 1;

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
                            Status:
                            <span class="package_status_span package_status_` + data.status.status + `">
                                ` + data.status.status_name + `
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
                        <div class="user-info-row-scan-modal">
                            <a class="badge rounded-pill bg-info user_id_badge"
                                target="__blank"
                                href="` + currentUrl.split('scanners')[0] + 'users/' + data.user.id + `">
                                010` + data.user.id + `20
                                <i class="fa-solid fa-up-right-from-square"></i>
                            </a>
                            <span><b>User name: </b>` + data.user.name + `</span>
                            <span><b>User email: </b>` + data.user.email + `</span>
                            <span><b>User phone: </b>` + data.user.phone + `</span>
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
                        <a class="btn btn-success form-control"
                            href="` + url + data.package.cargo_id + `">
                            View This cargo
                        </a>
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

        function ShowScanner(button) {
            document.querySelector('#qr-reader').style.display = 'block';
            button.parentElement.style.display = 'none';
            scanner_return = 0;
        }
    </script>
@endsection
