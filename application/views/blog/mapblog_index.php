<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mapblog/mapblog.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/display/mapblog.js"></script>


<script src="/static/js/ui/jquery.curvycorners.min.js"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
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
	<!------------------------------------------header------------------------------------------>
<?php
	include_once("layout/header.php");
?>
	<!------------------------------------------header-end------------------------------------------>
	
	<!-------------------------------------------content-------------------------------------------->
	<div id="content">
		<!--地圖搜索BAR-->
		<div class="searchbar">
			<form>
				<div class="search_input">
					<div class="input_title">日志搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">所在地:</div>
					<select><option>省份及直辖市<option>省份A<option>省份B<option>省份C<option>省份D</select>
					<select><option>城市名<option>城市A<option>城市B<option>城市C<option>城市D</select>
					
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;分类:</div>
					<select><option>不限<option>美食<option>旅游<option>休闲娱乐</select>
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;评分:</div>
					<select><option>不限<option>4分以上<option>3~4分<option>2~3分<option>1~2分<option>0~1分</select>
					<button type="submit" class="searchBtn"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		<!--地圖區塊-->
		<div id="map_navigation">
			<div class="map_container">地图区块</div>
		</div>
		<div class="ad1">廣告</div>
		<div class="ad1">廣告</div>
		<div class="ad1">廣告</div>
		<div class="clearboth"></div>
		<div class="ad2">廣告</div>
		<div class="clearboth"></div>
		
		<!--分类推荐日誌-->
		<div id="mapblog_recommend">
			<div id="travel">
				<div class="content">
					<div class="title">旅游推荐日志</div>
					<div class="view"><a href="mapblog_all.php">显示更多</a></div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic"><a href="member_map_detail.php"><img src="/static/images/testpic.jpg" class="img_L"></a></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name"><a href="member_map_detail.php">日志标题日志标题</a></div>
						<div class="text"><a href="member_map_detail.php">日志內容日志內容日志內容日志內容日志內容</a></div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
							<li><img src="/static/images/testpic.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic2.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic2.jpg" class="img_S"></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="food">
				<div class="content">
					<div class="title">美食推荐日志</div>
					<div class="view"><a>显示更多</a></div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic"><img src="/static/images/testpic2.jpg" class="img_L"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="text">日志內容日志內容日志內容日志內容日志內容</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
							<li><img src="/static/images/testpic2.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic2.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic.jpg" class="img_S"></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="Entertainment">
				<div class="content">
					<div class="title">娱乐推荐日志</div>
					<div class="view"><a>显示更多</a></div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic"><img src="/static/images/testpic.jpg" class="img_L"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="text"><a>日志內容日志內容日志內容日志內容日志內容</a></div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
							<li><img src="/static/images/testpic.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic2.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic.jpg" class="img_S"></li>
							<li><img src="/static/images/testpic2.jpg" class="img_S"></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div id="mapblog_list">
				<ul>
					<li>
						<div class="pic"><a href="member_map_detail.php"><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a href="member_map_detail.php">日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<div class="pic"><a><img src="/static/images/testpic.jpg" class="img_XL"></a></div>
						<div class="clearboth"></div>
						<div class="name"><a>日志标题日志标题</a></div>
						<div class="clearboth"></div>
						<div class="info">
							<div class="map_type">[娱乐]</div>
							<div class="map_area">[苏州]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
				</ul>
				
			</div>
			<div class="clearboth"></div>
		
		</div>
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	<!------------------------------------------content-end------------------------------------------>
	<!--------------------------------------------footer--------------------------------------------->
<?php 
	include_once("layout/footer.php");
?>
	<!------------------------------------------footer-end------------------------------------------->
</body>
</html>