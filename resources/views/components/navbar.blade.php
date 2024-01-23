<nav id="mainNavbar" class="navbar align-items-center w-100 position-fixed z-3">
    <div class="wrapper m-0 w-100">
        <div class="ms-3">
            <a href="/" class="nav-logo font-title text-nowrap text-white">Pr<span
                    class="text-neon color-tertiary">e</span>sto<span
                    class="text-normal-rounded color-tertiary">.</span>it</a>
        </div>

        <input class="inputHidden" type="radio" name="slider" id="menu-btn">
        <input class="inputHidden" type="radio" name="slider" id="close-btn">

        <ul class="nav-links w-100 justify-content-around m-0 ps-4">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times text-white"></i></label>

            <li>
                <a href="{{ route('announcements.index') }}" class="desktop-item text-nowrap">{{ __('ui.categories') }}</a>
                <input class="showDrop inputHidden" type="checkbox" id="showDrop1">
                <label for="showDrop1" class="mobile-item text-nowrap">{{ __('ui.categories') }}</label>

                <ul class="drop-menu rounded-bottom-4 px-2">
                    @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item mx-1" href="{{ route('categoryShow', compact('category')) }}">
                                {{ __("ui.$category->id") }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="text-nowrap" id="allAnnouncesLink text-nowrap">
                <a class="nav-link" aria-current="page" href="{{ route('announcements.index') }}">
                    {{ __('ui.allAnnouncements') }}
                </a>
            </li>
            <li class="text-nowrap">
                <a aria-current="page" href="{{ route('announcements.create') }}">{{ __('ui.newAnnouncement') }}</a>
            </li>

            <li class="text-nowrap m-0 w-lg-25 ">
                <form action="{{ route('announcements.search') }}" method="GET" class="d-flex">
                    <input name="searched" class="form-control me-2" type="search" placeholder="{{ __('ui.search') }}"
                        aria-label="search">
                    <button class="fa-solid fa-magnifying-glass bg-transparent text-white border-0 "
                        type="submit"></button>
                </form>
            </li>

            <li class="text-nowrap">
                @guest
                    <a href="{{-- {{ route('announcements.index') }} --}}#" class="desktop-item">{{ __('ui.personalArea') }}</a>
                    <input class="showDrop inputHidden" type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">{{ __('ui.personalArea') }}</label>
                @endguest

                @auth
                    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span
                            class="fa-solid fa-user text-nowrap"></span> {{ Auth::user()->name }}</a>
                    <input class="showDrop inputHidden" type="checkbox" id="showDrop">
                    <label for="showDrop" class="mobile-item">{{ __('ui.personalArea') }}</label>
                @endauth

                <ul class="drop-menu rounded-bottom-4 m-0 px-2">
                    @auth
                        @if (Auth::user()->is_revisor)
                            <li>
                                <a class="nav-link" aria-current="page" href="{{ route('revisor.index') }}">
                                    {{ __('ui.revisorArea') }}
                                    <span
                                        class="text-danger fs-6">{{ App\Models\Announcement::toBeRevisionedCount() }}</span>
                                    <span class="visually-hidden">{{ __('ui.unreadMessages') }}</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="nav-link" aria-current="page"
                                href="{{ route('user.announcements', ['user' => Auth::user()->id]) }}"
                                @if (Route::currentRouteName() == 'profile.index') active @endif href="">
                                {{ __('ui.yourAnnoucementsTitle') }}
                            </a>
                        </li>
                        <li {{-- class="text-center" --}}>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="fa-solid fa-right-from-bracket bg-transparent border-0 color-light" style="padding-left: 4rem">
                                </button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a class="dropdown-item @if (Route::currentRouteName() == 'login') @endif text-nowrap"
                                aria-current="page" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-nowrap @if (Route::currentRouteName() == 'register') @endif"
                                aria-current="page" href="{{ route('register') }}">{{ __('ui.signin') }}</a>
                        </li>
                    @endguest
                </ul>
            </li>
        </ul>
        <label for="menu-btn" class="btn menu-btn display-lg-none "><i class="fas fa-bars text-light"></i></label>
    </div>
</nav>
@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show w-75 position-fixed z-3"
        style="top: 6rem; left:12.5%; height: 50px" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
