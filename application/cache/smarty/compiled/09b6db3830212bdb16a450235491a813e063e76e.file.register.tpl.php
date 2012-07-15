<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 15:22:26
         compiled from "../application/views/member/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15771670044f683032dcffa0-64754584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09b6db3830212bdb16a450235491a813e063e76e' => 
    array (
      0 => '../application/views/member/register.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15771670044f683032dcffa0-64754584',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/index.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/static/js/layout/header.js" type="text/javascript"></script>
<script src="/static/js/register/register.js" type="text/javascript"></script>
<script src="/static/js/pca.js" type="text/javascript"></script>
<script src="/static/js/ymd.js" type="text/javascript"></script>

</head>
<body>
<?php $_template = new Smarty_Internal_Template("common/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div id="content">
    
    
    <div id="register">		
	<div id="register_bg" class="png_bg"></div>		
	<div id="register_title_bg" class="png_bg"></div>		
	<div id="register_container">			
		<form action="/index.php/member/regist/save" id="register_form" method="post">				
			<ul>					
			<li>
				<div class="register_label">帐号：</div><input type="text" name="username" id="registusername" class="input_text1" maxlength="20" onblur="check_username()">
				<div class="checked_container" id="registusername_show"></div><input type="hidden" id="registusername_hidden_id">
			</li>					
			<li>
				<div class="register_label">密码：</div><input type="password" id="registpass" onblur="check_pass()" name="password" class="input_text1" maxlength="20">
				<div id="registpass_show" class="checked_container"></div>
			</li>					
			<li>
				<div class="register_label">确认密码：</div><input type="password" id="registrepass" onblur="check_re_pass()" name="again_password" class="input_text1" maxlength="20">
				<div id="registrepass_show" class="checked_container"></div>
			</li>					
			<li>
				<div class="register_label">邮箱：</div><input type="text" name="email" id="registemail" class="input_text1" onblur="check_email()">
				<div class="checked_container" id="registemail_show"></div><input type="hidden" id="registemail_hidden_id">
			</li>					
			<li>
				<div class="register_label">昵称：</div><input type="text" onblur="check_name()" id="registname" name="name" class="input_text1" maxlength="10">
				<div class="checked_container" id="registname_show"></div>
			</li>
			<li>
				<div class="register_label">所在地区：</div><div class="select_container">
					<select onchange="changepro('city2','city1')" id="city1" name="regprovince">
						<option selected="" value="">省/直辖市</option>
						<option value="北京市">北京市</option>
						<option value="天津市">天津市</option>
						<option value="河北省">河北省</option>
						<option value="山西省">山西省</option>
						<option value="内蒙古区">内蒙古区</option>
						<option value="辽宁省">辽宁省</option>
						<option value="吉林省">吉林省</option>
						<option value="黑龙江省">黑龙江省</option>
						<option value="上海市">上海市</option>
						<option value="江苏省">江苏省</option>
						<option value="浙江省">浙江省</option>
						<option value="安徽省">安徽省</option>
						<option value="福建省">福建省</option>
						<option value="江西省">江西省</option>
						<option value="山东省">山东省</option>
						<option value="河南省">河南省</option>
						<option value="湖北省">湖北省</option>
						<option value="湖南省">湖南省</option>
						<option value="广东省">广东省</option>
						<option value="广西区">广西区</option>
						<option value="海南省">海南省</option>
						<option value="重庆市">重庆市</option>
						<option value="四川省">四川省</option>
						<option value="贵州省">贵州省</option>
						<option value="云南省">云南省</option>
						<option value="西藏区">西藏区</option>
						<option value="陕西省">陕西省</option>
						<option value="甘肃省">甘肃省</option>
						<option value="青海省">青海省</option>
						<option value="宁夏区">宁夏区</option>
						<option value="新疆区">新疆区</option>
						<option value="台湾省">台湾省</option>
						<option value="香港特区">香港特区</option>
						<option value="澳门特区">澳门特区</option>
					</select>&nbsp;&nbsp;
					<select onchange="check_area()" id="city2" name="regcity">
						<option value="">请选择城市</option>
					</select>
				</div>
				<div class="checked_container" id="registarea_show"></div>
			</li>                   
			<li>
				<div class="register_label">生日：</div><div class="select_container"><select onchange="year(this.value)" id="birthyear" name="birthyear"><?php echo $_smarty_tpl->getVariable('year')->value;?>
</select>&nbsp;&nbsp;-&nbsp;&nbsp;
					<select onchange="month(this.value)" id="birthmonth" name="birthmonth">undefined<option value="1">1月</option><option value="2">2月</option><option value="3">3月</option><option value="4">4月</option><option value="5">5月</option><option value="6">6月</option><option value="7">7月</option><option value="8">8月</option><option value="9">9月</option><option value="10">10月</option><option value="11">11月</option><option value="12">12月</option></select>&nbsp;&nbsp;-&nbsp;&nbsp;<select id="birthday" name="birthday">undefined<option value="1">1日</option><option value="2">2日</option><option value="3">3日</option><option value="4">4日</option><option value="5">5日</option><option value="6">6日</option><option value="7">7日</option><option value="8">8日</option><option value="9">9日</option><option value="10">10日</option><option value="11">11日</option><option value="12">12日</option><option value="13">13日</option><option value="14">14日</option><option value="15">15日</option><option value="16">16日</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option><option value="20">20日</option><option value="21">21日</option><option value="22">22日</option><option value="23">23日</option><option value="24">24日</option><option value="25">25日</option><option value="26">26日</option><option value="27">27日</option><option value="28">28日</option><option value="29">29日</option><option value="30">30日</option><option value="31">31日</option></select>
				</div>
			
			</li>					
			<li>
				<div class="register_label">性别：</div><a style="margin-left:5px;"><input type="radio" value="0" name="gender" checked="">&nbsp;男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="1" name="gender">&nbsp;女</a>
			</li>					
			<li>
				<div class="register_label">验证码：</div><input type="text" onblur="check_verifier()" id="verifier" class="input_text2" name="verifier">
				<div id="hh" style="cursor:pointer;"></div><div class="checked_container" id="registverifier_show"></div>
				<input type="hidden" id="registverifier_hidden_id">
			</li>				
		</ul>				
		<div class="clearboth"></div>				
		<div align="center" class="mg_t mg_b">					
			<button onclick="return check_regist()" type="button" class="regBtn"></button>				
		</div>			
		<div class="clearboth"></div>				
		<div id="privacy">					
			<input type="checkbox" id="privacy_check" name="privacy_check" checked>					
			<h4>我已详细阅读过且同意<a>服务条款及隐私权政策</a>。<br>我了解Paliie会不定时透电子邮件通知我有关新好友加入申请、<br>	Paliie最新消息、网站更新等资讯，我也可以随时取消订阅。<br></h4>				
		</div>				
		<div class="clearboth"></div>			
	</form>			
	<div class="clearboth"></div>		
	</div>		
	<div class="clearboth"></div>	
</div>

		<div class="clearboth"></div>
	</div>
	<div class="clearboth"></div>
<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</body>
</html>