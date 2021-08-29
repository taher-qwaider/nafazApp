<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    //
    public function permission($id){
        $permissions =Permission::all();
        $role = Role::findById($id);
        if($role->permissions->count() >0){
            foreach($permissions as $permission){
                $permission->setAttribute('active', false);
                if($role->hasPermissionTo($permission)){
                    $permission->setAttribute('active', true);
                }
            }
        }
        return response()->view('cms.spatie.roles.index-permissions',[
            'permissions' => $permissions,
            'role' => $role
        ]);
    }

    public function store(Request $request, $id){
        $valodator = Validator($request->all(), [
            'permission_id' => 'required|numeric|exists:permissions,id'
        ]);
        if(!$valodator->fails()){
            $role = Role::findOrFail($id);
            $permission = Permission::findOrFail($request->get('permission_id'));
            if($role->hasPermissionTo($permission)){
                $isRevoked = $role->revokePermissionTo($permission);
                return response()->json(['message'=> $isRevoked ? "تم إلغاء الصلاحية بنجاح" : "خطأ في إلغاء الصلاحية "], $isRevoked ? 200 : 400);
            }else{
                $isGiven = $role->givePermissionTo($permission);
                return response()->json(['message'=> $isGiven ? "تم إعطاء الصلاحية بنجاح" : "خطأ في إعطاء الصلاحية"], $isGiven ? 200 : 400);
            }
        }else{
            return response()->json(['message'=>$valodator->getMessageBag()->first()], 400);
        }
    }
}
