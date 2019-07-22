<script type="text/javascript">
function load_userprofile_edit(){
 upload_picture_100X100('div-user-profile-edit-img',AUTH_USER_PROFILEPIC);
 loadFormWithCountryCodeInDivision();
}
function loadFormWithCountryCodeInDivision(){
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/countries.json',{},function(response){
  MOBILE_PHONECODE_RESPONSE=response;
  load_userprofile_initialData();
 });
}
/* Edit Profile, Save profile, Reset Buttons */
function view_btns_editProfile(){
 if($('#userProfileEditForm_btn_editProfile').hasClass('hide-block')){ 
  $('#userProfileEditForm_btn_editProfile').removeClass('hide-block');
 }
 if(!$('#userProfileEditForm_btn_addNewMobile').hasClass('hide-block')){ 
  $('#userProfileEditForm_btn_addNewMobile').addClass('hide-block');
 }
 if(!$('#userProfileEditForm_btn_saveProfile').hasClass('hide-block')){
  $('#userProfileEditForm_btn_saveProfile').addClass('hide-block');
 }
 if($('#userProfileEditForm_btn_reset').hasClass('hide-block')){ 
  $('#userProfileEditForm_btn_reset').removeClass('hide-block');
 }
}
function view_btns_saveProfile(){
 if(!$('#userProfileEditForm_btn_editProfile').hasClass('hide-block')){ 
  $('#userProfileEditForm_btn_editProfile').addClass('hide-block');
 }
 if($('#userProfileEditForm_btn_addNewMobile').hasClass('hide-block')){ 
  $('#userProfileEditForm_btn_addNewMobile').removeClass('hide-block');
 }
 if($('#userProfileEditForm_btn_saveProfile').hasClass('hide-block')){
  $('#userProfileEditForm_btn_saveProfile').removeClass('hide-block');
 }
 if($('#userProfileEditForm_btn_reset').hasClass('hide-block')){ 
  $('#userProfileEditForm_btn_reset').removeClass('hide-block');
 }
}
/* Enable and Disable Forms */
function disable_userprofileEditForm(){
 document.getElementById("userProfileEditForm_"+USR_LANG+"_username").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_surname").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_fullname").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_gender").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_dob").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_country").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_state").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_location").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_locality").disabled = true;
 for(var index=0;index<MOBILES_INDEX;index++){
  document.getElementById("userProfileEditForm_"+USR_LANG+"_mobile"+index+'_changed').disabled = true;
  document.getElementById("userProfileEditForm_"+USR_LANG+"_mobileBtn"+index).disabled = true;
 }
 if(!$('.phNumber-delete-icons').hasClass('hide-block')){ $('.phNumber-delete-icons').addClass('hide-block'); }
}
function enable_userprofileEditForm(){
 document.getElementById("userProfileEditForm_"+USR_LANG+"_username").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_surname").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_fullname").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_gender").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_dob").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_country").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_state").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_location").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_locality").disabled = false;
 for(var index=0;index<MOBILES_INDEX;index++){
  document.getElementById("userProfileEditForm_"+USR_LANG+"_mobile"+index+'_changed').disabled = false;
  document.getElementById("userProfileEditForm_"+USR_LANG+"_mobileBtn"+index).disabled = false;
 }
 if($('.phNumber-delete-icons').hasClass('hide-block')){ $('.phNumber-delete-icons').removeClass('hide-block'); }
}
/* Initial Data / Reset Data */
function load_userprofile_initialData(){
 IMG_URL = AUTH_USER_PROFILEPIC;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_username").value = AUTH_USER_USERNAME;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_surname").value = AUTH_USER_SURNAME;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_fullname").value = AUTH_USER_FULLNAME;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_gender").value = AUTH_USER_GENDER;  
 document.getElementById("userProfileEditForm_"+USR_LANG+"_dob").value = AUTH_USER_DOB;
 build_countryOption("userProfileEditForm_"+USR_LANG+"_country");
 setTimeout(function(){
 document.getElementById("userProfileEditForm_"+USR_LANG+"_country").value = AUTH_USER_COUNTRY;
 build_stateOption("userProfileEditForm_"+USR_LANG+"_country","userProfileEditForm_"+USR_LANG+"_state");
 setTimeout(function(){
   document.getElementById("userProfileEditForm_"+USR_LANG+"_state").value = AUTH_USER_STATE;  
   build_locationOption("userProfileEditForm_"+USR_LANG+"_country","userProfileEditForm_"+USR_LANG+"_state",
                        "userProfileEditForm_"+USR_LANG+"_location");
    setTimeout(function(){
     document.getElementById("userProfileEditForm_"+USR_LANG+"_location").value = AUTH_USER_LOCATION;
     build_minlocationOption("userProfileEditForm_"+USR_LANG+"_country","userProfileEditForm_"+USR_LANG+"_state",
                        "userProfileEditForm_"+USR_LANG+"_location","userProfileEditForm_"+USR_LANG+"_locality");
	 setTimeout(function(){				
      document.getElementById("userProfileEditForm_"+USR_LANG+"_locality").value = AUTH_USER_LOCALITY;
	 },1000); 	
    },1000); 				
  },1000); 
 },1000);
 load_userprofile_mobileNumbers();
 disable_userprofileEditForm();
 view_btns_editProfile();
}
/* Edit Profile Data */
function load_userprofile_editData(){
 enable_userprofileEditForm();
 view_btns_saveProfile();
}
/* Save Profile Data */
function load_userprofile_saveData(){
 /* Make Validation before Disable, If disabled it is saved */
 /* User profile picture Validation */
 var username = document.getElementById("userProfileEditForm_"+USR_LANG+"_username").value;
 var surname = document.getElementById("userProfileEditForm_"+USR_LANG+"_surname").value;
 var fullname = document.getElementById("userProfileEditForm_"+USR_LANG+"_fullname").value;
 var gender = document.getElementById("userProfileEditForm_"+USR_LANG+"_gender").value;  
 var dob = document.getElementById("userProfileEditForm_"+USR_LANG+"_dob").value;
 var country = document.getElementById("userProfileEditForm_"+USR_LANG+"_country").value;
 var state = document.getElementById("userProfileEditForm_"+USR_LANG+"_state").value;  
 var location = document.getElementById("userProfileEditForm_"+USR_LANG+"_location").value;
 var locality = document.getElementById("userProfileEditForm_"+USR_LANG+"_locality").value;
 if(IMG_URL!==undefined && IMG_URL.length>0){  
   if(username.length>0){
    if(surname.length>0){
	  if(fullname.length>0){
	    if(gender.length>0){
	      if(dob.length>0){
	        if(country.length>0){
	          if(state.length>0){
	            if(location.length>0){
	              if(locality.length>0){
	                /* Mobile Validations ::: Start */
					var validMobile=true;
					var allPhoneNumbers=[];
					for(var index=0;index<MOBILES_INDEX;index++){
					 var initial_phoneCode = document.getElementById("userProfileEditForm_"+USR_LANG+"_phonecode"+index+'_initial').value;
					 var initial_mobile = document.getElementById("userProfileEditForm_"+USR_LANG+'_mobile'+index+'_initial').value;
					 var changed_phoneCode = document.getElementById("userProfileEditForm_"+USR_LANG+"_phonecode"+index+'_changed').value;
					 var changed_mobile = document.getElementById("userProfileEditForm_"+USR_LANG+'_mobile'+index+'_changed').value;
					 allPhoneNumbers[allPhoneNumbers.length]={"initial":{"mcountrycode":initial_phoneCode,
					 "mobile":initial_mobile},"changed":{"mcountrycode":initial_phoneCode,"mobile":initial_mobile}};
					 if(mobile.length<10 || phoneCode.length===0){ validMobile=false;break;  }
					}
					if(!validMobile){ alert_display_warning('W049'); } 
					else {
					  disable_userprofileEditForm();
					  view_btns_editProfile();
					  /* Update Ajax Call ::: Start */
					  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
						{ action:'UPDATE_EXISTING_USERACCOUNT', user_Id: AUTH_USER_ID, username: AUTH_USER_USERNAME, 
						  surName: AUTH_USER_SURNAME, name: AUTH_USER_FULLNAME, dob: AUTH_USER_DOB, gender: AUTH_USER_GENDER, 
						  profile_pic: profile_pic, about_me:'', minlocation: AUTH_USER_LOCALITY, location: AUTH_USER_LOCATION, 
						  state: AUTH_USER_STATE, country: AUTH_USER_COUNTRY, user_tz: AUTH_USER_TIMEZONE, 
						  allPhoneNumbers:JSON.stringify(allPhoneNumbers) },
						function(resp){    });
					  /* Update Ajax Call ::: End */
					}
					/* Mobile Validations ::: End */
	              } else { alert_display_warning('W010'); }//Missing locality
	            } else { alert_display_warning('W009'); }// Missing location
	          } else { alert_display_warning('W008'); }// Missing state
	        } else { alert_display_warning('W007'); }// Missing country
	      } else { alert_display_warning('W006'); } // Missing dob
	    } else { alert_display_warning('W005'); } // Missing gender
	  } else { alert_display_warning('W004'); } // Missing fullname
	} else { alert_display_warning('W003'); } // Missing surname
   } else { alert_display_warning('W002'); } // Missing username
 } else { alert_display_warning(''); } // Missing User Profile picture
}
var MOBILES_INDEX=0;
var MOBILE_PHONECODE_RESPONSE;
var MOBILE_JSONDATA_BUILDER;
function load_userprofile_mobileNumbers(){
 var phoneNumbersList=JSON.parse(AUTH_USER_PHONENUMBERS);
 for(var index=0;index<phoneNumbersList.length;index++){
  var mcountrycode = phoneNumbersList[index].mcountrycode;
  var mobile = phoneNumbersList[index].mobile;
  var content=display_phoneNumberContent(mcountrycode,mobile,true);
  document.getElementById("div-user-profile-edit-mobileNumbers"+MOBILES_INDEX).innerHTML=content;
  document.getElementById("userProfileEditForm_"+USR_LANG+"_phonevalidated"+MOBILES_INDEX).value='MOBILE_VALIDATED';
  if($('#phone-validated-icon'+MOBILES_INDEX).hasClass('hide-block')){ 
    $('#phone-validated-icon'+MOBILES_INDEX).removeClass('hide-block');
  }
  if(!$('#phone-not-validated-icon'+MOBILES_INDEX).hasClass('hide-block')){ 
    $('#phone-not-validated-icon'+MOBILES_INDEX).addClass('hide-block');
  } 
  MOBILES_INDEX++;
 }
} 
function display_phoneNumberContent(mcountrycode,mobile,disable){
  var content='<div>';
      content+='<div class="input-group mbot10p">';
	  /* Validated-icon ::: Start */ 
	  content+='<span id="phone-not-validated-icon'+MOBILES_INDEX+'" class="input-group-addon hide-block" ';
	  content+='style="background-color:#fff;border:0px;">';
	  content+='<span data-toggle="tooltip" title="Phone Number is not validated" class="glyphicon glyphicon-warning-sign" ';
	  content+='style="color:#d23605;"></span></span>';
	  /* Validated-icon ::: End */
	  /* Validated-icon ::: Start */
	  content+='<span id="phone-validated-icon'+MOBILES_INDEX+'" class="input-group-addon hide-block" ';
	  content+='style="background-color:#fff;border:0px;">';
	  content+='<span data-toggle="tooltip" title="Phone Number is validated" class="glyphicon glyphicon-ok" ';
	  content+='style="color:#3be842;"></span></span>';
	  /* Validated-icon ::: End */
      content+='<div class="input-group-btn">';
	  content+='<input type="hidden" id="userProfileEditForm_'+USR_LANG+'_phonevalidated'+MOBILES_INDEX+'"';
	  content+=' value="MOBILE_NOT_VALIDATED"/>';
	  content+='<input type="hidden" id="userProfileEditForm_'+USR_LANG+'_phonecode'+MOBILES_INDEX+'_initial"';
	  content+=' value="'+mcountrycode+'"/>';
	  content+='<input type="hidden" id="userProfileEditForm_'+USR_LANG+'_phonecode'+MOBILES_INDEX+'_changed"';
	  content+=' value="'+mcountrycode+'"/>';
      content+='<button id="userProfileEditForm_'+USR_LANG+'_mobileBtn'+MOBILES_INDEX+'" type="button" ';
	  content+='class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" ';
	  if(disable===true){
	   content+='aria-expanded="false" disabled><b>'+mcountrycode+'</b> <span class="caret"></span></button>';
	  } else   {
	   content+='aria-expanded="false"><b>'+mcountrycode+'</b> <span class="caret"></span></button>';
	  }
      content+='<ul class="dropdown-menu" style="margin-top:0px;">';
      for(var index=0;index<MOBILE_PHONECODE_RESPONSE.countries.length;index++){
       var phNumberExtension=MOBILE_PHONECODE_RESPONSE.countries[index].phonecode;
       content+='<li onclick="javascript:set_phoneCode(\''+MOBILES_INDEX+'\',\''+phNumberExtension+'\');">';
	   content+='<a href="#">'+phNumberExtension+'</a>';
	   content+='</li>';
      }
      content+='</ul>';
      content+='</div>';
	  if(disable===true){
      content+='<input id="userProfileEditForm_'+USR_LANG+'_mobile'+MOBILES_INDEX+'_initial" type="hidden" ';
	  content+='maxlength="10" class="form-control" ';
	  content+='placeholder="Enter your Mobile Number" value="'+mobile+'"/>';
	  content+='<input id="userProfileEditForm_'+USR_LANG+'_mobile'+MOBILES_INDEX+'_changed" type="number" ';
	  content+=' maxlength="10" class="form-control input-numeric" ';
	  content+='placeholder="Enter your Mobile Number" value="'+mobile+'" ';
	  content+='onkeyup="return validate_digits_phNumber(\''+MOBILES_INDEX+'\',this.id,event);" disabled/>';
	  } else   {
	  content+='<input id="userProfileEditForm_'+USR_LANG+'_mobile'+MOBILES_INDEX+'_initial" type="hidden" ';
	  content+='maxlength="10" class="form-control" ';
	  content+='placeholder="Enter your Mobile Number" value="'+mobile+'"/>';
	  content+='<input id="userProfileEditForm_'+USR_LANG+'_mobile'+MOBILES_INDEX+'_changed" type="number" ';
	  content+=' maxlength="10" class="form-control input-numeric" ';
	  content+='placeholder="Enter your Mobile Number" value="'+mobile+'" ';
	  content+='onkeyup="return validate_digits_phNumber(\''+MOBILES_INDEX+'\',this.id,event);"/>';
	  }
	  
	  content+='<span id="phNumber-delete-icons'+MOBILES_INDEX+'" class="phNumber-delete-icons input-group-addon hide-block" ';
	  content+='style="background-color:#fff;border:0px;" onclick="javascript:deleteMobileNumber(\''+MOBILES_INDEX+'\');">';
	  content+='<i class="fa fa-times-circle" aria-hidden="true"></i></span>';
	  content+='</div>';
	  content+='</div>';
	  
	  content+='<div id="div-user-profile-edit-mobileNumber-errorMsg'+(MOBILES_INDEX)+'"';
	  content+=' class="container-fluid mbot15p hide-block">';
	  content+='</div>';
	  /* Validate PhoneNumber code */
	  content+='<div id="div-user-profile-edit-mobileNumber-validateUsingOTP'+(MOBILES_INDEX)+'" ';
	  content+='class="container-fluid hide-block mbot15p">';
	  content+='<div class="row">';
	  content+='<div class="col-xs-12">';
	  
	  content+='<button class="btn custom-bg pull-right" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;"';
	  content+=' onclick="javascript:validate_MobilePhoneNumbers(\''+MOBILES_INDEX+'\');"><b>Validate Number</b></button>';
	  
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
	  
	  content+='<div id="div-user-profile-edit-mobileNumbers'+(MOBILES_INDEX+1)+'">';
	  content+='</div>';
  return content;
}
function deleteMobileNumber(index){
 // phNumber-delete-icons
}
function validate_digits_phNumber(index,id,evt){
/*
  
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
*/
 var phoneNumber = document.getElementById(id).value;
 if(document.getElementById(id).value.length===10){
  var initial_mobile = document.getElementById("userProfileEditForm_"+USR_LANG+"_mobile"+index+"_initial").value;
  var changed_mobile = document.getElementById("userProfileEditForm_"+USR_LANG+"_mobile"+index+"_changed").value;

  if(initial_mobile===changed_mobile && initial_mobile.length===10 && changed_mobile.length===10){
   console.log('MOBILE_VALIDATED');
   /* Validate Non-Validated Icons ::: Start */
   if($('#phone-validated-icon'+index).hasClass('hide-block')){ 
    $('#phone-validated-icon'+index).removeClass('hide-block');
   }
   if(!$('#phone-not-validated-icon'+index).hasClass('hide-block')){ 
    $('#phone-not-validated-icon'+index).addClass('hide-block');
   } 
   /* Validate Non-Validated Icons ::: End */
   /* Hide Error Message ::: Start */
   if(!$('#div-user-profile-edit-mobileNumber-errorMsg'+index).hasClass('hide-block')){
    $('#div-user-profile-edit-mobileNumber-errorMsg'+index).addClass('hide-block');
   }
   document.getElementById('div-user-profile-edit-mobileNumber-errorMsg'+index).innerHTML='';
   /* Hide Error Message ::: End */
   document.getElementById("userProfileEditForm_"+USR_LANG+"_phonevalidated"+index).value='MOBILE_VALIDATED';
   if(!$('#div-user-profile-edit-mobileNumber-validateUsingOTP'+index).hasClass('hide-block')){
    $('#div-user-profile-edit-mobileNumber-validateUsingOTP'+index).addClass('hide-block');
   }
  }
  else { /* View Validate Number Button */ 
   /* Validate Non-Validated Icons ::: Start */
   if(!$('#phone-validated-icon'+index).hasClass('hide-block')){ 
    $('#phone-validated-icon'+index).addClass('hide-block');
   }
   if($('#phone-not-validated-icon'+index).hasClass('hide-block')){ 
    $('#phone-not-validated-icon'+index).removeClass('hide-block');
   } 
   /* Validate Non-Validated Icons ::: End */
   /* Hide Error Message ::: Start */
   if($('#div-user-profile-edit-mobileNumber-errorMsg'+index).hasClass('hide-block')){
    $('#div-user-profile-edit-mobileNumber-errorMsg'+index).removeClass('hide-block');
   }
   var content='<div class="pull-right" style="color:#d23605;"><b>Phone Number need to be verified.</b></div>';
   document.getElementById('div-user-profile-edit-mobileNumber-errorMsg'+index).innerHTML=content;
   /* Hide Error Message ::: End */
   document.getElementById("userProfileEditForm_"+USR_LANG+"_phonevalidated"+index).value='MOBILE_NOT_VALIDATED';
   console.log('MOBILE_NOT_VALIDATED');
   if($('#div-user-profile-edit-mobileNumber-validateUsingOTP'+index).hasClass('hide-block')){
    $('#div-user-profile-edit-mobileNumber-validateUsingOTP'+index).removeClass('hide-block');
   }
  } 
  console.log('Enable');
 } else {
   /* Hide Error Message ::: Start */
   if($('#div-user-profile-edit-mobileNumber-errorMsg'+index).hasClass('hide-block')){
    $('#div-user-profile-edit-mobileNumber-errorMsg'+index).removeClass('hide-block');
   }
   var content='<div class="pull-right" style="color:#d23605;"><b>Invalid PhoneNumber</b></div>';
   document.getElementById('div-user-profile-edit-mobileNumber-errorMsg'+index).innerHTML=content;
   /* Hide Error Message ::: End */
   /* Validate Non-Validated Icons ::: Start */
   if(!$('#phone-validated-icon'+index).hasClass('hide-block')){ 
    $('#phone-validated-icon'+index).addClass('hide-block');
   }
   if($('#phone-not-validated-icon'+index).hasClass('hide-block')){ 
    $('#phone-not-validated-icon'+index).removeClass('hide-block');
   } 
   /* Validate Non-Validated Icons ::: End */
   
  if(!$('#div-user-profile-edit-mobileNumber-validateUsingOTP'+index).hasClass('hide-block')){
    $('#div-user-profile-edit-mobileNumber-validateUsingOTP'+index).addClass('hide-block');
  }
  console.log('Disable');
 }
}
function validate_MobilePhoneNumbers(index){
 /* Check the New Phone exists in the Database for Other Account other than him 
  * IF NOT EXISTS, Send OTP Code
  * ELSE trigger alert Message
  */
  var phoneValidation = document.getElementById("userProfileEditForm_"+USR_LANG+"_phonevalidated"+index).value;
  var initial_phonecode = document.getElementById("userProfileEditForm_"+USR_LANG+"_phonecode"+index+"_initial").value;
  var changed_phonecode = document.getElementById("userProfileEditForm_"+USR_LANG+"_phonecode"+index+"_changed").value;
  var initial_mobile = document.getElementById("userProfileEditForm_"+USR_LANG+"_mobile"+index+"_initial").value;
  var changed_mobile = document.getElementById("userProfileEditForm_"+USR_LANG+"_mobile"+index+"_changed").value;
  
  console.log("phoneValidation: "+phoneValidation+" initial_phonecode: "+initial_phonecode+" initial_mobile: "+
  initial_mobile+"  changed_phonecode: "+changed_phonecode+" changed_mobile: "+changed_mobile);
  
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
  { action:'VALIDATE_USER_PHONENUMBER', mcountrycode:changed_phonecode,mobile:changed_mobile },function(response){
  console.log(response);
    if(response==='PHONENUMBER_NOT_EXIST'){
	// Bootstrap Popup
	 var sentOTPtoPhoneNumber = changed_phonecode+changed_mobile;
     var otpcode = sendOTPCode_toUserPhoneNumber(sentOTPtoPhoneNumber);
	 var content='<div class="modal-dialog">';
         content+='<div class="modal-content">';
         content+='<div class="modal-header">';
         content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
         content+='<h5 class="modal-title"><b>Validate your Phone Number</b></h5>';
         content+='</div>';
         content+='<div class="modal-body">';
		 content+='<div id="alert_otp_responsestatus">';
		 content+='</div>';
		 if(initial_phonecode.length>0 && initial_mobile.length===10){
		 content+='<p>Your Phone Number is going to be change from <b>'+initial_phonecode+'-'+initial_mobile+'</b> to ';
		 content+='the phone Number <b>'+changed_phonecode+'-'+changed_mobile+'</b>.</p><br/>';
		 }
		 content+='<div class="mtop15p">';
		 content+='An OTP Code is sent to <b>'+changed_phonecode+'-'+changed_mobile+'</b>, please enter it in below:';
		 content+='</div>';
		 content+='<div class="input-group mtop15p">';
		 content+='<input id="userProfileEditForm_'+USR_LANG+'_userEnteredOTPcode" type="text" class="form-control" ';
		 content+='maxlength="5" placeholder="Enter OTP Code"/><span class="input-group-addon" ';
		 content+='onclick="javascript:phoneNumber_verifyOTPCode(\'userProfileEditForm_'+USR_LANG+'_userEnteredOTPcode\',';
		 content+='\''+otpcode+'\');">';
		 content+='<b>Verify OTP Code</b></span>';
		 content+='</div>';
		 
         content+='</div>';
         content+='</div>';
         content+='</div>';
	  document.getElementById("app-user-profile-edit-modal").innerHTML=content;
	  $("#app-user-profile-edit-modal").modal();
	} 
	else {
	  // Message: PhoneNumber is associated with the Account.
	  alert_display_warning('W050');
	  document.getElementById("userProfileEditForm_"+USR_LANG+"_phonevalidated"+index).value='MOBILE_NOT_VALIDATED';
	}
  });
  
}
function addNewMobileNumber(){
 var content=display_phoneNumberContent('+91','',false);
 document.getElementById("div-user-profile-edit-mobileNumbers"+MOBILES_INDEX).innerHTML = content;
 if($('.phNumber-delete-icons').hasClass('hide-block')){ $('.phNumber-delete-icons').removeClass('hide-block'); }
 MOBILES_INDEX++;
}
function set_phoneCode(index,value){
 document.getElementById("userProfileEditForm_"+USR_LANG+"_phonecode"+index+'_changed').value=value;
}
function phoneNumber_verifyOTPCode(id,otpcode){
 var userEnterOTPcode = document.getElementById(id).value;
 if(userEnterOTPcode===otpcode){ // Matched Set as MOBILE_VALIDATED
   $("#app-user-profile-edit-modal").modal('hide');
   // Disable Validate Button
   // Set MOBILE_VALIDATED value
 } else { // Alert Mobile Number not validated
   div_display_warning('alert_otp_responsestatus','W051');
 }
}
</script>
<div class="container-fluid">
 <div class="row">
   <div id="div-user-profile-edit-img" class="col-xs-12"></div>
 </div>
 <!-- General Information -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
	  <h5><b>General Information</b></h5><hr/>
	</div>
   </div>
 </div>
 <!-- Username -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
	  <label>Username</label>
      <input type="text" class="form-control" id="userProfileEditForm_english_username" placeholder="Enter Username" 
	  value="<?php echo $_SESSION["AUTH_USER_USERNAME"]; ?>" disabled/>
	</div>
   </div>
 </div>
 <!-- Surname -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
	  <label>Surname</label>
      <input type="text" class="form-control" id="userProfileEditForm_english_surname" placeholder="Enter Surname" 
	  value="<?php echo $_SESSION["AUTH_USER_SURNAME"]; ?>" disabled/>
	</div>
   </div>
 </div>
 <!-- Name -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group"> 
	  <label>Name</label>
      <input type="text" class="form-control" id="userProfileEditForm_english_fullname" placeholder="Enter Name" 
	  value="<?php echo $_SESSION["AUTH_USER_FULLNAME"]; ?>" disabled/>
	</div>
   </div>
 </div>
 <!-- Gender -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
	  <label>Gender</label>
      <select class="form-control" id="userProfileEditForm_english_gender" disabled>
	    <option value="">Select your Gender</option>
		<option value="MALE">Male</option>
		<option value="FEMALE">Female</option>
	  </select>
	</div>
   </div>
 </div>

 <!-- Date of Birth -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
     <label>Date of Birth</label>
     <input type="date" id="userProfileEditForm_english_dob" class="form-control" disabled/>
	</div>
   </div>
 </div> 
  <!-- country -->
  <div class="row">
   <div class="col-xs-12">
      <div class="form-group">
      <label>Country</label>
      <select id="userProfileEditForm_english_country" class="form-control" onchange="javascript:userselected_country();" disabled>
	    <option value=""> Select your Country </option>
	  </select>
      </div> 
   </div>
  </div>
   
   <!-- state -->
   <div class="row">
    <div class="col-xs-12">
	  <div class="form-group">
      <label>State</label>
      <select id="userProfileEditForm_english_state" class="form-control" onchange="javascript:userselected_state();" disabled>
	    <option value=""> Select your State </option>
	  </select>
      </div> 
    </div>
  </div>

   <!-- location -->
   <div class="row">
    <div class="col-xs-12">
	  <div class="form-group">
      <label>Location</label>  
      <select id="userProfileEditForm_english_location" class="form-control" onchange="javascript:userselected_location();" disabled>
	    <option value=""> Select your Location </option>
	  </select>
      </div> 
    </div>
  </div>

   <!-- locality -->
   <div class="row">
    <div class="col-xs-12">
	  <div class="form-group">
      <label>Locality</label>
      <select id="userProfileEditForm_english_locality" class="form-control" disabled>
	    <option value=""> Select your Locality </option>
	  </select>
      </div> 
    </div>
  </div>
 
 <!-- General Information -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
	  <h5><b>Contact Information</b></h5><hr/>
	</div>
   </div>
 </div>
 <div class="row">
   <div class="col-xs-12 mbot15p">
     <button id="userProfileEditForm_btn_addNewMobile" class="btn custom-bg" 
	 onclick="javascript:addNewMobileNumber();"><b>(+) Add Mobile</b></button>
   </div>
 </div>
 <!-- Mobile Number -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
	  <label>Mobile Number</label>
	  <div id="div-user-profile-edit-mobileNumbers0">
      
      </div><!-- /input-group --> 
	</div>
   </div>
 </div>
 <!-- Add Mobile Button -->
 <!-- -->
 </div>
 <div class="row">
   <div align="center" class="col-xs-12 mtop15p mbot15p">
     <div class="btn-group">
	   <button id="userProfileEditForm_btn_editProfile" class="btn custom-bg hide-block"
	   onclick="javascript:load_userprofile_editData();"><b>Edit Profile</b></button>
	   <button id="userProfileEditForm_btn_saveProfile" class="btn custom-bg hide-block"
	   onclick="javascript:load_userprofile_saveData();"><b>Save Profile</b></button>
	   <button id="userProfileEditForm_btn_reset" class="btn custom-lgt-bg hide-block"
	   onclick="javascript:load_userprofile_initialData();"><b>Reset</b></button>
	 </div>
   </div>
 </div>
</div>