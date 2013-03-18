<?php
$con = mysql_connect($config["server"], $config["username"], $config["password"]) 
		or die('<div class="alert alert-error">Could not connect:' . mysql_error() .'</div>');
$condatabase = mysql_select_db($config["database_name"], $con)
		or die ('<div class="alert alert-error">Could not select database ' . mysql_error() .'</div>');
?>




