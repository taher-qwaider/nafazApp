<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->authorizeResource(Service::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.service.index');
    }

    public function getServices(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Service::all())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/services/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.service.create');
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
            'name' => 'required|string|min:3',
            'body' => 'required|string|min:6',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            $service = new Service();
            $service->name = $request->get('name');
            $service->body = $request->get('body');
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/services/', 'public', 'service_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $image = $image->refresh();
                $service->image_id = $image->id;
            }
            $isSaved = $service->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء الخدمة بنجاح" : "خطأ في إنشاء الخدمة"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return response()->view('cms.service.edit', ['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Service $service)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'body' => 'required|string|min:6',
//            'image' => 'sometimes|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            $service->name = $request->get('name');
            $service->body = $request->get('body');
            if ($request->hasFile('image')){
                $service->image()->delete();
                $this->uploadFile($request->file('image'), 'images/services/', 'public', 'service_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $image = $image->refresh();
                $service->image_id = $image->id;
            }
            $isSaved = $service->save();
            return response()->json(['message' => $isSaved ? "تم تحديث الخدمة بنجاح" : "خطأ في تحديث الخدمة"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Service $service)
    {
        //
        $isDeleted = $service->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف الخدمة بنجاح" : "خطأ في حذف الخدمة"], $isDeleted ? 200:400);
    }
}
