<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mymail.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/common.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/mymail.js"></script>
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
					<div class="main_title floatL">我的信箱</div>
					<div class="main_menu floatL">
						<ul>
							<li class="" onclick="location.href='/index.php/member/my_email/index'">奇遇信箱<a>(</a><a id="mailcount" class="emNum">{$email_num}</a><a>)</a></li>
							<li class="" onclick="location.href='/index.php/member/my_email/get_admin_send_email'">管理员通知<a>(</a><a id="msgcount" class="emNum">{$admin_email_num}</a><a>)</a></li>
							<li class="selected" onclick="location.href='/index.php/member/my_email/get_send_email'">发件箱<a>(</a><a id="msgcount" class="emNum">{$send_email_num}</a><a>)</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<!--我的信箱-->
						<div id="mail_detail">
							<div class="title">&nbsp;</div>
							
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="info_container">
								<div class="floatL">
									<a><img src="{$urls_2}" class="img_M"></a>
								</div>
								<div class="floatL">
                                <input type="hidden" id="friendId" value="{$member_acce_info.userid}" />
			                    <input type="hidden" id="friendName" value="{$member_acce_info.username}" />
									<a class="sender">{$acce_username}</a>
									<div class="clearboth"></div>
									<div class="sender_info">{$member_acce_info.age} {$member_acce_info.education} {$member_acce_info.regprovince}-{$member_acce_info.regcity}</div>
									<div class="clearboth"></div>
									<div class="btns">
										<a class="addwatchBtn"></a>
										<a class="addfriendBtn"></a>
									</div>
								</div>
								<div class="floatR">{$email_info.dateline|date_format:"%Y/%m/%d"}</div>
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="clearboth"></div>
							<div class="floatR">
								<div class="floatL mg_l">
									<!--<a class="reportBtn"></a>-->
									<div class="clearboth mg_b"></div>
									<span id="banmailBtnshow" {if $email_refuse==1}style="display:none"{/if}><a class="banmailBtn" onclick="set_refuse_email('1','{$member_acce_info.userid}')"></a></span>
                                    <span id="reportBtnshow" {if $email_refuse==0}style="display:none"{/if}><a class="reportBtn" onclick="set_refuse_email('2','{$member_acce_info.userid}')"></a></span>
								</div>
								<div class="mail_content floatL">
									{$email_info.message}
								</div>
							</div>
							
							
							<div class="clearboth"></div>
                            
                          
							
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
		<!--end-->

		
	</div>
	<div class="clearboth"></div>
</div>
<!--contentEnd-->
<!--footerBegin-->
<?php 
	include_once("layout/footer.php");
?>
<!--footerEnd-->
</div>
</body>
</html>