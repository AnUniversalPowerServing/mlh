<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
	buildSelOpt_countries('geocer_selopt_country');
});
function viewCountryDetails(){
 var country = document.getElementById("geocer_selopt_country").value;
 $.get(PROJECT_URL+"data/countries/info/"+country,function(data,status){
  console.log(data);
  var phonecode = data[country].phonecode;
  var currency = data[country].currency;
  var noOfStates = data[country].noOfStates;
  var noOfUnionTerritories = data[country].noOfUnionTerritories;
  var timezones = data[country].timezones;

  console.log("phonecode: "+phonecode);
  console.log("currency: "+currency);
  console.log("noOfStates: "+noOfStates);
  console.log("noOfUnionTerritories: "+noOfUnionTerritories);
  console.log("timezones: "+timezones);
	  
  var countryInfoData='<div class="list-group">';
      countryInfoData+='<div class="list-group-item"><b>Country Information</b></div>';
      countryInfoData+='<div class="list-group-item">';

      countryInfoData+='<div class="form-group">';
	  countryInfoData+='<label>Phone code</label>';
	  countryInfoData+='<div align="right"><h4>'+phonecode+'</h4></div>';
	  countryInfoData+='</div>'; 

	  countryInfoData+='</div>';
	  countryInfoData+='<div class="list-group-item">';
	  
      countryInfoData+='<div class="form-group">';
  	  countryInfoData+='<label>Currency</label>';
  	  countryInfoData+='<div align="right"><h4>'+currency+'</h4></div>';
  	  countryInfoData+='</div>'; 

  	  countryInfoData+='</div>';
	  countryInfoData+='<div class="list-group-item">';
	  
  	  countryInfoData+='<div class="form-group">';
	  countryInfoData+='<label>No of States</label>';
	  countryInfoData+='<div align="right"><h4>'+noOfStates+'</h4></div>';
	  countryInfoData+='</div>'; 

	  countryInfoData+='</div>';
	  countryInfoData+='<div class="list-group-item">';
	  
	  countryInfoData+='<div class="form-group">';
  	  countryInfoData+='<label>No of Union Territories</label>';
  	  countryInfoData+='<div align="right"><h4>'+noOfUnionTerritories+'</h4></div>';
  	  countryInfoData+='</div>'; 

      countryInfoData+='</div>';
      countryInfoData+='</div>';
  
      
  document.getElementById("geocer_details_countryInfo").innerHTML=countryInfoData;
 });
}
// 
</script>