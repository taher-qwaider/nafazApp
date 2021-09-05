<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use FileUpload;
    //
    public function edit(User $user){
        return response()->view('cms.profile.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if ($request->hasFile('image')){
                $user->image()->delete();
                $this->uploadFile($request->file('image'), 'images/users/', 'public', 'user_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $image = $image->refresh();
                $user->image_id = $image->id;
            }
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? "تم تحديث المستخدم بنجاح" : "خطأ في تحديث المستخدم"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }
}
