<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.inbox.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.messageView.js"></script>

<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
   {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">
     
      <div class="qy-leaguer-rplateCont">
      
        <div class="qy-mpcommonTag-headertit"> <b class="qy-mpcommonTag-caption">交友动态</b>
          <ul class="qy-inbox-switchTags">
             <li><a href="/index.php/member/my_email/index">收件箱</a></li>
            <li class="cursection"><a href="/index.php/member/my_email/get_send_email">发件箱</a></li>
            <li><a href="/index.php/member/my_email/get_admin_send_email">管理员来信</a></li>
          </ul>
        </div>
        <style>
	    </style>
        <div class="qy-inboxV-sender"> <a href="/index.php/member_info/index/uid/{$member_acce_info.userid}" target="_blank"><img class="avater" src="{$urls_2}" /></a>
          <div class="qy-inboxV-senderinfo">
            <p class="sendername"><a href="/index.php/member_info/index/uid/{$member_acce_info.userid}" target="_blank">{$acce_username}</a></p>
            <p class="senderdetail">{if $member_acce_info.gender=='0'}男{else}女{/if} {$member_acce_info.age}岁 {$member_acce_info.city['city']}  {$member_acce_info.work}</p>
            <p class="senderphotos"><span></span>照片(8)</p>
            <p class="btnoperate"><a id="toAttention" class="adder" href="/index.php/friend/index/friend_attention/{$member_acce_info.userid}">加关注</a><a href="/index.php/friend/index/friend_relation/{$member_acce_info.userid}" id="toFavorite" class="adder">加为好友</a><a href="/index.php/member/my_email/set_refuse_email/1/{$member_acce_info.userid}" id="toStoped" class="arrest">阻止发信</a></p>
          </div>
          <span class="splite-m1"></span>
        </div>
        <span class="splite-m1"></span>
        
        <span class="splite-m1"></span>
        <div class="qy-mpmsg-dashline1"></div>
        <style>
        </style>
        <div class="qy-inboxV-reply"> <span class="rightarrow"></span>
          <div class="reply-caption">我对TA说</div>
          <span class="sentmailcont">{$email_info.message}</span>
        </div>
        <img src="/staticx/tmp/avator/avatorreply.jpg" class="qy-mpmsg-myavater" />
        <span class="splite-m1"></span>
        
       
        
      </div>
    </div>
  </div>
 {include file="common/mp_footer.tpl"}
</div>
</body>
</html>