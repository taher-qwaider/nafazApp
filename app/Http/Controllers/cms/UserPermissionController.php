<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionController extends Controller
{
    //
    public function permission($id){
        $permissions =Permission::all();
        $user = User::find($id);
        if($user->permissions->count() >0){
            foreach($permissions as $permission){
                $permission->setAttribute('active', false);
                if($user->hasPermissionTo($permission)){
                    $permission->setAttribute('active', true);
                }
            }
        }
        return response()->view('cms.user.index-permission',[
            'permissions' => $permissions,
            'user' => $user
        ]);
    }

    public function store(Request $request, $id){
        $valodator = Validator($request->all(), [
            'permission_id' => 'required|numeric|exists:permissions,id'
        ]);
        if(!$valodator->fails()){
            $user = User::findOrFail($id);
            $permission = Permission::findOrFail($request->get('permission_id'));
            if($user->hasPermissionTo($permission)){
                $isRevoked = $user->revokePermissionTo($permission);
                return response()->json(['message'=> $isRevoked ? "تم إلغاء الصلاحية بنجاح" : "خطأ في إلغاء الصلاحية "], $isRevoked ? 200 : 400);
            }else{
                $isGiven = $user->givePermissionTo($permission);
                return response()->json(['message'=> $isGiven ? "تم إعطاء الصلاحية بنجاح" : "خطأ في إعطاء الصلاحية"], $isGiven ? 200 : 400);
            }
        }else{
            return response()->json(['message'=>$valodator->getMessageBag()->first()], 400);
        }
    }
}
