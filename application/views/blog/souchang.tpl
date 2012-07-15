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
					<div class="main_title" class="floatL ">地圖日誌</div>
					<div class="main_menu" class="floatL">
						<ul>
							<li class="mymap selected">地圖日誌</li>
							<li class="mymap_favorite">我的收藏</li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">					
					
						<!--地圖日誌列表-->
						<div id="mymap">
							<div class="title font_text2 mg_b">地圖日誌</div>
							<div class="addmapBtn" onclick="window.location.href='/index.php/blog/index/add_map'"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="maplist">
								<ul>
								{foreach from=$blogMapList item=v key=k}
									<li>																				
										<img src="/static/images/testpic.jpg" class="img_M">
										<div class="floatL">
											<div class="map_star">★★★★★</div>
											<div class="map_data"><a class="map_name">{$v['SUBJECT']|truncate:24:'.'}</a>[<a class="map_area">{$v['city']}</a>][<a class="map_type">旅遊</a>]</div>
											<div class="clearboth"></div>											
											<div>回應與人氣:<a class="map_reply">{$v['replynum']}</a>/<a class="map_popularity">{$v['viewnum']}</a></div>
											<div class="clearboth"></div>
											<div><a class="map_date">{$v['dateline']|date_format:"%Y-%m-%d"}</a></div>
											<div class="clearboth"></div>
										</div>
										<div class="map_status">{if $v['STATUS']==1}通過審核{else}審核中{/if}</div>
										<div class="clearboth"></div>
										<div class="manage"><a href="javascript:void(0);" onclick="delete_map_row($(this))" id="{$v['blogid']}">刪除</a>｜<a href="/index.php/blog/index/edit_map?blog_id={$v['blogid']}">編輯</a></div>
										<div class="clearboth"></div>
									</li>
									{/foreach}
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth mg_b"></div>
						
						
						<!--我的收藏列表-->
						<div id="map_collection">
							<div class="title font_text2 mg_b">我的收藏</div>
							<div class="addmapBtn" onclick="/index.php/blog/index/add_map"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="maplist">
								<ul>
									<li>																				
										<img src="/static/images/testpic.jpg" class="img_M">
										<div class="floatL">
											<div class="map_star">★★★★★</div>
											<div class="map_data"><a class="map_name">日誌標題日誌標題日誌標題日誌標題日誌標題...</a>[<a class="map_area">蘇州</a>][<a class="map_type">旅遊</a>]</div>
											<div class="clearboth"></div>											
											<div>回應與人氣:<a class="map_reply">5</a>/<a class="map_popularity">15</a></div>
											<div class="clearboth"></div>
											<div><a class="map_date">2011/11/11</a></div>
											<div class="clearboth"></div>
										</div>
										<div class="collect_date">于<a class="collect_date">2011/11/11</a>加入收藏</div>
										<div class="clearboth"></div>
										<div class="delete">移除收藏</div>
										<div class="clearboth"></div>
									</li>
									<li>																				
										<img src="/static/images/testpic.jpg" class="img_M">
										<div class="floatL">
											<div class="map_star">★★★★★</div>
											<div class="map_data"><a class="map_name">日誌標題日誌標題日誌標題日誌標題日誌標題...</a>[<a class="map_area">蘇州</a>][<a class="map_type">旅遊</a>]</div>
											<div class="clearboth"></div>											
											<div>回應與人氣:<a class="map_reply">5</a>/<a class="map_popularity">15</a></div>
											<div class="clearboth"></div>
											<div><a class="map_date">2011/11/11</a></div>
											<div class="clearboth"></div>
										</div>
										<div class="collect_date">于<a class="collect_date">2011/11/11</a>加入收藏</div>
										<div class="clearboth"></div>
										<div class="delete">移除收藏</div>
										<div class="clearboth"></div>
									</li>
									<li>																				
										<img src="/static/images/testpic.jpg" class="img_M">
										<div class="floatL">
											<div class="map_star">★★★★★</div>
											<div class="map_data"><a class="map_name">日誌標題日誌標題日誌標題日誌標題日誌標題...</a>[<a class="map_area">蘇州</a>][<a class="map_type">旅遊</a>]</div>
											<div class="clearboth"></div>											
											<div>回應與人氣:<a class="map_reply">5</a>/<a class="map_popularity">15</a></div>
											<div class="clearboth"></div>
											<div><a class="map_date">2011/11/11</a></div>
											<div class="clearboth"></div>
										</div>
										<div class="collect_date">于<a class="collect_date">2011/11/11</a>加入收藏</div>
										<div class="clearboth"></div>
										<div class="delete">移除收藏</div>
										<div class="clearboth"></div>
									</li>
									<li>																				
										<img src="/static/images/testpic.jpg" class="img_M">
										<div class="floatL">
											<div class="map_star">★★★★★</div>
											<div class="map_data"><a class="map_name">日誌標題日誌標題日誌標題日誌標題日誌標題...</a>[<a class="map_area">蘇州</a>][<a class="map_type">旅遊</a>]</div>
											<div class="clearboth"></div>											
											<div>回應與人氣:<a class="map_reply">5</a>/<a class="map_popularity">15</a></div>
											<div class="clearboth"></div>
											<div><a class="map_date">2011/11/11</a></div>
											<div class="clearboth"></div>
										</div>
										<div class="collect_date">于<a class="collect_date">2011/11/11</a>加入收藏</div>
										<div class="clearboth"></div>
										<div class="delete">移除收藏</div>
										<div class="clearboth"></div>
									</li>
									<li>																				
										<img src="/static/images/testpic.jpg" class="img_M">
										<div class="floatL">
											<div class="map_star">★★★★★</div>
											<div class="map_data"><a class="map_name">日誌標題日誌標題日誌標題日誌標題日誌標題...</a>[<a class="map_area">蘇州</a>][<a class="map_type">旅遊</a>]</div>
											<div class="clearboth"></div>											
											<div>回應與人氣:<a class="map_reply">5</a>/<a class="map_popularity">15</a></div>
											<div class="clearboth"></div>
											<div><a class="map_date">2011/11/11</a></div>
											<div class="clearboth"></div>
										</div>
										<div class="collect_date">于<a class="collect_date">2011/11/11</a>加入收藏</div>
										<div class="clearboth"></div>
										<div class="delete">移除收藏</div>
										<div class="clearboth"></div>
									</li>
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth mg_b"></div>
							
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
<script src="/static/js/blog/blog_index.js"></script>