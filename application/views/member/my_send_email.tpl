<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发件箱</title>
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
							<li class="" onclick="location.href='/index.php/member/my_email/index'">奇遇信箱<a>(</a><a id="mailcount" class="emNum">{$email_num}</a><a>)</a></li>
							<li class="" onclick="location.href='/index.php/member/my_email/get_admin_send_email'">管理员通知<a>(</a><a id="msgcount" class="emNum">{$admin_email_num}</a><a>)</a></li>
							<li class="selected" onclick="location.href='/index.php/member/my_email/get_send_email'">发件箱<a>(</a><a id="msgcount" class="emNum">{$send_email_num}</a><a>)</a></li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content">
						<!--我的信箱-->
						<div id="mail_sent">
							<div class="pagelinks"><a class="currentPage">信箱列表</a></div>
							
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="toolbar">
                            
                             <form action="" method="get" enctype="multipart/form-data" name="form2">
								<div class="manage floatL">
									<input class="selectall" name="selectall" type="checkbox">
									<a>全选｜</a>
									<a class="delete" onclick="delete_email('2')">删除</a>
								</div>
								<div class="display floatR mg_t">
									<div class="sort floatL">
										<div class="sort_btn">
											<div class="sort_text">排列</div>
											<div class="sort_arrow"></div>
										</div>
										<div class="sort_container">
											<div class="bg1">
												<div class="sendDate sort_by" onclick="window.location.href='/index.php/member/my_email/get_send_email/dateline'">日期</div>
												<div class="mailTitle sort_by" onclick="window.location.href='/index.php/member/my_email/get_send_email/SUBJECT'">主旨</div>
												<div class="senderName sort_by" onclick="window.location.href='/index.php/member/my_email/get_send_email/fromuserid'">寄件者</div>
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
										<div class="img"><a href="/index.php/member_info/index/uid/{$v.touserid}" target="_blank"><img src="{$v.urls}" class="img_S"></a></div>
										<div class="sender">
											<div class="sender_name"><a href="/index.php/member_info/index/uid/{$v.touserid}" target="_blank" class="font_title">{$v.send_username}</a></div>
											<div class="clearboth"></div>
											<div class="sender_data">
												<div class="age">{$v.age}</div>
												<div class="area">{$v.regprovince}-{$v.regcity}</div>
												<div class="edu">{$v.education}</div>
											</div>
										</div>
										<div class="floatR">
											<div class="send_date">{$v['dateline']|date_format:"%Y/%m/%d"}</div>
											<div class="clearboth"></div>
											<a href="/index.php/member/my_email/show_send_email/email_id/{$v.pmid}" class="readmailBtn read"></a>
										</div>
										<div class="clearboth"></div> 
									</li>
									{/foreach}  	
									
									
								</ul>
							</div>
                             </form>
                            
							<div class="clearboth"></div>
							<div class="pages">
								{$page}
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