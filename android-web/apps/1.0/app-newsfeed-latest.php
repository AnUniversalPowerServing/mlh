<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'templates/api/api_js.php'; ?>
 <title>NewsFeed</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-bg-styles.js"></script>
<style>
body{ background-color:#f7f7f7; } 
</style>
<script type="text/javascript">
$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_newsfeed");
bgstyle(3);
$(".lang_"+USR_LANG).css('display','block');
/* Set Session */
var sessionJSON='{"session_set" : [ { "key" : "AUTHENTICATION_STATUS" , "value" : "COMPLETED" }],';
	sessionJSON+='"session_get" : [ "AUTHENTICATION_STATUS" ] }';
js_session(sessionJSON,function(resp){ });
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',{ action:'GET_COUNT_LATESTNEWS',
		  user_Id:AUTH_USER_ID }, function(total_data){
   if(parseInt(total_data)>0){
     var content='<div align="left" class="mbot15p" style="font-size:12px;">';
	     content+='<span style="color:#808080;"><b>You have ';
		 content+='<span style="color:#0ba0da">'+total_data+'</span>';
		 content+=' News</b></span>';
		 content+='</div>';
	 document.getElementById("publicNewsFeedlistResults").innerHTML=content;
     scroll_loadInitializer('publicNewsFeedlist',10,get_data_latestNewsFeed,total_data);
   }
   else {
     var content='<div align="center" style="color:#ccc;">';
	     content+='You have no NewsFeed';
	     content+='<div>';
     document.getElementById("publicNewsFeedlist0").innerHTML=content;
   } 
 });
});
function get_data_latestNewsFeed(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',{ action:'GET_DATA_LATESTNEWS',
		  user_Id:AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end }, function(response){
   console.log(response);
   response=JSON.parse(response);
   var content=display_simpleNewsFeed(response);
       content+=appendContent;
   document.getElementById(div_view).innerHTML=content;
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
	
		 <!-- Public NewsFeed -->
		 
		 <div id="publicNewsFeedlist" class="container-fluid mtop20p mbot15p" style="padding:0px;">
		    <div id="publicNewsFeedlistResults" class="col-xs-12">
		    
		    </div>
            <div id="publicNewsFeedlist0" class="col-xs-12">
			   <div align="center">
			   <img src="images/load.gif" style="width:150px;height:150px;"/>
			   </div>
			</div>
			   <!--div align="center">
			   <!--img src="images/load.gif" style="width:150px;height:150px;"/>
			   </div>
			   <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/community/general/viewprofile/UPA533731685151">
			     <button>CommunityProfile</button>
			   </a>
			   <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/socialHub/classmatepoint/institute/batchchat/134">
				<button>Chat</button>
			   </a>
			   <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/create-newsfeed">
				<button>Create NewsFeed</button>
			   </a-->

		 
		 <!-- User Favourites NewsFeed -->
		 <!--div id="userFavNewsFeedlist0" class="container-fluid mbot15p hide-block">
           <div align="center">
		     <img src="images/load.gif" style="width:150px;height:150px;"/>
		   </div>
		 </div-->
				
		 <!-- Search NewsFeed -->
		 <!--div id="searchNewsFeedlist0" class="container-fluid mbot15p hide-block">
            <div align="center">
			   <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		</div-->
		
	  </div>
	</div>
 </div>
</body>
</html>
<?php 
} else { header("location:".$_SESSION["PROJECT_URL"]); } ?>