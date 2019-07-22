<div class="container-fluid">
  <div class="row">
	<div class="col-xs-12">
      <!-- -->
	  <div class="list-group">
	    <div class="list-group-item">
		  <b>Description:</b> A Movement can be created in two ways:
		  <ol>
			<li>directly by User</li>
			<li>On behalf of Community</li>
		  </ol>
		</div>
		<div class="list-group-item">
		  <b>URL:</b> app/create-movement
		</div>
	  </div>
	  <!-- -->
	</div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
	  <div class="list-group">
	    <div class="list-group-item">
	      <b>Create Movement Form</b>
	    </div>
		<div class="list-group-item" data-toggle="collapse" data-target="#createMovement-tab1-req">
		  <b>TAB#1. Create Movement</b>
		  <i class="fa fa-angle-down pull-right" aria-hidden="true"></i>
		</div>
	   <div id="createMovement-tab1-req" class="collapse">
		<div class="list-group-item pad0">
		 <div class="container-fluid">
		  <div class="row">
	        <div class="col-xs-12 mtop15p">
				<b>General Information</b><br/>
				<code>Petition Title</code>, <code>ToAuthorityName</code>, <code>ToAuthorityDescription</code>,
				<code>IssueDescription</code>, <code>IssueFacedBy</code>, <code>Expected Solution</code>,
				<code>MovementImage</code>, <code>MovementStatus</code>, <code>OpenOn</code>, <code>ClosedOn</code>,
				<code>displayLevel</code><br/>
				<b>Initiated By</b><br/>
				<code>surName</code>, <code>name</code>, <code>minlocation</code>, <code>location</code>,
				<code>state</code>, <code>country</code>, <code>profile_pic</code>,
				<code>initiate: direct by me</code>/<code>initiate: onbehalf of Community</code>
				<br/>
				If <code>initiate: direct by me</code>, start movement at
				<ol>
				  <li>Subdomain Level</li>
				  <li>Domain Level</li>
				</ol>
				If <code>initiate: onbehalf of Community</code>, start movement at
				<ol>
				  <li>Subdomain Level</li>
				  <li>Domain Level</li>
				  <li>Community Level</li>
				  <li>Branch Level</li>
				</ol>
	        </div>
	      </div>
		 </div>
		</div>
	   </div>
	  </div>
	</div>
  </div>
</div>