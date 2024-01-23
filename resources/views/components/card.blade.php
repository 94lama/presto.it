<div class="container card-announcement p-0">
    <a href="{{ route('announcements.show', [$announcement, Str::slug($announcement->title)]) }}" class="d-flex justify-content-center">
        <img
            src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(1280, 800): '/images/articles/placeholder.jpg' }}"
            alt="" class="img-fluid mt-auto p-4">
        </a>
    <div class="row px-3">
        <div class="col-12 px-4 d-flex justify-content-between align-items-center">
            <p class="text-header fs-4 fst-italic lead">{{ $announcement->price }} €</p>
            <p class="text-header border border-2 rounded-3 p-1">{{ __("ui.$announcement->category_id") }}</p>
        </div>
        <div class="col-12 d-flex justify-content-around">
            <p class="text-header text-center col-11">{{ Str::limit($announcement->title, 69) }}</p>
            @auth
                <div class="col-1">
                    <livewire:like-button :announcement="$announcement" />
                </div>
            @endauth
        </div>
    </div>
</div>
