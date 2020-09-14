@extends('layout.app')
@section('content')
<head>
    <link href="../sass/about.css" rel="stylesheet">
    <link href="../sass/index.css" rel="stylesheet">
    <style>
        .left{
            text-align: right;
        }
        .left a{
            color:#759b08;
        }
        .left a:hover{
            color: red;
        }
    </style>
    <![endif]-->
</head>

    <article>
        <h3 class="about_h">您现在的位置是：<a href="{{url('/article')}}">首页</a>><a href="{{url('/article/'.$list->id)}}">阅读全文</a></h3>
        <div class="about">
            <h2>{{$list->title}}</h2>
            <ul>
                <p>&nbsp;&nbsp;{{$list->content}}</p>
            </ul>
            <ul>
                <li class="left"><a href="{{url('/article')}}">返回首页</a></li>
            </ul>
            <h2>About my blog</h2>
            <ul class="blog_a">
                <p>域  名：www.yangqq.com 创建于2011年01月12日 <a href="http://www.net.cn/domain/" class="blog_link" target="_blank">注册域名</a><a class="blog_link" href="http://koubei.baidu.com/womc/s/www.yangqq.com" target="_blank">邀你点评</a></p>
                <p>服务器：阿里云服务器<a href="http://www.aliyun.com/product/ecs/?ali_trackid=2:mm_11085263_4976026_15602229:1389838528_3k2_34164590" class="blog_link" target="_blank">购买空间</a><a href="/../jstt/web/2014-01-18/644.html" target="_blank" class="blog_link" >参考我的空间配置</a></p>
                <p>程  序：PHP 帝国CMS7.0</p>
                <p>微信公众号：wwwyangqqcom</p>
            </ul>
        </div>
    </article>
<aside>
    <div class="avatar"><a href="{{url('/about')}}"><span>关于我</span></a></div>
    <div class="topspaceinfo">
        <h1>执子之手，与子偕老</h1>
        <p>于千万人之中，我遇见了我所遇见的人....</p>
    </div>
    <div class="about_c">
        <p>网名：LifeSmile | 清欢渡</p>
        <p>职业：PHP后端工程师 </p>
        <p>籍贯：河北省―张家口市</p>
        <p>电话：15081374823</p>
        <p>邮箱：ruoruchujian_wja@163.com</p>
    </div>
    <div class="bdsharebuttonbox"><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
    <div class="tj_news">
        <h2>
            <p class="tj_t1">最新文章</p>
        </h2>
        <ul>
            <li><a href="/">犯错了怎么办？</a></li>
            <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
            <li><a href="/">春暖花开-走走停停-发现美</a></li>
            <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
            <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
            <li><a href="/">简单手工纸玫瑰</a></li>
            <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
            <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
        </ul>
        <h2>
            <p class="tj_t2">推荐文章</p>
        </h2>
        <ul>
            <li><a href="/">犯错了怎么办？</a></li>
            <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
            <li><a href="/">春暖花开-走走停停-发现美</a></li>
            <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
            <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
            <li><a href="/">简单手工纸玫瑰</a></li>
            <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
            <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
        </ul>
    </div>
    <div class="links">
        <h2>
            <p>友情链接</p>
        </h2>
        <ul>
            <li><a href="/">清欢渡个人博客</a></li>
            <li><a href="/">3DST技术社区</a></li>
        </ul>
    </div>
    <div class="copyright">
        <ul>
            <p> Design by <a href="/">LifeSmile</a></p>
            <p>蜀ICP备11002373号-1</p>
            </p>
        </ul>
    </div>
</aside>
</div>
</body>
</html>
@stop