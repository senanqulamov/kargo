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
        .approvel-td {
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
    <section id="balance" class="balance">

        <div class="container" id="balance__container">
            <div class="container" id="balance__tabs">
                <div class="row">
                    <div class="col-4">

                        <button class="balance__box d-flex align-items-center ">
                            <div class="balance__box-img balance__box-img--1 ">
                                <img src="img/svg/Group (10).svg" alt="">
                            </div>
                            <div class="balance__box-text  ms-4">
                                <p>Bakiye yukle</p>
                            </div>

                        </button>

                    </div>

                    <div class="col-4">
                        <button class="balance__box d-flex align-items-center ">
                            <div class="balance__box-img balance__box-img--2 ">
                                <img src="img/svg/Group (11).svg" alt="">
                            </div>
                            <div class="balance__box-text  ms-4">
                                <p>Yukleme kecmisi</p>
                            </div>

                        </button>

                    </div>

                    <div class="col-4">
                        <button class="balance__box d-flex align-items-center ">
                            <div class="balance__box-img balance__box-img--3 ">
                                <img src="img/svg/Vector (18).svg" alt="">
                            </div>
                            <div class="balance__box-text  ms-4">
                                <p>Yukleme kecmisi</p>
                            </div>

                        </button>
                    </div>


                </div>
            </div>


            <form action="{{ route('userpanel.update_balance') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <section id="balance__download-btn-1">

                    <div class="balance__download mt-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="balance__download-text--1">Bakiye yukle</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="balance__download-text--2">Euro Selling Rate 15.54</h6>
                                </div>
                            </div>

                            <div class="balance__download-info mt-5">
                                <div class="row balance__download-info-row">
                                    <div class="col-4">
                                        <button type="button" class="balance__download-buttons">
                                            <div class="btn btn-light"><i class="far fa-plus plus"></i><i
                                                    class="far fa-minus minus hide"></i></div>
                                            <span>Banka hesab bilgileri </span>

                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="balance__download-buttons">
                                            <div class="btn btn-light"><i class="far fa-plus plus"></i><i
                                                    class="far fa-minus minus hide"></i></div>
                                            <span>Balans hesabina odeme </sp>
                                        </button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="balance__download-buttons">
                                            <div class="btn btn-light me-2"><i class="far fa-plus plus"></i><i
                                                    class="far fa-minus minus hide"></i></div>
                                            <span>Online odeme </span>
                                        </button>
                                    </div>
                                </div>
                            </div>




                        </div>

                    </div>

                    <div class="balance__account customer__info-1 close ">

                        <div class="balance__transfer mt-5">
                            <p>Bank hesabina odeme</p>
                        </div>
                        <div class="balance__rate mt-5">
                            <p>Kur farklılıklarından etkilenmemek için lütfen ödeme yaptığınız vakitte dekont
                                yükleyiniz.</p>
                        </div>

                        <div class='balance__customer-data'>

                            <div class="balance__customer-data--card">
                                <p>SHIP LOUNGE LOJİSTİK VE YAZILIM SİSTEMLERİ SAN. TİC. LTD. ŞT. - İş Bankası
                                </p>
                                <p>Türk Lirası Hesabı: TR880006400000114420078614 </p>
                                <p>Amerikan Doları Hesabı: TR230006400000214420034771</p>
                            </div>

                        </div>




                    </div>

                    <div class="balance__account  customer__info-2 close ">

                        <div class="balance__transfer mt-5">
                            <p>Bank hesabina odeme</p>
                        </div>
                        <div class="balance__rate mt-5">
                            <p>Kur farklılıklarından etkilenmemek için lütfen ödeme yaptığınız vakitte dekont
                                yükleyiniz.</p>
                        </div>

                        <div class="balance__line ">

                            <ol class="steps">
                                <li class=" step is-active" data-step="1">
                                    <span class="payment__list">Odeme Karti</span>
                                </li>
                                <li class="text step" data-step="2">
                                    <span class="payment__list">Odeme detaylari</span>
                                </li>
                                <li class="text step" data-step="3">
                                    <span class="payment__list"> Odeme tamamla</span>
                                </li>
                            </ol>

                        </div>

                        <div class="balance__customer-num mt-4">
                            <h4>Müşteri Numaranız: EB1Z</h4>
                        </div>



                        <div class="balance__cards mt-5">
                            <div class="container">
                                <div class="row">

                                    <div class="col-sm-4">

                                        <div class="balance__cards-box balance__cards-box--1">
                                            <div class="form-check form-check-inline  mt-4">
                                                <input class="form-check-input payment-radio" type="radio" name="payment"
                                                    id="payment1" value="banka_hevale">

                                            </div>

                                            <div class="balance__card-imgs">
                                                <img src="img/svg/Group (13).svg" style=" width:25%;" alt="">
                                            </div>

                                            <div class="balance__card-text">
                                                <h4 class="mt-5">BANKA HEVALE / EFT</h4>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div class="balance__cards-box balance__cards-box--2">
                                            <div class="form-check form-check-inline  mt-4">
                                                <input class="form-check-input payment-radio" type="radio" name="payment"
                                                    id="payment2" value="paypal">

                                            </div>

                                            <div class="balance__card-imgs">
                                                <img src="img/svg/paypal-svgrepo-com 1.svg" style=" width:26%;"
                                                    alt="">
                                            </div>

                                            <div class="balance__card-text">
                                                <h4 class="mb-4">Pay Pal</h4>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div class="balance__cards-box balance__cards-box--3">
                                            <div class="form-check form-check-inline mt-4">
                                                <input class="form-check-input payment-radio" type="radio"
                                                    name="payment" id="payment3" value="payoneer">

                                            </div>

                                            <div class="balance__card-imgs">
                                                <img src="img/svg/Vector (19).svg" style=" width:25%;" alt="">
                                            </div>

                                            <div class="balance__card-text">
                                                <h4 class="mt-4">PAYONEER</h4>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="balance__label row mt-5">
                            <div class="col-4">

                                <div class="balance__load">
                                    <h4>Yuklenen tutar</h4>
                                </div>

                            </div>
                            <div class="col-4">

                                <div class="balance__load">
                                    <h4>Para birimi</h4>
                                </div>


                            </div>
                            <div class="col-4">

                                <div class="balance__load">
                                    <h4>Komission Hesablamar</h4>
                                </div>


                            </div>

                        </div>
                        <div class="balance__input  row ">
                            <div class="col-sm-4">

                                <div class="balance__input-file">
                                    <input type="text" class="form-control" name="balance" id="balance_input"
                                        onchange="checkComission()">
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="balance__input-file">
                                    <select class="form-select" aria-label="Default select example" name="money_type">
                                        <option selected value="tl">Turk lirasi</option>
                                        <option value="euro">Euro</option>
                                        <option value="usd">USD</option>
                                    </select>
                                </div>




                            </div>
                            <div class="col-sm-4">

                                <div class="balance__input-file">
                                    <input type="text" class="form-control" name="comission" readonly>
                                </div>


                            </div>

                        </div>


                        <div class="balance__selectFiles">

                            <fieldset>
                                <input type="file" name="document" id="upload" class="custom-file-input">
                            </fieldset>

                        </div>



                        <div class="balance__textArea">
                            <div class="container">
                                <p>Aciklama</p>

                                <div class="form-floating mt-3 mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="payment_comment" id="floatingTextarea2"
                                        style="height: 126px"></textarea>
                                    <label for="floatingTextarea2">Orn: Not</label>
                                </div>

                                <div class="balance__textArea-btn">
                                    <button class="btn btn-danger">İlərlə</button>
                                </div>

                            </div>

                        </div>


                    </div>
                </section>
            </form>


            <section id="balance__download-btn-2">

                <div class="balance__download  mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="balance__download-text--1">Yukleme kecmisi</h6>
                            </div>
                            <div class="col-4">
                                <div class="balance__box-rate">
                                    <p class="balance__box-rate-p">Bakiyeniz <span>{{ Auth::user()->balance }}</span>€ </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <h6 class="balance__download-text--2">Euro Selling Rate 15.54</h6>
                            </div>
                        </div>








                    </div>

                </div>

                <div class="table__datas">
                    <table id="example" class="table table-striped table-bordered mt-4" style="width:100%">
                        <thead>
                            <tr>
                                <th class='th'>ID</th>
                                <th class='th'>Approval status</th>
                                <th class='th'>Method</th>
                                <th class='th'>Money Type</th>
                                <th class='th'>Amount</th>
                                <th class='th'>Comission</th>
                                <th class='th'>Document</th>
                                <th class='th'>Payment Comment</th>
                                <th class='th'>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td class="td">{{ $payment->id }}</td>
                                    <td class="approvel-td">
                                        @if ($payment->payment_status == '0')
                                            <button class="btn btn-warning">Pending</button>
                                        @elseif ($payment->payment_status == '1')
                                            <button class="btn btn-danger">Denied</button>
                                            <br>
                                            Deny Message : <b>{{ $payment->deny_message }}</b>
                                        @else
                                            <button class="btn btn-success">Approved</button>
                                        @endif
                                    </td>
                                    <td class="td">{{ $payment->method }}</td>
                                    <td class="td">{{ $payment->money_type }}</td>
                                    <td class="td">{{ $payment->amount }}</td>
                                    <td class="td">{{ $payment->comission }}</td>
                                    <td class="td">
                                        <a href="/files/payments/{{ $payment->document }}" target="_blank">
                                            <button class="btn status" type="button"><i class="fa-solid fa-eye"></i></button>
                                            {{-- <img src="/files/payments/{{ $payment->document }}" class="img-fluid"
                                                width="60" height="60" alt=""> --}}
                                        </a>
                                    </td>
                                    <td class="td">{{ $payment->payment_comment }}</td>
                                    <td class="td">{{ $payment->created_at }}</td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td class='td'>12131515</td>
                                <td class='td'>125</td>
                                <td class='td text-center'> <button class="btn income">Income</button>
                                </td>
                                <td class='td'>Card</td>
                                <td class='td'>Lorem ipsum</td>
                                <td class='td text-center'> <button class="btn status">Income </button>
                                </td>

                            </tr> --}}
                        </tbody>

                    </table>

                </div>



            </section>


            <section id="balance__download-btn-3">

                <div class="balance__download  mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="balance__download-text--1">Yukleme kecmisi</h6>
                            </div>
                            <div class="col-4">
                                <div class="balance__box-rate">
                                    <p class="balance__box-rate-p">Bakiyeniz <span>{{ Auth::user()->balance }}</span>€ </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <h6 class="balance__download-text--2">Euro Selling Rate 15.54</h6>
                            </div>
                        </div>








                    </div>

                </div>

                <div class="balance__address">
                    <div class="container">
                        <div class="balance__iban">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="balance__iban-input  balance__iban-input--1">
                                        <h6>Hesab Sahibinin adi ve nomresi</h6>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="balance__iban-input  balance__iban-input--1">
                                        <h6>Iban nomresi</h6>
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="balance__address-save">
                                        <button class="balance__address-save--btn">Kaydet</button>

                                        <div class="balance__address-refund">
                                            <button class="balance__address-refund--btn">Para Iade telebi
                                                olusdur</button>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </section>







        </div>
    </section>

    <script>
        var rad = document.querySelectorAll('.payment-radio');

        for (var i = 0; i < rad.length; i++) {
            rad[i].addEventListener('change', function() {
                console.log(this.value)

                checkComission(this.value);
            });
        }

        function checkComission(changed_method) {
            var balance = parseInt(document.querySelector("#balance_input").value);
            if (changed_method) {
                var method = changed_method;
            } else {
                var method = $("input[type=radio][name=payment]:checked").val();
            }

            $.ajax({
                type: 'POST',
                url: '/userpanel/check-comission',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    method: method,
                    balance: balance
                },
                success: function(data) {
                    document.querySelector("input[name=comission]").value = data.comission;
                }
            });
        }
    </script>
@endsection
