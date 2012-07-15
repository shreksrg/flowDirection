<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的名片</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mycard.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ui/ui-progressbar.js"></script>
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
					<div class="main_title">Paliie名片夾</div>
					<div class="clearboth"></div>
					<div class="title font_text2">Paliie名片夾&nbsp;&nbsp;&nbsp;<a href="/index.php/member/my_card/create">新增通讯录成员</a></div>
					<div class="clearboth"></div>
					<div class="bar mg_b"><div></div></div>
					<div class="clearboth"></div>
					<div class="user_info_container mg_b">
						<div class="info_L floatL mg_r">
							<img src="{$avatar_img}" class="img_XL mg_b">
							<div class="clearboth"></div>
							<div class="label">Paliie ID:</div><a class="text">{$card_info.userid}</a>
						</div>
						<div class="info_M floatL mg_r">
							<div class="label">真實姓名:</div><a class="text">{$card_info.realname}</a><div class="clearboth"></div>
							<div class="label">職位:</div><a class="text">{$card_info.job}</a><div class="clearboth"></div>
							<div class="label">公司名稱:</div><a class="text">{$card_info.company}</a><div class="clearboth"></div>
							<div class="label">移動電話:</div><a class="text">{$card_info.mobile}</a><div class="clearboth"></div>
							<div class="label">辦公電話:</div><a class="text">{$card_info.phone}</a><div class="clearboth"></div>
							<div class="label">電子郵件:</div><a class="text link">{$card_info.email}</a><div class="clearboth"></div>
							<div class="label">網址:</div><a href="#" class="text link">{$card_info.homepage}</a><div class="clearboth"></div>
							<div class="label">郵编:</div><a href="#" class="text link">{$card_info.zippost}</a><div class="clearboth"></div>
						</div>
						<div class="info_R floatR rel">
							<div class="label">業務描述:</div>
							<div class="clearboth"></div>
							<p class="mg_l">{$card_info.description}</p>
							<div class="clearboth mg_b"></div>
							<div class="btns abs">
								<div class="edit font_text2 floatL mg_r udl"><a href="/index.php/member/my_card/edit_card_info/cardid/{$card_info.cardid}">編輯</a></div>
								<div class="save2deviceBtn btnbg floatL"></div>
							</div>
						</div>
						<div class="clearboth mg_b"></div>
					</div>
					
					
					<div class="content_container">
						<div class="menu_container rel">
							<div class="main_menu" >
								<ul>
									<li class="commonContact"><a href="/index.php/member/my_card/index">通訊錄</a></li>
									<li class="selected normalContact">常用聯絡人</li>
								</ul>
								<div class="end"></div>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
                        
                        
                        
						<div class="card_container">
							<ul>
                            
                            {foreach from=$often_card_list item=v key=k}
								<li>
									<div class="card_L floatL">
										<img src="/static/images/testpic.jpg" class="img_L mg_b">
										<div class="clearboth"></div>
										<div class="label">Paliie ID:</div><a class="memberId text">{$v.ousername}</a><div class="clearboth"></div>
										<div class="new">New</div>
									</div>
									<div class="card_M floatL">
										<div class="name label">真實姓名:</div><a class="text">{$v.realname}</a><div class="clearboth"></div>
										<div class="jobTitle label">職位:</div><a class="text">{$v.job}</a><div class="clearboth"></div>
										<div class="company label">公司名稱:</div><a class="text">{$v.company}</a><div class="clearboth"></div>
										<div class="cellphone label">移動電話:</div><a class="text">{$v.mobile}</a><div class="clearboth"></div>
										<div class="companyNum label">辦公電話:</div><a class="text">{$v.phone}</a><div class="clearboth"></div>
                                        <div class="label">電子郵件:</div><a href="#" class="text link">{$v.email}</a><div class="clearboth"></div>
										<div class="www label">網址:</div><a href="#" class="text link">{$v.homepage}</a><div class="clearboth"></div>
										<div class="email label">郵编:</div><a href="#" class="text link">{$v.zippost}</a><div class="clearboth"></div>
									</div>
									<div class="card_R floatR rel">
										<div class="label">業務描述:</div>
										<div class="clearboth"></div>
										<p class="mg_l">{$v.description}</p>
										<div class="clearboth mg_b"></div>
										<div class="btns abs">
											<div class="del floatL udl" onclick="delete_often_card('{$v.cardid}')">移除</div>
										</div>
									</div>
								</li>
                              {/foreach}  
								
							</ul>
						</div>
                        
                        
                        
                        
						<div class="clearboth"></div>
						
						
					</div><!--content container end-->
					
					
					
					<div class="clearboth"></div>
				</div><!--container end-->
				
				
				
				<div class="clearboth"></div>
			</div><!--middle end-->
			
			
			
			
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
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