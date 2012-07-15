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
						<div id="mystory">
							<div class="title font_text2 mg_b">奇遇故事</div>
							<div class="addstoryBtn" onclick="window.location.href='/index.php/blog/story/add_story'"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="storylist">
								<ul>
									{foreach from=$storyList item=v key=k}
										<li>										
											<div class="story_date">{$v['dateline']|date_format:"%Y-%m-%d"}</div>
											<div class="borderbtmwhite"></div>
											<div class="story_name" onclick="window.location.href='/index.php/browse_blog/story_detail/{$v['albumid']}'">{$v['albumname']|truncate:20:'.'}</div>
											<div class="story_status">{if $v['STATUS']==1}審核中{else}通過審核{/if}</div>
											<div class="clearboth"></div>
											<img src="{$v['thumb']}" class="img_M">
											<p>{$v['description']|truncate:60}</p>
											<div class="manage"><a href="javascript:void(0);" onclick="delete_row($(this))" id="{$v['albumid']}">刪除</a>｜<a href="/index.php/blog/story/edit_story/{$v['albumid']}">編輯</a></div>
											<div class="clearboth"></div>
										</li>
									{/foreach}
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						
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
<script src="/static/js/blog/blog_index.js"></script>