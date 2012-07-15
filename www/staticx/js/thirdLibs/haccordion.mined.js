// SeViR Simple Horizontal Accordion @2007
// author - shrek.xii
jQuery.fn.extend({
  haccordion: function(params){
    var jQ = jQuery;
    var params = jQ.extend({
      speed: 500,
      headerclass: "header",
      contentclass: "content",
	  cursectionclass: "cursection",
      contentwidth: 526
    },params);
	
	
	
	// ≥ı ºªØ
	jQ("div."+params.contentclass,this).eq(0).animate({
          width: params.contentwidth + "px"
    },0);
	
    return this.each(function(){
      jQ("."+params.headerclass,this).click(function(){
		var $oContent=$(this).next("div."+params.contentclass);
		
		if($oContent.width()==0){
			$(this).attr("class",params.cursectionclass).siblings("."+params.cursectionclass).attr("class",params.headerclass)
			$oContent.animate({
				width: params.contentwidth + "px"}, {queue:false, duration:params.speed});
		}
		$oContent.siblings("div."+params.contentclass).animate({
				width:"0px"}, {queue:false,duration:params.speed});
				
      });
	  jQ("."+params.headerclass,this).eq(0).attr("class",params.cursectionclass)
    });
  }
});