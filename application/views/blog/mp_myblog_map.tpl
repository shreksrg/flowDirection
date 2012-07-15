<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.active.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.mplogs-lsted.js"></script>
<title>奇遇同城 - </title>
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
        <div class="qy-mpannel-selection"> 
          <input id="selectAll" name="" type="checkbox" value="" />
          全选 <a id="delSelected" href="###">删除所选</a> </div>
        <ul class="qy-mpactive-ListOpt">
        <form method="post" id="frmOptions">
        
       {foreach from=$blogMapList item=v key=k} 
          <li>
            <input rel="logopt" class="qy-mpactive-secbox" name="logopt[]" type="checkbox" value="" />
            {if $v['STATUS']==0}<div class="qy-mpactive-chkstate statewarm">驳回</div>{/if}
            {if $v['STATUS']==1}<div class="qy-mpactive-chkstate statepermit">通过</div>{/if}
            {if $v['STATUS']==2}<div class="qy-mpactive-chkstate ">审核中</div>{/if}
            <div class="qy-mactive-detail">
              <p class="mactive-title"><a href="/index.php/browse_blog/map_detail/{$v['blogid']}">{$v['SUBJECT']|truncate:24:'.'}</a></p>
              <p class="mactive-counts">浏览({$v['viewnum']})&nbsp;&nbsp;评论({$v.comnum})</p>
              <p class="mactive-edition">发布日期：{$v['dateline']|date_format:"%Y-%m-%d"} <span class="mactive-oper" style="display:none"><a href="/index.php/blog/map/edit/{$v['blogid']}" target="_blank">编辑</a></span></p>
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
