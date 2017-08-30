@extends('layouts.aplication')
@section('content')
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">

        <div class="container-fluid am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                    <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 表单
                        <small>Amaze UI</small>
                    </div>
                    <p class="page-header-description">Amaze UI 有许多不同的表格可用。</p>
                </div>
                <div class="am-u-lg-3 tpl-index-settings-button">
                    <button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置
                    </button>
                </div>
            </div>

        </div>

        <div class="row-content am-cf">


            <div class="row">

                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title am-fl">新建部门</div>
                            <div class="widget-function am-fr">
                                <a href="javascript:;" class="am-icon-cog"></a>
                            </div>
                        </div>
                        <div class="widget-body am-fr">
                            @include('layouts._flash')
                            <form class="am-form tpl-form-line-form" method="post" action="/admin/department/create">
                                {{csrf_field()}}
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">部门名称<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入部门"
                                               name="name">
                                        <small>请填写标题文字10-20字左右。</small>
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">部门经理<span
                                                class="tpl-form-line-small-title">Author</span></label>
                                    <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 1}" style="display: none;">
                                            <option value="a">学会伪装</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span
                                                class="tpl-form-line-small-title">Images</span></label>
                                    <div class="am-u-sm-9">
                                        <div class="am-form-group am-form-file">
                                            <div class="tpl-form-file-img">
                                                <img src="" alt="" id="img_show">
                                            </div>
                                            <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                                <i class="am-icon-cloud-upload" id="loadimg"></i> 添加封面图片
                                            </button>
                                            <input id="upload_file" type="file" multiple="">
                                            <input type="hidden" name="file">
                                        </div>
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">部门简介</label>
                                    <div class="am-u-sm-9">
                                        <textarea class="" rows="10" id="user-intro" placeholder="部门描述"
                                                  name="desc"></textarea>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                                            提交
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            var obj = {
                url: '/admin/upload',
                type: 'POST',
                beforeSend: function () {
                    $('#loadimg').attr('class', 'am-icon-spinner am-icon-pulse')
                },
                success: function (data) {
                    if (data.info == 0) {
                        alert(data.msg);
                        return false;
                    }
                    if (data.info == 1) {
                        $('#img_show').attr('src', data.img);
                        $('input[name=file]').val(data.img);
                        $('#loadimg').attr('class', 'am-icon-cloud-upload');
                    }
                },
            }
            $('#upload_file').fileUpload(obj);
        })

    </script>
@endsection