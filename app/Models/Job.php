<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function albums(){
        return $this->belongsToMany(Album::class, 'job_albums');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
