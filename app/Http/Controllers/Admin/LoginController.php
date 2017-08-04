<?php
/**
* [LoginController 登录]
* @Hwi    pandehui 2017-01-17
*/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class LoginController extends AdminBaseController
{
    public function Login(Request $request){
    	//判断是否登录
		if($request->session()->has('adminuser')&&$request->session()->has('adminuser.id')){
			return $this->Jump('Info','已登录！','admin-Index','跳转到首页');			
		}
     	return view($this->GetTpl());
    }

   	public function LoginPost(Request $request){
   		//接收参数 定义变量
		$date = $request->all();
		//验证数据是否为空
		$error=$this->CheckArr($date);
		//校验验证码
		if( ! \Captcha::check($date['yzm']) ){
			$error['yzm']='验证码错误！';
		}

		//检测是否存在错误
		if($this->CheckArrBool($error)){
			return response()->json($this->GetResultArr('信息错误',$error));
		}

		//查询用户
		$User = User::GetUser($date['name']);
		if(!$User){
			return response()->json($this->GetResultArr('信息错误',$error));
		}else{
			//验证用户密码
			if($User['password']==md5($date['pass'])){
				//去除用户敏感数据
				unset($User['password']);
				//设置用户session
				$request->session()->put('adminuser', $User);
				return response()->json($this->GetResultArr('登录成功',$error,'Success'));
			}else if('1'==$User['status']){
				$error['pass']='账号已被冻结！';
			}else{
				$error['pass']='用户名或密码错误！';
			}
		}

	    return response()->json($this->GetResultArr('信息错误',$error));
   	}


   	public function LoginOut(Request $request){
    	//判断是否登录
   		$request->session()->flush();
		return $this->Jump('Info','账号已退出！','admin','跳转到登录页面');			
    }
}
