@extends('layouts.admin.application')

@section('css')
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
@endsection

@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学生列表</strong> /
                <small>Students List</small>
            </div>
        </div>

        @include('layouts.admin.partials._flash')

        <div class="am-g" style="height: 37px;">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a type="button" class="am-btn am-btn-default" href="{{route('crm.student.create')}}">
                            <span class="am-icon-plus"></span> 新增
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">
                <form class="am-form-inline" role="form" method="get">

                    <div class="am-form-group">
                        <input type="text" name="name" class="am-form-field am-input-sm" placeholder="姓名"
                               value="{{ Request::input('name') }}">
                    </div>

                    <div class="am-form-group">
                        <input type="text" name="company" class="am-form-field am-input-sm" placeholder="公司名"
                               value="{{ Request::input('company') }}">
                    </div>

                    <div class="am-form-group">
                        <select data-am-selected="{btnSize: 'sm'}" name="is_finish" id="">
                            <option value="-1" @if(Request::input('is_finish') == '-1') selected @endif>是否毕业</option>
                            <option value="1" @if(Request::input('is_finish') == '1') selected @endif>毕业</option>
                            <option value="0" @if(Request::input('is_finish') == '0') selected @endif>在学</option>
                        </select>
                    </div>

                    <div class="am-form-group">
                        <input type="text" id="created_at" placeholder="入门时间" name="created_at"
                               value="{{ Request::input('created_at') }}" class="am-form-field am-input-sm"/>
                    </div>

                    <button type="submit" class="am-btn am-btn-default am-btn-sm">查询</button>
                </form>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form" id="form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id">编号</th>
                            <th class="table-thumb">照片</th>
                            <th class="table-name">名字</th>
                            <th>就业公司</th>
                            <th>QQ</th>
                            <th class="table-email">邮件</th>
                            <th class="table-tel">电话</th>
                            <th class="table-date am-hide-sm-only">入学时间</th>
                            <th>性别</th>
                            <th>分组</th>
                            <th class="table-top am-hide-sm-only">是否毕业</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            <tr data-id="{{$student->id}}">

                                <td>{{$student->id}}</td>
                                <td class="student_thumb">
                                    {!! image_url($student, ['class'=>'thumb']) !!}
                                </td>
                                <td>
                                    {{$student->name}}
                                </td>

                                <td>{{$student->company}}</td>
                                <td>
                                    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={{$student->qq}}&site=qq&menu=yes" data-am-popover="{theme: 'secondary sm', content: '{{$student->qq}}', trigger: 'hover focus'}">
                                        <span class="am-badge am-badge-primary am-radius">
                                            <span class="am-icon-qq"> QQ</span>
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    @if ($student->email)
                                        <a href="mailto:{{$student->email}}" data-am-popover="{theme: 'secondary sm', content: '{{$student->email}}', trigger: 'hover focus'}">
                                            <span class="am-badge am-badge-warning am-radius">
                                                <span class="am-icon-send"></span>
                                            </span>
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    @if ($student->tel)
                                        <a href="tel:{{$student->tel}}" data-am-popover="{theme: 'secondary sm', content: '{{$student->tel}}', trigger: 'hover focus'}">
                                            <span class="am-badge am-badge-success am-radius">
                                                <span class="am-icon-phone"></span>
                                            </span>
                                        </a>
                                    @endif
                                </td>

                                <td class="am-hide-sm-only">
                                    {{$student->created_at->format("Y-m-d")}}
                                </td>

                                <td class="am-hide-sm-only">
                                    @if($student->sex == 1)
                                        <span class="am-icon-male"></span>
                                    @else
                                        <span class="am-icon-female"></span>
                                    @endif
                                </td>
                                <td class="am-hide-sm-only">
                                    @if($student->team)
                                        <a href="{{route('crm.team.show', $student->team->id)}}">
                                            {{$student->team->parent->name}} / {{$student->team->name}}
                                        </a>
                                    @endif
                                </td>

                                <td class="am-hide-sm-only">
                                    {!! is_something('is_finished', $student) !!}
                                </td>

                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary"
                                               href="{{route('crm.student.edit', $student->id)}}">
                                                <span class="am-icon-pencil-square-o"></span> 编辑
                                            </a>

                                            <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"
                                               href="{{route('crm.student.destroy', $student->id)}}"
                                               data-method="delete"
                                               data-token="{{csrf_token()}}" data-confirm="确定要删除该学生吗?">
                                                <span class="am-icon-trash-o"></span> 删除
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    共 {{$students->total()}} 条记录

                    <div class="am-cf">
                        <div class="am-fr">
                            {!! $students->links() !!}
                        </div>
                    </div>
                    <hr/>
                </form>
            </div>

        </div>

    </div>
@endsection

@section('js')
    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/moment/locale/zh-cn.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>
    <script>
        $(function () {
            //是否...
            $(".is_something").click(function () {
                var _this = $(this);
                var data = {
                    id: _this.parents("tr").data('id'),
                    attr: _this.data('attr')
                }

                $.ajax({
                    type: "PATCH",
                    url: "/crm/student/is_something",
                    data: data,
                    success: function (data) {
                        if (data.status == 0) {
                            alert(data.msg);
                            return false;
                        }
                        _this.toggleClass('am-icon-close am-icon-check');
                    }
                });
            });
        });
    </script>
@endsection