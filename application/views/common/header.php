<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$this->config->item('site_name')} - {$title}</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/index.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.blockUI.js"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>

<script src="/static/js/layout/header.js"></script>
<script src="/static/js/register/register.js"></script>
<script src="/static/js/pca.js"></script>
<script src="/static/js/ymd.js"></script>
<script src="/static/js/display/index.js"></script>

<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	$(function(){		
		DD_belatedPNG.fix('.png_bg');
		$.ie6hover();
	});
</script>
<![endif]--> 

</head>
<body>

<!-- header start -->
<div id="header">
	<div id="header_left"></div>
	<div id="header_right"></div>
	<div id="header_container">
		<div id="logo"></div>
		<div id="header_content">	
			<div id="header_memberInfobar">	
				<div id="header_Info_IconContainer">
					<div id="header_Info_friend" class="infoIcon png_bg">
						<div id="Info_friendNewCount" class="infoCount ">1</div>
					</div>
					<div id="header_Info_message" class="infoIcon png_bg">
						<div id="Info_messageNewCount" class="infoCount">2</div>
					</div>
					<div id="header_Info_mail" class="infoIcon png_bg">
						<div id="Info_mailNewCount" class="infoCount">3</div>
					</div>
				</div>
				<div id="header_user">
					<a id="header_logout" class="logout">退出</a>
					<a id="header_login" class="login" onclick="location='{site_url('member/index/index')}'" >登入</a>
					<div id="header_user_id"><a class="user_id">Luffy</a></div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div id="header_menu">	
				<ul>
					<li id="menu_home" title="Paliie主页" onclick="location='{site_url('/')}'"></li>
					<li id="menu_mypaliie" title="我的Paliie" onclick="location='{site_url('member/index')}'"></li>
					<li id="menu_search" title="会員搜索" onclick="location='{site_url('search')}'"></li>
					<li id="menu_activity" title="奇遇活动" onclick="location='{site_url('activity')}'"></li>
					<li id="menu_mapblog" title="地图日志" onclick="location='{site_url('blog/mapblog')}'"></li>
					<li id="menu_emotionspace" title="情感空间" onclick="location='{site_url('blog/feelingspace')}'"></li>
				</ul>			
			</div>
			
		</div>
	</div>
</div>
<!-- header end -->

<!-- content start -->
<div id="content">

	{if isset($leftside) && $leftside == true}
	<!--leftside start-->
	{include file="common/leftside.php"}
	<!--leftside start-->
	{/if}
	
	