<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/article.css" media="screen" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/member.search.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.search.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
 {include file="common/mp_header.tpl"}
  <div class="qy-detail-mainAR">
    <div class="qy-query-searchBar">
      <div class="qy-query-searchBarForm">
        <form action="/index.php/paliie_search/act_list" method="post">
          <div  class="qy-query-searchBarOpt"> 我要找：
            <select class="qy-query-sectionSex" name="gender">
              <option value="0">男朋友</option>
              <option value="1">女朋友</option>
            </select>
            &nbsp; &nbsp;
            年龄
            <select class="qy-query-sectionAge" name="ages1">
              <option value="">不限</option>
                                            {foreach from=$age_array_select item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>{/foreach}  	
            </select>
            至
            <select class="qy-query-sectionAge" name="ages2">
               <option value="">不限</option>
                                            {foreach from=$age_array_select_to item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>{/foreach}  	
            </select>
            岁
            &nbsp; &nbsp;
            地区
            <select id="province1" class="qy-query-sectionArea" name="province">
              <option value="">选择省份</option>
            </select>
            <select id="city1"  class="qy-query-sectionArea" name="city">
              <option value="">选择城市</option>
            </select>
            &nbsp; &nbsp;
            <input type="checkbox" checked="checked" value="1" name="pic">
            有照片 </div>
          <div class="qy-query-searchBarBtn">
            <input type="image" src="/staticx/images/index/search_btn.gif">
          </div>
        </form>
      </div>
    </div>
    <div class="qy-news-paths">会员搜索结果</div>
    <div class="qy-news-leftPlate">
      <ul class="qy-queryResult-ListOpt">
        {foreach from=$search_member_list item=v key=k}
          <li>
            
            <a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank"><img class="avatar" src="{$v.avatar_img}"></a>
            <div class="memberdetail">
              <p class="membername"><a href="/index.php/member_info/index/uid/{$v.userid}">{$v.username}</a></p>
              <p class="memberinfo"> {if $v.gender==0}男{/if}{if $v.gender==1}女{/if} {$v.ages}岁 {$v.city['city']} {$v.work}</p>
              <p class="memberdesc">{$v.description}</p>
              <p class="memberoper"><a class="btn-sendto" ref="btnWriteMail"  href="/index.php/member_info/sendmessage/uid/{$v.userid}">写信给Ta</a><a ref="btnAttention" class="btn-sendto" href="/index.php/friend/mp_favoritex/addonAttention/{$v.userid}">加为关注</a><a class="btn-sendto" target="_blank" href="/index.php/member_info/index/uid/{$v.userid}">查看详细</a></p>
            </div>
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
        <div class="qy-common-caption"><span class="qy-common-caption-title"><b>奇遇故事</b></span></div>
        <ul class="qy-common-newsRankOpts">
          <li><span class="tarNo1">01</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span class="tarNo1">01</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span class="tarNo1">01</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span>04</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span>05</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span>06</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span>07</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span>08</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span>09</span>泰国一地沙美岛品质行程5晚7天3980元</li>
          <li><span>10</span>泰国一地沙美岛品质行程5晚7天3980元</li>
        </ul>
      </div>
    </div>
  </div>
 {include file="common/mp_footer.tpl"}
</div>
</body>
</html>