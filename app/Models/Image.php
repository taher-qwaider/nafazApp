<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected static function boot() {
        parent::boot();
        self::deleting(function(Image $image) { // before delete() method call this
            Storage::disk('public')->delete($image->path);
        });
    }
}
