<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/register.css" media="screen" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/demo.tipform.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>奇遇同城 - </title>       
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.register.js"></script>

</head>


<body class="commonbgx">
<div class="qy-register-header">
  <div class="qy-regheader-contain"> <a class="qy-sitelog" href="/index.php"></a> <a class="back" href="/index.php"></a> </div>
</div>
<div class="qy-register-parentCont">
  <div class="qy-register-title">
    <p class="caption">会员注册</p>
    <p class="subtit">欢迎您注册奇遇同城网！我们将为您提供优质的服务，并且保障您信息的隐私不被泄露</p>
  </div>
  <div class="qy-register-mainAr">
    <div class="qy-register-leftPlate">
      <div class="qy-common-caption"> <span class="qy-common-caption-title"><b>填写信息</b></span></div>
      <form action="/index.php/member/regist/save" id="register_form" method="post">				
      <table class="qy-register-form"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>我 &nbsp;&nbsp; 是：</td>
          <td width="18">&nbsp;</td>
          <td><input name="gender" type="radio" value="0"  checked="checked"/>
            男士 &nbsp; &nbsp; &nbsp;
            <input name="gender" type="radio" value="1" />
            女士</td>
        </tr>
        <tr>
          <td>生 &nbsp;&nbsp; 日：</td>
          <td>&nbsp;</td>
          <td><label for="select"></label>
            <input class="Wdate" type="text" id="birthday" name="birthday" onFocus="WdatePicker()"/>
                        <span class="validTip" id="birthdayTip"></span></td>
        </tr>
        <tr>
          <td>学 &nbsp;&nbsp; 历：</td>
          <td>&nbsp;</td>
          <td><select name="edu" id="education">
          {foreach from=$education item=v key=k}
          <option value="{$k}">{$v.education}</option>
          {/foreach}  	
            </select>
            <span class="validTip" id="eduTip"></span>
            </td>
        </tr>
        <tr>
          <td>职 &nbsp;&nbsp; 业：</td>
          <td>&nbsp;</td>
          <td><select name="work" id="career">
          <option value=0>请选择职业</option>
          {foreach from=$career item=v key=k}
          <option value="{$k}">{$v.career}</option>
          {/foreach}       
            </select>
            <span class="validTip" id="careerTip"></span>
            </td>
        </tr>
        <tr>
          <td>所在地区：</td>
          <td>&nbsp;</td>
          <td><label for="select"></label>
                    	<select name="regprovince" id="province">
                    		<option value="0">选择省份</option>
               			</select>
                    	<select name="regcity" id="city">
						<option value="0">选择城市</option>
               		</select>
					<span class="validTip" id="localTip"></span></td>
        </tr>
        
        <tr>
          <td>账户名：</td>
          <td>&nbsp;</td>
          <td><label for="textfield"></label>
            <input type="text" name="username" id="ValidUsername" /><span class="validTip" id="usrTip"></span></td>
        </tr>
        
       
        <tr>
          <td>注册邮箱：</td>
          <td>&nbsp;</td>
          <td><input type="text" name="email" id="Email" /><span class="validTip" id="emailTip"></span></td>
        </tr>
        <tr>
          <td>密 &nbsp;&nbsp; 码：</td>
          <td>&nbsp;</td>
          <td><input type="text" name="password" id="password" /><span class="validTip" id="passwordTip"></span></td>
        </tr>
        <tr>
          <td>确认密码</td>
          <td>&nbsp;</td>
          <td><input type="text" name="again_password" id="confrimpwd" /><span class="validTip" id="confirmpwdTip"></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="terms" type="checkbox" id="terms"  />
           
            我已阅读并接受&quot;服务条款&quot;
            <span class="validTip" id="termsTip"></span>
             </td>
        </tr>
        <tr class="btnsubmit">
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="image" src="/staticx/images/leaguer/btnqylogin.gif" /></td>
        </tr>
      </table>
      </form>	
    </div>
    <div class="qy-register-rightPlate"> <img src="/staticx/tmp/imglogin2.jpg" width="198" height="242" />
      <p class="linklogin">已有奇遇账号? <a href="#">点击登录</a></p>
    </div>
  </div>
  <img class="qy-register-advPositionx1"  src="/staticx/tmp/imglogin1.jpg" width="266" height="164" /> </div>
</body>
</html>