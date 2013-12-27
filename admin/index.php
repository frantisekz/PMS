<?php
session_start();
include('../config.php');
if ((isset($_POST['pass'])) AND ($_POST['pass'] == $pms_password))
{
setcookie("admin", $pms_pageauthor, time()+3600, $pms_domain);
$_SESSION['pass'] = $_POST['pass'];
}
if (isset($_GET['logout']))
	{
	unset($_SESSION['pass']);
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
if ((isset($_GET['refresh'])) AND (isset($_POST['pass'])) AND ($_POST['pass'] != $pms_password) AND (isset($_POST['submitlin'])))
	{
	echo "<strong>Login failed!!!</strong><br/>";
	}
if (isset($_GET['refresh']))
	{
	echo "<strong>Stand by...</strong> If you won't be redirected within 5 seconds press <a href=\"http://" . $pms_domain . "/admin/index.php\">here</a>.";
	}
if ((isset($_COOKIE["admin"])) AND (!isset($_GET['refresh'])) AND ($_SESSION['pass'] == $pms_password)) {
include('inner_admin.php');
}
elseif (!isset($_GET['refresh']))
	{
	pms_get_loginbox();
	}
?>
</div>
</body>