<!doctype html>
<html class="no-js">
<head>
    <title>PHP武汉</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="/vendor/amazeui/i/favicon.png">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/vendor/amazeui/i/app-icon72x72@2x.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="/vendor/amazeui/i/app-icon72x72@2x.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="/vendor/amazeui/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <link rel="stylesheet" href="/vendor/amazeui/css/amazeui.min.css">
    <link rel="stylesheet" href="/vendor/amazeui/css/app.css">
    <link rel="stylesheet" href="/vendor/nprogress/nprogress.css">
    <link rel="stylesheet" href="/home/css/common.css">
    @yield('css')

</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，长乐未央暂不支持。 请 <a
        href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<!--正文-->

<!--导航-->
<header class="am-topbar">
    <div class="am-container">

        <h1 class="am-topbar-brand">
            <a href="/">长乐未央PHP</a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
                data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
                    class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav">

                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        独家课程 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="#">1. 前端开发(html5+css3)</a></li>
                        <li><a href="#">2. javascript&jQuery</a></li>
                        <li><a href="#">3. Bootstrap框架</a></li>
                        <li><a href="#">4. PHP技术</a></li>
                        <li><a href="#">5. MySql数据库</a></li>
                        <li><a href="#">6. Smarty模板引擎</a></li>
                        <li><a href="#">7. Linux管理配置</a></li>
                        <li><a href="#">8. ThinkPHP框架</a></li>
                        <li><a href="#">9. Laravel框架</a></li>
                        <li><a href="#">10. 微信开发</a></li>
                    </ul>
                </li>

                @foreach ($navigation as $nav)
                    @if($nav->children->isEmpty())
                        <li><a href="{{$nav->url}}" target="_blank">{{$nav->name}}</a></li>
                    @else
                        <li class="am-dropdown" data-am-dropdown>
                            <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                                {{$nav->name}} <span class="am-icon-caret-down"></span>
                            </a>

                            <ul class="am-dropdown-content">
                                @foreach($nav->children as $k=>$v)
                                    <li><a href="/category/{{$v->id}}">{{$k+1}}. {{$v->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

            </ul>


            <form class="am-topbar-form am-topbar-left am-form-inline am-topbar-right" role="search">
                <div class="am-form-group">
                    <input type="text" class="am-form-field am-input-sm" placeholder="搜索文章">
                </div>
                <button type="submit" class="am-btn am-btn-default am-btn-sm">搜索</button>
            </form>

        </div>
    </div>
</header>
<!--导航结束-->

<div class="am-container">
    @yield('content')
</div>

<!--正文结束-->

<!--页脚-->
<footer data-am-widget="footer" class="am-footer am-footer-default my-footer" data-am-footer="{  }">

    <div class="am-footer-miscs">
        <p>itcasts.net</p>

        <p>鄂ICP备13016268号-7</p>
    </div>

    <div class="am-footer-miscs ">
        <p>Copyright © 2013-2017.</p>

        <p>All rights reserved</p>

        <p>客服热线: 027-87774527</p>
    </div>


    <div class="am-footer-miscs ">
        <p> 长乐未央公司 版权所有</p>
    </div>


</footer>


<!--页脚结束-->

<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" style="width: auto;">
    <a href="#top" title="回到顶部" class="am-icon-btn am-icon-arrow-up am-active" id="amz-go-top"></a>
</div>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/vendor/amazeui/js/amazeuiui.ie8polyfill.min.js"></script>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/vendor/amazeui/js/amazeui.min.js"></script>
<script src="/vendor/nprogress/nprogress.js"></script>

<script src="/home/js/common.js"></script>

@yield('js')

</body>
</html>