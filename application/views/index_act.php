<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$this->config->item('site_name')} - {$title}</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/activity/activity.css" type="text/css" rel="stylesheet">
<!--<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery-ui-1.8.16.custom.min.js"></script>-->
<script src="/static/js/jquery/jquery-1.3.2.min.js" type="text/javascript"></script> 
<script src="/static/js/ui/jquery-ui-1.5.3.min.js" type="text/javascript"></script> 

<script src="/static/js/layout/header.js"></script>
<script src="/static/js/display/activity.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/static/js/ui/jquery.fancybox-1.3.4.pack.js"></script>
<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/ymd.js" type="text/javascript"></script>
<script src="/static/js/pca.js"></script>

</head>
<body>
	
{include file="common/header.tpl"}

	<div id="content">
		<!--活動搜索BAR-->
		<div class="searchbar">
			<form action="/index.php/browse_act/search" method="post">
				<div class="search_input">
					<div class="input_title">活動搜索&nbsp;&nbsp;&nbsp;｜&nbsp;&nbsp;&nbsp;</div>
					<div class="input_label">活動時間:</div>
					<select name="years" id="birthyear" onchange="year(this.value)">{$yearoption}</select>&nbsp;&nbsp;<select name="months" id="birthmonth" onchange="month(this.value)">{$monthoption}</select>&nbsp;&nbsp;<select name="days" id="birthday">{$dayoption}</select>
					<div class="input_label">&nbsp;｜&nbsp;&nbsp;&nbsp;Ta的所在地:</div>
					<select name="input_province" id="city1" onChange="changepro('city2','city1')">
                    	 <option value="">省/直辖市</option>
                    	{foreach from=$province_list item=v key=k}
                            <option value="{$v.province}">{$v.province}</option>
                        {/foreach}
                        
                    </select>
					<select name="input_city" id="city2">
                        <option value="">請選擇城市</option>
                    </select> 
					<button type="submit" class="searchBtn"></button>
				</div>
			</form>
		</div>
		<div class="clearboth"></div>
		
		<div id="act_left">	
			
			<div id="act_show" class="column">
				<div class="top"></div>
				<div class="titlebg"></div>
				<div class="clearboth"></div>
				<div class="middle">
					<div id="featured">
						<ul class="ui-tabs-nav">
                          
                          {foreach from=$act_list item=v key=k}
		        			<li class="ui-tabs-nav-item" id="nav-fragment-{$k}">
		        				<a href="#fragment-{$k}">
		        					<img src="/data/attachment/album/{$v.logo}" alt="" />
		        					<span>{$v.SUBJECT}</span>
		        				</a>
		        			</li>  
                         {/foreach}  	
                         	
		    			</ul>  
                        
                        
                        
		    		 {foreach from=$act_list item=v key=k}
					    <div id="fragment-{$k}" class="ui-tabs-panel" style="">  
					        <img src="/data/attachment/album/{$v.thumb}" alt=""  width="400" height="250"/> 
					        <div class="info" >  
						        <h2><a href="/index.php/browse_act/detail/id/{$v.aid}" class="act_name">{$v.SUBJECT}</a></h2>  
						        <p limit="115">{$v.description}
						        <a href="/index.php/browse_act/detail/id/{$v.aid}" class="more">...查看更多</a></p>  
					        </div>  
					    </div>  
                     {/foreach}  	   
      
					</div>
					<div class="clearboth"></div>
				</div>
				<div class="bottom"></div>
			</div>
			
			<div id="act_category">
				<!--<div class="act_type">
					<div class="tag">
						<ul>
							<li class="selected">婚戀</li>
							<li>旅遊</li>
							<li>派對</li>
							<li>聚餐</li>
							<li>戶外</li>
						</ul>
					</div>
				</div>-->
				<div class="clearboth"></div>
				<div class="content">
					<!--<div class="act_area">
						<ul>
							<li>吳江</li>
							<li class="selected">蘇州</li>
							<li>南京</li>
							<li>常州</li>
							<li>崑山</li>
						</ul>
						<div class="other">其他地區</div>
					</div>-->
					<div class="clearboth"></div>
					<div class="underline">
						<div class="line page"></div>
						<div class="arrow"></div>
					</div>
					<div class="clearboth"></div>
					<div class="act_list">
						<ul>
                        
                        
                        {foreach from=$activity_list item=v key=k}
							<li>
								<img src="/data/attachment/album/{$v.logo}" class="img_M" onclick="window.location.href='/index.php/browse_act/detail/id/{$v.aid}'" style="cursor:pointer;">
								<div class="act_info">
									<div class="top"><a>[</a><a class="type" href="/index.php/browse_act/search/{$v.s_class}">{$v.class}</a><a>]&nbsp;</a><a limit="28" class="name" href="/index.php/browse_act/detail/id/{$v.aid}">{$v.SUBJECT}</a></div>
									<div>活動時間:<a class="date">{$v.times}至{$v.etimes}</a></div>
									<div>关注人數:<a class="invite_number emNum">{$v.follownum}</a>人</div>									
								</div>
                               
								<!--<a class="joinBtn" id="applylink1" href="/index.php/activity/my_in/actApply/aid/{$v.aid}"></a>-->
                                <a class="joinBtn" id="applylink1" href="/index.php/browse_act/detail/id/{$v.aid}"></a>
								<div class="clearboth"></div>
								<div class="moreinfo">
                                	<a class="view" href="/index.php/browse_act/detail/id/{$v.aid}">查看詳情</a>
									
									<div class="applied">
                                    	已報名人數:{$v.membernum}人 |
                                    	距离报名截止时间:{$v.dayNum}天{$v.hourNum}时{$v.minuteNum}分
                                    </div>		
									
								</div>
							</li>
                       {/foreach}  	         
						</ul>
				  </div>
				  <div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			
			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
		
			<div id="act_album_best">
				<div class="column">
					<div class="top"></div>
					<div class="titlebg"></div>
					<div class="clearboth"></div>
					<div class="middle">
						<div class="content">
							<ul>
                            
                            {foreach from=$over_act_list item=v key=k}
                            
								<li>
									<div class="name">{$v.SUBJECT}</div>
									<div class="clearboth"></div>
									<img src="/data/attachment/album/{$v.logo}" class="img_M">
								</li>
                                
                           {/foreach}  	           
                                

							</ul>
						</div>
					</div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
			</div>
			
			
			
			
			
		</div><!--left end-->
		
        
        {include file="common/activity_act_right.tpl"}
        
		<!--left end-->
		<div class="clearboth"></div>
	</div><!--content end-->
	<div class="clearboth"></div>
	
{include file="common/footer.tpl"}

</body>
</html>