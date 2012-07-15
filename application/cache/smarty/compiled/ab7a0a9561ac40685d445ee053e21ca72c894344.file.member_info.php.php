<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 16:10:18
         compiled from "../application/views/member_info.php" */ ?>
<?php /*%%SmartyHeaderCode:384311274f6817b40e6550-52004893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab7a0a9561ac40685d445ee053e21ca72c894344' => 
    array (
      0 => '../application/views/member_info.php',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '384311274f6817b40e6550-52004893',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/member/member.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/common.js" type="text/javascript"></script>
<script src="/static/js/layout/header.js" type="text/javascript"></script>
<script src="/static/js/display/member.js" type="text/javascript"></script>
</head>
<body>

<?php $_template = new Smarty_Internal_Template("common/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

	<div id="content">
		<div class="mem_left">	
			<div id="mem_data" class="page">
				<div class="top"></div>
				<div class="middle">
					<div class="content">
					    <input type="hidden" id="friendId" value="<?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
" />
			         <input type="hidden" id="friendName" value="<?php echo $_smarty_tpl->getVariable('member')->value['username'];?>
" />
						<div>Paliie ID:<?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
</div>
						<img src="<?php echo $_smarty_tpl->getVariable('member_profile')->value['avatar_img'];?>
" class="main img_2L">
						<div class="data">
							<div class="mem_name"><?php echo $_smarty_tpl->getVariable('member_profile')->value['nickname'];?>
</div>
							<div class="mem_data">年龄：<?php echo $_smarty_tpl->getVariable('member_profile')->value['age'];?>
岁&nbsp;&nbsp;性别：<?php if ($_smarty_tpl->getVariable('member_profile')->value['gender']==0){?>男性<?php }else{ ?>女性<?php }?>&nbsp;&nbsp;居住地：<?php echo $_smarty_tpl->getVariable('member_profile')->value['regprovince'];?>
-<?php echo $_smarty_tpl->getVariable('member_profile')->value['regcity'];?>
&nbsp;&nbsp;</div>
							<ul>
								<li>身高：<?php echo $_smarty_tpl->getVariable('member_profile')->value['height'];?>
</li>
								<li>体重：<?php echo $_smarty_tpl->getVariable('member_profile')->value['weight'];?>
</li>
								<li>民族：<?php echo $_smarty_tpl->getVariable('member_profile')->value['nation'];?>
</li>
								<li>学历：<?php echo $_smarty_tpl->getVariable('member_profile')->value['education'];?>
</li>
								<!--<li>职业：无</li>
								<li>月收入:10000</li>-->
								<li>感情状况:<?php echo $_smarty_tpl->getVariable('member_profile')->value['marital'];?>
</li>
							</ul>
							<div class="clearboth"></div>
							<div class="btns">
								<a class="addfriendBtn"></a>&nbsp;
								<a class="sendmsgBtn" href="/index.php/member_info/sendmessage/uid/<?php echo $_smarty_tpl->getVariable('member')->value['userid'];?>
"></a>&nbsp;
								<a class="addwatchBtn"></a>
							</div>
						</div>
						<div class="clearboth"></div>
						<div class="data_title">个性生活照</div>
						<div class="clearboth"></div>
						<div class="bar"><div></div></div>
						<div class="clearboth"></div>
						<div class="mem_pics">
							<ul>
                            
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('myPhotoList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<li><img src="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['filepath'];?>
" class="img_M"></li>
                            <?php }} ?>           
                                
							</ul>
						</div>
						<div class="clearboth"></div>
						<div class="data_title">个人独白</div>
						<div class="clearboth"></div>
						<div class="bar"><div></div></div>
						<div class="clearboth"></div>
						<p class="mem_intro">
							<?php echo $_smarty_tpl->getVariable('member_profile')->value['description'];?>

						</p>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>
			<div id="mem_detail_data" class="page">
				<div class="top"></div>
				<div class="middle">
					<div class="content">
						<div class="data_title">详细资料</div>
						<div class="bar"><div></div></div>
						<div class="clearboth mg_b"></div>
						<div class="data_container">
							<div class="left">
								<ul>
									<!--<li>家鄉:</li>-->
									<li>體重:<?php echo $_smarty_tpl->getVariable('member_profile')->value['weight'];?>
</li>
									<!--<li>體型:</li>-->
									<!--<li>血型:</li>
									<li>樣貌自評:</li>-->
									<li>民族:<?php echo $_smarty_tpl->getVariable('member_profile')->value['nation'];?>
</li>
								</ul>
							</div>
							<div class="right">
								<ul>
									<!--<li>畢業學校:</li>
									<li>所學專業:</li>
									<li>擅長語言:</li>
									<li>公司性質:</li>
									<li>公司行業:</li>
									<li>宗教信仰:</li>-->
								</ul>
							</div>
						</div>
						
						<div class="line clearboth"></div>
						<div class="arrow">查看更多</div>
					</div>
					
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>
			<div class="member_category">
				<div class="mem_type">
					<div class="tag">
						<ul>
							<li class="selected">地图日志</li>
							<li>情感故事</li>
							<li>真情博文</li>
						</ul>
					</div>
				</div>
				<div class="clearboth"></div>
				<div class="content">
					<div id="mem_mapblog" class="mem_page show">
						<ul>
						   <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blogMapList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<li>
								<img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_S">
								<div class="map_data floatL">
									<a class="map_name" href="/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],24,'.');?>
</a>
									<div class="clearboth"></div>
									<div class="map_info">[<?php echo $_smarty_tpl->tpl_vars['v']->value['city'];?>
][<?php if ($_smarty_tpl->tpl_vars['v']->value['tag']==1){?>旅遊<?php }elseif($_smarty_tpl->tpl_vars['v']->value['tag']==2){?>美食<?php }else{ ?>娱乐<?php }?>]</div>
								</div>
								<div class="map_star">★★★★★</div>
								<div class="clearboth"></div>
								<div class="map_postdate">发表于<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['dateline'],"%Y/%m/%d");?>
&nbsp;|</div>
								<div class="map_reply">回应(<a class="emNum"><?php echo $_smarty_tpl->tpl_vars['v']->value['replay'];?>
</a>)</div>
							</li>
							<?php }} ?>
						</ul>
					</div>
					<div class="clearboth"></div>
					
					
					
					<div id="mem_story" class="mem_page hide">
						<ul>
						   <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('storyList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<li>
								<img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb'];?>
" class="img_S">
								<a class="story_name" href="/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['albumname'],20,'.');?>
</a>
								<div class="clearboth"></div>
								<div class="story_postdate">发表于<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['dateline'],"%Y/%m/%d");?>
&nbsp;|</div>
								<div class="story_reply">回应(<a class="emNum"><?php echo $_smarty_tpl->tpl_vars['v']->value['replay'];?>
</a>)</div>
							</li>
							<?php }} ?>
						</ul>
					</div>
					<div class="clearboth"></div>
					
					
					
					<div id="mem_blog" class="mem_page hide">
						<ul>
						   <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blogList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<li>
								<a class="blog_name" href="/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],18,'.');?>
</a>
								<div class="clearboth"></div>
								<div class="blog_postdate">发表于<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['dateline'],"%Y/%m/%d");?>
&nbsp;|</div>
								<div class="blog_reply">回应(<a class="emNum"><?php echo $_smarty_tpl->tpl_vars['v']->value['replay'];?>
</a>)</div>
							</li>
							<?php }} ?>
						</ul>
					</div>
					<div class="clearboth"></div>
	
				</div>
			</div>
			<div class="clearboth"></div>
		</div><!--left end-->
		
		<div class="mem_right">
			<div id="mem_match" class="sideinfo">
				<div class="top"><div class="title"></div></div>
				<div class="middle">
					<div class="content">
						<ul>
							<li><div class="label">年龄：</div><div class="text"><?php echo $_smarty_tpl->getVariable('member_profile')->value['age'];?>
</div></li>
							<li><div class="label">居住地：</div><div class="text"><?php echo $_smarty_tpl->getVariable('member_profile')->value['regprovince'];?>
-<?php echo $_smarty_tpl->getVariable('member_profile')->value['regcity'];?>
</div></li>
							<li><div class="label">性别：</div><div class="text"><?php if ($_smarty_tpl->getVariable('member_profile')->value['gender']==0){?>男性<?php }else{ ?>女性<?php }?></div></li>
							<li><div class="label">学历：</div><div class="text"><?php echo $_smarty_tpl->getVariable('member_profile')->value['education'];?>
</div></li>
							<li><div class="label">身高：</div><div class="text"><?php echo $_smarty_tpl->getVariable('member_profile')->value['height'];?>
</div></li>
							<li><div class="label">体重：</div><div class="text"><?php echo $_smarty_tpl->getVariable('member_profile')->value['weight'];?>
</div></li>
							<li><div class="label">感情状况：</div><div class="text"><?php echo $_smarty_tpl->getVariable('member_profile')->value['marital'];?>
</div></li>
							<li><div class="label">会员评级：</div><div class="text">不拘</div></li>
						</ul>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>
			<div id="mem_interest" class="sideinfo">
				<div class="top"><div class="title"></div></div>
				<div class="middle">
					<div class="content">
						<ul>
                        
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('interests_member_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<li>
								<div class="floatL mg_r mg_l"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['avatar_img'];?>
" class="img_S"></a>
</div>
								<div class="floatL">
									<a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
" target="_blank" class="font_memname"><?php if ($_smarty_tpl->tpl_vars['v']->value['nickname']==''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['nickname'];?>
<?php }?></a>
									<div><?php echo $_smarty_tpl->tpl_vars['v']->value['age'];?>
岁&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['regcity'];?>
</div>
									<a>Paliie ID:<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
</a>
								</div>
								<div class="clearboth"></div>
							</li>
					    <?php }} ?>  			
                            
						</ul>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<!--ad-->
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			<!--系統公告欄位-->
			<div class="publish">

				<div class="top"></div>
				<div class="clearboth"></div>
				<div class="middle">
					<div class="content">
						<div class="title">聯合活動申請</div>
						<div class="bar"><div></div></div>
						<div class="list">
							<ul>
								<li>標題A</li>
								<li>標題B</li>
								<li>標題C</li>
								<li>標題D</li>
								<li>標題E</li>
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>
			<div class="bb ad1">ad</div>
			<div class="clearboth"></div>
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			
			
		
		
		
		
		
		
		
		</div><!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	
<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</body>
</html>