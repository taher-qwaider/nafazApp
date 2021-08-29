<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Category::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.category.index');
    }

    public function getCategories(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Category::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/categories/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.category.create');
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
            'title' => 'required|string|min:3',
        ]);
        if (!$validator->fails()){
            $category = new Category();
            $category->title = $request->get('title');

            $isSaved = $category->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء تصنيف بنجاح" : "خطأ في إنشاء الصنف"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return response()->view('cms.category.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category)
    {
        //
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
        ]);
        if (!$validator->fails()){
            $category->title = $request->get('title');

            $isSaved = $category->save();
            return response()->json(['message' => $isSaved ? "تم تحديث تصنيف بنجاح" : "خطأ في تحديث الصنف"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        //
        $isDeleted = $category->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف الصنف بنجاح" : "خطأ في حذف الصنف"], $isDeleted ? 200:400);
    }
}
