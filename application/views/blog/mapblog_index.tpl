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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
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
			<form action="/index.php/blog/mapblog/search" method="post" >
				<div class="search_input">
					<div class="input_title">日誌搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">所在地:</div>
					<select name="province" id="province" onchange="scity(this.value);">
							                {foreach $province_list as $v}
							                 <option value="{$v.provinceID}" {if ($province==$v.provinceID)}selected{/if}>{$v.province}</option>
							                {/foreach}
										</select>
										&nbsp;
										<select name="city" id="city" onchange="sarea(this.value)">
											<option value="">請選擇城市</option>
										</select>
										&nbsp;
										<select name="area" id="area">
											<option value="">請選擇區域</option>
										</select>
					
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;分類:</div>
					<select name="category"><option value='' >不限</option><option value='1' if>美食</option><option value='2'>旅遊</option><option value='3' >休閒娛樂</option></select>
					<input type="hidden" value="" name="input_province" id="input_province"/>
							<input type="hidden" value="" name="input_city" id="input_city"/>
							<input type="hidden" value="" name="input_area" id="input_area"/>
							<input type="hidden" value="" name="input_detail_address" id="input_detail_address"/>
					<button type="submit" class="searchBtn" onclick="replaceID();return true;"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		<!--地圖區塊-->
		<div id="map_navigation">
			<div class="map_container" id="map_container">地圖區塊</div>
		</div>
		<div class="ad1">廣告</div>
		<div class="ad1">廣告</div>
		<div class="ad1">廣告</div>
		<div class="clearboth"></div>
		<div class="ad2">廣告</div>
		<div class="clearboth"></div>
		
		<!--分類推薦日誌-->
		<div id="mapblog_recommend">
			<div id="travel">
				<div class="content">
					<div class="title">旅遊推薦日誌</div>
					<div class="view" onclick="window.location.href='/index.php/blog/mapblog/search/1'">顯示更多</div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic" onclick="window.location.href='/index.php/browse_blog/map_detail/{$travel[0]['blogid']}'" ><img src="{$travel[0]['pic']}" class="img_L"></div>
						<div class="info">
							<div class="map_type">[<a>旅遊</a>]</div>
							<div class="map_area">[<a>{$travel[0]['city']}</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/{$travel[0]['blogid']}'" >{$travel[0]['SUBJECT']|truncate:24:'.'}</div>
						<div class="text" onclick="window.location.href='/index.php/browse_blog/map_detail/{$travel[0]['blogid']}'" >{$travel[0]['message']|truncate:24:'.'}</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
						    {foreach from=$travel item=v key=k}
						    {if $k != 0}
							  <li onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" ><img src="{$v['pic']}" class="img_S"></li>
							{/if}  
							{/foreach}
						</ul>
					</div>
				</div>
			</div>
			<div id="food">
				<div class="content">
					<div class="title">美食推薦日誌</div>
					<div class="view" onclick="window.location.href='/index.php/blog/mapblog/search/2'">顯示更多</div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic" onclick="window.location.href='/index.php/browse_blog/map_detail/{$cate[0]['blogid']}'" ><img src="{$travel[0]['pic']}" class="img_L"></div>
						<div class="info">
							<div class="map_type">[<a>美食</a>]</div>
							<div class="map_area">[<a>{$travel[0]['city']}</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/{$cate[0]['blogid']}'" >{$cate[0]['SUBJECT']|truncate:24:'.'}</div>
						<div class="text" onclick="window.location.href='/index.php/browse_blog/map_detail/{$cate[0]['blogid']}'" >{$cate[0]['message']|truncate:24:'.'}</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
							{foreach from=$cate item=v key=k}
						    {if $k != 0}
							  <li onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" ><img src="{$v['pic']}" class="img_S"></li>
							{/if}  
							{/foreach}
						</ul>
					</div>
				</div>
			</div>
			<div id="Entertainment">
				<div class="content">
					<div class="title">娛樂推薦日誌</div>
					<div class="view" onclick="window.location.href='/index.php/blog/mapblog/search/3'">顯示更多</div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic" onclick="window.location.href='/index.php/browse_blog/map_detail/{$recreation[0]['blogid']}'" ><img src="{$recreation[0]['pic']}" class="img_L"></div>
						<div class="info">
							<div class="map_type">[<a>娛樂</a>]</div>
							<div class="map_area">[<a>{$recreation[0]['city']}</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/{$recreation[0]['blogid']}'">{$recreation[0]['SUBJECT']|truncate:24:'.'}</div>
						<div class="text" onclick="window.location.href='/index.php/browse_blog/map_detail/{$recreation[0]['blogid']}'" >{$recreation[0]['message']|truncate:24:'.'}</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
							{foreach from=$recreation item=v key=k}
						    {if $k != 0}
							  <li onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" ><img src="{$v['pic']}" class="img_S"></li>
							{/if}  
							{/foreach}
						</ul>
					</div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div id="mapblog_list">
				<ul>
				  {foreach from=$newblogs item=v key=k}
					<li>
						<div class="pic"  onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" style=" cursor:pointer;" ><img src="{$v['pic']}" class="img_XL"></div>
						<div class="clearboth"></div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" style=" cursor:pointer;">{$v['SUBJECT']|truncate:24:'.'}</div>
						<div class="clearboth"></div>
						<div class="info">
							<div>[<a class="map_type">{if $v['tag']==1}旅遊{elseif $v['tag']==2}美食{else}娱乐{/if}</a>]</div>
							<div>[<a class="map_area">{$v['city']}</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					{/foreach}
				</ul>
				
			</div>
			<div class="clearboth"></div>
		
		</div>
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	{include file="common/footer.tpl"}
</body>
<script type="text/javascript" src="/static/js/blog/map.js"></script>
<script type="text/javascript" src="/static/js/blog/city.js"></script>
<script language="javascript">scity("","");</script>
</html>