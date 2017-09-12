@extends('layouts.application')

@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增用户</strong> /
                <small>Create User</small>
            </div>
        </div>

        @include('layouts._message')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">
                <div class="am-tab-panel">
                    <form class="am-form " action="/manage/menuPermissionAdd" method="post">
                        {{csrf_field()}}

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                上级分类
                            </div>
                            <div class="am-u-sm-4 am-u-md-4 am-u-end col-end">
                                <select name="fid">
                                    <option value="0">顶级栏目</option>
                                    @foreach($perms as $p)
                                        <option value="{{$p->id}}"
                                                @if($perm->id==$p->id) selected @endif>{{$p->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                权限名称
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="display_name"
                                       value="{{ $perm->display_name }}">
                            </div>
                        </div>


                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                权限路由
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="name" value="{{$perm->name}}">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                说明
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <textarea name="description">{{$perm->description}}</textarea>
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                是否菜单栏
                            </div>
                            <div class="am-u-sm-4 am-u-md-4 am-u-end col-end">
                                <select name="is_menu">
                                    <option value="1" @if($perm->is_menu==1) selected @endif>是</option>

                                    <option value="0" @if($perm->is_menu==0) selected @endif>否</option>

                                </select>
                            </div>
                        </div>


                        <div class="am-margin">
                            <button type="submit" class="am-btn am-btn-primary">保存修改</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection