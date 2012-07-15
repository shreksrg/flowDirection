<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myfriend.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/ui.core.js"></script>
<script src="/static/js/ui/jquery.blockUI.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/myfriend.js"></script>
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
					<div class="main_title floatL">我的聯絡人</div>
					<div class="main_menu floatL">
						<ul>
							<li class="myfriend" onclick="location.href='/index.php/friend/index'">我的朋友</li>
							<li class="friend_watch selected"  onclick="location.href='/index.php/friend/index/attention'">我關注的</li>
							<!--<li class="blacklist {if $title=='黑名单'}selected {/if}"  onclick="location.href='/index.php/friend/index/index/6'">黑名單</li>-->
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
					
					
						<!--我的朋友-->
						<div id="friend">
							<div class="title font_text2">{$title}</div>
							<div class="bar"><div></div></div>
							<div class="clearboth mg_b"></div>
							
							<div class="toolbar">
								<div class="manage floatL">
									<input class="selectall" name="selectall" type="checkbox" onclick="select_all($(this));" >
									<a>全选｜</a>
									<a class="delete udl"  onclick="delete_all('1')">删除</a>
								</div>							
								<div class="sort floatR">
									<div class="sort_btn">
										<div class="sort_text">排列</div>
										<div class="sort_arrow"></div>
									</div>
									<div class="sort_container">
										<div class="bg1">
											<div class="name sort_by" onclick="window.location.href='/index.php/friend/index/attention/username'" >名字</div>
											<div class="area sort_by" onclick="window.location.href='/index.php/friend/index/attention/regcity'" >地區</div>
											<div class="gender sort_by" onclick="window.location.href='/index.php/friend/index/attention/gender'" >性別</div>
											<div class="age sort_by" onclick="window.location.href='/index.php/friend/index/attention/birthyear'" >年齡</div>
										</div>
										<div class="bg2"></div>
									</div>
								</div>
							</div>
							<div class="friendlist">
								<ul>
								  {foreach from=$attention_list item=v key=k}
									<li>
										<div class="friend_check floatL"><input type="checkbox" value="{$v['fuserid']}"></div>
										<div class="friend_img floatL" ><a href="/index.php/member_info/index/uid/{$v['fuserid']}" target="_blank" ><img src="{$v.avatar_img}" class="img_S"></a></div>
										<div class="friend_info floatL" onclick="window.location.href='/index.php/member_info/index/uid/{$v['fuserid']}'">
											<a href="/index.php/member_info/index/uid/{$v['fuserid']}" target="_blank" class="font_title">{if $v['nickname']==''}{$v['username']}{else}{$v['nickname']}{/if}</a>
											<div class="clearboth"></div>
											<div class="friend_age floatL mg_r">{$years-$v['birthyear']}岁</div>
											<div class="friend_area floatL">{$v['regprovince']}</div>
										</div>
									</li>
								{/foreach}
								</ul>
							</div>
							<div class="clearboth"></div>
                            
                            <div class="pages">
								{$page}
							</div>
						</div>
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
<script src="/static/js/blog/friend_index.js"></script>