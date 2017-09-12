@extends('layouts.application')
@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增用户组</strong> /
                <small>Create Role</small>
            </div>
        </div>

        @include('layouts._message')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <div class="am-tab-panel">
                    <form class="am-form " action="/manage/role/editRole/{{$role->id}}" method="post">
                        {{ csrf_field() }}

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                用户组名
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="name" placeholder="请输入用户组名"
                                       value="{{$role->name}}">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                权限列表
                            </div>

                            <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">

                                @foreach($permissions as $permission)
                                    <div class="am-panel am-panel-default">
                                        <div class="am-panel-hd">
                                            <label class="am-checkbox-inline am-danger">
                                                <input data-am-ucheck type="checkbox" value="{{$permission->id}}"
                                                       name="permission_id[]" class="permission1"
                                                       @if(in_array($permission->id,$perm_id)) checked="checked" @endif>
                                                <span class="am-badge am-badge-secondary am-text-sm am-radius">{{$permission->display_name}}</span>
                                            </label>
                                        </div>
                                        <div class="am-panel-bd">

                                            @foreach($permission->children as $children)
                                                <div class="am-g am-margin-top ">
                                                    <div class="am-u-sm-4 am-u-md-3 am-text-right permission-div2">
                                                        <label class="am-checkbox-inline am-danger">
                                                            <input data-am-ucheck type="checkbox"
                                                                   value="{{$children->id}}" name="permission_id[]"
                                                                   class="permission2"
                                                                   @if(in_array($children->id,$perm_id)) checked="checked" @endif>
                                                            <span class="am-badge am-badge-success am-radius">{{$children->display_name}}</span>
                                                        </label>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endforeach

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