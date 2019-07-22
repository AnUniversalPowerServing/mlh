$(document).ready(function(){
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 loadFormWithCountryCodeInDivision();
});

function loadFormWithCountryCodeInDivision(){
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/countries.json',{},function(response){
 var content='<div align="center" class="col-md-12 col-xs-12">';
     content+='<h4 style="color:#fff;"><b>Enter your Phone Number</b></h4>';
     content+='</div>';
	 content+='<div align="center" class="col-md-12 col-xs-12 mtop15p">';
	 content+='<div class="input-group">';
	 content+='<div class="input-group-btn">';
     content+='<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" ';
	 content+='aria-haspopup="true" aria-expanded="false">';
     content+='<span id="authPhNumberDisplay">+91</span>&nbsp;<span class="caret"></span>';
     content+='</button>';
     content+='<ul class="dropdown-menu">';
	 for(var index=0;index<response.countries.length;index++){
	 var phNumberExtension=response.countries[index].phonecode;
	 var country=response.countries[index].countryValue; // Set it in Session
	 var timezone=response.countries[index].timezone;
	 content+='<li><a href="#" onclick="javascript:seloptPhoneNumber(\''+phNumberExtension+'\',\''+country+'\',\''+timezone+'\');">'+phNumberExtension+'</a></li>';
	 }
	 content+='</ul>';
     content+='</div>';
     content+='<input type="number" id="auth-phoneNumber" class="form-control" placeholder="XXX-XXX-XXXX"/>';
	 content+='</div>';
     content+='</div>';
	 content+='<div id="otpverifyBtn" align="center" class="col-md-12 col-xs-12 mtop15p">';
	 content+='<button id="otpverifyBtnElement" class="btn btn-default form-control" onclick="javascript:verifyOTPCode();">';
	 content+='<b><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Verify</b>';
	 content+='</button>';
	 content+='</div>';
	 content+='<div id="verifyOTPDiv" align="center" class="white-font col-md-12 col-xs-12">';
	 content+='</div>';
	 document.getElementById("dualsim_selection").innerHTML=content;

	});
}

var AUTH_EXTENSION_PHONENUMBER='+91';
var AUTH_EXTENSION_COUNTRY='India';
var AUTH_EXTENSION_TIMEZONE='Asia/Kolkata';

function seloptPhoneNumber(phNumberExtension,country,timezone){
AUTH_EXTENSION_PHONENUMBER=phNumberExtension;
AUTH_EXTENSION_COUNTRY=country;
AUTH_EXTENSION_TIMEZONE=timezone;
document.getElementById("authPhNumberDisplay").innerHTML=phNumberExtension;
}

function verifyOTPCode(){
var phNumber=document.getElementById("auth-phoneNumber").value;
if(phNumber.length===10){
 document.getElementById("otpverifyBtnElement").disabled=true;
 document.getElementById("authPhNumberDisplay").disabled=true;
 document.getElementById("auth-phoneNumber").disabled=true;
 var fullphNumber=AUTH_EXTENSION_PHONENUMBER+'-'+phNumber;
 var sentOTPtoPhoneNumber = AUTH_EXTENSION_PHONENUMBER+phNumber;
 /* Code to Send OTPCode ::: Start */
 var otpcode = sendOTPCode_toUserPhoneNumber(sentOTPtoPhoneNumber);
 /* Code to Send OTPCode ::: End */
 var content='<div id="optcodeDivision">';
     content+='<div class="mtop15p">';
     content+='<b>An OTP Code is sent to '+fullphNumber+'</b>';
	 content+='</div>';
	 content+='<div id="optcodeErrorMsg" class="col-xs-12 mtop15p"></div>';
	 content+='<div class="col-xs-1"></div>';
	 content+='<div class="col-xs-10 mtop15p">';
	 content+='<div class="input-group">';
	 content+='<input id="userInput_optCode" type="number" class="form-control" placeholder="XXXXX"/>';
	 content+='<span class="input-group-addon" onclick="verifyOtpCodeWithUserInput(\''+otpcode+'\',\''+AUTH_EXTENSION_PHONENUMBER+'\',\''+phNumber+'\');"><b>Verify</b></span>';
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="col-xs-1"></div>';
	 content+='</div>';
 document.getElementById("verifyOTPDiv").innerHTML=content;
 } 
 else { alert_display_warning('W001'); }
}

function verifyOtpCodeWithUserInput(userOptCode,countrycode, phNumber){
var inputOptCode=document.getElementById("userInput_optCode").value;
if(userOptCode===inputOptCode){
  /* Add PhoneNumber to Session */ 
  var userEnterPhoneNumber = '{\\"mcountrycode\\":\\"'+countrycode+'\\",\\"mobile\\":\\"'+phNumber+'\\"}';
  var sessionJSON='{"session_set":[{"key":"AUTH_USER_CURPHONENUMBER","value":"['+userEnterPhoneNumber+']"},';
      sessionJSON+='{"key":"AUTH_USER_COUNTRY","value":"'+AUTH_EXTENSION_COUNTRY+'"},';
      sessionJSON+='{"key":"AUTH_USER_TIMEZONE","value":"'+AUTH_EXTENSION_TIMEZONE+'"}],';
      sessionJSON+='"session_get":["AUTH_USER_CURPHONENUMBER","AUTH_USER_COUNTRY","AUTH_USER_TIMEZONE"]}';
  js_session(sessionJSON,function(response){
    console.log(response);
  });
  document.getElementById("authpart02_moverbtndiv").style.display='block';
  document.getElementById("otpverifyBtn").style.display='none';
  document.getElementById("optcodeErrorMsg").innerHTML='';
  var content='<div class="mtop15p">';
      content+='<b>Thanks, Your Phone Number is validated.</b>';
	  content+='</div>';
  document.getElementById("optcodeDivision").innerHTML=content;
} else {
   var content='<div>';
	   content+='You have entered Invalid OTPCode.';
       content+='</div>';
   document.getElementById("optcodeErrorMsg").innerHTML=content;
}
}
