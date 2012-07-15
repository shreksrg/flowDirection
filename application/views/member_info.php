<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/member/member.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/common.js" type="text/javascript"></script>
<script src="/static/js/layout/header.js" type="text/javascript"></script>
<script src="/static/js/display/member.js" type="text/javascript"></script>
</head>
<body>

{include file="common/header.tpl"}

	<div id="content">
		<div class="mem_left">	
			<div id="mem_data" class="page">
				<div class="top"></div>
				<div class="middle">
					<div class="content">
					    <input type="hidden" id="friendId" value="{$member.userid}" />
			         <input type="hidden" id="friendName" value="{$member.username}" />
						<div>Paliie ID:{$member.userid}</div>
						<img src="{$member_profile.avatar_img}" class="main img_2L">
						<div class="data">
							<div class="mem_name">{$member_profile.nickname}</div>
							<div class="mem_data">年龄：{$member_profile.age}岁&nbsp;&nbsp;性别：{if $member_profile.gender==0}男性{else}女性{/if}&nbsp;&nbsp;居住地：{$member_profile.regprovince}-{$member_profile.regcity}&nbsp;&nbsp;</div>
							<ul>
								<li>身高：{$member_profile.height}</li>
								<li>体重：{$member_profile.weight}</li>
								<li>民族：{$member_profile.nation}</li>
								<li>学历：{$member_profile.education}</li>
								<!--<li>职业：无</li>
								<li>月收入:10000</li>-->
								<li>感情状况:{$member_profile.marital}</li>
							</ul>
							<div class="clearboth"></div>
							<div class="btns">
								<a class="addfriendBtn"></a>&nbsp;
								<a class="sendmsgBtn" href="/index.php/member_info/sendmessage/uid/{$member.userid}"></a>&nbsp;
								<a class="addwatchBtn"></a>
							</div>
						</div>
						<div class="clearboth"></div>
						<div class="data_title">个性生活照</div>
						<div class="clearboth"></div>
						<div class="bar"><div></div></div>
						<div class="clearboth"></div>
						<div class="mem_pics">
							<ul>
                            
                            {foreach from=$myPhotoList item=v key=k}
								<li><img src="/data/attachment/album/{$v.filepath}" class="img_M"></li>
                            {/foreach}           
                                
							</ul>
						</div>
						<div class="clearboth"></div>
						<div class="data_title">个人独白</div>
						<div class="clearboth"></div>
						<div class="bar"><div></div></div>
						<div class="clearboth"></div>
						<p class="mem_intro">
							{$member_profile.description}
						</p>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>
			<div id="mem_detail_data" class="page">
				<div class="top"></div>
				<div class="middle">
					<div class="content">
						<div class="data_title">详细资料</div>
						<div class="bar"><div></div></div>
						<div class="clearboth mg_b"></div>
						<div class="data_container">
							<div class="left">
								<ul>
									<!--<li>家鄉:</li>-->
									<li>體重:{$member_profile.weight}</li>
									<!--<li>體型:</li>-->
									<!--<li>血型:</li>
									<li>樣貌自評:</li>-->
									<li>民族:{$member_profile.nation}</li>
								</ul>
							</div>
							<div class="right">
								<ul>
									<!--<li>畢業學校:</li>
									<li>所學專業:</li>
									<li>擅長語言:</li>
									<li>公司性質:</li>
									<li>公司行業:</li>
									<li>宗教信仰:</li>-->
								</ul>
							</div>
						</div>
						
						<div class="line clearboth"></div>
						<div class="arrow">查看更多</div>
					</div>
					
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>
			<div class="member_category">
				<div class="mem_type">
					<div class="tag">
						<ul>
							<li class="selected">地图日志</li>
							<li>情感故事</li>
							<li>真情博文</li>
						</ul>
					</div>
				</div>
				<div class="clearboth"></div>
				<div class="content">
					<div id="mem_mapblog" class="mem_page show">
						<ul>
						   {foreach from=$blogMapList item=v key=k}
							<li>
								<img src="{$v['pic']}" class="img_S">
								<div class="map_data floatL">
									<a class="map_name" href="/index.php/browse_blog/map_detail/{$v['blogid']}" >{$v['SUBJECT']|truncate:24:'.'}</a>
									<div class="clearboth"></div>
									<div class="map_info">[{$v['city']}][{if $v['tag']==1}旅遊{elseif $v['tag']==2}美食{else}娱乐{/if}]</div>
								</div>
								<div class="map_star">★★★★★</div>
								<div class="clearboth"></div>
								<div class="map_postdate">发表于{$v['dateline']|date_format:"%Y/%m/%d"}&nbsp;|</div>
								<div class="map_reply">回应(<a class="emNum">{$v.replay}</a>)</div>
							</li>
							{/foreach}
						</ul>
					</div>
					<div class="clearboth"></div>
					
					
					
					<div id="mem_story" class="mem_page hide">
						<ul>
						   {foreach from=$storyList item=v key=k}
							<li>
								<img src="{$v['thumb']}" class="img_S">
								<a class="story_name" href="/index.php/browse_blog/story_detail/{$v['albumid']}" >{$v['albumname']|truncate:20:'.'}</a>
								<div class="clearboth"></div>
								<div class="story_postdate">发表于{$v['dateline']|date_format:"%Y/%m/%d"}&nbsp;|</div>
								<div class="story_reply">回应(<a class="emNum">{$v.replay}</a>)</div>
							</li>
							{/foreach}
						</ul>
					</div>
					<div class="clearboth"></div>
					
					
					
					<div id="mem_blog" class="mem_page hide">
						<ul>
						   {foreach from=$blogList item=v key=k}
							<li>
								<a class="blog_name" href="/index.php/browse_blog/essay_detail/{$v['blogid']}">{$v['SUBJECT']|truncate:18:'.'}</a>
								<div class="clearboth"></div>
								<div class="blog_postdate">发表于{$v['dateline']|date_format:"%Y/%m/%d"}&nbsp;|</div>
								<div class="blog_reply">回应(<a class="emNum">{$v.replay}</a>)</div>
							</li>
							{/foreach}
						</ul>
					</div>
					<div class="clearboth"></div>
	
				</div>
			</div>
			<div class="clearboth"></div>
		</div><!--left end-->
		
		<div class="mem_right">
			<div id="mem_match" class="sideinfo">
				<div class="top"><div class="title"></div></div>
				<div class="middle">
					<div class="content">
						<ul>
							<li><div class="label">年龄：</div><div class="text">{$member_profile.age}</div></li>
							<li><div class="label">居住地：</div><div class="text">{$member_profile.regprovince}-{$member_profile.regcity}</div></li>
							<li><div class="label">性别：</div><div class="text">{if $member_profile.gender==0}男性{else}女性{/if}</div></li>
							<li><div class="label">学历：</div><div class="text">{$member_profile.education}</div></li>
							<li><div class="label">身高：</div><div class="text">{$member_profile.height}</div></li>
							<li><div class="label">体重：</div><div class="text">{$member_profile.weight}</div></li>
							<li><div class="label">感情状况：</div><div class="text">{$member_profile.marital}</div></li>
							<li><div class="label">会员评级：</div><div class="text">不拘</div></li>
						</ul>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<div class="clearboth"></div>
			<div id="mem_interest" class="sideinfo">
				<div class="top"><div class="title"></div></div>
				<div class="middle">
					<div class="content">
						<ul>
                        
                        {foreach from=$interests_member_list item=v key=k}
							<li>
								<div class="floatL mg_r mg_l"><a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank"><img src="{$v.avatar_img}" class="img_S"></a>
</div>
								<div class="floatL">
									<a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank" class="font_memname">{if $v.nickname==''}{$v.username}{else}{$v.nickname}{/if}</a>
									<div>{$v.age}岁&nbsp;{$v.regcity}</div>
									<a>Paliie ID:{$v.userid}</a>
								</div>
								<div class="clearboth"></div>
							</li>
					    {/foreach}  			
                            
						</ul>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
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
						<div class="title">聯合活動申請</div>
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
			<div class="bb ad1">ad</div>
			<div class="clearboth"></div>
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
			
			
		
		
		
		
		
		
		
		</div><!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	
{include file="common/footer.tpl"}
</body>
</html>