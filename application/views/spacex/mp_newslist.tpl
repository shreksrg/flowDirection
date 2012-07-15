<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/article.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.space-skinxx.js"></script>
<title>奇遇同城</title>
</head>
<body class="commbg">
<div class="qy-parentCont"> {include file="common/mp_header.tpl"}
  <div class="qy-detail-mainAR">
    <div class="qy-news-advpositionX1"><img src="/staticx/images/index/banner.jpg" width="950" height="100" /></div>
    <div class="qy-news-paths"> 首页 > {$categorypath} </div>
    <div class="qy-news-leftPlate">
      <ul class="qy-news-opts">
        {if $listArticle.recordnum eq 0}
        <li>文章不存在</li>
        {else}  
        {section loop=$listArticle.recordset name=foo start=0 max=10}
        <li>
          <p><a class="newstitle" href="/index.php/space/articles/pubviewArticle/{$listArticle.recordset[foo].id}">{$listArticle.recordset[foo].title|truncate:26:''}</a><span class="newspubtime">{$listArticle.recordset[foo].pubdate|date_format:"%Y-%m-%d"}</span></p>
          <p class="newsabstract"><font>摘要：</font>{$listArticle.recordset[foo].description|truncate:56:''}... [<a href="/index.php/space/articles/pubviewArticle/{$listArticle.recordset[foo].id}">详细</a>]</p>
        </li>
        {/section} 
        {/if}
      </ul>
      <span class="splite-m1"></span>
      <span class="qy-common-pageations">
      	{$pagination}
      </span>
     
    </div>
    <div class="qy-news-rightPlate">
      <div class="qy-news-advpositionX2"><img src="/staticx/images/searcher/advimg.jpg" width="263" height="232" /></div>
      <div class="qy-news-hotList">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>热点专题</b></span></div>
        <ul class="qy-common-newsRankOpts">
          {section loop=$listArticle.recordset name=foo start=0  max=10}
          	
          <li><span {if $smarty.section.foo.index <= 2}class="tarNo1"{/if}>{if $smarty.section.foo.index < 9}0{/if}{$smarty.section.foo.index+1}</span><a href="/index.php/space/articles/pubviewArticle/{$listArticle.recordset[foo].id}">{$listArticle.recordset[foo].title|truncate:26:''}</a></li>
          {/section}
        </ul>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"} </div>
</body>
</html>