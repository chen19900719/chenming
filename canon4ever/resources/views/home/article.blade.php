@extends('layouts.home.application')
@section('css')
    <link rel="stylesheet" href="/vendor/markdown/css/editormd.preview.css"/>
    <style>

        @media only screen and (min-width: 641px) {
            .blog-sidebar {
                font-size: 1.4rem;
            }
        }

        p {
            text-indent: 2em;
            line-height: 28px;
        }
    </style>
@stop

@section('content')

    <ol class="am-breadcrumb am-breadcrumb-slash">
        <li><a href="/" class="am-icon-home">首页</a></li>
        <li><a href="{{ url('category', $article->category->id) }}">{{ $article->category->name }}</a></li>
        <li class="am-active"><a href="javascript: void 0;">{{ $article->title }}</a></li>
    </ol>

    <ul class="am-nav am-nav-pills">
        {{--        @foreach($siblings as $s)--}}
        {{--<li @if($s->id == $category->id) class="am-active" @endif>--}}
        {{--<a href="{{url('category', $s->id)}}">{{ $s->name }}</a>--}}
        {{--</li>--}}
        {{--@endforeach--}}
    </ul>

    <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed"/>

    <div class="am-g">
        <div class="am-u-md-8">

            <article class="am-article">
                <div class="am-article-hd">
                    <h1 class="am-article-title">{{$article->title}}</h1>

                    <p class="am-article-meta">PHP武汉</p>
                </div>

                <div class="am-article-bd">
                    <p class="am-article-lead">
                        {{ sub($article->markdown_html_code, 180) }}
                    </p>

                    <div id="markdown">
                        <textarea id="append-test" style="display:none;">{{$article->content}}</textarea>
                    </div>
                </div>
            </article>
        </div>

        <div class="am-u-md-4 blog-sidebar">
            <div class="am-panel-group">
                <section class="am-panel am-panel-default">
                    <div class="am-panel-hd">关于我</div>
                    <div class="am-panel-bd">
                        <p>前所未有的中文云端字型服务，让您在 web
                            平台上自由使用高品质中文字体，跨平台、可搜寻，而且超美。云端字型是我们的事业，推广字型学知识是我们的志业。从字体出发，关心设计与我们的生活，justfont blog
                            正是為此而生。</p>
                        <a class="am-btn am-btn-success am-btn-sm" href="#">查看更多 →</a>
                    </div>
                </section>
                <section class="am-panel am-panel-default">
                    <div class="am-panel-hd">文章目录</div>
                    <ul class="am-list blog-list">
                        <li><a href="#">Google fonts 的字體（sans-serif 篇）</a></li>
                        <li><a href="#">[but]服貿最前線？－再訪桃園機場</a></li>
                        <li><a href="#">到日星鑄字行學字型</a></li>
                        <li><a href="#">glyph font vs. 漢字（上）</a></li>
                        <li><a href="#">浙江民間書刻體上線</a></li>
                        <li><a href="#">[極短篇] Android v.s iOS，誰的字體好讀？</a></li>
                    </ul>
                </section>

                <section class="am-panel am-panel-default">
                    <div class="am-panel-hd">文章目录</div>
                    <div id="toc-container">

                    </div>
                </section>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="/vendor/markdown/lib/marked.min.js"></script>
    <script src="/vendor/markdown/lib/prettify.min.js"></script>
    <script src="/vendor/markdown/lib/raphael.min.js"></script>
    <script src="/vendor/markdown/lib/underscore.min.js"></script>
    <script src="/vendor/markdown/lib/sequence-diagram.min.js"></script>
    <script src="/vendor/markdown/lib/flowchart.min.js"></script>
    <script src="/vendor/markdown/lib/jquery.flowchart.min.js"></script>

    <script src="/vendor/markdown/editormd.min.js"></script>

    <script>
        $(function () {
            testEditormdView2 = editormd.markdownToHTML("markdown", {
                htmlDecode: "style,script,iframe",  // you can filter tags decode
                tocm: true,    // Using [TOCM]
                tocContainer: "#toc-container", // 自定义 ToC 容器层
                emoji: true,
                taskList: true,
                tex: true,  // 默认不解析
                flowChart: true,  // 默认不解析
                sequenceDiagram: true,  // 默认不解析
            });
        })
    </script>
@endsection