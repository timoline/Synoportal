<?php
/**
* Method to get the page url
*
* @access	public
* @return	string
* @since	0.1
*/
function getPageurl ($pagelink) {
	$pageurl = $pagelink."/".$pagelink."_main.php";
	return $pageurl;
	}

?>