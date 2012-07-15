<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 15:47:33
         compiled from "../application/views/blog/member_story.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13416450214f683615cbe590-97348456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97ac12d363b67e47e00d22dcbba3291e4535a2e8' => 
    array (
      0 => '../application/views/blog/member_story.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13416450214f683615cbe590-97348456',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.truncate.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mystory.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/common.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/loveblog.js"></script>
<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	DD_belatedPNG.fix('.png_bg');
	$.ie6hover();
</script>
<![endif]--> 

</head>
<body>
<div id="main">
<!--headerEnd-->
<?php $_template = new Smarty_Internal_Template("common/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!--contentBegin-->
<div id="content">
	<!--左方選單-->
	<div class="floatL">
		<div id="mypaliie_tip_container" class="mg_b mg_r">
			<div id="mypaliie_tip_left" class="floatL png_bg"></div>
			<div id="mypaliie_tip_center" class="floatL png_bg">
				<div id="mypaliie_tip_icon" class="floatL png_bg"></div>
				<div id="mypaliie_tip_text" class="floatL">tipTEXT</div>
				<div id="mypaliie_tip_knowmore" class="floatR">>>了解更多</div>
			</div>
			<div id="mypaliie_tip_right" class="floatL png_bg"></div>
		</div>
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">廣告</div>	
		<div class="clearboth"></div>
		
		<!--內文-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title floatL ">奇遇故事</div>					
					<div class="clearboth"></div>
					<div class="content">					
					
						<!--內文-->
						<div id="mystory">
							<div class="pagelinks"><a class="currentPage"><?php echo $_smarty_tpl->getVariable('member')->value['username'];?>
的故事</a></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="storylist">
								<ul>
								   <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('storyList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<li>										
										<div class="story_date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['dateline'],"%Y-%m-%d");?>
</div>
										<div class="borderbtmwhite"></div>
										<a class="story_name" onclick="window.location.href='/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
'" ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['albumname'],20,'.');?>
</a>
										<div class="clearboth"></div>
										<a href="/index.php/browse_blog/story_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['albumid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb'];?>
" class="img_M"></a>
										<p><?php echo $_smarty_tpl->tpl_vars['v']->value['description'];?>
</p>
										<div class="clearboth"></div>
									</li>
									<?php }} ?>
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
					</div><!--內文end-->
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
	</div>
	<!--左方end-->
	
	<!--右方区快-->
	<?php $_template = new Smarty_Internal_Template("common/member_info_menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<!--右方区块end-->
</div>
<!--contentEnd-->
<!--footerBegin-->
<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!--footerEnd-->
</div>
</body>
</html>