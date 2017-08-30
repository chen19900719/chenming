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
                            <form class="am-form tpl-form-line-form" method="post" action="/admin/task/store"
                                  id="save_form">
                                {{csrf_field()}}
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">项目名称<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder="项目名称"
                                               name="name" value="{{$task->name}}">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">项目时间<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="am-form-field" name="start_time" placeholder="开始时间"
                                               value="{{$task->start_time}}"
                                               data-am-datepicker readonly required/>
                                    </div>

                                    <div class="am-u-sm-9">
                                        <input type="text" class="am-form-field" name="end_time" placeholder='结束时间'
                                               data-am-datepicker readonly required/>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">项目金额<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder="项目金额"
                                               name="price">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">合同样式<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"
                                                name="contract_id">
                                            @foreach($contractType as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">项目描述<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder="项目描述"
                                               name="desc">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span
                                                class="tpl-form-line-small-title">Images</span></label>
                                    <div class="am-u-sm-9">
                                        <div class="am-form-group am-form-file">
                                            <div class="tpl-form-file-img">
                                                <img src="{{$task->thumb}}" alt="" id="img_show"
                                                     style="height:100px;width:100px;">
                                            </div>
                                            <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                                <i class="am-icon-cloud-upload" id="loadimg"></i> 添加封面图片
                                            </button>
                                            <input id="upload_file" type="file" multiple="">
                                            <input type="hidden" name="thumb">
                                        </div>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-3 am-form-label">附件 <span
                                                class="tpl-form-line-small-title">Images</span></label>
                                    <div class="am-u-sm-9">
                                        <div class="tpl-form-file-img file_list">
                                            @if(isset($task->attaches))
                                                @foreach($task->attaches as $t)
                                            <p class="file-form"><span><a href="/admin/fileDownload/{{$t->id}}" target="_blank">{{$t->url}}</a></span><span><input type="hidden" name="file_id[]" value="226">
                                                    <span><button type="button" class="file_delete" data-id="{{$t->id}}"> 删除</button></span></span></p>
                                                @endforeach
                                                @endif
                                        </div>
                                    </div>

                                    <div class="am-u-sm-9">
                                        {{--<div class="col-sm-4">--}}
                                        {{--<input type="file" id="file_upload" name="file"/>--}}
                                        {{--<input type="hidden" id="relation_type" value="task"/>--}}
                                        {{--</div>--}}
                                        <div class="am-form-group am-form-file">
                                            <div class="tpl-form-file-img">
                                                <img src="" alt="" id="img_show">
                                            </div>
                                            <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                                <i class="am-icon-cloud-upload" id="file_loading"></i> 上传附件
                                            </button>
                                            <input type="file" id="uploadFile" multiple="">
                                            <input type="hidden" name="attach_id[]" id="attach_id">
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-title am-fl">推送设置</div>
                                <br>
                                <br>
                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">推送类型<span
                                                class="tpl-form-line-small-title">Author</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="checkbox" value="1" name="push_id">开发
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">推送范围<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder=""
                                               name="skill_id">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">推送标签<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder=""
                                               name="cate_id">
                                    </div>
                                </div>
                                <div class="widget-title am-fl">支付设置</div>
                                <br>
                                <br>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">报价方式<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"
                                                name="contract_id">
                                            @foreach($paySay as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">支付方式<span
                                                class="tpl-form-line-small-title">Title</span></label>
                                    <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 1}" style="display: none;"
                                                name="contract_id">
                                            @foreach($payType as $kT=>$vT)
                                                <option value="{{$kT}}">{{$vT}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success"
                                                id="save_task">
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
            $('#save_task').click(function () {
                var name = $('input[name=name]').val();
                var price = $('input[name=price]').val();
                var desc = $('input[name=desc]').val();
                var start_time = $('input[name=start_time]').val();
                var end_time = $('input[name=end_time]').val();
                var status = 0;//计数器
                if (!name) {
                    status++;
                    alert('名称不能为空');
                    return false;
                }
                if (!price) {
                    status++;
                    alert('请填入金额');
                    return false;
                }
                if (!desc) {
                    status++;
                    alert('请填入项目描述');
                    return false;
                }
                if (end_time < start_time) {
                    status++;
                    alert('结束时间必须大于开始时间');
                    return false;
                }
                if (status == 0) {
                    $('#save_form').submit();
                }
            })
            var obj = {
                url: "/admin/upload",
                type: "post",
                beforeSend: function () {
                    $('#loadimg').attr('class', 'am-icon-spinner am-icon-pulse')
                },
                success: function (data) {
                    $('#img_show').attr('src', data.img);
                    $('input[name=thumb]').val(data.img);
                    $('#loadimg').attr('class', 'am-icon-cloud-upload');

                }
            }
            $('#upload_file').fileUpload(obj);

            var html = '';
            var index = 1;
            var opt = {
                url: "/admin/uploadFile",
                type: "post",
                beforeSend: function () {
                    $('#file_loading').attr('class', 'am-icon-spinner am-icon-pulse')
                    var status = $(".file-form").length + 1;
                    if (status > 3) {
                        alert('最多只能加三个');
                        $('#file_loading').attr('class', 'am-icon-cloud-upload');
                        return false;
                    }
                },
//                    <input type='hidden'  name='file_id[]' id='file-"+data.id+"' value='"+data.id+"'/>
                success: function (data) {
                    console.log(data);
                    html = '<p class="file-form">' +
                            '<span><a href="/admin/fileDownload/' + data.attach_id + '" target="_blank">"' + data.img + '"</a></span><span>' +
                            '<input type="hidden" name="file_id[]"  id="file_delete' + data.attach_id + '"  value="' + data.attach_id + '">' +
                            '<span><button type="button" class="file_delete" data-id= ' + data.attach_id + '  > 删除</span> </span> </p>'
                    $('.file_list').append(html);
                    $('#file_loading').attr('class', 'am-icon-cloud-uploa d');
                    index++;
                }
            }
            $('#uploadFile').fileUpload(opt);
            $(document).on('click', '.file_delete', function () {
                var file_delete_id = $(this).attr('data-id');
                console.log(file_delete_id);
                if (file_delete_id != undefined) {
                    $.get('/admin/fileDelete', {id: file_delete_id}, function (data) {
                        if (data.info == 1) {
                            alert(data.msg);
                        } else {
                            alert(data.msg);
                        }
                    })
                    $(this).parents('.file-form').remove();
                }

            })
        })
    </script>

@endsection