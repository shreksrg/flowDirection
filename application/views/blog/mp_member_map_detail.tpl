<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/article.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.space-skinxx.js"></script>
<title>奇遇同城 - </title>
</head>


<body class="commbg">
<div class="qy-parentCont">
 {include file="common/mp_header.tpl"}
  <div class="qy-detail-mainAR">
    <div class="qy-news-advpositionX1"><img src="/staticx/images/index/banner.jpg" width="950" height="100" /></div>
    <div class="qy-news-paths"> <a href="/index.php/browse_blog/map_list/{$map.userid}">{$map.username} 的日志 > <a class="currentPage">{$map.SUBJECT}</a> </div>
    <div class="qy-news-leftPlate">
      <div class="qy-newsDesc-btns"></div>
      <div class="qy-newsDesc-caption">
      	<p class="newsTitle">{$map.SUBJECT}</p>
        <p class="newssubsource">资讯来源：奇遇同城  &nbsp;&nbsp;&nbsp; 发布者：{$member_profile.username}    &nbsp;&nbsp;&nbsp; {$map.dateline|date_format:"%Y/%m/%d"}</p>
      </div>
      <div class="qy-newsDesc-content">
      	<!--<div class="qy-newsDesc-cover"></div>-->
        <div class="qy-newsDesc-text">
        	   {$map.message}
        </div>
      </div>
      <div class=""></div>
      <span class="splite-m1"></span>
      
    </div>
    
   
    <div class="qy-news-rightPlate">
      <div class="qy-news-advpositionX2"><img src="/staticx/images/searcher/advimg.jpg" width="263" height="232" /></div>
      <div class="qy-news-hotList">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>热点日志</b></span></div>
        <ul class="qy-common-newsRankOpts">
          {foreach from=$hot_list item=v key=k}
          <li><span {if $k==0}class="tarNo1"{/if}>{$k+1}</span><a href="/index.php/browse_blog/map_detail/{$v['blogid']}">{$v.SUBJECT|truncate:15:'.'}</a></li>
         {/foreach}     
          
        </ul>
      </div>
      
      <div class="qy-news-hotList">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>推荐日志</b></span></div>
      <ul class="qy-news-moreiLst">
      
       {foreach from=$recommend_list item=v key=k}
         	<li><img src="{$v.pic}" /></li>
        {/foreach}    
           
        </ul>
       	<span class="splite-m1"></span>
      </div>
    </div>
  </div>
 {include file="common/mp_footer.tpl"}
</div>
</body>
</html>