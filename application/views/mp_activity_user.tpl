<div>
  <ul class="qy-acdetail-joinleaguers">
  
   {foreach from=$join_list item=v key=k}
    <li><a target="_blank" href="/index.php/member_info/index/uid/{$v.uid}"><img src="{$v.avatar_img}">{$v.username}</a> {if $v.sex=='0'}男{else}女{/if},{$v.age}岁</li>
   {/foreach} 
   
  </ul>
</div>
