<div>
    <form wire:submit.prevent="like">
        <button class="fa-solid fa-heart bg-transparent border-0 {{$liked?'text-danger':'color-dark'}} " type="submit" id="{{$announcement->id}}LikeBtn"></button>
    </form>
</div>