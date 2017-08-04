<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Hwi后台系统登陆</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<style type="text/css">
    .bj_body {
        width:100%;
        height:100%;
        z-index: 2;
        position:absolute
    }
    .h_center{
        position:fixed;
        float:none;
        z-index:5;
        margin:auto;left:0; right:0; top:30%; bottom:0;
    }
</style>
<body >
<img  class="bj_body" src="../assets/img/body.jpg" />
<div class="col-lg-6 col-sm-5 col-xs-12 h_center ">
    <form role="form" method="post">
        <h2 align="center"> 欢 迎 登 陆 </h2>
        <div class="form-group"  name="UsernameBox">
            <input type="text" class="form-control" name="UserName" placeholder="Username" />
        </div>
        <div class="form-group"  name="PasswordBox">
            <input type="password" class="form-control"  name="Password" placeholder="Password" />
        </div>
        <div class="form-group yzm"  name="yzm" >
            <input type="text" class="form-control"  name="yzm" placeholder="验证码" />
        </div>
        <div class="form-group yzm" >
            <img style="width:120px;height:50px;" src="{{URL::('Index/verifyLogin')}}" id="txtCheckCode"/>&nbsp;<a href="javascript:refreshImg();" >看不清？换一张</a>
        </div>
        <div class=" clear"></div>
        <button id="submit"  type="submit" class="btn btn-blue col-xs-12">登录</button>
    </form>
</div>
    <!--Basic Scripts-->
    <script src="assets/js/jquery-2.0.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>
</body>

    <script>
        $('#submit').click(function(){
         var Pass     = CheckRsult.isPassword($('input[name="Password"]').val());
         var UserName = CheckRsult.isLoginUserName($('input[name="UserName"]').val());
         if(Pass){
           // $('div[name="PasswordBox"]').append( showAlerts(Pass,'error'));
              Notify(Pass, 'bottom-right', '5000', 'warning', 'fa-warning', true);
            return false 
        };

        if(UserName){
           // $('div[name="UsernameBox"]').append( showAlerts(UserName,'error'));
            Notify(UserName, 'bottom-right', '5000', 'warning', 'fa-warning', true);

            return false;
        };
    });

    function refreshImg(){
        //document.getElementById("txtCheckCode").src="{:U('__SERVER__/Index/verifyLogin')}"+"?a="+Math.random();
    }


    </script>

<!--Body Ends-->
</html>
