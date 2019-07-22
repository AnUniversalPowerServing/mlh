<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.authentication.php';
require_once '../lal/logic.appIdentity.php';
require_once '../util/util.mobile.sms.php';

$logger=Logger::getLogger("controller.module.app.user.authentication.php");

if(isset($_GET["action"])){

  /* Action Events used By auth-part-01.php/auth-part-01.js ::: START */
  if($_GET["action"]==='VALIDATE_MOBILE_OTP'){
    if(isset($_GET["projectURL"]) && isset($_GET["OTPCode"]) && isset($_GET["msisdn"])){
	  $projectURL=$_GET["projectURL"];
	  $msisdn=str_replace("+","",$_GET["msisdn"]);
	  $otpcode=$_GET["OTPCode"];
	  $smsObj=new MobileSMS();
	  echo $smsObj->sendMobileOTP($projectURL,$otpcode,$msisdn);
	} else {
	   $content='Missing';
	   if(!isset($_GET["projectURL"])){ $content.=' ProjectURL,'; }
	   if(!isset($_GET["OTPCode"])){ $content.=' OTPCode,'; }
	   if(!isset($_GET["msisdn"])){ $content.=' msisdn,'; }
	   $content=chop($content,',');
	   echo $content;
	}
  }
  else if($_GET["action"]==='MOBILE_SMS_BALANCE'){
     $smsObj=new MobileSMS();
	 $content=$smsObj->getMobileSMSBalance();
	 echo $content;
  }
  /* Action Events used By auth-part-01.php/auth-part-01.js ::: END */
 
  /* Action Events used By auth-part-02.php/auth-part-02.js ::: START */
  else if($_GET["action"]=='USERINFO_BY_PHONENUMBER'){
    if(isset($_GET["countrycode"])){
	 if(isset($_GET["phoneNumber"])){
	   $countrycode=$_GET["countrycode"];
       $phoneNumber=$_GET["phoneNumber"];
       $authObj=new user_authentication();
	   $query=$authObj->query_getuserInfoByPhoneNumber($countrycode,$phoneNumber);
	   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	   echo $dbObj->getJSONData($query);
	  } else { echo 'MISSING_PHONENUMBER'; }
    } else { echo 'MISSING_COUNTRYCODE'; }
  }
  else if($_GET["action"]=='CHECK_USERNAME_AVAILABILITY'){
   if(isset($_GET["user_Id"])){
     if(isset($_GET["username"])){
	    $user_Id=$_GET["user_Id"];
		$username=$_GET["username"];
		/* Condition :
		 *  1) Get userId and username for Previously existing Account: 
         *     If username exists for other than this userId, Say not allowed.
         *     else Allowed.
         *  2) If userId=0, check username exists or not for all rows
         */
		 $authpObj=new user_authentication();
		 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		 if($user_Id=='0'){ /* check username exists or not for all rows */
		    $query=$authpObj->query_checkUsernameAvailability($username);
			$jsonData=$dbObj->getJSONData($query);
			$dejsonData=json_decode($jsonData);
			if(count($dejsonData)>0){
			   echo 'USERNAME_ALREADY_EXISTS';
			} else { echo 'USERNAME_NOT_EXISTS'; }
		 } else {
		    $query=$authpObj->query_checkUsernameAvailabilityExceptcurrentUserId($user_Id,$username);
			$jsonData=$dbObj->getJSONData($query);
			$dejsonData=json_decode($jsonData);
			if(count($dejsonData)>0){
			   echo 'USERNAME_ALREADY_EXISTS';
			} else { echo 'USERNAME_NOT_EXISTS'; }
		 }
	 } else { echo 'MISSING_USERNAME'; }
   } else { echo 'MISSING_USER_ID'; }
  }
  /* Action Events used By auth-part-02.php/auth-part-02.js ::: END */
  
  /* No Action Events used By auth-part-03.php/auth-part-03.js */
  
  /* Action Events used By auth-part-04.php/auth-part-04.js, auth-part-05.php/auth-part-05.js, ::: START */
  else if($_GET["action"]==='UPDATE_EXISTING_USERACCOUNT') {
    $usrauthObj=new user_authentication();
    $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   
    if(isset($_GET["user_Id"])){
	   $user_Id=$_GET["user_Id"]; 
	   $username='';        
	   if(isset($_GET["username"])) { $username=$_GET["username"];$_SESSION["AUTH_USER_USERNAME"]=$username; }
	   $surName='';         
	   if(isset($_GET["surName"])) { $surName=$_GET["surName"];$_SESSION["AUTH_USER_SURNAME"]=$surName; }
	   $name='';            
	   if(isset($_GET["name"])) { $name=$_GET["name"];$_SESSION["AUTH_USER_FULLNAME"]=$name;}
	   $dob='';  		    
	   if(isset($_GET["dob"])) {  $dob=$_GET["dob"];$_SESSION["AUTH_USER_DOB"]=$dob; }
	   $gender=''; 			
	   if(isset($_GET["gender"])) { $gender=$_GET["gender"];$_SESSION["AUTH_USER_GENDER"]=$gender;  }
	   $profile_pic='';     
	   if(isset($_GET["profile_pic"])) { $profile_pic=$_GET["profile_pic"];$_SESSION["AUTH_USER_PROFILEPIC"]=$profile_pic; }
	   $about_me='';	    
	   if(isset($_GET["about_me"])) { $about_me=$_GET["about_me"];$_SESSION["AUTH_USER_ABOUTME"]=$about_me; }
	   $minlocation='';     
	   if(isset($_GET["minlocation"])) { $minlocation=$_GET["minlocation"];  $_SESSION["AUTH_USER_LOCALITY"]=$minlocation; }
	   $location='';  		
	   if(isset($_GET["location"])) { $location=$_GET["location"]; $_SESSION["AUTH_USER_LOCATION"]=$location; }
	   $state='';  			
	   if(isset($_GET["state"])) { $state=$_GET["state"]; $_SESSION["AUTH_USER_STATE"]=$state;  }
	   $country='';  	    
	   if(isset($_GET["country"])) { $country=$_GET["country"]; $_SESSION["AUTH_USER_COUNTRY"]=$country; }
       $user_tz='';  	    
	   if(isset($_GET["user_tz"])) { $user_tz=$_GET["user_tz"]; $_SESSION["AUTH_USER_TIMEZONE"]=$user_tz;  }
	   $acc_active='';		if(isset($_GET["acc_active"])) { $acc_active=$_GET["acc_active"]; }
 
	  
	   $updateQuery01=$usrauthObj->query_updateUserInfo($user_Id,$username,$surName,$name,
							    $dob,$gender,$profile_pic,$about_me,$minlocation,$location,$state,$country,
								$user_tz,$acc_active);
	   $status01 = $dbObj->addupdateData($updateQuery01);
	   $logger->info("status01: ".$status01);
	   if(isset($_GET["allPhoneNumbers"])){
	   $phoneNumbersdeJSON = json_decode($_GET["allPhoneNumbers"]);
	   if(count($phoneNumbersdeJSON)>0){
	     for($i01=0;$i01<count($phoneNumbersdeJSON);$i01++){
		  $initialData = $phoneNumbersdeJSON[$i01]->{'initial'};
	      $changedData = $phoneNumbersdeJSON[$i01]->{'changed'};
		  
		  $initial_mcountrycode = $initialData->{'mcountrycode'};
		  $initial_mobile = $initialData->{'mobile'};
		  $changed_mcountrycode = $changedData->{'mcountrycode'};
		  $changed_mobile = $changedData->{'mobile'};
		  $_SESSION["AUTH_USER_CURPHONENUMBER"]='[{"mcountrycode":"'.$changed_mcountrycode.'","mobile":"'.$changed_mobile.'"}]';
		  $_SESSION["AUTH_USER_PHONENUMBERS"]='[{"mcountrycode":"'.$changed_mcountrycode.'","mobile":"'.$changed_mobile.'"}]';
		  $updateQuery02=$usrauthObj->query_updateUserContactInfo($user_Id,$initial_mcountrycode,$initial_mobile,
								$changed_mcountrycode,$changed_mobile);
		  $status02 = $dbObj->addupdateData($updateQuery02);
		  echo $status02;
		  $logger->info("status01: ".$status02);
	     }
	   }
	   }
	} else { echo 'MISSING_USERID';  }
 }
  /* Action Events used By auth-part-04.php/auth-part-04.js, auth-part-05.php/auth-part-05.js, ::: END */
 
  /* Action Events used By auth-part-05.php/auth-part-05.js ::: START */
  else if($_GET["action"]==='ADD_NEW_USERACCOUNT'){
  if(isset($_GET["username"]) && isset($_GET["surName"]) && isset($_GET["name"]) && isset($_GET["dob"]) && 
     isset($_GET["gender"]) && isset($_GET["profile_pic"]) && isset($_GET["minlocation"]) &&  isset($_GET["location"]) && 
	 isset($_GET["state"]) && isset($_GET["country"]) && isset($_GET["user_tz"])){
	$idObj=new Identity();
	$usrauthObj=new user_authentication();
	$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$contact_Id=$idObj->user_contacts_id();
	$user_Id=$idObj->user_account_id();    
	$username=$_GET["username"];       
	$surName=$_GET["surName"];
	$name=$_GET["name"];   
	$mob_val='Y';                  
	$dob=$_GET["dob"];                  
	$gender=$_GET["gender"];
	$profile_pic=$_GET["profile_pic"];    
	$about_me='';
	$minlocation=$_GET["minlocation"];    
	$location=$_GET["location"];
	$state=$_GET["state"];        
	$country=$_GET["country"];    
	$created_On=date('Y-m-d H:i:s');
	$isAdmin='N';     
	$user_tz=$_GET["user_tz"];     
	$acc_active='Y';   
	
	$addQuery=$usrauthObj->query_addNewUser($contact_Id,$user_Id,$username,$surName,$name,$mcountrycode,$mobile,$mob_val,
			                       $dob,$gender,$profile_pic,$about_me,$minlocation,$location,$state,$country,$created_On,
								   $isAdmin,$user_tz,$acc_active);
	$logger->info("addQuery: ".$addQuery);
    $status=$dbObj->addupdateData($addQuery);
	$logger->info("addQueryStatus: ".$status);
	if($status=='SUCCESS') {
	  $_SESSION["AUTH_USER_ID"]=$user_Id; /* Session: */ 
	}
   } else {
		    $content='MISSING ';
			if(!isset($_GET["username"])) { $content.='USERNAME, '; }
			if(!isset($_GET["surName"])) { $content.='SURNAME, '; }
			if(!isset($_GET["fullName"])) { $content.='FULLNAME, '; }
			if(!isset($_GET["dob"])) {  $content.='DATEOFBIRTH, ';  }
			if(!isset($_GET["gender"])) { $content.='GENDER, '; }
			if(!isset($_GET["user_profilepic"])) { $content.='PROFILEPIC, '; }
			if(!isset($_GET["user_locality"])) { $content.='LOCALITY, '; }
			if(!isset($_GET["user_location"])) { $content.='LOCATION, '; }
			if(!isset($_GET["user_state"])) { $content.='STATE, '; }
			if(!isset($_GET["user_country"])) { $content.='COUNTRY, '; }
			if(!isset($_GET["user_tz"])) { $content.='TIMESTAMP, ';  }
			$content=chop($content,", ");
			echo $content;
   }
		  
 } 
  /* Action Events used By auth-part-05.php/auth-part-05.js ::: END */
  
  /* Action "GET_USERACCOUNT_PROFILE" is used in app-user-profile to display Data */
  /* Start: */
  else if($_GET["action"]==='GET_USERACCOUNT_PROFILE'){
    if(isset($_GET["profile_user_Id"]) && isset($_GET["user_Id"]) ){
	 $profile_user_Id=$_GET["profile_user_Id"];
	 $user_Id=$_GET["user_Id"];
	 $userAuthObj = new user_authentication();
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $query = $userAuthObj->query_getUserInfoByUserId($profile_user_Id,$user_Id);
	 $jsonData=$dbObj->getJSONData($query);
	 echo $jsonData;
	} 
	else { echo 'MISSING_USERID'; }
  }
  /* End: */
  
  else if($_GET["action"]==='GET_USER_GEOLOCATION'){
    if(isset($_GET["user_Id"])){
	  $user_Id=$_GET["user_Id"];
	  $authObj = new user_authentication();
	  $query=$authObj->query_getUserGeoLocation($user_Id);
	  $dbObj = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData=$dbObj->getJSONData($query);
	  echo $jsonData;
	} else { echo 'MISSING_USER_ID'; } 
  }
  
  /* Action Events used by Admin DashBoard ::: START */
  else if($_GET["action"]==='GET_COUNT_USERIDLIST'){
    $authObj = new user_authentication();
	$query = $authObj->query_count_getUserIdList();
	$dbObj = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$jsonData = $dbObj->getJSONData($query);
	$dejsonData=json_decode($jsonData);
	echo $dejsonData[0]->{'count(*)'};
  }
  else if($_GET["action"]==='GET_DATA_USERIDLIST'){
   if(isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
    $limit_start = $_GET["limit_start"];
	$limit_end = $_GET["limit_end"];
    $authObj = new user_authentication();
	$query = $authObj->query_data_getUserIdList($limit_start,$limit_end);
	$dbObj = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	echo $dbObj->getJSONData($query);
   }
  }
  else if($_GET["action"]==='GET_DATA_USERINFORMATION'){
    if(isset($_GET["user_Id"])){
	  $user_Id=$_GET["user_Id"];
	  $authObj = new user_authentication();
	  $query=$authObj->query_getUserAccountInformation($user_Id);
	  $dbObj = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->getJSONData($query);
	} else {  echo 'MISSING_USER_ID'; }
  }
  /* Action Events used by Admin DashBoard ::: END */

  /* Action Events used by Edit User Profile ::: START */
  else if($_GET["action"]==='VALIDATE_USER_PHONENUMBER'){
   if(isset($_GET["mcountrycode"]) && isset($_GET["mobile"])){
      $mcountrycode=$_GET["mcountrycode"];
	  $mobile=$_GET["mobile"];
	  $authObj = new user_authentication();
	  $query=$authObj->query_validate_userPhoneNumber($mcountrycode,$mobile);
	  $dbObj = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData = $dbObj->getJSONData($query);
	  $dejsonData = json_decode($jsonData);
	  if(intval($dejsonData[0]->{'count(*)'})==0){
	    echo 'PHONENUMBER_NOT_EXIST';
	  } else {
	     echo 'PHONENUMBER_EXIST';
	  }
   } else {
       $content='Missing';
	   if(isset($_GET["mcountrycode"])){ $content.=' mcountrycode,'; }
	   if(isset($_GET["mobile"])){ $content.=' mobile,'; }
	   $content=chop($content,',');
	   echo $content;
   }
  }
  /* Action Events used by Edit User Profile ::: END */
  
  /* ALL MEMBERS SELECTIONS */
  else if($_GET["action"]==='GET_AUTOCOMPLETE_USERS'){
    if(isset($_GET["searchTerm"])){
	 $searchTerm=$_GET["searchTerm"];
	 $userAuthenticationObj = new user_authentication();
	 $query = $userAuthenticationObj->query_autoComplete_getAllUsers($searchTerm);
	 $dbObj = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $dbObj->getJSONData($query);
	} else { echo 'Missing searchTerm'; }
    
  }
  else { echo 'NO_ACTION'; }
} 
else { echo 'MISSING_ACTION'; }
?>