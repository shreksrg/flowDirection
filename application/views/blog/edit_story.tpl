<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mystory.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
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
					<div class="main_title floatL">奇遇故事</div>					
					<div class="clearboth"></div>
					<div class="content">					
					
						<!--內文-->
						
						<div class="clearboth"></div>
						
						<!--新增故事-->
						<form action="/index.php/blog/story/edit_story" method="post" enctype="multipart/form-data" >
						<div id="addstory">
							<div class="title font_text2 floatL"><div class="floatL">我的故事></div>编辑故事</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="input_container">
								<div class="story_input_label">故事標題:</div><input name="subject" value="{$story.albumname}" type="text" class="story_input_text">
								<div class="clearboth mg_b"></div>
								<div class="story_input_label">類型:</div>
								<input type="radio" name="blog_type" value="0" class="input_type" {if $story.tags =='0'}checked="checked"{/if}>婚戀沙龍&nbsp;&nbsp;
								<input type="radio" name="blog_type" value="1" class="input_type" {if $story.tags =='1'}checked="checked"{/if}>生活點滴&nbsp;&nbsp;
								<input type="radio" name="blog_type" value="2" class="inputg_type" {if $story.tags =='2'}checked="checked"{/if}>溫馨故事&nbsp;&nbsp;
								<input type="radio" name="blog_type" value="2" class="inputg_type" {if $story.tags =='3'}checked="checked"{/if}>趣味小品&nbsp;&nbsp;
								<div class="clearboth mg_b"></div>
								<div class="story_input_label story_content">故事內容:</div><textarea name="content" class="input_textarea">{$story.description}</textarea>
								<div class="clearboth mg_b"></div>
								<div class="borderbtm"></div>
								<div class="story_input_label">上傳故事图片:</div><input name="cover_img" type="file">
								<input name="thumb" type="hidden" value="{$story.thumb}">
								<div class="clearboth mg_b"></div>
								<div class="story_upload_pic">
									 <div class="pics">
										<img src="{$story.thumb}" class="img_L">
									</div>
									<!--<div class="pics">
										<img src="/static/images/testpic.jpg" class="img_L">
										<div class="delete">X刪除</div>
									</div>
									<div class="pics">
										<img src="/static/images/testpic.jpg" class="img_L">
										<div class="delete">X刪除</div>
									</div>
									<div class="pics">
										<img src="/static/images/testpic.jpg" class="img_L">
										<div class="delete">X刪除</div>
									</div>
									<div class="pics">
										<img src="/static/images/testpic.jpg" class="img_L">
										<div class="delete">X刪除</div>
									</div>
									 -->
								</div>
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<input type="hidden" name="albumid" value="{$story.albumid}"></input>
							<button type="submit" value="发布" class="postBtn"/>
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
</html>