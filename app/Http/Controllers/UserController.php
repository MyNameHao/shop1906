<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\User;
use Mail;
use App\Model\UserModel;

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
