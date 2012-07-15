{literal}
 <script>
 	function switchMainXchannel(x){
		x=x-1
		$("ul.qy-header-navitems li").eq(x).find("a").attr("class","qy-navitem-curbri");
	}
 </script>
 {/literal}
 <!--[if IE 6]>
    <script src="/staticX/js/thirdLibs/belatedPNG.js"></script>
    <script>
    DD_belatedPNG.fix('div, ul, img, li, input , a,h1,span,em,dt');
    </script>
<![endif]-->
 <div class="qy-hp-header">
    <div class="qy-header-logo"><img src="/staticx/images/index/logo.gif"></div>
    {if $commen_info.username!=''}<div class="qy-header-logstate"> 您好,欢迎来奇遇同城！ <a class="hp-nickname" href="/index.php/member/index">{$commen_info.username}</a> &nbsp;&nbsp;&nbsp; [<a href="/index.php/member/login_out/index">退出登录</a>] </div> {/if}   
    <div class="qy-header-navicont">
      <div class="qy-navicorner-l"></div>
      <div class="qy-navicorner-r"></div>
      <ul class="qy-header-navitems">
        <li><a href="/index.php">首页</a></li>
        <li><a href="/index.php/member/index">我的PALIIE</a></li>
        <li><a href="/index.php/paliie_search">会员搜索</a></li>
        <li><a href="/index.php/browse_act/index">奇遇活动</a></li>
        <li><a href="/index.php/spacex">奇遇空间</a></li>
        <li><a href="/index.php/browse_blog">奇遇日志</a></li>
      </ul>
    </div>
  </div>