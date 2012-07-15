<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/homepage.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.hp-skinxx.js"></script>
<title>奇遇同城 - </title>
</head>


<body class="commbg">
<div class="qy-parentCont"> 
  

 {include file="common/mp_header.tpl"}
 
  

  <div class="qy-hp-mainAR">
    <div class="qy-hp-rows1">
      <div class="qy-hp-adcolumn">
        <div class="qy-hp-adv-screen">
          <ul id="pub_slideplay">
            <li> <a target="_blank" href="#"><img  alt="" src="/staticx/tmp/hp.advcolum/a1.jpg" /></a></li>
            <li> <a target="_blank" href="#"><img alt="" src="/staticx/tmp/hp.advcolum/a2.jpg" /></a> </li>
            <li> <a target="_blank" href="#"><img alt="" src="/staticx/tmp/hp.advcolum/a3.jpg" /></a> </li>
            <li> <a target="_blank" href="#"><img alt="" src="/staticx/tmp/hp.advcolum/a4.jpg" /></a> </li>
            <li> <a target="_blank" href="#"><img alt="" src="/staticx/tmp/hp.advcolum/a5.jpg" /></a> </li>
          </ul>
        </div>
      </div>
      <div class="qy-hp-entry">
        <table class="qy-hp-frmlogon"   border="0" align="center" cellpadding="0" cellspacing="0" style="" >
          <form action="/index.php/member/login/check_member" method="post">
            <tr>
              <td height="28">账 号&nbsp; </td>
              <td><label for="textfield"></label>
                <input class="qy-hp-accout" type="text" name="username" id="username" /></td>
              <td rowspan="2"><input name="" type="image" src="/staticx/images/index/login_btn.gif" /></td>
            </tr>
            <tr>
              <td height="28">密 码</td>
              <td><input class="qy-hp-pwd" type="password" name="password" id="password" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="36" colspan="2" valign="middle"><a href="/index.php/reset_pass/index">忘记密码？</a> <a href="/index.php/member/regist">用户注册</a></td>
            </tr>
          </form>
        </table>
        <div class="qy-hp-btnlogon"><a href="/index.php/member/regist"><img src="/staticx/images/index/register_btn.gif" width="126" height="38" /></a></div>
      </div>
    </div>
    <div class="qy-hp-memberSRCH">
      <div class="qy-hp-memberSRCH-frm">
        <form action="/index.php/paliie_search/act_list" method="post">
          <div class="qy-hp-searchOpt" style="float:left; margin-top:4px "> 我要找：
            <select name="gender" class="qy-hp-sectionSex" >
              <option value="0">男朋友</option>
              <option value="1">女朋友</option>
            </select>
            &nbsp; &nbsp;
            年龄
            <select name="ages1" class="qy-hp-sectionAge" >
              <option value="">不限</option>
                                            {foreach from=$age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
            </select>
            至
            <select name="ages2" class="qy-hp-sectionAge" >
               <option value="">不限</option>
                                            {foreach from=$age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
            </select>
            岁
            &nbsp; &nbsp;
            地区
            <select id="province" name="province"  class="qy-hp-sectionArea">
               <option value="">请选择省份</option>
              
            </select>
            <select id="city" name="city" class="qy-hp-sectionArea" >
              <option value="">请选择城市</option>
              
            </select>
            &nbsp; &nbsp;
            <input name="pic" type="checkbox" value="1" checked="checked" />
            有照片 </div>
          <div class="qy-hp-searchBtn">
            <input type="image" src="/staticx/images/index/search_btn.gif" />
          </div>
        </form>
      </div>
    </div>
    <div class="qy-hp-rows3">
      <div class="qy-hp-membercommend">
        <div class="qy-hp-membercommend-titcol"> <span class="qy-hp-membercommend-caption"><b>奇遇推荐</b></span>
          <ul id="qy-hp-recommdTagChg" class="qy-hp-areaTagswitch">
            <li><a code="320100">南京</a></li>
            <li><a code="320400">常州</a></li>
            <li><a code="320200">无锡</a></li>
            <li class="curbright"><a code="320500">苏州</a></li>
          </ul>
        </div>
        <ul class="qy-hp-membercommend-uList">
        {foreach from=$user_list item=v key=k}
          <li><a href="/index.php/member_info/index/uid/{$v.userid}"><img src="{$v.avatar_img}" /></a><a href="/index.php/member_info/index/uid/{$v.userid}">{if $v.gender=='0'}男{else}女{/if},{$v.age}岁 {if $v.work==''}未填{else}{$v.work}{/if}</a></li>
        {/foreach}  
        </ul>
      </div>
      <div class="qy-hp-memberRnd">
        <div class="qy-hp-membercommend-titcol"> <span class="qy-hp-membercommend-caption"><b>奇缘随缘</b></span> </div>
       
        <ul id="qy-uRnd-list" class="qy-hp-memberRnd-uList">
        
        {foreach from=$members_list item=v key=k}
          <li>
          
            <div class="qy-hp-memberRnd-uitemshow" {if $k!='0'}style="display:none"{/if}> <a href="/index.php/member_info/index/uid/{$v.userid}"><img  src="{$v.avatar_img}" /></a><b><a href="/index.php/member_info/index/uid/{$v.userid}">{$v.username}</a></b>
              <p>{if $v.gender=='0'}男{else}女{/if}，{$v.age}岁，{$v.work}</p>
              <p>{$v.description}</p>
            </div>
            
            <div class="qy-hp-memberRnd-uitemhidden" {if $k=='0'}style="display:none"{/if}> <a href="###"><strong>{$v.username}</strong>：{$v.age}岁，{$v.city['city']}，{if $v.work==''}未填{/if}</a> </div>
            <span class="splite-m1"></span>
           </li> 
        {/foreach}   
          
        </ul>
      </div>
      <span class="splite-m1"></span> </div>
    <div style="padding:15px 0"><img src="/staticx/images/index/qy_adv_item[1].jpg" width="948" height="97" /></div>
    <div class="qy-hp-rows4">
      <div class="qy-hp-rows4-col1">
        <div class="qy-hp-partyRnd">
          <div class="qy-hp-membercommend-titcol"> <span class="qy-hp-membercommend-caption"><b>奇遇派对</b></span> <span class="qy-hp-moreinfo-rlistX"><a href="/index.php/browse_act/index">更多></a></span> </div>
          <div class="qy-hp-partyRnd-pList"> <a class="arrowLeft" href="###"><img src="/staticx/images/index/party_left.jpg" width="26" height="51" /></a> <a class="arrowRight" href="###"><img src="/staticx/images/index/party_right.jpg" width="26" height="51" /></a>
            <div class="qy-hp-partyRnd-pScrollCont">
              <ul class="qy-hp-partyRnd-pScroll" >
              {foreach from=$hot_activity_list item=v key=k}
                <li><a href="/index.php/browse_act/detail/{$v.aid}"><img src="{$v.thumb}" />{$v.SUBJECT|truncate:25:'...'}</a></li>
              {/foreach}   
              </ul>
            </div>
          </div>
        </div>
        <div class="splite-mx" ></div>
        <div class="qy-hp-articlesRnd">
          <div class="qy-hp-aR-ext1">
            <div class="qy-hp-membercommend-titcol"> <span class="qy-hp-membercommend-caption"><b>幸福周刊</b></span> <span class="qy-hp-moreinfo-rlistX"><a href="/index.php/space/articles/publits/8/1">更多></a></span> </div>
            <div class="qy-hp-articlesRnd-uitemshow"> <img  /><b><a href="#">{$secweekly[0].title|truncate:15:'.'}</a></b>
              <p>{$secweekly[0].description|truncate:42:'...'}</p>
              <ul class="qy-hp-articlesRnd-rList" >
              {section loop=$secweekly name=foo start=1}
                <li><a href="#">{$secweekly[foo].title|truncate:13:'.'}</a></li>
              {/section}
              </ul>
            </div>
          </div>
          <div class="qy-hp-aR-ext2">
            <div class="qy-hp-membercommend-titcol"> <span class="qy-hp-membercommend-caption"><b>都市生活</b></span> <span class="qy-hp-moreinfo-rlistX"><a href="/index.php/space/articles/publits/9/1">更多></a></span> </div>
            <div class="qy-hp-articlesRnd-uitemshow"> <img  /><b><a href="#">{$seclifecity[0].title|truncate:15:'..'}</a></b>
              <p>{$seclifecity[0].description|truncate:42:'...'}</p>
              <ul class="qy-hp-articlesRnd-rList" >
              {section loop=$seclifecity name=foo start=1}
                <li><a href="#">{$seclifecity[foo].title|truncate:13:'.'}</a></li>
              {/section}
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="qy-hp-storyRnd">
        <div class="qy-hp-membercommend-titcol"> <span class="qy-hp-membercommend-caption"><b>奇遇故事</b></span>
          <ul id="qy-hp-storyTagChg" class="qy-hp-areaTagswitch">
            <li class="curbright"><a href="###" bys="hot">最热</a></li>
            <li><a href="###" bys="news">最新</a></li>
          </ul>
        </div>
        <ul class="qy-hp-storyRnd-sList">
         {foreach from=$blogMapList item=v key=k}
          <li class="qy-hp-storyRnd-sOpt"> <span class="qy-hp-storyRnd-simg"> <a href="/index.php/browse_blog/map_detail/{$v.blogid}"><img src="{$v.pic}" /></a>
            <p><a href="/index.php/member_info/index/uid/{$v.userid}">{$v.username}</a></p>
            </span> <span class="qy-hp-storyRnd-desc">
            <p class="qy-hp-story-pcaption"><a href="/index.php/browse_blog/map_detail/{$v['blogid']}">{$v['SUBJECT']|truncate:13:'...'} </a></p>
            <p>{$v['message']|truncate:25:'...'}</p>
            </span> <span class="splite-m1"></span> 
          </li>
         {/foreach}   
        </ul>
      </div>
    </div>
  </div>
</div>



 {include file="common/mp_footer.tpl"}
  
</body>
</html>
