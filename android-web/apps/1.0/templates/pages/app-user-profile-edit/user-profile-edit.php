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
 document.getElementById("userProfileEditForm_"+USR_LANG+"_aboutMe").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_gender").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_dob").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_country").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_state").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_location").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_locality").disabled = true;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_changed").disabled = true;
}
function enable_userprofileEditForm(){
 document.getElementById("userProfileEditForm_"+USR_LANG+"_username").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_surname").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_fullname").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_aboutMe").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_gender").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_dob").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_country").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_state").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_location").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_locality").disabled = false;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_changed").disabled = false;
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
 var phoneData = JSON.parse(AUTH_USER_CURPHONENUMBER);
 var mcountrycode = phoneData[0].mcountrycode;
 var mobile = phoneData[0].mobile;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_status").value = 'MOBILE_VALIDATED';
 document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_initial").value = mobile;
 document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_changed").value=mobile;
 disable_userprofileEditForm();
 view_btns_editProfile();
}
/* Edit Profile Data */
function load_userprofile_editData(){
 enable_userprofileEditForm();
 view_btns_saveProfile();
}
/* Save Profile Data */
var USERNAME;
var SURNAME;
var FULLNAME;
var ABOUTME;
var GENDER;
var DOB;
var COUNTRY;
var STATE;
var LOCATION;
var LOCALITY;
var MOBILENUMBER_INITIAL;
var MOBILENUMBER_CHANGED;
var TIMEZONE;
var OTPCODE;
function load_userprofile_saveData(){
 /* Make Validation before Disable, If disabled it is saved */
 /* User profile picture Validation */
 USERNAME = document.getElementById("userProfileEditForm_"+USR_LANG+"_username").value;
 SURNAME = document.getElementById("userProfileEditForm_"+USR_LANG+"_surname").value;
 FULLNAME = document.getElementById("userProfileEditForm_"+USR_LANG+"_fullname").value;
 ABOUTME = document.getElementById("userProfileEditForm_"+USR_LANG+"_aboutMe").value;
 console.log(ABOUTME);
 GENDER = document.getElementById("userProfileEditForm_"+USR_LANG+"_gender").value;  
 DOB = document.getElementById("userProfileEditForm_"+USR_LANG+"_dob").value;
 COUNTRY = document.getElementById("userProfileEditForm_"+USR_LANG+"_country").value;
 STATE = document.getElementById("userProfileEditForm_"+USR_LANG+"_state").value;  
 LOCATION = document.getElementById("userProfileEditForm_"+USR_LANG+"_location").value;
 LOCALITY = document.getElementById("userProfileEditForm_"+USR_LANG+"_locality").value;
 MOBILENUMBER_INITIAL = document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_initial").value;
 MOBILENUMBER_CHANGED = document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_changed").value;
 if(IMG_URL!==undefined && IMG_URL.length>0){  
   if(USERNAME.length>0){
    if(SURNAME.length>0){
	  if(FULLNAME.length>0){
	    if(GENDER.length>0){
	      if(DOB.length>0){
	        if(COUNTRY.length>0){
	          if(STATE.length>0){
	            if(LOCATION.length>0){
	              if(LOCALITY.length>0){
				    if(MOBILENUMBER_CHANGED.length>0){
					  /* Mobile Validations ::: Start */
					  var valid_mobile = false;
					  if(MOBILENUMBER_INITIAL===MOBILENUMBER_CHANGED){
					    document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_status").value='MOBILE_VALIDATED';
					    valid_mobile = true;
					  }
					  if(!valid_mobile){
					   display_ValidateOTPModal('+91',MOBILENUMBER_CHANGED);
					  } else {
					     validateOTPCode();
					  }
					  
					  
					}
					else { alert_display_warning('W001'); } // Missing PhoneNumber
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
 } else { alert_display_warning('W052'); } // Missing User Profile picture
}

function validateOTPCode(){
disable_userprofileEditForm();
view_btns_editProfile();
$("#app-user-profile-edit-modal").modal('hide');
var status = document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_status").value;
var update = true;
if(status==='MOBILE_NOT_VALIDATED'){
 var userOTPCode = document.getElementById("userEditForm_'+USR_LANG+'_userEnteredOTPCode").value;
 if(OTPCODE !== userOTPCode){
  update =false;
 } else {
  /* Set status and _initial and _changed Number */
  document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_status").value='MOBILE_VALIDATED';
  MOBILENUMBER_INITIAL=MOBILENUMBER_CHANGED;
  document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_initial").value=MOBILENUMBER_INITIAL;
  document.getElementById("userProfileEditForm_"+USR_LANG+"_userMobileNumber0_changed").value=MOBILENUMBER_CHANGED;
 }
}
if(update){
  var profile_pic = AUTH_USER_PROFILEPIC;
  if(IMG_URL!==undefined || IMG_URL.length>0){  profile_pic=IMG_URL; }
  /* Update Ajax Call ::: Start */
  var allPhoneNumbers=[{"initial":{"mcountrycode":"+91","mobile":MOBILENUMBER_INITIAL},
                        "changed":{"mcountrycode":"+91","mobile":MOBILENUMBER_CHANGED}}];  
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
  { action:'UPDATE_EXISTING_USERACCOUNT', user_Id: AUTH_USER_ID, username: USERNAME, surName: SURNAME, name: FULLNAME,   
    about_me:ABOUTME, dob: DOB, gender: GENDER, profile_pic: profile_pic, minlocation: LOCALITY,
	location: LOCATION, state: STATE, country: COUNTRY, user_tz: AUTH_USER_TIMEZONE,
	allPhoneNumbers:JSON.stringify(allPhoneNumbers) }, function(resp){ console.log(resp); });
  /* Update Ajax Call ::: End */
 }
}
function display_ValidateOTPModal(mobileCode,mobileNumber){
 /* Send OTP Code to User */
 var phNumber = mobileCode+mobileNumber;
 OTPCODE = sendOTPCode_toUserPhoneNumber(phNumber);
 var content='<div class="modal-dialog">';
	 content+='<div class="modal-content">';
	 content+='<div class="modal-header">';
	 content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
	 content+='<h4 class="modal-title">Validate OTP Code</h4>';
	 content+='</div>';
	 content+='<div class="modal-body">';
	 
	 content+='<div class="container-fluid">';
	 content+='<div class="row">';
	 content+='<div class="col-xs-12" style="line-height:22px;">';
	 content+='An OTP Code is sent to <b>'+mobileCode+'-'+mobileNumber+'</b>. Please Enter your OTP Code.';
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="row mtop15p">';
	 content+='<div class="col-xs-12">';
	 content+='<div class="input-group">';
	 
	 content+='<input id="userEditForm_'+USR_LANG+'_userEnteredOTPCode" type="text" class="form-control" ';
	 content+='placeholder="Enter your OTP Code">';
	 content+='<span class="input-group-addon curpoint">Resend OTP Code</span>';
	 content+='</div>';
    
  
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="row mtop15p">';
	 content+='<div class="col-xs-12">';
	 content+='<button class="btn btn-primary pull-right" onclick="javascript:validateOTPCode();">';
	 content+='<b>Validate OTP Code</b>';
	 content+='</button>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
 document.getElementById("app-user-profile-edit-modal").innerHTML=content;
 $("#app-user-profile-edit-modal").modal('show');
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
 <!-- About Me -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group"> 
	  <label>About Me</label>
      <textarea class="form-control" id="userProfileEditForm_english_aboutMe" 
	  placeholder="Say about you" disabled><?php echo $_SESSION["AUTH_USER_ABOUTME"]; ?></textarea>
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
 <!-- Mobile Number -->
 <div class="row">
   <div class="col-xs-12">
    <div class="form-group">
	  <label>Mobile Number</label>
	  <!-- Start -->
	  <div id="div-user-profile-edit-mobileNumbers0">
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" 
		    aria-expanded="false"><b>+91</b><span class="caret"></span></button>
            <ul class="dropdown-menu" style="margin-top:0px;">
              <li><a href="#">+91</a></li>
            </ul>
          </div><!-- /btn-group -->
		  <input type="hidden" class="form-control" id="userProfileEditForm_english_userMobileNumber0_status" placeholder="MOBILE_NOT_VALIDATED"/>
          <input type="hidden" class="form-control" id="userProfileEditForm_english_userMobileNumber0_initial" placeholder="Enter your Mobile Number"/>
		  <input type="number" class="form-control" id="userProfileEditForm_english_userMobileNumber0_changed" placeholder="Enter your Mobile Number"/>
        </div><!-- /input-group -->
      </div>
	  <!-- End --> 
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