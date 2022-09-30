<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lato&family=Prosto+One&family=Roboto:wght@100&family=Source+Serif+Pro:wght@200&display=swap"
        rel="stylesheet" />

    <!-- bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <!--icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <!-- Data Tables -->

    <link rel="stylesheet"
        href="{{ asset('/') }}backend/assets/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('/') }}backend/assets/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('/') }}backend/assets/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}frontend/userpanel/css/style.css" />
    <link rel="stylesheet" href="{{ asset('/') }}frontend/userpanel/css/pages.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/userpanel/css/main.css">
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/css/custom_style.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    {{-- International phone INPUT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/js/intlTelInput.min.js"
        integrity="sha512-hpJ6J4jGqnovQ5g1J39VtNq1/UPsaFjjR6tuCVVkKtFIx8Uy4GeixgIxHPSG72lRUYx1xg/Em+dsqxvKNwyrSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.18/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Select Style --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="icon" href="{{ asset('/') }}images/logo.svg">
    <title>ShipLounge</title>

    <style>
        .content-holder-hm {
            position: relative;
        }

        .drop-box-hm {
            background: white;
            width: max-content;
            padding: 10px 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 1px rgb(0 0 0 / 25%);
        }
    </style>
</head>

<body>
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '{{ session()->get('message') }}',
                backdrop: true,
                showConfirmButton: true,
                timerProgressBar: true,
                timer: 6000
            })
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ session()->get('error') }}',
                backdrop: true,
                showConfirmButton: true,
                timerProgressBar: true,
                timer: 6000
            })
        </script>
    @endif

    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>

    <div class="layout-hm">
        <div class="overlay">
        </div>
        <nav class="burger__menu">
            <div class="navigation container">
                <div class="navigation__data">
                    <div class="navigation__cancel d-flex justify-content-end">
                        <span class="navigation__cancel-span">
                            <i class="fa-solid fa-xmark navigation__cancel-icon"></i>
                        </span>
                    </div>
                    <div class="navigation__image">
                        <svg width="148" height="46" viewBox="0 0 148 46" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M103.53 0L115.885 3.53302L104.735 9.95174L105.844 4.56752L103.53 0Z"
                                fill="#ED5A23" />
                            <path
                                d="M39.7811 26.3585C40.992 26.3585 41.9092 26.6186 42.5387 27.145C43.1681 27.6713 43.5998 28.367 43.8335 29.2382C44.0673 30.1093 44.1872 31.0773 44.1872 32.1481V38.6515C44.1872 39.0931 44.0434 39.4621 43.7616 39.7586C43.4739 40.055 43.1142 40.2062 42.6765 40.2062C42.2389 40.2062 41.8792 40.055 41.5915 39.7586C41.3037 39.4621 41.1659 39.0931 41.1659 38.6515V32.1481C41.1659 31.5915 41.0999 31.0833 40.962 30.6356C40.8301 30.188 40.5844 29.825 40.2307 29.5527C39.877 29.2805 39.3734 29.1474 38.72 29.1474C38.0845 29.1474 37.539 29.2805 37.0834 29.5527C36.6278 29.825 36.2921 30.1819 36.0643 30.6356C35.8365 31.0833 35.7226 31.5915 35.7226 32.1481V38.6515C35.7226 39.0931 35.5787 39.4621 35.2969 39.7586C35.0092 40.055 34.6495 40.2062 34.2119 40.2062C33.7742 40.2062 33.4146 40.055 33.1268 39.7586C32.8391 39.4621 32.7012 39.0931 32.7012 38.6515V22.9525C32.7012 22.5109 32.845 22.1419 33.1268 21.8454C33.4146 21.549 33.7742 21.4038 34.2119 21.4038C34.6495 21.4038 35.0092 21.555 35.2969 21.8454C35.5847 22.1419 35.7226 22.5109 35.7226 22.9525V29.2563L35.3449 29.1777C35.4948 28.8873 35.7046 28.5787 35.9743 28.2521C36.2441 27.9193 36.5678 27.6108 36.9575 27.3265C37.3412 27.0361 37.7728 26.8062 38.2404 26.6247C38.714 26.4492 39.2235 26.3585 39.7811 26.3585Z"
                                fill="#489AD5" />
                            <path
                                d="M48.7673 24.961C48.1978 24.961 47.7961 24.8703 47.5563 24.6827C47.3225 24.4952 47.2026 24.1685 47.2026 23.6906V23.2066C47.2026 22.7166 47.3345 22.3839 47.5923 22.2024C47.8501 22.0269 48.2517 21.9362 48.7913 21.9362C49.3788 21.9362 49.7924 22.0269 50.0262 22.2145C50.26 22.402 50.3799 22.7287 50.3799 23.2066V23.6906C50.3799 24.1806 50.254 24.5134 50.0022 24.6948C49.7504 24.8703 49.3368 24.961 48.7673 24.961ZM50.302 38.6575C50.302 39.0992 50.1581 39.4682 49.8763 39.7646C49.5886 40.0611 49.2289 40.2123 48.7913 40.2123C48.3536 40.2123 47.994 40.0611 47.7062 39.7646C47.4185 39.4682 47.2806 39.0992 47.2806 38.6575V28.1613C47.2806 27.7197 47.4244 27.3507 47.7062 27.0542C47.994 26.7578 48.3536 26.6065 48.7913 26.6065C49.2289 26.6065 49.5886 26.7578 49.8763 27.0542C50.1641 27.3507 50.302 27.7197 50.302 28.1613V38.6575Z"
                                fill="#489AD5" />
                            <path
                                d="M60.3732 26.3585C61.5482 26.3585 62.6033 26.661 63.5325 27.2599C64.4617 27.8588 65.205 28.6876 65.7506 29.7342C66.2961 30.7869 66.5658 32.0029 66.5658 33.3943C66.5658 34.7857 66.2901 36.0078 65.7506 37.0664C65.205 38.1251 64.4737 38.9539 63.5624 39.5589C62.6452 40.1578 61.6201 40.4603 60.4811 40.4603C59.8097 40.4603 59.1802 40.3514 58.5927 40.1276C58.0053 39.9098 57.4897 39.6255 57.0461 39.2867C56.6025 38.9479 56.2548 38.6031 56.015 38.2582C55.7692 37.9134 55.6493 37.617 55.6493 37.381L56.4286 37.0483V43.7332C56.4286 44.1748 56.2847 44.5439 56.003 44.8403C55.7152 45.1367 55.3555 45.288 54.9179 45.288C54.4803 45.288 54.1206 45.1428 53.8329 44.8585C53.5451 44.5681 53.4072 44.199 53.4072 43.7393V28.1613C53.4072 27.7197 53.5511 27.3506 53.8329 27.0542C54.1206 26.7578 54.4803 26.6065 54.9179 26.6065C55.3555 26.6065 55.7152 26.7578 56.003 27.0542C56.2907 27.3506 56.4286 27.7197 56.4286 28.1613V29.4075L56.003 29.1776C56.003 28.9599 56.1229 28.6937 56.3567 28.3791C56.5905 28.0645 56.9082 27.7499 57.3159 27.4414C57.7175 27.1268 58.1851 26.8727 58.7126 26.667C59.2282 26.4613 59.7857 26.3585 60.3732 26.3585ZM59.9955 29.1534C59.2582 29.1534 58.6107 29.341 58.0592 29.71C57.5077 30.0851 57.0701 30.5872 56.7643 31.2224C56.4526 31.8577 56.2967 32.5836 56.2967 33.3943C56.2967 34.1928 56.4526 34.9128 56.7643 35.5661C57.0761 36.2195 57.5077 36.7337 58.0592 37.1027C58.6107 37.4778 59.2582 37.6593 59.9955 37.6593C60.7329 37.6593 61.3743 37.4718 61.9199 37.1027C62.4654 36.7277 62.891 36.2195 63.2028 35.5661C63.5145 34.9128 63.6704 34.1928 63.6704 33.3943C63.6704 32.5836 63.5145 31.8577 63.2028 31.2224C62.891 30.5872 62.4654 30.0851 61.9199 29.71C61.3803 29.341 60.7389 29.1534 59.9955 29.1534Z"
                                fill="#489AD5" />
                            <path
                                d="M79.5086 37.7138C79.8803 37.7138 80.186 37.8348 80.4258 38.0707C80.6716 38.3067 80.7915 38.6031 80.7915 38.96C80.7915 39.317 80.6716 39.6134 80.4258 39.8493C80.18 40.0853 79.8743 40.2063 79.5086 40.2063H71.0739C70.7022 40.2063 70.3965 40.0853 70.1567 39.8372C69.9109 39.5892 69.791 39.2807 69.791 38.9116V23.7148C69.791 23.3397 69.9169 23.0312 70.1687 22.7892C70.4205 22.5412 70.7502 22.4202 71.1518 22.4202C71.4875 22.4202 71.7873 22.5412 72.0451 22.7892C72.3028 23.0372 72.4347 23.3458 72.4347 23.7148V38.1494L71.9072 37.7198H79.5086V37.7138Z"
                                fill="#ED5A23" />
                            <path
                                d="M94.3338 33.5213C94.3338 34.8765 94.04 36.0743 93.4525 37.1149C92.865 38.1554 92.0677 38.9721 91.0606 39.565C90.0535 40.1579 88.9204 40.4543 87.6615 40.4543C86.4026 40.4543 85.2696 40.1579 84.2625 39.565C83.2553 38.9721 82.452 38.1554 81.8586 37.1149C81.2651 36.0743 80.9653 34.8765 80.9653 33.5213C80.9653 32.1481 81.2651 30.9442 81.8586 29.9036C82.452 28.8631 83.2553 28.0403 84.2625 27.4414C85.2696 26.8425 86.4026 26.54 87.6615 26.54C88.9204 26.54 90.0535 26.8425 91.0606 27.4414C92.0677 28.0403 92.865 28.8631 93.4525 29.9036C94.04 30.9442 94.3338 32.1541 94.3338 33.5213ZM91.8159 33.5213C91.8159 32.5897 91.6301 31.779 91.2644 31.0954C90.8927 30.4118 90.3952 29.8734 89.7657 29.4802C89.1363 29.093 88.4349 28.8933 87.6615 28.8933C86.8882 28.8933 86.1868 29.0869 85.5454 29.4802C84.9099 29.8673 84.4064 30.4058 84.0347 31.0954C83.663 31.779 83.4831 32.5897 83.4831 33.5213C83.4831 34.4167 83.669 35.2153 84.0347 35.911C84.4064 36.6067 84.9099 37.1451 85.5454 37.5383C86.1808 37.9255 86.8882 38.1252 87.6615 38.1252C88.4349 38.1252 89.1363 37.9316 89.7657 37.5383C90.3952 37.1512 90.8927 36.6067 91.2644 35.911C91.6361 35.2153 91.8159 34.4228 91.8159 33.5213Z"
                                fill="#ED5A23" />
                            <path
                                d="M105.286 26.8425C105.64 26.8425 105.934 26.9635 106.179 27.2115C106.425 27.4596 106.545 27.7681 106.545 28.1371V34.822C106.545 36.5825 106.06 37.9618 105.082 38.9479C104.111 39.9401 102.732 40.4362 100.952 40.4362C99.1715 40.4362 97.7987 39.9401 96.8336 38.9479C95.8684 37.9558 95.3828 36.5825 95.3828 34.822V28.1371C95.3828 27.7621 95.5027 27.4535 95.7485 27.2115C95.9943 26.9635 96.3 26.8425 96.6657 26.8425C97.0194 26.8425 97.3131 26.9635 97.5589 27.2115C97.8047 27.4596 97.9246 27.7681 97.9246 28.1371V34.822C97.9246 35.9231 98.1824 36.7458 98.692 37.2843C99.2015 37.8287 99.9569 38.0949 100.946 38.0949C101.953 38.0949 102.714 37.8227 103.224 37.2843C103.734 36.7398 103.991 35.9231 103.991 34.822V28.1371C103.991 27.7621 104.111 27.4535 104.357 27.2115C104.615 26.9635 104.921 26.8425 105.286 26.8425Z"
                                fill="#ED5A23" />
                            <path
                                d="M115.106 26.534C116.299 26.534 117.222 26.782 117.875 27.2841C118.529 27.7863 118.984 28.4517 119.248 29.2926C119.506 30.1335 119.638 31.0652 119.638 32.0997V38.9116C119.638 39.2867 119.518 39.5952 119.272 39.8372C119.026 40.0853 118.733 40.2062 118.379 40.2062C118.007 40.2062 117.702 40.0853 117.462 39.8372C117.216 39.5892 117.096 39.2806 117.096 38.9116V32.1299C117.096 31.5189 117.012 30.9744 116.844 30.4905C116.676 30.0065 116.389 29.6254 115.987 29.335C115.585 29.0446 115.016 28.9054 114.273 28.9054C113.583 28.9054 112.978 29.0506 112.462 29.335C111.941 29.6254 111.533 30.0065 111.239 30.4905C110.945 30.9744 110.802 31.5189 110.802 32.1299V38.9116C110.802 39.2867 110.682 39.5952 110.436 39.8372C110.19 40.0853 109.896 40.2062 109.543 40.2062C109.171 40.2062 108.865 40.0853 108.625 39.8372C108.38 39.5892 108.26 39.2806 108.26 38.9116V28.1371C108.26 27.7621 108.38 27.4535 108.625 27.2115C108.871 26.9635 109.177 26.8425 109.543 26.8425C109.896 26.8425 110.19 26.9635 110.436 27.2115C110.682 27.4596 110.802 27.7681 110.802 28.1371V29.5588L110.346 29.8129C110.466 29.4378 110.67 29.0627 110.963 28.6816C111.257 28.3005 111.611 27.9435 112.037 27.6169C112.456 27.2841 112.924 27.024 113.445 26.8304C113.967 26.6368 114.518 26.534 115.106 26.534Z"
                                fill="#ED5A23" />
                            <path
                                d="M126.892 26.534C127.599 26.534 128.252 26.655 128.858 26.8909C129.463 27.1268 129.985 27.4293 130.429 27.7923C130.872 28.1553 131.22 28.5364 131.472 28.9236C131.723 29.3108 131.849 29.6496 131.849 29.9399L131.298 29.9641V27.9314C131.298 27.5745 131.418 27.272 131.651 27.0179C131.885 26.7639 132.191 26.6368 132.557 26.6368C132.928 26.6368 133.228 26.7578 133.462 27.0058C133.696 27.2539 133.816 27.5624 133.816 27.9314V39.1597C133.816 40.5813 133.516 41.7489 132.91 42.6564C132.305 43.5638 131.502 44.2293 130.506 44.6528C129.505 45.0763 128.414 45.288 127.221 45.288C126.802 45.288 126.304 45.2336 125.735 45.1247C125.165 45.0158 124.638 44.8827 124.164 44.7314C123.684 44.5802 123.355 44.4289 123.169 44.2717C122.785 44.066 122.527 43.83 122.401 43.5578C122.276 43.2856 122.27 43.0133 122.389 42.7471C122.539 42.3721 122.761 42.1482 123.055 42.0635C123.349 41.9788 123.678 42.003 124.05 42.1422C124.2 42.1906 124.458 42.2874 124.817 42.4205C125.177 42.5535 125.579 42.6806 126.016 42.7895C126.454 42.8984 126.862 42.9528 127.251 42.9528C128.576 42.9528 129.583 42.6382 130.273 42.0151C130.962 41.386 131.304 40.539 131.304 39.4743V37.1875L131.58 37.3629C131.532 37.7017 131.37 38.0526 131.1 38.4156C130.83 38.7785 130.488 39.1113 130.081 39.4198C129.667 39.7223 129.194 39.9764 128.648 40.17C128.103 40.3636 127.545 40.4604 126.976 40.4604C125.783 40.4604 124.715 40.1579 123.768 39.5589C122.821 38.96 122.072 38.1373 121.526 37.0967C120.981 36.0562 120.711 34.8583 120.711 33.5032C120.711 32.1481 120.981 30.9502 121.526 29.9097C122.072 28.8691 122.815 28.0464 123.756 27.4475C124.686 26.8365 125.735 26.534 126.892 26.534ZM127.269 28.8994C126.448 28.8994 125.723 29.099 125.105 29.4983C124.482 29.8976 123.996 30.4421 123.642 31.1378C123.289 31.8335 123.115 32.62 123.115 33.5032C123.115 34.3865 123.289 35.1729 123.642 35.8686C123.996 36.5644 124.482 37.1149 125.105 37.5202C125.729 37.9255 126.448 38.1312 127.269 38.1312C128.073 38.1312 128.786 37.9316 129.409 37.5323C130.033 37.133 130.518 36.5825 130.872 35.8807C131.226 35.179 131.4 34.3865 131.4 33.5032C131.4 32.62 131.226 31.8335 130.872 31.1378C130.518 30.4421 130.033 29.8976 129.409 29.4983C128.786 29.099 128.073 28.8994 127.269 28.8994Z"
                                fill="#ED5A23" />
                            <path
                                d="M141.723 40.4603C140.332 40.4603 139.121 40.17 138.096 39.5831C137.071 38.9963 136.279 38.1917 135.716 37.1693C135.152 36.1469 134.871 34.9733 134.871 33.6484C134.871 32.1602 135.17 30.8837 135.764 29.825C136.357 28.7663 137.137 27.9556 138.096 27.387C139.055 26.8183 140.068 26.534 141.141 26.534C141.962 26.534 142.742 26.6973 143.485 27.03C144.223 27.3628 144.882 27.8165 145.463 28.4033C146.045 28.9901 146.501 29.6738 146.836 30.4602C147.172 31.2467 147.346 32.1057 147.364 33.0374C147.346 33.3762 147.214 33.6544 146.962 33.8783C146.71 34.0961 146.417 34.211 146.081 34.211H136.285L135.68 32.0513H145.146L144.666 32.5111V31.8758C144.618 31.283 144.414 30.7687 144.061 30.3271C143.707 29.8855 143.275 29.5407 142.766 29.2866C142.256 29.0325 141.711 28.9054 141.141 28.9054C140.638 28.9054 140.152 28.9841 139.69 29.1474C139.229 29.3108 138.815 29.5649 138.456 29.9218C138.096 30.2787 137.808 30.7445 137.598 31.3314C137.388 31.9182 137.287 32.6381 137.287 33.5032C137.287 34.4349 137.478 35.2455 137.868 35.9412C138.252 36.6369 138.773 37.1754 139.427 37.5565C140.08 37.9376 140.805 38.1312 141.591 38.1312C142.214 38.1312 142.718 38.0707 143.113 37.9437C143.509 37.8166 143.845 37.6593 144.121 37.4718C144.396 37.2843 144.636 37.1088 144.84 36.9394C145.092 36.7882 145.338 36.7095 145.571 36.7095C145.889 36.7095 146.153 36.8184 146.351 37.0241C146.555 37.2359 146.65 37.4839 146.65 37.7743C146.65 38.1494 146.465 38.4881 146.099 38.7906C145.643 39.2323 145.02 39.6194 144.223 39.9582C143.431 40.291 142.592 40.4603 141.723 40.4603Z"
                                fill="#ED5A23" />
                            <path
                                d="M103.53 5.05149C71.0319 4.8821 40.3144 9.57666 11.1436 18.4818C7.97839 19.4498 5.10088 21.2707 2.9907 23.8358C-4.54478 32.9708 2.49912 45.0278 20.2977 42.3781C24.0745 41.8155 27.5215 39.7162 29.4998 36.4191C31.8557 32.4868 31.4961 28.4093 27.0239 25.318C26.1787 24.7311 25.2614 24.2653 24.3203 23.866C21.8624 22.8194 15.5798 20.1394 15.5798 20.1394C36.0761 11.561 103.17 4.16219 103.53 5.05149ZM23.7028 37.1814C21.9943 38.5063 19.8721 39.1536 17.72 39.2746C1.74977 40.2062 0.0892074 27.8649 10.6161 22.3113C10.6161 22.3113 18.3075 25.8685 20.4356 26.8546C20.7953 27.024 21.167 27.1692 21.5387 27.3204C28.139 29.9641 27.2997 34.3864 23.7028 37.1814Z"
                                fill="#489AD5" />
                            <path
                                d="M13.2659 17.8406C11.9111 14.2652 15.9216 9.70978 21.3949 9.2863C21.7666 9.25605 22.1323 9.2258 22.5039 9.1895C24.5122 9.02011 26.4785 9.58273 28.4148 10.6656C28.7685 10.8653 29.1762 10.95 29.5838 10.8955C31.3043 10.6475 31.724 8.34859 30.2133 7.47744C27.5755 5.95291 24.6441 5.233 21.3769 5.46289C19.3806 5.60203 17.4263 6.13441 15.6159 6.99346C11.1677 9.11086 8.4341 13.1097 9.18945 19.2078"
                                fill="#489AD5" />
                        </svg>
                    </div>
                    <ul class="sidebarIconList">
                        <li>
                            <a href="{{ route('userpanel.notifications') }}" class="">
                                <i class="fa-solid fa-bell"></i></a>
                        </li>
                        <li class="header__item-list">
                            <a href="{{ route('userpanel.support') }}" class="header__item-link">
                                <i class="fa-solid fa-gear header__item-icon"></i></a>
                        </li>
                        <li>
                            <a href="{{ route('userpanel.faq') }}">
                                <i class="fa-solid fa-circle-question"></i></a>
                        </li>
                        <li>
                            <a href="{{ route('userpanel.locations') }}">
                                <i class="fa-solid fa-globe"></i></a>
                        </li>
                        <li>
                            <a href="{{ route('userpanel.calculator') }}">
                                <i class="fas fa-calculator-alt"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navigation__items">

                        <button onclick="window.open('{{ route('userpanel.mainmenu') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'mainmenu') active-link-hm @endif">
                            <li class="navigation__item">
                                <a class="navigation__link">
                                    <i class="fa-solid fa-house navigation__icon"></i>
                                    <span class="navigation__span ">Main Page</span>
                                </a>
                            </li>
                        </button>


                        <button onclick="window.open('{{ route('userpanel.balance') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'balance') active-link-hm @endif">
                            <li class=" navigation__item">
                                <a class="navigation__link"><i class="fa-solid fa-network-wired navigation__icon"></i>
                                    <span class="navigation__span">Balance System</span></a>
                            </li>
                        </button>

                        <button onclick="window.open('{{ route('userpanel.transactions') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'transactions') active-link-hm @endif">
                            <li class=" navigation__item">
                                <a class="navigation__link"><i class="fa-solid fa-network-wired navigation__icon"></i>
                                    <span class="navigation__span">Transactions</span></a>
                            </li>
                        </button>

                        <div class="">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link">
                                    <span class="navigation__span">Orders</span></a>
                            </li>
                        </div>

                        <button onclick="window.open('{{ route('userpanel.manualorder') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'manualorder') active-link-hm @endif">
                            <li class=" navigation__item">
                                <a class="navigation__link"><i
                                        class="fa-solid fa-hand-holding-dollar navigation__icon"></i>
                                    <span class="navigation__span">Manuel Order</span></a>
                            </li>
                        </button>

                        <button class="navigation__box ps-2 @if (Request::segment(2) == 'amazon_order') active-link-hm @endif"
                            onclick="window.open('{{ route('userpanel.amazon_order') }}' , '_self')">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-brands fa-amazon navigation__icon"></i>
                                    <span class="navigation__span">Amazon</span></a>
                            </li>
                        </button>
                        <button class="navigation__box ps-2 @if (Request::segment(2) == 'bulk_order') active-link-hm @endif"
                            onclick="window.open('{{ route('userpanel.bulk_order') }}' , '_self')">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-solid fa-cart-shopping navigation__icon"></i>
                                    <span class="navigation__span">Bulk Order</span></a>
                            </li>
                        </button>
                        <button onclick="window.open('{{ route('userpanel.cargorequests') }}' , '_self')"
                            class="navigation__box ps-2 @if (Request::segment(2) == 'cargorequests') active-link-hm @endif">
                            <li class="navigation__item">
                                <a class="navigation__link"><i
                                        class="fa-solid fa-clipboard-list navigation__icon"></i>
                                    <span class="navigation__span">Order List</span></a>
                            </li>
                        </button>

                        <hr class="hr">

                        <div class="">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link">
                                    <span class="navigation__span">Special</span></a>
                            </li>
                        </div>

                        <button onclick="window.open('{{ route('userpanel.get_special_offer') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'get_special_offer') active-link-hm @endif">
                            <li class=" navigation__item">
                                <a class="navigation__link"><i
                                        class="fa-solid fa-hand-holding-dollar navigation__icon"></i>
                                    <span class="navigation__span">Get Special Offer</span></a>
                            </li>
                        </button>

                        <button onclick="window.open('{{ route('userpanel.special_offers') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'special_offers') active-link-hm @endif">
                            <li class=" navigation__item">
                                <a class="navigation__link"><i
                                        class="fa-solid fa-hand-holding-dollar navigation__icon"></i>
                                    <span class="navigation__span">Your special offers</span></a>
                            </li>
                        </button>

                        <hr class="hr">

                        <button onclick="window.open('{{ route('userpanel.courier_request') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'courier_request') active-link-hm @endif">
                            <li class="navigation__item">
                                <a class="navigation__link"><i class="fa-solid fa-headset navigation__icon"></i>
                                    <span class="navigation__span">Courier Request</span>
                                </a>
                            </li>
                        </button>
                        {{-- <button class="navigation__box btn disabled">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-solid fa-boxes-stacked navigation__icon"></i>
                                    <span class="navigation__span">Stock</span></a>
                            </li>
                        </button> --}}
                        {{-- <button class="navigation__box btn disabled">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-solid fa-file-invoice-dollar navigation__icon"></i>
                                    <span class="navigation__span">Invoices</span></a>
                            </li>
                        </button> --}}
                        <button class="navigation__box @if (Request::segment(2) == 'siteusage') active-link-hm @endif"
                            onclick="window.open('{{ route('userpanel.siteusage') }}' , '_self')">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-solid fa-address-card navigation__icon"></i>
                                    <span class="navigation__span">Site Usage</span></a>
                            </li>
                        </button>
                        <button class="navigation__box @if (Request::segment(2) == 'buyforme') active-link-hm @endif"
                            onclick="window.open('{{ route('userpanel.buyforme') }}' , '_self')">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-solid fa-bag-shopping navigation__icon"></i>
                                    <span class="navigation__span">Buy for me</span></a>
                            </li>
                        </button>
                        <button onclick="window.open('{{ route('userpanel.share_and_earn') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'share_and_earn') active-link-hm @endif">
                            <li class=" navigation__item">
                                <a class="navigation__link"><i class="fa-solid fa-network-wired navigation__icon"></i>
                                    <span class="navigation__span">Share and Earn</span></a>
                            </li>
                        </button>
                        {{-- <button class="navigation__box btn disabled">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-solid fa-cart-flatbed navigation__icon"></i>
                                    <span class="navigation__span">Inventory</span></a>
                            </li>
                        </button> --}}
                        <button onclick="window.open('{{ route('userpanel.cargo_companies') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'cargo_companies') active-link-hm @endif">
                            <li class="navigation__item">
                                <a class="navigation__link"><i
                                        class="fa-solid fa-truck-ramp-box navigation__icon"></i>
                                    <span class="navigation__span">Cargo Companies</span></a>
                            </li>
                        </button>

                        <div class="">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link">
                                    <span class="navigation__span">Integrations</span></a>
                            </li>
                        </div>

                        {{-- <button class="navigation__box btn disabled">
                            <li class="navigation__item">
                                <a href="#" class="navigation__link"><i
                                        class="fa-solid fa-parachute-box navigation__icon"></i>
                                    <span class="navigation__span">Parachute</span></a>
                            </li>
                        </button> --}}
                        <button onclick="window.open('{{ route('userpanel.marketplace') }}' , '_self')"
                            class="navigation__box @if (Request::segment(2) == 'marketplace') active-link-hm @endif">
                            <li class="navigation__item">
                                <a class="navigation__link navigation__icon"><i
                                        class="fa-solid fa-store  navigation__icon"></i>
                                    <span class="navigation__span">Marketplace</span></a>
                            </li>
                        </button>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="header-section scrollheader" data-sticky="true">
            <div class="container header">
                <div class="col-md-6">
                    <div class="header__input">
                        {{-- <i class="fa-solid fa-magnifying-glass header__input-icon"></i>
                        <input class="header__input-search" type="text" placeholder="Axtar..." /> --}}
                    </div>
                </div>

                <div class="col-md-6">
                    <div>
                        <ul class="header__item">
                            <li class="header__item-list">
                                <div onclick="window.open('{{ route('userpanel.balance') }}' , '_self')"
                                    class="balance_bar_in_header balance_bar_{{ Auth::user()->balance < 0 ? 'red' : 'green' }}">
                                    Balance: {{ Auth::user()->balance }} €
                                </div>
                            </li>
                            <li class="header__item-list">
                                <a href="{{ route('userpanel.notifications') }}" class="header__item-link">
                                    <i class="fa-solid fa-bell header__item-icon"></i></a>
                            </li>
                            <li class="header__item-list">
                                <a href="{{ route('userpanel.support') }}" class="header__item-link">
                                    <i class="fa-solid fa-gear header__item-icon"></i></a>
                            </li>
                            <li class="header__item-list">
                                <a href="{{ route('userpanel.faq') }}" class="header__item-link">
                                    <i class="fa-solid fa-circle-question header__item-icon"></i></a>
                            </li>
                            <li class="header__item-list">
                                <a href="{{ route('userpanel.locations') }}" class="header__item-link">
                                    <i class="fa-solid fa-globe header__item-icon"></i></a>
                            </li>
                            <li class="header__item-list">
                                <a href="{{ route('userpanel.calculator') }}" class="header__item-link">
                                    <i class="fas fa-calculator-alt"></i>
                                </a>
                            </li>
                            <li class="header__item-list">
                                <a href="{{ route('userpanel.index') }}"
                                    class="header__item-link header__account-guest">
                                    {{ Auth::user()->name }}
                                    <i class="fa-solid fa-user header__item-icon header__account-icon"></i></a>
                            </li>
                            <li class="header__item-list">
                                <a href="{{ route('userpanel.logout_user') }}"
                                    class="header__item-link header__account-guest"><i
                                        class="fa-solid fa-right-from-bracket"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <nav class="fnav">
            <div class="fnav__box">
                <div class="fnav__burger">
                    <span class="fnav__line  fnav__top">

                    </span>
                    <span class="fnav__line  fnav__center">

                    </span>
                    <span class="fnav__line  fnav__bottom">

                    </span>
                </div>

                <div class="header__input">
                    {{-- <i class="fa-solid fa-magnifying-glass header__input-icon"></i>
                    <input class="header__input-search" type="text" placeholder="Axtar..." /> --}}
                </div>


                <div class="navigation__logo text-center">
                    <div class="mobile-header-cont-hm">
                        <div class="">
                            <div onclick="window.open('{{ route('userpanel.balance') }}' , '_self')"
                                class="balance_bar_in_header balance_bar_{{ Auth::user()->balance < 0 ? 'red' : 'green' }}">
                                Balance: {{ Auth::user()->balance }} €
                            </div>
                        </div>
                        <div class="">
                            <a href="{{ route('userpanel.index') }}">
                                {{ Auth::user()->name }}
                                <i class="fa-solid fa-user header__item-icon header__account-icon"></i>
                            </a>
                        </div>
                        <div class="">
                            <a href="{{ route('userpanel.logout_user') }}">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </div>
                        </ul>
                    </div>

                </div>
        </nav>
        <section id="Sturcture" class="structure">
            <div class="row w-100">
                <div class="col-lg-3 page__1">
                    <nav class="navigation__left">
                        <div class="navigation container">
                            <div class="navigation__logo text-center"
                                onclick="window.open('{{ route('index') }}' , '_self')">
                                <svg width="148" height="46" viewBox="0 0 148 46" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M103.53 0L115.885 3.53302L104.735 9.95174L105.844 4.56752L103.53 0Z"
                                        fill="#ED5A23" />
                                    <path
                                        d="M39.7811 26.3585C40.992 26.3585 41.9092 26.6186 42.5387 27.145C43.1681 27.6713 43.5998 28.367 43.8335 29.2382C44.0673 30.1093 44.1872 31.0773 44.1872 32.1481V38.6515C44.1872 39.0931 44.0434 39.4621 43.7616 39.7586C43.4739 40.055 43.1142 40.2062 42.6765 40.2062C42.2389 40.2062 41.8792 40.055 41.5915 39.7586C41.3037 39.4621 41.1659 39.0931 41.1659 38.6515V32.1481C41.1659 31.5915 41.0999 31.0833 40.962 30.6356C40.8301 30.188 40.5844 29.825 40.2307 29.5527C39.877 29.2805 39.3734 29.1474 38.72 29.1474C38.0845 29.1474 37.539 29.2805 37.0834 29.5527C36.6278 29.825 36.2921 30.1819 36.0643 30.6356C35.8365 31.0833 35.7226 31.5915 35.7226 32.1481V38.6515C35.7226 39.0931 35.5787 39.4621 35.2969 39.7586C35.0092 40.055 34.6495 40.2062 34.2119 40.2062C33.7742 40.2062 33.4146 40.055 33.1268 39.7586C32.8391 39.4621 32.7012 39.0931 32.7012 38.6515V22.9525C32.7012 22.5109 32.845 22.1419 33.1268 21.8454C33.4146 21.549 33.7742 21.4038 34.2119 21.4038C34.6495 21.4038 35.0092 21.555 35.2969 21.8454C35.5847 22.1419 35.7226 22.5109 35.7226 22.9525V29.2563L35.3449 29.1777C35.4948 28.8873 35.7046 28.5787 35.9743 28.2521C36.2441 27.9193 36.5678 27.6108 36.9575 27.3265C37.3412 27.0361 37.7728 26.8062 38.2404 26.6247C38.714 26.4492 39.2235 26.3585 39.7811 26.3585Z"
                                        fill="#489AD5" />
                                    <path
                                        d="M48.7673 24.961C48.1978 24.961 47.7961 24.8703 47.5563 24.6827C47.3225 24.4952 47.2026 24.1685 47.2026 23.6906V23.2066C47.2026 22.7166 47.3345 22.3839 47.5923 22.2024C47.8501 22.0269 48.2517 21.9362 48.7913 21.9362C49.3788 21.9362 49.7924 22.0269 50.0262 22.2145C50.26 22.402 50.3799 22.7287 50.3799 23.2066V23.6906C50.3799 24.1806 50.254 24.5134 50.0022 24.6948C49.7504 24.8703 49.3368 24.961 48.7673 24.961ZM50.302 38.6575C50.302 39.0992 50.1581 39.4682 49.8763 39.7646C49.5886 40.0611 49.2289 40.2123 48.7913 40.2123C48.3536 40.2123 47.994 40.0611 47.7062 39.7646C47.4185 39.4682 47.2806 39.0992 47.2806 38.6575V28.1613C47.2806 27.7197 47.4244 27.3507 47.7062 27.0542C47.994 26.7578 48.3536 26.6065 48.7913 26.6065C49.2289 26.6065 49.5886 26.7578 49.8763 27.0542C50.1641 27.3507 50.302 27.7197 50.302 28.1613V38.6575Z"
                                        fill="#489AD5" />
                                    <path
                                        d="M60.3732 26.3585C61.5482 26.3585 62.6033 26.661 63.5325 27.2599C64.4617 27.8588 65.205 28.6876 65.7506 29.7342C66.2961 30.7869 66.5658 32.0029 66.5658 33.3943C66.5658 34.7857 66.2901 36.0078 65.7506 37.0664C65.205 38.1251 64.4737 38.9539 63.5624 39.5589C62.6452 40.1578 61.6201 40.4603 60.4811 40.4603C59.8097 40.4603 59.1802 40.3514 58.5927 40.1276C58.0053 39.9098 57.4897 39.6255 57.0461 39.2867C56.6025 38.9479 56.2548 38.6031 56.015 38.2582C55.7692 37.9134 55.6493 37.617 55.6493 37.381L56.4286 37.0483V43.7332C56.4286 44.1748 56.2847 44.5439 56.003 44.8403C55.7152 45.1367 55.3555 45.288 54.9179 45.288C54.4803 45.288 54.1206 45.1428 53.8329 44.8585C53.5451 44.5681 53.4072 44.199 53.4072 43.7393V28.1613C53.4072 27.7197 53.5511 27.3506 53.8329 27.0542C54.1206 26.7578 54.4803 26.6065 54.9179 26.6065C55.3555 26.6065 55.7152 26.7578 56.003 27.0542C56.2907 27.3506 56.4286 27.7197 56.4286 28.1613V29.4075L56.003 29.1776C56.003 28.9599 56.1229 28.6937 56.3567 28.3791C56.5905 28.0645 56.9082 27.7499 57.3159 27.4414C57.7175 27.1268 58.1851 26.8727 58.7126 26.667C59.2282 26.4613 59.7857 26.3585 60.3732 26.3585ZM59.9955 29.1534C59.2582 29.1534 58.6107 29.341 58.0592 29.71C57.5077 30.0851 57.0701 30.5872 56.7643 31.2224C56.4526 31.8577 56.2967 32.5836 56.2967 33.3943C56.2967 34.1928 56.4526 34.9128 56.7643 35.5661C57.0761 36.2195 57.5077 36.7337 58.0592 37.1027C58.6107 37.4778 59.2582 37.6593 59.9955 37.6593C60.7329 37.6593 61.3743 37.4718 61.9199 37.1027C62.4654 36.7277 62.891 36.2195 63.2028 35.5661C63.5145 34.9128 63.6704 34.1928 63.6704 33.3943C63.6704 32.5836 63.5145 31.8577 63.2028 31.2224C62.891 30.5872 62.4654 30.0851 61.9199 29.71C61.3803 29.341 60.7389 29.1534 59.9955 29.1534Z"
                                        fill="#489AD5" />
                                    <path
                                        d="M79.5086 37.7138C79.8803 37.7138 80.186 37.8348 80.4258 38.0707C80.6716 38.3067 80.7915 38.6031 80.7915 38.96C80.7915 39.317 80.6716 39.6134 80.4258 39.8493C80.18 40.0853 79.8743 40.2063 79.5086 40.2063H71.0739C70.7022 40.2063 70.3965 40.0853 70.1567 39.8372C69.9109 39.5892 69.791 39.2807 69.791 38.9116V23.7148C69.791 23.3397 69.9169 23.0312 70.1687 22.7892C70.4205 22.5412 70.7502 22.4202 71.1518 22.4202C71.4875 22.4202 71.7873 22.5412 72.0451 22.7892C72.3028 23.0372 72.4347 23.3458 72.4347 23.7148V38.1494L71.9072 37.7198H79.5086V37.7138Z"
                                        fill="#ED5A23" />
                                    <path
                                        d="M94.3338 33.5213C94.3338 34.8765 94.04 36.0743 93.4525 37.1149C92.865 38.1554 92.0677 38.9721 91.0606 39.565C90.0535 40.1579 88.9204 40.4543 87.6615 40.4543C86.4026 40.4543 85.2696 40.1579 84.2625 39.565C83.2553 38.9721 82.452 38.1554 81.8586 37.1149C81.2651 36.0743 80.9653 34.8765 80.9653 33.5213C80.9653 32.1481 81.2651 30.9442 81.8586 29.9036C82.452 28.8631 83.2553 28.0403 84.2625 27.4414C85.2696 26.8425 86.4026 26.54 87.6615 26.54C88.9204 26.54 90.0535 26.8425 91.0606 27.4414C92.0677 28.0403 92.865 28.8631 93.4525 29.9036C94.04 30.9442 94.3338 32.1541 94.3338 33.5213ZM91.8159 33.5213C91.8159 32.5897 91.6301 31.779 91.2644 31.0954C90.8927 30.4118 90.3952 29.8734 89.7657 29.4802C89.1363 29.093 88.4349 28.8933 87.6615 28.8933C86.8882 28.8933 86.1868 29.0869 85.5454 29.4802C84.9099 29.8673 84.4064 30.4058 84.0347 31.0954C83.663 31.779 83.4831 32.5897 83.4831 33.5213C83.4831 34.4167 83.669 35.2153 84.0347 35.911C84.4064 36.6067 84.9099 37.1451 85.5454 37.5383C86.1808 37.9255 86.8882 38.1252 87.6615 38.1252C88.4349 38.1252 89.1363 37.9316 89.7657 37.5383C90.3952 37.1512 90.8927 36.6067 91.2644 35.911C91.6361 35.2153 91.8159 34.4228 91.8159 33.5213Z"
                                        fill="#ED5A23" />
                                    <path
                                        d="M105.286 26.8425C105.64 26.8425 105.934 26.9635 106.179 27.2115C106.425 27.4596 106.545 27.7681 106.545 28.1371V34.822C106.545 36.5825 106.06 37.9618 105.082 38.9479C104.111 39.9401 102.732 40.4362 100.952 40.4362C99.1715 40.4362 97.7987 39.9401 96.8336 38.9479C95.8684 37.9558 95.3828 36.5825 95.3828 34.822V28.1371C95.3828 27.7621 95.5027 27.4535 95.7485 27.2115C95.9943 26.9635 96.3 26.8425 96.6657 26.8425C97.0194 26.8425 97.3131 26.9635 97.5589 27.2115C97.8047 27.4596 97.9246 27.7681 97.9246 28.1371V34.822C97.9246 35.9231 98.1824 36.7458 98.692 37.2843C99.2015 37.8287 99.9569 38.0949 100.946 38.0949C101.953 38.0949 102.714 37.8227 103.224 37.2843C103.734 36.7398 103.991 35.9231 103.991 34.822V28.1371C103.991 27.7621 104.111 27.4535 104.357 27.2115C104.615 26.9635 104.921 26.8425 105.286 26.8425Z"
                                        fill="#ED5A23" />
                                    <path
                                        d="M115.106 26.534C116.299 26.534 117.222 26.782 117.875 27.2841C118.529 27.7863 118.984 28.4517 119.248 29.2926C119.506 30.1335 119.638 31.0652 119.638 32.0997V38.9116C119.638 39.2867 119.518 39.5952 119.272 39.8372C119.026 40.0853 118.733 40.2062 118.379 40.2062C118.007 40.2062 117.702 40.0853 117.462 39.8372C117.216 39.5892 117.096 39.2806 117.096 38.9116V32.1299C117.096 31.5189 117.012 30.9744 116.844 30.4905C116.676 30.0065 116.389 29.6254 115.987 29.335C115.585 29.0446 115.016 28.9054 114.273 28.9054C113.583 28.9054 112.978 29.0506 112.462 29.335C111.941 29.6254 111.533 30.0065 111.239 30.4905C110.945 30.9744 110.802 31.5189 110.802 32.1299V38.9116C110.802 39.2867 110.682 39.5952 110.436 39.8372C110.19 40.0853 109.896 40.2062 109.543 40.2062C109.171 40.2062 108.865 40.0853 108.625 39.8372C108.38 39.5892 108.26 39.2806 108.26 38.9116V28.1371C108.26 27.7621 108.38 27.4535 108.625 27.2115C108.871 26.9635 109.177 26.8425 109.543 26.8425C109.896 26.8425 110.19 26.9635 110.436 27.2115C110.682 27.4596 110.802 27.7681 110.802 28.1371V29.5588L110.346 29.8129C110.466 29.4378 110.67 29.0627 110.963 28.6816C111.257 28.3005 111.611 27.9435 112.037 27.6169C112.456 27.2841 112.924 27.024 113.445 26.8304C113.967 26.6368 114.518 26.534 115.106 26.534Z"
                                        fill="#ED5A23" />
                                    <path
                                        d="M126.892 26.534C127.599 26.534 128.252 26.655 128.858 26.8909C129.463 27.1268 129.985 27.4293 130.429 27.7923C130.872 28.1553 131.22 28.5364 131.472 28.9236C131.723 29.3108 131.849 29.6496 131.849 29.9399L131.298 29.9641V27.9314C131.298 27.5745 131.418 27.272 131.651 27.0179C131.885 26.7639 132.191 26.6368 132.557 26.6368C132.928 26.6368 133.228 26.7578 133.462 27.0058C133.696 27.2539 133.816 27.5624 133.816 27.9314V39.1597C133.816 40.5813 133.516 41.7489 132.91 42.6564C132.305 43.5638 131.502 44.2293 130.506 44.6528C129.505 45.0763 128.414 45.288 127.221 45.288C126.802 45.288 126.304 45.2336 125.735 45.1247C125.165 45.0158 124.638 44.8827 124.164 44.7314C123.684 44.5802 123.355 44.4289 123.169 44.2717C122.785 44.066 122.527 43.83 122.401 43.5578C122.276 43.2856 122.27 43.0133 122.389 42.7471C122.539 42.3721 122.761 42.1482 123.055 42.0635C123.349 41.9788 123.678 42.003 124.05 42.1422C124.2 42.1906 124.458 42.2874 124.817 42.4205C125.177 42.5535 125.579 42.6806 126.016 42.7895C126.454 42.8984 126.862 42.9528 127.251 42.9528C128.576 42.9528 129.583 42.6382 130.273 42.0151C130.962 41.386 131.304 40.539 131.304 39.4743V37.1875L131.58 37.3629C131.532 37.7017 131.37 38.0526 131.1 38.4156C130.83 38.7785 130.488 39.1113 130.081 39.4198C129.667 39.7223 129.194 39.9764 128.648 40.17C128.103 40.3636 127.545 40.4604 126.976 40.4604C125.783 40.4604 124.715 40.1579 123.768 39.5589C122.821 38.96 122.072 38.1373 121.526 37.0967C120.981 36.0562 120.711 34.8583 120.711 33.5032C120.711 32.1481 120.981 30.9502 121.526 29.9097C122.072 28.8691 122.815 28.0464 123.756 27.4475C124.686 26.8365 125.735 26.534 126.892 26.534ZM127.269 28.8994C126.448 28.8994 125.723 29.099 125.105 29.4983C124.482 29.8976 123.996 30.4421 123.642 31.1378C123.289 31.8335 123.115 32.62 123.115 33.5032C123.115 34.3865 123.289 35.1729 123.642 35.8686C123.996 36.5644 124.482 37.1149 125.105 37.5202C125.729 37.9255 126.448 38.1312 127.269 38.1312C128.073 38.1312 128.786 37.9316 129.409 37.5323C130.033 37.133 130.518 36.5825 130.872 35.8807C131.226 35.179 131.4 34.3865 131.4 33.5032C131.4 32.62 131.226 31.8335 130.872 31.1378C130.518 30.4421 130.033 29.8976 129.409 29.4983C128.786 29.099 128.073 28.8994 127.269 28.8994Z"
                                        fill="#ED5A23" />
                                    <path
                                        d="M141.723 40.4603C140.332 40.4603 139.121 40.17 138.096 39.5831C137.071 38.9963 136.279 38.1917 135.716 37.1693C135.152 36.1469 134.871 34.9733 134.871 33.6484C134.871 32.1602 135.17 30.8837 135.764 29.825C136.357 28.7663 137.137 27.9556 138.096 27.387C139.055 26.8183 140.068 26.534 141.141 26.534C141.962 26.534 142.742 26.6973 143.485 27.03C144.223 27.3628 144.882 27.8165 145.463 28.4033C146.045 28.9901 146.501 29.6738 146.836 30.4602C147.172 31.2467 147.346 32.1057 147.364 33.0374C147.346 33.3762 147.214 33.6544 146.962 33.8783C146.71 34.0961 146.417 34.211 146.081 34.211H136.285L135.68 32.0513H145.146L144.666 32.5111V31.8758C144.618 31.283 144.414 30.7687 144.061 30.3271C143.707 29.8855 143.275 29.5407 142.766 29.2866C142.256 29.0325 141.711 28.9054 141.141 28.9054C140.638 28.9054 140.152 28.9841 139.69 29.1474C139.229 29.3108 138.815 29.5649 138.456 29.9218C138.096 30.2787 137.808 30.7445 137.598 31.3314C137.388 31.9182 137.287 32.6381 137.287 33.5032C137.287 34.4349 137.478 35.2455 137.868 35.9412C138.252 36.6369 138.773 37.1754 139.427 37.5565C140.08 37.9376 140.805 38.1312 141.591 38.1312C142.214 38.1312 142.718 38.0707 143.113 37.9437C143.509 37.8166 143.845 37.6593 144.121 37.4718C144.396 37.2843 144.636 37.1088 144.84 36.9394C145.092 36.7882 145.338 36.7095 145.571 36.7095C145.889 36.7095 146.153 36.8184 146.351 37.0241C146.555 37.2359 146.65 37.4839 146.65 37.7743C146.65 38.1494 146.465 38.4881 146.099 38.7906C145.643 39.2323 145.02 39.6194 144.223 39.9582C143.431 40.291 142.592 40.4603 141.723 40.4603Z"
                                        fill="#ED5A23" />
                                    <path
                                        d="M103.53 5.05149C71.0319 4.8821 40.3144 9.57666 11.1436 18.4818C7.97839 19.4498 5.10088 21.2707 2.9907 23.8358C-4.54478 32.9708 2.49912 45.0278 20.2977 42.3781C24.0745 41.8155 27.5215 39.7162 29.4998 36.4191C31.8557 32.4868 31.4961 28.4093 27.0239 25.318C26.1787 24.7311 25.2614 24.2653 24.3203 23.866C21.8624 22.8194 15.5798 20.1394 15.5798 20.1394C36.0761 11.561 103.17 4.16219 103.53 5.05149ZM23.7028 37.1814C21.9943 38.5063 19.8721 39.1536 17.72 39.2746C1.74977 40.2062 0.0892074 27.8649 10.6161 22.3113C10.6161 22.3113 18.3075 25.8685 20.4356 26.8546C20.7953 27.024 21.167 27.1692 21.5387 27.3204C28.139 29.9641 27.2997 34.3864 23.7028 37.1814Z"
                                        fill="#489AD5" />
                                    <path
                                        d="M13.2659 17.8406C11.9111 14.2652 15.9216 9.70978 21.3949 9.2863C21.7666 9.25605 22.1323 9.2258 22.5039 9.1895C24.5122 9.02011 26.4785 9.58273 28.4148 10.6656C28.7685 10.8653 29.1762 10.95 29.5838 10.8955C31.3043 10.6475 31.724 8.34859 30.2133 7.47744C27.5755 5.95291 24.6441 5.233 21.3769 5.46289C19.3806 5.60203 17.4263 6.13441 15.6159 6.99346C11.1677 9.11086 8.4341 13.1097 9.18945 19.2078"
                                        fill="#489AD5" />
                                </svg>
                            </div>

                            <div style="display:flex;justify-content:center;margin-top:20px;gap:10px;">
                                @if (Auth::user()->is_admin == 1)
                                    <a class="btn btn-outline-info" href="{{ route('admin.index') }}"
                                        style="font-size:15px;">
                                        Admin Page
                                    </a>
                                @endif
                                <a class="btn btn-outline-info" style="font-size:15px;cursor:default">
                                    User ID: 010{{ Auth::user()->id }}20
                                </a>
                            </div>
                            <div class="navigation__data">
                                <ul class="navigation__items">

                                    <button onclick="window.open('{{ route('userpanel.mainmenu') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'mainmenu') active-link-hm @endif">
                                        <li class="navigation__item">
                                            <a class="navigation__link">
                                                <i class="fa-solid fa-house navigation__icon"></i>
                                                <span class="navigation__span ">Main Page</span>
                                            </a>
                                        </li>
                                    </button>


                                    <button onclick="window.open('{{ route('userpanel.balance') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'balance') active-link-hm @endif">
                                        <li class=" navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-network-wired navigation__icon"></i>
                                                <span class="navigation__span">Balance System</span></a>
                                        </li>
                                    </button>

                                    <button onclick="window.open('{{ route('userpanel.transactions') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'transactions') active-link-hm @endif">
                                        <li class=" navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-network-wired navigation__icon"></i>
                                                <span class="navigation__span">Transactions</span></a>
                                        </li>
                                    </button>

                                    <div class="">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link">
                                                <span class="navigation__span">Orders</span></a>
                                        </li>
                                    </div>

                                    <button onclick="window.open('{{ route('userpanel.manualorder') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'manualorder') active-link-hm @endif">
                                        <li class=" navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-hand-holding-dollar navigation__icon"></i>
                                                <span class="navigation__span">Manuel Order</span></a>
                                        </li>
                                    </button>

                                    <button
                                        class="navigation__box ps-2 @if (Request::segment(2) == 'amazon_order') active-link-hm @endif"
                                        onclick="window.open('{{ route('userpanel.amazon_order') }}' , '_self')">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-brands fa-amazon navigation__icon"></i>
                                                <span class="navigation__span">Amazon</span></a>
                                        </li>
                                    </button>
                                    <button
                                        class="navigation__box ps-2 @if (Request::segment(2) == 'bulk_order') active-link-hm @endif"
                                        onclick="window.open('{{ route('userpanel.bulk_order') }}' , '_self')">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-solid fa-cart-shopping navigation__icon"></i>
                                                <span class="navigation__span">Bulk Order</span></a>
                                        </li>
                                    </button>
                                    <button onclick="window.open('{{ route('userpanel.cargorequests') }}' , '_self')"
                                        class="navigation__box ps-2 @if (Request::segment(2) == 'cargorequests') active-link-hm @endif">
                                        <li class="navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-clipboard-list navigation__icon"></i>
                                                <span class="navigation__span">Order List</span></a>
                                        </li>
                                    </button>

                                    <hr class="hr">

                                    <div class="">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link">
                                                <span class="navigation__span">Special</span></a>
                                        </li>
                                    </div>

                                    <button
                                        onclick="window.open('{{ route('userpanel.get_special_offer') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'get_special_offer') active-link-hm @endif">
                                        <li class=" navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-hand-holding-dollar navigation__icon"></i>
                                                <span class="navigation__span">Get Special Offer</span></a>
                                        </li>
                                    </button>

                                    <button onclick="window.open('{{ route('userpanel.special_offers') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'special_offers') active-link-hm @endif">
                                        <li class=" navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-hand-holding-dollar navigation__icon"></i>
                                                <span class="navigation__span">Your special offers</span></a>
                                        </li>
                                    </button>

                                    <hr class="hr">

                                    <button
                                        onclick="window.open('{{ route('userpanel.courier_request') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'courier_request') active-link-hm @endif">
                                        <li class="navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-headset navigation__icon"></i>
                                                <span class="navigation__span">Courier Request</span>
                                            </a>
                                        </li>
                                    </button>
                                    {{-- <button class="navigation__box btn disabled">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-solid fa-boxes-stacked navigation__icon"></i>
                                                <span class="navigation__span">Stock</span></a>
                                        </li>
                                    </button> --}}
                                    {{-- <button class="navigation__box btn disabled">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-solid fa-file-invoice-dollar navigation__icon"></i>
                                                <span class="navigation__span">Invoices</span></a>
                                        </li>
                                    </button> --}}
                                    <button
                                        class="navigation__box @if (Request::segment(2) == 'siteusage') active-link-hm @endif"
                                        onclick="window.open('{{ route('userpanel.siteusage') }}' , '_self')">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-solid fa-address-card navigation__icon"></i>
                                                <span class="navigation__span">Site Usage</span></a>
                                        </li>
                                    </button>
                                    <button
                                        class="navigation__box @if (Request::segment(2) == 'buyforme') active-link-hm @endif"
                                        onclick="window.open('{{ route('userpanel.buyforme') }}' , '_self')">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-solid fa-bag-shopping navigation__icon"></i>
                                                <span class="navigation__span">Buy for me</span></a>
                                        </li>
                                    </button>
                                    <button onclick="window.open('{{ route('userpanel.share_and_earn') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'share_and_earn') active-link-hm @endif">
                                        <li class=" navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-network-wired navigation__icon"></i>
                                                <span class="navigation__span">Share and Earn</span></a>
                                        </li>
                                    </button>
                                    {{-- <button class="navigation__box btn disabled">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-solid fa-cart-flatbed navigation__icon"></i>
                                                <span class="navigation__span">Inventory</span></a>
                                        </li>
                                    </button> --}}
                                    <button
                                        onclick="window.open('{{ route('userpanel.cargo_companies') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'cargo_companies') active-link-hm @endif">
                                        <li class="navigation__item">
                                            <a class="navigation__link"><i
                                                    class="fa-solid fa-truck-ramp-box navigation__icon"></i>
                                                <span class="navigation__span">Cargo Companies</span></a>
                                        </li>
                                    </button>

                                    <div class="">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link">
                                                <span class="navigation__span">Integrations</span></a>
                                        </li>
                                    </div>

                                    {{-- <button class="navigation__box btn disabled">
                                        <li class="navigation__item">
                                            <a href="#" class="navigation__link"><i
                                                    class="fa-solid fa-parachute-box navigation__icon"></i>
                                                <span class="navigation__span">Parachute</span></a>
                                        </li>
                                    </button> --}}
                                    <button onclick="window.open('{{ route('userpanel.marketplace') }}' , '_self')"
                                        class="navigation__box @if (Request::segment(2) == 'marketplace') active-link-hm @endif">
                                        <li class="navigation__item">
                                            <a class="navigation__link navigation__icon"><i
                                                    class="fa-solid fa-store  navigation__icon"></i>
                                                <span class="navigation__span">Marketplace</span></a>
                                        </li>
                                    </button>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-12 col-lg-9 content-holder-hm">
                    {{-- <div class="custom-focus-overlay active-overlay-hm"></div> --}}
                    <div class="row justify-content-center align-items-center my-3">
                        <div class="drop-box-hm">
                            <div class="d-flex align-items-center">
                                <div class="iconBG">
                                    <svg class="iconSize" width="17" height="17" viewBox="0 0 17 17"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.9123 13.2038L16.1369 12.0205C15.9768 11.776 15.6487 11.7077 15.4041 11.8679L11.0811 14.7005C10.8365 14.8607 10.7682 15.1888 10.9284 15.4333L11.7038 16.6166C11.864 16.8611 12.1921 16.9295 12.4366 16.7693L16.7597 13.9366C17.0042 13.7764 17.0726 13.4484 16.9123 13.2038Z"
                                            fill="white" />
                                        <path
                                            d="M11.8174 13.1783L13.2328 12.2508C13.8041 11.8765 14.1955 11.3021 14.3347 10.6335C14.4664 10.001 14.3639 9.31744 13.9702 8.71055C13.768 8.40195 12.0795 5.82511 11.8811 5.52232C11.6194 5.12294 11.0835 5.01134 10.6841 5.27302C10.4242 5.44334 10.2871 5.72988 10.2946 6.01933L10.1406 5.78422C9.87888 5.3849 9.34287 5.27325 8.9436 5.53492C8.68364 5.70525 8.54661 5.99178 8.55408 6.28117L8.44745 6.11843C8.18572 5.71905 7.64988 5.60745 7.25049 5.86913C6.99053 6.03946 6.85345 6.32605 6.86098 6.61549L5.42761 4.42789C5.16593 4.02851 4.63009 3.91697 4.23065 4.17859C3.83127 4.44027 3.71967 4.97616 3.98135 5.37554L7.54576 10.8154L6.05377 10.3071C5.60135 10.153 5.11056 10.3946 4.9566 10.8466C4.80264 11.2986 5.04419 11.7898 5.49615 11.9438L9.69128 13.3731C9.97029 13.4892 10.2701 13.5502 10.5725 13.5502C11.0006 13.5502 11.4334 13.4299 11.8174 13.1783Z"
                                            fill="white" />
                                        <path
                                            d="M5.86923 3.91283C6.04178 4.17622 6.39532 4.25 6.65871 4.07728C6.92215 3.90473 6.99577 3.55119 6.82316 3.28781C6.02029 2.06251 4.3704 1.71878 3.14517 2.52166C1.91993 3.32447 1.57625 4.97447 2.37901 6.19971C2.48844 6.36679 2.67063 6.45751 2.85652 6.45751C2.96366 6.45751 3.07212 6.42734 3.16849 6.36416C3.43187 6.19161 3.50555 5.83813 3.33294 5.57469C2.87482 4.87537 3.07092 3.93376 3.77019 3.47553C4.46939 3.01747 5.41106 3.21357 5.86923 3.91283Z"
                                            fill="white" />
                                        <path
                                            d="M1.2146 4.03869C1.40294 3.13437 1.93222 2.3575 2.70487 1.8512C3.47753 1.3449 4.40106 1.16984 5.30549 1.35818C6.20981 1.54653 6.98668 2.07581 7.49298 2.84846C7.66559 3.11185 8.01901 3.18563 8.28245 3.01291C8.5459 2.84036 8.61951 2.48683 8.4469 2.22344C7.77364 1.19595 6.74063 0.492129 5.53803 0.241687C4.33554 -0.00881208 3.10734 0.22401 2.07985 0.897272C1.05237 1.57053 0.348541 2.60355 0.0980991 3.80615C-0.152343 5.00875 0.0804793 6.2369 0.753685 7.26432C0.863167 7.4314 1.0453 7.52212 1.23119 7.52212C1.33833 7.52212 1.44679 7.49196 1.54316 7.42878C1.8066 7.25617 1.88022 6.90269 1.70761 6.6393C1.20125 5.86659 1.02619 4.943 1.2146 4.03869Z"
                                            fill="white" />
                                    </svg>
                                </div>
                                <span class="amazonHeaderText ms-2 amazonIcon drop-box-text"></span>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>
        </section>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


    <!-- bootstrap  -->
    <script src="{{ asset('/') }}backend/assets/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript-->
    <script src="{{ asset('/') }}frontend/userpanel/js/nav.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/') }}backend/assets/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/jszip/jszip.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugin/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
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
                dom: 'Brftip',
                buttons: [{
                    extend: 'excel',
                    text: 'Save as Excel',
                    filename: 'table_to_excel',
                    extension: '.xlsx'
                }]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });


        var navigationCancel = document.querySelector('.navigation__cancel-span');
        navigationCancel.addEventListener('click', function() {
            var burgerMenu = document.querySelector(".burger__menu");
            var lineTop = document.querySelector(".fnav__top");
            var lineCenter = document.querySelector(".fnav__center");
            var lineBottom = document.querySelector(".fnav__bottom");
            var overlay = document.querySelector(".overlay");

            burgerMenu.classList.remove("burger__menu-visible");
            lineTop.classList.remove("burger__line-1");
            lineCenter.classList.remove("burger__line-2");
            lineBottom.classList.remove("burger__line-3");
            overlay.classList.toggle("overlay__active");
        });
    </script>
    {{-- Scroll indicator --}}
    <script>
        window.onscroll = function() {
            myFunction()
        };

        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }

        function ScrollToBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }

        var modals_hm = document.querySelectorAll('.modal');
        modals_hm.forEach(element => {
            element.setAttribute('data-backdrop', 'static');
        });
        var selects_hm = document.querySelectorAll('.select-custom-hm');
        selects_hm.forEach(element => {
            element.setAttribute('data-size', '6');
            element.setAttribute('data-live-search', 'true');
            element.classList.add('selectpicker');
            element.classList.add('show-tick');
            element.classList.remove('form-select');
        });
    </script>
    {{-- International phone input --}}
    <script>
        var input = document.querySelector("#telephone");
        if (input) {
            window.intlTelInput(input, ({
                allowDropdown: true,
                autoHideDialCode: false,
                autoPlaceholder: "polite",
                customPlaceholder: null,
                dropdownContainer: null,
                excludeCountries: [],
                formatOnDisplay: true,
                geoIpLookup: null,
                hiddenInput: "",
                initialCountry: "tr",
                localizedCountries: null,
                nationalMode: true,
                onlyCountries: [],
                placeholderNumberType: "MOBILE",
                preferredCountries: ["tr", "us", "az"],
                separateDialCode: true,
                utilsScript: ""
            }));
            $('.iti__flag-container').click(function() {
                var countryCode = document.querySelector('.iti__selected-dial-code');
                console.log(countryCode.innerHTML);
                var countryCode = countryCode.innerHTML;
                $('#telephone').val("");
                $('#telephone').val(countryCode + "" + $('#telephone').val());
            });
        }
    </script>
    {{-- Fixed Header --}}
    <script>
        (function enableStickyHeader() {
            var stickyHeader = document.querySelector('header').dataset.sticky;
            var scrollHeader = $("header.scrollheader");

            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll >= 170 && stickyHeader == 'true') {
                    scrollHeader.removeClass('scrollheader').addClass("coverheader");
                } else {
                    scrollHeader.removeClass("coverheader").addClass('scrollheader');
                }
            });
        })();
    </script>
    {{-- Page Title --}}
    <script>
        $(window).on("load", function() {
            var drop_box_text = document.querySelector('.drop-box-text');
            var active_link = document.querySelector('.active-link-hm');

            if(!active_link){
                var link_text = "{{ Request::segment(2) }}";
                if(!link_text){
                    link_text = "profile";
                }
                drop_box_text.innerHTML = link_text;
            }else{
                var link_text = active_link.querySelector('.navigation__span').innerHTML;
                drop_box_text.innerHTML = link_text;
            }

            drop_box_text.style.textTransform = "capitalize";
        });
    </script>
</body>

</html>
