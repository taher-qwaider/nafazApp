<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Setting::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject)
    {
        //
        return response()->view('cms.setting.index', [
            'subject' =>$subject
        ]);
    }

    public function getData(Request $request, $subject){
        if ($request->ajax()) {
            $data = Setting::where('subject' , $subject);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/setting/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
    public function create($subject)
    {
        //
        return response()->view('cms.setting.create', [
            'subject' =>$subject
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $subject)
    {
        //
        $validator = Validator($request->all(), [
            'key' => 'required|string|min:3',
            'value' => 'required|string|min:3',
        ]);
        if (!$validator->fails()){
            $setting = new Setting();
            $setting->subject = $subject;
            $setting->key = $request->get('key');
            $setting->value = $request->get('value');
            $isSaved = $setting->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء بنجاح" : "خطأ في الإنشاء"], $isSaved ? 200 : 400);
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
    public function edit(Setting $setting)
    {
        //
        return response()->view('cms.setting.edit', [
            'setting' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Setting $setting)
    {
        //
//        dd($request->all());
        $validator = Validator($request->all(), [
            'key' => 'required|string|min:3',
            'value' => 'required|string|min:3',
        ]);
        if (!$validator->fails()){
            $setting->key = $request->get('key');
            $setting->value = $request->get('value');
            $isSaved = $setting->save();
            return response()->json(['message' => $isSaved ? "تم تحديث بنجاح" : "خطأ في تعديل"], $isSaved ? 200 : 400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Setting $setting)
    {
        //
        $isDeleted = $setting->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف بنجاح" : "خطأ في حذف"], $isDeleted ? 200:400);
    }

    public function getMaps(){

    }
}
