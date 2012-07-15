<div id="actApply">
	<div class="container">
		<div class="title_bg">
			<div class="title">我要报名</div>
		</div>
		<div class="content">
			<form action="/index.php/activity/my_in/join" method="post" enctype="multipart/form-data">
				<div class="input_label">会员名：</div><a class="font_text2">{$member_info.username}</a>
				<div class="clearboth mg_b"></div>
				<div class="input_label">邮箱：</div><a class="font_text2">{$member_info.email}</a>
				<div class="clearboth mg_b"></div>
				<div class="input_label">手机：</div><input type="text"  name="mobile"><a class="emNum">(必填)</a>
				<div class="clearboth mg_b"></div>
				<div class="input_label">电话：</div><input type="text" name="phone"><a>(选填)</a>
				<div class="clearboth mg_b"></div>
				<div class="floatR">
					<input type="checkbox"><label>&nbsp;我同意<a class="linktype1">奇遇活动条款事项</a></label>
				</div>
				<div class="clearboth"></div>
				<div class="borderbtm mg_t mg_b"></div>
				<div class="clearboth"></div>
				<div class="btns floatR">
					<input type="button" class="cancelBtn" onclick="$.fancybox.close();">&nbsp;<input type="submit" class="confirmBtn" value="" onclick="$.fancybox.close();">
				</div>
				<div class="clearboth"></div>
                
                <input type="hidden"  name="aid" value="{$aid}">
			</form>
		</div>
	</div>
</div>