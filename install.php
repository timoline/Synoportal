<?php
	include "inc/settings.inc.php";	
	include "classes/database.class.php";
	include "classes/generic.class.php";	

	$gen = new Generic($config);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		
		<meta name="application-name" content="Synoportal">
		<meta name="description" content="Web portal for the Synology NAS">
		<meta name="author" content="Timoline">
		
		<!-- Mobile settings -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
		
		<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
		<title>SynoPortal - Install</title>
	
		<!-- css -->
		<link href="assets/components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">	
		<link href="assets/components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">		
	</head>
	<body class="install">
	
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
	   <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			</button> -->
			<a class="navbar-brand" href="#">SynoPortal</a>
		</div>
	 </div>
</nav>
	<div id="container-fluid">
		<div id="installForm">
		
<?php

	if(isset($_GET['step']) && $_GET['step'] == 2){
		if(empty($_POST['db_host']) || empty($_POST['db_user']) || empty($_POST['db_name'])){
			echo "<div class='alert alert-danger'><h4 class=\"alert-heading\">Database error!</h4><p><b>db_host</b>, <b>db_user</b> and <b>db_name</b>, are required!</p></div>";
		}
		else
		{
			$ok = true;
			foreach($_POST as $key => $val){
				$$key = $val;
				$ok = $gen->changeConfig($key, $val);
			}
			if($ok){
				
				try {
					$db = new PDO("mysql:host=".$db_host, $db_user, $db_pass);
					$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
					
					$succes = $db->exec("CREATE DATABASE IF NOT EXISTS`".$db_name."`;	

					CREATE TABLE IF NOT EXISTS `".$db_name."`. `intralinks` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `url` varchar(100) NOT NULL,
					  `title` varchar(30) NOT NULL,
					  `description` varchar(50) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

					INSERT INTO `".$db_name."`. `intralinks` (`id`, `url`, `title`, `description`) VALUES
					(1, 'http://diskstation:8000', 'Download Station', 'Download Station'),
					(2, 'http://diskstation:5000', 'Disk Station Manager', 'Disk Station Manager'),
					(3, 'http://diskstation:8800', 'Audio Station', 'Audio Station'),
					(4, 'http://diskstation:7000', 'File Station', 'File Station'),
					(5, 'http://diskstation/photo', 'Photo Station', 'Photo Station');				
					
					CREATE TABLE IF NOT EXISTS `".$db_name."`. `favorites` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `url` varchar(100) NOT NULL,
					  `title` varchar(30) NOT NULL,
					  `description` varchar(50) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;	

					INSERT INTO `".$db_name."`. `favorites` (`id`, `url`, `title`, `description`) VALUES
					(1, 'http://www.upc.nl/televisie/tv-zenders-horizon/', 'TV Kanalen', 'Horizon TV Kanalen');
					
					CREATE TABLE IF NOT EXISTS `".$db_name."`. `users` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					  `created_at` datetime DEFAULT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
					
					INSERT INTO `".$db_name."`. `users` (`id`, `username`, `password`, `name`, `email`, `created_at`) VALUES
					(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997','Administrator','','2014-07-27 09:20:51');	

					CREATE TABLE IF NOT EXISTS `".$db_name."`. `settings` (
					  `key` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  `value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  UNIQUE KEY `key` (`key`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;	
					
					INSERT INTO `".$db_name."`. `settings` (`key`, `value`) VALUES
						('sitename', 'SynoPortal'),
						('footer', '1995-2014 SynoPortal'),
						('ipp', '10');						
					
					");
					if($succes == 1)
					{
					?>
					<div class="container-fluid">
						<div class="alert alert-success">
							<h4 class="alert-heading">Installation succeeded. </h4>	
							<p>Remove <b>install.php</b><br></p>
							<p>Default username/password is <b>admin</b>/<b>admin</b></p>
						</div>
									
						<div>
							<form class="form-finished" action='index.php' method='POST' role="form">
								<div>
									<input class="btn btn-success" type='submit' value='Finished'/>
								</div>
							</form>
						</div>
					</div>
					<?php	
					}					

				} catch (PDOException $e) {
					die(print("<div class='alert alert-danger'><h4 class=\"alert-heading\">Database error:  </h4><p>". $e->getMessage() ."</p></div>"));
				}		
	
			}
		}
	}
	else
	{
		$errorMsg = '';
		$ok = true;

		if (version_compare(PHP_VERSION, '5.2.0') <= 0) 
		{
			$errorMsg .= '<b>PHP 5.2.0</b> is required!';
			$ok = false;
		}	
		if(!is_writable('inc/settings.inc.php'))
		{
			$errorMsg .= '<b>settings.inc.php</b> is not writeable!';
			$ok = false;
		}
		if(!extension_loaded('pdo_mysql'))
		{
			$errorMsg .= '<b>PDO Mysql</b> extension is required!';
			$ok = false;
		}
/*		
		if(!extension_loaded('curl'))
		{
			$errorMsg .= '<b>CURL extension</b> is required!</p>';
			$ok = false;
		}
*/
		
		if($ok){
		?>
			<div class="container-fluid">
				<div class="alert alert-success">
				<h4 class="alert-heading">Precheck</h4>
				<p>Precheck succeeded</p>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default panel-margin" >		
						<div class="panel-heading"><span class="fa fa-database"></span> Database information</div>							
						<div class="panel-body">
							
								<form class="form-signin" action='install.php?step=2' method='POST' role="form">
									<div class="form-group">
										<input class="form-control" type='text' name='db_host' placeholder="Database host" required autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" type='text' name='db_user' placeholder="Database user" required>
									</div>
									<div class="form-group">
										<input class="form-control" type='text' name='db_pass' placeholder="Database password" >
									</div>
									<div class="form-group">
										<input class="form-control" type='text' name='db_name' placeholder="Database name" required>
									</div>										
									</br>
									<div class="pull-right"><input class="btn btn-success" type='submit' value='Next'/></div>
								</form>
							
						</div>
					</div>
				</div>
			</div>										
<?php
		}
		else
		{
			echo "<p class='alert alert-danger'>" . $errorMsg ."</p>";
		}
	}


?>
			</div>
		</div>
	</body>
</html>
