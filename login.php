<?php	
	include "inc/settings.inc.php";	
	
	session_start();
	
	$loginInvalid = false;
	
	if(isset($_SESSION['user_id']) && !$_SESSION['user_id'])
	{
		$loginInvalid = true;
		unset($_SESSION['user_id']);
	}
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
	<body class="login">
	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><?php echo $config["sitename"];?></a>
			</div>
		</div>
	</div>
		<div id="container">
			<div class="row">
			<?php if ($loginInvalid) { ?>
				<div class="alert alert-danger">Username and/or password is incorrect</div>
			<?php } ?>
				<div class="col-md-4 col-md-offset-4">

					<div class="panel panel-default panel-margin" >
						<div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Authentication</div>
						<div class="panel-body">
							<form class="form-signin" method="post" action="index.php" role="form">
								<div><input class="form-control" type="text" name="user" placeholder="Username" required autofocus></div>
								<div><input class="form-control" type="password" name="pass" placeholder="Password" required></div>
								<div>
									<input type="hidden" name="login" value="1" />
									<input class="btn btn-primary btn-block" id="loginSubmit" type="submit" value="Log in"/>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</body>
</html>