<?php
session_start();
include('../config.php');
include('../functions.php');
if ((isset($_POST['pass'])) AND ($_POST['pass'] == $pms_password))
{
	$pms_domain = $_SERVER['SERVER_NAME'];
	$write = "<strong>N:</strong> Administrator logged in. +++" . time() . "\n";
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
pms_bootstrap31();
?>
<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" type="text/css" href="styles.css"/>

<script>
function msgdelconf(int)
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","index.php?id_helper="+int,true);
xmlhttp.send();
}
</script>

<script>
function msgdel()
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","index.php?delete_msg="+1,true);
xmlhttp.send();
}
</script>

</head>
<body>
<?php
if ((isset($_POST['pass'])) AND ($_POST['pass'] != $pms_password))
	{
	echo "<strong>Login failed!!!</strong><br/>";
	}
if ((isset($_COOKIE["admin"])) AND ($_SESSION['pass'] == $pms_password)) 
{
	echo "
	<div class=\"admin\">
	<div class=\"padfix\">";
	include('inner_admin.php');
	echo "</div></div>";
}
else
	{
	pms_get_loginbox();
	}
?>
</div>
</body>