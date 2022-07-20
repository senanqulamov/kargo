@extends('userpanel.layout.layout')

@section('content')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                backdrop: false,
                timer: 2000
            })
        </script>
    @endif
    <style>
        .user_addresses_table_holder {
            height: max-content;
        }

        .login__table {
            height: max-content;
        }

    </style>
    <section>
        <div class="variable variableChangePassword container py-4 row mx-auto">
            <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3">
                <div class="list-group">
                    <a href="#" class="list-group-item pt-5 ps-5">
                        <i class="fa-solid fa-user"></i> My Profile
                    </a>
                    <a href="#" class="list-group-item ps-5">
                        <i class="fa-solid fa-location-pin"></i> Addresses
                    </a>
                    <a href="#" class="list-group-item ps-5">
                        <i class="fa-solid fa-lock"></i> Change Password
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-7 col-md-7 col-lg-9 col-xl-9 col-xxl-9">
                <ul class="list-group">
                    <li class="list-group-item row pt-4">
                        <h2><i class="fa-solid fa-lock"></i> Change Password</h2>
                    </li>
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
                                        aria-describedby="addon-wrapping" name="name" value="{{ Auth::user()->name }}" />
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
                                <h6>Password</h6>
                                <div class="input-group flex-nowrap">
                                    <input class="form-control" type="password" aria-describedby="addon-wrapping"
                                        name="password" placeholder="Your password" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <h6>IBAN</h6>
                                <div class="input-group flex-nowrap">
                                    <input class="form-control" type="text" aria-describedby="addon-wrapping"
                                        name="Iban" placeholder="Your IBAN number" value="{{ Auth::user()->Iban }}"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 d-flex align-items-center">
                                <button type="submit" class="btn btn-warning ms-auto variable-container-inputs-button38">
                                    Confirm
                                </button>
                            </div>
                        </li>
                    </form>
                </ul>
            </div>
            <section>
                <div class="variable variableChangePassword container py-4 row mx-auto">
                    <div class="user_addresses_table_holder">
                        <div class="login__table">
                            <div class="login__debet">
                                <span>Adresses</span>
                            </div>
                            <hr>
                            <div class="container ">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Created at</th>
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
                                                <td>{{ $user_address->name }}</td>
                                                <td>{{ $user_address->address }}</td>
                                                <td>{{ $user_address->created_at }}</td>
                                                <td>{{ $user_address->state }}</td>
                                                <td>{{ $user_address->city }}</td>
                                                <td>{{ $user_address->zipcode }}</td>
                                                <td><button type="button" onclick="EditModal(this)"
                                                        data-address-id="{{ $user_address->id }}">Edit</button></td>
                                                <td><button type="button" onclick="DeleteModal(this)"
                                                        data-address-id="{{ $user_address->id }}">Delete</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Zipcode</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="list-group">
                <li class="list-group-item row pt-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2><i class="fa-solid fa-user"></i>My Profile
                            @if (Auth::user()->status == 0)
                                <span style="color: red;">Inactive profile</span>
                            @endif
                        </h2>
                        <button class="btn btn-warning" id="readonly_disactive_button">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </div>
                </li>
                <form action="{{ route('userpanel.updatemyprofile') }}" method="post">
                    @csrf
                    <li class="list-group-item row d-flex pt-3">
                        <div class="mb-2 col-12 row align-items-center">
                            <div class="col-12 col-sm-6 text-md-end">
                                <h6>Name Surname</h6>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control w-100 my-profile-input-hm"
                                    aria-describedby="addon-wrapping" name="name" value="{{ Auth::user()->name }}" />
                            </div>
                        </div>
                        <div class="mb-2 col-12 row align-items-center">
                            <div class="col-12 col-sm-6 text-md-end">
                                <h6><i class="fa-solid fa-phone me-1"></i>Phone:</h6>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group w-100">
                                    <span class="input-group-text" id="basic-addon1">+943</span>
                                    <input type="number" class="form-control my-profile-input-hm" name="phone"
                                        value="{{ Auth::user()->phone }}" />
                                </div>
                            </div>
                        </div>
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
                                    aria-describedby="addon-wrapping" name="city" value="{{ Auth::user()->city }}" />
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
                                <input type="text" class="form-control w-100 my-profile-input-hm" placeholder="123456"
                                    aria-describedby="addon-wrapping" name="postcode"
                                    value="{{ Auth::user()->postcode }}" />
                            </div>
                        </div>
                        <div class="mb-2 col-12 row align-items-center">
                            <div class="col-6 text-md-end">
                                <h6>Membership Type:</h6>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input my-profile-input-hm" type="radio" name="membership"
                                        id="membership1" value="personal" />
                                    <label class="form-check-label h6" for="membership1">
                                        Personal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input my-profile-input-hm" type="radio" name="membership"
                                        id="membership2" value="company" />
                                    <label class="form-check-label h6" for="membership2">
                                        Institutional
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3 personal-member-hm"
                            data-display="@if (Auth::user()->membership == 'personal') block @else none @endif">
                            <h6>TC Identification number</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control my-profile-input-hm" name="indetification_number"
                                    value="{{ Auth::user()->indetification_number }}" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3 personal-member-hm"
                            data-display="@if (Auth::user()->membership == 'personal') block @else none @endif">
                            <h6>Tax Administration</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control my-profile-input-hm" name="tax_adminstration"
                                    value="{{ Auth::user()->tax_adminstration }}" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3 company-member-hm"
                            data-display="@if (Auth::user()->membership == 'company') block @else none @endif">
                            <h6>Company Name</h6>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control my-profile-input-hm" name="company_name"
                                    value="{{ Auth::user()->company_name }}" />
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
                            <button type="submit" class="btn btn-warning mx-auto variable-container-inputs-button38">
                                Update
                            </button>
                        </div>
                    </li>
                </form>
            </section>
    </section>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function EditModal(button) {
            console.clear();
            console.log(button);
            var address_id = button.getAttribute('data-address-id');

            Swal.fire({
                title: 'Login Form',
                html: `
                    <input type="text" name="name" id="name" class="swal2-input" placeholder="Name">
                    <input type="text" name="address" id="address" class="swal2-input" placeholder="Address">
                    <input type="text" name="state" id="state" class="swal2-input" placeholder="State">
                    <input type="text" name="city" id="city" class="swal2-input" placeholder="City">
                    <input type="text" name="zipcode" id="zipcode" class="swal2-input" placeholder="Zip Code">
                    `,
                confirmButtonText: 'Edit',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                focusConfirm: true,
                preConfirm: () => {
                    const name = Swal.getPopup().querySelector('#name').value
                    const address = Swal.getPopup().querySelector('#address').value
                    const state = Swal.getPopup().querySelector('#state').value
                    const city = Swal.getPopup().querySelector('#city').value
                    const zipcode = Swal.getPopup().querySelector('#zipcode').value
                    return {
                        name: name,
                        address: address,
                        state: state,
                        city: city,
                        zipcode: zipcode
                    }
                }
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        type: 'POST',
                        url: '/userpanel/updateuseraddress',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id:address_id ,
                            name:result.value.name,
                            address:result.value.address,
                            city:result.value.city,
                            state:result.value.state,
                            zipcode:result.value.zipcode
                        },
                        success: function(data) {
                            Swal.fire(
                                'Edited!',
                                data.msg + '  (Refresh the page to see changes)',
                                'success'
                            );
                        }
                    });
                }else{
                    Swal.fire(
                        'Cancelled!',
                        'Changes hasn\'t been saved ',
                        'error'
                    )
                }
            })
        }

        function DeleteModal(button) {
            console.clear();
            console.log(button);

            Swal.fire({
                title: 'Are you sure to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
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
@endsection
