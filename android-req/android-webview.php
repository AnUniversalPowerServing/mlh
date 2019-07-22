<!DOCTYPE html>
<html lang="en">
<head>
  <title>Requirement Document</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
.pad0{ padding:0px; }
.pad10p { padding:10px; }
.mtop5p { margin-top:5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
.mtop35p { margin-top:35px; }
.mbot35p { margin-bottom:35px; }
.hide-block { display:none; }
.font-red { color:red; }
code{ font-weight:bold; }
hr { margin-bottom:10px; }
.lh22 { line-height: 22px; }
.curpoint { cursor:pointer; }
.bg-grey { background-color:#eee; }
.bg-lgtgrey { background-color:#f8f8f8; }
</style>
<script type="text/javascript">
$(document).ready(function(){
sel_reqMainMenu("reqMainMenu-androidWebview");
});
</script>
</head>
<body>
<?php include_once 'templates/api-header.php'; ?>
<div class="container-fluid">
 <div class="row mbot35p">
   <div class="col-md-12"><div align="center"><h5><b>ANDROID WEBVIEW</b></h5></div></div>
 </div>
</div>

<div class="container-fluid">
 <div class="row">
   <div class="col-md-4">
    <!-- Start -->
    <div class="container-fluid">
	  <div class="row">
	    <div class="col-md-12" data-toggle="collapse" data-target="#sidewrapper-req">
		  <h5><b>SIDEWRAPPER</b><i class="fa fa-angle-down pull-right" aria-hidden="true"></i></h5><hr/>
		</div>
	  </div>
	</div>
	<div id="sidewrapper-req" class="collapse">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-md-12">
		   <!-- Menu#1 ::: Start -->
		   <?php include_once 'templates/sidewrapper/menu01-search.php'; ?>
		   <!-- Menu#1 ::: End -->
		   <!-- Menu#2 ::: Start -->
		   <?php include_once 'templates/sidewrapper/menu02-newsfeed.php'; ?>
		   <!-- Menu#2 ::: End -->
		   <!-- Menu#3 ::: Start -->
		   <?php include_once 'templates/sidewrapper/menu03-mylocalhook.php'; ?>
		   <!-- Menu#3 ::: End -->
		   <!-- Menu#4 ::: Start -->
		   <?php include_once 'templates/sidewrapper/menu04-explore.php'; ?>
		   <!-- Menu#4 ::: End -->
		   <!-- Menu#5 ::: Start -->
		   <?php include_once 'templates/sidewrapper/menu05-mystuff.php'; ?>
		   <!-- Menu#5 ::: End -->
		</div>
	  </div>
	</div>
	</div>
	<!-- End -->
   </div>
   <div class="col-md-4">
   <!-- Buddy Hook -->
   
   <!-- Public Hook -->
   </div>
   <div class="col-md-4">
   
   </div>
 </div>
</div>

<!-- PROFESSIONAL COMMUNITY -->
<div class="container-fluid">
 <div class="row mbot35p">
   <div class="col-xs-12"><div align="center"><h5><b>PROFESSIONAL COMMUNITY</b></h5></div></div>
 </div>
 <div class="row">
  <div class="col-xs-4 pad0 curpoint">
	<!-- Start -->
	<div class="container-fluid">
     <div class="row">
       <div class="col-xs-12" data-toggle="collapse" data-target="#permInfo-req">
         <h5><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<b>VIEW PERMISSIONS</b></h5><hr/>
       </div>
     </div>
    </div><!-- container-fluid -->
	
	<div id="permInfo-req" class="collapse">
	  <?php include_once 'templates/community_professional/permissions-mem.php'; ?>
	</div>
	<!-- End -->
  </div><!-- col-xs-4 -->
  <div class="col-xs-4 pad0 curpoint">
    <!-- CreateMovement ::: Start -->
	<div class="container-fluid">
     <div class="row">
       <div class="col-xs-12" data-toggle="collapse" data-target="#createMovement-req">
         <h5><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<b>CREATE MOVEMENT</b></h5><hr/>
       </div>
     </div>
    </div><!-- container-fluid -->
	<div id="createMovement-req" class="collapse">
       <?php include_once 'templates/community_professional/movement-create.php'; ?>
	</div>
	<!-- CreateMovement ::: End -->
	<!-- Create Community ::: Start -->
	<div class="container-fluid">
	  <div class="row">
		<div class="col-xs-12" data-toggle="collapse" data-target="#createCommunity-req">
		  <h5><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>
		  &nbsp;&nbsp;&nbsp;<b>CREATE COMMUNITY</b></h5><hr/>
	    </div>
      </div>
	</div>
    <div id="createCommunity-req" class="collapse">
	  <?php include_once 'templates/community_professional/community-create.php'; ?>
	</div>
	<!-- Create Community ::: End -->
	<!-- Create Branch ::: Start -->
	<div class="container-fluid">
      <div class="row">
        <div class="col-xs-12" data-toggle="collapse" data-target="#createBranch-req">
          <h5><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<b>CREATE BRANCH</b></h5><hr/>
        </div>
      </div>
	</div>
	<div id="createBranch-req" class="collapse">
	  <?php include_once 'templates/community_professional/branch-create.php'; ?>
	</div><!-- container-fluid -->
    <!-- Create Branch ::: End -->
	<!-- Create NewsFeed ::: Start -->
	<div class="container-fluid">
	  <div class="row">
		<div class="col-xs-12" data-toggle="collapse" data-target="#createNewsFeed-req">
		  <h5><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<b>CREATE NEWSFEED</b></h5><hr/>
		</div>
	  </div>
	</div>
	
	<div id="createNewsFeed-req" class="collapse">
      <?php include_once 'templates/community_professional/newsfeed-create.php'; ?>
	</div><!-- collapse -->

	<!-- Create NewsFeed ::: End -->
  </div><!-- col-xs-4 -->
 </div><!-- row -->
</div><!-- container-fluid -->
</body>
</html>
