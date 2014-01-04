<?php
include "inc/settings.inc.php";
include "classes/database.class.php";
include "classes/generic.class.php";

session_start();

$db = new Database($config);
$gen = new Generic($config);

if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != false)
{


	if(isset($_GET['a']) && $_GET['a'] == 'saveSettings')
	{

		$includedFields = array(
			'sitename',
			'footer',
			'ipp'
		);
		
		foreach($_POST as $k => $v)
		{
			$$k = $v;
			if(in_array($k, $includedFields))
			{
				$db->updateSettings($k, $v);
			}
			
		}	
		
		if($password != "" && $confirmpassword != "" && $password == $confirmpassword)
		{
			$db->updateLogin(sha1($password));
		}
		
		echo '{"ok": 1, "msglabel":"Save settings", "msg":"Settings are successfully saved"}';	
		
	}	
	else
	{
		echo "Error!";
	}
}
else
{
	echo "Login required!";
}
?>