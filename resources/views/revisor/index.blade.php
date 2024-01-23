<x-layout>
    <div class="container-fluid margin-nav mb-lg-5">
        @if (!is_null($announcement_to_check))
            <div class="row p-5 mx-lg-5 align-items-center">
                <div class="col-12 d-flex flex-wrap text-center ps-5 pe-5">
                    <h6 class="col-1 fs-3 text-center text-nowrap mt-3 ps-5">
                        <span
                            class="border border-2 rounded-4 p-1 ">{{ __("ui.$announcement_to_check->category_id") }}</span>
                    </h6>
                    <h2 class="col-11 px-5 fs-3">{{ $announcement_to_check->title }}</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-header text-end fs-2 fst-italic lead">{{ $announcement_to_check->price }}
                                    €</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-3">
                <div class="row">
                    <x-carousel>
                        @if ($announcement_to_check->images && count($announcement_to_check->images) > 0)
                            @forelse ($announcement_to_check->images as $image)
                                <div class="swiper-slide h-auto">
                                    <img class="img-fluid rounded" src="{{ $image->getUrl(1280, 800) }}" />
                                </div>
                            @empty
                                <div class="swiper-slide h-auto">
                                    <img class="img-fluid rounded" src="/images/articles/placeholder.jpg" />
                                </div>
                            @endforelse
                        @endif
                    </x-carousel>
                </div>
                <div class="row flex-column flex-lg-row justify-content-between row-gap-5">
                    @if (isset($image->labels))
                        <div class="col-12 col-lg-6">
                            <div class="row justify-content-center">
                                <h5 class="tc-accent">{{ __('ui.revImage') }}</h5>
                                <div class="row py-2 justify-content-center">
                                    <p class="col-2 text-nowrap m-1">{{ __('ui.adults') }}
                                    </p>
                                    <p class="col-2 text-nowrap m-1">{{ __('ui.satire') }}
                                    </p>
                                    <p class="col-2 text-nowrap m-1">
                                        {{ __('ui.medicine') }}
                                    </p>
                                    <p class="col-2 text-nowrap m-1">
                                        {{ __('ui.violence') }}
                                    </p>
                                    <p class="col-2 text-nowrap m-1">
                                        {{ __('ui.sexContents') }}</p>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div
                                    class="bg-{{ $image->adult }} col-2 rounded-4 p-1 mx-1 fas fa-circle text-{{ $image->adult }}">
                                </div>
                                <div
                                    class="bg-{{ $image->spoof }} col-2 rounded-4 p-1 mx-1 fas fa-circle text-{{ $image->spoof }}">
                                </div>
                                <div
                                    class="bg-{{ $image->medical }} col-2 rounded-4 p-1 mx-1 fas fa-circle text-{{ $image->medical }}">
                                </div>
                                <div
                                    class="bg-{{ $image->violence }} col-2 rounded-4 p-1 mx-1 fas fa-circle text-{{ $image->violence }}">
                                </div>
                                <div
                                    class="bg-{{ $image->racy }} col-2 rounded-4 p-1 mx-1 fas fa-circle text-{{ $image->racy }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <h5 class="tc-accent text-end">Tags</h5>
                            <div class="p-2 d-fm-2 row">
                                @foreach ($image->labels as $label)
                                    <p
                                        class="d-inline text-nowrap text-center border border-secondary border-2 rounded-3 p-2 m-1 col justify-content-center">
                                        {{ $label }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <hr>
                <h5 class="card-text">
                    {{ __('ui.description') }}
                </h5>
                <p>
                    {{ $announcement_to_check->body }}
                </p>
                <p>
                    <span class="card-footer">
                        {{ __('ui.published') }}: {{ $announcement_to_check->created_at->format('d/m/Y') }}
                    </span>
                    {{ __('ui.publishedBy') }}{{ $user_name }}
                </p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center column-gap-5 mb-5">
                        <form
                            action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success" type="submit">{{ __('ui.accept') }}</button>
                        </form>
                        <form
                            action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger" type="submit">{{ __('ui.reject') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <div class="container">
            <h2>{{ __('ui.rejectedAnnouncements') }}</h2>
            <div class="row justify-content-center">
                @if (!is_null($rejected_announcements))
                    @forelse ($rejected_announcements as $announcement)
                        <div class="container card-announcement p-0">
                            <a href="{{ route('revisor.recheck_announcement', compact('announcement')) }}">
                                <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(1280, 800): '/images/articles/placeholder.jpg' }}"
                                    alt="" class="w-100 mt-auto p-4"
                                    style="height: 20rem; object-fit: contain;">
                            </a>
                            <div class="row m-3">
                                <p class="text-uppercase fw-bold col-9">{{ Str::limit($announcement->title, 24) }}</p>
                                @auth
                                    <div class="col-2">
                                        <livewire:like-button :announcement="$announcement" />
                                    </div>
                                @endauth
                            </div>
                            <div class="card-body m-3">
                                <div class="row justify-content-between">
                                    <p class="text-title col-8">{{ __("ui.$announcement->category_id") }}</p>
                                    <span class="text-title col-4">{{ $announcement->price }} €</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>{{ __('ui.noRejectedAnnouncements') }}</p>
                    @endforelse
                @endif
                {{ $rejected_announcements->links() }}
            </div>
        </div>
    </div>
</x-layout>
