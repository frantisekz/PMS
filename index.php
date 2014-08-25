<?php
error_reporting(0); // Don't print any php errors on unconfigured site

if(!include("config.php"))
{
	die("<h1>Check your config.php!</h1>");
}

if ($pms_debug_enabled == 1)
	{
	error_reporting(3);
	}

if (isset($_GET['page']))
	{
	$page = $_GET['page'] . ".php";
	$pagename = $_GET['page'];
	}

else
	{
	$page = "Home.php";
	$pagename = "Home";
	}

include("functions.php");
include ("themes/" . $pms_theme . "/html/header.php");
include ("themes/" . $pms_theme . "/html/body.php");
include ("themes/" . $pms_theme . "/html/footer.php");
pms_viewcount();
?>