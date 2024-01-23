<div class="margin-nav">
    <h1>Modifica il tuo annuncio</h1>

    @if (session()->has('message'))
        <div class="alert-success alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store" class="d-flex flex-column">
        @csrf

        <div class="mb-3">
            <label for="title">Titolo Annuncio</label>
            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror"
                placeholder="{{ $announcement->title }}">
            @error('title')
                <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="body">Descrizione</label>
            <textarea wire:model="body" type="text" class="form-control @error('body') is-invalid @enderror"
                placeholder="{{ $announcement->body }}"></textarea>
            @error('body')
                <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category">Categoria</label>
            <select wire:model.defer="category" type="number"
                class="form-control @error('price') is-invalid @enderror">
                <option value="" default>Scegli la categoria</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ("$category->id" == "$announcement->category_id") selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">Prezzo</label>
            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
            @error('price')
                <p class="invalid-feedback p-2 rounded-bottom">{{ $message }}</p>
            @enderror
        </div>

        <button type="sumbit" class="btn btn-primary shadow px-4 py-2">Crea</button>

    </form>

</div>
