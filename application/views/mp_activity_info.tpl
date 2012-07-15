<div class="qy-acdetail-tagDesc">
  <div class="qy-acdetail-acpicScroll">
    <div class="qy-details-caption">活动相片</div>
    <div class="qy-aedetail-pList"> <a class="arrowLeft" href="###"><img src="/staticx/images/index/party_left.jpg" width="26" height="51" /></a> <a class="arrowRight" href="###"><img src="/staticx/images/index/party_right.jpg" width="26" height="51" /></a>
      <div class="qy-aedetail-pScrollCont">
        <ul id="ScrollAlbum" class="qy-aedetail-pScroll" >
          {foreach from=$pic_list item=v key=k}
          
          <li><a href="#"><img src="{$v.filepath}">{$v.title}</a></li>
        {/foreach}       
        
        </ul>
      </div>
    </div>
  </div>
  <div class="qy-acdetail-accontent">
    <div class="qy-details-caption">活动内容</div>
    <div class="qy-acdetail-content"> {$act_info.description} </div>
  </div>
  <style>
		  </style>
  <!--<div class="qy-acdetail-acmessage">
    <h3 class="msgcaption">活动留言 <font>共(5)条留言</font></h3>
    <table class="qy-acdetail-msgform" width="0" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>用户名</td>
        <td width="12">&nbsp;</td>
        <td><label for="textfield"></label>
          <input type="text" name="textfield" id="textfield" />
          &nbsp;&nbsp; 密码：
          <input type="text" name="textfield3" id="textfield3" /></td>
      </tr>
      <tr>
        <td valign="top">内&nbsp; 容</td>
        <td>&nbsp;</td>
        <td><label for="textarea"></label>
          <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea></td>
      </tr>
      <tr>
        <td>验证码</td>
        <td>&nbsp;</td>
        <td><input type="text" name="textfield2" id="textfield2" /></td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td><a class="btn-sendmsg">发表留言</a></td>
      </tr>
    </table>
    <ul class="qy-aedetail-msgsOpts">
      <li> <span class="avatorcont"><a href="#"> <img class="msger-avator" /></a></span>
        <p class="msgcontent">一直错误的以为红照壁餐厅就在红照壁那边，原来在务还不错。</p>
        <p class="msgerdate"><strong><a href="#">NiceFD</a></strong> 发表于10分钟前</p>
      </li>
      <li> <span class="avatorcont"><a href="#"> <img class="msger-avator" /></a></span>
        <p class="msgcontent">一直错误的以为红照壁餐厅就在红照壁那边，原来在务还不错。</p>
        <p class="msgerdate"><strong><a href="#">NiceFD</a></strong> 发表于10分钟前</p>
      </li>
      <li> <span class="avatorcont"><a href="#"> <img class="msger-avator" /></a></span>
        <p class="msgcontent">一直错误的以为红照壁餐厅就在红照壁那边，原来在务还不错。</p>
        <p class="msgerdate"><strong><a href="#">NiceFD</a></strong> 发表于10分钟前</p>
      </li>
      <li> <span class="avatorcont"><a href="#"> <img class="msger-avator" /></a></span>
        <p class="msgcontent">一直错误的以为红照壁餐厅就在红照壁那边，原来在务还不错。</p>
        <p class="msgerdate"><strong><a href="#">NiceFD</a></strong> 发表于10分钟前</p>
      </li>
      <li> <span class="avatorcont"><a href="#"> <img class="msger-avator" /></a></span>
        <p class="msgcontent">一直错误的以为红照壁餐厅就在红照壁那边，原来在务还不错。</p>
        <p class="msgerdate"><strong><a href="#">NiceFD</a></strong> 发表于10分钟前</p>
      </li>
    </ul>
    <ul class="qy-common-pageations" >
      <li class="curpage">1</li>
      <li>2</li>
      <li>3</li>
    </ul>
  </div>-->
</div>
