<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.persetting.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.setting-modpwd.js"></script>
<title>无标题文档</title>
</head>

<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">
      <div class="qy-leaguer-rplateCont">
        <div class="qy-mpcommonTag-headertit"> <b class="qy-mpcommonTag-caption">我的资料</b>
          <ul class="qy-mpcommonTag-switchTags">
            <li class="cursection">基本资料</li>
            <li><a href="/index.php/member/set_interests/index">兴趣爱好</a></li>
            <li><a href="/index.php/member/set_description/index">个人独白</a></li>
          </ul>
        </div>
        
        <div class="qy-persetting-archives">
         
            <h2 class="qy-persetting-optcaption">更改密码</h2>
            <form method="post" class="frm-Persetting" id="frmModpwd" action="/index.php/member/set_password/update_password" >
            <table  class="tb-modifypwd" border="0" cellspacing="0" cellpadding="0">
             
             <tr>
                <td width="88">旧 密 码：</td>
                <td><input  name="old_pass" type="password" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="88">新 密 码：</td>
                <td><input id="password" name="new_pass" type="password" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>确认密码：</td>
                <td><input id="confirmpwd" name="r_new_pass" type="password" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="hidden" value="{$member_id}" name="member_id" /></td>
                <td  valign="top"><input type="submit" class="qy-btnSubmit2" style="margin-top:12px"  value="保存修改"/></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            </form>
           
            
          
        </div>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"}
</div>
</body>
</html>
