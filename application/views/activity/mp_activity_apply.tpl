<div style="width:512px">
  <div class="qy-actInvite-wrap">
    <div class="qy-tipmsg-caption"> <span class="qy-tipmsg-icon1">参加活动</span></div>
    <div class="qy-actApply-comment" >
	 <form id="frmactive" method="post" action="/index.php/activity/mp_active/requestContact">
      <table class="tb-actApply" width="100%" border="0" cellspacing="0" cellpadding="0">
        
          <tr>
            <td width="72">用 户 名:</td>
            <td><b>{$member_info.username}</b></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>注册邮件:</td>
            <td><strong>{$member_info.email}</strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>移动手机:</td>
            <td>
              <input type="text" name="mobile" id="mobile" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>固定电话:</td>
            <td><input type="text" name="phone" id="telphone" /></td>
            <td><input type="hidden"  name="aid" value="{$aid}"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td class="tdd-btns"><a id="btnSubmit" class="qy-coommon-btnred">确定参加</a> <a id="btnClosetip" class="qy-coommon-btngrey">退出</a></td>
            <td>&nbsp;</td>
          </tr>
       
      </table>
	   </form>
    </div>
  </div>
</div>
<script src="/staticx/js/thirdLibs/express.validate.js" type="text/javascript"></script>
<script src="/staticx/js/apply/actApply-dx.js" type="text/javascript"></script>

