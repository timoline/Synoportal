<?php
$url			= array();
$title			= array();
$description	= array();

$url[]			= "http://www.synology.com";
$title[]		= "Synology";
$description[]	= "Synology";

$url[]			= "http://www.synocommunity.com";
$title[]		= "Synocommunity";
$description[]	= "Synocommunity";

//sort
array_multisort($title,$url,$description);
?>