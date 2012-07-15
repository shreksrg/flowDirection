<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改名片信息</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mycard.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
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
					<div class="main_title">Paliie名片夾</div>
					<div class="clearboth"></div>
					<div class="title font_text2"><a href="/index.php/member/my_card/index">Paliie名片夾</a>&nbsp;&nbsp;&nbsp;<a href="/index.php/member/my_card/create">新增通讯录成员</a></div>
					<div class="clearboth"></div>
					<div class="bar mg_b"><div></div></div>
					<div class="clearboth"></div>
                    
                    <form action="/index.php/member/my_card/edit_card_info_act" method="post" enctype="multipart/form-data">
					<div class="user_info_container mg_b">
						<div class="info_L floatL mg_r">
							<img src="{$avatar_img}" class="img_XL mg_b">
							<div class="clearboth"></div>
							<div class="label">Paliie ID:</div><a class="text">{$card_info.userid}</a>
						</div>
						<div class="info_M floatL mg_r">
							<div class="label">真實姓名:</div><input type="text" name="realname" id="loginusername" class="input_text" value="{$card_info.realname}"><div class="clearboth"></div>
							<div class="label">職位:</div><input type="text" name="job" id="loginusername" class="input_text" value="{$card_info.job}"><div class="clearboth"></div>
							<div class="label">公司名稱:</div><input type="text" name="company" id="loginusername" class="input_text" value="{$card_info.company}"><div class="clearboth"></div>
							<div class="label">移動電話:</div><input type="text" name="mobile" id="loginusername" class="input_text" value="{$card_info.mobile}"><div class="clearboth"></div>
							<div class="label">辦公電話:</div><input type="text" name="phone" id="loginusername" class="input_text" value="{$card_info.phone}"><div class="clearboth"></div>
							<div class="label">電子郵件:</div><input type="text" name="email" id="loginusername" class="input_text" value="{$card_info.email}"><div class="clearboth"></div>
							<div class="label">網址:</div><input type="text" name="homepage" id="loginusername" class="input_text" value="{$card_info.homepage}"><div class="clearboth"></div>
							<div class="label">郵编:</div><input type="text" name="zippost" id="loginusername" class="input_text" value="{$card_info.zippost}"><div class="clearboth"></div>
						</div>
						<div class="info_R floatR rel">
							<div class="label">業務描述:</div>
							<div class="clearboth"></div>
							<p class="mg_l"><textarea cols="18" rows="6" name="description">{$card_info.description}</textarea></p>
							<div class="clearboth mg_b"></div>
							<div class="btns abs">
								
								<button type="submit" class="save2deviceBtn btnbg floatL"></button>
							</div>
						</div>
						<div class="clearboth mg_b"></div>
					</div>
                    <input type="hidden" value="{$card_info.cardid}" name="cardid" />
                    
					</form>
					
					
					
					
					
					<div class="clearboth"></div>
				</div><!--container end-->
				
				
				
				<div class="clearboth"></div>
			</div><!--middle end-->
			
			
			
			
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