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
							                 <option value="{$v.provinceID}" {if $province==$v.province}selected{/if}>{$v.province}</option>
							                {/foreach}
										</select>
										&nbsp;
										<select name="city" id="city" onchange="sarea(this.value)">
											<option value="">{$city}</option>
											<option value='' {if empty($city)}selected{/if} >請選擇城市</option>
										</select>
										&nbsp;
										<select name="area" id="area">
											<option value="">{$area}</option>
											<option value='' {if empty($area)}selected{/if}>請選擇區域</option>
										</select>
					
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;分類:</div>
					<select name="category"><option value='' >不限</option><option value='1' {if $category=='1'}selected{/if}>美食</option><option value='2' {if $category=='2'}selected{/if}>旅遊</option><option value='3' {if $category=='3'}selected{/if} >休閒娛樂</option></select>
							<input type="hidden" value="{$province}" name="input_province" id="input_province"/>
							<input type="hidden" value="{$city}" name="input_city" id="input_city"/>
							<input type="hidden" value="{$area}" name="input_area" id="input_area"/>
							<input type="hidden" value="" name="input_detail_address" id="input_detail_address"/>
					<button type="submit" class="searchBtn" onclick="replaceID();return true;"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		
		<!--左方區塊-->
		<div class="left">
			<div id="mapblog_all">
				<div class="page">
					<div class="top"></div>
					<div class="titlebg"></div>
					<div class="middle">
						<div class="content">
							<div class="type">
								<ul>
									<li  class="selected" onclick="window.location.href='/index.php/blog/mapblog/search/1'">旅遊</li>
									<li  onclick="window.location.href='/index.php/blog/mapblog/search/2'" >美食</li>
									<li onclick="window.location.href='/index.php/blog/mapblog/search/3'">娛樂</li>
								</ul>
							</div>
							<div class="clearboth"></div>
							<div class="underline">
								<div class="line page"></div>
								<div class="arrow"></div>
							</div>
							
							
							<div class="clearboth"></div>
							<div class="list">
								<ul>
								  {foreach from=$search_blog item=v key=k}
									<li>
										<div class="pic" onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" ><img src="{$v['pic']}" class="img_M"></div>
										<div class="info">
											<div class="map_area">[<a>{$v['city']}</a>]</div>
											<div class="map_type">[<a>{if $v['tag']==1}旅遊{elseif $v['tag']==2}美食{else}娱乐{/if}</a>]</div>
											<div class="map_star">★★★★★</div>
											<div class="map_date">{$v['dateline']|date_format:"%Y/%m/%d"}</div>
										</div>
										<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'">{$v['SUBJECT']|truncate:24:'.'}</div>
										<div class="text" onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" >{$v['message']|truncate:24:'.'}</div>
										<div class="view" onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" >查看詳細</div>
									</li>
									{/foreach}
								</ul>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			
			
		</div><!--left end-->
		
		
		
		
		
		<!--右方區塊-->
		<div class="right">
			<!--排行榜-->
			<div id="mapblog_rank">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
						<div class="content">
							<ul>
							   {foreach from=$recomment_list item=v key=k}
								<li onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" ><div class="no{$k+1} rankicon" ></div>{$v['SUBJECT']|truncate:18:'.'}</li>
							  {/foreach}
							</ul>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
						
			<!---->
			<div class="ad1">廣告</div>
			<div class="ad1">廣告</div>
			
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