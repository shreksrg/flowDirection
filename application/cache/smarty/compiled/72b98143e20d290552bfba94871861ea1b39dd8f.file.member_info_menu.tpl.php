<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 15:25:20
         compiled from "../application/views/common/member_info_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19165415704f6830e0dcd4d1-84395011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72b98143e20d290552bfba94871861ea1b39dd8f' => 
    array (
      0 => '../application/views/common/member_info_menu.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19165415704f6830e0dcd4d1-84395011',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="member_right">
	<div class="member_data_container">
		<div class="top"></div>
		<div class="middle">
			<div class="member_content">
			    <input type="hidden" id="friendId" value="<?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
" />
			    <input type="hidden" id="friendName" value="<?php echo $_smarty_tpl->getVariable('member')->value['username'];?>
" />
				<div class="member_name"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
"><?php echo $_smarty_tpl->getVariable('member')->value['username'];?>
</a></div><div class="clearboth"></div>
				<div class="member_id">Paliie ID:<a><?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
</a></div><div class="clearboth"></div>
				<div class="member_pic"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('member_profile')->value['avatar_img'];?>
" class="img_XL"></a></div>
				<div class="mem_info_L">
					<div class="member_gender"><?php if ($_smarty_tpl->getVariable('member_profile')->value['gender']==0){?>男性<?php }else{ ?>女性<?php }?></div>
					<div class="clearboth"></div>
					<div class="member_age"><?php echo $_smarty_tpl->getVariable('member_profile')->value['age'];?>
岁</div>
					<div class="clearboth"></div>
					<div class="member_area"><?php echo $_smarty_tpl->getVariable('member_profile')->value['regprovince'];?>
-<?php echo $_smarty_tpl->getVariable('member_profile')->value['regcity'];?>
</div>
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
							<a class="sendmsgBtn" href="/index.php/member_info/sendmessage/uid/<?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
"></a>&nbsp;
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
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('commen_info')->value['friend_attention_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['fuserid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['avatar_img'];?>
"></a></li>
			<?php }} ?>  	
			</ul>
			</div>
			<div class="clearboth"></div>
		</div>
        
		<div class="clearboth"></div>
	</div>
  
    
	<div class="clearboth"></div>
</div>
<div class="clearboth"></div>