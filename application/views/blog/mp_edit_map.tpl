<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.active.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.mplogs.js"></script>
<title>奇遇同城_我的paliie_编辑日志</title>
</head>

<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">
     
      <div class="qy-leaguer-rplateCont">
        <div class="qy-mpcommonTag-headertit"> <b class="qy-mpcommonTag-caption">我的日志</b>
          <ul class="qy-mpcommonTag-switchTags">
            <li><a href="/index.php/blog/map/add">新建日志</a></li>
            <li class="cursection"><a href="/index.php/blog/map">日志管理</a></li>
            
          </ul>
        </div>
        
        <div class="qy-mactive-path">我的日志 > 编辑日志</div>
		<form method="post" id="frmLogedit" action="/index.php/blog/map/edit" enctype="multipart/form-data">
        <table class="qy-mactive-form" width="0" border="0" cellspacing="0" cellpadding="0">
        
          <tr>
            <td align="right">日志标题：</td>
            <td width="18">&nbsp;</td>
            <td>
            <input name="subject" type="text" id="logCaption" size="72"  value="{$map.SUBJECT}"/></td>
          </tr>
           <tr>
            <td align="right" valign="top">日志摘要：</td>
            <td>&nbsp;</td>
            <td style="padding-top:12px">
            <textarea name="des" id="logSummary" cols="56" rows="3">{$map.des}</textarea></td>
          </tr>
          <tr>
            <td align="right">日志分类：</td>
            <td>&nbsp;</td>
            <td>
              <select name="blog_type" id="logAssortp">
                <option value="0" {if $map.tag=='0'}selected="selected"{/if} >选择日志分类</option>
                <option value="1" {if $map.tag=='1'}selected="selected"{/if} >旅游</option>
                <option value="2" {if $map.tag=='2'}selected="selected"{/if} >美食</option>
                <option value="3" {if $map.tag=='3'}selected="selected"{/if} >娱乐</option>
              </select>
              </td>
          </tr>
          <tr>
            <td align="right">封 面 图：</td>
            <td>&nbsp;</td>
            <td>
            <input type="file" name="cover_img" id="logCover" /></td>
          </tr>
          <tr>
            <td align="right">标记地图：</td>
            <td>&nbsp;</td>
            <td><label id="signArea">{$map.detail_address}</label>
            <a id="btn-mapSign" class="qy-mapsign-btnsearch" href="/index.php/activity/mapsign/index/{$map.blogid}/1">编辑地标</a></td>
          </tr>
          <tr>
            <td align="right">是否发布：</td>
            <td>&nbsp;</td>
            <td><input name="STATUS" type="radio" value="1" {if $map.STATUS==1}checked="checked"{/if} />
            <label for="radio">是&nbsp; 
              <input type="radio" name="STATUS" value="2" {if $map.STATUS==2}checked="checked"{/if}/>
            否</label></td>
          </tr>
          <tr>
            <td align="right" valign="top">日志内容：</td>
            <td>&nbsp;</td>
            <td style="padding-top:12px">
            <textarea  name="content" id="logContent">{$map.message}</textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="hidden" value="{$map.blogid}" name="blogid" ></td>
            <td height="78"><input type="submit" class="btnSubmit-style1" value="" /></td>
          </tr>
         
        </table>
			<input id="mapCity" name="mapCity" type="hidden" value="" />
            <input id="mapDetail" name="mapDetail" type="hidden" value="" />
		</form>
        <span class="splite-m1"></span>
        
      </div>
    </div>
  </div>
 {include file="common/mp_footer.tpl"}
</div>
</body>
</html>
