<div class="container-fluid">
<div class="row">
<div class="col-xs-12">

<div class="list-group">
<div class="list-group-item">
<b>Description:</b>
</div>
<div class="list-group-item">
<b>URL:</b> app/create-newsfeed
</div>
</div>

</div><!-- col-xs-12 -->
</div><!-- row -->
<div class="row">
<div class="col-xs-12">

<div class="list-group">
<div align="center" class="list-group-item">
<b>Create NewsFeed Form</b>
</div>
<div class="list-group-item" 
data-toggle="collapse"
data-target="#createNewsFeedForm-tab1">
<b>TAB#1:&nbsp; Write NewsFeed</b>
<i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>
</div>
<div id="createNewsFeedForm-tab1" class="collapse">
<div class="list-group-item">
<b>Write NewsFeed</b><br/>
<code>News profile picture</code>, 
<code>Article Title</code>, <code>
Short Summary</code>, <code>Description</code>,
are the mandatory fields provided by the User.<br/>
<b>Other Media Links</b><br/>
<code>Youtube link-01</code>, <code>Youtube link-02</code>, 
<code>Youtube link-03</code> are the optional fields 
where user can be provided.
</div>
</div>
<div class="list-group-item"
data-toggle="collapse"
data-target="#createNewsFeedForm-tab2">
<b>TAB#2:&nbsp; Post</b>
<i class="fa fa-angle-down pull-right" 
aria-hidden="true"></i>
</div>
<div id="createNewsFeedForm-tab2" class="collapse">
<div class="list-group-item">
<b>List of Communities with Branches</b><br/>
<br/>
Initially, the list of communities are 
displayed where user is a member of 
the community(who has <code>member_Id</code> in 
<code>unionprof_mem</code>) with 
<code>unionprof_mem_perm1. createNewsFeedUnionLevel = 'Y'</code>.
(User has the permission to create NewsFeed and not to 
publish in the community).<br/><br/>
<b>Community Details</b><br/>
<code>community profile picture</code>,
<code>community name</code>, 
<code>category/ sub-category</code> are 
mentioned with share details configuration.
Using Share details configuration, 
a NewsFeed can be shared in two ways:
<ol>
<li><b>Within Community</b><br/>
 When user chooses it, he is also provide 
 with an option to either <code>share 
 with Members</code> or <code>share with 
 Subscribers</code> or <code>both</code>.

</li>
<li><b>Within Branches</b><br/>
When user chooses it, the list of branches in the 
community where user is a member 
with permission 
<code>unionprof_mem_perm2. 
createNewsFeedBranchLevel = 'Y'</code> 
are displayed with checkbox 
(<i class="fa fa-square-o" 
aria-hidden="true"></i>).<br/><br/>
The details with checkbox mentioned are 
<code>User Designation in the Branch</code>, 
<code>Locality</code>, <code>Location</code>,
<code>State</code>, <code>Country</code> of the 
Branch.<br/><br/>
When user checks the checkbox of a Branch, 
he is also provided with an option to either <code>share 
 with Members</code> or <code>share with 
 Subscribers</code> or <code>both</code> for each Branch.
</li>
</ol>
</div>
</div>
</div>

</div><!-- col-xs-12 -->
</div><!-- row -->
</div><!-- container-fluid -->
