/*
��ҳ����ֲ�{����|��������}

��������{���|�߶�|���ִ�С|�Զ��л�ʱ��}
*/
(function($){
    dk_slideplayer = function(object,config){
        this.obj = object;
        this.n =0;
        this.j =0;
		
        
        var t;
        var defaults = {width:"300px",height:"200px",fontsize:"12px",right:"0px",top:"0px",time:"5000"};
        this.config = $.extend(defaults,config);
       	this.zindex= this.count = $(this.obj + " li").size();

		var _this = this;
        if(this.config.fontsize == "14px"){
            this.size = "14px";this.height = "23px";this.right = "6px";this.bottom = "15px";
        }else{
            this.size = "12px";this.height = "21px";this.right = "6px";this.bottom = "10px";
        }

        this.factory = function(){
            //Ԫ�ض�λ
            $(this.obj).css({position:"relative",zIndex:"0",margin:"0",padding:"0",width:this.config.width,height:this.config.height,overflow:"hidden"})
            $(this.obj).prepend("<div style='width:142px; background:#fff;position:absolute;z-index:20;right:"+this.config.right+";top:"+this.config.top+"'></div>");
			
            $(this.obj + " li").each(function(i){
				var z=_this.zindex-i
				$(this).css({position:"absolute",top:"0",left:"0",width:"100%",height:"100%",overflow:"hidden",zIndex:z})
                $(_this.obj + " div").append("<a></a>");
            });
			
            $(this.obj + " li img").css({border:"none",width:"100%",height:"100%"})
			
			$(this.obj + " div a").each(function(i){
				var isrc=$(_this.obj + " li img").eq(i).attr("src");
				$(this).append("<img src="+isrc+">")
				
			}).css({display:"block",clear:"both",cursor:"pointer",textAlign:"center"});
		
            this.resetclass(this.obj + " div a img",0);
			//return
            //���ⱳ��
           // $(this.obj).prepend("<div class='dkTitleBg'></div>");
            $(this.obj + " .dkTitleBg").css({position:"absolute",margin:"0",padding:"0",zIndex:"1",bottom:"0",left:"0",width:"100%",height:_this.height,background:"#000",opacity:"0.4",overflow:"hidden"})
            //�������
            $(this.obj).prepend("<div class='dkTitle'></div>");
            $(this.obj + " p").each(function(i){			
                $(this).appendTo($(_this.obj + " .dkTitle")).css({position:"absolute",margin:"0",padding:"0",zIndex:"2",bottom:"0",left:"0",width:"100%",height:_this.height,lineHeight:_this.height,textIndent:"5px",textDecoration:"none",fontSize:_this.size,color:"#FFFFFF",background:"none",opacity:"1",overflow:"hidden"});
                if(i!= 0){$(this).hide()}
            });
            this.slide();
            this.addhover();
            t = setInterval(this.autoplay,this.config.time);
        }
        //ͼƬ��Ӱ
        this.slide = function(){
            $(this.obj + " div a").mouseover(function(){
                _this.j = $(this).index();
                _this.n = _this.j;
                if (_this.j >= _this.count){return;}
                $(_this.obj + " li:eq(" + _this.j + ")").fadeIn("200").siblings("li").fadeOut("200");
                $(_this.obj + " .dkTitle p:eq(" + _this.j + ")").show().siblings().hide();
                _this.resetclass(_this.obj + " div a img",_this.j);
            });
        }
        //����ֹͣ
        this.addhover = function(){
            $(this.obj).hover(function(){clearInterval(t);}, function(){t = setInterval(_this.autoplay,_this.config.time)});
        }
        //�Զ����� 
        this.autoplay = function(){
            _this.n = _this.n >= (_this.count - 1) ? 0 : ++_this.n;
            $(_this.obj + " div a").eq(_this.n).triggerHandler('mouseover');
        }
        //��ҳ����
        this.resetclass =function(obj,i){
			$(obj).css({border:"2px solid #fafafa",filter: "Alpha(opacity=60)" ,opacity:".6",width:"136px", height:"62px",margin:"0 auto"})
           // $(obj + " img").css({display:"block",clear:"both",width:"136px",height:"64px",textAlign:"center",border:"1px solid #999",fontSize:"12px",color:"#000",background:"#fff",cursor:"pointer"});
            $(obj).eq(i).css({border:"2px solid #bc3798",filter: "Alpha(opacity=100)" ,opacity:"1"})
        }
        this.factory();
    }
})(jQuery)
