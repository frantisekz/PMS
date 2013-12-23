<?php
include('../config.php');
if ((isset($_POST['pass'])) AND ($_POST['pass'] == $pms_password))
{
setcookie("admin", $pms_pageauthor, time()+3600, $pms_domain);
}
if (isset($_GET['logout']))
	{
	setcookie("admin", "", time()-3600);
	}
function pms_get_loginbox()
	{
	echo "<div class=\"loginbox\">
	<form class=\"navbar-form pull-left\" action=\"index.php?refresh\" method=\"post\">
	<strong>Log in</strong><br/>
	Password:  <br/>
	<input type=\"password\" name=\"pass\" size=\"20\" class=\"span2\" /><br/>
	<input type=\"submit\" name=\"submitlin\" class=\"btn\" value=\"Log in\" /><br/>
	</form>
	</div>";
	}
function pms_get_pages()
	{
	global $pms_domain;
	$pages = array_diff(scandir("../pages/"), array('..', '.'));
	// array_diff puts out "." and ".." on Linux
	return $pages;
	}
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="img/favicon.gif" />
<?php
if (isset($_GET['refresh']))
{
echo "<meta http-equiv=\"refresh\" content=\"3; url=http://" . $pms_domain . "/admin/index.php\" />";
}
echo "<title>" . $pms_pagetitle . " - Administration</title>\n";
?>
<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<?php
if (isset($_GET['refresh']))
	{
	echo "<strong>Stand by...</strong> If you won't be redirected within 5 seconds press <a href=\"http://" . $pms_domain . "/admin/index.php\">here</a>.";
	}
if ((isset($_COOKIE["admin"])) AND !(isset($_GET['refresh']))) {
?>
<div class="admin">
<div class="padfix">
<strong>Welcome back ;)</strong><br/>
<a href="index.php?logout&refresh">Logout</a><br/>
<h2>Settings:</h2>
<?php
echo "Page author: " . $pms_pageauthor . "<br/>";
echo "Page title: " . $pms_pagetitle . "<br/>";
echo "Page domain: " . $pms_domain . "<br/>";
echo "Google+ url is set to: "; if($pms_google_plus == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_google_plus . "\">" . $pms_google_plus . "</a><br/>";}
echo "Facebook url is set to: "; if($pms_facebook == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_facebook . "\">" . $pms_facebook . "</a><br/>";}
echo "Twitter url is set to: "; if($pms_twitter == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_twitter . "\">" . $pms_twitter . "</a><br/>";}
if ($pms_robots == 1){echo "Robots are allowed to access this page!<br/>";} else{echo "Robots are not allowed to access this page!<br/>";}
if ($pms_debug_enabled == 1){echo "Debug mode is on!<br/>";} else{echo "Debug mode is off!<br/>";}
echo "<h2>Active pages:</h2>";
foreach(pms_get_pages() as $value) 
		{
		$value = str_replace(".php", "", $value);
		$value[0] = strtoupper($value[0]);
		echo $value . "<br/>";
		}
?>
</div>
</div>
<?php
}
else 
	{
	pms_get_loginbox();
	}
if ((isset($_POST['pass'])) AND ($_POST['pass'] != $pms_password) AND (isset($_POST['submitlin'])))
	{
	?>
	<strong>Login failed!!!</strong>
	<?php
	pms_get_loginbox();
	}
?>
</div>
</body>