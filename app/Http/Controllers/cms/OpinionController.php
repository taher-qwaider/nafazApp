<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Opinion;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OpinionController extends Controller
{
    use FileUpload;
    public function __construct()
    {
        $this->authorizeResource(Opinion::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.opinion.index');
    }

    public function getOpinions(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Opinion::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/opinions/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.opinion.create');
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
//        dd($request->all());
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'profession' => 'required|string|min:3',
            'text' => 'required|string|min:3',
            'rate' => 'required|numeric|min:0|max:5',
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ]);
        if (!$validator->fails()){
            $opinion = new Opinion();
            $opinion->name = $request->get('name');
            $opinion->text = $request->get('text');
            $opinion->profession = $request->get('profession');
            $opinion->rate = $request->get('rate');
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/customers/', 'public', 'customer_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->save();
                $image = $image->refresh();
                $opinion->image_id = $image->id;
            }

            $isSaved = $opinion->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء بنجاح" : "خطأ في إنشاء"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        //
        return response()->view('cms.opinion.edit', [
            'opinion' => $opinion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Opinion $opinion)
    {
        //
//        dd($request->all());
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'profession' => 'required|string|min:3',
            'text' => 'required|string|min:3',
            'rate' => 'required|numeric|min:0|max:5'
        ]);
        if (!$validator->fails()){
            $opinion->name = $request->get('name');
            $opinion->text = $request->get('text');
            $opinion->profession = $request->get('profession');
            $opinion->rate = $request->get('rate');

            $isSaved = $opinion->save();
            return response()->json(['message' => $isSaved ? "تم تحديث بنجاح" : "خطأ في تحديث"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opinion  $opinion
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Opinion $opinion)
    {
        //
        $isDeleted = $opinion->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف الخدمة بنجاح" : "خطأ في حذف الخدمة"], $isDeleted ? 200:400);
    }
}
