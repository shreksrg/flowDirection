<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/leaguer.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.leaguer.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    
    {include file="common/mp_left.tpl"}
    
    <div class="qy-leaguer-rightPlate">
      <div class="qy-leaguer-summary">
        <div class="qy-leaguer-summary-avatar"> <img src="{$left_data.avatar_small_img}" /> <span class="linkupdateAva"><a href="/index.php/album/iEdit/set_avatar">更新头像</a></span> </div>
        <div class="qy-leaguer-summary-basic">
          <p class="usrID"><b>{$center_data.user_name}  (PID:{$center_data.user_id})</b></p>
          <p>新邮件：(<a href="/index.php/member/my_email/index"><strong>{$left_data.email_num}</strong></a>)封             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 积分：(<strong>{$member.credits}</strong>)</p>
          <p class="icon-level">会员身份：</p>
          <p class="usr-certification"><font>认证状态：</font> {if $member.emailstatus=='0'}<span class="icon-mail"></span>{/if}{if $member.telestatus=='0'}<span class="icon-mobile"></span>{/if}{if $member.cardstatus=='0'}<span class="icon-ids"></span>{/if}{if $member.viewstatus=='0'}<span class="icon-video"></span>{/if}</p>
         
          <p class="icon-docext"><span class="icon-editer"><a href="/index.php/member/index/info">编辑注册资料</a></span> <span class="icon-preview"><a href="/index.php/member_info/index/uid/{$center_data.user_id}">预览我的资料</a></span></p>
          <p class="icon-btngroup">
          	<a href="/index.php/blog/map/add" class="btn-newStory"></a>
            <a href="/index.php/activity/index/create" class="btn-newActive"></a>
          </p>
        </div>
        <div class="qy-leaguer-summary-advPosition">广告位</div>
        <span class="splite-m1"></span> </div>
      <div class="qy-leaguer-oLists">
        <div class="qy-leaguer-oLists-colum1">
          <div class="qy-leaguer-oLists-colum1-caption"><b>今日推荐</b><span><a style="display:none" href="#">更多</a></span></div>
          <ul class="qy-leaguer-oLists-avatar">
          
          {foreach from=$center_data.members_list item=v key=k}
            <li><a href="/index.php/member_info/index/uid/{$v.userid}"><img src="{$v.avatar_img}" />{$v.username}</a></li>
          {/foreach}   
            
          </ul>
        </div>
        <div class="qy-leaguer-oLists-colum2">
          <div class="qy-leaguer-oLists-colum1-caption"><b>我的奇遇</b><span><a href="#">更多</a></span></div>
          <ul class="qy-leaguer-oLists-avatar2">
            <li><img /></li>
            <li><img /></li>
            <li><img /></li>
            <li><img /></li>
            <li><img /></li>
            <li><img /></li>
            <li><img /></li>
            <li><img /></li>
          </ul>
        </div>
      </div>
      <div class="qy-leaguer-oLists">
        <div class="qy-leaguer-oLists-colum1">
          <div class="qy-leaguer-oLists-colum1-caption"><b>可能感兴趣的活动</b><span><a style="display:none" href="#">更多</a></span></div>
          <ul class="qy-leaguer-oLists-avatar1">
            
            {foreach from=$center_data.activity_list item=v key=k}
            <li><a href="/index.php/browse_act/detail/id/{$v.aid}"><img src="/data/attachment/album/{$v.thumb}" />{$v.cut_subject}</a></li>
          {/foreach}   
            
          </ul>
        </div>
        <div class="qy-leaguer-oLists-colum2">
          <div class="qy-leaguer-oLists-colum1-caption"><b>关注我的人</b><span><a style="display:none" href="#">更多</a></span></div>
          <ul class="qy-leaguer-oLists-avatar2">
           
           {foreach from=$center_data.attention_members_list item=v key=k}
            <li><a href="/index.php/member_info/index/uid/{$v.buserid}"><img src="{$v.avatar_img}" /></a></li>
           {/foreach}   
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"}
  
</div>
</body>
</html>