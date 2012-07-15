
    /// <summary>  
    /// 调整图片大小并居中  
    /// </summary>  
    /// <remarks>  
    /// <param>图片对象</param>  
    /// <param>容器最大宽度</param>  
    /// <param>容器最大高度</param>  
    /// </remarks>  
    var adjustImgSize = function(img, boxWidth, boxHeight) {  
  
        // var imgWidth=img.width();  
        // var imgHeight=img.height();  
        // 上面这种取得img的宽度和高度的做法有点儿bug   
        // src如果由两个大小不一样的图片相互替换时，上面的写法就有问题了，换过之后的图片的宽度和高度始终取得的还是换之前图片的值。  
        // 解决方法：创建一个新的图片类，并将其src属性设上。  
        var tempImg = new Image();          
        tempImg.src = img.attr('src');  
        var imgWidth=tempImg.width;  
        var imgHeight=tempImg.height;  
  
        //比较imgBox的长宽比与img的长宽比大小  
        if((boxWidth/boxHeight)>=(imgWidth/imgHeight))  
        {  
            //重新设置img的width和height  
            img.width((boxHeight*imgWidth)/imgHeight);  
            img.height(boxHeight);  
            //让图片居中显示  
            var margin=(boxWidth-img.width())/2;  
            img.css("margin-left",margin);  
        }  
        else  
        {  
            //重新设置img的width和height  
            img.width(boxWidth);  
            img.height((boxWidth*imgHeight)/imgWidth);  
            //让图片居中显示  
            var margin=(boxHeight-img.height())/2;  
            img.css("margin-top",margin);  
        }  
    };  
      
    // 本机能的js事件  
    $(function() {  
         // 图像加载完成之后，调整图片大小  
         $('#img1').load(function() {  
             adjustImgSize($(this), $(this).parent().width(), $(this).parent().height());  
         });  
    });  