<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
   "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
<meta name="application-name" content="Synoportal">
<meta name="description" content="Web portal for the Synology NAS">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">	
<link href="css/customstyle.css" rel="stylesheet" type="text/css">	

<link rel="icon" href="img/favicon.ico" type="image/x-icon">	
</head>
<body>


<?php 
include_once ("config.php");
include_once ("functions.php");

$pagelink 	= (isset($_GET['pagelink'])) ? $_GET['pagelink'] : $defaultpage;

?>

<title><?php echo $sitename ;?> - <?php echo ucfirst($pagelink); ?></title>

<?php include_once("header.php"); ?>
		
<div class="container-fluid">

	<div class="row-fluid">

		<div class="span2">
		<!--Sidebar content-->
		<?php include_once("menu/menu.php"); ?>
		</div>
		<div class="span10">
		<!--Body content-->
		<?php include_once (getPageurl($pagelink)); ?>
		</div>
    </div>
	
</div>

<div class="footer">
	<?php include_once ("footer.php"); ?>
</div>
</body>
</html>