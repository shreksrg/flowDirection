<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 15:34:12
         compiled from "../application/views/blog/loveblog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153086334f6832f47cd637-00869663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b84aaf63eb210907feb4ad8a8bddfcca128d495e' => 
    array (
      0 => '../application/views/blog/loveblog.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153086334f6832f47cd637-00869663',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.truncate.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/loveblog/loveblog.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>


<script src="/static/js/ui/jquery.curvycorners.min.js"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/loveblog.js"></script>
<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	$(function(){		
		DD_belatedPNG.fix('.png_bg');
		$.ie6hover();
	});
</script>
<![endif]--> 

</head>
<body>
	<?php $_template = new Smarty_Internal_Template("common/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div id="content">
		<div class="left">	
			<!--推薦故事-->
			<div id="story_recommend">
				<div class="top">
					<div class="title">					</div>
				</div>
				<div class="middle">
					<div class="content">
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recommend')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<div class="story<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
								<div class="pic" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
'" ><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb'];?>
" width="200" height="200" ></div>
								<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
'" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['albumname'],20);?>
</div>
							</div>
						<?php }} ?>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			
			
			<!--情感日誌專欄-->
			<!--  
			<div id="loveblog_column">
				<div class="column">
					<div class="top"></div>
					<div class="titlebg"></div>
					<div class="middle">
						<div class="content">
							<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recommedBlogList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<li>
									<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
									<div class="text"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['message'],144);?>
</div>
									<div class="clearboth"></div>
									<div class="member_name" onclick="window.location.href='/index.php/blog/index/detail?blog_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],12);?>
</div>
								</li>
								<?php }} ?>
							</ul>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			-->
			<!--本周奇遇專題-->
			<div id="weekly_topic">
				<div class="column">
					<div class="top"></div>
					<div class="titlebg"></div>
					<div class="middle">
						<div class="content">
							<div class="pic"><img src="<?php echo $_smarty_tpl->getVariable('recommend_essay')->value[0]['pic'];?>
" class="img_2L"></div>
							<div class="topic">
								<div class="topic_name"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('recommend_essay')->value[0]['SUBJECT'],60);?>
</div>
								<div class="clearboth"></div>
								<div class="topic_text"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('recommend_essay')->value[0]['message'],60);?>
</div>
								<div class="clearboth"></div>
								<div class="topic_view" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->getVariable('recommend_essay')->value[0]['blogid'];?>
'">查看詳情</div>
							</div>
							<div class="other_topic">
								<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recommend_essay')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
									<li onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],72);?>
</li>
									<?php }?>
								<?php }} ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			<!--分類日誌-->
			<div id="loveblog_category">
				<!--婚戀沙龍-->
				<div id="salon">
					<div class="content">
						<div class="title">婚戀沙龍</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="<?php echo $_smarty_tpl->getVariable('shalong')->value[0]['thumb'];?>
" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('shalong')->value[0]['albumid'];?>
'"></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('shalong')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('shalong')->value[0]['albumname'],60);?>
</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('shalong')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('shalong')->value[0]['description'],108);?>
</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('shalong')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['albumname'],48);?>
</li>
									<?php }?>
								<?php }} ?>
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				<!--生活點滴-->
				<div id="life">
					<div class="content">
						<div class="title">生活點滴</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="<?php echo $_smarty_tpl->getVariable('diandi')->value[0]['thumb'];?>
" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('diandi')->value[0]['albumid'];?>
'"></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('diandi')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('diandi')->value[0]['albumname'],60);?>
</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('diandi')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('diandi')->value[0]['description'],108);?>
</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('diandi')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['albumname'],48);?>
</li>
									<?php }?>
								<?php }} ?>
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				<!--溫馨故事-->
				<div id="warm_story">
					<div class="content">
						<div class="title">溫馨故事</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="<?php echo $_smarty_tpl->getVariable('gushi')->value[0]['thumb'];?>
" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('gushi')->value[0]['albumid'];?>
'"></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('gushi')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('gushi')->value[0]['albumname'],60);?>
</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('gushi')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('gushi')->value[0]['description'],80);?>
</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('gushi')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['albumname'],48);?>
</li>
									<?php }?>
								<?php }} ?>
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				<!--趣味小品-->
				<div id="funny">
					<div class="content">
						<div class="title">趣味小品</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="<?php echo $_smarty_tpl->getVariable('xiaopin')->value[0]['thumb'];?>
" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('xiaopin')->value[0]['albumid'];?>
'" ></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('xiaopin')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('xiaopin')->value[0]['albumname'],60);?>
</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->getVariable('xiaopin')->value[0]['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('xiaopin')->value[0]['description'],108);?>
</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('xiaopin')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['albumname'],48);?>
</li>
									<?php }?>
								<?php }} ?>
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				
			</div>
			
		</div><!--left end-->
		
		<div class="right">
			<!--ad-->
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			<!--愛情博文-->
			<div id="love_blog">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
						<div class="content">
							<div class="type">
								<ul>
									<li class="selected" id="rl_tab" onmousemove="ChgTab(1)">熱戀</li>
									<li  id="qs_tab"  onmousemove="ChgTab(2)">牽手</li>
									<li id="al_tab" onmousemove="ChgTab(3)">愛戀</li>
								</ul>
							</div>
							<div class="clearboth"></div>
							<div class="underline">
								<div class="line side"></div>
								<div class="arrow"></div>
							</div>
							<div class="clearboth"></div>
							<div class="list" id="rl_list">
								<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('relian')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<li>
										<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_S"></div>
										<div class="name" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],9);?>
</div>
										<div class="text" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['message'],24);?>
</div>
										<div class="view" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'">查看更多</div>
									</li>
								<?php }} ?>
								</ul>
							</div>
							<div class="list" id="qs_list">
								<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('qianshou')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<li>
										<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_S"></div>
										<div class="name" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],9);?>
</div>
										<div class="text" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['message'],24);?>
</div>
										<div class="view" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'">查看更多</div>
									</li>
								<?php }} ?>
								</ul>
							</div>
							<div class="list" id="al_list">
								<ul>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ailian')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<li>
										<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_S"></div>
										<div class="name" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],9);?>
</div>
										<div class="text" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['message'],24);?>
</div>
										<div class="view" onclick="window.location.href='/index.php/browse_blog/essay_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'">查看更多</div>
									</li>
								<?php }} ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="bottom"></div>
			
			
			
			
			<!--人氣博主-->
			<div id="blogger_popular">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
						<div class="content">
							<div class="crown"></div>
							<ul>
                            
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hotblog')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<li>
									<div class="pic"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['avatar_img'];?>
" class="img_M"></a></div>
									<div class="member_name"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></div>
								</li>
							<?php }} ?>	
                                
                                
							</ul>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="bottom"></div>
						
			
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
<script src="/static/js/blog/loveblog_index.js"></script>