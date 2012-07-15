<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.active.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.mpactivity-lsted.js"></script>
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
            <li><a href="/index.php/activity/my_launch/index">发起的活动</a></li>
            <li class="cursection"><a href="/index.php/activity/my_attention/index">关注的活动</a></li>
          </ul>
        </div>
        <div class="qy-mpannel-selection"> <a href="/index.php/activity/index/create" class="qy-btn-mpnewitem">我要组织活动</a>
          <input id="selectAll" name="" type="checkbox" value="" />
          全选 <a id="delSelected" href="###">删除所选</a> </div>
        <ul class="qy-mpactive-ListOpt">
        <form id="frmOptions" action="/index.php/activity/my_attention/delete_activity_field/" method="post">
        
        
         {foreach from=$list item=v key=k}
          <li>
            <input rel="actopt" class="qy-mpactive-secbox" name="actopt[]" type="checkbox" value="{$v.aid}" />
            
            <div class="qy-mactive-detail fixwidth">
              <p class="mactive-title"><a href="/index.php/browse_act/detail/{$v.aid}">{$v.SUBJECT}</a></p>
              <p class="mactive-counts">活动相片({$v.picnum}) &nbsp;&nbsp; 报名人数({$v.membernum}) <!--&nbsp;&nbsp; 留言(12)--></p>
              <p class="mactive-edition">发布日期：{$v['dateline']|date_format:"%Y/%m/%d"} </p>
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
