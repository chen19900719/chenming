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
                    <form class="am-form " action="/manage/addManage" method="post">
                        {{ csrf_field() }}

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                用户名
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="text" class="am-input-sm" name="name" value="{{ old('name') }}">
                            </div>
                        </div>



                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                新密码
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="password" class="am-input-sm" name="password">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                确认密码
                            </div>
                            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                <input type="password" class="am-input-sm" name="password_confirmation">
                            </div>
                        </div>

                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-3 am-text-right">
                                选择角色
                            </div>
                            <div class="am-u-sm-8 am-u-md-9 am-u-end col-end">

                                <label class="am-checkbox-inline">

                                    <select name="role_id">
                                        <option>请选择</option>
                                        @foreach($role as $r)
                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach

                                    </select>


                                </label>

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