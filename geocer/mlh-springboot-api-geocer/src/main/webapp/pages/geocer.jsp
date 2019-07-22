<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Geocer</title>
  <jsp:include page="templates/imports/geocer_header.jsp" />  
</head>
<body>
<div id="wrapper">
  <jsp:include page="templates/menu_header.jsp" />  
  <!-- Page Content -->
  <div id="page-wrapper">
   <!--  -->
   <div class="container-fluid">
     <div class="row">
        <div class="col-md-12">
           <h4 class="page-header"><b>Geocer</b></h4>
        </div><!-- /.col-md-12 -->
      </div><!-- row -->
      <div class="row">
        <div class="col-md-12">
           <!--  -->
           <div class="panel panel-default">
              <div class="panel-heading"><b>Country Information</b></div>
              <div class="panel-body">
                 <div class="container-fluid">
                 <div class="row">
                 <div class="col-md-4">
                  <!--  -->
                  <div class="form-group">
                   <label>Country</label>
                   <div class="input-group">
                   <select id="geocer_selopt_country" class="form-control">
                    <option value="">Select a Country</option>
                   </select>
                   <span class="input-group-addon" onclick="javascript:viewCountryDetails()"><b>View Details</b></span>
                   </div>
                  </div>
                  <!--  -->
                 </div><!-- col-md-4 -->
                 </div><!-- row -->
                 <div class="row">
                 <div id="geocer_details_countryInfo" class="col-md-6"></div>
                 <div class="col-md-6"></div>
                 </div><!-- row -->
                 </div><!-- container-fluid -->
              </div><!-- panel-body -->
            </div><!-- panel -->
           <!--  -->
        </div><!-- /.col-md-12 -->
      </div><!-- row -->
    </div><!-- container-fluid -->
   <!--  -->
  </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<jsp:include page="templates/imports/geocer_footer.jsp" />  
</body>
</html>
     