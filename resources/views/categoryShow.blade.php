<x-layout>
    <div class="min-vh-100">
        <div class="container-fluid m-0 p-0 bg-category w-100">
            <img src="/images/{{ $category->name }}.jpg" class="img-fluid img-category">
        </div>
        <div class="category-title container-fluid">
            <div class="row">
                <div class="col-12 my-auto" style="height: 150px">
                    <h2 class="m-5">{{ __('ui.CategoryPageTitle') }} {{ __("ui.$category->id") }}</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid " style="margin-top: 100px">
            <div class="row justify-content-center">
                <div class="col-11 d-flex flex-wrap justify-content-center">
                    @forelse ($category->announcements->where('is_accepted', true) as $announcement)
                        <x-card :announcement="$announcement" />
                    @empty
                        <div class="col-12">
                            <p class="h1">{{ __('ui.emptyAnnouncements') }}!</p>
                            <p class="h2">
                                {{ __('ui.postAnAnnouncement') }} <a href="{{ route('announcements.create') }}"
                                    class="btn btn-success shadow">{{ __('ui.newAnnouncement') }}</a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- {{ $announcements->links() }} --}}
</x-layout>
