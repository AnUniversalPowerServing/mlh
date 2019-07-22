<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
.mtop5p { margin-top:5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
.mtop35p { margin-top:35px; }
.hide-block { display:none; }
.font-red { color:red; }
code{ font-weight:bold; }
hr { margin-bottom:10px; }
</style>
</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12">

<div class="list-group mtop15p"><!-- list-group -->
<div class="list-group-item" 
data-toggle="collapse" 
data-target="#html_appdefault_req"><!-- list-group-item -->
<b>app-default.html</b>&nbsp;<i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>
</div>

<div id="html_appdefault_req" class="collapse">
<div class="list-group-item">
<div>
 On Document Ready, 
 <ol>
 <li>Load progressbar</li>
 <li>After 3 seconds load following:
 <ol>
 <li>If <code>SESSION["AUTH_USER_ID"]</code> is not set, 
 load <code>"DEFAULT"</code>(<code>http://&lt;PROJECT_DOMAIN&gt;/</code>) in Webscreen.
 </li>
 <li>If <code>SESSION["AUTH_USER_ID"]</code> is set, 
 load Homepage (<code>http://&lt;PROJECT_DOMAIN&gt;/ 
 &lt;VERSION_NUMBER&gt;/newsfeed/ latest-news</code>) in 
 Webscreen.
 </li>
 </ol>
 </li>
 </ol>
 </div>
 </div><!-- list-group-item -->
 </div><!-- collapse -->
 </div><!-- list-group -->

</div>
</div>
</div>


<div class="container-fluid">
<div class="row">
<div align="center" class="col-xs-12">
<h5><b>Android Core</b></h5>
</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->

<div class="container-fluid">
<div class="row">
<div class="col-xs-12" 
data-toggle="collapse" 
data-target="#androidInitializerScreen-req">

<h5><i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>&nbsp; 
<b>AndroidInitializerScreen (Activity)</b></h5><hr/>
</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->

<div id="androidInitializerScreen-req" class="collapse">

<div class="container-fluid">
<div class="row">
<div class="col-xs-12">

<div class="list-group">
<div class="list-group-item" 
data-toggle="collapse" 
data-target="#androidInitializerScreen-mainthread-req">
<b>Main Thread</b>
<i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>
</div>

<div id="androidInitializerScreen-mainthread-req" 
class="collapse">
<div class="list-group-item pad0">

<div class="container-fluid">

<div class="row">
<div class="col-xs-12">
<h5><b>Background</b></h5>
</div>
</div>

<div class="row">
<div class="col-xs-12">
<ol>
<li>
Set session value <code>SESSION["ANDROID_CURRENT_ACTIVITY"] = 
"ANDROIDINITIALIZERSCREEN"</code>
</li>
<li>
When App is installed for the first time, 
it sets <code>APP_INSTALL_TS=&lt;current_timestamp&gt;</code> in 
Android Preferences, if it is not set before.
</li>
<li>
If <code>SESSION["AUTH_USER_ID"]</code> is not set, trigger a <i>SignIn/Register 
Notification</i>.
</li>

</ol>
</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->

<div class="container-fluid">
<div class="row">
<div class="col-xs-12">
<h5><b>Foreground (Web)</b></h5>
</div><!-- col-xs-12 -->
</div><!-- row -->
<div class="row">
<div class="col-xs-12">
<ol>
<li>By default, it redirects to
 Page (<code>app-default.html</code>)
 
 </li>
</ol>
</div><!-- col-xs-12 -->
</div><!-- row -->

<div class="row">
<div class="col-xs-12">
<h5><b>OnActivityDestroy</b></h5>
</div>
<div class="col-xs-12">
<ol>
<li>
Set session value <code>SESSION["ANDROID_CURRENT_ACTIVITY"] = "NO_ACTIVITY"</code>
</li>
</ol>
</div>
</div>
</div><!-- container-fluid -->

</div><!-- list-group-item -->
</div><!-- collapse -->
</div><!-- list-group -->

</div>
</div>
</div>

</div><!-- collapse -->

<div class="container-fluid">
<div class="row">
<div class="col-xs-12" 
data-toggle="collapse" 
data-target="#androidWebScreen-req">
<h5><i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>&nbsp;
<b>AndroidWebScreen (Activity)</b></h5><hr/>
</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->


<div id="androidWebScreen-req" class="collapse">

<div class="container-fluid">
<div class="row">
<div class="col-xs-12">

<div class="list-group">
<div class="list-group-item"
data-toggle="collapse" 
data-target="#androidWebScreen-mainthread-req">
<b>Main Thread</b>
<i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>
</div>

<div id="androidWebScreen-mainthread-req" class="collapse">
<div class="list-group-item pad0">

<div class="container-fluid">

<div class="row">
<div class="col-xs-12">
<h5><b>Background</b></h5>
</div><!-- col-xs-12 -->
</div><!-- row -->

<div class="row">
<div class="col-xs-12">
<ol>
<li>Set Session value <code>SESSION["ANDROID_CURRENT_ACTIVITY"] = "ANDROIDWEBSCREEN"</code></li>
<li>If Permissions exists, 
<ol>
<li>Checks <code>mylocalhook</code> 
folder exists in Internal Memory or
 not.<br/>
If not exists, creates folder.
</li>
<li>
Checks <code>project.properties</code> in 
<code>mylocalhook</code> folder exists in 
Internal Memory.<br/>
If not exists, creates file with 
following property parameters:
<ul>
<li><code>PROJECT_URL</code></li>
</ul>
</li>
<li>Reads the properties File
 (<code>INTERNAL_MEMORY_PATH/ 
 mylocalhook/project.properties</code>) 
 and sets the property 
 file parameters in Session that starts with word 
 "<code>PROPERTY_</code>"</li>
</ol>
</li>
<li>Triggers a call to <code>StartupService</code></li>
</ol>
</div><!-- col-xs-12 -->
</div><!-- row -->

<div class="row">
<div class="col-xs-12">
<h5><b>Foreground</b></h5>
</div><!-- col-xs-12 -->
</div><!-- row -->

<div class="row">
<div class="col-xs-12">
<ol>
<li>By default, <code>directURL</code> is 
set to <code>file:///android_asset/www/app-default.html</code>
</li>
<li>
If permissions not exist, <code>directURL</code> is 
set to <code>file:///android_asset/www/app-permissions.html</code>.
<br/>
If permissions are set and 
intent-data-value is set with <code>URL</code>, 
<code>directURL</code> is set to intent-data-value's 
<code>URL</code>.
<br/>
If permissions are set and 
intent-data-value is set as <code>DEFAULT</code>, 
<code>directURL</code> is set to 
<code>PROPERTY_PROJECT_URL</code> 
parameter from properties File.
</li>
<li>page with url <code>directURL</code> is 
loading in Webview.</li>
</ol>
</div><!-- col-xs-12 -->
</div><!-- row -->


<div class="row">
<div class="col-xs-12">
<h5><b>OnActivityDestroy</b></h5>
</div>
<div class="col-xs-12">
<ol>
<li>
Set session value <code>SESSION["ANDROID_CURRENT_ACTIVITY"] = "NO_ACTIVITY"</code>
</li>
</ol>
</div>
</div>

</div><!-- container-fluid -->

</div><!-- list-group-item -->
</div><!-- collapse -->
</div><!-- list-group -->

</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->

</div><!-- collapse -->

<div class="container-fluid">
<div class="row">
<div class="col-xs-12" 
data-toggle="collapse" 
data-target="#startupService-req">
<h5><i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>&nbsp;
<b>StartupService (Broadcast Receiver)</b></h5><hr/>
</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->


<div id="startupService-req" class="collapse">
<div class="container-fluid">
<div class="row">
<div class="col-xs-12">

<div class="list-group">

<div class="list-group-item" 
data-toggle="collapse" 
data-target="#startupService-mainthread-req">
<b>Main Thread</b>
<i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>
</div>

<div id="startupService-mainthread-req" class="collapse">
<div class="list-group-item pad0">

<div class="container-fluid mtop15p mbot15p">
<div class="row">
<div class="col-xs-12">
<b>Background</b><br/>
<b>Foreground</b><br/>
</div>
</div>
</div>

</div>
</div>


</div>

</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->
</div><!-- collapse -->


</body>
</html>