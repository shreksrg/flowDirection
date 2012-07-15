<script src="/staticx/js/QY.mapsign.js"></script>

<div class="mapsign-styleW1">
  <div class="qy-mapsign-wrap" >
    <div class="qy-tipmsg-caption"> <span class="qy-tipmsg-icon1">地图标记</span> </div>
    <div class="qy-mapsign-comment">
      <div class="map_container" id="map_container" style="width:889px; height:416px">地圖區塊</div>
      <div class="qy-mapsign-option">
        <form id="frm-mapsign">
          <p class="qy-mapsign-area"> <strong>区&nbsp;&nbsp;&nbsp; 域</strong>&nbsp;&nbsp;
            <select name="regprovince" id="province">
              <option value="0">选择省份</option>
            </select>
            <select name="regcity" id="city">
              <option value="0">选择城市</option>
            </select>
          </p>
          <p class="qy-mapsign-detail"><strong>详细地址</strong>&nbsp;&nbsp;
            <input id="texDetail" name="" type="text"  value="{$info.detail_address}"/>
            <a id="btn-mapMark" class="qy-mapsign-btnsearch">搜索</a></p>
          <p><a class="qy-mapsign-btnsave">保存标记</a></p>
          

        </form>
       <input id="optVal" name="" type="hidden" value="(province:[{$info.provice['provinceID']},'{$info.provice['province']}'],city:[{$info.city['cityID']},'{$info.city['city']}'],backAddr:{$backAddr})" /> 
        
      </div>
    </div>
  </div>
</div>
