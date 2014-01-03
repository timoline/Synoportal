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
	
	$viewArray = $gen->getViews("views");
	$ippSelect = $gen->selector('ipp', $settings['ipp'], $ippArray);	
	$viewsSelect = $gen->selector('startpage', $settings['startpage'], $viewArray);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>SynoPortal - Settings</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
		<!-- css -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">	
		<link href="assets/css/settings.css" rel="stylesheet" type="text/css">	
	<!-- js -->
	<script src="assets/js/jquery.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.js" type="text/javascript"></script>	
	<script src="assets/js/settings.js" type="text/javascript"></script>
	</head>
	<body class="login">
	
		
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
				
	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><?php echo $settings['sitename'];?></a>
			</div>
		</div>
	</div>
	<div id="containerSettings">
		<div class="row">
			<form class="form-horizontal">	
			<div class="col-lg-3" role="menu">
				<div class="bs-sidebar hidden-print" role="complementary">
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="#settingsGeneral" data-toggle="tab">General</a></li>
						<li><a href="#settingsUpdates" data-toggle="tab">Change password</a></li>										
					</ul>
				</div>
				<br>
				<div class="btn-group">
					<button type="submit" class="btn btn-primary" id="saveSettings">Save</button>
					<a type="cancel" class="btn btn-default" href="index.php">Close</a>							
				</div>					
			</div>		
			<div class="col-lg-9" role="main">		
					<div class="tab-content">
						<div class="tab-pane fade in active" id="settingsGeneral">
							<div id="ConfigContent" style="display: block;">
								<div class="config-header clearfix">
									<div id="ConfigTitle" class="pull-left config-title">
										General
									</div>
								</div>
							</div>
							<fieldset class="fieldset">
								<div class="form-group">
									<label for="sitename" class="col-lg-2 control-label">Sitename</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" name="sitename" value="<?php echo $settings['sitename'];?>" placeholder="SynoPortal"/>
									</div>					
								</div>	
								<div class="form-group" >
									<label for="footer" class="col-lg-2 control-label">Footer</label>
									<div class="col-lg-6">
										<input type="text" class="form-control" name="footer" value="<?php echo $settings['footer'];?>" placeholder="&copy; 1995-2013 SynoPortal"/>
									</div>					
								</div>		
								<div class="form-group" >
									<label for="ipp" class="col-lg-2 control-label">Default startpage</label>
									<div class="col-lg-2">
										<?php echo $viewsSelect; ?>
									</div>					
								</div>	
								<div class="form-group" >
									<label for="ipp" class="col-lg-2 control-label">Items per page</label>
									<div class="col-lg-2">
										<?php echo $ippSelect; ?>
									</div>					
								</div>									
							</fieldset>							
						</div>
						<div class="tab-pane fade" id="settingsUpdates" >
							<div id="ConfigContent" style="display: block;">
								<div class="config-header clearfix">
									<div id="ConfigTitle" class="pull-left config-title">
										Change password
									</div>
								</div>
							</div>
							<fieldset class="fieldset">
								<div class="form-group">
									<label for="password" class="col-lg-2 control-label">Password</label>
									<div class="col-lg-6">
										<input type="password" class="form-control" name="password" value=""/>
									</div>					
								</div>	
								<div class="form-group" >
									<label for="confirmpassword" class="col-lg-2 control-label">Confirm Password</label>
									<div class="col-lg-6">
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
	</body>
</html>