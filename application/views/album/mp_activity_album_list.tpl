<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.active.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.mpcommon.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">
      <div class="qy-leaguer-rplateCont">
        <div class="qy-mpcommonTag-headertit"> <b class="qy-mpcommonTag-caption">我的相册</b>
          <ul class="qy-mpcommonTag-switchTags">
            <li><a href="/index.php/album/index">生活相册</a></li>
            <li class="cursection">活动相册</li>
          </ul>
        </div>
        <ul class="qy-mpactive-ListOpt qmal-fixmargintop">
        
        {foreach from=$activity_album_list item=v key=k}
          <li> <a href="#"><img class="qy-mpactive-cover" src="{$v.thumb}" /></a>
            <div class="qy-mactive-detail">
              <p class="mactive-title">{$v.albumname}</p>
              <p class="mactive-counts">{$v.description}</p>
              <p class="mactive-counts">相片({$v.picnum}) <span class="mactive-oper" style="display:none"><a href="/index.php/album/activity_album/activity_photo_list/{$v.albumid}">>>进入活动相册</a></span></p>
            </div>
          </li>
         {/foreach}    
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
