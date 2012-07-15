<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.persetting.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.setting-basic.js"></script>
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
            <li class="cursection">基本资料</li>
            <li><a href="/index.php/member/set_interests/index">兴趣爱好</a></li>
            <li><a href="/index.php/member/set_description/index">个人独白</a></li>
          </ul>
        </div>
        
        <form method="post" id="frmSetting"  action="/index.php/member/index/update">
          <div class="qy-persetting-archives">
            <h2 class="qy-persetting-optcaption">身份信息</h2>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-persetting">
              <tr>
                <td width="68">用 户 名：</td>
                <td width="312"><label for="textfield"></label>
                <input type="text" disabled="disabled" id="username"  readonly="readonly"  value="{$member_profile.username}"/></td>
                <td width="6">&nbsp;</td>
                <td width="68">性&nbsp;&nbsp;&nbsp; 别：</td>
                <td><p>
                 
                    <input name="gender" type="radio" id="gender" value="0"  {if $member_profile.gender==0}checked="checked"{/if}/>
                    男
                  
                
                    <input type="radio" name="gender" value="1" id="gender" {if $member_profile.gender==1}checked="checked"{/if} />
                    女
                  <br />
                </p></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>出生日期：</td>
                <td><input type="text" class="Wdate" name="birthdate" id="birthdate" onFocus="WdatePicker()" value="{$member_profile.birthdate}" /></td>
                <td>&nbsp;</td>
                <td>身&nbsp;&nbsp;&nbsp; 高：</td>
                <td>
                  <select name="height" id="stature">
                  {foreach from=$height item=v key=k}
                    <option value="{$k}">{$v.height}</option>
                  {/foreach}  
                </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>民&nbsp;&nbsp;&nbsp; 族：</td>
                <td><select name="nation" id="nationality">
                {foreach from=$nation item=v key=k}
                  <option value="{$k}">{$v.nation}</option>
                 {/foreach}   
                </select></td>
                <td>&nbsp;</td>
                <td>体&nbsp;&nbsp;&nbsp; 重：</td>
                <td><select name="weight" id="weight">
                {foreach from=$weight item=v key=k}
                  <option  value="{$k}">{$v.weight}</option>
                  {/foreach}  
                </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>生&nbsp;&nbsp;&nbsp; 肖：</td>
                <td><select name="sx" id="animal">
                {foreach from=$sx item=v key=k}
                  <option value="{$k}">{$v.sx}</option>
                {/foreach}   
                </select></td>
                <td>&nbsp;</td>
                <td>星&nbsp;&nbsp;&nbsp; 座：</td>
                <td>
                
                <select name="sz" id="constellation">
                {foreach from=$sz item=v key=k}
                  <option value="{$k}">{$v.sz}</option>
                {/foreach}   
                </select>
                
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>学&nbsp;&nbsp;&nbsp; 历：</td>
                <td><select name="education" id="education">
                {foreach from=$education item=v key=k}
                  <option value="{$k}">{$v.education}</option>
                 {/foreach}   
                </select></td>
                <td>&nbsp;</td>
                <td>婚姻状况：</td>
                <td><select name="marital" id="marriage">
                {foreach from=$marital item=v key=k}
                  <option value="{$k}">{$v.marital}</option>
                {/foreach}  	   
                </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>居 住 地：</td>
                <td><select name="regprovince" id="province">
                    		<option value="0">选择省份</option>
               			</select>
                    	<select name="regcity" id="city">
						<option value="0">选择城市</option>
               		</select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>毕业院校：</td>
                <td><input name="academy" type="text" id="academy"  value="{$member_profile.academy}"/></td>
                <td>&nbsp;</td>
                <td>从事职业：</td>
                <td><select name="career" id="career">
                {foreach from=$career item=v key=k}
                  <option value="{$k}">{$v.career}</option>
                {/foreach}   
                </select></td>
                <td>&nbsp;</td>
              </tr>
             
             
              
            </table>
         
            <h2 class="qy-persetting-optcaption">联系方式</h2>
            <table  border="0" cellspacing="0"  class="tb-persetting" style="width:568">
              <tr>
                <td width="68">注册邮箱：</td>
                <td width="98"><input name="email" type="text" disabled="disabled" id="email" value="{$member.email}" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>手&nbsp;&nbsp;&nbsp; 机：</td>
                <td><input type="text" name="mobile" id="mobile"  value="{$member_profile.mobile}"/></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>腾讯&nbsp; QQ：</td>
                <td><input type="text" name="qq" id="qq"  value="{$member_profile.qq}"/></td>
                <td>&nbsp;</td>
              </tr>
              <input type="hidden" value="{$member.userid}" name="member_id" />
               <input id="rtnValue" name="" type="hidden" value="{$rtnValue}" />
            </table>
           <!--<input type="submit" value="tijiao" />-->
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
