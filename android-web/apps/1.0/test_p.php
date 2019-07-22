<?php 
session_start();
include_once 'templates/api/api_params.php'; ?>
<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php include_once 'templates/api/api_js.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
var allPhoneNumbers = '[{"initial":{"mcountrycode":"+91","mobile":"9998884444"},'+
                       '"changed":{"mcountrycode":"+91","mobile":"9998884444"}}]';
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
 { action:'UPDATE_EXISTING_USERACCOUNT', user_Id :'', username: AUTH_USER_USERNAME, surName:AUTH_USER_SURNAME, 
 name: AUTH_USER_FULLNAME,
   allPhoneNumbers:allPhoneNumbers, dob: AUTH_USER_DOB, gender: AUTH_USER_GENDER, profile_pic: '', 
   minlocation: AUTH_USER_LOCALITY, location: AUTH_USER_LOCATION, state: AUTH_USER_STATE, country: AUTH_USER_COUNTRY, 
   user_tz: AUTH_USER_TIMEZONE },function(response){
	  console.log(response); 
 });
});
</script>
</head>
<body>

<div id="div1"><h2>jQuery AJAX test</h2></div>

<button>Get External Content</button>

</body>
</html>