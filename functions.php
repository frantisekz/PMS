<?php
// Functions
function get_page()
	{
	global $page;
	if ($_GET['error'] == 404)
		{
		echo "Reguested file not found. <br />";
		}
	if ($_GET['error'] == 403)
		{
 		echo "You aren´t allowed to visit this page. <br />";
 		}
	elseif(isset($_GET['page']))
		{
		include("page-" . $page);
		}
	}
function get_menu()
	{
	global $menu;
	foreach($menu as $value) 
		{
		echo "<li "; if($_GET['page'] == preg_replace('/\s+/', '', strtolower($value))){echo "class=\"active\"";} if ((preg_replace('/\s+/', '', strtolower($value))) == "home"){echo "><a class=\"effect\" href=\"" . $pms_domain . "/\">" . $value . "</a></li>";} else {echo "><a class=\"effect\" href=\"" . $pms_domain . "/index.php?page=" . preg_replace('/\s+/', '', strtolower($value)) . "\">" . $value . "</a></li>";}
		}
	}
function get_social()
	{
	global $google_plus;
	global $facebook;
	global $twitter;
	if ($google_plus != "0")
		{
		echo "<a href=\"" . $google_plus . "\" target=\"_blank\"><img src=\"../img/gp.png\" alt=\"Google_Plus_Icon\"></a> "
		;}
	if ($facebook != "0")
		{
		echo "<a href=\"" . $facebook . "\" target=\"_blank\"><img src=\"../img/fb.png\" alt=\"Facebook_Icon\"></a> "
		;}
	if ($twitter != "0")
		{
		echo "<a href=\"" . $twitter . "\" target=\"_blank\"><img src=\"../img/twitter.png\" alt=\"Twitter_Icon\"></a> "
		;}
	}
?>
