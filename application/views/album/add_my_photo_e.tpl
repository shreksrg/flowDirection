<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myalbum.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/imgareaselect/uploadify.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/static/css/display/imgareaselect/imgareaselect-default.css" />
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script type="text/javascript" src="/static/js/imgareaselect/scripts/swfobject.js"></script>
<script type="text/javascript" src="/static/js/imgareaselect/scripts/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="/static/js/imgareaselect/scripts/jquery.imgareaselect.pack.js"></script>
<script type="text/javascript" src="/static/js/layout/iedit.xx.js"></script>

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
							<li class="album_user selected" onclick="location.href='/index.php/album/index/index'">我的照片</li>
							<li class="album_act" onclick="location.href='/index.php/album/activity_album/index'">活动相冊</li>
						    </ul>
							<div class="end"></div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						<div class="sg-avEditcontain">
							<div class="sg-div-secimg">
								<input id="file_upload" name="file_upload" type="file" />
							</div>
							<div id="sg-imgshower" style="display:none">
								<div id="imgcontain" class="sg-div-imgcontain"><img id="cropbox" src="{$img_url}"></div>
								<div id="preview" class="sg-div-preview"></div>
								<div class="sg-div-formcrop">
									<form action="/index.php/member/avatar/save" method="post" enctype="multipart/form-data" >
                                        <input name="bigImage" type="hidden" id="bigImage" value="{$img_url}" />
										<input type="submit" name="button" id="savethumb" value="保存头像" class="sg-btn-saveAvar" />
										<input type="hidden" id="x" name="x" />
										<input type="hidden" id="y" name="y" />
										<input type="hidden" id="w1" name="w1" />
										<input type="hidden" id="h1" name="h1" />
										<input type="hidden" id="tempfile" name="tempfile" />
										<input type="hidden" class="jq_step" id="step" name="step" value="process" />
									</form>
								</div>
							</div>
							<div class="sg-div-ieditDesc" >
								<p class="sg-p-titDesc" >如何成功上传形象照，秒杀更多眼球：</p>
								<ul>
									<li>支持jpg，jpeg，png，gif多种格式，不超过5M就能成功上传！</li>
									<li>缘分想靠近的是你，所以不管人类或非人类，只要照片上不是你，都会被拒绝！</li>
									<li>有些照片会被和谐的，例如暴力、色情、血腥、广告和联系方式……原因你懂的！</li>
									<li>想牵手缘分？那么就算你酷爱墨镜帽子…… 也不要让它们遮住你微笑的脸庞。</li>
									<li>近期、清晰、光线明亮的单人腰部以上大头照才是形象照的最佳选择。</li>
								</ul>
							</div>
						</div>
						<!--內文end--> 
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
	
	<div id="album_pic_edit_window"></div>
	
	<!--footerBegin--> 
	{include file="common/footer.tpl"} 
	<!--footerEnd--> 
</div>
</body>
</html>