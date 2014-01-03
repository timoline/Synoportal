<?php	
	include "inc/settings.inc.php";	
	include "inc/session.inc.php";
	include "classes/database.class.php";
	include "classes/generic.class.php";	
	include "classes/paginator.class.php";	
	
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
		<link href="assets/css/index.css" rel="stylesheet" type="text/css">	
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
            <ul class="nav pull-right">
                <li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="settings.php">Settings</a></li>
                        <!--<li><a href="#">Another action</a></li>-->
                        <li class="divider"></li>
                        <li><a href="?logout=1">Logout</a></li>
                    </ul>
                </li>
            </ul>	
	</div>
</div>
	<div id="containerSettings">
		<div class="row">
			<div class="col-lg-2 well" role="menu">
				<div class="bs-sidebar hidden-print" role="complementary">
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="#intralinks" data-toggle="tab">Intralinks</a></li>
						<li><a href="#favorites" data-toggle="tab">Favorites</a></li>						
					</ul>
				</div>				
			</div>		
			<div class="col-lg-10" role="main">		
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
		<!-- Footer -->
		<div class="footer">
		<footer>
			<div class="copyright"><p><?php echo $settings['footer'];?></p></div>
		</footer>
		</div>		
	</body>
</html>