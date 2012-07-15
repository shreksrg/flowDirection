<?php if(isset($act) && $act=='upload'): ?>

	<div>
	  <FORM ACTION="<?=site_url('member/avatar/upload');?>" METHOD="post" enctype="multipart/form-data">
		<input type="file" name="file" id="file" />
		<input type="submit" name="avatarupload" id="button" value="上传" />
	  </FORM>
	</div>

<?php else: ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传照片</title>
<style>
#Canvas {
	position: relative;
	border:2px solid #888888;
	overflow:hidden;
	cursor:pointer;
}
#bar {
	width: 211px;
	height: 18px;
	background-image: url(/static/images/avatar/track.gif);
	background-repeat: no-repeat;
	position: relative;
}
.child {
	width: 11px;
	height: 16px;
	background-image: url(/static/images/avatar/grip.gif);
	background-repeat: no-repeat;
	left: 0;
	top:3px;
	position: absolute;
	left:100px;
}
#IconContainer {
	position:relative;
	left:0px;
}
#IconContainer img {
	FILTER:alpha(opacity=40);
	opacity:0.6;
	background-color:#fff;
}
#ImageDragContainer {
	border: 1px solid #888;
	cursor: pointer;
	position: relative;
	overflow: hidden;
	z-index:1;
}
.title{ font-size:13px; padding-bottom:10px; color:#444;}
.tujisearch{margin:0px;padding:0px;font-size:12px;}
</style>
<script src="/static/js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/static/js/ui/ui.core.js" ></script>
<script type="text/javascript" src="/static/js/ui/ui.draggable.js" ></script>
<script type="text/javascript">
var CANVAS_WIDTH = 250; //画布的宽
var CANVAS_HEIGHT = 250; //画布的高
var ICON_WIDTH = 150;  //截取框的宽
var ICON_HEIGHT = 150;  //截取框的高
var LEFT_EDGE = (CANVAS_WIDTH - ICON_WIDTH) / 2; 
var TOP_EDGE = (CANVAS_HEIGHT - ICON_HEIGHT) / 2; 

var scaleFactor;
var factor;
var minFactor;
var oldWidth;
var oldHeight;
$(function(){
run(0,0);

$(".child").draggable({
      cursor: "move", containment: $("#bar"),
      drag: function(e, ui) {
      var left = parseInt($(this).css("left"));
          //前面讲过了y=factor（x），此处是知道x求y的值，即知道滑动条的位置，获取缩放率
          scaleFactor = Math.pow(factor, (left / 100 - 1));
          if (scaleFactor < minFactor) {
              scaleFactor = minFactor;
          }
          if (scaleFactor > factor) {
              scaleFactor = factor;
          }
          //以下代码同初始化过程，因为用到局部变量所以没有
          var iconElement = $("#ImageIcon");
          var imagedrag = $("#ImageDrag");

          var image = new Image();
          image.src = iconElement.attr("src");
          var realWidth = image.width;
          var realHeight = image.height;
          image = null;

          //图片实际尺寸
          var currentWidth = Math.round(scaleFactor * realWidth);
          var currentHeight = Math.round(scaleFactor * realHeight);

          //图片相对CANVAS的初始位置
          var originLeft = parseInt(iconElement.css("left"));
          var originTop = parseInt(iconElement.css("top"));

          originLeft -= Math.round((currentWidth - oldWidth) / 2);
          originTop -= Math.round((currentHeight - oldHeight) / 2);
          dragleft = originLeft - LEFT_EDGE;
          dragtop = originTop - TOP_EDGE;

          //图片当前尺寸和位置
          iconElement.css({ width: currentWidth + "px", height: currentHeight + "px", left: originLeft + "px", top: originTop + "px" });
          imagedrag.css({ width: currentWidth + "px", height: currentHeight + "px", left: dragleft + "px", top: dragtop + "px" });

        
		  valuewrite(originLeft,originTop,currentWidth,currentHeight);
		  valuewrite(dragleft,dragtop,currentWidth,currentHeight);
		  oldWidth = currentWidth;
		  oldHeight = currentHeight;

      }
  });
    var SilderSetValue = function(i) {
        var left = parseInt($(".child").css("left"));
        left += i;

        if (left < 0) {
            left = 0;
        }
        if (left > 200) {
            left = 200;
        }

        scaleFactor = Math.pow(factor, (left / 100 - 1));
        if (scaleFactor < minFactor) {
            scaleFactor = minFactor;
        }
        if (scaleFactor > factor) {
            scaleFactor = factor;
        }
        var iconElement = $("#ImageIcon");
        var imagedrag = $("#ImageDrag");

        var image = new Image();
        image.src = iconElement.attr("src");
        var realWidth = image.width;
        var realHeight = image.height;
        image = null;

        //图片实际尺寸
        var currentWidth = Math.round(scaleFactor * realWidth);
        var currentHeight = Math.round(scaleFactor * realHeight);

        //图片相对CANVAS的初始位置
        var originLeft = parseInt(iconElement.css("left"));
        var originTop = parseInt(iconElement.css("top"));

        originLeft -= Math.round((currentWidth - oldWidth) / 2);
        originTop -= Math.round((currentHeight - oldHeight) / 2);
        dragleft = originLeft - LEFT_EDGE;
        dragtop = originTop - TOP_EDGE;

        //图片当前尺寸和位置
        $(".child").css("left", left + "px");
        iconElement.css({ width: currentWidth + "px", height: currentHeight + "px", left: originLeft + "px", top: originTop + "px" });
        imagedrag.css({ width: currentWidth + "px", height: currentHeight + "px", left: dragleft + "px", top: dragtop + "px" });

        valuewrite(originLeft,originTop,currentWidth,currentHeight);
		valuewrite(dragleft,dragtop,currentWidth,currentHeight);
		oldWidth = currentWidth;
		oldHeight = currentHeight;
    }
    //点击加减号
    $("#moresmall").click(function() {
        SilderSetValue(-20);
    });
    $("#morebig").click(function() {
        SilderSetValue(20);
    });
});

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<table width="700" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td width="250" valign="top" bgcolor="#FFFFFF"><div id="">
        <div class="title"><b> 裁切头像</b></div>
        <div class="uploadtooltip"></div>
        <div id="Canvas" class="uploaddiv">
        
          <div id="ImageDragContainer"> <img src='<?php echo $avatar_img;?>' id='ImageDrag'> </div>
          <div id="IconContainer"> <img src='<?php echo $avatar_img;?>' id='ImageIcon'> </div>
        </div>
        <div class="uploaddiv">
          <table width="250" align="center">
            <tr>
              <td width="23" id="Min"><img alt="缩小" src="/static/images/avatar/_c.gif" onMouseOver="this.src='/static/images/avatar/_c.gif';" onMouseOut="this.src='/static/images/avatar/_h.gif';" id="moresmall" class="smallbig" /></td>
              <td width="215"><div id="bar">
                  <div class="child"></div>
                </div></td>
              <td id="Max"><img alt="放大" src="/static/images/avatar/c.gif" onMouseOver="this.src='/static/images/avatar/c.gif';" onMouseOut="this.src='/static/images/avatar/h.gif';" id="morebig" class="smallbig" /></td>
            </tr>
          </table>
        </div>
      </div></td>
    <td  valign="top" bgcolor="#FFFFFF" style="padding-left:98px;"><br><font size="2" style=" margin-bottom:8px; color:#444;">请选择照片文件，文件需小于10MB</font>
      <br>

      <iframe  frameborder=0 style="width:350px;height:30px;padding:0px;border:0px;background:#fff" src="<?=site_url('member/avatar/upload')?>"></iframe>
      <FORM ACTION="<?=site_url('member/avatar/save')?>" METHOD="POST" name="formup" id="formup" onSubmit="return ckeckThumb()" enctype="multipart/form-data">
        
        <div style="display:none">
          <input name="bigImage" type="hidden" id="bigImage" value="<?php echo $avatar_img;?>" />
          left:<input name="left" id="left" type="text" value=""/>
          top:<input name="top" id="top" type="text" value=""/>
          img_x:<input name="img_x" id="img_x" type="text" value=""/>
          img_y:<input name="img_y" id="img_y" type="text" value=""/>
          img_w:<input name="img_w" id="img_w" type="text" value=""/>
          img_h:<input name="img_h" id="img_h" type="text" value=""/>
          dst_x:<input name="dst_x" id="dst_x" type="text" value=""/>
          dst_y:<input name="dst_y" id="dst_y" type="text" value=""/>
          dst_w:<input name="dst_w" id="dst_w" type="text" value=""/>
          dst_h:<input name="dst_h" id="dst_h" type="text" value=""/>
          倍数:<input name="f" id="f" type="text" value=""/>
          宽度:<input name="width" id="width" type="text" value=""/>
          高度:<input name="height" id="height" type="text" value=""/>
        </div>
         <input type="hidden" name="urlSource" value="<?php echo $urlSource;?>"/>
      <br/>
      <div><img src="<?php echo $avatar_img;?>" width="150px" height="150px" style="border:1px solid #d2d2d2;"/></div>
      <br/>
      <div>
       <span style="height:34px;"><input type="submit" name="submit" value="保存头像" /></span>
      </div>
      </form>
      </td>
  </tr>
</table>
<script type="text/javascript">
function run(i_width,i_height){
	$("#Canvas").css({width:CANVAS_WIDTH+ "px",height:CANVAS_HEIGHT+ "px"});
	$("#ImageDragContainer").css({width:ICON_WIDTH+ "px",height:ICON_HEIGHT+ "px",top:TOP_EDGE+1+ "px",left:LEFT_EDGE-1+ "px"});
	$("#IconContainer").css({top:"-"+ICON_HEIGHT+"px"});
    $iconElement = $("#ImageIcon");
    $imagedrag = $("#ImageDrag");
    var image = new Image();
    image.src = $iconElement.attr("src");
	if(image.width==0 && image.height==0){
		var realWidth = i_width;
		var realHeight = i_height;
	}else{
		 var realWidth = image.width;
		var realHeight = image.height; 
	}
    image=null;
    
	minFactor = Math.min(ICON_WIDTH / realWidth,ICON_HEIGHT/realHeight);
    if (ICON_WIDTH > realWidth && ICON_HEIGHT > realHeight) {
        minFactor = 1;
    }
    factor = minFactor > 0.25 ? 8.0 : 4.0 / Math.sqrt(minFactor);

	scaleFactor = 1;
    if (realWidth > CANVAS_WIDTH && realHeight > CANVAS_HEIGHT) {
        if (realWidth / CANVAS_WIDTH > realHeight / CANVAS_HEIGHT) {
            scaleFactor = CANVAS_HEIGHT / realHeight;
        }
        else {
            scaleFactor = CANVAS_WIDTH / realWidth;
        }
    }
   $(".child").css("left", 100 * (Math.log(scaleFactor * factor) / Math.log(factor)) + "px");


	//alert(realWidth+"|"+scaleFactor+"|"+i_width);

    var currentWidth = Math.round(scaleFactor * realWidth);
    var currentHeight = Math.round(scaleFactor * realHeight);
	var originLeft = Math.round((CANVAS_WIDTH - currentWidth) / 2) ;
    var originTop = Math.round((CANVAS_HEIGHT - currentHeight) / 2);
  
    //计算截取框中的图片的位置
    var dragleft = originLeft - LEFT_EDGE;
    var dragtop = originTop - TOP_EDGE;


    //设置图片当前尺寸和位置
	

    $iconElement.css({ width: currentWidth + "px", height: currentHeight + "px", left: originLeft + "px", top: originTop + "px" });
    $imagedrag.css({ width: currentWidth + "px", height: currentHeight + "px", left: dragleft + "px", top: dragtop + "px" });
	
	oldWidth = currentWidth;
    oldHeight = currentHeight;
	valuewrite(dragleft,dragtop,oldWidth,oldHeight);

	
  $("#ImageDrag").draggable(
    {
        cursor: 'move',
        drag: function(e, ui) {
            var self = $(this).data("draggable");
            var drop_img = $("#ImageIcon");
            var top = drop_img.css("top").replace(/px/, ""); //取出截取框到顶部的距离
           var left = drop_img.css("left").replace(/px/, ""); //取出截取框到左边的距离
            drop_img.css({ left: (parseInt(self.position.left) + LEFT_EDGE) + "px", top: (parseInt(self.position.top) + TOP_EDGE) + "px" }); //同时移动
           
			valuewrite(parseInt(self.position.left),parseInt(self.position.top),oldWidth,oldHeight);
			

        }
    }
    );
    //设置图片可拖拽，并且拖拽一张图片时，同时移动另外一张图片
    $("#ImageIcon").draggable(
    {
        cursor: 'move',
        drag: function(e, ui) {
            var self = $(this).data("draggable");
            var drop_img = $("#ImageDrag");
            var top = drop_img.css("top").replace(/px/, ""); //取出截取框到顶部的距离
            var left = drop_img.css("left").replace(/px/, ""); //取出截取框到左边的距离
            drop_img.css({ left: (parseInt(self.position.left) - LEFT_EDGE) + "px", top: (parseInt(self.position.top) - TOP_EDGE) + "px" }); //同时移动
			valuewrite(parseInt(self.position.left) - LEFT_EDGE,parseInt(self.position.top) - TOP_EDGE,oldWidth,oldHeight);
        }

    }
    );
}
function valuewrite(left,top,currentWidth,currentHeight){

		var img_x=left>0 && left<ICON_WIDTH?0:0-left;
		var dst_x=left<=0 || left>=ICON_WIDTH?0:left;

		var img_y=top>0 && top<ICON_HEIGHT?0:0-top;
		var dst_y=top<=0 || top>=ICON_HEIGHT?0:top;

		var img_w='';
		var dst_w='';


		if(ICON_WIDTH>currentWidth){
			if(left>0 && left<ICON_WIDTH-currentWidth){
				img_w=currentWidth;
				dst_w=currentWidth;
			}else if(left>ICON_WIDTH || left<-currentWidth){
				//alert("d");
				img_w=0;
				dst_w=ICON_WIDTH;
			}else if(left>0 && left<ICON_WIDTH){
				img_w=ICON_WIDTH-left;
				
				dst_w=ICON_WIDTH-left;
			}else{
				img_w=currentWidth+left;
				
				dst_w=currentWidth+left;
			}
		}else{
			if(left<=0 && left>=0-(currentWidth-ICON_WIDTH)){
				img_w=ICON_WIDTH;
				dst_w=ICON_WIDTH;
			}else if(left>ICON_WIDTH || left<0-currentWidth){
				img_w=0;
				dst_w=ICON_WIDTH;
			}else if(left>0 && left<ICON_WIDTH){
				img_w=ICON_WIDTH-left;
				
				dst_w=ICON_WIDTH-left;
			}else{
				img_w=currentWidth+left;
				
				dst_w=currentWidth+left;
			}
		}

		var img_h='';
		var dst_h='';

		if(ICON_HEIGHT>currentHeight){
			if(top>0 && top<ICON_HEIGHT-currentHeight){
				img_h=currentHeight;
				dst_h=currentHeight;
			}else if(top>ICON_WIDTH || top<0-currentHeight){
				img_h=0;
				dst_h=ICON_HEIGHT;
			}else if(top>0 && top<ICON_HEIGHT){
				img_h=ICON_HEIGHT-top;
				
				dst_h=ICON_HEIGHT-top;
			}else{
				img_h=currentHeight+top;
				
				dst_h=currentHeight+top;
			}
		}else{
			if(top<=0 && top>=0-(currentHeight-ICON_HEIGHT)){
				img_h=ICON_HEIGHT;
				dst_h=ICON_HEIGHT;
			}else if(top>ICON_WIDTH || top<0-currentHeight){
				img_h=0;
				dst_h=ICON_HEIGHT;
			}else if(top>0 && top<ICON_HEIGHT){
				img_h=ICON_HEIGHT-top;
				
				dst_h=ICON_HEIGHT-top;
			}else{
				img_h=currentHeight+top;
				
				dst_h=currentHeight+top;
			}
		}


		


		$("#left").val(left);
		$("#top").val(top);
		$("#f").val(scaleFactor);
		$("#width").val(currentWidth);
		$("#height").val(currentHeight);


		$("#img_x").val(img_x/scaleFactor);
		$("#img_y").val(img_y/scaleFactor);
		$("#img_w").val(img_w/scaleFactor);
		$("#img_h").val(img_h/scaleFactor);
		$("#dst_x").val(dst_x);
		$("#dst_y").val(dst_y);
		$("#dst_w").val(dst_w);
		$("#dst_h").val(dst_h);

}
function ckeckThumb()
{
	if($("#left").val()>ICON_WIDTH || $("#left").val()<-$("#width").val() || $("#top").val()>ICON_HEIGHT || $("#top").val()<-$("#height").val() ){
		alert("没有选取任何图像！");
		return false;
	}
}
  </script>
</body>
</html>
<?php endif; ?>