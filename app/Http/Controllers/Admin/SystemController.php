<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

class SystemController  extends AdminBaseController
{
    public function Config(Request $request){
    	$SysInfo= $this->GetSystemInfo();
    	return view($this->GetTpl(),
    			[
    				'SysInfo'=>$SysInfo,
    			]
    		);
    }


    public function IndexPage(Request $request){
    	return view($this->GetTpl());
    }

    /**
     * [get_sys_info 获取系统信息]
     * @Hwi    pandehui 2017-05-03
     * @return [type]   [description]
     */
    public function GetSystemInfo(){
    	$SysInfo=array();
        $SysInfo['os']             = PHP_OS;
        $SysInfo['zlib']           = function_exists('gzclose') ? 'YES' : 'NO';//zlib
        $SysInfo['safe_mode']      = (boolean) ini_get('safe_mode') ? 'YES' : 'NO';//safe_mode = Off   
        $SysInfo['timezone']       = function_exists("date_default_timezone_get") ? date_default_timezone_get() : "no_timezone";
        $SysInfo['curl']           = function_exists('curl_init') ? 'YES' : 'NO';  
        $SysInfo['web_server']     = $_SERVER['SERVER_SOFTWARE'];
        $SysInfo['phpv']           = phpversion();
        $SysInfo['ip']             = GetHostByName($_SERVER['SERVER_NAME']);
        $SysInfo['fileupload']     = @ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown';
        $SysInfo['max_ex_time']    = @ini_get("max_execution_time").'s'; //脚本最大执行时间
        $SysInfo['set_time_limit'] = function_exists("set_time_limit") ? true : false;
        $SysInfo['domain']         = $_SERVER['HTTP_HOST'];
        $SysInfo['memory_limit']   = ini_get('memory_limit');    
            //$sys_info['version']      = file_get_contents('./Application/Admin/Conf/version.txt');
/*            $dbPort = env("DB_PORT"); $dbHost = env("DB_HOST");
            $dbHost = empty($dbPort) || $dbPort == 3306 ? $dbHost : $dbHost.':'.$dbPort;

        mysql_connect($dbHost, env("DB_USERNAME"), env("DB_PASSWORD"));*/
         $mysql_version = DB::select(' select version() as version' ) ;
        $SysInfo['mysql_version']   = $mysql_version['0']->version;
        if(function_exists("gd_info")){
          $gd = gd_info();
          $SysInfo['gdinfo']   = $gd['GD Version'];
        }else {
          $SysInfo['gdinfo']   = "未知";
        }
        return $SysInfo;
    }

}
