/**
 * @author ShrekSrg
 * @date 9 April 2012
 */
var ValidationState = "valid"; (function(jQuery) {
    jQuery.fn.validate = function(options) {
        options = jQuery.extend({
            expression: "return true;",
            message: "",
            error_class: "ValidationErrors",
            error_field_class: "ErrorField",
            live: true,
            validMethod: 'blur',
            exonfocus: false,
            Ajaxss: 'off',
            focusTip: null,
            errorTip: null,
            correctTip: null,
            targetTipID: null,
            tipMessges: {}
        },
        options);
        var SelfID = jQuery(this).attr("id");
        var targetTipID = options.targetTipID
        var validFns = new validationFns();
        var validState = false;
        var tipMsgs = options["tipMessges"];
        validFns._focusMsg = tipMsgs.iFocus 
		validFns._errorMsg = tipMsgs.iError 
		validFns._correctMsg = tipMsgs.iCorrect 
		validFns._ajaxValid = tipMsgs.iAjaxvalid 
		validFns._ajaxInvalid = tipMsgs.iAjaxinvalid
        if (tipMsgs.iAjaxwait) {
            validFns._ajaxWaitMsg = tipMsgs.iAjaxwait
        }


        if (options['live']) {
            jQuery(this).bind(options['validMethod'],
            function() {
                validate_field(SelfID);
            });

            if (options['exonfocus']) {
                $(this).bind('keypress click',
                function() {
                    showtipMessage(tipMsgs.iFocus, 'tip_msg')
                })
            }

            jQuery(this).bind('focus',
            function() {

                if (options['exonfocus']) {
                    return;
                }

                showtipMessage(tipMsgs.iFocus, 'tip_msg')
            });
        }

        jQuery(this).parents("form").submit(function(){
			validate_field(SelfID);
            if (validFns.vState == false) {
              //  alert(SelfID)
            }

            return validFns.vState

        });

        var tipDIV = '<div class="form_box"><div class="tip_msg"><span rel="tipmsg">请填写密码</span><span class="angle1"></span><span class="angle2"></span><span class="radius1"></span><span class="radius2"></span><span class="radius3"></span><span class="radius4"></span></div></div>'

        function showtipMessage(m, c) {
            $('#' + targetTipID).html('') 
			$('#' + targetTipID).append(tipDIV);
            /*
			if($('#'+targetTipID).find('div[class=form_box]').length==0){
				$('#'+targetTipID).append(tipDIV);
			}*/

            //加载提示信息
            $tds = $('#' + targetTipID).find('div[class*=tip_msg]') 
			$tds.find('span[rel=tipmsg]').html(m)
			$tds.attr('class', c);

        }

        function swichTipmsg() {
            if (!validFns.vState) {
                showtipMessage(validFns.message, 'tip_msg tip_msg3')
            } else {
                if (options.correctTip == "errortip") {
                    showtipMessage(validFns.message, 'tip_msg tip_msg3');
                    return;
                }
                $('#' + targetTipID).html('<img id="success_img" class="correct" src="/staticx/images/register/b_09.gif">')
            }
        }

        function validate_field(id) {
            var VAL = $('#'+id).val();
            var expression = 'validFns.' + options['expression'];
            validFns.vState = eval(expression)(VAL,
            function() {
                swichTipmsg()
            });
            swichTipmsg()

        }
    };
})(jQuery);