<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	DD_belatedPNG.fix('.');
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
	<!--中央区快-->
	<div id="mypaliie_center" class="mg_r">
		<!--中央上方提示區塊-->
		
        {include file="common/tip.tpl"}
		<!--中央个人区块-->
		<div id="mypaliie_main_container" class="mg_b">
			<div id="mypaliie_main_top" class="norepeat "></div>
			<div id="mypaliie_main_mid">
				<div id="mypaliie_user_info">
					<div class="mypaliie_user_pic">
						<img src="{$center_data.avatar_big_img}" class="img_2L">						
					</div>
					<div id="mypaliie_user_data">					
						<ul>
							<li><a class="user_name font_title">{$center_data.user_name}</a></li>
							<li>PaliieID：<a class="user_id">{$center_data.user_id}</a></li>
							<li>资料完整度：</li>
							<li><div id="progressBar"></div><a class="user_data_percent">37</a>%</li>
							<li>会员身份：<a class="user_level">普通会员</a></li>
							<li>我的积分：<a class="user_point">999</a></li>
							<li><div id="5stars">★★★★★</div></li>
						</ul>
					</div>				
					<div id="mypaliie_info_btn_container">
						<a href="/index.php/activity/index/create" target="_blank"><div class="mypaliie_info_btn create_act "></div></a>
						<a href="/index.php/blog/map" target="_blank"><div class="mypaliie_info_btn enter_mapblog "></div></a>
					</div>
					<div class="clearboth"></div>
				</div>
				<div id="paliie_meet_container">
					<h3></h3>
					<div class="bar">
						<div class="barL"></div>
					</div>
					<div class="clearboth"></div>
					<div id="paliie_meet">
						<ul>
							<li>
								<div class="meet_date">2011/10/10</div>
								<div class="meet_time">10:10</div>
								<div class="meet_who">与<a class="font_memname">会员A</a>在同一个城市相遇</div>
							</li>
							<li>
								<div class="meet_date">2011/10/10</div>
								<div class="meet_time">10:10</div>
								<div class="meet_who">与<a class="font_memname">会员B</a>在同一个城市相遇</div>
							</li>
							<li>
								<div class="meet_date">2011/10/10</div>
								<div class="meet_time">10:10</div>
								<div class="meet_who">与<a class="font_memname">会员C</a>在同一个城市相遇</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="mypaliie_main_bottom" class="norepeat "></div>
			<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
		<!--感興趣活動-->
		<div id="mypaliie_intrest_act_container" class="mg_b">
			<div id="mypaliie_intrest_act_title"></div>
			<div id="mypaliie_intrest_act_L"></div>
			<div id="mypaliie_intrest_act_C"></div>
				<div id="mypaliie_intrest_act">
				<ul>
                
                {foreach from=$center_data.activity_list item=v key=k}
					<li>
						<a class="img_frame"><img class="img_M" src="/data/attachment/album/{$v.logo}"></a>
						<h4 limit='11'><a href="/index.php/browse_act/detail/aid/{$v.aid}">{$v.SUBJECT}</h4>
						<h5>报名人数：<a class="emNum">{$v.membernum}</a>人</h5>
						<h6 limit='47'>{$v.description}</h6>
					</li>
				{/foreach} 	
					
				</ul>
				</div>
			<div id="mypaliie_intrest_act_R"></div>
		</div>
		<div class="clearboth"></div>
		<!--感興趣地圖-->
		<div id="mypaliie_intrest_map_container">
			<div id="mypaliie_intrest_map_title"></div>
			<div id="mypaliie_intrest_map_L"></div>
			<div id="mypaliie_intrest_map_C"></div>
				<div id="mypaliie_intrest_map">
					<ul>
					
					{foreach from=$center_data.map_list item=v key=k}
						<li>
							<a class="img_frame" onclick="window.location.href='/index.php/blog/map/detail/{$v['blogid']}'" ><img class="img_L" src="{$v.avatar_img_map}"></a>
							<h4 limit='12' onclick="window.location.href='/index.php/blog/map/detail/{$v['blogid']}'"  >{$v.SUBJECT}</h4>
							<h6 limit='46' onclick="window.location.href='/index.php/blog/map/detail/{$v['blogid']}'"  >{$v.message}</h6>
						</li>
					{/foreach} 		
					
					</ul>
				</div>
			<div id="mypaliie_intrest_map_R"></div>
		</div>
		<div class="clearboth"></div>
		
	</div>
	<!--右方廣告-->
	<div id="mypaliie_right">
		<div id="mypaliie_ad_0" style="height:190px;width:190px;background:#523;" class="mg_b">廣告1</div>
		<div id="mypaliie_ad_1" style="height:370px;width:190px;background:#533;" class="mg_b">廣告2</div>
		<div id="mypaliie_news" style="height:190px;width:190px;background:#543;" class="mg_b">奇遇新闻</div>
		<div id="mypaliie_ad_2" style="height:190px;width:190px;background:#553;">廣告3</div>
		<div class="cleatboth"></div>
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