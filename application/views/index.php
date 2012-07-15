{include file="common/header.php"}


		<!--首頁上方欄位begin-->
		<div id="slideshow_container" class="mg_b">
			<div id="slideshow_L"></div>
			<div id="slideshow_C">
				<div id="slideshow">
					<img src="/static/images/show01.jpg">
					<img src="/static/images/show02.jpg">
					<img src="/static/images/show03.jpg">
					<img src="/static/images/show04.jpg">
					<img src="/static/images/show05.jpg">					
				</div>
				
				<div id="slideshow_control">
					<div id="prev" title="Previous"></div>
					<ul id="nav"></ul>
					<div id="next" title="Next"></div>
				</div>
				
				<div id="login_container">
				
				
				
				
				
					<!--已登入-->
					<div id="index_login">
						<div id="index_user_container">
							<div id="index_user_id">Luffy</div>
							<div id="index_user_name" class="font_text2">魯夫</div>
							<img id="index_user_pic" class="img_L" src="/static/images/testpic2.jpg">
							<div id="index_user_percent">资料完善度：<a class="emNum">50</a>%</div>
							<div id="index_user_score">积分<a class="emNum">200</a>分</div>
							<div id="index_user_star" style="color:#FFCC00;">★★★★★</div>
						</div>
						<div class="clearboth"></div>
						<div id="index_msg_container">
							<div id="index_msg_L"></div>
							<div id="index_msg_C">
								<div id="index_msg_top">
									<div id="index_msg_mail" class="btn">邮件(<a class="emNum">0</a>)</div>
									<div class="border_block">|</div>
									<div id="index_msg_announce" class="btn">通知(<a class="emNum">1</a>)</div>
									<div class="border_block">|</div>
									<div id="index_msg_friend" class="btn">朋友(<a class="emNum">2</a>)</div>
								</div>
								<div class="clearboth"></div>
								<div id="index_msg_bottom">
									<div id="index_msg_mapblog"><a>情感日志</a></div>
									<div id="index_msg_album"><a>我的相册</a></div>
									<div id="index_msg_act"><a>我的活动</a></div>
								</div>
							</div>
							<div id="index_msg_R"></div>
						</div>
					</div>
					
					
					
					
					
					<!--未登入-->
					<div id="index_logout" style="display:none;">
						<div class="login_text"><label for="username">帳號</label></br></div>
						<div><input type="text" name="username" id="username" class="input_text"></div>
						<div class="clearboth"></div>
						<div class="login_text"><label for="password">密碼</label></div>
						<div><input type="password" name="password" id="password" class="input_text"></div>
						<div style="float:right;margin:10px 0;_margin:5px 0;">
							<div id="rememberme"><input type="checkbox" name="remember_me" id="remember_me"><label for="remember_me">記住我</label></div>
							<div id="forgotpsw"><a href="#">忘記密碼?</a></div>				
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>
						<div id="login_btn" class="png_bg"></div>
						<div class="clearboth"></div>
						<div class="font_text2" style="float:right;text-align:left;margin-top:48px;">
							还在等什么?</br>
							快来邂逅属于你的美好奇遇
						</div>
						<div class="clearboth"></div>
						<div class="quickReg_btn"></div>
					</div>					
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
			<div class="index_mapblog mg_b ">
				<div class="index_mapblog_t">
					<div class="index_mapblog_title auto"></div>
				</div>
				<div class="index_mapblog_m">
					<div class="index_mapblog_hot">
						<a class="img_frame"><img class="img_L" src="/static/images/testpic2.jpg"></a>
						<div class="index_mapblog_hot_content">
							<h2 class="star">★★★★★</h2>
							<h4 limit="26" class="font_text2">地圖日誌標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題</h4>
							<h6 class="font_text1">地圖位置</h6>
							<div class="map_read"></div>
						</div>
					</div>
					<div class="index_mapblog_list">
						<ul>
							<li>
								<img class="img_S" src="/static/images/testpic2.jpg">
								<div>
									<h4 class="font_text2" limit="18">地圖日誌標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題標題</h4>
									<h6 class="font_text1">地圖位置1</h6>
								</div>
							</li>
							<li>
								<img class="img_S" src="/static/images/testpic.jpg">
								<div>
									<h4 class="font_text2" limit="18">地圖日誌標題標題標題標題標題標題標題標題標題標題標題標題</h4>
									<h6 class="font_text1">地圖位置2</h6>
								</div>
							</li>
							<li>
							<img class="img_S" src="/static/images/testpic2.jpg">
								<div>
									<h4 class="font_text2" limit="18">地圖日誌標題標題標題標題標題標題標題標題標題標題標題標題</h4>
									<h6 class="font_text1">地圖位置3</h6>
								</div>
							</li>
						</ul>
						<div class="clearboth"></div>
					</div>
				</div>
				<div class="index_mapblog_b"></div>
			</div>
			<!--广告-->
			<div class="index_ad_L mg_b bb">广告</div>
			<!--广告-->
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
			</div>
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
						<li class="area_selected">吳江</li>
						<li>蘇州</li>
						<li>南京</li>
						<li>常州</li>
						<li>崑山</li>
					</ul>
					<a id="other_area">其他地區</a>
				</div>
				<div id="index_paliiemem_pic">
					<ul>
					{foreach from=$members item=v key=k}
					
						<li>							
							<img id="index_user_pic" class="img_L" src="{avatar($v['userid'],'small')}">
							<div class="index_paliiemem_id font_text2">{$v['username']}</div>
							<div class="font_data"><a class="index_paliiemem_age font_data">{intval(date('Y')-$v['birthyear'])}</a>歲&nbsp;&nbsp;&nbsp;<a class="index_paliiemem_area font_data">{$v['regcity']}</a></div>
							<div class="index_paliiemem_star star">★★★★★</div>
						</li>
					{/foreach}
					</ul>
				</div>
				<div class="index_paliiemem_bar"></div>
				<div id="index_paliiemem_middle"></div>
				<div id="index_paliiemem_bottom"></div>
			</div>
			<div class="clearboth"></div>
			<!-------------------廣告------------------->
			<div class="index_ad_R1 bb mg_b">&nbsp;廣告</div>
			<div class="clearboth"></div>
			<!-------------------熱點活動------------------->
			<div id="index_act" class="bb mg_b">
				<div id="index_act_title"></div>
				<div id="index_act_container">
					<img id="index_act_pic_main" src="/static/images/testpic.jpg">
					<div id="index_act_pic_extra">
						<ul>
							<li><img src="/static/images/testpic.jpg"></li>
							<li><img src="/static/images/testpic2.jpg"></li>
							<li><img src="/static/images/testpic.jpg"></li>
							<li><img src="/static/images/testpic2.jpg"></li>
							<li><img src="/static/images/testpic.jpg"></li>
						</ul>
					</div>
					<div id="index_act_content">
						<div id="index_act_name" limit="28">一起去环岛环岛环岛环岛环岛环岛环岛！</div>
						<div id="index_act_deadline" style="font-size:8pt;"><a id="index_act_date">2011/11/25</a>截止</div>
						<div class="clearboth"></div>
						<div id="index_act_text" limit="118">活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容活动内容</div>
						<div class="clearboth"></div>
						<div id="index_act_join_container">
							<div id="index_act_join">已有<a id="index_act_join_count" class="emNum">100</a>人报名参加</div>
							<div id="index_act_join_btn"></div>
							<div class="clearboth"></div>
						</div>
						<div class="clearboth"></div>						
					</div>
					<div id="index_act_link">
						<ul>
							<li><a>【<a class="act_link_type">活動</a>】&nbsp;<a class="act_link_name" limit="28">这周末一起去西湖钓鱼！钓鱼！钓鱼！钓鱼！</a></a></li>
							<li><a>【<a class="act_link_type">活動</a>】&nbsp;<a class="act_link_name" limit="28">这周末一起去西湖钓鱼！</a></a></li>
							<li><a>【<a class="act_link_type">活動</a>】&nbsp;<a class="act_link_name" limit="28">这周末一起去西湖钓鱼钓鱼钓鱼钓鱼！</a></a></li>
							<li><a>【<a class="act_link_type">活動</a>】&nbsp;<a class="act_link_name" limit="28">这周末一起去西湖钓鱼！</a></a></li>
							<li><a>【<a class="act_link_type">活動</a>】&nbsp;<a class="act_link_name" limit="28">这周末一起去西湖钓鱼！</a></a></li>
						</ul>
					</div>
					<div class="clearboth"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			<!-------------------廣告------------------->
			<div class="index_ad_R2 bb mg_b">&nbsp;廣告</div>
			<div class="clearboth"></div>
			<!-------------------誰來首頁------------------->
			<div id="index_visitor">
				<div id="index_visitor_title"></div>
				<div id="index_visitor_pic">
					<ul>
						<li><img class="img_M" src="/static/images/testpic2.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic2.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic2.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic2.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic2.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic2.jpg"></li>
						<li><img class="img_M" src="/static/images/testpic.jpg"></li>
					</ul>
				</div>
			</div>
			<div class="clearboth"></div>
		</div>
		<!--首頁右側欄位end-->
		<div class="clearboth"></div>
		

{include file="common/footer.php"}