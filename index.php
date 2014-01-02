<?php
include("config.php");
if (empty($pms_domain))
	{
	// This behavior will be changed so
	// if there is not defined $pms_domain 
	// the PMS will try to autodetect it
	die("Check your config.php file!");
	}
session_start();
if (isset($_GET['page']))
	{
	$page = $_GET['page'] . ".php";
	$pagename = $_GET['page'];
	}
if ($pms_debug_enabled == 0)
	{
	error_reporting(0);
	}
include("functions.php");
include ("themes/" . $pms_theme . "/html/header.php");
include ("themes/" . $pms_theme . "/html/body.php");
include ("themes/" . $pms_theme . "/html/footer.php");
pms_viewcount();
?>
