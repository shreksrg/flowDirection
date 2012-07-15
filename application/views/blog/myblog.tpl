<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myblog.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>
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

	{include file="common/header.tpl"}
<!--contentBegin-->
<div id="content">
	<!--左方選單-->
	{include file="common/left.tpl"}
	<!--右方区快-->
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
					<div class="main_title floatL">我的博文</div>					
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
						<div id="myblog">
							<div class="title font_text2 mg_b">我的博文</div>
							<div class="addblogBtn" onclick="window.location.href='/index.php/blog/essay/add_essay'"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>					
							
							<div class="toolbar">
								<div class="manage floatL">
									<input class="selectall" id="selectall"  name="selectall" onclick="select_all($(this));" type="checkbox">
									<a>全选｜</a>
									<a class="delete" onclick="delete_all();">删除</a><a>｜</a><a class="edit" href="javascript:edit();">編輯</a>
								</div>						
							</div>
							<div class="blog_typebar">
								<div class="post_date">發布時間</div><div>｜</div><div class="blog_name">日誌標題</div><div>｜</div><div class="blog_famous">回應/人氣</div><div>｜</div><div class="blog_status">審核狀態</div>
							</div>
							<div class="bloglist">
								<ul>
								{foreach from=$blogList item=v key=k}
									<li>
										<div class="blog_check"><input type="checkbox" value="{$v['blogid']}" /></div>
										<div class="blog_date">{$v['dateline']|date_format:"%Y-%m-%d"}</div>
										<div class="blog_name udl" limit="36" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['SUBJECT']|truncate:18:'.'}</div>
										<div class="blog_famous"><a class="reply emNum">{$v['replynum']}</a>/<a class="famous">{$v['viewnum']}</a></div>
										<div class="blog_status">{if $v['STATUS']==1}審核中{else}通過審核{/if}</div>
									</li>
									{/foreach}
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
					</div><!--內文end-->
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
	</div>
	<div class="clearboth"></div>
</div>
<!--contentEnd-->
<!--footerBegin-->
	{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>
<script src="/static/js/blog/blog_index.js"></script>