{literal}
<script>
$(function()
{
	
	
	$.getScript('/staticx/js/jscrollpane/jScrollpane.js',function(){
		$('.qy-actInvite-lstContain').jScrollPane({showArrows:true});
	})
	
	$.getScript('/staticx/js/QY.actInvite-xm.js',function(){
		optSelectall($('#selectAll'),$('input[name^=favopt]'));
		$('#btnSubmit').click(function(){
			chkSelect_frmSubmit({url:'/index.php/activity/my_launch/send_act_email',frmID:'frmInvite',opt:'favopt',msg:'请选择邀请的好友'});
		})
	})	
	
});
</script>
{/literal}

<link rel="stylesheet" type="text/css" href="/staticx/css/QYcommunity/jScrollpane.css" />
<div style="width:600px">
<div class="qy-actInvite-wrap">
  <div class="qy-tipmsg-caption"> <span class="qy-tipmsg-icon1">邀请好友</span></div>
  <div class="qy-actInvite-comment" >
    <div class="qy-invite-selall">
      <input id="selectAll" name="" type="checkbox" value="" />
      全部选择</div>
    <div class="qy-actInvite-lstContain">
      <ul class="qy-active-favoritelst">
        <form method="post" id="frmInvite" action="/index.php/activity/my_launch/send_act_email">
        
         {foreach from=$member_list item=v key=k}
          <li>
            <input name="favopt[]" type="checkbox" class="chkboxFavorite" value="{$v.userid}" />
            <img src="{$v.avatar_img}" class="img-avatar" />
            <div class="qy-active-favdetails"> <b>{$v.username}</b>
              <p>{if $v.gender=='0'}男{else}女{/if}，{$v.age}岁， {$v.city['city']} {$v.work}</p>
            </div>
          </li>
        {/foreach}           
         <input type="hidden" value="{$aid}" name="aid">
        </form>
      </ul>
    </div>
    <span class="btnwrap2"> <a id="btnSubmit" class="qy-coommon-btnred">确定邀请</a> <a id="btnClosetip" class="qy-coommon-btngrey">退出</a> </span> </div>
</div>
</div>