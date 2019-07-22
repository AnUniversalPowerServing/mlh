<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn { font-size:11px; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
</style>
<script type="text/javascript">
function js_ajax(method,url,data,fn_output){
  $.ajax({type: method, url: url,data:data,success:function(response) { fn_output(response); } }); 
}

$(document).ready(function(){
 pageloader();
});

function pageloader(){
 js_ajax('GET','countries',{},function(response){
  console.log("Response: "+JSON.stringify(response));
  var content='<div class="row">';
  content+='<div class="col-sm-12">';
  content+='<div align="center"><hr/><h5><b>LIST OF COUNTRIES</b></h5><hr/></div>';
  content+='</div>';
  content+='</div>';
  content+='<div class="row">';
  for (var key in response) {
	  var countryName = response[key].countryName.toUpperCase();
	  var capital = response[key].capital;
	  var phonecode = response[key].phonecode;
	  var currency = response[key].currency;
      content+='<div class="col-sm-4">';
      
      content+='<div class="list-group">';
      content+='<div class="list-group-item">';
      content+='<b>'+countryName+'</b>';
      content+='<i class="fa fa-angle-double-down pull-right"></i>';
      content+='</div>';
      content+='<div class="list-group-item">';

      content+='<div class="container-fluid">';
      
      content+='<div class="row">';
      content+='<div class="col-xs-4"><b>Capital</b></div>';
      content+='<div class="col-xs-1"><b>:</b></div>';
      content+='<div class="col-xs-6">'+capital+'</div>';
      content+='</div>';

      content+='<div class="row">';
      content+='<div class="col-xs-4"><b>Phonecode</b></div>';
      content+='<div class="col-xs-1"><b>:</b></div>';
      content+='<div class="col-xs-6">'+phonecode+'</div>';
      content+='</div>';

      content+='<div class="row">';
      content+='<div class="col-xs-4"><b>Currency</b></div>';
      content+='<div class="col-xs-1"><b>:</b></div>';
      content+='<div class="col-xs-6">'+currency+'</div>';
      content+='</div>';

      content+='<div class="row">';
      content+='<div class="col-xs-12">';
      content+='<button class="btn btn-primary mtop15p pull-right"><b>Know more</b></button>';
      content+='</div>';
      content+='</div>';
      
      content+='</div>';
      
      content+='</div>'; // list-group-item
      content+='</div>'; // list-group
      
      content+='</div>'; 
  }
  content+='</div>'; // row
      
  document.getElementById("countryInfo").innerHTML=content;
  
 });
}
</script>
</head>
<body>

<div id="countryInfo" class="container-fluid">
  
    
      
    
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>

</body>
</html>