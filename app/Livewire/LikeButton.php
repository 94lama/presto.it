<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class LikeButton extends Component
{
    public Announcement $announcement;
    public $liked;
    /* public $id; */

    public function mount()
    {
        $user = Auth::user();
        $this->liked = $user->likes_announcement->contains($this->announcement->id);
    }

    public function like()
    {
        $user = Auth::user();
        $this->liked = !$this->liked;
        return $this->liked ?
            $user->likes_announcement()->attach($this->announcement, ['like' => true]) :
            $user->likes_announcement()->detach($this->announcement, ['like' => false]);
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
