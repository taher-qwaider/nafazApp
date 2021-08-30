<?php

namespace App\Http\Controllers\cms;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->view('cms.user.index');
    }

    public function getUsers(Request $request){
        if ($request->ajax()) {
            return DataTables::of(User::withCount(['permissions', 'roles'])->get())
                ->addIndexColumn()
                ->addColumn('permissions', function($row){
                    $actionBtn = "<a href='/panel/cms/user/$row->id/permissions' class='edit btn btn-success btn-sm'>$row->permissions_count صلاحيات</a>";
                    return $actionBtn;
                })
                ->addIndexColumn()
                ->addIndexColumn()
                ->addColumn('roles', function($row){
                    $actionBtn = "<a href='/panel/cms/user/$row->id/roles' class='edit btn btn-primary btn-sm'>$row->roles_count روول</a>";
                    return $actionBtn;
                })
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='http://127.0.0.1:8000/panel/cms/users/$row->id/edit' class='edit btn btn-success btn-sm'>Edit</a> <button onclick='preformedDelete($row->id)' class='delete btn btn-danger btn-sm'>Delete</button>";
                    return $actionBtn;
                })
                ->rawColumns(['action', 'permissions', 'roles'])
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
        return response()->view('cms.user.create');
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/users/', 'public', 'user_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $image = $image->refresh();
                $user->image_id = $image->id;
            }
            $user->password = Hash::make('pass123');
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء المستخدم بنجاح" : "خطأ في إنشاء المستخدم"], $isSaved ? 200:400);
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
    public function edit(User $user)
    {
        //
        return response()->view('cms.user.edit',['user'=>$user]);
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
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if (!$validator->fails()){
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if ($request->hasFile('image')){
                $this->uploadFile($request->file('image'), 'images/users/', 'public', 'user_'.time().'jpg');
                $image = new Image();
                $image->path = $this->filePath;
                $image->size = $request->file('image')->getSize();
                $image->save();
                $image = $image->refresh();
                $user->image_id = $image->id;
            }
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? "تم إنشاء المستخدم بنجاح" : "خطأ في إنشاء المستخدم"], $isSaved ? 200:400);
        }else
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        //
        $isDeleted = $user->delete();
        return response()->json(['message' => $isDeleted ? "تم حذف المستخدم بنجاح" : "خطأ في حذف المستخدم"], $isDeleted ? 200:400);
    }
}
