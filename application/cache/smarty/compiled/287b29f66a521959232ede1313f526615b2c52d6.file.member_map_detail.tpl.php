<?php /* Smarty version Smarty-3.0.7, created on 2012-03-20 19:39:53
         compiled from "../application/views/blog/member_map_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15577876774f686c89d35da6-31168318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '287b29f66a521959232ede1313f526615b2c52d6' => 
    array (
      0 => '../application/views/blog/member_map_detail.tpl',
      1 => 1332222220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15577876774f686c89d35da6-31168318',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/www/qypaliie.com/application/third_party/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mymap.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/common.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<script src="/static/js/display/mapblog.js"></script>
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
	<div class="floatL mg_b">
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
					<div class="main_title floatL">地图日志</div>
					<div class="clearboth"></div>
					<div class="content">					
					
						<!--詳細地圖日誌-->
						<div id="map_detail">
							<div class="pagelinks"><a href="/index.php/browse_blog/map_list/<?php echo $_smarty_tpl->getVariable('map')->value['userid'];?>
"><?php echo $_smarty_tpl->getVariable('map')->value['username'];?>
的地图日志</a>><a class="currentPage"><?php echo $_smarty_tpl->getVariable('map')->value['SUBJECT'];?>
</a></div>
							<div class="bar"><div></div></div>
							<div class="clearboth mg_b"></div>
							<div class="map_container" id="map_container">
										地圖區塊
							</div>
							<div class="clearboth mg_b"></div>
							<!--<div class="floatR">
								<div class="map_search">
									<input type="text"><button class="pathBtn"></button>
								</div>
								<div class="clearboth"></div>
								<div class="map_show_nearbymember">显示周遭会员</div>
							</div>-->
							<div class="map_name"><?php echo $_smarty_tpl->getVariable('map')->value['SUBJECT'];?>
</div>
							
							<div class="map_tag">[<a class="map_area"><?php echo $_smarty_tpl->getVariable('map')->value['city'];?>
</a>][<a class="map_type"><?php if ($_smarty_tpl->getVariable('map')->value['tag']==1){?>旅遊<?php }elseif($_smarty_tpl->getVariable('map')->value['tag']==2){?>美食<?php }else{ ?>娱乐<?php }?></a>]</div>
							
							<div class="clearboth"></div>
							<div>評分<a class="map_star">★★★★★</a></div>
							<div class="clearboth"></div>
							<div class="map_date"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('map')->value['dateline'],"%Y/%m/%d");?>
</div>
							<div class="clearboth"></div>
							<div class="btns">
								<!--<button class="shareBtn"></button><button class="recommendBtn"></button>--><a id="addcollect" style="cursor:pointer;" onclick="addcollect('<?php echo $_smarty_tpl->getVariable('map')->value['blogid'];?>
','<?php echo $_smarty_tpl->getVariable('user_id')->value;?>
')">收藏</a>
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="floatL map_content">
								<p>
									<?php echo $_smarty_tpl->getVariable('map')->value['message'];?>

								</p>
								<input type="hidden" id="blog_id" value="<?php echo $_smarty_tpl->getVariable('map')->value['blogid'];?>
"></input>
                                <input type="hidden" id="avatar_img" value="<?php echo $_smarty_tpl->getVariable('user_avatar_img')->value;?>
"></input>
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="map_pic">
								<img src="<?php echo $_smarty_tpl->getVariable('map')->value['pic'];?>
" class="img_L">
								
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
                            
							<div class="map_comment_container">
                            
                          
                                
                                 <?php if ($_smarty_tpl->getVariable('user_id')->value!=''){?>
								<div class="map_comment_input">
									<img src="<?php echo $_smarty_tpl->getVariable('user_avatar_img')->value;?>
"><textarea id="comment_content" ></textarea><div class="btn" onclick="comment(0)" >发表</div>
								</div>
                                <div class="clearboth"></div>
                               <?php }else{ ?>
								
                                
								
                                <div class="map_comment_input">
                                请您先 <a href="/index.php/member/login">登录</a> 网站，然后再进行评论。
                                </div>
                               
								<div class="clearboth"></div>
                               <?php }?> 
                                 <div class="map_comments common_comments">
									<?php $_template = new Smarty_Internal_Template("common/comment.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
								</div>
                                 
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
	
</div>
<!--contentEnd-->
<!--footerBegin-->
<?php $_template = new Smarty_Internal_Template("common/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<!--footerEnd-->
</div>
</body>
<script type="text/javascript" src="/static/js/blog/map_position.js"></script>
<script type="text/javascript" src="/static/js/blog/city.js"></script>
<script language="javascript">scity("","");</script>
<script type="text/javascript">
    show_map("<?php echo $_smarty_tpl->getVariable('city')->value;?>
","<?php echo $_smarty_tpl->getVariable('detail_address')->value;?>
");
</script>
</html>