<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Category;
use App\Models\Image;
use App\Models\Job;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
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
        return response()->view('cms.job.index');
    }

    public function getJobs(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Job::with('category')->get())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/jobs/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        $categories = Category::all();
        return response()->view('cms.job.create', [
            'categories' => $categories
        ]);
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
            'category_id' => 'required|numeric|exists:categories,id',
            'desc' => 'required|string|min:3',
            'images' => 'required|array'
        ]);
        if (!$validator->fails()){
            $job = new Job();
            $job->category_id = $request->get('category_id');
            $job->description = $request->get('desc');
            $album = new Album();
            $album->title = $request->get('desc');
            $album->save();
            $album = $album->refresh();
            foreach ($request->get('images') as $id){
                $image = Image::findOrFail($id);
                $album->images()->save($image);
            }
            $job->save();
            $job = $job->refresh();
            $job->albums()->save($album);
            $isSaved = $job->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء العمل بنجاح" : "خطأ في إنشاء العمل"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
        $categories = Category::all();
        return response()->view('cms.job.edit', [
            'job' => $job,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Job $job)
    {
        //
//        dd($request->all());
        $validator = Validator($request->all(), [
            'category_id' => 'required|numeric|exists:categories,id',
            'desc' => 'required|string|min:3',
            'images' => 'required|array'
        ]);
        if (!$validator->fails()){
            $job->category_id = $request->get('category_id');
            $job->description = $request->get('desc');
            $album = $job->albums()->first();
            $album->images()->sync($request->get('images'));

            $isSaved = $job->save();
            return response()->json(['message' => $isSaved ? "تم تحديث العمل بنجاح" : "خطأ في تحديث العمل"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Job $job)
    {
        //
        $isDeleted = $job->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف العمل بنجاح" : "خطأ في حذف العمل"], $isDeleted ? 200:400);
    }
}
