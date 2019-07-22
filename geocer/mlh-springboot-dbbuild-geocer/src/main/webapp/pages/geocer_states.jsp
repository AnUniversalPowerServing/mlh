<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Geocer - States</title>
  <jsp:include page="templates/imports/geocer_states_header.jsp" />  
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
                        <div class="panel-heading"><b>List of States</b></div>
                        <div class="panel-body">
                          <!--  -->
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-xs-4">
                                <!--  -->
                                <div class="form-group">
                                  <!--  -->
                                  <label>Choose a Country</label>
                                  <div class="input-group">
                                    <select id="geocerStates_selopt_country" class="form-control">
                                       <option>Select a Country</option>
                                    </select>
                                    <span class="input-group-addon" onclick="javascript:displayTbl_listOfStatesInACountry();"><b>Display States</b></span>
                                  </div>
                                  <!--  -->
                                </div>
                                <!--  -->
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-xs-12 mtop15p">
                                <!--  -->
                                 <table width="100%" class="table table-striped table-bordered table-hover" id="geocerStates_tbl_listOfStates"></table>
                                <!--  -->
                              </div>
                            </div>
                            
                          </div>
                         
                          
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
    
   <jsp:include page="templates/imports/geocer_states_footer.jsp" />  
    

</body>

</html>
