class HtmlCore {
 progressbar(count){
  return ('<div class="progress-bar progress-bar-danger progress-bar-striped" '
        +'role="progressbar" aria-valuenow="'+count+'" '
        +'aria-valuemin="0" aria-valuemax="100" style="width:'+count+'%">'
        +'<span class="sr-only">'+count+'% Complete</span>'
        +'</div>');
 }
}
class AppCommons {
  appInitHeader(){
    return ('<div><nav class="navbar custom-bg"><div class="container-fluid"><div class="navbar-header">'
	 +'<a href="#"><img src="images/logo-blue-flat.png" class="app-icon-s1"/></a></div></div></nav></div>');
  }
}
class AppAuth {
  usrMobileNumInputForm(response){
   /* response format : [{"phonecode":"+91","country":"India","timezone":"Asia/Kolkatta"},{...}]*/
    var content='';
	return content;
  }

	 
}
var htmlCore = new HtmlCore();
var appCommons = new AppCommons();
var appAuth = new AppAuth();