<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.ablum.css" type="text/css" rel="stylesheet">
<link href="/staticx/css/QYcommunity/avatarEditer.css" type="text/css" rel="stylesheet" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.lifeAlbum.js"></script>
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
            <li class="cursection">生活相册</li>
            <li><a href="/index.php/album/activity_album">活动相册</a></li>
          </ul>
        </div>
        <div class="qy-mphotos-titavator">我的形象照</div>
        <div class="qy-mphotos-avater">
          <div class="qy-mpavator-container"><img class="avator" src="{$avatar_img}" /><span class="Auditing">审核中</span></div>
          <span class="link-update"><a href="/index.php/album/iEdit/set_avatar">更新头像</a></span> </div>
        <div class="qy-mphotos-uploads"> <b class="bigtips">有照片的会员，更能受到其他会员的关注哦！</b>
          <p class="subtips">图片必须小于1MB,并仅支援png、jpg和gif(无动画)格式<br />
            您可以上传新的图片取代现有个人形象照<br />
            被取代的形象照会自动移至您形象照相册中<br />
            越清楚的照片能越有效让奇遇会员注意到你哦</p>
          <div class="qy-mpplug-upload">
            <input id="filePhoto_" name="fileAvatar_" type="file" />
            <a class="btn-mpupload" style="display:none">上传照片</a> </div>
        </div>
        <span class="splite-m1"></span>
        <div class="qy-mphotos-titlife">我的生活照</div>
        <ul class="qy-mphotos-pListOpts">
        
        {foreach from=$myPhotoList item=v key=k}
          <li>
            <div class="qy-mphoto-imgcontainer"><a rel="glAlbums" href="{$v.filepath}"><img src="{$v.filepath}" /></a></div>
            <div class="qy-mphotos-lnkoperate">
              <input name="pid" type="hidden" value="{$v.picid}" />
              <a class="unsee">隐藏</a><a class="cannel">删除</a><a  class="setavator" href="/index.php/album/iEdit/index/img_url_code/{$v.img_url_code}">设为形象照</a></div>
          </li>
         {/foreach}     
        </ul>
      </div>
    </div>
  </div>
{include file="common/mp_footer.tpl"}
</div>
</body>
</html>
<script>

</script>