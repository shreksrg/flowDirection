<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/ispace.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.space-skinxx.js" type="text/javascript"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont"> {include file="common/mp_header.tpl"}
 
  <div class="qy-hp-mainAR">
    <div class="qy-space-advNews">
      <div class="qy-space-advScroll">
        <div class="haccordion">
        {section loop=$secslides name=foo}
          <div class="hacc-tagheader"><a>{$secslides[foo].title|truncate:14:''}</a></div>
          <div class="hacc-content"><a href="/index.php/space/articles/pubviewArticle/{$secslides[foo].id}" target="_blank"><img src="{$secslides[foo].litpic}" /></a></div>
         {/section} 
          
        </div>
      </div>
      
      <div class="qy-space-tipNews">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇专题</b></span></div>
        <ul class="qy-space-tipNewsOpts">
          <li> <a href="/index.php/space/articles/pubviewArticle/{$secspecial[0].id}" target="_blank"><img src="{$secspecial[0].litpic}" /></a>
          	{section loop=$secspecial name=foo start=0 max=3}
           		<p>&nbsp;<a href="/index.php/space/articles/pubviewArticle/{$secspecial[0].id}" target="_blank">{$secspecial[foo].title|truncate:13:'.'}</a></p>
            {/section} 
          </li>
          <li><a href="/index.php/space/articles/pubviewArticle/{$secspecial[3].id}" target="_blank"><img src="{$secspecial[3].litpic}" alt="" /></a>
            {section loop=$secspecial name=foo start=3 max=3}
           		<p>&nbsp;<a href="/index.php/space/articles/pubviewArticle/{$secspecial[3].id}" target="_blank">{$secspecial[foo].title|truncate:13:'.'}</a></p>
            {/section} 
          </li>
          <li><a href="/index.php/space/articles/pubviewArticle/{$secspecial[6].id}" target="_blank"><img src="{$secspecial[6].litpic}" alt="" /></a>
            {section loop=$secspecial name=foo start=6 max=3}
           		<p>&nbsp;<a href="/index.php/space/articles/pubviewArticle/{$secspecial[6].id}" target="_blank">{$secspecial[foo].title|truncate:13:'.'}</a></p>
            {/section}
          </li>
        </ul>
      </div>
    </div>
    <div class="splite-m1"></div>
    <div class="qy-space-advposition"><img src="/staticx/images/index/banner.jpg" width="950" height="100" /></div>
    
    <div class="qy-space-leftPlate">
      <div class="qy-space-original">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b> 奇遇原创</b></span><span class="qy-common-caption-morex1"><a href="/index.php/space/articles/publits/2" target="_blank">更多&gt;</a></span></div>
        <ul class="qy-space-originalOpts-x1">
        {section loop=$secoriginalC1 name=foo start=0 max=6}
          <li><a href="/index.php/space/articles/pubviewArticle/{$secoriginalC1[foo].id}" target="_blank"><img src="{$secoriginalC1[foo].litpic}" />{$secoriginalC1[foo].title|truncate:6:''}</a></li>
        {/section}
        </ul>
        <ul class="qy-space-originalOpts-x2">
          <li class="caption"><b><a href="/index.php/space/articles/pubviewArticle/{$secoriginalC2[0].id}" target="_blank">{$secoriginalC2[0].title|truncate:21:'..'}</a></b>
            <p>{$secoriginalC2[0].description|truncate:16:''}...</p>
          </li>
          {section loop=$secoriginalC2 name=foo start=1 max=5}
          <li><a href="/index.php/space/articles/pubviewArticle/{$secoriginalC2[foo].id}" target="_blank">{$secoriginalC2[foo].title|truncate:21:''}</a></li>
          {/section}
        </ul>
        <span class="splite-m1"></span>
        <ul class="qy-space-originalOpts-x3">
        {section loop=$secoriginalC1 name=foo start=0 max=4}
          <li><a href="/index.php/space/articles/pubviewArticle/{$secoriginalC1[foo].id}" target="_blank"><img src="{$secoriginalC1[foo].litpic}" />{$secoriginalC1[foo].title|truncate:6:''}</a></li>
        {/section}
        </ul>
      </div>
      <div class="qy-space-inforMtech">
        <div class="qy-space-story">
          <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇故事</b></span><span class="qy-common-caption-morex1"><a href="/index.php/space/articles/publits/6" target="_blank">更多&gt;</a></span></div>
          <ul class="qy-space-storyOpts-x1">
            <li class="newsTip"><a href="/index.php/space/articles/pubviewArticle/{$secstoryC1[0].id}" target="_blank"><img src="{$secstoryC1[0].litpic}" border="0" /></a><b><a href="/index.php/space/articles/pubviewArticle/{$secstoryC1[0].id}" target="_blank">{$secstoryC1[0].title|truncate:16:''}</a></b></li>
            {section loop=$secstoryC1 name=foo start=1 max=2}
            <li><a href="/index.php/space/articles/pubviewArticle/{$secstoryC1[foo].id}" target="_blank">{$secstoryC1[foo].title|truncate:22:''}</a></li>
           {/section}
          </ul>
          <ul class="qy-space-storyOpts-x2">
          {section loop=$secstoryC2 name=foo start=0 max=6}
            <li><a href="/index.php/space/articles/pubviewArticle/{$secstoryC2[foo].id}" target="_blank"><img src="{$secstoryC2[foo].litpic}" />{$secstoryC2[foo].title|truncate:6:''}</a></li>
          {/section}
          </ul>
          <ul class="qy-space-storyOpts-x3">
          {section loop=$secstoryC2 name=foo start=6 max=3}
            <li><a href="/index.php/space/articles/pubviewArticle/{$secstoryC2[foo].id}" target="_blank">{$secstoryC2[foo].title|truncate:13:''}</a></li>
          {/section}
          </ul>
        </div>
        <div class="qy-space-advPositionX6"><img src="/staticx/images/space/tmp/qy-space-tmpimgX4.jpg" width="650" height="96" /></div>
        <div class="qy-space-story">
          <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇生活</b></span><span class="qy-common-caption-morex1"><a href="/index.php/space/articles/publits/5" target="_blank">更多&gt;</a></span></div>
          <ul class="qy-space-storyOpts-x1">
            <li class="newsTip"><a href="/index.php/space/articles/pubviewArticle/{$seclifeC1[0].id}" target="_blank"><img src="{$seclifeC1[0].litpic}" border="0" /></a><b><a href="/index.php/space/articles/pubviewArticle/{$seclifeC1[0].id}" target="_blank">{$seclifeC1[0].title|truncate:16:''}</a></b></li>
            {section loop=$seclifeC1 name=foo start=0 max=2}
            <li><a href="/index.php/space/articles/pubviewArticle/{$seclifeC1[foo].id}" target="_blank">{$seclifeC1[foo].title|truncate:22:''}</a></li>
           {/section}
          </ul>
          <ul class="qy-space-storyOpts-x2">
          {section loop=$seclifeC2 name=foo start=0 max=6}
            <li><a href="/index.php/space/articles/pubviewArticle/{$seclifeC2[foo].id}" target="_blank"><img src="{$seclifeC2[foo].litpic}" />{$seclifeC2[foo].title|truncate:6:''}</a></li>
          {/section}
          </ul>
          <ul class="qy-space-storyOpts-x3">
          {section loop=$seclifeC2 name=foo start=6 max=3}
            <li><a href="/index.php/space/articles/pubviewArticle/{$seclifeC2[foo].id}" target="_blank">{$seclifeC2[foo].title|truncate:13:''}</a></li>
          {/section}
          </ul>
        </div>
        <div class="qy-space-story">
          <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇情感</b></span><span class="qy-common-caption-morex1"><a href="/index.php/space/articles/publits/3" target="_blank">更多&gt;</a></span></div>
          <ul class="qy-space-storyOpts-x1">
            <li class="newsTip"><a href="/index.php/space/articles/pubviewArticle/{$secemotionC1[0].id}" target="_blank"><img src="{$secemotionC1[0].litpic}" border="0" /></a><b><a href="/index.php/space/articles/pubviewArticle/{$secemotionC1[0].id}" target="_blank">{$secemotionC1[0].title|truncate:16:''}</a></b></li>
            {section loop=$secemotionC1 name=foo start=0 max=2}
            <li><a href="/index.php/space/articles/pubviewArticle/{$secemotionC1[foo].id}" target="_blank">{$secemotionC1[foo].title|truncate:22:''}</a></li>
           {/section}
          </ul>
          <ul class="qy-space-storyOpts-x2">
          {section loop=$secemotionC2 name=foo start=0 max=6}
            <li><a href="/index.php/space/articles/pubviewArticle/{$secemotionC2[foo].id}" target="_blank"><img src="{$secemotionC2[foo].litpic}" />{$secemotionC2[foo].title|truncate:6:''}</a></li>
          {/section}
          </ul>
          <ul class="qy-space-storyOpts-x3">
          {section loop=$secemotionC2 name=foo start=6 max=3}
            <li><a href="/index.php/space/articles/pubviewArticle/{$secemotionC2[foo].id}" target="_blank">{$secemotionC2[foo].title|truncate:13:''}</a></li>
          {/section}
          </ul>
        </div>
      </div>
    </div>
    
    <div class="qy-space-rightPlate">
      <div class="qy-space-infoRanks">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇排行</b></span></div>
        <ul class="qy-common-newsRankOpts">
        {section loop=$secranksC1 name=foo start=0 max=10}
          <li><span {if $smarty.section.foo.index <= 2} class="tarNo1" {/if}>{if $smarty.section.foo.index < 9}0{/if}{$smarty.section.foo.index+1}</span> <a href="/index.php/space/articles/pubviewArticle/{$secranksC1[foo].id}" target="_blank">{$secranksC1[foo].title|truncate:18:'..'}</a></li>
        {/section}
        </ul>
      </div>
      <div class="qy-space-advPositionX2"><img src="/staticx/images/space/tmp/qy-space-tmpimgX3.jpg" width="258" height="214" /></div>
      <div class="qy-space-infoHots">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇热点</b></span></div>
        <ul class="qy-space-infoHotsOpts">
          <li class="tarHot"> <a href="/index.php/space/articles/pubviewArticle/{$sechotsC1[0].id}" target="_blank"><img src="{$sechotsC1[0].litpic}" /></a>
            <p><a href="/index.php/space/articles/pubviewArticle/{$sechotsC1[0].id}">{$sechotsC1[0].title|truncate:16:''}</a></p>
            <p>{$sechotsC1[0].description|truncate:16:''}...</p>
          </li>
         {section loop=$sechotsC1 name=foo start=1 max=9}
          <li> <a href="/index.php/space/articles/pubviewArticle/{$sechotsC1[foo].id}" target="_blank">{$sechotsC1[foo].title|truncate:21:'..'}</a></li>
         {/section}
        </ul>
      </div>
      <div class="qy-space-doyens">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇达人</b></span></div>
        <ul class="qy-hp-storyRnd-sList">
           {foreach from=$recommend_list item=v key=k}   
          <li class="qy-hp-storyRnd-sOpt"> <span class="qy-hp-storyRnd-simg"> <a href="/index.php/browse_act/detail/{$v.aid}" target="_blank"><img  src="{$v.thumb}"/></a>
            <p><a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank">{$v.username}</a></p>
            </span> <span class="qy-hp-storyRnd-desc">
            <p class="qy-hp-story-pcaption"><a href="/index.php/browse_act/detail/{$v.aid}" target="_blank">{$v.SUBJECT}</a></p>
            <p>{$v.des|truncate:20:'.'}</p>
            </span> <span class="splite-m1"></span> </li>
        {/foreach}  
        </ul>
      </div>
    </div>
  </div>
  <span class="splite-m1"></span> {include file="common/mp_footer.tpl"} </div>
</body>
</html>