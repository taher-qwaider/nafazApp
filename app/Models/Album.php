<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $with = ['images'];

    public function images(){
        return $this->belongsToMany(Image::class, 'album_images');
    }
}
