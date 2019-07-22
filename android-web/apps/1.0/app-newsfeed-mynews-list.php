<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>My News</title>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-news-bg-styles.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_mystuff");
bgstyle(3);
$(".lang_"+USR_LANG).css('display','block');
load_topMenu_published("mynewslist-id-published");
goBackSetURL(PROJECT_URL+'app/mystuff');
});
function sel_topMenu_myNewsList(id){
 var arry_id = ["mynewslist-id-published","mynewslist-id-pending","mynewslist-id-requests"];
 var arry_content = ["mynewslist-content-published","mynewslist-content-pending","mynewslist-content-requests"];
 for(var index=0;index<arry_id.length;index++){
  if(arry_id[index]===id){
    if(!$('#'+arry_id[index]).hasClass('custom-font')){ 
		$('#'+arry_id[index]).addClass('custom-font'); 
	}
	if(!$('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){
		$('#'+arry_id[index]).addClass('custom-bg-solid2pxbottomborder');
	}
	if($('#'+arry_content[index]).hasClass('hide-block')){
	   $('#'+arry_content[index]).removeClass('hide-block');
	}
    $('#'+arry_id[index]).css('color',CURRENT_DARK_COLOR);
	$('#'+arry_id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	
  } else {
    if($('#'+arry_id[index]).hasClass('custom-font')){ 
	   $('#'+arry_id[index]).removeClass('custom-font'); 
	}
	if($('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){ 
	   $('#'+arry_id[index]).removeClass('custom-bg-solid2pxbottomborder'); 
	}
	if(!$('#'+arry_content[index]).hasClass('hide-block')){
	   $('#'+arry_content[index]).addClass('hide-block');
	}
    $('#'+arry_id[index]).css('color','#000');
	$('#'+arry_id[index]).css('border-bottom','0px');
  }
 }
}
function load_topMenu_published(id){
 sel_topMenu_myNewsList(id);
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_COUNT_MYPUBLISHEDNEWS', user_Id:AUTH_USER_ID },function(total_data){ 
	 total_data = parseInt(total_data);
	 if(total_data>0){
	    scroll_loadInitializer('mynewslist-news-published',10,load_topMenu_publishedcontentData,total_data);
	 } else {
	   var content='<div align="center" style="color:#aaa;">';
		   content+='No News has been published by you.';
		   content+='</div>';
	   document.getElementById("mynewslist-news-published0").innerHTML=content;   
	 }
   console.log(total_data); 
   
 });
}
function load_topMenu_publishedcontentData(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_DATA_MYPUBLISHEDNEWS', user_Id:AUTH_USER_ID, limit_start: limit_start,limit_end:limit_end },
 function(response){ 
  var content='';
  response = JSON.parse(response);
  for(var index=0;index<response.length;index++){
   var info_Id = response[index].info_Id;
   var artTitle = decodeURI(response[index].artTitle);
   var artShrtDesc = decodeURI(response[index].artShrtDesc);
   var images = response[index].images;
   var status = response[index].status;
   var publishedAt = response[index].publishedAt;
   content+=display_News_simple(info_Id,artTitle,artShrtDesc,images,status,publishedAt);
  }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;  	
 });
}
function load_topMenu_pending(id){
 sel_topMenu_myNewsList(id);
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_COUNT_MYPENDINGNEWS', user_Id:AUTH_USER_ID },function(total_data){ 
	 total_data = parseInt(total_data);
	 if(total_data>0){
	    scroll_loadInitializer('mynewslist-news-pending',10,load_topMenu_pendingcontentData,total_data);
	 } else {
	   var content='<div align="center" style="color:#aaa;">';
		   content+='No News is pending to publish.';
		   content+='</div>';
	   document.getElementById("mynewslist-news-pending0").innerHTML=content;   
	 }
   console.log(total_data);   
 });
}
function load_topMenu_pendingcontentData(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_DATA_MYPENDINGNEWS', user_Id:AUTH_USER_ID, limit_start: limit_start,limit_end:limit_end },
 function(response){ 
  var content='';
  response = JSON.parse(response);
  for(var index=0;index<response.length;index++){
   var info_Id = response[index].info_Id;
   var artTitle = decodeURI(response[index].artTitle);
   var artShrtDesc = decodeURI(response[index].artShrtDesc);
   var images = response[index].images;
   var status = response[index].status;
   var createdOn = response[index].createdOn;
   content+=display_News_simple(info_Id,artTitle,artShrtDesc,images,status,createdOn);
  }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;  	
 });
}
function load_topMenu_requests(id){
  sel_topMenu_myNewsList(id);
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_COUNT_OTHERSREQUESTSNEWS', user_Id:AUTH_USER_ID },function(total_data){ 
	 total_data = parseInt(total_data);
	 if(total_data>0){
	    scroll_loadInitializer('mynewslist-news-requests',10,load_topMenu_requestscontentData,total_data);
	 } else {
	   var content='<div align="center" style="color:#aaa;">';
		   content+='No News exists to approve by you.';
		   content+='</div>';
	   document.getElementById("mynewslist-news-requests0").innerHTML=content;   
	 }
   console.log(total_data);   
 });
}
function load_topMenu_requestscontentData(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_DATA_OTHERSREQUESTSNEWS', user_Id:AUTH_USER_ID, limit_start: limit_start,limit_end:limit_end },
 function(response){ 
  var content='';
  response = JSON.parse(response);
  for(var index=0;index<response.length;index++){
   var info_Id = response[index].info_Id;
   var artTitle = decodeURI(response[index].artTitle);
   var artShrtDesc = decodeURI(response[index].artShrtDesc);
   var images = response[index].images;
   var status = response[index].status;
   var createdOn = response[index].createdOn;
   var rshare_Id  = response[index].rshare_Id;
   var union_Id = response[index].union_Id;
   var branch_Id = response[index].branch_Id;
   var view_members = response[index].view_members;
   var view_subscribers = response[index].view_subscribers;
   content+=display_News_approve(info_Id,artTitle,artShrtDesc,images,status,createdOn,
				rshare_Id,union_Id,branch_Id,view_members,view_subscribers);
  }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;  	
 });
}

function display_News_simple(info_Id,artTitle,artShrtDesc,images,status,createdOrpublishOn){
 var content='<a class="a-custom" href="'+PROJECT_URL+'newsfeed/news/'+info_Id+'">';
     content+='<div class="list-group">';
	 content+='<div class="list-group-item pad0">';
	 content+='<div class="container-fluid mtop15p mbot15p">';
	 content+='<div class="row">';
	 content+='<div class="col-xs-12">';
	 content+='<img style="width:100%;height:auto;" src="'+images+'"/>';
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="row">';
	 content+='<div class="col-xs-12">';
	 content+='<h5 align="justify" style="line-height:22px;"><b>'+artTitle+'</b></h5>';
	 content+='</div>';
	 content+='<div class="col-xs-12" style="color:#aaa;">'+artShrtDesc.substring(0,140)+' ...</div>';
	 content+='<div align="right" class="col-xs-12">';
	 content+='<hr style="border-top: 1px solid #ccc;"/>';
	 content+='<span style="color:#000;"><b>News created on</b></span><br/>';
	 content+='<h5 style="color:#aaa;">'+get_stdDateTimeFormat01(createdOrpublishOn)+'</h5>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</a>';
  return content;
}

function display_News_approve(info_Id,artTitle,artShrtDesc,images,status,createdOn,
		rshare_Id,union_Id,branch_Id,view_members,view_subscribers){
 var content='<div id="newsfeed-approve-'+info_Id+'" class="list-group">';
	 content+='<a class="a-custom" href="'+PROJECT_URL+'newsfeed/news/'+info_Id+'">';
	 content+='<div class="list-group-item pad0">';
	 content+='<div class="container-fluid mtop15p mbot15p">';
	 content+='<div class="row">';
	 content+='<div class="col-xs-12">';
	 content+='<img style="width:100%;height:auto;" src="'+images+'"/>';
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="row">';
	 content+='<div class="col-xs-12">';
	 content+='<h5 align="justify" style="line-height:22px;"><b>'+artTitle+'</b></h5>';
	 content+='</div>';
	 content+='<div class="col-xs-12" style="color:#aaa;">'+artShrtDesc.substring(0,140)+' ...</div>';
	 content+='<div align="right" class="col-xs-12">';
	 content+='<hr style="border-top: 1px solid #ccc;"/>';
	 content+='<span style="color:#000;"><b>News created on</b></span><br/>';
	 content+='<h5 style="color:#aaa;">'+get_stdDateTimeFormat01(createdOn)+'</h5>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</a>';
	 content+='<div class="list-group-item pad0">';
	 content+='<button class="btn custom-bg form-control" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;"';
	 content+='onclick="javascript:approve_newsToPublish(\''+rshare_Id+'\',\''+info_Id+'\',\''+union_Id+'\'';
	 content+=',\''+branch_Id+'\',\''+view_members+'\',\''+view_subscribers+'\');">';
	 content+='<b>Approve News to publish</b></button>';
	 content+='</div>';
	 content+='</div>';
	 
  return content;
}
function approve_newsToPublish(rshare_Id,info_Id,union_Id,branch_Id,view_members,view_subscribers){
 $("#newsfeed-approve-"+info_Id).hide(1000);
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
 { action:'APPROVE_NEWS_TO_PUBLISH', rshare_Id: rshare_Id, info_Id:info_Id, union_Id:union_Id, branch_Id: branch_Id,
   view_members:view_members, view_subscribers:view_subscribers, user_Id:AUTH_USER_ID },function(response){
    console.log(response);
 });
}
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div style="position:fixed;bottom:25px;right:25px;z-index:100;">
  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/create-newsfeed">
  <i class="fa fa-plus custom-bg" aria-hidden="true" style="padding:10px;border-radius:50%;"></i>
  </a>
 </div>
 <div id="wrapper" class="toggled">
  <!-- Core Skeleton : Side and Top Menu -->
  <div id="sidebar-wrapper">
	<?php include_once 'templates/api/api_sidewrapper.php'; ?>
  </div>
  <div id="page-content-wrapper">
	<?php include_once 'templates/api/api_header_simple.php'; ?>
	<div class="list-group">
	  <div align="center" class="list-group-item custom-lgt-bg">
		<b>MY NEWS</b>
	  </div>
<script type="text/javascript">

// mynewslist-news-published
</script>
	  <div align="center" class="list-group-item">
		<div class="container-fluid">
		 <div class="row">
		   <div class="col-xs-4">
		      <span id="mynewslist-id-published" class="pad10 fs12" onclick="javascript:load_topMenu_published(this.id);">
			    <b>Published</b>
			  </span>
		   </div>
		   <div class="col-xs-4">
		     <span id="mynewslist-id-pending" class="pad10 fs12" onclick="javascript:load_topMenu_pending(this.id);">
				<b>Pending</b>
			 </span>
		   </div>
		   <div class="col-xs-4">
		     <span id="mynewslist-id-requests" class="pad10 fs12" onclick="javascript:load_topMenu_requests(this.id);">
				<b>Requests</b>
			 </span>
		   </div>
		 </div>
		</div>
	  </div>
	</div>
	
	<div id="app-page-content">
	  <div id="mynewslist-content-published" class="hide-block">
		<div class="container-fluid">
		 <div class="row">
		  <div id="mynewslist-news-published0" class="col-xs-12">
		    <div align="center">
		      <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		  </div>
		 </div>
		</div>
      </div>
	  <div id="mynewslist-content-pending" class="hide-block">
		<div class="container-fluid">
		 <div class="row">
		  <div id="mynewslist-news-pending0" class="col-xs-12">
		    <div align="center">
		      <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		  </div>
		 </div>
		</div>
      </div>
	  <div id="mynewslist-content-requests" class="hide-block">
	    <div class="container-fluid">
		 <div class="row">
		  <div id="mynewslist-news-requests0" class="col-xs-12">
		    <div align="center">
		      <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		  </div>
		 </div>
		</div>
	  </div>
	</div>
  </div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>