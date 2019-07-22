<?php session_start();
 if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>User Profile</title>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-profile-bg-styles.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
 sideWrapperToggle();
 mainMenuSelection("dn_"+USR_LANG+"_adminDashboard");
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 loadSMSInfo();
});
function loadSMSInfo(){
 
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
  { action:'MOBILE_SMS_BALANCE'},function(response){
   console.log("response: "+response);
   response=JSON.parse(response);
   var content01='<div id="smslanceMsgs" class="col-xs-12"></div>';
       content01+='<div id="smsfreshMsgs" class="col-xs-12"></div>';
   document.getElementById("msgsInfo").innerHTML=content01; 
   var content02='<div class="list-group">';
	   content02+='<div align="center" class="list-group-item" ';
	   content02+='style="background-color:#eee;color:#000;"><b>SMSLance Messages</b></div>';
	   content02+='<div id="div_smslanceBalance" align="center" class="list-group-item">';
	   content02+='<span style="font-size:22px;color:#888;"><b>'+response.smslane_balance+'</b></span>';
	   content02+='</div>';
	   content02+='</div>';
   document.getElementById("smslanceMsgs").innerHTML=content02; 
   var content03='<div class="list-group">';
	   content03+='<div align="center" class="list-group-item" ';
	   content03+='style="background-color:#eee;color:#000;"><b>SMSFresh Messages</b></div>';
	   content03+='<div id="div_smsfreshBalance" align="center" class="list-group-item">';
	   content03+='<span style="font-size:22px;color:#888;"><b>'+response.smsfresh_balance+'</b></span>';
	   content03+='</div>';
	   content03+='</div>';
   document.getElementById("smsfreshMsgs").innerHTML=content03;
   smsfreshMsgs
 });
}
</script>
</head>
<body>
  <?php include_once 'templates/api/api_loading.php'; ?>
  <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header_other.php'; ?>
	  <div id="app-page-content">
	    <div class="list-group">
		  <div align="right" class="list-group-item" style="background-color:#eee;">
		    <div>Hello, <b><?php echo $_SESSION["AUTH_USER_SURNAME"]." ".$_SESSION["AUTH_USER_FULLNAME"]; ?></b></div>
		  </div>
		</div>
	    <div id="msgsInfo" class="container-fluid mtop15p">
		  <div align="center">
			<img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" 
			style="margin-top:15px;width:150px;height:150px;"/>
		  </div> 
		</div>
	  </div>
	</div>
  </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>
