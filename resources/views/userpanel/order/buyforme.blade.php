@extends('userpanel.layout.layout')

@section('content')
    <section id="courier" class="courier">

        <div class="container" id="balance__container">
            <div class="container" id="balance__tabs">
                <div class="row">
                    <div class="col-4">
                        <button class="balance__box d-flex align-items-center" onclick="changeTab(this)" data-name="requests">
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
                                <p class="ms-3">My Request</p>
                            </div>
                        </button>
                    </div>
                    <div class="col-4">
                        <button class="balance__box btn-back d-flex align-items-center" onclick="changeTab(this)"
                            data-name="demand">
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
                                <p class="ms-3">Create Demand</p>
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
                                <p class="ms-3">History</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="tab-sections">
                <!--table section-->
                <section class="courier__page tab-col requests-hm">
                    <div class="courier__input courier__table-box--1">
                        <div class="page__not page__not--1">
                            <div class="demand__box   me-3"></div>
                            <h2 class="demand__h2">My Request</h2>
                        </div>
                        <div class="courier__table--1 mt-4">
                            <table id="buyformeTable" class="table table-bordered" style="with:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tracking number</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Address</th>
                                        <th>Zip Code</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Product Name</th>
                                        <th>Product Count</th>
                                        <th>Product Link</th>
                                        <th>Note</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forme_orders as $cargo)
                                        <tr>
                                            <td>{{ $cargo->id ? $cargo->id : '---' }}</td>
                                            <td>{{ $cargo->tracking_number ? $cargo->tracking_number : '---' }}</td>
                                            <td>
                                                <div class="orders-holder-hm">
                                                    @if ($cargo->status == 'pending')
                                                        <span
                                                            class="badge rounded-pill bg-info user_id_badge">Pending</span>
                                                    @elseif ($cargo->status == 'cancelled')
                                                        <span
                                                            class="badge rounded-pill bg-danger user_id_badge">Cancelled</span>
                                                    @elseif ($cargo->status == 'accepted')
                                                        <span
                                                            class="badge rounded-pill bg-warning user_id_badge">Accepted</span>
                                                    @elseif ($cargo->status == 'payment')
                                                        <span
                                                            class="badge rounded-pill bg-success user_id_badge">Done</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $cargo->name ? $cargo->name : '---' }}</td>
                                            <td>{{ $cargo->country ? $cargo->country : '---' }} </td>
                                            <td>{{ $cargo->city ? $cargo->city : '---' }}</td>
                                            <td>{{ $cargo->state ? $cargo->state : '---' }}</td>
                                            <td>{{ $cargo->address ? $cargo->address : '---' }}</td>
                                            <td>{{ $cargo->zipcode ? $cargo->zipcode : '---' }}</td>
                                            <td>{{ $cargo->phone ? $cargo->phone : '---' }}</td>
                                            <td>{{ $cargo->email ? $cargo->email : '---' }}</td>
                                            <td>{{ $cargo->product_name ? $cargo->product_name : '---' }}</td>
                                            <td>{{ $cargo->product_count ? $cargo->product_count : '---' }}</td>
                                            <td>
                                                <a href="{{ $cargo->product_link ? $cargo->product_link : '---' }}"
                                                    target="__blank" class="btn btn-info">
                                                    <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td>{{ $cargo->product_note ? $cargo->product_note : '---' }}</td>
                                            <td>
                                                @php
                                                    $created_at = Carbon\Carbon::parse($cargo->created_at)->format('d-M-Y H:i');
                                                @endphp
                                                <div class="orders-holder-hm" bis_skin_checked="1">
                                                    <span class="badge rounded-pill bg-info user_id_badge">
                                                        {{ $created_at ? $created_at : '---' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($cargo->status != 'cancelled' && $cargo->status != 'payment')
                                                    <a href="#" onclick="requestAction(this)"
                                                        class="btn btn-danger" data-request-id="{{ $cargo->id }}"
                                                        data-status="cancelled" data-status_name="Cancel">
                                                        <i class="fas fa-window-close"></i>
                                                    </a>
                                                @endif
                                                @if ($cargo->status == 'accepted')
                                                    <a href="#" onclick="requestAction(this)"
                                                        class="btn btn-success" data-request-id="{{ $cargo->id }}"
                                                        data-status="payment" data-status_name="Acceptance">
                                                        <i class="fas fa-check-to-slot"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="courier__page tab-col demand-hm active-tab-hm">
                    <div class="courier__input courier__table-box--1">
                        <div class="page__not page__not--1">
                            <div class="demand__box   me-3"></div>
                            <h2 class="demand__h2">Create Demand</h2>
                        </div>
                        <div class="courier--table-1">
                            <div class="courier__table--1 mt-4">
                                <form action="{{ route('userpanel.post_buyforme') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="create-demand-form-hm">
                                        <div class="create-demand-form-left-hm create-demand-part">
                                            <div>
                                                <h2>Address information</h2>
                                            </div>
                                            <li class="list-group-item pb-4">
                                                <select class="form-select border-primary select-custom-hm"
                                                    onchange="changeUserAddress(this)" required>
                                                    <option class="optionText" selected disabled>
                                                        Select Address
                                                    </option>
                                                    @foreach ($user_addresses as $address)
                                                        <option data-country="{{ $address->country }}"
                                                            data-state="{{ $address->state }}"
                                                            data-city="{{ $address->city }}"
                                                            data-address="{{ $address->address }}"
                                                            data-zipcode="{{ $address->zipcode }}"
                                                            data-name="{{ $address->name }}"
                                                            data-phone="{{ $address->phone }}"
                                                            data-email="{{ $address->email }}">
                                                            {{ $address->email }} / {{ $address->address }} /
                                                            {{ $address->city }}
                                                            /{{ $address->country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </li>
                                            <li class="list-group-item mt-3">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <h5 class="textShipment">Address Information</h5>
                                                        <h6 class="customerText">Country<span class="red">*</span></h6>
                                                        <select class="form-select mb-3 check-input" name="country">
                                                            <option value="" selected disabled>Select</option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->name }}">{{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <h6 class="customerText">City<span class="red">*</span></h6>
                                                        <input class="form-control mb-3 check-input" type="text"
                                                            placeholder="New York" aria-label="default input example"
                                                            name="city" id="locality-input" />
                                                        <h6 class="customerText">State</h6>
                                                        <input class="form-control mb-3 check-input" type="text"
                                                            placeholder="California" aria-label="default input example"
                                                            name="state" id="administrative_area_level_1-input" />
                                                        <h6 class="customerText">Adress<span class="red">*</span></h6>
                                                        <input class="form-control mb-3 check-input" type="text"
                                                            placeholder="Bergen street 57"
                                                            aria-label="default input example" name="address"
                                                            id="location-input" />
                                                        <h6 class="customerText">ZIP Code<span class="red">*</span>
                                                        </h6>
                                                        <input class="form-control mb-3 check-input" type="text"
                                                            placeholder="745844" aria-label="default input example"
                                                            name="zipcode" id="postal_code-input" />
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <h5 class="textShipment">Contact Info</h5>
                                                        <h6 class="customerText">Full Name<span class="red">*</span>
                                                        </h6>
                                                        <input class="form-control mb-3 check-input" type="text"
                                                            placeholder="Emma John" aria-label="default input example"
                                                            name="name" />
                                                        <h6 class="customerText">Phone Number<span class="red">*</span>
                                                        </h6>
                                                        <input class="form-control mb-3 check-input" type="tel"
                                                            placeholder="+9383830834" aria-label="default input example"
                                                            name="phone" />
                                                        <h6 class="customerText">Email<span class="red">*</span></h6>
                                                        <input class="form-control mb-3 check-input" type="email"
                                                            placeholder="john@examle.com"
                                                            aria-label="default input example" name="email" />
                                                        <div class="row justify-content-end">
                                                            <label for="save_address"
                                                                class="buy__info-address--button btn form-control"
                                                                style="width: max-content;">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="save_address" name="save_address">
                                                                <span class="ms-2">Save to the address
                                                                    book
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                        <div class="create-demand-part">
                                            <div>
                                                <h2>Product information</h2>
                                            </div>
                                            <div class="create-demand-form-right-hm ">
                                                <div class="form-group">
                                                    <label class="form-label">Product<span class="red-1">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Deirvlon"
                                                        name="product_name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Count<span class="red-1">*</span></label>
                                                    <input class="form-control" type="text" name="product_count">
                                                </div>
                                                <div class="form-group">
                                                    <label cclass="form-label">Link<span class="red-1">*</span></label>
                                                    <input class="form-control" type="text" name="product_link">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Note</label>
                                                    <input class="form-control" type="text" name="product_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create-demand-part create-demand-form-bottom-hm">
                                            <button class="btn btn-primary balance__address-refund--btn" type="submit">
                                                <i class="fa-solid fa-check me-2"></i>
                                                Confirm Demand
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!--chat section-->
                <section class="courier__page tab-col history-hm">

                    <div class="courier__input courier__table-box--2">
                        <div class="page__not page__not--1">
                            <div class="demand__box   me-3"></div>
                            <h2 class="demand__h2">Demand History</h2>
                        </div>
                        <div class="courier__table--1 mt-4">
                            <table id="example2" class="table table-bordered" style="with:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Comment</th>
                                        <th>Time limit</th>
                                        <th>Product Name</th>
                                        <th>Product Count</th>
                                        <th>Product Link</th>
                                        <th>Note</th>
                                        <th>Product Price</th>
                                        <th>Cargo Price</th>
                                        <th>Comission</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forme_orders as $cargo)
                                        @if ($cargo->status == 'payment' || $cargo->status == 'cancelled')
                                            <tr>
                                                <td>{{ $cargo->id ? $cargo->id : '---' }}</td>
                                                <td>
                                                    <div class="orders-holder-hm">
                                                        @if ($cargo->status == 'pending')
                                                            <span
                                                                class="badge rounded-pill bg-info user_id_badge">Pending</span>
                                                        @elseif ($cargo->status == 'cancelled')
                                                            <span
                                                                class="badge rounded-pill bg-danger user_id_badge">Cancelled</span>
                                                        @elseif ($cargo->status == 'accepted')
                                                            <span
                                                                class="badge rounded-pill bg-warning user_id_badge">Accepted</span>
                                                        @elseif ($cargo->status == 'payment')
                                                            <span
                                                                class="badge rounded-pill bg-success user_id_badge">Done</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $cargo->comment ? $cargo->comment : '---' }}</td>
                                                <td>
                                                    @php
                                                        $date = Carbon\Carbon::parse($cargo->updated_at)
                                                            ->addHours($cargo->time)
                                                            ->format('d-M-Y H:i');
                                                    @endphp
                                                    <div class="orders-holder-hm">
                                                        <span class="badge rounded-pill bg-info user_id_badge">
                                                            {{ $date }}
                                                        </span>
                                                    </div>
                                                </td>
                                                {{-- <td>{{ $cargo->updated_at ? $cargo->updated_at : '---' }}</td> --}}
                                                <td>{{ $cargo->product_name ? $cargo->product_name : '---' }}</td>
                                                <td>{{ $cargo->product_count ? $cargo->product_count : '---' }}</td>
                                                <td>
                                                    <a href="{{ $cargo->product_link ? $cargo->product_link : '---' }}"
                                                        target="__blank" class="btn btn-info">
                                                        <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $cargo->product_note ? $cargo->product_note : '---' }}</td>
                                                <td>{{ $cargo->product_price ? $cargo->product_price : '---' }}</td>
                                                <td>{{ $cargo->cargo_price ? $cargo->cargo_price : '---' }}</td>
                                                <td>{{ $cargo->comission ? $cargo->comission : '---' }}</td>
                                                <td>
                                                    @if ($cargo->status != 'cancelled' && $cargo->status != 'payment')
                                                        <a href="#" onclick="requestAction(this)"
                                                            class="btn btn-danger" data-request-id="{{ $cargo->id }}"
                                                            data-status="cancelled" data-status_name="Cancel">
                                                            <i class="fas fa-window-close"></i>
                                                        </a>
                                                    @endif
                                                    @if ($cargo->status == 'accepted')
                                                        <a href="#" onclick="requestAction(this)"
                                                            class="btn btn-success" data-request-id="{{ $cargo->id }}"
                                                            data-status="payment" data-status_name="Acceptance">
                                                            <i class="fas fa-check-to-slot"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </section>

    <script>
        $(function() {
            $("#buyformeTable").DataTable({
                order: [
                    [15, 'desc']
                ],
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
                scrollX: true,
                dom: 'Brftip',
                buttons: [{
                    extend: 'excel',
                    text: 'Save as Excel',
                    filename: 'table_to_excel',
                    extension: '.xlsx'
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#example2").DataTable({
                order: [
                    [3, 'asc']
                ],
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
                scrollX: true,
                dom: 'Brftip',
                buttons: [{
                    extend: 'excel',
                    text: 'Save as Excel',
                    filename: 'table_to_excel',
                    extension: '.xlsx'
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
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

        function changeUserAddress(select) {
            var options = select.options;
            var address = options[options.selectedIndex].getAttribute('data-address');
            var country = options[options.selectedIndex].getAttribute('data-country');
            var city = options[options.selectedIndex].getAttribute('data-city');
            var state = options[options.selectedIndex].getAttribute('data-state');
            var zipcode = options[options.selectedIndex].getAttribute('data-zipcode');
            var phone = options[options.selectedIndex].getAttribute('data-phone');
            var email = options[options.selectedIndex].getAttribute('data-email');
            var name = options[options.selectedIndex].getAttribute('data-name');

            document.querySelector('select[name="country"]').value = country;
            document.querySelector('input[name="state"]').value = state;
            document.querySelector('input[name="city"]').value = city;
            document.querySelector('input[name="address"]').value = address;
            document.querySelector('input[name="zipcode"]').value = zipcode;
            document.querySelector('input[name="name"]').value = name;
            document.querySelector('input[name="phone"]').value = phone;
            document.querySelector('input[name="email"]').value = email;

            if (document.querySelector('#save_address').checked == true) {
                document.querySelector('#save_address').checked = false;
            }
        }
    </script>
    <script>
        function requestAction(button) {
            var id = button.getAttribute('data-request-id');
            var status = button.getAttribute('data-status');
            var status_name = button.getAttribute('data-status_name');

            Swal.fire({
                position: 'top',
                icon: 'warning',
                title: status_name + ' for order ID: ' + id,
                text: "Write comment for " + status_name + ":",
                backdrop: true,
                input: 'text',
                showCancelButton: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('userpanel.order_status_action') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id,
                            comment: result.value,
                            status: status
                        },
                        success: function(data) {
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: data + " . Reload the page",
                                showConfirmButton: true,
                                backdrop: true,
                                timerProgressBar: true,
                                timer: 2000
                            });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2100);
                        }
                    });
                }
            });
        }
    </script>
@endsection
