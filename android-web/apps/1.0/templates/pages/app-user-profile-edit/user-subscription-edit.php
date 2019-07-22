<script type="text/javascript">
function load_usersubscription_edit(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 getListOfCategories('categories-list',AUTH_USER_ID,'UPDATE');
}
</script>
<div id="domain_body mtop15p">
  <span class="lang_english">
	 <div id="intrd-subtitle" class="col-md-12">
	   <h5 align="center" class="lineh25p">
	    <b>Select few Categories which you are interested to get updates in your NewsFeed</b>
	   </h5>
	 </div>
	 
	 <div id="categories-list" class="col-md-12 col-sm-12 col-xs-12" 
	 style="margin-top:15px;margin-bottom:15px;width:100%;height:auto;">
	   <div align="center">
		<img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
	   </div>
	 </div>
  </span>
 </div>