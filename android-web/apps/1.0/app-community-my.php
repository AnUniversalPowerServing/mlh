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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-my-bg-styles.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
body { background-color:#f7f7f7; }
</style>
<script type="text/javascript">
$(document).ready(function(){
 sideWrapperToggle();
 mainMenuSelection("dn_"+USR_LANG+"_mystuff");
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
});
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
	    <!-- content ::: Start -->
		    <div class="container-fluid mtop15p">
			  <div class="row">
			    <!-- -->
			    <div align="center" class="col-xs-6">
				  <div class="list-group">
					<div align="center" class="list-group-item" style="background-color:#e91e63;color:#fff;">
					  <div class="mtop15p mbot15p"><b>Browse Community</b></div>
				    </div>
				  </div>
				</div>
				<!-- -->
				<!-- -->
			    <div align="center" class="col-xs-6">
				  <div class="list-group">
					<div align="center" class="list-group-item" style="background-color:#c37706;color:#fff;">
					  <div class="mtop15p mbot15p"><b>My Community</b></div>
				    </div>
				  </div>
				</div>
				<!-- -->
			  </div>
			  <div class="row">
			     <!-- -->
				 <div align="center" class="col-xs-12">
				  <div class="list-group">
					<div align="center" class="list-group-item" style="background-color:#737272;color:#fff;">
					  <div class="mtop15p mbot15p"><b>Joined Community</b></div>
				    </div>
				  </div>
				</div>
			    <!-- -->
			  </div>
			  <div class="row">
			     <!-- -->
				 <div align="center" class="col-xs-12">
				  <div class="list-group">
					<div align="center" class="list-group-item" style="background-color:#009688;color:#fff;">
					  <div class="mtop15p mbot15p"><b>Subscribed Community</b></div>
				    </div>
				  </div>
				</div>
			    <!-- -->
			  </div>
			</div>
		<!-- content ::: End -->
	  </div>
	</div>
  </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>
