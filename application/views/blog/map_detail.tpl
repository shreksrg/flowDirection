<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mymap.css" type="text/css" rel="stylesheet">

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
					<div class="content">					
						<!--新增地圖日誌-->
						
						<div class="clearboth"></div>
						
						
						
						<!--詳細地圖日誌-->
						<div id="map_detail">
							<div class="title font_text2 floatL"><div class="floatL">地圖日誌></div>{$blogMapInfo['SUBJECT']|truncate:8}</div>
							<div class="addmapBtn" onclick="window.location.href='/blog/index/add_map'"></div><div class="edit">編輯</div>
							<div class="bar"><div></div></div>
							<div class="clearboth mg_b"></div>
							<div class="map_container" id="map_container">地圖區塊</div>
							<div class="clearboth mg_b"></div>
							<div class="floatR" style="display:none;">
								<div class="map_search">
									<input type="text"><div class="pathBtn"></div>
								</div>
								<div class="clearboth"></div>
								<div class="map_show_nearbymember" style="display:none;">顯示週遭會員</div>
							</div>
							<div class="map_name">{$blogMapInfo['SUBJECT']|truncate:24}</div>
							
							<div class="map_tag">[<a class="map_area">{$blogMapInfo['city']}</a>][<a class="map_type">旅遊</a>]</div>
							
							<div class="clearboth"></div>
							<div>評分<a class="map_star">★★★★★</a></div>
							<div class="clearboth"></div>
							<div class="map_date">{$blogMapInfo['dateline']|date_format:"%Y/%m/%d"}</div>
							<div class="clearboth"></div>
							<div class="btns" style="display:none;">
								<button class="shareBtn"></button><button class="recommendBtn"></button>
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="floatL map_content">
								{$blogMapInfo['message']}
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="map_pic">
								<img src="/static/images/testpic.jpg" class="img_L">
								<img src="/static/images/testpic.jpg" class="img_L">
								<img src="/static/images/testpic.jpg" class="img_L">
								<img src="/static/images/testpic.jpg" class="img_L">
								<img src="/static/images/testpic.jpg" class="img_L">
								<img src="/static/images/testpic.jpg" class="img_L">
								<img src="/static/images/testpic.jpg" class="img_L">
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="map_comment_container">
								<div class="map_comment_input">
									<img src="/static/images/testpic.jpg"><textarea id="comment_content"></textarea><div class="btn" onclick="comment()">發表</div>

								</div>
								<div class="clearboth"></div>
								<div class="map_comments common_comments">
								{include file="common/comment.tpl"}
								</div>

								<div class="clearboth"></div>
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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<script type="text/javascript" src="/static/js/blog/map_detail.js"></script>
<script type="text/javascript">
    show_map("{$blogMapInfo['city']}","{$blogMapInfo['address']}");
</script>
</html>