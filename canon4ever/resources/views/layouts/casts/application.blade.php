<!DOCTYPE html>
<html class="" lang="html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.1">
    <meta name="description" content="The best PHP and Laravel screencasts on the web.">
    <meta property="og:site_name" content="Laracasts">
    <meta property="fb:app_id" content="511211375738022">
    <title>The Best Laravel and PHP Screencasts</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-v=XBrbNbbRQ4.png">
    <link rel="icon" type="image/png" href="favicons/favicon-32x32-v=XBrbNbbRQ4.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicons/favicon-16x16-v=XBrbNbbRQ4.png" sizes="16x16">
    <link rel="manifest" href="favicons/manifest-v=XBrbNbbRQ4.json">
    <link rel="mask-icon" href="favicons/safari-pinned-tab-v=XBrbNbbRQ4.svg" color="#4fb6b5">
    <link rel="shortcut icon" href="favicons/favicon-v=XBrbNbbRQ4.ico">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml?v=XBrbNbbRQ4">
    <meta name="theme-color" content="#4fb6b5">
    <link rel="alternate" type="application/atom+xml" title="Laracasts" href="feed">
    <link rel="stylesheet" href="/casts/css/fonts.css"/>
    <link href='https://fonts.googleapis.com/css?family=Miriam+Libre:400,700%7CSource+Sans+Pro:200,400,700,600,400italic,700italic'
          rel='stylesheet'>
    <script src="/casts/js/lib/wow.min.js"></script>
    <script>new WOW({mobile: false}).init();</script>
    <link href="/casts/css/min-id=25.css" rel="stylesheet">
    <script>
        window.LARACASTS = {
            "signedIn": false,
            "csrfToken": "fmJJGxoyODURILz6QCnv5gTLlx7O3hon7YhuOVXw",
            "stripeKey": "pk_live_42cAcd2OvCDs4hpErd5ZscBT",
            "user": null
        };
    </script>
</head>
<body class=" guest home">
<script id="flash-template" type="text/template">
    <div class="notification is-primary for-user">
        <a href="#" class="notification-body inherits-color" target="_blank" rel="noreferrer noopener"></a>
    </div>
</script>
<div id="root" class="page ">
    <div>
        <nav class="nav @yield('nav')">
            <div class="container">
                <div class="nav-left dont-flex mr-2">
                    <a class="nav-item is-brand" href="index.html">
                        <svg id="green-logo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 792.51 102.4">
                            <defs>
                                <style>.svg-logo-green-path {
                                        fill: #00b1b2;
                                    }

                                    .svg-logo-black-path {
                                        fill: #414042;
                                    }</style>
                            </defs>
                            <path class="svg-logo-green-path" d="M103.08,445.39v65.52h35.74v13.42H87V445.39Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M191.63,445.39h14.7l34.18,78.93H223l-7.07-17.09H182.05L175,524.33H157.45Zm7.4,20.87-11.52,27.5h22.88Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M285.3,491.87h-7.85v32.45H261.37V445.39h36a23.65,23.65,0,0,1,17.26,6.9,23.17,23.17,0,0,1,7,17.31q0,9.85-6.9,15.64a30.93,30.93,0,0,1-12.36,5.84l22.15,33.23H305Zm-7.85-33.06v21.76h16.42a10.65,10.65,0,0,0,10.8-11,10.24,10.24,0,0,0-3.15-7.79,10.72,10.72,0,0,0-7.65-3Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M374.58,445.39h14.7l34.18,78.93H405.91l-7.07-17.09H365l-7.07,17.09H340.4Zm7.4,20.87-11.52,27.5h22.88Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M500.09,471.17a24.2,24.2,0,0,0-3.67-4.84q-7.07-7.24-18.09-7.24t-18.09,7.24q-7,7.18-7,18.65t7,18.68q7,7.21,18,7.21t18.09-7.24a23.49,23.49,0,0,0,3.67-4.9L515,505.46a38.79,38.79,0,0,1-6.79,8.74q-11.8,11.52-29.78,11.52t-29.92-11.55q-11.94-11.55-11.94-29.2t11.94-29.28q11.94-11.63,29.92-11.63T508,455.86a38.8,38.8,0,0,1,6.79,8.57Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M677.73,444a44.48,44.48,0,0,1,29.11,10.35l-9.46,11.41a28.39,28.39,0,0,0-9.24-5.59,30.16,30.16,0,0,0-10.24-1.75q-6.12,0-9.63,2.67a6.49,6.49,0,0,0-2.56,5.29,6.56,6.56,0,0,0,3.28,5.68q2.56,1.73,12.41,4.51,11.63,3,17.31,6.57,10,6.63,10,18.43,0,10.8-9.35,17.92-8.46,6.24-21.49,6.23a46.6,46.6,0,0,1-33-13l9-11.47a36.24,36.24,0,0,0,10.3,7.07,29.9,29.9,0,0,0,13.64,3.28q6.68,0,10.58-2.84a8.35,8.35,0,0,0,3.51-6.62,7.28,7.28,0,0,0-3.56-6.29q-2.62-1.78-12.13-4.45-12.19-3.51-17.14-6.4-10.3-6.07-10.3-17.59A20.53,20.53,0,0,1,657,450.46Q665.21,444,677.73,444Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M730.16,445.39h64.13v13.3h-24v65.63H754.09V458.7H730.16Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M848.49,444a44.47,44.47,0,0,1,29.11,10.35l-9.46,11.41a28.36,28.36,0,0,0-9.24-5.59,30.16,30.16,0,0,0-10.24-1.75q-6.12,0-9.63,2.67a6.49,6.49,0,0,0-2.56,5.29,6.56,6.56,0,0,0,3.29,5.68q2.56,1.73,12.41,4.51,11.63,3,17.31,6.57,10,6.63,10,18.43,0,10.8-9.35,17.92-8.46,6.24-21.49,6.23a46.6,46.6,0,0,1-33-13l9-11.47a36.23,36.23,0,0,0,10.3,7.07,29.91,29.91,0,0,0,13.64,3.28q6.68,0,10.58-2.84a8.35,8.35,0,0,0,3.51-6.62,7.28,7.28,0,0,0-3.56-6.29Q856.56,494,847,491.37q-12.19-3.51-17.14-6.4-10.3-6.07-10.3-17.59a20.53,20.53,0,0,1,8.18-16.92Q836,444,848.49,444Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path id="arrow" class="svg-logo-black-path"
                                  d="M549.44,537.66V504.75h12v13.78L621,489.74a29.75,29.75,0,0,0,4.21-2.31,15.41,15.41,0,0,0-1.36-.88l-62.42-31.73v19.93h-12V435.26L629.58,476c2.95,1.62,9.73,6.09,9,12.45-.68,6.09-8.18,10.27-12.67,12.24l-76.49,37Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-black-path"
                                  d="M579.77,499H535a4.08,4.08,0,1,1,0-8.16h44.75a4.08,4.08,0,1,1,0,8.16Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M525.91,499h-8.23a4.08,4.08,0,1,1,0-8.16h8.23a4.08,4.08,0,1,1,0,8.16Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-green-path"
                                  d="M544.14,488.13h-8.23a4.08,4.08,0,0,1,0-8.16h8.23a4.08,4.08,0,1,1,0,8.16Z"
                                  transform="translate(-86.99 -435.26)"/>
                            <path class="svg-logo-black-path"
                                  d="M596.19,488.14H553.44a4.08,4.08,0,1,1,0-8.16h42.75a4.08,4.08,0,0,1,0,8.16Z"
                                  transform="translate(-86.99 -435.26)"/>
                        </svg>
                    </a>
                </div>
                <div class="nav-center flex mr-2">
                    <search></search>
                </div>
                <span class="nav-toggle" click="toggleNav">
                <span></span>
                <span></span>
                <span></span>
                </span>

                <div class="nav-right nav-menu">
                    <a class="nav-item is-bold in-caps" href="join.html">
                        注册
                    </a>

                    <a href="login.html"
                       class="nav-item is-bold color-primary in-caps"
                       @click.prevent="$dispatch('Login')"
                    >
                        登陆
                    </a>
                </div>
            </div>
        </nav>

        <nav class="nav-bottom @yield('is-hidden-tablet')">
            <div class="container">
                <ul class="is-flex-tablet nav-menu">
                    <li class="is-hidden-tablet">
                        <search></search>
                    </li>
                    <li class="is-hidden-tablet">
                        <a href="login.html"
                           class="nav-bottom-link"
                        >
                            <span class="nav-bottom-title">登陆</span>
                        </a>
                    </li>

                    <li class="is-hidden-tablet">
                        <a href="join.html" class="nav-bottom-link">
                            <span class="nav-bottom-title">注册</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="lessons.html" class="nav-bottom-link ">
                            <span class="icon icon-catalog"></span>
                            <span class="nav-bottom-title">登记</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="series-curated.html" class="nav-bottom-link ">
                            <span class="icon icon-series"></span>
                            <span class="nav-bottom-title">系列</span>
                        </a>
                    </li>

                    <li class="">
                        <dropdown v-cloak>
                    <span slot="heading" href="#" class="has-arrow nav-bottom-link ">
                        <span class="icon icon-skills"></span>
                        <span class="nav-bottom-title">技能</span>
                    </span>

                            <ul slot="dropdown-links">

                                @foreach($skills as $skill)
                                    <li class="dropdown-item">
                                        <a href="skills/php.html"
                                           class=" is-flex"
                                        >
                                            <span class="flex">{{$skill->name}}</span>
                                            <span class="is-circle icon" style="color: #8893BD"></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </dropdown>
                    </li>

                    <li class="active is-active">
                        <a href="shop.html" class="nav-bottom-link active is-active">
                            <span class="icon icon-apparel"></span>
                            <span class="nav-bottom-title">外观</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="discuss.html" class="nav-bottom-link ">
                            <span class="icon icon-discuss"></span>
                            <span class="nav-bottom-title">讨论</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        @yield('content')

        <section class="footer-section top">
            <div class="container">
                <div class="columns">
                    <div class="column is-5 wow fadeIn" data-wow-delay=".5s"
                         style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                        <h2 class="newsletter-heading pr-1-tablet has-text-centered-mobile">
                            希望我们通过邮件通知你最新信息?
                        </h2>
                    </div>

                    <div class="column is-6 is-offset-1">
                        <form id="newsletter-form" method="POST" action="/newsletters/subscribe">
                            <div class="newsletter-signup control has-addons wow lightSpeedIn"
                                 style="visibility: visible; animation-name: lightSpeedIn;"><input class="input"
                                                                                                   type="email"
                                                                                                   name="email"
                                                                                                   placeholder="Enter Your Email"
                                                                                                   autocomplete="off"
                                                                                                   required="">
                                <button type="submit" class="button is-outlined is-primary">订阅</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer-section bottom">
            <footer class="container">
                <div class="columns mb-3">
                    <div class="column is-5">
                        <h2 class="mb-3">
                            <img src="/casts/images/logo-footer.png" alt="Laracasts" width="350" height="44.92">
                        </h2>

                        <p class="footer-description is-heavy mb-3">
                            很多像你一样的同学发现长乐未央是有史以来最好的教育项目之一😵<br>
                            现在就来买一个月视频套餐,亲自感受在项目中大幅提升你的技能吧😀
                        </p>

                        <ul class="is-inline-flex w-100 is-justified-to-center-mobile">
                            <li>
                                <a href="http://facebook.com/laracasts" target="_blank">
                            <span class="icon is-outlined o-4">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 167.657 167.657"
                                     style="enable-background:new 0 0 167.657 167.657;" xml:space="preserve">
                                    <g>
                                        <path d="M83.829,0.349C37.532,0.349,0,37.881,0,84.178c0,41.523,30.222,75.911,69.848,82.57v-65.081H49.626   v-23.42h20.222V60.978c0-20.037,12.238-30.956,30.115-30.956c8.562,0,15.92,0.638,18.056,0.919v20.944l-12.399,0.006   c-9.72,0-11.594,4.618-11.594,11.397v14.947h23.193l-3.025,23.42H94.026v65.653c41.476-5.048,73.631-40.312,73.631-83.154   C167.657,37.881,130.125,0.349,83.829,0.349z"></path>
                                    </g>
                                </svg>
                            </span>
                                </a>
                            </li>

                            <li>
                                <a href="http://twitter.com/laracasts" target="_blank">
                            <span class="icon is-outlined is-vertically-centered is-justified-to-center bg-black o-4">
                                <svg viewBox="0 0 2000 1625.36" width="22" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg">
                                  <path d="m 1999.9999,192.4 c -73.58,32.64 -152.67,54.69 -235.66,64.61 84.7,-50.78 149.77,-131.19 180.41,-227.01 -79.29,47.03 -167.1,81.17 -260.57,99.57 C 1609.3399,49.82 1502.6999,0 1384.6799,0 c -226.6,0 -410.328,183.71 -410.328,410.31 0,32.16 3.628,63.48 10.625,93.51 -341.016,-17.11 -643.368,-180.47 -845.739,-428.72 -35.324,60.6 -55.5583,131.09 -55.5583,206.29 0,142.36 72.4373,267.95 182.5433,341.53 -67.262,-2.13 -130.535,-20.59 -185.8519,-51.32 -0.039,1.71 -0.039,3.42 -0.039,5.16 0,198.803 141.441,364.635 329.145,402.342 -34.426,9.375 -70.676,14.395 -108.098,14.395 -26.441,0 -52.145,-2.578 -77.203,-7.364 52.215,163.008 203.75,281.649 383.304,284.946 -140.429,110.062 -317.351,175.66 -509.5972,175.66 -33.1211,0 -65.7851,-1.949 -97.8828,-5.738 181.586,116.4176 397.27,184.359 628.988,184.359 754.732,0 1167.462,-625.238 1167.462,-1167.47 0,-17.79 -0.41,-35.48 -1.2,-53.08 80.1799,-57.86 149.7399,-130.12 204.7499,-212.41"
                                        style="fill:white"></path>
                                </svg>
                            </span>
                                </a>
                            </li>

                            <li>
                                <a href="http://github.com/laracasts" target="_blank">
                            <span class="icon is-outlined o-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="column is-2 is-offset-1 is-hidden-mobile">
                        <h5 class="heading is-5 in-caps">学习</h5>

                        <ul class="footer-links-list">
                            <li><a href="/lessons">图书馆</a></li>
                            <li><a href="/index">课程目录</a></li>
                            <li><a href="/shop">商店</a></li>
                            <li><a href="/recommended-reading">图书</a></li>
                            <li><a href="/join">注册</a></li>
                            <li>
                                <a href="/login">
                                    登陆
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="column is-2 is-hidden-mobile">
                        <h5 class="heading is-5 in-caps">讨论</h5>

                        <ul class="footer-links-list">
                            <li><a href="/discuss">论坛</a></li>
                            <li><a href="/podcast">长乐片段</a></li>
                            <li><a href="http://laravelpodcast.com">Laravel 播客</a></li>
                            <li><a href="/contact">支持</a></li>
                        </ul>
                    </div>

                    <div class="column is-2 is-hidden-mobile">
                        <h5 class="heading is-5 in-caps">附加</h5>

                        <ul class="footer-links-list">
                            <li><a href="https://laracasts.com/stats">统计</a></li>
                            <li><a href="/testimonials">客户评价</a></li>
                            <li><a href="/faq">FAQ</a></li>
                            <li><a href="/community?orderBy=updated_at">社区教程</a></li>
                            <li><a href="/feed">RSS</a></li>
                            <li><a href="https://larajobs.com/?partner=36#">找份工作</a></li>
                        </ul>

                        <ul class="zeroed footer-links-list">
                            <li><a href="/privacy">隐私</a></li>
                            <li><a href="/terms">地位</a></li>
                        </ul>
                    </div>

                </div> <!-- end columns -->

                <div class="columns hosting">
                    <div class="column is-5 is-bold has-text-centered-mobile">
                        © 长乐未央 2017. All rights reserved.
                    </div>

                    <!--<div class="column is-5 is-offset-2 has-text-right is-bold is-hidden-mobile">-->
                    <!--Proudly hosted with <a href="https://forge.laravel.com">Laravel Forge</a>-->
                    <!--and <a href="https://www.digitalocean.com/?refcode=d2070a2d5f35">DigitalOcean</a>.-->
                    <!--</div>-->
                </div>
            </footer>
        </section>
    </div>
    <notifications user-id=""></notifications>
    <login-modal token="fmJJGxoyODURILz6QCnv5gTLlx7O3hon7YhuOVXw"></login-modal>
</div> <!-- close #root div -->


<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/casts/js/all.min-v=155.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': LARACASTS.csrfToken
        }
    });
</script>

<script>


</script>

</body>
</html>
