<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EditAnnouncement extends Component
{
    public $announcement;
    public $title = '';
    public $slug_title = '';
    public $body = '';
    public $price = '';
    public $category = '';

    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'slug_title' => 'min:5',
            'body' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|digits_between:0,8',
        ];
    }


    protected $messages = [
        'required' => 'Il campo :attribute è obbligatorio',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute deve essere un numero'
    ];


    public function store()
    {
        $this->validate();
        $category = Category::find($this->category);

        $announcement = $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'is_accepted' => Auth::user()->is_revisor ? 1 : null,
        ]);

        Auth::user()->announcements()->save($announcement);

        session()->flash("message", "annuncio inserito con successo");
        $this->cleanForm();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.edit-announcement');
    }
}
