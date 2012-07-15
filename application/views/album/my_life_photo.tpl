<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myalbum.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.fancybox-1.3.4.pack.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/myalbum.js"></script>
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
		
		<!--內文-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title floatL">我的相冊</div>
					<div class="main_menu floatL">
						<ul>
							<li class="album_user selected" onclick="location.href='/index.php/album/index/index'">我的照片</li>
							<li class="album_act" onclick="location.href='/index.php/album/activity_album/index'">活动相冊</li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						
							<div class="pagelinks"><a class="currentPage">我的形象照</a></div>
							<div class="clearboth"></div>
							<div class="bar"><div></div></div><div class="clearboth"></div>
							<div class="mainpic" align="center">
								<div class="pic"><img id="mainpic" src="{$avatar_img}" class="img_XL"><div class="valid">审核中</div></div>
								<div class="clearboth"></div>
								<!--<a class="update_mainpic" href="myalbum_update.php">更新形象照</a>-->
                                <!--<a class="update_mainpic" href="/index.php/member/set_photo">更新形象照</a>-->
                                <a class="update_mainpic" href="/index.php/album/iEdit/set_avatar">更新形象照</a>
							</div>
								<div class="picupload">
									<a class="font_text3 f12">有照片的会员，更能受到其他会员的关注哦！</a>
									<p>
										图片必须小于1MB,并仅支援png、jpg和gif(无动画)格式<br>
										您可以上传新的图片取代现有个人形象照<br>
										被取代的形象照会自动移至您形象照相册中<br>
										越清楚的照片能越有效让奇遇会员注意到你哦<br><br>
									</p>
									<div class="upload_form">
										<form action="{site_url('member/set_photo/create_my_album')}" method="post" enctype="multipart/form-data">
											上传生活照<input type="file" name="thumb">
											<div class="clearboth"></div>
											<input type="submit" class="uploadBtn" value="">
                                            <input type="hidden" value="1" name="act" />
										</form>
									</div>
								</div>
							<div class="clearboth"></div>
							<div class="title">我的生活照</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="mycasualpics">
								<ul>
                                
                                
									<!--<li>
										<div class="pic">
											<a><img src="/static/images/testpic2.jpg" class="img_M"></a>
											<div class="valid">审核中</div>
										</div>
										<div class="clearboth"></div>
									</li>-->
                                    
                                    
									<!--<li>
										<div class="pic">
											<a><img src="/static/images/testpic.jpg" class="img_M"></a>
										</div>
										<div class="clearboth"></div>
										<div class="pic_manage" align="center">
											<a class="hidePic">隐藏</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="deletePic">删除</a>
											<div class="clearboth"></div>
											<a class="picstatus main">当前形象照</a>
										</div>
									</li>-->
                                    
                                   {foreach from=$myPhotoList item=v key=k}
									<li>
										<div class="pic">
											<a rel="lifepic_group" href="/data/attachment/album/{$v.filepath}"><img src="/data/attachment/album/{$v.filepath}" class="img_M"></a>
										</div>
										<div class="clearboth"></div>
										<div class="pic_manage" align="center">
											<a class="hidePic">隐藏</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="deletePic" onclick="delete_my_photo_index('{$v.picid}','{$albumid}')">删除</a>
											<div class="clearboth"></div>
											<!--<a class="picstatus" href="/index.php/member/set_photo/set/picid/{$v.picid}">设为形象照</a>-->
                                            <a class="picstatus" href="/index.php/album/iEdit/index/img_url_code/{$v.img_url_code}">设为形象照</a>
										</div>
									</li>
                                   {/foreach}     
                                    
                                    
								</ul>
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
<!--contentEnd-->
<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</body>
</html>

<script>
$("a[rel=lifepic_group]").fancybox({
				'titlePosition'	: 'inside'
});
</script>