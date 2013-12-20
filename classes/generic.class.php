<?php
/**
* Method to get the page url
*
* @access	public
* @return	string
* @since	0.1
*/
function getPageurl ($pagelink) {
	$pageurl = "views/".$pagelink."/".$pagelink."_main.php";
	return $pageurl;
	}

function redirect ($page) {
	header ("Location: ".$page);
	exit();
	}	
?>