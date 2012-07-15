<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/acdetails.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.4.2.js" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
<script src="/staticx/js/QY.actDetail.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
 {include file="common/mp_header.tpl"}
  <div class="qy-detail-mainAR">
    <div class="qy-detail-container">
      <div class="qy-acdetail-resume"> <img class="acavater"  src="{$act_info.thumb}" />
        <ul class="qy-acdetail-Opts">
          <li class="activename">{$act_info.SUBJECT}</li>
          <li class="ac-clsname"><b>发 起 人：</b>{$act_info.username}</li>
          <li class="ac-clsname"><b>活动时间：</b>{$act_info.times|date_format:"%Y-%m-%d"}</li>
          <li class="ac-clsname"><b>活动地址：</b>{$act_info.place}</li>
          <li class="ac-clsname"><b>活动分类：</b>{if $act_info.class==1001}品尝美食{/if}{if $act_info.class==1002}户外休闲{/if}{if $act_info.class==1003}运动健身{/if}{if $act_info.class==1004}室内活动{/if}{if $act_info.class==1005}恬静阅读{/if}</li>
          <li class="ac-clsname"><b>咨询电话：</b>{$act_info.phone}</li>
          <li class="ac-tipcounts"><span class="msgcounts">已经有8人留言</span><span class="piccounts">活动相片({$act_info.pic_num})</span></li>
          <li class="ac-tipdate">距活动开始还有 {$act_info.dayNum} 天</li>
          <li class="ac-btnoperater"><a id="application" href="/index.php/activity/mp_active/actApply/{$act_info.aid}">参加活动</a><a id="attention" href="/index.php/activity/mp_active/actAttention/{$act_info.aid}">关注活动</a><a id="invite" href="/index.php/activity/mp_active/actInvite/{$act_info.aid}">邀请好友</a></li>
        </ul>
      </div>
      <div class="qy-commonTag-headertit">
        <ul id="activeTagSwitch" class="qy-commonTag-switchTags">
          <li class="cursection"><a href="/index.php/browse_act/info/{$act_info.aid}">活动详情</a></li>
          <li><a href="/index.php/browse_act/user/{$act_info.aid}">报名会员</a></li>
          <li><a href="/index.php/browse_act/album/{$act_info.aid}">活动相册</a></li>
        </ul>
      </div>
      <div id="actDetailWrap" class="qy-acdetail-leftPlate">
        <div class="qy-acdetail-tagDesc">
          <div class="qy-acdetail-acpicScroll">
            <div class="qy-details-caption">活动相片</div>
            <div class="qy-aedetail-pList">
            
             <a class="arrowLeft" href="###"><img src="/staticx/images/index/party_left.jpg" width="26" height="51" /></a> <a class="arrowRight" href="###"><img src="/staticx/images/index/party_right.jpg" width="26" height="51" /></a>
             
              <div class="qy-aedetail-pScrollCont">
                <ul id="ScrollAlbum" class="qy-aedetail-pScroll" >
                {foreach from=$act_info.pic_list item=v key=k}
                  <li><a href="{$v.filepath}"><img  src="{$v.filepath}"/>{$v.title}</a></li>
                {/foreach}       
                </ul>
              </div>
            </div>
          </div>
          <div class="qy-acdetail-accontent">
            <div class="qy-details-caption">活动内容</div>
            <div class="qy-acdetail-content"> 
              
            {$act_info.description}
            </div>
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
      </div>
      
      <div id="mapbox"></div>
      <input id="mapcity" name="" type="hidden" value="{$act_info.map_p},{$act_info.map_c}" />
      <input id="mapaddr" name="" type="hidden" value="{$act_info.detail_address}" />
      <div class="qy-acdetail-rightPlate"> <b class="caption">您可能感兴趣的活动</b>
        <ul class="qy-acdetail-rndsOpts">
        
        {foreach from=$activity_list item=v key=k}
          <li><a href="/index.php/browse_act/detail/{$v.aid}"><img src="{$v.thumb}" /><b>{$v.cut_subject}</b></a>
            <p>{$v.times|date_format:"%Y/%m/%d"}</p>
            <p>{$v.place}</p>
          </li>
        {/foreach}    
          
         
        </ul>
      </div>
    </div>
  </div>
  {include file="common/mp_footer.tpl"}
</div>
</body>
</html>