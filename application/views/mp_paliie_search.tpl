<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/search.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.search.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
    {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    <div class="qy-search-advPosition2"></div>
   
    <div class="qy-search-leftPlate">
      <div class="qy-common-caption"><span class="qy-common-caption-title"><b>会员搜索</b></span></div>
      <form action="/index.php/paliie_search/act_list" method="post" id="form1">
      <table class="qy-search-common-tb" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="72" align="right">我要找 ：</td>
          <td width="23">&nbsp;</td>
          <td><input name="gender" type="radio" value="0" />
            男朋友
            <input name="gender" type="radio" value="1" />
            女朋友</td>
          
        </tr>
        <tr>
          <td align="right"> 所在地区 ：</td>
          <td>&nbsp;</td>
          <td><label for="select"></label>
            <select name="province" id="province1">
            <option value="">选择省份</option>
            </select>
            <select name="city" id="city1">
            <option value="">选择城市</option>
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">年龄 ：</td>
          <td>&nbsp;</td>
          <td><select name="ages1" id="select3">
          <option value="">不限</option>
                                            {foreach from=$member_profile.age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
          
          </select>
          -
         
											<select name="ages2">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
                                            </select>	
										
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"> 身高 ：</td>
          <td>&nbsp;</td>
          <td><select name="height" id="select4">
          <option value="">不限</option>
          {foreach from=$member_profile.height_array item=v key=k}
           <option value="{$k}">{$v.height}</option>
          {/foreach}  	
          
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">民族 ： </td>
          <td>&nbsp;</td>
          <td><select name="nation" id="select5">
          <option value="">不限</option>
          {foreach from=$member_profile.nation_array item=v key=k}
          <option value="{$k}">{$v.nation}</option>
          {/foreach}  	
          
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"> 学历 ：</td>
          <td>&nbsp;</td>
          <td><select name="education" id="select6">
          <option value="">不限</option>
          {foreach from=$member_profile.education_array item=v key=k}
          <option value="{$k}">{$v.education}</option>
          {/foreach}  	
          
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"> 职业 ：</td>
          <td>&nbsp;</td>
          <td><select name="work" id="select7">
          
          <option value="">不限</option>
          {foreach from=$member_profile.career_array item=v key=k}
          <option value="{$k}">{$v.career}</option>
           {/foreach}  	
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"> 婚姻状况 ：</td>
          <td>&nbsp;</td>
          <td><select name="marital" id="select8">
          <option value="">不限</option>
           {foreach from=$member_profile.marital_array item=v key=k}
           <option value="{$k}">{$v.marital}</option>
           {/foreach}  	
          
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"> 形象照 ：</td>
          <td>&nbsp;</td>
          <td><input type="checkbox" name="pic" id="checkbox" value="1"/>
          <label for="checkbox"></label></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="72"><input class="btn-srhcommon" type="submit" value="开始搜索" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>
      <style>
	  </style>
      
       
      <div class="qy-search-quick">
       <form action="/index.php/paliie_search/act_list" method="post" id="form2">
        <div class="qy-search-quick-icon">快速搜索</div>
        <div class="qy-qy-search-quickitem"> <b class="qy-search-Caption">按用户PID搜索</b>
          <p>用户ID：
            <input type="text" class="text" name="username">
          </p>
          <input class="btn-srhquick" value="" type="submit"  />
        </div>
        </form>
        
         <form action="/index.php/paliie_search/act_list" method="post" id="form3">
        <div class="qy-qy-search-quickitem"> <b class="qy-search-Caption">按会员名称搜索</b>
          <ul class="qy-search-quickOpts">
            <li>会员名称
             <input type="text" class="text" name="username">
            </li>
            <li>年龄：
              <select name="ages1" id="selectdd">
          <option value="">不限</option>
                                            {foreach from=$member_profile.age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
          
          </select>
             	<select name="ages2" id="selectdd2">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
                                            </select>	
            </li>
            <li>地区：
              <select name="province" id="province2">
            <option value="">选择省份</option>
            </select>
            <select name="city" id="city2">
            <option value="">选择城市</option>
          </select>
            </li>
          
           
          </ul>
          
          <input class="btn-srhquick" value="" type="submit"  />
        </div>
         </form>
      </div>
    </div>
    <style>
		
    </style>
    
    <div class="qy-search-advPosition3"><img src="/staticx/images/searcher/advimg.jpg" width="238" height="209" /></div>
    <div class="qy-search-rightPlate">
      
      <ul class="qy-member-lstRnd">
         {foreach from=$members_list item=v key=k}
        <li><img src="{$v.avatar_img}"/>{if $v.gender=='0'}男{else}女{/if},{$v.age}岁,{$v.city['city']}</li>
      {/foreach}     
      </ul>
      <span class="splite-m1"></span>
    </div>
    
  </div>
 {include file="common/mp_footer.tpl"}
</div>
</body>
</html>