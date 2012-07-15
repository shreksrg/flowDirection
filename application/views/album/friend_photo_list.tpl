<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
							<li class="album_friend"><a href="/index.php/album/index/">個人相冊</a></li>
							<li class="album_user selected"><a href="/index.php/album/friend_album/index">朋友相冊</a></li>
							<li class="album_act"><a href="/index.php/album/activity_album/index">活動相冊</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
					
						<!--個人相冊內容-->
						<div id="album_content">
							<div class="back_to_myalbum"><a class="myalbum">好友相冊</a>></div>
							<div class="album_name">{$friendAlbumInfo.albumname}</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div id="album_pic_list">
								<ul>
                                
                                {foreach from=$friendPhotoList item=v key=k}
									<li>
										<div class="pic_img"><a href="/index.php/album/friend_album/friend_photo_show/albumid/{$friendAlbumInfo.albumid}/friendid/{$v.userid}/picid/{$v.picid}"><img src="/data/attachment/album/{$v.filepath}" class="img_M"></a></div>
										<div class="pic_name">{$v.albumname}</div>
									</li>
                                {/foreach}     
                             
								</ul>
								
								<div class="clearboth"></div>
								<div class="album_intro">{$friendAlbumInfo.description}</div>
							</div>
							<div class="clearboth"></div>
							<div class="album_comment_container">
								<div class="album_comment_input">
									<img src="/static/images/testpic.jpg"><textarea></textarea><div class="btn">發表</div>
								</div>
								<div class="clearboth"></div>
								<div class="album_comments">
									<ul>
										<li>
											<div class="pic"><img src="/static/images/testpic.jpg" class="comment_pic"></div>
											<div class="data">
												<div class="name">評論人</div>
												<div class="comment_content">回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容回應內容</div>
												<div class="date">11月11日</div>
												<div class="time">11:11</div>
											</div>
											<div class="delete">x</div>
										</li>
										<li>
											<div class="pic"><img src="/static/images/testpic.jpg" class="comment_pic"></div>
											<div class="data">
												<div class="name">評論人</div>
												<div class="comment_content">回應內容</div>
												<div class="date">11月11日</div>
												<div class="time">11:11</div>
											</div>
											<div class="delete">x</div>
										</li>
										<li>
											<div class="pic"><img src="/static/images/testpic.jpg" class="comment_pic"></div>
											<div class="data">
												<div class="name">評論人</div>
												<div class="comment_content">回應內容回應內容回應內容回應內容回應內容回應內容回應內容</div>
												<div class="date">11月11日</div>
												<div class="time">11:11</div>												
											</div>
											<div class="delete">x</div>
										</li>
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
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