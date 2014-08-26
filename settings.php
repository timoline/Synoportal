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
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">	
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">	
	<!-- js -->
	<script src="assets/js/jquery.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>	
	<script src="assets/js/settings.js" type="text/javascript"></script>
	
	<!-- fav and touch icons -->
	<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">		
	</head>
	<body class="settings">
			
	<!-- Modal -->
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
							<div id="ConfigContent" style="display: block;">
								<h2 class="page-header">General</h2>
							</div>
							<fieldset class="fieldset">
								<div class="form-group">
									<label for="sitename" class="col-md-3 control-label">Sitename</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="sitename" value="<?php echo $settings['sitename'];?>" placeholder="SynoPortal"/>
									</div>					
								</div>	
								<div class="form-group" >
									<label for="footer" class="col-md-3 control-label">Footer</label>
									<div class="col-md-9">
										<input type="text" class="form-control" name="footer" value="<?php echo $settings['footer'];?>" placeholder="&copy; 1995-2013 SynoPortal"/>
									</div>					
								</div>		
								<div class="form-group" >
									<label for="ipp" class="col-md-3 control-label">Items per page</label>
									<div class="col-md-9">
										<?php echo $ippSelect; ?>
									</div>					
								</div>									
							</fieldset>							
						</div>
						<div class="tab-pane fade" id="settingsAccount" >
							<div id="ConfigContent" style="display: block;">
								<div class="config-header clearfix">
									<h2 class="page-header">Change password</h2>
								</div>
							</div>
							<fieldset class="fieldset">
								<div class="form-group">
									<label for="password" class="col-md-3 control-label">Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" name="password" value=""/>
									</div>					
								</div>	
								<div class="form-group" >
									<label for="confirmpassword" class="col-md-3 control-label">Confirm Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" name="confirmpassword" value=""/>
									</div>					
								</div>	
							</fieldset>
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