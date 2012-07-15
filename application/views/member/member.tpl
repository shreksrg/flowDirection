<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人设置</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mysetting.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/mysetting.js"></script>
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

<div id="content"><!--contentBegin-->
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
					<div class="main_title">个人设置</div>
					<div class="main_menu">
						<ul>
							<li class="selected"><a href="/index.php/member/index/index">我的资料</a></li>
							<li><a href="/index.php/member/set_habits/index">生活习性</a></li>
							<li><a href="/index.php/member/set_interests/index">兴趣爱好</a></li>
							<li><a href="/index.php/member/set_description/index">个人描述</a></li>
							<li><a href="/index.php/member/set_photo/index">生活照展示</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<ul>
							<li class="data selected">
								<div class="title">基本资料</div>
								<div class="edit font_text2"><a href="/index.php/member/index/update">编缉</a></div>
								<div class="clearboth"></div>
								<div class="bar"><div></div></div><div class="clearboth"></div>
								<div class="label">PALIIE ID:</div><div class="text"><a>{$member.userid}</a></div><div class="clearboth"></div>
								<div class="label">昵称:</div><div class="text"><a>{if $member_profile.nickname==''}未填写{else}{$member_profile.nickname}{/if}</a></div><div class="clearboth"></div>
								<div class="label">性别:</div><div class="text"><a>{if $member_profile.gender==0}男{else}女{/if}</a></div><div class="clearboth"></div>
								<div class="label">生日:</div><div class="text"><a>{$member_profile.birthyear}-{$member_profile.birthmonth}-{$member_profile.birthday}</a></div><div class="clearboth"></div>
								<div class="label">身高:</div><div class="text"><a>{if $member_profile.height==''}未填写{else}{$member_profile.height}cm{/if}</a></div><div class="clearboth"></div>
								<div class="label">体重:</div><div class="text"><a>{if $member_profile.weight==''}未填写{else}{$member_profile.weight}kg{/if}</a></div><div class="clearboth"></div>
								<div class="label">所在地区:</div><div class="text"><a>{$member_profile.regprovince}-{$member_profile.regcity}</a></div><div class="clearboth"></div>
								<div class="label">感情状况:</div><div class="text"><a>{if $member_profile.marital==''}未填写{else}{$member_profile.marital}{/if}</a></div><div class="clearboth"></div>
								<div class="label">民族:</div><div class="text"><a>{if $member_profile.nation==''}未填写{else}{$member_profile.nation}{/if}</a></div><div class="clearboth"></div>
								<div class="clearboth"></div>
								<div class="title">联系方式</div>
								<div class="clearboth"></div>
								<div class="bar mg_b"><div></div></div>
								<div class="clearboth"></div>
								<div class="label">注册邮箱:</div><div class="text"><a>{$member.email}</a></div><div class="clearboth"></div>
								<div class="label">手机号:</div><div class="text"><a>{if $member_profile.mobile==''}未填写{else}{$member_profile.mobile}{/if}</a></div><div class="clearboth"></div>
								<div class="label">QQ:</div><div class="text"><a>{if $member_profile.qq==''}未填写{else}{$member_profile.qq}{/if}</a></div><div class="clearboth"></div>
								<div class="btn_container">
									<div class="save btn"></div>
									<div class="cancel btn"></div>
								</div>
							</li>
							
						</ul>
					</div>
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
			
			
		</div>
	</div>
	<div class="clearboth"></div>
</div><!--contentEnd-->
<!--footerBegin-->

{include file="common/footer.tpl"}

<!--footerEnd-->
</div>
</body>
</html>