<x-layout>
    <h2 class="margin-nav mx-5">{{ __('ui.yourAnnoucementsTitle') }}</h2>
    <div class="container">
        <div class="row w-100">
            @auth
                @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 col-lg-3">
                    <x-card :announcement="$announcement" />
                </div>
                @endforeach
            @endauth
        </div>
    </div>

    <h2 class="class">{{__('ui.favouriteAnnouncements')}}</h2>
    <div class="container">
        <div class="row justify-content-center">
            @auth
                @foreach (Auth::user()->likes_announcement as $announcement)
                    <x-card :announcement="$announcement" />
                @endforeach
            @endauth
        </div>
    </div>
</x-layout>
