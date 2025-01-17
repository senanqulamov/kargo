@extends('userpanel.layout.layout')

@section('content')
    <section>
        <div class="container p-4">
            <div class="usage-div-cont">
                @foreach ($notifications as $notification)
                    @if ($notification->status == 1)
                        <a class="usage-div-holder" onclick="openNotification(this)" data-name="{{ $notification->name }}">
                            <div class="blog-card">
                                <div class="o-video videoShadow">
                                    <img src="{{ asset('/') }}images/static_images/{{ $notification->image }}"
                                        width="200px" />
                                </div>
                                <div class="text-blog">
                                    <h4>{{ $notification->name }}</h4>
                                    <div class="dateTime">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.63451 4.86677C3.63451 4.95875 3.56092 5.03234 3.46893 5.03234H2.84751C2.75552 5.03234 2.68193 4.95875 2.68193 4.86677V4.24534C2.68193 4.15336 2.75552 4.07977 2.84751 4.07977H3.46893C3.56092 4.07977 3.63451 4.15336 3.63451 4.24534V4.86677ZM4.93254 4.24739C4.93254 4.1554 4.85895 4.08181 4.76697 4.08181H4.14554C4.05356 4.08181 3.97997 4.1554 3.97997 4.24739V4.86881C3.97997 4.9608 4.05356 5.03439 4.14554 5.03439H4.76697C4.85895 5.03439 4.93254 4.9608 4.93254 4.86881V4.24739ZM6.23058 4.24739C6.23058 4.1554 6.15699 4.08181 6.065 4.08181H5.44358C5.35159 4.08181 5.278 4.1554 5.278 4.24739V4.86881C5.278 4.9608 5.35159 5.03439 5.44358 5.03439H6.065C6.15699 5.03439 6.23058 4.9608 6.23058 4.86881V4.24739ZM3.63451 5.51067C3.63451 5.41869 3.56092 5.3451 3.46893 5.3451H2.84751C2.75552 5.3451 2.68193 5.41869 2.68193 5.51067V6.1321C2.68193 6.22408 2.75552 6.29767 2.84751 6.29767H3.46893C3.56092 6.29767 3.63451 6.22408 3.63451 6.1321V5.51067ZM4.93254 5.51067C4.93254 5.41869 4.85895 5.3451 4.76697 5.3451H4.14554C4.05356 5.3451 3.97997 5.41869 3.97997 5.51067V6.1321C3.97997 6.22408 4.05356 6.29767 4.14554 6.29767H4.76697C4.85895 6.29767 4.93254 6.22408 4.93254 6.1321V5.51067ZM6.065 5.3451H5.44358C5.35159 5.3451 5.278 5.41869 5.278 5.51067V6.1321C5.278 6.22408 5.35159 6.29767 5.44358 6.29767H6.065C6.15699 6.29767 6.23058 6.22408 6.23058 6.1321V5.51067C6.23058 5.41869 6.15699 5.3451 6.065 5.3451ZM2.16885 6.60838H1.54947C1.45748 6.60838 1.38389 6.68197 1.38389 6.77396V7.39538C1.38389 7.48737 1.45748 7.56096 1.54947 7.56096H2.17089C2.26288 7.56096 2.33647 7.48737 2.33647 7.39538V6.77396C2.33647 6.68197 2.26083 6.60838 2.16885 6.60838ZM2.33647 5.51067C2.33647 5.41869 2.26288 5.3451 2.17089 5.3451H1.54947C1.45748 5.3451 1.38389 5.41869 1.38389 5.51067V6.1321C1.38389 6.22408 1.45748 6.29767 1.54947 6.29767H2.17089C2.26288 6.29767 2.33647 6.22408 2.33647 6.1321V5.51067ZM4.76697 6.60838H4.14554C4.05356 6.60838 3.97997 6.68197 3.97997 6.77396V7.39538C3.97997 7.48737 4.05356 7.56096 4.14554 7.56096H4.76697C4.85895 7.56096 4.93254 7.48737 4.93254 7.39538V6.77396C4.93254 6.68197 4.85895 6.60838 4.76697 6.60838ZM3.46893 6.60838H2.84751C2.75552 6.60838 2.68193 6.68197 2.68193 6.77396V7.39538C2.68193 7.48737 2.75552 7.56096 2.84751 7.56096H3.46893C3.56092 7.56096 3.63451 7.48737 3.63451 7.39538V6.77396C3.63451 6.68197 3.56092 6.60838 3.46893 6.60838ZM7.36304 5.03439C7.45503 5.03439 7.52862 4.9608 7.52862 4.86881V4.24739C7.52862 4.1554 7.45503 4.08181 7.36304 4.08181H6.74162C6.64963 4.08181 6.57604 4.1554 6.57604 4.24739V4.86881C6.57604 4.9608 6.64963 5.03439 6.74162 5.03439H7.36304ZM0.975061 8.9101H5.69092C5.61529 8.67298 5.57236 8.4195 5.57032 8.15785H0.975061C0.852412 8.15785 0.754293 8.05769 0.754293 7.93708V3.49514H8.148V5.56178C8.40965 5.56382 8.66312 5.60266 8.90024 5.67829V1.93954C8.90024 1.40192 8.4628 0.964476 7.92518 0.964476H6.83361V0.363495C6.83361 0.167256 6.67416 0.0078125 6.47792 0.0078125H5.92396C5.72772 0.0078125 5.56827 0.167256 5.56827 0.363495V0.96652H3.33197V0.363495C3.33197 0.167256 3.17253 0.0078125 2.97629 0.0078125H2.42232C2.22608 0.0078125 2.06664 0.167256 2.06664 0.363495V0.96652H0.975061C0.437449 0.96652 0 1.40397 0 1.94158V7.93708C0 8.47265 0.437449 8.9101 0.975061 8.9101ZM10 8.12923C10 9.15744 9.16599 9.99146 8.13778 9.99146C7.10957 9.99146 6.27555 9.15744 6.27555 8.12923C6.27555 7.10102 7.10957 6.26701 8.13778 6.26701C9.16599 6.26701 10 7.10102 10 8.12923ZM9.07809 7.64681C9.07809 7.58753 9.0556 7.5303 9.01267 7.48941C8.92477 7.40151 8.78373 7.40151 8.69583 7.48941L7.88634 8.2989L7.57563 7.98819C7.48773 7.90029 7.34669 7.90029 7.25879 7.98819C7.21586 8.03111 7.19338 8.08631 7.19338 8.14559C7.19338 8.20487 7.21586 8.2621 7.25879 8.30299L7.7269 8.7711C7.8148 8.859 7.95585 8.859 8.04374 8.7711L9.01063 7.80421C9.0556 7.76333 9.07809 7.70609 9.07809 7.64681Z"
                                                fill="#BEBEBE" />
                                        </svg>
                                        <span class="me-3">{{ $notification->created_at }}</span>
                                    </div>
                                    <br>
                                    <div class="text-start" style="display: none;">
                                        {!! json_decode($notification->message) !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function openNotification(link) {

            let timerInterval;
            Swal.fire({
                position: 'center',
                title: 'Loading Notification',
                backdrop: true,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            setTimeout(() => {
                Swal.hideLoading();
            }, 900);

            var html_hm = link.innerHTML;
            var name = link.getAttribute('data-name');

            setTimeout(() => {
                Swal.close();

                Swal.fire({
                    position: 'top',
                    icon: 'info',
                    title: 'View Notification : ' + name,
                    backdrop: true,
                    showConfirmButton: false,
                    html: `
                        <div class="notification-modal-cont">
                            ` + html_hm + `
                        </div>
                    `,
                    customClass: {
                        container: 'notification-modal-backdrop'
                    }
                });
            }, 900);

        }
    </script>
@endsection
