// JavaScript Document
String.prototype.Trim = function()
{
	return this.replace(/(^\s*)|(\s*$)/g, "");
}

String.prototype.isNumber = function() {
	var reg = /^[0-9]+$/;
	return reg.test(this)
	/*
	var re = new RegExp(reg); 
	if (this.search(re) != -1) { return true;} else { return false;} */ 
}

String.prototype.isDateTime = function(){
	var reg = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/
	return reg.test(this)
}


String.prototype.isEmail = function(){
	var reg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	return reg.test(this)
}

String.prototype.isPhone = function() {
	var phoneRegWithArea = /^[0][1-9]{2,3}-[0-9]{5,8}$/; 
	var phoneRegNoArea = /^[1-9]{1}[0-9]{5,8}$/; 	
	if( this.length > 9 ) {
		return phoneRegWithArea.test(this)
	}else{
		return phoneRegNoArea.test(this)
	}
}

String.prototype.isMobile = function() {
	var reg = new RegExp(/^[1][3,5][0-9]{9}$/); 
	return reg.test(this)
}

String.prototype.chkUsername1 = function()
{
	var reg = /^[a-zA-Z0-9\u4E00-\u9FA5]{4,16}$/g;  // 4-16个字符,支持中英文和数字
    return reg.test(this);
}


String.prototype.isEmail = function()
{
	var reg=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
	return reg.test(this)

}

