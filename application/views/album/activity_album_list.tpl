<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活動相冊</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myalbum.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
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
					<div class="main_title">我的相冊</div>
					<div class="main_menu">
						<ul>
							<li class="album_act" onclick="location.href='/index.php/album/index/index'">我的照片</li>
							<li class="album_user selected" onclick="location.href='/index.php/album/activity_album/index'">活動相冊</li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->

						<div id="album_act">
							<div class="title font_text2">活動相冊</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div id="album_act_list">
								<ul>
								<!--活動列表-->
                               
                                 {foreach from=$activity_album_list item=v key=k}
									<li>
										<div class="act_pic"><img src="/data/attachment/album/{$v.thumb}" class="img_L"></div>
										<div class="act_info">
											<div class="act_name">{$v.activity_info['SUBJECT']}</div>
											<div class="label">參加人數:</div><div class="text"><a class="apply_value">{$v.activity_info['membernum']}</a>人</div>
											<div class="clearboth"></div>
											<div class="label">主辦人:</div><div class="text"><a class="font_memname">{$v.activity_info['set_ac_username']}</a></div>
											<div class="clearboth"></div>
											<div class="label">活动說明:</div><div class="text"><p class="apply_value">{$v.description}</p></div>
										</div>
										<div class="clearboth"></div>
										<div class="enter_act"><a href="/index.php/album/activity_album/activity_photo_list/albumid/{$v.albumid}">進入活動相冊</a></div>
									</li>
                                 {/foreach}     
						
								</ul>
							</div>
                            
                            
                            
                            
                            
                            
                            
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


<div id="album_pic_edit_window"></div>



<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>