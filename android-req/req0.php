<!DOCTYPE html>
<html lang="en">
<head>
  <title>Requirement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
.pad0{ padding:0px; }
.pad10p { padding:10px; }
.mtop5p { margin-top:5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
.mtop35p { margin-top:35px; }
.hide-block { display:none; }
.font-red { color:red; }
code{ font-weight:bold; }
hr { margin-bottom:10px; }
.lh22 { line-height: 22px; }
</style>
</head>
<body>

<div class="container-fluid">
<div class="row">
<div align="center" class="col-xs-12">
<h5><b>PROFESSIONAL COMMUNITY</b></h5>
</div>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-xs-12" data-toggle="collapse" 
data-target="#permInfo-req">
<h5><i class="fa fa-angle-down" 
aria-hidden="true"></i>
&nbsp;&nbsp;&nbsp;<b>VIEW PERMISSIONS</b></h5>
<hr/>
</div>
</div>
<div id="permInfo-req" class="collapse">
<div class="row">
<div class="col-xs-12">
<div align="center">
<b>Table </b>"<code>unionprof_mem_perm1</code>"<br/>
</div>
<div>
<b>Overview</b><br/>
This Table stores following special 
permission for each Member in the Branch 
using <code>member_Id</code>.
</div>
<div class="list-group mtop15p">
<div class="list-group-item">
<div align="center">
<h5 class="lh22"><b>Who can provide this special permissions for a Member in the community?</b></h5>
</div>
<div>
The following can give Special permissions for a Member in the Community:
<ol>
<li>Members of the Community who created Community 
can create and update special permission for the 
Members of the Community.</li>
<li>
<b>Create Special Permissions</b><br/>
Member of the Community (with permission 
<code>createABranch='Y'</code>) can provide permission 
while creating a branch and 
adding New Members.
</li>
<li>
<b>Update Special Permissions</b><br/>
Member of the Community (with 
permission <code>updatePerm1='Y'</code>) can 
update Existing Members Special Permissions.
</li>
</ol>
</div>
</div>
</div>
<div class="table-responsive">
<table class="table">
<thead>
<tr><th>Columns</th>
<th>Description</th></tr>
</thead>
<tbody>
<tr>
<td>createABranch</td>
<td>If <code>createABranch='Y'</code>, that 
Member can create New Branch being 
an Administrator / make someone as an 
Administrator who requests for a New Branch. <br/>
If <code>createABranch='N'</code>, user is only able 
to request for a Branch within community.</td>
</tr>
<tr>
<td>createABranchNotify</td>
<td>By default, 
<code>createABranchNotify='N'</code>.<br/>
when <code>createABranch='Y'</code>, sets
<code>createABranchNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>createABranchNotify='N'</code>
</td>
</tr>
<tr>
<td>updateBranchInfo</td>
<td>If <code>updateBranchInfo='Y'</code>, 
user is able to update <code>country</code>, 
<code>state</code>, <code>location</code>, 
<code>locality</code> using 
<span class="label label-default">Edit 
Branch profile</span> button.
</td>
</tr>
<tr>
<td>updateBranchInfoNotify</td>
<td>
By default, 
<code>updateBranchInfoNotify='N'</code>.<br/>
when <code>updateBranchInfo='Y'</code>, sets
<code>updateBranchInfoNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets 
<code>updateBranchInfoNotify='N'</code>
</td>
</tr>
<tr>
<td>deleteBranch</td>
<td></td>
</tr>
<tr>
<td>deleteBranchNotify</td>
<td>
By default, 
<code>deleteBranchNotify='N'</code>.<br/>
when <code>deleteBranch='Y'</code>, sets
<code>deleteBranchNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>deleteBranchNotify='N'</code>
</td>
</tr>
<tr>
<td>shiftMainBranch</td>
<td></td>
</tr>
<tr>
<td>shiftMainBranchNotify</td>
<td>
By default, 
<code>shiftMainBranchNotify='N'</code>.<br/>
when <code>shiftMainBranch='Y'</code>, sets
<code>shiftMainBranchNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>shiftMainBranchNotify='N'</code>
</td>
</tr>
<tr>
<td>createNewsFeedUnionLevel</td>
<td></td>
</tr>
<tr>
<td>createNewsFeedUnionLevelNotify</td>
<td>
By default, 
<code>createNewsFeedUnionLevelNotify='N'</code>.<br/>
when <code>createNewsFeedUnionLevel='Y'</code>, sets
<code>createNewsFeedUnionLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>createNewsFeedUnionLevelNotify='N'</code>
</td>
</tr>
<tr>
<td>approveNewsFeedUnionLevel</td>
<td></td>
</tr>
<tr>
<td>approveNewsFeedUnionLevelNotify</td>
<td>
By default, 
<code>approveNewsFeedUnionLevelNotify='N'</code>.<br/>
when <code>approveNewsFeedUnionLevel='Y'</code>, sets
<code>approveNewsFeedUnionLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>approveNewsFeedUnionLevelNotify='N'</code>
</td>
</tr>
<tr>
<td>createMovementUnionLevel</td>
<td></td>
</tr>
<tr>
<td>createMovementUnionLevelNotify</td>
<td>
By default, 
<code>createMovementUnionLevelNotify='N'</code>.<br/>
when <code>createMovementUnionLevel='Y'</code>, sets
<code>createMovementUnionLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>createMovementUnionLevelNotify='N'</code>
</td>
</tr>
<tr>
<td>approveMovementUnionLevel</td>
<td></td>
</tr>
<tr>
<td>approveMovementUnionLevelNotify</td>
<td>
By default, 
<code>approveMovementUnionLevelNotify='N'</code>.<br/>
when <code>approveMovementUnionLevel='Y'</code>, sets
<code>approveMovementUnionLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>approveMovementUnionLevelNotify='N'</code>
</td>
</tr>
<tr>
<td>createMovementSubDomainLevel</td>
<td></td>
</tr>
<tr>
<td>createMovementSubDomainLevelNotify</td>
<td>
By default, 
<code>createMovementSubDomainLevelNotify='N'</code>.<br/>
when <code>createMovementSubDomainLevel='Y'</code>, sets
<code>createMovementSubDomainLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>createMovementSubDomainLevelNotify='N'</code>
</td>
</tr>
<tr>
<td>approveMovementSubDomainLevel</td>
<td></td>
</tr>
<tr>
<td>approveMovementSubDomainLevelNotify</td>
<td>
By default, 
<code>approveMovementSubDomainLevelNotify='N'</code>.<br/>
when <code>approveMovementSubDomainLevel='Y'</code>, sets
<code>approveMovementSubDomainLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>approveMovementSubDomainLevelNotify='N'</code>
</td>
</tr>
<tr>
<td>createMovementDomainLevel</td>
<td></td>
</tr>
<tr>
<td>createMovementDomainLevelNotify</td>
<td>
By default, 
<code>createMovementDomainLevelNotify='N'</code>.<br/>
when <code>createMovementDomainLevel='Y'</code>, sets
<code>createMovementDomainLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>createMovementDomainLevelNotify='N'</code>
</td>
</tr>
<tr>
<td>approveMovementDomainLevel</td>
<td></td>
</tr>
<tr>
<td>approveMovementDomainLevelNotify</td>
<td>
By default, 
<code>approveMovementDomainLevelNotify='N'</code>.<br/>
when <code>approveMovementDomainLevel='Y'</code>, sets
<code>approveMovementDomainLevelNotify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>approveMovementDomainLevelNotify='N'</code>
</td>
</tr> 
<tr>
<td>updatePerm1</td>
<td></td>
</tr>
<tr>
<td>updatePerm1Notify</td>
<td>
By default, 
<code>updatePerm1Notify='N'</code>.<br/>
when <code>updatePerm1='Y'</code>, sets
<code>updatePerm1Notify='Y'</code> to trigger 
Notification to the user that his permission has 
been changed. Once notification get triggers, again it sets
<code>updatePerm1Notify='N'</code>
</td>
</tr>
<tr>
<td>updatedPermOn</td>
<td></td>
</tr>
</tbody>
</table>

</div>
</div>
</div>
</div><!-- collapse -->
</div><!-- container-fluid -->


<div class="container-fluid">



</div>
</body>
</html>