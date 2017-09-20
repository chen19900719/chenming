<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Page | Amaze UI Example</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="/vendor/amazeui/i/favicon.png">
    <link rel="stylesheet" href="/vendor/amazeui/css/amazeui.min.css"/>
    <style>
        .header {
            text-align: center;
        }

        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }

        .header p {
            font-size: 14px;
        }

        body {
            font-family: Raleway, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #636b6f;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>長樂未央</h1>
        {{--<p>itcasts.net</p>--}}
    </div>
    <hr/>
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>管理员登录</h3>
        <hr>

        <form method="post" class="am-form am-form-horizontal" action="{{ url('/login') }}">
            {!!  csrf_field()  !!}

            <div class="am-form-group{{ $errors->has('name') ? ' am-form-error' : '' }} am-form-icon am-form-feedback">
                <label class="am-form-label" for="doc-ipt-success">用户名: @if($errors->has('name')){{ $errors->first('name') }} @endif</label>
                <input type="text" class="am-form-field" placeholder="输入你的用户名" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="am-icon-warning">{{$errors->first('name')}}</span>
                @endif
            </div>


            <div class="am-form-group{{ $errors->has('password') ? ' am-form-error' : '' }} am-form-icon am-form-feedback">
                <label class="am-form-label" for="doc-ipt-success">密码: @if($errors->has('password')){{ $errors->first('password') }} @endif</label>
                <input type="password" class="am-form-field" placeholder="输入你的密码" name="password" required>
                @if ($errors->has('password'))
                    <span class="am-icon-warning"></span>
                @endif
            </div>

            <div class="am-form-group{{ $errors->has('captcha') ? ' am-form-error' : '' }} am-form-icon am-form-feedback">
                <label class="am-form-label" for="doc-ipt-success">验证码: @if($errors->has('captcha')){{ $errors->first('captcha') }} @endif</label>

                <div class="am-g doc-am-g">
                    <div class="am-u-sm-9">
                        <input type="text" class="am-form-field" placeholder="输入你的验证码" name="captcha" required>
                        @if ($errors->has('captcha'))
                            <span class="am-icon-warning"></span>
                        @endif
                    </div>
                    <div class="am-u-sm-3">
                        <img src="{{captcha_src()}}" alt="" style="cursor: pointer;" onclick="this.src='{{captcha_src()}}'+ Math.random();">
                    </div>
                </div>
            </div>


            <br>
            <label for="remember-me">
                <input id="remember-me" name="remember" type="checkbox">
                记住密码
            </label>
            <br/>
            <div class="am-cf">
                <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
                <a href="{{ url('/password/reset') }}" class="am-btn am-btn-default am-btn-sm am-fr">忘记密码 ^_^? </a>
            </div>
        </form>
        <hr>
        <p>© Copyright 2013-2017 长乐未央公司版权所有</p>
    </div>
</div>
</body>
</html>

