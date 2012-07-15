<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 18:27:41
         compiled from "../application/views/common/activity_act_right.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8262849574f685b9d55fc81-82846943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dab51e790e1cef1b9d6c45294a521b242a50632' => 
    array (
      0 => '../application/views/common/activity_act_right.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8262849574f685b9d55fc81-82846943',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_truncate')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.truncate.php';
?><div id="act_right">
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
						<div class="title">聯合合活動申請</div>
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
			
			<div id="act_review">
				<div class="sideinfo">
					<div class="top">					
						<div class="title"></div>
					</div>
					<div class="clearboth"></div>
					<div class="middle">
						<div class="content">
							<div class="act_pic_pri">
								<img src="/static/images/testpic2.jpg">
							</div>
							<div class="act_info">
								<div class="enter_actBtn"></div>
								<div class="act_name">活動標題</div>
								<div class="clearboth"></div>
								<div class="act_text">活動內容活動內容活動內容活動內容活動內容</div>
							</div>
							<div class="clearboth"></div>
							<div class="underline">
								<div class="arrow"></div>
								<div class="line side"></div>
							</div>
							<div class="clearboth"></div>
							<div class="act_pic_sub">
								<ul>
									<li><img src="/static/images/testpic.jpg"></li>
									<li><img src="/static/images/testpic2.jpg"></li>
									<li><img src="/static/images/testpic.jpg"></li>
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
					</div>				
					<div class="clearboth"></div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			
			<div class="bb ad1">ad</div>
			<div class="clearboth"></div>
			
			<div id="blog_best">
            
            
            
				<div class="sideinfo">
					<div class="top">					
						<div class="title"></div>
					</div>
					<div class="clearboth"></div>
                    
                    
                    
                    
					<div class="middle">
						<div class="content">
						<ul>
                        
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blog')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<li>
								<div class="act_pic">
									<img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['pic'];?>
" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
'" style="cursor:pointer;">
								</div>
								<div class="act_info">
									<div class="act_name" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
'" style="cursor:pointer;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['SUBJECT'],9);?>
</div>
									<div class="clearboth"></div>
									<div class="act_text" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
'" style="cursor:pointer;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['message'],24);?>
</div>
								</div>
								<div class="view" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
'" style="cursor:pointer;">>>查看更多</div>
								<div class="clearboth"></div>
							</li>
							 <?php }} ?>  	 
                             
						</ul>
						</div>
					</div>	
                    
                    
                    
                    
                    
                    
                    
                    			
					<div class="clearboth"></div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
                
                
                
                
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			
			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
		
		</div>