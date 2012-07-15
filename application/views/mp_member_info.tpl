<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="/staticx/css/QYcommunity/details.css" media="screen" />
<script src="/staticx/js/JSLib/jquery-1.6.4.js" type="text/javascript"></script>
<script src="/staticx/js/QY.udetails-x.js"></script>
<title>奇遇同城 - </title>
</head>

<body class="commbg">
<div class="qy-parentCont">
   {include file="common/mp_header.tpl"}
  <div class="qy-hp-mainAR">
    <div class="qy-details-container">
      <div class="qy-details-resume">
        <div class="qy-details-avaters"> <img id="deCover" src="{$lifePhoto}" /> <font><strong>会员日志(<a href="/index.php/browse_blog/map_list/{$member.userid}">{$blogMapNum}</a>)</strong></font> </div>
        <ul class="qy-details-basic">
          <li class="usrName">{$member.username} （PID: {$member.userid}）</li>
          <li class="usrLevel"> <b>会员星级:</b> <span class="iconstars"></span> </li>
          <li class="usrDetalsone"> {if $member_profile.gender==0}男{else}女{/if}，{$member_profile.age}，{$member_profile.sz}，来自{$member_profile.province['province']}{$member_profile.city['city']}</li>
          <li class="usrDetalstwo"> <span>学   历：{$member_profile.education}</span> <span>职  业：{$member_profile.career}</span></li>
          <li class="usrDetalstwo"> <span>属    性：{$member_profile.sx} </span> <span>星    座：{$member_profile.sz} </span> </li>
          <li class="usrPhotos"> <a class="lArrow"></a> <a class="rArrow"></a>
            <div class="qy-details-lifepicScroll">
              <ul id="deThumbUL" class="qy-details-leftpic" >
              {if $pshow==0}
               {foreach from=$myPhotoList item=v key=k}
                <li><img src="{$v.filepath}" orgsrc="{$v.filepath}"  /></li>
               {/foreach}           
               {else}
               <li>Ta还没有上传照片</li>
               {/if}                 
              </ul>
            </div>
          </li>
          <li class="usrBtns"> <a href="/index.php/friend/mp_favoritex/addonfavorite/{$member_profile.userid}" id="btnFavorite" class="btn-detailAdd">加为好友</a> <a href="/index.php/friend/mp_favoritex/addonAttention/{$member_profile.userid}" id="btnAttention" class="btn-detailAdd">关注Ta</a><a id="btnSendmail" class="btn-detailAdd" href="/index.php/member_info/sendmessage/uid/{$member.userid}">发信给Ta</a> </li>
        </ul>
      </div>
      <span class="splite-m1"></span>
      <div class="qy-details-specific">
        <div class="qy-details-specific-personal">
          <div class="qy-details-caption">个人介绍</div>
          <p class="desc">{if $member_profile.description ==''}TA还未填写{else}{$member_profile.description}{/if}</p>
        </div>
        <div class="qy-details-specific-desc">
          <div class="qy-details-caption">详细资料</div>
          <ul class="qy-details-specificList">
            <li><span><strong>身&nbsp;&nbsp;&nbsp; 高</strong>:  {$member_profile.height}</span> <span><strong>体&nbsp;&nbsp;&nbsp; 重</strong>:  {$member_profile.weight}</span></li>
            <li><span><strong>民&nbsp;&nbsp;&nbsp; 族</strong>:  {$member_profile.nation}</span> <span><strong>婚姻状况</strong>:  {$member_profile.marital}</span></li>
            <li><span><strong>个&nbsp;&nbsp;&nbsp; 性</strong>:  {$member_profile.gx}</span> <span><strong>作息习惯</strong>:  {$member_profile.habits_life}</span></li>
            <li><span><strong>吸&nbsp;&nbsp;&nbsp; 烟</strong>:  {$member_profile.habits_smoke}</span> <span><strong>饮&nbsp;&nbsp;&nbsp; 酒</strong>:  {$member_profile.habits_drink}</span></li>
            <li><span><strong>家&nbsp;&nbsp;&nbsp; 务</strong>:  {$member_profile.habits_housework}</span> <span><strong>厨&nbsp;&nbsp;&nbsp; 艺</strong>:  {$member_profile.habits_cooking}</span></li>
          </ul>
        </div>
        <div class="qy-details-specific-terms" style="display:none">
          <div class="qy-details-caption">征友条件</div>
          <ul class="qy-details-specificList">
            <li><span>家   乡:  上海普陀</span> <span>毕业院校:上海师大</span></li>
            <li><span>家   乡:  上海普陀</span> <span>毕业院校:上海师大</span></li>
            <li><span>家   乡:  上海普陀</span> <span>毕业院校:上海师大</span></li>
            <li><span>家   乡:  上海普陀</span> <span>毕业院校:上海师大</span></li>
            <li><span>家   乡:  上海普陀</span> <span>毕业院校:上海师大</span></li>
            <li><span>家   乡:  上海普陀</span> <span>毕业院校:上海师大</span></li>
          </ul>
        </div>
        <div class="qy-details-specific-ablums">
          <div class="qy-details-caption">生活照</div>
          <ul>
          {foreach from=$myPhotoList item=v key=k}
            <li><a rel="lstphotos" href="{$v.filepath}"><img src="{$v.filepath}" /></a> </li>
           {/foreach}          
          </ul>
          <span class="splite-m1"></span> </div>
      </div>
      <div class="qy-details-ouList"> <b>你可能感兴趣的朋友</b>
        <ul>
        {foreach from=$members_list item=v key=k}
        
          <li><a href="/index.php/member_info/index/uid/{$v.userid}" target="_blank"><img src="{$v.avatar_img}" />
            <p>{$v.username}</p>
            </a>
            <p>{$v.age}岁.{$v.city['city']}</p>
          </li>
         {/foreach}    
        </ul>
      </div>
      <span class="splite-m1"></span> </div>
  </div>
   {include file="common/mp_footer.tpl"}
</div>
</body>
</html>