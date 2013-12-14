<?php
include('config.php');
include('functions.php');
$page = $_GET['page'] . ".php";
$theme_path = "themes/" . $pms_theme . "/";
$pagename = $_GET['page'];
if ($pms_debug_enabled == 0)
  {
  error_reporting(0);
  }
include ("themes/" . $pms_theme . "/html/header.php");
include ("themes/" . $pms_theme . "/html/body.php");
include ("themes/" . $pms_theme . "/html/footer.php");
?>
