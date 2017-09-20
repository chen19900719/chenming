@extends('layouts.admin.application')
@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">学生管理</strong> /
                <small>Student Manage</small>
            </div>
        </div>

        @include('layouts.admin.partials._flash')

        <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
            <li>
                <a href="{{ route('crm.team.index_list') }}" class="am-text-primary">
                    <span class="am-icon-btn am-icon-list"></span><br/>分组列表<br/>
                </a>
            </li>

            <li>
                <a href="{{ route('crm.student.index') }}" class="am-text-success">
                    <span class="am-icon-btn am-icon-graduation-cap"></span><br/>学生管理<br/>{{ \App\Models\Crm\Student::count() }}
                </a>
            </li>

            <li>
                <a href="{{ route('crm.student.create') }}" class="am-text-warning">
                    <span class="am-icon-btn am-icon-user-plus"></span><br/>新学生注册<br/>
                </a>
            </li>

            <li>
                <a href="{{route('crm.team.index')}}" class="am-text-secondary">
                    <span class="am-icon-btn am-icon-columns"></span><br/>分组管理
                </a>
            </li>
        </ul>


        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

        <div class="am-g">
            <div class="am-u-sm-12">
                <div id="students_count" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

        <div class="am-g">
            <div class="am-u-sm-12">
                <div id="avg_salary" style="width: 100%;height:600px;"></div>
            </div>
        </div>

        <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

        <div class="am-g">
            <div class="am-u-md-6">
                <div id="find_us" style="width: 100%;height:400px;"></div>
            </div>

            <div class="am-u-md-6">
                <div id="pay_type" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        @include('layouts.admin.partials._footer')
    </div>
@endsection


@section('js')
    <script src="/vendor/echarts/echarts.min.js"></script>
    <script src="/vendor/echarts/macarons.js"></script>

    <script src="/js/visualization/students_count.js"></script>
    <script src="/js/visualization/find_us.js"></script>
    <script src="/js/visualization/pay_type.js"></script>
    <script src="/js/visualization/avg_salary.js"></script>
@endsection