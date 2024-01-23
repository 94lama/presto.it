<footer
    class="container mx-auto row row-cols-1 row-cols-sm-2 flex-column flex-md-row row-cols-lg-5 py-5 border-top justify-content-center align-items-center text-center">

    <div class="col-6 mb-3 ">
        <div class="row aign-items-center text-center">
            {{-- <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                 <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg> 
            </a> --}}
            <p class="text-body-secondary ">© 2023 Presto.it</p>
        </div>
    </div>

    <div class="col mb-3 justify-content-center">
        <h5 class="">{{ __('ui.contactUs') }}</h5>
        <ul class="p-0">
            <li class="nav-item mb-2">
                <a href="https://www.google.com/maps/place/Aulab+Hackademy/@41.1152978,16.8548204,16z/data=!4m6!3m5!1s0x1347e8bcca130e17:0x47ce9d5124576e73!8m2!3d41.1168417!4d16.8501748!16s%2Fg%2F11c52rtp7r?entry=ttu"
                    class="nav-link p-0 text-body-secondary" target="_blank"><span
                        class="fa-solid fa-location-dot"></span> {{ __('ui.where') }}</a>
            </li>
            {{-- <li class="nav-item mb-2"><a href="+390123456789" type="tel" class="nav-link p-0 text-body-secondary"><span class="fa-solid fa-phone"></span> Chiamaci</a></li>
        <li class="nav-item mb-2"><a href="mail@maybe-reply.com" type="email" class="nav-link p-0 text-body-secondary"><span class="fa-solid fa-envelope"></span> Inviaci una mail</a></li> --}}
        </ul>
    </div>
    <div class="col mb-3">
        <h5>{{ __('ui.jobWithUs') }}</h5>
        <ul class="nav flex-column">
            {{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Lavora con noi</a></li> --}}
            {{-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Area riservata ai revisori</a></li> --}}

            @auth
                @if (!Auth::user()->is_revisor)
                    <li class="nav-item mb-2"><a href="{{ route('become.revisor') }}"
                            class="nav-link p-0 text-body-secondary"><span class="fa-solid fa-handshake"></span>
                            {{ __('ui.becomeRevisor') }}</a>
                    </li>
                @else
                    <li class="nav-item mb-2"><a href="{{ route('revisor.index') }}"
                            class="nav-link p-0 text-body-secondary"><span class="fa-solid fa-briefcase"></span>
                            {{ __('ui.revisorLogin') }}</a>
                    </li>
                @endif
            @endauth
            @guest
                <li class="nav-item mb-2"><a href="{{ route('become.revisor') }}"
                        class="nav-link p-0 text-body-secondary"><span class="fa-solid fa-handshake"></span>
                        {{ __('ui.becomeRevisor') }}</a>
                </li>
            @endguest
        </ul>
    </div>

    <div class="col mb-3">
        <ul class="d-flex justify-content-around text-center p-0">
            <li>
                <a href="https://www.instagram.com/aulab_it/" target="_blank"><i class="fa-brands fa-instagram fs-2"></i></a>
            </li>
            <li>
                <a href="https://www.facebook.com/aulab" target="_blank"><i class="fa-brands fa-facebook fs-2"></i></a>
            </li>
            <li>
                <a href="https://www.linkedin.com/school/aulab-srl/" target="_blank"><i class="fa-brands fa-linkedin fs-2"></i></a>
            </li>
        </ul>
    </div>

    <div class="row mb-3 justify-content-center">
        <div class="col-6">
            <div class="row">
                <h5 class="text-nowrap p-0">
                    <i class="fa-solid fa-earth-europe me-2"></i> <span
                        class="d-none d-md-inline text-body-secondary">{{ __('ui.languages') }}</span>
                </h5>
            </div>
            <div class="row">
                <ul class="lang">
                    <li>
                        <x-_locale lang="it" nation='it' />
                    </li>

                    <li>
                        <x-_locale lang="en" nation='gb' />
                    </li>

                    <li>
                        <x-_locale lang="es" nation='es' />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-6"></div>
    </div>

</footer>
