@extends('Admin.base')
<link href="{{asset('hwiadmin/css/plugins/bootstrap-table/bootstrap-table.min.css')}} " rel="stylesheet">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="alert alert-info fade in">当前系统环境参数<i class="fa-fw fa fa-info"></i></div>
    <div class="row">
        <div class="col-md-12">
             <div class="box  box-primary">
                <div class="box-body">
                    <div class="info-box">                 
                        <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>服务器操作系统：</td>
                            <td>{{ $SysInfo['os'] }}</td>
                            <td>服务器域名/IP：</td>
                            <td>{{ $SysInfo['domain'] }} [ {{ $SysInfo['ip'] }}  ]</td> 
                            <td>服务器环境：</td> 
                            <td>{{ $SysInfo['web_server'] }}</td>       
                        </tr> 
                        <tr>
                            <td>PHP 版本：</td>
                            <td>{{ $SysInfo['phpv'] }}</td>
                            <td>Mysql 版本：</td>
                            <td>{{ $SysInfo['mysql_version'] }}</td> 
                            <td>GD 版本</td> 
                            <td>{{ $SysInfo['gdinfo'] }}</td>  
                        </tr>   
                        <tr>
                            <td>文件上传限制：</td>
                            <td>{{ $SysInfo['fileupload'] }} </td>
                            <td>最大占用内存：</td>
                            <td>{{ $SysInfo['memory_limit'] }}</td> 
                            <td>最大执行时间：</td> 
                            <td>{{ $SysInfo['max_ex_time'] }}</td>  
                        </tr>  
                        <tr>
                            <td>安全模式：</td>
                            <td>{{ $SysInfo['safe_mode'] }} </td>
                            <td>Zlib支持：</td>
                            <td>{{ $SysInfo['zlib'] }}</td> 
                            <td>Curl支持：</td> 
                            <td>{{ $SysInfo['curl'] }} </td>  
                        </tr>  
                        </table>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin.Public.js')
<script src="{{asset('hwiadmin/js/plugins/bootstrap-table/bootstrap-table.min.js')}} "></script>
<script src="{{asset('hwiadmin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js')}} "></script>
<script src="{{asset('hwiadmin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js')}} "></script>
<script type="text/javascript">
$('#SystemDate').bootstrapTable({
    columns: [{
        field: 'id',
        title: 'Item ID'
    }, {
        field: 'name',
        title: 'Item Name'
    }, {
        field: 'price',
        title: 'Item Price'
    }],
    data: [{
        id: 1,
        name: 'Item 1',
        price: '$1'
    }, {
        id: 2,
        name: 'Item 2',
        price: '$2'
    }]
});
</script>