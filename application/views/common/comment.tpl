									<ul>
									{foreach from=$commentList item=v key=k}
										<li>
											<div class="pic"><a href="/index.php/member_info/index/uid/{$v['userid']}"><img src="{$v.avatar_img}" class="comment_pic"></a></div>
											<div class="data">
												<div class="name"><a href="/index.php/member_info/index/uid/{$v['userid']}">{$v['username']}</a></div>
												<div class="content">{$v['content']}</div>
												<div class="date">{$v['create_time']|date_format:"Y-m-d"}</div>
												<div class="time">{$v['create_time']|date_format:"H:i"}</div>
											</div>
											<!--<div class="delete" onclick="delete_comment($(this))" id="{$v['comment_id']}" userid="{$v['userid']}" >x</div>-->
										</li>
										{/foreach}
									</ul>
<script type="text/javascript">
function comment(type){
	var content=$('#comment_content').val();
	var blogId=$('#blog_id').val();
	var avatar_img = $('#avatar_img').val();
	$.ajax({ 
		   async:false,
		   type: "post",  
		   url: "/index.php/blog/comment/comment_add", 
		   dataType:'json',
		   data:'blog_id='+blogId+'&content='+content+'&type='+type,    
		   success: function(data,textStatus){
			   if(data.data==1){
				   //alert(data.message);
					var htmlStr='<li><div class="pic"><img class="comment_pic" src='+avatar_img+'></div>'+
								'<div class="data">'+
									'<div class="name">'+data.userName+'</div>'+
									'<div class="content">'+data.content+'</div>'+
									'<div class="date">'+data.date+'</div>'+
									'<div class="time">'+data.time+'</div>'+
								'</div>'+
								//'<div class="delete" onclick=\'delete_comment($(this))\' id='+data.comment_id+' userid='+data.userid+' >x</div>'+
							 '</li>';
					 $(".common_comments ul").prepend(htmlStr);
			   }; //把php中的返回值显示在预定义的result定位符位置 
		   },
		   error:function(xhr,status,e){
		   }
	});
}
</script>
