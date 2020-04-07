<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserModel;

class UserController extends Controller
{
    //注册
    public function register(){
        return view('user/create');
    }

    //注册的编辑
    public function regDo(){
        $post=request()->except('_token');
        $u_name=request()->input('u_name');

        //验空
        if(empty($u_name)){
            echo "用户名不能为空";die;
        }

        if(empty($post['u_email'])){
            echo "邮箱不能为空";die;
        }

        if(empty($post['u_tel'])){
            echo "手机号不能为空";die;
        }

        if(empty($post['u_password'])){
            echo "密码不能为空";die;
        }

        if(empty($post['u_password1'])){
            echo "确认密码不能为空";die;
        }

        //判断密码
        $pass=request()->input('u_password');
        $pass1=request()->input('u_password1');
        if($pass!=$pass1){
            echo "密码不正确 请重新输入";
            die;
        }

        //密码加密
        $pass=password_hash($post['pass'],PASSWORD_BCRYPT);

        //入库
        $data=[
            'u_name'      =>$u_name,
            'u_tel'       =>$post['u_tel'],
            'u_email'     =>$post['u_email'],
            'pass'      =>$pass,
        ];
        $uid=UserModel::insertGetId($data);
        echo "<script>alert('注册成功');location.href='/login/login';</script>";
    }
}
