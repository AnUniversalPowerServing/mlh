<?php 
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.community.professional.php';
require_once '../dal/data.module.app.community.professional.branch.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.community.professional.php");

if(isset($_GET["action"])){
  if($_GET["action"]=='CREATE_PROFESSIONALCOMMUNITY'){
	$identity = new identity();
	$professionalCommunity = new ProfessionalCommunity();
	$professionalCommunityBranch = new ProfessionalCommunityBranch();
	$dbObj = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	
	$union_Id = $_GET["union_Id"];
	$domain_Id = $_GET["domain_Id"];
	$subdomain_Id = $_GET["subdomain_Id"];
	$main_branch_Id = $_GET["branch_Id"];
	$unionName = $_GET["unionName"];
	$aboutUnion = $_GET["aboutUnion"];
	$profile_pic = $_GET["profile_pic"];
	$admin_Id = $_GET["admin_Id"];
	$issue01 = $_GET["issue01"];
	$issue02 = $_GET["issue02"];
	$issue03 = $_GET["issue03"];
	$issue04 = $_GET["issue04"];
	$issue05 = $_GET["issue05"];
	$issue06 = $_GET["issue06"];
	$issue07 = $_GET["issue07"];
	$issue08 = $_GET["issue08"];
	$issue09 = $_GET["issue09"];
	$issue10 = $_GET["issue10"];
	
	/* Create Union */
	$query01 = $professionalCommunity->query_createCommunity($union_Id,$domain_Id,$subdomain_Id,$main_branch_Id,$unionName,
				$aboutUnion, $profile_pic, $admin_Id, $issue01, $issue02, $issue03, $issue04, $issue05, $issue06, $issue07,
				$issue08, $issue09, $issue10);
	echo " CREATE UNION: ".$dbObj->addupdateData($query01);
	
    $branch_Id = $_GET["branch_Id"];
	$country = $_GET["country"];
	$state = $_GET["state"];
	$location = $_GET["location"];
	$minlocation = $_GET["minlocation"];
    $publicInvitation = 'Y';
	
	/* Create Branch Information */
	$query02 = $professionalCommunityBranch->query_add_createNewBranch($branch_Id, $union_Id, 
					$minlocation, $location, $state, $country, $admin_Id, $publicInvitation);
	echo " CREATE BRANCH: ".$dbObj->addupdateData($query02);
	
	$roleInfoJson = $_GET["roleInfo"];
	$membersReqJson = $_GET["members_req"];
	$membersJson = $_GET["members"];
	
	echo "roleInfoJson: ";
    print_r($roleInfoJson);
	echo "membersReqJson: ";
	print_r($membersReqJson);
	echo "membersJson: ";
	print_r($membersJson);
	
	$arry_update_roleId = array();
	foreach($roleInfoJson as $role_Id => $roleInObj) {
	 /* check role_Id is duplicate in Database if duplicate replace with new role_Id */
	 
	 $identity = new Identity();
	 if($identity->id_unionprof_mem_roles($role_Id)==='ID_ALREADY_EXIST'){
	  $new_role_Id = $identity->unionprof_mem_roles_id();
	  $arry_update_roleId[$role_Id]=$new_role_Id;
	  $role_Id = $new_role_Id;
	 } 
	 $roleName = $roleInObj["roleName"];
	 /* Create New Roles within the Branch */
	 $query03 = $professionalCommunityBranch->query_add_createNewRole($role_Id, $union_Id, $branch_Id, $roleName);
	 echo " CREATE ROLES: ".$dbObj->addupdateData($query03);
	 
	 $permission2_Id= $identity->unionprof_mem_perm2_id();
	 $createRole = 'N';
	 $createRoleNotify = 'N';
	 $viewRoles = 'N';
	 $viewRoleNotify = 'N';
	 $updateRole = 'N';
	 $updateRoleNotify = 'N';
	 $deleteRole = 'N';
	 $deleteRoleNotify = 'N';
	 $requestUsersToBeMembers = 'N'; 
	 $requestUsersToBeMembersNotify = 'N'; 
	 $approveUsersToBeMembers = 'N';
	 $approveUsersToBeMembersNotify = 'N';
	 $createNewsFeedBranchLevel = 'N'; 
	 $createNewsFeedBranchLevelNotify = 'N';
	 $approveNewsFeedBranchLevel = 'N';
	 $approveNewsFeedBranchLevelNotify = 'N';
	 $createMovementBranchLevel = 'N';
	 $createMovementBranchLevelNotify = 'N'; 
	 $approveMovementBranchLevel = 'N'; 
	 $approveMovementBranchLevelNotify = 'N';
	 $updatePerm2 = 'N';
	 $updatePerm2Notify = 'N';
	 
	 if(isset($roleInObj["createRole"])){ $createRole = $roleInObj["createRole"]; }
	 if(isset($roleInObj["viewRoles"])){ $viewRoles = $roleInObj["viewRoles"]; }
	 if(isset($roleInObj["updateRole"])){ $updateRole = $roleInObj["updateRole"]; }
	 if(isset($roleInObj["deleteRole"])){ $deleteRole = $roleInObj["deleteRole"]; }
	 if(isset($roleInObj["requestUsersToBeMembers"])){ $requestUsersToBeMembers = $roleInObj["requestUsersToBeMembers"]; }
	 if(isset($roleInObj["approveUsersToBeMembers"])){ $approveUsersToBeMembers = $roleInObj["approveUsersToBeMembers"]; }
	 if(isset($roleInObj["createNewsFeedBranchLevel"])){ $createNewsFeedBranchLevel = $roleInObj["createNewsFeedBranchLevel"]; }
	 if(isset($roleInObj["approveNewsFeedBranchLevel"])){ $approveNewsFeedBranchLevel = $roleInObj["approveNewsFeedBranchLevel"]; }
	 if(isset($roleInObj["createMovementBranchLevel"])){ $createMovementBranchLevel = $roleInObj["createMovementBranchLevel"]; }
	 if(isset($roleInObj["approveMovementBranchLevel"])){ $approveMovementBranchLevel = $roleInObj["approveMovementBranchLevel"]; }
	 if(isset($roleInObj["updatePerm2"])){ $updatePerm2 = $roleInObj["updatePerm2"]; }
	 
	 $query04 = $professionalCommunityBranch->query_add_createPermissions2($permission2_Id, $role_Id, $createRole,
		$createRoleNotify, $viewRoles, $viewRoleNotify, $updateRole, $updateRoleNotify, $deleteRole, $deleteRoleNotify,
		$requestUsersToBeMembers, $requestUsersToBeMembersNotify, $approveUsersToBeMembers, $approveUsersToBeMembersNotify,
		$createNewsFeedBranchLevel, $createNewsFeedBranchLevelNotify, $approveNewsFeedBranchLevel, $approveNewsFeedBranchLevelNotify, 
		$createMovementBranchLevel, $createMovementBranchLevelNotify, $approveMovementBranchLevel, 
		$approveMovementBranchLevelNotify,$updatePerm2, $updatePerm2Notify);
	 echo " CREATE ROLE PERMISSIONS: ".$dbObj->addupdateData($query04);
	}
    foreach($membersReqJson as $member_Id => $membersObj) {
	  $request_Id = $identity->unionprof_mem_req_id();
	  $req_from = $admin_Id;
	  $req_to = $membersObj["member_Id"];
	  if(isset($arry_update_roleId[$role_Id])){
	    $role_Id = $arry_update_roleId[$role_Id];
	  } else {
	    $role_Id = $membersObj["role_Id"];
	  }
	  $reqMessage = '';
	  $sent_On = date('Y-m-d H:i:s');
	  $notify = 'N';
	  $watched = 'N';
	  
	  $query05 = $professionalCommunityBranch->query_add_MembersReqToJoinBranch($request_Id, $union_Id, $branch_Id, 
					$role_Id, $req_from, $req_to, $reqMessage, $sent_On, $notify, $watched);
	  echo " CREATE MEMBER REQUESTS: ".$dbObj->addupdateData($query05);
	 
	 /* Add Permissions */
	 $permission1_Id= $identity->unionprof_mem_perm1_id();
	 $createABranch = 'N';
	 $createABranchNotify = 'N';
	 $updateBranchInfo = 'N';
	 $updateBranchInfoNotify = 'N';
	 $deleteBranch = 'N';
	 $deleteBranchNotify = 'N';
	 $shiftMainBranch = 'N';
	 $shiftMainBranchNotify = 'N';
	 $createNewsFeedUnionLevel = 'N';
	 $createNewsFeedUnionLevelNotify = 'N';
	 $approveNewsFeedUnionLevel = 'N';
	 $approveNewsFeedUnionLevelNotify = 'N';
	 $createMovementUnionLevel = 'N';
	 $createMovementUnionLevelNotify = 'N';
	 $approveMovementUnionLevel = 'N';
	 $approveMovementUnionLevelNotify = 'N'; 
	 $createMovementSubDomainLevel = 'N';
	 $createMovementSubDomainLevelNotify = 'N';
	 $approveMovementSubDomainLevel = 'N';
	 $approveMovementSubDomainLevelNotify = 'N';
	 $createMovementDomainLevel = 'N';
	 $createMovementDomainLevelNotify = 'N';
	 $approveMovementDomainLevel = 'N';
	 $approveMovementDomainLevelNotify = 'N'; 
	 $updatePerm1 = 'N';
	 $updatePerm1Notify = 'N';
	 
	 if(isset($roleInObj["createABranch"])){ $createABranch = $roleInObj["createABranch"]; }
	 if(isset($roleInObj["updateBranchInfo"])){ $updateBranchInfo = $roleInObj["updateBranchInfo"]; }
	 if(isset($roleInObj["deleteBranch"])){ $deleteBranch = $roleInObj["deleteBranch"]; }
	 if(isset($roleInObj["shiftMainBranch"])){ $shiftMainBranch = $roleInObj["shiftMainBranch"]; }
	 if(isset($roleInObj["createNewsFeedUnionLevel"])){ $createNewsFeedUnionLevel = $roleInObj["createNewsFeedUnionLevel"]; }
	 if(isset($roleInObj["approveNewsFeedUnionLevel"])){ $approveNewsFeedUnionLevel = $roleInObj["approveNewsFeedUnionLevel"]; }
	 if(isset($roleInObj["createMovementUnionLevel"])){ $createMovementUnionLevel = $roleInObj["createMovementUnionLevel"]; }
	 if(isset($roleInObj["approveMovementUnionLevel"])){ $approveMovementUnionLevel = $roleInObj["approveMovementUnionLevel"]; }
	 if(isset($roleInObj["createMovementSubDomainLevel"])){ $createMovementSubDomainLevel = $roleInObj["createMovementSubDomainLevel"]; }
	 if(isset($roleInObj["approveMovementSubDomainLevel"])){ $approveMovementSubDomainLevel = $roleInObj["approveMovementSubDomainLevel"]; }
	 if(isset($roleInObj["createMovementDomainLevel"])){ $createMovementDomainLevel = $roleInObj["createMovementDomainLevel"]; }
	 if(isset($roleInObj["approveMovementDomainLevel"])){ $approveMovementDomainLevel = $roleInObj["approveMovementDomainLevel"]; }
	 if(isset($roleInObj["updatePerm1"])){ $updatePerm1 = $roleInObj["updatePerm1"]; }
	 
	 $query06 = $professionalCommunityBranch->query_add_createPermissions1($permission1_Id, $req_to, $union_Id, 
					$createABranch, $createABranchNotify, $updateBranchInfo, $updateBranchInfoNotify, $deleteBranch, 
					$deleteBranchNotify, $shiftMainBranch, $shiftMainBranchNotify, $createNewsFeedUnionLevel, 
					$createNewsFeedUnionLevelNotify, $approveNewsFeedUnionLevel, $approveNewsFeedUnionLevelNotify, 
					$createMovementUnionLevel, $createMovementUnionLevelNotify, $approveMovementUnionLevel,
					$approveMovementUnionLevelNotify, $createMovementSubDomainLevel, $createMovementSubDomainLevelNotify,
					$approveMovementSubDomainLevel, $approveMovementSubDomainLevelNotify, $createMovementDomainLevel, 
					$createMovementDomainLevelNotify, $approveMovementDomainLevel, $approveMovementDomainLevelNotify,
					$updatePerm1, $updatePerm1Notify);
	 echo " CREATE MEMBER PERMISSIONS: ".$dbObj->addupdateData($query06);
	 
	}
	foreach($membersJson as $member_Id => $membersObj) {
	  $member_Id = $identity->unionprof_mem_id();
	  $user_Id = $membersObj["member_Id"];
	  if(isset($arry_update_roleId[$role_Id])){
	   $role_Id = $arry_update_roleId[$role_Id];
	  } else {
	   $role_Id = $membersObj["role_Id"];
	  }
	  $roleName = $membersObj["roleName"];
	  $cur_role_Id = $role_Id;
	  $prev_role_Id = $role_Id;
	  $roleNotify = 'N';
	  $roleUpdatedOn = date('Y-m-d H:i:s');
	  $memNotify = 'N';
	  $memAddedOn = date('Y-m-d H:i:s'); 
	  $memAddedBy = $admin_Id;
	  $status = 'OFFLINE';
	  $query07 = $professionalCommunityBranch->query_add_MembersToBranch($member_Id, $union_Id, $branch_Id, $user_Id, 
					$cur_role_Id, $prev_role_Id, $roleNotify, $roleUpdatedOn, $memNotify, $memAddedOn, $memAddedBy, $status);
	  echo " ADD OWNER TO BRANCH: ".$dbObj->addupdateData($query07);
	 $permission1_Id= $identity->unionprof_mem_perm1_id();
	 $createABranch = 'Y';
	 $createABranchNotify = 'N';
	 $updateBranchInfo = 'Y';
	 $updateBranchInfoNotify = 'N';
	 $deleteBranch = 'Y';
	 $deleteBranchNotify = 'N';
	 $shiftMainBranch = 'Y';
	 $shiftMainBranchNotify = 'N';
	 $createNewsFeedUnionLevel = 'Y';
	 $createNewsFeedUnionLevelNotify = 'N';
	 $approveNewsFeedUnionLevel = 'Y';
	 $approveNewsFeedUnionLevelNotify = 'N';
	 $createMovementUnionLevel = 'Y';
	 $createMovementUnionLevelNotify = 'N';
	 $approveMovementUnionLevel = 'Y';
	 $approveMovementUnionLevelNotify = 'N'; 
	 $createMovementSubDomainLevel = 'Y';
	 $createMovementSubDomainLevelNotify = 'N';
	 $approveMovementSubDomainLevel = 'Y';
	 $approveMovementSubDomainLevelNotify = 'N';
	 $createMovementDomainLevel = 'Y';
	 $createMovementDomainLevelNotify = 'N';
	 $approveMovementDomainLevel = 'Y';
	 $approveMovementDomainLevelNotify = 'N'; 
	 $updatePerm1 = 'Y';
	 $updatePerm1Notify = 'N';
	 
	 $query08 = $professionalCommunityBranch->query_add_createPermissions1($permission1_Id, $user_Id, $union_Id, 
					$createABranch, $createABranchNotify, $updateBranchInfo, $updateBranchInfoNotify, $deleteBranch, 
					$deleteBranchNotify, $shiftMainBranch, $shiftMainBranchNotify, $createNewsFeedUnionLevel, 
					$createNewsFeedUnionLevelNotify, $approveNewsFeedUnionLevel, $approveNewsFeedUnionLevelNotify, 
					$createMovementUnionLevel, $createMovementUnionLevelNotify, $approveMovementUnionLevel,
					$approveMovementUnionLevelNotify, $createMovementSubDomainLevel, $createMovementSubDomainLevelNotify,
					$approveMovementSubDomainLevel, $approveMovementSubDomainLevelNotify, $createMovementDomainLevel, 
					$createMovementDomainLevelNotify, $approveMovementDomainLevel, $approveMovementDomainLevelNotify,
					$updatePerm1, $updatePerm1Notify);
	 echo " ADD OWNER PERMISSIONS: ".$dbObj->addupdateData($query08);
	}
  }
  else if($_GET["action"]==='GETDATA_PROFESSIONALCOMMUNITY'){
    if(isset($_GET["union_Id"])){
	   $union_Id=$_GET["union_Id"];
	   $comObj=new ProfessionalCommunity();
	   $dbObj=new Database();
	   $query=$comObj->query_getCommunityProfileData($union_Id);
	   echo $dbObj->getJSONData($query);
	} else { echo 'MISSING_UNION_ID'; }
  }
  else if($_GET["action"]=='GETCOUNT_PROFESSIONALCOMMUNITY_USERBEINGOWNER'){
   if(isset($_GET["user_Id"])){
     $user_Id=$_GET["user_Id"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_count_userBeingOwner($user_Id);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $jsonData=$dbObj->getJSONData($query);
	 $dejsonData=json_decode($jsonData);
	 echo $dejsonData[0]->{'count(*)'};
   } else {
     echo 'MISSING_USER_ID';
   }
   
  }
  else if($_GET["action"]=='GETDATA_PROFESSIONALCOMMUNITY_USERBEINGOWNER'){
   if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
     $user_Id=$_GET["user_Id"];
	 $limit_start=$_GET["limit_start"];
	 $limit_end=$_GET["limit_end"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_data_userBeingOwner($user_Id,$limit_start,$limit_end);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $dbObj->getJSONData($query);
   } else {
     echo 'MISSING_USER_ID';
   }
   
  }
  else if($_GET["action"]=='GETCOUNT_PROFESSIONALCOMMUNITY_USERBEINGMEMBER'){
   if(isset($_GET["user_Id"])){
     $user_Id=$_GET["user_Id"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_count_userBeingMember($user_Id);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $jsonData=$dbObj->getJSONData($query);
	 $dejsonData=json_decode($jsonData);
	 echo $dejsonData[0]->{'count(*)'};
   } else { echo 'MISSING_USER_ID'; }
  }
  else if($_GET["action"]=='GETDATA_PROFESSIONALCOMMUNITY_USERBEINGMEMBER'){
   if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
     $user_Id=$_GET["user_Id"];
	 $limit_start=$_GET["limit_start"];
	 $limit_end=$_GET["limit_end"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_data_userBeingMember($user_Id,$limit_start,$limit_end);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $dbObj->getJSONData($query);
   } else {
     echo 'MISSING_USER_ID';
   }
   
  }
  else if($_GET["action"]=='GETCOUNT_PROFESSIONALCOMMUNITY_USERSUBSCRIPTION'){
   if(isset($_GET["user_Id"])){
     $user_Id=$_GET["user_Id"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_count_userSubscription($user_Id);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $jsonData=$dbObj->getJSONData($query);
	 $dejsonData=json_decode($jsonData);
	 echo $dejsonData[0]->{'count(*)'};
   } else { echo 'MISSING_USER_ID'; }
  }
  else if($_GET["action"]=='GETDATA_PROFESSIONALCOMMUNITY_USERSUBSCRIPTION'){
   if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
     $user_Id=$_GET["user_Id"];
	 $limit_start=$_GET["limit_start"];
	 $limit_end=$_GET["limit_end"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_data_userSubscription($user_Id,$limit_start,$limit_end);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $dbObj->getJSONData($query);
   } else {
     echo 'MISSING_USER_ID';
   }  
  }
  else if($_GET["action"]=='GET_COUNT_PROFESSIONALCOMMUNITYBYCATEGORIES'){
    if(isset($_GET["domain_Id"]) && isset($_GET["subdomain_Id"])){
	  $domain_Id=$_GET["domain_Id"];
	  $subdomain_Id=$_GET["subdomain_Id"];
	  $professionalCommunity = new ProfessionalCommunity();
	  $query = $professionalCommunity->query_listOfCommunity_count_byDomainSubdomain($domain_Id,$subdomain_Id);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData=$dbObj->getJSONData($query);
	  echo $jsonData;
	} else { $content='Missing';
	    if(!isset($_GET["domain_Id"])){ $content.=' domain_Id,'; }
		if(!isset($_GET["subdomain_Id"])){ $content.=' subdomain_Id,'; }
		$content=chop($content,',');
		echo $content;
	}
  }
  else if($_GET["action"]=='GET_DATA_PROFESSIONALCOMMUNITYBYCATEGORIES'){
    if(isset($_GET["domain_Id"]) && isset($_GET["subdomain_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	  $domain_Id=$_GET["domain_Id"];
	  $subdomain_Id=$_GET["subdomain_Id"];
	  $limit_start=$_GET["limit_start"];
	  $limit_end=$_GET["limit_end"];
	  $professionalCommunity = new ProfessionalCommunity();
	  $query = $professionalCommunity->query_listOfCommunity_data_byDomainSubdomain($domain_Id,$subdomain_Id,$limit_start,$limit_end);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData=$dbObj->getJSONData($query);
	  echo $jsonData;
	} else { $content='Missing';
	    if(!isset($_GET["domain_Id"])){ $content.=' domain_Id,'; }
		if(!isset($_GET["subdomain_Id"])){ $content.=' subdomain_Id,'; }
		$content=chop($content,',');
		echo $content;
	}
  }
  else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>