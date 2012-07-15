<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/paliie_search/paliie_search.css" type="text/css" rel="stylesheet">

<script src="/static/js/jquery/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.cycle.all.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/layout/header.js"></script>
<script src="/static/js/common.js"></script>
<script src="/static/js/display/search.js"></script>
<script src="/static/js/display/paliie_search.js"></script>
<script src="/static/js/pca.js"></script>
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
		<!--搜索會員BAR-->
		<div class="searchbar">
			<form method="post" action="/index.php/paliie_search/act_list" id="form2">
				<div class="search_input">
					<div class="input_title">搜索会员:&nbsp;</div>
					<input type="radio" name="gender" value="0" {if $gender==0}checked="checked"{/if} >
					<div class="input_label">男朋友</div>
					<input type="radio" name="gender" value="1" {if $gender==1}checked="checked"{/if} >
					<div class="input_label">女朋友</div>
					<div class="input_label">｜&nbsp;年齡:</div>
					<select name="ages1">
                    <option value="">不限</option>
                    {foreach from=$age_array_select item=v key=k}
                    <option value="{$k}" {$v.selected} >{$v.age}</option>
                    {/foreach}  	
                    </select>
					<div class="input_label">至</div>
					<select name="ages2">
                    <option value="">不限</option>
                    {foreach from=$age_array_select_to item=v key=k}
                    <option value="{$k}" {$v.selected} >{$v.age}</option>
                    {/foreach}  
                    </select>								
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;Ta的所在地:</div>
					<select id="city1" name="regprovince" onChange="changepro('city2','city1')">
                                                <option value="">省/直辖市</option>
                                                {foreach from=$province_array_select item=v key=k}
                                                    <option value="{$v.province}" {$v.selected}>{$v.province}</option>
                                                {/foreach}
                                                </select>
                                                <select name="regcity" id="city2">
                                                    {if $city!=''}<option value="{$city}">{$city}</option>{/if}
                                                    <option value="">請選擇城市</option>
                                            </select> 
					<input type="submit" value="" class="searchBtn">
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		
		
		
		<div class="left">
			<div id="map_navigation">
				<div class="map_container">
					地圖區塊
				</div>
			</div>
		
		
		
			<div id="search_result_list">
				<div class="page">
					<div class="top"></div>
					<div class="middle">
						<div class="content">
							<div class="main_title">会员搜索结果</div>
							
							<div class="sort">
								<div class="sort_btn">
									<div class="sort_text">排列</div>
									<div class="sort_arrow"></div>
								</div>
								<div class="sort_container">
									<div class="bg1">
										<div class=" sort_by">默认排序</div>
										<div class=" sort_by">最近登录时间</div>
										<div class=" sort_by">最新注册</div>
										<div class=" sort_by">诚信会员</div>
									</div>
									<div class="bg2"></div>
								</div>
							</div>
							<div class="clearboth"></div>
							<div class="bar"><div></div></div>
							<div class="clearboth"></div>
							<div class="list">
								<ul>
                                
                                {foreach from=$search_member_list item=v key=k}
									<li>
										<div class="pic"><a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank"><img src="{$v.avatar_img}" class="img_M"></a></div>
										<div class="member_data">
											<div class="member_name"><a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank">{$v.username}</a></div>
											<div class="member_level">★★★★★</div>											
											<div class="clearboth"></div>
											<div class="member_id">paliie id:{$v.userid}</div>											
											<div class="clearboth"></div>
											<div class="member_info">{if $v.gender==0}&nbsp; 男&nbsp; &nbsp; {/if}{if $v.gender==1}&nbsp; 女&nbsp;&nbsp;{/if}{$v.ages}岁&nbsp;&nbsp;{$v.height_show}&nbsp;&nbsp;{$v.weight_show}&nbsp;&nbsp;{$v.education_show}&nbsp;{$v.marital_show}&nbsp;&nbsp;{$v.nation_show}&nbsp;&nbsp;</div>											
											<div class="clearboth"></div>
											<div class="member_intro">{$v.description}</div>											
											<div class="clearboth"></div>											
										</div>
										<div class="bottom">
											<div><a class="sendmsgBtn" href="/index.php/member_info/sendmessage/uid/{$v.userid}"></a>&nbsp;&nbsp;<a class="watch" onclick="addwatch('{$v.userid}','{$v.username}')">关注</a>&nbsp;&nbsp;<a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank" class="view">查看详细</a></div>
										</div>
										<div class="clearboth"></div>
									</li>
                                 {/foreach}  	        
        
								</ul>
							</div>
						</div>
                        {$page}
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			
			
		</div><!--left end-->
		
		
		
		
		
		
		<div class="right">
			<!--排行榜-->
			<div id="quick_search">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
                    
                    <form action="/index.php/paliie_search/act_list" method="post" id="form1">
						<div class="content">
							<div class="input_title">按ID或暱稱</div>
							<div class="clearboth"></div>
							<div class="input_label">PaliieID:</div><input type="text" class="text" name="uid">
							<div class="clearboth"></div>
							<div class="input_label">會員暱稱:</div><input type="text" class="text" name="username">
							<div class="clearboth"></div>
							
							
							<div class="input_title">按Paliie名片</div>
							<div class="clearboth"></div>
							<div class="input_label">性別:</div>
							<div class="input_text">
								<input type="radio" name="gender" class="input_radio" value="0">男&nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender" class="input_radio" value="1">女
							</div>
							<div class="clearboth"></div>
							
							
							<div class="input_label">年齡:</div>
							<div class="input_text">
								<select name="ages">
                                <option value="">不限</option>
                                {foreach from=$age_array_select item=v key=k}
                                <option value="{$k}" {$v.selected} >{$v.age}</option>
                                {/foreach}  	
                                </select>
							</div>
							<div class="clearboth"></div>
							<!--<div class="input_label">職業:</div>
							<div class="input_text">
								<select><option>不限<option>職業1<option>職業2<option>職業3<option>職業4</select>
							</div>
							<div class="clearboth"></div>
							<div class="input_label">行業:</div>
							<div class="input_text">
								<select><option>不限<option>行業1<option>行業2<option>行業3<option>行業4</select>
							</div>
							<div class="clearboth"></div>
							<div class="input_label">地區:</div>
							<div class="input_text">
								<select><option>不限<option>城市A<option>城市B<option>城市C<option>城市D</select>
							</div>-->
							<div class="clearboth"></div>
							<div class="borderbtm"></div>
							<div class="clearboth"></div>
							<button type="submit" class="searchBtn"></button>
							<div class="clearboth"></div>
							
						</div>
                        </form>
                        
                        
                        
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
						
			<!---->
			<div class="ad1"></div>
			<div class="ad1"></div>
			
		</div>
		
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	<!------------------------------------------content-end------------------------------------------>
	<!--------------------------------------------footer--------------------------------------------->
{include file="common/footer.tpl"}
	<!------------------------------------------footer-end------------------------------------------->
</body>
</html>