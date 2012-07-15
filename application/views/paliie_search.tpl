<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/paliie_search/paliie_search.css" type="text/css" rel="stylesheet">
<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/ui/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<script src="/static/js/ui/jquery.mousewheel-3.0.4.pack.js" type="text/javascript"></script>
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
		<div class="left">			
			<div id="paliie_search">
				<div class="page">
					<div class="top"></div>
					<div class="clearboth"></div>
					<div class="middle">
						<div class="content">
							<form action="/index.php/paliie_search/act_list" method="post" id="form1">
								<div class="main_title">普通搜索</div>													
								<div class="clearboth"></div>
								<div class="bar"><div></div></div>
								<div class="clearboth"></div>
								<ul>
									<li>
										<div class="input_label">我要找:</div>
										<div class="input_text">
											<input type="radio" name="gender" class="input_radio" value="0">男朋友&nbsp;&nbsp;&nbsp;
											<input type="radio" name="gender" class="input_radio" value="1">女朋友
										</div>
										<div class="clearboth"></div>
									</li>
									<li>	
										<div class="input_label">Ta的所在地:</div>
										<div class="input_text">
											<select name="regprovince" id="city1" onChange="changepro('city2','city1')">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.province_array item=v key=k}
                                			<option value="{$v.regprovince}">{$v.regprovince}</option>
                                			{/foreach}
                                            </select>
										
                                            <select name="regcity" id="city2">
                                			<option value="">不限</option>
                                			</select> 
										</div>
										<div class="clearboth"></div>
									</li>
									<li>	
										<div class="input_label">婚戀狀況:</div>
										<div class="input_text">
											<select name="marital">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.marital_array item=v key=k}
                                        	<option value="{$k}">{$v.marital}</option>
                                        	{/foreach}  	
                                            </select>
										</div>
										<div class="clearboth"></div>
									</li>
									<li>	
										<div class="input_label">學歷:</div>
										<div class="input_text">
											<select name="education">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.education_array item=v key=k}
                                        	<option value="{$k}">{$v.education}</option>
                                        	{/foreach}  	
                                            </select>
										</div>
										<div class="clearboth"></div>
									</li>
									<li>	
										<div class="input_label">年齡:</div>
										<div class="input_text">
											<select name="ages">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
                                            </select>	
										</div>
										<div class="clearboth"></div>
									</li>
									<li>	
										<div class="input_label">身高:</div>
										<div class="input_text">
											<select name="height">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.height_array item=v key=k}
                                        	<option value="{$k}">{$v.height}</option>
                                        	{/foreach}  	
                                            </select>
										</div>
										<div class="clearboth"></div>
									</li>
                                    <li>	
										<div class="input_label">体重:</div>
										<div class="input_text">
                                        
											<select name="weight">
                                            <option value="">不限</option>
											{foreach from=$member_profile.weight_array item=v key=k}
                                        	<option value="{$k}">{$v.weight}</option>
                                        	{/foreach}  	
                                            </select>
										</div>
										<div class="clearboth"></div>
									</li>
										<div class="borderbtm"></div>
									<!--<li>	
										<div class="input_label">血型:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>
-->									<!--<li>	
										<div class="input_label">月薪:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>-->
									<!--<li>
										<div class="input_label">有無子女:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>-->
									<!--<li>
										<div class="input_label">購車:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>-->
									<!--<li>
										<div class="input_label">星座:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>
									<li>
										<div class="input_label">生肖:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>
									<!--<li>
										<div class="input_label">職業:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>-->
									<!--<li>
										<div class="input_label">戶籍地:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>-->
									<li>
										<div class="input_label">民族:</div>
										<div class="input_text">
											<select name="nation">
                                            <option value="">不限</option>
                                            {foreach from=$member_profile.nation_array item=v key=k}
                                        	<option value="{$k}">{$v.nation}</option>
                                        	{/foreach}  	
                                            </select>
										</div>
										<div class="clearboth"></div>
									</li>
									<!--<li>
										<div class="input_label">宗教信仰:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>
									<li>
										<div class="input_label">誠信指數:</div>
										<div class="input_text">
											<select><option>不限<option>選項A<option>選項B<option>選項C<option>選項D</select>
										</div>
										<div class="clearboth"></div>
									</li>-->
								</ul>
								<div class="borderbtm"></div>
								<div class="clearboth"></div>
								<div class="check_pic">
									<div class="input_label">形象照:</div>
									<div class="input_text">
										<input type="checkbox" name="pic" value="1">此功能僅對有形象照的會員開啟
									</div>
								</div>
								<div class="clearboth"></div>
								<button type="submit" class="searchBtn"></button>
								<div class="clearboth"></div>
							
							</form>
						</div>
					</div>
					<div class="clearboth"></div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
			
			
			
		</div><!--left end-->
		
		
		
		
		
		
		<div class="right">
			<!--快速搜索-->
			<div id="quick_search">
				<div class="sideinfo">
					<div class="top"><div class="title"></div></div>
					<div class="middle">
						<div class="content">
							<form action="/index.php/paliie_search/act_list" method="post" id="form2">
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
                                            {foreach from=$member_profile.age_array item=v key=k}
                                        	<option value="{$k}">{$v.age}</option>
                                        	{/foreach}  	
                                            </select>	
								</div>
								<div class="clearboth"></div>
								<!--<div class="input_label">職業:</div>
								<div class="input_text">
									<select><option>不限<option>職業1<option>職業2<option>職業3<option>職業4</select>
								</div>
								<div class="clearboth"></div>-->
								<!--<div class="input_label">行業:</div>
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
							</form>
						</div>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div class="clearboth"></div>
						
			<!---->
			<div class="ad1">廣告</div>
			<div class="ad1">廣告</div>
			
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