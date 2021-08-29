<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Role::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.spatie.roles.index');
    }

    public function getRoles(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Role::withCount(['permissions'])->get())
                ->addIndexColumn()
                ->addColumn('permissions', function($row){
                    $actionBtn = "<a href='/panel/role/$row->id/permissions' class='edit btn btn-primary btn-sm'> $row->permissions_count صلاحيات</a>";
                    return $actionBtn;
                })
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/roles/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
                    return $actionBtn;
                })
                ->rawColumns(['action', 'permissions'])
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
        return response()->view('cms.spatie.roles.create');
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
        $validator=validator($request->all(), [
            'guard'=>'required|string|in:user',
            'name'=>'required|string|min:3'
        ]);
        if(!$validator->fails()){
            $role=new Role();
            $role->name=$request->get('name');
            $role->guard_name=$request->get('guard');
            $isSaved=$role->save();
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
        $role = Role::findById($id);
        return response()->view('cms.spatie.roles.edit', [
            'role' => $role
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
            $role= Role::findById($id);
            $role->name=$request->get('name');
            $role->guard_name=$request->get('guard');
            $isSaved=$role->save();
            return response()->json(['message'=>$isSaved ? "تم إنشاء الصلاحية بنجاح" : "خطأ في إنشاء الصلاحية "], $isSaved ? 200:400);
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
        $role = Role::findById($id);
        $isDeleted = $role->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف الصلاحية بنجاح" : "خطأ في حذف الصلاحية"], $isDeleted ? 200:400);

    }
}
