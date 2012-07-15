<?php /* Smarty version Smarty-3.0.7, created on 2012-03-21 05:30:26
         compiled from "../application/views/activity_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12003111174f68f6f2f1b8f7-13096127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3af4980791ade9ca00d7a37e0bceb0312f647b0' => 
    array (
      0 => '../application/views/activity_search.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12003111174f68f6f2f1b8f7-13096127',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/activity/activity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/display/activity.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.fancybox-1.3.4.pack.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ymd.js" type="text/javascript"></script>
<script src="/static/js/pca.js"></script>

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
<body onload="getcitys('city2','<?php echo $_smarty_tpl->getVariable('province')->value;?>
')">

<?php $_template = new Smarty_Internal_Template("common/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	<div id="content">
		<!--活動搜索BAR-->
		<div class="searchbar">
			<form action="/index.php/browse_act/search" method="post">
				<div class="search_input">
					<div class="input_title">活動搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">活動時間:</div>
					<select name="years" id="birthyear" onchange="year(this.value)"><?php echo $_smarty_tpl->getVariable('yearoption')->value;?>
</select>&nbsp;&nbsp;<select name="months" id="birthmonth" onchange="month(this.value)"><?php echo $_smarty_tpl->getVariable('monthoption')->value;?>
</select>&nbsp;&nbsp;<select name="days" id="birthday"><?php echo $_smarty_tpl->getVariable('dayoption')->value;?>
</select>
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;Ta的所在地:</div>
					<select id="city1" name="input_province" onChange="changepro('city2','city1')">
                                                <option value="">省/直辖市</option>
                                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('province_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['province'];?>
" <?php echo $_smarty_tpl->tpl_vars['v']->value['selected'];?>
><?php echo $_smarty_tpl->tpl_vars['v']->value['province'];?>
</option>
                                                <?php }} ?>
                                                </select>
                                                <select name="input_city" id="city2">
                                                    <?php if ($_smarty_tpl->getVariable('city')->value!=''){?><option value="<?php echo $_smarty_tpl->getVariable('city')->value;?>
"><?php echo $_smarty_tpl->getVariable('city')->value;?>
</option><?php }?>
                                                    <option value="">請選擇城市</option>
                                            </select> 
					<button type="submit" class="searchBtn"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		<div id="act_left">	
			<!--搜索結果-->
			<div id="act_search">
				<div class="page">
					<div class="top"></div>
					<div class="middle"	>
						<div class="content">
							<div class="main_title">活動搜索結果</div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="act_list">
								<ul>
                                
                                
                                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('search_activity_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									<li>
										<img src="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['logo'];?>
" class="img_M" onclick="window.location.href='/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
'">
										<div class="act_info">
											<div class="act_type">[<a class="type"><?php echo $_smarty_tpl->tpl_vars['v']->value['class'];?>
</a>]</div><div limit="28" class="act_name" onclick="window.location.href='/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
'"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUBJECT'];?>
</div>
											<div class="clearboth"></div>
											<div>活動時間:<a class="date"><?php echo $_smarty_tpl->tpl_vars['v']->value['times'];?>
</a>至<a class="date"><?php echo $_smarty_tpl->tpl_vars['v']->value['etimes'];?>
</a></div>
											<div class="clearboth"></div>
											<div>关注人數:<a class="invite_number emNum"><?php echo $_smarty_tpl->tpl_vars['v']->value['follownum'];?>
</a>人</div>						i			
										</div>										
										<div class="clearboth"></div>
										<div class="moreinfo">
											<div class="view" onclick="window.location.href='/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
'" style="cursor:pointer;">查看詳情</div>
											<div class="applied">已報名人數:<a><?php echo $_smarty_tpl->tpl_vars['v']->value['membernum'];?>
</a>人</div>						
											<div class="countdown">活动报名截止時間還剩:<a><?php echo $_smarty_tpl->tpl_vars['v']->value['dayNum'];?>
</a>天<a><?php echo $_smarty_tpl->tpl_vars['v']->value['hourNum'];?>
</a>时<a><?php echo $_smarty_tpl->tpl_vars['v']->value['minuteNum'];?>
</a>分</div>
										</div>
									</li>
                                    
                                <?php }} ?>  	    
									
									
									
									
									
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
					</div>
					<div class="bottom"></div>
					
				</div>	
					
			</div>
			<div class="clearboth"></div>
		</div><!--left end-->
		
		
		<?php $_template = new Smarty_Internal_Template("common/activity_act_right.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		
		<!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</body>
</html>