<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 18:27:41
         compiled from "../application/views/index_act_detail.php" */ ?>
<?php /*%%SmartyHeaderCode:19017892024f685b9d3a2fc0-83755146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6307492d4df8b6a14939351a5defb82f108d39c7' => 
    array (
      0 => '../application/views/index_act_detail.php',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19017892024f685b9d3a2fc0-83755146',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详细</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/activity/activity.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.3.2.min.js" type="text/javascript"></script> 
<script src="/static/js/ui/jquery-ui-1.5.3.min.js" type="text/javascript"></script> 
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
<body>
	<!------------------------------------------header------------------------------------------>
<?php $_template = new Smarty_Internal_Template("common/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<!------------------------------------------header-end------------------------------------------>
	

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
					<select name="input_province" id="city1" onChange="changepro('city2','city1')">
                    	 <option value="">省/直辖市</option>
                    	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('province_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['province'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['province'];?>
</option>
                        <?php }} ?>
                        
                    </select>
					<select name="input_city" id="city2">
                        <option value="">請選擇城市</option>
                    </select> 
					<button type="submit" class="searchBtn"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div><!--bar end-->
		
		<div id="act_left">	
			<div id="act_content">
				<div class="page">
					<div class="top"></div>
					<div class="middle"	>
						<div class="content">
							<div class="main_title"><?php echo $_smarty_tpl->getVariable('act_info')->value['SUBJECT'];?>
</div>
							<?php if ($_smarty_tpl->getVariable('act_info')->value['attention']==1){?><div class="add2watch" onclick="add_attention('<?php echo $_smarty_tpl->getVariable('act_info')->value['aid'];?>
')">加入關注</div><?php }?>
							<div class="clearboth"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="act_info">
								<div class="act_info_left">
									<ul>	
										<li><div class="label">舉辦人:</div><div class="member_name text"><?php echo $_smarty_tpl->getVariable('act_info')->value['username'];?>
</div></li>
                                        <li><div class="label">活動地区:</div><div class="text"><?php echo $_smarty_tpl->getVariable('act_info')->value['province'];?>
-<?php echo $_smarty_tpl->getVariable('act_info')->value['city'];?>
</div></li>
										<li><div class="label">活動地點:</div><div class="text"><?php echo $_smarty_tpl->getVariable('act_info')->value['place'];?>
</div></li>
										<li><div class="label">活動時間:</div><div class="text"><?php echo $_smarty_tpl->getVariable('act_info')->value['times'];?>
至<?php echo $_smarty_tpl->getVariable('act_info')->value['etimes'];?>
</div></li>
										<li><div class="label">活動類型:</div><div class="text"><?php echo $_smarty_tpl->getVariable('act_info')->value['class'];?>
</div></li>
										<li><div class="label">費用備註:</div><div class="text"><?php echo $_smarty_tpl->getVariable('act_info')->value['cost'];?>
</div></li>
										<li><div class="label">支付方式:</div><div class="text"><?php echo $_smarty_tpl->getVariable('act_info')->value['paytype'];?>
</div></li>
										<li><div class="label">查詢電話:</div><div class="text"><?php echo $_smarty_tpl->getVariable('act_info')->value['phone'];?>
</div></li>
									</ul>
								</div>
								<div class="act_info_right">
									<div>關注人數<a class="act_watch_total"><?php echo $_smarty_tpl->getVariable('act_info')->value['hotuserNum'];?>
</a>人&nbsp;&nbsp;報名總數<a class="act_apply_total"><?php echo $_smarty_tpl->getVariable('act_info')->value['joinNum'];?>
</a>人(男<a class="male"><?php echo $_smarty_tpl->getVariable('act_info')->value['joinmailNum'];?>
</a>人，女<a class="female"><?php echo $_smarty_tpl->getVariable('act_info')->value['joinemailNum'];?>
</a>人)</div>
									<div>距離報名截止日期還剩<a class="act_countdown"><?php echo $_smarty_tpl->getVariable('act_info')->value['dayNum'];?>
</a>天<a class="act_date_countdown emNum"><?php echo $_smarty_tpl->getVariable('act_info')->value['hourNum'];?>
</a>时<a class="act_date_countdown emNum"><?php echo $_smarty_tpl->getVariable('act_info')->value['minuteNum'];?>
</a>分</div>
									<div class="clearboth"></div>
									<?php if ($_smarty_tpl->getVariable('act_info')->value['join']==1){?><a id="applylink" class="applyBtn" href="/index.php/activity/my_in/actApply/aid/<?php echo $_smarty_tpl->getVariable('act_info')->value['aid'];?>
"></a><?php }?>
									<div class="clearboth"></div>
									<?php if ($_smarty_tpl->getVariable('act_info')->value['invite']==1){?><a id="invitelink" class="inviteBtn" href="/index.php/activity/my_launch/actInvite/aid/<?php echo $_smarty_tpl->getVariable('act_info')->value['aid'];?>
"></a><?php }?>
								</div>
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
							<div class="act_content">
								<div class="tabs">
									<div class="tag">
										<ul>
											<li class="selected" id="act_detail_intro">活動介紹</li>
											<li id="act_detail_participants">報名會員</li>
										</ul>
									</div>
									<div class="clearboth"></div>
								</div>					
							</div>
							<div class="act_detail_intro">
								<div class="act_pic_pri"><img src="/data/attachment/album/<?php echo $_smarty_tpl->getVariable('act_info')->value['thumb'];?>
" class="img_XL"></div>
								<div class="act_intro">
									<?php echo $_smarty_tpl->getVariable('act_info')->value['description'];?>

								</div>
								<div class="clearboth"></div>
								<div class="act_pic_sub">
									<ul>
                                    
                                    
									<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('act_info')->value['pic_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
									  <a rel="actphotgroup" href="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['filepath'];?>
"> <img src="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['filepath'];?>
" class="img_S"></a>
								    <?php }} ?>  	
										
                                        
                                        
									</ul>
								</div>
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
							
							<div class="act_detail_member">
								<ul>
                                
                                
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('act_info')->value['user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                	<li>
										<a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['avatar_img'];?>
" class="img_M"></a>
										<div class="clearboth"></div>
										<div class="member_name"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></div>
										<div class="clearboth"></div>
										<div class="member_info"><a><?php if ($_smarty_tpl->tpl_vars['v']->value['sex']==0){?>男<?php }?><?php if ($_smarty_tpl->tpl_vars['v']->value['sex']==1){?>女<?php }?></a>&nbsp;<a><?php echo $_smarty_tpl->tpl_vars['v']->value['age'];?>
</a>岁</div>
										<div class="clearboth"></div>
									</li>
                               <?php }} ?>     		
									
									
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			
		</div><!--left end-->
		<?php $_template = new Smarty_Internal_Template("common/activity_act_right.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	<!------------------------------------------content-end------------------------------------------>
	<!--------------------------------------------footer--------------------------------------------->
<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<!------------------------------------------footer-end------------------------------------------->
</body>
</html>

<script>
$("a[rel=actphotgroup]").fancybox({
				'titlePosition'	: 'inside'
});
</script>