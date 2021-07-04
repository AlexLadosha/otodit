<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'category_id', 'content', 'image' ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('image')){
            if ($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('image')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if (!$this->image){
            return asset(noimage.jpg);
        }
        return asset("uploads/{$this->image}");
    }

}
