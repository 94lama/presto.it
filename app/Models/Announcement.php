<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Announcement extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'body',
        'price',
        'category_id',
        'is_accepted',
    ];

    

    public function toSearchableArray()
    {
        $category = $this->category;
        $array=[
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'category'=>$category,
            
        ];
 
        // Customize the data array...
 
        return $array;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return (true);
    }

    public static function toBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->whereNot('user_id', Auth::user()->id)->count();
    }

    public function images(){

        return $this->hasMany(Image::class);
    }
}

// aggiungere nel fillable category & img