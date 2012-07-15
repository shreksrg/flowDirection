<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/article.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.search.js"></script>
<title>奇遇同城 - </title>
</head>


<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  <div class="qy-detail-mainAR">
    <div class="qy-news-advpositionX1"><img src="/staticx/images/index/banner.jpg" width="950" height="100" /></div>
    <div class="qy-news-paths"> 首页 > 日志搜索</div>
    <div class="qy-news-leftPlate">
      <ul class="qy-news-opts">
      
      {foreach from=$blogMapList item=v key=k}
        <li>
          <p><a class="newstitle" href="/index.php/browse_blog/map_detail/{$v['blogid']}">{$v['SUBJECT']|truncate:35:'.'}</a><span class="newspubtime">{$v['dateline']|date_format:"%Y/%m/%d"}</span></p>
          <p class="newsabstract"><font>摘要：</font>{$v['des']|truncate:45:'.'}[<a href="/index.php/browse_blog/map_detail/{$v['blogid']}">详细</a>]</p>
        </li>
      {/foreach}
      
        
      </ul>
      <span class="splite-m1"></span>
      <ul class="qy-common-pageations">
        {$page}
      </ul>
    </div>
    
  
    <div class="qy-news-rightPlate">
      <div class="qy-news-advpositionX2"><img src="/staticx/images/searcher/advimg.jpg" width="263" height="232" /></div>
      <div class="qy-news-hotList">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>热点专题</b></span></div>
        <ul class="qy-common-newsRankOpts">
        {foreach from=$hotBlogMapList item=v key=k}
          <li><span {if $k==0}class="tarNo1"{/if}>{$k+1}</span><a href="/index.php/browse_blog/map_detail/{$v['blogid']}">{$v.SUBJECT|truncate:15:'.'}</a></li>
         {/foreach} 
        </ul>
      </div>
    </div>
  </div>
  
 {include file="common/mp_footer.tpl"}
</div>
</body>
</html>