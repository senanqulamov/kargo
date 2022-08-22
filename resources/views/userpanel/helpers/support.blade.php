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

    <section id="courier" class="courier">

        <div class="container" id="balance__container">
            <div class="container" id="balance__tabs">
                <div class="row">
                    <div class="col-4">
                        <button class="balance__box btn-back d-flex align-items-center" onclick="changeTab(this)"
                            data-name="requests">
                            <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23 46C10.318 46 0 35.682 0 23C0 10.318 10.318 0 23 0C35.682 0 46 10.318 46 23C46 35.682 35.682 46 23 46Z"
                                    fill="#00D2FF" />
                                <path
                                    d="M29.8864 12.1364H29.3183C29.0041 12.1364 28.7501 12.3909 28.7501 12.7045C28.7501 13.0182 29.0041 13.2727 29.3183 13.2727H29.8864C30.2 13.2727 30.4546 13.5278 30.4546 13.8409V29.75C30.4546 30.0631 30.2 30.3182 29.8864 30.3182H15.1137C14.8 30.3182 14.5455 30.063 14.5455 29.75V13.8409C14.5455 13.5278 14.8 13.2728 15.1137 13.2728H17.3864V13.9989C17.0483 14.196 16.8182 14.5585 16.8182 14.9773C16.8182 15.604 17.3279 16.1137 17.9546 16.1137C18.5813 16.1137 19.091 15.604 19.091 14.9773C19.091 14.5585 18.8608 14.196 18.5228 13.9989V11.5682C18.5228 11.2545 18.2688 11 17.9546 11C17.6404 11 17.3864 11.2545 17.3864 11.5682V12.1363H15.1137C14.1739 12.1363 13.4092 12.9011 13.4092 13.8409V29.75V34.2955C13.4092 35.2353 14.174 36 15.1137 36H29.8864C30.8262 36 31.591 35.2352 31.591 34.2955V29.75V13.8409C31.591 12.9011 30.8262 12.1364 29.8864 12.1364ZM30.4546 34.2955C30.4546 34.6085 30.2 34.8636 29.8864 34.8636H15.1137C14.8 34.8636 14.5455 34.6085 14.5455 34.2955V33.6228C14.7239 33.6864 14.9137 33.7273 15.1137 33.7273H29.8864C30.0864 33.7273 30.2762 33.6864 30.4545 33.6228V34.2955H30.4546ZM30.4546 32.0227C30.4546 32.3358 30.2 32.5909 29.8864 32.5909H15.1137C14.8 32.5909 14.5455 32.3357 14.5455 32.0227V31.35C14.7239 31.4136 14.9137 31.4545 15.1137 31.4545H29.8864C30.0864 31.4545 30.2762 31.4136 30.4545 31.35V32.0227H30.4546Z"
                                    fill="white" />
                                <path
                                    d="M27.6141 13.9989V11.5682C27.6141 11.2545 27.3602 11 27.0459 11C26.7317 11 26.4778 11.2545 26.4778 11.5682V12.1363H24.7732C24.459 12.1363 24.2051 12.3909 24.2051 12.7045C24.2051 13.0181 24.459 13.2727 24.7732 13.2727H26.4778V13.9988C26.1397 14.1959 25.9096 14.5584 25.9096 14.9772C25.9096 15.6039 26.4193 16.1136 27.046 16.1136C27.6727 16.1136 28.1824 15.6039 28.1824 14.9772C28.1823 14.5585 27.9522 14.196 27.6141 13.9989Z"
                                    fill="white" />
                                <path
                                    d="M23.0682 13.9989V11.5682C23.0682 11.2545 22.8143 11 22.5 11C22.1858 11 21.9319 11.2545 21.9319 11.5682V12.1363H20.2273C19.9131 12.1363 19.6592 12.3909 19.6592 12.7045C19.6592 13.0181 19.9131 13.2727 20.2273 13.2727H21.9319V13.9988C21.5938 14.1959 21.3637 14.5584 21.3637 14.9772C21.3637 15.6039 21.8734 16.1136 22.5001 16.1136C23.1268 16.1136 23.6365 15.6039 23.6365 14.9772C23.6364 14.5585 23.4063 14.196 23.0682 13.9989Z"
                                    fill="white" />
                                <path
                                    d="M22.5 18.9541H16.8182C16.504 18.9541 16.25 19.2086 16.25 19.5223C16.25 19.8359 16.504 20.0904 16.8182 20.0904H22.5C22.8142 20.0904 23.0682 19.8359 23.0682 19.5223C23.0682 19.2086 22.8142 18.9541 22.5 18.9541Z"
                                    fill="white" />
                                <path
                                    d="M26.4777 21.2275H21.3641C21.0499 21.2275 20.7959 21.4821 20.7959 21.7957C20.7959 22.1093 21.0499 22.3639 21.3641 22.3639H26.4777C26.7919 22.3639 27.0458 22.1093 27.0458 21.7957C27.0459 21.4821 26.7919 21.2275 26.4777 21.2275Z"
                                    fill="white" />
                                <path
                                    d="M24.7727 25.7725H16.8182C16.504 25.7725 16.25 26.027 16.25 26.3406C16.25 26.6542 16.504 26.9088 16.8182 26.9088H24.7727C25.0869 26.9088 25.3409 26.6542 25.3409 26.3406C25.3409 26.027 25.0869 25.7725 24.7727 25.7725Z"
                                    fill="white" />
                                <path
                                    d="M28.1823 18.9541H24.7732C24.459 18.9541 24.2051 19.2086 24.2051 19.5223C24.2051 19.8359 24.459 20.0904 24.7732 20.0904H28.1823C28.4965 20.0904 28.7505 19.8359 28.7505 19.5223C28.7505 19.2086 28.4965 18.9541 28.1823 18.9541Z"
                                    fill="white" />
                                <path
                                    d="M21.9318 23.5H16.8182C16.504 23.5 16.25 23.7545 16.25 24.0682C16.25 24.3818 16.504 24.6363 16.8182 24.6363H21.9318C22.246 24.6363 22.5 24.3818 22.5 24.0682C22.5 23.7545 22.246 23.5 21.9318 23.5Z"
                                    fill="white" />
                                <path
                                    d="M19.0909 21.2275H16.8182C16.504 21.2275 16.25 21.4821 16.25 21.7957C16.25 22.1093 16.504 22.3639 16.8182 22.3639H19.0909C19.4051 22.3639 19.659 22.1093 19.659 21.7957C19.659 21.4821 19.4051 21.2275 19.0909 21.2275Z"
                                    fill="white" />
                                <path
                                    d="M28.1822 23.5H24.2049C23.8907 23.5 23.6367 23.7545 23.6367 24.0682C23.6367 24.3818 23.8907 24.6363 24.2049 24.6363H28.1822C28.4964 24.6363 28.7503 24.3818 28.7503 24.0682C28.7503 23.7545 28.4964 23.5 28.1822 23.5Z"
                                    fill="white" />
                            </svg>
                            <div class="balance__box-text ms-1">
                                <p class="ms-3">Support Demand</p>
                            </div>
                        </button>
                    </div>
                    <div class="col-4">
                        <button class="balance__box d-flex align-items-center" onclick="changeTab(this)" data-name="demand">
                            <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="23.008" cy="23.008" r="23"
                                    transform="rotate(-90.019 23.008 23.008)" fill="url(#paint0_linear_3193_3)" />
                                <path
                                    d="M27.5 27.5V32H15.5V14H23V12.5H15.5C15.1022 12.5 14.7206 12.658 14.4393 12.9393C14.158 13.2206 14 13.6022 14 14V32C14 32.3978 14.158 32.7794 14.4393 33.0607C14.7206 33.342 15.1022 33.5 15.5 33.5H27.5C27.8978 33.5 28.2794 33.342 28.5607 33.0607C28.842 32.7794 29 32.3978 29 32V27.5H27.5Z"
                                    fill="white" />
                                <path
                                    d="M33.155 15.32L30.68 12.845C30.4557 12.6251 30.1541 12.502 29.84 12.502C29.5259 12.502 29.2243 12.6251 29 12.845L18.5 23.345V27.5H22.6475L33.1475 17C33.3674 16.7757 33.4905 16.4741 33.4905 16.16C33.4905 15.8459 33.3674 15.5443 33.1475 15.32H33.155ZM22.025 26H20V23.975L27.08 16.8875L29.1125 18.92L22.025 26ZM30.17 17.8625L28.1375 15.83L29.84 14.1275L31.8725 16.16L30.17 17.8625Z"
                                    fill="white" />
                                <defs>
                                    <linearGradient id="paint0_linear_3193_3" x1="23.008" y1="0.00800896" x2="23.008"
                                        y2="46.008" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#F26D82" />
                                        <stop offset="1" stop-color="#EA7F6A" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            <div class="balance__box-text ms-1">
                                <p class="ms-3">Create Support Demand</p>
                            </div>
                        </button>
                    </div>
                    <div class="col-4">
                        <button class="balance__box d-flex align-items-center" onclick="changeTab(this)"
                            data-name="history">
                            <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="23" cy="23" r="23" transform="rotate(-90 23 23)"
                                    fill="url(#paint0_linear_3193_4)" />
                                <g clip-path="url(#clip0_3193_4)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M30.6723 29.0233C32.0055 27.3248 32.7377 25.2319 32.7541 23.0727C32.7705 20.9135 32.0702 18.8098 30.7629 17.0912C29.7984 15.8224 28.5379 14.8091 27.0914 14.1399C25.6449 13.4708 24.0565 13.1662 22.4651 13.2527C20.8737 13.3392 19.3277 13.8142 17.9622 14.6362C16.5968 15.4581 15.4535 16.6021 14.6322 17.968V14.6323H13.2383V19.5111L13.9353 20.208H18.814V18.8141H15.7627C16.6939 17.2043 18.1345 15.9502 19.8572 15.2496C21.58 14.549 23.4869 14.4418 25.2774 14.9448C27.0678 15.4479 28.6399 16.5326 29.7457 18.0279C30.8514 19.5232 31.4281 21.3441 31.3846 23.2033C31.3411 25.0626 30.6799 26.8545 29.5054 28.2964C28.3309 29.7384 26.7098 30.7484 24.8978 31.1671C23.0858 31.5859 21.186 31.3896 19.4979 30.6092C17.8097 29.8288 16.4294 28.5088 15.5745 26.8571L14.3381 27.5011C15.091 28.9493 16.1952 30.1855 17.5495 31.0965C18.9038 32.0075 20.465 32.5642 22.0902 32.7156C23.7153 32.8671 25.3525 32.6084 26.8519 31.9634C28.3512 31.3183 29.6648 30.3074 30.6723 29.0233ZM25.9873 27.6712L26.9742 26.6857L22.9959 22.706V17.4202H21.6019V22.9959L21.8054 23.4894L25.9873 27.6712Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_3193_4" x1="23" y1="0" x2="23"
                                        y2="46" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.0729167" stop-color="#FFE37A" />
                                        <stop offset="1" stop-color="#F1B783" />
                                    </linearGradient>
                                    <clipPath id="clip0_3193_4">
                                        <rect width="23.697" height="23.697" fill="white"
                                            transform="translate(11.0078 34.7051) rotate(-90.019)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <div class="balance__box-text ms-1">
                                <p class="ms-3">System Messages</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="tab-sections">
                <!--table section-->
                <section class="courier__page tab-col requests-hm active-tab-hm">
                    <div class="courier__input courier__table-box--1">
                        <div class="page__not page__not--1">
                            <div class="demand__box   me-3">

                            </div>
                            <h2 class="demand__h2">Support Demand</h2>
                        </div>
                        <div class="courier--table-1">
                            <div class="courier__table--1 mt-4">
                                <table id="example1" class="table table-bordered table-striped" style="with:100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>status</th>
                                            <th>Orders</th>
                                            <th>Cause</th>
                                            <th>Title</th>
                                            <th>Text</th>
                                            <th>Document</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($support_demands as $demand)
                                            <tr>
                                                <td>{{ $demand->id ? $demand->id : '---' }}</td>
                                                <td>
                                                    @if ($demand->status == 'pending')
                                                        <span class="badge rounded-pill bg-primary">Pending</span>
                                                    @elseif ($demand->status == 'closed')
                                                        <span class="badge rounded-pill bg-warning">Closed</span>
                                                    @elseif ($demand->status == 'answered')
                                                        <span class="badge rounded-pill bg-success">Answered</span>
                                                    @endif
                                                </td>
                                                @php
                                                    $cargo_orders = json_decode($demand->orders);
                                                @endphp
                                                <td>
                                                    <div class="orders-holder-hm">
                                                        @if ($cargo_orders)
                                                            @foreach ($cargo_orders as $order)
                                                                <span class="badge rounded-pill bg-info user_id_badge"
                                                                    onclick="window.open('{{ route('userpanel.viewCargoDetails', $order) }}' , '_self')">
                                                                    {{ $order }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            <span class="badge rounded-pill bg-danger user_id_badge">
                                                                None
                                                            </span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $demand->cause ? $demand->cause : '---' }}</td>
                                                <td>{{ $demand->title ? $demand->title : '---' }}</td>
                                                <td>{{ json_decode($demand->text) ? json_decode($demand->text) : '---' }}
                                                </td>
                                                <td>
                                                    <a href="/files/support/{{ $demand->document }}"
                                                        download="{{ $demand->document }}">
                                                        <p>{{ $demand->document }}</p>
                                                    </a>
                                                </td>
                                                <td>{{ $demand->created_at ? $demand->created_at : '---' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="courier__page tab-col demand-hm">
                    <form action="{{ route('userpanel.support_demand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="courier__input">
                            <div class="page__not page__not--1">
                                <div class="demand__box   me-3"></div>
                                <h2 class="demand__h2">Create Support Demand</h2>
                            </div>
                            <hr class="hr">
                            <div class="courier__input-1">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="courier__input-box">
                                            <h6>Type of cause<span class="red-1">*</span></h6>
                                            <select class="form-select" placeholder="Cargo tracking" name="cause"
                                                required>
                                                <option value="" selected disabled>Select cause</option>
                                                <option>Test 1</option>
                                                <option>Test 2</option>
                                                <option>Test 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="courier__input-box">
                                            <h6>Topic title<span class="red-1">*</span></h6>
                                            <input type="text" class="form-control" placeholder="Cargo"
                                                name="title" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="courier__input-box">
                                            <h6>Order ID<span class="red-1">*</span></h6>
                                            <div class="dropdown">
                                                <label class="dropdown-label">Select Options</label>
                                                <div class="dropdown-list">
                                                    @foreach ($orders as $key => $order)
                                                        <div class="checkbox">
                                                            <input type="checkbox" name="orders[]"
                                                                class="check checkbox-custom"
                                                                id="checkbox-custom_0{{ $key }}"
                                                                value="{{ $order->id }}" />
                                                            <label for="checkbox-custom_0{{ $key }}"
                                                                class="checkbox-custom-label ">
                                                                Order ID:
                                                                <b><span
                                                                        class="select-text-form-hm">{{ $order->id }}</span></b>
                                                                <br><br>
                                                                <span>Order Info: <b>{{ $order->order_info }}</b></span>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr">
                            <div class="courier__input-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="" class="form__file">
                                            <p class="input__above-text">(PDF, Maks. 5.0. MB)</p>
                                            <input type="file" name="document"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="courier__input-3">
                                <div class="courier__input-textare">
                                    <p class="input__below-text">Text</p>
                                    <textarea name="text" cols="30" rows="15" style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row mt-5 justify-content-center">
                                <button type="submit" class="btn btn-outline-primary next-button-hm">Send</button>
                            </div>
                        </div>
                    </form>
                </section>

                <!--chat section-->
                <section class="courier__page tab-col history-hm">

                    <div class="courier__input courier__table-box--2">
                        <div class="page__not page__not--1">
                            <div class="demand__box   me-3"></div>
                            <h2 class="demand__h2">System Messages</h2>
                        </div>
                        <div class="support__message ">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="support__message-box support__message-box--1">
                                        <div class="balance__address-refund--btn-2">Support ID</div>
                                    </div>
                                    <div class="nav flex-column nav-pills support__message-left">
                                        @php
                                            $message_ids = array_keys($support_messages->groupBy('support_id')->toArray());
                                        @endphp
                                        @foreach ($message_ids as $key => $message)
                                            <button class="nav-link support__message-btn" style="border: 1px solid;"
                                                onclick="changeMessageTab(this)" data-support-id="{{ $message }}">
                                                {{ $message }}
                                            </button>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-8 offset-1 support__message-primary">
                                    <div class="support__message-box support__message-box--2">
                                        <div class="balance__address-refund--btn-2">Messages</div>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @php
                                            $support_messages = $support_messages->groupBy('support_id');
                                        @endphp
                                        @foreach ($chats as $key => $chat)
                                            <div class="tab-pane fade show support_message_chat"
                                                id="support_message_{{ $key }}">
                                                <div class="support__message-chat">
                                                    @php
                                                        $user_message = DB::table('support_demands')
                                                            ->where('id', $key)
                                                            ->first();
                                                    @endphp
                                                    <h4>
                                                        Reply from moderator for support demand ID: {{ $key }}
                                                        @if ($user_message->status == 'pending')
                                                            <span class="badge rounded-pill bg-primary">Pending</span>
                                                        @elseif ($user_message->status == 'closed')
                                                            <span class="badge rounded-pill bg-warning">Closed</span>
                                                        @elseif ($user_message->status == 'answered')
                                                            <span class="badge rounded-pill bg-success">Answered</span>
                                                        @endif
                                                    </h4>
                                                    <hr class="hr">

                                                    {{-- TODO -----Support CHAT----- --}}
                                                    <div class="row support-chat-hm">
                                                        @foreach ($chat as $chat)
                                                            @if ($chat->by == 'moderator')
                                                                <div class="col-md-7 col-sm-6 col-9 mt-2">
                                                                    <div class="support__message-chatbox">
                                                                        <p>{!! json_decode($chat->message) !!}</p>
                                                                        <div class="support__message-time">
                                                                            <p>by: <b>ShipLounge Moderator</b> - </p>
                                                                            <p> - {{ $chat->created_at }} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="col-md-7 col-sm-6 col-9 mt-2 offset-5">
                                                                    <div class="support__message-chatbox">
                                                                        <p>{!! json_decode($chat->message) !!}</p>
                                                                        <div class="support__message-time">
                                                                            <p>by: <b>You</b> - </p>
                                                                            <p> - {{ $chat->created_at }} </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group mt-3 row">
                                                        <input class="form-control col" type="text"
                                                            name="user_message" placeholder="Type your message">
                                                        <button type="button" class="btn btn-primary cardcredit col-1"
                                                            onclick="sendMessage(this)"
                                                            data-demand-id="{{ $user_message->id }}">
                                                            <i class="fa-solid fa-message"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </section>

    <script>
        function changeTab(tab_link) {
            var tab_name = tab_link.getAttribute('data-name');
            var tab = document.querySelector('.' + tab_name + '-hm');

            var tabs = document.querySelectorAll('.tab-col');
            tabs.forEach(element => {
                element.classList.remove('active-tab-hm');
            });
            tab.classList.toggle("active-tab-hm");

            document.querySelector('.btn-back').classList.remove('btn-back');
            tab_link.classList.add('btn-back');
        }

        function changeMessageTab(button) {
            tab_buttons = document.querySelectorAll('.support__message-btn');
            tab_buttons.forEach(element => {
                element.classList.remove('active');
            });
            button.classList.toggle('active');

            var support_id = button.getAttribute('data-support-id');
            support_message_chats = document.querySelectorAll('.support_message_chat');
            support_message_chats.forEach(element => {
                element.classList.remove('active');
            });
            document.querySelector('#support_message_' + support_id).classList.add('active');

        }
    </script>
    <script>
        function checkboxDropdown(el) {
            var $el = $(el)

            function updateStatus(label, result) {
                if (!result.length) {
                    label.html('Select Options');
                }
            };

            $el.each(function(i, element) {
                var $list = $(this).find('.dropdown-list'),
                    $label = $(this).find('.dropdown-label'),
                    $checkAll = $(this).find('.check-all'),
                    $inputs = $(this).find('.check'),
                    defaultChecked = $(this).find('input[type=checkbox]:checked'),
                    result = [];

                updateStatus($label, result);
                if (defaultChecked.length) {
                    defaultChecked.each(function() {
                        result.push($(this).next().text());
                        $label.html(result.join(", "));
                    });
                }

                $label.on('click', () => {
                    $(this).toggleClass('open');
                });

                $checkAll.on('change', function() {
                    var checked = $(this).is(':checked');
                    var checkedText = $(this).next().find('.select-text-form-hm').text();;
                    result = [];
                    if (checked) {
                        result.push(checkedText);
                        $label.html(result);
                        $inputs.prop('checked', false);
                    } else {
                        $label.html(result);
                    }
                    updateStatus($label, result);
                });

                $inputs.on('change', function() {
                    var checked = $(this).is(':checked');
                    var checkedText = $(this).next().find('.select-text-form-hm').text();
                    if ($checkAll.is(':checked')) {
                        result = [];
                    }
                    if (checked) {
                        result.push(checkedText);
                        $label.html(result.join(", "));
                        $checkAll.prop('checked', false);
                    } else {
                        let index = result.indexOf(checkedText);
                        if (index >= 0) {
                            result.splice(index, 1);
                        }
                        $label.html(result.join(", "));
                    }
                    updateStatus($label, result);
                });

                $(document).on('click touchstart', e => {
                    if (!$(e.target).closest($(this)).length) {
                        $(this).removeClass('open');
                    }
                });
            });
        };
        checkboxDropdown('.dropdown');
    </script>
    {{-- send message in chat --}}
    <script>
        function sendMessage(button) {
            user_message = button.parentNode.querySelector('input[name="user_message"]').value;
            id = button.getAttribute('data-demand-id');

            $.ajax({
                type: 'POST',
                url: '{{ route('userpanel.sendMessage') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    status: "answered",
                    message: user_message
                },
                success: function(data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data,
                        confirmButtonText: 'Okay',
                        backdrop: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    })
                }
            });
        }
    </script>
@endsection

{{-- <div class="courier__input-2">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6 col-12  mt-4">
                <!--1ci input-->
                <p class="input__above-text">Package ID:</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="package_id">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12  mt-4">
                <!--1ci input-->
                <p class="input__above-text">Length:</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="package_length">
                    <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12  mt-4">
                <!--3ci input-->
                <p class="input__above-text">Width:</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="package_width">
                    <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12  mt-4">
                <!--4ci input-->
                <p class="input__above-text">Height:</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="package_height">
                    <span class="input-group-text" id="basic-addon1">cm</span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12  mt-4">
                <!--5ci input-->
                <p class="input__above-text">Weight:</p>
                <div class="input-group mb-3">
                    <input class="form-control" id="numControl"
                        onkeypress="return  changeToNumber(event)" name="package_weight">
                    <span class="input-group-text" id="basic-addon1">kg</span>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 mt-4">
                <!--6ci input-->
                <p class="input__above-text">Note:</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control text" name="note">
                </div>
            </div>
        </div>
    </div> --}}
