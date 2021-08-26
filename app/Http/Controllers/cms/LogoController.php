<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Setting;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    use FileUpload;
    //
    public function edit(){
        return response()->view('cms.logo.edit');
    }
    public function update(Request $request){
//        dd($request->all());
        $validator = Validator($request->all(), [
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/', 'public', 'logo'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $setting = Setting::where('subject' , 'logo')->first();
                $setting->value = $image->path;
                $setting->save();
                return response()->json(['message' => 'تم رفع الصورة بنجاح']);
            }
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }
}
