<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增活动</title>
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


<script src="/static/js/calendar/myDatePicker/WdatePicker.js"> </script>
<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	DD_belatedPNG.fix('.png_bg');
	$.ie6hover();
</script>
<![endif]--> 



</head>
<body>
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
							<li class="act_hold"><a href="/index.php/activity/my_launch/index">我发起的活动</a></li>
							<li class="act_add selected"><a href="/index.php/activity/index/create" class="selected">发起活动</a></li>
							<li class="act_watch"><a href="/index.php/activity/my_attention/index">关注的活动</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<div id="addact">
							<div class="title font_text2">发起活动</div>
							<div class="bar"><div></div></div>
							<div class="clearboth mg_b"></div>
                            
							<form action="/index.php/activity/index/create" method="post" enctype="multipart/form-data" onsubmit="return checksubmit()">
								<div class="input_container mg_t">
									<ul>
										<li><div class="newact_label">活动名称：</div><input type="text" id="activity_name" class="act_input_text" name="SUBJECT"><div id="activity_name_s"></div></li>
                                        <li><div class="newact_label">活动地区：</div>
                                        <div class="select_container"><select id="city1" name="province" onChange="changepro('city2','city1')"><option value="" selected>省/直辖市</option><option value="北京市">北京市</option><option value="天津市">天津市</option><option value="河北省">河北省</option><option value="山西省">山西省</option><option value="内蒙古区">内蒙古区</option><option value="辽宁省">辽宁省</option><option value="吉林省">吉林省</option><option value="黑龙江省">黑龙江省</option><option value="上海市">上海市</option><option value="江苏省">江苏省</option><option value="浙江省">浙江省</option><option value="安徽省">安徽省</option><option value="福建省">福建省</option><option value="江西省">江西省</option><option value="山东省">山东省</option><option value="河南省">河南省</option><option value="湖北省">湖北省</option><option value="湖南省">湖南省</option><option value="广东省">广东省</option><option value="广西区">广西区</option><option value="海南省">海南省</option><option value="重庆市">重庆市</option><option value="四川省">四川省</option><option value="贵州省">贵州省</option><option value="云南省">云南省</option><option value="西藏区">西藏区</option><option value="陕西省">陕西省</option><option value="甘肃省">甘肃省</option><option value="青海省">青海省</option><option value="宁夏区">宁夏区</option><option value="新疆区">新疆区</option><option value="台湾省">台湾省</option><option value="香港特区">香港特区</option><option value="澳门特区">澳门特区</option></select>&nbsp;&nbsp;<select name="city" id="city2"  onChange="check_area()"><option value="">請選擇城市</option></select></div><div id="activityarea_show" class="checked_container"></div></li>
										<li><div class="newact_label">活动地點：</div><input type="text" id="activity_position" class="act_input_text" name="place"><div id="activity_place_s"></div></li>
										<li><div class="newact_label">活动开始时间：</div><input style="cursor:pointer;" class="act_input_text Wdate" name="times" type="text" id="activity_s_date" onFocus="WdatePicker()"/><select name="hour_s_s">{$hour}</select>点<select name="mini_s_s">{$mini}</select><div id="activity_stimes_s"></div></li>
                                        <li><div class="newact_label">活动结束时间：</div><input style="cursor:pointer;" class="act_input_text Wdate" name="etimes_" type="text" id="activity_e_date" onFocus="WdatePicker()"/><select name="hour_e_s">{$hour}</select>点<select name="mini_e_s">{$mini}</select><div id="activity_etimes_s"></div></li>
                                        <li><div class="newact_label">报名截止时间：</div><input style="cursor:pointer;" class="act_input_text Wdate" name="lasttime" type="text" id="lasttime" onFocus="WdatePicker()"/><div id="activity_lasttime_s"></div></li>
										<li><div class="newact_label">活动类型：</div><select name="class" id="activity_class"><option value="">请选择活动类型</option><option value="品尝美食">品尝美食</option><option value="户外休闲">户外休闲</option><option value="运动健身">运动健身</option><option value="室内活动">室内活动</option><option value="恬静阅读">恬静阅读</option></select><div id="activity_class_s"></div></li>
										<li><div class="newact_label">費用備註：</div><select name="cost" id="activity_cost"><option value="">请选择费用备注</option><option value="0-50元">0-50元</option><option value="50-100元">50-100元</option><option value="100-200元">100-200元</option><option value="200-300元">200-300元</option><option value="300-400元">300-400元</option><option value="400-500元">400-500元</option><option value="500元以上">500元以上</option></select><div id="activity_cost_s"></div></li>
										<li><div class="newact_label">支付方式：</div><input type="text" id="activity_paytype" class="act_input_text" name="paytype"><div id="activity_paytype_s"></div></li>
										<li><div class="newact_label">查詢手机：</div><input type="text" id="activity_phone" class="act_input_text" name="phone"><div id="activity_phone_s"></div></li>
										<li><div class="newact_label act_content">活动介紹：</div><textarea id="activity_intro" class="act_input_textarea" name="description" ></textarea></li>
									</ul>
									<div class="clearboth borderbtm"></div>
									<div class="newact_label">上傳活动图片：</div><input type="file" name="pic" id="pic">
									<div class="msg">图片必須小於1MB,並僅支援png、jpg和gif(無动畫)格式</div>
									<div class="clearboth mg_b"></div>
									<div class="act_upload_pic" id="act_upload_pic">
                                   		
                                   
									</div>
                                      
                                    
									<div class="clearboth borderbtm"></div>
									<div class="btns">
										<button type="submit" class="postBtn"></button>
									</div>
								</div>
                                <input type="hidden" value="1" name="act" />
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