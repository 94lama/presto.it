<div class="body">
    <a class="card_category wallet" href="{{ route('categoryShow', compact('category')) }}">
        <p></p>
        <div class="overlay"></div>
        <div class="circle">
            <img src='/images/icons/{{$category->name}}.png' class="icon-img" alt="">
        </div>
        <p>{{ __("ui.$category->id") }}</p>
    </a>
</div>