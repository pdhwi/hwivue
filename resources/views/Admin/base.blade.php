<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>Hwi管理系统</title>

    <meta name="keywords" content="HHwi管理系统,后台bootstrap框架,响应式后台">
    <meta name="description" content="基于Bootstrap3最新版本开发的扁平化主题，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->    
    @include('Admin.Public.css')
</head>
<body class="gray-bg">
        @yield('content')
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="  text-center">
                <span class="text-center">Copyright © 2016 - {{date('Y',time())}} 广东管理系统有限公司 All rights reserved .  <a href="http://www.miitbeian.gov.cn">粤ICP备123456789号-1</a></span>
            </div>
    </div>
</div>
</body>

</html>
