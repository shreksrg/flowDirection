<div id="act_right">
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
						<div class="title">聯合合活動申請</div>
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
			
			<div id="act_review">
				<div class="sideinfo">
					<div class="top">					
						<div class="title"></div>
					</div>
					<div class="clearboth"></div>
					<div class="middle">
						<div class="content">
							<div class="act_pic_pri">
								<img src="/static/images/testpic2.jpg">
							</div>
							<div class="act_info">
								<div class="enter_actBtn"></div>
								<div class="act_name">活動標題</div>
								<div class="clearboth"></div>
								<div class="act_text">活動內容活動內容活動內容活動內容活動內容</div>
							</div>
							<div class="clearboth"></div>
							<div class="underline">
								<div class="arrow"></div>
								<div class="line side"></div>
							</div>
							<div class="clearboth"></div>
							<div class="act_pic_sub">
								<ul>
									<li><img src="/static/images/testpic.jpg"></li>
									<li><img src="/static/images/testpic2.jpg"></li>
									<li><img src="/static/images/testpic.jpg"></li>
								</ul>
							</div>
							<div class="clearboth"></div>
						</div>
					</div>				
					<div class="clearboth"></div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			
			<div class="bb ad1">ad</div>
			<div class="clearboth"></div>
			
			<div id="blog_best">
            
            
            
				<div class="sideinfo">
					<div class="top">					
						<div class="title"></div>
					</div>
					<div class="clearboth"></div>
                    
                    
                    
                    
					<div class="middle">
						<div class="content">
						<ul>
                        
                        {foreach from=$blog item=v key=k}
							<li>
								<div class="act_pic">
									<img src="{$v['pic']}" onclick="window.location.href='{$v.url}'" style="cursor:pointer;">
								</div>
								<div class="act_info">
									<div class="act_name" onclick="window.location.href='{$v.url}'" style="cursor:pointer;">{$v['SUBJECT']|truncate:9}</div>
									<div class="clearboth"></div>
									<div class="act_text" onclick="window.location.href='{$v.url}'" style="cursor:pointer;">{$v['message']|truncate:24}</div>
								</div>
								<div class="view" onclick="window.location.href='{$v.url}'" style="cursor:pointer;">>>查看更多</div>
								<div class="clearboth"></div>
							</li>
							 {/foreach}  	 
                             
						</ul>
						</div>
					</div>	
                    
                    
                    
                    
                    
                    
                    
                    			
					<div class="clearboth"></div>
					<div class="bottom"></div>
					<div class="clearboth"></div>
				</div>
                
                
                
                
				<div class="clearboth"></div>
			</div>
			<div class="clearboth"></div>
			
			
			<div class="ad1 bb">ad</div>
			<div class="clearboth"></div>
		
		</div>