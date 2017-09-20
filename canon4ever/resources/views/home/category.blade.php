@extends('layouts.home.application')
@section('css')
    <link rel="stylesheet" href="/home/css/category.css">
@endsection
@section('content')

    <ol class="am-breadcrumb am-breadcrumb-slash">
        <li><a href="/" class="am-icon-home">首页</a></li>
        <li class="am-active"><a href="javascript: void 0;">{{ $category->name }}</a></li>
    </ol>



    <ul class="am-nav am-nav-pills">
        @foreach($siblings as $sibling)
            <li @if($sibling->id == $category->id) class="am-active" @endif>
                <a href="{{url('category', $sibling->id)}}">{{ $sibling->name }}</a>
            </li>
        @endforeach
    </ul>

    <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

    <div class="am-g">

        <div class="am-u-md-8">
            @foreach($articles as $article)

                <article class="article-main">
                    <h3 class="am-article-title article-title">
                        <a href="/article/{{$article->id}}" target="_blank">{{ $article->title }}</a>
                    </h3>
                    <h4 class="am-article-meta article-meta">posted on {{$article->created_at->format("Y-m-d")}} under
                        <a href="/category/{{$article->category->id}}">{{$article->category->name}}</a>
                    </h4>

                    <div class="am-g article-content">
                        <div class="am-u-lg-7">
                            {!! sub($article->markdown_html_code, 180) !!}
                        </div>
                        <div class="am-u-lg-5">

                            @if($article->image)
                                <p><img src="{{$article->image->medium}}" alt="{{$article->title}}"/></p>
                            @endif
                        </div>
                    </div>

                </article>

                <hr class="am-article-divider article-hr">

            @endforeach

            {{ $articles->links() }}
        </div>


        <div class="am-u-md-4 article-sidebar">
            <div class="am-panel-group">
                <section class="am-panel am-panel-default">
                    <div class="am-panel-hd">关于我</div>
                    <div class="am-panel-bd">
                        <p>前所未有的中文云端字型服务，让您在 web
                            平台上自由使用高品质中文字体，跨平台、可搜寻，而且超美。云端字型是我们的事业，推广字型学知识是我们的志业。从字体出发，关心设计与我们的生活，justfont article
                            正是為此而生。</p>
                        <a class="am-btn am-btn-success am-btn-sm" href="#">查看更多 →</a>
                    </div>
                </section>
                <section class="am-panel am-panel-default">
                    <div class="am-panel-hd">文章目录</div>
                    <ul class="am-list article-list">
                        <li><a href="#">Google fonts 的字體（sans-serif 篇）</a></li>
                        <li><a href="#">[but]服貿最前線？－再訪桃園機場</a></li>
                        <li><a href="#">到日星鑄字行學字型</a></li>
                        <li><a href="#">glyph font vs. 漢字（上）</a></li>
                        <li><a href="#">浙江民間書刻體上線</a></li>
                        <li><a href="#">[極短篇] Android v.s iOS，誰的字體好讀？</a></li>
                    </ul>
                </section>


            </div>
        </div>
    </div>


@stop