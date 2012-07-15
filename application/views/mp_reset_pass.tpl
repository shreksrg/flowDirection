<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/register.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>

</head>

<body class="commonbgx">
<div class="qy-register-header">
  <div class="qy-regheader-contain"> <a class="qy-sitelog" href="/index.php"></a> <a class="back" href="/index.php"></a> </div>
</div>
<div class="qy-register-parentCont">
  <div class="qy-register-title">
    <p class="caption">忘记密码</p>
    <p class="subtit">请输入您注册时的邮箱地址，我们将发送密码重置链接到您的邮箱</p>
  </div>
  <div class="qy-register-mainAr" style="height:156px">
    <div class="qy-register-leftPlate">
      <div class="register-addonImg2"/>
    </div>
  </div>
  <form action="/index.php/reset_pass/set" id="frmMailer" method="post">
    <table class="tb-frmlogin" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="72">电子邮件：</td>
        <td><input name="email" type="text" class="GetmailAddr" id="email"  />
          <input type="submit" class="qy-registerSave" value="发送"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td valign="middle" class="tm-link">还没有账号？ <a href="/index.php/member/regist" target="_blank">点击这里注册</a></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td valign="middle" >&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>