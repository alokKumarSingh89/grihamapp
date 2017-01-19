<link rel="stylesheet" href="public/css/admin.css">
<div id="wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand" href=<?=$_SESSION["domain"]."?/admin"?>>Griham Admin</a>
		</div>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav menu-list" >
		    <li class="dropdown">
		        <a  href="return false;" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i> <?=$_SESSION["user"]["firstName"]." ".$_SESSION["user"]["lastName"]?> <b class="caret"></b></a>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		            <li>
		                <a href=<?=$_SESSION["domain"]."?/admin/profile"?>><i class="fa fa-fw fa-user"></i> Profile</a>
		            </li>
		            <li>
		                <a href=<?=$_SESSION["domain"]."?/admin/setting"?>><i class="fa fa-fw fa-gear"></i> Settings</a>
		            </li>
		            <li class="divider"></li>
		            <li>
		                <a href=<?=$_SESSION["domain"]."?/session/log_out"?> ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
		            </li>
		        </ul>
		    </li>
		</ul>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav side-nav">
		        <li class="active">
		            <a href=<?=$_SESSION["domain"]."?/admin"?>><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
		        </li>
		        <li>
		            <a href=<?=$_SESSION["domain"]."?/admin/pending_users"?>><i class="fa fa-user-plus"></i> User List</a>
		        </li>
		        <li>
		            <a href=<?=$_SESSION["domain"]."?/admin/groups"?>><i class="fa fa-tasks"></i>Group </a>
		        </li>
		        <li>
		            <a href=<?=$_SESSION["domain"]."?/admin/document/bonus_incentive"?>><i class="fa fa-book"></i> Documents</a>
		        </li>
		        <li>
		            <a href=<?=$_SESSION["domain"]."?/admin/groups"?>><i class="fa fa-history"></i>Group History</a>
		        </li>
		    </ul>
		</div>
	</nav>
	<div id="page-wrapper">
		<?php  
            require_once 'app/init.php';
            $app = new App;
        ?>
	</div>
 </div>