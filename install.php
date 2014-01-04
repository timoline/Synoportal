<?php
	include "inc/settings.inc.php";	
	include "classes/database.class.php";
	include "classes/generic.class.php";	

	$gen = new Generic($config);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>SynoPortal - Install</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
		<!-- css -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">	
		<link href="assets/css/index.css" rel="stylesheet" type="text/css">	
	</head>
	<body class="install">
	
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"></a>
		</div>
	 </div>
</nav>
	<div id="container">
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
					  `ordering` int(11) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

					INSERT INTO `".$db_name."`. `intralinks` (`id`, `url`, `title`, `description`, `ordering`) VALUES
					(1, 'http://diskstation:8000', 'Download Station', 'Download Station', 0),
					(2, 'http://diskstation:5000', 'Disk Station Manager', 'Disk Station Manager', 1),
					(3, 'http://diskstation:8800', 'Audio Station', 'Audio Station', 2),
					(4, 'http://diskstation:7000', 'File Station', 'File Station', 3),
					(5, 'http://diskstation/photo', 'Photo Station', 'Photo Station', 4);				
					
					CREATE TABLE IF NOT EXISTS `".$db_name."`. `favorites` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `url` varchar(100) NOT NULL,
					  `title` varchar(30) NOT NULL,
					  `description` varchar(50) NOT NULL,
					  `ordering` int(11) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;	

					INSERT INTO `".$db_name."`. `favorites` (`id`, `url`, `title`, `description`, `ordering`) VALUES
					(1, 'http://www.upc.nl/televisie/tv-zenders-horizon/', 'TV Kanalen', 'Horizon TV Kanalen', 0);
					
					CREATE TABLE IF NOT EXISTS `".$db_name."`. `users` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
					
					INSERT INTO `".$db_name."`. `users` (`id`, `username`, `password`) VALUES
					(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');	

					CREATE TABLE IF NOT EXISTS `".$db_name."`. `settings` (
					  `key` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  `value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
					  UNIQUE KEY `key` (`key`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;	
					
					INSERT INTO `".$db_name."`. `settings` (`key`, `value`) VALUES
						('sitename', 'SynoPortal'),
						('footer', '1995-2014 SynoPortal'),
						('ipp', '10'),
						('startpage', 'intralinks');						
					
					");
					if($succes == 1)
					{
						echo "<div class=\"alert alert-success\">";
						echo "<h4 class=\"alert-heading\">Installation succeeded. </h4>";			
						echo "<p>Remove <b>install.php</b><br></p>";
						echo "<p>Default username/password is <b>admin</b>/<b>admin</b></p></div>";
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
			<div class="row">
				<div class="alert alert-success">
				<h4 class="alert-heading">Precheck</h4>
				<p>Precheck succeeded</p>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default panel-margin" >		
						<div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Database information</div>							
						<div class="panel-body">
							<form class="form-signin" action='install.php?step=2' method='POST' role="form">
								<div><input class="form-control" type='text' name='db_host' placeholder="Database host" required autofocus></div>
								<div><input class="form-control" type='text' name='db_name' placeholder="Database name" required></div>		
								<div><input class="form-control" type='text' name='db_user' placeholder="Database user" required></div>
								<div><input class="form-control" type='text' name='db_pass' placeholder="Database password" ></div>

							
								<div><input class="btn btn-primary btn-block" type='submit' value='Next'/></div>
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
