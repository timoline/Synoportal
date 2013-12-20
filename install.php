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
		<title>SynPortal</title>
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
		<!-- css -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">	
		<link href="assets/css/customstyle.css" rel="stylesheet" type="text/css">	
	</head>
	<body>
		<?php include_once("header.php"); ?>
		<div id="container">
			<div id="installForm">
		
<?php

	

	if(isset($_GET['step']) && $_GET['step'] == 2){
		if(empty($_POST['db_host']) || empty($_POST['db_user']) || empty($_POST['db_name'])){
			echo "<p class='error'><b>db_host</b>, <b>db_user</b> en <b>db_name</b>, zijn vereist!</p>";
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
					
					");
					if($succes == 1)
					{
						echo "<p style='color:green;'>Installatie succesvol. Verwijder <b>install.php</b> en <b>update.php</b></p>";
						echo "<p style='color:green;'>Default gebruikersnaam/wachtwoord is <b>admin</b>/<b>admin</b></p>";
					}					

				} catch (PDOException $e) {
					die(print("<p class='error'>Database error: ". $e->getMessage() ."</p>"));
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
			$errorMsg .= '<b>PHP 5.2.0</b> is vereist';
			$ok = false;
		}	
		if(!is_writable('inc/settings.inc.php'))
		{
			$errorMsg .= '<b>settings.inc.php</b> is niet schrijfbaar!';
			$ok = false;
		}
		if(!extension_loaded('pdo_mysql'))
		{
			$errorMsg .= '<b>PDO Mysql</b> extension ontbreekt!';
			$ok = false;
		}
/*		
		if(!extension_loaded('curl'))
		{
			$errorMsg .= '<b>CURL extension</b> ontbreekt!</p>';
			$ok = false;
		}
*/
		
		if($ok){
			echo "<form action='install.php?step=2' method='POST'/>
			<p style='color:green;'>Check succesvol.</p>
			<table>
				<tr>
					<td>Database host:</td><td><input type='text' name='db_host' value='localhost'/></td>
				</tr>			
				<tr>
					<td>Database user:</td><td><input type='text' name='db_user' value=''/></td>
				</tr>					
				<tr>
					<td>Database password:</td><td><input type='text' name='db_pass' value=''/></td>
				</tr>	
				<tr>
					<td>Database name:</td><td><input type='text' name='db_name' value='synoportal'/></td>
				</tr>				
			</table>
			<input type='submit' value='Verder'/>
			"; 
		}
		else
		{
			echo "<p class='error'>" . $errorMsg ."</p>";
		}
	}


?>
			</div>
		</div>
	</body>
</html>
