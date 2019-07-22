<?php

class MobileSMS {
   private $smslane_user='anupchinney';
   private $smslane_pwd='@anupanup123';
   private $smslane_senderId='WebSMS';
   private $smsfresh_user='nellutlalnrao';
   private $smsfresh_pwd='123456';
   private $logger;
    
   function __construct() {
    $this->logger= Logger::getLogger("api.database.php");
   }
   
   function sendMobileOTP($projectURL,$otpcode,$msisdn){
     $msg=urlencode('Welcome to MyLocalHook. Your OTPCode is '.$otpcode);
	 $checkBalanceURL=$projectURL.'/backend/php/dac/controller.module.app.user.authentication.php';
	 $checkBalanceURL.='?action=MOBILE_SMS_BALANCE';
	 $balanceJSON = file_get_contents($checkBalanceURL);
	 $balanceDeJSON = json_decode($balanceJSON);
	 $url='';
	 if(intval($balanceDeJSON->smslane_balance)>0){ /* SMSLane ::: Send OTPCode */
	    $url.='http://apps.smslane.com/vendorsms/pushsms.aspx?';
	    $url.='user='.$this->smslane_user.'&password='.$this->smslane_pwd;
	    $url.='&msisdn='.$msisdn.'&sid='.$this->smslane_senderId.'&msg='.$msg.'&fl=0';
	 } else {
	  	$url.='http://trans.smsfresh.co/api/sendmsg.php?user=nellutlalnrao&pass=123456&sender=MYLCHK';
		$url.='&phone='.$msisdn.'&text='.$msg.'&priority=ndnd&stype=normal';
	 }
    return file_get_contents($url);
   }
   
   function getMobileSMSBalance(){
      /* SMSLANE: */
      $smslane_url='http://apps.smslane.com/vendorsms/CheckBalance.aspx?user=';
	  $smslane_url.=$this->smslane_user.'&password='.$this->smslane_pwd;
	  $smslane_balance=file_get_contents($smslane_url);
	  /* SMSFRESH */
	  
	  $smsfresh_url='http://trans.smsfresh.co/api/checkbalance.php?user='.$this->smsfresh_user;
	  $smsfresh_url.='&pass='.$this->smsfresh_pwd;
	  $smsfresh_balance=file_get_contents($smsfresh_url);
	  
	  $content='{"smslane_balance":"'.str_replace("Success#","",$smslane_balance).'",';
	  $content.='"smsfresh_balance":"'.$smsfresh_balance.'"}';
	  return $content;
   }
}

?>