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

<!--[if IE 6]>
<script src="/js/iepngfix/belatedPNG.js"></script>
<script src="/js/ui/jquery.ie6hover.js"></script>
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
							<li  onclick="location.href='/index.php/member/index/info'">我的资料</li>
							<li  onclick="location.href='/index.php/member/set_habits/index'">生活习性</li>
							<li onclick="location.href='/index.php/member/set_interests/index'">兴趣爱好</li>
							<li  class="selected"  onclick="location.href='/index.php/member/set_description/index'">个人描述</li>
							
							
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
                    
                    
                    <form action="/index.php/member/set_description/update"  method="post" enctype="multipart/form-data">
					<div class="content">
						<ul>
							
				
							<li class="introduction">
								<div class="title">个人描述</div>
								<div class="edit font_text2">&nbsp;</div>
								<div class="clearboth"></div>
								<div class="bar"><div></div></div><div class="clearboth"></div>
								<div class="text">
                                
                                <textarea cols="90" rows="20" name="description">{$member_profile.description}</textarea>
                                </div><div class="clearboth"></div>
								<div class="btn_container">
									<div class="save btn"></div>
									<div class="cancel btn"></div>
								</div>
							</li>
						</ul>
					</div>
                     <input type="hidden" value="{$member_profile.userid}" name="member_id" />
                    <button type="submit" class="saveBtn"></button>
                    </form>
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