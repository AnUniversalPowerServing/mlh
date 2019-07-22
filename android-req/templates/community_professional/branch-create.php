<div class="container-fluid">
 <div class="row">
    <div class="col-xs-12">
      <div class="list-group">
        <div class="list-group-item">
          <b>Description: </b> A Branch can be created in two ways:
          <ol>
            <li>
		      When an administrator/owner of the community is interested to create a Branch.  
			  (<code>par1</code> will be <code>user_Id</code> from <code>user_account</code> table)
			</li>
			<li>
			  When someone requests to create a Branch, an Administrator can create a Branch onbehalf of him where 
			  requested person will be the Administrator of the Branch. (<code>par1</code>  will be 
			  <code>req_branch_Id</code> from <code>unionprof_branch_req</code> table)
			</li>
		   </ol>
		</div>
		<div class="list-group-item">
		  <b>URL:</b> app/community/createNewBranch/ <code>par1</code>/<code>par2</code>
		</div>
		<div class="list-group-item">
		  <b>URL Parameters:</b><br/><b>par1-</b><br/>It will be a <code>user_Id</code> from <code>user_account</code> 
		  table or <code>req_branch_Id</code> from the table <code>unionprof_branch_req</code>.<br/><b>par2-</b><br/>
		  <code>union_Id</code> from <code>unionprof_account</code> table.
		</div>
      </div><!-- list-group -->
	</div><!-- col-xs-12 -->
  </div><!-- row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="list-group">
        <div align="center" class="list-group-item">
          <b>Create Branch Form</b>
        </div> <!-- list-group-item -->
        <div class="list-group-item" data-toggle="collapse" data-target="#createBranchForm-tab1">
          <b>TAB#1: Branch Information</b><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>
        </div>
        <div id="createBranchForm-tab1" class="collapse">
          <div class="list-group-item">
            <b>Branch Details</b><br/>User is asked to mention <code>Country</code>, <code>State</code>, 
            <code>Location</code>, <code>Locality</code> of a Branch.<br/>
            <b>Administrator Details</b><br/><code>SurName</code>,<code>name</code>,<code>profile picture</code> 
            of the user is being displayed from the based on <code>par1</code>.<br/> User's <code>Designation in 
			the Branch</code> for <code>par1</code> user is being asked to the user.<br/>
          </div> <!-- list-group-item -->
        </div> <!-- collapse -->
        <div class="list-group-item" data-toggle="collapse" data-target="#createBranchForm-tab2">
		   <b>TAB#2: Create Roles</b><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>
        </div>
        <div id="createBranchForm-tab2" class="collapse">
           <div class="list-group-item">
              The Roles(Designations) of the Users in the Branch are created here. By default, two roles which are 
			  mandatory are available here. They are:
			  <ol>
				<li><code>Designation of the Administrator in the Branch</code> which is created in the <i>TAB#1</i> at 
					Administrator Details.</li>
				<li><code>Members</code> who can be a common Member in the Branch.</li>
			  </ol>
			  <b>Permissions</b>
			  <div class="alert alert-danger">
				 This permissions are stored in <code>unionprof_mem_perm2</code> based on <code>role_Id</code>.
			  </div>
			  Each Roles in the Branch can be set with following Permissions:
			  <ol>
				<li><b>Member Roles</b>
					<ol type="a">
					  <li><code>Create Roles</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>View Roles</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Update Role Titles</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Delete Roles</code>&nbsp;<b>(Y/N)</b></li>
					</ol>
				</li>
				<li><b>Members</b>
				    <ol type="a">
					  <li><code>Send Requests to user to join as a Member</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Approve Member Requests</code>&nbsp;<b>(Y/N)</b></li>
					</ol>
				</li>
				<li><b>NewsFeed</b>
					<ol type="a">
					  <li><code>Create NewsFeed and post within Branch</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Approve NewsFeed created by others to post within Branch</code>&nbsp;<b>(Y/N)</b></li>
					</ol>
				</li>
				<li><b>Movement</b>
					<ol type="a">
					  <li><code>Create Movement and post within Branch</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Approve Movement created by others to post within Branch</code>&nbsp;<b>(Y/N)</b></li>
					</ol>
				</li>
			</ol>
			<div class="alert alert-danger">
				By default,<br/><br/>
				1.All permissions for the Role "<code>Designation of the Administrator in the Branch</code>" 
				are set to <b>(Y)</b>.<br/><br/>
				2. All permissions for the Role "<code>Members</code>" are set to <b>(N)</b>.
			</div>
		  </div> <!-- list-group-item -->
		</div> <!-- collapse -->
		<div class="list-group-item" data-toggle="collapse" data-target="#createBranchForm-tab3">
		  <b>TAB#3: Add Members</b><i class="fa fa-angle-down pull-right" aria-hidden="true"></i>
		</div>
		<div id="createBranchForm-tab3" class="collapse">
			<div class="list-group-item">
			  <b>First Member of the Group</b><br/>Display's <code>SurName</code>,<code>name</code>, 
			  <code>profile picture</code>, <code>Designation of the User in the Community</code>,
			  <code>Country</code>, <code>State</code>,<code>Location</code>,<code>Locality</code> of the 
              User who is in the referring from <code>par1</code>.<br/>
			  <div class="alert alert-danger">
			   The data of the First member in the group stores in <code>unionprof_mem</code> table.
			  </div>
			  <b>Add List of Members</b><br/>
			  User can add Members(Known/Unknown) who are available of MyLocalHook.<br/> Once atleast 
			  One Member is added, Finish button will be available to complete creating the Community.<br/>
			  <div class="alert alert-danger">
			  The data of the members added by the user stores in <code>unionprof_mem_req</code> table.<br/>
			  Community Membership Request is sent to the User as a Notification.
			  </div>
			  In this Tab, Members are added and the roles are mapped to this Members and in addition special 
			  permissions are configured.<br/><br/>
			  <b>Special Permissions</b>
			  <div class="alert alert-danger">
			  This permissions are stored in <code>unionprof_mem_perm1</code> table based on <code>member_Id</code>.
			  </div>
			  <ol>
			   <li><b>Branch Information</b>
				   <ol>
					  <li><code>Create a New Branch</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Update Branch Information</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Able to Delete Branch</code>&nbsp;<b>(Y/N)</b></li>
					  <li><code>Able to shift Main Branch</code>&nbsp;<b>(Y/N)</b></li>
				   </ol>
               </li>
               <li><b>NewsFeed</b>
                   <ol>
					 <li><code>Create NewsFeed and post within Community</code>&nbsp;<b>(Y/N)</b></li>
					 <li><code>Approve NewsFeed created by others to post within Community</code>&nbsp;<b>(Y/N)</b></li>
				   </ol>
			   </li>
			   <li><b>Movements</b>
				   <div align="center"><b>Community Level</b></div>
				   <ol>
					 <li><code>Create Movement and post within Community</code>&nbsp;<b>(Y/N)</b></li>
					 <li><code>Approve Movement created by others to post within Community</code>&nbsp;<b>(Y/N)</b></li>
				   </ol>
				   <div align="center"><b>Sub-category Level</b></div>
				   <ol>
					 <li><code>Create Movement and post within Sub-category</code>&nbsp;<b>(Y/N)</b></li>
					 <li><code>Approve Movement created by others to post within Sub-category</code>&nbsp;<b>(Y/N)</b></li>
				   </ol>
				   <div align="center"><b>Category Level</b></div>
				   <ol>
					 <li><code>Create Movement and post within Category</code>&nbsp;<b>(Y/N)</b></li>
					 <li><code>Approve Movement created by others to post within Category</code>&nbsp;<b>(Y/N)</b></li>
				   </ol>
			   </li>
			  </ol>
			  <div class="alert alert-danger">
				By default, <br/>
				1. All the Special Permissions of the First Member of the Group are set to <b>(Y)</b>.<br/>
				2. All the Special permissions of newly added Members are set to <b>(N)</b>.
			  </div>
			</div> <!-- list-group-item -->
		  </div> <!-- collapse -->
		</div> <!-- list-group -->
	</div> <!-- col-xs-12 -->
  </div> <!-- row -->
</div> <!-- container-fluid -->
    