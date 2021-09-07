<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getLoginView(){
        return response()->view('auth.login');
    }
    public function login(Request $request){
//        dd($request->all());
        $validator=Validator($request->all(), [
            'email'=>'required|email|exists:users,email',
            'password'=>'required|string|min:3',
            'remember_me'=>'boolean'
        ]);
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        if(!$validator->fails()){
            if(Auth::guard('user')->attempt($credentials, $request->get('remember_me'))){
                User::where('email', $request->get('email'))->update(['isActive'=>true]);
                return response()->json(['massage'=>'تم تسجيل الدخول بنجاح'], 200);
            }else{
                return response()->json(['massage'=>'خطأ في المدخلات'], 400);
            }
        }else{
            return response()->json(['massage'=>$validator->getMessageBag()->first()], 400);
        }
    }

    public function logout(Request $request){
        User::where('id', $request->user('user')->id)->update(['isActive'=>false]);
        Auth('user')->logout();
        return redirect()->route('login');
    }
}
