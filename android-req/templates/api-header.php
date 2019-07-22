<script type="text/javascript">
function sel_reqMainMenu(id){
 var arry_id=["reqMainMenu-androidWebview","reqMainMenu-androidCoreApplication"];
 for(var index=0;index<arry_id.length;index++){
   if(arry_id[index]===id){
     if(!$('#'+arry_id[index]).hasClass('active')){ $('#'+arry_id[index]).addClass('active'); }
   } else {
      if($('#'+arry_id[index]).hasClass('active')){ $('#'+arry_id[index]).removeClass('active'); }
   }
 }
}
</script>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"><b>MyLocalHook Requirements</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li id="reqMainMenu-androidWebview"><a href="android-webview.php"><b>Android Webview</b></a></li>
        <li id="reqMainMenu-androidCoreApplication"><a href="#"><b>Android Core Application</b></a></li>
      </ul>
    </div>
  </div>
</nav>