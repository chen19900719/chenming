@extends('layouts.application')
<!-- sidebar end -->
@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">角色管理</strong> /
                    <small>Table</small>
                </div>
            </div>
            @include('layouts._message')
            <hr>


            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-group am-btn-group-xs">
                        <a class="am-btn am-btn-default" href="/manage/role/addRole">
                            <span class="am-icon-plus"></span> 新增
                        </a>
                    </div>
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">角色名</th>
                                <th class="table-date am-hide-sm-only">创建时间</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($role as $r)
                                <tr>
                                    <td>{{$r->id}}</td>
                                    <td><a href="#">{{$r->name}}</a></td>
                                    <td>{{$r->created_at}}</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">


                                                <a class="am-btn am-btn-default am-btn-xs am-hide-sm-only"
                                                   target="_blank"
                                                   href="/manage/role/editRole/{{$r->id}}"><span
                                                            class="am-icon-copy"></span> 编辑

                                                </a>
                                                <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                                   href="/manage/article/delete/">
                                                    <span class="am-icon-trash-o"></span> 删除

                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
