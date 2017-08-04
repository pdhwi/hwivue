<?php
/**
* [UserController 管理员]
* @Hwi    pandehui 2017-01-17
*/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;

class AdminController extends AdminBaseController
{
    public function AdminList(){
      //print_r(  Admin::GetOne() );   
    //var_dump(  Admin::GetList()  );   
     // print_r(  Admin::GetCount() );   

      return view($this->GetTpl());
    }

    public function Admin($id){
    	echo 'Users'.$id;
      die;
      //return view('Admin.Login.Login');
    }

    public function AdminAdd(){
    	echo 'UsersAdd';
    }

    public function AdminEdit($id){
    	echo 'Users'.$id;
      die;
      //return view('Admin.Login.Login');
    }

    public function AdminDelete($id=''){
      echo 'Users'.$id;
      //return view('Admin.Login.Login');
    }

}
