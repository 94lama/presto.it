<div class="m-0 p-0">

    <div class="position-fixed vw-100 vh-100 bg-dark bg-opacity-75 z-3 align-items-center justify-content-center d-none"
        wire:loading.class.remove="d-none" wire:loading.class="d-flex" id="loader" style="left:0">
        <span class="loader"></span>
    </div>

    <div class="container margin-nav mb-5">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show w-75 position-fixed z-3"
                        style="top: 6rem; left:12.5%; height: 50px" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="fs-1 mt-5">{{ __('ui.welcome') }} {{ Auth::user()->name }} !</h1>

                <div class="form-container mt-5">
                    <h3 class="text-center">{{ __('ui.createAnnouncement') }}</h3>

                    <form wire:submit.prevent="store" class="generic-form">
                        @csrf
                        <div class="row">
                            <input wire:model="title" type="text" class="input @error('title') is-invalid @enderror"
                                placeholder="{{ __('ui.titleAnnouncement') }}" value={{ old('title') }}>
                            @error('title')
                                <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-7 m-0 p-0">
                                <select wire:model.defer="category" type="number"
                                    class="w-100 input @error('category') is-invalid @enderror"
                                    value={{ old('category') }}>
                                    <option value="" default>{{ __('ui.chooseCategory') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-5">
                                <div class="row justify-items-center align-items-center">
                                    <label for="price" class="col-2 text-nowrap">{{ __('ui.price') }}: €</label>
                                    <input wire:model="price" type="float"
                                        class="input col-10 @error('price') is-invalid @enderror"
                                        value={{ old('category') }}>
                                    @error('price')
                                        <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <textarea wire:model="body" type="text" rows="4" class="input @error('body') is-invalid @enderror"
                                placeholder={{ __('ui.description') }} value={{ old('body') }}></textarea>
                            @error('body')
                                <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <input wire:model="temporary_images" type="file" multiple id="createAnnouncementInput"
                                class="input @error('temporary_image.*') is-invalid @enderror"
                                name="temporary_name_image" placeholder="Nessun file selezionato">
                            @error('temporary_image.*')
                                <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
                            @enderror
                        </div>

                        @if (!empty($images))
                            <div class="row" id="container">
                                <div class="col-12">
                                    <p>{{ __('ui.photoPreview') }}</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach ($images as $key => $image)
                                            <div class="col my-3">
                                                <div class="img-preview mx-auto shadow rounded"
                                                    style="background-image: url({{ $image->temporaryUrl() }}); background-size:contain; background-repeat:no-repeat; background-position:center">
                                                </div>
                                                <button class="btn shadow d-block text-center mt-2 mx-auto"
                                                    type="button" wire:click="removeImage({{ $key }})">
                                                    {{ __('ui.deleteImage') }}
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- <p class="page-link">
            <span class="page-link-label">Forgot Password?</span>
          </p> --}}
                        <button type="sumbit" class="form-btn">{{ __('ui.create') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
