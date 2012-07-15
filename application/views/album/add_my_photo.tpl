<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活動相冊</title>
<link href="/static/css/import.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/mypaliie.css" type="text/css" rel="stylesheet">
<link href="/static/css/display/mypaliie/myalbum.css" type="text/css" rel="stylesheet">

<link href="/static/css/display/imgareaselect/uploadify.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/static/css/display/imgareaselect/imgareaselect-default.css" />

<script src="/static/js/jquery/jquery-1.6.4.js"></script>
<script src="/static/js/layout/header.js"></script>

<script src="/static/js/ui/jquery.stringlimit.js"></script>
<script src="/static/js/display/mypaliie/mypaliie.js"></script>


<script type="text/javascript" src="/static/js/imgareaselect/scripts/swfobject.js"></script>
<script type="text/javascript" src="/static/js/imgareaselect/scripts/jquery.uploadify.v2.1.4.min.js"></script>
<script type="text/javascript" src="/static/js/imgareaselect/scripts/jquery.imgareaselect.pack.js"></script>

<!--[if IE 6]>
<script src="/static/js/iepngfix/belatedPNG.js"></script>
<script src="/static/js/ui/jquery.ie6hover.js"></script>
<script>
	DD_belatedPNG.fix('.png_bg');
	$.ie6hover();
</script>
<![endif]--> 



<script>
	function preview(img, selection) {
		if (!selection.width || !selection.height)
			return; 
		
		var scaleX = 100 / selection.width;
		var scaleY = 100 / selection.height;
	
		$('#preview img').css({
			width: Math.round(scaleX * $imgpos.width),
			height: Math.round(scaleY * $imgpos.height),
			marginLeft: -Math.round(scaleX * selection.x1),
			marginTop: -Math.round(scaleY * selection.y1)
		});
	
		$('#x1').val(selection.x1);
		$('#y1').val(selection.y1);
		$('#x2').val(selection.x2);
		$('#y2').val(selection.y2);
		$('#w').val(selection.width);
		$('#h').val(selection.height);   
		
		$('#x').val(selection.x1); 
		$('#y').val(selection.y1);
		$('#w1').val(selection.width);
		$('#h1').val(selection.height);  
	}
	
	
	$imgpos = {
		width	: '100',
		height	: '100'
	};
	

</script>


</head>
<body>
<div id="main">
<!--headerEnd-->

{include file="common/header.tpl"}

<!--contentBegin-->
<div id="content">
	<!--左方選單-->
	{include file="common/left.tpl"}
	<!--右方区快-->
	<div class="floatL mg_b">
		<div id="mypaliie_tip_container" class="mg_b mg_r">
			<div id="mypaliie_tip_left" class="floatL png_bg"></div>
			<div id="mypaliie_tip_center" class="floatL png_bg">
				<div id="mypaliie_tip_icon" class="floatL png_bg"></div>
				<div id="mypaliie_tip_text" class="floatL">tipTEXT</div>
				<div id="mypaliie_tip_knowmore" class="floatR">>>了解更多</div>
			</div>
			<div id="mypaliie_tip_right" class="floatL png_bg"></div>
		</div>
		<div id="mypaliie_ad" style="width:190px;height:62px;background:#666;color:#FC0;float:left;text-align:center;line-height:60px;">廣告</div>	
		<div class="clearboth"></div>
		
		<!--內文-->
		<div class="mypaliie_page">
			<div class="top"></div>
			<div class="clearboth"></div>
			<div class="middle">
				<div class="container">
					<div class="main_title">我的相冊</div>
					<div class="main_menu">
						<ul>
							<li class="album_act"><a href="/index.php/album/index/">個人相冊</a></li>
							<li class="album_friend"><a href="/index.php/album/friend_album/index">朋友相冊</a></li>
							<li class="album_user selected">活動相冊</li>
						</ul>
						<div class="end"></div>
						<div class="clearboth"></div>
					</div>
					<div class="clearboth"></div>
					<div class="content"><!--內文-->

					 <div style="height:100px">
    <input id="file_upload" name="file_upload" type="file" />
  
  </div>
  
  
    
    <div style="clear:both">
  				<div style="float: left; width: 50%;">
   
 
   					 <div id="imgcontain" style="margin: 0 0.3em; width: 400px; overflow:hidden" class="frame">
      					
    				</div>
  				</div>
 
  <div style="float: left; width: 50%;">
    <p style="font-size: 110%; font-weight: bold; padding-left: 0.1em;">
      Selection Preview
    </p>
  
    <div style="margin: 0 1em; width: 100px; height: 100px;" class="frame">
      <div style="width: 100px; height: 100px; overflow: hidden;" id="preview">
        
      </div>
    </div>

<form action="/index.php/album/crop/save" method="post" id="frmcrop">
    <table style="margin-top: 1em;">
      <thead>
        <tr>
          <th style="font-size: 110%; font-weight: bold; text-align: left; padding-left: 0.1em;" colspan="2">
            Coordinates
          </th>
          <th style="font-size: 110%; font-weight: bold; text-align: left; padding-left: 0.1em;" colspan="2">
            Dimensions
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 10%;"><b>X<sub>1</sub>:</b></td>
 		      <td style="width: 30%;"><input type="text"  id="x1"></td>
 		      <td style="width: 20%;"><b>Width:</b></td>
   		    <td><input type="text" id="w" value="-"></td>
        </tr>
        <tr>
          <td><b>Y<sub>1</sub>:</b></td>
          <td><input type="text" value="-" id="y1"></td>
          <td><b>Height:</b></td>
          <td><input type="text" value="-" id="h"></td>
        </tr>
        <tr>
          <td><b>X<sub>2</sub>:</b></td>
          <td><input type="text" value="-" id="x2"></td>
          <td></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><b>Y<sub>2</sub>:</b></td>
          <td><input type="text" value="-" id="y2"></td>
          <td></td>
          <td><input type="submit" name="button" id="savethumb" value="提交" />
          
          <input type="hidden" id="x" name="x" />
          <input type="hidden" id="y" name="y" />
          <input type="hidden" id="w1" name="w1" />
          <input type="hidden" id="h1" name="h1" />
          
          <input type="hidden" id="tempfile" name="tempfile" />
			<input type="hidden" class="jq_step" id="step" name="step" value="process" />
          </td>
          
          <script>
		 
          	$("#frmcrop").live("submit",function(){
				
				// --- Process -----//
				$("#frmcrop").serializeArray()
				$.ajax({
					type	: "POST",
					cache	: false,
					url		: "/index.php/album/crop/save",
					data	: $(this).serializeArray(),
					success: function(data) {
						if(data=="success"){ 
							alert("上传成功");
							window.location.reload();
							
						}else{
							alert("上传失败，请重新上上传")
						}
					}
				});
				
				return false
				// --- Process -----//
			})
          </script>
        </tr>
      </tbody>
    </table>
    </form>
  </div>
</div>
    
						
					<div class="clearboth"></div>
						
						
						
						
					</div><!--內文end-->
				</div>
			</div>
			<div class="clearboth"></div>
			<div class="bottom"></div>
			<div class="clearboth"></div>
		</div>
	</div>
	<div class="clearboth"></div>
</div>
<!--contentEnd-->


<div id="album_pic_edit_window"></div>



<!--footerBegin-->
{include file="common/footer.tpl"}
<!--footerEnd-->
</div>
</body>
</html>