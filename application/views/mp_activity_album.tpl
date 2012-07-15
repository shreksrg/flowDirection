<div>
  <ul class="qy-acdetail-acalbum">
  {foreach from=$pic_list item=v key=k}
  
    <li><a title="{$v.title}" href="{$v.filepath}" rel="actAlbums"><img src="{$v.filepath}">{$v.title}</a></li>
   
   {/foreach}   
  </ul>
</div>
