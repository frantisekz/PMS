<?php
include('config.php');
include('functions.php');
$page = $_GET['page'] . ".php";
$theme_path = "themes/" . $theme . "/";
$pagename = $_GET['page'];
if ($debug_enabled == 0)
  {
  error_reporting(0);
  }
else
  {
  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $start = $time;
  }
include ("themes/" . $theme . "/html/header.php");
include ("themes/" . $theme . "/html/body.php");
include ("themes/" . $theme . "/html/footer.php");
if ($debug_enabled == 1)
  {
  $time = microtime();
  $time = explode(' ', $time);
  $time = $time[1] + $time[0];
  $finish = $time;
  $total_time = round(($finish - $start), 4);
  echo "<br/><strong>Debugging enabled!</strong>; page generated in " . $total_time . " seconds.";
  }
?>
