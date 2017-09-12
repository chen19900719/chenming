@extends('layouts.application')
<!-- sidebar end -->
@section('content')

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">菜单权限管理</strong> /
                    <small>Table</small>
                </div>
            </div>
            @include('layouts._message')
            <hr>


            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-group am-btn-group-xs">
                        <a class="am-btn am-btn-default" href="/manage/menuPermissionAdd">
                            <span class="am-icon-plus"></span> 新增
                        </a>
                    </div>
                    <div class="am-btn-group am-btn-group-xs">
                        <button class="am-btn am-btn-success" type="button" id="show_all"> <span
                                    class="am-icon-arrows-alt">
                                        </span>展开所有
                        </button>
                    </div>
                    <div class="am-btn-group am-btn-group-xs">
                        <button class="am-btn am-btn-success" type="button" id="close_all"> <span
                                    class="am-icon-arrows-alt">
                                        </span>折叠所有
                        </button>
                    </div>
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">权限名称</th>
                                <th class="table-type">路由名称</th>
                                <th class="table-date am-hide-sm-only">说明</th>
                                <th class="table-date am-hide-sm-only">是否菜单</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($perms as $p)
                                <tr data-id="{{$p->id}}" class="xParent">
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->display_name}}</td>
                                    <td>{{$p->name}}</td>
                                    <td class="am-hide-sm-only">{{$p->description}}
                                    </td>
                                    <td>{{$p->is_menu==1?'是':'否'}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">

                                                <a class="am-btn am-btn-default am-btn-xs am-hide-sm-only"
                                                   target="_blank"
                                                   href="/manage/editMenuPermission/{{$p->id}}"><span
                                                            class="am-icon-copy"></span> 编辑

                                                </a>
                                                <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                                   href="/manage/deletePermission/{{$p->id}}">
                                                    <span class="am-icon-trash-o"></span> 删除

                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @foreach($p->children as $pc)
                                    <tr data-id="{{$pc->id}}" class="xChildren children_{{$p->id}}"
                                        style="display: none">
                                        <td>{{$pc->id}}</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-|{{$pc->display_name}}</td>
                                        <td>{{$pc->name}}</td>
                                        <td class="am-hide-sm-only">{{$pc->description}}
                                        </td>
                                        <td>{{$pc->is_menu==1?'是':'否'}}</td>
                                        <td>
                                            <div class="am-btn-toolbar">
                                                <div class="am-btn-group am-btn-group-xs">

                                                    <a class="am-btn am-btn-default am-btn-xs am-hide-sm-only"
                                                       target="_blank"
                                                       href="/manage/editMenuPermission/{{$pc->id}}"><span
                                                                class="am-icon-copy"></span> 编辑

                                                    </a>
                                                    <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                                       href="/manage/deletePermission/{{$pc->id}}">
                                                        <span class="am-icon-trash-o"></span> 删除

                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>

                        <p>注：.....</p>
                    </form>
                </div>

            </div>
        </div>


    </div>
    <!-- content end -->
@endsection
@section('js')
    <script>
        $(function () {
            $(".xParent").dblclick(function () {
                var id = $(this).data('id');
                $(this).toggleClass('am-active');
                $('.children_' + id).toggle();
            })
            $("#show_all").click(function () {
                $('.xParent').toggleClass('am-active');
                $('.xChildren').toggle();
            })
            $("#close_all").click(function () {
                $('.xParent').removeClass('am-active');
                $('.xChildren').hide();
            })
        })
    </script>
@endsection
