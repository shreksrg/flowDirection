<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.persetting.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.setting-interest.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
   {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
   {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">
      <div class="qy-leaguer-rplateCont">
        <div class="qy-mpcommonTag-headertit"> <b class="qy-mpcommonTag-caption">我的资料</b>
          <ul class="qy-mpcommonTag-switchTags">
            <li><a href="/index.php/member/index/info">基本资料</a></li>
            <li class="cursection">兴趣爱好</li>
            <li><a href="/index.php/member/set_description/index">个人独白</a></li>
          </ul>
        </div>
        <style>
			
        </style>
        <form method="post" class="frm-Persetting" action="/index.php/member/set_interests/update">
          <div class="qy-persetting-archives">
            <h2 class="qy-persetting-optcaption">生活信息</h2>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-persetting">
              <tr>
                <td width="68">个&nbsp;&nbsp;&nbsp; 性：</td>
                <td width="288"><label for="textfield"></label>
                  <select name="gx" id="personality">
                   {foreach from=$gx item=v key=k}
                    <option value="{$k}">{$v.gx}</option>
                    {/foreach}   
                    
                </select></td>
                <td width="6">&nbsp;</td>
                <td width="68">作息习惯：</td>
                <td width="188"><select name="life_habits" id="habit">
                {foreach from=$habit item=v key=k}
                  <option value="{$k}">{$v.habit}</option>
                 {/foreach}    
                  
                </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>吸&nbsp;&nbsp;&nbsp; 烟：</td>
                <td><select name="smoke" id="smoke">
                {foreach from=$smoke item=v key=k}
                  <option value="{$k}">{$v.smoke}</option>
                {/foreach}      
                </select></td>
                <td>&nbsp;</td>
                <td>饮&nbsp;&nbsp;&nbsp; 酒：</td>
                <td>
                  <select name="drink" id="drink">
                  {foreach from=$drink item=v key=k} 
                    <option value="{$k}">{$v.drink}</option>
                 {/foreach}   
                </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>家&nbsp;&nbsp;&nbsp; 务：</td>
                <td><select name="housework" id="housework">
                {foreach from=$housework item=v key=k} 
                  <option value="{$k}">{$v.housework}</option>
                {/foreach}     
                  
                </select></td>
                <td>&nbsp;</td>
                <td>厨&nbsp;&nbsp;&nbsp; 艺：</td>
                <td><select name="cooking" id="cooking">
                
                 {foreach from=$cooking item=v key=k} 
                  <option value="{$k}">{$v.cooking}</option>
                {/foreach}     
                  
                </select></td>
                <td>&nbsp;</td>
              </tr>
            </table>
            <table class="tb-persetting"  border="0" cellspacing="0" cellpadding="0" style="margin-top:0">
              <tr>
                <td width="68" valign="top" style=" padding-top:10px;_padding-top:4px">生活技能：</td>
                <td colspan="5"><ul class="qy-interest-skillsopts">
                
                {foreach from=$skills item=v key=k} 
                    <li>
                      <input name="optSkill[]" type="checkbox" value="{$k}" />
                      {$v.skills}
                    </li>
                {/foreach}      
                    
                  </ul></td>
              </tr>
            </table>
            <h2 class="qy-persetting-optcaption">兴趣爱好</h2>
            <table  border="0" cellspacing="0"  class="tb-persetting" style="width:568">
              <tr>
                <td colspan="3"><ul class="qy-interest-interestsopts">
                 {foreach from=$ah item=v key=k} 
                
                    <li>
                      <input name="optInter[]" type="checkbox" value="{$k}" />
                      {$v.love}</li>
               {/foreach}         
                  </ul></td>
              </tr>
              <input id="rtnValue" name="" type="hidden" value="{$rtnValue}" />
              <input type="hidden" value="{$member_profile.userid}" name="member_id" />
            </table>
            <input type="submit" class="qy-persetting-btnSubmit" value="" />
          </div>
        </form>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"}
</div>
</body>
</html>
<script>

</script>