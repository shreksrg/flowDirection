<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 15:22:27
         compiled from "../application/views/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3802403984f6816af046bb1-43504182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbfcf919953d90a4cec79bd9f62b864a5aca9d70' => 
    array (
      0 => '../application/views/common/header.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3802403984f6816af046bb1-43504182',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="header">
	<div id="header_left"></div>
	<div id="header_right"></div>
	<div id="header_container">
		<div id="logo"></div>
		<div id="header_content">	
        <div id="header_memberInfobar" style="height:20px">	
        <?php if ($_smarty_tpl->getVariable('commen_info')->value['username']!=''){?>
			
				<div id="header_Info_IconContainer">
					<div id="header_Info_friend" class="infoIcon png_bg" onclick="location.href='/index.php/friend/index'">
						<div id="Info_friendNewCount" class="infoCount " ><?php echo $_smarty_tpl->getVariable('commen_info')->value['friend_num'];?>
</div>
					</div>
					<div id="header_Info_message" class="infoIcon png_bg" onclick="location.href='/index.php/member/my_email/get_admin_send_email'">
						<div id="Info_messageNewCount" class="infoCount"><?php echo $_smarty_tpl->getVariable('commen_info')->value['admin_email_num'];?>
</div>
					</div>
					<div id="header_Info_mail" class="infoIcon png_bg" onclick="location.href='/index.php/member/my_email/index'">
						<div id="Info_mailNewCount" class="infoCount"><?php echo $_smarty_tpl->getVariable('commen_info')->value['all_email_num'];?>
</div>
					</div>
				</div>
				<div id="header_user">
					<a onclick="location.href='/index.php/member/login_out/index'" id="header_logout" class="logout">退出</a>
					<div id="header_user_id" onclick="location.href='/index.php/member/index'"><a class="user_id"><?php echo $_smarty_tpl->getVariable('commen_info')->value['username'];?>
</a></div>
				</div>
			
          <?php }?>   
            </div>
            
			<div class="clearboth"></div>
			<div id="header_menu">	
				<ul>
					<li><a id="menu_home" title="Paliie主页" href="/index.php"></a></li>
					<li><a id="menu_mypaliie" title="我的Paliie"  href="/index.php/member/index"></a></li>
					<li><a id="menu_search" title="会员搜索"  href="/index.php/paliie_search"></a></li>
					<li><a id="menu_activity" title="奇遇活动" href="/index.php/browse_act"></a></li>
					<li><a id="menu_mapblog" title="地图日志"  href="/index.php/blog/mapblog"></a></li>
					<li><a id="menu_emotionspace" title="情感空间"  href="/index.php/blog/feelspace"></a></li>
				</ul>			
			</div>
			
		</div>
	</div>
</div>
