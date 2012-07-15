<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的活动</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myactivity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/myactivity.js"></script>
<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	DD_belatedPNG.fix('.png_bg');
	$.ie6hover();
</script>
<![endif]--> 

</head>
<body>
<div id="main">
<!--headerEnd-->

{include file="common/header.tpl"}

<!--contentBegin-->
<div id="content">
	<!--左方選單-->
{include file="common/left.tpl"}
	<!--右方区快-->
	<div class="floatL mg_b">
		<div id="mypaliie_tip_container" class="mg_b mg_r">
			<div id="mypaliie_tip_left" class="floatL png_bg"></div>
			<div id="mypaliie_tip_center" class="floatL png_bg">
				<div id="mypaliie_tip_icon" class="floatL png_bg"></div>
				<div id="mypaliie_tip_text" class="floatL">tipTEXT</div>
				<div id="mypaliie_tip_knowmore" class="floatR">>>了解更多</div>
			</div>
			<div id="mypaliie_tip_right" class="floatL png_bg"></div>
		</div>
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">廣告</div>	
		<div class="clearboth"></div>
		
		<!--內文-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title">我的活動</div>
					<div class="main_menu">
						<ul>
							<li class="act_invite selected"><a href="/index.php/activity/index/index">活動邀請</a></li>
							<li class="act_hold"><a href="/index.php/activity/my_launch/index">我發起的活動</a></li>
							<li class="act_apply"><a href="/index.php/activity/my_in/index">我參加的活動</a></li>
							<li class="act_watch"><a href="/index.php/activity/my_attention/index">關注的活動</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
					
					
					
						<!--活動邀請-->
						<div id="act_invite">
							<div class="title font_text2">活動邀請</div>
							<div class="addactBtn" onclick="add_activity()"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="toolbar">
								<div class="manage floatL">
									<input class="selectall" name="selectall" type="checkbox">
									<a>全选｜</a>
									<a class="delete">删除</a>
								</div>							
								<!--<div class="sort floatR">
									<div class="sort_btn">
										<div class="sort_text">排列</div>
										<div class="sort_arrow"></div>
									</div>
									<div class="sort_container">
										<div class="bg1">
											<div class="actDate sort_by">參加日期</div>
											<div class="actTitle sort_by">活動名稱</div>
											<div class="actStatus sort_by">進行狀態</div>
										</div>
										<div class="bg2"></div>
									</div>
								</div>-->
							</div>
							<div class="actlist">
								<ul>
									<li>
										<div class="act_check floatL"><input type="checkbox"></div>
										<div class="act_status floatL running"></div><!--活動進行狀態-->
										<div class="act_img floatL"><img src="/static/images/testpic.jpg" class="img_S"></div>
										<div class="act_info floatL">
											<div class="act_name font_title">索隆慶生趴</div>
											<div class="clearboth"></div>
											<div class="floatL">參加人數:</div><div class="act_applyNum floatL">111</div>
											<div class="clearboth"></div>
											<div class="floatL">參加日期:</div><div class="act_Date floatL">2011/11/11</div>
										</div>
										<div class="act_interactive floatR">
											<div class="act_detail floatL font_text2 udl mg_r"><a href="/index.php/activity/index/activity_detail">查看詳情</a></div>
											<div class="floatL font_text1">發表於</div><div class="act_postDate floatL font_text1">2011/11/11</div>
										</div>
										<div class="clearboth"></div> 
									</li>
									<li>
										<div class="act_check floatL"><input type="checkbox"></div>
										<div class="act_status floatL applying"></div>
										<div class="act_img floatL"><img src="/static/images/testpic.jpg" class="img_S"></div>
										<div class="act_info floatL">
											<div class="act_name font_title">索隆慶生趴</div>
											<div class="clearboth"></div>
											<div class="floatL">參加人數:</div><div class="act_applyNum floatL">111</div>
											<div class="clearboth"></div>
											<div class="floatL">參加日期:</div><div class="act_Date floatL">2011/11/11</div>
										</div>
										<div class="act_interactive floatR">
											<div class="act_detail floatL font_text2 udl mg_r">查看詳情</div>
											<div class="floatL font_text1">發表於</div><div class="act_postDate floatL font_text1">2011/11/11</div>
										</div>
										<div class="clearboth"></div> 
									</li>
									<li>
										<div class="act_check floatL"><input type="checkbox"></div>
										<div class="act_status floatL over"></div>
										<div class="act_img floatL"><img src="/static/images/testpic.jpg" class="img_S"></div>
										<div class="act_info floatL">
											<div class="act_name font_title">索隆慶生趴</div>
											<div class="clearboth"></div>
											<div class="floatL">參加人數:</div><div class="act_applyNum floatL">111</div>
											<div class="clearboth"></div>
											<div class="floatL">參加日期:</div><div class="act_Date floatL">2011/11/11</div>
										</div>
										<div class="act_interactive floatR">
											<div class="act_detail floatL font_text2 udl mg_r">查看詳情</div>
											<div class="floatL font_text1">發表於</div><div class="act_postDate floatL font_text1">2011/11/11</div>
										</div>
										<div class="clearboth"></div> 
									</li>
									<li>
										<div class="act_check floatL"><input type="checkbox"></div>
										<div class="act_status floatL over"></div>
										<div class="act_img floatL"><img src="/static/images/testpic.jpg" class="img_S"></div>
										<div class="act_info floatL">
											<div class="act_name font_title">索隆慶生趴</div>
											<div class="clearboth"></div>
											<div class="floatL">參加人數:</div><div class="act_applyNum floatL">111</div>
											<div class="clearboth"></div>
											<div class="floatL">參加日期:</div><div class="act_Date floatL">2011/11/11</div>
										</div>
										<div class="act_interactive floatR">
											<div class="act_detail floatL font_text2 udl mg_r">查看詳情</div>
											<div class="floatL font_text1">發表於</div><div class="act_postDate floatL font_text1">2011/11/11</div>
										</div>
										<div class="clearboth"></div> 
									</li>
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						
					</div><!--內文end-->
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
	</div>
	<div class="clearboth"></div>
</div>
<!--contentEnd-->
<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>