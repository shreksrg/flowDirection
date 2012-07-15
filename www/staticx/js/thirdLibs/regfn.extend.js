function validationFns(){
	
	
	var _vppFn=this;	
	_vppFn.message=""
	_vppFn.vState=false;

	_vppFn._focusMsg    = null
	_vppFn._errorMsg    = null
	_vppFn._correctMsg    = null
	_vppFn._ajaxWaitMsg = "验证中,请稍等.."
	_vppFn._ajaxValid   = null
	_vppFn._ajaxInvalid = null
	_vppFn._errorSys    = "系统错误或繁忙,请重试"
	

	 
	 _vppFn.chkUsername=function(val,showmsg){
		 var reg = /^[a-zA-Z0-9\u4E00-\u9FA5]{4,16}$/g;  // 4-16个字符,支持中英文和数字
    	 if(!reg.test(val)){_vppFn.message=_vppFn._errorMsg ;return false}
		$.ajax({type:'POST',complete:function(){_vppFn.message=_vppFn._ajaxWaitMsg},url:'/index.php/member/regist/check_name',dataType:'json',data:{'username':val},success:function(r){
			if(r.state==1){_vppFn.message=_vppFn._ajaxValid;_vppFn.vState=true}else{_vppFn.message=_vppFn._ajaxInvalid;_vppFn.vState=false}
			showmsg();
		},error:function(){_vppFn.message=_vppFn._errorSys; _vppFn.vState=false; showmsg();}
		})
		
		return _vppFn.vState;
	}


	 _vppFn.chkEmails=function(val,showmsg){
		if (val.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1) {
			_vppFn.message=_vppFn._errorMsg ;
			return false;
		}
		$.ajax({type:'POST',complete:function(){_vppFn.message=_vppFn._ajaxWaitMsg},url:'/index.php/member/regist/check_email',dataType:'json',data:{'email':val},success:function(r){
			if(r.state==1){_vppFn.message=_vppFn._ajaxValid;_vppFn.vState=true}else{_vppFn.message=_vppFn._ajaxInvalid;_vppFn.vState=false}
			showmsg();
		},error:function(){_vppFn.message=_vppFn._errorSys; _vppFn.vState=false; showmsg();}
		})
	
		return _vppFn.vState;
	}
	
	_vppFn.chkProvince=function(val){
		var valcity=$('#city').val();
		if(valcity==0){_vppFn.message=_vppFn._errorMsg;}
		if(val==0){_vppFn.message=_vppFn._errorMsg;}
		return true
	}
	
	_vppFn.chkCity=function(val){
		var valcity=$('#city').val();
		if(valcity==0){_vppFn.message=_vppFn._errorMsg; return false;}
		return true
	}
	
	
	_vppFn.chkBirthday=function(val){
		
		var reg=/^((((((0[48])|([13579][26])|([2468][048]))00)|([0-9][0-9]((0[48])|([13579][26])|([2468][048]))))-02-29)|(((000[1-9])|(00[1-9][0-9])|(0[1-9][0-9][0-9])|([1-9][0-9][0-9][0-9]))-((((0[13578])|(1[02]))-31)|(((0[1,3-9])|(1[0-2]))-(29|30))|(((0[1-9])|(1[0-2]))-((0[1-9])|(1[0-9])|(2[0-8]))))))$/i;
		
		if (!reg.test(val)){_vppFn.message=_vppFn._errorMsg; return false;}
		_vppFn.message=_vppFn._correctMsg
		return true
	}
	
	
	_vppFn.chkPassword=function(val){
		 var reg = /^[a-zA-Z0-9]{6,20}$/g;    //密码6至20个字符
		 if(!reg.test(val)){_vppFn.message=_vppFn._errorMsg ;return false}
		 _vppFn.message=_vppFn._correctMsg
		 return true
	}
	
	_vppFn.chkConfirmPwd=function(val){
			var pwd=$('#password').val();
			if(val!=pwd || val==''){_vppFn.message=_vppFn._errorMsg ;return false}
			_vppFn.message=_vppFn._correctMsg
			return true;
	}
	
	
	_vppFn.chkEducation=function(val){
		if(val==0){_vppFn.message=_vppFn._errorMsg; return false;}
		return true
	}
	
	_vppFn.chkCareer=function(val){
		if(val==0){_vppFn.message=_vppFn._errorMsg; return false;}
		return true
	}
	
	_vppFn.chkTerms=function(val){
		
		if($('#terms').attr("checked")){return true;}
		_vppFn.message=_vppFn._errorMsg; 
		return false
	}
	
	
}
		
