<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
		<!-- Google Chrome Frame也可以让IE用上Chrome的引擎: -->
		<meta name="renderer" content="webkit">
		<!--国产浏览器高速模式-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="穷在闹市" />
		<!-- 作者 -->
		<meta name="revised" content="穷在闹市.v3, 2019/05/01" />
		<!-- 定义页面的最新版本 -->
		<meta name="description" content="网站简介" />
		<!-- 网站简介 -->
		<meta name="keywords" content="搜索关键字，以半角英文逗号隔开" />
		<title>穷在闹市出品</title>

		<!-- 公共样式 开始 -->
		<link rel="shortcut icon" href="/admin/images/favicon.ico">
		<link rel="bookmark" href="{{asset('admin/images/favicon.ico')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('admin/css/base.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('admin/css/iconfont.css')}}">
		<script type="text/javascript" src="{{asset('admin/js/base.js')}}" ></script>
		<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css">
	    <!--[if lt IE 9]>
		<script src="{{asset('admin/framework/jquery-ui-1.10.4.min.js')}}"></script>
		<script src="{{asset('admin/framework/jquery.mousewheel.min.js')}}"></script>
				<script src="{{asset('admin/framework/cframe.js')}}"></script><!-- 仅供所有子页面使用 -->
		<script src="/admin/js/jquery.js"></script>
		<script src="/admin/framework/html5shiv.min.js"></script>
	      	<script src="/admin/framework/respond.min.js"></script>
	    <![endif]-->


		<script type="text/javascript" src="{{asset('admin/layui/layui.js')}}"></script>
		<!-- 滚动条插件 -->
		<link rel="stylesheet" type="text/css" href="{{asset('admin/css/jquery.mCustomScrollbar.css')}}">
		<script src="{{asset('admin/framework/jquery.mCustomScrollbar.min.js')}}"></script>

		<!-- 公共样式 结束 -->

		<link rel="stylesheet" type="text/css" href="{{asset('admin/css/login.css')}}">
		<script type="text/javascript" src="{{asset('admin/js/login.js')}}"></script>
	</head>

	<body>
		
		<!--主体 开始-->
		<div class="login_main">
			<!--轮播图 开始-->
			<div class="layui-carousel lbt" id="loginLbt">
				<div carousel-item>
					<div class="item" style="background: url({{asset('admin/images/login_bg1.jpg')}}) no-repeat; background-size: cover;"></div>
					<div class="item" style="background: url(/admin/images/login_bg2.jpg) no-repeat; background-size: cover;"></div>
				</div>
			</div>
			<!--轮播图 结束-->
			<div class="logo">
				<img src="{{asset('admin/images/login_logo.png')}}" />
				<div>
					<h1>穷在闹市出品</h1>
					<p>版本号:19.3.01</p>
				</div>
			</div>
			<div class="form_tzgg">
				<div class="form">
					<form action="" method="post" class="layui-form">
						@csrf
						<div class="title">用户登录</div>
						<div class="con" onclick="getFocus(this)">
							<input type="text" name="userName" lay-verify="userName" placeholder="请输入您的用户名" autocomplete="off" class="layui-input">
						</div>
						<div class="con" onclick="getFocus(this)">
							<input type="password" name="passWord" required  lay-verify="passWord" placeholder="请输入您的账户密码" autocomplete="off" class="layui-input">
						</div>
						<div class="but">
							<button class="layui-btn" lay-submit lay-filter="formDemo">登录</button>
						</div>
						<div class="apply"><a href="#">企业注册申请</a></div>
					</form>
				</div>
				<script>
					layui.use('form', function() {
						var form = layui.form;
						form.verify({
				            userName: function(value, item){ //value：表单的值、item：表单的DOM对象
				                if(value == null || value == ""){
				                    return '请输入您的用户名！';
				                }
				            },
				            passWord: function(value, item){ 
				                if(value == null || value == ""){
				                    return '请输入您的账户密码！';
				                }
				            }
				        });
//监听提交
                        form.on('submit(formDemo)', function(data) {
                            var user_name = $('input[name="userName"]').val();
                            var password = $('input[name="passWord"]').val();
                            var data = {
                                user_name,
                                password
                            };
                            $.ajax({
                                "headers": { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                type: 'post',
                                async: false,
                                url: "/admin/login",
                                data: data,
                                dataType: 'text',
                                success: function (data) {
                                    if(data['code'] == 200){
                                        header('Location: {{url('admin/article')}}');
									}
									if(data['code'] == 400){
                                        console.log(data)
									}
                                }
                            });
                        });
					});

				</script>
				<div class="tzgg">
					<div class="title">通知公告</div>
					<div class="con">
						<ul>
							<li><span>05-01</span><a href="#" target="_blank">穷在闹市框架升级</a></li>
							<li><span>04-16</span><a href="#" target="_blank">穷在闹市无人问，富在深山有远亲</a></li>
							<li><span>02-23</span><a href="#" target="_blank">没有最好的代码，只有最好的思路</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--主体 结束-->
	</body>

</html>