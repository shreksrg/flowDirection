<?php /* Smarty version Smarty-3.0.7, created on 2012-03-21 08:56:08
         compiled from "../application/views/nosendmessage.php" */ ?>
<?php /*%%SmartyHeaderCode:18423227194f692728bc7d66-24007340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0c379fa261de0fa780795535bac3c05f66957e6' => 
    array (
      0 => '../application/views/nosendmessage.php',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18423227194f692728bc7d66-24007340',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="sendMsg">
	<div class="title_bg">
		<div class="text">发送讯息</div>
		<!--<a onclick="$.fancybox.close();"><div class="close"></div></a>-->
	</div>
	
		<div class="content">
        <?php if ($_smarty_tpl->getVariable('member')->value['userid']!=''){?>
			<img src="<?php echo $_smarty_tpl->getVariable('member_profile')->value['avatar_img'];?>
" class="img_S">
			<div class="receiver_data">
				<a class="receiver_name"><?php echo $_smarty_tpl->getVariable('member_profile')->value['nickname'];?>
</a>
				<div class="clearboth"></div>
				<div class="floatL mg_l">paliie id:<a class="receiver_id"><?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
</a></div>
				<div class="clearboth"></div>
				<div class="floatL mg_l"><?php if ($_smarty_tpl->getVariable('member_profile')->value['gender']==0){?>男性<?php }else{ ?>女性<?php }?>&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('member_profile')->value['age'];?>
岁&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('member_profile')->value['height'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('member_profile')->value['weight'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('member_profile')->value['education'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('member_profile')->value['marital'];?>
&nbsp;&nbsp;</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
         <?php }?>   
			<div class="sendMsg_input">
				<div class="input_label">温馨提示：</div>
				<?php echo $_smarty_tpl->getVariable('msg')->value;?>

			</div>
		</div>
		<div class="clearboth"></div>
		
	
</div>