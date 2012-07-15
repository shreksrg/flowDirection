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
					<div class="main_title floatL">我的信箱</div>
					<div class="main_menu floatL">
						<ul>
							<li class="selected mail">奇遇信箱<a>(</a><a id="mailcount" class="emNum">100</a><a>)</a></li>
							<li class="sysmsg">管理員通知<a>(</a><a id="msgcount" class="emNum">100</a><a>)</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<!--我的信箱-->
						<div id="mail">
							<div class="title">信箱列表</div>
							<div id="newmailBtn" class="add font_text2">新增信件</div>
                            <div id="newmailBtn" class="add font_text2">新增信件</div>
                            <div id="newmailBtn" class="add font_text2">新增信件</div>
                            <div id="newmailBtn" class="add font_text2">新增信件</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="toolbar">
								<div class="manage floatL">
									<input class="selectall" name="selectall" type="checkbox">
									<a>全选｜</a>
									<a class="delete">删除</a>
								</div>
								<div class="display floatR mg_t">
									<div class="show_all floatL">显示全部</div><a class="floatL">｜</a>
									<div class="show_notread floatL">显示未读</div><a class="floatL">｜</a>
									<div class="sort floatL">
										<div class="sort_btn">
											<div class="sort_text">排列</div>
											<div class="sort_arrow"></div>
										</div>
										<div class="sort_container">
											<div class="bg1">
												<div class="sendDate sort_by">日期</div>
												<div class="mailTitle sort_by">主旨</div>
												<div class="senderName sort_by">寄件者</div>
											</div>
											<div class="bg2"></div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="list">
								<ul>
									<li>
										<div class="check"><input type="checkbox"></div>
										<div class="img"><img src="/static/images/testpic.jpg" class="img_XS"></div>
										<div class="sender">
											<div class="sender_name font_title">魯夫</div>
											<div class="clearboth"></div>
											<div class="sender_data">
												<div class="age">25歲</div>
												<div class="area">台灣</div>
											</div>
										</div>
										<div class="mailtitle" limit="48">信件標題信件標題信件標題信件標題信件標題信件標題信件標題</div>
										<div class="send_date">2011/11/11</div>
										<div class="reply font_text2">回覆</div>
										<div class="clearboth"></div> 
									</li>
									<li>
										<div class="check"><input type="checkbox"></div>
										<div class="img"><img src="/static/images/testpic.jpg" class="img_XS"></div>
										<div class="sender">
											<div class="sender_name font_title">魯夫</div>
											<div class="clearboth"></div>
											<div class="sender_data">
												<div class="age">25歲</div>
												<div class="area">台灣</div>
											</div>
										</div>
										<div class="mailtitle" limit="48">信件標題信件標題信件標題信件標題信件標題信件標題信件標題</div>
										<div class="send_date">2011/11/11</div>
										<div class="reply font_text2">回覆</div>
										<div class="clearboth"></div> 
									</li>
									<li>
										<div class="check"><input type="checkbox"></div>
										<div class="img"><img src="/static/images/testpic.jpg" class="img_XS"></div>
										<div class="sender">
											<div class="sender_name font_title">魯夫</div>
											<div class="clearboth"></div>
											<div class="sender_data">
												<div class="age">25歲</div>
												<div class="area">台灣</div>
											</div>
										</div>
										<div class="mailtitle" limit="48">信件標題信件標題信件標題信件標題信件標題信件標題信件標題</div>
										<div class="send_date">2011/11/11</div>
										<div class="reply font_text2">回覆</div>
										<div class="clearboth"></div> 
									</li>
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						
						<!--新增信件-->
						<div id="newmail">
							<div class="title">新增信件</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="input_container">
								<div class="input">
									<div class="receiverBtn"></div><input type="text" id="mail_to">
								</div>
								<div class="clearboth"></div>
								<div class="input">
									<div class="newmail_label">主旨：</div><input type="text" id="mail_subject">
								</div>
							</div>
							<div class="clearboth"></div>
							<textarea id="newmail_content"></textarea>
							<div class="clearboth"></div>
							
							<div class="confirmBtn"></div>
							<div class="cancelBtn"></div>
						</div>
						<div class="clearboth"></div>							
												
						<!--信件內容-->
						<div id="mail_detail">
							<div class="title">標題標題標題!!!!!索隆生日快樂!!!!!標題標題標題</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="info_container">
								<img src="/static/images/testpic.jpg" class="img_S floatL">
								<div class="mail_senderName font_title floatL mg_t">魯夫</div>
								<div class="mail_reply font_text2 floatR">回信</div>
								<div class="clearboth"></div>
								<div class="mail_label floatL">寄件日期：</div><div class="mail_date floatL">2011/11/11 AM 11:38:23</div>
								<div class="clearboth"></div>
								<div class="mail_label floatL">收件者：</div><div class="mail_receiver floatL">索隆,香吉士,騙人布,佛朗基</div>
								<div class="clearboth"></div>
							</div>
							<div class="mail_content">耶</div>
							
						</div>
						<div class="clearboth"></div>
						
						
						
						<!--系統郵件-->
						<div id="sysmsg">
							<div class="title">管理員通知列表</div>
							<div class="clearboth"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="toolbar">
								<div class="manage floatL">
									<input class="selectall" name="selectall" type="checkbox">
									<a>全选｜</a>
									<a class="delete">删除</a>
								</div>
								<div class="display floatR mg_t">
									<div class="show_all floatL">显示全部</div><a class="floatL">｜</a>
									<div class="show_notread floatL mg_r">显示未读</div>								
								</div>
							</div>
							<div class="list">
								<ul>
									<li>
										<div class="check"><input type="checkbox"></div>
										<div class="img"><img src="/images/testpic.jpg" class="img_XS"></div>
										<div class="sender">
											<div class="sender_name font_title">魯夫</div>
											<div class="clearboth"></div>
											<div class="sender_data">
												<div class="age">25歲</div>
												<div class="area">台灣</div>
											</div>
										</div>
										<div class="mailtitle readed" limit="48">信件標題信件標題信件標題信件標題信件標題信件標題信件標題</div>
										<div class="send_date">2011/11/11</div>
										<div class="reply font_text2">回覆</div>
										<div class="clearboth"></div> 
									</li>
									<li>
										<div class="check"><input type="checkbox"></div>
										<div class="img"><img src="/images/testpic.jpg" class="img_XS"></div>
										<div class="sender">
											<div class="sender_name font_title">魯夫</div>
											<div class="clearboth"></div>
											<div class="sender_data">
												<div class="age">25歲</div>
												<div class="area">台灣</div>
											</div>
										</div>
										<div class="mailtitle" limit="48">信件標題信件標題信件標題信件標題信件標題信件標題信件標題</div>
										<div class="send_date">2011/11/11</div>
										<div class="reply font_text2">回覆</div>
										<div class="clearboth"></div> 
									</li>
								</ul>
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>						
					</div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
		<!--end-->
		<div id="mail_send_complete">
			<div class="window_container">
				<div class="window_title_bar">
					<div class="window_title">新增郵件</div>
					<div class="window_close"></div>
				</div>
				<div class="window_content">		
					<div class="msg">您的信件已寄出</div>
					<div class="clearboth"></div>
					<div class="confirmBtn"></div>
				</div>
			</div>
		</div>
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