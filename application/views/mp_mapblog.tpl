<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/imaplogs.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
<title>无标题文档</title>
</head>

<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  
  <div class="qy-hp-mainAR">
  
  <div class="qy-maplogs-searchBar" style="margin-bottom:0">
      <div class="qy-maplogs-searchBarFrm">
        <form  id="frmMapSearch">
          <div class="qy-maplogs-searchOpt"> 
            
            
            区域：
            <select id="mapprovince" name=""  >
              <option value="0">--请选择省份--</option>
            </select>
            <select id="mapcity" name=""  >
              <option value="0">--请选择城市--</option>
            </select>
            &nbsp; &nbsp;
            分类：
            <select id="mapcategory" name=""  >
             
              <option value="1" selected="selected">餐饮美食</option>
              <option value="2">宾馆酒店</option>
              <option value="3">休闲娱乐</option>
              <option value="4">旅游景点</option>
              <option value="5">运动健身</option>
              <option value="6">商超便利店</option>
              <option value="7">教育培训</option>
              <option value="8">医疗卫生</option>
            </select>
            &nbsp; &nbsp;
           周边附近： <input name="" type="text" id="nearAddr" />
          </div>
          <div class="qy-maplogs-searchBtn">
            <input id="btnSearch" type="submit" value="查询周边" />
          </div>
        </form>
      </div>
    </div>
  
    
    
    <div class="qy-maplogs-maparea">
      <ul class="maplogs-logRand">
      
      {foreach from=$toplist item=v key=k}  
        <li> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img class="mapRand-thumb" src="{$v.pic}" /></a>
          <p class="mapRand-caption"><a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:25:'.'}</a></p>
          <p class="mapRand-summary">{$v.des|truncate:50:'.'}({$v.detail_address})</p>
        </li>
      {/foreach}     
       
      </ul>
      <div id="mapcontainer" class="maplogs-emap">map</div>
      <div class="splite-m1"></div>
      <div class="qy-maplogs-searchBar">
      <div class="qy-maplogs-searchBarFrm">
        <form action="/index.php/browse_blog/map_lists_search" method="POST">
          <div class="qy-maplogs-searchOpt"> <strong>日志搜索</strong> &nbsp; &nbsp; | 
            &nbsp; &nbsp;
            
            所在地：
            <select id="province" name="province"  >
              <option value="0">--请选择省份--</option>
            </select>
            <select id="city" name="city"  >
              <option value="0">--请选择城市--</option>
            </select>
            &nbsp; &nbsp;
            分类：
            <select id="class" name="blog_type"  >
              <option value="0">--请选择分类--</option>
              <option value="1">--旅游--</option>
              <option value="2">--美食--</option>
              <option value="3">--娱乐--</option>
            </select>
          </div>
          <div class="qy-maplogs-searchBtn">
            <input type="image" src="/staticx/images/index/search_btn.gif" />
          </div>
        </form>
      </div>
    </div>
    </div>
    <div class="qy-maplogs-asort">
    <span class="spliteline"></span>
      <div class="mapasort-recommend">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇美食</b></span><span class="qy-common-caption-morex1"><a href="/index.php/browse_blog/map_lists/2">更多&gt;</a></span></div>
        
      {foreach from=$foodlist item=v key=k}  
      {if $k==0}
        <div class="mapasort-cover"> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img align="top" class="coverimg"  src="{$v.pic}"/></a>{$v.SUBJECT|truncate:24:'.'}</div>
      {/if}  
      {/foreach}   
        <ul class="mapasort-items">
        {foreach from=$foodlist item=v key=k}  
         {if $k>0}
          <li> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img src="{$v.pic}" /></a> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
          {/if}
       {/foreach}  
        </ul>
        
       
        
      </div>
      <div class="mapasort-ranks">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b> 美食排行</b></span></div>
        
       
        <ul class="mapasort-ranksRnd">
        
         {foreach from=$foodlistline item=v key=k}  
        {if $k<2}
          <li> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img src="{$v.pic}" /></a> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
        {/if} 
        {/foreach}    
        </ul>
       
        <div class="splite-m1"></div>
        <ul class="qy-common-newsRankOpts">
        {foreach from=$foodlistline item=v key=k} 
        {if $k>1} 
          <li><span class="tarNo{$k-1}">{$k-1}</span><a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
         {/if} 
        {/foreach}      
        </ul>
        
       
        <ul class="mapasort-ranksTops">
        </ul>
      </div>
      
    </div>
    <div class="qy-space-advposition"><img src="/staticx/images/index/banner.jpg" width="950" height="100" /></div>
    <div class="qy-maplogs-asort">
    <span class="spliteline"></span>
      <div class="mapasort-recommend">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇休闲</b></span><span class="qy-common-caption-morex1"><a href="/index.php/browse_blog/map_lists/3">更多&gt;</a></span></div>
        
      {foreach from=$xiuxlist item=v key=k}  
      {if $k==0}
        <div class="mapasort-cover"> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img align="top" class="coverimg"  src="{$v.pic}"/></a>{$v.SUBJECT|truncate:24:'.'}</div>
        {/if}
      {/foreach}    
      
        <ul class="mapasort-items">
        {foreach from=$xiuxlist item=v key=k}  
      {if $k>0}
          <li> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img src="{$v.pic}" /></a> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
        {/if}
       {/foreach}  
        </ul>
       
        
      </div>
      <div class="mapasort-ranks">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b> 休闲推荐</b></span></div>
        
        
        <ul class="mapasort-ranksRnd">
        {foreach from=$xiuxlistline item=v key=k}  
        {if $k<2}
          <li> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img src="{$v.pic}" /></a> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
         {/if}
       {/foreach}    
        </ul>
        
        <div class="splite-m1"></div>
        <ul class="qy-common-newsRankOpts">
         {foreach from=$foodlistline item=v key=k} 
        {if $k>1} 
          <li><span class="tarNo{$k-1}">{$k-1}</span><a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
         
          {/if}
       {/foreach}   
        </ul>
        
        <ul class="mapasort-ranksTops">
        </ul>
      </div>
      
    </div>
    <div class="qy-maplogs-asort">
    <span class="spliteline"></span>
      <div class="mapasort-recommend">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇旅游</b></span><span class="qy-common-caption-morex1"><a href="/index.php/browse_blog/map_lists/1">更多&gt;</a></span></div>
        
      {foreach from=$lylist item=v key=k}  
      {if $k==0}
        <div class="mapasort-cover"> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img align="top" class="coverimg"  src="{$v.pic}"/></a>{$v.SUBJECT|truncate:24:'.'}</div>
          {/if}
       {/foreach}  
     
        <ul class="mapasort-items">
        {foreach from=$lylist item=v key=k}  
      {if $k>0}
          <li> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img src="{$v.pic}" /></a> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
       {/if}
       {/foreach}   
        </ul>
       
        
      </div>
      <div class="mapasort-ranks">
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b> 热门景点</b></span></div>
        
      
        <ul class="mapasort-ranksRnd">
          {foreach from=$lylistline item=v key=k}  
        {if $k<2}
          <li> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank"><img src="{$v.pic}" /></a> <a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
           {/if}
       {/foreach}   
        </ul>
        
        <div class="splite-m1"></div>
        <ul class="qy-common-newsRankOpts">
        {foreach from=$lylistline item=v key=k}  
        {if $k>1}
          <li><span class="tarNo{$k-1}">{$k-1}</span><a href="/index.php/browse_blog/map_detail/{$v.blogid}" target="_blank">{$v.SUBJECT|truncate:24:'.'}</a></li>
         
           {/if}
       {/foreach} 
        </ul>
         
        <ul class="mapasort-ranksTops">
        </ul>
      </div>
      
    </div>
    <div class="splite-m1"></div>
    <div class="splite-m1"></div>
  </div>
  <span class="splite-m1"></span>
  {include file="common/mp_footer.tpl"}
</div>
</body>
</html>
<script src="/staticx/js/QY.maplogs-channelX.js" type="text/javascript"></script>