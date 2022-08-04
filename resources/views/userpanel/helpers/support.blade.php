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
        .courier__select::-webkit-input-placeholder {
            color: #D9D9D9;
        }

        .dropdown {
            position: relative;
            /* margin-bottom: 20px; */
        }

        .dropdown .dropdown-list {
            padding: 25px 20px;
            background: #fff;
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            border: 1px solid rgba(0, 0, 0, 0.2);
            max-height: 223px;
            overflow-y: auto;
            background: #fff;
            display: none;
            z-index: 10;
        }

        .dropdown .checkbox {
            opacity: 0;
            transition: opacity 0.2s;
        }

        .dropdown .dropdown-label {
            display: block;
            font-size: 16px;
            line-height: 30px;
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.2);
            padding: 0 40px 0 8px;
            cursor: pointer;
            position: relative;
        }

        .dropdown .dropdown-label:before {
            font-family: "Font Awesome 5 Pro";
            font-weight: 400;
            content: "\f107";
            /* content: ''; */
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.25s;
            transform-origin: center center;
        }

        .dropdown.open .dropdown-list {
            display: block;
        }

        .dropdown.open .checkbox {
            transition: 2s opacity 2s;
            opacity: 1;
        }

        .dropdown.open .dropdown-label:before {
            transform: translateY(-50%) rotate(-180deg);
        }

        .checkbox {
            margin-bottom: 20px;
        }

        .checkbox:last-child {
            margin-bottom: 0;
        }

        .checkbox .checkbox-custom {
            display: none;
        }

        .checkbox .checkbox-custom-label {
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
        }

        .checkbox .checkbox-custom+.checkbox-custom-label:before {
            content: "";
            background: #47C5FF;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            text-align: center;
            width: 18px;
            height: 18px;
            border: 1px solid #84D8FF;
            border-radius: 2px;
            margin-top: -2px;
        }

        .checkbox .checkbox-custom:checked+.checkbox-custom-label:after {
            content: "";
            position: absolute;
            top: 3px;
            left: 6px;
            height: 10px;
            padding: 2px;
            transform: rotate(45deg);
            text-align: center;
            border: solid white;
            border-width: 0 3px 3px 0;
        }

        .checkbox .checkbox-custom-label {
            line-height: 16px;
            font-size: 16px;
            margin-right: 0;
            margin-left: 0;
            color: black;
        }

        .btn-back {
            transition: 0.6s;
        }

        .tab-sections {
            position: relative;
        }

        .tab-col {
            width: 100%;
            position: absolute;
            opacity: 0;
            visibility: hidden;
            transition: 0.6s;
        }

        .active-tab-hm {
            opacity: 10;
            z-index: 100;
            visibility: visible;
            transition: 0.6s;
        }
    </style>

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

            <!--table section-->
            <div class="tab-sections">
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
                                            <th>Status</th>
                                            <th>Comment</th>
                                            <th>Orders</th>
                                            <th>Customer name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>ZipCode</th>
                                            <th>Note</th>
                                            <th>Date</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="courier__page tab-col demand-hm">

                    <div class="courier__input">
                        <div class="page__not page__not--1">
                            <div class="page__not-box me-3">
                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_194_422)">
                                        <path
                                            d="M18.5 37C8.29927 37 0 28.7007 0 18.5C0 8.29927 8.29927 0 18.5 0C28.7007 0 37 8.29927 37 18.5C37 28.7007 28.7007 37 18.5 37Z"
                                            fill="#00D2FF" />
                                        <path
                                            d="M27.1334 30.833C16.9326 30.833 8.63336 22.5337 8.63336 12.333C8.63336 8.06299 10.1017 4.13731 12.5408 1.00293C5.25862 3.49082 0 10.3856 0 18.4996C0 28.7003 8.29927 36.9996 18.5 36.9996C24.4308 36.9996 29.7047 34.1831 33.0925 29.8296C31.2196 30.4695 29.22 30.833 27.1334 30.833Z"
                                            fill="#18BDF6" />
                                        <path
                                            d="M11.3286 21.0676H19.6123C19.7361 21.0676 19.8374 20.9663 19.8374 20.8425V14.1323C19.8374 13.7594 19.535 13.457 19.1621 13.457H11.7788C11.4059 13.457 11.1036 13.7594 11.1036 14.1323V20.8425C11.1035 20.9663 11.2048 21.0676 11.3286 21.0676ZM12.9978 16.5459C12.9978 16.3916 13.1229 16.2665 13.2772 16.2665H15.4871V15.4791C15.4871 15.2302 15.7881 15.1055 15.9641 15.2816L17.8684 17.1868C17.9774 17.2959 17.9774 17.4727 17.8684 17.5818L15.9641 19.4867C15.7881 19.6627 15.4871 19.5381 15.4871 19.2892V18.5016H13.2772C13.1229 18.5016 12.9978 18.3765 12.9978 18.2222V16.5459H12.9978ZM13.9668 22.8751H11.2251C11.1013 22.8751 11 22.7739 11 22.6501V21.9658C11 21.8419 11.1013 21.7406 11.2251 21.7406H14.5881C14.2594 22.0265 14.0321 22.425 13.9668 22.8751ZM26.7749 21.7407H26.2279V18.6816C26.2279 18.3237 26.1199 17.9725 25.9195 17.6754L24.5487 15.645C24.2133 15.1498 23.655 14.8526 23.0563 14.8526H20.9314C20.6815 14.8526 20.4812 15.0552 20.4812 15.3028V21.7407H17.0011C17.332 22.0265 17.5594 22.425 17.6247 22.8752H21.2938C21.4243 21.9815 22.1941 21.2905 23.1238 21.2905C24.0535 21.2905 24.821 21.9816 24.9516 22.8752H26.7749C26.8987 22.8752 27 22.7739 27 22.6501V21.9658C27 21.842 26.8987 21.7407 26.7749 21.7407ZM24.5329 18.0805H21.7282C21.6044 18.0805 21.5031 17.9815 21.5031 17.8554V16.3C21.5031 16.1762 21.6044 16.0749 21.7282 16.0749H23.4367C23.511 16.0749 23.5785 16.1109 23.6213 16.1694L24.7175 17.7271C24.821 17.8757 24.7152 18.0805 24.5329 18.0805ZM15.7946 21.7407C15.0225 21.7407 14.3945 22.3687 14.3945 23.143C14.3945 23.9151 15.0225 24.5431 15.7946 24.5431C16.5689 24.5431 17.1947 23.9151 17.1947 23.143C17.1947 22.3687 16.5689 21.7407 15.7946 21.7407ZM15.7946 23.8431C15.4074 23.8431 15.0946 23.5279 15.0946 23.143C15.0946 22.7558 15.4075 22.443 15.7946 22.443C16.1818 22.443 16.4947 22.7559 16.4947 23.143C16.4947 23.5279 16.1818 23.8431 15.7946 23.8431ZM23.1238 21.7407C22.3495 21.7407 21.7237 22.3687 21.7237 23.143C21.7237 23.9151 22.3495 24.5431 23.1238 24.5431C23.8959 24.5431 24.5239 23.9151 24.5239 23.143C24.5239 22.3687 23.8959 21.7407 23.1238 21.7407ZM23.1238 23.8431C22.7366 23.8431 22.4237 23.5279 22.4237 23.143C22.4237 22.7558 22.7366 22.443 23.1238 22.443C23.511 22.443 23.8238 22.7559 23.8238 23.143C23.8239 23.5279 23.511 23.8431 23.1238 23.8431Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_194_422">
                                            <rect width="37" height="37" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h2 class="color__text">Create Support Demand</h2>
                        </div>
                        <hr class="hr">
                        <div class="courier__input-1">
                            <div class="row">
                                <div class="col-sm-4 col-12">
                                    <div class="courier__input-box">
                                        <h6>Type of cause<span class="red-1">*</span></h6>
                                        <select class="form-select" placeholder="Cargo tracking" name="cause" required>
                                            <option selected>4683579</option>
                                            <option value="1">468357</option>
                                            <option value="2">468357</option>
                                            <option value="3">468357</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12">
                                    <div class="courier__input-box">
                                        <h6>Topic title<span class="red-1">*</span></h6>
                                        <input type="text" class="form-control" placeholder="Cargo" name="title"
                                            required>
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
                                                        <input type="checkbox" name="order_ids[]"
                                                            class="check checkbox-custom"
                                                            id="checkbox-custom_0{{ $key }}"
                                                            value="{{ $order->id }}" />
                                                        <label for="checkbox-custom_0{{ $key }}"
                                                            class="checkbox-custom-label ">
                                                            Order ID:
                                                            <b><span class="select-text-form-hm">{{ $order->id }}</span></b>
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
                    </div>
                </section>

                <!--table section-->
                <section class="courier__page tab-col history-hm">

                    <div class="courier__input courier__table-box--2">
                        <div class="page__not page__not--1">
                            <div class="demand__box   me-3">
                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_194_422)">
                                        <path
                                            d="M18.5 37C8.29927 37 0 28.7007 0 18.5C0 8.29927 8.29927 0 18.5 0C28.7007 0 37 8.29927 37 18.5C37 28.7007 28.7007 37 18.5 37Z"
                                            fill="#00D2FF" />
                                        <path
                                            d="M27.1334 30.833C16.9326 30.833 8.63336 22.5337 8.63336 12.333C8.63336 8.06299 10.1017 4.13731 12.5408 1.00293C5.25862 3.49082 0 10.3856 0 18.4996C0 28.7003 8.29927 36.9996 18.5 36.9996C24.4308 36.9996 29.7047 34.1831 33.0925 29.8296C31.2196 30.4695 29.22 30.833 27.1334 30.833Z"
                                            fill="#18BDF6" />
                                        <path
                                            d="M11.3286 21.0676H19.6123C19.7361 21.0676 19.8374 20.9663 19.8374 20.8425V14.1323C19.8374 13.7594 19.535 13.457 19.1621 13.457H11.7788C11.4059 13.457 11.1036 13.7594 11.1036 14.1323V20.8425C11.1035 20.9663 11.2048 21.0676 11.3286 21.0676ZM12.9978 16.5459C12.9978 16.3916 13.1229 16.2665 13.2772 16.2665H15.4871V15.4791C15.4871 15.2302 15.7881 15.1055 15.9641 15.2816L17.8684 17.1868C17.9774 17.2959 17.9774 17.4727 17.8684 17.5818L15.9641 19.4867C15.7881 19.6627 15.4871 19.5381 15.4871 19.2892V18.5016H13.2772C13.1229 18.5016 12.9978 18.3765 12.9978 18.2222V16.5459H12.9978ZM13.9668 22.8751H11.2251C11.1013 22.8751 11 22.7739 11 22.6501V21.9658C11 21.8419 11.1013 21.7406 11.2251 21.7406H14.5881C14.2594 22.0265 14.0321 22.425 13.9668 22.8751ZM26.7749 21.7407H26.2279V18.6816C26.2279 18.3237 26.1199 17.9725 25.9195 17.6754L24.5487 15.645C24.2133 15.1498 23.655 14.8526 23.0563 14.8526H20.9314C20.6815 14.8526 20.4812 15.0552 20.4812 15.3028V21.7407H17.0011C17.332 22.0265 17.5594 22.425 17.6247 22.8752H21.2938C21.4243 21.9815 22.1941 21.2905 23.1238 21.2905C24.0535 21.2905 24.821 21.9816 24.9516 22.8752H26.7749C26.8987 22.8752 27 22.7739 27 22.6501V21.9658C27 21.842 26.8987 21.7407 26.7749 21.7407ZM24.5329 18.0805H21.7282C21.6044 18.0805 21.5031 17.9815 21.5031 17.8554V16.3C21.5031 16.1762 21.6044 16.0749 21.7282 16.0749H23.4367C23.511 16.0749 23.5785 16.1109 23.6213 16.1694L24.7175 17.7271C24.821 17.8757 24.7152 18.0805 24.5329 18.0805ZM15.7946 21.7407C15.0225 21.7407 14.3945 22.3687 14.3945 23.143C14.3945 23.9151 15.0225 24.5431 15.7946 24.5431C16.5689 24.5431 17.1947 23.9151 17.1947 23.143C17.1947 22.3687 16.5689 21.7407 15.7946 21.7407ZM15.7946 23.8431C15.4074 23.8431 15.0946 23.5279 15.0946 23.143C15.0946 22.7558 15.4075 22.443 15.7946 22.443C16.1818 22.443 16.4947 22.7559 16.4947 23.143C16.4947 23.5279 16.1818 23.8431 15.7946 23.8431ZM23.1238 21.7407C22.3495 21.7407 21.7237 22.3687 21.7237 23.143C21.7237 23.9151 22.3495 24.5431 23.1238 24.5431C23.8959 24.5431 24.5239 23.9151 24.5239 23.143C24.5239 22.3687 23.8959 21.7407 23.1238 21.7407ZM23.1238 23.8431C22.7366 23.8431 22.4237 23.5279 22.4237 23.143C22.4237 22.7558 22.7366 22.443 23.1238 22.443C23.511 22.443 23.8238 22.7559 23.8238 23.143C23.8239 23.5279 23.511 23.8431 23.1238 23.8431Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_194_422">
                                            <rect width="37" height="37" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h2 class="demand__h2">System Messages</h2>
                        </div>
                        <div class="support__message ">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="support__message-box support__message-box--1">
                                        <div class="balance__address-refund--btn-2">Support ID</div>
                                    </div>
                                    <div class="nav flex-column nav-pills  support__message-left" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active support__message-btn" id="v-pills-home-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
                                            role="tab" aria-controls="v-pills-home"
                                            aria-selected="true">8347874</button>
                                        <button class="nav-link support__message-btn" id="v-pills-profile-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button"
                                            role="tab" aria-controls="v-pills-profile"
                                            aria-selected="false">8515478</button>
                                        <button class="nav-link support__message-btn" id="v-pills-messages-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button"
                                            role="tab" aria-controls="v-pills-messages"
                                            aria-selected="false">7587514</button>
                                        <button class="nav-link support__message-btn" id="v-pills-settings-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button"
                                            role="tab" aria-controls="v-pills-settings"
                                            aria-selected="false">1224112</button>
                                    </div>
                                </div>
                                <div class="col-md-8 offset-1 support__message-primary">
                                    <div class="support__message-box support__message-box--2">
                                        <div class="balance__address-refund--btn-2">Messages</div>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <div class="support__message-chat support__message-right">
                                                <h4>Deirvlon</h4>
                                                <hr class="hr">

                                                {{-- TODO -----Support CHAT----- --}}
                                                <div class="row support-chat-hm">
                                                    <div class="col-md-7 col-sm-6 col-9  support__message-text-1">
                                                        <div class="support__message-chatbox">
                                                            <p>Hello. Can I return my order in the warehouse and get
                                                                my payment back?</p>
                                                            <div class="support__message-time">
                                                                <p>21.07.2022 / 13:30</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-7  col-sm-6 col-9  offset-5 mt-5 support__message-text-2">
                                                        <div class="support__message-chatbox">
                                                            <p>Deirvlon, as mentioned in the terms of carriage, we
                                                                do not have a return service from an external
                                                                warehouse.</p>
                                                            <div class="support__message-time">
                                                                <p>21.11.2021 / 16:57</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-sm-6 col-9 mt-5 support__message-text-1">
                                                        <div class="support__message-chatbox">
                                                            <p>Hello. Can I return my order in the warehouse and get
                                                                my payment back?</p>

                                                            <div class="support__message-time">
                                                                <p>21.07.2022 / 13:30</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab">
                                            <div class="support__message-chat support__message-right">
                                                <h4>Deirvlon</h4>
                                                <hr class="hr">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-6 col-9  support__message-text-1">
                                                        <div class="support__message-chatbox">
                                                            <p>Hello. Can I return my order in the warehouse and get
                                                                my payment back?</p>

                                                            <div class="support__message-time">
                                                                <p>21.07.2022 / 13:30</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-7  col-sm-6 col-9  offset-5 mt-5 support__message-text-2">
                                                        <div class="support__message-chatbox">
                                                            <p>Deirvlon, as mentioned in the terms of carriage, we
                                                                do not have a return service from an external
                                                                warehouse.</p>

                                                            <div class="support__message-time">
                                                                <p>21.11.2021 / 16:57</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab">
                                            <div class="support__message-chat support__message-right">
                                                <h4>Deirvlon</h4>
                                                <hr class="hr">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-6 col-9  support__message-text-1">
                                                        <div class="support__message-chatbox">
                                                            <p>Hello. Can I return my order in the warehouse and get
                                                                my payment back?</p>

                                                            <div class="support__message-time">
                                                                <p>21.07.2022 / 13:30</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-7  col-sm-6 col-9  offset-5 mt-5 support__message-text-2">
                                                        <div class="support__message-chatbox">
                                                            <p>Deirvlon, as mentioned in the terms of carriage, we
                                                                do not have a return service from an external
                                                                warehouse.</p>

                                                            <div class="support__message-time">
                                                                <p>21.11.2021 / 16:57</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab">
                                            <div class="support__message-chat support__message-right">
                                                <h4>Deirvlon</h4>
                                                <hr class="hr">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-6 col-9  support__message-text-1">
                                                        <div class="support__message-chatbox">
                                                            <p>Hello. Can I return my order in the warehouse and get
                                                                my payment back?</p>

                                                            <div class="support__message-time">
                                                                <p>21.07.2022 / 13:30</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-7  col-sm-6 col-9  offset-5 mt-5 support__message-text-2">
                                                        <div class="support__message-chatbox">
                                                            <p>Deirvlon, as mentioned in the terms of carriage, we
                                                                do not have a return service from an external
                                                                warehouse.</p>

                                                            <div class="support__message-time">
                                                                <p>21.11.2021 / 16:57</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script>
        $(function() {
            $("#example2").DataTable({
                order: [
                    [0, 'desc']
                ],
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
                scrollX: true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
