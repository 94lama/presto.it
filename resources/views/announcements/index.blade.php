<x-layout>
    
    <h2 class="margin-nav px-5">{{ __('ui.ourAnnouncements') }}</h2>

    <div class="container-fluid px-5">
        <div class="row justify-items-center">
            <div class="col-12 d-flex flex-wrap justify-content-center">
                @forelse ($announcements as $announcement)
                    <div class="col-12 col-md-6 col-xl-3 d-flex justify-content-center">

                        <x-card :announcement="$announcement" />
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">{{ __('ui.thereAreNotAnnouncements') }}</p>
                        </div>
                    </div>
                @endforelse
                {{ $announcements->links() }}
            </div>
        </div>
        
    </div>

</x-layout>
