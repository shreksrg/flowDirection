<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动相册</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myalbum.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.fancybox-1.3.4.pack.js"></script>
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
					<div class="main_title">活動相冊</div>
					<div class="main_menu">
						<ul>
							<li class="album_user" onclick="location.href='/index.php/album/index/index'">我的照片s</li>
							<li class="album_act selected" onclick="location.href='/index.php/album/activity_album/index'">活動相冊</li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
					
						<!--個人相冊內容-->
						<div id="album_content">
							<div class="back_to_myalbum"><a class="myalbum">活動相冊</a>></div>
							<div class="album_name">{$activityAlbumInfo.albumname}</div>
							<div class="addpicbtn" onclick="initFloatTips_photo('album_pic_add_window')"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div id="album_pic_list">
								<ul>
                                
                                
                                 {foreach from=$activityPhotoList item=v key=k}
									<li>
										<div class="pic_img"><a rel="activepic_group" href="/data/attachment/album/{$v.filepath}" title="{$v.title}"><img src="/data/attachment/album/{$v.filepath}" class="img_M"></a></div>
										<div class="pic_name">{$v.title}</div>
									</li>
                                 {/foreach}       							
								</ul>
								
								<div class="clearboth"></div>
								<div class="album_intro">{$activityAlbumInfo.description}</div>
							</div>
							<div class="clearboth"></div>
						
                        	
                            <form action="/index.php/album/activity_album/post_activity_photo" method="post" enctype="multipart/form-data">
                            <div id="album_pic_add_window" style="display:none">
                                <div class="window_container">
                                    <div class="window_title_bar">
                                        <div class="window_title">新增相片</div>
                                        <div class="window_close" onClick="initFloatTipsClose('album_pic_add_window')"></div>
                                    </div>
                                    <div class="window_content">
                                        <div class="pics_upload"><label>上傳照片</label><input type="file" name="pic"></div>	
                                        <div class="clearboth"></div>		
                                        <div class="msg">圖片必須小於1MB,並僅支援png、jpg和gif(無動畫)格式</div>
                                        <div class="clearboth"></div>
                                        <div class="pics_upload"><label>相片标题</label><input type="text" name="title"></div>	
                                        <div class="clearboth"></div>
                                        <div class="pics_upload"><label>相片描述</label><textarea cols="35" rows="2" name="description"></textarea></div>	
                                        <div class="clearboth"></div><br />
                                        <button type="submit" class="confirmBtn"></button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{$activityAlbumInfo.albumid}" name="albumid" />
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
	</div>
	<div class="clearboth"></div>
</div>
<!--contentEnd-->

<!--相冊彈出視窗-->

<div id="album_pic_edit_window"></div>

<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>

<script>
$("a[rel=activepic_group]").fancybox({
				'titlePosition'	: 'inside'
});
</script>
