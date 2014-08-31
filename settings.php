<?php	
	include "inc/settings.inc.php";	
	include "inc/session.inc.php";
	include "classes/database.class.php";
	include "classes/generic.class.php";	
	
	$db = new Database($config);
	$gen = new Generic($config);	
	$settings = $db->getSettings();
	
	$ippArray = array(
		'5' => '5',
		'10' => '10',
		'15' => '15',
		'20' => '20'
	);
	
	$ippSelect = $gen->selector('ipp', $settings['ipp'], $ippArray);	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
   "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="application-name" content="Synoportal">
	<meta name="description" content="Web portal for the Synology NAS">
	<meta name="author" content="Timoline">	
	
	<title>SynoPortal - Settings</title>
	
	<!-- Mobile settings -->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	
	<!-- css -->
	<link href="assets/components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css">	
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">	
	<!-- js -->
	<script src="assets/components/jquery/jquery.js" type="text/javascript"></script>
	<script src="assets/components/bootstrap/dist/js/bootstrap.js" type="text/javascript"></script>	
	<script src="assets/js/settings.js" type="text/javascript"></script>
	
	<!-- fav and touch icons -->
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">		
</head>
<body class="settings">
		
<!-- Modal -->
<?php include_once "admin/_modal.php"; ?>	
	
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
			<a class="navbar-brand" href="index.php"><?php echo $settings['sitename'];?></a>
		</div>
		  <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ($_SESSION['username']);?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="?logout=1"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->		
	</div>
</nav>
<div id="containerSettings">
	<div class="row">
		<form class="form-horizontal">	
			<div id="leftmenu" role="menu">
				<div class="col-sm-3 col-md-2 sidebar" role="complementary">
					<ul class="nav nav-sidebar">
						<li class="active"><a href="#settingsGeneral" data-toggle="tab">General</a></li>
						<li><a href="#settingsAccount" data-toggle="tab">Account</a></li>										
					</ul>
					<div class="btn-group">
						<button type="submit" class="btn btn-success" id="saveSettings">Save</button>
						<a type="cancel" class="btn btn-default" href="index.php">Close</a>							
					</div>					
				</div>					
			</div>		
			<div id="maincontent" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" role="main">	
				<div class="tab-content">
					<div class="tab-pane fade in active" id="settingsGeneral">
						<?php include_once "admin/_general.php"; ?>							
					</div>
					<div class="tab-pane fade" id="settingsAccount" >
						<?php include_once "admin/_account.php"; ?>	
					</div>
				</div>
			</div>		
		</form>								
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