<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>更改密碼</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypassword.css" type="text/css" rel="stylesheet">

<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
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
					<div class="main_title" class="floatL ">更改密碼</div>
					<div class="clearboth"></div>
					<div class="content">										
						<div class="title font_text2 mg_b">更改密碼</div>
						<div class="bar"><div></div></div>	
						<div class="clearboth"></div>
						<div class="mg_t mg_l">
							請使用英文字母家數字或符號的組合密碼<br>
							為了您帳號的安全，建議每隔一段時間更新一次密碼<br>
							請不要使用與登錄郵箱相同的密碼<br>
							同時盡量避免使用您的個人信息作為密碼內容，如生日，手機號碼等<br>
						</div>						
						<div class="clearboth"></div>
                        
                        <form action="/index.php/member/set_password/update_password" id="register_form" method="post">
						<div class="input_container">
							<div class="input_label">舊密碼:</div><input type="password" name="old_pass">
							<div class="clearboth mg_b"></div>
							<div class="input_label">新密碼:</div><input type="password" name="new_pass">
							<div class="clearboth mg_b"></div>
							<div class="input_label">密碼確認:</div><input type="password" name="r_new_pass">
							<div class="clearboth mg_b"></div>
							<div class="msg">密碼一經更改後，舊密碼立即無法使用，若會員忘記新密碼，請與<a>奇遇客服人員</a>聯繫</div>
							<div class="clearboth"></div>
						</div>
                        <input type="hidden" value="{$member_id}" name="member_id" />
                        <button type="submit" class="confirmBtn"></button>
                        </form>
                        
						<div class="clearboth"></div>
						<div class="borderbtm"></div>
						<div class="clearboth mg_b"></div>
						<div class="clearboth mg_b"></div>
						
						
						
						
						
					</div>
					<div class="clearboth mg_b"></div>
						
						
						
						
						
					<!--內文end-->
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