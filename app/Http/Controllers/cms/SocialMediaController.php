<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SocialMediaController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(SocialMedia::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.media.index');
    }

    public function getSocialMedia(Request $request){
        if ($request->ajax()) {
            return DataTables::of(SocialMedia::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/socialMedia/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.media.create');
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
            'name' => 'required|string|min:3|unique:social_media,name',
            'link' => 'required|string|min:3|unique:social_media,url',
        ]);
        if (!$validator->fails()){
            $media = new SocialMedia();
            $media->name = $request->get('name');
            $media->url = $request->get('link');

            $isSaved = $media->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء بنجاح" : "خطأ في إنشاء"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
        return response()->view('cms.media.edit', [
            'socialMedia' =>$socialMedia
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|unique:social_media,name,'.$socialMedia->id,
            'link' => 'required|string|min:3|unique:social_media,url',
        ]);
        if (!$validator->fails()){
            $socialMedia->name = $request->get('name');
            $socialMedia->url = $request->get('link');

            $isSaved = $socialMedia->save();
            return response()->json(['message' => $isSaved ? "تم التحديث بنجاح" : "خطأ في التحديث"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(SocialMedia $socialMedia)
    {
        //
        $isDeleted = $socialMedia->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف بنجاح" : "خطأ في حذف"], $isDeleted ? 200:400);
    }
}
