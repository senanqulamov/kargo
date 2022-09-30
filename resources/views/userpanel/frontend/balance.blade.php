@extends('userpanel.layout.layout')

@section('content')
    <style>
        .approvel-td {
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .payments_table_div {
            background: white;
            padding: 20px;
        }

        .payments_table_div td {
            font-size: 15px;
        }

        .payments_table_div th {
            font-size: 15px;
        }

        #upload {
            cursor: pointer;
        }

        .form-control[readonly] {
            background-color: #D1E2FF !important;
            opacity: 1;
        }

        .row-hm {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .row-hm .col-4 {
            width: max-content;
        }
    </style>
    <section id="balance" class="balance">

        <div class="container" id="balance__container">
            <div class="container" id="balance__tabs">
                <div class="row">
                    <div class="col-4">

                        <button class="balance__box d-flex align-items-center ">
                            <div class="balance__box-img balance__box-img--1 ">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.0927734 16.0783V20.9094H20.8159V15.9512H18.9089V19.0024H1.99983V16.0783H0.0927734Z"
                                        fill="white" />
                                    <path
                                        d="M11.1561 17.0799L16.0754 9.62064L14.3679 9.62193C14.3614 1.05946 6.021 0 6.021 0C6.021 0 7.92753 2.67001 7.93286 9.62678L6.2253 9.62802L11.1561 17.0799Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="balance__box-text  ms-4">
                                <p>Bakiye yukle</p>
                            </div>

                        </button>

                    </div>

                    <div class="col-4">
                        <button class="balance__box d-flex align-items-center ">
                            <div class="balance__box-img balance__box-img--2 ">
                                <svg width="24" height="23" viewBox="0 0 24 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.6941 3.95818C18.6599 1.92401 15.9553 0.803711 13.0785 0.803711C12.7992 0.803711 12.5729 1.03006 12.5729 1.30928V4.03123C12.5729 4.31045 12.7992 4.5368 13.0785 4.5368C16.9587 4.5368 20.1154 7.69353 20.1154 11.5737C20.1154 15.4539 16.9587 18.6107 13.0785 18.6107C9.51948 18.6107 6.55183 15.9632 6.10096 12.4914H7.87816C7.87854 12.4914 7.87878 12.4915 7.87912 12.4914C8.15834 12.4914 8.38469 12.2651 8.38469 11.9859C8.38469 11.8469 8.3286 11.721 8.23779 11.6296L4.60995 7.5657C4.51399 7.45823 4.37681 7.39679 4.2328 7.39679C4.23198 7.39679 4.23116 7.39679 4.23039 7.39679C4.08551 7.39751 3.9479 7.4603 3.85242 7.56931L0.276826 11.6529C0.146148 11.8022 0.114803 12.0141 0.196753 12.1948C0.278704 12.3755 0.458783 12.4915 0.657208 12.4915H2.34774C2.56697 15.0926 3.71326 17.5056 5.60699 19.3304C7.62364 21.2736 10.277 22.3439 13.0784 22.3439C15.9553 22.3439 18.6599 21.2236 20.694 19.1894C22.7283 17.1552 23.8486 14.4506 23.8486 11.5738C23.8486 8.69697 22.7283 5.99236 20.6941 3.95818ZM13.0785 21.3328C7.8185 21.3328 3.53564 17.2184 3.32812 11.966C3.31738 11.6948 3.0944 11.4804 2.82293 11.4804H1.77187L4.23646 8.66572L6.74915 11.4804H5.54728C5.40847 11.4804 5.27577 11.5375 5.18034 11.6382C5.08485 11.739 5.03502 11.8746 5.04248 12.0131C5.27235 16.2797 8.8022 19.6219 13.0785 19.6219C17.5163 19.6219 21.1266 16.0115 21.1266 11.5738C21.1266 7.30583 17.7872 3.80319 13.5841 3.5414V1.8278C18.7313 2.09162 22.8375 6.3622 22.8375 11.5738C22.8375 16.9549 18.4596 21.3328 13.0785 21.3328Z"
                                        fill="white" />
                                    <path
                                        d="M12.4495 12.0341V15.8574H11.2297C10.9505 15.8574 10.7242 16.0838 10.7242 16.363C10.7242 16.6422 10.9505 16.8686 11.2297 16.8686H12.4495V17.4959C12.4495 17.7751 12.6758 18.0015 12.955 18.0015C13.2342 18.0015 13.4606 17.7751 13.4606 17.4959V16.8235C14.8195 16.5835 15.8552 15.395 15.8552 13.9682C15.8552 12.5416 14.8194 11.3531 13.4606 11.113V7.28961L14.5256 7.28956C14.8048 7.28956 15.0312 7.06321 15.0312 6.78399C15.0312 6.50477 14.8048 6.27842 14.5256 6.27842L13.4606 6.27847V5.65108C13.4606 5.37186 13.2342 5.14551 12.955 5.14551C12.6758 5.14551 12.4495 5.37186 12.4495 5.65108V6.32349C11.0905 6.56351 10.0547 7.75209 10.0547 9.17876C10.0547 10.6055 11.0905 11.7941 12.4495 12.0341ZM14.8441 13.9683C14.8441 14.8349 14.2574 15.5665 13.4606 15.7882V12.1484C14.2574 12.3701 14.8441 13.1017 14.8441 13.9683ZM12.4495 7.3589V10.9988C11.6525 10.7771 11.0658 10.0454 11.0658 9.17876C11.0658 8.31221 11.6525 7.58058 12.4495 7.3589Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="balance__box-text  ms-4">
                                <p>Yukleme kecmisi</p>
                            </div>

                        </button>

                    </div>

                    <div class="col-4">
                        <button class="balance__box d-flex align-items-center ">
                            <div class="balance__box-img balance__box-img--3 ">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.8278 16.1786C19.161 14.48 19.8932 12.3872 19.9096 10.228C19.926 8.06875 19.2257 5.96506 17.9184 4.24646C16.954 2.97763 15.6934 1.96435 14.2469 1.29521C12.8004 0.626071 11.212 0.321437 9.6206 0.407939C8.02918 0.494441 6.48318 0.969446 5.11773 1.79143C3.75229 2.61341 2.60898 3.75735 1.78774 5.12325V1.78755H0.393799V6.66634L1.09077 7.36331H5.96956V5.96937H2.91822C3.84942 4.35953 5.28998 3.10544 7.01275 2.40485C8.73551 1.70427 10.6425 1.59705 12.4329 2.1001C14.2233 2.60316 15.7954 3.68786 16.9012 5.18317C18.007 6.67849 18.5836 8.49933 18.5401 10.3586C18.4966 12.2178 17.8354 14.0097 16.6609 15.4517C15.4864 16.8937 13.8653 17.9036 12.0533 18.3224C10.2413 18.7412 8.34149 18.5449 6.65338 17.7645C4.96527 16.9841 3.58493 15.664 2.73004 14.0124L1.49362 14.6564C2.24652 16.1046 3.35068 17.3408 4.705 18.2518C6.05932 19.1628 7.62053 19.7195 9.24569 19.8709C10.8709 20.0224 12.5081 19.7637 14.0074 19.1187C15.5067 18.4736 16.8203 17.4627 17.8278 16.1786ZM13.1428 14.8265L14.1297 13.8409L10.1514 9.86125V4.57543H8.75744V10.1512L8.96095 10.6446L13.1428 14.8265Z"
                                        fill="white" />
                                </svg>
                            </div>
                            <div class="balance__box-text  ms-4">
                                <p>Para iadesi</p>
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
                                    <h6 class="balance__download-text--2 kur-show-text">Euro Selling Rate : </h6>
                                </div>
                            </div>

                            <div class="balance__download-info mt-5">
                                <div class="row-hm">
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
                                    {{-- <div class="col-4">
                                        <button type="button" class="balance__download-buttons">
                                            <div class="btn btn-light me-2"><i class="far fa-plus plus"></i><i
                                                    class="far fa-minus minus hide"></i></div>
                                            <span>Online odeme </span>
                                        </button>
                                    </div> --}}
                                </div>
                            </div>




                        </div>

                    </div>

                    <div class="balance__account customer__info-1 close open">

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

                        {{-- <div class="balance__line ">

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

                        </div> --}}

                        <div class="balance__customer-num mt-4">
                            <h4>Müşteri Numaranız: EB1Z</h4>
                        </div>



                        <div class="balance__cards mt-5">
                            <div class="container">
                                <div class="row" style="gap: 20px 0px;">

                                    @foreach ($comissions as $comission)
                                        <label for="payment_{{ $comission->id }}" class="col-sm-4">

                                            <div class="balance__cards-box {{ $comission->css_class }}">
                                                <div class="form-check form-check-inline  mt-4">
                                                    <input class="form-check-input payment-radio" type="radio"
                                                        name="payment" id="payment_{{ $comission->id }}"
                                                        value="{{ $comission->payment }}">

                                                </div>

                                                <div class="balance__card-imgs">
                                                    <img src="{{ asset('/') }}images/{{ $comission->image }}"
                                                        style="width:25%;" alt="">
                                                </div>

                                                <div class="balance__card-text">
                                                    <h4 class="mb-4">{{ $comission->show_name }}</h4>
                                                </div>

                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <!--<div class="balance__label row mt-5">-->
                        <!--    <div class="col-4">-->

                        <!--        <div class="balance__load">-->
                        <!--            <h4>Yuklenen tutar</h4>-->
                        <!--        </div>-->

                        <!--    </div>-->
                        <!--    <div class="col-4">-->

                        <!--        <div class="balance__load">-->
                        <!--            <h4>Para birimi</h4>-->
                        <!--        </div>-->


                        <!--    </div>-->

                        <!--    <div class="col-4">-->

                        <!--        <div class="balance__load">-->
                        <!--            <h4>Komission Hesablamar</h4>-->
                        <!--        </div>-->


                        <!--    </div>-->

                        <!--</div>-->
                        <div class="balance__input newRow row ">
                            <div class="col">
                                <div class="balance__input-file">
                                    <div style="display:flex;" class="User_id_box">
                                        <label> Name/ID
                                            <a class="btn btn-info ttp" data-ttp="User ID">
                                                010{{ Auth::user()->id }}20
                                            </a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="balance__input-file">
                                    <div style="display:flex;">
                                        <label>Yüklenilen tutar

                                            <input type="text" class="form-control" placeholder="Örn:400"
                                                name="balance" id="balance_input" onchange="checkComission()" required>
                                        </label>
                                    </div>
                                    <input type="text" name="kur" hidden>
                                </div>
                            </div>
                            <div class="col">
                                <div class="balance__input-file">
                                    <label>Para birimi

                                        <select class="form-select" aria-label="Default select example" name="money_type"
                                            id="money_type" onchange="checkComission()">
                                            <option selected value="tl">Turk lirasi</option>
                                            <option value="euro">Euro</option>
                                            {{-- <option value="usd">USD</option> --}}
                                        </select>
                                    </label>
                                </div>




                            </div>
                            <div class="col">
                                <div class="balance__input-file">
                                    <label>Komisyon (%)
                                        <input type="text" class="form-control" name="comission" readonly>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="balance__input-file">
                                    <label>Hesaba oturacak mikdar
                                        <input type="text" class="form-control" name="result_price" readonly>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="balance__selectFiles">
                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- <form action="" class="form__file"> --}}
                                    <p class="input__above-text">(PDF, Maks. 5.0. MB)</p>
                                    <input type="file" name="document" id="upload"></input>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                        <br>



                        <div class="balance__textArea">
                            <div class="container">
                                <p>Aciklama</p>

                                <div class="form-floating mt-3 mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="payment_comment" id="floatingTextarea2"
                                        style="height: 126px"></textarea>
                                    <label for="floatingTextarea2">Orn: Not</label>
                                </div>

                                <div class="balance__textArea-btn">
                                    <button class="btn btn-danger">Submit</button>
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
                                    <p class="balance__box-rate-p">Bakiyeniz <span>{{ Auth::user()->balance }}</span>€
                                    </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <h6 class="balance__download-text--2 kur-show-text">Euro Selling Rate : </h6>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment History</h3>
                    </div>
                    <div class="payments_table_div card-body">
                        <table id="payment_history" class="table table-bordered table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Created at</th>
                                    <th>Approval status</th>
                                    <th>Deny Message</th>
                                    <th>Method</th>
                                    <th>Money Type</th>
                                    <th>Amount</th>
                                    <th>Comission</th>
                                    <th>Result value</th>
                                    <th>Kur</th>
                                    <th>Document</th>
                                    <th>Payment Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->created_at }}</td>
                                        <td>
                                            <div class="approvel-td">
                                                @if ($payment->payment_status == '0')
                                                    <span class="badge rounded-pill bg-warning">Pending</span>
                                                @elseif ($payment->payment_status == '1')
                                                    <span class="badge rounded-pill bg-danger">Denied</span>
                                                @else
                                                    <span class="badge rounded-pill bg-success">Approved</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            {{ $payment->deny_message }}
                                        </td>
                                        @php
                                            $comission = DB::table('comissions')
                                                ->where('payment', $payment->method)
                                                ->get()
                                                ->first();
                                        @endphp
                                        <td style="background: rgb(199, 150, 150);">
                                            @if ($comission)
                                                <div class="payment_logo_div">
                                                    <img src="{{ asset('/') }}images/{{ $comission->image }}"
                                                        style="width:35%;" alt="">
                                                    <p>{{ $comission->show_name }}</p>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="money-td money-td-{{ $payment->money_type }}">
                                            {{ $payment->money_type }}
                                        </td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->comission }} %</td>
                                        <td>{{ $payment->result_price }} €</td>
                                        <td>{{ $payment->kur }}</td>
                                        <td>
                                            <div class="approvel-td">
                                                <a href="/files/payments/{{ $payment->document }}" target="_blank">
                                                    <button class="btn btn-info" type="button"><i
                                                            class="fa-solid fa-eye"></i></button>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $payment->payment_comment ? $payment->payment_comment : '---' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Money transactions History</h3>
                    </div>
                    <div class="payments_table_div card-body">
                        <table id="transaction_history" class="table table-bordered table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Transfer method</th>
                                    <th>Old Balance</th>
                                    <th>New Balance</th>
                                    <th>Payment ID</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>
                                            <div style="display: flex;justify-content:center">
                                                @if ($transaction->transfer_method == 'Payment Deny' || $transaction->transfer_method == 'Cargo payment returned for cancel')
                                                    <span class="badge rounded-pill bg-warning">
                                                        {{ $transaction->transfer_method }}
                                                    </span>
                                                @else
                                                    <span class="badge rounded-pill bg-info">
                                                        {{ $transaction->transfer_method }}
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $transaction->old_balance }} €</td>
                                        <td>{{ $transaction->new_balance }} €</td>
                                        <td>{{ $transaction->payment_id }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </section>



            <section id="balance__download-btn-3">

                <div class="balance__download  mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="balance__download-text--1">Para iadesi</h6>
                            </div>
                            <div class="col-4">
                                <div class="balance__box-rate">
                                    <p class="balance__box-rate-p">Bakiyeniz <span>{{ Auth::user()->balance }}</span>€
                                    </p>
                                </div>
                            </div>
                            <div class="col-4">
                                <h6 class="balance__download-text--2 kur-show-text">Euro Selling Rate : </h6>
                            </div>
                        </div>








                    </div>

                </div>

                <div class="balance__address">
                    <div class="container">
                        <div class="balance__iban">
                            <form action="{{ route('userpanel.updateUserBalanceInfo') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="balance__iban-input  balance__iban-input--1">
                                            <h6>Hesab Sahibinin adi ve nomresi</h6>
                                            <input type="text" name="balance_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="balance__iban-input  balance__iban-input--1">
                                            <h6>Iban nomresi</h6>
                                            <input type="text" name="Iban" placeholder="enter your IBAN number">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="balance__address-save">
                                            <button type="submit" class="balance__address-save--btn">Kaydet</button>

                                            <div class="balance__address-refund">
                                                <a type="button" class="btn btn-primary ttp ttp-right f-s-1-6"
                                                    data-ttp="Request money refund at support page"
                                                    href="{{ route('userpanel.support') }}">
                                                    Request refund
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </section>


    <script src="{{ asset('/') }}frontend/userpanel/js/tabttn.js"></script>
    <script src="{{ asset('/') }}frontend/userpanel/js/customer.js"></script>

    <script>
        var kur = 0;

        // $(document).ready(function() {});

        var rad = document.querySelectorAll('.payment-radio');

        for (var i = 0; i < rad.length; i++) {
            rad[i].addEventListener('change', function() {

                checkComission(this.value);
            });
        }

        function checkComission(changed_method) {

            $.ajax({
                type: 'GET',
                url: '{{ route('userpanel.getKur') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    let timerInterval
                    Swal.fire({
                        position: 'bottom-right',
                        title: 'Loading Euro selling rate',
                        backdrop: false,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                complete: function() {
                    Swal.hideLoading();
                },
                success: function(data) {
                    Swal.close();

                    Swal.fire({
                        position: 'bottom-right',
                        title: 'Euro selling rate loaded succesfully',
                        backdrop: false,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 2000
                    });

                    console.log(data);
                    if (data[0] > 0) {
                        kur = data[0];
                    }
                    var kur_texts = document.querySelectorAll('.kur-show-text');
                    kur_texts.forEach(element => {
                        element.innerHTML = "Euro Selling Rate : " + kur;
                    });
                    document.querySelector('input[name="kur"]').value = kur;
                    console.log(document.querySelector('input[name="kur"]').value);
                },
                error: function(error) {
                    Swal.fire({
                        position: 'bottom-right',
                        icon: 'error',
                        title: 'Couldnt load Euro selling rate',
                        backdrop: true,
                        confirmButton: false,
                        html: `
                            <button class="btn btn-info" onclick="window.reload()">Reload Page</button>
                        `
                    });
                }
            });

            var balance = parseFloat(document.querySelector("#balance_input").value);
            var money_type = document.querySelector("#money_type").value;

            if (money_type == "tl") {
                balance = parseFloat(balance / kur).toFixed(2);
            }

            if (changed_method) {
                var method = changed_method;
            } else {
                var method = $("input[type=radio][name=payment]:checked").val();
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('userpanel.checkcomission') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    method: method,
                    balance: balance
                },
                success: function(data) {
                    console.log(data);
                    document.querySelector("input[name=comission]").value = parseFloat(data.comission);
                    document.querySelector("input[name=result_price]").value = parseFloat(data.result_price)
                        .toFixed(
                            2);
                }
            });
        }
    </script>
@endsection
