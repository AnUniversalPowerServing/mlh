var Android;
var AndroidSession;
var AndroidPermissions;
var AndroidDatabase;
var AndroidSQLiteUsrFrndsInfo;
function goToNext(){
if(Android!==undefined){  // Android.loadAndroidWebScreen('AUTH','#095d59'); 
window.location.href='app-auth-welcome.html';
 //Android.loadAndroidWebScreen('DEFAULT'); file:///android_asset/www/ 
}
}
function makeOutPermissions(){ 
  if(Android!==undefined && Android.getAndroidVersion()>=23){
    var arryPerm=["android.permission.WRITE_EXTERNAL_STORAGE","android.permission.READ_EXTERNAL_STORAGE",
			      "android.permission.READ_CONTACTS","android.permission.WRITE_CONTACTS","android.permission.CAMERA",
			      "android.permission.INTERNET","android.permission.ACCESS_NETWORK_STATE",
		          "android.permission.ACCESS_WIFI_STATE","android.permission.ACCESS_COARSE_LOCATION",
			      "android.permission.ACCESS_FINE_LOCATION"]; 
	var permissionPage='false';
    for(var index=0;index<arryPerm.length;index++){
       try {
         if(AndroidPermissions.doesPermissionExist(arryPerm[index])==='false'){ 
	        permissionPage='true';break; 
	     }
	   } catch(err) { alert("DoesPermissionExist: "+err); }
    }
	if(permissionPage==='false'){ goToNext(); }
	else {  AndroidPermissions.makeAPermission(arryPerm.toString()); }
  }	 else { goToNext(); }	  
}