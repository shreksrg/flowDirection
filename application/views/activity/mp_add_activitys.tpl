<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.active.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.mpactivity.js"></script>


<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">
      <div class="qy-leaguer-rplateCont">
        <div class="qy-mpcommonTag-headertit"> <b class="qy-mpcommonTag-caption">我的活动</b>
          <ul class="qy-mpcommonTag-switchTags">
            <li><a href="/index.php/activity/my_in/index">参加的活动</a></li>
            <li class="cursection"><a href="/index.php/activity/my_launch/index">发起的活动</a></li>
            <li><a href="/index.php/activity/my_attention/index">关注的活动</a></li>
          </ul>
        </div>
        
        <!---<div class="qy-mactive-path">活动 >  "看老北京，爱新北京"多媒体数字艺术展览"</div>-->
        <div class="qy-mactive-path">活动 >  发起活动</div>
        
        <form method="post" id="frmActedit" action="/index.php/activity/index/create" enctype="multipart/form-data">
        <table class="qy-mactive-form" width="0" border="0" cellspacing="0" cellpadding="0">
          
            <tr>
              <td align="right">活动标题：</td>
              <td width="18">&nbsp;</td>
              <td><label for="textfield"></label>
                <input name="SUBJECT" type="text" id="actCaption" size="72" /></td>
            </tr>
            <tr>
              <td align="right" valign="top">活动摘要：</td>
              <td width="18">&nbsp;</td>
              <td style="padding-top:12px"><label for="textfield"></label>
                <textarea name="des" id="actSummary" cols="56" rows="3"></textarea></td>
            </tr>
            <tr>
              <td align="right">活动分类：</td>
              <td>&nbsp;</td>
              <td><label for="select"></label>
                <select name="class" id="actAssort">
                  <option value="1000">请选择活动分类</option>
                  <option value="1001">品尝美食</option>
                  <option value="1002">户外休闲</option>
                  <option value="1003">运动健身</option>
                  <option value="1004">室内活动</option>
                  <option value="1005">恬静阅读</option>
                </select></td>
            </tr>
            <tr>
              <td align="right">封 面 图：</td>
              <td>&nbsp;</td>
              <td><label for="fileField"></label>
                <input type="file" name="pic" id="actCover" /></td>
            </tr>
            <tr>
              <td align="right">是否发布：</td>
              <td>&nbsp;</td>
              <td><input name="status" type="radio" id="radio" value="0" checked="checked" />
                <label for="radio">是&nbsp;
                  <input type="radio" name="status" id="radio2" value="1" />
                  否</label></td>
            </tr>
            <tr>
              <td align="right">报名截止：</td>
              <td>&nbsp;</td>
              <td><input class="Wdate" type="text" id="actEnroll" name="lasttime" /></td>
            </tr>
            <tr>
              <td align="right">活动时间：</td>
              <td>&nbsp;</td>
              <td><input class="Wdate" type="text" id="actBegin" name="times"  />
                -
                <input class="Wdate" type="text" id="actExpire" name="etimes" /></td>
            </tr>
            <tr>
              <td align="right">活动地点：</td>
              <td>&nbsp;</td>
              <td><input name="place" type="text" id="actAddr" size="42" />
                <a id="btn-mapSign" class="qy-mapsign-btnsearch" href="/index.php/activity/mapsign/index/0/0">编辑地标</a></td>
            </tr>
            <tr>
              <td align="right">固定电话：</td>
              <td>&nbsp;</td>
              <td><input type="text" name="tele" id="actTel" /></td>
            </tr>
            <tr>
              <td align="right">手&nbsp;&nbsp;&nbsp; 机：</td>
              <td>&nbsp;</td>
              <td><input type="text" name="phone" id="actMobile" /></td>
            </tr>
            <tr>
              <td align="right" valign="top">活动说明：</td>
              <td>&nbsp;</td>
              <td style="padding-top:12px"><textarea  name="description" id="actContent"></textarea></td>
                </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp; <input type="hidden" value="1" name="act" /></td>
              <td height="78"><input id="" type="submit" class="btnSubmit-style1" value="" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <input id="mapCity" name="mapCity" type="hidden" value="" />
            <input id="mapDetail" name="mapDetail" type="hidden" value="" />
          
        </table>
		</form>
        <span class="splite-m1"></span> </div>
    </div>
  </div>
 {include file="common/mp_footer.tpl"}
</div>
</body>

</html>
