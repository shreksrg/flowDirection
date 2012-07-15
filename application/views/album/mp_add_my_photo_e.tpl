<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.ablum.css" type="text/css" rel="stylesheet">
<link href="/staticx/css/QYcommunity/avatarEditer.css" type="text/css" rel="stylesheet" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script type="text/javascript" src="/staticx/js/avatarEdit/avatorEdit.xi.js"></script>
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
            <li><a href="m_activeAblum.php">活动相册</a></li>
          </ul>
        </div>
        <div class="qy-mphotos-uploads"> <b class="bigtips">上传提示！</b>
          <p class="subtips"> 1.可上传个性图片作为你个人头像，宽度不大于110，高度不大于110，300K以内<br />
            2.支持jpg，jpeg，png，gif多种格式，不超过5M就能成功上传！<br />
            3.形象照上传后，12小时内会为您审核完毕~审核期间不影响功能使用~<br />
          </p>
          <div class="qy-mpplug-upload">
            <input id="fileAvatar_" name="fileAvatar_" type="file" />
          </div>
        </div>
        <span class="splite-m1"></span>
        <div id="avatarEditdiv" style="display:none">
          <div class="qy-mphotos-titlife">编辑形象照</div>
          <div id="avatarParser">
            <div class="qy-mphotos-avatoredit">
              <div id="avatarImgbox" class="qy-mphotos-imgcontain"><img id="avatarCroper" src="{$img_url}" /></div>
            </div>
            <div id="avatarPreview" class="qy-mphotos-thumbpreview"> </div>
            <span class="splite-m1"></span>
            <form id="avatarCrpfrm" action="/index.php/member/avatar/save" method="post" enctype="multipart/form-data" >
              <input name="bigImage" type="hidden" id="bigImage" value="{$img_url}" />
              <input type="hidden" id="x" name="x" />
              <input type="hidden" id="y" name="y" />
              <input type="hidden" id="w1" name="w1" />
              <input type="hidden" id="h1" name="h1" />
              <input type="hidden" id="tempfile" name="tempfile" />
              <input type="hidden" class="jq_step" id="step" name="step" value="process" />
              
            </form>
            <a id="btnAvatarSave" class="qy-mphotosbtn-avedit">保存提交</a></div>
        </div>
      </div>
    </div>
  </div>
 {include file="common/mp_footer.tpl"}
</div>
</body>
</html>
