var Android;
var AndroidSession;
function progressLoader(){
 var count=1;
 var progress=false; /* true - 100 to 1 false - 1 to 100 */
 setInterval(function(){ 
  document.getElementById("progressDisplay").innerHTML=htmlCore.progressbar(count,'danger');
  if(progress==false){ count++; }
  else {  count--; }
  if(count>1 && count>=100){ progress=true; }
  if(count==1) { progress=false; }
 }, 10);
}

$(document).ready(function(){
 progressLoader();
 if(AndroidSession!==undefined && Android!==undefined) {
 setTimeout(function(){ 
 
   Android.loadAndroidWebScreen("LOAD_STARTUP","#0ba0da"); 
 /*
  try {
   var AUTH_USER_ID = AndroidSession.getAndroidSession("AUTH_USER_ID");
   if(AUTH_USER_ID===null){
     Android.loadAndroidWebScreen('DEFAULT');
   } else {
     var VERSION_NUMBER = Android.getProjectURL()+'apps/'+Android.getVersionNumber()+'/';
     Android.loadAndroidWebScreen(Android.getHomePage(VERSION_NUMBER));
   }
  } catch(err){ alert(err); }
  */
 },3000);
 }
});
