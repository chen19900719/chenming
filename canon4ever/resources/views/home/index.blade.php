@extends('layouts.home.application')

@section('css')
    <link rel="stylesheet" href="/home/css/index.css">
@endsection
@section('content')

    <div class="am-panel am-panel-default">
        <div class="am-panel-bd">
            <div style="text-align:center">武汉PHP，对！没错！这里就是 PHP 社区，目前这里已经是武汉最权威的 PHP 社区，拥有武汉最资深的 PHP 工程师。</div>
        </div>
    </div>

    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
        <h2 class="">
            <img src="/home/img/logo.png"/>
        </h2>
    </div>

    <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

    <!--第一列-->
    <div class="am-g">
        <div class="am-u-md-3">
            <div data-am-widget="tabs" class="am-tabs am-tabs-default p-news" style="margin:0;">
                <ul class="am-tabs-nav am-cf">
                    <li class="am-active"><a href="[data-tab-panel-0]">业界新闻</a></li>
                    <li class=""><a href="[data-tab-panel-1]">武汉互联网</a></li>
                </ul>
                <div class="am-tabs-bd">
                    <div data-tab-panel-0 class="am-tab-panel am-active">
                        <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                            <div class="am-list-news-bd">
                                <ul class="am-list">

                                    @foreach ($news->net as $net)
                                        <li class="am-g am-list-item-desced">
                                            <a href="{{url('article', $net->id)}}" class="am-list-item-hd"
                                               target="_blank">
                                                {{ $net->title }}
                                            </a>

                                            <div class="am-list-item-text">
                                                {{ sub($net->markdown_html_code, 38) }}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div data-tab-panel-1 class="am-tab-panel ">

                        <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                            <div class="am-list-news-bd">
                                <ul class="am-list">
                                    @foreach ($news->wh as $wh)
                                        <li class="am-g am-list-item-desced">
                                            <a href="{{url('article', $wh->id)}}" class="am-list-item-hd"
                                               target="_blank">
                                                {{ $wh->title }}
                                            </a>

                                            <div class="am-list-item-text">
                                                {{ sub($wh->markdown_html_code, 38) }}
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="am-u-md-6">
            <div class="am-g">
                <div class="am-u-md-12">
                    <!--幻灯片-->
                    <div data-am-widget="slider" class="am-slider am-slider-default"
                         data-am-slider='{"animation":"slide","slideshow":false}'>
                        <ul class="am-slides">
                            <li>
                                <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg">

                                <div class="am-slider-desc">这是标题标题标题标题标题标题标题0</div>

                            </li>
                            <li>
                                <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg">

                                <div class="am-slider-desc">这是标题标题标题标题标题标题标题1</div>

                            </li>
                            <li>
                                <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg">

                                <div class="am-slider-desc">这是标题标题标题标题标题标题标题2</div>

                            </li>
                            <li>
                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg">

                                <div class="am-slider-desc">这是标题标题标题标题标题标题标题3</div>

                            </li>
                        </ul>
                    </div>

                </div>
                <div class="am-u-md-6">

                    <div class="am-panel am-panel-default p-panel-info">
                        <div class="am-panel-hd">
                            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                                <h2 class="am-titlebar-title ">
                                    大牛们说
                                </h2>
                                <nav class="am-titlebar-nav">
                                    <a href="{{url('category', 9)}}" class="">+更多</a>
                                </nav>
                            </div>
                        </div>
                        <div class="am-panel-bd">
                            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                <div class="am-list-news-bd">
                                    <ul class="am-list">

                                        @foreach ($news->genius as $genius)
                                            <li class="am-g am-list-item-dated p-dashed">
                                                <a href="{{url('article', $genius->id)}}" class="am-list-item-hd"
                                                   target="_blank">{{ $genius->title }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="am-u-md-6">

                    <div class="am-panel am-panel-default p-panel-info">
                        <div class="am-panel-hd">

                            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                                <h2 class="am-titlebar-title ">
                                    程序员生活
                                </h2>
                                <nav class="am-titlebar-nav">
                                    <a href="{{url('category', 10)}}" class="">+更多</a>
                                </nav>
                            </div>
                        </div>
                        <div class="am-panel-bd">
                            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                <div class="am-list-news-bd">
                                    <ul class="am-list">
                                        @foreach ($news->life as $life)
                                            <li class="am-g am-list-item-dated p-dashed">
                                                <a href="{{url('article', $life->id)}}" class="am-list-item-hd"
                                                   target="_blank">{{ $life->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="am-u-md-3 am-hide-sm-only">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                        <h2 class="am-titlebar-title ">
                            开发手册
                        </h2>
                    </div>
                </div>
                <div class="am-panel-bd">
                    <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                        <div class="am-list-news-bd">
                            <nav data-am-widget="menu" class="am-menu  am-menu-default">
                                <a href="javascript: void(0)" class="am-menu-toggle">
                                    <i class="am-menu-toggle-icon am-icon-bars"></i>
                                </a>

                                <ul class="am-menu-nav am-avg-sm-1">

                                    @foreach($manuals as $manual)
                                        <li class="">
                                            <a href="##" class="">{{$manual->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>

                            <div>
                                <img src="http://s.amazeui.org/media/i/demos/pure-1.jpg?imageView2/0/w/640"
                                     alt="春天的花开秋天的风以及冬天的落阳" class="am-img-responsive am-radius"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--第一列结束-->

    <!--PHP技术-->
    <div class="am-g">
        <div class="am-u-md-8">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-multi">
                        <h2 class="am-titlebar-title ">
                            PHP技术
                        </h2>
                        <nav class="am-titlebar-nav">
                            <a href="{{url('category', 11)}}" class="">+更多</a>
                        </nav>
                    </div>
                </div>
                <div class="am-panel-bd">
                    <div class="am-g">
                        <div class="am-u-md-6">
                            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                <div class="am-list-news-bd">
                                    <ul class="am-list">

                                        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-top">
                                            <div class="am-list-thumb am-u-sm-12">
                                                <a href="http://www.douban.com/online/11645411/" class="">
                                                    <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                         alt="“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！" class="p-phpjs"/>
                                                </a>
                                            </div>

                                            <div class=" am-list-main">
                                                <h3 class="am-list-item-hd"><a
                                                            href="http://www.douban.com/online/11645411/"
                                                            class="p-orange">“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！</a></h3>


                                                <div class="am-list-item-text">
                                                    还在苦恼圣诞礼物再也玩儿不出新意？快来抢2013最炫彩的跨国圣诞礼物！【参与方式】1.关注“UniqueWay无二之旅”豆瓣品牌小站http://brand.douban.com/uniqueway/2.上传一张**本人**在旅行中色彩最浓郁、最丰富的照片（色彩包含取景地、周边事物、服装饰品、女生彩妆等等，发挥你们无穷的创意想象力哦！^^）一定要有本人出现喔！3.
                                                    在照片下方，附上一句旅行宣言作为照片说明。 成功参与活动！* 听他们刚才说，上传照片的次
                                                </div>

                                            </div>
                                        </li>

                                        <li class="am-g am-list-item-desced">
                                            <a href="http://www.douban.com/online/11624755/"
                                               class="am-list-item-hd ">我最喜欢的一张画</a>


                                            <div class="am-list-item-text">
                                                你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片美我最喜欢的画群296795413进群发画，少说多发图，
                                            </div>

                                        </li>
                                        <li class="am-g am-list-item-desced">
                                            <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的那些囧！</a>


                                            <div class="am-list-item-text">
                                                囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                            </div>

                                        </li>


                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="am-u-md-6">
                            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                <div class="am-list-news-bd">
                                    <ul class="am-list">
                                        @foreach ($news->php as $php)
                                            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right">
                                                <div class=" am-u-sm-8 am-list-main">
                                                    <h3 class="am-list-item-hd">
                                                        <a href="{{url('article', $php->id)}}" target="_blank">
                                                            {{ $php->title }}
                                                        </a>
                                                    </h3>

                                                    <div class="am-list-item-text">
                                                        {{ $php->content }}
                                                    </div>

                                                </div>
                                                <div class="am-u-sm-4 am-list-thumb">
                                                    <a href="{{url('article', $php->id)}}" target="_blank">
                                                        @if($php->image)
                                                            <img src="{{ $php->image->thumb }}" alt="{{ $php->title }}">
                                                        @endif
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="am-u-md-4">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                        <h2 class="am-titlebar-title ">
                            前端开发
                        </h2>
                        <nav class="am-titlebar-nav">
                            <a href="{{url('category', 12)}}" class="">+更多</a>
                        </nav>
                    </div>
                </div>
                <div class="am-panel-bd">
                    <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                        <div class="am-list-news-bd">
                            <ul class="am-list">

                                @foreach ($news->font as $font)
                                    <li class="am-g am-list-item-desced">
                                        <a href="{{url('article', $font->id)}}" class="am-list-item-hd" target="_blank">
                                            {{ $font->title }}
                                        </a>

                                        <div class="am-list-item-text">
                                            {{ $font->content }}
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--PHP技术结束-->

    <!--PHP武汉独家-->
    <div class="am-g">
        <div class="am-u-md-8">

            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-multi">
                        <h2 class="am-titlebar-title ">
                            独家教程
                        </h2>
                        <nav class="am-titlebar-nav">
                            <a href="#more" class="">+更多</a>
                        </nav>
                    </div>
                </div>
                <div class="am-panel-bd">
                    <div data-am-widget="list_news" class="am-list-news am-list-news-default p-dj">
                        <div class="am-g">
                            <div class="am-u-md-4" style="padding-left:0">
                                <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-1 am-avg-lg-1 am-gallery-default" data-am-gallery="{ pureview: true }">
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                                <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg" alt="远方 有一个地方 那里种有我们的梦想"/>
                                                <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="am-gallery-item">
                                            <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                                <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="某天 也许会相遇 相遇在这个好地方"/>
                                                <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                                                <div class="am-gallery-desc">2375-09-26</div>
                                            </a>
                                        </div>
                                    </li>

                                </ul>


                            </div>
                            <div class="am-u-md-8" style="padding-right:0">
                                <div data-am-widget="tabs" class="am-tabs am-tabs-d2" style="margin:0;">
                                    <ul class="am-tabs-nav am-cf">
                                        <li class="am-active"><a href="[data-tab-panel-0]">PHP</a></li>
                                        <li class=""><a href="[data-tab-panel-1]">Thinkphp</a></li>
                                        <li class=""><a href="[data-tab-panel-2]">Laravel</a></li>
                                        <li class=""><a href="[data-tab-panel-3]">微信服务号</a></li>
                                    </ul>
                                    <div class="am-tabs-bd">
                                        <div data-tab-panel-0 class="am-tab-panel am-active">
                                            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                                <div class="am-list-news-bd">
                                                    <ul class="am-list">


                                                        <li class="am-g am-list-item-desced">
                                                            <a href="http://www.douban.com/online/11614662/"
                                                               class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的那些囧！</a>

                                                            <div class="am-list-item-text">
                                                                囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                            </div>
                                                        </li>
                                                        <li class="am-g am-list-item-desced">
                                                            <a href="http://www.douban.com/online/11614662/"
                                                               class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的那些囧！</a>

                                                            <div class="am-list-item-text">
                                                                囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                            </div>
                                                        </li>
                                                        <li class="am-g am-list-item-desced">
                                                            <a href="http://www.douban.com/online/11614662/"
                                                               class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的那些囧！</a>

                                                            <div class="am-list-item-text">
                                                                囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                            </div>
                                                        </li>
                                                        <li class="am-g am-list-item-desced">
                                                            <a href="http://www.douban.com/online/11614662/"
                                                               class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的那些囧！</a>

                                                            <div class="am-list-item-text">
                                                                囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-tab-panel-1 class="am-tab-panel ">

                                            <div class="am-list-news-bd">
                                                <ul class="am-list">
                                                    <li class="am-g am-list-item-dated p-dashed">
                                                        <a href="##" class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的那些囧晒晒旅行中的中的那些囧！</a>
                                                    </li>
                                                    <li class="am-g am-list-item-dated p-dashed">
                                                        <a href="##" class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                                    </li>
                                                    <li class="am-g am-list-item-dated p-dashed">
                                                        <a href="##" class="am-list-item-hd ">我很囧，你保重....晒晒旅行中的晒晒旅行中的那些囧晒晒旅！</a>
                                                    </li>
                                                    <li class="am-g am-list-item-dated p-dashed">
                                                        <a href="##" class="am-list-item-hd ">我很囧，你保重....晒晒旅行晒晒旅行中的那些囧中的那些囧！</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div data-tab-panel-2 class="am-tab-panel ">
                                            【歌唱】那时候有多好，任雨打湿裙角。忍不住哼起，心爱的旋律。绿油油的树叶，自由地在说笑。燕子忙归巢，风铃在舞蹈。经过青春的草地，彩虹忽然升起。即使视线渐渐模糊，它也在我心里。就像爱过的旋律，没人能抹去。因为生命存在失望，歌唱，所以才要歌唱。
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="am-u-md-4">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                        <h2 class="am-titlebar-title ">
                            教程排行
                        </h2>
                    </div>
                </div>
                <div class="am-panel-bd">
                    <div data-am-widget="list_news" class="am-list-news am-list-news-default">

                        <div class="am-list-news-bd">
                            <ul class="am-list p-jcph">

                                <li class="am-g">
                                    <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">
                                        我很囧，你保重....晒晒旅行中的那些囧！<span class="am-badge am-badge-danger">1</span>
                                    </a>

                                    <a href="http://www.douban.com/online/11614662/">
                                        <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg"
                                             class="am-img-responsive" alt=""/>
                                    </a>
                                </li>
                                <li class="am-g">
                                    <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">
                                        我很囧，你保重....晒晒旅行中的那些囧！<span class="am-badge am-badge-warning">2</span>
                                    </a>

                                    <a href="http://www.douban.com/online/11614662/">
                                        <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg"
                                             class="am-img-responsive" alt=""/>
                                    </a>
                                </li>
                                <li class="am-g">
                                    <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">
                                        我很囧，你保重....晒晒旅行中的那些囧！<span class="am-badge am-badge-secondary">3</span>
                                    </a>

                                    <a href="http://www.douban.com/online/11614662/">
                                        <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg"
                                             class="am-img-responsive" alt=""/>
                                    </a>
                                </li>
                                <li class="am-g">
                                    <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">
                                        我很囧，你保重....晒晒旅行中的那些囧！<span class="am-badge">4</span>
                                    </a>

                                    <a href="http://www.douban.com/online/11614662/">
                                        <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg"
                                             class="am-img-responsive" alt=""/>
                                    </a>
                                </li>
                                <li class="am-g">
                                    <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">
                                        我很囧，你保重....晒晒旅行中的那些囧！<span class="am-badge">5</span>
                                    </a>

                                    <a href="http://www.douban.com/online/11614662/">
                                        <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg"
                                             class="am-img-responsive" alt=""/>
                                    </a>
                                </li>
                                <li class="am-g">
                                    <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">
                                        我很囧，你保重....晒晒旅行中的那些囧！<span class="am-badge">6</span>
                                    </a>

                                    <a href="http://www.douban.com/online/11614662/">
                                        <img src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg"
                                             class="am-img-responsive" alt=""/>
                                    </a>
                                </li>

                            </ul>
                        </div>


                    </div>


                </div>

            </div>
        </div>
    </div>
    <!--PHP武汉独家结束-->

    <!--武汉IT招聘-->
    <div class="am-g">
        <div class="am-u-md-8">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-multi">
                        <h2 class="am-titlebar-title ">
                            武汉IT招聘
                        </h2>

                    </div>
                </div>
                <div class="am-panel-bd">
                    <div class="am-g">

                        <div class="am-u-md-12">

                            <div class="am-u-md-6">
                                <div data-am-widget="list_news" class="am-list-news am-list-news-default p-job">

                                    <div class="am-list-news-hd am-cf">
                                        <!--带更多链接-->
                                        <a href="###" class="">
                                            <h2>推荐工程师</h2>
                                            <span class="am-list-news-more am-fr">更多 &raquo;</span>
                                        </a>
                                    </div>
                                    <div class="am-list-news-bd">
                                        <ul class="am-list">


                                            <!--缩略图在标题左边-->
                                            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                <div class="am-u-sm-3 am-list-thumb">
                                                    <a href="http://www.douban.com/online/11614662/" class="">
                                                        <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                             alt="我很囧，你保重....晒晒旅行中的那些囧！"/>
                                                    </a>
                                                </div>

                                                <div class=" am-u-sm-9 am-list-main">
                                                    <h3 class="am-list-item-hd"><a
                                                                href="http://www.douban.com/online/11614662/" class="">我很囧，你保重中的那些囧！</a>
                                                    </h3>

                                                    <div class="am-list-item-text">
                                                        囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                <div class="am-u-sm-3 am-list-thumb">
                                                    <a href="http://www.douban.com/online/11614662/" class="">
                                                        <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                             alt="我很囧，你保重....晒晒旅行中的那些囧！"/>
                                                    </a>
                                                </div>

                                                <div class=" am-u-sm-9 am-list-main">
                                                    <h3 class="am-list-item-hd"><a
                                                                href="http://www.douban.com/online/11614662/" class="">我很囧，你保重....！</a>
                                                    </h3>

                                                    <div class="am-list-item-text">
                                                        囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                <div class="am-u-sm-3 am-list-thumb">
                                                    <a href="http://www.douban.com/online/11614662/" class="">
                                                        <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                             alt="我很囧，你保重....晒晒旅行中的那些囧！"/>
                                                    </a>
                                                </div>

                                                <div class=" am-u-sm-9 am-list-main">
                                                    <h3 class="am-list-item-hd"><a
                                                                href="http://www.douban.com/online/11614662/" class="">我很囧，晒晒旅行中的那些囧！</a>
                                                    </h3>

                                                    <div class="am-list-item-text">
                                                        囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                <div class="am-u-sm-3 am-list-thumb">
                                                    <a href="http://www.douban.com/online/11614662/" class="">
                                                        <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                             alt="我很囧，你保重....晒晒旅行中的那些囧！"/>
                                                    </a>
                                                </div>

                                                <div class=" am-u-sm-9 am-list-main">
                                                    <h3 class="am-list-item-hd"><a
                                                                href="http://www.douban.com/online/11614662/" class="">我很囧，晒晒旅行中的那些囧！</a>
                                                    </h3>

                                                    <div class="am-list-item-text">
                                                        囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="am-u-md-6">

                                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                    <div class="am-list-news-hd am-cf">
                                        <!--带更多链接-->
                                        <a href="###" class="">
                                            <h2>好职位在PHP武汉</h2>
                                            <span class="am-list-news-more am-fr">更多 &raquo;</span>
                                        </a>
                                    </div>


                                    <div class="am-list-news-bd">
                                        <ul class="am-list">
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-primary">光谷</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-secondary">洪山</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-success">江岸</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-primary">江夏</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-warning">汉阳</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-danger">汉口</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>


                                            <hr data-am-widget="divider" style=""
                                                class="am-divider am-divider-default"/>

                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-primary ">光谷</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-secondary">洪山</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-success">江岸</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-primary">江夏</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-warning">汉阳</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                            <li class="am-g am-list-item-dated ">
                                                <a href="##" class="am-list-item-hd "><span
                                                            class="am-badge am-badge-danger">汉口</span>
                                                    我很囧，你保重....晒晒旅行中的旅行中的那些囧些囧！</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="am-u-md-4">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                        <h2 class="am-titlebar-title ">
                            明星企业
                        </h2>
                    </div>
                </div>
                <div class="am-panel-bd">
                    <ul data-am-widget="gallery"
                        class="am-gallery am-avg-sm-3 am-avg-md-3 am-avg-lg-2 am-gallery-default">
                        <li>
                            <div class="am-gallery-item">
                                <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                    <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg" alt="远方 有一个地方 那里种有我们的梦想"/>

                                    <h3 class="am-gallery-title">斗鱼TV</h3>

                                    <div class="am-gallery-desc">诚聘PHP工程师</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="am-gallery-item">
                                <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                    <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="某天 也许会相遇 相遇在这个好地方"/>

                                    <h3 class="am-gallery-title">新浪集团（武汉）</h3>

                                    <div class="am-gallery-desc">高薪诚聘PHPer</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="am-gallery-item">
                                <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                    <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg" alt="不要太担心 只因为我相信"/>

                                    <h3 class="am-gallery-title">云生活</h3>

                                    <div class="am-gallery-desc">5000-8000求PHP</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="am-gallery-item">
                                <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                    <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                                    <h3 class="am-gallery-title">点点客</h3>

                                    <div class="am-gallery-desc">PHP工程师</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="am-gallery-item">
                                <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                    <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                                    <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                                    <div class="am-gallery-desc">2375-09-26</div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="am-gallery-item">
                                <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                    <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                                    <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                                    <div class="am-gallery-desc">2375-09-26</div>
                                </a>
                            </div>
                        </li>


                    </ul>

                </div>

            </div>
        </div>

    </div>
    <!--武汉IT招聘结束-->

    <!--代码库-->
    <div class="am-g">
        <div class="am-u-md-8">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-multi">
                        <h2 class="am-titlebar-title ">
                            代码库
                        </h2>
                    </div>
                </div>
                <div class="am-panel-bd p-dmk">
                    <div class="am-g">
                        <div class="am-u-md-12">
                            <ul data-am-widget="gallery"
                                class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default">
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"
                                                 alt="远方 有一个地方 那里种有我们的梦想"/>

                                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"
                                                 alt="某天 也许会相遇 相遇在这个好地方"/>

                                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg"
                                                 alt="不要太担心 只因为我相信"/>

                                            <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>

                        </div>


                        <div class="am-u-md-6">
                            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                <!--列表标题-->
                                <div class="am-list-news-hd am-cf">
                                    <!--带更多链接-->
                                    <a href="###" class="">
                                        <h2>PHP代码库</h2>
                                    </a>
                                </div>

                                <div class="am-list-news-bd">
                                    <ul class="am-list">
                                        @foreach ($news->lib_php as $lp)
                                            <li class="am-g">
                                                <a href="http://www.douban.com/online/11614662/"
                                                   class="am-list-item-hd ">{{ $lp->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <div class="am-u-md-6">
                            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                                <!--列表标题-->
                                <div class="am-list-news-hd am-cf">
                                    <!--带更多链接-->
                                    <a href="###" class="">
                                        <h2>JS代码库</h2>
                                    </a>
                                </div>

                                <div class="am-list-news-bd">
                                    <ul class="am-list">
                                        {{--@foreach ($news->lib_js as $lj)--}}
                                        <li class="am-g">
                                            <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd ">js代码库</a>
                                        </li>
                                        {{--@endforeach--}}
                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="am-u-md-4">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                        <h2 class="am-titlebar-title ">
                            论坛
                        </h2>


                    </div>
                </div>
                <div class="am-panel-bd">
                    <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                        <div class="am-list-news-bd">


                            <div data-am-widget="tabs"
                                 class="am-tabs am-tabs-default">
                                <ul class="am-tabs-nav am-cf">
                                    <li class="am-active"><a href="[data-tab-panel-0]">最新</a></li>
                                    <li class=""><a href="[data-tab-panel-1]">热门</a></li>
                                </ul>
                                <div class="am-tabs-bd">
                                    <div data-tab-panel-0 class="am-tab-panel am-active">

                                        <div data-am-widget="list_news" class="am-list-news am-list-news-default">

                                            <div class="am-list-news-bd">
                                                <ul class="am-list">
                                                    <!--缩略图在标题左边-->
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>


                                    </div>
                                    <div data-tab-panel-1 class="am-tab-panel ">
                                        <div data-am-widget="list_news" class="am-list-news am-list-news-default">

                                            <div class="am-list-news-bd">
                                                <ul class="am-list">
                                                    <!--缩略图在标题左边-->
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>
                                                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                                                        <div class="am-u-sm-2 am-list-thumb">
                                                            <a href="http://www.douban.com/online/11614662/" class="">
                                                                <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
                                                                     alt="我很囧，你保重晒晒旅行中的那些囧！"/>
                                                            </a>
                                                        </div>
                                                        <div class=" am-u-sm-10 am-list-main">
                                                            <h3 class="am-list-item-hd"><a
                                                                        href="http://www.douban.com/online/11614662/"
                                                                        class="">我很囧，你保重晒晒旅行中的那些囧！</a></h3>

                                                            <div class="am-list-item-text">读”“在读”或“读过”，有机会获得此书本活！</div>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--代码库结束-->

    <!--新手入门-->
    <div class="am-g">
        <div class="am-u-md-8">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-multi">
                        <h2 class="am-titlebar-title ">
                            新手入门
                        </h2>
                    </div>
                </div>
                <div class="am-panel-bd">
                    <div class="am-g">

                        <div class="am-u-md-12">
                            <ul data-am-widget="gallery"
                                class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default">
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"
                                                 alt="远方 有一个地方 那里种有我们的梦想"/>

                                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"
                                                 alt="某天 也许会相遇 相遇在这个好地方"/>

                                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg"
                                                 alt="不要太担心 只因为我相信"/>

                                            <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"
                                                 alt="远方 有一个地方 那里种有我们的梦想"/>

                                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"
                                                 alt="某天 也许会相遇 相遇在这个好地方"/>

                                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg"
                                                 alt="不要太担心 只因为我相信"/>

                                            <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="am-gallery-item">
                                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                                            <div class="am-gallery-desc">2375-09-26</div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="am-u-md-4">
            <div class="am-panel am-panel-default p-panel-info">
                <div class="am-panel-hd">
                    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                        <h2 class="am-titlebar-title ">
                            <a href="http://www.whphp.com">PHP培训</a>
                        </h2>
                        <nav class="am-titlebar-nav">
                            <a href="http://www.whphp.com/school_news" class="">+更多</a>
                        </nav>
                    </div>
                </div>
                <div class="am-panel-bd">

                    <div data-am-widget="slider" class="am-slider am-slider-c3 p-px"
                         data-am-slider='{"controlNav":false}'>
                        <ul class="am-slides">
                            {{--@foreach ($news->school as $key=>$s)--}}
                            <li>
                                <img src="http://s.amazeui.org/media/i/demos/pure-1.jpg?imageView2/0/w/640">

                                <div class="am-slider-desc">
                                    <div class="am-slider-counter"><span class="am-active">1</span>/4</div>
                                    轮播
                                </div>

                            </li>
                            {{--@endforeach--}}

                        </ul>
                    </div>

                    <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                        <div class="am-list-news-bd">
                            <ul class="am-list">


                                <li class="am-g am-list-item-desced">
                                    <a href="http://www.douban.com/online/11624755/"
                                       class="am-list-item-hd ">我最喜欢的一张画</a>


                                    <div class="am-list-item-text">
                                        你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片美我最喜欢的画群296795413进群发画，少说多发图，
                                    </div>

                                </li>
                                <li class="am-g am-list-item-desced">
                                    <a href="http://www.douban.com/online/11624755/"
                                       class="am-list-item-hd ">我最喜欢的一张画</a>


                                    <div class="am-list-item-text">
                                        你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片美我最喜欢的画群296795413进群发画，少说多发图，
                                    </div>

                                </li>

                            </ul>
                        </div>
                    </div>


                </div>


            </div>
        </div>


    </div>
    <!--新手入门结束-->

    <!--PHP开发工具-->
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">
            PHP开发工具
        </div>
        <div class="am-panel-bd">

            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-4 am-avg-md-4 am-avg-lg-8 am-gallery-default">
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg" alt="远方 有一个地方 那里种有我们的梦想"/>

                            <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/xi/demos/bing-2.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="某天 也许会相遇 相遇在这个好地方"/>

                            <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg" alt="不要太担心 只因为我相信"/>

                            <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="am-gallery-item">
                        <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
                            <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt="终会走过这条遥远的道路"/>

                            <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>

                            <div class="am-gallery-desc">2375-09-26</div>
                        </a>
                    </div>
                </li>

            </ul>

        </div>
    </div>
    <!--PHP开发工具结束-->

    <!--教程导航-->
    <div id="sections" class="am-panel am-panel-default">
        <div class="am-panel-hd">教程导航</div>
        <div class="am-panel-bd">
            <div class="am-g node-list">

                @foreach($news->episode_categories as $category)
                    <div class="node media">
                        <label class="media-left">{{$category->name}}</label>
                        <span class="nodes media-body">
                            @if(!$category->children->isEmpty())
                                @foreach($category->children as $c)
                                    <span class="name"><a title="{{$c->name}}" href="episode_categories/{{$c->id}}" target="_blank">{{$c->name}}</a></span>
                                @endforeach
                            @endif
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--教程导航结束-->

    <!--战略合作-->
    <div class="am-panel am-panel-default">
        <div class="am-panel-hd">友情链接与合作伙伴</div>
        <div class="am-panel-bd location-list" style="text-align:center;">
            @foreach ($links as $l)
                <span class="name"><a href="{{ $l->url }}" target="_blank">{{ $l->name }}</a></span>
            @endforeach

        </div>
    </div>
    <!--战略合作结束-->
@stop