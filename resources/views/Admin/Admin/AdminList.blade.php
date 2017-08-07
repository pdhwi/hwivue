@extends('Admin.base')
@section('content')
    <link href="{{asset('hwiadmin/css/plugins/bootstrap-table/bootstrap-table.min.css')}} " rel="stylesheet">
    <div class="wrapper wrapper-content animated fadeInRight">
            <!-- Panel Other -->
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>其他</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row row-lg">
                        <div class="col-sm-12">
                            <!-- Example Events -->
                            <div class="example-wrap">
                                <h4 class="example-title">事件</h4>
                                <div class="example">
                                    <div class="alert alert-success" id="TableEventsResult" role="alert">
                                        事件结果
                                    </div>
                                    <div class="btn-group hidden-xs" id="TableEventsToolbar" role="group">
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-heart" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline btn-default">
                                            <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <table id="TableEvents"  data-mobile-responsive="true">
                                        
                                    </table>
                                </div>
                            </div>
                            <!-- End Example Events -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panel Other -->
    </div>
{{ csrf_field() }}
    @include('Admin.Public.js')
    <script src="{{asset('hwiadmin/js/plugins/bootstrap-table/bootstrap-table.min.js')}} "></script>
    <script src="{{asset('hwiadmin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js')}} "></script>
    <script src="{{asset('hwiadmin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js')}} "></script>
    <script src="{{asset('hwiadmin/js/plugins/bootstrap-table/bootstrap-table-init.js')}} "></script>
    <script type="text/javascript">
    BTtableInit({
            url: "/api/AdminList",
            search: !0,
            showRefresh: !0,
            showToggle: !0,
            showColumns: !0,
            sidePagination:"server",
            iconSize: "outline",
            pagination:true,
            toolbar: "#TableEventsToolbar",
            pageSize:10,
            icons: {
                refresh: "glyphicon-repeat",
                toggle: "glyphicon-list-alt",
                columns: "glyphicon-list"
            },
            columns: [
                {
                  title: '序号',
                  formatter: function (value, row, index) {
                            return index+1;
                        },
                  checkbox: true,
                },
                {
                      title: '编号',
                      align: 'center',
                      valign: 'bottom',
                      formatter:function(value,row,index){
                          var pageNumber = $('#btable').bootstrapTable('getOptions').pageNumber?$('#btable').bootstrapTable('getOptions').pageNumber:1;
                          var pageSize   = $('#btable').bootstrapTable('getOptions').pageSize?$('#btable').bootstrapTable('getOptions').pageSize:10;
                          return (pageNumber-1) * pageSize+index+1;
                      },
                  },
                 {
                      title: '用户名',
                      field: 'admin_name',
                      align: 'center',
                      valign: 'middle',
                  }, 
                  {
                      title: '状态',
                      field: 'status',
                      align: 'center',
                      valign: 'middle',
                      formatter:function(value,row,index){  
                          var s= '<select name="status" onchange="Odit('+row.id+',\'{{ URL("admin/Admin") }}\',this)" >';
                          var s0='';
                          var s1='';
                          row.status==0?s0='selected':s1='selected';
                          s+='<option '+s0+' value="0"    >正常</option><option '+s1+'  value="1">禁用</option></select>';
                          return s;  
                      } 
                  }, 
                  {
                      title: '参与人数',
                      field: 'participationCounts',
                      align: 'center'
                  },
                  {
                      title: '总人数',
                      field: 'totalCounts',
                      align: 'center',
                      formatter:function(value,row,index){  
                          var i= '<input name="totalCounts" onchange="Odit('+row.id+',\'{{ URL("admin/Admin") }}\',this)" value='+row.totalCounts+'>';
                          return i;  
                      } 
                  },
                  {
                      title: '开始时间',
                      field: 'startTime',
                      align: 'center',
                  },
                  {
                      title: '操作',
                      field: 'id',
                      align: 'center',
                      formatter:function(value,row,index){  
                        var e = '<a href="#" mce_href="#" onclick="edit('+ row.id +',\'{{ URL("admin/Admin") }}\',this)">编辑</a> ';  
                        var d = '<a href="#" mce_href="#" onclick="del('+ row.id +',\'{{ URL("admin/Admin") }}\',this)">删除</a> ';  
                        return e+d;  
                    } 
                  }
              ],

        });
  
    </script>
@endsection
