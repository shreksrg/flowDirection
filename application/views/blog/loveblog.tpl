<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/loveblog/loveblog.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>


<script src="/static/js/ui/jquery.curvycorners.min.js"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/loveblog.js"></script>
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
	{include file="common/header.tpl"}
	<div id="content">
		<div class="left">	
			<!--推薦故事-->
			<div id="story_recommend">
				<div class="top">
					<div class="title">					</div>
				</div>
				<div class="middle">
					<div class="content">
						{foreach from=$recommend item=v key=k}
							<div class="story{$k+1}">
								<div class="pic" onclick="window.location.href='/index.php/browse_blog/story_detail/{$v['albumid']}'" ><img src="{$v['thumb']}" width="200" height="200" ></div>
								<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/{$v['albumid']}'" >{$v['albumname']|truncate:20}</div>
							</div>
						{/foreach}
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			
			
			<!--情感日誌專欄-->
			<!--  
			<div id="loveblog_column">
				<div class="column">
					<div class="top"></div>
					<div class="titlebg"></div>
					<div class="middle">
						<div class="content">
							<ul>
								{foreach from=$recommedBlogList item=v key=k}
								<li>
									<div class="pic"><img src="/static/images/testpic.jpg" class="img_M"></div>
									<div class="text">{$v['message']|truncate:144}</div>
									<div class="clearboth"></div>
									<div class="member_name" onclick="window.location.href='/index.php/blog/index/detail?blog_id={$v['blogid']}'">{$v['SUBJECT']|truncate:12}</div>
								</li>
								{/foreach}
							</ul>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			-->
			<!--本周奇遇專題-->
			<div id="weekly_topic">
				<div class="column">
					<div class="top"></div>
					<div class="titlebg"></div>
					<div class="middle">
						<div class="content">
							<div class="pic"><img src="{$recommend_essay[0]['pic']}" class="img_2L"></div>
							<div class="topic">
								<div class="topic_name">{$recommend_essay[0]['SUBJECT']|truncate:60}</div>
								<div class="clearboth"></div>
								<div class="topic_text">{$recommend_essay[0]['message']|truncate:60}</div>
								<div class="clearboth"></div>
								<div class="topic_view" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$recommend_essay[0]['blogid']}'">查看詳情</div>
							</div>
							<div class="other_topic">
								<ul>
								{foreach from=$recommend_essay item=v key=k}
									{if $k!=0}
									<li onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['SUBJECT']|truncate:72}</li>
									{/if}
								{/foreach}
								</ul>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			<!--分類日誌-->
			<div id="loveblog_category">
				<!--婚戀沙龍-->
				<div id="salon">
					<div class="content">
						<div class="title">婚戀沙龍</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="{$shalong[0]['thumb']}" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/{$shalong[0]['albumid']}'"></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/{$shalong[0]['albumid']}'">{$shalong[0]['albumname']|truncate:60}</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/{$shalong[0]['albumid']}'">{$shalong[0]['description']|truncate:108}</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								{foreach from=$shalong item=v key=k}
									{if $k!=0}
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/{$v['albumid']}'">{$v['albumname']|truncate:48}</li>
									{/if}
								{/foreach}
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				<!--生活點滴-->
				<div id="life">
					<div class="content">
						<div class="title">生活點滴</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="{$diandi[0]['thumb']}" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/{$diandi[0]['albumid']}'"></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/{$diandi[0]['albumid']}'">{$diandi[0]['albumname']|truncate:60}</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/{$diandi[0]['albumid']}'">{$diandi[0]['description']|truncate:108}</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								{foreach from=$diandi item=v key=k}
									{if $k!=0}
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/{$v['albumid']}'">{$v['albumname']|truncate:48}</li>
									{/if}
								{/foreach}
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				<!--溫馨故事-->
				<div id="warm_story">
					<div class="content">
						<div class="title">溫馨故事</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="{$gushi[0]['thumb']}" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/{$gushi[0]['albumid']}'"></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/{$gushi[0]['albumid']}'">{$gushi[0]['albumname']|truncate:60}</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/{$gushi[0]['albumid']}'">{$gushi[0]['description']|truncate:80}</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								{foreach from=$gushi item=v key=k}
									{if $k!=0}
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/{$v['albumid']}'">{$v['albumname']|truncate:48}</li>
									{/if}
								{/foreach}
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				<!--趣味小品-->
				<div id="funny">
					<div class="content">
						<div class="title">趣味小品</div>
						<div class="bar"><div></div></div>
						<div class="main">
							<div class="pic"><img src="{$xiaopin[0]['thumb']}" class="img_L" onclick="window.location.href='/index.php/browse_blog/story_detail/{$xiaopin[0]['albumid']}'" ></div>
							<div class="name" onclick="window.location.href='/index.php/browse_blog/story_detail/{$xiaopin[0]['albumid']}'">{$xiaopin[0]['albumname']|truncate:60}</div>
							<div class="text" onclick="window.location.href='/index.php/browse_blog/story_detail/{$xiaopin[0]['albumid']}'">{$xiaopin[0]['description']|truncate:108}</div>
						</div>
						<div class="clearboth"></div>
						<div class="other">
							<ul>
								{foreach from=$xiaopin item=v key=k}
									{if $k!=0}
										<li  onclick="window.location.href='/index.php/browse_blog/story_detail/{$v['albumid']}'">{$v['albumname']|truncate:48}</li>
									{/if}
								{/foreach}
							</ul>
						</div>
						<div class="clearboth"></div>
					</div>
				</div>
				
			</div>
			
		</div><!--left end-->
		
		<div class="right">
			<!--ad-->
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			<!--愛情博文-->
			<div id="love_blog">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
						<div class="content">
							<div class="type">
								<ul>
									<li class="selected" id="rl_tab" onmousemove="ChgTab(1)">熱戀</li>
									<li  id="qs_tab"  onmousemove="ChgTab(2)">牽手</li>
									<li id="al_tab" onmousemove="ChgTab(3)">愛戀</li>
								</ul>
							</div>
							<div class="clearboth"></div>
							<div class="underline">
								<div class="line side"></div>
								<div class="arrow"></div>
							</div>
							<div class="clearboth"></div>
							<div class="list" id="rl_list">
								<ul>
								{foreach from=$relian item=v key=k}
									<li>
										<div class="pic"><img src="{$v['pic']}" class="img_S"></div>
										<div class="name" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['SUBJECT']|truncate:9}</div>
										<div class="text" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['message']|truncate:24}</div>
										<div class="view" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">查看更多</div>
									</li>
								{/foreach}
								</ul>
							</div>
							<div class="list" id="qs_list">
								<ul>
								{foreach from=$qianshou item=v key=k}
									<li>
										<div class="pic"><img src="{$v['pic']}" class="img_S"></div>
										<div class="name" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['SUBJECT']|truncate:9}</div>
										<div class="text" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['message']|truncate:24}</div>
										<div class="view" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">查看更多</div>
									</li>
								{/foreach}
								</ul>
							</div>
							<div class="list" id="al_list">
								<ul>
								{foreach from=$ailian item=v key=k}
									<li>
										<div class="pic"><img src="{$v['pic']}" class="img_S"></div>
										<div class="name" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['SUBJECT']|truncate:9}</div>
										<div class="text" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">{$v['message']|truncate:24}</div>
										<div class="view" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'">查看更多</div>
									</li>
								{/foreach}
								</ul>
							</div>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="bottom"></div>
			
			
			
			
			<!--人氣博主-->
			<div id="blogger_popular">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
						<div class="content">
							<div class="crown"></div>
							<ul>
                            
                            {foreach from=$hotblog item=v key=k}
								<li>
									<div class="pic"><a href="/index.php/member_info/index/uid/{$v.userid}"><img src="{$v.avatar_img}" class="img_M"></a></div>
									<div class="member_name"><a href="/index.php/member_info/index/uid/{$v.userid}">{$v.username}</a></div>
								</li>
							{/foreach}	
                                
                                
							</ul>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="bottom"></div>
						
			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			
			
		
		
		
		
		
		
		
		</div><!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	{include file="common/footer.tpl"}
</body>
</html>
<script src="/static/js/blog/loveblog_index.js"></script>