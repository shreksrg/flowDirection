<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myblog.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/common.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/common.js"></script>
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
{include file="common/header.tpl"}
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
					<div class="main_title floatL">{$story.username}的故事</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->
						<!--詳細-->
						<div id="blog_detail">
							<div class="pagelinks"><a href="/index.php/browse_blog/story_list/{$story.userid}">{$story.username}的故事</a>><a class="currentPage">{$story.albumname|truncate:20}</a></div>
							<div class="bar"><div></div></div>
							<div class="clearboth mg_b"></div>
							<div class="blog_name font_name">{$story.albumname|truncate:20}</div>
							<div class="clearboth"></div>
							<div class="floatL font_text1">发布于</div><div class="blog_date font_text1 floatL">{$story.dateline|date_format:"%Y/%m/%d"}</div>
							<div class="clearboth mg_b"></div>
							<div class="floatL mg_b"><img src="{$story.thumb}" class="blog_pic img_XL"></div>
							<div class="floatL blog_content">
								<p>
									{$story.description}
								</p>
							<input type="hidden" id="blog_id" value="{$story.albumid}"></input>
                            <input type="hidden" id="avatar_img" value="{$user_avatar_img}"></input>	
							</div>
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="blog_comment_container">
                            
                             {if $user_id != ''}
								<div class="blog_comment_input">
									<img src="{$member_profile.avatar_img}"><textarea id="comment_content" ></textarea><div class="btn" onclick="comment(1)" >发表</div>
								</div>
                                <div class="clearboth"></div>
                              {else}
                               <div class="map_comment_input">
                                请您先 <a href="/index.php/member/login">登录</a> 网站，然后再进行评论。
                                </div>
                              <div class="clearboth"></div>
                                 {/if}
								                                
                                
								<div class="blog_comments common_comments">
									  {include file="common/comment.tpl"}
								</div>
							</div>
						</div>
						
						
						
						
					</div><!--內文end-->
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
		</div>
	</div>
	<!--左方end-->
	
	<!--右方区快-->
	{include file="common/member_info_menu.tpl"}

</div>
<!--contentEnd-->
<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>