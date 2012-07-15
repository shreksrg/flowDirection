<script src="/staticx/js/thirdLibs/express.validate.js"></script>
<script src="/staticx/js/QY.quicklogin-popup.js"></script>
<div class="QY-quickLogin-Wrap">
  <div class="spliteline"></div>
  <div class="registerlink">
    <h3>新用户注册</h3>
    <a class="btnRegister" href="">马上注册</a> </div>
  <form id="frmLogins" class="frmLogin" method="post" action="/index.php/member/login/set_login">
    <table class="tbLogin" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td><h2>会员登录</h2></td>
      </tr>
      <tr>
        <td>用 户 名：</td>
        <td><label for="textfield"></label>
          <input class="txtinfo" type="text" name="username" id="username" /></td>
      </tr>
      <tr>
        <td>密&nbsp;&nbsp;&nbsp; 码：</td>
        <td><input  class="txtinfo" type="text" name="password" id="password" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input class="btnSubmit" type="submit" name="button" id="button" value="提交" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </form>
</div>
