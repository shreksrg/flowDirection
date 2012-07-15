<div style="width:568px">
<div class="qy-actInvite-wrap">
  <div class="qy-tipmsg-caption"> <span class="qy-tipmsg-icon1">邀请好友</span></div>
  <div class="qy-actInvite-comment" >
    	<div class="qy-udetail-userinfo">
        	<img class="user-avatar" src="{$member_profile.avatar_img}" />
            <h3 class="username">{$member_profile.username} (PID:{$member.userid})</h3>
            <p class="user-basicinfo">{if $member_profile.gender==0}男{else}女{/if} {$member_profile.age}岁 {$member_profile.city['city']} {$member_profile.work}</p>
            <p class="user-countpic">照片({$myPhotoListnum})</p>
            
        </div>
        <span class="splite-m1"></span>
        <div class="qy-udetail-quicksendbox">
        	<h3 class="caption-icon">快速发信</h3>
            <form id="frmSendmail" action="{site_url('member_info/send_email')}" method="post" enctype="multipart/form-data" >
            	<textarea id="mailCont" class="txtMail" name="message" cols="" rows=""></textarea>
                <input type="hidden" value="{$member.userid}" name="touserid" />
                <input type="hidden" value="1" name="act" />
                <input type="hidden" value="" name="SUBJECT" />
            </form>
        </div>
    
    <span class="btnwrap2"> <a id="btnSubmit" class="qy-coommon-btnred">发送邮件</a> <a id="btnClosetip" class="qy-coommon-btngrey">退出</a> </span> </div>
</div>
</div><script src="/staticx/js/apply/quickMail-dx.js" type="text/javascript"></script>