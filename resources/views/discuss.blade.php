@extends('layout.app')
@section('content')
    <head>
        <link href="/sass/discuss.css" rel="stylesheet">
        <link href="/sass/reply.css" rel="stylesheet">
        <link href="/sass/index.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style type="text/css" >
            .show_text{
                height:117px;
                overflow:hidden;
                position: relative;
            }

           aside{
               width: 270px;
               float: left;
           }
            #pn{
                width: 100%;
            }
            .content{
                width: 100%;
                margin-left: 5px;
            }
            p.text{
                width: 100%;
                padding-left: 70px;
            }
            .people{
                width: 100%;
            }
            div.good{
                width: 100%;
                padding-left: 70px;
            }
            .comment-right{
                width:70%;
            }
            .comment-date{
                width: 70%;
            }
            .comment-zan{
                right: -60px;
            }
            .comment-dele{
                right: -100px;
            }
            a.dzan{
                margin-right: 10px;
            }
            textarea.hf-text{
                width:100%;
            }
            .texts p{
                margin:0 0 20px;
                padding: 0 0 1px;
            }
            .list1{
                margin: 10px 0;
                font-size: 16px;
            }
            .appraise{
                height: 60px;
                margin-right: 5px;
                margin-bottom: 10px;
            }
            textarea.hf-text{
                width: 97%;
            }
            .font{
                font-size: 14px;
                color: black;
            }
            .button{
                float: right;
                display: inline-block;
                *display: inline;
                zoom: 1;
                padding: 4px 10px;
                margin: 0;
                cursor: pointer;
                border: 1px solid #bbb;
                overflow: visible;
                font: bold 13px arial, helvetica, sans-serif;
                text-decoration: none;
                white-space: nowrap;
                color: #555;

                background-color: #ddd;
                background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255,255,255,1)), to(rgba(255,255,255,0)));
                background-image: -webkit-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
                background-image: -moz-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
                background-image: -ms-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
                background-image: -o-linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));
                background-image: linear-gradient(top, rgba(255,255,255,1), rgba(255,255,255,0));

                -webkit-transition: background-color .2s ease-out;
                -moz-transition: background-color .2s ease-out;
                -ms-transition: background-color .2s ease-out;
                -o-transition: background-color .2s ease-out;
                transition: background-color .2s ease-out;
                background-clip: padding-box; /* Fix bleeding */
                -moz-border-radius: 3px;
                -webkit-border-radius: 3px;
                border-radius: 3px;
                -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
                -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
                box-shadow: 0 1px 0 rgba(0, 0, 0, .3), 0 2px 2px -1px rgba(0, 0, 0, .5), 0 1px 0 rgba(255, 255, 255, .3) inset;
                text-shadow: 0 1px 0 rgba(255,255,255, .9);
                margin-right: 20px;

                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .button:hover{
                background-color: #eee;
                color: #555;
            }

            .button:active{
                background: #e9e9e9;
                position: relative;
                top: 1px;
                text-shadow: none;
                -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
                -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .3) inset;
            }
        </style>
    </head>


    <article >
        <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="/">评论</a></h2>
        <div class="banner">
            <ul class="texts">
                <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
                <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
            </ul>
        </div>
        <div class="bloglist">
            <h1 class="list1">评论</h1>
            <div class="content">
                <div class="hf">
                    <textarea type="text"  class="hf-text appraise" autocomplete="off" maxlength="200">评论…</textarea>
                    <button class="hf- button" >评论</button>
                    <span class="hf-nu">0/200</span>
                </div>
            </div>

            <h1 class="list1">评论列表</h1>
                <ul id="pn">
                    @foreach($list as $value)
                        <li class="list0" id="{{$value->article_id}}"> <a class="close" href="javascript:;">X</a>
                            <div class="head"><img src="http://www.sucainiu.com/themes/images/demo/500x300-2.png" alt=""></div>
                            <div class="content">
                                <p class="text"><span class="name">{{$value->appraise_person}}：</span>{{$value->discuss}}</p>
                                <div class="pic"></div>
                                <div discuss="{{$value->id}}"class="good"><span class="date">{{date('Y-m-d',$value->create_time)}}</span><a class="dzan" href="javascript:;">赞</a></div>
                                <div class="people" total="{{$value->like}}">{{$value->like}}人觉得很赞</div>
                                <div class="comment-list">
                                    @foreach($reply as $val)
                                        @if($val->discuss_id == $value->id)
                                    <div class="comment" user="self">
                                        <div class="comment-left"><img src="http://www.sucainiu.com/themes/images/demo/500x300-2.png" alt=""></div>
                                        <div class="comment-right">
                                            <div class="comment-text"><span class="user">游客{{rand(1,100)}}：</span>{{$val->reply}}</div>
                                            <div class="comment-date">{{date('Y-m-d',$val->create_time)}}
                                                {{--<a class="comment-zan"  href="javascript:;" total="{{$value->like}}+1" my="1">{{$value->like}} 取消赞</a> --}}
                                                <a class="comment-dele" href="javascript:;" >回复</a> </div>
                                        </div>
                                    </div>
                                        @endif
                                    @endforeach
                                    {{--<div class="comment" user="self">--}}
                                        {{--<div class="comment-left"><img src="http://www.sucainiu.com/themes/images/demo/500x300-2.png" alt=""></div>--}}
                                        {{--<div class="comment-right">--}}
                                            {{--<div class="comment-text"><span class="user">我：</span>看哭了留卡号吧</div>--}}
                                            {{--<div class="comment-date">{{date('Y-m-d',$value->create_time)}} <a class="comment-zan"  href="javascript:;" total="{{$value->like}}" my="0">赞</a> <a class="comment-dele" href="javascript:;">删除</a> </div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="hf">
                                    <textarea type="text" class="hf-text" autocomplete="off"   maxlength="100">评论…</textarea>
                                    <button discuss_id="{{$value->id}}" class="hf-btn" >回复</button>
                                    <span class="hf-nub">0/200</span>
                                </div>
                            </div>
                        </li>
                    @endforeach

            </ul>
            <div class="page">
                {{--<a title="Total record"><b>{{$list->total()}}条</b></a>--}}
                <a href="{{url('/article/'.$article_id.'/edit?page=1')}}">&lt;&lt;</a>
                @if($list->currentPage()>1)
                    <a href="{{url('/article/'.$article_id.'/edit??page='.($list->currentPage()-1))}}">&lt;</a>
                @else
                    <a href="{{url('/article/'.$article_id.'/edit?page=1')}}">&lt;</a>
                @endif
                @for($i=1;$i<=$list->lastPage();$i++)
                    <a href="{{url('/article/'.$article_id.'/edit?page='.$i)}}">{{$i}}</a>
                @endfor
                @if($list->currentPage() == $list->lastPage())
                    <a href="{{url('/article/'.$article_id.'/edit?page='.($list->currentPage()))}}">&gt;</a>
                @else
                    <a href="{{url('/article/'.$article_id.'/edit?page='.($list->currentPage()+1))}}">&gt;</a>
                @endif
                <a href="{{url('/article/'.$article_id.'/edit?page='.$list->lastPage())}}">&gt;&gt;</a>
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
    <script src="/js/reply.js"></script>
    <script>
        window.onload=function()
        {
            b();
            //评论
            var btn = document.getElementsByClassName('appraise')[0];
            btn.onclick = function(){
                if(btn.defaultValue==btn.value){
                    btn.value = "";
                    $(".appraise").addClass('font');
                }

            }
            //评论
            var appraise_btn = document.getElementsByClassName('hf-')[0];
            appraise_btn.onclick = function () {
                var content = btn.value
                if(content == '评论…'){
                    content = ''
                }
                var article_id = document.getElementsByClassName('list0')[0].id
                var data = {
                    "article_id":article_id,
                    "discuss":content
                };
                $.ajax({
                    "headers": { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'post',
                    async: false,
                    url: "/article",
                    data: data,
                    dataType: 'text',
                    success: function (data) {
                        var data = JSON.parse(data);
                        if(data.code == 200){
                            window.location.href = '/article/{{$article_id}}/edit';
                        }else{
                            alert(data.msg)
                        }


                    }
                });
            }
            //文本域焦点事件
            $('.appraise').focus(function () {
                var textarea = $(".hf-text");
                this.parentNode.className = 'hf hf-on';
                this.value = this.value == '评论…' ? '' : this.value;
            })

            //文本域失焦事件
            $('.appraise').blur(function() {
                if (this.value == '') {
                    this.parentNode.className = 'hf';
                    this.value = '评论…';
                }
            })
            //输入评论
            $('.appraise').keyup(function () {
                var len = $(this).val().length;
                $(this).closest('div').find('.hf-nu').html(len + "/200");
            })
            //点赞
            $('.dzan').click(function () {
                var txt = $(this).html()
                if(txt == '赞'){
                    var discuss_id = $(this).closest('div').attr('discuss')
                    var data = {
                        "id":discuss_id
                    }
                    $.ajax({
                        "headers": { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        type: 'post',
                        async: false,
                        url: "/article/like",
                        data: data,
                        dataType: 'text',
                        success: function (data) {
                            var data = JSON.parse(data);
                            console.log(data)
                            if(data.code == 200){
                                {{--window.location.href = '/article/{{$article_id}}/edit';--}}
                            }else{
                                alert(data.msg)
                            }

                        }
                    });
                }

            })
            //回复
            var reply_btn = $('.hf-btn');
            reply_btn.click (function () {
                var content = $(this).closest('div').find('textarea').val()
                var discuss_id = $(this).attr('discuss_id')
                // var pid =
                var data = {
                    "discuss_id":discuss_id,
                    "reply":content,
                };
                console.log('{{Request::getRequestUri()}}')
                $.ajax({
                    "headers": { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'post',
                    async: false,
                    url: "/article/reply",
                    data: data,
                    dataType: 'text',
                    success: function (data) {
                        var data = JSON.parse(data);
                        if(data.code == 200){
                            window.location.href = '{{Request::getRequestUri()}}';
                        }else{
                            alert(data.msg)
                        }


                    }
                });
            })
        }
    </script>
    </html>
@stop
