<div class="sendMsg">
	<div class="title_bg">
		<div class="text">发送讯息</div>
		<!--<a onclick="$.fancybox.close();"><div class="close"></div></a>-->
	</div>
	
		<div class="content">
        {if $member.userid != ''}
			<img src="{$member_profile.avatar_img}" class="img_S">
			<div class="receiver_data">
				<a class="receiver_name">{$member_profile.nickname}</a>
				<div class="clearboth"></div>
				<div class="floatL mg_l">paliie id:<a class="receiver_id">{$member.userid}</a></div>
				<div class="clearboth"></div>
				<div class="floatL mg_l">{if $member_profile.gender==0}男性{else}女性{/if}&nbsp;&nbsp;{$member_profile.age}岁&nbsp;&nbsp;{$member_profile.height}&nbsp;&nbsp;{$member_profile.weight}&nbsp;&nbsp;{$member_profile.education}&nbsp;&nbsp;{$member_profile.marital}&nbsp;&nbsp;</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
         {/if}   
			<div class="sendMsg_input">
				<div class="input_label">温馨提示：</div>
				{$msg}
			</div>
		</div>
		<div class="clearboth"></div>
		
	
</div>