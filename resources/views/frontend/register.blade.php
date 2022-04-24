@extends('frontend.layout.app')

@section('title', 'Register')

@section('content')
<section id="Login">
    <div class="container">
        <div class="row mt-6 loginForm">
            <div class="col-lg-12">
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
                                    <input type="text" placeholder="Name/Surname/Company name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <select name="" id="">
                                        <option value="" selected="Country"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input type="number" id="" placeholder="Number ">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input type="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input type="password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <select name="" id="">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="forms-input">
                                    <input type="password" placeholder="Your average monthly shipments">
                                    <div class="label-check">
                                        <input type="checkbox">
                                        <label for="">I agree with all <a href="">Terms and Conditions</a> and <a href="">Privacy and policy</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="login-button">
                            <button>Login</button>
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
@endsection