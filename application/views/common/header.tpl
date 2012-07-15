<div id="header">
	<div id="header_left"></div>
	<div id="header_right"></div>
	<div id="header_container">
		<div id="logo"></div>
		<div id="header_content">	
        <div id="header_memberInfobar" style="height:20px">	
        {if $commen_info.username!=''}
			
				<div id="header_Info_IconContainer">
					<div id="header_Info_friend" class="infoIcon png_bg" onclick="location.href='/index.php/friend/index'">
						<div id="Info_friendNewCount" class="infoCount " >{$commen_info.friend_num}</div>
					</div>
					<div id="header_Info_message" class="infoIcon png_bg" onclick="location.href='/index.php/member/my_email/get_admin_send_email'">
						<div id="Info_messageNewCount" class="infoCount">{$commen_info.admin_email_num}</div>
					</div>
					<div id="header_Info_mail" class="infoIcon png_bg" onclick="location.href='/index.php/member/my_email/index'">
						<div id="Info_mailNewCount" class="infoCount">{$commen_info.all_email_num}</div>
					</div>
				</div>
				<div id="header_user">
					<a onclick="location.href='/index.php/member/login_out/index'" id="header_logout" class="logout">退出</a>
					<div id="header_user_id" onclick="location.href='/index.php/member/index'"><a class="user_id">{$commen_info.username}</a></div>
				</div>
			
          {/if}   
            </div>
            
			<div class="clearboth"></div>
			<div id="header_menu">	
				<ul>
					<li><a id="menu_home" title="Paliie主页" href="/index.php"></a></li>
					<li><a id="menu_mypaliie" title="我的Paliie"  href="/index.php/member/index"></a></li>
					<li><a id="menu_search" title="会员搜索"  href="/index.php/paliie_search"></a></li>
					<li><a id="menu_activity" title="奇遇活动" href="/index.php/browse_act"></a></li>
					<li><a id="menu_mapblog" title="地图日志"  href="/index.php/blog/mapblog"></a></li>
					<li><a id="menu_emotionspace" title="情感空间"  href="/index.php/blog/feelspace"></a></li>
				</ul>			
			</div>
			
		</div>
	</div>
</div>
