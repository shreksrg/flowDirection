<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我发起的活动</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myactivity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

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
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">廣告</div>	
		<div class="clearboth"></div>
		
		<!--內文-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title">我的活動</div>
					<div class="main_menu">
						<ul>
							<li class="act_apply"><a href="/index.php/activity/my_in/index"  >我参加的活动</a></li>
							<li class="act_hold selected"><a href="/index.php/activity/my_launch/index" class="selected">我发起的活动</a></li>
							<li class="act_add"><a href="/index.php/activity/index/create">发起活动</a></li>
							<li class="act_watch"><a href="/index.php/activity/my_attention/index" >关注的活动</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
		
        
        				<form action="" method="get" enctype="multipart/form-data" name="form2">
						<!--發起的活動-->
						<div id="act_hold">
							<div class="title font_text2">我發起的活動</div>
							<div class="addactBtn"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="toolbar">
								<div class="manage floatL">
									<input class="selectall"  type="checkbox">
									<a>全选｜</a>
									<a class="delete" onclick="delete_act()">删除</a>
								</div>							
								<!--<div class="sort floatR">
									<div class="sort_btn">
										<div class="sort_text">排列</div>
										<div class="sort_arrow"></div>
									</div>
									<div class="sort_container">
										<div class="bg1">
											<div class="actDate sort_by">參加日期</div>
											<div class="actTitle sort_by">活動名稱</div>
											<div class="actStatus sort_by">進行狀態</div>
										</div>
										<div class="bg2"></div>
									</div>
								</div>-->
							</div>
							<div class="actlist">
								<ul>
                                
                                
                                {foreach from=$list item=v key=k}
									<li>
										<div class="act_check floatL"><input type="checkbox" id="id" name="id[]" value="{$v.aid}"></div>
										<!--<div class="act_status floatL running"></div>活動進行狀態-->
                                        {if ($v.status=='0')}<div class="act_status floatL applying"></div>{/if}
                                        {if ($v.status=='1')}<div class="act_status floatL close"></div>{/if}
                                        {if ($v.status=='2')}<div class="act_status floatL over"></div>{/if}
										<div class="act_img floatL" onclick="window.location.href='/index.php/browse_act/detail/id/{$v.aid}'"><img src="/data/attachment/album/{$v.logo}" class="img_S"></div>
										<div class="act_info floatL">
											<div class="act_name font_title" onclick="window.location.href='/index.php/browse_act/detail/id/{$v.aid}'">{$v.SUBJECT}</div>
											<div class="clearboth"></div>
											<div class="floatL">參加人數:</div><div class="act_applyNum floatL">{$v.membernum}</div>
											<div class="clearboth"></div>
											<div class="floatL">报名截止日期:</div><div class="act_Date floatL">{$v['lasttime']|date_format:"%Y/%m/%d"}</div>
										</div>
										<div class="act_interactive floatR">
											<div class="act_detail floatL font_text2 udl mg_r" onclick="window.location.href='/index.php/activity/index/edit_activity/aid/{$v.aid}'" style="cursor:pointer;">编辑活动</div>
											{if ($v.status=='0')}<div class="act_close floatL udl mg_r" onclick="shut_act('{$v.aid}','1')">關閉活動</div>{/if}
                                            {if ($v.status=='1')}<div class="act_close floatL udl mg_r" onclick="shut_act('{$v.aid}','0')">开启活動</div>{/if}
											<div class="floatL font_text1">發表於</div><div class="act_postDate floatL font_text1">{$v['dateline']|date_format:"%Y/%m/%d"}</div>
										</div>
										<div class="clearboth"></div> 
									</li>
								 {/foreach}  	
									
									
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
                        </form>
                        
                        
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
</html>