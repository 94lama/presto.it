<x-layout>
    <div class="w-100 vh-100 d-flex justify-content-center align-items-center margin-nav">

    <div class="m-auto w-75" style="max-width: 25rem">
        <form method="post" action="{{route('revisor.request')}}" class="form">
            @csrf
            {{-- @method('GET') --}}
            <p id="heading">Scrivi un messaggio di richiesta</p>
            <div class="field">
                <i class="fa-solid fa-envelope align-self-start"></i>
                <textarea placeholder="text" class="input-field" type="text" name="text" rows="5">
                    Ciao, mi chiamo {{Auth::user()->name}}, e vorrei fare il revisore per il tuo sito web!
                </textarea>
                @error('text')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="btn">
                <button type="submit" class="button2">Invia richiesta</button>
            </div>
            {{-- <button class="button3">Forgot Password</button> --}}
        </form>
    </div>
</div>

</x-layout>