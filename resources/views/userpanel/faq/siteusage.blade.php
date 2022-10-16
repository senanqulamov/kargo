@extends('userpanel.layout.layout')

@section('content')
    <section>
        <div class="container p-4">
            <div class="usage-div-cont">
                @foreach ($usages as $usage)
                    @if ($usage->status == 1)
                        <div class="usage-div-holder">
                            <a onclick="openUsageVideo(this)" class="pt-5 px-5" data-name="{{ $usage->title }}"
                                data-link="{{ $usage->link }}">
                                <div class="blog-card">
                                    <div class="o-video videoShadow">
                                        <img src="{{ asset('/') }}images/static_images/{{ $usage->image }}"
                                            alt="usage_video" height="50%" width="100%" />
                                    </div>
                                    <div class="text-blog mt-1 text-center">
                                        <h4>{{ $usage->title }}</h4>
                                    </div>
                                    <div class="text-start" style="display: none;">
                                        {!! json_decode($usage->description) !!}
                                    </div>
                                </div>
                                <button class="btn" onclick="window.open('{{ $usage->link }}')">
                                    {{ __('userpanel.Watch') }}
                                </button>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <script>
        function openUsageVideo(link) {

            let timerInterval;
            Swal.fire({
                position: 'center',
                title: 'Loading Blog',
                backdrop: true,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            setTimeout(() => {
                Swal.hideLoading();
            }, 900);

            var html_hm = link.querySelector('.blog-card').outerHTML;
            var name = link.getAttribute('data-name');
            var watch_link = link.getAttribute('data-link');

            setTimeout(() => {
                Swal.close();

                Swal.fire({
                    position: 'top',
                    icon: 'info',
                    title: 'View Blog : ' + name,
                    backdrop: true,
                    showConfirmButton: false,
                    html: `
                        <div class="notification-modal-cont">
                            ` + html_hm + `
                        </div>
                    `,
                    customClass: {
                        container: 'notification-modal-backdrop'
                    },
                    footer: `
                            <button class="my-3 btn btn-primary" onclick="window.open('` + watch_link + `')">
                                Watch
                            </button>
                        `
                });
            }, 900);

        }
    </script>
@endsection
