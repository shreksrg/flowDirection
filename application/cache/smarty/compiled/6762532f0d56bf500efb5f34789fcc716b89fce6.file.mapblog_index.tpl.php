<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 21:49:22
         compiled from "../application/views/blog/mapblog_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16585542924f688ae2819190-82436565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6762532f0d56bf500efb5f34789fcc716b89fce6' => 
    array (
      0 => '../application/views/blog/mapblog_index.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16585542924f688ae2819190-82436565',
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
<link href="/static/css/display/mapblog/mapblog.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/ui/jquery.curvycorners.min.js"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mapblog.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
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
		<!--地圖搜索BAR-->
		<div class="searchbar">
			<form action="/index.php/blog/mapblog/search" method="post" >
				<div class="search_input">
					<div class="input_title">日誌搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">所在地:</div>
					<select name="province" id="province" onchange="scity(this.value);">
							                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('province_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
							                 <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['provinceID'];?>
" <?php if (($_smarty_tpl->getVariable('province')->value==$_smarty_tpl->tpl_vars['v']->value['provinceID'])){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['province'];?>
</option>
							                <?php }} ?>
										</select>
										&nbsp;
										<select name="city" id="city" onchange="sarea(this.value)">
											<option value="">請選擇城市</option>
										</select>
										&nbsp;
										<select name="area" id="area">
											<option value="">請選擇區域</option>
										</select>
					
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;分類:</div>
					<select name="category"><option value='' >不限</option><option value='1' if>美食</option><option value='2'>旅遊</option><option value='3' >休閒娛樂</option></select>
					<input type="hidden" value="" name="input_province" id="input_province"/>
							<input type="hidden" value="" name="input_city" id="input_city"/>
							<input type="hidden" value="" name="input_area" id="input_area"/>
							<input type="hidden" value="" name="input_detail_address" id="input_detail_address"/>
					<button type="submit" class="searchBtn" onclick="replaceID();return true;"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		<!--地圖區塊-->
		<div id="map_navigation">
			<div class="map_container" id="map_container">地圖區塊</div>
		</div>
		<div class="ad1">廣告</div>
		<div class="ad1">廣告</div>
		<div class="ad1">廣告</div>
		<div class="clearboth"></div>
		<div class="ad2">廣告</div>
		<div class="clearboth"></div>
		
		<!--分類推薦日誌-->
		<div id="mapblog_recommend">
			<div id="travel">
				<div class="content">
					<div class="title">旅遊推薦日誌</div>
					<div class="view" onclick="window.location.href='/index.php/blog/mapblog/search/1'">顯示更多</div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('travel')->value[0]['blogid'];?>
'" ><img src="<?php echo $_smarty_tpl->getVariable('travel')->value[0]['pic'];?>
" class="img_L"></div>
						<div class="info">
							<div class="map_type">[<a>旅遊</a>]</div>
							<div class="map_area">[<a><?php echo $_smarty_tpl->getVariable('travel')->value[0]['city'];?>
</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('travel')->value[0]['blogid'];?>
'" ><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('travel')->value[0]['SUBJECT'],24,'.');?>
</div>
						<div class="text" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('travel')->value[0]['blogid'];?>
'" ><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('travel')->value[0]['message'],24,'.');?>
</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
						    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('travel')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
						    <?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
							  <li onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'" ><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_S"></li>
							<?php }?>  
							<?php }} ?>
						</ul>
					</div>
				</div>
			</div>
			<div id="food">
				<div class="content">
					<div class="title">美食推薦日誌</div>
					<div class="view" onclick="window.location.href='/index.php/blog/mapblog/search/2'">顯示更多</div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('cate')->value[0]['blogid'];?>
'" ><img src="<?php echo $_smarty_tpl->getVariable('travel')->value[0]['pic'];?>
" class="img_L"></div>
						<div class="info">
							<div class="map_type">[<a>美食</a>]</div>
							<div class="map_area">[<a><?php echo $_smarty_tpl->getVariable('travel')->value[0]['city'];?>
</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('cate')->value[0]['blogid'];?>
'" ><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('cate')->value[0]['SUBJECT'],24,'.');?>
</div>
						<div class="text" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('cate')->value[0]['blogid'];?>
'" ><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('cate')->value[0]['message'],24,'.');?>
</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cate')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
						    <?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
							  <li onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'" ><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_S"></li>
							<?php }?>  
							<?php }} ?>
						</ul>
					</div>
				</div>
			</div>
			<div id="Entertainment">
				<div class="content">
					<div class="title">娛樂推薦日誌</div>
					<div class="view" onclick="window.location.href='/index.php/blog/mapblog/search/3'">顯示更多</div>
					<div class="bar"><div></div></div>
					<div class="top">
						<div class="main_pic" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('recreation')->value[0]['blogid'];?>
'" ><img src="<?php echo $_smarty_tpl->getVariable('recreation')->value[0]['pic'];?>
" class="img_L"></div>
						<div class="info">
							<div class="map_type">[<a>娛樂</a>]</div>
							<div class="map_area">[<a><?php echo $_smarty_tpl->getVariable('recreation')->value[0]['city'];?>
</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('recreation')->value[0]['blogid'];?>
'"><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('recreation')->value[0]['SUBJECT'],24,'.');?>
</div>
						<div class="text" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->getVariable('recreation')->value[0]['blogid'];?>
'" ><?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('recreation')->value[0]['message'],24,'.');?>
</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom">
						<ul>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recreation')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
						    <?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
							  <li onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'" ><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_S"></li>
							<?php }?>  
							<?php }} ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearboth"></div>
			<div id="mapblog_list">
				<ul>
				  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('newblogs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					<li>
						<div class="pic"  onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'" style=" cursor:pointer;" ><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" class="img_XL"></div>
						<div class="clearboth"></div>
						<div class="name" onclick="window.location.href='/index.php/browse_blog/map_detail/<?php echo $_smarty_tpl->tpl_vars['v']->value['blogid'];?>
'" style=" cursor:pointer;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],24,'.');?>
</div>
						<div class="clearboth"></div>
						<div class="info">
							<div>[<a class="map_type"><?php if ($_smarty_tpl->tpl_vars['v']->value['tag']==1){?>旅遊<?php }elseif($_smarty_tpl->tpl_vars['v']->value['tag']==2){?>美食<?php }else{ ?>娱乐<?php }?></a>]</div>
							<div>[<a class="map_area"><?php echo $_smarty_tpl->tpl_vars['v']->value['city'];?>
</a>]</div>
							<div class="map_star">★★★★★</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<?php }} ?>
				</ul>
				
			</div>
			<div class="clearboth"></div>
		
		</div>
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</body>
<script type="text/javascript" src="/static/js/blog/map.js"></script>
<script type="text/javascript" src="/static/js/blog/city.js"></script>
<script language="javascript">scity("","");</script>
</html>