@extends('userpanel.layout.layout')

@section('content')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                timer: 3500
            })
        </script>
    @endif
    @if (session()->has('log_in_message'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: '{{ session()->get('log_in_message') }}',
                width: '700px',
                padding: '4.25rem',
                timer: 3500
            })
        </script>
    @endif
    <section>
        <div class="variable variableChangePassword container py-4 row mx-auto">
        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3 col-xxl-3 mb-3">
            <div class="list-group">
            <a href="#" class="list-group-item pt-5 ps-5">
                <i class="fa-solid fa-user"></i> My Profile
            </a>
            <a href="#" class="list-group-item ps-5">
                <i class="fa-solid fa-location-pin"></i> My Adress:
            </a>
            <a href="#" class="list-group-item ps-5">
                <i class="fa-solid fa-magnifying-glass-chart"></i> Customer
                Adress:
            </a>
            <a href="#" class="list-group-item ps-5">
                <i class="fa-solid fa-lock"></i> Change Password
            </a>
            <a href="#" class="list-group-item ps-5">
                <i class="fa-solid fa-sack-dollar"></i> Amount of debt
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
                        aria-describedby="addon-wrapping" name="email" value="{{ Auth::user()->email }}"/>
                    </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                    <h6>Older code</h6>
                    <div class="input-group flex-nowrap">
                        <input type="text" class="form-control" placeholder="123456"
                        aria-describedby="addon-wrapping" name="name" value="{{ Auth::user()->name }}"/>
                    </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                    <h6>Phone</h6>
                    <div class="input-group flex-nowrap">
                        <input type="text" class="form-control" placeholder="123456"
                        aria-describedby="addon-wrapping" name="phone" value="{{ Auth::user()->phone }}" />
                    </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                    <h6>Password</h6>
                    <div class="input-group flex-nowrap">
                        <input class="form-control" type="password"
                        aria-describedby="addon-wrapping" name="password" placeholder="Your password"/>
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
        </div>
    </section>
@endsection



