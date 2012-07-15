<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mapblog/mapblog.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>


<script src="/static/js/ui/jquery.curvycorners.min.js"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mapblog.js"></script>
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
	{include file="common/header.tpl"}
	<div id="content">
		<!--地圖搜索BAR-->
		<div class="searchbar">
			<div class="searchbar">
			<form action="/index.php/blog/index/mapblog_search" method="get">
				<div class="search_input">
					<div class="input_title">日誌搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">所在地:</div>
					<select name="province" id="province" onchange="scity(this.value);">
		                {foreach $province as $v}
		                 <option value="{$v.provinceID}" {if ($user.province==$v.provinceID)}selected{/if}>{$v.province}</option>
		                {/foreach}
					</select>
					
					<select name="city" id="city" onchange="scity(this.value);">
						<option value="" >請選擇城市</option>
					</select>
					
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;分類:</div>
					<select name="mapblog_type"><option value="0">不限<option value="1">美食<option value="2">旅遊<option value="3">休閒娛樂</select>
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;評分:</div>
					<select name="score"><option value="0">不限<option value="5">4分以上<option value="4">3~4分<option value="3">2~3分<option value="2">1~2分<option value="1">0~1分</select>
					<button type="submit" class="searchBtn"></button>
				</div>
			</form>
		</div>
			<div class="searchBtn"></div>
		</div>
		<div class="clearboth"></div>
		<div class="left">
			<div id="search_result_list">
				<div class="page">
					<div class="top"></div>
					<div class="middle">
						<div class="content">
							<div class="main_title">日誌搜索結果</div>
							
							<div class="sort">
								<div class="sort_btn">
									<div class="sort_text">排列</div>
									<div class="sort_arrow"></div>
								</div>
								<div class="sort_container">
									<div class="bg1">
										<div class="mapDate sort_by">日期</div>
										<div class="mapName sort_by">標題</div>
										<div class="mapStar sort_by">評分</div>
									</div>
									<div class="bg2"></div>
								</div>
							</div>
							<div class="clearboth"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="list">
								<ul>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
									<li>
										<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>蘇州</a>]</div>
											<div class="map_type">[<a>旅遊</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">2011/12/01</div>
										</div>
										<div class="name">日誌標題日誌標題日誌標題</div>
										<div class="text">日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容日誌內容</div>
										<div class="view">查看詳細</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			
			
		</div><!--left end-->
		
		
		
		
		
		
		<div class="right">
			<!--排行榜-->
			<div id="mapblog_rank">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
						<div class="content">
							<ul>
								<li><div class="no1 rankicon"></div>日誌標題1</li>
								<li><div class="no2 rankicon"></div>日誌標題2</li>
								<li><div class="no3 rankicon"></div>日誌標題3</li>
								<li><div class="no4 rankicon"></div>日誌標題4</li>
								<li><div class="no5 rankicon"></div>日誌標題5</li>
								<li><div class="no6 rankicon"></div>日誌標題6</li>
								<li><div class="no7 rankicon"></div>日誌標題7</li>
								<li><div class="no8 rankicon"></div>日誌標題8</li>
								<li><div class="no9 rankicon"></div>日誌標題9</li>
								<li><div class="no10 rankicon"></div>日誌標題10</li>
							</ul>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
						
			<!---->
			<div class="ad1"></div>
			<div class="ad1"></div>
			
		</div>
		
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>{include file="common/footer.tpl"}
</body>
</html>
<script type="text/javascript" src="/static/js/blog/city.js"></script>