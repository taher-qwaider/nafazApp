<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Image;
use App\Models\Setting;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    use FileUpload;
    public function __construct()
    {
        $this->authorizeResource(Blog::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.blog.index');
    }

    public function getBlogs(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Blog::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/blogs/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.blog.create');
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
            'body' => 'required|string|min:6',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            $blog = new Blog();
            $blog->title = $request->get('title');
            $blog->body = $request->get('body');
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/blogs/', 'public', 'blog_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $image = $image->refresh();
                $blog->image_id = $image->id;
            }
            $isSaved = $blog->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء المدونة بنجاح" : "خطأ في إنشاء المدونة"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
        $blogs = Blog::all();
        $socialMedia = SocialMedia::all();
        $logo = Setting::where('subject', 'logo')->first();

        return response()->view('cms.blog.show', [
            'blogs' => $blogs,
            'blog' => $blog,
            'socialMedias' => $socialMedia,
            'logo' => $logo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return response()->view('cms.blog.edit', ['blog'=>$blog]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'body' => 'required|string|min:6',
//            'image' => 'sometimes|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            $blog->title = $request->get('title');
            $blog->body = $request->get('body');
            if ($request->hasFile('image')){
                $blog->image()->delete();
                $this->uploadFile($request->file('image'), 'images/blogs/', 'public', 'blog_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $image = $image->refresh();
                $blog->image_id = $image->id;
            }
            $isSaved = $blog->save();
            return response()->json(['message' => $isSaved ? "تم تحديث المدونة بنجاح" : "خطأ في تحديث المدونة"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Blog $blog)
    {
        //
        $isDeleted = $blog->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف المدونة بنجاح" : "خطأ في حذف المدونة"], $isDeleted ? 200:400);
    }
}
