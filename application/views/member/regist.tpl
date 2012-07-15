<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/account.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>


<script src="/static/js/ui/jquery.curvycorners.min.js"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/index.js"></script>
<script src="/static/js/register/register.js"></script>
<!--[if IE 6]>
<script src="/js/iepngfix/belatedPNG.js"></script>
<script src="/js/ui/jquery.ie6hover.js"></script>
<script>
	$(function(){		
		DD_belatedPNG.fix('.png_bg');
		$.ie6hover();
	});
</script>
<![endif]--> 

</head>
<body>

{include file="common/header.tpl"}

<div id="register_container_bg">
	<div id="register">
		<div id="register_bg" class="png_bg"></div>
		<div id="register_title_bg" class="png_bg"></div>
		<div id="register_container">
			<form action="/index.php/member/regist/save" id="register_form" method="post">
				<ul>
					<li><div class="register_label">帐号：</div><input type="text" name="username" id="registusername" class="input_text1" maxlength="20" onblur="check_name()"><div class="checked_icon png_bg" id="registusername_show"></div></li>
					<li><div class="register_label">密码：</div><input type="password" name="password" class="input_text1" maxlength="20"><div class="checked_icon png_bg"></div></li>
					<li><div class="register_label">确认密码：</div><input type="password"  name="again_password"class="input_text1" maxlength="20"></li>
					<li><div class="register_label">邮箱：</div><input type="text" name="email" id="registemail" class="input_text1" onblur="check_email()"><div class="checked_icon png_bg" id="registemail_show"></div></li>
					<li><div class="register_label">昵称：</div><input type="text" name="name" class="input_text1" maxlength="10"></li>
					<li><div class="register_label">所在地区：</div><input type="text" name="regprovince" class="input_text2"><input type="text" class="input_text2" name="regcity"><input type="text" class="input_text2" name="regdist"><input type="text" class="input_text2" name="regcommunity"></li>
					<li><div class="register_label">生日：</div><input type="text" name="birthyear" class="input_text2"><input type="text" name="birthmonth" class="input_text2"><input type="text" name="birthday" class="input_text2"></li>
					<li><div class="register_label">性别：</div><a style="margin-left:5px;"><input type="radio" value="0" name="gender" checked>男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="gender">女</a></li>
					<li><div class="register_label">验证码：</div><input type="text"  class="input_text2" name="verifier"><iframe id="ifame" src="/index.php/member/regist/creat_yzm" scrolling="No" width="120" height="30" marginheight="0" marginwidth="0" frameborder="0"></iframe>&nbsp;&nbsp;<span id="hh" style="cursor:pointer" onClick="document.getElementById('ifame').src='/index.php/member/regist/creat_yzm'">看不清？</span></li>		
				</ul>
				<div class="clearboth"></div>
				<div class="regbtn">
					<button type="submit" class="regbtn"></button>
				</div>				
				<div class="clearboth"></div>
				<div id="privacy">
					<input type="checkbox" name="privacy_check" value="1">
					<h4>
						我已详细阅读过且同意<a>服务条款及隐私权政策</a>。</br>
						我暸解Paliie会不定时透电子邮件通知我有关新好友加入申请、</br>
						Paliie最新消息、网站更新等资讯，我也可以随时取消订阅。</br>
					</h4>
				</div>
			</form>
		</div>
	</div>
</div>

{include file="common/footer.tpl"}

</body>
</html>