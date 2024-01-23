<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title = '';
    public $slug_title = '';
    public $body = '';
    public $price = '';
    public $message = '';
    public $category = '';
    public $images = [];
    public $temporary_images;
    public $image;
    public $announcement;

    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'slug_title' => 'min:5',
            'body' => 'required',
            'images.*'=> 'image|max:1024',
            'temporary_images.*' => 'image|max:1024',
            'category' => 'required',
            'price' => 'required|numeric|min:0.01',
        ];
    }


    protected $messages = [
        'required' => 'Il campo :attribute è obbligatorio',
        'min' => 'Il campo :attribute è troppo corto',
        'temporary_images.required' => 'L\' immagine è richiesta',
        'temporary_images.*.image'=> 'I file devono essere immagini',
        'temporary_images.*.max'=> 'L\' immagine dev\' essere massimo di 1 MB',
        'images.image'=> 'L\' immagine dev\' essere un\' immagine',
        'images.max'=> 'L\' immagine dev\' essere massimo di 1 MB',
        'numeric' => 'Il campo :attribute deve essere un numero'
    ];

    public function updatedTemporaryImages(){

        if ($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])) {
            
            foreach($this->temporary_images as $image){

                $this->images[]=$image;

            }
        }

    }

    public function removeImage($key){

        if(in_array($key, array_keys($this->images))){

            unset($this->images[$key]);
        }

    }

    public function store()
    {
        $this->validate();
        
        $this->announcement=Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->images)) {
            
            foreach ($this->images as $image) {
                // $this->announcement->images()->create(['path'=> $image->store('images', 'public')]);
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=> $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path , 1280 , 800),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->announcement->user()->associate(Auth::user());
        $this->announcement->save();

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
        $this->images = [];
        $this->temporary_images = [];
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
