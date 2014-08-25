<?php
session_start();
include('../config.php');
include('../functions.php');
// include("modals.php");
// include("ajax.php");

if ((isset($_POST['pass'])) AND ($_POST['pass'] == $pms_password))
{
	$pms_domain = $_SERVER['SERVER_NAME'];
	$write = "<strong>N:</strong> Administrator logged in from " . $_SERVER['REMOTE_ADDR'] . ". +++" . time() . "\n";
	$fp = fopen("log.txt", "a");
	fwrite($fp, $write);
	setcookie("admin", $pms_pageauthor, time()+3600, $pms_domain);
	$_SESSION['pass'] = $_POST['pass'];
	header("Location:index.php");
}
if (isset($_GET['logout']))
{
	unset($_SESSION['pass']);
	setcookie("admin", "", time()-3600);
	header("Location:index.php");
}

function pms_get_loginbox()
	{
	echo "<div class=\"loginbox\">
	<form class=\"navbar-form pull-left\" action=\"index.php\" method=\"post\" id=\"login\">
	<strong>Password:</strong> <input type=\"password\" name=\"pass\" size=\"20\" class=\"span2\" placeholder=\"Your Password\" /><br/>
	<button type=\"submit\" class=\"btn btn-primary\" form=\"login\">Log in</button>
	</form>
	</div>";
	}
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="http://<?php echo $pms_domain;?>/favicon.gif" />
<?php
echo "<title>" . $pms_pagetitle . " - Administration</title>\n";
pms_jquery1();
pms_bootstrap3();
?>
<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" type="text/css" href="styles.css"/>
<?php include('scripts.php'); ?>
</head>
<body>
<?php
if ((isset($_POST['pass'])) AND ($_POST['pass'] != $pms_password))
	{
	echo "<strong>Login failed!!!</strong><br/>";
	}
if ((isset($_COOKIE["admin"])) AND ($_SESSION['pass'] == $pms_password)) 
{
?>
<div class="left_menu">
<a href="index.php?logout"><button type="button" class="btn btn-danger">Logout</button></a>
<br/>
<hr>
<h3<?php if (!$_GET['sub']) echo " id=\"active\" "?>><a href="index.php">Dashboard</a></h3>
<h3<?php if ($_GET['sub'] == "pages") echo " id=\"active\" "?>><a href="index.php?sub=pages">Pages</a></h3>
<h3<?php if ($_GET['sub'] == "media") echo " id=\"active\" "?>><a href="index.php?sub=media">Media</a></h3>
<h3<?php if ($_GET['sub'] == "messages") echo " id=\"active\" "?>><a href="index.php?sub=messages">Messages</a></h3>
<h3<?php if ($_GET['sub'] == "templates") echo " id=\"active\" "?>><a href="index.php?sub=templates">Templates</a></h3>
<h3<?php if ($_GET['sub'] == "settings") echo " id=\"active\" "?>><a href="index.php?sub=settings">Settings</a></h3>
</div>

<div class="admin">
<?php 
switch ($_GET['sub']){
	case "pages":
		include('pages.php');
		break;
	case "media":
		include('media.php');
		break;
	case "messages":
		include('messages.php');
		break;
	case "templates":
		include('templates.php');
		break;
	case "settings":
		include('settings.php');
		break;
	default:
		include('dashboard.php');

}

?>
</div>
<div class="bottom_panel"></div>

<?php
}
else
	{
	pms_get_loginbox();
	}
?>
</div>
</body>