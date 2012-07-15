<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详细</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/activity/activity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.3.2.min.js" type="text/javascript"></script> 
<script src="/static/js/ui/jquery-ui-1.5.3.min.js" type="text/javascript"></script> 
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
<body>
	<!------------------------------------------header------------------------------------------>
{include file="common/header.tpl"}
	<!------------------------------------------header-end------------------------------------------>
	

	<div id="content">
		<!--活動搜索BAR-->
		<div class="searchbar">
			<form action="/index.php/browse_act/search" method="post">
				<div class="search_input">
					<div class="input_title">活動搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">活動時間:</div>
					<select name="years" id="birthyear" onchange="year(this.value)">{$yearoption}</select>&nbsp;&nbsp;<select name="months" id="birthmonth" onchange="month(this.value)">{$monthoption}</select>&nbsp;&nbsp;<select name="days" id="birthday">{$dayoption}</select>
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;Ta的所在地:</div>
					<select name="input_province" id="city1" onChange="changepro('city2','city1')">
                    	 <option value="">省/直辖市</option>
                    	{foreach from=$province_list item=v key=k}
                            <option value="{$v.province}">{$v.province}</option>
                        {/foreach}
                        
                    </select>
					<select name="input_city" id="city2">
                        <option value="">請選擇城市</option>
                    </select> 
					<button type="submit" class="searchBtn"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div><!--bar end-->
		
		<div id="act_left">	
			<div id="act_content">
				<div class="page">
					<div class="top"></div>
					<div class="middle"	>
						<div class="content">
							<div class="main_title">{$act_info.SUBJECT}</div>
							{if $act_info.attention==1}<div class="add2watch" onclick="add_attention('{$act_info.aid}')">加入關注</div>{/if}
							<div class="clearboth"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="act_info">
								<div class="act_info_left">
									<ul>	
										<li><div class="label">舉辦人:</div><div class="member_name text">{$act_info.username}</div></li>
                                        <li><div class="label">活動地区:</div><div class="text">{$act_info.province}-{$act_info.city}</div></li>
										<li><div class="label">活動地點:</div><div class="text">{$act_info.place}</div></li>
										<li><div class="label">活動時間:</div><div class="text">{$act_info.times}至{$act_info.etimes}</div></li>
										<li><div class="label">活動類型:</div><div class="text">{$act_info.class}</div></li>
										<li><div class="label">費用備註:</div><div class="text">{$act_info.cost}</div></li>
										<li><div class="label">支付方式:</div><div class="text">{$act_info.paytype}</div></li>
										<li><div class="label">查詢電話:</div><div class="text">{$act_info.phone}</div></li>
									</ul>
								</div>
								<div class="act_info_right">
									<div>關注人數<a class="act_watch_total">{$act_info.hotuserNum}</a>人&nbsp;&nbsp;報名總數<a class="act_apply_total">{$act_info.joinNum}</a>人(男<a class="male">{$act_info.joinmailNum}</a>人，女<a class="female">{$act_info.joinemailNum}</a>人)</div>
									<div>距離報名截止日期還剩<a class="act_countdown">{$act_info.dayNum}</a>天<a class="act_date_countdown emNum">{$act_info.hourNum}</a>时<a class="act_date_countdown emNum">{$act_info.minuteNum}</a>分</div>
									<div class="clearboth"></div>
									{if $act_info.join==1}<a id="applylink" class="applyBtn" href="/index.php/activity/my_in/actApply/aid/{$act_info.aid}"></a>{/if}
									<div class="clearboth"></div>
									{if $act_info.invite==1}<a id="invitelink" class="inviteBtn" href="/index.php/activity/my_launch/actInvite/aid/{$act_info.aid}"></a>{/if}
								</div>
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
							<div class="act_content">
								<div class="tabs">
									<div class="tag">
										<ul>
											<li class="selected" id="act_detail_intro">活動介紹</li>
											<li id="act_detail_participants">報名會員</li>
										</ul>
									</div>
									<div class="clearboth"></div>
								</div>					
							</div>
							<div class="act_detail_intro">
								<div class="act_pic_pri"><img src="/data/attachment/album/{$act_info.thumb}" class="img_XL"></div>
								<div class="act_intro">
									{$act_info.description}
								</div>
								<div class="clearboth"></div>
								<div class="act_pic_sub">
									<ul>
                                    
                                    
									{foreach from=$act_info.pic_list item=v key=k}
									  <a rel="actphotgroup" href="/data/attachment/album/{$v.filepath}"> <img src="/data/attachment/album/{$v.filepath}" class="img_S"></a>
								    {/foreach}  	
										
                                        
                                        
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
							
							<div class="act_detail_member">
								<ul>
                                
                                
								{foreach from=$act_info.user_list item=v key=k}
                                	<li>
										<a href="/index.php/member_info/index/uid/{$v.uid}"><img src="{$v.avatar_img}" class="img_M"></a>
										<div class="clearboth"></div>
										<div class="member_name"><a href="/index.php/member_info/index/uid/{$v.uid}">{$v.username}</a></div>
										<div class="clearboth"></div>
										<div class="member_info"><a>{if $v.sex==0}男{/if}{if $v.sex==1}女{/if}</a>&nbsp;<a>{$v.age}</a>岁</div>
										<div class="clearboth"></div>
									</li>
                               {/foreach}     		
									
									
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			
		</div><!--left end-->
		{include file="common/activity_act_right.tpl"}
		<!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	<!------------------------------------------content-end------------------------------------------>
	<!--------------------------------------------footer--------------------------------------------->
{include file="common/footer.tpl"}
	<!------------------------------------------footer-end------------------------------------------->
</body>
</html>

<script>
$("a[rel=actphotgroup]").fancybox({
				'titlePosition'	: 'inside'
});
</script>