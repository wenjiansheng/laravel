<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        //判断是否登录  已经登录则跳转到首页
        if(auth()->check())
        {
            return view('admin.frame');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $rule = [
            'user_name' => 'required',
            'password' => 'required',
        ];
        $msg = [
            'user_name.required' => '账号不能为空',
            'password.required' => '密码不能为空',
        ];
        $validate = $this->validate($request,$rule,$msg);
        //登录是否成功
         $res = auth()->attempt($validate);
         if($res){
             $model = auth()->user();
             session(['admin.auth' => $model]);
             return ['code'=>200,'msg'=>'登陆成功','data'=>''];
         }else{
             return ['code'=>400,'msg'=>'登陆失败','data'=>''];
         }

    }
}
