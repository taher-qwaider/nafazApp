<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
           'file' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            if ($request->hasFile('file')){
                $this->uploadFile($request->file('file'), 'images/albums/', 'public', 'album_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('file')->getSize();
                $image->save();
                $image = $image->refresh();
                return response()->json(['message' => 'تم رفع الصورة بنجاح', 'id' => $image->id]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request){
//        dd($request->all());
        $validator = Validator($request->all(), [
            'id' => 'required|numeric|exists:images,id'
        ]);
        if (!$validator->fails()){
            $image = Image::find($request->get('id'));
            $isDeleted = $image->delete();
            return response()->json(['message' => $isDeleted ? 'تم حذف الصورة بنجاح' : 'خطأ'], $isDeleted ? 200:400);
        }
    }
}
