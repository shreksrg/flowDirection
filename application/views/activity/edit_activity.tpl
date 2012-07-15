<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑活动</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myactivity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/myactivity.js"></script>
<script src="/static/js/pca.js"></script>
<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	DD_belatedPNG.fix('.png_bg');
	$.ie6hover();
</script>
<![endif]--> 

</head>
<body onload="getcitys('city2','{$province}')">
<div id="main">
<!--headerEnd-->

{include file="common/header.tpl"}
<!--contentBegin-->
<div id="content">
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
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">广告</div>	
		<div class="clearboth"></div>
		
		<!--发起活动-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title">我的活动</div>
					<div class="main_menu">
						<ul>
							<li class="act_apply"><a href="/index.php/activity/my_in/index">我参加的活动</a></li>
							<li class="act_hold selected"><a href="/index.php/activity/my_launch/index" class="selected">我发起的活动</a></li>
							<li class="act_add"><a href="/index.php/activity/index/create">发起活动</a></li>
							<li class="act_watch"><a href="/index.php/activity/my_attention/index">关注的活动</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
                   
						<div id="addact">
                         
							<div class="title font_text2">编辑活动</div>
							<div class="bar"><div></div></div>
							<div class="clearboth mg_b"></div>
                            <script src="/static/js/display/calendar.js"></script>
							<form action="/index.php/activity/index/edit_activity_act" method="post" enctype="multipart/form-data" onsubmit="return checksubmit()">
								<div class="input_container mg_t">
									<ul>
										<li>
											<div class="newact_label">活动名称：</div>
											<input type="text" id="activity_name" class="act_input_text" name="SUBJECT" value="{$info.SUBJECT}"><div id="activity_name_s"></div>
										</li>
                                        
                                        <li>
											<div class="newact_label">活动地区：</div>	
											<select id="city1" name="province" onChange="changepro('city2','city1')">
                                                <option value="">省/直辖市</option>
                                                {foreach from=$province_select item=v key=k}
                                                    <option value="{$v.province}" {$v.selected}>{$v.province}</option>
                                                {/foreach}
                                                </select>&nbsp;&nbsp;
                                                <select name="city" id="city2">
                                                    {if $city!=''}<option value="{$city}">{$city}</option>{/if}
                                                    <option value="">請選擇城市</option>
                                            </select> 
                                			<div id="activityarea_show" class="checked_container"></div>
										</li>
                                        
										<li>
											<div class="newact_label">活动地點：</div>	
											<input type="text" id="activity_position" class="act_input_text" name="place" value="{$info.place}"><div id="activity_place_s"></div>
										</li>
                                        
                                        	<li><div class="newact_label">活动开始时间：</div><input type="text" id="activity_s_date" class="act_input_text" name="times" value="{$info.times}" onClick="new Calendar().show(document.getElementById('activity_s_date'));" style="cursor:pointer;"><select name="hour_s_s">{$s_hour}</select>点<select name="mini_s_s">{$s_mini}</select><div id="activity_stimes_s"></div></li>
                                        <li><div class="newact_label">活动结束时间：</div><input type="text" id="activity_e_date" class="act_input_text" name="etimes" value="{$info.etimes}" onClick="new Calendar().show(document.getElementById('activity_e_date'));" style="cursor:pointer;"><select name="hour_e_s">{$e_hour}</select>点<select name="mini_e_s">{$e_mini}</select><div id="activity_etimes_s"></div></li>
                                        
										<!--<li>
											<div class="newact_label">活动时间：</div>	
											<input type="text" id="activity_date" class="act_input_text" name="times" value="{$info.times}"><div id="activity_times_s"></div>
										</li>-->
                                        <li>
											<div class="newact_label">报名截止时间：</div>	
											<input type="text" id="lasttime" class="act_input_text" name="lasttime" value="{$info.lasttime|date_format:"%Y-%m-%d"}" onClick="new Calendar().show(document.getElementById('lasttime'));" style="cursor:pointer;"><div id="activity_lasttime_s"></div>
										</li>
										<li>
											<div class="newact_label">活动类型：</div>
											<select name="class" id="activity_class">
												<option value="">请选择活动类型</option>
                                                <option value="品尝美食" {if ($info.class=='品尝美食')}selected="selected"{/if} >品尝美食</option>
                                                <option value="户外休闲" {if ($info.class=='户外休闲')}selected="selected"{/if} >户外休闲</option>
                                                <option value="运动健身" {if ($info.class=='运动健身')}selected="selected"{/if} >运动健身</option>
                                                <option value="室内活动" {if ($info.class=='室内活动')}selected="selected"{/if}>室内活动</option>
                                                <option value="恬静阅读" {if ($info.class=='恬静阅读')}selected="selected"{/if} >恬静阅读</option>
											</select><div id="activity_class_s"></div>
										</li>
										<li>
											<div class="newact_label">費用備註：</div>
											<select name="cost" id="activity_cost">
												<option value="">请选择费用备注</option>
                                                <option value="0-50元" {if ($info.cost=='0-50元')}selected="selected"{/if}>0-50元</option>
                                                <option value="50-100元" {if ($info.cost=='50-100元')}selected="selected"{/if}>50-100元</option>
                                                <option value="100-200元" {if ($info.cost=='100-200元')}selected="selected"{/if}>100-200元</option>
                                                <option value="200-300元" {if ($info.cost=='200-300元')}selected="selected"{/if}>200-300元</option>
                                                <option value="300-400元" {if ($info.cost=='300-400元')}selected="selected"{/if}>300-400元</option>
                                                <option value="400-500元" {if ($info.cost=='400-500元')}selected="selected"{/if}>400-500元</option>
                                                <option value="500元以上" {if ($info.cost=='500元以上')}selected="selected"{/if} >500元以上</option>
											</select><div id="activity_cost_s"></div>
										</li>
										<li>
											<div class="newact_label">支付方式：</div><input type="text" id="activity_paytype" class="act_input_text" name="paytype" value="{$info.paytype}"><div id="activity_paytype_s"></div>
										</li>
										<li>
											<div class="newact_label">查詢手机：</div><input type="text" id="activity_phone" class="act_input_text" value="{$info.phone}" name="phone"><div id="activity_phone_s"></div>
										</li>
										<li>
											<div class="newact_label act_content">活动介紹：</div>
											<textarea id="activity_intro" class="act_input_textarea" name="description">{$info.description}</textarea>
										</li>
                                        <li>
											<div class="newact_label">是否关闭活动：</div><input type="checkbox" value="1" name="status" {if ($info.status=='1')}checked{/if}/>
										</li>
                                        
									</ul>
									<div class="clearboth borderbtm"></div>
									<div class="newact_label">上傳活动图片：</div><input type="file" name="pic" id="pic"> 
									<div class="msg">图片必須小於1MB,並僅支援png、jpg和gif(無动畫)格式</div>
									<div class="clearboth mg_b"></div>
									<div class="act_upload_pic" id="act_upload_pic">
                                     
									{foreach from=$pic_list item=v key=k}
                                        <div class="pic">
                                          <img src="/data/attachment/album/{$v.filepath}" class="img_L">
										  <div class="delete" onclick="delete_act_photo('{$v.picid}','{$albumid}')">X刪除</div>	
										</div>
                                    {/foreach}  	
										
									</div>
									<div class="clearboth borderbtm"></div>
									<div class="btns">
										<input type="button" class="cancelBtn" onclick="location.href='/index.php/activity/index/edit_activity_act';">
                                        <input type="hidden" value="{$info.aid}" name="aid" />
										<input type="submit" class="confirmBtn">
									</div>
								</div>
							</form>
						</div>
						<div class="clearboth"></div>
						
					</div><!--內文end-->
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>				
						
						
				
	</div><!--右方区块結束-->
	<div class="clearboth"></div>
</div>
<!--contentEnd-->
<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>
















