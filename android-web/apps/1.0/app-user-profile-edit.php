<?php session_start();
 if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>Edit User Profile</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css" rel="stylesheet" type="text/css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-profile-edit-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/app-subscriptions.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBLYTwBBtnRDyew0qLZTjCJp0mgR5koP5A"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<script type="text/javascript">
var APP_USERPROFILE_ID='<?php  if(isset($_GET["1"])) { echo $_GET["1"]; } ?>';
</script>
<style>
body { background-color:#eee; }
</style>
<script type="text/javascript">
$(document).ready(function(){ 
  bgstyle(3);
  $(".lang_"+USR_LANG).css('display','block');
  $('[data-toggle="tooltip"]').tooltip();
  startAppProgressLoader('info');
  sel_topMenuTab('menuTab_userprofile');
  stopAppProgressLoader();
});
</script>
</head>
<body>
<div id="app-user-profile-edit-modal" class="modal fade" role="dialog"></div>
  <?php include_once 'templates/api/api_loading.php'; ?>
  <?php include_once 'templates/api/api_header_simple.php'; ?>
	  <div id="app-page-content pad0">
	   <!-- AppBody Content -->
	   <?php include_once 'templates/api/api_progressbar.php'; ?>
<script type="text/javascript">
function sel_topMenuTab(id){
 var arry_Id=["menuTab_userprofile","menuTab_usersubscriptions"];
 var arry_content=["menuContent_userprofile","menuContent_usersubscriptions"];
 for(var index=0;index<arry_Id.length;index++){
   if(arry_Id[index]===id){
    if(!$('#'+arry_Id[index]).hasClass('custom-font')){ 
	  $('#'+arry_Id[index]).addClass('custom-font'); 
	  $('#'+arry_Id[index]).css('color',CURRENT_DARK_COLOR); 
	}
	if(!$('#'+arry_Id[index]).hasClass('custom-bg-solid2pxbottomborder')){ 
	  $('#'+arry_Id[index]).addClass('custom-bg-solid2pxbottomborder'); 
	  $('#'+arry_Id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR); 
	}
    if($('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).removeClass('hide-block'); }
   } 
   else {
    if($('#'+arry_Id[index]).hasClass('custom-font')){ 
	  $('#'+arry_Id[index]).removeClass('custom-font'); 
	  $('#'+arry_Id[index]).css('color','#000'); 
	}
	if($('#'+arry_Id[index]).hasClass('custom-bg-solid2pxbottomborder')){ 
	  $('#'+arry_Id[index]).removeClass('custom-bg-solid2pxbottomborder'); 
	  $('#'+arry_Id[index]).css('border-bottom','0px'); 
	}
    if(!$('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).addClass('hide-block'); }
   }
 }
 if(id==='menuTab_userprofile'){ load_userprofile_edit(); }
 else { load_usersubscription_edit(); }
}
</script>	   
	   <div id="app-actual-content" class="hide-block">
	   <!-- TOP MENU TAB ::: Start -->
		     <!-- Start -->
			 <div class="list-group" style="margin-bottom:0px;">
			   <div class="list-group-item">
			      <div class="container-fluid pad0">
					<div class="row">
					  <div align="center" class="col-xs-6">
					    <span id="menuTab_userprofile" class="pad10 curpoint" onclick="javascript:sel_topMenuTab(this.id);">
						  <b>User profile</b>
						</span>
					  </div><!-- col-xs-6 -->
					  <div align="center" class="col-xs-6">
					    <span id="menuTab_usersubscriptions" class="pad10 curpoint" onclick="javascript:sel_topMenuTab(this.id);">
						  <b>User Subscriptions</b>
						</span>
					  </div><!-- col-xs-6 -->
					</div><!-- row -->
				</div><!-- container-fluid -->
			   </div><!-- list-group-item -->
			 </div><!-- list-group ->
			 <!-- End -->
	   <!-- TOP MENU TAB ::: End -->
	   <!-- TOP MENU CONTENT ::: Start -->
	   <div id="menuContent_userprofile" class="container-fluid mtop15p hide-block">
	    <?php include_once 'templates/pages/app-user-profile-edit/user-profile-edit.php'; ?>
	   </div>
	   <div id="menuContent_usersubscriptions" class="container-fluid hide-block">
	    <?php include_once 'templates/pages/app-user-profile-edit/user-subscription-edit.php'; ?>
	   </div>
	   <!-- TOP MENU CONTENT ::: End -->
	  
	   </div>
	</div>
 
		
  <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>