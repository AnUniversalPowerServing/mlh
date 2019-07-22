<?php
$MW_URL = 'http://localhost/mlh/android-web/mw/';
$DAT_AUTH_MODULE_PATH = 'dat/auth/';

class AuthUserContacts {
 
 function cache_store_userContacts($phoneNumber,$user_Id){
   /* Approach#1: Get Number of Files in the Folder 
				  In Each Check File, check the Data with phoneNumber exists. 
				  If PhoneNumber exists, update Data 
				  If PhoneNumber not exists, Move to Next File 
				  At last File, check the size of the File
				  If beyond the Range Add Data 
				  Else create New File and Update the Data */
   /* Logical Code ::: START */
   /* Get Number of Files in the Folder */
   $ucFiles_count = count(glob($GLOBALS['DAT_AUTH_MODULE_PATH']."*.json"));
   for($fileIndex=0;$fileIndex<$ucFiles_count;$fileIndex++){
    $ucFiles_content = file_get_contents($GLOBALS['MW_URL'].$GLOBALS['DAT_AUTH_MODULE_PATH'].'uc_'.$fileIndex.'.json');
	$currentFile = $GLOBALS['DAT_AUTH_MODULE_PATH'].'uc_'.$fileIndex.'.json';
	$newFile = $GLOBALS['DAT_AUTH_MODULE_PATH'].'uc_'.$ucFiles_count.'.json';
	if(strlen($ucFiles_content)>0){
	$ucFiles_array = json_decode($ucFiles_content);
	print_r($ucFiles_array);
	
	/* In Each Check File, check the Data with phoneNumber exists.
	   If PhoneNumber exists, update Data
	 */
	
	if(isset($ucFiles_array->{$phoneNumber})){
	  if($ucFiles_array->{$phoneNumber}->{"user_Id"}!=$user_Id){
	    $ucFiles_array->{$phoneNumber}->{"user_Id"}=$user_Id;
		file_put_contents($currentFile,json_encode($ucFiles_array));
	  }
	  break;
	}
	/* If PhoneNumber not exists, Move to Next File */
	else { 
	/* At last File, check the size of the File */
	if($fileIndex==$ucFiles_count-1){
	 if(intval(filesize($currentFile))>1000000){ 
       /* Create New File and Add Data into it */
	   $file = fopen($newFile, "w+");
	   fclose($file);
	   $ucFiles_array->{$phoneNumber}=array("user_Id"=>$user_Id);
	   file_put_contents($newFile,json_encode($ucFiles_array));
	 }
	 else {
	   $ucFiles_array->{$phoneNumber}=array("user_Id"=>$user_Id);
	   file_put_contents($currentFile,json_encode($ucFiles_array));
	 }
	}
	}
	
   }
   else {
     $ucFiles_array=array();
	 $ucFiles_array[$phoneNumber]=array("user_Id"=>$user_Id);
	 file_put_contents($currentFile,json_encode($ucFiles_array));
	}
  }
   /* Logical Code ::: END */
 }

 function cache_remove_userContacts($phoneNumber){
  $ucFiles_count = count(glob($GLOBALS['DAT_AUTH_MODULE_PATH']."*.json"));
  for($fileIndex=0;$fileIndex<$ucFiles_count;$fileIndex++){
    $ucFiles_content = file_get_contents($GLOBALS['MW_URL'].$GLOBALS['DAT_AUTH_MODULE_PATH'].'uc_'.$fileIndex.'.json');
	if(strlen($ucFiles_content)>0){
	  $ucFiles_array = json_decode($ucFiles_content);
	  if(isset($ucFiles_array->{$phoneNumber})){
	    unset($ucFiles_array->{$phoneNumber});
	    file_put_contents($GLOBALS['DAT_AUTH_MODULE_PATH'].'uc_'.$fileIndex.'.json',json_encode($ucFiles_array));
	    break;
	  }
	}
  }
 }

 function cache_get_userAccount($phoneNumber){
   $user_Id = '';
   $ucFiles_count = count(glob($GLOBALS['DAT_AUTH_MODULE_PATH']."*.json"));
   for($fileIndex=0;$fileIndex<$ucFiles_count;$fileIndex++){
    $ucFiles_content = file_get_contents($GLOBALS['MW_URL'].$GLOBALS['DAT_AUTH_MODULE_PATH'].'uc_'.$fileIndex.'.json');
	if(strlen($ucFiles_content)>0){
	  $ucFiles_array = json_decode($ucFiles_content);
	  if(isset($ucFiles_array->{$phoneNumber})){
	    $user_Id = $ucFiles_array->{$phoneNumber}->{"user_Id"};
		break;
	  }
	}
   }
   return $user_Id;
 }

}

$authUserContacts = new AuthUserContacts();
echo $authUserContacts->cache_remove_userContacts('1234');
echo $authUserContacts->cache_get_userAccount('6666');

/*
$authUserContacts->cache_store_userContacts('1234','Anup');
$authUserContacts->cache_store_userContacts('1111','Kittu');
$authUserContacts->cache_store_userContacts('2345','Phani');
$authUserContacts->cache_store_userContacts('6666','Swamy');
*/
?>