<div id="mypaliie_left" class="mg_r">
	<div id="mypaliie_menu_container" class="mg_b">
		<div id="mypaliie_menu_top" class="png_bg"></div>
		<div id="mypaliie_menu_middle" class="png_bg">
			<div class="middle_container">
				<!--通知欄位-->			
				<div id="mypaliie_message_container">
					<div id="mypaliie_user">
						<div class="user_name font_title">{$commen_info.username}</div>
						<div>Paliie ID:<a class="user_id">{$commen_info.userid}</a>
							
						</div>
						<div class="mypaliie_user_pic">
							<a href="/index.php/member_info/index/uid/{$commen_info.userid}" target="_blank"><img src="{$commen_info.avatar_img}" class="img_L"></a>
						</div>
					</div>
					<div class="clearboth"></div>
					<div class="container">
						<div id="message_left" class="png_bg"></div>
						<div id="message_center" class="png_bg">
							<div class="container">
								
                                <!--
								<div id="message_friend" class="messageBtn">朋友(<a id="newFriend" class="emNum" href="/index.php/friend">{$commen_info.friend_num}</a>)</div> -->
							</div>
                            <div align="center" class="message_container">
						<div  class="messageMail" onclick="window.location.href='/index.php/member/my_email/index'" style="cursor:pointer;">新邮件(<a id="newMail" class="emNum">{$commen_info.all_email_num}</a>)</div>
						<div class="messageBlock">|</div>
						<div class="messageAnnounce" onclick="window.location.href='/index.php/member/my_email/get_admin_send_email'" style="cursor:pointer;">新通知(<a id="newAnnounce" class="emNum">{$commen_info.admin_email_num}</a>)</div>
					</div>
						</div>
						<div id="message_right" class="png_bg"></div>
					</div>
				</div>
				<div class="clearboth"></div>
				<!--選單-->
				<div id="mypaliie_menu">
					<div class="bar">
						<div class="barL"></div>					
					</div>
					<div class="clearboth"></div>
					<ul>
						<li><div class="mypaliie_icon mysetting_icon png_bg"></div><a href="/index.php/member/index/info">个人设置</a></li>
						<li><div class="mypaliie_icon mymailbox_icon png_bg"></div><a href="/index.php/member/my_email/index">我的信箱</a></li>
						<li><div class="mypaliie_icon myecard_icon png_bg"></div><a href="/index.php/member/my_card/index">Paliie名片夹</a></li>
						<li  onclick="window.location.href='/index.php/friend/index'" ><div class="mypaliie_icon myfriend_icon png_bg"></div>我的朋友</li>
						<li><div class="mypaliie_icon myact_icon png_bg"></div><a href="/index.php/activity/my_in">我的活动</a></li>
						<li><div class="mypaliie_icon myalbum_icon png_bg"></div><a href="/index.php/album/index">相册管理</a></li>
						<li onclick="window.location.href='/index.php/blog/essay'"><div class="mypaliie_icon myloveblog_icon png_bg"></div>情感博文</li>
						<li onclick="window.location.href='/index.php/blog/story'"><div class="mypaliie_icon mystory_icon png_bg"></div>奇遇故事</li>
						<li onclick="window.location.href='/index.php/blog/map'"><div class="mypaliie_icon mymapblog_icon png_bg"></div>地图日志</li>
						<li><div class="mypaliie_icon mypoint_icon png_bg"></div>积分管理</li>
						<li><div class="mypaliie_icon mycertification_icon png_bg"></div>诚信认证</li>
						<li><div class="mypaliie_icon mypassword_icon png_bg"></div><a href="/index.php/member/set_password/index">更改密码</a></li>
						<li><div class="mypaliie_icon mycondition_icon png_bg"></div>徴友条件</li>
					</ul>			
				</div>
				<div class="clearboth"></div>			
			</div>
		</div>	
		<div id="mypaliie_menu_bottom" class="png_bg"></div>	
		<div class="clearboth"></div>	
	</div>
	<div class="clearboth"></div>
	<!--誰看過我-->
	<!--<div id="mypaliie_wholookme" class="mg_b">
		<div id="wholookme_title" class="png_bg"></div>
		<div class="bar">
			<div class="barL"></div>
		</div>
		<div class="mypaliie_imglist">
			<div class="mypaliie_imglist_container">
			<ul>
				<li><a><img src="/images/testpic2.jpg"></a></li>
				<li><a><img src="/images/testpic.jpg"></a></li>
				<li><a><img src="/images/testpic2.jpg"></a></li>
				<li><a><img src="/images/testpic.jpg"></a></li>
				<li><a><img src="/images/testpic2.jpg"></a></li>
				<li><a><img src="/images/testpic.jpg"></a></li>
				<li><a><img src="/images/testpic2.jpg"></a></li>
				<li><a><img src="/images/testpic.jpg"></a></li>
				<li><a><img src="/images/testpic2.jpg"></a></li>
			</ul>
			</div>
		</div>
	</div>
	<div class="clearboth"></div>-->
	<!--誰關注我-->
	<div id="mypaliie_whofocusme" class="mg_b">
		<div id="whofocusme_title" class="png_bg"></div>
		<div class="bar">
			<div class="barL"></div>
		</div>
		<div class="mypaliie_imglist">
			<div class="mypaliie_imglist_container">
			<ul>
            {foreach from=$commen_info.friend_attention_list item=v key=k}
				<li><a href="/index.php/member_info/index/uid/{$v.fuserid}"><img src="{$v.avatar_img}"></a></li>
            {/foreach}  	  
			</ul>
			</div>
		</div>
	</div>
</div>