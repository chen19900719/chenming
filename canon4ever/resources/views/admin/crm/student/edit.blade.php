@extends('layouts.admin.application')

@section('css')
    <link rel="stylesheet" href="/vendor/markdown/css/editormd.min.css"/>
@endsection
@section('content')
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">编辑学生信息</strong> /
                <small>Edit A Student</small>
            </div>
        </div>

        @include('layouts.admin.partials._flash')

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-12">

                <form class="am-form am-form-horizontal" action="{{ route('crm.student.update', $student->id) }}"
                      method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="am-tabs am-margin" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">基础信息</a></li>
                            <li><a href="#tab2">就业信息</a></li>
                            <li><a href="#tab3">学生评价</a></li>
                        </ul>

                        <div class="am-tabs-bd">
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                                <div class="am-g">
                                    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">

                                        <div class="am-panel am-panel-default">
                                            <div class="am-panel-bd">
                                                <div class="am-g">
                                                    <div class="am-u-md-4">
                                                        <img class="am-img-circle am-img-thumbnail" id="img_show" src="{{ empty($student->image) ? '/avatar.png' : env('QINIU_IMAGES_LINK') . $student->image }}">
                                                    </div>
                                                    <div class="am-u-md-8">
                                                        <p>你可以使用<a href="#">gravatar.com</a>提供的头像或者使用本地上传头像。 </p>
                                                        <div class="am-form-group">
                                                            <div class="am-form-group am-form-file new_thumb">
                                                                <button type="button"
                                                                        class="am-btn am-btn-success am-btn-sm">
                                                                    <i class="am-icon-cloud-upload" id="loading"></i>
                                                                    上传照片
                                                                </button>
                                                                <input type="file" id="image_upload">
                                                                <input type="hidden" name="image" value="{{$student->image}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="am-panel am-panel-default">
                                            <div class="am-panel-hd">
                                                入学时间
                                            </div>

                                            <div class="am-panel-bd">
                                                <input type="text" name="created_at" value="{{$student->created_at->format("Y-m-d")}}" class="am-form-field" data-am-datepicker="{theme: 'secondary'}" readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                                        <div class="am-form-group">
                                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
                                            <div class="am-u-sm-9">
                                                <input type="text" id="user-name" placeholder="姓名 / Name" name="name"
                                                       value="{{$student->name}}">
                                                <small>输入你的名字，让我们记住你。</small>
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-form-label">性别</label>
                                            <div class="am-u-sm-9">
                                                <div class="am-btn-group">
                                                    <label class="am-radio-inline">
                                                        <input type="radio" name="sex" value="1"
                                                               @if($student->sex == 1) checked @endif> 小伙
                                                    </label>
                                                    <label class="am-radio-inline">
                                                        <input type="radio" name="sex" value="0"
                                                               @if($student->sex == 0) checked @endif> 妹纸
                                                    </label>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-phone" class="am-u-sm-3 am-form-label">分组 /
                                                Team</label>
                                            <div class="am-u-sm-9">
                                                <select data-am-selected="{btnWidth: '48%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360}" name="team_id">

                                                    @foreach($teams as $team)
                                                        <optgroup label="{{$team->name}}">
                                                            @foreach($team->children as $t)
                                                                <option value="{{$t->id}}" @if($t->id == $student->team_id) selected @endif>
                                                                    {{$team->name}} / {{ $t->name }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件 / Email</label>
                                            <div class="am-u-sm-9">
                                                <input type="email" id="user-email" placeholder="输入你的电子邮件 / Email" name="email" value="{{$student->email}}">
                                                <small>邮箱你懂得...</small>
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-phone" class="am-u-sm-3 am-form-label">电话 /
                                                Telephone</label>
                                            <div class="am-u-sm-9">
                                                <input type="tel" id="user-phone" placeholder="输入你的电话号码 / Telephone"
                                                       name="tel" value="{{$student->tel}}">
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-QQ" class="am-u-sm-3 am-form-label">QQ</label>
                                            <div class="am-u-sm-9">
                                                <input type="text" pattern="[0-9]*" id="user-QQ"
                                                       placeholder="输入你的QQ号码" name="qq" value="{{$student->qq}}">
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-weibo" class="am-u-sm-3 am-form-label">学历 / Degree</label>
                                            <div class="am-u-sm-9">
                                                <select data-am-selected="{btnWidth: '48%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360}"
                                                        name="degree">
                                                    <option value="1" @if($student->degree == 1) selected @endif>高中
                                                    </option>
                                                    <option value="2" @if($student->degree == 2) selected @endif>大学
                                                    </option>
                                                    <option value="3" @if($student->degree == 3) selected @endif>研究生
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-phone" class="am-u-sm-3 am-form-label">身份证号 /
                                                ID Card</label>
                                            <div class="am-u-sm-9">
                                                <input type="text" id="id-card" placeholder="输入你的身份证号 / ID Card" name="id_card" value="{{$student->id_card}}">
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-phone" class="am-u-sm-3 am-form-label">紧急联络人 / Emergency
                                                Contact</label>
                                            <div class="am-u-sm-9">
                                                <input type="text" id="id-card" placeholder="输入你的紧急联系人姓名(亲属关系)、联系电话/ Emergency Contact" name="emergency_contact" value="{{$student->emergency_contact}}">
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-weibo" class="am-u-sm-3 am-form-label">了解我们的方式 / How To
                                                Find Us</label>
                                            <div class="am-u-sm-9">
                                                <select data-am-selected="{btnWidth: '48%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360}" name="find_us">

                                                    <option value="1" @if($student->find_us == 1) selected @endif>长乐未央官网
                                                    </option>
                                                    <option value="2" @if($student->find_us == 2) selected @endif>朋友介绍
                                                    </option>
                                                    <option value="3" @if($student->find_us == 3) selected @endif>QQ群
                                                    </option>
                                                    <option value="4" @if($student->find_us == 4) selected @endif>其他
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-weibo" class="am-u-sm-3 am-form-label">付款方式 / Pay
                                                Type</label>
                                            <div class="am-u-sm-9">
                                                <label class="am-radio-inline">
                                                    <input type="radio" value="1" name="pay_type" @if($student->pay_type==1) checked @endif>
                                                    现金/支付宝
                                                </label>

                                                <label class="am-radio-inline">
                                                    <input type="radio" value="2" name="pay_type" @if($student->pay_type==2) checked @endif>
                                                    刷卡
                                                </label>

                                                <label class="am-radio-inline">
                                                    <input type="radio" value="3" name="pay_type" @if($student->pay_type==3) checked @endif>
                                                    百度钱包
                                                </label>

                                                <label class="am-radio-inline">
                                                    <input type="radio" value="4" name="pay_type" @if($student->pay_type==4) checked @endif>
                                                    阳光钱包
                                                </label>
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-intro" class="am-u-sm-3 am-form-label">简介 / Intro</label>
                                            <div class="am-u-sm-9">
                                                <textarea class="" rows="5" id="user-intro" placeholder="输入个人简介"
                                                          name="description">{{$student->description}}</textarea>
                                                <small>250字以内写出你的一生...</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="am-tab-panel am-fade" id="tab2">
                                <div class="am-g am-margin-top">

                                    <label for="company" class="am-u-sm-4 am-u-md-2 am-text-right">公司名称 /
                                        Company</label>
                                    <div class="am-u-sm-6 am-u-end col-end">
                                        <input type="text" id="company" placeholder="公司名称 / Company" name="company"
                                               value="{{$student->company}}">
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">

                                    <label for="company" class="am-u-sm-4 am-u-md-2 am-text-right">地址 / Address</label>
                                    <div class="am-u-sm-6 am-u-end col-end">
                                        <textarea rows="4" name="address"
                                                  placeholder="地址 / Address">{{$student->address}}</textarea>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <label for="company" class="am-u-sm-4 am-u-md-2 am-text-right">工资 / Salary</label>
                                    <div class="am-u-sm-6 am-u-end col-end">
                                        <textarea rows="4" name="salary"
                                                  placeholder="工资 / Salary">{{$student->salary}}</textarea>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">

                                    <label for="company" class="am-u-sm-4 am-u-md-2 am-text-right">是否毕业</label>
                                    <div class="am-u-sm-6 am-u-end col-end">

                                        <label class="am-radio-inline">
                                            <input type="radio" value="0" name="is_finished" @if($student->is_finished==0) checked @endif>
                                            学习中
                                        </label>

                                        <label class="am-radio-inline">
                                            <input type="radio" value="1" name="is_finished" @if($student->is_finished==1) checked @endif>
                                            已毕业
                                        </label>

                                    </div>
                                </div>
                            </div>


                            <div class="am-tab-panel am-fade" id="tab3">

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-12 am-u-md-12">
                                        <div id="markdown">
                                            <textarea rows="10" name="content"
                                                      style="display:none;">{{$student->content}}</textarea>
                                        </div>
                                    </div>
                                </div>
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

    <script>
        $(function () {
            $("#user-email").blur(function () {
                var email = $(this).val().split('@');
                if (email[1] == "qq.com") {
                    $("#user-QQ").val(email[0]);
                }
            })
        })
    </script>
@endsection