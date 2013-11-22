<?php
// Functions
function pms_get_page()
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
function pms_get_menu()
	{
	global $menu;
	foreach($menu as $value) 
		{
		echo "<li "; if($_GET['page'] == preg_replace('/\s+/', '', strtolower($value))){echo "class=\"active\"";} if ((preg_replace('/\s+/', '', strtolower($value))) == "home"){echo "><a class=\"effect\" href=\"" . $pms_domain . "/\">" . $value . "</a></li>";} else {echo "><a class=\"effect\" href=\"" . $pms_domain . "/index.php?page=" . preg_replace('/\s+/', '', strtolower($value)) . "\">" . $value . "</a></li>";}
		}
	}
?>
