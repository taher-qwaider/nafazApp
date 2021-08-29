<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Permission::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.spatie.permissions.index');
    }

    public function getPermissions(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Permission::all())
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/permissions/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
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
        return response()->view('cms.spatie.permissions.create');
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
        $validator=validator($request->all(), [
            'guard'=>'required|string|in:user',
            'name'=>'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $permission=new Permission();
            $permission->name=$request->get('name');
            $permission->guard_name=$request->get('guard');
            $isSaved=$permission->save();
            return response()->json(['message'=>$isSaved ? "تم إنشاء الصلاحية بنجاح" : "خطأ في إنشاء الصلاحية "], $isSaved ? 200:400);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
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
        $permission = Permission::findById($id);
        return response()->view('cms.spatie.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
        $validator=validator($request->all(), [
            'guard'=>'required|string|in:user',
            'name'=>'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $permission= Permission::findById($id);
            $permission->name=$request->get('name');
            $permission->guard_name=$request->get('guard');
            $isSaved=$permission->save();
            return response()->json(['message'=>$isSaved ? "تم تحديث الصلاحية بنجاح" : "خطأ في تحديث الصلاحية "], $isSaved ? 200:400);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $permission = Permission::findById($id);
        $isDeleted = $permission->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف الصلاحية بنجاح" : "خطأ في حذف الصلاحية"], $isDeleted ? 200:400);

    }
}
