<script>
function check_check()
{
	var len = document.UsersForm.uids.length; 
    var checked = false; 

    for (i = 0; i < len; i++) 
    { 
        if (document.UsersForm.uids[i].checked == true) 
        { 
            checked = true; 
            break; 
        } 
    } 
    if ( !checked ) 
    { 
        alert("请至少选择一个好友！"); 
        return false; 
    }
	
	return true; 
}

function all_check()
{
	var checked = true; 
	var len = document.UsersForm.uids.length; 
	for (i = 0; i < len; i++) 
    { 
        if (document.UsersForm.uids[i].checked == false) 
        { 
			checked = false;
            document.UsersForm.uids[i].checked = true; 
        } 
    } 
	
	if( checked )
	{
		for (t = 0; t < len; t++) 
    	{ 
            document.UsersForm.uids[t].checked = false; 
    	} 
	}
}
</script>
<div id="actInvite">
	<div class="container">
		<div class="title_bg">
			<div class="title">邀请朋友</div>
		</div>
		<div class="content">
			<form action="/index.php/activity/my_launch/send_act_email" method="post" enctype="multipart/form-data" name="UsersForm" onsubmit="return check_check()">
			<div class="checkall">
				<input type="checkbox" id="check_all" onclick="all_check()"><label for="check_all">&nbsp;全选</label>
			</div>
			<div class="clearboth"></div>
			<div class="memberList">
				<ul>
                
                
                
                {foreach from=$member_list item=v key=k}
					<li>
						<input type="checkbox" value="{$v.userid}" name="uid[]" id="uids"><img src="{$v.avatar_img}" class="img_XS"><a>{$v.username}</a>
					</li>
                {/foreach}      
                    
                    
					
				</ul>
			</div>
			<div class="clearboth"></div>
			<div class="btns floatR mg_t">
				<input type="button" class="cancelBtn" onclick="$.fancybox.close();">&nbsp;<input type="submit" class="confirmBtn" value="" onclick="$.fancybox.close();">
			</div>
			<div class="clearboth"></div>
            <input type="hidden" value="{$aid}" name="aid">
			</form>
		</div>
	</div>
</div>