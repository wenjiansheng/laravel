<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <title>LifeSmile--清欢渡</title>
    <meta name="keywords" content="LifeSmile--清欢渡" />
    <meta name="description" content="LifeSmile--清欢渡的个人博客，神秘、俏皮。" />
    {{--<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />--}}
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/sass/base.css" rel="stylesheet">
    <link href="/sass/style.css" rel="stylesheet">
    <link href="/sass/media.css" rel="stylesheet">
    {{--<link href="../sass/index.css" rel="stylesheet">--}}
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!--[if lt IE 9]>
    <script src="../js/modernizr.js"></script>
    <![endif]-->
</head>

<body>
<div class="ibody">
    <header>
        <h1>如影随形</h1>
        <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
        <div class="logo"><a href="/"></a></div>
        <nav id="topnav"><a href="{{url('/article')}}">首页</a><a href="{{url('/about')}}">关于我</a><a href="{{url('/new_list')}}">慢生活</a><a href="{{url('/share')}}">模板分享</a><a href="{{url('/new')}}">模板主题</a></nav>
    </header>
@yield('content')
<script src="/js/silder.js"></script>
<script src="/js/jquery.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<div class="clear"></div>
<!-- 清除浮动 -->