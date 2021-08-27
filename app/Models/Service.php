<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $with = ['image'];

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
