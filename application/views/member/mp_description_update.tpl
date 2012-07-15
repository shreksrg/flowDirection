<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.persetting.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.setting-desc.js"></script>
<title>奇遇同城 - </title>
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
            <li><a href="/index.php/member/index/info">基本资料</a></li>
            <li> <a href="/index.php/member/set_interests/index">兴趣爱好</a></li>
            <li class="cursection">个人独白</li>
          </ul>
        </div>
       
        <div class="qy-persetting-archives">
          <form method="post" class="frm-Persetting" id="frmSetting"  action="/index.php/member/set_description/update" >
            <h2 class="qy-persetting-optcaption">个人描述</h2>
            <textarea class="textarea-desc" id="describing" name="description" cols="" rows="">{$member_profile.description}</textarea>
            <h2 class="qy-persetting-optcaption">交友心情</h2>
            <textarea class="textarea-desc" id="mood" name="mood" cols="" rows="">{$member_profile.mood}</textarea>
            <input type="hidden" value="{$member_profile.userid}" name="member_id" />
            <input type="submit" class="qy-persetting-btnSubmit" value="" />
          </form>
        </div>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"}
</div>
</body>
</html>
