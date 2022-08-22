@extends('userpanel.layout.layout')

@section('content')
    <style>
        hr {
            height: 4px !important;
        }

        input[readonly] {
            background-color: rgba(0, 0, 4, 0.133) !important;
        }
        .form-button-hm{
            font-size: 15px;
        }
    </style>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Your Cargo Request <span
                            style="color: #545424">({{ $cargo->order_info }})</span></h3>
                    <button class="btn btn-warning" id="readonly_disactive_button">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('userpanel.updatecargo') }}" method="post">
                        @csrf
                        <input type="hidden" name="cargo_id" value="{{ $cargo->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->name }}"
                                    name="name">

                                <label for="phone">Phone</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->phone }}"
                                    name="phone">

                                <label for="email">Email</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->email }}"
                                    name="email">
                            </div>
                            <div class="col">
                                <label for="country">Country</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->country }}"
                                    name="country">

                                <label for="city">City</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->city }}"
                                    name="city">

                                <label for="state">State</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->state }}"
                                    name="state">

                                <label for="address">Address</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->address }}"
                                    name="address">

                                <label for="zipcode">ZipCode</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->zipcode }}"
                                    name="zipcode">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <label for="order_info">Order info</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->order_info }}"
                                    name="order_info">

                                <label for="currency">Currency</label>
                                <input type="text" readonly class="form-control" value="{{ $cargo->currency }}"
                                    name="currency">
                            </div>
                            <div class="col">
                                <label for="ioss_number">IOSS number</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->ioss_number }}"
                                    name="ioss_number">

                                <label for="vat_number">VAT number</label>
                                <input type="text" class="form-control order-input-hm" value="{{ $cargo->vat_number }}"
                                    name="vat_number">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <button type="submit" class="btn btn-success form-button-hm">Submit</button>
                        <a href="{{ route('userpanel.cargorequests') }}">
                            <button type="button" class="btn btn-primary form-button-hm">Back to Orders</button>
                        </a>
                        <br>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <script>
        var readonly_inputs = document.querySelectorAll('.order-input-hm');
        readonly_inputs.forEach(element => {
            element.setAttribute('readonly', 'true');
        });
        var readonly_disactive_button = document.querySelector("#readonly_disactive_button");

        readonly_disactive_button.addEventListener('click', function() {
            console.clear();
            readonly_inputs.forEach(element => {
                if (element.getAttribute('readonly') == "true") {
                    element.removeAttribute('readonly');
                } else {
                    element.setAttribute('readonly', 'true');
                }
            });
        })
    </script>
@endsection
