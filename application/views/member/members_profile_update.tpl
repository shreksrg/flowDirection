<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人设置</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mysetting.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>

<script src="/static/js/pca.js"></script>
<script src="/static/js/ymd.js"></script>

<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	DD_belatedPNG.fix('.png_bg');
	$.ie6hover();
</script>
<![endif]--> 


</head>
<body onload="getcitys('city2','{$regprovince}')">
<div id="main">
<!--headerEnd-->

	{include file="common/header.tpl"}

<div id="content"><!--contentBegin-->
	<!--左方選單-->
	{include file="common/left.tpl"}
	<!--右方区快-->
	<div class="floatL mg_b">
		<div id="mypaliie_tip_container" class="mg_b mg_r">
			<div id="mypaliie_tip_left" class="floatL png_bg"></div>
			<div id="mypaliie_tip_center" class="floatL png_bg">
				<div id="mypaliie_tip_icon" class="floatL png_bg"></div>
				<div id="mypaliie_tip_text" class="floatL">tipTEXT</div>
				<div id="mypaliie_tip_knowmore" class="floatR">>>了解更多</div>
			</div>
			<div id="mypaliie_tip_right" class="floatL png_bg"></div>
		</div>
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">廣告</div>	
		<div class="clearboth"></div>
		
		<!--內文-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title">个人设置</div>
					<div class="main_menu">
						<ul>
							<li class="selected" onclick="location.href='/index.php/member/index/info'">我的资料</li>
							<li onclick="location.href='/index.php/member/set_habits/index'">生活习性</li>
							<li onclick="location.href='/index.php/member/set_interests/index'">兴趣爱好</li>
							<li onclick="location.href='/index.php/member/set_description/index'">个人描述</li>
							<!--<li><a href="/index.php/member/set_photo/index">生活照展示</a></li>-->
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
                    
                    <form action="/index.php/member/index/update" method="post" enctype="multipart/form-data" onsubmit="return checksubmit()">
					<div class="content">
						<ul>
							<li class="data selected">
								<div class="title">基本资料</div>
								<div class="edit font_text2">&nbsp;</div>
								<div class="clearboth"></div>
								<div class="bar"><div></div></div><div class="clearboth"></div>
								<div class="label">PALIIE ID:</div><div class="text">{$member.userid}</div><div class="clearboth"></div>
								<div class="label">昵称:</div><div class="text"><input type="text" value="{$member_profile.nickname}" name="nickname" id="nickname"/></div><div id="nickname_show" class="checked_container"></div><div class="clearboth"></div>
								<div class="label">性别:</div><div class="text"><input type="radio" value="0" name="gender"  {if $member_profile.gender==0}checked="checked"{/if}/>&nbsp; 男&nbsp; &nbsp; <input type="radio" value="1" name="gender"  {if $member_profile.gender==1}checked="checked"{/if}/>&nbsp; 女</div><div class="clearboth"></div>
								<div class="label">生日:</div><div class="text"><select name="birthyear" id="birthyear" onchange="year(this.value)">{$yearoption}</select>&nbsp;&nbsp;-&nbsp;&nbsp;<select name="birthmonth" id="birthmonth" onchange="month(this.value)">{$monthoption}</select>&nbsp;&nbsp;-&nbsp;&nbsp;<select name="birthday" id="birthday">{$dayoption}</select>
                                </div><div class="clearboth"></div>
                                
                                
								<div class="label">身高:</div>
                                <div class="text">       
                                    <select name="height">
                                        {foreach from=$height item=v key=k}
                                        	<option value="{$k}" {$v.selected}>{$v.height}</option>
                                        {/foreach}  	
                                    </select>
                                </div>
                                <div id="height_show" class="checked_container"></div><div class="clearboth"></div>
                                
                                
								<div class="label">体重:</div>
                                <div class="text">
                                	
                                    <select name="weight">
                                		{foreach from=$weight item=v key=k}
                                        	<option value="{$k}" {$v.selected}>{$v.weight}</option>
                                        {/foreach}  	
                                    </select>
                                </div>
                                <div id="weight_show" class="checked_container"></div><div class="clearboth"></div>
                                
                                <div class="label">学历:</div>
                                <div class="text">
                                	
                                    <select name="education">
                                		{foreach from=$education item=v key=k}
                                        	<option value="{$k}" {$v.selected}>{$v.education}</option>
                                        {/foreach}  	
                                    </select>
                                </div>
                                <div id="weight_show" class="checked_container"></div><div class="clearboth"></div>
                                
                                
                                
								<div class="label">所在地区:</div><div class="text">
                                <select name="regprovince" id="city1" onChange="changepro('city2','city1')">
                                <option value="">省/直辖市</option>
                                {foreach from=$province item=v key=k}
                                	<option value="{$v.regprovince}" {$v.selected}>{$v.regprovince}</option>
                                {/foreach}
                                </select>&nbsp;&nbsp;
                                <select name="regcity" id="city2">
                                	{if $regcity!=''}<option value="{$regcity}">{$regcity}</option>{/if}
                                	<option value="">請選擇城市</option>
                                </select> 
                                </div>
                                <div class="clearboth"></div>
								
                                
                                <div class="label">婚姻状况:</div>
                                <div class="text">
                                	<select name="marital">
                                    	{foreach from=$marital item=v key=k}
                                        	<option value="{$k}" {$v.selected}>{$v.marital}</option>
                                        {/foreach}  	
                                	</select>
                                </div>
                                <div class="clearboth"></div>
								
                                
                                <div class="label">民族:</div>
                                <div class="text">
                                <select name="nation">
                                	{foreach from=$nation item=v key=k}
                                        <option value="{$k}" {$v.selected}>{$v.nation}</option>
                                    {/foreach}  	
                                </select>
                                </div>
                                <div class="clearboth"></div>
                                
                                
                                
								<div class="clearboth"></div>
								<div class="title">联系方式</div>
								<div class="clearboth"></div>
								<div class="bar mg_b"><div></div></div>
								<div class="clearboth"></div>
								<div class="label">注册邮箱:</div><div class="text">{$member.email}</div><div class="clearboth"></div>
								<div class="label">手机号:</div><div class="text"><input type="text" value="{$member_profile.mobile}" name="mobile" id="mobile" /></div><div id="mobile_show" class="checked_container"></div><div class="clearboth"></div>
								<div class="label">QQ:</div><div class="text"><input type="text" value="{$member_profile.qq}" name="qq" id="qq" /></div><div id="qq_show" class="checked_container"></div><div class="clearboth"></div>
								<div class="btn_container">
									<div class="save btn"></div>
									<div class="cancel btn"></div>
								</div>
							</li>	
						</ul>
					</div>
                    <input type="hidden" value="{$member.userid}" name="member_id" />
                    <button type="submit" class="saveBtn"></button>
                    </form>
                    
                    
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
			
			
		</div>
	</div>
	<div class="clearboth"></div>
</div><!--contentEnd-->
<!--footerBegin-->

{include file="common/footer.tpl"}

<!--footerEnd-->
</div>
</body>
</html>
