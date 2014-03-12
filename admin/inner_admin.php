<?php
if (!isset($_SESSION['pass']))
{
	die("Unauthorized access!!!");
}

include("modals.php");
include("ajax.php");
?>
<strong>Welcome back ;)</strong><br/>
<a href="index.php?logout">Logout</a><br/>
<h2>Settings:</h2>
<table>
<?php
echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
<td>Page author: " . $pms_pageauthor . "</td></tr>";
echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
<td>Page title: " . $pms_pagetitle . "</td></tr>";
echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
<td>Page domain: " . $pms_domain . "</td></tr>";
echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
<td>Google+ url is set to: "; if($pms_google_plus == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_google_plus . "\">" . $pms_google_plus . "</a></td></tr>";}
echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
<td>Facebook url is set to: "; if($pms_facebook == "0"){echo "Disabled<br/>";} else {echo "<a href=\"" . $pms_facebook . "\">" . $pms_facebook . "</a></td></tr>";}
echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
<td>Twitter url is set to: "; if($pms_twitter == "0"){echo "Disabled</td></tr>";} else {echo "<a href=\"" . $pms_twitter . "\">" . $pms_twitter . "</a></td></tr>";}
if ($pms_robots == 1)
{
		echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
	<td>Robots are allowed to access this page!</td></tr>";
} 
else
{
	echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td><td>Robots are not allowed to access this page!</td></tr>";
}
if ($pms_debug_enabled == 1)
	{
		echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td>
	<td>Debug mode is on!</td></tr>";
} 
else
	{
		echo "<tr><td><td><span class=\"glyphicon gglyphicon glyphicon-cog\"></span></td><td>Debug mode is off!</td></tr>";
	}
echo "</table>";

echo "<h2>Pages:</h2>";
echo "";
if (isset($_POST['pname']))
{
	$page = $_POST['pname'] . ".php";
	$handle = fopen($page, 'w'); 
}
foreach(pms_get_pages() as $value) 
{
	$value = str_replace(".php", "", $value);
	$value[0] = strtoupper($value[0]);
	echo $value . "<br/>";
}

echo "<h2>Stats:</h2>";
$fp = fopen("count.txt", "r");
$count = fgets($fp, 200);
fclose($fp);
echo "Website visited: " . $count . " times.<br/>";

echo "<h2>Messages:</h2>
<div class=\"msg_wrap\">";
$file = file("msg.txt");
$i = 0;
foreach ($file as $line) 
{
	$element=explode("+++",$line); 
	echo "<table>
	<tr>
	<td><span class=\"glyphicon glyphicon-arrow-left\"></span></td><td>
	E-mail: </td><td>" . wordwrap($element[0], 80, " ",1) . "</td></tr>
	<tr><td>
	<a href=\"#\" onclick=\"msgdelconf(" . $i . ")\" data-target=\"#msgdel\" data-toggle=\"modal\"><span class=\"glyphicon glyphicon-trash\"></span></td></a>";
	echo "<td>Message: </td><td>" . wordwrap($element[1], 80, " ",1);
	echo "</td></tr></table><hr>";
	$i++;
}
unset($i);
?>
</div>
<h2>Log:</h2>
<div class="msg_wrap">
<?php
$file = file("log.txt");
$file = array_reverse($file);
foreach ($file as $line)
{
	$element=explode("+++",$line);
	echo $element[1] . "<hr>" . $element[0] . "<br/>";
}
?>