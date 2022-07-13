@extends('frontend.layout.app')

@section('title', 'Register')

@section('content')

    @if ($errors->any())
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{ implode('', $errors->all(':message')) }}',
                showConfirmButton: false,
                backdrop: false,
                timer: 2000
            })
        </script>
    @endif
    <section id="Login">
        <div class="container">
            <div class="row mt-6 loginForm">
                <div class="col-lg-12">
                    <form method="post" action="{{ route('userpanel.create_user') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-title">
                                    <h1>Register</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="row login-forms">
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input name="name" type="text" placeholder="Name/Surname/Company name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input name="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input name="phone" type="number" id="" placeholder="Number ">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <select name="country">
                                                <option value="0" disabled selected>Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input type="password" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <input name="password" id="passwordcheck" type="password"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="forms-input">
                                            <div class="label-check">
                                                <input id="terms_checkbox" type="checkbox">
                                                <label for="terms_checkbox">I agree with all <a href="">Terms and
                                                        Conditions</a> and <a href="">Privacy and policy</a></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="login-button">
                                    <button id="submit_button" type="submit">Register</button>
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
                                        <a href=""><img src="{{ asset('/') }}frontend/img/Google__G__Logo 1.svg"
                                                alt=""></a>
                                        <a href=""><img src="{{ asset('/') }}frontend/img/facebook-3 1.svg"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="footer-login">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="footer-title">
                        <h5>Already have account? <a href="">Login</a></h5>
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

    {{-- @foreach ($users as $user)
    <p>{{ $user->email }}</p>
@endforeach --}}


    <style>
        #submit_button:disabled {
            background: gray !important;
            cursor: not-allowed;
        }
        #password_text{
            color: red;
        }
    </style>
    <script>
        var check_box = document.querySelector('#terms_checkbox');
        var submit_button = document.querySelector('#submit_button');

        submit_button.style.display = 'none';

        if (!check_box.checked) {
            submit_button.disabled = true;
        }

        check_box.addEventListener("change", (event) => {
            if (check_box.checked) {
                submit_button.disabled = false;
            } else {
                submit_button.disabled = true;
            }
        });

        var password = document.querySelector('#password');
        var passwordCheck = document.querySelector('#passwordcheck');

        passwordCheck.addEventListener('change', function() {
            if (password.value != passwordCheck.value) {
                if(!document.querySelector('#password_text')){
                    passwordCheck.insertAdjacentHTML('afterend', '<strong id="password_text">Password is not same</strong>');
                    submit_button.style.display = 'none';
                }
            }else{
                if(document.querySelector('#password_text')){
                    document.querySelector('#password_text').remove();
                    submit_button.style.display = 'block';
                }
            }
        });
    </script>
@endsection
