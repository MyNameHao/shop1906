<?php

namespace App\Http\Controllers\Changepwd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    //
    //展示页面

    public function index(){

        return view('changepwd/index');
    }

    public function ass(){
        return view('changepwd/ass');
    }

    //接收用户密码
    public function sele(){
        $data = request()->all();
//        dd($data);
        /*$where[]=[
            'user_name','=',$data['user_name']
        ];*/
        $info = User::first();
//        echo $info;
        if($info){
            if($data['u_password']==$info['u_password']){
                echo "<script>;location='/change/upda'</script>";
            }else{
                echo "<script>alert('密码错误');location='/change/ass'</script>";
            }
        }else{
            echo "<script>alert('密码错误');location='/change/ass'</script>";
        }
    }

    //修改密码页面
    public function upda(){
        $data = User::all();
//        echo $data;die();
        return view('changepwd/upda',['data'=>$data]);

    }
    //密码修改
    public function update($u_id){
        $u_password = request()->u_password;
        $u_password1 = request()->u_password1;
//       dump ($u_password);
//       dd ($u_password1);

        if($u_password!=$u_password1){
            echo "<script>alert('错误');location='/change/upda'</script>";
        }else{
            $sql = User::where('u_id',$u_id)->update($u_password);
            if($sql){
                echo "<script>alert('成功');location='/change/upda'</script>";
            }else{
                echo "<script>alert('失败');location='/change/upda'</script>";
            }
            //echo "<script>alert('hhh');location='/change/upda'</script>";
        }


    }

}
