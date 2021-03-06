@extends('layouts.wechat.application')

@section('content')
    <div class="page-index" id="home" data-log="首页">
        <div class="index-header">
            <div class="search_bar">
                <a href="/search">
                    <span class="icon icon-search"></span>
                    <span class="text">搜索商品名称</span>
                </a>
            </div>
            <div class="search_bottom"></div>
        </div>

        <!--焦点图-->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($slides as $p)
                        <li>
                            <a href="{{$p->url}}">
                                {!! image_url($p) !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <!--推荐商品-->
        <div class="list">
            <div class="section">
                <div class="mcells_auto_fill">
                    <div class="body">
                        @foreach ($banners as $p)
                            <div>
                                <div class="items" onclick="location.href='{{$p->url}}'">
                                    {!! image_url($p) !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @foreach($recommends as $p)
                <div class="section" onclick="location.href='/product/{{$p->id}}'">
                    <div>
                        <div class="item">
                            <div class="img">

                                @if($p->image)
                                    {!! image_url($p, ['class'=>'ico']) !!}
                                @endif

                                @if($p->is_new)
                                    <img class="tag " src="/wechat/images/new.png">
                                @elseif($p->is_hot)
                                    <img class="tag " src="/wechat/images/hot.png">
                                @endif
                            </div>
                            <div class="info">
                                <div class="name"><p>{{$p->name}}</p></div>
                                <div class="brief"><p>{{$p->description}}</p></div>
                                <div class="price"><p>{{doubleval($p->price)}}元 起</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        @include('layouts.wechat._footer')
    </div>
@endsection

@section('js')
    <script defer src="/wechat/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                directionNav: false
            });
        })
    </script>
@endsection
