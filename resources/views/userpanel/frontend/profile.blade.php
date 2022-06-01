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
    @if (session()->has('log_in_message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'info',
                title: '{{ session()->get('log_in_message') }}',
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
                                <h6>Older code</h6>
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
    </section>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function EditModal(button) {
            console.clear();
            console.log(button);
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

                                }
                            });
                        }
                    });
                }
            })

            var i = button.parentNode.parentNode.rowIndex;
            document.getElementById("example").deleteRow(i);
        }
    </script>
@endsection
