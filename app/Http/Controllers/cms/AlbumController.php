<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //
    public function getImages(Request $request){
        $id = $request->get('id');
        $images = Album::find($id)->images()->get();
        return response()->json(['images' => $images]);
    }
}
