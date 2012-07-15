<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的相册</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myalbum.css" type="text/css" rel="stylesheet">
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
					<div class="main_title">我的相冊</div>
					<div class="main_menu">
						<ul>
							<li class="album_user selected">個人相冊</li>
							<li class="album_friend"><a href="/index.php/album/friend_album/index">朋友相冊</a></li>
							<li class="album_act"><a href="/index.php/album/activity_album/index">活動相冊</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
					
					
					
						<!--個人相冊列表-->
						<div id="album_user">
							<div class="title font_text2">個人相冊</div>
							<div class="addalbumbtn" onclick="initFloatTips()"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							
							<div id="album_user_list">
								<ul>
                                
                                {foreach from=$myAlbumList item=v key=k}
									<li>
										<div class="album_pic">
											<a href="/index.php/album/index/my_photo_list/albumid/{$v.albumid}"><img src="/data/attachment/album/{$v.thumb}" class="img_L"></a>
											<div class="manage">
												<a class="edit" onclick="edit_album('{$v.albumid}')">編輯</a>
												<a class="add_pic" onclick="initFloatTips3('{$v.albumid}')">新增相片</a>
												<div class="bg"></div>
											</div>
										</div>
										<div class="album_name"><a href="/index.php/album/index/my_photo_list/albumid/{$v.albumid}">{$v.albumname}</a></div>
										<div class="font_text1"><a class="album_pic_value font_text1">{$v.picnum}</a>張照片</div>
									</li>
								{/foreach}  
                                
								</ul>
							</div>
						</div>
                        <div class="clearboth"></div>
                        
                        <form action="/index.php/album/index/create_my_album" method="post"  enctype="multipart/form-data">
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
					<input type="text" name="albumname">
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

<form action="/index.php/album/index/post_my_photo" method="post" enctype="multipart/form-data">
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
<input type="hidden"  name="albumid"  id="albumid"/>
</form>

<form action="/index.php/album/index/edit_my_album_act" method="post"  enctype="multipart/form-data">
<div id="album_edit_window" style="display:none">
	<div class="window_container">
		<div class="window_title_bar">
			<div class="window_title">编辑相冊</div>
			<div class="window_close" onClick="initFloatTipsClose('album_edit_window')"></div>
		</div>
		<div class="window_content">
			
			<div class="clearboth"></div>
			<div class="borderbtm"></div>
			<div class="input_container">
				<div class="input">
					<label>相冊標題:</label>
					<input type="text" name="albumname" id="albumname">
				</div>
				<div class="clearboth"></div>
				<div class="input">
					<label>相冊說明:</label>
					<textarea name="description" id="description"></textarea>
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
<input type="hidden"  name="edit_albumid"  id="edit_albumid"/>
</form>
                        
						<div class="clearboth"></div>
                        <div id="album_friend">
							<div class="title font_text2">最新好友上傳</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div id="album_friend_list">
								<ul>
								<!--朋友列表-->
                                
                                
                                 {foreach from=$friendPhotoList item=v key=k}
									<li>
										<div class="friend_info">
											<img src="/static/images/testpic.jpg" class="img_S">
											<div class="floatL mg_t">
												<div class="friend_name font_memname">{$v.username}</div>
												<div class="mg_t">最近上傳了<a class="upload_value">{$v.countPhoto}</a>張照片</div>
											</div>
											<div class="see_more">查看更多</div>
										</div>
										<div class="clearboth"></div>
										<div class="friend_album_pics">
										<!--相片列表-->
                                         {foreach from=$v.photoList item=v1 key=k1}
											<div class="pic">
												<div class="pic_img"><img src="/data/attachment/album/{$v1.filepath}" class="img_M"></div>
												<div class="clearboth"></div>

												<div class="pic_name">{$v1.title}</div>
											</div>
										  {/foreach}  
										</div>
									</li>
                                  {/foreach}    
                                    
                                    
									
									
									
									
								</ul>
							</div>
						</div>
                        
                        
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