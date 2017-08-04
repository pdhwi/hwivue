<?php
/**
* [AdminBaseController 后台基础控制器]
* @Hwi    pandehui 2017-01-17
*/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBaseController extends Controller
{
	function __construct(Request $request){
		//判断是否登录
		//$this->checkLogin($request);
		//获取用户权限并且赋值
		$useract=$request->session()->has('adminuser')?$request->session()->get('adminuser.action'):'';
		view()->share('menuaction', explode(',',$useract));
    	
	}


	function checkLogin($request){
		//获取当前路由  定义无需过滤的页面
		$Router =$this->GetRouter();
		$notC   =array('LoginController');
		if(!in_array($Router['Controller'], $notC)){
			//判断是否登录
			if(!$request->session()->has('adminuser')||!$request->session()->has('adminuser.id')){
				echo $this->Jump('Error','暂未登录！','admin-Login','马上登录');	
				die;		
			}
		}
	}
	/**
	 * [GetRouter 获取当前控制器和方法的名称]
	 * @Hwi   pandehui 2017-01-19
	 * @param string   $name      [为空时返回全部]
	 */
	public function GetRouter($name=''){
		//处理控制器等数据
		$Route  = \Route::current()->getActionName();  
		$Routse = explode('\\', substr(strstr ($Route,'\Admin' ), 1,stripos(strstr ($Route,'\Admin' ),'@')-1 ) ) ;
		$Action = substr(strstr ($Route,'@' ),1);
		//组装新数组
		$RouteArr=array(
				'Prefix'     =>$Routse[0],
				'Controller' =>$Routse[1],
				'Action'     =>$Action,
			);

		return  $name? $RouteArr[$name]: $RouteArr;
	}

	/**
	 * [GetTpl 获取当前模板]
	 * @Hwi pandehui 2017-01-19
	 */
	public function GetTpl(){
		$Router =$this->GetRouter();
		//判断前缀是否存在
		$Prefix =$Router['Prefix']?$Router['Prefix'].'.':'';
		return $Prefix.str_replace("Controller","",$Router['Controller']) .'.'.$Router['Action'];
	}

	/**
	 * [Jump 跳转页面]
	 * @Hwi   pandehui 2017-01-19
	 * @param [type]   $type       [Errors |  Info]
	 * @param [type]   $message    [页面提示信息]
	 * @param [type]   $url        [跳转URL   admin-login]
	 * @param [type]   $ActionName [URL名称]
	 */
	public function Jump($type,$message,$url,$ActionName){
		//格式化URL
		$url= url( str_replace('-','/',$url) );
		//判断视图是否存在
		if (view()->exists('errors.'.$type)) {
			return   view('errors.'.$type, ['message' => $message,'url' => $url,'ActionName' => $ActionName]);
		}
	}

	/**
	 * [GetResultArr 交互返回数组]
	 * @Hwi pandehui 2017-01-19
	 */
	public function GetResultArr($message,$errors=array(),$status='Error'){
		return array(
				'status'  =>$status,
				'Message' =>$message,
				'errors'  =>$errors,
			);
	}


	/**
	 * [CheckArr 验证数组是否有为空的VALUE值]
	 * @Hwi   pandehui 2017-01-20
	 * @param [type]   $arr       [数组]
	 */
	public function CheckArr($arr){

		$error=array();
		if( empty( $arr ) || !is_array($arr) ){
			return false ;
		}
		//验证数据是否为空
		foreach ($arr as $key => $value) {
			$value?'':$error[$key]='不允许为空!';
		}
		return $error;
	}

	/**
	 * [CheckArrBool 验证数组VALUE值是否存在一个]
	 * @Hwi   pandehui 2017-01-20
	 * @param [type]   $arr       [description]
	 */
	public function CheckArrBool($arr){
		if( empty( $arr ) || !is_array($arr) ){
			return false ;
		}
		//验证数据是否为空
		foreach ($arr as $key => $value) {
			if($value){
				return true;
			}
		}
	}

}
