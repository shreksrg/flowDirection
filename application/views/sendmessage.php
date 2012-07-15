<script src="/static/js/common.js" type="text/javascript"></script>
<div class="sendMsg">
	<div class="title_bg">
		<div class="text">发送讯息</div>
		<!--<a onclick="$.fancybox.close();"><div class="close"></div></a>-->
	</div>
	<form action="{site_url('member_info/send_email')}" method="post" enctype="multipart/form-data" onsubmit="return check_send_back_email()">
		<div class="content">
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
			<div class="sendMsg_input">
				<div class="input_label">信件内容：</div>
				<textarea class="msg_input" name="message" id="message"></textarea>
			</div>
		</div>
		<div class="clearboth"></div>
		<div class="bottom">
			<a class="sendingRule">了解奇遇信件规则。</a>
			<div class="cancelBtn" onclick="$.fancybox.close();"></div>
			<button type="submit" class="confirmBtn"></button>
		</div>
        <input type="hidden" value="{$member.userid}" name="touserid" />
        <input type="hidden" value="1" name="act" />
	</form>
</div>