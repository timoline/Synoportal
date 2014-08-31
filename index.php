<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="application-name" content="Synoportal">
	<meta name="description" content="Web portal for the Synology NAS">
	<meta name="author" content="Timoline">
	
	<!-- Mobile settings -->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	
	<!-- css -->
	<link href="assets/components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css">	
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">	
	<link href="assets/components/datatables/examples/resources/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

	
	<!-- js -->
	<script src="assets/components/jquery/jquery.js" type="text/javascript"></script>
	<script src="assets/components/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/components/datatables/media/js/jquery.dataTables.js" type="text/javascript"></script>
	<script src="assets/components/datatables/examples/resources/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>		
	<script src="assets/js/script.js" type="text/javascript"></script>	

	<!-- fav and touch icons -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">	
</head>
<body>

<?php	
	include "inc/settings.inc.php";	
	include "classes/database.class.php";
	include "classes/generic.class.php";	
	#include "classes/paginator.class.php";	
	include "inc/session.inc.php";	
	
	$db = new Database($config);
	$gen = new Generic($config);	
	$settings = $db->getSettings();
?>
		
<!-- *** MODAL ************************************************************ -->	
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="messageLabel"></h4>
	  </div>
	  <div class="modal-body">
		<div id="message"></div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->			
<!-- *** NAVBAR ************************************************************ -->					
<nav class="navbar navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->	
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a id="showMenu" class="navbar-brand" href="#"><?php echo $settings['sitename'];?></a>			
		</div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"></i> <?php echo ($_SESSION['username']);?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
					 	<li><a href="settings.php#settingsAccount"><i class="glyphicon glyphicon-lock"></i> Change password</a></li>						
						<li><a href="settings.php"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="?logout=1"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	 </div>
</nav>
<!-- *** CONTENT ************************************************************ -->	
<div id="containerSettings">
	<div class="row">
		<div id="leftmenu" role="menu">
			<div class="col-sm-3 col-md-2 sidebar" role="complementary">
				<ul class="nav nav-sidebar">
					<li class="active"><a href="#intralinks" data-toggle="tab"><span class="glyphicon glyphicon-tag"></span> Intralinks</a></li>				
					<li><a href="#favorites" data-toggle="tab"><span class="glyphicon glyphicon-bookmark"></span> Favorites</a></li>				
				</ul>
			</div>				
		</div>		

		<div id="maincontent" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" role="main">		
			<div class="tab-content">
				<div class="tab-pane fade in active" id="intralinks">
					<?php include_once "views/intralinks/intralinks_main.php"; ?>						
				</div>				
				<div class="tab-pane fade" id="favorites" >
					<?php include_once "views/favorites/favorites_main.php"; ?>	
				</div>		
			</div>									
		</div>	
	</div>
</div>
<!-- *** FOOTER ************************************************************ -->	
<div class="footer">
	<footer>
		<div class="copyright"><p><?php echo $settings['footer'];?></p></div>
	</footer>
</div>		
</body>
</html>