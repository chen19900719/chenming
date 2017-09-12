@extends('layouts.application')
<!-- sidebar end -->
@section('content')

    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增广告</strong>/
                <span>Create a new ad</span>
            </div>
        </div>
        @include('layouts._message')
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">
                <div class="am-g">
                    <div class="am-u-sm-12">
                        <form class="am-form " action="/manage/article/create" method="post">
                            {!! csrf_field() !!}

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    文章标题
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text" class="am-input-sm" name="title" value="{{ old('url')}}">
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    描述信息
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <textarea rows="4" name="desc"></textarea>
                                </div>
                            </div>


                            <div class="am-margin">
                                <button type="submit" class="am-btn am-btn-primary">提交保存</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection