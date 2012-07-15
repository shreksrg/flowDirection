<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详情</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myactivity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/myactivity.js"></script>
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
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">广告</div>	
		<div class="clearboth"></div>
				
		<!--活动詳情-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title">我的活动</div>
					<div class="main_menu">
						<ul>
							<li class="act_apply"><a href="/index.php/activity/my_in/index" >我参加的活动</a></li>
							<li class="act_hold" ><a href="/index.php/activity/my_launch/index">我发起的活动</a></li>
							<li class="act_add"><a href="/index.php/activity/index/create">发起活动</a></li>
							<li class="act_watch"><a href="/index.php/activity/my_attention/index" >关注的活动</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<div id="act_detail">
							<div class="title font_text2">活动詳情</div>
							<div class="addactBtn"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth mg_b"></div>
							<div class="act_detail_left floatL">
								<div class="act_name font_text2">活动名称</div>
								<div class="clearboth mg_b">{$info.SUBJECT}</div>
                                <div class="label">活动地区:</div><div class="act_position">{$info.province}-{$info.city}</div>
								<div class="clearboth mg_b"></div>
								<div class="label">活动地點:</div><div class="act_position">{$info.place}</div>
								<div class="clearboth mg_b"></div>
								<div class="label">活动时间:</div><div class="act_date">{$info.times}至{$info.etimes}</div>
                                <div class="clearboth mg_b"></div>
								<div class="label">报名截止时间:</div><div class="act_date">{$info.lasttime|date_format:"%Y/%m/%d"}</div>
								<div class="clearboth mg_b"></div>
								<div class="label">活动类型:</div><div class="act_date">{$info.class}</div>
								<div class="clearboth mg_b"></div>
								<div class="label">费用备注:</div><div class="act_date">{$info.cost}</div>
								<div class="clearboth mg_b"></div>
								<div class="label">支付方式:</div><div class="act_date">{$info.paytype}</div>
								<div class="clearboth mg_b"></div>
								<div class="label">查询电话:</div><div class="act_date">{$info.phone}</div>
								<div class="clearboth mg_b"></div>
							</div>
							<div class="act_detail_right floatR">
								{if isset($info.edit)}<a href="/index.php/activity/index/edit_activity/aid/{$info.aid}" class="act_edit floatR font_text2 udl">编辑活动</a>{/if}
								<div class="clearboth mg_b"></div>
								<div class="floatL">关注人数:<a class="act_watch_count emNum">{$info.hotuserNum}</a>人</div>
								<div class="floatL">&nbsp;&nbsp;报名总数:<a class="act_apply_count emNum">{$info.joinNum}</a>人(男<a class="act_apply_male emNum">{$info.joinmailNum}</a>人，女<a class="act_apply_female emNum">{$info.joinemailNum}</a>人)</div>
								<div class="clearboth mg_b"></div>
								<div class="floatR">距离报名截止日期还剩<a class="act_date_countdown emNum">{$info.dayNum}</a>天<a class="act_date_countdown emNum">{$info.minuteNum}</a>分</div>
								<div class="clearboth mg_b"></div>
								<div class="floatR">
									{if isset($info.invite)}<a id="invitelink" href="/index.php/activity/my_launch/actInvite/aid/{$info.aid}"><div class="inviteBtn"></div></a>{/if}
								</div>
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
							<div class="detail_menu_container mg_b">
								<div class="menutabs">
									<div id="act_detail_intro" class=" menutab selected">活动介紹</div>
									<div class="menutab_block"></div>
									<div id="act_detail_participants" class="menutab">报名会员</div>
								</div>
							</div>
							
							
							<div class="act_detail_intro">
								<div class="act_detail_mainpic floatL mg_r mg_b"><img src="/data/attachment/album/{$thumb}" class="img_2L"></div>
								<div class="act_detail_intro_text floatL">
									<p class="font_text1">{$info.description}</p>
								</div>
								<div class="clearboth"></div>
								<div class="act_detail_pic_list">
                                
                                {foreach from=$pic_list item=v key=k}
									<img src="/data/attachment/album/{$v.filepath}" class="img_S">
								{/foreach}  	
                                    
								</div>								
								<div class="clearboth"></div>							
							</div>
							
							
							
							<div class="act_detail_member">
								<ul>
                                
                                
                                {foreach from=$user_list item=v key=k}
                                	<li>
										<img src="{$v.avatar_img}" class="img_M" onclick="window.location.href='/index.php/member_info/index/uid/{$v.uid}'">
										<div class="clearboth"></div>
										<div class="member_name"><a onclick="window.location.href='/index.php/member_info/index/uid/{$v.uid}'">{$v.username}</a></div>
										<div class="clearboth"></div>
										<div class="member_info"><a>{if $v.sex==0}男{/if}{if $v.sex==1}女{/if}</a>&nbsp;<a>{$v.age}</a>岁</div>
										<div class="clearboth"></div>
									</li>
                               {/foreach}     		
									
								</ul>
								<div class="clearboth"></div>
							</div>								
							<div class="clearboth"></div>
							
							
							
							
						</div>
						<div class="clearboth mg_b"></div>
					</div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>										
		<div class="clearboth"></div>				
		
	</div><!--右方区块結束-->
	<div class="clearboth"></div>
</div>
<!--contentEnd-->
<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>