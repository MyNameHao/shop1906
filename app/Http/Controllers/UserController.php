<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\User;
use Mail;

class UserController extends Controller
{
    public function test(){
//        print_r($_GET);exit;
        $pwd='admin123';
       $pwds=password_hash ($pwd,PASSWORD_BCRYPT);
        if(password_verify($pwd,$pwds)){
            var_dump($pwd);echo'<br>';var_dump($pwds);
        }

    }
    public function findpwd(){
        return view('users/findpwd');
    }
    public function findpwd1(){
        unset($_POST['_token']);
        $name=$_POST['u_name'];
        $email=$_POST['u_email'];
        $where= [
            ['u_name','=',$name],
            ['u_email','=',$email]
        ];
//        dd($where);
        $usermodel = new User();
        $userinfo=$usermodel->where($where)->first();
        if(!empty($userinfo)){
            echo"<script>alert('请查看您的邮箱');</script>";
            $link=$this->links($email);
//            var_dump($link);exit;
            $this->send($link,$email);
        }else{
            echo"<script>alert('账户或邮箱有误');history.go(-1);</script>";
        }
    }
    public function send($link,$email) {
//       $aaa=$email;
        Mail::send('emails.findpwd',['email'=>$link],function($message)use($email){
            $to = $email;
            $message ->to($to)->subject('密码找回');
        });
        // 返回的一个错误数组，利用此可以判断是否发送成功
        dd(Mail::failures());
    }
    public function links($email){
        $key='findpwd';
        $data=md5($key.$email);
        $sign=json_encode(['sign'=>$data,'val'=>$email]);
        return $link=url('user/verfind').'?sign='.base64_encode($sign);


    }
    public function verfind(){
        $sign=$_GET['sign'];
        $data=json_decode(base64_decode($sign),true);
        $key='findpwd';
        $val=md5($key.$data['val']);
        if($data['sign']==$val){
            return view('users.updatepwd',['email'=>$data['val']]);
        }else{
            echo"<script>alert('请勿非法操作');</script>";die;
        }
    }
    public function  verfinds(){
        $data=$_POST;
        if($data['u_password']!=$data['u_passwords']){
            echo"<script>alert('密码与确认密码不一致');history.go(-1);</script>";die;
        }
        $usermodel = new User();
        $res=$usermodel->where('u_email',$data['u_email'])->update(['u_password'=>password_hash ($data['u_password'],PASSWORD_BCRYPT)]);
        if($res){
            echo '修改成功';
        }else{
            echo '修改失败';
        }
    }
}
