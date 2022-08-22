@extends('userpanel.layout.layout')

@section('content')
    <style>
        .tab-col-holder-hm table th {
            font-size: 16px;
        }

        .tab-col-holder-hm table td {
            font-size: 14px;
        }

        .login__table {
            height: max-content;
        }

        .tab-header-hm {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }

        .tab-links-hm {
            text-align: center;
            padding-block: 10px;
            transition: 0.4s;
            outline: 0.5px solid transparent;
        }

        .tab-links-hm:hover {
            transform: scale(1.1);
            outline: 0.5px solid rgba(106, 137, 231, 0.9);
            z-index: 100;
        }

        .active-tab-link {
            background: #caefd7;
            color: #2f4deb;
        }

        .tab-col-holder-hm {
            position: relative;
        }

        .tab-col {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border: 0.5px solid rgba(128, 128, 128, 0.155);
            position: absolute;
            opacity: 0;
            visibility: hidden;
            transition: 0.6s;
        }

        .active-tab-hm {
            opacity: 10;
            z-index: 100;
            visibility: visible;
            transition: 0.6s;
        }

        .my-profile-input-hm {
            transition: 0.6s;
        }
    </style>
    <section>
        <div class="variable variableChangePassword container py-4 row mx-auto">
            <div class="col-3">
                <div class="list-group">
                    <a href="#" class="list-group-item tab-links-hm active-tab-link" onclick="changeTab(this)"
                        data-name="personal">
                        <i class="fa-solid fa-user"></i> Personal Information
                    </a>
                    <a href="#" class="list-group-item tab-links-hm" onclick="changeTab(this)" data-name="account">
                        <i class="fa-solid fa-lock"></i> Account Information
                    </a>
                    <a href="#" class="list-group-item tab-links-hm" onclick="changeTab(this)" data-name="address">
                        <i class="fa-solid fa-location-pin"></i> Addresses
                    </a>
                </div>
            </div>
            <div class="col-9 tab-col-holder-hm">
                <div class="tab-col active-tab-hm" id="personal">
                    <section class="tab-header-hm">
                        <h2>
                            <i class="fa-solid fa-user"></i>
                            Personal Information
                            @if (Auth::user()->status == 0)
                                <span style="color: red;">Inactive profile</span>
                            @endif
                        </h2>
                        <button class="btn btn-warning" id="readonly_disactive_button">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </section>
                    <hr>
                    <section>
                        <form action="{{ route('userpanel.updatemyprofile') }}" method="post">
                            @csrf
                            <li class="list-group-item row d-flex pt-3">
                                <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-12 col-sm-6 text-md-end">
                                        <h6>Name Surname</h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control w-100 my-profile-input-hm"
                                            aria-describedby="addon-wrapping" name="name"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                </div>
                                {{-- <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-12 col-sm-6 text-md-end">
                                        <h6><i class="fa-solid fa-phone me-1"></i>Phone:</h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="input-group w-100">
                                            <input type="number" class="form-control my-profile-input-hm" name="phone"
                                                value="{{ Auth::user()->phone }}" />
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-12 col-sm-6 text-md-end">
                                        <h6><i class="fa-solid fa-location-pin me-1"></i>Adress:</h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control w-100 my-profile-input-hm" name="address"
                                            value="{{ Auth::user()->address }}" />
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-12 col-sm-6 text-md-end">
                                        <h6>
                                            <i class="fa-solid fa-location-pin me-1"></i>Adress 2:
                                        </h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control w-100 my-profile-input-hm"
                                            aria-describedby="addon-wrapping" name="address_2"
                                            value="{{ Auth::user()->address_2 }}" />
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-12 col-sm-6 text-md-end">
                                        <h6><i class="fa-solid fa-location-pin me-1"></i>City:</h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control w-100 my-profile-input-hm"
                                            aria-describedby="addon-wrapping" name="city"
                                            value="{{ Auth::user()->city }}" />
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-12 col-sm-6 text-md-end">
                                        <h6><i class="fa-solid fa-location-pin me-1"></i>Country:</h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control w-100 my-profile-input-hm"
                                            aria-describedby="addon-wrapping" name="country"
                                            value="{{ Auth::user()->country }}" />
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-12 col-md-6 text-md-end">
                                        <h6>Post Code:</h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" class="form-control w-100 my-profile-input-hm"
                                            placeholder="123456" aria-describedby="addon-wrapping" name="postcode"
                                            value="{{ Auth::user()->postcode }}" />
                                    </div>
                                </div>
                                <div class="mb-2 col-12 row align-items-center">
                                    <div class="col-6 text-md-end">
                                        <h6>Membership Type:</h6>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio"
                                                name="membership" id="membership1" value="personal"
                                                @if (Auth::user()->membership == 'personal')checked @endif/>
                                            <label class="form-check-label h6" for="membership1">
                                                Personal
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="membership" id="membership2" value="company"
                                                @if (Auth::user()->membership == 'company')checked @endif/>
                                            <label class="form-check-label h6" for="membership2">
                                                Company
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 personal-member-hm"
                                    data-display="@if (Auth::user()->membership == 'personal') block @else none @endif">
                                    <h6>TC Identification number</h6>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control my-profile-input-hm"
                                            name="indetification_number"
                                            value="{{ Auth::user()->indetification_number }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 personal-member-hm"
                                    data-display="@if (Auth::user()->membership == 'personal') block @else none @endif">
                                    <h6>Tax Administration</h6>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control my-profile-input-hm"
                                            name="tax_adminstration" value="{{ Auth::user()->tax_adminstration }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 company-member-hm"
                                    data-display="@if (Auth::user()->membership == 'company') block @else none @endif">
                                    <h6>Company Name</h6>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control my-profile-input-hm"
                                            name="company_name" value="{{ Auth::user()->company_name }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 company-member-hm"
                                    data-display="@if (Auth::user()->membership == 'company') block @else none @endif">
                                    <h6>Tax Number</h6>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control my-profile-input-hm" name="tax_number"
                                            value="{{ Auth::user()->tax_number }}" />
                                    </div>
                                </div>
                                <div class="mb-5 col-12 col-md-12 d-flex align-items-center">
                                    <button type="submit"
                                        class="btn btn-warning mx-auto variable-container-inputs-button38">
                                        Update
                                    </button>
                                </div>
                            </li>
                        </form>
                    </section>
                </div>
                <div class="tab-col" id="account">
                    <section class="tab-header-hm">
                        <h2><i class="fa-solid fa-lock"></i> Account Information</h2>
                    </section>
                    <hr>
                    <section>
                        <form action="{{ route('userpanel.updateuser') }}" method="post">
                            @csrf
                            <li class="list-group-item row d-flex">
                                <div class="col-12 col-md-6 mb-3">
                                    <h6>Email</h6>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="deirvlon@gmail.com"
                                            aria-describedby="addon-wrapping" name="email"
                                            value="{{ Auth::user()->email }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <h6>User name</h6>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="123456"
                                            aria-describedby="addon-wrapping" name="name"
                                            value="{{ Auth::user()->name }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <h6>Phone</h6>
                                    <div class="input-group flex-nowrap">
                                        <input type="text" class="form-control" placeholder="123456"
                                            aria-describedby="addon-wrapping" name="phone"
                                            value="{{ Auth::user()->phone }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <h6>New Password</h6>
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control" type="password" aria-describedby="addon-wrapping"
                                            name="password" placeholder="Your password" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <h6>Balance Name</h6>
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control" type="text" aria-describedby="addon-wrapping"
                                            name="balance_name" placeholder="Your IBAN number"
                                            value="{{ Auth::user()->balance_name }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <h6>IBAN</h6>
                                    <div class="input-group flex-nowrap">
                                        <input class="form-control" type="text" aria-describedby="addon-wrapping"
                                            name="Iban" placeholder="Your IBAN number"
                                            value="{{ Auth::user()->Iban }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 d-flex align-items-center">
                                    <button type="submit"
                                        class="btn btn-warning ms-auto variable-container-inputs-button38">
                                        Confirm
                                    </button>
                                </div>
                            </li>
                        </form>
                    </section>
                </div>
                <div class="tab-col" id="address">
                    <section class="tab-header-hm">
                        <h2><i class="fa-solid fa-location-pin"></i> Addresses</h2>
                        <button class="btn btn-success" data-toggle="modal" data-target="#add-modal">
                            <i class="fa-solid fa-add"></i>
                            Add new address
                        </button>
                    </section>
                    <hr>
                    <section>
                        <table id="example1" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Created at</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zipcode</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_addresses as $user_address)
                                    <tr>
                                        <td>{{ $user_address->id }}</td>
                                        <td>{{ $user_address->created_at }}</td>
                                        <td>{{ $user_address->name }}</td>
                                        <td>{{ $user_address->phone }}</td>
                                        <td>{{ $user_address->email }}</td>
                                        <td>{{ $user_address->address }}</td>
                                        <td>{{ $user_address->state }}</td>
                                        <td>{{ $user_address->city }}</td>
                                        <td>{{ $user_address->zipcode }}</td>
                                        <td>
                                            <button class="btn btn-info" type="button"
                                                data-address-id="{{ $user_address->id }}"
                                                onclick="putAddressValues('{{ $user_address->id }}')">
                                                Edit
                                            </button>
                                        </td>
                                        <td><button class="btn btn-danger" type="button" onclick="DeleteModal(this)"
                                                data-address-id="{{ $user_address->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Address : <span id="modal-header-hm"></span></h5>
                </div>
                <form action="{{ route('userpanel.updateuseraddress') }}" method="POST">
                    @csrf
                    <input type="text" name="id" id="ad_id" hidden>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="label">Name</label>
                                    <input class="form-control" type="text" name="name" id="ad_name" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="address" class="label">Address</label>
                                    <input class="form-control" type="text" name="address" id="ad_address" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="state" class="label">State</label>
                                    <input class="form-control" type="text" name="state" id="ad_state" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="city" class="label">City</label>
                                    <input class="form-control" type="text" name="city" id="ad_city" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="country" class="label">Country</label>
                                    <input class="form-control" type="text" name="country" id="ad_country" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="zipcode" class="label">Zip Code</label>
                                    <input class="form-control" type="text" name="zipcode" id="ad_zipcode" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone" class="label">Phone number</label>
                                    <input class="form-control" type="text" name="phone" id="ad_phone" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email" class="label">Email address</label>
                                    <input class="form-control" type="text" name="email" id="ad_email" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Address</h5>
                </div>
                <form action="{{ route('userpanel.adduseraddress') }}" method="POST">
                    @csrf
                    <input type="text" name="id" id="ad_id" hidden>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="label">Name</label>
                                    <input class="form-control" type="text" name="name" id="ad_name" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="address" class="label">Address</label>
                                    <input class="form-control" type="text" name="address" id="ad_address" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="state" class="label">State</label>
                                    <input class="form-control" type="text" name="state" id="ad_state" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="city" class="label">City</label>
                                    <input class="form-control" type="text" name="city" id="ad_city" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="country" class="label">Country</label>
                                    <input class="form-control" type="text" name="country" id="ad_country" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="zipcode" class="label">Zip Code</label>
                                    <input class="form-control" type="text" name="zipcode" id="ad_zipcode" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone" class="label">Phone number</label>
                                    <input class="form-control" type="text" name="phone" id="ad_phone" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email" class="label">Email address</label>
                                    <input class="form-control" type="text" name="email" id="ad_email" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function putAddressValues(address_id) {
            $.ajax({
                type: 'GET',
                url: '{{ route('userpanel.getuseraddress') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: address_id
                },
                beforeSend: function() {
                    let timerInterval
                    Swal.fire({
                        position: 'center',
                        title: 'Loading Address',
                        backdrop: true,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                complete: function() {
                    Swal.hideLoading();
                },
                success: function(data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Address loaded succesfully !',
                        backdrop: false,
                        confirmButton: false,
                        timer: 2000
                    });
                    $('#edit-modal').modal({
                        keyboard: true,
                        backdrop: true,
                        focus: true
                    })
                    document.querySelector('#modal-header-hm').innerHTML = data.name;
                    document.querySelector('#ad_id').value = data.id;
                    document.querySelector('#ad_name').value = data.name;
                    document.querySelector('#ad_address').value = data.address;
                    document.querySelector('#ad_state').value = data.state;
                    document.querySelector('#ad_city').value = data.city;
                    document.querySelector('#ad_country').value = data.country;
                    document.querySelector('#ad_zipcode').value = data.zipcode;
                    document.querySelector('#ad_phone').value = data.phone;
                    document.querySelector('#ad_email').value = data.email;

                    console.log(data);
                },
                error: function(error) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Couldnt load address',
                        backdrop: false,
                        confirmButton: false,
                        timer: 2000
                    });
                }
            });
        }

        function DeleteModal(button) {
            console.clear();
            console.log(button);

            Swal.fire({
                title: 'Are you sure to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("deleted");
                    var address_id = button.getAttribute('data-address-id');
                    console.log(address_id);
                    $.ajax({
                        type: 'POST',
                        url: '/userpanel/deleteuseraddress/' + address_id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                data.msg,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    var i = button.parentNode.parentNode.rowIndex;
                                    document.getElementById("example").deleteRow(i);
                                }
                            });
                        }
                    });
                }
            })
        }
    </script>
    <script>
        var readonly_inputs = document.querySelectorAll('.my-profile-input-hm');
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
    <script>
        var personal_member = document.querySelectorAll('.personal-member-hm');
        var company_member = document.querySelectorAll('.company-member-hm');

        personal_member.forEach(element => {
            if (element.getAttribute('data-display').replace(/ /g, '') === 'none') {
                element.style.display = "none";
            } else {
                element.style.display = "block";
            }
        });
        company_member.forEach(element => {
            if (element.getAttribute('data-display').replace(/ /g, '') === 'none') {
                element.style.display = "none";
            } else {
                element.style.display = "block";
            }
        });

        var membership1_button = document.querySelector('#membership1');
        membership1_button.addEventListener('click', function() {
            personal_member.forEach(element => {
                element.style.display = "block";
                company_member.forEach(company => {
                    company.style.display = "none";
                });
            });
        });
        var membership2_button = document.querySelector('#membership2');
        membership2_button.addEventListener('click', function() {
            company_member.forEach(element => {
                element.style.display = "block";
                personal_member.forEach(personal => {
                    personal.style.display = "none";
                });
            });
        })
    </script>
    <script>
        function changeTab(tab_link) {
            var tab_name = tab_link.getAttribute('data-name');
            console.log(tab_name);
            var tab = document.querySelector('#' + tab_name);

            var tabs = document.querySelectorAll('.tab-col');
            tabs.forEach(element => {
                element.classList.remove('active-tab-hm');
            });
            tab.classList.toggle("active-tab-hm");

            document.querySelector('.active-tab-link').classList.remove('active-tab-link');
            tab_link.classList.add('active-tab-link');
        }
    </script>
@endsection
