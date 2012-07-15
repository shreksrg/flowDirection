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
	<!------------------------------------------header------------------------------------------>
{include file="common/header.tpl"}
	<!------------------------------------------header-end------------------------------------------>
	
	<!-------------------------------------------content-------------------------------------------->
	<div id="content">
		<div class="mem_left">	
			<div id="mem_data" class="page">
				<div class="top"></div>
				<div class="middle">
					<div class="content">
						<div>Paliie ID:1234567</div>
						<img src="/static/images/testpic.jpg" class="main img_2L">
						<div class="data">
							<div class="mem_name">{$nickname}</div>
							<div class="mem_data">年龄：{$years-$birthyear}岁&nbsp;&nbsp;性别：{if $gender}女{else}男{/if}&nbsp;&nbsp;居住地：{$regprovince }&nbsp;&nbsp;</div>
							<ul>
								<li>身高：{$height}cm</li>
								<li>体重：{$weight}kg</li>
								<li>民族：{$nation}</li>
								<li>学历：{$education}</li>
								<li>职业：无</li>
								<li>月收入:10000</li>
								<li>感情状况:{ if $marital=='1'}未婚{elseif $marital=='2'}已婚{else}离异{/if}</li>
								
							</ul>
							<div class="clearboth"></div>
							<div class="btns">
								<a class="addfriendBtn"></a>&nbsp;
								<a class="sendmsgBtn" href="sendmessage.php"></a>&nbsp;
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
								<li><img src="/static/images/testpic.jpg" class=" img_M"></li>
								<li><img src="/static/images/testpic.jpg" class=" img_M"></li>
								<li><img src="/static/images/testpic.jpg" class=" img_M"></li>
								<li><img src="/static/images/testpic.jpg" class=" img_M"></li>
								<li><img src="/static/images/testpic.jpg" class=" img_M"></li>
								<li><img src="/static/images/testpic.jpg" class=" img_M"></li>
							</ul>
						</div>
						<div class="clearboth"></div>
						<div class="data_title">个人独白</div>
						<div class="clearboth"></div>
						<div class="bar"><div></div></div>
						<div class="clearboth"></div>
						<p class="mem_intro">
							{$description}
							
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
									<li>家鄉:</li>
									<li>體重:</li>
									<li>體型:</li>
									<li>血型:</li>
									<li>樣貌自評:</li>
									<li>民族:</li>
								</ul>
							</div>
							<div class="right">
								<ul>
									<li>畢業學校:</li>
									<li>所學專業:</li>
									<li>擅長語言:</li>
									<li>公司性質:</li>
									<li>公司行業:</li>
									<li>宗教信仰:</li>
								</ul>
							</div>
						</div>
						<div class="data_container_hide">
							<div class="left">
								<ul>
									<li>家鄉:</li>
									<li>體重:</li>
									<li>體型:</li>
									<li>血型:</li>
									<li>樣貌自評:</li>
									<li>民族:</li>
								</ul>
							</div>
							<div class="right">
								<ul>
									<li>畢業學校:</li>
									<li>所學專業:</li>
									<li>擅長語言:</li>
									<li>公司性質:</li>
									<li>公司行業:</li>
									<li>宗教信仰:</li>
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
							<li>相册</li>
						</ul>
					</div>
				</div>
				<div class="clearboth"></div>
				<div class="content">
					<div id="mem_mapblog" class="mem_page show">
						<ul>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<div class="map_data floatL">
									<a class="map_name" href="member_map_detail.php">日志标题</a>
									<div class="clearboth"></div>
									<div class="map_info">[地区][类别]</div>
								</div>
								<div class="map_star">★★★★★</div>
								<div class="clearboth"></div>
								<div class="map_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="map_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<div class="map_data floatL">
									<a class="map_name">日志标题</a>
									<div class="clearboth"></div>
									<div class="map_info">[地区][类别]</div>
								</div>
								<div class="map_star">★★★★★</div>
								<div class="clearboth"></div>
								<div class="map_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="map_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<div class="map_data floatL">
									<a class="map_name">日志标题</a>
									<div class="clearboth"></div>
									<div class="map_info">[地区][类别]</div>
								</div>
								<div class="map_star">★★★★★</div>
								<div class="clearboth"></div>
								<div class="map_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="map_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<div class="map_data floatL">
									<a class="map_name">日志标题</a>
									<div class="clearboth"></div>
									<div class="map_info">[地区][类别]</div>
								</div>
								<div class="map_star">★★★★★</div>
								<div class="clearboth"></div>
								<div class="map_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="map_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<div class="map_data floatL">
									<a class="map_name">日志标题</a>
									<div class="clearboth"></div>
									<div class="map_info">[地区][类别]</div>
								</div>
								<div class="map_star">★★★★★</div>
								<div class="clearboth"></div>
								<div class="map_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="map_reply">回应(<a class="emNum">99</a>)</div>
							</li>
						</ul>
					</div>
					<div class="clearboth"></div>
					
					
					
					<div id="mem_story" class="mem_page hide">
						<ul>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<a class="story_name" href="member_story_detail.php">故事标题</a>
								<div class="clearboth"></div>
								<div class="story_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="story_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<a class="story_name">故事标题</a>
								<div class="clearboth"></div>
								<div class="story_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="story_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<a class="story_name">故事标题</a>
								<div class="clearboth"></div>
								<div class="story_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="story_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<a class="story_name">故事标题</a>
								<div class="clearboth"></div>
								<div class="story_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="story_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<img src="/static/images/testpic.jpg" class="img_S">
								<a class="story_name">故事标题</a>
								<div class="clearboth"></div>
								<div class="story_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="story_reply">回应(<a class="emNum">99</a>)</div>
							</li>
						</ul>
					</div>
					<div class="clearboth"></div>
					
					
					
					<div id="mem_blog" class="mem_page hide">
						<ul>
							<li>
								<a class="blog_name" href="member_blog_detail.php">博文标题</a>
								<div class="clearboth"></div>
								<div class="blog_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="blog_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<a class="blog_name">博文标题</a>
								<div class="clearboth"></div>
								<div class="blog_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="blog_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<a class="blog_name">博文标题</a>
								<div class="clearboth"></div>
								<div class="blog_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="blog_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<a class="blog_name">博文标题</a>
								<div class="clearboth"></div>
								<div class="blog_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="blog_reply">回应(<a class="emNum">99</a>)</div>
							</li>
							<li>
								<a class="blog_name">博文标题</a>
								<div class="clearboth"></div>
								<div class="blog_postdate">发表于2011/12/31&nbsp;|</div>
								<div class="blog_reply">回应(<a class="emNum">99</a>)</div>
							</li>
						</ul>
					</div>
					<div class="clearboth"></div>
					
					
					
					<div id="mem_album" class="mem_page hide">
						<ul>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
							<li>
								<div align="center">
									<img src="/static/images/testpic.jpg" class="img_L">
									<div class="album_name">相册标题</div>
									<div class="pic_count">100张相片</div>
								</div>
							</li>
						</ul>
					</div>
					
					
				</div>
			</div>
			<div class="clearboth"></div>
		</div><!--left end-->
		
		<div class="mem_right"">
			<div id="mem_match" class="sideinfo">
				<div class="top"><div class="title"></div></div>
				<div class="middle">
					<div class="content">
						<ul>
							<li><div class="label">年龄：</div><div class="text">不拘</div></li>
							<li><div class="label">居住地：</div><div class="text">不拘</div></li>
							<li><div class="label">性别：</div><div class="text">不拘</div></li>
							<li><div class="label">学历：</div><div class="text">不拘</div></li>
							<li><div class="label">身高：</div><div class="text">不拘</div></li>
							<li><div class="label">体重：</div><div class="text">不拘</div></li>
							<li><div class="label">购房情况：</div><div class="text">不拘</div></li>
							<li><div class="label">月收入：</div><div class="text">不拘</div></li>
							<li><div class="label">感情状况：</div><div class="text">不拘</div></li>
							<li><div class="label">有无子女：</div><div class="text">不拘</div></li>
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
							<li>
								<div class="floatL mg_r mg_l"><a href="member_info.php" target="_blank"><img src="/static/images/testpic.jpg" class="img_S"></a>
</div>
								<div class="floatL">
									<a href="member_info.php" target="_blank" class="font_memname">会员名称</a>
									<div>25岁&nbsp;上海</div>
									<a>Paliie ID:1234567</a>
								</div>
								<div class="clearboth"></div>
							</li>
							<li>
								<div class="floatL mg_r mg_l"><a><img src="/static/images/testpic.jpg" class="img_S"></a>
</div>
								<div class="floatL">
									<a href="member_info.php" class="font_memname">会员名称</a>
									<div>25岁&nbsp;上海</div>
									<a>Paliie ID:1234567</a>
								</div>
								<div class="clearboth"></div>
							</li>
							<li>
								<div class="floatL mg_r mg_l"><a><img src="/static/images/testpic.jpg" class="img_S"></a>
</div>
								<div class="floatL">
									<a href="member_info.php" class="font_memname">会员名称</a>
									<div>25岁&nbsp;上海</div>
									<a>Paliie ID:1234567</a>
								</div>
								<div class="clearboth"></div>
							</li>
							<li>
								<div class="floatL mg_r mg_l"><a><img src="/static/images/testpic.jpg" class="img_S"></a>
</div>
								<div class="floatL">
									<a href="member_info.php" class="font_memname">会员名称</a>
									<div>25岁&nbsp;上海</div>
									<a>Paliie ID:1234567</a>
								</div>
								<div class="clearboth"></div>
							</li>
							<li>
								<div class="floatL mg_r mg_l"><a><img src="/static/images/testpic.jpg" class="img_S"></a>
</div>
								<div class="floatL">
									<a href="member_info.php" class="font_memname">会员名称</a>
									<div>25岁&nbsp;上海</div>
									<a>Paliie ID:1234567</a>
								</div>
								<div class="clearboth"></div>
							</li>
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
	<!------------------------------------------content-end------------------------------------------>
	<!--------------------------------------------footer--------------------------------------------->
{include file="common/footer.tpl"}	<!------------------------------------------footer-end------------------------------------------->
</body>
</html>