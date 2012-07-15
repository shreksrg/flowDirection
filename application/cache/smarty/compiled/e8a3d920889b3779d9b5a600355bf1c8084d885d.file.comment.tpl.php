<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 15:25:20
         compiled from "../application/views/common/comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18883367114f6830e0c4cfe0-06588679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8a3d920889b3779d9b5a600355bf1c8084d885d' => 
    array (
      0 => '../application/views/common/comment.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18883367114f6830e0c4cfe0-06588679',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.date_format.php';
?>									<ul>
									<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('commentList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
										<li>
											<div class="pic"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['avatar_img'];?>
" class="comment_pic"></a></div>
											<div class="data">
												<div class="name"><a href="/index.php/member_info/index/uid/<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a></div>
												<div class="content"><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</div>
												<div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['create_time'],"Y-m-d");?>
</div>
												<div class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['create_time'],"H:i");?>
</div>
											</div>
											<!--<div class="delete" onclick="delete_comment($(this))" id="<?php echo $_smarty_tpl->tpl_vars['v']->value['comment_id'];?>
" userid="<?php echo $_smarty_tpl->tpl_vars['v']->value['userid'];?>
" >x</div>-->
										</li>
										<?php }} ?>
									</ul>
<script type="text/javascript">
function comment(type){
	var content=$('#comment_content').val();
	var blogId=$('#blog_id').val();
	var avatar_img = $('#avatar_img').val();
	$.ajax({ 
		   async:false,
		   type: "post",  
		   url: "/index.php/blog/comment/comment_add", 
		   dataType:'json',
		   data:'blog_id='+blogId+'&content='+content+'&type='+type,    
		   success: function(data,textStatus){
			   if(data.data==1){
				   //alert(data.message);
					var htmlStr='<li><div class="pic"><img class="comment_pic" src='+avatar_img+'></div>'+
								'<div class="data">'+
									'<div class="name">'+data.userName+'</div>'+
									'<div class="content">'+data.content+'</div>'+
									'<div class="date">'+data.date+'</div>'+
									'<div class="time">'+data.time+'</div>'+
								'</div>'+
								//'<div class="delete" onclick=\'delete_comment($(this))\' id='+data.comment_id+' userid='+data.userid+' >x</div>'+
							 '</li>';
					 $(".common_comments ul").prepend(htmlStr);
			   }; //把php中的返回值显示在预定义的result定位符位置 
		   },
		   error:function(xhr,status,e){
		   }
	});
}
</script>
