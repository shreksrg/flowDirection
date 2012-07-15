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
    <div class="qy-news-paths"> <a href="/">首页</a> > {$optArticle.categorypath} </div>
    <div class="qy-news-leftPlate">
      <div class="qy-newsDesc-btns"></div>
      <div class="qy-newsDesc-caption">
      	<p class="newsTitle">{$optArticle.title|truncate:26:''}</p>
        <p class="newssubsource">资讯来源：奇遇同城  &nbsp;&nbsp;&nbsp;  发布日期: {$optArticle.pubdate|date_format:"%Y-%m-%d"}</p>
      </div>
      <div class="qy-newsDesc-content">
      {if $optArticle.litpic != ''}	<img class="qy-newsDesc-cover" src="{$optArticle.litpic}" />{/if}
        <div class="qy-newsDesc-text">
        	{$optArticle.body}
        </div>
      </div>
      <div class=""></div>
      <span class="splite-m1"></span>
    </div>
    
    <div class="qy-news-rightPlate">
      <div class="qy-news-advpositionX2"><img src="/staticx/images/searcher/advimg.jpg" width="263" height="232" /></div>
      <div class="qy-news-hotList">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>精彩故事</b></span></div>
        <ul class="qy-common-newsRankOpts">
        {section loop=$secstoryC1 name=foo start=0  max=10}
          <li><span {if $smarty.section.foo.index <= 3} class="tarNo1" {/if}>01</span><a href="/index.php/space/articles/pubviewArticle/{$secstoryC1[foo].id}">{$secstoryC1[foo].title|truncate:26:''}</a></li>
    	{/section} 
        </ul>
      </div>
      
      <div class="qy-news-hotList">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>更多故事</b></span></div>
      <ul class="qy-news-moreiLst">
      	{section loop=$secstoryC2 name=foo start=0  max=6}
         	<li><a href="/index.php/space/articles/pubviewArticle/{$secstoryC2[foo].id}"><img src="{$secstoryC2[foo].litpic}" /></a></li>
         {/section}
        </ul>
       	<span class="splite-m1"></span>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"}
</div>
</body>
</html>