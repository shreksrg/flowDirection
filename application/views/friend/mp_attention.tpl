<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.favorites.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.myfavorites.js"></script>

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
          <ul class="qy-mpcommonTag-switchTags">
            <li><a href="/index.php/friend/index">我的好友</a></li>
            <li class="cursection"><a href="/index.php/friend/index/attention">我的关注</a></li>
            <li><a href="#">我的奇遇</a></li>
          </ul>
        </div>
        <div class="qy-mpcommon-selAll">
          <input id="selectAll" name="" type="checkbox" value="" />
          全选 <a id="delSelected" href="#">删除所选</a></div>
         
        <ul class="qy-favorites-ListOpt">
        <form id="frmOptions" action="/index.php/friend/index/delete" method="post">
        
        {foreach from=$friend_list item=v key=k}
          <li>
            <input class="chkbox" name="friendId[]" type="checkbox" value="{$v['fuserid']}" />
            <input class="chkbox" name="keyId" type="hidden" value="1" />
            
            <a href="/index.php/member_info/index/uid/{$v['fuserid']}" target="_blank" ><img src="{$v.avatar_img}" class="avatar"></a>
            <div class="favoritedetail">
              <p class="favoritename"><a href="/index.php/member_info/index/uid/{$v['fuserid']}" target="_blank">{$v['fusername']}</a></p>
              <p class="favoritinfo"> {if $v.gender=='0'}男{else}女{/if} {$v.age}岁 {$v.city['city']} {$v.work}</p>
              <p class="favoritdesc">{$v.cut_description}</p>
              <p class="favoriteoper"><a href="/index.php/member/my_email/send_email/{$v['fuserid']}" target="_blank" class="btn-sendto">写信给Ta</a></p>
            </div>
          </li>
        {/foreach}  
       	</form>
        </ul>
        <span class="splite-m1"></span>
        <ul class="qy-common-pageations">
          {$page}
        </ul>
      </div>
    </div>
  </div>
   {include file="common/mp_footer.tpl"}
</div>
</body>
</html>