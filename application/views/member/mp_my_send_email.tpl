<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/staticx/css/QYcommunity/mp.inbox.css" type="text/css" rel="stylesheet">
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.messageBox.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
  {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    {include file="common/mp_left.tpl"}
    <div class="qy-leaguerx-rightPlate">

      <div class="qy-leaguer-rplateCont">
        <div class="qy-inbox-headertit"> <b class="qy-inbox-caption">交友动态</b>
          <ul class="qy-inbox-switchTags">
            <li><a href="/index.php/member/my_email/index">收件箱</a></li>
            <li class="cursection"><a href="/index.php/member/my_email/get_send_email">发件箱</a></li>
            <li><a href="/index.php/member/my_email/get_admin_send_email">管理员来信</a></li>
          </ul>
        </div>
        <div class="qy-inbox-selection">
          <input id="selectAll" name="" type="checkbox" value="" />
          全选 <a id="delSelected" href="###">删除所选</a> </div>
        <ul class="qy-inbox-mListOpt">
        	<form class="frm-mailslst"  action="/index.php/member/my_email/delete_email" id="frmOptions" method="post">
            <input name="type" value="2" type="hidden"/>
          {foreach from=$emailList item=v key=k}
          <li>
            <div class="qy-outbox-secstate">
            
              <input name="mailOpt[]" value="{$v.pmid}" type="checkbox" rel="msgopt"/>
            </div>
            <div class="qy-inbox-msgitem"> <a href="/index.php/member_info/index/uid/{$v.touserid}" target="_blank"><img src="{$v.urls}" class="avatar"></a></a>
              <div class="senderdetail fixoutboxW">
                <p class="sendername"><b><a href="/index.php/member_info/index/uid/{$v.touserid}">{$v.send_username}</a></b><font class="sentdate">{$v['dateline']|date_format:"%Y/%m/%d %H:%I:%S"}</font></p>
                <p class="senderinfo"> 
                  <a href="/index.php/member/my_email/show_send_email/email_id/{$v.pmid}" target="_blank" class="btn-viewmsg">查看信件</a>{if $v.gender=='0'}男{else}女{/if} {$v.age}岁 {$v.city['city']} {$v.work}
                </p>
              </div>
            </div>
          </li>
         {/foreach}  
         
          </form>
        </ul>
        
        <span class="splite-m1"></span>
      <ul class="qy-common-pageations">
       {$page}
      </ul>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"}
</div>
</body>
</html>