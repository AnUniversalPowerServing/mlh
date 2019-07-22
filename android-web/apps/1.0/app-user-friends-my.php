<?php session_start();
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-friends-my-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-friends-my.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
 <style>
 body { background-color:#f7f7f7; }
 body,.f12 { font-size:12px; }
.navbar { margin-bottom:0px; }
.frnshipreqdiv { padding:1px;line-height:20px; }
.frnshipreqaddr { color:#777;font-size:12px; }
.fa-hl-circle { border:2px solid #000;padding:10px;border-radius:50%; }
.silver-font { color:#aaa; }
.hide-block { display:none; }
 </style>
<script type="text/javascript">
$(document).ready(function(){ 
  bgstyle(3);
  $(".lang_"+USR_LANG).css('display','block'); 
  sel_topMenuTab('menuTab_myfriends');
});
/* Global Variables */
var TOTALDATA_FRIENDS; // user-myfriends-totalData
var TOTALDATA_REQUESTS_SENT; // user-sentrequests-totalData
var TOTALDATA_REQUESTS_RECEIEVED; // user-recievedrequests-totalData
function sel_topMenuTab(id){
 var arry_Id=["menuTab_frndRequests","menuTab_myfriends"];
 var arry_content=["menuContent_frndRequests","menuContent_myfriends"];
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
      if(id==='menuTab_frndRequests'){ subMenu_userFriendRequests('usrFrndSubMenu_recievedRequests'); }
 else if(id==='menuTab_myfriends'){ user_count_myFriends(); }
}
/****************************************************************************************************************************/
/********************************************* My Friends Menu **************************************************************/
/****************************************************************************************************************************/
function user_count_myFriends(){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_MYFRIENDSLIST', user_Id: AUTH_USER_ID },function(total_data){
    TOTALDATA_FRIENDS=parseInt(total_data);
    if(TOTALDATA_FRIENDS===0){
	   var content='<div align="center">';
	       content+='<span style="color:#ccc;">You have no Friends</span>';
	       content+='</div>';
	   document.getElementById('loadUserFriends0').innerHTML=content;
	} else {
	   var content='<div id="user-myfriends-totalData">';
	       content+='<span style="color:#808080;"><b>You have ';
		   content+='<span style="color:'+CURRENT_DARK_COLOR+';">'+TOTALDATA_FRIENDS+'</span>';
		   if(TOTALDATA_FRIENDS===1){ content+=' Friend.</b></span>'; }
		   else { content+=' Friends.</b></span>'; }
	       content+='</div>';
	   document.getElementById('loadUserFriendsCount').innerHTML=content;
      scroll_loadInitializer('loadUserFriends',10,user_data_myFriends,TOTALDATA_FRIENDS);
	}
  });
}
function user_data_myFriends(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_DATA_MYFRIENDSLIST', user_Id: AUTH_USER_ID, limit_start:limit_start, 
    limit_end:limit_end },function(response){
     console.log(response);
	 response=JSON.parse(response);
	 var content='';
	 if(response.length>0){
	 for(var index=0;index<response.length;index++){
	 var user_Id=response[index].user_Id;
	 var username=response[index].username;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var profile_pic=response[index].profile_pic;
	 var about_me=response[index].about_me;
	 var minlocation=response[index].minlocation;
	 var location=response[index].location;
	 var state=response[index].state;
	 var country=response[index].country;
	 var created_On=response[index].created_On;
	   content+='<div id="userFrndsInfoDetails-'+user_Id+'" class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div class="col-xs-12">';
	   content+='<i onclick="javascript:unfriendAperson(\''+user_Id+'\',\'userFrndsInfoDetails-'+user_Id+'\');" ';
	   content+='class="fa fa-close pull-right"></i>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7">';
	   content+='<h5 style="line-height:22px;"><b>'+surName+' '+name+'</b></h5>';
	   content+='<div>'+minlocation+', '+location+', '+state+', '+country+'</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	 }
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
  });
}

/* AcceptRequestRecievedByMe */
function acceptReqToMe(user_Id,accept_Id){
$('#'+accept_Id).hide(1000);
document.getElementById("searchpeople_btnsView_"+user_Id).innerHTML=ui_frndUnFrnd(user_Id);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'ACCEPT_FRNDREQUEST_TO_ME',requestFrom:user_Id, user_Id:AUTH_USER_ID },function(resp){ 
 console.log(resp);
});
}
function dismissWithdrawRequest(user_Id,decline_Id,type){
$('#'+decline_Id).hide(1000);
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
{action:'DELETE_A_REQUEST_SENT',from_userId:user_Id, to_userId:AUTH_USER_ID },function(resp){ 
 console.log(resp);
 if(type==='RECIEVED_REQUEST'){
   TOTALDATA_REQUESTS_RECEIEVED=TOTALDATA_REQUESTS_RECEIEVED-1;
   var content='';
   if(TOTALDATA_REQUESTS_RECEIEVED>0){
    content+='<div id="user-recievedrequests-totalData">';
	content+='<span style="color:#808080;"><b>Your have recieved ';
    content+='<span style="color:'+CURRENT_DARK_COLOR+';">'+TOTALDATA_REQUESTS_RECEIEVED+'</span> ';
	if(TOTALDATA_REQUESTS_RECEIEVED===1){ content+='Friend Request.</b></span>&nbsp;'; }
	else { content+='Friend Requests.</b></span>&nbsp;'; }
	content+='</div>';
	}
   else {
     content+='<div align="center" class="mtop15p">';
	 content+='<span style="color:#ccc;">You haven\'t Received any Friend Requests</span>';
	 content+='</div>';
	}
    document.getElementById('loadUserRecievedRequestsCount').innerHTML=content;	
 } else {
 TOTALDATA_REQUESTS_SENT=TOTALDATA_REQUESTS_SENT-1;
 var content='';
 if(TOTALDATA_REQUESTS_SENT>0){
   content+='<div id="user-sentrequests-totalData">';
   content+='<span style="color:#808080;"><b>Your have sent ';
   content+='<span style="color:'+CURRENT_DARK_COLOR+';"><b>'+TOTALDATA_REQUESTS_SENT+'</b></span> ';
   if(TOTALDATA_REQUESTS_SENT===1){ content+='Friend Request.</b></span>&nbsp;'; }
   else { content+='Friend Requests.</b></span>&nbsp;'; }
   content+='</div>';
 } else {
   content+='<div align="center" class="mtop15p">';
   content+='<span style="color:#ccc;">You didn\'t sent any Friend Requests</span>';
   content+='</div>';
 } 
 }
 document.getElementById("loadUserSentRequestsCount").innerHTML=content;
});
}
/* UnFriend a Person */
function unfriendAperson(user_Id, unFrnd_Id){   // 
 $('#'+unFrnd_Id).hide(1000);
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  {action:'UNFRIEND_A_PERSON',frnd1:user_Id, frnd2:AUTH_USER_ID },function(resp){ console.log(resp);
    TOTALDATA_FRIENDS=TOTALDATA_FRIENDS-1;
	var content='';
	if(TOTALDATA_FRIENDS>0){
	  content+='<div id="user-myfriends-totalData">';
	  content+='<span style="color:#808080;"><b>You have ';
	  content+='<span style="color:'+CURRENT_DARK_COLOR+';">'+TOTALDATA_FRIENDS+'</span>';
	  if(TOTALDATA_FRIENDS===1){ content+=' Friend.</b></span>'; }
	  else { content+=' Friends.</b></span>'; }
	  content+='</div>';
	} else {
	  content+='<div align="center">';
	  content+='<span style="color:#ccc;">You have no Friends</span>';
	  content+='</div>';
	}
	   document.getElementById('loadUserFriendsCount').innerHTML=content;
  });
}
/*****************************************************************************************************************************/
/********************************************* USER FRIEND REQUESTS **********************************************************/
/*****************************************************************************************************************************/
function subMenu_userFriendRequests(id){
  var arry=["usrFrndSubMenu_recievedRequests","usrFrndSubMenu_sentRequests"];
  for(var index=0;index<arry.length;index++){
   if(arry[index]===id){ 
     if(!$('#'+arry[index]).hasClass('custom-font custom-bg-solid2pxfullborder')){
	   $('#'+arry[index]).addClass('custom-font custom-bg-solid2pxfullborder');
	   $('#'+arry[index]).css('color',CURRENT_DARK_COLOR);
	   $('#'+arry[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	   if($('#'+arry[index]+'_content').hasClass('hide-block')){ $('#'+arry[index]+'_content').removeClass('hide-block'); }
	 } 
   } else {
      if($('#'+arry[index]).hasClass('custom-font custom-bg-solid2pxfullborder')){
	   $('#'+arry[index]).removeClass('custom-font custom-bg-solid2pxfullborder');
	   $('#'+arry[index]).css('color','#000');
	   $('#'+arry[index]).css('border-bottom','0px');
	   if(!$('#'+arry[index]+'_content').hasClass('hide-block')){ $('#'+arry[index]+'_content').addClass('hide-block'); }
	  } 
   }
 }
      if(id==='usrFrndSubMenu_recievedRequests'){  user_count_recievedFrndRequests(); }
 else if(id==='usrFrndSubMenu_sentRequests'){ user_count_sentFrndRequests(); }
}

/****************************************************************************************************************************/
/********************************** My Friends Requests Menu : Recieved Requests ********************************************/
/****************************************************************************************************************************/
function user_count_recievedFrndRequests(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_RECEIVEDFRIENDREQUESTS', to_userId: AUTH_USER_ID },function(total_data){
    TOTALDATA_REQUESTS_RECEIEVED=parseInt(total_data);
    if(TOTALDATA_REQUESTS_RECEIEVED===0){
	   var content='<div align="center" class="mtop15p">';
	       content+='<span style="color:#ccc;">You haven\'t Received any Friend Requests</span>';
	       content+='</div>';
	   document.getElementById("loadUserRecievedRequests0").innerHTML=content;
	}
   else {
        var content='<div id="user-recievedrequests-totalData">';
	        content+='<span style="color:#808080;"><b>Your have recieved ';
			content+='<span style="color:'+CURRENT_DARK_COLOR+';">'+TOTALDATA_REQUESTS_RECEIEVED+'</span> ';
			if(TOTALDATA_REQUESTS_RECEIEVED===1){ content+='Friend Request.</b></span>&nbsp;'; }
			else { content+='Friend Requests.</b></span>&nbsp;'; }
	        content+='</div>';
	   document.getElementById('loadUserRecievedRequestsCount').innerHTML=content;
	    scroll_loadInitializer('loadUserRecievedRequests',10,user_data_recievedFrndRequests,TOTALDATA_REQUESTS_RECEIEVED);
	 }
    
  });
}
function user_data_recievedFrndRequests(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_DATA_RECEIVEDFRIENDREQUESTS', to_userId: AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end},
  function(response){
    console.log(response);
	 response=JSON.parse(response);
	 var content='';
	 if(response.length>0){
	 for(var index=0;index<response.length;index++){
	 var user_Id=response[index].user_Id;
	 var username=response[index].username;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var profile_pic=response[index].profile_pic;
	 var about_me=response[index].about_me;
	 var minlocation=response[index].minlocation;
	 var location=response[index].location;
	 var state=response[index].state;
	 var country=response[index].country;
	 var created_On=response[index].created_On;
	   content+='<div id="userRecFrndsReqDetails-'+user_Id+'" class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7">';
	   content+='<h5 style="line-height:22px;"><b>'+surName+' '+name+'</b></h5>';
	   content+='<div>'+minlocation+', '+location+', '+state+', '+country+'</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="btn-group pull-right">';
	   content+='<button class="btn custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;" ';
	   content+='onclick="javascript:acceptReqToMe(\''+user_Id+'\',\'userRecFrndsReqDetails-'+user_Id+'\');">';
	   content+='<b>Accept</b></button>';
	   content+='<button class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';" ';
	   content+='onclick="javascript:dismissWithdrawRequest(\''+user_Id+'\',\'userRecFrndsReqDetails-'+user_Id+'\',\'RECIEVED_REQUEST\');">';
	   content+='<b>Dismiss</b></button>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	 }
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
  });
}
/****************************************************************************************************************************/
/*********************************** My Friends Requests Menu : Sent Requests ***********************************************/
/****************************************************************************************************************************/
function user_count_sentFrndRequests(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_SENTFRIENDREQUESTS', from_userId: AUTH_USER_ID },function(total_data){
  TOTALDATA_REQUESTS_SENT=parseInt(total_data);
  if(TOTALDATA_REQUESTS_SENT===0){
     var content='<div align="center" class="mtop15p">';
	     content+='<span style="color:#ccc;">You didn\'t sent any Friend Requests</span>';
	     content+='</div>';
	 document.getElementById("loadUserSentRequests0").innerHTML=content;
  } else {
     var content='<div id="user-sentrequests-totalData">';
	     content+='<span style="color:#808080;"><b>Your have sent ';
		 content+='<span style="color:'+CURRENT_DARK_COLOR+';"><b>'+TOTALDATA_REQUESTS_SENT+'</b></span> ';
		 if(TOTALDATA_REQUESTS_SENT===1){ content+='Friend Request.</b></span>&nbsp;'; }
		 else { content+='Friend Requests.</b></span>&nbsp;'; }
	     content+='</div>';
	 document.getElementById("loadUserSentRequestsCount").innerHTML=content;
      scroll_loadInitializer('loadUserSentRequests',10,user_data_sentFrndRequests,TOTALDATA_REQUESTS_SENT);
	}
  });
}
function user_data_sentFrndRequests(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_DATA_SENTFRIENDREQUESTS', from_userId: AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end },
  function(response){
    console.log(response);
	 response=JSON.parse(response);
	 var content='';
	 if(response.length>0){
	 for(var index=0;index<response.length;index++){
	 var user_Id=response[index].user_Id;
	 var username=response[index].username;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var profile_pic=response[index].profile_pic;
	 var about_me=response[index].about_me;
	 var minlocation=response[index].minlocation;
	 var location=response[index].location;
	 var state=response[index].state;
	 var country=response[index].country;
	 var created_On=response[index].created_On;
	   content+='<div id="userSentFrndsReqDetails-'+user_Id+'" class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	    content+='<div class="row">';
	   content+='<div class="col-xs-12">';
	   content+='<i onclick="javascript:dismissWithdrawRequest(\''+user_Id+'\',\'userSentFrndsReqDetails-'+user_Id+'\',\'SENT_REQUEST\');" ';
	   content+='class="fa fa-close pull-right"></i>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7">';
	   content+='<h5 style="line-height:22px;"><b>'+surName+' '+name+'</b></h5>';
	   content+='<div>'+minlocation+', '+location+', '+state+', '+country+'</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	 }
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
	 
   });
}

</script>
</head>
<body>
<?php include_once 'templates/api/api_header_simple.php'; ?>
<!-- TOP MENU TAB ::: Start -->
<div class="list-group" style="margin-bottom:0px;">
 <div class="list-group-item">
   <div class="container-fluid pad0">
    <div class="row">
		<div align="center" class="col-xs-6">
			<span id="menuTab_frndRequests" class="pad10 curpoint" onclick="javascript:sel_topMenuTab(this.id);">
			    <b>Friend Requests</b>
			</span>
		</div><!-- col-xs-6 -->
		<div align="center" class="col-xs-6">
			<span id="menuTab_myfriends" class="pad10 curpoint" onclick="javascript:sel_topMenuTab(this.id);">
			  <b>Friends</b>
		    </span>
		</div><!-- col-xs-6 -->
	</div><!-- row -->
  </div><!-- container-fluid -->
 </div><!-- list-group-item -->
</div><!-- list-group -->
<!-- TOP MENU TAB ::: End -->
<!-- TOP MENU CONTENT ::: Start -->
<div id="menuContent_frndRequests" class="hide-block">
 <div class="row">
  <div class="col-xs-12">
  <!-- Start -->
  <div class="list-group" style="margin-bottom:0px;">
<div class="list-group-item pad0">
  <div class="container-fluid pad0">
    <div id="usrFrndSubMenu_recievedRequests" align="center" class="col-xs-6" style="margin-top:10px;" onclick="javascript:subMenu_userFriendRequests(this.id);">
	  <div style="margin-bottom:10px;"><b>Recieved Requests</b></div>
	</div>
	<div id="usrFrndSubMenu_sentRequests" align="center" class="col-xs-6" style="margin-top:10px;" onclick="javascript:subMenu_userFriendRequests(this.id);">
	  <div style="margin-bottom:10px;"><b>Sent Requests</b></div>
	</div>
  </div>
</div>
</div>
<div id="usrFrndSubMenu_recievedRequests_content" class="hide-block">
<div class="alert alert-warning">
  <strong>Note!</strong> Once you Decline / Delete the Recieved Request, the Request will be deleted 
  and not shown to the User Sent under "Sent Request Tab".</a>.
</div>
<div id="loadUserRecievedRequestsCount" class="mbot10p"></div>
<div id="loadUserRecievedRequests0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>
<div id="usrFrndSubMenu_sentRequests_content" class="hide-block">
<div class="alert alert-warning">
  <strong>Note!</strong> Once the Request Reciever deletes the Request you sent / You withdraw your Request, 
  then it is permanently deleted and will not be available to you.</a>.
</div>
<div id="loadUserSentRequestsCount" class="mbot10p col-xs-12"></div>
<div id="loadUserSentRequests0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>
</div>
  <!-- End -->
  </div>
 </div>
</div>
<div id="menuContent_myfriends" class="container-fluid mtop15p hide-block">
 <div id="loadUserFriendsCount" class="mbot10p"></div>
   <div id="loadUserFriends0">
     <div align="center" class="mtop15p">
       <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
     </div>
   </div>
</div>
<!-- TOP MENU CONTENT ::: End-->
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>