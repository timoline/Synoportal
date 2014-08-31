<?php	
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
		<meta charset="utf-8">
		
		<meta name="application-name" content="Synoportal">
		<meta name="description" content="Web portal for the Synology NAS">
		<meta name="author" content="Timoline">
		
		<!-- Mobile settings -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	
		<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
		<title>SynoPortal - Login</title>
		<!-- css -->
		<link href="assets/components/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css">	
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">	
	</head>
	<body class="login">
	
<nav class="navbar navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
	<!--   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			</button> -->
			<a class="navbar-brand" href="#">SynoPortal</a>
		</div>
	 </div>
</nav>
		<div id="container">
			<div class="row">
			<?php if ($loginInvalid) { ?>
				<div class="alert alert-danger">
				<h4 class="alert-heading">Authentication error!</h4>
				<p>Username and/or password is incorrect</p>
				</div>
			<?php } ?>
				<div class="col-sm-4 col-sm-offset-4">

					<div class="panel panel-default panel-margin" >
						<div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Authentication</div>
						<div class="panel-body">
							<form class="form-signin" method="post" action="index.php" role="form">
								<div><input class="form-control" type="text" name="user" placeholder="Username" required autofocus></div>
								<div><input class="form-control" type="password" name="pass" placeholder="Password" required></div>
								<div>
									</br>
									<input type="hidden" name="login" value="1" />
									<input class="btn btn-success" id="loginSubmit" type="submit" value="Login"/>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</body>
</html>