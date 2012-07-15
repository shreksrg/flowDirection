<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/activity.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.activity.js"></script>

<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont"> 
 
    {include file="common/mp_header.tpl"}
  

  <div class="qy-hp-mainAR">
    
    <div class="qy-active-leftPlate">
      <div class="qy-active-advspell">
      	<ul id="pub_slideplay">
            <li> <a target="_blank" href="#"><img  alt="" src="/staticx/tmp/hp.advcolum/a1.jpg" /></a></li>
            <li> <a target="_blank" href="#"><img alt="" src="/staticx/tmp/hp.advcolum/a2.jpg" /></a> </li>
            <li> <a target="_blank" href="#"><img alt="" src="/staticx/tmp/hp.advcolum/a3.jpg" /></a> </li>
            <li> <a target="_blank" href="#"><img alt="" src="/staticx/tmp/hp.advcolum/a4.jpg" /></a> </li>
           
          </ul>
      </div>
      <!--<div class="qy-active-searcher">
      	<b>活动搜索</b>
        <ul class="qy-active-searcher-area"><li class="cTag"><strong>区域</strong></li><li><a href="#">静安区</a></li><li><a href="#">长宁区</a></li><li><a href="#">黄浦区</a></li></ul>
        <ul class="qy-active-searcher-sort"><li class="cTag"><strong>分类</strong></li><li><a href="#">餐饮美食</a></li><li><a href="#">旅游观光</a></li><li><a href="#">娱乐休闲</a></li></ul>
      </div>-->
      <div class="qy-active-aList">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>活动列表</b></span></div>
        <ul class="qy-active-recList">
        
         {foreach from=$activity_list item=v key=k}
        	<li>
            	<a href="/index.php/browse_act/detail/{$v.aid}"><img src="{$v.thumb}"  /></a>
                <span class="qy-active-state qy-fix">{if $v.a_static==0}进行中{/if}{if $v.a_static==1}报名中{/if}{if $v.a_static==2}截止{/if}</span><b><a href="/index.php/browse_act/detail/{$v.aid}">{$v.SUBJECT}</a></b>
              <p>活动时间：{$v['times']|date_format:"%Y-%m-%d"} 至 {$v['etimes']|date_format:"%Y-%m-%d"}    </p>
              <p>地址：{$v.place}</p>
                <p>发起人： <strong class="qy-active-organizer"><a href="/index.php/member_info/index/uid/{$v.userid}">{$v.username}</a></strong></p>
            </li>
         {/foreach}      
           
         
        </ul>
        <ul class="qy-common-pageations">
         {$page}
      </ul>
        <div class="qy-active-pageation"></div>
        
      </div>
    </div>
    
   
    <div class="qy-active-rightPlate">
      <div class="qy-active-bulletin"></div>
      <!--<div class="qy-active-advLocalityX1"><img src="staticx/images/active/qy-advLocalityX1.jpg" width="262" height="259" /></div>-->
      <div class="qy-active-recommend">
      	<div class="qy-common-caption"><span class="qy-common-caption-title"><b>推荐活动</b></span></div>
        <ul class="qy-active-recommend-rList">
        
         {foreach from=$recommend_list item=v key=k}    
        	<li>
            	<img src="{$v.thumb}"/>
                <p>{$v.SUBJECT|truncate:20:'.'}</p>
                <p>({$v.follownum})人关注</p>
            </li>
          {/foreach}   
           
        </ul>
      </div>
      
    
      <div class="qy-active-album">
      	<div class="qy-common-caption"><span class="qy-common-caption-title"><b>活动回顾</b></span></div>
        <ul class="qy-active-albumOpts">
        
        {foreach from=$over_act_list item=v key=k}  
        	<li><img src="{$v.thumb}"/></li>
       {/foreach}       
           
           
        </ul>
        <span class=""></span>
      </div>
    </div>
  </div>
  
    {include file="common/mp_footer.tpl"}
  
</div>
</body>
</html>