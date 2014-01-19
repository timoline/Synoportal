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
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">	
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">	
	
	<!-- js -->
	<script src="assets/js/jquery.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/script.js" type="text/javascript"></script>	

	<!-- fav and touch icons -->
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">	
</head>
<body>

<?php	
include "inc/settings.inc.php";	
include "classes/database.class.php";
include "classes/generic.class.php";	
include "classes/paginator.class.php";	
include "inc/session.inc.php";	

$db = new Database($config);
$gen = new Generic($config);	
$settings = $db->getSettings();
?>

<!-- *** NAVBAR ************************************************************ -->				
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			</button>
			<a id="showMenu" class="navbar-brand" href="#"><?php echo $settings['sitename'];?></a>
		</div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="settings.php">Settings</a></li>
						<li class="divider"></li>
						<li><a href="?logout=1">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	 </div>
</nav>
<!-- *** CONTENT ************************************************************ -->	
<div id="containerSettings">
	<div class="row">
		<div id="leftmenu" class="col-lg-2 well" role="menu">
			<div class="bs-sidebar hidden-print" role="complementary">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#intralinks" data-toggle="tab">Intralinks</a></li>
					<li><a href="#favorites" data-toggle="tab">Favorites</a></li>						
				</ul>
			</div>				
		</div>		
		<div id="maincontent" class="col-lg-10" role="main">		
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