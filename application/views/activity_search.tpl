<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/activity/activity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/display/activity.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.fancybox-1.3.4.pack.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ymd.js" type="text/javascript"></script>
<script src="/static/js/pca.js"></script>

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
<body onload="getcitys('city2','{$province}')">

{include file="common/header.tpl"}
	
	<div id="content">
		<!--活動搜索BAR-->
		<div class="searchbar">
			<form action="/index.php/browse_act/search" method="post">
				<div class="search_input">
					<div class="input_title">活動搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">活動時間:</div>
					<select name="years" id="birthyear" onchange="year(this.value)">{$yearoption}</select>&nbsp;&nbsp;<select name="months" id="birthmonth" onchange="month(this.value)">{$monthoption}</select>&nbsp;&nbsp;<select name="days" id="birthday">{$dayoption}</select>
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;Ta的所在地:</div>
					<select id="city1" name="input_province" onChange="changepro('city2','city1')">
                                                <option value="">省/直辖市</option>
                                                {foreach from=$province_list item=v key=k}
                                                    <option value="{$v.province}" {$v.selected}>{$v.province}</option>
                                                {/foreach}
                                                </select>
                                                <select name="input_city" id="city2">
                                                    {if $city!=''}<option value="{$city}">{$city}</option>{/if}
                                                    <option value="">請選擇城市</option>
                                            </select> 
					<button type="submit" class="searchBtn"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		<div id="act_left">	
			<!--搜索結果-->
			<div id="act_search">
				<div class="page">
					<div class="top"></div>
					<div class="middle"	>
						<div class="content">
							<div class="main_title">活動搜索結果</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="act_list">
								<ul>
                                
                                
                                {foreach from=$search_activity_list item=v key=k}
									<li>
										<img src="/data/attachment/album/{$v.logo}" class="img_M" onclick="window.location.href='/index.php/browse_act/detail/id/{$v.aid}'">
										<div class="act_info">
											<div class="act_type">[<a class="type">{$v.class}</a>]</div><div limit="28" class="act_name" onclick="window.location.href='/index.php/browse_act/detail/id/{$v.aid}'">{$v.SUBJECT}</div>
											<div class="clearboth"></div>
											<div>活動時間:<a class="date">{$v.times}</a>至<a class="date">{$v.etimes}</a></div>
											<div class="clearboth"></div>
											<div>关注人數:<a class="invite_number emNum">{$v.follownum}</a>人</div>						i			
										</div>										
										<div class="clearboth"></div>
										<div class="moreinfo">
											<div class="view" onclick="window.location.href='/index.php/browse_act/detail/id/{$v.aid}'" style="cursor:pointer;">查看詳情</div>
											<div class="applied">已報名人數:<a>{$v.membernum}</a>人</div>						
											<div class="countdown">活动报名截止時間還剩:<a>{$v.dayNum}</a>天<a>{$v.hourNum}</a>时<a>{$v.minuteNum}</a>分</div>
										</div>
									</li>
                                    
                                {/foreach}  	    
									
									
									
									
									
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
					</div>
					<div class="bottom"></div>
					
				</div>	
					
			</div>
			<div class="clearboth"></div>
		</div><!--left end-->
		
		
		{include file="common/activity_act_right.tpl"}
		
		<!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
{include file="common/footer.tpl"}
</body>
</html>