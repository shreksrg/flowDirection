<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mymap.css" type="text/css" rel="stylesheet">

<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
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
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">廣告</div>	
		<div class="clearboth"></div>
		
		<!--內文-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="content">					
						<!--新增地圖日誌-->
						<form action="/index.php/blog/map/edit" method="post" enctype="multipart/form-data" >
							<div id="addmap">
								<div class="title font_text2 floatL"><div class="floatL">地圖日誌></div>新增日誌</div>
								<div class="bar"><div></div></div>
								<div class="clearboth"></div>
								<div class="input_container">
									<div class="map_container" id="map_container">
										地圖區塊
									</div>
									<div class="clearboth mg_b"></div>
									<div class="map_search">
										<div class="map_input_label">地點搜索:</div>
										<select name="province" id="province" onchange="scity(this.value);">
							                {foreach $province_list as $v}
							                 <option value="{$v.provinceID}" {if ($province==$v.provinceID)}selected{/if}>{$v.province}</option>
							                {/foreach}
										</select>
										&nbsp;
										<select name="city" id="city" onchange="sarea(this.value)">
											<option value="">請選擇城市</option><option>區域A</option><option>區域B</option>
										</select>
										&nbsp;
										<select name="area" id="area">
											<option value="">請選擇區域</option><option>區域A</option><option>區域B</option>
										</select>
										<div class="clearboth mg_b"></div>
										<div class="map_input_label">輸入地點名稱:</div><input type="text" id="detail_address" value="{$detail_address}" class="map_input_text">
										<button class="positionBtn" onclick="position();return false;"></button>
										<div class="clearboth"></div>
									</div>
									<div class="borderbtm"></div>
									<div class="map_input_label">日誌標題:</div><input type="text" name="subject" value="{$map.SUBJECT}" class="map_input_text">
									<div class="clearboth mg_b"></div>
									<div class="map_input_label">類型:</div>
									<input type="radio" name="blog_type" value="1" {if $map.tag == '1'}checked="checked"{/if} class="input_type">旅游&nbsp;&nbsp;
									<input type="radio" name="blog_type" value="2"  {if $map.tag == '2'}checked="checked"{/if} class="input_type">美食&nbsp;&nbsp;
									<input type="radio" name="blog_type" value="3"  {if $map.tag == '3'}checked="checked"{/if} class="inputg_type">娱乐&nbsp;&nbsp;
									<div class="clearboth mg_b"></div>
									<div class="map_input_label map_content">日誌內容:</div><textarea name="content" class="input_textarea">{$map.message}</textarea>
                                    <input type="hidden" value="{$map.blogid}" name="blogid" >
                                    <input type="hidden" value="{$province}" name="input_province" id="input_province"/>
							<input type="hidden" value="{$city}" name="input_city" id="input_city"/>
							<input type="hidden" value="{$area}" name="input_area" id="input_area"/>
							<input type="hidden" value="{$detail_address}" name="input_detail_address" id="input_detail_address"/>
							
							<input name="pic" type="hidden" value="{$map.pic}">
									<div class="clearboth mg_b"></div>
									<div class="borderbtm"></div>
									<div class="map_input_label">上傳日誌照片:</div><input name="cover_img" type="file">
									<div class="clearboth mg_b"></div>
									<div class="upload_msg">圖片必須小於1MB,並僅支援png、jpg和gif(無動畫)格式</div>
									<div class="map_upload_pic">
									<div class="pics">
											<img src="{$map.pic}" class="img_L">
										</div>
											
									</div>
									<div class="clearboth mg_b"></div>
								</div>
								<div class="clearboth"></div>
								<div class="borderbtm"></div>
								<button class="postBtn" type="submit"  value="发布"/>
								<div class="clearboth"></div>
							</div>
							
						</form>
						<div class="clearboth"></div>
						
					</div><!--內文end-->
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
	</div>
	<div class="clearboth"></div>
</div>
<!--contentEnd-->
<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
<script type="text/javascript" src="/static/js/blog/map_position.js"></script>
<script type="text/javascript" src="/static/js/blog/city.js"></script>
<script language="javascript">scity("","");</script>
<script type="text/javascript">
    show_map("{$city}","{$detail_address}");
</script>
</html>