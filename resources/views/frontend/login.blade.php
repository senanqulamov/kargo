@extends('frontend.layout.app')

@section('title', 'Login')

@section('content')


    @if ($errors->any())
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ implode('', $errors->all(':message')) }}',
                backdrop: true,
                showConfirmButton: true
            })
        </script>
    @endif
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'info',
                title: '{{ session()->get('message') }}',
                backdrop: false,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 4000
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
                                    <h1>{{__('homepage.login-register.text 1')}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="row login-forms">
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input type="email" placeholder="{{__('homepage.login-register.text 2')}}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input type="password" placeholder="{{__('homepage.login-register.text 3')}}" name="password">
                                            <div class="label-check">
                                                <input name="remember_me" type="checkbox">
                                                <label for="remember_me">{{__('homepage.login-register.text 4')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="login-button">
                                    <button type="submit">{{__('homepage.login-register.text 5')}}</button>
                                    <a href="">{{__('homepage.login-register.text 6')}}</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mt-3">
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
                                        <a href=""><img src="{{ asset('/') }}frontend/img/Google__G__Logo 1.svg"
                                                alt=""></a>
                                        <a href=""><img src="{{ asset('/') }}frontend/img/facebook-3 1.svg"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="footer-login">
        <div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="footer-title">
                        <h5>{{__('homepage.login-register.text 7')}}<a href="{{ route('register') }}"> {{__('homepage.login-register.text 8')}}</a></h5>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12">
                    <div class="footer-end">
                        <a href="">{{__('homepage.login-register.text 9')}}</a>
                        <a href="">{{__('homepage.login-register.text 10')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
