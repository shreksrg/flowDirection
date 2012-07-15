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

<!--[if IE 6]>
<script src="/js/iepngfix/belatedPNG.js"></script>
<script src="/js/ui/jquery.ie6hover.js"></script>
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
							<li class="album_user selected" onclick="location.href='/index.php/album/index/index'">我的照片</li>
							<li class="album_act" onclick="location.href='/index.php/album/activity_album/index'">活动相冊</li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<ul>
				
							<li class="life_pic">
								<div class="title">我的形象照</div>
								<div class="clearboth"></div>
								<div class="bar"><div></div></div><div class="clearboth"></div>
								<div class="floatL mg_t mg_r"><iframe src="{site_url('member/avatar')}" width="756px" height="344px" frameborder="0" scrolling="no"></iframe>
</div>
								<div class="floatL mg_t" style="width:400px;">
									<a class="font_text3">有照片的会员，更能受到其他会员的关注哦！</a>
									<p>
										图片必须小于1MB,并仅支援png、jpg和gif(无动画)格式<br>
										您可以上传新的图片取代现有个人形象照<br>
										越清楚的照片能越有效让奇遇会员注意到你哦<br><br>
									</p>
									
								</div>
								<div class="clearboth"></div>
							</li>
						</ul>
                        
<form action="{site_url('member/set_photo/create_my_album')}" method="post"  enctype="multipart/form-data">
<div id="album_add_window" style="display:none">
	<div class="window_container">
		<div class="window_title_bar">
			<div class="window_title">新增相冊</div>
			<div class="window_close" onClick="initFloatTipsClose('album_add_window')"></div>
		</div>
		<div class="window_content">
			<div class="pics_upload"><label>上傳照片</label><input type="file" name="thumb"></div>	
			<div class="clearboth"></div>		
			<div class="msg">圖片必須小於1MB,並僅支援png、jpg和gif(無動畫)格式</div>
			<div class="clearboth"></div>
			<div class="borderbtm"></div>
			<div class="input_container">
				<div class="input">
					<label>相冊標題:</label>
                    个性生活照
					<input type="hidden" name="albumname" value="个性生活照">
				</div>
				<div class="clearboth"></div>
				<div class="input">
					<label>相冊說明:</label>
					<textarea name="description"></textarea>
				</div>
				<div class="clearboth"></div>
				<div class="privacyBtn">
					<div class="select">
						<div class="bg1">
                         <select name="picflag">
                        	<option value="0">全部開放</option>
                            <option value="1">全部隱藏</option>
                        </select>
							
						</div>
						<div class="bg2"></div>
					</div>
				</div>			
				<div class="clearboth"></div>
				<button type="submit" class="confirmBtn"></button>
			</div>
		</div>
	</div>
</div>
<input type="hidden" value="1" name="act" />
</form>
                        
      <form action="{site_url('member/set_photo/post_my_photo')}" method="post" enctype="multipart/form-data">
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
            <button type="submit" class="confirmBtn"></button>
		</div>
	</div>
</div>
<input type="hidden"  name="albumid"  id="albumid"/>
</form>                  
					</div>
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