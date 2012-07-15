<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>消息提示</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/javascript" src="/static/js/jquery/jquery-1.7.1.min.js"></script>
</head>
<body>
<div class="showMsg">
	<div class="title_bg">
		<div class="text">消息提示</div>
		<a onclick="window.close();"><div class="close"></div></a>
	</div>
	<div class="showMsg_content" style="text-align:center" align="center">		
		<div class="content guery"><?php echo $msg?></div>
		<div class="clearboth"></div>
		<div class="bottom">
			<?php if($url_forward=='goback' || $url_forward=='') {?>			
			<a onclick="history.back();"><div class="backBtn"></div></a>
			<?php  } elseif($url_forward=="close") {?>
			<a onclick="window.close();"><div class="closeBtn"></div></a>
			<?php } elseif($url_forward=="blank") {?>
			<?php } elseif($url_forward) {?>
			<a href="<?php echo $url_forward?>"><div class="confirmBtn"></div></a>
			<script language="javascript">setTimeout("redirect('<?php echo $url_forward?>');",<?php echo $ms?>);</script>
			<?php }?>
			<?php if($returnjs) { ?>
			<script style="text/javascript"><?php echo $returnjs;?></script>
			<?php } ?>
			<?php if ($dialog):?>
			<script style="text/javascript">window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();</script>
			<?php endif;?>
		</div>
	</div>
</div>
<script style="text/javascript">
	function close_dialog() {
		window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();
	}
</script>
</body>
</html>