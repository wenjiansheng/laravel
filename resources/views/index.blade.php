@extends('layout.app')
@section('content')
    <head>
        <link href="/sass/index.css" rel="stylesheet">
        <style type="text/css" >
            .show_text{
                height:117px;
                overflow:hidden;
                position: relative;
            }

            .entry-content{
                display: -webkit-box;
                -webkit-box-orient:vertical;
                -webkit-line-clamp:6;
                overflow: hidden;
            }
            .my-text{
                float: left;
                margin-left: 15px;
            }
            .autor{

                margin: 10px 0px 0px -20px;
                padding-left: 5px;
            }
            .autor span{
                margin:0 6px;
            }
            *{
                padding-bottom: 1px;
            }


        </style>
    </head>


    <article>
        <h2 class="about_h">您现在的位置是：<a href="/">首页</a></h2>
        <div class="banner">
            <ul class="texts">
                <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
                <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
            </ul>
        </div>
        <div class="bloglist">
            <h2>
                <a href="{{url('/article?page=1')}}"><p><span>推荐</span>文章</p></a>
            </h2>
            @foreach($list as $value)
            <div class="blogs">
                <h3><a href="{{url('/article/'.$value->id)}}">{{$value->title}}</a></h3>
                <figure><img src="/images/01.jpg" ></figure>
                <ul class="show_text">
                    <p class="entry-content clearfix">{{!! $value->content !!}}</p>

                </ul>
                <p class="autor auth" style="width: 337px"><span class="read"><a href="{{url('/article/'.$value->id)}}"  class="my-text">阅读全文&gt;&gt;</a></span></p>
                <p class="autor" style="width: 337px"><span>作者：{{$value->author}}</span><span>分类：【<a href="{{url('/article?article_type_id='.$value->article_type_id)}}">{{$value->type_name}}</a>】
                    </span><span>浏览（<a href="{{url('/article')}}">{{$value->read_quantity}}</a>）</span><span>评论（<a href="{{url('/article/'.$value->id.'/edit')}}">{{$value->discuss_times}}</a>）</span>
                    </p>
                <div class="dateview">{{date('Y-m-d',$value->create_time)}}</div>
            </div>
            @endforeach

            {{--<div class="page">{{ $list->links() }}</div>--}}
            <div class="page">
                <a title="Total record"><b>{{$list->total()}}条</b></a>
                <a href="{{url('/article?page=1'.'&article_type_id='.$type)}}">&lt;&lt;</a>
                @if($list->currentPage()>1)
                <a href="{{url('/article?page='.($list->currentPage()-1).'&article_type_id='.$type)}}">&lt;</a>
                @else
                    <a href="{{url('/article?page=1'.'&article_type_id='.$type)}}">&lt;</a>
                @endif
                @for($i=1;$i<=$list->lastPage();$i++)
                <a href="{{url('/article?page='.$i.'&article_type_id='.$type)}}">{{$i}}</a>
                @endfor
                @if($list->currentPage() == $list->lastPage())
                    <a href="{{url('/article?page='.($list->currentPage()).'&article_type_id='.$type)}}">&gt;</a>
                @else
                <a href="{{url('/article?page='.($list->currentPage()+1).'&article_type_id='.$type)}}">&gt;</a>
                @endif
                <a href="{{url('/article?page='.$list->lastPage().'&article_type_id='.$type)}}">&gt;&gt;</a>
            </div>
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
            <p>邮箱：ruoruchujian_wjs@163.com</p>
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