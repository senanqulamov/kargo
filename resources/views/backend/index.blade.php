@extends('backend.layout.auth')

@section('title', 'Login')

@section('content')

    @if ($errors->any())
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ implode('', $errors->all(':message')) }}',
                showConfirmButton: true,
                backdrop: true
            })
        </script>
    @endif

    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'info',
                title: '{{ session()->get('message') }}',
                showConfirmButton: false,
                backdrop: false,
                timer: 2000
            })
        </script>
    @endif
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('/') }}backend/assets/img/logo.png" alt="logo" width="333" class="mx-auto d-block mb-5">
        </div>

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg mb-0">Sign in to start your session</p>

                <form action="{{ route('admin.login') }}" method="post" autocomplete="on">
                    @csrf
                    <!-- Email input -->
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}" />
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Password input -->
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
