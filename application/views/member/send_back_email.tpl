<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的信箱</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mymail.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
<script src="/static/js/display/mypaliie/mymail.js"></script>
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
					<div class="main_title" >我的信箱</div>
					<div class="main_menu" >
						<ul>
							<li><a href="/index.php/member/my_email/index">奇遇信箱</a><a>(</a><a id="mailcount" class="emNum">{$email_num}</a><a>)</a></li>
							<li><a href="/index.php/member/my_email/get_admin_send_email">管理員通知</a><a>(</a><a id="msgcount" class="emNum">{$admin_email_num}</a><a>)</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<!--我的信箱-->
						
						<div class="clearboth"></div>
						
                        
						<!--新增信件-->
                        <form action="/index.php/member/my_email/send_back_email_action" method="post" enctype="multipart/form-data">
                        
						<div id="newmail">
							<div class="title">回复信件</div>
                            <div id="newmailBtn" class="add font_text2"><a href="/index.php/member/my_email/get_draft_email">草稿箱</a>&nbsp;</div><div id="newmailBtn" class="add font_text2"><a href="/index.php/member/my_email/get_send_email">发件箱</a>&nbsp;</div><div id="newmailBtn" class="add font_text2"><a href="/index.php/member/my_email/index">收件箱</a>&nbsp;</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="input_container">
								<div class="input">
									<div class="receiverBtn"></div><input type="text" id="mail_to" value="{$email_info.fromusername}">
								</div>
								<div class="clearboth"></div>
								<div class="input">
									<div class="newmail_label">主旨：</div><input type="text" id="mail_subject" name="SUBJECT" value="{$email_info.SUBJECT}">
								</div>
                                 <div class="input">
									<div class="newmail_label">附件：</div><input type="file" id="mail_urls" name="urls">
								</div>
							</div>
							<div class="clearboth"></div>
							<textarea id="newmail_content" name="message">{$email_info.message}</textarea>
							<div class="clearboth"></div>
							
							<div class="confirmBtn"></div>
							<div class="cancelBtn"></div>
						</div>
                        <input type="hidden" value="{$email_info.fromuserid}" name="fromuserid" />
                        <input type="submit" value="确定" />
                        </form>
  		
					</div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
		<!--end-->
		
		<div id="album_pic_edit_window"></div>
		<div class="clearboth"></div>
		
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