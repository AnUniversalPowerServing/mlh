<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Geocer - Countries</title>
  <jsp:include page="templates/imports/geocer_countries_header.jsp" />  
</head>
<body>

    <div id="wrapper">

       <jsp:include page="templates/menu_header.jsp" />  
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header"><b>Geocer</b></h4>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                   <!--  -->
                   <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>List of Countries</b></div>
                        <div class="panel-body">
                          <!--  -->
                           <table id="geocerCountries_tbl_listOfCountries" width="100%" class="table table-striped table-bordered table-hover"></table>
                          <!--  -->
                        </div>
                    </div>
                  </div>
                  <!--  -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
   <jsp:include page="templates/imports/geocer_countries_footer.jsp" />  
 

</body>

</html>
