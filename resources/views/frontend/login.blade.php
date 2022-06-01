@extends('frontend.layout.app')

@section('title', 'Login')

@section('content')


@if($errors->any())
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{ implode('', $errors->all(':message')) }}',
            timer: 1500
        })
    </script>
@endif

@if (session()->has('message'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'info',
            title: '{{ session()->get('message') }}',
            timer: 3500
        })
    </script>
@endif

<section id="Login">
    <div class="container">
        <div class="row mt-6 loginForm">
            <form action="{{ route('userpanel.login_user') }}" method="post">
                @csrf
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-title">
                                <h1>Login</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="row login-forms">
                                <div class="col-lg-12">
                                    <div class="forms-input">
                                        <input type="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="forms-input">
                                        <input type="password" placeholder="Password" name="password">
                                        <div class="label-check">
                                            <input name="remember_me" type="checkbox">
                                            <label for="remember_me">Remember me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="login-button">
                                <button type="submit">Login</button>
                                <a href="">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="or-title">
                                    <h6>OR</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="or">
                                    <a href=""><img src="{{asset('/')}}frontend/img/Google__G__Logo 1.svg" alt=""></a>
                                    <a href=""><img src="{{asset('/')}}frontend/img/facebook-3 1.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="footer-login">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="footer-title">
                    <h5>Don’t have account?<a href=""> Register</a></h5>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-12">
                <div class="footer-end">
                    <a href="">Terms of use</a>
                    <a href="">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
