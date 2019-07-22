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
function displayTbl_listOfCountries(){
  $.post(PROJECT_URL+"tbl/countries", function(data, status){
    document.getElementById("geocerCountries_tbl_listOfCountries").innerHTML=data;
    $('#geocerCountries_tbl_listOfCountries').DataTable({ responsive: true });
  });
}
$(document).ready(function() {
	displayTbl_listOfCountries();
});
// 
</script>