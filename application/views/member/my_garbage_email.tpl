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
					<div class="main_title" class="floatL">我的信箱</div>
					<div class="main_menu" class="floatL">
						<ul>
							<li class="selected mail">奇遇信箱<a>(</a><a id="mailcount" class="emNum">{$email_num}</a><a>)</a></li>
							<li><a href="/index.php/member/my_email/get_admin_send_email">管理員通知</a><a>(</a><a id="msgcount" class="emNum">{$admin_email_num}</a><a>)</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<!--我的信箱-->
						<div id="mail">
							<div class="title">垃圾箱列表</div>
							<div id="newmailBtn" class="add font_text2"><a href="/index.php/member/my_email/get_draft_email">草稿箱</a>&nbsp;</div><div id="newmailBtn" class="add font_text2"><a href="/index.php/member/my_email/get_send_email">发件箱</a>&nbsp;</div><div id="newmailBtn" class="add font_text2"><a href="/index.php/member/my_email/index">收件箱&nbsp;</a></div><div id="newmailBtn" class="add font_text2">
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
                            
                            <form action="" method="get" enctype="multipart/form-data" name="form2">
							<div class="toolbar">
								<div class="manage floatL">
									<input class="selectall" name="selectall" type="checkbox">
									<a>全选｜</a>
									<a class="delete" onclick="delete_email('2')">彻底删除</a>
								</div>
								<div class="display floatR mg_t">
									
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
                                
                                
                                {foreach from=$emailList item=v key=k}
									<li>
										<div class="check"><input type="checkbox" id="id" name="id[]" value="{$v.pmid}"></div>
										<div class="mailtitle" limit="48"><a href="/index.php/member/my_email/show_email/email_id/{$v.pmid}">{$v.SUBJECT}</a></div>
										<div class="send_date">{$v['dateline']|date_format:"%Y/%m/%d"}</div>
										<div class="reply font_text2">回覆</div>
										<div class="clearboth"></div> 
									</li>
								{/foreach}  	
                                	
									
								</ul>
							</div>
							<div class="clearboth"></div>
                            </form>
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