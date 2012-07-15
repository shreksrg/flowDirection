<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.ablum.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.activityAlbum.js"></script>
{literal}
<script>
$(function(){
	
	$('a.btn-mpupload').click(function(){
		if(!$('input[name=pic]').val()){alert("请选择上传照片");return false} 
		$('form').submit()
	})
})
</script>
{/literal}
<title>奇遇同城 - </title>
</head><body class="commbg">
<div class="qy-parentCont"> {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR"> {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">
      <div class="qy-leaguer-rplateCont">
        <div class="qy-mpcommonTag-headertit"> <b class="qy-mpcommonTag-caption">我的相册</b>
          <ul class="qy-mpcommonTag-switchTags">
            <li><a href="/index.php/album/index">生活相册</a></li>
            <li class="cursection"><a href="/index.php/album/activity_album">活动相册</a></li>
          </ul>
        </div>
      
        <div class="qy-activeablum-cover"> <img class="cover" src="{$activityAlbumInfo.thumb}" /> </div>
        <div class="qy-activeablum-comment"> <b class="bigtips">{$activityInfo.SUBJECT}</b>
          <p class="subtips">{$activityInfo.cut_description}</p>
          <p><strong>{$activityInfo.membernum}</strong> 人参加 | <strong>{$activityAlbumInfo.picnum}</strong> 张照片 | 发起人：<a href="/index.php/member_info/index/uid/{$activityInfo.userid}">{$activityInfo.username}</a></p>
          <p>活动时间：{$activityInfo.times} ~ {$activityInfo.etimes}</p>
          <div class="qy-mpplug-upload">
          <form action="/index.php/album/activity_album/post_activity_photo" method="post" enctype="multipart/form-data">
            <input type="file" name="pic" />
            <input type="hidden" name="albumid" value="{$activityAlbumInfo.albumid}" />
            <div class="spliteDIV"></div>
            <a class="btn-mpupload">上传活动照片</a>
          </form>
          </div>
        </div>
        <span class="splite-m1"></span>
        <div class="qy-mphotos-titlife">活动相片</div>
        <ul class="qy-activeablum-pListOpts">
          {foreach from=$activityPhotoList item=v key=k}
          <li>
            <div class="qy-activeablum-imgcontainer"><a rel="glAlbums" href="{$v.filepath}"><img  src="{$v.filepath}"/></a></div>
            <div class="qy-activeablum-lnkoperate">来自<a href="/index.php/member_info/index/uid/{$v.userid}" class="uploader">{$v.username}</a></div>
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
  {include file="common/mp_footer.tpl"} </div>
</body>
</html>
