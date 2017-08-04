<?php
/**
* [UserController 用户]
* @Hwi    pandehui 2017-01-17
*/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends AdminBaseController
{
    public function UserList(){
       return view($this->GetTpl());
    }

    public function User($id='',Request $request){
    	echo 'Users'.$id;
       // return view('Admin.Login.Login');
    }

    public function UserAdd(){
    	echo 'UsersAdd';
    }

    public function UserEdit($id=''){
    	echo 'Users'.$id;
       // return view('Admin.Login.Login');
    }


}
