<?php
if(!include("config.php"))
{
	die("<h1>Check your config.php!</h1>");
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