<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
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
        return response()->view('cms.sliders.index');
    }
    public function getSliders(Request $request){
//        dd('d');
        if ($request->ajax()) {
            return DataTables::of(slider::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/sliders/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.sliders.create');
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
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'title' => 'required|string|min:3',
            'sub_title' => 'required|string|min:3',
        ]);
        if (!$validator->fails()){
            $slider = new Slider();
            $slider->title = $request->get('title');
            $slider->sub_title = $request->get('sub_title');
            $request->link = $request->get('link');
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/sliders/', 'public', 'slider'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->save();
                $image = $image->refresh();
                $slider->image_id = $image->id;
            }
            $isSaved = $slider->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء سلايدر بنجاح" : "خطأ في إنشاء سلايدر"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
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
    public function edit(Slider $slider)
    {
        //
        return response()->view('cms.sliders.edit', [
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Slider $slider)
    {
        //
//        dd($request->all());
        $validator = Validator($request->all(), [
//            'image' => 'sometimes|image|mimes:jpg,jpeg,png',
            'title' => 'required|string|min:3',
            'sub_title' => 'required|string|min:3',
        ]);
        if (!$validator->fails()){
            $slider->title = $request->get('title');
            $slider->sub_title = $request->get('sub_title');
            $request->link = $request->get('link');
            if ($request->hasFile('image')){
                $slider->image()->delete();
                $this->uploadFile($request->file('image'), 'images/sliders/', 'public', 'slider'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->save();
                $image = $image->refresh();
                $slider->image_id = $image->id;
            }
            $isSaved = $slider->save();
            return response()->json(['message' => $isSaved ? "تم تحديث سلايدر بنجاح" : "خطأ في تعديل سلايدر"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Slider $slider)
    {
        //
        $isDeleted = $slider->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف سلايدر بنجاح" : "خطأ في حذف سلايدر"], $isDeleted ? 200:400);
    }
}
