<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 15:40:51
         compiled from "../application/views/member/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1908215114f683483354a48-21857228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '080593f679c54ab07b76f0538079b56c240a25af' => 
    array (
      0 => '../application/views/member/login.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1908215114f683483354a48-21857228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/login.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/register/register.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js" type="text/javascript"></script>
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
	
<?php $_template = new Smarty_Internal_Template("common/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div id="content">
<div class="login">
	<div class="top"></div>
	<div class="clearboth"></div>
	<div class="middle">
		<div class="title"></div>
		<div class="clearboth"></div>
		<div class="bar mg_b"><div></div></div>
		<div class="clearboth"></div>
		<form action="/index.php/member/login/check_member" id="register_form" method="post">
			<label>帐号</label><input type="text" name="username" id="loginusername">
			<div class="clearboth"></div>
			<label>密码</label><input type="password" name="password" id="loginpassword" >
			<div class="clearboth"></div>
			<div class="floatR"><input type="checkbox" id="remember_me">&nbsp;<label for="remember_me">记住我</label>&nbsp;&nbsp;<span class="link">忘记密码?</span></div>
			<div class="clearboth"></div>
			<input type="submit" class="loginBtn" value="">
		</form>
		<div class="clearboth"></div>
		<div class="tips">
			<span>还不是会员?&nbsp;&nbsp;</span><span class="link" onclick="window.location.href='/index.php/member/regist/index'">立即注册，填写资料</span>
		</div>
		<div class="clearboth"></div>
	</div>
	<div class="clearboth"></div>
	<div class="bottom"></div>
	<div class="clearboth"></div>
</div>

<div class="login_right">
	<div class="linebg">
		<div class="welcome">欢迎加入奇遇</div>
		<div class="clearboth"></div>
		<p class="welcometext">
			使用无线技术，随时随地寻找新朋友<br>
			您可以随时交换名片，并在电脑上进行管理<br>
			随时随地享受美妙的音乐<br>
			内置4G内存，随时拷贝资料<br>
		</p>
	</div>
	<div class="clearboth"></div>
	<div class="blog">
		<div class="floatL mg_r"><a><img src="/static/images/testpic.jpg" class="img_L"></a></div>
		<div class="floatL">
			<div class="mg_t mg_b floatL"><a class="floatL name" limit="16">标题标题标题标题</a></div>
			<div class="clearboth"></div>
			<div class="text">内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</div>
		</div>
	</div>
	<div class="blog">
		<div class="floatL mg_r"><a><img src="/static/images/testpic.jpg" class="img_L"></a></div>
		<div class="floatL">
			<div class="mg_t mg_b floatL"><a class="floatL name" limit="16">标题标题标题标题</a></div>
			<div class="clearboth"></div>
			<div class="text">内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</div>
		</div>
	</div>
	
	
	
	<div class="clearboth"></div>
</div>
<div class="clearboth"></div>


</div>
<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</body>
</html>