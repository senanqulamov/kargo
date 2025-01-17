@extends('userpanel.layout.layout')

@section('content')
    <section id="share">
        <div class="share">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="share__box">
                            <h2>{{ __('userpanel.share and earn.text 1') }}</h2>
                            <div class="row">
                                <div class="d-flex row align-items-center">
                                    <div class="col-sm-9 col-12 d-flex align-items-center">
                                        @php
                                            $share_earn_url = Auth::user()->id . 'wa' . Auth::user()->id . '2' . Auth::user()->id . '04' . Auth::user()->id . '1';
                                        @endphp
                                        <input class="form-control mt-sm-2" type="text" placeholder="Default input"
                                            value="{{ route('userpanel.get_referance_url', ['url' => $share_earn_url]) }}">
                                    </div>
                                    <div class="col-sm-3 col-12  mt-3 mt-sm-2">
                                        <div class="d-flex justify-content-end justify-content-sm-center">
                                            <button class="share__url">{{ __('userpanel.share and earn.text 2') }}</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p class="share__box-text  mt-4">{{ __('userpanel.share and earn.text 3') }}</p>
                                </div>
                                <div class="col-sm-10 col-12">
                                    <p class="share__box-text  mt-4">{{ __('userpanel.share and earn.text 3') }}</p>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <div class="d-flex justify-content-end justify-content-sm-center">
                                        <button class="share__update mt-3 me-4">{{ __('userpanel.share and earn.text 5') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="share__items">

                    <div class="row">


                        <div class="col-sm-6 col-12">
                            <div class="share__box share__box-balance  mt-5">
                                <div class="share__box-img">
                                    <svg width="76" height="52" viewBox="0 0 76 52" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M45.1451 32.5003C48.6393 30.1696 50.9551 26.1849 50.9551 21.667C50.9551 14.4972 45.1451 8.66699 38.0001 8.66699C30.8551 8.66699 25.0451 14.4972 25.0451 21.667C25.0451 26.1849 27.3609 30.1696 30.8551 32.5003C22.9404 35.4325 17.2734 43.0534 17.2734 52.0003H20.7267C20.7267 42.4451 28.478 34.667 38.0001 34.667C47.5222 34.667 55.2734 42.4451 55.2734 52.0003H58.7267C58.7267 43.0534 53.0598 35.4325 45.1451 32.5003ZM28.4984 21.667C28.4984 16.4109 32.7622 12.1323 38.0001 12.1323C43.2379 12.1323 47.5018 16.4109 47.5018 21.667C47.5018 26.923 43.2379 31.2017 38.0001 31.2017C32.7622 31.2017 28.4984 26.923 28.4984 21.667Z"
                                            fill="#365D96" />
                                        <path
                                            d="M62.4171 23.8333C65.9113 21.5026 68.2271 17.5179 68.2271 13C68.2271 5.83018 62.4171 0 55.2721 0C51.812 0 48.672 1.37382 46.3426 3.602C45.4843 4.42902 44.7351 5.3654 44.1289 6.40431C45.2051 6.84175 46.2336 7.3817 47.1803 8.03102C47.7934 7.03312 48.5767 6.15825 49.4962 5.44742C51.0968 4.2103 53.0925 3.47213 55.2653 3.47213C60.5032 3.47213 64.767 7.75079 64.767 13.0068C64.767 17.3675 61.8245 21.0515 57.8332 22.1793C57.0158 22.4117 56.1576 22.5415 55.2653 22.5415C54.9588 22.5415 54.6591 22.521 54.3594 22.4937C54.2981 23.7445 54.1006 24.9543 53.7805 26.1094C54.2709 26.0683 54.7613 26 55.2653 26C55.9669 26 56.6548 26.0547 57.3359 26.1367C65.8841 27.1688 72.5387 34.4821 72.5387 43.3333H75.992C75.9988 34.3864 70.3318 26.7655 62.4171 23.8333Z"
                                            fill="#FA6541" />
                                        <path
                                            d="M20.7267 26C21.2307 26 21.7211 26.0615 22.2115 26.1094C21.8846 24.9474 21.6939 23.7376 21.6326 22.4937C21.3329 22.521 21.0332 22.5415 20.7267 22.5415C19.8344 22.5415 18.9762 22.4117 18.1588 22.1793C14.1674 21.0515 11.225 17.3743 11.225 13.0068C11.225 7.75079 15.4888 3.47213 20.7267 3.47213C22.8994 3.47213 24.8951 4.21714 26.4958 5.44742C27.4153 6.15825 28.2054 7.03312 28.8116 8.03102C29.7652 7.3817 30.7869 6.84175 31.8631 6.40431C31.25 5.37224 30.5076 4.42902 29.6494 3.602C27.3268 1.37382 24.1868 0 20.7267 0C13.5816 0 7.77164 5.83018 7.77164 13C7.77164 17.5179 10.0875 21.5026 13.5816 23.8333C5.66697 26.7655 0 34.3864 0 43.3333H3.45331C3.45331 34.4821 10.1079 27.1688 18.656 26.1367C19.3372 26.0547 20.0251 26 20.7267 26Z"
                                            fill="#FA6541" />
                                    </svg>
                                </div>

                                <h2 class="mt-4">{{ __('userpanel.share and earn.text 4') }}: </h2>

                                <h2 class="share__number-zero mt-4">0</h2>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="share__box share__box-balance  mt-5">

                                <div class="share__box-img">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M42.3984 18.624L45.5 4.66699C45.5 4.66699 38.2465 9.30263 35.4924 9.30263C32.4131 9.30263 28 4.66699 28 4.66699L31.1016 18.624C32.9209 17.8881 34.8109 17.5003 36.75 17.5003C38.6891 17.5003 40.5791 17.8881 42.3984 18.624Z"
                                            fill="#F28544" stroke="#365D96" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M63 65.3333C63 38.9157 51.2475 17.5 36.75 17.5C22.2525 17.5 10.5 38.9157 10.5 65.3333H63Z"
                                            fill="#F28544" stroke="#365D96" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M43.125 17.8805C43.125 17.8805 47.025 11.8486 52.0465 11.8486"
                                            stroke="#365D96" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M58.9437 14.3408C58.9437 14.3408 56.4143 19.3977 43.0508 18.0976"
                                            stroke="#365D96" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M39.668 39.667C39.668 37.734 38.101 36.167 36.168 36.167C34.235 36.167 32.668 37.734 32.668 39.667C32.668 41.6 34.235 43.167 36.168 43.167"
                                            stroke="#365D96" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M36.168 50.167V52.5003" stroke="#365D96" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M36.168 33.834V36.1673" stroke="#365D96" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M32.668 46.667C32.668 48.6 34.235 50.167 36.168 50.167C38.101 50.167 39.668 48.6 39.668 46.667C39.668 44.734 38.101 43.167 36.168 43.167"
                                            stroke="#365D96" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <h2 class="mt-4">{{ __('userpanel.share and earn.text 6') }}:</h2>

                                <h2 class="share__number-zero  mt-4">0</h2>


                            </div>
                        </div>

                        <div class="col-sm-6 col-12">
                            <div class=" share__box-candition  mt-5">
                                <div class="text-center">
                                    <div class="page__not page__not--1 justify-content-center">
                                        <div class="page__not-box share__candition-boxed  me-3">
                                            <img src="img/svg/Group (25).svg" style="width: 35%;" alt="">
                                        </div>

                                        <span class="share__candition-text">{{ __('userpanel.share and earn.text 7') }}</span>

                                    </div>
                                </div>
                                <div class="share__half-text">

                                    <div class="row">

                                        <div class="col-6 ">

                                            <div class="share__half-mean share__half-meaned ">
                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 8') }}</p>
                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="share__half-mean">

                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 9') }}</p>

                                            </div>



                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-12">
                            <div class=" share__box-candition  mt-5">
                                <div class="text-center">
                                    <div class="page__not page__not--1 justify-content-center">
                                        <div class="page__not-box share__candition-boxed  me-3">
                                            <img src="img/svg/Group (25).svg" style="width: 35%;" alt="">
                                        </div>

                                        <span class="share__candition-text">{{ __('userpanel.share and earn.text 7') }}</span>

                                    </div>
                                </div>
                                <div class="share__half-text">

                                    <div class="row">

                                        <div class="col-6 ">

                                            <div class="share__half-mean share__half-meaned ">
                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 8') }}</p>
                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="share__half-mean">

                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 9') }}</p>

                                            </div>



                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-12">
                            <div class=" share__box-candition  mt-5">
                                <div class="text-center">
                                    <div class="page__not page__not--1 justify-content-center">
                                        <div class="page__not-box share__candition-boxed  me-3">
                                            <img src="img/svg/Group (25).svg" style="width: 35%;" alt="">
                                        </div>

                                        <span class="share__candition-text">{{ __('userpanel.share and earn.text 7') }}</span>

                                    </div>
                                </div>
                                <div class="share__half-text">

                                    <div class="row">

                                        <div class="col-6 ">

                                            <div class="share__half-mean share__half-meaned ">
                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 8') }}</p>
                                            </div>

                                        </div>

                                        <div class="col-6">

                                            <div class="share__half-mean">

                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 9') }}</p>

                                            </div>



                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class=" share__box-candition  mt-5">
                                <div class="text-center">
                                    <div class="page__not page__not--1 justify-content-center">
                                        <div class="page__not-box share__candition-boxed  me-3">
                                            <img src="img/svg/Group (25).svg" style="width: 35%;" alt="">
                                        </div>

                                        <span class="share__candition-text">{{ __('userpanel.share and earn.text 7') }}</span>

                                    </div>
                                </div>
                                <div class="share__half-text">

                                    <div class="row">

                                        <div class="col-6 ">

                                            <div class="share__half-mean share__half-meaned ">
                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 8') }}</p>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="share__half-mean">
                                                <p class="share__half-mean-1">{{ __('userpanel.share and earn.text 9') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="share__box-candition  mt-5">
                                <p class="share__half-text">{{ __('userpanel.share and earn.text 17') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="share__box-candition mt-5">
                                <p class="share__half-text">{{ __('userpanel.share and earn.text 18') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="share__bottom-text">
                    <div class="share__box mt-5">
                        <div class="page__not page__not--1 justify-content-center">
                            <div class="page__not-box share__candition-boxed  me-3">
                                <img src="img/svg/Group (25).svg" style="width: 35%;" alt="">
                            </div>

                            <span class="share__candition-text">{{ __('userpanel.share and earn.text 19') }}</span>

                        </div>
                        <div>
                            <p class="share__bottom-sec mt-4">{{ __('userpanel.share and earn.text 20') }}</p>
                            <p class="share__bottom-sec mt-4">
                                {{ __('userpanel.share and earn.text 21') }} <br>
                                {{ __('userpanel.share and earn.text 22') }} <br>
                                {{ __('userpanel.share and earn.text 23') }} <br>
                                {{ __('userpanel.share and earn.text 24') }}
                            </p>
                            <p class="share__bottom-sec mt-4"> {{ __('userpanel.share and earn.text 25') }} <br>
                                {{ __('userpanel.share and earn.text 26') }}<br>
                                {{ __('userpanel.share and earn.text 27') }}<br>
                                {{ __('userpanel.share and earn.text 28') }}<br>
                                {{ __('userpanel.share and earn.text 29') }}<br>
                                {{ __('userpanel.share and earn.text 30') }}
                            </p>
                            <p class="share__bottom-sec mt-4">
                                {{ __('userpanel.share and earn.text 31') }}
                            </p>
                            <p class="share__bottom-sec mt-4">
                                {{ __('userpanel.share and earn.text 32') }}
                            </p>
                            <p class="share__bottom-sec mt-4">
                                {{ __('userpanel.share and earn.text 33') }}
                            </p>
                            <p class="share__bottom-sec mt-4">
                                {{ __('userpanel.share and earn.text 34') }}
                            </p>
                            <p class="share__bottom-sec mt-4">
                                {{ __('userpanel.share and earn.text 35') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
