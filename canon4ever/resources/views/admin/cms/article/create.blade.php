@extends('layouts.admin.application')

@section('css')
    <link rel="stylesheet" href="/vendor/markdown/css/editormd.min.css"/>
@endsection
@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">新增文章</strong> /
                <small>Create A New Article</small>
            </div>
        </div>

        @include('layouts.admin.partials._flash')

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <form class="am-form" action="{{ route('cms.article.store') }}" method="post">
                    {{ csrf_field() }}

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            所属栏目
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <select data-am-selected="{btnWidth: '100%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                    name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {!! indent_category($category->count) !!}{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            文章标题
                        </div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <input type="text" class="am-input-sm" name="title" value="{{old('title')}}">
                        </div>
                        <div class="am-hide-sm-only am-u-md-6">*必填</div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            来源
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <input type="text" class="am-input-sm" name="from_name" placeholder="请填写作者姓名" value="{{old('from_name')}}">
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            网址
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <input type="text" class="am-input-sm" name="from_url" placeholder="请填写来源网址" value="{{old('from_url')}}">
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            缩略图
                        </div>

                        <div class="am-u-sm-8 am-u-md-8 am-u-end col-end">
                            <div class="am-form-group am-form-file new_thumb">
                                <button type="button" class="am-btn am-btn-success am-btn-sm">
                                    <i class="am-icon-cloud-upload" id="loading"></i> 上传新的缩略图
                                </button>
                                <input type="file" id="image_upload">
                                <input type="hidden" name="image" value="{{old('image')}}">
                            </div>

                            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

                            <div>
                                <img src="" id="img_show">
                            </div>
                        </div>
                    </div>

                    <div class="am-g am-margin-top sort">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            描述信息
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <textarea rows="4" name="description">{{old('desc')}}</textarea>
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            置顶
                        </div>
                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                            <input type="radio" name="is_top" value="1" @if(old('is_top') == '1')) checked @endif> 是
                            <input type="radio" name="is_top" value="0" @if(!old('is_top') or old('is_top') =='0'))
                                   checked @endif> 否
                        </div>
                    </div>

                    <div class="am-g am-margin-top-sm">
                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                            文章内容
                        </div>
                    </div>

                    <div class="am-g am-margin-top-sm">
                        <div class="am-u-sm-12 am-u-md-12">
                            <div id="markdown">
                                <textarea rows="10" name="content" style="display:none;">{{old('content')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="am-margin">
                        <button type="submit" class="am-btn am-btn-primary am-radius">提交保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>
    <script src="/vendor/markdown/editormd.min.js"></script>
    <script src="/js/editormd_config.js"></script>
@endsection