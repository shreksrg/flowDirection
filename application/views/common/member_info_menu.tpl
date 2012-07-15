<div class="member_right">
	<div class="member_data_container">
		<div class="top"></div>
		<div class="middle">
			<div class="member_content">
			    <input type="hidden" id="friendId" value="{$member.userid}" />
			    <input type="hidden" id="friendName" value="{$member.username}" />
				<div class="member_name"><a href="/index.php/member_info/index/uid/{$member.userid}">{$member.username}</a></div><div class="clearboth"></div>
				<div class="member_id">Paliie ID:<a>{$member.userid}</a></div><div class="clearboth"></div>
				<div class="member_pic"><a href="/index.php/member_info/index/uid/{$member.userid}"><img src="{$member_profile.avatar_img}" class="img_XL"></a></div>
				<div class="mem_info_L">
					<div class="member_gender">{if $member_profile.gender==0}男性{else}女性{/if}</div>
					<div class="clearboth"></div>
					<div class="member_age">{$member_profile.age}岁</div>
					<div class="clearboth"></div>
					<div class="member_area">{$member_profile.regprovince}-{$member_profile.regcity}</div>
					<div class="clearboth"></div>
				</div>
				<div class="mem_info_R">
					<a class="addfriendBtn floatR"></a>
					<div class="clearboth"></div>
					<div class="member_level">★★★★★</div>
					<div class="clearboth"></div>
				</div>
				<div class="member_interactive">
					<div class="member_interactive_left"></div>
					<div class="member_interactive_center">
						<div class="link_container">
							<a class="sendmsgBtn" href="/index.php/member_info/sendmessage/uid/{$member.userid}"></a>&nbsp;
							<a class="addwatchBtn"></a>
						</div>
					</div>
					<div class="member_interactive_right"></div>
					<div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="bar"><div></div></div>
			<!--<div class="paliie_btns">
				<ul>
				<li><a class="member_data" href="member_info.php"></a></li>
					<li><a class="member_blog" href="/index.php/blog/essay/index/1"></a></li>
					<li><a class="member_album" href=""></a></li>
					<li><a class="member_story" href="/index.php/blog/story/index/1"></a></li>
					<li><a class="member_vcard" href=""></a></li>
					<li><a class="member_map" href="/index.php/blog/map/index/1"></a></li>
				</ul>
			</div>
            -->
		</div>
		<div class="bottom"></div>
	</div>
	<!--誰看過我-->
	<div id="mypaliie_wholookme" class="mg_b floatL">
		<!--<div id="wholookme_title" class="png_bg"></div>
		<div class="bar">
			<div class="barL"></div>
		</div>
		<div class="mypaliie_imglist">
			<div class="mypaliie_imglist_container">
			<ul>
				<li><a><img src="/static/images/testpic2.jpg"></a></li>
				<li><a><img src="/static/images/testpic.jpg"></a></li>
				<li><a><img src="/static/images/testpic2.jpg"></a></li>
				<li><a><img src="/static/images/testpic.jpg"></a></li>
				<li><a><img src="/static/images/testpic2.jpg"></a></li>
				<li><a><img src="/static/images/testpic.jpg"></a></li>
				<li><a><img src="/static/images/testpic2.jpg"></a></li>
				<li><a><img src="/static/images/testpic.jpg"></a></li>
				<li><a><img src="/static/images/testpic2.jpg"></a></li>
			</ul>
			</div>
		</div>-->
	</div>
	<!--誰關注我-->
     
	<div id="mypaliie_whofocusme" class="floatL">
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
			<div class="clearboth"></div>
		</div>
        
		<div class="clearboth"></div>
	</div>
  
    
	<div class="clearboth"></div>
</div>
<div class="clearboth"></div>