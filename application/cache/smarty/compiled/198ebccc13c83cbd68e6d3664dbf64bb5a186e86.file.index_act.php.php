<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 19:14:19
         compiled from "../application/views/index_act.php" */ ?>
<?php /*%%SmartyHeaderCode:2990105834f68668b48fea5-49250573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '198ebccc13c83cbd68e6d3664dbf64bb5a186e86' => 
    array (
      0 => '../application/views/index_act.php',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2990105834f68668b48fea5-49250573',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('this')->value->config->item('site_name');?>
 - <?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/activity/activity.css" type="text/css" rel="stylesheet">
<!--<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery-ui-1.8.16.custom.min.js"></script>-->
<script src="/static/js/jquery/jquery-1.3.2.min.js" type="text/javascript"></script> 
<script src="/static/js/ui/jquery-ui-1.5.3.min.js" type="text/javascript"></script> 

<script src="/static/js/layout/header.js"></script>
<script src="/static/js/display/activity.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.fancybox-1.3.4.pack.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ymd.js" type="text/javascript"></script>
<script src="/static/js/pca.js"></script>

</head>
<body>
	
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
		<div class="clearboth"></div>
		
		<div id="act_left">	
			
			<div id="act_show" class="column">
				<div class="top"></div>
				<div class="titlebg"></div>
				<div class="clearboth"></div>
				<div class="middle">
					<div id="featured">
						<ul class="ui-tabs-nav">
                          
                          <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('act_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		        			<li class="ui-tabs-nav-item" id="nav-fragment-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
		        				<a href="#fragment-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
		        					<img src="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['logo'];?>
" alt="" />
		        					<span><?php echo $_smarty_tpl->tpl_vars['v']->value['SUBJECT'];?>
</span>
		        				</a>
		        			</li>  
                         <?php }} ?>  	
                         	
		    			</ul>  
                        
                        
                        
		    		 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('act_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					    <div id="fragment-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="ui-tabs-panel" style="">  
					        <img src="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb'];?>
" alt=""  width="400" height="250"/> 
					        <div class="info" >  
						        <h2><a href="/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
" class="act_name"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUBJECT'];?>
</a></h2>  
						        <p limit="115"><?php echo $_smarty_tpl->tpl_vars['v']->value['description'];?>

						        <a href="/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
" class="more">...查看更多</a></p>  
					        </div>  
					    </div>  
                     <?php }} ?>  	   
      
					</div>
					<div class="clearboth"></div>
				</div>
				<div class="bottom"></div>
			</div>
			
			<div id="act_category">
				<!--<div class="act_type">
					<div class="tag">
						<ul>
							<li class="selected">婚戀</li>
							<li>旅遊</li>
							<li>派對</li>
							<li>聚餐</li>
							<li>戶外</li>
						</ul>
					</div>
				</div>-->
				<div class="clearboth"></div>
				<div class="content">
					<!--<div class="act_area">
						<ul>
							<li>吳江</li>
							<li class="selected">蘇州</li>
							<li>南京</li>
							<li>常州</li>
							<li>崑山</li>
						</ul>
						<div class="other">其他地區</div>
					</div>-->
					<div class="clearboth"></div>
					<div class="underline">
						<div class="line page"></div>
						<div class="arrow"></div>
					</div>
					<div class="clearboth"></div>
					<div class="act_list">
						<ul>
                        
                        
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('activity_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<li>
								<img src="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['logo'];?>
" class="img_M" onclick="window.location.href='/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
'" style="cursor:pointer;">
								<div class="act_info">
									<div class="top"><a>[</a><a class="type" href="/index.php/browse_act/search/<?php echo $_smarty_tpl->tpl_vars['v']->value['s_class'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['class'];?>
</a><a>]&nbsp;</a><a limit="28" class="name" href="/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUBJECT'];?>
</a></div>
									<div>活動時間:<a class="date"><?php echo $_smarty_tpl->tpl_vars['v']->value['times'];?>
至<?php echo $_smarty_tpl->tpl_vars['v']->value['etimes'];?>
</a></div>
									<div>关注人數:<a class="invite_number emNum"><?php echo $_smarty_tpl->tpl_vars['v']->value['follownum'];?>
</a>人</div>									
								</div>
                               
								<!--<a class="joinBtn" id="applylink1" href="/index.php/activity/my_in/actApply/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
"></a>-->
                                <a class="joinBtn" id="applylink1" href="/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
"></a>
								<div class="clearboth"></div>
								<div class="moreinfo">
                                	<a class="view" href="/index.php/browse_act/detail/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
">查看詳情</a>
									
									<div class="applied">
                                    	已報名人數:<?php echo $_smarty_tpl->tpl_vars['v']->value['membernum'];?>
人 |
                                    	距离报名截止时间:<?php echo $_smarty_tpl->tpl_vars['v']->value['dayNum'];?>
天<?php echo $_smarty_tpl->tpl_vars['v']->value['hourNum'];?>
时<?php echo $_smarty_tpl->tpl_vars['v']->value['minuteNum'];?>
分
                                    </div>		
									
								</div>
							</li>
                       <?php }} ?>  	         
						</ul>
				  </div>
				  <div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			
			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
		
			<div id="act_album_best">
				<div class="column">
					<div class="top"></div>
					<div class="titlebg"></div>
					<div class="clearboth"></div>
					<div class="middle">
						<div class="content">
							<ul>
                            
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('over_act_list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            
								<li>
									<div class="name"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUBJECT'];?>
</div>
									<div class="clearboth"></div>
									<img src="/data/attachment/album/<?php echo $_smarty_tpl->tpl_vars['v']->value['logo'];?>
" class="img_M">
								</li>
                                
                           <?php }} ?>  	           
                                

							</ul>
						</div>
					</div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
			</div>
			
			
			
			
			
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