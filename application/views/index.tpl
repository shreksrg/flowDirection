<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/index.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
<script src="/static/js/layout/header.js" type="text/javascript"></script>
<script src="/static/js/common.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.cycle.all.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="/static/js/display/index.js" type="text/javascript"></script>
<script src="/static/js/register/register.js" type="text/javascript"></script>
<script src="/static/js/pca.js" type="text/javascript"></script>
<script src="/static/js/ymd.js" type="text/javascript"></script>
<script src="/static/js/layout/ulstSwthch.js" type="text/javascript"></script>
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
	<!------------------------------------------header------------------------------------------>
{include file="common/header.tpl"}
	<!------------------------------------------header-end------------------------------------------>
	
	<!-------------------------------------------content-------------------------------------------->
	<div id="content">
		<!--首頁上方欄位begin-->
		<div id="slideshow_container" class="mg_b">
			<div id="slideshow_L"></div>
			<div id="slideshow_C">
				<div id="slideshow">
					<img src="/static/images/banner/banner4.jpg">
					<img src="/static/images/show02.jpg">
					<img src="/static/images/show03.jpg">
					<img src="/static/images/show04.jpg">
					<img src="/static/images/show05.jpg">					
				</div>
				<div class="clearboth"></div>
				<div id="slideshow_control">
					<div id="prev" title="Previous"></div>
					<ul id="nav">						
					</ul>
					<div id="next" title="Next"></div>
				</div>
				
				<div id="login_container">
				
					<!--已登入-->
                    {if $login_check==1}
					<div id="index_login">
						<div id="index_user_container">
							<div id="index_user_id">{$commen_info.userid}</div>
							<div id="index_user_name" class="font_text2">{$commen_info.username}</div>
							<a onclick="location.href='/index.php/member_info/index/uid/{$commen_info.userid}'"><img class="img_L" src="{$commen_info.avatar_img}"></a>
							<!--<div id="index_user_percent">资料完善度：<a class="emNum">50</a>%</div>
							<div id="index_user_score">积分<a class="emNum">200</a>分</div>
							<div id="index_user_star" style="color:#FFCC00;">★★★★★</div>-->
						</div>
						<div class="clearboth"></div>
						<div id="index_msg_container">
							<div id="index_msg_L"></div>
							<div id="index_msg_C">
								<div id="index_msg_top">
									<div id="index_msg_mail" class="btn" onclick="location.href='/index.php/member/my_email/index'" style="cursor:pointer;">新邮件(<a class="emNum">{$commen_info.all_email_num}</a>)</div>
									<div class="border_block">|</div>
									<div id="index_msg_announce" class="btn" onclick="location.href='/index.php/member/my_email/get_admin_send_email'" style="cursor:pointer;">通知(<a class="emNum">{$commen_info.admin_email_num}</a>)</div>
									<!--<div class="border_block">|</div>
									<div id="index_msg_friend" class="btn" onclick="location.href='/index.php/friend'">朋友(<a class="emNum">{$commen_info.friend_num}</a>)</div>-->
								</div>
								<div class="clearboth"></div>
								<div id="index_msg_bottom">
									<div id="index_msg_mapblog" onclick="location.href='/index.php/blog/essay'"><a>情感日志</a></div>
									<div id="index_msg_act" onclick="location.href='/index.php/activity/my_in'"><a>我的活动</a></div>
								</div>
								<div class="clearboth"></div>
							</div>
							<div id="index_msg_R"></div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						
						
					</div>
					
					
					
					{else}
					
					<!--未登入-->
					<div id="index_logout">
                    <form action="/index.php/member/login/set_login" method="post" >
							<div class="login_text"><label for="username">帐号</label></br></div>
							<div><input type="text" name="username" id="username" class="input_text"></div>
							<div class="login_text"><label for="password">密码</label></div>
							<div><input type="password" name="password" id="password" class="input_text"></div>
							<div style="float:right;margin:10px 0;_margin:5px 0;">
								<div id="rememberme"><input type="checkbox" name="remember_me" id="remember_me"><label for="remember_me">记住我</label></div>
								<div id="forgotpsw"><a class="udl" onclick="setpassword();">忘记密碼?</a></div>				
								<div class="clearboth"></div>
							</div>
							<div class="clearboth"></div>
							<div id="login_btn" class="loginBtn" onclick="set_login()"></div>
							<div class="clearboth"></div>
						<div class="clearboth"></div>
						<div class="font_text2 floatR" style="margin-top:32px;">
							还在等什么?</br>
							快来邂逅属于你的美好奇遇
						</div>
						<div class="clearboth"></div>
						<a id="registerlink" href="/index.php/member/regist/index" class="regBtn"></a>
						<div class="clearboth"></div>
                     </form>   
					</div>	
                    {/if}
                    		
					<div class="clearboth"></div>
							
				</div>
				
				<div class="quickReg_msg font_text">完成注册任务可以领取积分抽大奖哦～</div>
				<div class="clearboth"></div>
			</div>
			<div id="slideshow_R"></div>
		</div>
		<div class="clearboth"></div>
		<!--首頁上方欄位end-->
		
		<!--首頁左側欄位-->
		<div class="index_L mg_r">
		<!-------------热门地图日志------------>
			<div class="index_mapblog mg_b">
				<div class="index_mapblog_t">
					<div class="index_mapblog_title auto"></div>
				</div>
				<div class="clearboth"></div>
				<div class="index_mapblog_m">
					<div class="index_mapblog_hot">
						<a class="hp_hotref_mb_one" onclick="window.location.href='/index.php/browse_blog/map_detail/{$blogMapList[0]['blogid']}'" ><img class="img_L" src="{$blogMapList[0]['pic']}"></a>
						<div class="clearboth"></div>
						<div class="index_mapblog_hot_content">
							<a>[{$blogMapList[0]['city']}][{if $blogMapList[0]['tag']==1}旅遊{elseif $blogMapList[0]['tag']==2}美食{else}娱乐{/if}]</a>
							<div class="clearboth"></div>
							<a class="font_title" onclick="window.location.href='/index.php/browse_blog/map_detail/{$blogMapList[0]['blogid']}'" >{$blogMapList[0]['SUBJECT']|truncate:24:'.'}</a>
							<div class="clearboth"></div>
							<div class="map_intro" limit="83" onclick="window.location.href='/index.php/browse_blog/map_detail/{$blogMapList[0]['blogid']}'" >{$blogMapList[0]['message']|truncate:24:'.'}</div>
							<div class="clearboth"></div>
							<a class="map_read" onclick="window.location.href='/index.php/browse_blog/map_detail/{$blogMapList[0]['blogid']}'" ></a>
							<div class="clearboth"></div>
						</div>
						<div class="list">
							<ul>
								{foreach from=$blogMapList item=v key=k}
								  {if $k!=0}
									<li>
										<div class="map_pic"><a class="hp_hotref_mb_sec" onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" ><img class="img_S" src="{$v['pic']}"></a></div>
										<div class="map_info">
											<a>[{$v['city']}][{if $v['tag']==1}旅遊{elseif $v['tag']==2}美食{else}娱乐{/if}]</a>
											<div class="clearboth"></div>
											<a class="map_name" limit="37" onclick="window.location.href='/index.php/browse_blog/map_detail/{$v['blogid']}'" >{$v['SUBJECT']|truncate:24:'.'}</a>
											<div class="clearboth"></div>
										</div>
									</li>
								  {/if}	
								{/foreach}
							</ul>
						</div>
					</div>
				</div>
				<div class="clearboth"></div>
				<div class="index_mapblog_b"></div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			<div id="popblog" class="sideinfo">
				<div class="top"><div class="title"></div></div>
				<div class="middle">
					<div class="content">
						<ul>
						   {foreach from=$blogEssayList item=v key=k}
							<li>
								<div class="popblog_pic" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'" ><a><img class="img_M" src="{$v['pic']}"></a></div>
								<div class="popblog_info">
									<a>{$v['username']}</a>
									<div class="clearboth"></div>
									<a class="font_title" limit="13" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'" >{$v['SUBJECT']|truncate:9}</a>
									<div class="clearboth"></div>
									<div class="popblog_intro" limit="32" onclick="window.location.href='/index.php/browse_blog/essay_detail/{$v['blogid']}'" >{$v['message']|truncate:24}</div>
								</div>
							</li>
					    {/foreach}
						</ul>
					</div>
				</div>
				<div class="bottom"></div>
			</div>
			<!--
			
			<div class="index_ad_L mg_b bb">广告</div>
			<div class="clearboth"></div>
			
			<div id="index_ad_List">
				<ul>
					<li>
						<img class="img_L" src="/static/images/testpic2.jpg">
						<div class="index_ad_content">
							<div class="index_ad_name" limit="16">广告标题广告标题广告标题广告标题广告标题广告标题广告标题</div>
							<div class="index_ad_text" limit="88">广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<img class="img_L" src="/static/images/testpic2.jpg">
						<div class="index_ad_content">
							<div class="index_ad_name" limit="16">广告标题广告标题广告标题广告标题广告标题</div>
							<div class="index_ad_text" limit="88">广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文</div>
						</div>
						<div class="clearboth"></div>
					</li>
					<li>
						<img class="img_L" src="/static/images/testpic2.jpg">
						<div class="index_ad_content">
							<div class="index_ad_name" limit="16">广告标题广告标题广告标题广告标题广告标题</div>
							<div class="index_ad_text" limit="88">广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文广告内文</div>
						</div>
						<div class="clearboth"></div>
					</li>
				</ul>
			</div>-->
		</div>				
		<!--首頁左側欄位end-->		
		
		<!--首頁右側欄位begin-->
		<div class="index_R">
		<!-------------------奇遇會員------------------->
			<div id="index_paliiemem_container" class="mg_b">
				<div id="index_paliiemem_top"></div>
				<div id="index_paliiemem_title"></div>
				<div id="index_paliiemem_zone">
					<ul>
						<li class="area_selected">吴江</li>
						<li>苏州</li>
						<li>南京</li>
						<li>常州</li>
						<li>上海</li>
					</ul>
					<a id="other_area" onclick="get_area_user_list({$not_in_city})">其他地区</a>
				</div>
				<div id="index_paliiemem_pic">
					<ul>
						{foreach from=$user_list item=v key=k}
						<li>							
							<a tagls=aurl href="/index.php/member_info/index/uid/{$v.userid}" target="_blank"><img tagls=avatar class="img_L" src="{$v.avatar_img}"></a>
							<div class="index_paliiemem_id"><a tagls=nurl href="/index.php/member_info/index/uid/{$v.userid}" target="_blank">{$v.username}</a></div>
							<div class="font_data"><a tagls=ages class="index_paliiemem_age font_data">{$v.age}</a>歲&nbsp;&nbsp;&nbsp;<a tagls=city class="index_paliiemem_area font_data">{$v.regcity}</a></div>
							<div tagls=level class="index_paliiemem_star star">★★★★★</div>
						</li>
					 {/foreach}  	
						
					</ul>
				</div>
				
				<div id="index_paliiemem_middle"></div>
				<div id="index_paliiemem_bottom"></div>
			</div>
			<div class="clearboth"></div>
			<!-------------------廣告------------------->
			<div class="index_ad_R1 bb mg_b"><a href="http://odeedee.taobao.com/"><img src="/static/images/banner/banner1.jpg"></a></div>
			<div class="clearboth"></div>
			<!-------------------熱點活動------------------->
			<div id="index_act" class="bb mg_b">
				<div id="index_act_title"></div>
				<div id="index_act_container">
					<a href="/index.php/browse_act/detail/id/{$hot_activity_list_detail.aid}"><img id="index_act_pic_main" src="/static/images/dd4.jpg"></a>
					<div id="index_act_content">
						<div id="index_act_name"><a limit="35" href="/index.php/browse_act/detail/id/{$hot_activity_list_detail.aid}">{$hot_activity_list_detail.SUBJECT}</a></div>
						<div class="clearboth mg_b"></div>
						<div>活动时间:{$hot_activity_list_detail.times}</div>
						<div>活动地点:<a class="act_area">{$hot_activity_list_detail.place}</a></div>
						<div class="clearboth"></div>
						<div id="index_act_text" limit="140">
							{$hot_activity_list_detail.description}
						</div>
						<div class="clearboth"></div>
						<div id="index_act_join_container">
							<div id="index_act_join">已有<a id="index_act_join_count" class="emNum">{$hot_activity_list_detail.membernum}</a>人报名参加</div>
							<!--<div id="index_act_join_btn"></div>-->
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						<div class="act_pics">
							<ul>
                            <!--{foreach from=$hot_activity_list item=v key=k}
								<li><a><img class="img_S" src="/data/attachment/album/{$v.logo}"></a></li>
                            {/foreach}  	  -->   
                            
                             <li><a href="/index.php/browse_act/detail/id/10"><img class="img_S" src="/static/images/dd6.jpg"></a></li>
                             <li><a href="/index.php/browse_act/detail/id/11"><img class="img_S" src="/static/images/dd5.jpg"></a></li>
                             <li><a href="/index.php/browse_act/detail/id/6"><img class="img_S" src="/static/images/dd.jpg"></a></li>
                             <li><a href="/index.php/browse_act/detail/id/5"><img class="img_S" src="/static/images/ddd.jpg"></a></li>
                             <li><a href="/index.php/browse_act/detail/id/8"><img class="img_S" src="/static/images/dd3.jpg"></a></li>
                             <li><a href="/index.php/browse_act/detail/id/9"><img class="img_S" src="/static/images/dd2.jpg"></a></li>
                                
							</ul>
						</div>
					</div>
					<div class="clearboth"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			<!-------------------廣告------------------->
			<div class="index_ad_R2 bb mg_b"><a href="http://odeedee.taobao.com/"><img src="/static/images/banner/banner5.gif"></a></div>
			<div class="clearboth"></div>
			<!-------------------誰來首頁------------------->
			<div id="index_visitor">
				<div id="index_visitor_title"></div>
				<div id="index_visitor_pic">
					<ul>
						<li><a href="member_info.php" target="_blank"><img class="img_M" src="/static/images/testpic2.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic2.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic2.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic2.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic2.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic2.jpg"></a></li>
						<li><a><img class="img_M" src="/static/images/testpic.jpg"></a></li>
					</ul>
				</div>
			</div>
			<div class="clearboth"></div>
		</div>
		<!--首頁右側欄位end-->
		<div class="clearboth"></div>
		
	</div>
	<div class="clearboth"></div>
	<!------------------------------------------content-end------------------------------------------>
	<!--------------------------------------------footer--------------------------------------------->
{include file="common/footer.tpl"}
	<!------------------------------------------footer-end------------------------------------------->
</body>
</html>